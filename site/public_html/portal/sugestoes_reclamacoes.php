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

<style type="text/css">
	#div_conteudo_sugestoes{
		margin-top: 35px;
		font-size:11px;
		}
</style>

<div id="div_conteudo_sugestoes">
A santa casa de adamantina disponibiliza o servi&ccedil;o de sugest&otilde;es e reclama&ccedil;&otilde;es por que a instituição tem compretentim
</div>
<br />
<br />
<table cellpadding="2" cellspacing="2" >
<form name="formcad" id="formcad" method="post" 
		action="sugestoes_reclamacoes_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_fale_conosco=<?php echo $_GET['cod_fale_conosco'];?>">

<tr><td>Nome:</td></tr>
<tr><td>
<input type="text" id="nome" name="nome" value="<?php $nome; ?>" size="40" />
</td></tr>


<tr><td>Email:</td></tr>
<tr><td>
<input type="text" id="email" name="email" value="<?php $email; ?>" size="40" />
</td></tr>

<tr><td>Telefone:</td></tr>
<tr><td>
<input type="text" id="telefone" name="telefone" value="<?php $telefone; ?>" size="20" onkeyup="maskIt(this,event,'(##)####-####')" />
</td></tr>

<tr><td>Celular:</td></tr>
<tr><td>
<input type="text" id="celular" name="celular" value="<?php $celular; ?>" size="20"onkeyup="maskIt(this,event,'(##)####-####')" />
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
<tr><td><textarea name="mensagem" id="mensagem" value="<?php $mensagem ?>" cols="45" rows="7" >Digite aqui sua mensagem</textarea></td></tr>

<tr><td>
<input  type="button" name="btenviar" id="botao_enviar" value="Enviar" onclick="enviar();" >

<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=home';"  />
</td></tr>
</form>
</table>