<?php 
session_start();
include("connection.php");

$var = $_POST['search'];
$query = "select * from tb_produtos where nm_produto like '%$var%'";


if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script  type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
	<!-- Link Bootstrap-->
	    <?php 
            include("Page Parts/links.php");
         ?>

	<style type="text/css">
		

		#main_img{
			height: 250px;
		}
		.thumbnail{
			overflow: hidden;
		}
		.thumbnail:hover{
			border-radius: 15%;
        	transition: 0.3s ease-in !important ;
        	box-shadow: 1px 1px #ff6600,
                2px 2px #ff6600,
                3px 3px #ff6600;
        -webkit-transform: translateX(-3px);
        transform: translateX(-3px);			
		}

		.thumbnail img {
    		max-width: 100%;
    		-moz-transition: all 0.3s;
    		-webkit-transition: all 0.3s;
    		transition: all 0.3s;
    		opacity: 0.5;
    		filter: alpha(opacity=50);
		}

		.thumbnail:hover img {
    		-moz-transform: scale(1.2);
    		-webkit-transform: scale(1.2);
    		transform: scale(1.2);
    		opacity: 1.0;
    		filter: alpha(opacity=100);
		}
		@font-face {
            font-family: edosz;
            src: url('../fontes/edosz.ttf');
		}
		@font-face {
             font-family: TheDolbak-Brush;
             src: url('../fontes/TheDolbak-Brush.ttf');
		}		
        .page-header {
            font-family: "edosz" !important ; 
        }
        .page-header h1 a{
            color: black !important ;
            text-decoration:none !important ;
        }
        .page-header h1 a:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }


  		.caption {
  			color: orange !important ;
        	text-decoration: none !important ;
        	font-size: 25px !important ;
        	margin-top: 10px !important;
        }
        .caption:hover{
        	color: black !important ;
        	transition: 0.5s ease-in !important ;
        }

        #pb{
        	font-family: "edosz" !important ;
        	color: black !important ;
        	text-decoration: none !important ;
        	font-size: 25px !important ;
        }
        #pb:hover{
        	color: orange !important ;
        	transition: 0.2s ease-in !important ;        	
        }
        #po{
        	font-family: "TheDolbak-Brush" !important ;
        }

        #po:hover{
        	color: orange !important ;
        	transition: 0.2s ease-in !important ;        	
        }

	</style>
</head>
<body>
		

<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="container-fluid"><div class="row">
                    <?php 
            include("Page Parts/menu_header.php");
         ?></div></div>
			
		<div class="container theme-showcase" role="main">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<?php 


				$read_produto = mysql_query("select * from tb_produtos inner join tb_especificacao on tb_produtos.cd_produto = tb_especificacao.cd_produto where nm_produto like '%$var%' or nm_keyword1 like '%$var%' or nm_keyword2 like '%$var%' or nm_keyword3 like '%$var%' or nm_keyword4 like '%$var%' or ds_produto like '%$var%'");
				
			?>

			<div class="page-header">
				<?php 
				if (isset($fc)) {				
					if (mysql_num_rows($fc) > '0') {
						while($rows_c = mysql_fetch_assoc($fc)){
							$c = utf8_encode($rows_c['nm_sub_categoria']);
							$nc = utf8_encode($rows_c['cd_sub_categoria']);
							echo "<h1><a href='exibir_lista.php'>Produtos</a> / <a href='exibir_lista.php?sub_cat=$nc'>$c</a>"; 
						}
					}
				}elseif (isset($fc2)) {
						if (mysql_num_rows($fc2) > '0') {
						while($rows_c = mysql_fetch_assoc($fc2)){
							$c = utf8_encode($rows_c['nm_categoria']);
							$nc = utf8_encode($rows_c['cd_categoria']);
							echo "<h1><a href='exibir_lista.php'>Produtos</a> / <a href='exibir_lista.php?cat=$nc'>$c</a>"; 
						}
					}
				}
				else{
						echo "<h1><a href='exibir_lista.php'>Produtos</a>"; 
						echo "<h2>Resultados para: $var</h2>";
					}

				?>
			</div>
			<?php 

				if (mysql_num_rows($read_produto) > '0') {
					while($rows_produtos = mysql_fetch_assoc($read_produto)){
									
									
				 ?>

	<!--<?php /*while($rows_produtos = mysql_fetch_assoc($result)){ */?>-->
				<a href="produto.php?id=<?php echo $rows_produtos['cd_produto']; ?>">
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="thumbnail">
							<br>
							<img src="../imagens/produtos/<?php echo $rows_produtos['im_produto']; ?>" alt="..." height="300" width="300" id="main_img" class="img-responsive">
							<div class="caption text-center">
								<?php 
								$produtos = utf8_encode($rows_produtos['nm_produto']);
								 ?>
							<div id="pb"><?php echo $produtos; ?></div>
							<div id="po"><?php echo "R$ ".$rows_produtos['vl_produto']; ?></div>
							</div>
						</div>
					</div>
				</a>
<?php }}elseif (mysql_num_rows($read_produto) == '0') {
	echo "<h2>Nenhum resultado encontrado para: $var</h2>";
	echo "<h2>Favor verificar se o item procurado está escrito corretamente</h2>";
} ?>
				<!--<?php /* }*/ ?>-->
			
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