<?php 
include("../php/connection.php");

$cd_produto_up = $_POST['produto_up'];

if (isset($_POST['new_name'])) {
	$new_name = $_POST['new_name'];
}

if (isset($_POST['new_preco'])) {
	$new_preco = $_POST['new_preco'];
}

if (isset($_FILES['pro_image']['name'])) {
	$ex = strtolower(substr($_FILES['pro_image']['name'], -4));
					$nn = md5(time()).$ex;
					$dir = "../imagens/produtos/";
					move_uploaded_file($_FILES['pro_image']['tmp_name'], $dir.$nn);
}


if (isset($_POST['plus_estoque_u'])) {
	$plus_estoque_u = $_POST['plus_estoque_u'];
}
if (isset($_POST['plus_estoque_p'])) {
	$plus_estoque_p = $_POST['plus_estoque_p'];
}
if (isset($_POST['plus_estoque_m'])) {
	$plus_estoque_m = $_POST['plus_estoque_m'];
}
if (isset($_POST['plus_estoque_g'])) {
	$plus_estoque_g = $_POST['plus_estoque_g'];
}
if (isset($_POST['plus_estoque_gg'])) {
	$plus_estoque_gg = $_POST['plus_estoque_gg'];
}


if (isset($_POST['minus_estoque_u'])) {
	$minus_estoque_u = $_POST['minus_estoque_u'];
}
if (isset($_POST['minus_estoque_p'])) {
	$minus_estoque_p = $_POST['minus_estoque_p'];
}
if (isset($_POST['minus_estoque_m'])) {
	$minus_estoque_m = $_POST['minus_estoque_m'];
}
if (isset($_POST['minus_estoque_g'])) {
	$minus_estoque_g = $_POST['minus_estoque_g'];
}
if (isset($_POST['minus_estoque_gg'])) {
	$minus_estoque_gg = $_POST['minus_estoque_gg'];
}


if (isset($new_name)) {
	$q = mysql_query("update tb_produtos set nm_produto = '".$new_name."' where cd_produto = '".$cd_produto_up."'");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_preco)) {
	$q = mysql_query("update tb_produtos set vl_produto = '".$new_preco."' where cd_produto = '".$cd_produto_up."'");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($nn)) {
	$q = mysql_query("update tb_produtos set im_produto = '".$nn."' where cd_produto = '".$cd_produto_up."'");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}



$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 1");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];


if (isset($plus_estoque_u)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ('".$plus_estoque_u."' + $qt) where cd_produto = '".$cd_produto_up."' and cd_tamanho = 1");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

}}


$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 2");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($plus_estoque_p)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ('".$plus_estoque_p."' + $qt) where cd_produto = '".$cd_produto_up."' and cd_tamanho = 2");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}


}}

$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 3");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($plus_estoque_m)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ('".$plus_estoque_m."' + $qt) where cd_produto = '".$cd_produto_up."' and cd_tamanho = 3");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}
}}

$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 4");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($plus_estoque_g)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ('".$plus_estoque_g."' + $qt) where cd_produto = '".$cd_produto_up."' and cd_tamanho = 4");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

}}

$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 5");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($plus_estoque_gg)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ('".$plus_estoque_gg."' + $qt) where cd_produto = '".$cd_produto_up."' and cd_tamanho = 5");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

}}

















$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 1");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];


if (isset($minus_estoque_u)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ($qt - '".$minus_estoque_u."') where cd_produto = '".$cd_produto_up."' and cd_tamanho = 1");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

}}


$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 2");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($minus_estoque_p)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ($qt - '".$minus_estoque_p."') where cd_produto = '".$cd_produto_up."' and cd_tamanho = 2");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}


}}

$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 3");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($minus_estoque_m)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ($qt - '".$minus_estoque_m."') where cd_produto = '".$cd_produto_up."' and cd_tamanho = 3");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}
}}

$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 4");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($minus_estoque_g)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ($qt - '".$minus_estoque_g."') where cd_produto = '".$cd_produto_up."' and cd_tamanho = 4");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

}}

$pe = mysql_query("select qt_produto, cd_produto from r_produto_tamanho_estoque where cd_produto = '".$cd_produto_up."' and cd_tamanho = 5");
		if (mysql_num_rows($pe) > '0') {
			while($rows_pro = mysql_fetch_assoc($pe)){
			$id = $rows_pro['cd_produto'];
			$qt = $rows_pro['qt_produto'];

if (isset($minus_estoque_gg)) {
	$q = mysql_query("update r_produto_tamanho_estoque set qt_produto = ($qt - '".$minus_estoque_gg."') where cd_produto = '".$cd_produto_up."' and cd_tamanho = 5");
	if ($q) {
		header("Location: atualizar_produto.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

}}


 ?>