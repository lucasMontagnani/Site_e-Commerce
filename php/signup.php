<!DOCTYPE html>
<html>
	<head>
		<title>Resident Stamp</title>
		<meta charset="utf-8">
		<!-- CSS link do Index-->
		<link rel="stylesheet" type="text/css" href="../css/signupps.css">
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
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<div class="cadastro">
					<form method="post" action="cadastrando.php">
    					<h2 align="center">Cadastro</h2>
    					<h5 align="center">Por favor, preencha como nos exemplos</h5>
    					<div id="left">
	    					<br>          
	       						<label for="usuario">Nome: </label> 
								<input type="text" name="user_name" class="usuario" required placeholder="Seu Nome">  
							<br>			
	           			       	<label for="user_tel">Telefone:</label> 
								<input type="text" name="user_tel" class="usuario" required  placeholder="formato: xx-xxxx-xxxx" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}"> 
	    					<br>          
	       						<label for="user_street">Rua: </label> 
								<input type="text" name="user_street" class="usuario" required placeholder="Rua (ou Av.) Costa e Silva">  
							<br>
								<label for="user_street">Complemento: </label> 
								<input type="text" name="user_complement" class="usuario" placeholder="333">  
							<br>
	            				<label for="user_num">Número:</label> 
	            				<input type="text" name="user_num" class="usuario" required placeholder="88888888">
	           				<br>
	           			       	<label for="user_cep">CEP: </label> 
								<input type="text" name="user_cep" class="usuario" required placeholder="88888-888" pattern="[0-9]{5}-[0-9]{3}">  
							<br>  
								<div id="estado">
	           					<label for="user_state">Estado:</label><br> 	
								<select name="user_state" required>
									<option value="0">Selecione o estado</option>
									<option value="1">AC</option>
									<option value="2">AL</option>
									<option value="3">AP</option>
									<option value="4">AM</option>
									<option value="5">BA</option>
									<option value="6">CE</option>
									<option value="7">DF</option>
									<option value="8">ES</option>
									<option value="9">GO</option>
									<option value="10">MA</option>
									<option value="11">MT</option>
									<option value="12">MS</option>
									<option value="13">MG</option>
									<option value="14">PA</option>
									<option value="15">PB</option>
									<option value="16">PR</option>
									<option value="17">PE</option>
									<option value="18">PI</option>
									<option value="19">RJ</option>
									<option value="20">RN</option>
									<option value="21">RS</option>
									<option value="22">RO</option>
									<option value="23">RR</option>
									<option value="24">SC</option>
									<option value="25">SP</option>
									<option value="26">SE</option>
									<option value="27">TO</option>
								</select>
								</div>
						</div>  
						<div id="right">   
								<label for="user_bairro">Bairro: </label> 
								<input type="text" name="user_bairro" class="usuario" required placeholder="Guilermina">  
							<br>
	            				<label for="user_city">Cidade:</label> 
	            				<input type="text" name="user_city" class="usuario" required placeholder="Praia Grande">
	           				<br>
	           					<h3 align="center"> Escolha um:</h3>
							<div id="cpf">
							 	<label for="user_cpf">CPF:</label> 
	            				<input type="text" name="user_cpf" class="usuario" placeholder="111.111.111-11" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"> 
	            			</div>
	            			<div id="cnpj">
	            				<label for="user_cnpj">CNPJ:</label> 
	            				<input type="text" name="user_cnpj" class="usuario" placeholder="22.222.222/2222-22" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}"> 
	           				</div>
	           				<div id="inscricao">
	           					<label for="user_subscriber"> Inscrição Estadual: </label>
	           					<input type="text" name="user_subscriber" class="usuario" placeholder="333.333.333.333" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}">
	           				</div>

							<br><br>          
							<br><br>          
							<br><br>          
							<br><br>
							<br>          
   	           			       	<label for="user_email">E-mail: </label> 
								<input type="email" name="user_email" class="usuario" required placeholder="nome@email.com(.br)"> 
							<br>
	            				<label for="user_password">Senha:</label> 
	            				<input type="password" name="user_password" class="senha" required placeholder="Escolha uma senha">
	            			
            				<input type="submit" value="Enviar">
            			</div>
           				
					
					</form>
				</div>
					<div id="s">
					<h3>Já é um usuário?</h3>
					<span><a href="login.php">Clique aqui para logar-se agora mesmo!</a></span>
					</div>
				</div>	
		</div>

		</body>	
</html>