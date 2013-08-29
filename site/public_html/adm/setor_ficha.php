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
		$cod_setor = $_GET['cod_setor'];
		$sql = "select * from setor where cod_setor = '$cod_setor'";
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$nome = $dados['nome'];
			$ramal = $dados['ramal'];
			$ramal_alternativo = $dados['ramal_alternativo'];
			$tipo_de_ramal = $dados['tipo_de_ramal'];
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
		$nome='';
		$ramal='';
		$ramal_alternativo ='';
		$tipo_de_ramal ='';
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
			nome:{
				required:true,minlength:2
			},
			ramal:{
				required:true,minlength:2
			},
			ramal_alternativo:{
				required:true,minlength:2
			},
			
		},
		messages:
		{
			nome:{
				required:"<font color=#FF0000>Informe o seu nome </font>",minlength:"&Eacute; Necessario no minimo 2 caracteres"
			},
			ramal:{
				required:"<br /><font color=#FF0000>Informe o seu ramal </font>",minlength:"&Eacute; Necessario no minimo 2 caracteres"
			},
			ramal_alternativo:{
				required:"<br /><font color=#FF0000>Informe o seu ramal alternativo </font>",minlength:"&Eacute; Necessario no minimo 2 caracteres"
			}
			
			
		}
	});
});

</script>
<div id="div_usuario_tudo">

<div id="div_usuario_nome">Cadastro de setor
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
		action="setor_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_setor=<?php echo $_GET['cod_setor'];?>">
		
<p>
Descri&ccedil;&atilde;o: <br />
<input type="text" name="nome" id="nome" size="50" maxlength="70" value="<?php echo $nome; ?>" label="nome" required />
</p>

<p>
Ramal: <br />
<input type="text" name="ramal" id="ramal" size="50" maxlength="50" onkeyup="maskIt(this,event,'###')" value="<?php echo $ramal; ?>" label="ramal" required />
</p>
<p>
Ramal Alternativo: <br />
<input type="text" name="ramal_alternativo" id="ramal_alternativo" size="50" maxlength="50" onkeyup="maskIt(this,event,'###')" value="<?php echo $ramal_alternativo; ?>" label="ramal" required />
</p>
<p>
Situa&ccedil;&atilde;o:
<input type="radio" name="situacao" id="situacao" value="1" <?php if( $situacao == "1"){echo ' checked="checked" ';}?> label="situacao" required /> Ativo 

<input type="radio" name="situacao" id="situacao" value="2" <?php if( $situacao == "2"){echo ' checked="checked" ';}?> /> Inativo </td>

</p>
<p>
Tipo do Ramal:
<input type="radio" name="tipo_de_ramal" id="tipo_de_ramal" value="Interno" <?php if( $tipo_de_ramal == "Interno"){echo ' checked="checked" ';}?>/> Ramais Interno

<input type="radio" name="tipo_de_ramal" id="tipo_de_ramal" value="Terceiros" <?php if( $tipo_de_ramal == "Terceiros"){echo ' checked="checked" ';}?> /> Ramais Terceiros 

<input type="radio" name="tipo_de_ramal" id="tipo_de_ramal" value="Setores_enfermagem" <?php if( $tipo_de_ramal == "Setores_enfermagem"){echo ' checked="checked" ';}?> />Ramais das clinicas de Enfermagem 

<input type="radio" name="tipo_de_ramal" id="tipo_de_ramal" value="Consultorios" <?php if( $tipo_de_ramal == "Consultorios"){echo ' checked="checked" ';}?> /> Ramal dos Consultorios 

</p>
<p>
<input type="submit" name="btnenviar" value="Gravar" />
&nbsp;&nbsp;&nbsp;
<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=setor';"  />

</form>
</p></p></div>
<script language="javascript">
	document.formcad.nome.focus();
</script>





