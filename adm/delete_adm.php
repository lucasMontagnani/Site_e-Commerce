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
session_start();
if (isset($_SESSION['adm_email']) && isset($_SESSION['adm_password'])) {
	$e = $_SESSION['adm_email'];
	$s = $_SESSION['adm_password'];
}else{
	header("Location: login_adm.php");
	}
include("../php/connection.php");

$cd_adm = $_GET['adm'];

	$query = mysql_query("select * from tb_perfil_adm where nm_adm = '$e' and cd_senha = '$s'");
		if (mysql_num_rows($query) > '0') {
			while($rows_query = mysql_fetch_assoc($query)){
				$cd = $rows_query['cd_adm'];
				if ($cd == $cd_adm) {
					echo "<script>alert('Ação invalida: Não é permitido se deletar')</script>";
					?>
					<script type="text/javascript">
					setTimeout("window.location='perfil_adm.php'",0);
					</script>
					<?php 
				}else{

	
					

$delete = mysql_query("delete from tb_perfil_adm where cd_adm = $cd_adm");

if ($delete) {
	header("Location: perfil_adm.php");
}else{
	mysql_error();
}

				}
		}}	

 ?>