<?php 
session_start();
if (isset($_SESSION['adm_email'])) {
	$e = $_SESSION['adm_email'];
}
if (isset($_SESSION['adm_password'])) {
	$s = $_SESSION['adm_password'];
}
$slide = $_GET['slide'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar Slider</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
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
					<h3>Selecione uma nova imagem para o slider: <?php echo $slide; ?></h3>
					<form method='post' action='modificar_slider.php' enctype="multipart/form-data">
							<input type="file" name="sl_image" id="sl_image"><br>
							<input name='slide' type='hidden' value="<?php echo $slide; ?>">
							<input type='submit' value='Atualizar'>
					</form>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>
