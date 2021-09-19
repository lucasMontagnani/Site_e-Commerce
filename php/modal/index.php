<!DOCTYPE html>
<html lang="pt-br">
<head>
	<script type="text/javascript" src="JQUERY/jquery-3.3.1.min.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
  background-color: white;
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.5);
  border-radius: 10px;
  overflow: hidden;
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
</style>

<button onclick='ver_modal()'>abre</button>

<div class="modal">
  <div class="pop_up">
    <button class="close_modal" onclick="close_modal()">&times;</button>  
		<div id="conteudo">
			

		</div>
 </div>
</div>  

</body>
</html>
<script type="text/javascript">

function ver_modal(){
	 $.ajax({  
                url:"texto.php",  
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












