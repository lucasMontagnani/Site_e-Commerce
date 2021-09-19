<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function falha_cadastro(){
			setTimeout("javascript:history.back(-2)",0);
		}
	</script>
</head>
<body>

</body>
</html>
<?php 
session_start();
if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}
if (isset($_POST['cd_produto'])) {
	$_SESSION['cd_produto'] = $_POST['cd_produto'];
}


include("connection.php");

$cd_produto = $_POST['cd_produto'];
$pro_qtd = $_POST['pro_qtd'];
$pro_tamanho = $_POST['tamanho'];



if (!isset($pro_qtd)) {
	$pro_qtd = null;
}


$qe = mysql_query("select qt_produto from tb_produtos inner join r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto inner join tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho where tb_produtos.cd_produto = '".$cd_produto."' and tb_tamanho.cd_tamanho = '".$pro_tamanho."'");

if (mysql_num_rows($qe) > '0') {
					while($rows_qe = mysql_fetch_assoc($qe)){

						$estoque = $rows_qe['qt_produto'];


						}}



if ($pro_tamanho == "6" || $pro_tamanho == 6 || $pro_tamanho == null) {
		echo "<script>alert('Algo está faltando! Por favor, selecione o tamanho desejado.');</script>";
	echo "<script>falha_cadastro();</script>";
}elseif ($pro_qtd == null) {
	echo "<script>alert('Algo está faltando! Por favor escolha a quantidade desejada.');</script>";
	echo "<script>falha_cadastro();</script>";
}elseif ($pro_qtd > $estoque) {
	echo "<script>alert('Não há a quantidade desejada do produto no estoque no momento. Por favor selecione uma quantidade menor ou escolha um tamanho (caso exista) com mais itens no estoque.');</script>";
	echo "<script>falha_cadastro();</script>";
}
else{
	$qu = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

if (mysql_num_rows($qu) > '0') {
					while($rows_produtos = mysql_fetch_assoc($qu)){

$qp = mysql_query("call sp_insere_carrinho(/*tb_pedido*/ $cd_produto, $pro_qtd,'".$pro_tamanho."','".$rows_produtos['cd_usuario']."')");
if (!$qp) {
	mysql_error();
}else{
	header("Location: alert_page.php");
}



}}
}



 ?>