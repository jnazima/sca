
<?php
	
$sql = "select * from  noticia where destaque = 's' and situacao = 1 ORDER BY	cod_noticia desc  LIMIT 1 ";
	
	// enviando o comando sql que está na var. $sql para o banco de dados
	$result = mysql_query( $sql, $conexao);
	
	// obtendo o total de linhas/registros da consulta armazenada em $result
	$total_registros = mysql_num_rows($result);
	
	if($total_registros==0)
	{

		echo '<center>
<div style=" border-left:solid 2px #ccc; border-right:solid 2px #ccc; padding-top:10px; background-color:#ebebeb;	 font-family:Verdana, Geneva, sans-serif; font-size:12px; width:400px; height:auto; text-align:center; padding-bottom:15px;">
N&atilde;o h&aacute; not&iacute;cias em destaque para serem mostradas no presente momento...</div>';

echo'<hr/>';
								
	}
	
		if($total_registros > 0)
		{
		
			while( $dados = mysql_fetch_array($result))
				{	
			
				$sql_fotos="select distinct cod_foto,extensao from fotos_noticia where cod_noticia='" . $dados['cod_noticia']. "' ";
		
				$result_fotos= mysql_query($sql_fotos,$conexao);
			
	 			$total_registrosFotos = mysql_num_rows($result_fotos);
			   	$dados_fotos = mysql_fetch_array($result_fotos);

	$arquivo = "../../adm/fotos_noticia/".$dados_fotos['cod_foto'].".".$dados_fotos['extensao'];
//===== aqui e a  div da foto da noticia ===============================================

				   echo '<div id="div_noticia_destaque_tudo">';	
				   echo '<div id="div_titulo_noticias_destaque">';
				   echo 'Not&iacute;cia em Destaque :::';				 
				   echo '</div>';
				   echo'<div id="div_noticia_destaque_imagem">';//div da imagem da noticia
				   echo'<img src="'.$arquivo.'"  width="250" border="none">';//aqui pega o codigo da imagem relacionada com a noticia
				   echo'</div>';//fim da div da imagem da noticia
				   echo'<div id="div_conteudo_destaque_tudo">';
				   
				   echo'<div id="div_nome_destaque">';
				   echo'Destaque&nbsp;::::';
				   echo'</div>';
				   
				   echo '<div id="div_conteudo_destaque_titulo">';
				   echo $dados['titulo'];
				   echo'</div>';
					
				   echo '<div id="div_conteudo_destaque_subtitulo">';
				   echo $dados['subtitulo'];
				   echo '</div>';
				   
				   echo'<div id="div_link_noticia_destaque">';
				   echo'<a href = "index.php?modulo=noticia&acao=ver_outras_noticias&cod_noticia='.$dados['cod_noticia'].'" >Leia mais...</a>';
				   echo'</div>';
				  
			
			
				   echo'</div>';
				   echo'</div>';//fim da div_noticia_destaque_tudo
				 				
	            }//fecha while do resultado da query				
}
?>
<!----------------------------------------------------------------------------------------->

<?php
	
$sql = "select * from  noticia where ver_noticias = 1 and situacao = 1 ORDER BY	cod_noticia desc  LIMIT 6 ";
	
	// enviando o comando sql que está na var. $sql para o banco de dados
	$result = mysql_query( $sql, $conexao);
	
	// obtendo o total de linhas/registros da consulta armazenada em $result
	$total_registros = mysql_num_rows($result);
	
	
		if($total_registros > 0)
		{
		echo'<div id="div_tudo_noticias_ver">';
		echo'<div id="div_nome_resumo_noticias">';
		echo'Resumo de Not&iacute;cias&nbsp;:::';
		echo'</div>';
			while( $dados = mysql_fetch_array($result))
				{	
			
				$sql_fotos="select distinct cod_foto,extensao from fotos_noticia where cod_noticia='" . $dados['cod_noticia']. "' ";
		
				$result_fotos= mysql_query($sql_fotos,$conexao);
			
	 			$total_registrosFotos = mysql_num_rows($result_fotos);
	        
				
			   	$dados_fotos = mysql_fetch_array($result_fotos);

	$arquivo = "../../adm/fotos_noticia/".$dados_fotos['cod_foto'].".".$dados_fotos['extensao'];
//===== aqui e a  div da foto da noticia ===============================================


echo'<div id="div_noticia_ver_divide">';

echo'<div id="div_noticia_imagem_ver">';
echo'<img src="'.$arquivo.'"  width="123" border="none">';
echo'</div>';

echo'<div id="div_titulo_ver_noticias">';
echo $dados['titulo'];
echo'</div>';
			
echo'<div id="div_link_noticias">';
echo'<a href = "index.php?modulo=noticia&acao=ver_outras_noticias&cod_noticia='.$dados['cod_noticia'].'" >Leia mais...</a>'; echo'</div>';	
   
echo'</div>';
	            }//fecha while do resultado da query				
				echo'</div>';
				
}
else
{
	
	echo'<div id="div_erro_totalderegistros">';
	echo'N&atilde;o h&aacute; Nenhuma not&iacute;cia para serem vistas no momento';
	echo'</div>';
}
?>
