<?php
	session_start();
	
	if( !isset($_SESSION['usuario_logado']) )
	{
		echo '<script language="javascript">
				document.location="index.php?msg=Usuario Nao Autenticado";
			  </script>
			 ';
		exit;		
	}
	
//ini_set( 'error_reporting', E_ALL ^ E_NOTICE ); 
	ini_set( 'display_errors', '0' );
?>

<?php
include("../portal/funcoes.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Santa Casa de Adamantina : &Aacute;rea Administrativa</title>
</head>

<body>
Atualizando dados, aguarde...

<?php

	$conexao = conectar_bd();
	
	if ($_GET['acao'] == 'incluir')
	{
		$nome = $_POST['nome'];
		$ramal = $_POST['ramal'];
		$ramal_alternativo = $_POST['ramal_alternativo'];
		$tipo_de_ramal = $_POST['tipo_de_ramal'];
		$situacao = $_POST['situacao'];
		
		$sql = " insert into setor(nome,ramal,ramal_alternativo,tipo_de_ramal,situacao)  
				 values ('$nome','$ramal','$ramal_alternativo','$tipo_de_ramal','$situacao')
			   ";

	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		$nome = $_POST['nome'];
		$ramal = $_POST['ramal'];
		$ramal_alternativo = $_POST['ramal_alternativo'];
			$tipo_de_ramal = $_POST['tipo_de_ramal'];
		$situacao = $_POST['situacao'];
		$cod_setor=$_GET['cod_setor'];
		
		$sql = "update setor set
				nome = '$nome',ramal='$ramal',ramal_alternativo='$ramal_alternativo',tipo_de_ramal='$tipo_de_ramal',situacao='$situacao'
				where cod_setor = '$cod_setor'
			   ";
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_setor = $_GET['cod_setor'];
		
		$sql = "delete from setor where cod_setor = '$cod_setor'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("ACAO INVALIDA !");
					document.location = "index.php?modulo=setor";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=setor";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=setor";
		      </script>';
		exit;
	}

?>

</body>
</html>
