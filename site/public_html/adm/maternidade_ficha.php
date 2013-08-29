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
		$cod_rec_nascido = $_GET['cod_rec_nascido'];
		$sql = "select * from rec_nascido where cod_rec_nascido = '$cod_rec_nascido'";
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$cod_medico = $dados['cod_medico'];
			$cod_cidade = $dados['cod_cidade']; 
	        $nome = $dados['nome'];	
		    $nome_pai = $dados['nome_pai'];
			$nome_mae = $dados['nome_mae'];
			$nome_irmoes_um = $dados['nome_irmoes_um'];
			$nome_irmoes_dois = $dados['nome_irmoes_dois'];
			$nome_vo_paterno = $dados['nome_vo_paterno'];
			$nome_vovo_paterno = $dados['nome_vovo_paterno'];
			$nome_vo_materno = $dados['nome_vo_materno'];
			$nome_vovo_materno = $dados['nome_vovo_materno'];
			$tamanho = $dados['tamanho'];
			$kg = $dados['kg'];
			$sexo = $dados['sexo'];
		    $data_nascimento = DataUSA_to_BR( $dados['data_nascimento'] );
			$situacao=$dados['situacao'];
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
	       $cod_medico = '';
			$cod_cidade  = '';
	        $nome  = '';
		    $nome_pai  = '';
			$nome_mae  = '';
			$nome_irmoes_um  = '';
			$nome_irmoes_dois ='';
			$nome_vo_paterno  = '';
			$nome_vovo_paterno  = '';
			$nome_vo_materno  = '';
			$nome_vovo_materno  = '';
			$tamanho = '';
			$kg  = '';
			$sexo = '';
		    $data_nascimento = '';
			$situacao='';	
	}
?>

<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>


<script language="javascript">
//-------------------------------------------------------------------------

function enviar()
{
	// validando o campo nome
	if( document.formcad.nome.value.length == 0 || document.formcad.nome.value.length == "" )
	{
		alert("O campo Nome deve ser preechido!");
		document.formcad.nome.focus();
		return;
	}
	if( document.formcad.nome_pai.value.length == 0 || document.formcad.nome_pai.value.length=="" )
	{
		alert("O campo Nome do Pai deve ser preechido!");
		document.formcad.nome_pai.focus();
		return;
	}
	if( document.formcad.nome_mae.value.length == 0 )
	{
		alert("O campo Nome da Mãe deve ser preechido!");
		document.formcad.nome_mae.focus();
		return;
	}
	if( document.formcad.nome_irmoes_um.value.length == 0 )
	{
		alert("O campo Nome do 1º irmão deve ser preechido!");
		document.formcad.nome_irmoes_um.focus();
		return;
	}
	if( document.formcad.nome_irmoes_dois.value.length == 0 )
	{
		alert("O campo Nome do 2º irmão deve ser preechido!");
		document.formcad.nome_irmoes_dois.focus();
		return;
	}
	
	if( document.formcad.nome_vo_paterno.value.length == 0 )
	{
		alert("O campo Nome do Avô Paterno deve ser preechido!");
		document.formcad.nome_vo_paterno.focus();
		return;
	}
	if( document.formcad.nome_vovo_paterno.value.length == 0 )
	{
		alert("O campo Nome da Avó Paterno deve ser preechido!");
		document.formcad.nome_vovo_paterno.focus();
		return;
	}
	if( document.formcad.nome_vo_materno.value.length == 0 )
	{
		alert("O campo Nome da Avô Materno deve ser preechido!");
		document.formcad.nome_vo_materno.focus();
		return;
	}
	if( document.formcad.nome_vovo_materno.value.length == 0 )
	{
		alert("O campo Nome da Avó Materno deve ser preechido!");
		document.formcad.nome_vovo_materno.focus();
		return;
	}
	if( document.formcad.tamanho.value.length == 0 )
	{
		alert("O campo Tamanho deve ser preechido!");
		document.formcad.tamanho.focus();
		return;
	}
	if( document.formcad.kg.value.length == 0 )
	{
		alert("O campo Peso deve ser preechido!");
		document.formcad.kg.focus();
		return;
	}
	
	// validando o campo SEXO
	var total=0;
	var i=0;
	while(i<document.formcad.sexo.length && total == 0)
	{
		if(document.formcad.sexo[i].checked) { total++; }
		i++;
	} // while
	if(total == 0)
	{
		alert("O campo SEXO deve ser preechido !");
		document.formcad.sexo.focus();
		return;
	}	
	
// validando o campo DATA DE NASCIMENTO
	if( !verificaData(document.formcad.data_nascimento.value) )
	{
		alert("O campo Data do Nascimento do recenascido deve ser preechido com uma data válida !");
		document.formcad.data_nascimento.focus();
		document.formcad.data_nascimento.select();
		return;
	}
	if( document.formcad.cod_medico.value.length == '0')
	{
		alert("O campo Medico deve ser preechido!");
		document.formcad.cod_medico.focus();
		return;
	}
	
	document.formcad.submit();
}

//-------------------------------------------------------------------------------

//--------------------------------------------------------------------------------

</script><style type="text/css">
#div_organizaformmaternidadetudo
{
	width:600px;
	height:auto;
	margin:auto;
	padding-left:30px;
	padding-bottom:30px;
}
#div_organizaformmaternidade
{
	
	width:600px;
	height:auto;


}
#div_nomeformmaternidade
{
	width:590px;
	height:25px;
	background-color:#ccc;
	padding-left:10px;
	padding-top:5px;
	
	
}

</style>


<b>Cadastro de Rec&eacute;m Nascido 

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

</b>



<table width="100%" cellpadding="2" cellspacing="2" >
    
<form name="formcad" id="formcad" method="post" 
		action="maternidade_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_rec_nascido=<?php echo $_GET['cod_rec_nascido'];?>">
 
 <tr><td colspan="2">&nbsp;</td></tr>
<tr><td width="52%">Nome Rec&eacute;m Nascido  </td> <td width="48%">Data de Nascimento:</td></tr>

<tr><td><input type="text" name="nome" id="nome" size="40" maxlength="100" value="<?php echo $nome; ?>" /></td><td><input type="text" name="data_nascimento" id="data_nascimento" size="15" maxlength="10" value="<?php echo $data_nascimento; ?>" onkeyup="maskIt(this,event,'##/##/####')" /></td></tr>




<tr><td>Nome do Pai</td><td>M&eacute;dico:</td></tr>

<tr><td><input type="text" name="nome_pai" id="nome_pai" size="40" maxlength="100" value="<?php echo $nome_pai; ?>" /></td>
<td>
		<select name="cod_medico" id="cod_medico">
		<option value="0" > Selecione uma m&eacute;dico </option>
		<?php
			$sql = " select * from medico ";
			$r = mysql_query($sql);
			
			while( $dadosmedico = mysql_fetch_array($r) )
			{
				if( $dadosmedico['cod_medico'] == $cod_medico )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
		
				echo '<option value="'.$dadosmedico['cod_medico'].'" '.$sel.'  > '.$dadosmedico['nome'].' </option>';
			}
				
		?>
	</select>
</td></tr>

<tr><td>Nome do M&atilde;e</td><td>Estado&nbsp;(UF):</td></tr>

<tr><td><input type="text" name="nome_mae" id="nome_mae" size="40" maxlength="100" value="<?php echo $nome_mae; ?>" /></td><td>

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





</td></tr>

<tr><td>Nome do Irm&atilde;os (1&deg;)</td><td>Cidade:</td></tr>

<tr><td><input type="text" name="nome_irmoes_um" id="nome_irmoes_um" size="40" maxlength="100" value="<?php echo $nome_irmoes_um; ?>" /></td>
<td>	<div id="divCidade">
	<select id="cod_cidade" name="cod_cidade">
		<option value="0">Selecione uma Cidade</option>
	</select>
</div></td></tr>


<tr><td>Nome do Irm&atilde;os (2&deg;)</td><td>Situa&ccedil;&atilde;o:</td></tr>

<tr><td><input type="text" name="nome_irmoes_dois" id="nome_irmoes_dois" size="40" maxlength="100" value="<?php echo $nome_irmoes_dois; ?>" /></td>
<td>
<input type="radio" name="situacao" id="situacao" value="1" <?php if( $situacao == "1"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="2" <?php if( $situacao == "2"){echo ' checked="checked" ';}?> /> Inativo 
</td></tr>

<tr><td> Av&ocirc; Paterno</td></tr>

<tr><td><input type="text" name="nome_vo_paterno" id="nome_vo_paterno" size="40" maxlength="100" value="<?php echo $nome_vo_paterno; ?>" /></td></tr>

<tr><td>Av&ograve; Paterno</td></tr>

<tr><td><input type="text" name="nome_vovo_paterno" id="nome_vovo_paterno" size="40" maxlength="100" value="<?php echo $nome_vovo_paterno; ?>" /></td></tr>

<tr><td>Av&ocirc;  Materno</td></tr>

<tr><td><input type="text" name="nome_vo_materno" id="nome_vo_materno" size="40" maxlength="100" value="<?php echo $nome_vo_materno; ?>" /></td></tr>

<tr><td>Av&ograve; Materno</td></tr>

<tr><td><input type="text" name="nome_vovo_materno" id="nome_vovo_materno" size="40" maxlength="100" value="<?php echo $nome_vovo_materno; ?>" /></td></tr>

<tr><td>Tamanho:</td></tr>

<tr><td><input type="text" name="tamanho" id="tamanho" size="10" maxlength="100" value="<?php echo $tamanho; ?>" onkeyup="maskIt(this,event,'##.##')"  /></td></tr>

<tr><td>Peso&nbsp;(KG)</td></tr>

<tr><td><input type="text" name="kg" id="kg" size="10" maxlength="100" value="<?php echo $kg; ?>" onkeyup="maskIt(this,event,'###.###')"  /></td></tr>

<tr><td>Sexo:</td></tr>

<tr><td>
<input type="radio" name="sexo" id="sexo" value="M" <?php if( $sexo == "M"){echo ' checked="checked" ';}?> /> Masculino
<input type="radio" name="sexo" id="sexo" value="F" <?php if( $sexo == "F"){echo ' checked="checked" ';}?> /> Feminino 
</td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>

<input type="button" name="btnenviar" value="Gravar" onClick="enviar();"  />
&nbsp;
<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=maternidade';"  />

</td>
</form>
</table>

<script language="javascript">
	document.formcad.nome.focus();
</script>