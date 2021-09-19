<?php 
session_start();
include("connection.php");


if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}




$result = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

	
				if (mysql_num_rows($result) > '0') {
										while($rows_use = mysql_fetch_assoc($result)){
											$id = $rows_use['cd_usuario'];

											}
										}

	$result2 = mysql_query("select * from vw_info_usuario where Id = '$id'");
		if (mysql_num_rows($result2) > '0') {
										while($rows_use2 = mysql_fetch_assoc($result2)){
											

										

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Usuário</title>
	<meta charset="utf-8">
	 <?php 
        include("Page Parts/links.php");
     ?>
     <link rel="stylesheet" type="text/css" href="../css/contact_me.css">
     <style type="text/css">
		@font-face {
            font-family: edosz;
            src: url('../fontes/edosz.ttf');
        }
		@font-face {
             font-family: TheDolbak-Brush;
             src: url('../fontes/TheDolbak-Brush.ttf');
		}		        

         label{
         	color: black !important;
         	font-family: "TheDolbak-Brush" !important;
            font-size: 27px;
         }
         label:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
         }

         .container {
    width: auto;
}
     	tr {
			font-family: "edosz" !important ;
			font-size: 15px;
			color: black !important;
		}
		td a{
			color: orange;
			text-decoration: none !important;
		}
		td a:hover{
			color: black;
			text-decoration: none !important;
			transition: 0.2s ease-in !important ;
		}
		#edit input[type="submit"],
        #edit input[type="text"] {
            font-family: "edosz" !important ;
            font-size: 15px !important ; 
            position: relative;
            width: 320px;
            height: 38px;
            color: black;
            margin: 0 auto;
            border-width: 1px 1px 3px;
            border-radius: 3px;
        }
        #edit input[type="submit"]{
            margin-top: 10px;
            width: 90px;
            
            margin-bottom: 10px;
            background-color: orange;
            border-color: #ef9c00;
        }
        #edit input[type="submit"]:hover{
            background: #ef9c00;
            transition: 0.2s ease-in !important;
        }
        #edit input[type="submit"]:hover,
        #edit input[type="text"]:hover
        {
            transition: 0.2s ease-in !important ;
            border-radius: 10px;
        }
        #estado{
        	font-family: "edosz" !important ;
        	font-size: 20px !important;
        	color: black !important ;
            text-decoration:none !important ;
        }
        #voltar{
        	font-family: "edosz" !important ;
        	font-size: 25px !important ; 
            position: relative;
            padding: 10px 20px 10px 20px;
            color: black;
            margin: 0 auto;
            background: orange;
            text-align: center;
            text-decoration: none;
            font-style: normal;
            border: 1px solid #ef9c00;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
            border-radius: 3px;
        }
        #voltar:hover{
        	background: #ef9c00;
            transition: 0.2s ease-in !important ;
            border-radius: 11px;
        }
        .col-md-6{
        	margin-bottom: 30px;
        }
     </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
	        <?php 
	            include("Page Parts/menu_header.php");
	         ?>
	    </div>
	</div>
	<div class="container theme-showcase" role="main">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="edit">
					<div class="col-md-6">
					<label>Email</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_email'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">Email Atual: </label><label class="orange">
								<?php 
									echo $rows_use2['Email'];
								 ?>
								 </label>
							</div>
					<div class="col-md-6">		
					<label>Telefone</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_tel'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">Telefone Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['Telefone'];
								 ?>
								 </label>
								 </div>
								<hr>
					<div class="col-md-6">			
					<label>CEP</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_cep'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">CEP Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['CEP'];
								 ?>
								 </label>
								</div>
					<div class="col-md-6">			
					<label>Estado</label><br>
					<div id="estado">
								<form method='post' action='modificar_user.php'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<select name="new_estate" required>
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
									<input type='submit' value='Atualizar'>
									</div>
								</form>
								<label class="current">Estado Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['Estado'];
								 ?>
								 </label>
								 </div>
								<hr>
					<div class="col-md-6">			
					<label>Cidade</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_cid'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">Cidade Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['Cidade'];
								 ?>
								 </label>
								 </div>
					<div class="col-md-6">			 
					<label>Bairro</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_nei'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">Bairro Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['Bairro'];
								 ?>
								 </label>
								</div>
								<hr>
					<div class="col-md-6">			
					<label>Rua</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_st'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">Rua Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['Rua'];
								 ?>
								 </label>
								 </div>
					<div class="col-md-6">			 
					<label>Numero</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_num'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">Numero Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['Numero'];#echo $row_pro['nm_produto'];s
								 ?>
								 </label>
								</div>
								<hr>
					<div class="col-md-6">			
					<label>Complemento</label><br>
								<form method='post' action='modificar_user.php'>
									<input type='text' name='new_com'>
									<input name='user_up' type='hidden' value="<?php echo $rows_use2['Id']; ?>">
									<input type='submit' value='Atualizar'>
								</form>
								<label class="current">Complemento Atual:</label><label class="orange">
								<?php 
									echo $rows_use2['Complemento']
								 ?>
								 </label>
								</div>
								<hr>
								<a id="voltar" href="javascript:history.back()">Voltar</a>
				</div>
			</div>
		</div>
	</div>

	<?php 
		}
										}
			include("Page Parts/footer.php");
	 ?>
	<script src="js/bootstrap.min.js"></script>				
</body>
</html>