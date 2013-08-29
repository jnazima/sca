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
		$cod_fale_conosco = $_GET['cod_fale_conosco'];
		$sql = "select * from fale_conosco where cod_fale_conosco = '$cod_fale_conosco'";
		
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$nome = $dados['nome'];
			$email = $dados['email'];
			$telefone = $dados['telefone'];
			$celular = $dados['celular'];
			$cod_assunto = $dados['cod_assunto'];
			$mensagem = $dados['mensagem'];		
			$situacao =$dados['situacao'];
		}
		else
		{
			echo '<script language="javascript">
				 alert ("REGISTRO NAO ENCONTRADO!");
				 documente.location = "index.php?modulo=setor";
				 </script>';
			exit;
		}
	}// fim do if alterar
	
	else
	{
	  $nome ='';
	  $email ='';
	  $telefone ='';
	  $celular ='';
	  $cod_assunto ='';
	  $mensagem ='';
	  $situacao ='';
	}
	
?>

<script type="text/javascript">
function enviar()
{
	if(document.formcad.nome.value.length==0)
	{
	 alert("O Campo nome deve ser preenchido!");
	 document.formcad.nome.focus();
	  
	 return;
	}
	
	if( !ValidaEmail(document.formcad.email.value) )
	{
		alert("O campo EMAIL deve ser preechido corretamente !");
		document.formcad.email.focus();
		document.formcad.email.select();
		return;
	}
	if(document.formcad.telefone.value.length==0)
	{
	 alert("O Campo Telefone deve ser preenchido!");
	 document.formcad.telefone.focus();
	  
	 return;
	}
	
	if(document.formcad.celular.value.length==0)
	{
	 alert("O Campo Celular deve ser preenchido!");
	 document.formcad.celular.focus();
	  
	 return;
	}
	if(document.formcad.mensagem.value.length==0)
	{
	 alert("O Campo Mensagem deve ser preenchido!");
	 document.formcad.mensagem.focus();
	  
	 return;
	}
	
		document.formcad.submit();
}
</script>
<table cellpadding="2" cellspacing="2" >
<form name="formcad" id="formcad" method="post" 
		action="sugestoes_reclamacoes_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_fale_conosco=<?php echo $_GET['cod_fale_conosco'];?>">

<tr><td>Nome:</td></tr>
<tr><td>
<input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" size="40" />
</td></tr>


<tr><td>Email:</td></tr>
<tr><td>
<input type="text" id="email" name="email" value="<?php echo $email; ?>" size="40" />
</td></tr>

<tr><td>Telefone:</td></tr>
<tr><td>
<input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" size="20" onkeyup="maskIt(this,event,'(##)####-####')" />
</td></tr>

<tr><td>Celular:</td></tr>
<tr><td>
<input type="text" id="celular" name="celular" value="<?php echo $celular; ?>" size="20"onkeyup="maskIt(this,event,'(##)####-####')" />
</td></tr>


<tr><td>Assunto:</td></tr>
<tr><td>

<select name="cod_assunto" id="cod_assunto">
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
</td></tr>

<tr><td>Mensagem:</td></tr>
<tr><td><textarea name="mensagem" id="mensagem" value="<?php $mensagem ?>" cols="45" rows="7" ></textarea></td></tr>

<tr><td>
<input  type="button" name="btenviar" id="botao_enviar" value="Enviar" onclick="enviar();" >

<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=sugestoes_reclamacoes';"  />
</td></tr>
</form>
</table>