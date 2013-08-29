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
	
	include_once("funcoes.php");
	
	$conexao = conectar_bd();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Autenticação</title>
</head>

<body>
Autenticando Usu&aacute;rio, aguarde...<p>

<?php

	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$sql = "select * from usuarios where login = '$login'";
	
	$r = mysql_query($sql);
	
	if( $dados = mysql_fetch_array($r) )
	{
		if( $dados['senha'] == $senha )
		{
			$_SESSION['usuario_logado'] = '1';
			$_SESSION['usuario_nome_completo'] = $dados['nome'];
			$_SESSION['usuario_login'] = $dados['login'];
			
			echo '<script language="javascript">
					document.location="index.php";
				  </script>
				 ';
			exit;	
		}// senha valida
		
		else
		{
			echo '<script language="javascript">
					document.location="index.php?msg=Usuario e/ou Senha Invalidos !";
				  </script>
				 ';
			exit;
		}
	}// se o login existir
	
	else
	{
		echo '<script language="javascript">
					document.location="index.php?msg=Usuario e/ou Senha Invalidos !";
				  </script>
				 ';
			exit;
	}


?>

</body>
</html>
