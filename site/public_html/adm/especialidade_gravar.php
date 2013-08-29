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
		$cod_especialidade = $_POST['cod_especialidade'];
		$descricao = $_POST['descricao'];
		$situacao = $_POST['situacao'];
		
		
		$sql = " insert into especialidade(cod_especialidade,descricao,situacao)  
				 values ('$cod_especialidade','$descricao','$situacao')
			   ";
			//echo $sql; exit;
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		
		$descricao = $_POST['descricao'];
		$situacao = $_POST['situacao'];
		$cod_especialidade=$_GET['cod_especialidade'];
		
		$sql = "update especialidade set
				descricao = '$descricao',situacao='$situacao'
				where cod_especialidade = '$cod_especialidade'
			   ";
			   
			  //echo $sql; exit;
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_especialidade = $_GET['cod_especialidade'];
		
		$sql = "delete from especialidade where cod_especialidade = '$cod_especialidade'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("ACAO INVALIDA !");
					document.location = "index.php?modulo=especialidade";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=especialidade";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=especialidade";
		      </script>';
		exit;
	}

?>

</body>
</html>
