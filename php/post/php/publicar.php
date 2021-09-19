<!DOCTYPE html>
<html>
<head>
	<title>Publicar</title>
	<meta charset="utf-8">
</head>
<body>
	<div>
	<div id="panel">
		<form action="processa_post.php" method="POST" enctype="multipart/form-data">
			<p><input type="text" name="titulo" id="titulo" placeholder="Insira um título"/></p>
			<p><input type="text" name="postador" id="postador" placeholder="Nome do usuário"/></p>
			<p><textarea name="descricao" id="descricao" placeholder="Diga algo sobre esta publicação." ></textarea></p>
			<p><input type="file" name="image" id="image"/></p>
			<p align="left"><input type="submit" value="Publicar"</p>
		</form>
	</div>
</div>
</body>
</html>
