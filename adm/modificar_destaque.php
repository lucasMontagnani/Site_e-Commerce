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
$id = $_POST['produto'];
$loc = $_POST['img'];

echo "loc:".$loc."<br>";
	echo "id:".$id."<br>";
	
if ($loc == 1) {
	/*echo "if1"."<br>";
	echo "loc:".$loc."<br>";
	echo "id:".$id."<br>";*/
	$up = mysql_query("update tb_slider_destaque set cd_produto1 = $id where cd_sd = 1");
	if ($up) {
		header("Location: imgs_site.php");
	}else{
		echo "É mano, deu merda :|";
		mysql_error();
		echo mysql_error();
	}
}
elseif ($loc == 2) {
	/*echo "if2"."<br>";
	echo "loc:".$loc."<br>";
	echo "id:".$id."<br>";*/
	$up = mysql_query("update tb_slider_destaque set cd_produto2 = $id where cd_sd = 1");
	if ($up) {
		header("Location: imgs_site.php");
	}else{
		echo "É mano, deu merda :|";
		mysql_error();
		echo mysql_error();
	}
}
elseif ($loc == 3) {
	/*echo "if3"."<br>";
	echo "loc:".$loc."<br>";
	echo "id:".$id."<br>";*/
	$up = mysql_query("update tb_slider_destaque set cd_produto3 = $id where cd_sd = 1");
		if ($up) {
		header("Location: imgs_site.php");
	}else{
		echo "É mano, deu merda :|";
		mysql_error();
		echo mysql_error();
	}
}
elseif ($loc == 4) {
	/*echo "if4"."<br>";
	echo "loc:".$loc."<br>";
	echo "id:".$id."<br>";*/
	$up = mysql_query("update tb_slider_destaque set cd_produto4 = $id where cd_sd = 1");
		if ($up) {
		header("Location: imgs_site.php");
	}else{
		echo "É mano, deu merda :|";
		mysql_error();
		echo mysql_error();
	}
}
elseif ($loc == 5) {
	/*echo "if5"."<br>";
	echo "loc:".$loc."<br>";
	echo "id:".$id."<br>";*/
	$up = mysql_query("update tb_slider_destaque set cd_produto5 = $id where cd_sd = 1");
		if ($up) {
		header("Location: imgs_site.php");
	}else{
		echo "É mano, deu merda :|";
		mysql_error();
		echo mysql_error();
	}
}
elseif ($loc == 6) {
	/*echo "if6"."<br>";
	echo "loc:".$loc."<br>";
	echo "id:".$id."<br>";*/
	$up = mysql_query("update tb_slider_destaque set cd_produto6 = $id where cd_sd = 1");
		if ($up) {
		header("Location: imgs_site.php");
	}else{
		echo "É mano, deu merda :|";
		mysql_error();
		echo mysql_error();
	}
}

 ?>