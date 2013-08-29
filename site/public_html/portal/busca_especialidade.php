<?php 
include_once("../portal/funcoes.php");
	$conexao = conectar_bd();


?>
<style type="text/css">
.corpo_clinico_nome
{
	width:610px;
	float:left;
	font-size:14px;
	text-align:left;
	list-style-image:url(Imagens/tick2.gif);	
}
.nome_medico_descricao
{
	font-size:14px;
	text-align:left;
	list-style-image:url(Imagens/tick2.gif);
	padding-bottom:10px;
}
#conteudo
{
	float:left;
	width:610px;
	height:400px;
	
}
#div_centraliza_prev_next
{
	float:left;
	width:610px;
	height:20px;
	background-color:#edecec;
	padding-top:5px;
	text-align:center;	
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
							$sql = " select m.nome as nome_medico,m.crm as registro,m.sexo as sexo_medico,e.descricao as nome_especialidade 
from medico m inner join especialidade e
 on(m.cod_especialidade =e.cod_especialidade)
 where m.cod_especialidade = '".$_POST['cod_especialidade']."'";
							
							
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							if($rows==0)
							{
							echo '<fieldset>';
								echo '<legend><font color="#FF0000">Erro</font></legend>';
								echo'<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px; margin:auto;">
Nenhum item corresponde &aacute; sua pesquisa.<br />';
								echo 'Verifique a  <font color="#FF0000">especialidade do m&eacute;dico </font> </b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<ul class="corpo_clinico_nome">';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
								if($dados['sexo_medico']== 'f')//verificação se o medico é o sexo masculino ou femilino
									{	
		echo'<li  class="nome_medico_descricao"><font color="#3c80a9">Dra:&nbsp;'.$dados['nome_medico'].'</font><br />&nbsp;<font color="#888888"size="1">Especialidade&nbsp;'.$dados['nome_especialidade'].'</font></li>';
		}
		else
		{
			echo'<li  class="nome_medico_descricao"><font color="#3c80a9">Dra:&nbsp;'.$dados['nome_medico'].'</font><br />&nbsp;<font color="#888888"size="1">Especialidade&nbsp;'.$dados['nome_especialidade'].'</font></li>';
		
		}
								} // if( $pagina == $pag_atual )...		
		
								if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
								$i++;			
											
							} // while....
										
										echo '</ul>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<div id="div_centraliza_prev_next">';
										echo '<a href="index.php?modulo=corpoclinico&pagina=1">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=corpoclinico&pagina='.($pagina-1).'"> Anterior </a> '; }
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
											echo '&nbsp;<a href="index.php?modulo=corpoclinico&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=medico&pagina='.($pagina+1).'"> Próxima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
										
										echo '&nbsp;<a href="index.php?modulo=corpoclinico&pagina='.$tot_de_paginas.'"> Última</a> ';}
				echo'</div>';//aqui finaliza a minha div						
												
								
	
				?>
   </div><!---div_conteudo--->
