<?php 
session_start();
if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

/*
if (isset($_SESSION['cd_produto'])) {
    $_GET['id'] = $_SESSION['cd_produto'];
}
if (isset($_SESSION['ab'])) {
    unset($_SESSION['cd_produto']);
}*/
include("connection.php");
$cd_produto = $_GET['id'];


			

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Produto</title>
	<meta charset="utf-8">
	<script  type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
          <?php 
            include("Page Parts/links.php");
         ?>
    <!-- CSS do Produto--> 
    <link rel="stylesheet" type="text/css" href="../css/produto.css">

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

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php 
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
        				echo "<h1><a href='exibir_lista.php'>Produto</a> / <a href='exibir_lista.php?cat=$rc'>$r</a> / <a href='exibir_lista.php?sub_cat=$sc'>$s</a></h1>";
        				 ?>
			             </div>

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ds">
				<div id="img" class="tiles">
					<div class="tile-responsive" data-scale="2.4" data-image="../imagens/produtos/<?php echo $rows_produtos['im_produto']; ?>"><div class="photo"></div></div>
				</div>
				<br>
				<h3>Descrição do produto</h3><br>
                    <?php 
                    $produtos = utf8_encode($rows_produtos['ds_produto']);
                    ?>
				<p><?php echo $produtos; ?></p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="submit">


				<form method="post" action="insere_carrinho.php">
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
                    <?php 
                        if (isset($e) && isset($s)) {
                     ?>
                            <input type="submit" name="" value="ADICIONAR AO CARRINHO">

                    <?php 
                        }else{
                    ?>
                            <div id="modal" onclick='ver_modal()'>ADICIONAR AO CARRINHO</div>
                    <?php 
                            }       
                    ?>
                    
                    <br><br>
                </form>
			</div>
	    </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="relative">
                <h3>Produtos Relacionados</h3>
                <?php 
                    // $relative = mysql_query("select * from tb_produtos inner join tb_sub_categoria on tb_sub_categoria.cd_sub_categoria = tb_produtos.cd_sub_categoria where tb_sub_categoria.cd_sub_categoria in (select cd_sub_categoria from tb_produtos where cd_produto = $cd)");


                    $relative = mysql_query("select * from tb_produtos inner join tb_sub_categoria on tb_sub_categoria.cd_sub_categoria = tb_produtos.cd_sub_categoria inner join tb_categoria on tb_categoria.cd_categoria = tb_produtos.cd_categoria where tb_sub_categoria.cd_sub_categoria in (select cd_sub_categoria from tb_produtos where cd_produto = $cd) or tb_categoria.cd_categoria in (select cd_categoria from tb_produtos where cd_produto = $cd)");

                    if (mysql_num_rows($relative) > '0') {
                        while($rows_relative = mysql_fetch_assoc($relative)){
                            ?>
                            <a href="produto.php?id=<?php echo $rows_relative['cd_produto']; ?>">
                            <img src="../imagens/produtos/<?php echo $rows_relative['im_produto']; ?>" width="150px" height="150px"></a>
                            <?php 
                    }
                }
                 ?>
             </div>
            <br><br>
        </div>
    </div>
</div>
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


  <script type="text/javascript">

function ver_modal(){
     $.ajax({  
                url:"modal/logar.php",  
                method:"POST",  
                data:{},  
                success:function(data){  
                     $('#conteudo').html(data); 
                }  
           });  
     console.log(open_modal());
}

function open_modal(){
    $(".modal").css("display","block");
    $(".modal .pop_up").animate({top: "50%"},500);
}

function close_modal(){

    $(".modal .pop_up").animate({top: "-50%"},300);
    setTimeout('$(".modal").css("display","none");', 300);  
}
</script>	
</body>
</html>
