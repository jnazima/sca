<?php
	session_start();
	include("../portal/funcoes.php");

	ini_set( 'display_errors', '0' );

	$conexao = conectar_bd();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Santa Casa de Adamantina - &Aacute;rea Administrativa</title>
<!------------------------------------------------------------------------------->
<link rel="stylesheet" href="CssAdm/CssAdm.css"/>
<link rel="shortcut icon" href="Imagens/logo santa casa.png" type="image/x-icon"/><!------aqui fica o logo da imagem ----->
<!------------------------------------------------------------------------------->
<script type="text/javascript" src="../portal/funcoes/jquery.js"></script>
<script type="text/javascript" src="../portal/funcoes/jquery.maskedinput.js"></script><!--nao tirar-->
<script language="javascript" src="../portal/funcoes/jquery-validate/jquery.validate.js"></script>
<script language="JavaScript" type="text/javascript" src="../portal/funcoes.js"></script>
<!------------------------------------------------------------------------------->
</head>

<body>

<div id="tudo"><!----- começo a div tudo ----->
<div id="topo"><!---- comesso da div topo ------>
<div id="topoImg"></div><!------- fim da div topoImg ----->

<div id="logo"></div><!----------fim  da div logo------>
<div id="menuHorizotal"></div>
</div><!----fim da div topo----->

<div id="div_conteudoTudo">

<?php 

		if ( isset($_SESSION['usuario_logado']))
		{
		?>
	
			<div id="div_menu">
				<?php include_once("menu.php"); ?>
			</div>
	
			<div id="div_conteudo">
				<?php include_once("tratarconteudo.php"); ?>
			</div>
		<?php	
		} // fim do IF
		else
		{	
		?>
	
        <div id="div_login">
			<?php include_once("login.php"); ?>
		</div>
		<?php
		}//fim do else
	
		?>

</div>


<div id="rodape"><?php include_once("rodape.php");?></div>
</div>

</body>
</html>
