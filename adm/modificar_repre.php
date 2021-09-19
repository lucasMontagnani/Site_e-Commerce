<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<?php 
include("../php/connection.php");

$campo = $_POST['campo'];

$_FILES['im_repre']['name'];
	$ex = strtolower(substr($_FILES['im_repre']['name'], -4));
					$nn = md5(time()).$ex;
					$dir = "../imagens/img_repre/";
					move_uploaded_file($_FILES['im_repre']['tmp_name'], $dir.$nn);
//echo $nn;

$ups = mysql_query("update tb_slider_destaque set $campo = '$nn' where cd_sd = 1");
if ($ups) {
		header("Location: imgs_site.php");
	}else{
		echo "Ocorreu um erro na alteração ";
		mysql_error();
		echo mysql_error();
	}



 ?>