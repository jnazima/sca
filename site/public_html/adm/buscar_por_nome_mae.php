<?php
	if( !isset($_SESSION['usuario_logado']) )
	{
		echo '<script language="javascript">
				document.location="index.php?msg=Usuario Nao Autenticado";
			  </script>
			 ';
		exit;		
	}

?>
<style type="text/css">
#div_maternidade_tudo
{
	width:653px;
	height:auto;
	background-color:#f3f3f3;
	margin: 0 auto;/*aqui faz com que a div fique no centro da pagina*/
	padding-bottom:20px;
}
#div_nome_modulo
{
    width:653px;
	height:20px;
	background-color:#ccc;
	padding-left:5px;
	padding-top:10px;
	font-size:18px;
	font-family:"Times New Roman", Times, serif;
	text-align:center;	
}
#conteudo{
	width:653px;
	height:auto;
	padding-top:30px;
	text-decoration:none;

	margin: 0 auto;/*aqui faz com que a div fique no centro da pagina*/
}

#div_busca_maternidade
{
	width:653px;
	padding-top:20px;

	
}
table,tr,td
{
	font-size:12px;
}
#link_incluir,p,a
{
	width:653px;
	height:20px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	
	
}
#link_incluir
{padding-top:50px;
}
#Link_fitros
{
	text-decoration:none; 
	 list-style:url(Imagens/seta.jpg);
	  color:#000;

}

</style>    
    
<script language="javascript">

//-----------------------------------------------------------
function excluir(login, cod_rec_nascido)
{
	if(confirm ("Deseja realmente excluir este Médico " + login + "?") )
	{
		document.location = "maternidade_gravar.php?acao=excluir&cod_rec_nascido=" + cod_rec_nascido;
	}
}
//-------------------------------------------------------------------------------

function abrir_fotos(cod_rec_nascido)//Aqui fica a funcao que abre uma outra tela para inclusão de fotos dos produtos...
{
	window.open('fotos_recenascidos.php?cod_rec_nascido='+cod_rec_nascido,'fotos','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height=430,width=750,top=200,left=300');
	
} // abrir_fotos....

function busca_por_data_nascimento(data)
{
	documente.location = "index.php?modulo=busca_maternidade_data";
}
//--------------------------------------------------------------------------------

</script>


<div id="div_maternidade_tudo">
<div id="div_nome_modulo">Cadastro de Rec&eacute;m Nascidos</div><!---div_nome_modulo----->

<div id="div_busca_maternidade"><!---- aqu abre a div maternidade----->

<!---------------------------------------------------------------------->
<fieldset>
<legend>Filtros</legend>
<ul id="Link_fitros">
<table>
<tr>
<td>
<li><a href="index.php?modulo=busca_maternidade_data">Busca por data de nascimento.</a></li>
</td>
</tr>

<tr>
<td>
<li><a href="index.php?modulo=maternidade">Buscar por nome do rec&eacute;m nascido.</a></li>
</td>
</tr>
</table>
</ul>
</fieldset>
<br />
<!----------------------------------------------------------------------------------->
<fieldset>
<legend>Informe as informa&ccedil;&otilde;es abaixo.</legend>
<table>
<form name="busca" id="busca" method="post" action="index.php?modulo=buscar_por_nome_mae">
<tr>
<td>
Pesquisar pelo nome da m&atilde;e.
</td>
<td></td>
<td></td>
<tr>
<td>
<input type="text" id="nome" name="nome" size="30" value="<?php echo $nome; ?>"  />
</td>

<td>
<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=buscar_por_nome_mae" />&nbsp;
</td>
<td>
<input type="button" name="btncancelar" value="Limpar" onclick="document.location='index.php?modulo=buscar_por_nome_mae';"  />
</td>


</form>
</table>
</fieldset>
</div><!----div fecha busca maternidade ------>




    <div id="conteudo">
     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select * from rec_nascido ";
							
							if(isset($_POST['nome']))
							{	
							   $sql.="where nome_mae like'%".$_POST['nome']."%'and situacao =1";
							 // echo $sql; exit;
							   
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
								echo 'Verifique o  <font color="#FF0000">Nome da m&atilde;e</font> ou contacte o administrador do sistema.</b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="85%" align="left" class="style2"> <b> Nome da M&atilde;e </b> </td>';
							//echo '   <td width="25%" align="left" class="style2"> <b> Data Nascimeto </b> </td>';
							echo '   <td width="15%" align="center" colspan="3"> <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									if( $linhas < 0 )
									{
										echo 'N&atilde;o h&aacute; maternidade cadastrado....';		
									}
			
									{
									//aqui coloca a cor no tabela
											
		
										echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
										echo '   <td align="left" >  ' . $dados['nome_mae'] . '  </td>';
										
										echo '   <td align="center">';
										echo '<a href="index.php?modulo=maternidade_ficha&acao=alterar&cod_rec_nascido='.$dados['cod_rec_nascido'].'">&nbsp; <img src="Imagens/alterar.gif" title="Altera Registro" /> </a>';
										echo'</td>';
										
										
										  echo '   <td align="center">'; 
										echo '<a href="javascript:excluir(\''.$dados['nome'].'\','.$dados['cod_rec_nascido'].');">&nbsp; <img src="Imagens/Symbol Delete.gif" width="13" title="Exclu&iacute; um registro permanentemente "  /> </a>';  
								echo'</td>';
								
								
								echo '<td align="center">'; 		
										echo '<a href="javascript:abrir_fotos('.$dados['cod_rec_nascido'].');">&nbsp;<img src="Imagens/Correct.gif" width="13" title="Adiciona Fotos" /></a>';//funcao carrega fotos
										echo '</td>';
		
		
		
										echo ' </tr>';
									
										} // for .....
										
										
										} // if( $pagina == $pag_atual )...		
		
											if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										echo '</table>';
								
								if($rows >0)
								{
								 echo '<br>';
								 echo 'Total de Registros Encontrados&nbsp;'.$rows.'.';																								                                }
										
echo'<div id="link_incluir">';//aqui é a div do link de incluir							
echo '<p align="right"><a href="index.php?modulo=maternidade_ficha&acao=incluir" title="Adiciona um novo Rec&eacute;m Nascido" > + Adicionar Rec&eacute;m Nascido </a>';
echo'</div>';								// imprimindo os links para as páginas.....
										echo '<p></p>';		
										
										// imprimindo os links para as páginas.....
										echo '<center>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<center>';
										echo '<a href="index.php?modulo=maternidade&pagina=1" title="Volta para a primeira pagina">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=maternidade&pagina='.($pagina-1).'" title="Volta para a pagina anterior"> Anterior </a> '; }
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
											echo '&nbsp;<a href="index.php?modulo=maternidade&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=maternidade&pagina='.($pagina+1).'" title="Passa para a pr&oacute;xima pagina "> Pr&oacute;xima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
										
										echo '&nbsp;<a href="index.php?modulo=maternidade&pagina='.$tot_de_paginas.'" title="Passa para a &uacute;ltima pagina"> &Uacute;ltima</a> ';}
				echo'</center>';//aqui finaliza a minha div						
												
								
	
				?>
   </div><!---div_conteudo--->
   
   </div><!---div_medicotudo---->
   
   

   
