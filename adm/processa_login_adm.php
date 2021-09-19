<?php 
include("../php/connection.php");
 ?>

<html !DOCTYPE>
<head>
	<title></title>
	<script type="text/javascript">
		function falha_login(){
			setTimeout("window.location='login_adm.php'",0);
		}
	</script>
</head>
<body>

</body>
</html>

<?php 
$user_email = $_POST['user_email']; 
$user_password = $_POST['user_password']; 

$ver = "select * from tb_perfil_adm where nm_adm = '$user_email' and cd_senha = '$user_password'";

$sql = mysql_query($ver);

$row = mysql_num_rows($sql);

if ($row > 0) {
	session_start();
	$_SESSION['adm_email'] = $_POST['user_email']; 
	$_SESSION['adm_password'] = $_POST['user_password']; 
	echo "Você foi logado com sucesso! Aguarde um instante.";
	header('Location: pedidos_espera.php');
}
else{
	echo mysql_error();
	mysql_error();
	echo "<script>alert('Falha no Log In. Verifique Usuária ou Senha de usuario!');</script>";
	echo "<script>falha_login();</script>";
	
}







 ?> 
 ->