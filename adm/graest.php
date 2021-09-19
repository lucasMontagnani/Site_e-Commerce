<?php 
session_start();
if (isset($_SESSION['adm_email']) && isset($_SESSION['adm_password'])) {
	$e = $_SESSION['adm_email'];
	$s = $_SESSION['adm_password'];
}else{
	header("Location: login_adm.php");
	}
include("../php/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Estatísticas</title>
	<meta charset="utf-8">
	<?php 
            include("../php/Page Parts/adm_links.php");
      ?>
      <style type="text/css">
      	#Sarah_chart_div{
      		margin-left: -10px;
      		width: 450px;
      		height: 300px;
      	}

      	#Anthony_chart_div{
      		margin-left: -20px;
      		width: 450px;
      		height: 300px;
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
					<h2>Graficos e Estatisticas</h2>
					<hr>
					<div id="gra">
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    				<script type="text/javascript">

				      // Load Charts and the corechart package.
				      google.charts.load('current', {'packages':['corechart']});

				      // Draw the pie chart for Sarah's pizza when Charts is loaded.
				      google.charts.setOnLoadCallback(drawSarahChart);

				      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
				      google.charts.setOnLoadCallback(drawAnthonyChart);

				      // Callback that draws the pie chart for Sarah's pizza.
				      function drawSarahChart() {

				        // Create the data table for Sarah's pizza.
				        var data = google.visualization.arrayToDataTable([

						["Element", "Quantidade", { role: "style" } ],
					        
					        <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_categoria.nm_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_categoria on tb_produtos.cd_categoria = tb_categoria.cd_categoria where tb_pedido.vr_status = 'finish' and tb_categoria.nm_categoria = 'Camisa'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					         	$nm = $rows_cat['nm_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Camisa";
										}else{
											$nm = $rows_cat['nm_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "orange"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_categoria.nm_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_categoria on tb_produtos.cd_categoria = tb_categoria.cd_categoria where tb_pedido.vr_status = 'finish' and tb_categoria.nm_categoria = 'Caneca'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					         	$nm = $rows_cat['nm_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Caneca";
										}else{
											$nm = $rows_cat['nm_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "black"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_categoria.nm_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_categoria on tb_produtos.cd_categoria = tb_categoria.cd_categoria where tb_pedido.vr_status = 'finish' and tb_categoria.nm_categoria = 'Chaveiro'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					        $nm = $rows_cat['nm_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Chaveiro";
										}else{
											$nm = $rows_cat['nm_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "orange"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_categoria.nm_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_categoria on tb_produtos.cd_categoria = tb_categoria.cd_categoria where tb_pedido.vr_status = 'finish' and tb_categoria.nm_categoria = 'Outros'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					        $nm = $rows_cat['nm_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Outros";
										}else{
											$nm = $rows_cat['nm_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "black"],
							<?php 
					   			 }}
					         ?>
					        <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_categoria.nm_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_categoria on tb_produtos.cd_categoria = tb_categoria.cd_categoria where tb_pedido.vr_status = 'finish'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					         
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Total";
										}else{
											$nm = "Total";
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "orange"],
							<?php 
					   			 }}
					         ?>
					    ]);

				        // Set options for Sarah's pie chart.
				        var options = {title:'Produtos Vendidos (Por categoria)',

				        bar: {groupWidth: "95%"},
				        legend: { position: "none"}};

				        // Instantiate and draw the chart for Sarah's pizza.
				        var chart = new google.visualization.ColumnChart(document.getElementById('Sarah_chart_div'));
				        chart.draw(data, options);
				      }

			    // Callback that draws the pie chart for Anthony's pizza.
			    function drawAnthonyChart() {

			        // Create the data table for Anthony's pizza.
			        var data = google.visualization.arrayToDataTable([
					    ["Element", "Quantidade", { role: "style" } ],
					        
					        <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_sub_categoria.nm_sub_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_sub_categoria on tb_produtos.cd_sub_categoria = tb_sub_categoria.cd_sub_categoria where tb_pedido.vr_status = 'finish' and tb_sub_categoria.nm_sub_categoria = 'Rock'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
										$nm = $rows_cat['nm_sub_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Rock";
										}else{
											$nm = $rows_cat['nm_sub_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "orange"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_sub_categoria.nm_sub_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_sub_categoria on tb_produtos.cd_sub_categoria = tb_sub_categoria.cd_sub_categoria where tb_pedido.vr_status = 'finish' and tb_sub_categoria.nm_sub_categoria = 'Games'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					        			$nm = $rows_cat['nm_sub_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Games";
										}else{
											$nm = $rows_cat['nm_sub_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "black"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_sub_categoria.nm_sub_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_sub_categoria on tb_produtos.cd_sub_categoria = tb_sub_categoria.cd_sub_categoria where tb_pedido.vr_status = 'finish' and tb_sub_categoria.nm_sub_categoria = 'Series'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					         			$nm = $rows_cat['nm_sub_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Series";
										}else{
											$nm = $rows_cat['nm_sub_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "orange"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_sub_categoria.nm_sub_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_sub_categoria on tb_produtos.cd_categoria = tb_sub_categoria.cd_sub_categoria where tb_pedido.vr_status = 'finish' and tb_sub_categoria.nm_sub_categoria = 'Filmes'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					         			$nm = $rows_cat['nm_sub_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Filmes";
										}else{
											$nm = $rows_cat['nm_sub_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "black"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_sub_categoria.nm_sub_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_sub_categoria on tb_produtos.cd_categoria = tb_sub_categoria.cd_sub_categoria where tb_pedido.vr_status = 'finish' and tb_sub_categoria.nm_sub_categoria = 'Animes'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					         			$nm = $rows_cat['nm_sub_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Animes";
										}else{
											$nm = $rows_cat['nm_sub_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "orange"],
							<?php 
					   			 }}
					         ?>
					         <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade,tb_sub_categoria.nm_sub_categoria from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_sub_categoria on tb_produtos.cd_categoria = tb_sub_categoria.cd_sub_categoria where tb_pedido.vr_status = 'finish' and tb_sub_categoria.nm_sub_categoria = 'Outros'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					         			$nm = $rows_cat['nm_sub_categoria'];
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Outros";
										}else{
											$nm = $rows_cat['nm_sub_categoria'];
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "black"],
							<?php 
					   			 }}
					         ?>
					        <?php 
					        	$cat = mysql_query("select tb_pedido.vr_status, SUM(tb_produto_pedido.qt_produto) as quantidade from tb_pedido inner join tb_produto_pedido on tb_pedido.cd_pedido = tb_produto_pedido.cd_pedido inner join tb_produtos on tb_produtos.cd_produto = tb_produto_pedido.cd_produto inner join tb_sub_categoria on tb_produtos.cd_categoria = tb_sub_categoria.cd_sub_categoria where tb_pedido.vr_status = 'finish'");
					        	if (mysql_num_rows($cat) > '0') {
									while($rows_cat = mysql_fetch_assoc($cat)){
					        
										$qt = $rows_cat['quantidade'];
										if ($qt == null) {
											$qt = 0;
											$nm = "Total";
										}else{
											$nm = "Total";
											$qt = $rows_cat['quantidade'];
										}
										
					         ?>
					    ["<?php echo $nm; ?>", <?php echo $qt; ?>, "orange"],
							<?php 
					   			 }}
					         ?>
					      ]);

					        // Set options for Anthony's pie chart.
					        var options = {title:'Produtos Vendidos (Por subcategoria)',

					        bar: {groupWidth: "95%"},
					        legend: { position: "none"}};

					        // Instantiate and draw the chart for Anthony's pizza.
					        var chart = new google.visualization.ColumnChart(document.getElementById('Anthony_chart_div'));
					        chart.draw(data, options);
					      }
    				</script>
 
    				<!--Table and divs that hold the pie charts-->
				    <table class="columns">
				      <tr>
				        <td><div id="Sarah_chart_div"></div></td>
				        <td><div id="Anthony_chart_div"></div></td>
				      </tr>
				    </table>
				    </div>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>
