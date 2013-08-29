<style type="text/css">
#div_erro_fieldset
{
	width:655px;
	height:100px;
}
#div_noticias_tudo
{
	width:655px;
	height:auto;
	padding-top:20px;
}
#div_linha_divisoria
{width:635px;
border-bottom:solid 1px #CCC;
}
#div_nome_modulo
{
	width:635px;
	height:20px;
	font-size:18px;
	padding-left:20px;
	padding-top:5px;
	padding-bottom:3px;
	color:#066;
	background-color:#ccc;
}
#div_tudo_conteudo
{
	float:left;
	width:635px;
	margin-top:10px;
}
#div_titulo_noticias
{
	width:655px;
	margin-top:10px;
	font-size:11px;
	
}
#div_titulo_da_noticia
{
	width:615px;
	font-size:11px;
	font-weight:bold;
	padding-left:30px;
	padding-right:10px;
	color:#099;


}
#div_subtitulos_noticia
{
	width:615px;
	font-size:11px;
	padding-left:30px;
	padding-right:10px;
	margin-top:10px;
	color:#000;

}
#div_link_noticia
{
	width:615px;
	padding-left:30px;
	padding-right:10px;
	padding-top:10px;
	padding-bottom:5px;
}
#div_link_noticia a
{
	color:#06F;
	font-weight:bolder;
	font-size:12px;
	
}
#div_link_paginas
{
	float:left;
	width:655px;
	height:20px;
	
	text-align:center;
	padding-top:15px;
	padding-bottom:15px;
}
</style>


    <div id="conteudo">
     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select * from noticia where destaque = 's' and situacao =1 and ver_noticias =1 order by cod_noticia desc";
													
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							if($rows==0)
							{

echo'<fieldset id="div_erro_fieldset">';
echo'<legend>Erro</legend>';
echo'<div id="div_noticias_erro">';
							

echo'Nenhum item corresponde &aacute; sua pesquisa.';

echo 'Verifique o  <font color="#FF0000">Nome da Cidade</font> ou contacte o administrador do sistema.';
echo'</div>';							

echo'</fieldset>';	
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
		echo '<div id="div_noticias_tudo">';//aqui começa a minha div_noticias_tudo 
		echo'<div id="div_nome_modulo">Noticias&nbsp;:.</div>';//nome do modulo
		
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
									if( $linhas < 0 )
									{
										echo 'N&atilde;o h&aacute; cidade cadastrado....';		
									}
			
									{
			echo'<div id="div_tudo_conteudo">';		
			echo'<div id="div_titulo_noticias">'; 
	    	
			echo '<div id="div_titulo_da_noticia">'.ucfirst($dados['titulo']).'</div>';
			
			
					
            echo '<div id="div_subtitulos_noticia">' .$dados['subtitulo'].'</div>';
		    
			echo '<div id="div_link_noticia"><a href ="index.php?modulo=noticia&acao=ver_outras_noticias&cod_noticia='.$dados['cod_noticia'].'" >Leia mais...</a>'.'</div>';
			echo'<div id="div_linha_divisoria">&nbsp;</div>';

		echo'</div>';				
		echo'</div>';//aqui fecha a div conteudo
							    	}
								}
								if( $i % $tot_por_pagina == 0 ) 
								{
								   $pag_atual++;
							    }
					            $i++;				
							}
						if($rows>0)
							{				
						echo '</div>';//aqui fecha a div tudo
							}
							
						/*if($rows > 0)//o total de registros so podera ser visto se o total de registros for maior que 1 caso contrario nao podera ser visto 
						{
							
							echo 'Total de Registros Encontrados&nbsp;'.$rows.'.';
						}*/
										
										// imprimindo os links para as páginas.....
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<div id="div_link_paginas">';
										echo '<a href="index.php?modulo=cidade&pagina=1">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=noticias&pagina='.($pagina-1).'"> Anterior </a> '; }
										else
										{ echo '&nbspAnterior'; }
										}
									
									
										if( $pagina - 3 > 0 )
										{ $p0 = $pagina - 3; }
										else
										{ $p0 = 1; }
										
										if( $pagina + 3 <= $tot_de_paginas )
										{ $pf = $pagina + 3; }
										else
										{ $pf = $tot_de_paginas; }
										
										if( $pf < 7 and $tot_de_paginas > 7 ) { $pf = 7; }
										
										
										for($i=$p0; $i<=$pf; $i++)
										{
											echo '&nbsp;<a href="index.php?modulo=noticias&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=noticias&pagina='.($pagina+1).'"> Próxima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
echo '&nbsp;<a href="index.php?modulo=noticias&pagina='.$tot_de_paginas.'"> Última</a> ';}
				echo'</div>';//aqui finaliza a minha div						
										
				?>
   </div><!---div_conteudo--->
 
