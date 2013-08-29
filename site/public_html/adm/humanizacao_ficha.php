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
		$cod_humanizacao = $_GET['cod_humanizacao'];
		$sql = "select * from humanizacao where cod_humanizacao = '$cod_humanizacao'";
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$autor = $dados['autor'];
			$titulo = $dados['titulo']; 
	        $subtitulo = $dados['subtitulo'];	
		    
			$font = $dados['font'];
			$data_noticia =DataUSA_to_BR($dados['data_noticia']);
			$hora = $dados['hora'];
			$destaque = $dados['destaque'];
			$data_cadastro = DataUSA_to_BR($dados['data_cadastro']);
			$situacao = $dados['situacao'];
			$noticia = $dados['noticia'];
		}
		else
		{
			echo '<script language="javascript">
				 alert ("Desculpe Registro não encontrado!");
				 documente.location = "index.php?modulo=produtos";
				 </script>';
				 
			exit;
			
		}
	}// fim do if alterar
	
	else
	{
	        $autor = '';
			$titulo = '';
	        $subtitulo = '';
		    
			$font = '';
			$data_noticia='';
			$hora = '';
			$destaque = '';
			$data_cadastro = '';
			$situacao = '';
			$noticia = '';
	}
?>

<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>


<script language="javascript">
//-------------------------------------------------------------------------

function enviar()
{
	// validando o campo nome
	if( document.formcad.autor.value.length == 0 || document.formcad.autor.value.length == "" )
	{
		alert("O campo Autor deve ser preechido!");
		document.formcad.autor.focus();
		return;
	}
	if( document.formcad.titulo.value.length == 0 || document.formcad.titulo.value.length=="" )
	{
		alert("O campo Titulo deve ser preechido!");
		document.formcad.titulo.focus();
		return;
	}
	if( document.formcad.subtitulo.value.length == 0 )
	{
		alert("O campo Subtitulo deve ser preechido!");
		document.formcad.subtitulo.focus();
		return;
	}
	
	if( document.formcad.font.value.length == 0 )
	{
		alert("O campo Font da Noticia deve ser preechido!");
		document.formcad.font.focus();
		return;
	}
	
	// validando o campo DATA Da noticia
	if( !verificaData(document.formcad.data_noticia.value) )
	{
		alert("O campo Data da Notícia deve ser preechido com uma data válida !");
		document.formcad.data_noticia.focus();
		document.formcad.data_noticia.select();
		return;
	}
	/*if( document.formcad.hora.value.length == 0 )
	{
		alert("O campo hora deve ser preechido!");
		document.formcad.hora.focus();
		return;
	}*/
		// validando o campo destaque
	var total=0;
	var i=0;
	while(i<document.formcad.destaque.length && total == 0)
	{
		if(document.formcad.destaque[i].checked) { total++; }
		i++;
	} // while
	if(total == 0)
	{
		alert("O campo Destaque deve ser preechido !");
		document.formcad.destaque.focus();
		return;
	}	
	// validando o campo DATA Da noticia
	/*if( !verificaData(document.formcad.data_cadastro.value) )
	{
		alert("O campo Data do Cadastro do recenascido deve ser preechido com uma data válida !");
		document.formcad.data_cadastro.focus();
		document.formcad.data_cadastro.select();
		return;
	}*/
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
	if( document.formcad.noticia.value.length == 0 )
	{
		alert("O campo Noticia deve ser preechido!");
		document.formcad.noticia.focus();
		return;
	}
	document.formcad.submit();
}

//-------------------------------------------------------------------------------

//--------------------------------------------------------------------------------

</script><style type="text/css">
#div_organizaformhumanizacaotudo
{
	width:600px;
	height:auto;
	margin:auto;
	padding-left:30px;
	padding-bottom:30px;
}
#div_organizaformhumanizacao
{
	float:left;
	width:600px;
	height:auto;


}
#div_nomeformhumanizacao
{
	width:590px;
	height:25px;
	background-color:#ccc;
	padding-left:10px;
	padding-top:5px;
	
	
}
#div_butoms
{
	float:left;
	width:auto;
	padding-top:20px;
	height:auto;
	padding-left:10px;
	padding-bottom:20px;
	
	
}
</style>

<div id="div_organizaformhumanizacaotudo">
<div id="div_organizaformhumanizacao">
<div id="div_nomeformhumanizacao">
<b>Cadastro Humaniza&ccedil;&atilde;o
<?php 
	if ($_GET['acao'] == 'incluir')
	{
		echo ' - Incluindo';
	}
	else
	{
		echo ' - Alterando';
	}
?>

</b></div><br />




    
<form name="formcad" id="formcad" method="post" 
		action="humanizacao_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_humanizacao=<?php echo $_GET['cod_humanizacao'];?>">
 

Autor da Not&iacute;cia: <br />
<input type="text" name="autor" id="autor" size="40" maxlength="70" value="<?php echo $autor; ?>" />


<p>
Titulo da Not&iacute;cia<br />
<input type="text" name="titulo" id="titulo" size="40" maxlength="100" value="<?php echo $titulo; ?>" />
</p>

<p>
Subtitulo da not&iacute;cia<br />
<input type="text" name="subtitulo" id="subtitulo" size="40" maxlength="50" value="<?php echo $subtitulo; ?>" />
</p>

<p>
Font Original<br />
<input type="text" name="font" id="font" size="40" maxlength="70" value="<?php echo $font; ?>" />
</p>
<p>
Data da not&iacute;cia<br />
<input type="text" name="data_noticia" id="data_noticia" size="15" maxlength="10" value="<?php echo $data_noticia; ?>" onkeyup="maskIt(this,event,'##/##/####')" />
</p>
<p>
Horario da not&iacute;cia<br />
<input type="text" name="hora" id="hora" size="15" maxlength="5" value="<?php echo $hora; ?>" onkeyup="maskIt(this,event,'##:##')" disabled="disabled" />
</p>
<p>
Destaque
<input type="radio" name="destaque" id="destaque" value="s" <?php if( $destaque == "s"){echo ' checked="checked" ';}?> /> Sim 

<input type="radio" name="destaque" id="destaque" value="n" <?php if( $destaque == "n"){echo ' checked="checked" ';}?> /> N&atilde;o 
</p>
<p>
Data do Cadastro<br />
<input type="text" name="data_cadastro" id="data_cadastro" size="15" maxlength="10" value="<?php echo $data_cadastro; ?>" onkeyup="maskIt(this,event,'##/##/####')" disabled="disabled" />
</p>

<p>
Situa&ccedil;&atilde;o
<input type="radio" name="situacao" id="situacao" value="1" <?php if( $situacao == "1"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="2" <?php if( $situacao == "2"){echo ' checked="checked" ';}?> /> Inativo 
</p>
<p>Descri&ccedil;&atilde;o da Not&iacute;cia:<br>
<textarea name="noticia" cols="70" rows="7" id="noticia" ><?php echo $noticia; ?></textarea>
</p>

<font color="#FF0000">OS Campos que est&atilde;o desabilitados s&atilde;o Campos automaticos</font>

<div id="div_butoms">
<input type="button" name="btnenviar" value="Gravar" onClick="enviar();"  />

<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=humanizacao';"  />
</div>
</p>
</form></div>




<script language="javascript">
	document.formcad.nome.focus();
</script>