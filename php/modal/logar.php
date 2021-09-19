<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#c, label, h2{
            font-family: "edosz" !important ; 
        }
         #c, label, h2{
            color: orange !important ;
            text-decoration:none !important ;
        }
        #c{
        	text-decoration: none;
        	margin-right: 170px;
        }

        #c a{
        	color: white;
        }
    </style>
</head>
<body>

</body>
</html>
<div id="modalog">
<form method="post" action="processa_login.php">
    					<h2 align="center">Logar</h2>
    					<br>          
     					<label for="usuario">E-Mail: </label><input id="email" type="email" name="user_email" class="usuario">  
						<br>
            			<label for="senha">Senha: </label><input id="se" type="password" name="user_password" class="senha">
           				<br>
            			<input type="submit" name="Enviar" value="enviar"> 
</form>
<div id="c">
				<h3>Ainda não é um usuário?</h3>
				<span><a href="signup.php">Clique aqui e cadastre-se agora mesmo!</a></span>
				</div>
</div>