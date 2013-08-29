<?php
	session_start();
	include_once("../funcoes.php");
	$conexao = conectar_bd();
ini_set( 'display_errors', '0' );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Santa Casa de Adamantina</title>
<link rel="shortcut icon" href="Imagens/logo santa casa.png" type="image/x-icon"/><!------aqui fica o logo da imagem ----->

<!------------------------------------------------------------------->
<link rel="stylesheet" href="CssNoticias/CssNoticias.css" />
<LINK rel="stylesheet" type="text/css" href="funcoes_img/style1.css"><!-----style das imagens do home --->

<!------------------------------------------------------------------->

<script type="text/javascript" src="funcoes/jquery.maskedinput.js"></script><!--nao tirar-->
<script language="javascript" src="funcoes/jquery-validate/jquery.validate.js"></script>
<script language="JavaScript" type="text/javascript" src="funcoes.js"></script>




 
</head>

<body>

<div id="div_tudo">

<div id="top"></div><!----imagem topo superior ----->
	<div id="div_titulo"><?  //include_once("topo.php"); ?></div><!--------imagem topo----->

	<div id="div_imagem_menu_Horizotal"><?php include_once("menu_horizotal.php"); ?></div><!---aqui fica a imagem do menu vertical--->
	
<div id="div_conteudo"><?php include_once("tratarconteudo.php"); ?> </div>
          
			
        





    <div id="div_rodape">
		<?php include_once("rodape.php"); ?>
	</div>

</div>

</body>
</html>