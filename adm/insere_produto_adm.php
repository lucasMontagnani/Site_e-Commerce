<?php 
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
	<title>Adicionar Produto</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>

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
					<h2>Novo Produto</h2>
					<hr>
					<form method="post" action="insere_produto.php" enctype="multipart/form-data">
						<label>Nome do produto: </label><input type="text" name="pro_name" required placeholder="Nome do produto"><br>
						<hr>
						<label>Valor: </label><input type="text" name="pro_value" required placeholder="27.00 (Use o ponto)"><br>
						<hr>
						<label>Descrição: </label><textarea name="pro_descricao" rows="5" cols="50" placeholder="De uma pequena descrição sobre o produto, como: o material de que é feito, sobre sua estampa, tamanho, etc..."></textarea><br>
						<hr>
						<label>Imagem do Produto: </label><input type="file" name="pro_image" id="image" required><br>
						<hr>
						<label>Cor: </label><select name="pro_color" required>
												<option value=""> -------</option>
												<option value="1">Preto</option>
												<option value="2">Branco</option>
												<option value="3">Verde</option>
												<option value="4">Vermelho</option>
												<option value="5">Azul</option>
												<option value="6">Amarelo</option>
												<option value="7">Laranja</option>
												<option value="8">Roxo</option>
												<option value="9">Cinza Cabeça</option>
												<option value="10">Marrom</option>
											</select><br><hr>
						
						<label>Categoria: </label><select name="pro_sub_cat" required>
													<option value=""> -------</option>
													<option value="1">Rock</option>
													<option value="2">Games</option>
													<option value="3">Series</option>
													<option value="4">Filmes</option>
													<option value="5">Animes</option>
													<option value="6">Outros</option>
												</select><br><hr>
						<label>Subcategoria: </label><select name="pro_cat" required>
														<option value=""> -------</option>
														<option value="1">Camisa</option>
														<option value="2">Casaco</option>
														<option value="3">Caneca</option>
														<option value="4">Relógio</option>
														<option value="5">Almofada</option>
														<option value="6">Garrafa Termica</option>
														<option value="7">Quebra Cabeça</option>
														<option value="8">Outros</option>
													</select><br><hr>

						<label>Peso (aproximadamente): </label><select name="pro_weight" required>
																	<option value="">---</option>
																	<option value="0.1">100g</option>
																	<option value="0.2">200g</option>
																	<option value="0.3">300g</option>
																	<option value="0.4">400g</option>
																	<option value="0.5">500g</option>
																	<option value="0.6">600g</option>
																	<option value="0.7">700g</option>
																	<option value="0.8">800g</option>
																	<option value="0.9">900g</option>
																	<option value="1.0">1kg</option>
																	<option value="1.1">1,1kg</option>
																	<option value="1.2">1,2kg</option>
																	<option value="1.3">1,3kg</option>
																	<option value="1.4">1,4kg</option>
																	<option value="1.5">1,5kg</option>
																	<option value="1.6">1,6kg</option>
																	<option value="1.7">1,7kg</option>
																	<option value="1.8">1,8kg</option>
																	<option value="1.9">1,9kg</option>
																	<option value="2.0">2kg</option>
																</select><br><hr>
						<label>Palavras Chave 1: </label><input type="text" name="pro_word1" placeholder="opicional">
						<br>
						<label>Palavras Chave 2: </label><input type="text" name="pro_word2" placeholder="opicional">
						<br>
						<label>Palavras Chave 3: </label><input type="text" name="pro_word3" placeholder="opicional">
						<br>
						<label>Palavras Chave 4: </label><input type="text" name="pro_word4" placeholder="opicional">
						<br><hr>

						<label>Quantidade para o tamanho Unico: </label><input type="text" name="pro_qtd_u" required value="0"><br>
						<label>Quantidade para o tamanho P: </label><input type="text" name="pro_qtd_p" required value="0"><br>
						<label>Quantidade para o tamanho M: </label><input type="text" name="pro_qtd_m" required value="0"><br>
						<label>Quantidade para o tamanho G: </label><input type="text" name="pro_qtd_g" required value="0"><br>
						<label>Quantidade para o tamanho GG: </label><input type="text" name="pro_qtd_gg" required value="0"><br>
						<hr>

						<input type="submit" name="" value="Adicionar">
					</form>
				</div>				
			</div>
		</div>
	</div>
</body>
</html>