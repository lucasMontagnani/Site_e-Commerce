<?php 
session_start();
if (isset($_SESSION['adm_email'])) {
	$e = $_SESSION['adm_email'];
}
if (isset($_SESSION['adm_password'])) {
	$s = $_SESSION['adm_password'];
}

$col = $_GET['repre'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Publicar</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>

	<style type="text/css">
		#workplace{
	
			}

		#left{
		
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
					<div id="panel">
						<form action="modificar_repre.php" method="post" enctype="multipart/form-data">
							<input type="file" name="im_repre" id="im_repre"><br>
							<input name='campo' type='hidden' value="<?php echo $col; ?>">
							<input type='submit' value='Atualizar'>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>
