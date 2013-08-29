<script language="javascript">

// Início do código de Aumentar/ Diminuir a letra
 
// Para usar coloque o comando: "javascript:mudaTamanho('tag_ou_id_alvo', -1);" para diminuir
// e o comando "javascript:mudaTamanho('tag_ou_id_alvo', +1);" para aumentar
 
var tagAlvo = new Array('p'); //pega todas as tags p//
 
// Especificando os possíveis tamanhos de fontes, poderia ser: x-small, small...
var tamanhos = new Array( '9px','10px','11px','12px','13px','14px','15px','18px' );
var tamanhoInicial = 2;
 
function mudaTamanho( idAlvo,acao ){
  if (!document.getElementById) return
  var selecionados = null,tamanho = tamanhoInicial,i,j,tagsAlvo;
  tamanho += acao;
  if ( tamanho < 0 ) tamanho = 0;
  if ( tamanho > 6 ) tamanho = 6;
  tamanhoInicial = tamanho;
  if ( !( selecionados = document.getElementById( idAlvo ) ) ) selecionados = document.getElementsByTagName( idAlvo )[ 0 ];
  
  selecionados.style.fontSize = tamanhos[ tamanho ];
  
  for ( i = 0; i < tagAlvo.length; i++ ){
    tagsAlvo = selecionados.getElementsByTagName( tagAlvo[ i ] );
    for ( j = 0; j < tagsAlvo.length; j++ ) tagsAlvo[ j ].style.fontSize = tamanhos[ tamanho ];
  }
}
// Fim do código de Aumentar/ Diminuir a letra
 

</SCRIPT>
<style type="text/css">
#corpo_Clinico_tudo
{
	width:644px;
	height:700px;
	padding-top:30px;
}
/*--------------------div diminui e almenta texto e titulo do modulo--------------------------------------------*/

#almenta_diminue_texto_nome_modulo
{
	width:650px;
	height:35px;
	
}
.almenta_diminue_texto_link
{
	float:right;
	padding-top:5px;
	padding-left:10px;
}
#almenta_diminue_texto
{
	float:left;
	width:325px;
	height:35px;
}
#titulo_corpo_Clinico
{
	margin-top:10px;
	float:left;
	width:315px;
	height:25px;
	font-family:verdana;
	font-size:16px;
	color:#678bb1;
	/*padding-top:5px;*/
	padding-left:5px;
}
/*----------------------------------------------------------------*/


#conteudo
{
	float:left;
	width:650px;
	height:auto;
	
}
#div_especialidade
{
	float:left;
	width:650px;
	height:auto;

}
#div_pesquisa
{
	float:left;
	width:650px;
	height:auto;
	padding-top:10px;
	padding-bottom:0px;
	margin-bottom:10px;
	
}

.corpo_clinico_nome_medico
{
	width:610px;
	float:left;
	
}
.nome_medico_descricao
{
	font-size:14px;
	text-align:left;
	list-style-image:url(Imagens/tick2.gif);
	padding-bottom:10px;
}
#centraliza_paginas 
{
	float:left;
	width:610px;
	height:20px;
	background-color:#edecec;
	padding-top:5px;
	text-align:center;
	margin-bottom:10px;
}
#div_conteudo_corpo
{
	width:630px;
	height:auto;
	padding-left:10px;
	padding-right:10px;
	padding-top:20px;
	color:#000;
	font-size:12px;
	text-align:justify;
	line-height:180%;
}

</style>

<div id="corpo_Clinico_tudo">
<div id="almenta_diminue_texto_nome_modulo">
<div id="titulo_corpo_Clinico">Corpo Clinico</div>

<div id="almenta_diminue_texto">
<a class="almenta_diminue_texto_link" href="javascript:mudaTamanho('texto', -1);"><img src="Imagens/a-.png" title="Diminui Texto" />&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="almenta_diminue_texto_link" href="javascript:mudaTamanho('texto', 1);"><img src="Imagens/a+.png" title="Almenta Texto" /></a>
</div>
</div><!---- aqui termina a minha div almenta_diminue_texto_nome_modulo---->

<div id="div_conteudo_corpo">
<div style="font-size: 11px;" id="texto">
Nossa preocupação em oferecer somente o que há de melhor para as pessoas que procuram por nossos serviços passa também pela escolha de nossa equipe de trabalho.

Mais de 90% dos médicos da Santa Casa de Adamantina possui título de especialista em suas áreas de atuação e nosso corpo técnico é formado por enfermeiras e farmacêuticas especializados.

Graças ao empenho de nossos especialistas e equipe de apoio, a Santa Casa de Adamantina é hoje um pólo de referência em atendimento especializado na região da alta paulista.
</div>
</div>

<div id="div_pesquisa">
<table width="100%" border="0" cellpadding="1">
<form name="busca" id="busca" method="post" action="index.php?modulo=corpoclinico">
<tr>

<td colspan="2"></td>
</tr>
<tr>
<td>
<input type="text" id="nome" name="nome" size="30" value="<?php echo $nome; ?>"/>
</td>
<td>
<select name="cod_especialidade" id="cod_especialidade" onchange="busca_especialidade();">
		<option value="0" > Selecione uma Especialidade </option>
		<?php
			$sql = " select * from especialidade where situacao='Ativo' order by descricao ";
			$r = mysql_query($sql);
			
			while( $dadoscid = mysql_fetch_array($r) )
			{
				if( $dadoscid['cod_especialidade'] == $cod_especialidade )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
		
				echo '<option value="'.$dadoscid['cod_especialidade'].'" '.$sel.'  > '.$dadoscid['descricao'].' </option>';
			}
				
		?>
	</select>
</td>
<td width="10%">

<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=corpoclinico" />
</td>
<td width="26%">
<!---<input type="button" name="btncancelar" value="Limpar" onclick="document.location='index.php?modulo=corpoclinico';"  />--->
</td>
</tr>

</form>
</table>
</div>

<div id="div_especialidade">
    <div id="conteudo">

     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select m.nome as nome_medico,m.crm as registro,m.sexo as sexo_medico,e.descricao as especialidades from medico m inner join especialidade e on(m.cod_especialidade=e.cod_especialidade) ";
							
							if(isset($_POST['nome']))
							{	
							   $sql.="where nome like'%".$_POST['nome']."%'and m.situacao =1";
							   //echo $sql; exit;
							}
							
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							if($rows==0)
							{
								echo '<fieldset>';
								echo '<legend><font color="#FF0000">Erro</font></legend>';
								echo'<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px; margin:auto;">
Nenhum item corresponde &aacute; sua pesquisa.<br />';
								echo 'Verifique o <font color="#FF0000">nome do m&eacute;dico </font> </b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<ul class="corpo_clinico_nome_medico">';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									if( $linhas < 0 )
									{
										echo 'N&atilde;o h&aacute; medico cadastrado....';		
									}
			
									{
									
									if($dados['sexo_medico']== 'f')//verificação se o medico é o sexo masculino ou femilino
									{		
echo'<li class="nome_medico_descricao"><font color="#3c80a9">Dra&nbsp;'.$dados['nome_medico'].'&nbsp;|&nbsp;Crm&nbsp;'.$dados['registro'].'</font><br />&nbsp;<font color="#888888"size="1">'.$dados['especialidades'].'</font></li>';
									}
									else
									{		
echo'<li class="nome_medico_descricao"><font color="#3c80a9">Dr&nbsp;'.$dados['nome_medico'].'&nbsp;-&nbsp;Crm&nbsp;'.$dados['registro'].'</font><br />&nbsp;<font color="#888888"size="1">'.$dados['especialidades'].'</font></li>';
									}
				
								} // for .....
							} // if( $pagina == $pag_atual )...		
		
							if( $i % $tot_por_pagina == 0 )
							{ $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										echo '</ul>';
			
										// imprimindo os links para as páginas.....
										echo '<p></p>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<div id="centraliza_paginas">';
echo '<a href="index.php?modulo=corpoclinico&pagina=1">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{
 echo '&nbsp;<a href="index.php?modulo=corpoclinico&pagina='.($pagina-1).'"> Anterior </a> '; }
										else
										{
										 echo '&nbspAnterior';
									    }
									}
									
										if( $pagina - 3 > 0 )
										{
										  $p0 = $pagina - 3; 
										}
										else
										{
										 $p0 = 1;
									    }
										
										if( $pagina + 3 <= $tot_de_paginas )
										{
											 $pf = $pagina + 3; 
										}
										else
										{
											 $pf = $tot_de_paginas; 
									    }
										
										if( $pf < 7 and $tot_de_paginas > 7 )
										 {
										  $pf = 7;
										 }
										
										
										for($i=$p0; $i<=$pf; $i++)
										{
echo '&nbsp;<a href="index.php?modulo=corpoclinico&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf )
											{
											 echo ' | ';
											}
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{
echo '&nbsp;<a href="index.php?modulo=corpoclinico&pagina='.($pagina+1).'"> Próxima </a> '; 
                                        }
										else
										{ 
									     echo '&nbsp;Próxima'; 
										}
										
echo '&nbsp;<a href="index.php?modulo=corpoclinico&pagina='.$tot_de_paginas.'"> Última</a> ';
									}
				
echo'</div>';//aqui finaliza a minha div						
												
								
	
				?>
             
   </div><!---div_conteudo--->
   </div><!----fim da div especialidade ---->

   


   
