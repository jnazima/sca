<?php 	if($_SESSION["permissao"] != "Supervisor_medio" && $_SESSION["permissao"] != "Supervisor_basico")
{
?>

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
#div_usuario_tudo
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
#div_busca_usuario
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
//-----------------------------------------------------------
function excluir(login, cod_usuario)
{
	if(confirm ("Deseja realmente excluir este login " + login + "?") )
	{
		document.location = "usuarios_gravar.php?acao=excluir&cod_usuario=" + cod_usuario;
	}
}
</script>


<div id="div_usuario_tudo">
<div id="div_nome_modulo">Cadastro de Usu&aacute;rios</div><!---div_nome_modulo----->

<div id="div_busca_usuario"><!---- aqu abre a div usuario----->
<table>
<form name="busca" id="busca" method="post" action="index.php?modulo=usuarios">
<tr>
<td>
Pesquisar 
</td>
<td></td>
<td></td>
<tr>
<td>
<input type="text" id="nome" name="nome" size="30" value="<?php echo $nome; ?>"  />
</td>
<td>
<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=usuarios" />&nbsp;
</td>
<td>
<input type="button" name="btncancelar" value="Limpar" onclick="document.location='index.php?modulo=usuarios';"  />
</td>


</form>
</table>
</div><!----div fecha busca usuario ------>




    <div id="conteudo">
     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select * from usuarios";
							
							if(isset($_POST['nome']))
							{	
							   $sql.=" where nome_completo like'%".$_POST['nome']."%'and situacao =1";
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
								echo 'Verifique o  <font color="#FF0000">nome de usuario</font> ou contacte o administrador do sistema.</b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<table width="100%" border="0" cellpadding="5">';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="15%" align="left"> <b>Usu&aacute;rios </b> </td>';
							echo '   <td width="10%" align="center" colspan="2" > <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									if( $linhas < 0 )
									{
										echo 'N&atilde;o h&aacute; usuario cadastrado....';		
									}
			
									{
									//aqui coloca a cor no tabela
											
		
										echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
										echo '   <td align="left" >  ' . $dados['nome_completo'] . '  </td>';
										echo '   <td align="center">'; 
										echo '<a href="index.php?modulo=usuarios_ficha&acao=alterar&cod_usuario='.$dados['cod_usuario'].'"> <img src="Imagens/alterar.gif" title="Altera Usu&aacute;rio" /> </a>';  
										echo '</td>';
										echo '   <td align="center">'; 
										echo '<a href="javascript:excluir(\''.$dados['nome_completo'].'\','.$dados['cod_usuario'].');"> <img src="Imagens/Symbol Delete.gif" width="13" title="Exclu&iacute; Usu&aacute;rio "  /> </a>';  
										echo '</td>';
		
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
echo '<p align="right"><a href="index.php?modulo=usuarios_ficha&acao=incluir" title="Adiciona novo Usu&aacute;rio" > + Adicionar Usu&aacute;rio</a>';
echo'</div>';										
										
										// imprimindo os links para as páginas.....
										echo '<p>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<center>';
										echo '<a href="index.php?modulo=usuarios&pagina=1" title="Volta para a primeira pagina">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=usuarios&pagina='.($pagina-1).'" title="Volta para a pagina anterior"> Anterior </a> '; }
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
											echo '&nbsp;<a href="index.php?modulo=usuarios&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=usuarios&pagina='.($pagina+1).'" title="Passa para a pr&oacute;xima pagina > Próxima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
										
										echo '&nbsp;<a href="index.php?modulo=usuarios&pagina='.$tot_de_paginas.'" title="Passa para a &uacute;ltima pagina"> Última</a> ';}
				echo'</center>';//aqui finaliza a minha div						
												
								
	
				?>
   </div><!---div_conteudo--->
   
   </div><!---div_usuariostudo---->
   
   

 <?php  }
 else
 {
	 echo '<script language="javascript">
					alert("Você não tem permissão para este modulo !");
					document.location = "index.php?modulo=home";
		      </script>';
		exit;
 }
 ?>
