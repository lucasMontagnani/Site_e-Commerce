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
	<title>Perfil ADM</title>
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
					<h2>Perfil ADM</h2>
					<hr>
					<?php 
						$query = mysql_query("select * from tb_perfil_adm where nm_adm = '$e' and cd_senha = '$s'");
						if (mysql_num_rows($query) > '0') {
							while($rows_query = mysql_fetch_assoc($query)){
								$cd = $rows_query['cd_adm'];
								echo "ADM: ".$rows_query['nm_adm']." com o privilegio: ".$rows_query['nm_privilegio'];
						?>
					 <hr>

					 <h3>Adicionar novo adm</h3>
					 <h5>Para efetuar esta ação é necessario que o adm tenha o privilegio do tipo: primario</h5>
					 <form action="insere_adm.php" method="post">
					 	<label>Nome do novo ADM:</label>
					 	<input type="text" name="nm_adm" required>
					 	<br>
					 	<label>Email do novo ADM:</label>
					 	<input type="text" name="nm_email" required>
					 	<br>
					 	<label>Senha do novo ADM:</label>
					 	<input type="password" name="cd_senha" required>
					 	<label>Privilégios do novo ADM:</label>
					 	<select name="nm_privilegio" required>
					 		<option>Privilégio</option>
					 		<option>primario</option>
					 		<option>secundario</option>
					 	</select>
					 	<br><br>
					 	<?php 
					 		if ($rows_query['nm_privilegio'] == 'primario') {
					 			?>
					 			<input type="submit" value="Enviar">
					 			<?php 
					 		}else{
					 			?>
					 			<label onclick="alert('Este adm não é primario para efetuar esta ação');">Enviar</label>
					 			<?php 
					 		}
					 	 ?>
					 	
					 </form>
					 <?php 
					 	}
						}
					 ?>
					 <hr>
					 <h3>Excluir adm</h3>
					 <h5>Para efetuar esta ação é necessario que o adm tenha o privilegio do tipo: primario</h5>
					<table class="table">
						<tr>
							<td>Nome</td>
							<td>e-Mail</td>
							<td>Privilégio</td>
							<td>Excluir</td>
						</tr>
						<tr>
						<?php 
							$query2 = mysql_query("select * from tb_perfil_adm");
							if (mysql_num_rows($query2) > '0') {
								while($rows_query2 = mysql_fetch_assoc($query2)){
									$cd_adm = $rows_query2['cd_adm'];
									echo '<tr>
									<td>'.$rows_query2['nm_adm'].'</td>
									<td>'.$rows_query2['nm_email'].'</td>
									<td>'.$rows_query2['nm_privilegio'].'</td>';
						?>
									<td><a href="<?php echo "delete_adm.php?adm=$cd_adm"?>">Excluir</a></td>
						</tr>
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
