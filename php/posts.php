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

?>

 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<title>Posts</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="post/css/post.css">
 	<script  type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
 	<!-- Link Bootstrap-->
	    <?php 
            include("Page Parts/links.php");
         ?>
 		<!-- CSS link do post-->
	
 </head>
 <body style="background-image:url(../imagens/background/Dark_Gray_Background.jpg)"> 	
<!-- - To The Top - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<?php 
			include("Page Parts/to_top_n_beyond.php");
		 ?>
 	<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="container-fluid" id="mg">
			<div class="row">
				<?php 
			    include("Page Parts/menu_header.php");
			    ?>
			</div>
		</div>

		 <br>
 	<div id="body">
 		<div class="container-fluid">
 			<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
			<center>
 			<?php		
				$seleciona = mysql_query("SELECT cd_post,nm_titulo,im_post,ds_post,DATE_FORMAT(dt_post,'%d/%m/%y') as date,hr_post,nm_postador FROM tb_post ORDER BY cd_post DESC");
				$conta = @mysql_num_rows($seleciona);
				
				if($conta <= 0){
					echo "<code>Nenhuma postagem cadastrada no banco de dados.</code>";
				}else{
					while($row = mysql_fetch_array($seleciona)){
						$cd_post = $row['cd_post'];
						$nm_titulo = $row['nm_titulo'];
						$ds_post = $row['ds_post'];
						$im_post = $row['im_post'];
						$dt_post = $row['date'];
						$hr_post = $row['hr_post'];
						$nm_postador = $row['nm_postador'];
			?>

			<div id="panel" align="left">
			<p><a href="#" class="titulo"><?php echo $nm_titulo;?></a></p>
			
			<?php if($ds_post != null){?><p class="descricao"><?php echo $ds_post;?></p><?php }?>
			<hr>
			<?php if($im_post != null){?><p><img src="<?php echo $im_post;?>" class="foto"/></p><?php }?>
			<hr>
			<p> Postado em: <?php echo $dt_post." às ".$hr_post;?></br>  Postado por: <?php echo $nm_postador;?></p>
			</div>
			<br>
	<?php }}?>
 		</center>
 	</div>
</div>
</div>
</div>
		<?php 
			include("Page Parts/footer.php");
		 ?>
 </body>
 </html>