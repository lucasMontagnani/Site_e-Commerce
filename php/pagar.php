<?php 
session_start();
include("connection.php");

if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

$qu = mysql_query("select cd_usuario from tb_perfil_usuario where nm_email = '$e' and cd_senha = '$s'");

if (mysql_num_rows($qu) > '0') {
					while($rows_user = mysql_fetch_assoc($qu)){
						$cd_usuario = $rows_user['cd_usuario'];
}}

/*$pedido = $_GET['pedido'];
echo $pedido;*/
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Meu Carrinho</title>
	<meta charset="utf-8">
	<?php 
            include("Page Parts/links.php");
         ?>
	<style type="text/css">
		.ss{
			width: auto;
			border: solid;
			border-width: 1px;
			margin-bottom: 10px;
			padding-top: 10px;
			padding-left: 20px;
			padding-right: 20px;
			background-color: #f0f0f0;
			border-color: #c0c0c0;
			padding-bottom: 10px;
		}

		.ss hr{
			border-color: #c0c0c0;
		}

	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
		<?php 
			include("Page Parts/menu_header.php");
		 ?>
	</div>
			 
	<div class="page-header">
		<h1>Efetuar Pagamento</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3>Para ser redirecionado à página de pagamento do PagSeguro, clique no botão abaixo:</h3>
<?php 

$code_pedido = mysql_query("select /* sobre o produto*/tb_produto_pedido.cd_produto,tb_produtos.nm_produto,tb_produtos.vl_produto, tb_produto_pedido.qt_produto,tb_produtos.wt_produto /* sobre o pedido*/,tb_pedido.cd_retirada,max(tb_pedido.cd_pedido) as n_pedido,tb_endereco_usuario.cd_cep,tb_endereco_usuario.nm_rua,tb_endereco_usuario.cd_numero, tb_endereco_usuario.nm_complemento, tb_bairro_usuario.nm_bairro,tb_cidade_usuario.nm_cidade, tb_estado_usuario.sg_uf/* sobre o usuario*/, tb_perfil_usuario.nm_usuario,tb_perfil_usuario.nm_email  from tb_estado_usuario inner join tb_cidade_usuario on tb_estado_usuario.cd_estado = tb_cidade_usuario.cd_estado inner join tb_bairro_usuario on tb_cidade_usuario.cd_cidade = tb_bairro_usuario.cd_cidade inner join tb_endereco_usuario on tb_bairro_usuario.cd_bairro =  tb_endereco_usuario.cd_bairro inner join tb_perfil_usuario on tb_endereco_usuario.cd_endereco = tb_perfil_usuario.cd_endereco	inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario  inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produto_pedido.cd_produto = tb_produtos.cd_produto where tb_perfil_usuario.cd_usuario = $cd_usuario");


if (mysql_num_rows($code_pedido) > '0') {
					while($rows_pedido = mysql_fetch_assoc($code_pedido)){
						

?>


				<!-- Declaração do formulário -->  
<form method="post" target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
          
        <!-- Campos obrigatórios -->  
        <input name="receiverEmail" type="hidden" value="suporte@lojamodelo.com.br">  
        <input name="currency" type="hidden" value="BRL">  

  <?php 
  $code_item = mysql_query("select tb_produtos.vl_produto as valor, tb_produtos.nm_produto, tb_pedido.cd_pedido,tb_produtos.cd_produto,tb_produto_pedido.qt_produto ,tb_produtos.wt_produto from tb_produtos inner join tb_produto_pedido on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_pedido on tb_produto_pedido.cd_pedido = tb_pedido.cd_pedido where tb_pedido.cd_pedido = '".$rows_pedido['n_pedido']."'");
  if (mysql_num_rows($code_item) > '0') {
  	$x = 1;
  	while($rows_item = mysql_fetch_assoc($code_item)){
  ?>
        <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
        <input name="itemId<?php echo $x; ?>" type="hidden" value="1">  
        <input name="itemDescription<?php echo $x; ?>" type="hidden" value="<?php echo $rows_item['nm_produto']; ?>">  
        <input name="itemAmount<?php echo $x; ?>" type="hidden" value="<?php echo number_format($rows_item['valor'],2,'.',''); ?>">  
        <input name="itemQuantity<?php echo $x; ?>" type="hidden" value="<?php echo $rows_item['qt_produto']; ?>">  
        <input name="itemWeight<?php echo $x; ?>" type="hidden" value="<?php echo number_format($rows_item['wt_produto'],3,'',''); ?>"> 
  <?php
  $x++;
	}}
  ?>
        <!-- Código de referência do pagamento no seu sistema (opcional) -->  
        <input name="reference" type="hidden" value="<?php echo $rows_pedido['n_pedido']; ?>">  
          
        <!-- Informações de frete (opcionais) -->  
        <input name="shippingType" type="hidden" value="2">  
        <input name="shippingAddressPostalCode" type="hidden" value="<?php echo $rows_pedido['cd_cep']; ?>">  
        <input name="shippingAddressStreet" type="hidden" value="<?php echo $rows_pedido['nm_rua']; ?>">  
        <input name="shippingAddressNumber" type="hidden" value="<?php echo $rows_pedido['cd_numero']; ?>">  
        <input name="shippingAddressComplement" type="hidden" value="<?php echo $rows_pedido['nm_complemento']; ?>">  
        <input name="shippingAddressDistrict" type="hidden" value="<?php echo $rows_pedido['nm_bairro']; ?>">  
        <input name="shippingAddressCity" type="hidden" value="<?php echo $rows_pedido['nm_cidade']; ?>">  
        <input name="shippingAddressState" type="hidden" value="<?php echo $rows_pedido['sg_uf']; ?>">  
        <input name="shippingAddressCountry" type="hidden" value="BRA">  
  
        <!-- Dados do comprador (opcionais) -->  
        <input name="senderName" type="hidden" value="<?php echo $rows_pedido['nm_usuario']; ?>">  
        <input name="senderAreaCode" type="hidden" value="">  
        <input name="senderPhone" type="hidden" value="">  
        <input name="senderEmail" type="hidden" value="<?php echo $rows_pedido['nm_email']; ?>">  
  
        <!-- submit do form (obrigatório) -->  
        <input alt="Pague com PagSeguro" name="submit"  type="image"  src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"/>  
          
</form>  
<?php 
}}else{
	echo "Pedido não encontrado";
	mysql_error();
}


 ?>

		</div>
	</div>
</div>	
	    		<?php 
			include("Page Parts/footer.php");
		 	?>
</body>
</html>











				


<!--


select /* sobre o produto*/r_produto_pedido.cd_produto,tb_produtos.nm_produto,tb_produtos.vl_produto, r_produto_pedido.qt_produto,tb_produtos.wt_produto /* sobre o pedido*/,tb_pedido.cd_retirada,tb_endereco_usuario.cd_cep,tb_endereco_usuario.nm_rua,tb_endereco_usuario.cd_numero, tb_endereco_usuario.nm_complemento, tb_bairro_usuario.nm_bairro,tb_cidade_usuario.nm_cidade, tb_estado_usuario.sg_uf/* sobre o usuario*/, tb_perfil_usuario.nm_usuario,tb_perfil_usuario.nm_email  from tb_estado_usuario inner join tb_cidade_usuario on tb_estado_usuario.cd_estado = tb_cidade_usuario.cd_estado inner join tb_bairro_usuario on tb_cidade_usuario.cd_cidade = tb_bairro_usuario.cd_cidade inner join tb_endereco_usuario on tb_bairro_usuario.cd_bairro =  tb_endereco_usuario.cd_bairro inner join tb_perfil_usuario on tb_endereco_usuario.cd_endereco = tb_perfil_usuario.cd_endereco	inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario  inner join r_produto_pedido on tb_pedido.cd_pedido = r_produto_pedido.cd_pedido inner join tb_produtos on r_produto_pedido.cd_produto = tb_produtos.cd_produto where tb_pedido.cd_usuario = 1
-->