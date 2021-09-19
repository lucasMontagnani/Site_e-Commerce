<!DOCTYPE html>
<html>
<head>
	<title></title>
		<script type="text/javascript">
		function falha_login(){
			setTimeout("window.location='../adm/publicar.php'",0);
		}
	</script>
</head>
<body>

</body>
</html>
<?php 
include("connection.php");
				$titulo = $_POST['titulo'];
				$descricao = $_POST['descricao'];
				$postador = $_POST['postador'];

				date_default_timezone_set('America/Sao_Paulo');
				$data = date("Y-m-d");
				$hora = date("H:i:s");

				if(empty($titulo) || empty($postador)){
					echo "É obrigatório ter um titulo e colocar o nome do postador.";
				}else{

					$uploaddir = '../imagens/uploads/';
				$uploadfile = $uploaddir.basename($_FILES['image']['name']);
				$imagename = $uploaddir.basename($_FILES['image']['name']);
/*
				echo $imagename;
				echo "<br>";
				echo $uploadfile;
				echo "<br>";
				echo $titulo;
				echo "<br>";
				echo $descricao;
				echo "<br>";
				echo $postador;
				echo "<br>";
				echo $data;
				echo "<br>";
				echo $hora;
*/
				if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
					$query = mysql_query("insert into tb_post (nm_titulo, ds_post, im_post, dt_post, hr_post, nm_postador) values ('$titulo', '$descricao', '$imagename', '$data', '$hora', '$postador')");
			

					if($query){
						echo "<script>
						alert('Post publicado com sucesso!');
						</script>";
						echo "<script>falha_login();</script>";

					}

				}else{
					echo "Erro ao enviar a imagem";
					mysql_error();
				}

				}




 ?>