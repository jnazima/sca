<style type="text/css">

input{	
	padding-left: 4px;
	border: 1px solid #CCCCCC;
	font-size: 11px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
	color: #000;
	background-color: #ebecf1;
	text-decoration: none;
}
</style>
<?php
	
	
	include "../portal/funcoes.php";
	ini_set( 'display_errors', '0' );
	
	$conexao = conectar_bd();
	
	if( !$conexao ) 
	{ 
		echo '<a href="javascript:window.close();">Fechar</a>';		
		exit; 
	}
	
	// verificando o código do produto

   	$sql = " select  *
			 from convenios
			 where cod_convenio = '". $_GET['cod_convenio'] . "' 
		   ";
		   
		
		   
	$res_aux = mysql_query($sql, $conexao);
	$rows_aux = mysql_num_rows($res_aux);
	
	if( $rows_aux > 0 )
	{
	
	  $aux = mysql_fetch_array($res_aux);
	  $nome = $aux['titulo'];
	  $cod_convenio = $aux['cod_convenio'];
	
	}
	else 
	{ 
	echo '<script language="javascript"> 
							alert("Não foram encontrados registros");
							document.location = "index.php?modulo=fotos_convenios";
					  </script>';
					  		exit; 
	}
	
	// verificando se está incluindo ou excluindo -----------------------------------------------------
    if($_GET['acao'] == 'i')
	 // incluindo uma foto
	{
		// verificando o arquivo -----------------------------------------------------------------------------------
		$arquivo_ok = true;

		$tipo_arquivo = $_FILES['file']['type']; 
		$tamanho_arquivo = $_FILES['file']['size']; 
		
		// verificando o tipo de arquivo
		if ( !strpos($tipo_arquivo, "gif") and !strpos($tipo_arquivo, "jpeg") ) 
		{
			echo '<script language="javascript"> alert("So e possivel salvar arquivos do tipo gif ou jpg !"); </script>';
			$arquivo_ok = false;
		}
	
		// verificando o tamanho do arquivo que deve ser de até 1MB = 1000 KB
		if ( $tamanho_arquivo > 1000 * 1024 and $arquivo_ok )
		{
			echo '<script language="javascript"> alert("Não e possivel gravar a foto, tamanho supeior a 1 MB !"); </script>';
			$arquivo_ok = false;
		}	
		
		// verificando se já não está cadastrada 
		$sql = " select cod_foto from fotos_convenios
				 where cod_convenio = '$cod_convenio' and descricao = '".$_POST['descricao']."'
			   ";
			   
		//echo $sql; exit;
		$result = mysql_query($sql, $conexao);
		
		if( mysql_num_rows($result) == 0 and $arquivo_ok )
		{	
			// extens&atilde;o do arquivo a ser salvo
			if( strpos($tipo_arquivo, "gif") > 0 ) 
			{ $extensao = 'gif'; } 
			else
			{ $extensao = 'jpg'; } 

			$sql = " insert into fotos_convenios (cod_convenio, extensao, descricao)
					 values ( '" . 	($_GET['cod_convenio']) . "', 
					 		  '" . $extensao . "',
					 		  '" . 	($_POST['descricao']) . "')
					";
			
			
			
			// se conseguiu incluir no banco de dados o reg. da foto
			if( $trans = mysql_query($sql, $conexao) )
			{			
				// fazendo o upload do arquivo -----------------------------------------------------------------------				
				
				// obtém o último codigo auto-incremento da conexão atual
				$cod_foto = mysql_insert_id(); 
				
				//$arquivo = "C:\Arquivos de programas\VertrigoServ\www\Ecommerce_novo\fotos_produtos" . $cod_foto .'.'. $extensao;	
				$arquivo = "fotos_convenios/" . $cod_foto .'.'. $extensao;	

				if ( !move_uploaded_file($_FILES['file']['tmp_name'], $arquivo) )
				{ 	
					echo '<script language="javascript"> alert("Não foi possivel salvar o arquivo, erro no servidor !"); </script>';
					$arquivo_ok = false;				
					
					// excluindo o registro
					mysql_query("delete from fotos_convenios where cod_foto = '$cod_foto' ", $conexao);
				
				} // se não conseguiu gravar o arquivo

			} // se incluiu o registro da foto
			
		} // se não encontrou uma foto já cadastrada........
	
	} // incluindo....
	else 
	if( $_GET['acao'] == 'e' ) // excluindo uma foto
	{

		// tudo ok para excluir --------------
		$sql = " delete from fotos_convenios 
				 where cod_foto = '" . $_GET['cod_foto'] . "'
				";
				
		$trans = mysql_query($sql, $conexao);
		
		// excluindo o arquivo fisicamente ---------------------------------------------
		$arquivo = "fotos_convenios/" . $_GET['cod_foto']  .'.'. $_GET['extensao'];
		if( file_exists($arquivo) ) { unlink( $arquivo ); }
	
	} // excluindo....
	
?>

<script language="javascript">

//------------------------------------------------------------------------------------------------------------------
function excluir_foto(descricao, cod_foto, extensao)
{
	if( confirm('Deseja realmente excluir a foto ' + descricao + ' ?') )
	{		
	document.location = 'fotos_convenios.php?acao=e&cod_foto='+cod_foto+'&extensao='+extensao+'&cod_convenio=<?php echo $cod_convenio; ?>';	
		
	}

} // function excluir_foto(cod_foto)

//------------------------------------------------------------------------------------------------------------------
function validar_foto()
{

	if( document.form1.descricao.value == 0 )
	{
		alert("Uma descricao para a foto deve ser informada antes de gravar !");
		document.form1.descricao.focus();
		return false;
	}
	
	if( document.form1.file.value == "" )
	{
		alert("Um arquivo deve ser informado antes de gravar !");
		document.form1.file.focus();
		return false;
	}

	// tudo ok para incluir
	
	return true;
	

} // function validar_foto()

//------------------------------------------------------------------------------------------------------------------

</script>

<style type="text/css">
<!--
body,td,th {
	font-family: verdana;
	font-size: 11px;
	
	
}
body
{
	background-image:url(Imagens/bodybg.jpg);
	background-repeat:repeat-x;
}
table,tr,td,a,img
{
	border-bottom-color:#999;
}
-->
</style></head>


<p><b> <h2> <?php echo 'Titulo da Not&iacute;cia' .'<br />'. $nome; ?> </h2></b></p>
<p><strong>Cadastro de Fotos de Not&iacute;cias</strong></p>
<p><font color="#FF0000" size="1">Obs. Todas as fotos ter&atilde;o que ter Largura de 320 pixels e Altura de 206 pixels para que n&atilde;o quebre a div respons&aacute;vel pela divis&atilde;o das imagens na home da not&iacute;cias<br />
S&oacute; ser&aacute; Permitida uma foto por not&iacute;cia.
</font></p>



<p>&nbsp;</p>

<b>Preencha os campos abaixo e clique em adicionar:</b>
<form action="fotos_convenios.php?acao=i&amp;cod_convenio=<?php echo $cod_convenio; ?>" onsubmit="return validar_foto();" method="post" enctype="multipart/form-data"name="form1" id="form1">

        <p>Descri&ccedil;&atilde;o da Foto:<br />
          <input name="descricao" type="text" id="descricao" size="70" maxlength="250" />
          <br /><BR />
       Selecione um Arquivo<br />
          <input name="file" type="file" size="50" />
          
        <p><a href="javascript:document.form1.submit();">+ Adicionar Foto </a>&nbsp;<a href="javascript:window.close();">Fechar Cadastro de Fotos </a>
</form>

<p>&nbsp;</p>

<?php
	// listando as fotos em uma tabela com opção de excluir -------------------------
	$sql = " select *
			 from fotos_convenios
			 where cod_convenio = '". $_GET['cod_convenio'] . "' 
			 order by cod_foto
			";
	
	$result = mysql_query($sql, $conexao);
	$rows = mysql_num_rows($result);

	if( $rows > 0 )
	{
        echo ' <table width="98%" border="0" cellspacing="1" cellpadding="3">';
        echo '   <tr bgcolor="#CCCCCC">';
        echo '     <td width="88%" align="left" ><b>Fotos</b></td>';
        echo '     <td width="12%" align="center"><b>Op&ccedil;&otilde;es</b></td>';
        echo '   </tr> ';

	  	for($i=1;  $i<=$rows; $i++)
		{
			$dados = mysql_fetch_array($result);
			
        	echo '<tr  bgcolor="#eeeeee"> ';
			echo '  <td  align="left"> ';
			
			$arquivo = "fotos_convenios/" . $dados['cod_foto']  .'.'. $dados['extensao'];	
			echo '<img src="'.$arquivo.'" width="120" height="100"> <br>'; 
			echo $dados['descricao'];
			echo '</td> ';
			
			
			$link_excluir = '<a href="javascript:excluir(\''.$dados['descricao'].'\','.$dados['cod_convenio'].');"> Excluir </a> &nbsp;';//funcao excluir
		
		$link_excluir_foto = '<a href="javascript:excluir_foto(\''.vs($dados['descricao']) . ','.vs($dados['cod_foto']).','.vs($dados['extensao']).');">';
			
			
			
			
			echo '  <td  align="center"> <a href="javascript:excluir_foto('.vs($dados['descricao']) . ','.vs($dados['cod_foto']).','.vs($dados['extensao']).');"><img src="Imagens/Symbol Delete.gif" /><a/></td>';
			
			
        	
			echo '</tr> ';
			
		} // for fotos....
        
        echo '</table>';
		
	} // se há fotos cadastradas...
	else
	{
		echo 'N&atilde;o h&aacute; fotos cadastradas para este produto....';
	} // se não há fotos cadastradas


?>