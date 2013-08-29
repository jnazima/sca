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
		$url = $_POST['url'];
		$telefone_comercial = $_POST['telefone_comercial'];
		$telefone_fax = $_POST['telefone_fax'];
		$situacao=$_POST['situacao'];
		
		$sql = " insert into convenios(nome,url,telefone_comercial,telefone_fax,situacao)  
				 values ('$nome','$url','$telefone_comercial','$telefone_fax','$situacao')
			   ";

	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		$nome = $_POST['nome'];
		$url = $_POST['url'];
		$telefone_comercial = $_POST['telefone_comercial'];
		$telefone_fax = $_POST['telefone_fax'];
		$situacao =$_POST['situacao'];
		
		$cod_convenio=$_GET['cod_convenio'];
		
		$sql = "update convenios set
				nome = '$nome',url='$url',telefone_comercial='$telefone_comercial',telefone_fax='$telefone_fax',situacao='$situacao'
				where cod_convenio = '$cod_convenio'
			   ";
			   
			 // echo $sql; exit;
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_convenio = $_GET['cod_convenio'];
		
		$sql = "delete from convenios where cod_convenio = '$cod_convenio'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("ACAO INVALIDA !");
					document.location = "index.php?modulo=convenios";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=convenios";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=convenios";
		      </script>';
		exit;
	}

?>

</body>
</html>
