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
                    }}

        				 ?>
			       