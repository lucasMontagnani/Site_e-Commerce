<?php 
include("../php/connection.php");
session_start();
if (isset($_SESSION['adm_email']) && isset($_SESSION['adm_password'])) {
	$e = $_SESSION['adm_email'];
	$s = $_SESSION['adm_password'];
}else{
	header("Location: login_adm.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pedidos em Espera</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
	<script type="text/javascript">
		/*
		function confirm(){
			setTimeout("window.location='login_adm.php'",0);
		}*/
	</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
				<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
				<?php 
					include("../php/Page Parts/menu_header_adm.php");
				?>
		</div>
	</div>	
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<!-- - LEFT MENU ADM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
			<?php 
				include("../php/Page Parts/left_menu_adm_new.php");
			 ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
				<div id="workplace" style="overflow-x:auto;">
					<h2>Pedidos em espera do pagamento</h2>
					<table class="table">
					<tr>
						<td>Pedido</td>
						<td>Produto</td>
						<td>Qtd</td>
						<td>Unidade</td>
						<td>Descrição</td>
						<td>Preço Unitario</td>
						<td>Total</td>
						<td>Cliente</td>
						<td>Aceitar</td>
						<td>Excluir</td>
					</tr>
					<?php 
					$read_produto =  mysql_query("select tb_produto_pedido.cd_produto_pedido,tb_pedido.cd_pedido,tb_produto_pedido.cd_produto,tb_produto_pedido.cd_tamanho,tb_produto_pedido.qt_produto,tb_produtos.nm_produto,tb_produtos.vl_produto,tb_produto_pedido.qt_produto * tb_produtos.vl_produto as total,tb_perfil_usuario.nm_usuario from tb_perfil_usuario inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produto_pedido.cd_produto = tb_produtos.cd_produto where tb_pedido.vr_status = 'false' order by tb_pedido.cd_pedido");


						if (mysql_num_rows($read_produto) > '0') {
				while($rows_produtos = mysql_fetch_assoc($read_produto)){
					if ($rows_produtos['cd_tamanho'] == 1) {
							$nt = "Tamanho Unico";
							}	
					elseif ($rows_produtos['cd_tamanho'] == 2) {
							$nt = "P";
						}
					elseif ($rows_produtos['cd_tamanho'] == 3) {
							$nt = "M";
						}
					elseif ($rows_produtos['cd_tamanho'] == 4) {
							$nt = "G";
						}
					elseif ($rows_produtos['cd_tamanho'] == 5) {
							$nt = "GG";
						}
						$cd_pedido = $rows_produtos['cd_pedido'];
						$cd_produto_pedido = $rows_produtos['cd_produto_pedido'];
						$cd_user = utf8_encode($rows_produtos['nm_usuario']);
						$cd_produto = $rows_produtos['cd_produto'];
						echo '<tr>
						<td>'.$rows_produtos['cd_pedido'].'</td>';
						?>
						<td><a href="<?php echo "info_produto.php?produto=$cd_produto"?>"><?php echo $rows_produtos['cd_produto']?></a></td>
						<?php 
						echo'<td>'.$rows_produtos['qt_produto'].'</td>
						<td>'.$nt.'</td>
						<td>'.utf8_encode($rows_produtos['nm_produto']).'</td>
						<td>R$ '.$rows_produtos['vl_produto'].'</td>
						<td>R$ '.$rows_produtos['total'].'</td>'; ?>

					<td><a href="<?php echo "processa_user.php?user=$cd_user"?>"><?php echo $rows_produtos['nm_usuario']?></a></td>

	<td><a href="<?php echo "aceita_pedido_espera.php?pedido=$cd_pedido"?>">Aceitar</a></td>
	<td><a href="<?php echo "delete_pedido_espera.php?pedido=$cd_pedido"?>">Excluir</a></td>
						<?php
						echo '<tr>';
						echo "";
					}
					}
					 ?>
				</table>













					

				</div>				
			</div>
		</div>
	</div>
</body>
</html>