<?php 
session_start();
if (isset($_SESSION['adm_email'])) {
	$e = $_SESSION['adm_email'];
}
if (isset($_SESSION['adm_password'])) {
	$s = $_SESSION['adm_password'];
}

include("../php/connection.php");

$cd_pedido = $_GET['pedido'];
$dq = mysql_query("select r_produto_tamanho_estoque.cd_rpe,r_produto_tamanho_estoque.qt_produto as qt,tb_produto_pedido.cd_tamanho,tb_produto_pedido.cd_produto,tb_produto_pedido.qt_produto,tb_produto_pedido.cd_produto from tb_produto_pedido inner join tb_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto inner join tb_tamanho on r_produto_tamanho_estoque.cd_tamanho = tb_tamanho.cd_tamanho where cd_produto_pedido= '".$cd_pedido."' and tb_produto_pedido.cd_tamanho = tb_tamanho.cd_tamanho ");
	if (mysql_num_rows($dq) > '0') {
		while($rows_ped = mysql_fetch_assoc($dq)){
			$d = $rows_ped['qt_produto'];
			//echo "Quantidade: ".$d;
			//echo "<br>";
			$c = $rows_ped['cd_rpe'];
			//echo "Codigo do produto:".$c;
			//echo "<br>";
			$qp = $rows_ped['qt'];
			//echo "Quantidade atual:".$qp;

		$qq = mysql_query("update r_produto_tamanho_estoque set qt_produto = ('".$qp."' - '".$d."') where cd_rpe = '".$c."'");	
		}
	}

	if (!$dq) {
mysql_error();
	echo mysql_error();;
	}
	


$qd = "call sp_update_pedido('$cd_pedido')";
mysql_query($qd);
if (!$qd) {
	echo "Houve um erro ao atualizar<br>";
	mysql_error();

}
else{
header("Location: pedidos_espera.php");
}





 ?>





