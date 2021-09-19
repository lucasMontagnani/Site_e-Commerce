<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');
	</script>
</body>
</html>
<?php 
session_start();
if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}else{
	header("Location: ../php/login.php");
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

include("../php/connection.php");

	$m = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

		if (mysql_num_rows($m) > '0') {
			while($rows_use = mysql_fetch_assoc($m)){
				$user = $rows_use['cd_usuario'];
				
								
					}}


$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem']; 

$m = mysql_query("insert into tb_mensagem(nm_assunto,ds_mensagem,cd_usuario) values('$assunto','$mensagem','$user')");



$s = 1;

if ($m) {
	if ($s == 1) {
		header("Location: javascript:history.back()");
	}
	//javascript:window.history.go(-2)

}else{

	mysql_error();

}



 ?>