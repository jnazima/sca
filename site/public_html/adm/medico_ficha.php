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
		$cod_medico = $_GET['cod_medico'];
		$sql = "select * from medico where cod_medico = '$cod_medico'";
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$nome = $dados['nome'];
			$crm = $dados['crm'];
			$cpf = $dados['cpf'];
			$cod_especialidade = $dados['cod_especialidade'];
			$cod_cidade = $dados['cod_cidade'];
			$sexo =$dados['sexo'];
			$situacao = $dados['situacao'];
			$data_cadastro = DataUSA_to_BR( $dados['data_cadastro']);
			
		}
		else
		{
			echo '<script language="javascript">
				 alert ("REGISTRO NAO ENCONTRADO!");
				 documente.location = "index.php?modulo=medico";
				 </script>';
			exit;
		}
	}// fim do if alterar
	
	else
	{
		    $nome = '';
			$crm = '';
			$cpf = '';
			$cod_especialidade = '';
			$cod_cidade = '';
			$sexo='';
			$situacao='';
			$data_cadastro ='';
	}
	
?>

<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>

<script language="javascript">

$(document).ready(function() {

$("#crm").mask("99.999");
$("#cpf").mask("999/999/999-99");
$("#data_cadastro").mask("99/99/9999");

 $("#formcad").validate(
 {
 	rules:
	{
			nome:{
				required:true,minlength:2
			},
			crm:{
				required:true,minlength:2
			},
			cpf:{
				required:true,minlength:2
			},
			data_cadastro:{
				required:true,minlength:2
			}
			
			
		},
		messages:
		{
			nome:{
				required:"&Eacute; necessario informar pelo menos um nome ",minlength:"É Necessario no minimo 2 caracteres"
			},
			crm:{
				required:"&Eacute; necessario informar pelo menos umcrm",minlength:"É Necessario no minimo 2 caracteres"
			},
			cpf:
			{
				required:"&Eacute; necessario informar pelo menos um Cpf",minlength:"É Necessario no minimo 2 caracteres"
			},
			data_cadastro:{
				required:"&Eacute; necessario informar pelo menos uma data de cadastro",minlength:"É Necessario no minimo 2 caracteres"
				},
				situacao:{
				required:"&Eacute; necessario informar pelo menos uma situa&ccedil;&atilde;o",minlength:"É Necessario no minimo 2 caracteres"
				}
			
			
			
		}
	});
});

</script>
<div id="div_usuario_tudo">

<div id="div_usuario_nome">Cadastro de M&eacute;dicos

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
<?php

	if( isset($_GET['msg']) )
	{
		echo '<div style="font-weight:bold; color:#ff0000;">'.$_GET['msg'].'</div>';
	}

?>
<form name="formcad" id="formcad" method="post" 
		action="medico_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_medico=<?php echo $_GET['cod_medico'];?>">
	<table border="0" cellpadding="1" cellspacing="1" width="423" >
<tr>
<td width="115" height="22">
Nome do m&eacute;dico 
</td>
<tr>
<td width="307" colspan="2"><input type="text" name="nome" id="nome" size="50" maxlength="50" value="<?php echo $nome; ?>" label="nome" required="true" /></td>
</tr>
<tr>
<td width="124" height="22">
Conselho Regional de Medicina:
</td>
<td width="124" height="22">
CPF
</td>
</tr>
<tr>
<td width="179">
<input type="text" name="crm" id="crm" size="20" maxlength="10" value="<?php echo $crm; ?>" label="crm" required="true"  />
</td>
<td width="179">
<input type="text" name="cpf" id="cpf" size="20" maxlength="14" value="<?php echo $cpf; ?>" label="cpf" required="true"  />
</td>
</tr>
<tr>
<td width="124" height="22">
Data do Cadastro
</td>
</tr>
<tr>
<td width="179">
<input type="text" name="data_cadastro" id="data_cadastro" size="15" maxlength="10" value="<?php echo $data_cadastro; ?>" label="cpf" required="true"  />
</td>
</tr>

<tr>
<td width="124" height="22">
Sexo
</td>
</tr>
<tr>
<td width="179">
<input type="radio" name="sexo" id="sexo" value="m" <?php if( $sexo == "m"){echo ' checked="checked" ';}?> />Masculino

<input type="radio" name="sexo" id="sexo" value="f" <?php if( $sexo == "f"){echo ' checked="checked" ';}?> /> Feminino
</td>
</tr>

<tr>
<td width="124" height="22">
Situa&ccedil;&atilde;o
</td>
</tr>
<tr>
<td width="179">
<input type="radio" name="situacao" id="situacao" value="1" <?php if( $situacao == "1"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="2" <?php if( $situacao == "2"){echo ' checked="checked" ';}?> /> Inativo
</td>
</tr>


</table>
	


<table border="0" cellpadding="1" cellspacing="1" width="423" >

<tr>


<td height="22" >
 Especialidade
</td>
<td height="22">
Estado
</td>
<td height="22">
Cidade
</td>
</tr>

<tr>

<td>
<select name="cod_especialidade" id="cod_especialidade">
		<option value="0" > Selecione uma Especialidade </option>
		<?php
			$sql = " select * from especialidade ";
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

<td>
<select name="cod_estado" id="cod_estado" onchange="busca_cidade();">
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
	</select>

</td>


<td >

	<div id="divCidade">
	<select id="cod_cidade" name="cod_cidade">
		<option value="0">Selecione uma Cidade</option>
	</select>
</div>

</td>


</tr>
<tr><td height="26"></td><td></td><td></td></tr>




<tr><td>
<input type="submit" name="btnenviar" value="Gravar" onClick="enviar();"  />

<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=medico';"  />
</td>
</tr>
</table>

</form>
</p></p></div>
<script language="javascript">
	document.formcad.nome.focus();
</script>





