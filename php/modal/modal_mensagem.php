<?php 
include("../connection.php");
$m = mysql_query("select * from tb_mensagem inner join tb_perfil_usuario on tb_mensagem.cd_usuario = tb_perfil_usuario.cd_usuario");

if (mysql_num_rows($m) > '0') {
	while($rows_men = mysql_fetch_assoc($m)){
		$assunto = $rows_men['nm_assunto'];
		$user = $rows_men['nm_usuario'];
		$msg = $rows_men['ds_mensagem'];
echo "Assunto:";
	echo $assunto;
echo "<br>";

echo "Mensagem:";
	echo $msg;
}
}
 ?>