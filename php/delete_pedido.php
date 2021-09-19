<?php 
session_start();

if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

include("connection.php");

$qu = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

if (mysql_num_rows($qu) > '0') {
					while($rows_user = mysql_fetch_assoc($qu)){
						$cd_usuario = $rows_user['cd_usuario'];
}}


$cd_pedido = $_GET['pedido'];



$qd = "call sp_delete_carrinho('$cd_pedido')";
mysql_query($qd);
if (!$qd) {
	echo "Houve um erro ao deletar<br>";
	mysql_error();

}
else{
header("Location: carrinho.php");
}





 ?>