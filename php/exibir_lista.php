<?php 
session_start();
include("connection.php");
$query = "select * from tb_produtos";
$result = mysql_query($query);

if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}
$_SESSION['ab'] = 2;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script  type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
	<!-- Link Bootstrap-->
	    <?php 
            include("Page Parts/links.php");
         ?>
    <!-- CSS da lista exibida--> 
	<link rel="stylesheet" type="text/css" href="../css/lista.css">
</head>
<body>
<!-- - To The Top - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<?php 
			include("Page Parts/to_top_n_beyond.php");
		 ?>

<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="container-fluid"><div class="row">
                    <?php 
            include("Page Parts/menu_header.php");
         ?></div></div>
			
		<div class="container theme-showcase" role="main">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<?php 

				if (isset($_GET['sub_cat']) == 1) {
				if (isset($_GET['sub_cat']) && $_GET['sub_cat'] != '') {
					$id_sub_cat = $_GET['sub_cat'];
					$sql_sub_categoria = " and tb_produtos.cd_sub_categoria = '".$id_sub_cat."'";
					$sc = "select nm_sub_categoria, cd_sub_categoria from tb_sub_categoria where cd_sub_categoria = '".$id_sub_cat."'";
					$fc = mysql_query($sc);
				}else{
					$sql_sub_categoria = "";
				}
				$read_produto = mysql_query("select * from tb_produtos where cd_produto != '' {$sql_sub_categoria}");
			}else{
				if (isset($_GET['cat']) && $_GET['cat'] != '') {
					$id_cat = $_GET['cat'];
					$sql_categoria = " and tb_produtos.cd_categoria = '".$id_cat."'";
					$sc = "select nm_categoria, cd_categoria from tb_categoria where cd_categoria = '".$id_cat."'";
					$fc2 = mysql_query($sc);
				}else{
					$sql_categoria = "";
				}
				$read_produto = mysql_query("select * from tb_produtos where cd_produto != '' {$sql_categoria}");
				
			}?>

			<div class="page-header">
				<?php 
				if (isset($fc)) {				
					if (mysql_num_rows($fc) > '0') {
						while($rows_c = mysql_fetch_assoc($fc)){
							$c = utf8_encode($rows_c['nm_sub_categoria']);
							$nc = utf8_encode($rows_c['cd_sub_categoria']);
							echo "<h1><a href='exibir_lista.php'>Produtos</a> / <a href='exibir_lista.php?sub_cat=$nc'>$c</a>"; 
						}
					}
				}elseif (isset($fc2)) {
						if (mysql_num_rows($fc2) > '0') {
						while($rows_c = mysql_fetch_assoc($fc2)){
							$c = utf8_encode($rows_c['nm_categoria']);
							$nc = utf8_encode($rows_c['cd_categoria']);
							echo "<h1><a href='exibir_lista.php'>Produtos</a> / <a href='exibir_lista.php?cat=$nc'>$c</a>"; 
						}
					}
				}
				else{
						echo "<h1><a href='exibir_lista.php'>Produtos</a>"; 
					}

				?>
			</div>
			<?php 

				if (mysql_num_rows($read_produto) > '0') {
					while($rows_produtos = mysql_fetch_assoc($read_produto)){
									
									
				 ?>

	<!--<?php /*while($rows_produtos = mysql_fetch_assoc($result)){ */?>-->
				<a href="produto.php?id=<?php echo $rows_produtos['cd_produto']; ?>">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="thumbnail">
							<br>
							<img src="../imagens/produtos/<?php echo $rows_produtos['im_produto']; ?>" alt="..." height="300" width="300" id="main_img" class="img-responsive">
							<div class="caption text-center">
								<?php 
								$produtos = utf8_encode($rows_produtos['nm_produto']);
								 ?>
							<div id="pb"><?php echo $produtos; ?></div>
							<div id="po"><?php echo "R$ ".$rows_produtos['vl_produto']; ?></div>
							</div>
						</div>
					</div>
				</a>
<?php }} ?>
				<!--<?php /* }*/ ?>-->
			
			</div>
		</div>
	</div>
</div>
		
		<br><br>
		<?php 
			include("Page Parts/footer.php");
		 ?>

		<script src="../bootstrap/js/bootstrap.min.js"></script>


</body>
</html>