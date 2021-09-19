<?php 
include("../php/connection.php");
$produto = $_GET['produto'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Informação do Produto</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
	<style type="text/css">
		#right{
			margin-left: 470px;
			margin-top: -230px;
		}
		#right img{
			max-height: 320px;
			max-width: 270px;

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
					
					<?php 
					$qp = mysql_query("select * from vw_info_produto where Id = '".$produto."'");
					if (mysql_num_rows($qp) > '0') {
								while($rows_pro = mysql_fetch_assoc($qp)){
									
									echo "<h3>Produto selecionado:".utf8_encode($rows_pro['Nome'])."</h3>";
									echo "Id: ".$rows_pro['Id'];
									echo "<br>";
									echo "Valor: ".$rows_pro['Valor'];
									echo "<br>";
									echo "Descrição: ".utf8_encode($rows_pro['Descricao']);
									echo "<br>";
									echo "Peso: ".$rows_pro['Peso'];
									echo "<br>";
									echo "Categoria: ".$rows_pro['Categoria'];
									echo "<br>";
									echo "Subcategoria: ".$rows_pro['Subcategoria'];
									echo "<br>";
									echo "Cor: ".$rows_pro['Cor'];
									echo "<br>";
									echo "pk1: ".utf8_encode($rows_pro['pk1']);
									echo "<br>";
									echo "pk2: ".utf8_encode($rows_pro['pk2']);
									echo "<br>";
									echo "pk3: ".utf8_encode($rows_pro['pk3']);
									echo "<br>";
									echo "pk4: ".utf8_encode($rows_pro['pk4']);
									echo "<br>";


									

									?>

									<div id="right">
										<?php 
											echo '<td><img src="../imagens/produtos/'.$rows_pro['Imagem'].'"></td>';
										 ?>
									</div>
					<?php 

								}}

					 ?>
					
					<a href="javascript:history.back()">Voltar</a>
				</div>
			</div>
		</div>	
	</div>
	<!-- <script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');
	</script> -->
</body>
</html>
