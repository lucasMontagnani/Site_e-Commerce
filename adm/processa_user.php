
<!DOCTYPE html>
<html>
<head>
	<title>Info User</title>
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
					<h3>Dados do usuário requisitado:</h3>

					<?php 
					include("../php/connection.php");

				if (isset($_GET['user'])) {
						$user = $_GET['user'];
					}else{
						$user = $_POST['user'];
					}	


					

					$qu = mysql_query("select * from vw_info_usuario where Usuario = '$user'");

					if (mysql_num_rows($qu) > '0') {
								while($rows_use = mysql_fetch_assoc($qu)){
									$Id = $rows_use['Id'];
									echo "Id: ".$rows_use['Id'];
									echo "<br>";
									echo "Usuario: ".$rows_use['Usuario'];
									echo "<br>";
									echo "Email: ".$rows_use['Email'];
									echo "<br>";
									echo "CPF: ".$rows_use['CPF'];
									echo "<br>";
									echo "CNPJ: ".$rows_use['CNPJ'];
									echo "<br>";
									echo "Inscricao: ".$rows_use['Inscricao'];
									echo "<br>";
									echo "Telefone: ".$rows_use['Telefone'];
									echo "<br>";
									echo "CEP: ".$rows_use['CEP'];
									echo "<br>";
									echo "Estado: ".$rows_use['Estado'];
									echo "<br>";
									echo "Cidade: ".$rows_use['Cidade'];
									echo "<br>";
									echo "Bairro: ".$rows_use['Bairro'];
									echo "<br>";
									echo "Rua: ".$rows_use['Rua'];
									echo "<br>";
									echo "Complemento: ".$rows_use['Complemento'];
									echo "<br>";
									echo "Numero: ".$rows_use['Numero'];
									echo "<br>";
								

					 ?>
					 	<h3>Pedidos em processamento:</h3>
					 	<?php

					 		$qt = mysql_query("select tb_produto_pedido.cd_produto_pedido,tb_pedido.cd_pedido,tb_produto_pedido.cd_produto,tb_produto_pedido.qt_produto,tb_produtos.nm_produto,tb_produtos.vl_produto,tb_produto_pedido.qt_produto * tb_produtos.vl_produto as total,tb_perfil_usuario.nm_usuario,tb_perfil_usuario.cd_usuario,tb_produtos.nm_produto from tb_perfil_usuario inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produto_pedido.cd_produto = tb_produtos.cd_produto where tb_pedido.vr_status = 'true' and tb_perfil_usuario.cd_usuario = '".$Id."' ");
					 		if (mysql_num_rows($qt) > '0') {
								while($rows_men = mysql_fetch_assoc($qt)){
									echo "Pedido: ".$rows_men['cd_pedido'];
									echo "<br>";
									echo "Produto: ".utf8_encode($rows_men['nm_produto']);
									echo "<br>";
								}
							}
					 	 ?>	

					 	<h3>Compras realizadas:</h3>

					 	<?php

					 		$qt = mysql_query("select tb_produto_pedido.cd_produto_pedido,tb_pedido.cd_pedido,tb_produto_pedido.cd_produto,tb_produto_pedido.qt_produto,tb_produtos.nm_produto,tb_produtos.vl_produto,tb_produto_pedido.qt_produto * tb_produtos.vl_produto as total,tb_perfil_usuario.nm_usuario,tb_perfil_usuario.cd_usuario,tb_produtos.nm_produto from tb_perfil_usuario inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produto_pedido.cd_produto = tb_produtos.cd_produto where tb_pedido.vr_status = 'finish' and tb_perfil_usuario.cd_usuario = '".$Id."' ");
					 		if (mysql_num_rows($qt) > '0') {
								while($rows_men = mysql_fetch_assoc($qt)){
									echo "Pedido: ".$rows_men['cd_pedido'];
									echo "<br>";
									echo "Produto: ".utf8_encode($rows_men['nm_produto']);
									echo "<br>";
								}
							}
					 	 ?>	

					 	<h3>Mensagens do Usuário:</h3>
					 	<?php

					 		$qm = mysql_query("select * from tb_mensagem where cd_usuario = '".$Id."'");
					 		if (mysql_num_rows($qm) > '0') {
								while($rows_men = mysql_fetch_assoc($qm)){
									echo "Assunto: ".utf8_encode($rows_men['nm_assunto']);
									echo "<br>";
									echo "Mensagem: ".utf8_encode($rows_men['ds_mensagem']);
									echo "<br>";
									echo "<br>";
								}
							}


								}}
					 	 ?>
<a href="javascript:history.back()">Voltar</a>
 				</div>
			</div>
		</div>	
	</div>
	<script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');
	</script>
</body>
</html>
