<!-- - - FOOTER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="text">
							<nav class="navtext"><br>
								<h2>CONTATO</h2>
									<ul>
										<li>Telefone/WhatsApp: (13) 3473-98	68</li>
										<li>Facebook: Resident-Stamp</li>
										<li>Email: resident.stamp@hotmail.com</li>
									</ul>
									<div id="inputs2">
								    	<h2>Fale conosco</h2>
										<form method="post" action="../adm/insere_mensagem.php" name="formulario">
											<div id="a2">
								            <input type="text" id="assunto" name="assunto" placeholder="Assunto" required>
								            </div>
								            <div id="m2">
								            <input type="text" name="mensagem" placeholder="Mensagem" required>
								            </div>
								            <?php 
            									if (isset($e) && isset($s)) {
         									?>
								            <input type="submit" value="ENVIAR" id="btn" onclick="request()">
								            <?php 
									            }else{
									        ?>
									        <input type="submit" onclick="lh()">
									        <?php 
									            }   
									        ?> 
								        </form>
								   	</div>
								   	<div id="alert">(É necessário estar logado!)</div>
							</nav>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="text">
							<nav class="navtext"><br>
								<h2>Mini Galeria</h2>
								<table>
									<tr>
										<?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 1;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg"></td>
										<?php 
											}}
										 ?>
										<?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 2;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg2"></td>
										<?php 
											}}
										 ?>
										 <?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 3;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg3"></td>
										<?php 
											}}
										 ?>
									</tr>
									<tr>
										<?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 4;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg4"></td>
										<?php 
											}}
										 ?>
										<?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 5;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg5"></td>
										<?php 
											}}
										 ?>
										 <?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 6;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg6"></td>
										<?php 
											}}
										 ?>
									</tr>
									<tr>
										<?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria =7;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg7"></td>
										<?php 
											}}
										 ?>
										<?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 8;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg8"></td>
										<?php 
											}}
										 ?>
										 <?php 
									 		$ga = mysql_query("select * from tb_galeria where cd_galeria = 9;");
												if (mysql_num_rows($ga) > '0') {
													while($rows_ga = mysql_fetch_assoc($ga)){
		 	 							?>
										<td><img src="../imagens/galeria/<?php echo $rows_ga['im_galeria']; ?>" id="myImg9"></td>
										<?php 
											}}
										 ?>
									</tr>
								</table>
							</nav>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="text">
							<nav class="navtext" id="endereco"><br>
								<h2>ENDEREÇO</h2>
								<p>Av. Pres. Costa e Silva n° 501, Loja 16, Galeria PG, Boqueirão, Praia Grande - SP</p>
								<div id="map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14578.48142896979!2d-46.414195400000004!3d-24.0091797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe61cfb29f105c7e1!2sGaleria+PG!5e0!3m2!1spt-BR!2sbr!4v1542373886166" width="420" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</nav>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">				
						<div class="especial">
							<nav id="icone">
							    <ul>
							        <li><a href="https://www.facebook.com/residentstamp/"><img src="../imagens/footer/face.png"></a></li>
									<li><a href="#"><img src="../imagens/footer/insta.png"></a></li>
									<li><a href="#"><img src="../imagens/footer/TT.png"></a></li>
									<li><a href="#"><img src="../imagens/footer/pint.png"></a></li>
									<li><a href="#"><img src="../imagens/footer/gmail.png"></a></li>
							    </ul>
							</nav>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">						
								<nav id="copy"><br>
									<small align="center">Resident Stamp © 2018 </small>
								</nav>
							</div>	
						</div>
					</div>
				</div>	
			</div>
		</div>	
		<!-- The Modal -->
		<div id="myModal" class="modal2">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
			<div id="caption"></div>
		</div>
		<script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the image and insert it inside the modal - use its "alt" text as a caption

			
			var modalImg = document.getElementById("img01");
			var captionText = document.getElementById("caption");

			var img = document.getElementById('myImg');
			var img2 = document.getElementById('myImg2');
			var img3 = document.getElementById('myImg3');
			var img4 = document.getElementById('myImg4');
			var img5 = document.getElementById('myImg5');
			var img6 = document.getElementById('myImg6');
			var img7 = document.getElementById('myImg7');
			var img8 = document.getElementById('myImg8');
			var img9 = document.getElementById('myImg9');

			img.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img2.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img3.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img4.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img5.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img6.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img7.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img8.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}
			img9.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			    captionText.innerHTML = this.alt;
			}

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() { 
			    modal.style.display = "none";
			}


			function request(){
				alert("Mensagem enviada com sucesso");
				// if (confirm("É ou n É?")) {
				// 	document.formulario.submit()
				// }
			}

			function lh(){
				alert("Para enviar uma mensagem é necessário estar logado!");
				window.location='login.php';
			}
		</script>
	
	</footer>
