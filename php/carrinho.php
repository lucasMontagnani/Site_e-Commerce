<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script  type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		function falha_cadastro(){
			setTimeout("window.location='login.php'",0);
		}
	</script>
</head>
<body>

</body>
</html>
<?php 
session_start();
include("connection.php");

if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Meu Carrinho</title>
	<meta charset="utf-8">
		<!-- Link Bootstrap-->
	    <?php 
            include("Page Parts/links.php");
         ?>
    <!-- CSS do Carrinho--> 
    <link rel="stylesheet" type="text/css" href="../css/carrinho.css">

</head>
<body>
<!-- - To The Top - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<?php 
			include("Page Parts/to_top_n_beyond.php");
		 ?>
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
				<div class="page-header">
					<h1>Meu Carrinho</h1>
				</div>
			</div>
		</div>
		<div class="row">	
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="overflow-x:auto;">
				<table class="table">
					<tr>
						<td>Imagem</td>
						<td>Nome</td>
						<td>Tamanho</td>
						<td>Valor Unitario</td>
						<td>Quantidade</td>
						<td>Valor Total</td>
						<td>Editar</td>
						<td>Excluir</td>
					</tr>
					<?php 
						$qu = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

						if (mysql_num_rows($qu) > '0') {
							while($rows_user = mysql_fetch_assoc($qu)){
								$cd_usuario = $rows_user['cd_usuario'];
							}
						}

						$read_produto = mysql_query("select tb_produtos.cd_produto, tb_produtos.im_produto,tb_produtos.nm_produto,tb_produtos.vl_produto,tb_carrinho.qt_produto,tb_carrinho.cd_tamanho,tb_carrinho.cd_carrinho from tb_perfil_usuario	inner join tb_carrinho on tb_perfil_usuario.cd_usuario = tb_carrinho.cd_usuario  inner join  tb_produtos on tb_carrinho.cd_produto = tb_produtos.cd_produto where tb_carrinho.cd_usuario =  '".$cd_usuario."'");

						if (mysql_num_rows($read_produto) > '0') {
							while($rows_produtos = mysql_fetch_assoc($read_produto)){
								if ($rows_produtos['cd_tamanho'] == 1) {
							$nt = "Tamanho Unico";
							}	
					elseif ($rows_produtos['cd_tamanho'] == 2) {
							$nt = "P";
						}
					elseif ($rows_produtos['cd_tamanho'] == 3) {
							$nt = "M";
						}
					elseif ($rows_produtos['cd_tamanho'] == 4) {
							$nt = "G";
						}
					elseif ($rows_produtos['cd_tamanho'] == 5) {
							$nt = "GG";
						}
								$cd_carrinho = $rows_produtos['cd_carrinho'];
								echo '<tr>
								<td><img src="../imagens/produtos/'.$rows_produtos['im_produto'].'"></td>
								<td>'.utf8_encode($rows_produtos['nm_produto']).'</td>
								<td>'.$nt.'</td>
								<td>R$ '.$rows_produtos['vl_produto'].'</td>
								<td>'.$rows_produtos['qt_produto'].'</td>
								<td>R$ '.$rows_produtos['vl_produto']*$rows_produtos['qt_produto'].'</td>'; 
					?>

						<td>
							<a href="<?php echo "editar_carrinho.php?pedido=$cd_carrinho"?>">Editar</a>
						</td>
						<td>
							<a href="<?php echo "delete_pedido.php?pedido=$cd_carrinho"?>" >Excluir</a>
						</td>
					<?php
						echo '<tr>';
					}
					}

					 ?>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="Calcular">
				<form action="" method="post">
  				    <input type="text" class="form-control" placeholder="Seu CEP" id="cep_destino" required><br>
  				    <a onclick="calcular();" class="btn btn-info btn-sm" >Calcular</a>
			      </form>
			      <div id="retorno"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="finalizar.php">
				<h3>Formas de Entrega</h3>
				<input type="radio" name="retirada" value="1"><label>Retirar Na loja (sem frete)</label><br>
				<input type="radio" name="retirada" value="2"><label>SEDEX (com frete)</label><br>
				<br />
				<h3>Formas de Pagamento</h3>
				<input type="radio" name="pagamento" value="1"><label>Cartão (Via PagSeguro)</label><br>
				<input type="radio" name="pagamento" value="2"><label>Boleto (Via PagSeguro)</label>
				<br>	
				<input type="submit" value="Enviar">
				</form>
				
					</div>
				</div>
    		</div>
		</div>
	</div>
</div>    <br>
    		<?php 
			include("Page Parts/footer.php");
		 	?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  	<script>
  	 function calcular(){
  		 var cep_destino = $("#cep_destino").val();
  		 $.post('calcula.php',{cep_destino: cep_destino},function(data){
  		  $("#retorno").html(data);
  		 });
  	 } 
  	</script>
  	  <script type="text/javascript">

function ver_modal(){
     $.ajax({  
                url:"modal/edit.php",  
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
	