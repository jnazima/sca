
<select id="cod_cidade" name="cod_cidade">
	<option value="0">Selecione uma Cidade</option>

<?php
	include_once("../portal/funcoes.php");
	$conexao = conectar_bd();
	
	$sqlproduto = "select * from cidade where cod_estado = ".$_POST['cod_estado'];
	
	$result = mysql_query($sqlproduto);
		
	while($c_dados = mysql_fetch_array($result))
	{
		echo '<option value="'.$c_dados['cod_estado'].'">'.tiracento($c_dados['nome_cidade']).'</option>';
	}

?>
</select>