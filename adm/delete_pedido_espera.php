<?php 

include("../php/connection.php");

$cd_pedido = $_GET['pedido'];



$qd = "call sp_delete_pedido_espera('$cd_pedido')";
mysql_query($qd);
if (!$qd) {
	echo "Houve um erro ao deletar<br>";
	mysql_error();

}
else{
header("Location: pedidos_espera.php");
}





 ?>