<?php

	session_start();
	
	//ini_set( 'error_reporting', E_ALL ^ E_NOTICE ); 
	//ini_set( 'display_errors', '0' );
	
		
	
	//destruindo as vari�veis de sess�o
	unset( $_SESSION['usuario_logado'] );
	unset( $_SESSION['usuario_nome_completo'] );
	unset( $_SESSION['usuario_login'] );
	unset($_SESSION["permissao"]);
	echo '<script language="javascript">
			document.location="../portal/index.php";
		  </script>
		 ';
	exit;	

?>


