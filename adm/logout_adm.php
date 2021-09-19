<?php 
session_start();
if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

unset($e);
unset($s);

session_destroy();

header('Location: login_adm.php')


 ?>