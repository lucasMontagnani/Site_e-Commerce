<?php 

include("../php/connection.php");

$cd_produto = $_GET['produto'];



$qd = mysql_query("call sp_delete_produto('$cd_produto')");

if (!$qd) {
	echo "Houve um erro ao deletar<br>";

	mysql_error();



}
else{
header("Location: atualizar_produto.php");
}





 ?>