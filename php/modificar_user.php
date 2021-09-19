<?php 
include("../php/connection.php");

$cd_user = $_POST['user_up'];

if (isset($_POST['new_email'])) {
	$new_email = $_POST['new_email'];
}

if (isset($_POST['new_tel'])) {
	$new_tel = $_POST['new_tel'];
}

if (isset($_POST['new_cep'])) {
	$new_cep = $_POST['new_cep'];
}

if (isset($_POST['new_estate'])) {
	$new_estate = $_POST['new_estate'];
}

if (isset($_POST['new_cid'])) {
	$new_cid = $_POST['new_cid'];
}

if (isset($_POST['new_nei'])) {
	$new_nei = $_POST['new_nei'];
}

if (isset($_POST['new_st'])) {
	$new_st = $_POST['new_st'];
}

if (isset($_POST['new_num'])) {
	$new_num = $_POST['new_num'];
}

if (isset($_POST['new_com'])) {
	$new_com = $_POST['new_com'];
}

if (isset($new_email)) {
	$q = mysql_query("update tb_perfil_usuario set nm_email = '".$new_email."' where cd_usuario = '".$cd_user."'");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_tel)) {
	$q = mysql_query("update tb_contato_usuario set cd_telefone = '".$new_tel."' where cd_usuario = '".$cd_user."'");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_cep)) {
	$q = mysql_query("update tb_endereco_usuario set cd_cep = '".$new_cep."' where cd_endereco in (select cd_endereco from tb_perfil_usuario where cd_usuario = '".$cd_user."')");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_estate)) {
	$q = mysql_query("update tb_cidade_usuario set cd_estado = '".$new_estate."' where cd_cidade in (select cd_cidade from tb_bairro_usuario inner join tb_endereco_usuario on tb_bairro_usuario.cd_bairro = tb_endereco_usuario.cd_bairro inner join tb_perfil_usuario on tb_endereco_usuario.cd_endereco = tb_perfil_usuario.cd_endereco where cd_usuario = '".$cd_user."')");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_cid)) {
	$q = mysql_query("update tb_cidade_usuario set nm_cidade = '".$new_cid."' where cd_cidade in (select cd_cidade from tb_bairro_usuario inner join tb_endereco_usuario on tb_bairro_usuario.cd_bairro = tb_endereco_usuario.cd_bairro inner join tb_perfil_usuario on tb_endereco_usuario.cd_endereco = tb_perfil_usuario.cd_endereco where cd_usuario = '".$cd_user."')");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_nei)) {
	$q = mysql_query("update tb_bairro_usuario set nm_bairro = '".$new_nei."' where cd_bairro in (select cd_bairro from tb_endereco_usuario inner join tb_perfil_usuario on tb_endereco_usuario.cd_endereco = tb_perfil_usuario.cd_endereco where cd_usuario = '".$cd_user."')");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_st)) {
	$q = mysql_query("update tb_endereco_usuario set nm_rua = '".$new_st."' where cd_endereco in (select cd_endereco from tb_perfil_usuario where cd_usuario = '".$cd_user."')");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_num)) {
	$q = mysql_query("update tb_endereco_usuario set cd_numero ='".$new_num."' where cd_endereco in (select cd_endereco from tb_perfil_usuario where cd_usuario = '".$cd_user."')");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}

if (isset($new_com)) {
	$q = mysql_query("update tb_endereco_usuario set nm_complemento = '".$new_com."' where cd_endereco in (select cd_endereco from tb_perfil_usuario where cd_usuario = '".$cd_user."')");
	if ($q) {
		header("Location: alterar_usuario.php");
	}else{
		echo "Ocorreu um erro na alteração";
		mysql_error();
		echo mysql_error();
	}
}


 ?>