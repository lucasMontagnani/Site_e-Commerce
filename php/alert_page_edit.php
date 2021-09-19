<?php 
session_start();
include("connection.php");


if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

$carrinho = $_SESSION['cd'];
$query = mysql_query("select * from tb_carrinho where cd_carrinho = '".$carrinho."'")

?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<meta charset="utf-8">
	<!-- Link Bootstrap-->
	    <?php 
            include("Page Parts/links.php");
         ?>
<style type="text/css">
	@font-face {
        font-family: edosz;
        src: url('../fontes/edosz.ttf');
    }
	#alert_space{
		margin-top: 20px;
		height: auto;
		border:solid;
		border-color: orange;
		border-radius: 15px;
		font-family: "edosz" !important ;
		font-size: 40px;
		color: black !important;	
	}
	#alert_space a{
		text-decoration: none !important;
		color: orange !important;
	}
	#alert_space a:hover{
		color: black !important;
		transition: 0.2s ease-in !important ;
	}
	h2{
		font-size: 40px !important;
	}
	h4{
		font-size: 25px !important;
	}
</style>
</head>
<body>
		

<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
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
					<div id="alert_space">
						<h2 align="center">Aviso</h2>
							<h4 align="center">Seu pedido foi atualizado com sucesso!:</h4>
							<?php 
							if (mysql_num_rows($query) > '0') {
					while($rows_query = mysql_fetch_assoc($query)){	
					if ($rows_query['cd_tamanho'] == 1) {
							$nt = "Tamanho Unico";
							}	
					elseif ($rows_query['cd_tamanho'] == 2) {
							$nt = "P";
						}
					elseif ($rows_query['cd_tamanho'] == 3) {
							$nt = "M";
						}
					elseif ($rows_query['cd_tamanho'] == 4) {
							$nt = "G";
						}
					elseif ($rows_query['cd_tamanho'] == 5) {
							$nt = "GG";
						}	
					echo "Quantidade atual: ".$rows_query['qt_produto'];
					echo "<br>";	
					echo "Tamanho atual: ".$nt;	
					}}
							

							 ?>

<a href="carrinho.php"><h2>Ir para o carrinho</h2></a><a href="javascript:history.back()"><h2>Voltar</h2></a>


					</div>
				</div>
			</div>
		</div>
		<br><br>
		<?php 
			include("Page Parts/footer.php");
		 ?>

		<script src="js/bootstrap.min.js"></script>
</body>
</html>