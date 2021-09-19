<?php 
include("../php/connection.php");
session_start();
if (isset($_SESSION['adm_email'])) {
	$e = $_SESSION['adm_email'];
}
if (isset($_SESSION['adm_password'])) {
	$s = $_SESSION['adm_password'];
}
$pict = $_GET['pict'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Info User</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
	<style type="text/css">
		table img{
			height: 100px;
			width: 100px;
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
					<h3>Selecione um novo produto para o destaque:</h3>
					<form action="modificar_destaque.php" method="post">
						<label>Insira um novo produto:</label><input type="text" name="produto">
						<input type="hidden" name="img" value="<?php echo $pict; ?>">
						<input type="submit" value="Selecionar">
					</form>
					<br>
					<table class="table">
							<tr>
								<td>Imagem</td>
								<td>Id</td>
								<td>Nome do produto</td>
								<td>Info</td>

							</tr>
					<?php 
		  						$pd = mysql_query("select cd_produto, im_produto,nm_produto from tb_produtos order by cd_produto");
		  							if (mysql_num_rows($pd) > '0') {
										while($rows_pd = mysql_fetch_assoc($pd)){
											$id = $rows_pd['cd_produto'];
											echo '<tr>'?>
											<td><img src="../imagens/produtos/<?php echo $rows_pd['im_produto']; ?>" id="pd"></td>
											<?php 	
											echo '<td>'.$rows_pd['cd_produto'].'</td>
											<td>'.$rows_pd['nm_produto'].'</td>';
											?>

											<td><a href="<?php echo "info_produto.php?produto=$id"?>">Info</a></td>
											<?php 

										}}
		  							
		  			?>
		  				
		  			</table>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>
