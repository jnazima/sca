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
							$sql = " select m.*,e.descricao as nome_especialidade 
from medico m inner join especialidade e
 on(m.cod_especialidade =e.cod_especialidade)
 where m.cod_especialidade = '".$_POST['cod_especialidade']."'";
							
							
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							$cod_especialidade = $_POST['cod_especialidade'];
							
							if($cod_especialidade == 0)
							{
					         echo '<fieldset>';
								echo '<legend><font color="#FF0000">Erro</font></legend>';
								echo'<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px; margin:auto;">';
								echo 'O C&oacute;digo da especialidade do m&eacute;dico n&atilde;o podera ser igual a zero...';
echo '</div>';
								echo '</fieldset>';
							}
							
							else
							
							if($rows==0)
							{
							echo '<fieldset>';
								echo '<legend><font color="#FF0000">Erro</font></legend>';
								echo'<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px; margin:auto;">
Nenhum item corresponde &aacute; sua pesquisa.<br />';
								echo 'Verifique a  <font color="#FF0000">especialidade do m&eacute;dico </font> ou contacte o administrador do sistema.</b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="50%" align="left"> <b> M&eacute;dico </b> </td>';
							echo '   <td width="30%" align="center"> <b> Especialidade</b> </td>';
							echo '   <td width="20%" align="center" colspan="3"> <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									
		
										echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
										echo '   <td align="left" >  ' . $dados['nome'] . '  </td>';
										echo '   <td align="left" >  ' . $dados['nome_especialidade'] . '  </td>';
echo '   <td align="center">'; 
echo '<a href="index.php?modulo=medico_ficha&acao=alterar&cod_medico='.$dados['cod_medico'].'"> <img src="Imagens/alterar.gif" title="Alterar" /> </a>';  
										echo'</td>';
										
										echo '   <td align="center">'; 
echo '<a href="javascript:excluir(\''.$dados['nome'].'\','.$dados['cod_medico'].');"> <img src="Imagens/Symbol Delete.gif" width="13" title="Excluir"  /> </a>';  
										echo '</td>';
										
										echo '   <td align="center">'; 
										
		echo '<a href="javascript:abrir_fotos('.$dados['cod_medico'].');">&nbsp;<img src="Imagens/Correct.gif" width="13" title="Adiciona Fotos" /></a>';//funcao carrega fotos
echo'</td>';
		
										echo ' </tr>';
									
										
										
										
										} // if( $pagina == $pag_atual )...		
		
											if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										echo '</table>';
										echo'<br />';
										
										if($rows >0)
										{
										echo 'Total de Registros Encontrados&nbsp;'.$rows.'.';
										}
echo'<div id="link_incluir">';//aqui é a div do link de incluir							
echo '<p align="right"><a href="index.php?modulo=medico_ficha&acao=incluir"> + Adicionar M&eacute;dico </a>';
echo'</div>';										
										
										// imprimindo os links para as páginas.....
										echo '<p></p>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<center>';
										echo '<a href="index.php?modulo=medico&pagina=1">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=medico&pagina='.($pagina-1).'"> Anterior </a> '; }
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
											echo '&nbsp;<a href="index.php?modulo=medico&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=medico&pagina='.($pagina+1).'"> Próxima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
										
										echo '&nbsp;<a href="index.php?modulo=medico&pagina='.$tot_de_paginas.'"> Última</a> ';}
				echo'</center>';//aqui finaliza a minha div						
												
								
	
				?>
   </div><!---div_conteudo--->
