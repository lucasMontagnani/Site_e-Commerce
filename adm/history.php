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
	<title>Histórico de Pedidos</title>
	<meta charset="utf-8">
		<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
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
			<!-- - LEFT MENU ADM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
			<?php 
				include("../php/Page Parts/left_menu_adm_new.php");
			 ?>
			<div class="col-md-8">
				<div id="workplace">
					<h2>Histórico de Pedidos</h2>
					<form action="show_finish.php" method="post">
						<input type="text" name="pedido" placeholder="Códico do Pedido">
						<input type="submit" value="BUSCAR">
					</form>
					<br>
					<table class="table">
					<tr>
						<td>Pedido</td>
						<td>Produto</td>
						<td>Quantidade</td>
						<td>Unidade</td>
						<td>Data</td>
						<td>Descrição</td>
						<td>Preço Unitario</td>
						<td>Total</td>
						<td>Cliente</td>
					</tr>
					<?php 
					$read_produto =  mysql_query("select tb_pedido.cd_pedido,tb_produto_pedido.cd_produto,tb_produto_pedido.qt_produto,tb_produto_pedido.cd_tamanho,tb_produtos.nm_produto,tb_produtos.vl_produto,DATE_FORMAT(tb_pedido.dt_pedido,'%d/%m/%y') as date,tb_produto_pedido.qt_produto * tb_produtos.vl_produto as total,tb_perfil_usuario.nm_usuario from tb_perfil_usuario inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produto_pedido.cd_produto = tb_produtos.cd_produto where tb_pedido.vr_status = 'finish' order by tb_pedido.dt_pedido");


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
					$cd_user = $rows_produtos['nm_usuario'];
					$cd_pedido = $rows_produtos['cd_pedido'];
						echo '<tr>
						<td>'.$rows_produtos['cd_pedido'].'</td>
						<td>'.$rows_produtos['cd_produto'].'</td>
						<td>'.$rows_produtos['qt_produto'].'</td>
						<td>'.$nt.'</td>
						<td>'.$rows_produtos['date'].'</td>
						<td>'.utf8_encode($rows_produtos['nm_produto']).'</td>
						<td>R$ '.$rows_produtos['vl_produto'].'</td>
						<td>R$ '.$rows_produtos['total'].'</td>'; ?>

					<td><a href="<?php echo "processa_user.php?user=$cd_user"?>"><?php echo utf8_encode($rows_produtos['nm_usuario'])?></a></td>
						<?php
						echo '<tr>';
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