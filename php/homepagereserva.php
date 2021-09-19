<?php 
session_start();
if (isset($_SESSION['user_email'])) {
	$e = $_SESSION['user_email'];
}
if (isset($_SESSION['user_password'])) {
	$s = $_SESSION['user_password'];
}

include("connection.php");			
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Resident Stamp</title>
	<meta charset="utf-8">
	<!-- CSS link do Slideshow-->
	<link rel="stylesheet" type="text/css" href="../css/sliderssss.css">

	<!-- - Jquery 3.1.1 (CDN)- -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- CSS link do Contact Session-->
	
	    <?php 
            include("Page Parts/links.php");
         ?>

	<!-- CSS link do Index-->
	<link rel="stylesheet" type="text/css" href="../css/homerrsaap.css">

	<link rel="stylesheet" type="text/css" href="./slick/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick/slick-themes.css">
  <style type="text/css">

    .slider2 {
        width: 90%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
      height: 350px;
    }

    .slick-prev:before,
    .slick-next:before {
      color: orange;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }










    /* - - - - - - - - - - - - - - -Scrolltop button - - - - - - - - - - - - - - - - - - - - - -*/
#myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    border: none;
    outline: none;
    background-color:#000;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 10px;
    color: orange;
}

#myBtn:hover {
    background-color: #555;
}
  </style>


</head>
<body onload="carousel();">
	<!-- - - - - - - - - - - - - - - Botão to the top- - - - - - - - - - - - - - - - - - - - - - - - -->
<!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->
	<div>
		 <div class="goto-top" id="myBtn"> top</div>
	</div>
	<script type="text/javascript" src="../javascript/scroll_top_wc.js"></script>
	<!-- - Welcome Image - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div class="container-fluid">	
	<div id="hello">
		<div class="backimagem"></div>
		<div id="stamp"><img src="../imagens/signup-login/menu_logo20.png" width="450" height="363"></div>
		<!-- - To Down- -->
		<div class="goto-down"><img src="../imagens/icons/two-down-chevron.png" id="down"></div>
	</div>
	<script type="text/javascript" src="../javascript/scroll_down_wc.js"></script>
	<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					
<div class="container-fluid" id="mg"><div class="row">
                    <?php 
            include("Page Parts/menu_header.php");
         ?></div></div>

	<!-- - Slideshow - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	

	<div class="slideshow-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
		<!-- os slides -->
		<div class="mySlides fade2">
		  <div class="numbertext">1 / 3</div>
		  <?php 
		  	$slider = mysql_query("select im_slider1 from tb_slider_destaque where cd_sd = 1");
		  	if (mysql_num_rows($slider) > '0') {
								while($rows_slider = mysql_fetch_assoc($slider)){
		   ?>
		  <img src="../imagens/slideshow/<?php echo $rows_slider['im_slider1']; ?>" style="width:100%; height: 490px;">
		  <?php 
		  	}}
		   ?>
		</div>

		<div class="mySlides fade2">
		  <div class="numbertext">2 / 3</div>
		   <?php 
		  	$slider = mysql_query("select im_slider2 from tb_slider_destaque where cd_sd = 1");
		  	if (mysql_num_rows($slider) > '0') {
								while($rows_slider = mysql_fetch_assoc($slider)){
		   ?>
		  <img src="../imagens/slideshow/<?php echo $rows_slider['im_slider2']; ?>" style="width:100%; height: 490px;">
		  <?php 
		  	}}
		   ?>
		</div>

		<div class="mySlides fade2">
		  <div class="numbertext">3 / 3</div>
		   <?php 
		  	$slider = mysql_query("select im_slider3 from tb_slider_destaque where cd_sd = 1");
		  	if (mysql_num_rows($slider) > '0') {
								while($rows_slider = mysql_fetch_assoc($slider)){
		   ?>
		  <img src="../imagens/slideshow/<?php echo $rows_slider['im_slider3']; ?>" style="width:100%; height: 490px;">
		  <?php 
		  	}}
		   ?>
		</div>	
		<!-- os botões next/prev -->
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		<div id="black_dots" style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span> 
		  <span class="dot" onclick="currentSlide(2)"></span> 
		  <span class="dot" onclick="currentSlide(3)"></span> 
		</div> 
	</div>
	</div>
	<div id="orange-line"></div>
	</div>

	<!-- - Personalize - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	<div id="perso">
		<div id="img2">
		</div>
		<div id="text2">
			<h2 align="center">Personalize sua Estampa</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
		</div>
	</div> -->

	<script type="text/javascript" src="../javascript/slideshow.js"></script>

	<!-- - Dentado - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

		<div id="dentada">	
		</div> -->

	<!-- - Images - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	<div id="img_section">
		<div id="img_2">
			<img src="imagens/background/pink_floyd_galaxia.jpg" id="img1">
			<img src="imagens/background/led.jpg" id="img2">
		</div>
		<div id="img_3">
			<img src="imagens/imgs_essenciais/gp.jpg" id="img3">
			<img src="imagens/imgs_essenciais/btrp.jpg" id="img4">
			<img src="imagens/imgs_essenciais/qb.jpg" id="img5">
		</div>
	</div>
	-->

	<!-- - Zig-Zag Section - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	<div id="zz">
		<div id="z1">
			<div id="z1-1">
				<h2>Agende seu encomenda</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
			<div id="z1-2">
				<img src="imagens/imgs_essenciais/vector-clocks.jpg" width="100%" height="100%">
			</div>
		</div>
		 <div id="z2">
			<div id="z2-1">
				<img src="imagens/imgs_essenciais/entrega-encomenda-correios.jpg" width="100%" height="100%">
			</div>
			<div id="z2-2">
				
				<h2>Receba seu pedido em casa</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
		</div>
	</div>-->
	<!-- - -Exibição dos tipos de produtos - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --> 
		
			<div id="boxes"><br>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="bot">
							<a href="exibir_lista.php">
								<h2 id="ht" align="center">Produtos</h2>
							</a>
						</div>
					</div>
				</div>

	<div class="row">
						<div class="col-lg-4 col-xl-4 col-sm-4 col-md-4">

						<a href="exibir_lista.php?cat=2">
							<div class="ret" id="ret1">
								<div class="img">
									<?php 
		  	$repre = mysql_query("select im_repre1 from tb_slider_destaque where cd_sd = 1");
		  	if (mysql_num_rows($repre) > '0') {
								while($rows_repre = mysql_fetch_assoc($repre)){
		   ?>
		  <img src="../imagens/img_repre/<?php echo $rows_repre['im_repre1']; ?>" style="width:100%; height: 390px;">
		  <?php 
		  	}}
		   ?>
									<!-- <img src="../imagens/deadpool.jpg" width="420" height="390"> -->
								</div>
								<div class="textb">
									<h3>Casacos Estampadas</h3>
								</div>
							</div>
						</a>
						</div>
							<div class="col-lg-4 col-xl-4 col-sm-4 col-md-4">

						<a href="exibir_lista.php?cat=3">
							<div class="ret">
								<div class="img">
									<?php 
		  	$repre = mysql_query("select im_repre2 from tb_slider_destaque where cd_sd = 1");
		  	if (mysql_num_rows($repre) > '0') {
								while($rows_repre = mysql_fetch_assoc($repre)){
		   ?>
		  <img src="../imagens/img_repre/<?php echo $rows_repre['im_repre2']; ?>" style="width:100%; height: 390px;">
		  <?php 
		  	}}
		   ?>
									<!-- <img src="../imagens/caneca-led-zeppelin.jpg" width="420" height="390"> -->
								</div>		
								<div class="textb">
									<h3>Canecas Estampadas</h3>
								</div>
							</div>
						</a>
</div>
						<div class="col-lg-4 col-xl-4 col-sm-4 col-md-4">


						<a href="exibir_lista.php?cat=1">		
							<div class="ret">
								<div class="img">
									<?php 
		  	$repre = mysql_query("select im_repre3 from tb_slider_destaque where cd_sd = 1");
		  	if (mysql_num_rows($repre) > '0') {
								while($rows_repre = mysql_fetch_assoc($repre)){
		   ?>
		  <img src="../imagens/img_repre/<?php echo $rows_repre['im_repre3']; ?>" style="width:100%; height: 390px;">
		  <?php 
		  	}}
		   ?>
									<!-- <img src="../imagens/Overwatch.jpg" width="420" height="390"> -->
								</div>
								<div class="textb">
									<h3>Camisetas Estampadas</h3>
								</div>		
							</div>
						</a>
</div>
</div>
			</div>
		


	<!-- - Produtos em divisão diagonal  - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		<div id="diagonal">
			<div id="d1">
			</div>
			<div id="d2">
			</div>
			<div id="d3">
			</div>
			<div id="d4">
			</div>
		</div> -->

		<!-- - Ultimas Noticias - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
		<div id="noticias">
			<div id="leftwall">
			</div>		
			<div id="rightwall">
			</div>
				<h2 align="center"> Últimos Posts </h2> 
			<div id="caixa">
			</div>

		</div> 																							-->
		<!-- - Artigos- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

	<div id="artigo1">
		<div id="img">
		</div>
		<div id="text">
			<h2 align="center">Quem Somos</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>	
		</div>
	<!--<div id="dentado2">
	</div> -->
	</div>


	<!-- - Destaque Session - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --> 

	<div id="destaque">	 	

		<h2 align="center">Produtos Mais Vendidos</h2>
		 <section class="regular slider2">
		 	<?php 
		 		$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto1 from tb_slider_destaque);");
							if (mysql_num_rows($pi) > '0') {
								while($rows_pi = mysql_fetch_assoc($pi)){

		 	 ?>
		 	 				<a href="produto.php?id=<?php echo $rows_pi['cd_produto']; ?>">
							    <div>
							      <img src="../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>">
							    </div>
							</a>
		    <?php 
				}}

		     ?>
		     <?php 
		 		$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto2 from tb_slider_destaque);");
							if (mysql_num_rows($pi) > '0') {
								while($rows_pi = mysql_fetch_assoc($pi)){

		 	 ?>
		 	 				<a href="produto.php?id=<?php echo $rows_pi['cd_produto']; ?>">
							    <div>
							      <img src="../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>">
							    </div>
							</a>
		    <?php 
				}}

		     ?>
		     <?php 
		 		$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto3 from tb_slider_destaque);");
							if (mysql_num_rows($pi) > '0') {
								while($rows_pi = mysql_fetch_assoc($pi)){

		 	 ?>
		 	 				<a href="produto.php?id=<?php echo $rows_pi['cd_produto']; ?>">
							    <div>
							      <img src="../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>">
							    </div>
							</a>
		    <?php 
				}}

		     ?>
		     <?php 
		 		$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto4 from tb_slider_destaque);");
							if (mysql_num_rows($pi) > '0') {
								while($rows_pi = mysql_fetch_assoc($pi)){

		 	 ?>
		 	 				<a href="produto.php?id=<?php echo $rows_pi['cd_produto']; ?>">
							    <div>
							      <img src="../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>">
							    </div>
							</a>
		    <?php 
				}}

		     ?>
		     <?php 
		 		$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto5 from tb_slider_destaque);");
							if (mysql_num_rows($pi) > '0') {
								while($rows_pi = mysql_fetch_assoc($pi)){

		 	 ?>
		 	 				<a href="produto.php?id=<?php echo $rows_pi['cd_produto']; ?>">
							    <div>
							      <img src="../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>">
							    </div>
							</a>
		    <?php 
				}}

		     ?>
		     <?php 
		 		$pi = mysql_query("select cd_produto,im_produto from tb_produtos where cd_produto in (select cd_produto6 from tb_slider_destaque);");
							if (mysql_num_rows($pi) > '0') {
								while($rows_pi = mysql_fetch_assoc($pi)){

		 	 ?>
		 	 				<a href="produto.php?id=<?php echo $rows_pi['cd_produto']; ?>">
							    <div>
							      <img src="../imagens/produtos/<?php echo $rows_pi['im_produto']; ?>">
							    </div>
							</a>
		    <?php 
				}}

		     ?>
    <!--
    <div>
      <img src="../imagens/b31.jpg">
    </div>
    <div>
      <img src="../imagens/camisa_bleach.jpg">
    </div>
    <div>
      <img src="../imagens/deadpool.jpg">
    </div>
    <div>
      <img src="../imagens/caneca_naruto.jpg">
    </div>
    <div>
      <img src="../imagens/Overwatch.jpg">
    </div>
	-->
  </section>
	
	</div> 	


	<!-- - Contact Session - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --> 
	

	<!-- - Image to Top - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!-- <div>
		 <div class="goto-top"> top</div>
	</div>
	<script type="text/javascript" src="../javascript/scroll_top_wc.js"></script> -->
	<!-- - - FOOTER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    		<?php 
			include("Page Parts/footer.php");
		 	?>
	<!-- - Java Script Session - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<!-- When the user clicks on the button, scroll down -->
		<script type="text/javascript" src="../javascript/wc_scroll.js"></script>
		<!-- - Jquery 3.1.1- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<script type="text/javascript" src="../javascript/jquery3.js"></script>
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<!-- - TESTES- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<script type="text/javascript">
		 // When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	    if (document.body.scrollTop >= 700 || document.documentElement.scrollTop >= 700) {
	        document.getElementById("hello").style.display = "none";
	    } //else {
	        //document.getElementById("hello").style.display = "block";
	    //}

	    //- - - - - - - - - - - - - - - - - - - -Scrolltop button - - - - - - - - - - - - - - - - - - - - - - - -
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }

    /*- - - - - - - - - - - - - - - - - - - - nav - - - - - - - - - - - - - - - - - - - - - - - -
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        document.getElementById("mg").style.position = "fixed";
        document.getElementById("mg").style.top = "0px";
        document.getElementById("mg").style.width = "100%";


    } else {
        document.getElementById("mg").style.position = "relative";
        document.getElementById("mg").style.top = "0px";
    }
*/
	}



	function topFunction() {
    	document.body.scrollTop = 0;
    	document.documentElement.scrollTop = 0;
   		 document.getElementById("tl4").style.top = "680px";
	}

	





	</script>
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".vertical-center-4").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 2
      });
      $(".vertical-center-3").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".vertical-center-2").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2
      });
      $(".vertical-center").slick({
        dots: true,
        vertical: true,
        centerMode: true,
      });
      $(".vertical").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
    });
</script>
</div>
</body>
</html>