<?php 
include("../php/connection.php");
session_start();
if (isset($_SESSION['adm_email']) && isset($_SESSION['adm_password'])) {
	$e = $_SESSION['adm_email'];
	$s = $_SESSION['adm_password'];
}else{
	header("Location: login_adm.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar Produto</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
<style type="text/css">



</style>
</head>
<body>
	<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
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

			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div id="workplace">
					<h2>Atualizar / Visualizar / Excluir Produto</h2>
					<div id="ll">
						<table class="table">
							<tr>
								<td>Nome do produto</td>
								<td>Atualizar</td>
								<td>Info</td>
								<td>Excluir</td>

							</tr>
							<?php 
								$qu = mysql_query("select cd_produto, nm_produto from tb_produtos order by nm_produto");
								if (mysql_num_rows($qu) > '0') {
									while($rows_pro = mysql_fetch_assoc($qu)){
									$id = $rows_pro['cd_produto'];
									echo '<tr>

									<td>'.utf8_encode($rows_pro['nm_produto']).'</td>'; ?>
									<td><a href="<?php echo "update_product.php?produto_adm=$id"?>">Atualizar</a></td>
									<td><a href="<?php echo "info_produto.php?produto=$id"?>">Info</a></td>
									<td><a href="<?php echo "delete_produto.php?produto=$id"?>">Excluir</a></td>
							<?php
									echo '<tr>';
									}
								}
						 	?>
						</table>
					</div>
					
				</div>				
			</div>
		</div>
	</div>
</body>
</html>