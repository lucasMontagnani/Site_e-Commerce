<?php 
session_start();
if (isset($_SESSION['adm_email']) && isset($_SESSION['adm_password'])) {
	$e = $_SESSION['adm_email'];
	$s = $_SESSION['adm_password'];
}else{
	header("Location: login_adm.php");
	}
include("../php/connection.php");

$nm_adm = $_POST['nm_adm'];
$nm_email = $_POST['nm_email'];
$cd_senha = $_POST['cd_senha'];
$nm_privilegio = $_POST['nm_privilegio'];

$insert = mysql_query("INSERT INTO tb_perfil_adm(nm_adm, nm_email, cd_senha, nm_privilegio) VALUES ('$nm_adm','$nm_email','$cd_senha','$nm_privilegio')");

if ($insert) {
	header("Location: perfil_adm.php");
}else{
	mysql_error();
 }
 ?>
