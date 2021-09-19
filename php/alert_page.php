<?php 
session_start();
include("connection.php");
$query = "select * from tb_produtos";
$result = mysql_query($query);

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
	    <?php 
            include("Page Parts/links.php");
         ?>
		<style type="text/css">
			@font-face {
		        font-family: edosz;
		        src: url('../fontes/edosz.ttf');
		    }
		    img{
		    	max-height: 300px;
		    	max-width: 300px;
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

			#right{
				float: right;
				margin-top: -250px;
				margin-right: 240px;
				/*border: solid;
				border-color: black;
				border-width: 1px;*/
				font-size: 28px;
			}
			#left{
				margin-left: 210px;
				/*border: solid;
				border-color: black;
				border-width: 1px;*/
				font-size: 28px;
			}
			.bt {
		        font-family: "edosz" !important ;
		        font-size: 25px !important ; 
		        padding: 19px 39px 18px 39px;
		        color: black;
		        display: inline;
		        margin: 0 auto;
		        background: orange;
		        font-size: 18px;
		        text-align: center;
		        font-style: normal;
		        width:90%;
		        border: 1px solid #ef9c00;
		        border-width: 1px 1px 3px;
		        margin-bottom: 10px;
		    }
		        
		    .bt:hover{
		       	background: #ef9c00;
		        transition: 0.2s ease-in !important ;
		        border-radius: 10px;
		    }
			.esb {
				margin-left: 50px;
			}
		</style>
	</head>
	<body>	
	<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
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
						<h4 align="center">Seu(s) produto(s) foram adicionados ao carrinho com sucesso!:</h4>
							<?php 
							 $read_car = mysql_query("select tb_produtos.cd_produto, tb_produtos.im_produto,tb_produtos.nm_produto,tb_produtos.vl_produto,tb_carrinho.qt_produto,tb_carrinho.cd_tamanho,tb_carrinho.cd_carrinho from tb_perfil_usuario	inner join tb_carrinho on tb_perfil_usuario.cd_usuario = tb_carrinho.cd_usuario  inner join  tb_produtos on tb_carrinho.cd_produto = tb_produtos.cd_produto where tb_carrinho.cd_usuario =  1  order by tb_carrinho.cd_carrinho desc limit 1");
			                if (mysql_num_rows($read_car) > '0') {
								while($rows_car = mysql_fetch_assoc($read_car)){
									if ($rows_car['cd_tamanho'] == 1) {
										$nt = "Tamanho Unico";
										}	
									elseif ($rows_car['cd_tamanho'] == 2) {
											$nt = "P";
										}
									elseif ($rows_car['cd_tamanho'] == 3) {
											$nt = "M";
										}
									elseif ($rows_car['cd_tamanho'] == 4) {
											$nt = "G";
										}
									elseif ($rows_car['cd_tamanho'] == 5) {
											$nt = "GG";
										}
							?>
						<div id="left">
							<?php 
								echo 'Imagem:'.'<br>'.'<img src="../imagens/produtos/'.$rows_car['im_produto'].'"> ';
								echo "<br>";
							?>
						</div>
						<div id="right">
						<?php 
							echo "Produto: ".utf8_encode($rows_car['nm_produto']);
							echo "<br>";
							echo "Preço: ".$rows_car['vl_produto'];						
							echo "<br>";
							echo "Tamanho: ".$nt;
							echo "<br>";
							echo "Quantidade: ".$rows_car['qt_produto'];
							echo "<br>";
							echo "Valor total: ".$rows_car['vl_produto']*$rows_car['qt_produto'];
						}}

						?>
						</div>
						<h2 align="center">Deseja...</h2>
						<div class="row">
							<div class="esb">
								<div class="col-md-6 col-lg-6 ">
									<a href="exibir_lista.php"><button class="bt">Continuar comprando</button></a>
								</div>
								<div class="col-md-6 col-lg-6">
									<a href="carrinho.php"><button class="bt">Ir para o carrinho</button></a>
								</div>
							</div>
						</div>

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