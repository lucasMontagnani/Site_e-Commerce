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
	<title>Informaçoes do Usuário</title>
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
					<h2>Informações sobre os Usuários</h2>
					<hr>
					<h3>Selecione um usuário por nome:</h3>
					<form action="processa_user.php" method="post">
						<input type="text" name="user">
						<input type="submit" value="BUSCAR">
					</form>
					<br>
					<table class="table">
					<tr>
						<td>Nome</td>
						<td>Email</td>
						<td>Buscar</td>
					</tr>
					<?php 
					$read_use =  mysql_query("select * from tb_perfil_usuario");
					//"select * from tb_perfil_usuario where nm_usuario like '$l%'"

						if (mysql_num_rows($read_use) > '0') {
				while($rows_read_use = mysql_fetch_assoc($read_use)){
						$cd_user = $rows_read_use['nm_usuario'];
						echo '<tr>
						<td>'.utf8_encode($rows_read_use['nm_usuario']).'</td>
						<td>'.utf8_encode($rows_read_use['nm_email']).'</td>'; ?>

					<td><a href="<?php echo "processa_user.php?user=$cd_user"?>">Buscar</a></td>
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
</body>
</html>
