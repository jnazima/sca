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
		$cod_especialidade = $_GET['cod_especialidade'];
		$sql = "select * from especialidade where cod_especialidade = '$cod_especialidade'";
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			 $cod_especialidade = $dados['cod_especialidade'];	
			 $descricao = $dados['descricao'];
		     $situacao = $dados['situacao'];
			
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
		$descricao='';
		$situacao='';
	}
	
?>

<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>

<script language="javascript">

$(document).ready(function() {

 $("#formcad").validate(
 {
 	rules:
	{
			descricao:{
				required:true,minlength:2
			}
			
		},
		messages:
		{
			descricao:{
				required:"Informe o seu descricao ",minlength:"É Necessario no minimo 2 caracteres"
			}
			
		}
	});
});

</script>
<div id="div_usuario_tudo">

<div id="div_usuario_nome">Cadastro de Especialidade
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

<form name="formcad" id="formcad" method="post" 
		action="especialidade_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_especialidade=<?php echo $_GET['cod_especialidade'];?>">
	<p>
C&oacute;digo<br />
<input type="text" name="cod_especialidade" id="cod_especialidade" size="5" maxlength="50" value="<?php echo $cod_especialidade; ?>" disabled="disabled"/>

</p>	
<p>
Descri&ccedil;&atilde;o: <br />
<input type="text" name="descricao" id="descricao" size="50" maxlength="50" value="<?php echo $descricao; ?>" label="descricao" required="true" />

</p>
<p>
Situa&ccedil;&atilde;o
<input type="radio" name="situacao" id="situacao" value="Ativo" <?php if( $situacao == "Ativo"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="Desativado" <?php if( $situacao == "Desativado"){echo ' checked="checked" ';}?> /> Inativo 
</p>
<p>

<input type="submit" name="btnenviar" value="Gravar" />
&nbsp;&nbsp;&nbsp;
<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=especialidade';"  />

</form>
</p></p></div>
<script language="javascript">
	document.formcad.descricao.focus();
</script>





