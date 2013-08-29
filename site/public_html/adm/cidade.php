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
#div_cidade_tudo
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

	margin: 0 auto;/*aqui faz com que a div fique no centro da pagina*/
}
#div_busca_cidade
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
{
	padding-top:50px;
}

</style>    
    
<script language="javascript">
function excluir(nome_cidade, cod_cidade)
{
	if(confirm ("Deseja realmente excluir esta cidade " + nome_cidade + "?") )
	{
		document.location = "cidade_gravar.php?acao=excluir&cod_cidade=" + cod_cidade;
	}
}



//--------------------------------------------------------------------------------------
function enviar_pesquisa()
{
	if( document.busca.nome.value == "" || document.busca.nome.value == "Pesquisar...")
	{
		alert("Digite um texto a ser pesquisado !");
		document.busca.nome.focus();
		return;
	}
	
	document.busca.submit();
	
} // enviar_pesquisa()


</script>


<div id="div_cidade_tudo">
<div id="div_nome_modulo">Cadastro de Cidades</div><!---div_nome_modulo----->

<div id="div_busca_cidade"><!---- aqu abre a div cidade----->
<fieldset>
<legend>Informe uma cidade a ser pesquisada.</legend>
<table width="100%" border="0" cellpadding="1" align="center">
<form name="busca" id="busca" method="post" action="index.php?modulo=cidade" >
<tr>
<td>Unidade Federal</td><td>Pesquisar</td>
<tr>
<td><select name="cod_estado" id="cod_estado" onchange="busca_cidade_table();">
		<option value="0" > Selecione uma Unidade Federal </option>
		<?php
			$sql = " select * from estado ";
			$r = mysql_query($sql);
			
			while( $dadoscid = mysql_fetch_array($r) )
			{
				if( $dadoscid['cod_estado'] == $cod_estado )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
		
				echo '<option value="'.$dadoscid['cod_estado'].'" '.$sel.'  > '.$dadoscid['nome_estado'].' </option>';
			}
				
		?>
	</select>

</td>
<td><input type="text" id="nome" name="nome" size="30" value="<?php echo $nome; ?>"  /></td>
<td width="11%">

<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=cidade" />

</td>

<td width="32%">
<input type="button" name="btncancelar" value="Limpar" onclick="document.location='index.php?modulo=cidade';"  />
</td>


</form>
</table>
</fieldset>
</div><!----div fecha busca cidade ------>



<div id="div_cidade_table">
    <div id="conteudo">
     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select * from cidade ";
							
							if(isset($_POST['nome']))
							{	
							   $sql.="where nome_cidade like'%".$_POST['nome']."%'and situacao =1";
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
								echo 'Verifique o  <font color="#FF0000">Nome da Cidade</font> ou contacte o administrador do sistema.</b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
								if($_SESSION["permissao"] == "Supervisor_avancado")
{
							echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="80%" align="left"> <b> Cidade </b> </td>';
							echo '   <td width="20%" align="center" colspan="2"> <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
}else
if($_SESSION["permissao"] == "Supervisor_medio")
{
	echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="80%" align="left"> <b> Cidade </b> </td>';
							echo '   <td width="20%" align="center" colspan="2"> <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
}else
if($_SESSION["permissao"] == "Supervisor_basico")
{
	echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="100%" align="left"> <b> Cidade </b> </td>';
							
							echo ' </tr>';
}

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
									//aqui coloca a cor no tabela
												
echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
echo '   <td align="left" >  ' . $dados['nome_cidade'] . '  </td>';


//aqui verifico a session do usuario e faço as permissoes para o usuario
if($_SESSION["permissao"] == "Supervisor_avancado")
{
echo '   <td align="center">'; 
echo '<a href="index.php?modulo=cidade_ficha&acao=alterar&cod_cidade='.$dados['cod_cidade'].'"> <img src="Imagens/alterar.gif" title="Alterar Registro" /> </a>'; 	 
echo '</td>';							
echo'<td align="center">'; 
echo '<a href="javascript:excluir(\''.$dados['nome_cidade'].'\','.$dados['cod_cidade'].');"> <img src="Imagens/Symbol Delete.gif" width="13" title="Excluir este registro"  /> </a>';
echo '</td>';
}

else

if($_SESSION["permissao"] == "Supervisor_medio")
{
echo '   <td align="center">'; 
echo '<a href="index.php?modulo=cidade_ficha&acao=alterar&cod_cidade='.$dados['cod_cidade'].'"> <img src="Imagens/alterar.gif" title="Alterar Registro" /> </a>'; 	 
echo '</td>';							
}

							
												
										echo ' </tr>';
									
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
echo '<p align="right"><a href="index.php?modulo=cidade_ficha&acao=incluir"> + Adicionar Cidade </a>';
echo'</div>';										
										
										// imprimindo os links para as páginas.....
										echo '<p>';
										
										
										
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
   </div><!----fim da div div_cidade_table--->
   </div><!---div_cidadetudo---->
   
   

   
