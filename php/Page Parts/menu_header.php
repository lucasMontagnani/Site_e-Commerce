
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  .modal{
  display: none;
  position: fixed;
  width: 100vw;
  height: 100vh;
  top: 0;
  left: 0;
  background-color: rgba(0,0,0,.8);

}
.modal .pop_up{
  position: absolute;
  top: -50%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 700px;

  padding: 40px;
  background-color: black;
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.5);
  border-radius: 10px;
  overflow: hidden;
  border:solid;
  border-width: 3px;
  border-color: orange;
}

.modal h2{
  font-size: 50px;
  color: orange;
}

.modal label{
  margin-right: 530px;
  font-size: 20px;
  width: 100px;
}

.modal .pop_up .close_modal{
  position: absolute;
  cursor: pointer;
  right: 10px;
  top: 10px;
  width: 30px;
  height: 30px;
  background-size: contain;
}
        #modalog{
            font-family: "edosz" !important ;
            color: black !important; 
        }

        #modalog input[type="submit"],
        #modalog input[type="button"] {
            font-family: "edosz" !important ;
            font-size: 25px !important ; 
            position: relative;
            
            color: black;
            margin: 0 auto;
            background: orange;
            text-align: center;
            font-style: normal;
            border: 1px solid #ef9c00;
            border-width: 2px 2px 4px;

            border-radius: 3px;
        }
        #modalog input[type="submit"]:hover,
        #modalog input[type="button"]:hover
        {
            background: #ef9c00;
            transition: 0.2s ease-in !important ;
            border-radius: 10px;
        }
        #email, #se{
            width: 90%;
            font-family: "TheDolbak-Brush" !important ;
            font-size: 20px !important ; 
            position: relative;
            padding: 10px 20px 10px 20px;
            margin: 0 auto;
            text-align: center;
            font-style: normal;
            border: 1px solid #ef9c00;
            border-width: 1px 1px 3px;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        #email:hover, #se:hover{
            transition: 0.2s ease-in !important ;
            border-radius: 30px;
        }


.close_modal {
    position: absolute;
    top: 45px;
    margin-right: 15px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close_modal:hover,
.close_modal:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}







@font-face {
             font-family: edosz;
             src: url('../fontes/edosz.ttf');
    }
    @font-face {
             font-family: TheDolbak-Brush;
             src: url('../fontes/TheDolbak-Brush.ttf');
    }


     #search input[type="submit"],
        #search input[type="button"] {
          font-family: "edosz" !important ;
          font-size: 15px !important ; 
            position: relative;
            
            color: black;
            margin: 0 auto;
            background: orange;
            text-align: center;
            font-style: normal;
            border: 1px solid #ef9c00;
            border-width: 1px 1px 3px;

            border-radius: 3px;
        }
  #search input[type="submit"]:hover,
        #search input[type="button"]:hover
        {
            background: #ef9c00;
            transition: 0.2s ease-in !important ;
            border-radius: 10px;
        }


 /* #search input[type="text"]{
    width: 60%;
  }  
  #search input[type="submit"]{
    width: 30%;
  }  */
</style>
</head>
<body>
<!-- - MENU HEADER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
  <div id="mall">
    <div class="minimenu"> 
      <ul align="right" id="ls">
        <?php 
          if (isset($e) && isset($s)) {
            echo "<li><a href='../php/pagina_usuario.php'>$e</a></li>
                  <div class='log'><b>|</b></div>
                  <div class='user'><li><a href='../php/logout.php'>LOG OUT</a></li></div>"; 
          }else{
            echo "<li><a href='../php/login.php'>LOGIN</a></li>
                  <div class='log'><b>|</b></div>
                  <div class='user'><li><a href='../php/signup.php'>CADASTRO</a></li></div>";
          }   
        ?>
      </ul> 
    </div>

    <div class="menu">
      <ul align="right">
        <li>
          <div id="logo">
            <a href="homepage.php"><!-- <img src="../imagens/signup-login/menu_logo2.png" width="150" height="121"  /> --></a>
          </div>
        </li>
        <li>
          <div id="search">
            <form action="search_page.php" method="post">
              <input type="text" name="search">
              <input type="submit" value="BUSCAR">
            </form>
          </div>
        </li>
        <?php 
          if (isset($e) && isset($s)) {
            echo "<li><a href='../php/pagina_usuario.php'>PERFIL</a></li>"; 
          }else{
            echo "<li><a href='../php/login.php'>LOGIN</a></li>";
          }   
        ?>
        <li><a href="../php/homepage.php">PAGINA INICIAL</a></li>
        <div class="dropdown">
          <li class="dropbtn"><a href="../php/exibir_lista.php">PRODUTOS</a></li>
           <div class="dropdown-content">
            <?php echo '<a href="../php/exibir_lista.php?cat=1">Camisas</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=2">Casaco</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=3">Caneca</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=4">Chaveiro</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=5">Outros</a>'; ?>
          </div>
        </div>
        <div class="dropdown">
          <li class="dropbtn"><a href="../php/exibir_lista.php">ESTILOS</a></li>
          <div class="dropdown-content">
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=1">Rock</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=2">Games</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=3">Series</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=4">Filmes</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=5">Animes</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=6">Outros</a>'; ?>
          </div>
        </div>
        <li><a href="../php/posts.php">POSTS</a></li>
        <div class="carrinho">
          <?php 
            if (isset($e) && isset($s)) {
          ?>
            <a href="carrinho.php"><img src="../imagens/signup-login/carrinho2.png" width="35" height="35" onMouseOver="this.src='../imagens/signup-login/carrinho.png'" onMouseOut="this.src='../imagens/signup-login/carrinho2.png'"></a>
          <?php 
            }else{
          ?>
            <img src="../imagens/signup-login/carrinho2.png" width="35" height="35" onMouseOver="this.src='../imagens/signup-login/carrinho.png'" onMouseOut="this.src='../imagens/signup-login/carrinho2.png'" onclick='ver_modal()'>
          <?php 
            }   
          ?> 
        </div>

        <div class="modal">
          <div class="pop_up">
            <span class="close_modal" onclick="close_modal()">&times;</span>  
            <div id="conteudo">
            </div>
          </div>
        </div>  

      </ul>
    </div>
  </div>




    <ul align="right" id="menu_f">
        <li>
          <div id="logo">
            <a href="homepage.php"></a>
          </div>
        </li>
        <li>
          <div id="search">
            <form action="search_page.php" method="post">
              <input type="text" name="search">
              <input type="submit" value="BUSCAR">
            </form>
          </div>
        </li>
        <?php 
          if (isset($e) && isset($s)) {
            echo "<li><a href='../php/pagina_usuario.php'>PERFIL</a></li>"; 
          }else{
            echo "<li><a href='../php/login.php'>LOGIN</a></li>";
          }   
        ?>
        <li><a href="../php/homepage.php">PAGINA INICIAL</a></li>
        <div class="dropdown">
          <li class="dropbtn"><a href="../php/exibir_lista.php">PRODUTOS</a></li>
          <div class="dropdown-content">
            <?php echo '<a href="../php/exibir_lista.php?cat=1">Camisas</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=2">Casaco</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=3">Caneca</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=4">Chaveiro</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=5">Outros</a>'; ?>
          </div>
        </div>
        <div class="dropdown">
          <li class="dropbtn"><a href="../php/exibir_lista.php">ESTILOS</a></li>
          <div class="dropdown-content">
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=1">Rock</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=2">Games</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=3">Series</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=4">Filmes</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=5">Animes</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=6">Outros</a>'; ?>
          </div>
        </div>
        <li><a href="../php/posts.php">POSTS</a></li>
        <div class="carrinho">
          <?php 
            if (isset($e) && isset($s)) {
          ?>
            <a href="carrinho.php"><img src="../imagens/signup-login/carrinho2.png" width="35" height="35" onMouseOver="this.src='../imagens/signup-login/carrinho.png'" onMouseOut="this.src='../imagens/signup-login/carrinho2.png'"></a>
          <?php 
            }else{
          ?>
            <img src="../imagens/signup-login/carrinho2.png" width="35" height="35" onMouseOver="this.src='../imagens/signup-login/carrinho.png'" onMouseOut="this.src='../imagens/signup-login/carrinho2.png'" onclick='ver_modal()'>
          <?php 
            }   
          ?> 
        </div>

     </ul>
      
      <!-- <div id="menu_b">
        <div id="thing" onclick="shablaw()">
          
        </div>
      </div> -->

      <div id="menu_s">
        <ul>
        <li>
          <div id="search">
            <form action="search_page.php" method="post">
              <input type="text" name="search">
              <input type="submit" value="BUSCAR">
            </form>
          </div>
        </li>
        <hr>
        <?php 
          if (isset($e) && isset($s)) {
            echo "<li><a href='../php/pagina_usuario.php'>PERFIL</a></li>"; 
          }else{
            echo "<li><a href='../php/login.php'>LOGIN</a></li>";
          }   
        ?>
        <hr>
        <li><a href="../php/homepage.php">PAGINA INICIAL</a></li>
        <hr>
        <div class="dropdown">
          <li class="dropbtn"><a href="../php/exibir_lista.php">PRODUTOS</a></li>
           <div class="dropdown-content">
            <?php echo '<a href="../php/exibir_lista.php?cat=1">Camisas</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=2">Casaco</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=3">Caneca</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=4">Chaveiro</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?cat=5">Outros</a>'; ?>
          </div>
        </div>
        <hr>

        <div class="dropdown">
          <li class="dropbtn"><a href="../php/exibir_lista.php">ESTILOS</a></li>
          <div class="dropdown-content">
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=1">Rock</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=2">Games</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=3">Series</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=4">Filmes</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=5">Animes</a>'; ?>
            <?php echo '<a href="../php/exibir_lista.php?sub_cat=6">Outros</a>'; ?>
          </div>
        </div>
        <hr>
        <li><a href="../php/posts.php">POSTS</a></li>
        <hr>
        <div class="carrinho">
          <?php 
            if (isset($e) && isset($s)) {
          ?>
            <a href="carrinho.php"><img src="../imagens/signup-login/carrinho2.png" width="35" height="35" onMouseOver="this.src='../imagens/signup-login/carrinho.png'" onMouseOut="this.src='../imagens/signup-login/carrinho2.png'"></a>
          <?php 
            }else{
          ?>
            <img src="../imagens/signup-login/carrinho2.png" width="35" height="35" onMouseOver="this.src='../imagens/signup-login/carrinho.png'" onMouseOut="this.src='../imagens/signup-login/carrinho2.png'" onclick='ver_modal()'>
          <?php 
            }   
          ?> 
        </div>

        </ul>
      </div> 
  <!-- <br><br><br><br><br><br> -->

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



    var w = window.innerWidth;
    // var h = window.innerHeight;
         window.onscroll = function() {scrollFunction()};
     function scrollFunction()  {
       
         if ((document.body.scrollTop > 200 && w > 879) || (document.documentElement.scrollTop > 200 && w > 879)) {
           document.getElementById("menu_f").style.display = "inline-block";
         } else {

           document.getElementById("menu_f").style.display = "none";
         }


           //- - - - - - - - - - - - - - - - - - - -Scrolltop button - - - - - - - - - - - - - - - - - - - - - - - -
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
        }
    }

    

/*
function resiza() {
    var w = window.outerWidth;
    var h = window.outerHeight;
    console.log(w);
    if (w1 > 879) {
     window.onscroll = function() {scrollFunction()};
     function scrollFunction()  {
       
         if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
           document.getElementById("menu_f").style.display = "inline-block";
         } else {
           document.getElementById("menu_f").style.display = "none";
         }
    }
    }else{
      //document.getElementById("thing").style.display = "none";
    }
}*/
      
   

  </script>
</body>
</html>