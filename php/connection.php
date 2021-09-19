<?php 
$host = 'localhost';
$user = 'root';
$password = 'usbw';
$database = 'db_resident_stamp';

//Conectand ao banco de dados especificado, caso a conexão morra, exebir comando de erro
$conexao = mysql_connect($host,$user,$password) or die(msql_error());

//Selecionando o banco de dados
mysql_select_db($database);
 ?>