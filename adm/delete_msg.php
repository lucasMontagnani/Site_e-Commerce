<?php 

include("../php/connection.php");

$msg = $_GET['msg'];



$qd = mysql_query("delete from tb_mensagem where cd_mensagem = $msg");

if (!$qd) {
	echo "Houve um erro ao deletar<br>";

	mysql_error();



}
else{
header("Location: mensagem_adm.php");
}





 ?>