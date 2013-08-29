<style type="text/css">
/* ------------------------------------- modulo noticia ----------------------------*/
#div_noticia_tudo
{
	
	width:652px;   /* Certo*/
	height:auto;
	padding-top:25px;
}
#div_noticia_Titulo_Imagem
{
	width:562px;
	height:47px;
	background-image:url(Imagens/f_titulopag.png);
	background-repeat:no-repeat;
	margin-bottom:20px;

}
#div_noticia_nome_titulo
{
	width:562px;
	height:auto;
	text-align:left;   /* Certo*/
	font-size:16px;
	font-weight:bold;
	text-align:justify;/*aqui faz com  que os quatros lados da minha div se ajuste automaticamente*/
	font-family:Verdana, Geneva, sans-serif;
	padding-left:8px;
	padding-top:8px;
	padding-right:8px;
	padding-bottom:8px;
	line-height:140%;
	
	
}
#div_noticia_imagem
{
	float:left;
	width:auto;
	height:auto;
	margin-left:15px;
	margin-right:15px;   /* Certo*/
	margin-top:20px;
	margin-bottom:5px;
}
#div_noticia_texto_noticia
{
	width:642px;
	height:auto;
	margin-left:8px;
	margin-right:5px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	text-align:justify;/*aqui faz com  que os quatros lados da minha div se ajuste automaticamente*/
	line-height:180%;
	padding-top:15px;
	padding-right:10px;
	
}

#div_noticia_titulo_nome
{
	width:auto;
	height:auto;
	font-size:18px;
	color:#000;
	padding-left:55px;
	padding-top:5px;
}
#div_font_noticia
{
	text-align:right;
	width:650px;
	height:40px;
	padding-top:10px;
	padding-right:20px;
	margin-bottom:10px;
	line-height:180%;
	font-size:12px;
	
}
/*------------------------------------------------------*/
#div_outras_noticias_tudo
{
	width:660px;
	  /* Certo*/
	height:auto;
	padding-top:10px;
}
#div_outras_noticias_nome
{
	float:left;
	width:650px;
	height:25px;
	font-size:16px;
	color:#066;
	padding-left:10px;
	padding-top:5px;
}
#div_lista_desordenada
{
	float:left;
	width:660px;
	height:auto;
	font-size:10px;
	color:#000;
	padding-left:0px;
	padding-top:5px;
	line-height:200%;
	margin-bottom:0px;
	
}
#div_lista_desordenada ul li a:hover /* AQUI CUIDO DO EFEITO DOS LINKS DAS NOTÍCIAS */
{
	color:#C30;

}
#div_lista_desordenada ul li a
{
	text-decoration:none;
	list-style:circle;/* aqui cuida de tirar as bolinha da lista desordenada  e colocar a imagem*/
	color:#000;
	font-size:11px;
}
a
{ padding-bottom:5px; }
<!--------------------------------------->

.ul_noticia li
{
	list-style:circle;
}
#div_conteudo_programatico ul li
{
	list-style:square;
	font-size:12px;
	padding-bottom:20px;
}
#div_conteudo_nome
{
	color:#003;
}
</style>
<div id="div_noticia_tudo"><!-----aqui comeca a minha div_noticia_tudo------>
<div id="div_noticia_Titulo_Imagem">
<div id="div_noticia_titulo_nome">Notícias</div>
</div>
<!---<a onclick="window.print('noticia.php')" style="cursor:pointer">imprimir</a>--->
<!---<a onclick="window.print('noticia.php')" style="cursor:pointer">imprimir</a>--->	
<?php
	if($_GET['acao'] == 'setor')
	{
$sql = "select * from  noticia 
		where cod_noticia = ".$_GET['cod_noticia']." and cod_setor =".$_GET['cod_setor']." LIMIT 1";
		
		//echo $sql; exit;
			
	// enviando o comando sql que está na var. $sql para o banco de dados
	$result = mysql_query( $sql, $conexao);
	
	// obtendo o total de linhas/registros da consulta armazenada em $result
	$total_registros = mysql_num_rows($result);
	//echo $total_registros; exit;
		
		while( $dados = mysql_fetch_array($result))
			{	
				

			$sql_fotos="select distinct cod_foto,extensao from fotos_noticia where cod_noticia='" . $dados['cod_noticia']. "' ";
		
			$result_fotos= mysql_query($sql_fotos,$conexao);
			
	 		$total_registrosFotos = mysql_num_rows($result_fotos);
	        
			
				    $dados_fotos = mysql_fetch_array($result_fotos);

				    $arquivo = "../adm/fotos_noticia/".$dados_fotos['cod_foto'].".".$dados_fotos['extensao'];
//===== aqui e a  div da foto da noticia ===============================================

			    
				echo '<div id="div_noticia_nome_titulo">' .$dados['titulo']. '</div>';//aqui fica div do titulo da noticia
				
					   echo'<div id="div_noticia_imagem">';//aqui comeca a div da imagem
				   	   echo'<img src="'.$arquivo.'"  width="200" border="none">';//aqui pega o codigo da imagem relacionada com a noticia
					   echo'</div>';//aqui termina adiv das imagens
					   		
					   echo '<div id="div_noticia_texto_noticia">';
	                   echo $dados['noticia'];
	                   echo '</div>';//========== aqui termian a div da noticia ====
					   
  					   echo'<div id="div_font_noticia">';
				   	   echo 'Font:&nbsp;'. $dados['font'];
	                   echo '<br />Data Not&iacute;cia:&nbsp;'.DataUSA_to_BR( $dados['data_noticia']);
	                   echo'</div>'; 
			
		}
	
	if($total_registros==0)
	{
		echo'N&atilde;o h&aacute; novas Not&iacute;cias teste';
	}
	

	}

?>	





<!-----teste------------------------------------------------------->

<?php
	
	if($_GET['acao'] == 'ver_outras_noticias')
	{
$sql = "select * from  noticia 
		where cod_noticia =".$_GET['cod_noticia'];
		
			
	// enviando o comando sql que está na var. $sql para o banco de dados
	$result = mysql_query( $sql, $conexao);
	
	// obtendo o total de linhas/registros da consulta armazenada em $result
	$total_registros = mysql_num_rows($result);
	//echo $total_registros; exit;
		
		while( $dados = mysql_fetch_array($result))
			{	
				

			$sql_fotos="select distinct cod_foto,extensao from fotos_noticia where cod_noticia='" . $dados['cod_noticia']. "' ";
		
			$result_fotos= mysql_query($sql_fotos,$conexao);
			
	 		$total_registrosFotos = mysql_num_rows($result_fotos);
	        
			
				    $dados_fotos = mysql_fetch_array($result_fotos);

				    $arquivo = "../adm/fotos_noticia/".$dados_fotos['cod_foto'].".".$dados_fotos['extensao'];
//===== aqui e a  div da foto da noticia ===============================================

			    
				echo '<div id="div_noticia_nome_titulo">' .$dados['titulo']. '</div>';//aqui fica div do titulo da noticia
				
					   echo'<div id="div_noticia_imagem">';//aqui comeca a div da imagem
				   	   echo'<img src="'.$arquivo.'"  width="200" border="none">';//aqui pega o codigo da imagem relacionada com a noticia
					   echo'</div>';//aqui termina adiv das imagens
					   		
					   echo '<div id="div_noticia_texto_noticia">';
	                   echo $dados['noticia'];
	                   echo '</div>';//========== aqui termian a div da noticia ====
					   
					   $cod_noticia = $_GET['cod_noticia'];
					   if($cod_noticia == 46)
					   {
						   echo'<br />';
						 
						 echo'<div id="div_conteudo_programatico">';  
					   echo'<div id="div_conteudo_nome">';
					   echo'<font size="4" color="#006666"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Conteudo Programatico</font>';
					   echo'</div>';
		
					   echo'<ul>';
echo'<li>Segunda-feira 07/05 Horário: 15h15min  "Abertura" - Jairo Gonçalves do N. Junior (Presidente da CIPA).';

echo'Horário:15h25min - Palestra: "Valorizando o que você tem, família/empresa/trabalho."<br />
Palestrante: Fábio Simões Albuquerque - Consultor Técnico da TECMED.'.'</li>';

echo'<li>Terça-feira 08/05  Horário:15h15min - Palestra: "A importância do Gerenciamento de Resíduos dos Serviços de Saúde"<br />';
echo'Palestrante: Márcio Braz Sanches – Engenheiro de Segurança do Trabalho.'.'</li>';

echo'<li>Quarta-feira 09/05 Horário: 15h15min - Palestra: "Stress"<br />';
echo'Palestrante: Regina Ângelo Amorim – Psicóloga com Especialização em Psicologia da Saúde.'.'</li>';

echo'<li>Quinta-feira 10/05 Horário:15h15min  Palestra: "Postura Ergonômica no Atendimento ao Paciente"';
echo'<br />Palestrante: Juliana Faria do Nascimento – Fisioterapeuta Especialista em Fisioterapia Cardiorrespiratória, com formação em RPG.'.'</li>';


					echo'<li>Sexta-feira 11/05 Horário:15h15min - Palestra: "Tabagismo"<br />';
					echo'Palestrante: Dr. Maxsicley Grison – Médico do Trabalho'.'</li>';
				    echo'</ul>';
				    echo'</div>';
					   }
					   else if($cod_noticia == 47)
					   {
						   echo'<br />';
						 
						 echo'<div id="div_conteudo_programatico">';  
					   echo'<div id="div_conteudo_nome">';
					   echo'<font size="4" color="#006666"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Conteudo Programatico</font>';
					   echo'</div>';
		
					   echo'<ul>';
					   //primeira palestra
echo'<li>Segunda-feira 07/05 Horário:16h15min. <br. /> Palestra: "Cuidados com o paciente submetido ao tratamento de hemodiálise".';
echo'<br />Palestrantes: Enf. João C. Rombi e Sônia Maria Teles.'.'</li>';
//fim da primeira palestra

//segunda palestra
echo'<li>Terça-feira 08/05 Horário:16h15min. <br />Palestra: "Amamentação". <br />';
echo'Palestrante: : Enf. Bethânea G. da S. Cardoso e Luciana Regina P. Rueti.'.'</.li>';
//fim da segunda palestra 

//terceira palestra 
echo'<li>Quarta-feira 09/05 Horário:16h15min. <br /> Palestra: "Erros de Medicação".<br />';
echo'Palestrante: Enf. Aline Frésca e Simone de S. Maciel Olgado.'.'</li>';
//fim da terceira palestra

//quarta palestra 
echo'<li>Quinta-feira 10/05 Horário:16h15min. <br /> Palestra: "Transfusão Sanguínea".';
echo'<br />Palestrante: Enf. Lívia Maria Gomes.'.'</li>';

//fim da quarta palestra

//quinta palestra 
echo'<li>Sexta-feira 11/05 Horário:16h15min. <br /> Palestra: "Equipamentos".<br />';
echo'Palestrante: Enf. Ana Paula Negrini e Leandro Cunha da Silva.'.'</li>';
//fim da quinta palestra 

echo'</ul>';
				    echo'</div>';
					   }
  					   echo'<div id="div_font_noticia">';
				   	   echo 'Font:&nbsp;'. $dados['font'];
	                   echo '<br />Data Not&iacute;cia:&nbsp;'.DataUSA_to_BR( $dados['data_noticia']);
	                   echo'</div>'; 
			
		}
	
	if($total_registros==0)
	{
		echo'N&atilde;o h&aacute; novas Not&iacute;cias ';
	}
	

	}

?>
<hr />
<!----------------------------separacao de código font------------->
   <div id="div_outras_noticias_tudo">
   <div id="div_outras_noticias_nome">&Uacute;timas Not&iacute;cias:</div>
  <div id="div_lista_desordenada"><!-----começo da lista ordenada ---->
   <ul>
   <?php
		$sql = "SELECT * FROM noticia WHERE	ver_noticias = '1' ORDER BY	cod_noticia LIMIT 5";
	//$sql = "SELECT * FROM noticia WHERE	ver_noticias = '1' ORDER BY	cod_noticia DESC LIMIT 5";
		
	$r = mysql_query($sql, $conexao);

 	if( mysql_num_rows($r) == 0 )
	{
		echo '<center>
<div style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px;">
<br />N&atilde;o há novos registros ... '.'</div>'.'</center>';
		
	
	}
	
	
	while( $dados = mysql_fetch_array($r) )
	{

		echo'<li>'.'<a href = "index.php?modulo=noticia&acao=ver_outras_noticias&cod_noticia='.$dados['cod_noticia'].'" title="'.$dados['titulo'].'" >'.$dados['titulo'] .'</a>'.'</li>';
		
	} // while produtos
?>
</ul>
</div><!---fim da lista desordenada--->
</div>
</div><!-----aqui fecha a minha div_noticia_tudo------>
