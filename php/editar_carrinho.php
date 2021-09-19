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

$carrinho = $_GET['pedido'];

$_SESSION['cd'] = $_GET['pedido'];

$ped_use = mysql_query("select * from tb_carrinho inner join tb_produtos on tb_carrinho.cd_produto = tb_produtos.cd_produto where cd_carrinho = '".$carrinho."'");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<meta charset="utf-8">
    <script  type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
	<!-- Link Bootstrap-->
	    <?php 
            include("Page Parts/links.php");
         ?>
<style type="text/css">
	#img{
			height: 500px;
			max-width: 450px !important;
			border: solid;
			border-width: 1px;

		}
		#tm_es{
			display: inline-flex;
			margin-bottom: 20px;
		}
		#tamanho{
			margin-right: 30px;
		}
		#qtd{
			margin-left: 50px;
		}
		#selecionar{
			display: inline-flex;
		}
		@font-face {
             font-family: edosz;
             src: url('../fontes/edosz.ttf');
		}
		@font-face {
             font-family: TheDolbak-Brush;
             src: url('../fontes/TheDolbak-Brush.ttf');
		}
        .page-header {
            font-family: "edosz" !important ; 
        }
        .page-header h1 a{
            color: black !important ;
            text-decoration:none !important ;
        }
        .page-header h1 a:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }
        .col-md-6 h2 {
            font-family: "edosz" !important ;
            font-size: 50px !important ;  
        }
        .col-md-6 h2 {
            color: black !important ;
            text-decoration:none !important ;
        }
        .col-md-6 h2:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }
        .col-md-6 h3 {
            font-family: "TheDolbak-Brush" !important ;
            font-size: 40px !important ; 
        }
        .col-md-6 h3 {
            color: black !important ;
            text-decoration:none !important ;
        }
        .col-md-6 h3:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }
        #selecionar {
            font-family: "edosz" !important ;
        }
        #selecionar {
            color: black !important ;
            text-decoration:none !important ;
        }
        #selecionar label:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }
        #tamanho {
            font-family: "edosz" !important ; 
        }
        #tamanho {
            color: black !important ;
            text-decoration:none !important ;
        }
        #tamanho:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }
        #estoque {
            font-family: "edosz" !important ; 
        }
        #estoque {
            color: black !important ;
            text-decoration:none !important ;
        }
        #estoque:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }
        #qtd {
            font-family: "edosz" !important ; 
        }
        #qtd {
            color: black !important ;
            text-decoration:none !important ;
        }
        #qtd label :hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }
		#submit input[type="submit"],
        #submit input[type="button"] {
        	font-family: "edosz" !important ;
        	font-size: 25px !important ; 
            position: relative;
            display: block;
            padding: 19px 39px 18px 39px;
            color: black;
            margin: 0 auto;
            background: orange;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            width:100%;
            border: 1px solid #ef9c00;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
        }
        #submit input[type="submit"]:hover,
        #submit input[type="button"]:hover
        {
            background: #ef9c00;
            transition: 0.2s ease-in !important ;
            border-radius: 10px;
        }
        .row p{
            font-family: "edosz" !important ;
            font-size: 20px !important ; 
        }
        .row p{
            color: black !important ;
            text-decoration:none !important ;
        }
        .row p:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }

        .tu {
            font-family: "edosz" !important ;
        }
        .tu {
            color: black !important ;
            text-decoration:none !important ;
        }
        .tu:hover{
            color: orange !important ;
            transition: 0.2s ease-in !important ;
        }

        #img{
        	overflow: hidden;
        }
        #img:hover{
			border-radius: 15%;
        	transition: 0.3s ease-in !important ;
        	box-shadow: 1px 1px #ff6600,
                2px 2px #ff6600,
                3px 3px #ff6600;
        -webkit-transform: translateX(-3px);
        transform: translateX(-3px);			
		}


  		.tile-responsive {
    		position: relative;
    		float: left;
    		width: 100%;
    		height: 100%;
  		}
		.photo {
    		position: absolute !important;
    		top: 0 !important;
    		left: 0 !important;
    		width: 100% !important;
    		height: 100% !important;
    		background-repeat: no-repeat !important;
    		background-position: center !important;
    		background-size: cover !important;
    		transition: transform .5s ease-out !important;
  		}
        hr {
            margin-top: 10px !important;
            margin-bottom: 10px !important;
        }

        #headeredit{
            font-size: 25px !important;
            color: black !important;
            font-family: "edosz" !important;
        }
</style>
</head>
<body>
		

<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="container-fluid">
	<div class="row">
        <?php 
            include("Page Parts/menu_header.php");
         ?>
     </div>
</div>
			
		<div class="container theme-showcase" role="main">
			<div class="row">
				<div id="headeredit" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<a href="javascript:history.back()">Voltar</a>

                    <?php 

if (mysql_num_rows($ped_use) > '0') {
					while($rows_ped_use = mysql_fetch_assoc($ped_use)){
						if ($rows_ped_use['cd_tamanho'] == 1) {
							$nt = "Tamanho Unico";
							}	
					elseif ($rows_ped_use['cd_tamanho'] == 2) {
							$nt = "P";
						}
					elseif ($rows_ped_use['cd_tamanho'] == 3) {
							$nt = "M";
						}
					elseif ($rows_ped_use['cd_tamanho'] == 4) {
							$nt = "G";
						}
					elseif ($rows_ped_use['cd_tamanho'] == 5) {
							$nt = "GG";
						}
						echo "<h2>Status atual do  item</h2>";

						$rows_ped_use['cd_usuario'];
						$cd_produto = $rows_ped_use['cd_produto'];
						echo "Nome do produto: ".utf8_encode($rows_ped_use['nm_produto']);
						echo "<br>";
						echo "Quantidade selecionada: ".$rows_ped_use['qt_produto'];
						echo "<br>";
						echo "Tamanho selecionado: ".$nt;


					}}





		        $read_produto = mysql_query("select * FROM tb_categoria INNER JOIN tb_produtos ON tb_categoria.cd_categoria = tb_produtos.cd_categoria INNER JOIN tb_sub_categoria ON tb_produtos.cd_sub_categoria = tb_sub_categoria.cd_sub_categoria WHERE tb_produtos.cd_produto = '".$cd_produto."'");
                if (mysql_num_rows($read_produto) > '0') {
					while($rows_produtos = mysql_fetch_assoc($read_produto)){


						?>

		                  <div class="page-header">
        			<?php 
                    $cd = $rows_produtos['cd_produto'];
        			$r = $rows_produtos['nm_categoria'];
        			$rc = $rows_produtos['cd_categoria'];
        			$s = $rows_produtos['nm_sub_categoria'];
        			$sc = $rows_produtos['cd_sub_categoria'];
        				//echo "<h1><a href='exibir_lista.php'>Produto</a> / <a href='exibir_lista.php?cat=$rc'>$r</a> / <a href='exibir_lista.php?sub_cat=$sc'>$s</a></h1>";

        				 ?>
			             </div>
</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div id="img" class="tiles">
					<div class="tile-responsive" data-scale="2.4" data-image="../imagens/produtos/<?php echo $rows_produtos['im_produto']; ?>"><div class="photo"></div></div>


				</div>
                
				<br>
                <p>Descrição do produto</p><br>
                    <?php 
                    $produtos = utf8_encode($rows_produtos['ds_produto']);
                    ?>
                <p><?php echo $produtos; ?></p>
                </div>
				<!-- <p>Descrição do produto</p><br>
				<p><?php /*echo $rows_produtos['ds_produto'];*/ ?></p> -->
			
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="submit">

				<form method="post" action="update_car.php">
					<input type="hidden" name="cd_produto" value="<?php echo $rows_produtos['cd_produto']; ?>">
                    <?php 
                    $produtos = utf8_encode($rows_produtos['nm_produto']);
                    ?>
					<h2><?php echo $produtos; ?></h2>
					<br>
					<h3><?php echo "R$".$rows_produtos['vl_produto']; ?></h3>
					<br>

				    <?php }}else{header("Location: exibir_lista.php");} ?>

                    <div id="tm_es">
                    	<div id="tamanho">
                    		<label>Tamanhos disponiveis</label>
                    			<?php 	
                    				$read_tamanho = mysql_query("select * FROM r_produto_tamanho_estoque INNER JOIN tb_produtos on r_produto_tamanho_estoque.cd_produto = tb_produtos.cd_produto INNER JOIN tb_tamanho on tb_tamanho.cd_tamanho = r_produto_tamanho_estoque.cd_tamanho WHERE tb_produtos.cd_produto = '".$cd_produto."'");
                    				if (mysql_num_rows($read_tamanho) > '0') {
                    					while($rows_tamanho = mysql_fetch_assoc($read_tamanho)){
                    	 		?>
                    	 		<hr>
                    						<div class="tu"><?php echo $rows_tamanho['sg_tamanho']; ?></div>
                    			<?php }} ?>
                    	</div>

                    	<div id="estoque">
                    		<label>Estoque</label>
                    			<?php 	
                    				$read_estoque = mysql_query("select * FROM r_produto_tamanho_estoque INNER JOIN tb_produtos on r_produto_tamanho_estoque.cd_produto = tb_produtos.cd_produto WHERE tb_produtos.cd_produto = '".$cd_produto."'");
                    				if (mysql_num_rows($read_estoque) > '0') {
                    						while($rows_estoque = mysql_fetch_assoc($read_estoque)){
                    	 		?>
                    	 		<hr>
                    							<div class="tu"><?php echo $rows_estoque['qt_produto']; ?></div>
                    			<?php }} ?>
                    	</div>
                    </div>
                    <br>
                    <div id="selecionar">
                    	<div>
                    		<label>Tamanho</label>
                    		<br>
                    		<select name="tamanho" required>
                    			<option value="6">Selecionar</option>
                    			<option value="1">Tamanho Unico</option>
                    			<option value="2">P</option>
                    			<option value="3">M</option>
                    			<option value="4">G</option>
                    			<option value="5">GG</option>
                    		</select>
                    	</div>

                    	<div id="qtd">
                    		<label>Quantidade</label>
                    		<br>
                    		<input type="text" name="pro_qtd" placeholder="0" size="2" maxlength="3" required>
                    	</div>
                    </div>

                    <br><br>
                    
                            <input type="submit" name="" value="ALTERAR ITEM">

                   
                    <br><br>
                </form>
			</div>
				
			</div>
		</div>
		<br><br>
		<?php 
			include("Page Parts/footer.php");
		 ?>
         <script type="text/javascript">
    
  $('.tile-responsive')
    // tile mouse actions
    .on('mouseover', function(){
      $(this).children('.photo').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
    })
    .on('mouseout', function(){
      $(this).children('.photo').css({'transform': 'scale(1)'});
    })
    .on('mousemove', function(e){
      $(this).children('.photo').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
    })
    // tiles set up
    .each(function(){
      $(this)
        // set up a background image for each tile based on data-image attribute
        .children('.photo').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
    })

  </script>

		<script src="js/bootstrap.min.js"></script>
</body>
</html>