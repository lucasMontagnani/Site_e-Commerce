<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function falha_cadastro(){
			setTimeout("window.location='signup.php'",0);
		}
	</script>
</head>
<body>

</body>
</html>
<?php 
include("connection.php");
// INSERINDO O USUARIO-----------------------------------------------------
$user_name = $_POST['user_name']; 
$user_cpf = $_POST['user_cpf']; 
$user_cnpj = $_POST['user_cnpj']; 
$user_subscriber = $_POST['user_subscriber']; 
$user_tel = $_POST['user_tel']; 
$user_street = $_POST['user_street'];  
$user_num = $_POST['user_num']; 
$user_cep = $_POST['user_cep']; 
$user_complement = $_POST['user_complement']; 
$user_bairro = $_POST['user_bairro']; 
$user_city = $_POST['user_city']; 
$user_state = $_POST['user_state']; 
$user_email = $_POST['user_email']; 
$user_password = $_POST['user_password']; 


if (!isset($user_complement)) {
	$user_complement = null;
}

if (!isset($user_cpf)) {
	$user_cpf = null;
}

if (!isset($user_cnpj)) {
	$user_cnpj = null;
}

if (!isset($user_subscriber)) {
	$user_subscriber = null;
}

if (($user_cpf == null && $user_cnpj == null) || ($user_cpf != null && $user_cnpj != null) || ($user_subscriber == null && $user_cnpj != null) || ($user_subscriber != null && $user_cnpj == null)) {
	echo "<script>alert('Falha no Cadastro. Por favor cadastre um CPF ou um CNPJ (o CNPJ deve ser cadastrado junto da inscrição estadual)');</script>";
	echo "<script>falha_cadastro();</script>";
}
else{
	
	$query_insert = "call sp_insere_usuario(/*tb_perfil_usuario*/ '$user_name', '$user_email', '$user_password',/*tb_contato_usuario*/'$user_tel', /*tb_endereco_usuario*/'$user_num', '$user_street', '$user_cep','$user_complement',/*tb_bairro_usuario*/'$user_bairro',/*tb_cidade_usuario*/'$user_city ', '$user_state',/*tb_pessoa_fisica*/ '$user_cpf', /*tb_pessoa_fisica*/ '$user_cnpj','$user_subscriber')";

	$query = mysql_query($query_insert);

	if (!$query) {
		echo "Houve um erro ao inserir<br>";
		mysql_error();
		echo mysql_error();
	}else{
		echo "<script>alert('Cadastro efetuado com sucesso!');</script>";
		header('Location: login.php');
		}
}

 ?>