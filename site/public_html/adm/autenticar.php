<?php
	session_start();
	
	if( isset($_SESSION['usuario_logado']) )
	{
		echo '<script language="javascript">
				document.location="index.php";
			  </script>
			 ';
		exit;
	}
	//ini_set( 'error_reporting', E_ALL ^ E_NOTICE ); 
	ini_set( 'display_errors', '0' );
	
	include("../portal/funcoes.php");
	$conexao = conectar_bd();

?>


Autenticando Usu&aacute;rio, aguarde...

<?php

	$login = addslashes(htmlentities(utf8_decode(trim($_POST['login'])), ENT_QUOTES));
	$senha = addslashes(htmlentities(utf8_decode(trim($_POST['senha'])), ENT_QUOTES));

	
//aqui verifica o nome de login do usuario se tiver em branco ele mostar esta mensagem

if($login == "")
 {
//	$error[0] = "Preencha o campo login";
	echo '<script language="javascript">
					document.location="index.php?msg=O login de usuario esta incorreto!";
				  </script>
				 ';
			exit;
}
else
if($login==2||$login==1)
{
	echo '<script language="javascript">
					document.location="index.php?msg=O login não podera ter menos digitos!";
				  </script>
				 ';
			exit;
}

else
//aqui verifica a senha do usuario se tiver em branco ele mostar esta mensagem
if($senha == "")
{
	//	$error[0] = "Preencha o campo login";
	echo '<script language="javascript">
					document.location="index.php?msg=A senha de usuario estão incorreto!";
				  </script>
				 ';
			exit;
}
	
	$sql = "select * from usuarios where login = '$login' and situacao = 'Ativo'";

	$r = mysql_query($sql);
	
	if( $dados = mysql_fetch_array($r) )
	{
		if( $dados['senha'] == $senha )
		{
			$_SESSION['usuario_logado'] = '1';
			$_SESSION['usuario_nome_completo'] = $dados['nome_completo'];
			$_SESSION['usuario_login'] = $dados['login'];
			$_SESSION["permissao"] = $dados["permissao"];//aqui cria a session que sera responsavél em controlar as permissoes do ususario final
			
			echo '<script language="javascript">
					document.location="index.php";
				  </script>
				 ';
			exit;	
		}// senha valida
		
		else
		{
			echo '<script language="javascript">
					document.location="index.php?msg=O nome de usu&aacute;rio ou a senha inserido est&aacute; incorreto. !";
				  </script>
				 ';
			exit;
		}
	}// se o login existir
	
	else
	{
		echo '<script language="javascript">
					document.location="index.php?msg=O nome de usuario ou a senha inserido estão incorreto. !";
				  </script>
				 ';
			exit;
	}
?>
