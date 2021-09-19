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
	<title>Mensagens</title>
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
					<h2>Mensagens para o ADM</h2>
					<div id="panel">
						<table class="table">
							<tr>
								<td>Usuário</td>
								<td>Assunto</td>
								<td>Ler</td>
								<td>Excluir</td>
							</tr>
								<?php 
									$m = mysql_query("select * from tb_mensagem inner join tb_perfil_usuario on tb_mensagem.cd_usuario = tb_perfil_usuario.cd_usuario");

									if (mysql_num_rows($m) > '0') {
										while($rows_men = mysql_fetch_assoc($m)){
											$assunto = $rows_men['nm_assunto'];
											$user = $rows_men['nm_usuario'];
											$msg = $rows_men['cd_mensagem'];

				
											echo '<tr>
											<td>'.$user.'</td>
											<td>'.$assunto.'</td>'; ?>
											<td><a href="<?php echo "read_mensage.php?msg=$msg"?>">Ler</a></td>
											<td><a href="<?php echo "delete_msg.php?msg=$msg"?>">Excluir</a></td>
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
