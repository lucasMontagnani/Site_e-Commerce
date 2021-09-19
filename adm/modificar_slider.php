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

$slide = $_POST['slide'];

$_FILES['sl_image']['name'];
	$ex = strtolower(substr($_FILES['sl_image']['name'], -4));
					$nn = md5(time()).$ex;
					$dir = "../imagens/slideshow/";
					move_uploaded_file($_FILES['sl_image']['tmp_name'], $dir.$nn);
//echo $nn;

$ups = mysql_query("update tb_slider_destaque set $slide = '$nn' where cd_sd = 1");
if ($ups) {
		header("Location: imgs_site.php");
	}else{
		echo "Ocorreu um erro na alteração ";
		mysql_error();
		echo mysql_error();
	}



 ?>