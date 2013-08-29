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
#div_curriculum_tudo
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

#div_busca_curriculum
{
	width:653px;
	padding-top:20px;

	
}
table,tr,td
{
	font-size:12px;
}
/*-----------------------------------------------------------------*/

/*-----------------------------------------------------------------*/
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
function excluir(login, cod_curriculum)
{
	if(confirm ("Deseja realmente excluir este Médico " + login + "?") )
	{
		document.location = "curriculum_gravar.php?acao=excluir&cod_curriculum=" + cod_curriculum;
	}
}
//-------------------------------------------------------------------------------

function abrir_fotos(cod_curriculum)//Aqui fica a funcao que abre uma outra tela para inclusão de fotos dos produtos...
{
	window.open('fotos_recenascidos.php?cod_curriculum='+cod_curriculum,'fotos','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height=430,width=750,top=200,left=300');
	
} // abrir_fotos....

//--------------------------------------------------------------------------------
function validar_filtro_data()
{
// validando o campo DATA DE inicio
	if( !verificaData(document.busca.data_cadastro_inicio.value) )
	{
		alert("O campo data cadastro inicio deve ser preechido com uma data válida !");
		document.busca.data_cadastro_inicio.focus();
		document.busca.data_cadastro_inicio.select();
		return;
	}
//-------------------------------------------------------------------------------
// validando o campo DATA DE inicio
	if( !verificaData(document.busca.data_cadastro_final.value) )
	{
		alert("O campo data cadastro final deve ser preechido com uma data válida !");
		document.busca.data_cadastro_final.focus();
		document.busca.data_cadastro_final.select();
		return;
	}


}
</script>


<div id="div_curriculum_tudo">
<div id="div_nome_modulo">Cadastro Curriculum</div><!---div_nome_modulo----->

<div id="div_busca_curriculum"><!---- aqu abre a div curriculum----->

<!-------------------------------------------------------------------------------------->
<fieldset>
<legend>Filtros</legend>
<ul id="Link_fitros">
<table>

<tr>
<td>
<li><a href="index.php?modulo=curriculum">Buscar por nome do candidato.</a></li>
</td>
</tr>



</table>
</ul>
</fieldset>
<br />
<!-------------------------------------------------------------------------------------->
<fieldset>
<legend>Informe as informa&ccedil;&otilde;es abaixo.</legend>
<table align="center">
<form name="busca" id="busca" method="post" action="index.php?modulo=buscar_curriculum_data_cadastro" >	
<tr>
<td>
Data de inicio.
</td>
<td>Data Final.</td>

<tr>
<td>
<input type="text" id="data_cadastro_inicio" name="data_cadastro_inicio" size="20" value="<?php echo $data_cadastro_inicio; ?>" onkeyup="maskIt(this,event,'##/##/####')" /> 
</td>
<td>
<input type="text" id="data_cadastro_final" name="data_cadastro_final" size="20" value="<?php echo $data_cadastro_final; ?>" onkeyup="maskIt(this,event,'##/##/####')" />
</td>
<td>
<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=buscar_curriculum_data_cadastro" />&nbsp;
</td>
<td>
<input type="button" name="btncancelar" value="Limpar" onclick="document.location='index.php?modulo=buscar_curriculum_data_cadastro';"  />
</td>


</form>
</table>
</fieldset>

</div><!----div fecha busca curriculum ------>




    <div id="conteudo">
     <?php	
					 $data_inicio = DataBR_to_USA( $_POST['data_cadastro_inicio'] );
					 $data_final = DataBR_to_USA( $_POST['data_cadastro_final'] );
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
							// enviando o comando sql para o B.D.
							$sql = " select * from curriculum ";

							if(isset($_POST['data_cadastro_inicio']) && isset($_POST['data_cadastro_final']))
							{	
							   $sql.="where data_cadastro >="."'".$data_inicio."'"." and data_cadastro <= "."'".$data_final."'";
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
								echo 'Verifique a <font color="#FF0000">data de inicio</font> ou a  <font color="#FF0000">   data final</font> ou contacte o administrador do sistema</b></center>';
								echo '</fieldset>';
							}
							
							
							$i=1;
	
							$pag_atual = 1;
							if($rows>0)
							{
							echo '<table width="100%" border="0" cellpadding="5" >';
							echo ' <tr bgcolor="#cccccc">';
							echo '   <td width="40%" align="left"> <b> Nome </b> </td>';
							echo '   <td width="20%" align="center"> <b> Data de Cadastro </b> </td>';
							echo '   <td width="20%" align="center"> <b>Última altera&ccedil;&atilde;o </b> </td>';
							echo '   <td width="20%" align="center" colspan="3"> <b> Op&ccedil;&otilde;es </b> </td>';
							echo ' </tr>';
							}
							while($i <= $rows )
							{
								$dados = mysql_fetch_array($resultado);
								
								if( $pagina == $pag_atual )
								{	
	
									if( $linhas < 0 )
									{
										echo 'N&atilde;o h&aacute; curriculum cadastrado....';		
									}
			
									{
									//aqui coloca a cor no tabela
											
		
										echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
										echo '   <td align="left" >  ' . $dados['nome'] . '  </td>';
										echo '   <td align="center" >  ' .DataUSA_to_BR(  $dados['data_cadastro']) . '  </td>';
											echo '   <td align="center" >  ' .DataUSA_to_BR(  $dados['data_da_alteracao']) . '  </td>';
										echo '   <td align="center">'; 
										
										echo '<a href="index.php?modulo=curriculum_ficha&acao=alterar&cod_curriculum='.$dados['cod_curriculum'].'">&nbsp; <img src="Imagens/alterar.gif" title="Altera Registro" /> </a>';  
				echo'</td>';
				echo '   <td align="center">'; 
										echo '<a href="javascript:excluir(\''.$dados['nome'].'\','.$dados['cod_curriculum'].');">&nbsp; <img src="Imagens/Symbol Delete.gif" width="13" title="Exclu&iacute; um registro permanentemente "  /> </a>';  
								echo'</td>';
								echo '   <td align="center">'; 
										echo '<a href="javascript:abrir_fotos('.$dados['cod_curriculum'].');">&nbsp;<img src="Imagens/Correct.gif" width="13" title="Adiciona Fotos" /></a>';//funcao carrega fotos
										echo '</td>';
		
		
		
										echo ' </tr>';
									
										} // for .....
										
										
										} // if( $pagina == $pag_atual )...		
		
											if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										echo '</table>';

										if($rows > 0)
										{
										echo '<br>';
										echo 'Total de Registros Encontrados&nbsp;'.$rows.'.';										}
										
echo'<div id="link_incluir">';//aqui é a div do link de incluir							
echo '<p align="right"><a href="index.php?modulo=curriculum_ficha&acao=incluir" title="Adicionar Novo Curriculum" > + Adicionar Novo Curriculum </a>';
echo'</div>';								// imprimindo os links para as páginas.....
										echo '<p></p>';		
										
										// imprimindo os links para as páginas.....
										echo '<center>';
										
										
										
										$tot_de_paginas = ceil($rows / $tot_por_pagina); // ceil arredonda a fração para cima
										if($rows>0)
										{
										echo'<center>';
										echo '<a href="index.php?modulo=buscar_curriculum_data_cadastro&pagina=1" title="Volta para a primeira pagina">Primeira</a> ';
										
										
										
										if($pagina > 1 ) 
										{ echo '&nbsp;<a href="index.php?modulo=buscar_curriculum_data_cadastro&pagina='.($pagina-1).'" title="Volta para a pagina anterior"> Anterior </a> '; }
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
											echo '&nbsp;<a href="index.php?modulo=buscar_curriculum_data_cadastro&pagina='.$i.'"> '. $i .' </a> ';
											
											if( $i<$pf ) { echo ' | '; }
										
										} // for ....
									
									if($rows>0)
									{
									
										if($pagina < $tot_de_paginas ) 
										{ echo '&nbsp;<a href="index.php?modulo=buscar_curriculum_data_cadastro&pagina='.($pagina+1).'" title="Passa para a pr&oacute;xima pagina "> Pr&oacute;xima </a> '; }
										else
										{ echo '&nbsp;Próxima'; }
										
										
										echo '&nbsp;<a href="index.php?modulo=buscar_curriculum_data_cadastro&pagina='.$tot_de_paginas.'" title="Passa para a &uacute;ltima pagina"> &Uacute;ltima</a> ';}
				echo'</center>';//aqui finaliza a minha div						
												
								
	
				?>
   </div><!---div_conteudo--->
   
   </div><!---div_medicotudo---->
   
   

   
