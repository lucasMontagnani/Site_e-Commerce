<!DOCTYPE html>
<html>
	<head>
		<title>Resident Stamp</title>
		<meta charset="utf-8">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- CSS link do Login-->
		<link rel="stylesheet" type="text/css" href="../css/loginnsskct.css">
		<!-- CSS link do Menu Header-->
		<link rel="stylesheet" type="text/css" href="../css/hedasrsursrtcaralhosk.css">
	</head>
	<body>
		<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="container-fluid"><div class="row">
                    <?php 
            include("Page Parts/menu_header.php");
         ?></div></div>
		<div class="box">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
				<div class="login">
					<form method="post" action="processa_login.php">
    					<h2 align="center">Logar</h2>
    					<br>          
     					<label for="usuario">E-Mail: </label><input id="email" type="email" name="user_email" class="usuario">  
						<br>
            			<label for="senha">Senha: </label><input id="se" type="password" name="user_password" class="senha">

            			<input type="submit" name="Enviar" value="enviar"> 
					</form>
				</div>
				<div id="c">
				<h3>Ainda não é um usuário?</h3>
				<span><a href="signup.php">Clique aqui e cadastre-se agora mesmo!</a></span>
				</div>
			</div>
		</div>	
		

		</body>	
</html>