<?php
	session_start();
	
	if( !isset($_SESSION['usuario_logado']) )
	{
		echo '<script language="javascript">
				document.location="index.php?msg=Usuario Nao Autenticado";
			  </script>
			 ';
		exit;		
	}
	
include("../portal/funcoes.php");
?>

Atualizando dados, aguarde...

<?php

	$conexao = conectar_bd();
	
	if ($_GET['acao'] == 'incluir')
	{
     		$cod_estado = $_POST['cod_estado'];
		    $nome_cidade = $_POST['nome_cidade'];
			$situacao=$_POST['situacao'];
			
			// $data_cadastro = DataBR_to_USA( $_POST['data_cadastro'] );

		
		$sql = " insert into cidade (cod_estado,nome_cidade,situacao)
		
		values('$cod_estado','$nome_cidade','$situacao')";
		
		
		
			
			   
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
			$cod_estado = $_POST['cod_estado'];
		    $nome_cidade = $_POST['nome_cidade'];
			$situacao=$_POST['situacao'];
	        $cod_cidade = $_GET['cod_cidade'];
		
	  $sql = "update cidade set cod_estado = '$cod_estado',nome_cidade='$nome_cidade',situacao='$situacao'
				where cod_cidade = ' $cod_cidade'";
			   
			
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_cidade = $_GET['cod_cidade'];
		
		$sql = "delete from cidade where cod_cidade = '$cod_cidade'";
		
		
		//echo $sql; exit;
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("Acao invalida não foi possivel fazer a consulta no banco de dados !");
					document.location = "index.php?modulo=cidade";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=cidade";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=cidade";
		      </script>';
		exit;
	}

?>
