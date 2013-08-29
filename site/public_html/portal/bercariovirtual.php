<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>

<link rel="stylesheet" href="CssPortal/lightbox.css" type="text/css" media="screen" />
	
    <script language="javascript" >
	function enviar()
	{
	
	if(document.formcad.nome.value.length==0)
	{
	 alert("O Campo nome deve ser preenchido!");
	 document.formcad.nome.focus();
	  
	 return;
	}
	}
	document.formcad.submit();
	
	</script>
<?php
	
$sql = "select * from  rec_nascido 
		where cod_rec_nascido=".$_GET['cod_rec_nascido'];
		
			
	// enviando o comando sql que está na var. $sql para o banco de dados
	$result = mysql_query( $sql, $conexao);
	
	// obtendo o total de linhas/registros da consulta armazenada em $result
	$total_registros = mysql_num_rows($result);
	
		
		
		while( $dados = mysql_fetch_array($result))
			{	
		
		
		//echo DataUSA_to_BR($dados['data_nascimento'] );
		echo '<center>'.'<font size="+3" color="#999999">'. $dados['nome'].'</font>'.'</center>'.'<br />'.'<br />';
		echo '<h3>'. $dados['nome_pai'].'&nbsp;e&nbsp;'.$dados['nome_mae'].'</h3>';
		echo '<h3> Data Nascimento &nbsp;'. $dados['data_nascimento'].'</h3>';
		
		echo '<br /><br /><br /><br />';
		
		
		
		
		
       
				
			$sql_fotos="select distinct cod_foto,extensao from fotos_recenascidos where cod_rec_nascido='" . $dados['cod_rec_nascido']. "' ";
		
			$result_fotos= mysql_query($sql_fotos,$conexao);
			
	 		$total_registrosFotos = mysql_num_rows($result_fotos);
	        
			if($total_registrosFotos > 0)
			{
				if($total_registrosFotos == 1)
				{
				
				$dados_fotos = mysql_fetch_array($result_fotos);
				$arquivo = "../adm/fotos_recenascidos/".$dados_fotos['cod_foto'].								                 ".".$dados_fotos['extensao'];
				
				echo'<a href="'.$arquivo.'"  rel="lightbox">
				<img src="'.$arquivo.'" width="200" heigth="200"border="none">'.'</a>';
			
				}
				else
				{
					while($fotos = mysql_fetch_array($result_fotos))
					{
					
						$arquivo = "../adm/fotos_recenascidos/".$fotos['cod_foto'].".".$fotos['extensao'];

						
						echo'<a href="'.$arquivo.'"  rel="lightbox[n]">
						<img src="'.$arquivo.'" width="100">'.'</a>';

					
						
					}//fecha while
					
    			}//fecha else
		}//fecha if total_registrosFotos == 1
			else
			{
				echo '<script language="javascript"> 
							alert("Não a fotos cadastradas");
							document.location = "index.php?modulo=listarbercariovirtual";
					  </script>';
			}
	 		
			
			
		
	}//fecha while

?>

<form name="formcad" id="formcad" method="post" action="Bercario_comentario_Gravar.php?acao=<?php echo $_GET['acao'];?>">
<table>
<tr><td>
Deixe um Comentario
</td>
</tr>
<tr>
<td>
<textarea name="mensagem" id="mensagem" value="<?php $mensagem ?>" cols="45" rows="7" label="mensagem" required="true">Escreva o seu comentário aqui</textarea></td></tr>
<tr>
<td>
<input type="submit" id="btnEnviar" name="btnEnviar" value="Comentar" onclick="enviar();" />
</td>

</tr>
</table>

<center>
<a href="index.php?modulo=lisGaleria_bercario">[ Voltar ]</a>
</center>
<br /><br /><br />