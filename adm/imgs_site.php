<?php 
session_start();
if (isset($_SESSION['adm_email']) && isset($_SESSION['adm_password'])) {
	$e = $_SESSION['adm_email'];
	$s = $_SESSION['adm_password'];
}else{
	header("Location: login_adm.php");
	}
include("../php/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Imagens do Site</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
	<style type="text/css">
		#destaque{
			height: 200px;
			width: 200px;
		}
	</style>
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
					<h2>Imagens do Slider</h2>
					<h4>Imagens Atuais:</h4>
					<table class="table">
						<tr>
							<td>Imagem 1</td>
							<td>Imagem 2</td>
							<td>Imagem 3</td>						
						</tr>
						<tr>
							 <?php 
		  						$slider = mysql_query("select im_slider1 from tb_slider_destaque where cd_sd = 1");
		  							if (mysql_num_rows($slider) > '0') {
										while($rows_slider = mysql_fetch_assoc($slider)){
		  					 ?>
								<td><img src='../imagens/slideshow/<?php echo $rows_slider['im_slider1']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
							 <?php 
		  						$slider = mysql_query("select im_slider2 from tb_slider_destaque where cd_sd = 1");
		  							if (mysql_num_rows($slider) > '0') {
										while($rows_slider = mysql_fetch_assoc($slider)){
		  					 ?>
								<td><img src='../imagens/slideshow/<?php echo $rows_slider['im_slider2']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
							  <?php 
		  						$slider = mysql_query("select im_slider3 from tb_slider_destaque where cd_sd = 1");
		  							if (mysql_num_rows($slider) > '0') {
										while($rows_slider = mysql_fetch_assoc($slider)){
		  					 ?>
								<td><img src='../imagens/slideshow/<?php echo $rows_slider['im_slider3']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
						</tr>
						<tr>
							<td><a href="<?php echo "update_slider.php?slide=im_slider1"?>">Alterar</a></td>
							<td><a href="<?php echo "update_slider.php?slide=im_slider2"?>">Alterar</a></td>
							<td><a href="<?php echo "update_slider.php?slide=im_slider3"?>">Alterar</a></td>
						</tr>
					</table>

					<h2>Produtos em Destaque</h2>
					<h4>Produtos Atuais:</h4>
					<table class="table">
						<tr>
							<td>Imagem 1</td>
							<td>Imagem 2</td>
							<td>Imagem 3</td>					
						</tr>
						<tr>
							<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto1 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
							?>
								<td><img src='../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
						
							<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto2 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
							?>
								<td><img src='../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>

							 <?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto3 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
							?>
								<td><img src='../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
						</tr>
						<tr>
						<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto1 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
						?>
							<td><a href="<?php echo "update_destaque.php?pict=1"?>">Alterar</a></td>		
						<?php 
							}}
						?>
						<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto2 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
						?>
							<td><a href="<?php echo "update_destaque.php?pict=2"?>">Alterar</a></td>
						<?php 
							}}
						?>
						<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto3 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
						?>
							<td><a href="<?php echo "update_destaque.php?pict=3"?>">Alterar</a></td>
						<?php 
							}}
						?>
						</tr>
						<tr>
							<td>Imagem 4</td>
							<td>Imagem 5</td>
							<td>Imagem 6</td>					
						</tr>
						<tr>
							<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto4 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
							?>
								<td><img src='../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
						
							<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto5 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
							?>
								<td><img src='../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>

							 <?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto6 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
							?>
								<td><img src='../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
						</tr>
						<tr>
						<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto4 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
						?>
							<td><a href="<?php echo "update_destaque.php?pict=4"?>">Alterar</a></td>		
						<?php 
							}}
						?>
						<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto5 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
						?>
							<td><a href="<?php echo "update_destaque.php?pict=5"?>">Alterar</a></td>
						<?php 
							}}
						?>
						<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto6 from tb_slider_destaque)");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
						?>
							<td><a href="<?php echo "update_destaque.php?pict=6"?>">Alterar</a></td>
						<?php 
							}}
						?>
						</tr>

					</table>
					<h2>Imagens Representativas dos Produtos</h2>
					<h4>Imagens Atuais:</h4>
					<table class="table">
						<tr>
							<td>Imagem 1</td>
							<td>Imagem 2</td>
							<td>Imagem 3</td>					
						</tr>
						<tr>
						<td>
							<?php 
		  						$repre = mysql_query("select im_repre1 from tb_slider_destaque where cd_sd = 1");
		  							if (mysql_num_rows($repre) > '0') {
										while($rows_repre = mysql_fetch_assoc($repre)){
		   					?>
							  <img src="../imagens/img_repre/<?php echo $rows_repre['im_repre1']; ?>"  id="destaque">
							  <?php 
		  							}}
		  					 ?>
						</td>
						<td>
							<?php 
		  						$repre = mysql_query("select im_repre2 from tb_slider_destaque where cd_sd = 1");
		  							if (mysql_num_rows($repre) > '0') {
										while($rows_repre = mysql_fetch_assoc($repre)){
		   					?>
							  <img src="../imagens/img_repre/<?php echo $rows_repre['im_repre2']; ?>"  id="destaque">
							  <?php 
		  							}}
		  					 ?>
						</td>
						<td>
							<?php 
		  						$repre = mysql_query("select im_repre3 from tb_slider_destaque where cd_sd = 1");
		  							if (mysql_num_rows($repre) > '0') {
										while($rows_repre = mysql_fetch_assoc($repre)){
		   					?>
							  <img src="../imagens/img_repre/<?php echo $rows_repre['im_repre3']; ?>"  id="destaque">
							  <?php 
		  							}}
		  					 ?>
						</td>
						</tr>
						<tr>
							<td><a href="<?php echo "update_repre.php?repre=im_repre1"?>">Alterar</a></td>
							<td><a href="<?php echo "update_repre.php?repre=im_repre2"?>">Alterar</a></td>
							<td><a href="<?php echo "update_repre.php?repre=im_repre3"?>">Alterar</a></td>
						</tr>
						

					</table>
					<h2>Imagens da Galeria</h2>
					<h4>Imagens Atuais:</h4>
					<table class="table">
						<tr>
							<td>Imagem 1</td>
							<td>Imagem 2</td>
							<td>Imagem 3</td>					
						</tr>
						<tr>
							<td>
							<?php 
		  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 1;");
		  							if (mysql_num_rows($ga) > '0') {
										while($rows_ga = mysql_fetch_assoc($ga)){
		   					?>
							  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
							  <?php 
		  							}}
		  					 ?>
							</td>
							<td>
							<?php 
		  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 2;");
		  							if (mysql_num_rows($ga) > '0') {
										while($rows_ga = mysql_fetch_assoc($ga)){
		   					?>
							  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
							  <?php 
		  							}}
		  					 ?>
							</td>
							<td>
							<?php 
		  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 3;");
		  							if (mysql_num_rows($ga) > '0') {
										while($rows_ga = mysql_fetch_assoc($ga)){
		   					?>
							  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
							  <?php 
		  							}}
		  					 ?>
							</td>
							</tr>
							<tr>
								<td><a href="<?php echo "update_galeria.php?galeria=1"?>">Alterar</a></td>
								<td><a href="<?php echo "update_galeria.php?galeria=2"?>">Alterar</a></td>
								<td><a href="<?php echo "update_galeria.php?galeria=3"?>">Alterar</a></td>
							</tr>
							<tr>
								<td>Imagem 4</td>
								<td>Imagem 5</td>
								<td>Imagem 6</td>					
							</tr>
							<tr>
								<td>
								<?php 
			  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 4;");
			  							if (mysql_num_rows($ga) > '0') {
											while($rows_ga = mysql_fetch_assoc($ga)){
			   					?>
								  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
								  <?php 
			  							}}
			  					 ?>
								</td>
								<td>
								<?php 
			  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 5;");
			  							if (mysql_num_rows($ga) > '0') {
											while($rows_ga = mysql_fetch_assoc($ga)){
			   					?>
								  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
								  <?php 
			  							}}
			  					 ?>
								</td>
								<td>
								<?php 
			  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 6;");
			  							if (mysql_num_rows($ga) > '0') {
											while($rows_ga = mysql_fetch_assoc($ga)){
			   					?>
								  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
								  <?php 
			  							}}
			  					 ?>
								</td>
								</tr>
								<tr>
									<td><a href="<?php echo "update_galeria.php?galeria=4"?>">Alterar</a></td>
									<td><a href="<?php echo "update_galeria.php?galeria=5"?>">Alterar</a></td>
									<td><a href="<?php echo "update_galeria.php?galeria=6"?>">Alterar</a></td>
								</tr>
								<tr>
								<td>Imagem 7</td>
								<td>Imagem 8</td>
								<td>Imagem 9</td>					
							</tr>
							<tr>
								<td>
								<?php 
			  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 7;");
			  							if (mysql_num_rows($ga) > '0') {
											while($rows_ga = mysql_fetch_assoc($ga)){
			   					?>
								  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
								  <?php 
			  							}}
			  					 ?>
								</td>
								<td>
								<?php 
			  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 8;");
			  							if (mysql_num_rows($ga) > '0') {
											while($rows_ga = mysql_fetch_assoc($ga)){
			   					?>
								  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
								  <?php 
			  							}}
			  					 ?>
								</td>
								<td>
								<?php 
			  						$ga = mysql_query("select * from tb_galeria where cd_galeria = 9;");
			  							if (mysql_num_rows($ga) > '0') {
											while($rows_ga = mysql_fetch_assoc($ga)){
			   					?>
								  <img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>"  id="destaque">
								  <?php 
			  							}}
			  					 ?>
								</td>
								</tr>
								<tr>
									<td><a href="<?php echo "update_galeria.php?galeria=7"?>">Alterar</a></td>
									<td><a href="<?php echo "update_galeria.php?galeria=8"?>">Alterar</a></td>
									<td><a href="<?php echo "update_galeria.php?galeria=9"?>">Alterar</a></td>
								</tr>
					</table>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>


<?php 
/*

<tr>
							<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto from tb_slider_destaque ) limit 3,6;");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
							?>
								<td><img src='../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>' id="destaque"></td>
							<?php 
								}}
							 ?>
						</tr>
						<tr>
						<?php 
							$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto from tb_slider_destaque ) limit 3,6;");
								if (mysql_num_rows($pi) > '0') {
									while($rows_pi = mysql_fetch_assoc($pi)){
										$cd_pict = $rows_pi['cd_produto'];
						?>
							<td><a href="<?php echo "update_destaque.php?pict=$cd_pict"?>">Alterar</a></td>		
						<?php 
							}}
						?>
						</tr>

*/



 ?>
