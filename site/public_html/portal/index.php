<?php
	session_start();
	include_once("funcoes.php");
	$conexao = conectar_bd();
ini_set( 'display_errors', '0' );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Santa Casa de Misericordia de Adamantina</title>

<!------aqui fica o logo da imagem ----->
<link rel="shortcut icon" href="Imagens/logo santa casa.png" type="image/x-icon"/>

<!------------------------------------------------------------------->
<link rel="stylesheet" href="CssPortal/CssPortal.css" />
<!-----style das imagens do home --->
<LINK rel="stylesheet" type="text/css" href="funcoes_img/style.css">

	<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="js/jquery-easing-1.3.pack.js"></script>
	<script type="text/javascript" src="js/jquery-easing-compatibility.1.2.pack.js"></script>
	<script type="text/javascript" src="js/coda-slider.1.1.1.pack.js"></script>
	
	<script type="text/javascript">
	
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 6 == curclicked )
					curclicked = 0;
				
			}, 3000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
	</script>
    
</head>

<body>

<div id="div_tudo">
	<div id="div_titulo"> <!--Aqui fica a imagem do t�tulo da p�gina-->
    	<?  include_once("topo.php"); ?>
 	</div><!--Aqui termina o t�tulo com a inclus�o da p�gina topo.php-->
    
		<div id="div_imagem_menu_Horizotal"></div><!--Aqui fica a imagem que divide o topo do corpo da p�gina-->
	
    	<div id="div_organiza_form"><!--Aqui come�a a div para organizar o conte�do dentro da p�gina-->
			<div id="div_conteudoTudo"><!--Aqui come�a a div respons�vel pelo conte�do da p�gina-->
				<div id="div_menu"><?php include_once("menu.php");?></div>
                <div id="div_conteudo"><?php include_once("tratarconteudo.php");?></div>
            </div><!--Aqui fecha a div respons�vel pelo conte�do da p�gina-->	
		</div><!--Aqui fecha a div respons�vel por organizar o conte�do-->
	
		<div id="div_rodape"> <!--Essa div � respons�vel pelo rodape da p�gina-->
			<?php include_once("rodape.php"); ?>
		</div><!--Aqui termina a div respons�vel pelo rodap� da p�gina-->
</div>

</body>
</html>