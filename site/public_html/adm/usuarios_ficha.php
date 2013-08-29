
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
		$cod_usuario = $_GET['cod_usuario'];
		$sql = "select * from usuarios where cod_usuario = '$cod_usuario'";
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
			$login = $dados['login'];
			$senha = $dados['senha'];
			$nome_completo = $dados['nome_completo'];
			$permissao=$dados['permissao'];
			$situacao = $dados['situacao'];
		}
		else
		{
			echo '<script language="javascript">
				 alert ("REGISTRO NAO ENCONTRADO!");
				 documente.location = "index.php?modulo=usuarios";
				 </script>';
			exit;
		}
	}// fim do if alterar
	
	else
	{
		$cod_usuario = '';
		$login = '';
		$senha = '';
		$nome_completo = '';
		$permissao='';
		$situacao='';
	}
	
?>

<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>



<script language="javascript">

/*---------------------------------------abrir e fechar div---------------------------------------*/ 

/*------------------------------------------------------------------------------------------------*/
 $(document).ready(function() {
 $("#formcad").validate(
 {
	 
	 
 	rules:
	{
			login:{
				required:true,minlength:2
			},
			senha:{
				required:true,minlength:2
			},
			senha2:{
				required:true,minlength:2
			},
			nome_completo:{
				required:true,minlength:2
			}
			
			
		},
		messages:
		{
			login:{
				required:"Informe o seu Login ",minlength:"É Necessario no minimo 2 caracteres"
			},
			senha:{
				required:"Informe o seu senha",minlength:"É Necessario no minimo 2 caracteres"
			},
			senha2:{
				required:"Informe a confirma&ccedil;&atilde;o da senha",minlength:"É Necessario no minimo 2 caracteres"
			},
			nome_completo:{
				required:"Informe o seu nome completo",minlength:"É Necessario no minimo 2 caracteres"
			},
			situacao:{
				required:"Informe a situa&ccedil;&atilde;o deste usuario"
			}
			
			
		}
	});
});

</script>

<div id="div_usuario_tudo">

<div id="div_usuario_nome">Cadastro de Usu&aacute;rios

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
		action="usuarios_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_usuario=<?php echo $_GET['cod_usuario'];?>">
		
<p>
Login: <br />
<input type="text" name="login" id="login" size="50" maxlength="50" value="<?php echo $login; ?>" label="login" required="true" />

<p>
Senha: <br /> 
<input type="password" name="senha" id="senha" size="20" maxlength="10" value="<?php echo $senha; ?>" label="senha" required="true"  />

<p>
Confirma&ccedil;&atilde;o da senha: <br />
<input type="password" name="senha2" id="senha2" size="20" maxlength="10" value="<?php echo $senha; ?>" label="senha2" required="true" />

<p>
Nome completo: <br />
<input type="text" name="nome_completo" id="nome_completo" size="50" maxlength="100" value="<?php echo $nome_completo; ?>" label="nome_completo" required="true" />
</p>

<p>

Permiss&atilde;o<br />
<input type="radio" name="permissao" id="permissao" value="Supervisor_avancado" <?php if( $permissao == "Supervisor_avancado"){echo ' checked="checked" ';}?> /> Supervisor
<input type="radio" name="permissao" id="permissao" value="Supervisor_medio" <?php if( $permissao == "Supervisor_medio"){echo ' checked="checked" ';}?> />Supervisor_medio
<label id="exibir">
<input type="radio" name="permissao" id="permissao" value="Supervisor_basico" <?php if( $permissao == "Supervisor_basico"){echo ' checked="checked" ';}?> />Permiss&atilde;o Basica
</label>
</p>



<p>

Situa&ccedil;&atilde;o<br />
<input type="radio" name="situacao" id="situacao" value="Ativo" <?php if( $situacao == "Ativo"){echo ' checked="checked" ';}?> /> Ativo 

<input type="radio" name="situacao" id="situacao" value="Inativo" <?php if( $situacao == "Inativo"){echo ' checked="checked" ';}?> /> Inativo 
</p>



<script type="text/javascript">
   $(document).ready(function(){
	  
	  $('#conteudo').hide();
   
      $('a#exibir').click(function(){
			
		$('#conteudo').show('slow');
   
   	   });
   
      $('a#ocultar').click(function(){
							   
   		$('#conteudo').hide('slow');
      })
   
});
</script>

<a id="exibir" href="#" title="Exibir informa&ccedil;&otilde;es sobre o modulo">Exibir DIV</a>
  <div id="conteudo"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam pulvinar, enim ac hendrerit mattis, lorem mauris vestibulum tellus, nec porttitor diam nunc tempor dui. Aenean orci. Sed tempor diam eget tortor. Maecenas quis lorem. Nullam semper. Fusce adipiscing tellus non enim volutpat malesuada. Cras urna. Vivamus massa metus, tempus et, fermentum et, aliquet accumsan, lectus. Maecenas iaculis elit eget ipsum cursus lacinia. Mauris pulvinar.
   <p><a href="#" id="ocultar" title="ocultar informaçoes sobre o modulo">Ocultar DIV</a></p>
  </div>



<p>
<input type="submit" name="btnenviar" value="Gravar" />
&nbsp;&nbsp;&nbsp;
<input type="button" name="btncancelar" value="Cancelar" onClick="document.location='index.php?modulo=usuarios';"  />

</form>

</p></p></div>
<script language="javascript">
	document.formcad.login.focus();
</script>





