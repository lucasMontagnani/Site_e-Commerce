<?php 
include("../php/connection.php");
// INSERINDO PRODUTO-----------------------------------------------------
$pro_name = $_POST['pro_name']; 
$pro_descricao = $_POST['pro_descricao']; 
$pro_value = $_POST['pro_value']; 
$pro_color = $_POST['pro_color']; 
$pro_cat = $_POST['pro_cat']; 
$pro_sub_cat = $_POST['pro_sub_cat']; 
$pro_weight = $_POST['pro_weight']; 
$pro_word1 = $_POST['pro_word1']; 
$pro_word2 = $_POST['pro_word2']; 
$pro_word3 = $_POST['pro_word3']; 
$pro_word4 = $_POST['pro_word4']; 

$pro_qtd_u = $_POST['pro_qtd_u']; 
$pro_qtd_p = $_POST['pro_qtd_p']; 
$pro_qtd_m = $_POST['pro_qtd_m']; 
$pro_qtd_g = $_POST['pro_qtd_g']; 
$pro_qtd_gg = $_POST['pro_qtd_gg']; 


				$ex = strtolower(substr($_FILES['pro_image']['name'], -4));
					$nn = md5(time()).$ex;
					$dir = "../imagens/produtos/";
					move_uploaded_file($_FILES['pro_image']['tmp_name'], $dir.$nn);
					$query_insert = mysql_query("call sp_insere_produto('$pro_name','$pro_descricao','$nn','$pro_weight','$pro_value','$pro_color','$pro_cat','$pro_sub_cat','$pro_word1','$pro_word2','$pro_word3','$pro_word4','$pro_qtd_u','$pro_qtd_p','$pro_qtd_m','$pro_qtd_g','$pro_qtd_gg')");
			

					if($query_insert){
						echo "Publicação inserida com sucesso!";
						header("Location: insere_produto_adm.php");
						//mysql_error();
						//mysql_errno();
						//echo mysql_error();
						//echo "tchau";

					}else{
					header("Location: insere_produto_adm.php");
						//mysql_error();
						//mysql_errno();
						//echo mysql_error();
						//echo "oi";
				}

 ?>