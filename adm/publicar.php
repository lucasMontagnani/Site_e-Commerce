<?php 
session_start();
if (isset($_SESSION['adm_email']) && isset($_SESSION['adm_password'])) {
	$e = $_SESSION['adm_email'];
	$s = $_SESSION['adm_password'];
}else{
	header("Location: login_adm.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Publicar</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
</head>
<body>
<div class="container-fluid">
		<div class="row">
				<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
				<?php 
					include("../php/Page Parts/menu_header_adm.php");
				?>
		</div>
	</div>	
	<div class="container">
		<div class="row">
			<!-- - LEFT MENU ADM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
			<?php 
				include("../php/Page Parts/left_menu_adm_new.php");
			 ?>
			<div class="col-md-8">
				<div id="workplace">
					<h2>Publicar Posts</h2>
					<hr>
					<div id="panel">
						<form action="../php/processa_post.php" method="POST" enctype="multipart/form-data">
							<p><input type="text" name="titulo" id="titulo" placeholder="Insira um título" required></p>
							<p><input type="text" name="postador" id="postador" placeholder="Nome do postador" required></p>
							<p><textarea name="descricao" id="descricao" placeholder="Diga algo sobre esta publicação." ></textarea></p>
							<p><input type="file" name="image" id="image" required=""></p>
							<p align="left"><input type="submit" value="Publicar"></p>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>
