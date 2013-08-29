<?php

	session_start();
	
	//destruindo as variáveis de sessão
	unset( $_SESSION['usuario_logado'] );
	unset( $_SESSION['usuario_nome_completo'] );
	unset( $_SESSION['usuario_login'] );
	unset( $_SESSION["permissao"] );
	
	echo '<script language="javascript">
			document.location="index.php";
		  </script>
		 ';
	exit;	

?>


