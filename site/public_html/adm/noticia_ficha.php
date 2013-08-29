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
		$cod_noticia = $_GET['cod_noticia'];
		$sql = "select * from noticia where cod_noticia = '$cod_noticia'";
		
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$cod_setor = $dados['cod_setor'];
			$autor = ucfirst ($dados['autor']);
			$titulo = ucfirst($dados['titulo']);//aqui inicializa a primeira palavra com a letra maiuscula. exemplo "Teste",por mais que o usuario digite ela minuscula ele sempre faiguardar maiuscula  
	        $subtitulo = ucfirst ($dados['subtitulo']);	
			$font = ucfirst($dados['font']);
			$data_noticia =DataUSA_to_BR($dados['data_noticia']);
			$hora = $dados['hora'];
			$destaque = $dados['destaque'];
			$data_cadastro = DataUSA_to_BR($dados['data_cadastro']);
			$situacao = $dados['situacao'];
			$ver_noticias = $dados['ver_noticias'];
			$noticia = ucfirst($dados['noticia']);
		}
		else
		{
			echo '<script language="javascript">
				 alert ("Desculpe Registro não encontrado!");
				 documente.location = "index.php?modulo=noticia";
				 </script>';
				 
			exit;
			
		}
	}// fim do if alterar
	
	else
	{       $cod_setor='';
	        $autor = '';
			$titulo = '';
	        $subtitulo = '';
		    
			$font = '';
			$data_noticia= '';
			$hora =  strftime("%H:%I:%S");
			$destaque = 's';
			$data_cadastro = date("j/m/Y");
			$situacao = 1;
			$ver_noticias=1;
			$noticia = '';
	}
?>

<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>


<script language="javascript">
//-------------------------------------------------------------------------

//----------------------------------------------------------------------
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
		alert("O campo Situação deve ser preechido !");
		document.formcad.situacao.focus();
		return;
	}
		// validando o campo ver_noticias
	var total=0;
	var i=0;
	while(i<document.formcad.ver_noticias.length && total == 0)
	{
		if(document.formcad.ver_noticias[i].checked) { total++; }
		i++;
	} // while
	if(total == 0)
	{
		alert("O campo ver Notícias deve ser preechido !");
		document.formcad.ver_noticias.focus();
		return;
	}
	// validando o campo noticias
	if( document.formcad.noticia.value.length == 0 )
	{
		alert("O campo Notícias  deve ser preechido!");
		document.formcad.noticia.focus();
		return;
	}
	document.formcad.submit();
}

//-------------------------------------------------------------------------------
function ContarCaracteres(campo, contador, limite) {
        if (campo.value.length > limite)
          campo.value = campo.value.substring(0, limite);
        else
          contador.value = limite - campo.value.length;
      }
//--------------------------------------------------------------------------------

</script>


<b>Cadastro de Not&iacute;cias
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

</b><br />

<?php

	if( isset($_GET['msg']) )
	{
		echo '<div style="font-weight:bold; color:#ff0000;">'.$_GET['msg'].'</div>';
	}

?>


    
<form name="formcad" id="formcad" method="post" 
		action="noticia_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_noticia=<?php echo $_GET['cod_noticia'];?>">
 
<p>Setor<br />
<select name="cod_setor" id="cod_setor">
		<option value="0" > Selecione um Setor</option>
		<?php
			$sql = " select * from setor ";
			$r = mysql_query($sql);
			
			while( $dadoscid = mysql_fetch_array($r) )
			{
				if( $dadoscid['cod_setor'] == $cod_setor )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
		
				echo '<option value="'.$dadoscid['cod_setor'].'" '.$sel.'  > '.$dadoscid['nome'].' </option>';
			}
				
		?>
	</select>
</p>
Autor da Not&iacute;cia: <br />
<input type="text" name="autor" id="autor" size="40" maxlength="70" value="<?php echo $autor; ?>" />


<p>
Titulo da Not&iacute;cia<br />
<input type="text" name="titulo" id="titulo" size="40" maxlength="100" value="<?php echo $titulo; ?>" />
</p>

<p>
Subtitulo da not&iacute;cia<br />
<input type="text" name="subtitulo" id="subtitulo" size="40" maxlength="150" value="<?php echo $subtitulo; ?>" />
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
<input type="text" name="hora" id="hora" size="15" maxlength="5" value="<?php echo $hora; ?>" onkeyup="maskIt(this,event,'##:##')" />
</p>
<p>
Destaque
<input type="radio" name="destaque" id="destaque" value="s" <?php if( $destaque == "s"){echo ' checked="checked" ';}?> /> Sim 

<input type="radio" name="destaque" id="destaque" value="n" <?php if( $destaque == "n"){echo ' checked="checked" ';}?> /> N&atilde;o 
</p>
<p>
Data do Cadastro<br />
<input type="text" name="data_cadastro" id="data_cadastro" size="15" maxlength="10" value="<?php echo $data_cadastro; ?>" onkeyup="maskIt(this,event,'##/##/####')" /> 
</p>

<p>
Situa&ccedil;&atilde;o
<input type="radio" name="situacao" id="situacao" value="1" <?php if( $situacao == "1"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="2" <?php if( $situacao == "2"){echo ' checked="checked" ';}?> /> Inativo 
</p>
<p>
Ver Not&iacute;cias:
<input type="radio" name="ver_noticias" id="ver_noticias" value="1" <?php if( $ver_noticias == "1"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="ver_noticias" id="ver_noticias" value="2" <?php if( $ver_noticias == "2"){echo ' checked="checked" ';}?> /> Inativo 
</p>



<p>Descri&ccedil;&atilde;o da Not&iacute;cia:<br>
<textarea name="noticia" cols="70" rows="7" id="noticia" onkeydown="ContarCaracteres(this,this.form.contador,3000)" onkeyup="ContarCaracteres(this,this.form.contador,3000)" ><?php echo $noticia; ?></textarea>
 <script type="text/javascript">
        document.write("<input type='text' size='4' name='contador' value='3000' style='border: none; text-align: right' readonly='readonly'>")
      </script> caracteres restantes
</p>



<div id="div_butoms">
<input type="button" name="btnenviar" value="Gravar" onClick="enviar();"  />

<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=noticia';"  />
</div>
</p>
</form>




<script language="javascript">
	document.formcad.nome.focus();
</script>