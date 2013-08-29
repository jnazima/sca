<script language="javascript">
//--------------------------------------------------------------------------------------
function enter_pesquisa()
{
	if( document.busca.nome.value == "Pesquisar..." )
	{
		document.busca.nome.value = "";
	}
	
} // enter_pesquisa()

//--------------------------------------------------------------------------------------
function exit_pesquisa()
{
	if( document.busca.nome.value == "" )
	{
		document.busca.nome.value = "Pesquisar...";
	}
	
} // exit_pesquisa()

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
#convenio_tudo
{
	width:650px;
	float:left;
	height:auto;
	margin:0 auto;
	padding-top:30px;
}
#titulo_convenio
{
	width:640px;
	height:35px;
	padding-left:10px;
	padding-top:5px;
	font-size:18px;
	color:#678bb1;
	border-bottom:#CCC 1px solid;

}
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
	background-color:#060;
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

.convenio_descricao
{
	width:610px;

	height:auto;
	float:left;
	font-size:14px;
	text-align:left;
	list-style-type:square;
	line-height:180%;
	color:#3c80a9;
	font-size:12px;	
	padding-top:10px;
	padding-bottom:10px;
}
#centraliza_paginas 
{
	float:left;
	width:650px;
	height:25px;
	padding-top:30px;
	padding-bottom:20px;
	text-align:center;
	color:#678bb1;

}
#div_conteudo_convenio
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
/*------------------------------------------------------------*/

.almenta_diminue_texto_link
{
	float:right;
	/*border-bottom:#CCC 1px solid;*/
	padding-top:5px;
	padding-left:10px;
}
#almenta_diminue_texto
{
	float:left;
	width:325px;
	height:35px;	
}
</style>

<div id="convenio_tudo">
<div id="titulo_convenio">Conv&ecirc;nios Credenciados</div>

<div id="almenta_diminue_texto">
<a class="almenta_diminue_texto_link" href="javascript:mudaTamanho('texto', -1);"><img src="Imagens/a-.png" title="Diminui Texto" />&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="almenta_diminue_texto_link" href="javascript:mudaTamanho('texto', 1);"><img src="Imagens/a+.png" title="Almenta Texto" /></a>
</div>

<div id="div_conteudo_convenio">
<div style="font-size: 11px;" id="texto">
        A Santa Casa de Adamanina mant&eacute;m uma extensa rede de atendimento a usu&aacute;rios de conv&ecirc;nios privados. Al&eacute;m do atendimento mantido pelo SUS (Sistema &uacute;nico de Sa&uacute;de) e Iamspe (Instituto de Assist&ecirc;ncia M&eacute;dica ao Servidor P&uacute;blico Estadual), a entidade &eacute; conveniada com os principais planos de sa&uacute;de do Pa&iacute;s.
</div>
</div>

<div id="div_pesquisa">
<table width="100%" border="0" cellpadding="1">
<form name="busca" id="busca" method="post" action="index.php?modulo=convenios">
<tr>

<td colspan="2"></td>
</tr>
<tr>
<td>
<input type="text" id="nome" name="nome" size="30" onblur="exit_pesquisa();" 
onfocus="enter_pesquisa();"  value="<?php echo $nome; ?>"/>
</td>

<td width="10%">

<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=convenios" />
</td>

</tr>

</form>
</table>
</div>


    <div id="conteudo">

     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select * from convenios ";
							
							if(isset($_POST['nome']))
							{	
							   $sql.="where nome like'%".$_POST['nome']."%'and situacao =1";
							   //echo $sql; exit;
							}
							
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							if($rows==0)
							{
								echo '<fieldset>';
								echo '<legend><font color="#FF0000">Erro</font></legend>';
								echo'<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:auto; height:auto; text-align:center; padding-bottom:15px;">
Nenhum item corresponde &aacute; sua pesquisa.<br />';
								echo 'Verifique o <font color="#FF0000">nome do conv&ecirc;nio </font> </b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<ul class="convenio_descricao">';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									if( $linhas < 0 )
									{
										echo 'N&atilde;o h&aacute; conv&ecirc;nio cadastrado....';		
									}
			
									{
										
                              echo'<li>'.$dados['nome'].'</li>';
				
									} // for .....
										
										
										} // if( $pagina == $pag_atual )...		
		
											if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										echo '</ul>';
										
						
						
							
										
										// imprimindo os links para as páginas.....
										echo '<p></p>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<div id="centraliza_paginas">';
echo '<a href="index.php?modulo=convenios&pagina=1">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{
 echo '&nbsp;<a href="index.php?modulo=convenios&pagina='.($pagina-1).'"> Anterior </a> '; }
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
echo '&nbsp;<a href="index.php?modulo=convenios&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf )
											{
											 echo ' | ';
											}
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{
echo '&nbsp;<a href="index.php?modulo=convenios&pagina='.($pagina+1).'"> Próxima </a> '; 
                                        }
										else
										{ 
									     echo '&nbsp;Próxima'; 
										}
										
echo '&nbsp;<a href="index.php?modulo=convenios&pagina='.$tot_de_paginas.'"> Última</a> ';
									}
				
echo'</div>';//aqui finaliza a minha div						
								
	
				?>
             
   </div><!---div_conteudo--->



   
