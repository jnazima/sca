<?php 
include_once("../portal/funcoes.php");
	$conexao = conectar_bd();


?>


<div id="conteudo">
     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select * from cidade where cod_estado = '".$_POST['cod_estado']."'";
							
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							if($rows==0)
							{
							echo '<center>
<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px;">
Nenhum item corresponde &aacute; sua pesquisa.<br />';
								echo 'Verifique o nome ou contacte o administrador do sistema.</b></center>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="15%" align="left" class="style2"> <b> Nome </b> </td>';
							echo '   <td width="10%" align="center" colspan="2" class="style2"> <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									
		
										echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
										echo '   <td align="left" >  ' . $dados['nome_cidade'] . '  </td>';
										echo '   <td align="center">'; 
										echo '<a href="index.php?modulo=cidade_ficha&acao=alterar&cod_cidade='.$dados['cod_cidade'].'"> <img src="Imagens/alterar.gif" title="Alterar" /> </a>';  
										echo '</td>';
										echo '   <td align="center">'; 
										echo '<a href="javascript:excluir(\''.$dados['nome_cidade'].'\','.$dados['cod_cidade'].');"> <img src="Imagens/Symbol Delete.gif" width="13" title="Excluir"  /> </a>';  
										echo '</td>';
		
										echo ' </tr>';
									
										
										
										
										} // if( $pagina == $pag_atual )...		
		
											if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										echo '</table>';
										echo'<br />';
										echo 'Total de Registros Encontrados&nbsp;'.$rows.'.';
										
echo'<div id="link_incluir">';//aqui é a div do link de incluir							
echo '<p align="right"><a href="index.php?modulo=cidade_ficha&acao=incluir"> + Adicionar M&eacute;dico </a>';
echo'</div>';										
										
										// imprimindo os links para as páginas.....
										echo '<p></p>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<center>';
										echo '<a href="index.php?modulo=cidade&pagina=1">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=cidade&pagina='.($pagina-1).'"> Anterior </a> '; }
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
											echo '&nbsp;<a href="index.php?modulo=cidade&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=cidade&pagina='.($pagina+1).'"> Próxima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
										
										echo '&nbsp;<a href="index.php?modulo=cidade&pagina='.$tot_de_paginas.'"> Última</a> ';}
				echo'</center>';//aqui finaliza a minha div						
												
						
	
				?>
   </div><!---div_conteudo--->
