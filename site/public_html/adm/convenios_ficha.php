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
		$cod_convenio = $_GET['cod_convenio'];
		$sql = "select * from convenios where cod_convenio = '$cod_convenio'";
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$nome = $dados['nome'];
			$url = $dados['url'];
			$telefone_comercial = $dados['telefone_comercial'];
			$telefone_fax = $dados['telefone_fax'];
			$situacao =$dados['situacao'];
		}
		else
		{
			echo '<script language="javascript">
				 alert ("REGISTRO NAO ENCONTRADO!");
				 documente.location = "index.php?modulo=convenios";
				 </script>';
			exit;
		}
	}// fim do if alterar
	
	else
	{
		$nome='';
		$url = '';
	    $telefone_comercial = '';
		$telefone_fax = '';
		$situacao='';
	}
	
?>



<script language="javascript">

function enviar()
{
	if( document.formcad.nome.value.length == 0 )
	{
		alert("O campo ( nome ) deve ser preechido!");
		document.formcad.nome.focus();
		return;
	}
	if( document.formcad.url.value.length == 0 )
	{
		alert("O campo ( url ) do site do convênio deve ser preechido!");
		document.formcad.url.focus();
		return;
	}
	if( document.formcad.telefone_comercial.value.length == 0 )
	{
		alert("O campo ( telefone comercial ) deve ser preechido!");
		document.formcad.telefone_comercial.focus();
		return;
	}
	if( document.formcad.telefone_fax.value.length == 0 )
	{
		alert("O campo ( Telefone/Fax: ) deve ser preechido!");
		document.formcad.telefone_fax.focus();
		return;
	}
	// validando o campo situacao
	var total=0;
	var i=0;
	while(i<document.formcad.situacao.length && total == 0)
	{
		if(document.formcad.situacao[i].checked) { total++; }
		i++;
	} // while
	if(total == 0)
	{
		alert("O campo Situacao deve ser preechido !");
		document.formcad.situacao.focus();
		return;
	}
	document.formcad.submit();
}

</script>

<div id="div_usuario_tudo">

<div id="div_usuario_nome">Cadastro de convenios
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
		action="convenios_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_convenio=<?php echo $_GET['cod_convenio'];?>">
		
<p>
Descri&ccedil;&atilde;o: <br />
<input type="text" name="nome" id="nome" size="50" maxlength="50" value="<?php echo $nome; ?>"  />

</p>
<p>
URl: <br />
<input type="text" name="url" id="url" size="50" maxlength="50" value="<?php echo $url; ?>"  />
</p>

<p>
Telefone Comercial: <br />
<input type="text" name="telefone_comercial" id="telefone_comercial" size="20" maxlength="50" value="<?php echo $telefone_comercial; ?>" onkeyup="maskIt(this,event,'####-###-####')"  />
</p>

<p>
Telefone/Fax: <br />
<input type="text" name="telefone_fax" id="telefone_fax" size="20" maxlength="50" value="<?php echo $telefone_fax; ?>" onkeyup="maskIt(this,event,'(##)####-####')" />
</p>

<p>Situa&ccedil;&atilde;o:
<input type="radio" name="situacao" id="situacao" value="1" <?php if( $situacao == "1"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="2" <?php if( $situacao == "2"){echo ' checked="checked" ';}?> /> Inativo 
</p>
<p>
<input type="button" name="btnenviar" value="Gravar" onclick="enviar();" />
&nbsp;&nbsp;&nbsp;
<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=convenios';"  />

</form>
</p></div>
<script language="javascript">
	document.formcad.nome.focus();
</script>





