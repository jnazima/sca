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
#div_reclamacoes_sugestoes_tudo
{
	width:650px;
	height:auto;
	margin: 0 auto;/*aqui faz com que a div fique no centro da pagina*/
	padding-bottom:20px;

	
}
#div_nome_modulo
{
	width:634px;
	height:20px;
	padding-left:15px;
	padding-top:10px;
	padding-bottom:10px;
	font-size:18px;
	font-family:"Times New Roman", Times, serif;
	text-align:left;
	border-bottom:solid 1px #CCC;
	border-left:solid 1px #CCC;
}
#conteudo{
	width:650px;
	height:auto;
	padding-top:30px;
	margin: 0 auto;/*aqui faz com que a div fique no centro da pagina*/
	

}
#div_busca_reclamacoes_sugestoes
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
	width:650px;
	height:20px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	padding-right:10px;
	
	
}
#link_incluir
{padding-top:50px;
}

#centraliza_paginas
{
	width:650px;
	height:10px;
	background-color:#dedede;
	text-align:center;
	padding-top:5px;
	padding-bottom:10px;
}
</style>    
    
<script language="javascript">

//-----------------------------------------------------------
function excluir(nome, cod_fale_conosco)
{
	if(confirm ("Deseja realmente excluir esta reclamação " + nome + "?") )
	{
		document.location = "sugestoes_reclamacoes_gravar.php?acao=excluir&cod_fale_conosco=" + cod_fale_conosco;
	}
}//--------------------------------------------------------------------------------------



</script>


<div id="div_reclamacoes_sugestoes_tudo">
<div id="div_nome_modulo">Sugest&otilde;es e Reclama&otilde;es</div><!---div_nome_modulo----->

<div id="div_busca_reclamacoes_sugestoes"><!---- aqu abre a div reclamacoes_sugestoes----->
<table width="100%" border="0" cellpadding="1" align="center">
<form name="busca" id="busca" method="post" action="index.php?modulo=sugestoes_reclamacoes">
<tr>
<td width="30%">
Pesquisar 
</td>
<td width="34%">Tipo de reclama&ccedil;&atilde;o</td>
<td colspan="2"></td>
<tr>
<td>
<input type="text" id="nome" name="nome" size="30" value="<?php echo $nome; ?>"/>
</td>
<td>
<select name="cod_assunto" id="cod_assunto" onchange="busca_assunto();">
		<option value="0" > Selecione o Assunto </option>
		<?php
			$sql = " select * from assunto order by descricao ";
			$r = mysql_query($sql);
			
			while( $dadoscid = mysql_fetch_array($r) )
			{
				if( $dadoscid['cod_assunto'] == $cod_assunto )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
			
				echo '<option value="'.$dadoscid['cod_assunto'].'" '.$sel.'  > '.$dadoscid['descricao'].'&nbsp;' .'</option>';
			}
				
		?>
	</select>
</td>
<td width="10%">
<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=sugestoes_reclamacoes" />
</td>

<td width="26%">
<input type="button" name="btncancelar" value="Limpar" onclick="document.location='index.php?modulo=sugestoes_reclamacoes';"  />
</td>


</form>
</table>
</div><!----div fecha busca reclamacoes_sugestoes ------>



<div id="div_assunto">
    <div id="conteudo">
     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select f.cod_fale_conosco,f.nome as nome_pessoa,a.descricao as descricao_assunto from fale_conosco f inner join assunto a on(f.cod_assunto=a.cod_assunto)

 									";
							
							if(isset($_POST['nome']))
							{	
							   $sql.="where f.nome like'%".$_POST['nome']."%'and f.situacao =1 ";
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
								echo 'Verifique o <font color="#FF0000">nome da pessoa.</font></div>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="60%" align="left"> <b> Nome </b> </td>';
							echo '   <td width="20%" align="center"> <b>Reclama&ccedil;&atilde;o sugest&otilde;es </b> </td>';
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
   </div><!----fim da div especialidade ---->

</div>

   
