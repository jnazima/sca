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


Atualizando dados, aguarde...

<?php

	$conexao = conectar_bd();
	
	if ($_GET['acao'] == 'incluir')
	{
		$login =  $_POST['login'];
		$senha = $_POST['senha'];
		$nome_completo = $_POST['nome_completo'];
		$permissao = $_POST['permissao'];
		$situacao = $_POST['situacao'];
		
		$sql = " insert into usuarios(login, senha, nome_completo,permissao,situacao)  
				 values ('$login', '$senha', '$nome_completo','$permissao','$situacao')
			   ";

	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$nome_completo = $_POST['nome_completo'];
		$situacao = $_POST['situacao'];
		$permissao = $_POST['permissao'];
		$cod_usuario = $_GET['cod_usuario'];
		
		$sql = "update usuarios set
				login = '$login', senha = '$senha', nome_completo = '$nome_completo',permissao='$permissao',situacao='$situacao'
				where cod_usuario = '$cod_usuario'
			   ";
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_usuario = $_GET['cod_usuario'];
		
		$sql = "delete from usuarios where cod_usuario = '$cod_usuario'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("ACAO INVALIDA !");
					document.location = "index.php?modulo=usuarios";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{//aqui se o usuario alterar algum registro ele sai do sistema para que as atualizacoes entre em vigor 
		echo '<script language="javascript">
					document.location = "index.php?modulo=sair";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=usuarios";
		      </script>';
		exit;
	}

?>

