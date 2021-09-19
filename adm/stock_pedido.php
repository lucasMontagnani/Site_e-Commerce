<?php 
include("../php/connection.php");

$pedido = $_GET['pedido'];

$qd = "update tb_pedido set vr_status = 'finish' where cd_pedido = $pedido";
mysql_query($qd);
if (!$qd) {
	echo "Houve um erro ao atualizar<br>";
	mysql_error();
}else{
header("Location: pedidos_to_adm.php");
}


/*
date_default_timezone_set('America/Sao_Paulo');
				$data = date("d/m/Y");
*/

/*
$read_pedido =  mysql_query("select * from tb_perfil_usuario inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto where tb_pedido.cd_pedido = 2 limit 0,1");

if (mysql_num_rows($read_pedido) > '0') {
				while($rows_pedido = mysql_fetch_assoc($read_pedido)){
					echo "cd_pedido : ".$rows_pedido['cd_pedido'];
					echo "<br>";
					echo "cd_usuario : ".$rows_pedido['cd_usuario'];
					echo "<br>";
					echo "nm_usuario : ".$rows_pedido['nm_usuario'];
					echo "<br>";
					echo "cd_pagamento : ".$rows_pedido['cd_pagamento'];
					echo "<br>";
					echo "cd_retirada : ".$rows_pedido['cd_retirada'];
					echo "<br>";
					echo "data : ".$data;
					echo "<br>";echo "<hr>";
				}}



$read_pn =  mysql_query("select *,tb_produto_pedido.qt_produto as qt,tb_produto_pedido.cd_tamanho as tm from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join r_produto_tamanho_estoque on r_produto_tamanho_estoque.cd_produto = tb_produtos.cd_produto inner join tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho where tb_pedido.cd_pedido = 2 and tb_tamanho.cd_tamanho = tb_produto_pedido.cd_tamanho");
$vtt = 0;
if (mysql_num_rows($read_pn) > '0') {
				while($rows_pn = mysql_fetch_assoc($read_pn)){
					echo "cd_produto : ".$rows_pn['cd_produto'];
					echo "<br>";
					echo "vl_produto : ".$rows_pn['vl_produto'];
					echo "<br>";
					echo "qt : ".$rows_pn['qt'];
					echo "<br>";
					echo "tm : ".$rows_pn['sg_tamanho'];
					echo "<br>";
					$vt = $rows_pn['qt']*$rows_pn['vl_produto'];
					echo "vlt : ".$vt;
					echo "<br>";echo "<br>";
					$vtt = $vt + $vtt;
				}}
*/

 ?>