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

<?php
	
	if($_GET['acao'] == 'alterar')
	{
		$cod_cidade = $_GET['cod_cidade'];
		$sql = "select * from cidade where cod_cidade = '$cod_cidade'";
		
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$cod_estado = $dados['cod_estado'];
		    $nome_cidade = $dados['nome_cidade'];
			$situacao=$dados['situacao'];
		}
		else
		{
			echo '<script language="javascript">
				 alert ("REGISTRO NAO ENCONTRADO!");
				 documente.location = "index.php?modulo=especialidade";
				 </script>';
			exit;
		}
	}// fim do if alterar
	
	else
	{
		$cod_estado = '';
			$nome_cidade ='';
	}
	
?>

<!----<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>
---->
<script language="javascript">

$(document).ready(function() {

 $("#formcad").validate(
 {
 	rules:
	{
			nome_cidade:{
				required:true,minlength:2
			}
			
		},
		messages:
		{
			nome_cidade:{
				required:"Informe o seu descricao ",minlength:"É Necessario no minimo 2 caracteres"
			}
			
		}
	});
});

</script>
<style type="text/css">
#div_cidade_tudo
{
	width:326px;
	height:auto;
	background-color:#999;
	padding-bottom:100px;
	margin: 0 auto;/*aqui faz com que a div fique no centro da pagina*/
	
	border-right:solid 1px #ccc; padding-left:0px; padding-right:0px; 
	border-left:solid 1px #ccc; padding-right:0px; padding-left:0px;
	border-top:solid 1px #ccc; padding-top:0px; padding-bottom:0px;
	border-bottom:solid 1px #ccc; padding-bottom:0px; padding-top:0px;
}
#div_cidade_nome
{
width:326px;
	height:25px;
	background-color:#CCC;
	text-align:center;
	padding-top:5px;
	font-size:14px;
}
#div_cidade_conteudo
{
	width:326px;
	height:auto;
	background-color:#f3f3f3;
	padding-top:15px;
	padding-bottom:15px;
}




</style>


<div id="div_cidade_tudo">

<div id="div_cidade_nome">Cadastro de Cidades
<?php 
	if ($_GET['acao'] == 'incluir')
	{
		echo ' - Incluindo';
	}
	else
	{
		echo ' - ALTERANDO';
	}
?>
</div>
<div id="div_cidade_conteudo">

<table border="0" width="80%" align="center" >
<form name="formcad" id="formcad" method="post" 
		action="cidade_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_cidade=<?php echo $_GET['cod_cidade'];?>">
		
<tr><td align="right">
Nome: </td>
<td>
<input type="text" name="nome_cidade" id="nome_cidade" size="22" maxlength="50" value="<?php echo $nome_cidade; ?>" label="nome_cidade" required="true" />
</td>
</tr>
<tr>
<td align="right">Unidade Federal</td>
<td><select name="cod_estado" id="cod_estado">
		<option value="0" > Selecione uma Estado </option>
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
	</select></td>
    </tr>
    <tr><td align="right">Situa&ccedil;&atilde;o</td><td>
<input type="radio" name="situacao" id="situacao" value="1" <?php if( $situacao == "1"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="2" <?php if( $situacao == "2"){echo ' checked="checked" ';}?> /> Inativo </td></tr>
    <tr>
    <td align="right">
<input type="submit" name="btnenviar" value="Gravar" />
</td><td>
<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=cidade';"  />
</td>
</tr>
</form>
</table>
</div><!---- div cidade_conteudo ---->
</div><!---- divcidadetudo ---->

<script language="javascript">
	document.formcad.descricao.focus();
</script>





