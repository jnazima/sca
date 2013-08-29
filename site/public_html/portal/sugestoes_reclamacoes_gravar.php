

<?php
	include_once("funcoes.php");
?>

Atualizando dados, aguarde...

<?php

	$conexao = conectar_bd();
	
	if ($_GET['acao'] == 'incluir')
	{
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$cod_assunto = $_POST['cod_assunto'];
		$mensagem = $_POST['mensagem'];
		
$sql ="insert into fale_conosco (nome, email, telefone, celular, cod_assunto, mensagem)  
       values ('$nome','$email','$telefone','$celular', '$cod_assunto','$mensagem')";
	   
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$cod_assunto = $_POST['cod_assunto'];
		$mensagem = $_POST['mensagem'];
		$cod_fale_conosco = $_GET['cod_fale_conosco'];
		
		$sql = "update fale_conosco set
				nome='$nome',email='$email',telefone='$telefone',celular='$celular',cod_assunto='$cod_assunto', mensagem='$mensagem'
				where cod_fale_conosco='$cod_fale_conosco'
			   ";
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_fale_conosco = $_GET['cod_fale_conosco'];
		
		$sql = "delete from fale_conosco where cod_fale_conosco = '$cod_fale_conosco'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("ACAO INVALIDA !");
					document.location = "index.php?modulo=home";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=home";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("N&Atilde;O FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=home";
		      </script>';
		exit;
	}

?>
