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
							$sql = " select f.cod_fale_conosco,f.nome as nome_pessoa,a.descricao as descricao_assunto from fale_conosco f inner join assunto a on(f.cod_assunto=a.cod_assunto) where f.cod_assunto = '".$_POST['cod_assunto']."'";
							
						//echo $sql; exit;
							
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							if($rows==0)
							{
								echo '<fieldset>';
								echo '<legend><font color="#FF0000">Erro</font></legend>';
								echo'<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px; margin:auto;">
Nenhum item corresponde &aacute; sua pesquisa.<br />';
								echo 'Verifique o <font color="#FF0000">nome da pessoa.</font></div>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="60%" align="left"> <b> M&eacute;dico </b> </td>';
							echo '   <td width="20%" align="center"> <b>Especialidade </b> </td>';
							echo '   <td width="20%" align="center" colspan="3" > <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									if( $linhas < 0 )
									{
										echo 'N&atilde;o h&aacute; reclamacoes_sugestoes cadastrado....';		
									}
			
									{
									//aqui coloca a cor no tabela
											
		
										echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
										echo '<td align="left" >  ' . $dados['nome_pessoa'] . '  </td>';
										echo '<td align="left" >  ' . $dados['descricao_assunto'] . '  </td>';
										
										echo '<td align="center">'; 
										echo '<a href="index.php?modulo=sugestoes_reclamacoes_ficha&acao=alterar&cod_fale_conosco='.$dados['cod_fale_conosco'].'"> <img src="Imagens/alterar.gif" title="Alterar" /> </a>';  
										echo'</td>';
										
										
											echo '<td align="center">'; 					
										echo '<a href="javascript:excluir(\''.$dados['nome_pessoa'].'\','.$dados['cod_fale_conosco'].');"> <img src="Imagens/Symbol Delete.gif" width="13" title="Excluir"  /> </a>';  
										echo'</td>';
										
											
										echo '</tr>';
									
										} // for .....
										
										
										} // if( $pagina == $pag_atual )...		
		
											if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										echo '</table>';
										
						if($rows > 0)//o total de registros so podera ser visto se o total de registros for maior que 1 caso contrario nao podera ser visto 
						{
							echo '<br>';
							echo 'Total de Registros Encontrados&nbsp;'.$rows.'.';
						}
						
echo'<div id="link_incluir">';//aqui é a div do link de incluir							
echo '<p align="right"><a href="index.php?modulo=sugestoes_reclamacoes_ficha&acao=incluir"> + Adicionar </a>';
echo'</div>';										
										
										// imprimindo os links para as páginas.....
										echo '<p></p>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<div id="centraliza_paginas">';
										echo '<a href="index.php?modulo=reclamacoes_sugestoes&pagina=1">Primeira</a> ';

										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=reclamacoes_sugestoes&pagina='.($pagina-1).'"> Anterior </a> '; }
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
											echo '&nbsp;<a href="index.php?modulo=reclamacoes_sugestoes&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=reclamacoes_sugestoes&pagina='.($pagina+1).'"> Próxima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
										
										echo '&nbsp;<a href="index.php?modulo=reclamacoes_sugestoes&pagina='.$tot_de_paginas.'"> Última</a> ';}
				echo'</div>';//aqui finaliza a minha div						
												
								
	
				?>
   </div><!---div_conteudo--->
