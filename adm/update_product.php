<?php 
include("../php/connection.php");

$cd_produto_adm = $_GET['produto_adm'];

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
	.current{
		margin-left: 310px;
		margin-top: -30px;
	}

	.orange{
		margin-top: -33px;
		margin-left: 430px;
		color: orange !important;
	}

	#tam{
		margin-left: 530px;
	}
	#lr img{
		height: 200px;
		width: 200px;
	}

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

			<div class="col-md-8">
				<div id="workplace">
					<!-- <a href="javascript:history.back()">Voltar</a> -->
					<div id="lr">
						
						<?php 
							$pd = mysql_query("select * from tb_produtos where cd_produto = '".$cd_produto_adm."'");
							if (mysql_num_rows($pd) > '0') {
									while($rows_pro = mysql_fetch_assoc($pd)){
									$id = $rows_pro['cd_produto'];
									$name = $rows_pro['nm_produto'];
									echo "<h3>Produto selecionado: $name</h3>";
								?>

							





						<label>Nome</label><br>
							<form method='post' action='modificar_produto.php'>
								<input type='text' name='new_name'>
								<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
								<input type='submit' value='Atualizar'>
							</form>
						<label class="current">Nome Atual:</label><label class="orange">
						<?php 
							echo $rows_pro['nm_produto'];
						 ?>
						 </label>
							<hr>
								<label>Preço</label><br>
									<form method='post' action='modificar_produto.php'>
										<input type='text' name='new_preco' placeholder='27.00 (Use o Ponto)'>
										<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
										<input type='submit' value='Atualizar'>
									</form>
								<label class="current">Preço Atual:</label><label class="orange">
						<?php 
							echo " R$ ".$rows_pro['vl_produto'];
						 ?>
						 		</label>
						<hr>

						<label>Imagem</label><br>
						<form method='post' action='modificar_produto.php' enctype="multipart/form-data">
							<input type="file" name="pro_image" id="pro_image"><br>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Atualizar'>
						</form>
						<label class="current">Img Atual:</label><label class="orange">
						<?php 
							echo '<td><img src="../imagens/produtos/'.$rows_pro['im_produto'].'"></td>';
						 ?>
						 </label>
						<hr>











						<label>Incrementar no estoque (Caso não queira inserir em todos os tamanhos, apenas deixe em branco)</label>
						<br><hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho Unico:</label><input type='text' name='plus_estoque_u' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Incrementar'>
						</form>
						<label class="current">Tamanho Unico Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 1 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho P:</label><input type='text' name='plus_estoque_p' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Incrementar'>
						</form>
						<label class="current">Tamanho P Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 2 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho M:</label><input type='text' name='plus_estoque_m' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Incrementar'>
						</form>
						<label class="current">Tamanho M Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 3 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho G:</label><input type='text' name='plus_estoque_g' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Incrementar'>
						</form>
						<label class="current">Tamanho G Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 4 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho GG:</label><input type='text' name='plus_estoque_gg' placeholder='Apenas valores inteiros'>

							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Incrementar'>
						</form>
						<label class="current">Tamanho GG Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 5 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>


<label>Baixa no estoque (Caso não queira dar baixa em todos os tamanhos, apenas deixe em branco)</label>
						<br><hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho Unico:</label><input type='text' name='minus_estoque_u' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Reduzir'>
						</form>
						<label class="current">Tamanho Unico Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 1 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho P:</label><input type='text' name='minus_estoque_p' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Reduzir'>
						</form>
						<label class="current">Tamanho P Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 2 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho M:</label><input type='text' name='minus_estoque_m' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Reduzir'>
						</form>
						<label class="current">Tamanho M Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 3 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho G:</label><input type='text' name='minus_estoque_g' placeholder='Apenas valores inteiros'>
							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Reduzir'>
						</form>
						<label class="current">Tamanho G Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 4 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>
						<form method='post' action='modificar_produto.php'>
							<label>Tamanho GG:</label><input type='text' name='minus_estoque_gg' placeholder='Apenas valores inteiros'>

							<input name='produto_up' type='hidden' value="<?php echo $rows_pro['cd_produto']; ?>">
							<input type='submit' value='Reduzir'>
						</form>
						<label class="current">Tamanho GG Atual:</label><label class="orange" id="tam">
						<?php 

								$tmu = mysql_query("select qt_produto FROM tb_produtos INNER JOIN r_produto_tamanho_estoque on tb_produtos.cd_produto = r_produto_tamanho_estoque.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_tamanho.cd_tamanho = 5 and tb_produtos.cd_produto = '".$cd_produto_adm."'");
								if (mysql_num_rows($tmu) > '0') {
									while($rows_tmu = mysql_fetch_assoc($tmu)){
							echo $rows_tmu['qt_produto'];
							}}
						 ?>
						 </label>
						<hr>


					<?php 
						}
							}
						 ?>
					</div>
				</div>				
			</div>
		</div>
	</div>
</body>
</html>