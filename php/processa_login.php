<?php 
include("connection.php");
 ?>

<html !DOCTYPE>
<head>
	<title></title>
	<script type="text/javascript">
		function falha_login(){
			setTimeout("window.location='login.php'",0);
		}
	</script>
</head>
<body>

</body>
</html>

<?php 
$user_email = $_POST['user_email']; 
$user_password = $_POST['user_password']; 

$ver = "select * from tb_perfil_usuario where nm_email = '$user_email' and cd_senha = '$user_password'";

$sql = mysql_query($ver);

$row = mysql_num_rows($sql);

if ($row > 0) {
	session_start();
	$_SESSION['user_email'] = $_POST['user_email']; 
	$_SESSION['user_password'] = $_POST['user_password']; 
	echo "Você foi logado com sucesso! Aguarde um instante.";
	header('Location: exibir_lista.php');
}
else{
	echo mysql_error();
	mysql_error();
	echo "<script>alert('Falha no Log In. Verifique E-mail ou Senha de usuario!');</script>";
	echo "<script>falha_login();</script>";
	
}







 ?>