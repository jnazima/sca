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
#div_medico_tudo
{
	width:653px;
	height:auto;
	background-color:#f3f3f3;
	margin: 0 auto;/*aqui faz com que a div fique no centro da pagina*/
	padding-bottom:20px;

	
}
#div_nome_modulo
{
	width:648px;
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
#div_busca_medico
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

#centraliza_paginas
{
	width:653px;
	height:10px;
	background-color:#dedede;
	text-align:center;
	padding-top:5px;
	padding-bottom:10px;
}
#div_erro_medicos
{
font-family:Verdana, Geneva, sans-serif;
font-size:12px;
width:400px; 
height:auto; 
text-align:center;
padding-bottom:15px; 
margin:auto;
}
</style>    
    
<script language="javascript">

function abrir_fotos(cod_medico)//Aqui fica a funcao que abre uma outra tela para inclusão de fotos dos produtos...
{
	window.open('fotos_medicos.php?cod_medico='+cod_medico,'fotos','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height=430,width=750,top=200,left=300');
	
} // abrir_fotos....

//-----------------------------------------------------------
function excluir(nome_medico, cod_medico)
{
	if(confirm ("Deseja realmente excluir este Médico " + nome_medico + "?") )
	{
		document.location = "medico_gravar.php?acao=excluir&cod_medico=" + cod_medico;
	}
}//--------------------------------------------------------------------------------------



</script>


<div id="div_medico_tudo">
<div id="div_nome_modulo">Cadastro de M&eacute;dicos</div><!---div_nome_modulo----->

<div id="div_busca_medico"><!---- aqu abre a div medico----->
<table width="100%" border="0" cellpadding="1" align="center">
<form name="busca" id="busca" method="post" action="index.php?modulo=medico">
<tr>
<td width="30%">
Pesquisar 
</td>
<td width="34%">Especialidade</td>
<td colspan="2"></td>
<tr>
<td>
<input type="text" id="nome" name="nome" size="30" value="<?php echo $nome; ?>"/>
</td>
<td>
<select name="cod_especialidade" id="cod_especialidade" onchange="busca_especialidade();">
		<option value="0" > Selecione uma Especialidade </option>
		<?php
			$sql = " select * from especialidade where situacao='Ativo' ";
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
<input type="submit" name="btn_pesquisa" value="Buscar" onclick="index.php?modulo=medico" />
</td>

<td width="26%">
<input type="button" name="btncancelar" value="Limpar" onclick="document.location='index.php?modulo=medico';"  />
</td>


</form>
</table>
</div><!----div fecha busca medico ------>
<?php

	if( isset($_GET['msg']) )
	{
		echo '<div style="font-weight:bold; color:#ff0000;">'.$_GET['msg'].'</div>';
	}

?>


<div id="div_especialidade">
    <div id="conteudo">
     <?php	
					 
					 		$tot_por_pagina = 10;

							if( !isset($_GET['pagina']) ) 
							{ $pagina = 1; }
							else
							{ $pagina = $_GET['pagina']; }
							
  							
   	
							// enviando o comando sql para o B.D.
							$sql = " select m.cod_medico,m.nome as nome_medico,e.descricao as nome_descricao
									from medico m inner join especialidade e 
									on (m.cod_especialidade = e.cod_especialidade)
 									";
									
									if(isset($_POST['nome']))
								{	
							  	 $sql.="where m.nome like'%".$_POST['nome']."%'and m.situacao =1 order by m.nome";
								}
							
							/* $nome = trim($_POST['nome']);
							
							if(!isset($nome)!="")
							{
								echo '<script language="javascript">
						document.location="index.php?modulo=medico&msg=Você precisa digitar algo!!!";
				  					</script>
				 						';
								exit;
							
							}
							else
							{
								if(isset($_POST['nome']))
								{	
							  	 $sql.="where m.nome like'%".$_POST['nome']."%'and m.situacao =1 order by m.nome";
								}
							}
							*/
							$resultado = mysql_query($sql, $conexao);
	
							// quantidade de registros retornados da consulta
							$rows = mysql_num_rows($resultado);
							
							if($rows==0)
							{
								echo '<fieldset>';
								echo '<legend><font color="#FF0000">Erro</font></legend>';
					
								echo'<div id="div_erro_medicos">';

                                echo'Nenhum item corresponde &aacute; sua pesquisa.<br />';

								echo 'Verifique o <font color="#FF0000">nome do m&eacute;dico</font>.</div>';

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
										echo 'N&atilde;o h&aacute; medico cadastrado....';		
									}
			
									{
									//aqui coloca a cor no tabela
											
		
										echo '<tr bgcolor="#ededed">';//aqui eu uso a cor 
										echo '<td align="left" >  ' . $dados['nome_medico'] . '  </td>';
										echo '<td align="left" >  ' . $dados['nome_descricao'] . '  </td>';
										
										echo '<td align="center">'; 
										echo '<a href="index.php?modulo=medico_ficha&acao=alterar&cod_medico='.$dados['cod_medico'].'"> <img src="Imagens/alterar.gif" title="Alterar" /> </a>';  
										echo'</td>';
										
										
											echo '<td align="center">'; 					
										echo '<a href="javascript:excluir(\''.$dados['nome_medico'].'\','.$dados['cod_medico'].');"> <img src="Imagens/Symbol Delete.gif" width="13" title="Excluir"  /> </a>';  
										echo'</td>';
										
											echo '<td align="center">'; 
		echo '<a href="javascript:abrir_fotos('.$dados['cod_medico'].');">&nbsp;<img src="Imagens/Correct.gif" width="13" title="Adiciona Fotos" /></a>';//funcao carrega fotos
echo'</td>';
										echo '</tr>';
									
										} // for .....
										
										
										} // if( $pagina == $pag_atual )...		
		
											if( $i % $tot_por_pagina == 0 ) { $pag_atual++; }
											
											$i++;			
											
										} // while....
										
										if($rows>0)
							            {		
										  echo '</table>';
										}
										
						if($rows > 0)//o total de registros so podera ser visto se o total de registros for maior que 1 caso contrario nao podera ser visto 
						{
							echo '<br>';
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
										echo'<div id="centraliza_paginas">';
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
				echo'</div>';//aqui finaliza a minha div						
												
								
	
				?>
     
   </div><!---div_conteudo--->
   </div><!----fim da div especialidade ---->
</div>



   
