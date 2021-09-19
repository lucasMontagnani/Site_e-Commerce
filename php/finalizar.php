<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function falha_cadastro(){
			setTimeout("window.location='carrinho.php'",0);
		}
	</script>
</head>
<body>

</body>
</html>
<?php 
session_start();
include("connection.php");

if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

if ((!isset($_POST['pagamento'])) || (!isset($_POST['retirada']))) {
	echo "<script>alert('Algo está faltando! Por favor, selecione a forma de pagamento e a forma de retirada.');</script>";
	echo "<script>falha_cadastro();</script>";
}





$qu = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

if (mysql_num_rows($qu) > '0') {
					while($rows_user = mysql_fetch_assoc($qu)){
						$cd_usuario = $rows_user['cd_usuario'];
}}


 $s_pag = $_POST["pagamento"];
 $s_ret = $_POST["retirada"];



 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Meu Carrinho</title>
	<meta charset="utf-8">
	<?php 
            include("Page Parts/links.php");
         ?>
	<style type="text/css">
		.ss{
			width: auto;
			border: solid;
			border-width: 1px;
			margin-bottom: 10px;
			padding-top: 10px;
			padding-left: 20px;
			padding-right: 20px;
			background-color: #f0f0f0;
			border-color: #c0c0c0;
			padding-bottom: 10px;
		}

		.ss hr{
			border-color: #c0c0c0;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			
				<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					<?php 
			include("Page Parts/menu_header.php");
		 ?>
	
</div>
		<div class="page-header">
			<h1>Finalizando a compra</h1>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="ss">
					<h4><b>Enviar para</b></h4>
					<hr>
					<?php 

					$read_user = mysql_query("select * from tb_perfil_usuario inner join tb_endereco_usuario on tb_perfil_usuario.cd_endereco = tb_endereco_usuario.cd_endereco inner join tb_bairro_usuario on tb_endereco_usuario.cd_bairro = tb_bairro_usuario.cd_bairro inner join tb_cidade_usuario on tb_bairro_usuario.cd_cidade  = tb_cidade_usuario.cd_cidade inner join tb_estado_usuario on tb_cidade_usuario.cd_estado  = tb_estado_usuario.cd_estado where tb_perfil_usuario.cd_usuario =  '".$cd_usuario."'");


						if (mysql_num_rows($read_user) > '0') {
				while($rows_user = mysql_fetch_assoc($read_user)){
						echo '<tr>
						<td>'.$rows_user['nm_usuario'].'</td><br>
						<td>'.$rows_user['nm_rua'].', </td>
						<td>'.$rows_user['cd_numero'].'</td><br>
						<td>'.$rows_user['nm_bairro'].'</td><br>
						<td>'.$rows_user['nm_cidade'].' - </td>
						<td>'.$rows_user['sg_uf'].' (Brasil)</td><br>
						<td>'.$rows_user['cd_cep'].'</td>
						</tr>'; }}

					 ?>
				</div>
				<div class="ss">
					<h4><b>Forma de envio</b></h4>
					<hr>
					<?php 

					$read_ret = mysql_query("select nm_retirada from tb_forma_retirada where cd_retirada = '".$s_ret."'");

						if (mysql_num_rows($read_ret) > '0') {
				while($rows_ret = mysql_fetch_assoc($read_ret)){
						echo '<tr>
						<td>Metodo: '.$rows_ret['nm_retirada'].'</td><br>
						</tr>'; }}

					 ?>
				</div>
				<div class="ss">
					<h4><b>Forma de pagamento</b></h4>
					<hr>
					<?php 

					$read_pag = mysql_query("select nm_pagamento from tb_forma_pagamento where cd_pagamento = '".$s_pag."'");

						if (mysql_num_rows($read_pag) > '0') {
				while($rows_pag = mysql_fetch_assoc($read_pag)){
						echo '<tr>
						<td>Metodo: '.$rows_pag['nm_pagamento'].'</td><br>
						</tr>'; }}

					 ?>
				</div>
				<div class="ss">
					<h4><b>Sumário</b></h4>
					<hr>
					<?php 
					$read_produto = mysql_query("select format(sum(tb_produtos.vl_produto*tb_carrinho.qt_produto),2,'de_DE') as total from tb_perfil_usuario inner join tb_carrinho on tb_perfil_usuario.cd_usuario = tb_carrinho.cd_usuario inner join tb_produtos on tb_carrinho.cd_produto = tb_produtos.cd_produto where tb_perfil_usuario.cd_usuario ='".$cd_usuario."'");
						if (mysql_num_rows($read_produto) > '0') {
				while($rows_produtos = mysql_fetch_assoc($read_produto)){
					
				 echo "Valor dos itens: R$ ".$rows_produtos['total']."<br>";

					}
					}
					?>
				</div>





<h4>Confirme os dados do pedido, caso algo esteja errado clique em "Voltar para o carrinho" e altere.</h4>
<a href="carrinho.php"><button>Voltar para o carrinho</button></a>
<form method="post" action="confirmar.php">
	<input type="hidden" name="pag" value="<?php echo $s_pag; ?>">
	<input type="hidden" name="ret" value="<?php echo $s_ret; ?>">
	<input type="submit" value="Confirmar">
</form>




			</div>
		</div>
	</div>
	<br>
			<?php 
				include("Page Parts/footer.php");
		 	?>
</body>
</html>