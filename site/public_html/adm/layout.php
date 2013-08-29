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
    <script language="javascript">
	alert("Modulo em desenvolvimento");
	document.location = "index.php";
	</script>