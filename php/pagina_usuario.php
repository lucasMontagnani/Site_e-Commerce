<?php 
session_start();
include("connection.php");


if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}



$query = "select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'";
$result = mysql_query($query);

	
				if (mysql_num_rows($result) > '0') {
										while($rows_use = mysql_fetch_assoc($result)){
											$id = $rows_use['cd_usuario'];

											}
										}
	$query2 = "select * from vw_info_usuario where Id = '$id'";
	$result2 = mysql_query($query2);

	$query3 = mysql_query("select * from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produto_pedido.cd_produto = tb_produtos.cd_produto where cd_usuario = '$id' order by tb_pedido.cd_pedido");

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Usuário</title>
	<meta charset="utf-8">
	<script  type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
	 <?php 
        include("Page Parts/links.php");
     ?>
     <style type="text/css">
		@font-face {
            font-family: edosz;
            src: url('../fontes/edosz.ttf');
        }
        @font-face {
             font-family: TheDolbak-Brush;
             src: url('../fontes/TheDolbak-Brush.ttf');
		}
         #user_area{
             margin-top: 50px;
             font-size: 20px;
             font-family: "TheDolbak-Brush" !important ;
             font-weight: bold !important;
         }

         label{
             font-size: 27px !important;
             font-family: "edosz" !important ;
         }
         label:hover{
             color: orange !important ;
            transition: 0.2s ease-in !important ;
         }

         #user_area a{
             text-decoration: none !important;
             color: orange;
             font-family: "edosz" !important ;
         }
         #user_area a:hover{
            color: black !important ;
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
    	#user_area button {
        	font-family: "edosz" !important ;
        	font-size: 25px !important ; 
            position: relative;
            padding: 10px 20px 10px 20px;
            color: black;
            margin: 0 auto;
            background: orange;
            text-align: center;
            font-style: normal;
            border: 1px solid #ef9c00;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
            border-radius: 3px;
        }
        #user_area button:hover
        {
            background: #ef9c00;
            transition: 0.2s ease-in !important ;
            border-radius: 11px;
        }
        #user_area button a{
        	color: black !important;
			text-decoration: none !important;
        }

        #pedidos img{
        	max-height: 300px;
        	max-width: 270px; 
        }

        #a input[type="text"] {
            font-family: "edosz" !important ;
            font-size: 15px !important ; 
            position: relative;
            width: 290px;
            height: 38px;
            color: black;
            padding-left: 7px;
            border-width: 1px 1px 3px;
            border-radius: 3px;
        }

        #m input[type="text"] {
            font-family: "edosz" !important ;
            font-size: 15px !important ; 
            position: relative;
            width: 290px;
            height: 128px;
            color: black;
      		margin-top: 10px;
            border-width: 1px 1px 3px;
            border-radius: 3px;
            padding-left: 7px;
    		padding-bottom: 95px !important;
        }

        #inputs input[type="submit"]{
        	margin-left: 210px;
        	margin-top: 10px;
        }
     </style>
</head>
<body>
<!-- - To The Top - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<?php 
			include("Page Parts/to_top_n_beyond.php");
		 ?>

	<div class="container-fluid">
		<div class="row">
      	  <?php 
            include("Page Parts/menu_header.php");
          ?>
 	   </div>
	</div>				
	<div id="user_area">
	<div class="container theme-showcase" role="main">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
					<label>Perfil do Usuário</label>
						<?php 
							if (mysql_num_rows($result2) > '0') {
								while($rows_use2 = mysql_fetch_assoc($result2)){
									$user = utf8_encode($rows_use2['Usuario']);
									$mail = utf8_encode($rows_use2['Email']);
									$cpf = $rows_use2['CPF'];
									$cnpj = $rows_use2['CNPJ'];
									$ins = $rows_use2['Inscricao'];
									$tel = $rows_use2['Telefone'];
									$cep = $rows_use2['CEP'];
									$est = utf8_encode($rows_use2['Estado']);
									$city = utf8_encode($rows_use2['Cidade']);
									$bair = utf8_encode($rows_use2['Bairro']);
									$rua = utf8_encode($rows_use2['Rua']);
									$comp = $rows_use2['Complemento'];
									$num = $rows_use2['Numero'];

										echo "<br>";
										echo "Nome do Usuário: ".$user;
										echo "<br>";
										echo "E-mail do Usuário: ".$mail;
										echo "<br>";
										echo "<hr>";
										echo "CPF do Usuário (Caso tenha): ".$cpf;
										echo "<br>";
										echo "CNPJ do Usuário (Caso tenha): ".$cnpj;
										echo "<br>";
										echo "<hr>";
										echo "Inscrição Estadual do Usuário (Caso tenha): ".$ins;
										echo "<br>";
										echo "Telefone do Usuário: ".$tel;
										echo "<br>";
						?>
						
					<br>
					<label>Endereço do Usuário</label>

						<?php 
							echo "<br>";
							echo "CEP do Usuário: ".$cep;
							echo "<br>";
							echo "<hr>";
							echo "Estado do Usuário: ".$est;
							echo "<br>";
							echo "Cidade do Usuário: ".$city;
							echo "<br>";
							echo "<hr>";
							echo "Bairro do Usuário: ".$bair;
							echo "<br>";
							echo "Rua do Usuário: ".$rua;
							echo "<br>";
							echo "<hr>";
							echo "Número do Usuário: ".$num;
							echo "<br>";
							echo "Complemento do Usuário (Caso tenha): ".$comp;
							echo "<br>";
								}
							}
						?>
					<br>
					<button><a href="<?php echo "alterar_usuario.php?user=$id"?>">Alterar</a></button>

				    <!-- <div id="inputs">
				    	<label>Fale conosco</label>
						<form method="post" action="../adm/insere_mensagem.php">
							<div id="a">
				            <input type="text" id="assunto" name="assunto" placeholder="Assunto">
				            </div>
				            <div id="m">
				            <input type="text" name="mensagem" placeholder="Mensagem">
				            </div>
				            <input type="submit" value="ENVIAR" id="btn">
				        </form>
				   	</div>-->
				</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" >

				<div id="pedidos" style="overflow-x:auto;" >
					<table class="table" >
						<tr>
							<td>Imagem</td>
							<td>Pedido</td>
							<td>Código</td>
							<td>Tamanho</td>
							<td>Qtd</td>
							<td>Preço Unitario</td>
							<td>Total</td>
							<td>Status</td>
						</tr>
						<?php 
							if (mysql_num_rows($query3) > '0') {
								while($rows_ped = mysql_fetch_assoc($query3)){	
									if ($rows_ped['cd_tamanho'] == 1) {
											$nt = "Tamanho Unico";
											}	
									elseif ($rows_ped['cd_tamanho'] == 2) {
											$nt = "P";
										}
									elseif ($rows_ped['cd_tamanho'] == 3) {
											$nt = "M";
										}
									elseif ($rows_ped['cd_tamanho'] == 4) {
											$nt = "G";
										}
									elseif ($rows_ped['cd_tamanho'] == 5) {
											$nt = "GG";
										}

									if ($rows_ped['vr_status'] == 'finish') {
											$st = "Enviado";
											}
									elseif ($rows_ped['vr_status'] == 'true') {
											$st = "Ativo";
										}
									elseif ($rows_ped['vr_status'] == 'false') {
											$st = "Inativo";
										}
										
									echo '<tr>
									<td><img src="../imagens/produtos/'.$rows_ped['im_produto'].'"></td>
									<td>'.utf8_encode($rows_ped['nm_produto']).'</td>
									<td>'.$rows_ped['cd_pedido'].'</td>
									<td>'.$nt.'</td>
									<td>'.$rows_ped['qt_produto'].'</td>
									<td>R$ '.$rows_ped['vl_produto'].'</td>
									<td>R$ '.$rows_ped['qt_produto']*$rows_ped['vl_produto'].'</td>'; 
						?>
									<td><a href="<?php echo "#"?>"><?php echo $st; ?></a></td>

									<?php
										echo '</tr>';
										}}
								 	?>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>	
	<?php 
		include("Page Parts/footer.php");
	 ?>
	<script src="js/bootstrap.min.js"></script>				
</body>
</html>