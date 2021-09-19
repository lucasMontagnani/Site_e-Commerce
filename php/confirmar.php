<?php 
session_start();
include("connection.php");

if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}


$qu = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

if (mysql_num_rows($qu) > '0') {
					while($rows_user = mysql_fetch_assoc($qu)){
						$cd_usuario = $rows_user['cd_usuario'];
}}






 $s_pag = $_POST["pag"];
 $s_ret = $_POST["ret"];

date_default_timezone_set('America/Sao_Paulo');
				$data = date("Y-m-d");

echo $data;


$qm = mysql_query("call sp_insere_pedido('$cd_usuario','$s_pag','$s_ret','$data')");

if (!$qm) {
	mysql_error();
	echo mysql_error();
}




$read_produto = mysql_query("select tb_produtos.cd_produto, tb_produtos.im_produto,tb_produtos.nm_produto,tb_produtos.vl_produto,tb_carrinho.qt_produto,tb_carrinho.cd_tamanho,tb_carrinho.cd_carrinho from tb_perfil_usuario	inner join tb_carrinho on tb_perfil_usuario.cd_usuario = tb_carrinho.cd_usuario  inner join  tb_produtos on tb_carrinho.cd_produto = tb_produtos.cd_produto where tb_carrinho.cd_usuario =  '".$cd_usuario."'");


						if (mysql_num_rows($read_produto) > '0') {
				while($rows_produtos = mysql_fetch_assoc($read_produto)){
						$cd_produto = $rows_produtos['cd_produto'];
						$tamanho = $rows_produtos['cd_tamanho'];
						$quantidade = $rows_produtos['qt_produto'];

							echo $quantidade;

$qs = mysql_query("call sp_insere_item_pedido('$cd_produto','$quantidade','$tamanho')");
					}
					}

$lc = mysql_query("delete from tb_carrinho where cd_usuario = '".$cd_usuario."'");
header("Location: pagar.php");







/*

$t = mysql_query("select max(cd_pedido) as pedido from tb_pedido");
if (mysql_num_rows($t) > '0') {
					while($rows_pedido = mysql_fetch_assoc($t)){
						$t1 = $rows_pedido['pedido'];
}}

echo '<a href="pagar.php?pedido='.$t1.'">Pagar</a>';

*/

 ?>