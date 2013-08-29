<!------------
<script type="text/javascript" src="../js/prototype.js"></script>
<script type="text/javascript" src="../js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="../js/lightbox.js"></script>

<link rel="stylesheet" href="CssPortal/lightbox.css" type="text/css" media="screen" />
------------------------------------------------------------------------------------------------------------->
<style type="text/css">
#div_huma_tudo
{
width:650px;
	height:auto;
	padding-left:10px;
	padding-bottom:10px;
	background-color:#ebebeb;
	line-height:17px;
	-moz-border-radius:8px;
	margin-top:5px;
	margin-left:2px;
	margin-bottom:3px;
		
}
#div_huma_nome_titulo
{
	width:650px;
	
	height:32px;
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:18px;
	padding-left:8px;
	padding-top:16px;
}
#div_huma_imagem
{
	float:left;
	width:200px;
	height:150px;
	padding-right:8px;
}
#div_huma_texto_noticia
{
	width:635px;
	height:auto;
	margin-left:8px;
	margin-right:5px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	padding-top:20px;
	padding-right:5px;
	padding-bottom:10px;
	text-align:justify;/*aqui faz com  que os quatros lados da minha div se ajuste auto maticamente*/
	line-height:180%;
	
}
#div_objetivo_titulo
{
	width:650px;
	height:22px;
	padding-top:8px;
	padding-left:8px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;	
}
#div_objetivos_principais/*aqui fica o texto do objetivo */
{
	width:650px;
	height:110px;
	line-height:180%;
	font-size:12px;
}
#div_grupos_pre
{
	width:650px;
	height:22px;
	padding-top:8px;
	padding-left:8px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;	
}
#div_grupos_pretendemos/*aqui fica o conteudo aqui tem um erro nao resovido*/
{
	width:650px;
	height:110px;
	line-height:180%;
	font-size:12px;
}
#div_link_noticia_tudo
{
	width:650px;
	height:auto;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	padding-top:35px;	
}
#div_link_vejaMaisNoticias
{
	width:650px;
	height:10;
	padding-left:5px;
	padding-top:5px;
	background-color:#ccc;
	padding-bottom:10px;
	
}
/*-----------------------------------------------------------------------------------------*/
#div_lista_ordenada_noticias,ul,li,a
{
	text-decoration:none;
	color:#000;
	
}
#div_lista_ordenada_noticias,ol,li,a
{
	width:650px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#000;
	list-style:none; /*aqui eu faco com que nao mostre a numeracao da lista ordenada */
	line-height:180%;
}
/*----------------------------------------------------------------------------------------*/
#div_huma_voltar
{
	width:650px;
	height:auto;
	padding-left:5px;
	
}
#div_nome_font
{
	float:right;
	width:650px;
	height:auto;
	text-align:right;
	padding-right:10px;
}
</style>
<div id="div_huma_tudo"><!-----aqui comeca a minha div_huma_tudo------>
<div align="right" style="margin-right:8px; padding-top:5px;">
<a href="index.php">Voltar a Home Page</a>
</div>
<?php
	
$sql = "select * from  humanizacao 
		where cod_humanizacao =".$_GET['cod_humanizacao'];
		
			//echo $sql; exit;
	// enviando o comando sql que está na var. $sql para o banco de dados
	$result = mysql_query( $sql, $conexao);
	
	// obtendo o total de linhas/registros da consulta armazenada em $result
	$total_registros = mysql_num_rows($result);
	
		
		
		while( $dados = mysql_fetch_array($result))
			{	
				echo '<div id="div_huma_nome_titulo">' .$dados['titulo']. '</div>';//aqui fica div do titulo da noticia
		
				//echo  $dados['noticia'];
		
			$sql_fotos="select distinct cod_foto,extensao from fotos_humanizacao where cod_humanizacao='" . $dados['cod_humanizacao']. "' ";
		
			$result_fotos= mysql_query($sql_fotos,$conexao);
			
	 		$total_registrosFotos = mysql_num_rows($result_fotos);
	        
			if($total_registrosFotos > 0)
			{
				if($total_registrosFotos == 1)
				{
				
				    $dados_fotos = mysql_fetch_array($result_fotos);
				    $arquivo = "../adm/fotos_humanizacao/".$dados_fotos['cod_foto'].".".$dados_fotos['extensao'];
//===== aqui e a  div da foto da noticia ===============================================

			    	   echo'<div id="div_huma_imagem">';//aqui comeca a div da imagem
					 //echo'<a href="'.$arquivo.'"  rel="lightbox[n]">';
				   	   echo'<img src="'.$arquivo.'"  width="200" border="none">';//aqui pega o codigo da imagem relacionada com a noticia
					 //echo'</a>';		     
					   echo'</div>';//aqui termina adiv das imagens
			
//===== aqui termina a div da imagem ====================================================

//===== aqui termina a div da noticia ===================================================			
					   echo '<div id="div_huma_texto_noticia">';
	                   echo $dados['noticia'];
	                   echo '</div>';
//========== aqui termian a div da noticia ==================================================

//==== aqui comeca o objetivo titulo da humanizacao =========================================
                  
				  
				   $cod_humanizacao=$_GET['cod_humanizacao'];//aqui eu pego o codigo da noticia via get
					if($cod_humanizacao==9)//aqui verifico se o codigo em igual 9
					{
					   echo '<div id="div_objetivo_titulo">';
	                   //echo $dados['objetivos_titulo'];
	                   echo 'Objetivo:';
					   echo '</div>';
//== aqui termina a div objetivo titulo da humanizacao =====================================
			
//=== aqui comeca o objetivo titulo da humanizacao =========================================
                       echo '<div id="div_objetivos_principais">';
	                   echo '<ul>';
					   echo '<li>Diseeminar uma nova cultura de atendimento humanizado na Santa Casa de Adamantina
</li>';
					   echo '<li>Capacitar profissionais para um melhor atendimento
</li>';
					   echo '<li>Valorizar a cidadania e os direitos humanos
</li>';
					   echo '<li>Implantar iniciativas que valorizem pacientes e funcionarios
</li>';
					   echo '<li>Integrar a equipe profissional
</li>';
	                   echo '</ul>';
					   echo '</div>';
				
//=== aqui termina a div objetivo titulo da humanizacao

//=== aqui comeca o grupos pretendemos: da humanizacao =========================================
                       echo '<div id="div_grupos_pre">';
	                   //echo $dados['objetivos_titulo'];
	                   echo 'Com esses grupos pretendemos:';
					   echo '</div>';
//=== aqui termina a div objetivo titulo da humanizacao =====================================
			
//=== aqui comeca o objetivo titulo da humanizacao =========================================
                       echo '<div id="div_grupos_pretendemos">';
	                   echo '<ul>';
					   echo '<li>Contribuir para a educação continuada;</li>';
					   echo '<li>Treinamento de profissionais;</li>';
					   echo '<li>Divulgação de temáticas que interessem o coletivo;</li>';
					   echo '<li>Proporcionar um ambiente democrático;</li>';
					   echo '<li>Abrir um espaço de reflexões e vivencias.</li>';
	                   echo '</ul>';
					   echo '</div>';
					}
//=== aqui termina a div objetivo titulo da humanizacao ===========

					
					echo '<div id="div_nome_font">';//aqui fica a font da noticia
					 echo 'Font Original:&nbsp;'.$dados['font'];//aqui fica a font da noticia
					 echo'<br 	/>Data da not&iacute;cia:'.'&nbsp;'. DataUSA_to_BR($dados['data_noticia']);//aqui fica a data da noticia noticia 
					echo'</div>';

$cod_humanizacao=$_GET['cod_humanizacao'];//aqui eu pego o codigo da noticia via get
					if($cod_humanizacao!=9)//aqui verifico se o codigo em igual 9
					{
						echo'<div id="div_huma_voltar">';
                        echo'<a href = "index.php?modulo=humanizacao&cod_humanizacao=9">Voltar ::::</a>';//link para voltar a pagina inicial da pagina 
                        echo'</div>';
                    }



//=== aqui comeca a div leia mais ====================
				echo '<div id="div_link_noticia_tudo">';
				echo '<div id="div_link_vejaMaisNoticias">';
				echo'+&nbsp;Veja Mais Not&iacute;cias:';
				echo'</div>';
	
		$sql = "select cod_humanizacao,titulo from humanizacao";
		
	$r = mysql_query($sql, $conexao);

 	if( mysql_num_rows($r) == 0 )
	{
		
	echo '<center>'.'Não ha nenhuma noticia cadastrada'.'</center>';
	}
	echo '<div id="div_lista_ordenada_noticias">';
	echo '<ul>';
	
	while( $dados = mysql_fetch_array($r) )
	{		
	
					

		echo '<li>'.'<a href = "index.php?modulo=humanizacao&cod_humanizacao='.$dados['cod_humanizacao'].'">'.$dados['titulo'] .'</a>'.'</li>';
					
	} // while produtos
	echo'</ul>'.'</div>';
				
	echo '</div>';//==== aqui termina a div ===============
				
				
				}
				else
				{
					while($fotos = mysql_fetch_array($result_fotos))
					{
					
						$arquivo = "../adm/fotos_humanizacao/".$fotos['cod_foto'].".".$fotos['extensao'];
						
						//echo'<a href="'.$arquivo.'"  rel="lightbox[n]">//aqui faz o efeito do laytbox das imagens
						  echo'<img src="'.$arquivo.'"  width="200" border="none">';//aqui pega o codigo da imagem relacionada com a noticia
						//echo '</a>';//aqui termina o link do efeito
					}//fecha while
					
    			}//fecha else
		}//fecha if total_registrosFotos == 1
			else
			{
				echo '<script language="javascript"> 
							alert("Não a fotos cadastradas");
							document.location = "index.php?modulo=listarbercariovirtual";
					  </script>';
			}
	 		
			
			
		
	}//fecha while do resultado da query
	
	



?>
<hr /><div align="right" style="margin-right:8px; padding-top:5px;">
<a href="index.php">Voltar a Home Page</a>
</div>
</div><!-----aqui fecha a minha div_huma_tudo------>
<!----------------------------separacao de código font-------------------------------------------------->


