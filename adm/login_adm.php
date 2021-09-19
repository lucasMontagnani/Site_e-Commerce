<!DOCTYPE html>
<html>
	<head>
		<title>Resident Stamp</title>
		<meta charset="utf-8">
		
		<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
      <link rel="stylesheet" type="text/css" href="../css/login.css">
	</head>
	<body>
		<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="container-fluid"><div class="row">
                    <?php 
            include("../php/Page Parts/menu_header.php");
         ?></div></div>
		<div class="box">
			
				<div class="login">
					<form method="post" action="processa_login_adm.php">
    					<h2 align="center">Login ADM</h2>
    					<br>          
     					<label for="usuario">Usuario: </label><input id="email" type="text" name="user_email" class="usuario">  
						<br>
            			<label for="senha">Senha: </label><input id="se" type="password" name="user_password" class="senha">
           				<br>
            			<input type="submit" name="Enviar" value="enviar"> 
					</form>
				</div>
			</div>
		

		</body>	
</html>