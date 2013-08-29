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
		//recebendo valores e atribuindo a variaves
		$cod_especialidade = $_POST['cod_especialidade'];
		$cod_cidade = $_POST['cod_cidade'];
		
		if($cod_especialidade == 0)
		 {
			 echo '<script language="javascript">
					document.location="index.php?modulo=medico_ficha&acao=incluir&msg=A especialidade do m&eacute;dico n&atilde;o podera ficar em branco!";
				  </script>
				 ';
			exit;
 		 }
		 else 
		 if($cod_cidade == 0)
		 {
			 echo '<script language="javascript">
					document.location="index.php?modulo=medico_ficha&acao=incluir&msg=O C&oacute;digo da cidade n&atilde;o podera ficar em branco!";
				  </script>
				 ';
			exit;
		 }
		 
		 else
		 {
		    $nome = trim($_POST['nome']);
			$crm = trim($_POST['crm']);
			$cpf = trim($_POST['cpf']);
			$cod_especialidade = trim($_POST['cod_especialidade']);
			$cod_cidade =trim ($_POST['cod_cidade']);
			$sexo = trim ($_POST['sexo']);
			$situacao = $_POST['situacao'];
		    $data_cadastro =trim(DataBR_to_USA( $_POST['data_cadastro'] ));

		
		$sql = " insert into medico (nome,crm,cpf,cod_especialidade,cod_cidade,sexo,situacao,data_cadastro)  
		
		values('$nome',$crm,$cpf,$cod_especialidade,$cod_cidade,'$sexo',$situacao,$data_cadastro)";
		
		
		//echo $sql; exit;
		 }
			   
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		$cod_especialidade = $_POST['cod_especialidade'];
		$cod_cidade = $_POST['cod_cidade'];

		if($cod_especialidade==0)
		{
			 echo '<script language="javascript">
document.location="index.php?modulo=medico_ficha&acao=alterar&cod_medico='.$_GET['cod_medico'].'&msg=O c&oacute;digo da especialidade n&atilde;o podera ficar em branco!";
				  </script>
				 ';
			exit;
		}
		elseif($cod_cidade == 0)
		{
			
			 echo '<script language="javascript">
document.location="index.php?modulo=medico_ficha&acao=alterar&cod_medico='.$_GET['cod_medico'].'&msg=O c&oacute;digo da cidade n&atilde;o podera ficar em branco!";
				  </script>
				 ';
			exit;
		}
		else{
		    $nome = $_POST['nome'];
			$crm = $_POST['crm'];
			$cpf = $_POST['cpf'];
			
			$cod_especialidade = $_POST['cod_especialidade'];
			$cod_cidade = $_POST['cod_cidade'];
			$sexo = $_POST['sexo'];
			$situacao = $_POST['situacao'];
		    $data_cadastro = DataBR_to_USA( $_POST['data_cadastro'] );

	 $cod_medico = $_GET['cod_medico'];
		
	  $sql = "update medico set nome = '$nome',crm='$crm',cpf='$cpf',cod_especialidade='$cod_especialidade',cod_cidade='$cod_cidade',sexo='$sexo',situacao = $situacao, data_cadastro = '$data_cadastro'
				where cod_medico = ' $cod_medico'";
			   
		}
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_medico = $_GET['cod_medico'];
		
		$sql = "delete from medico where cod_medico = '$cod_medico'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("Acao invalida não foi possivel fazer a consulta no banco de dados !");
					document.location = "index.php?modulo=medico";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=medico";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=medico";
		      </script>';
		exit;
	}

?>
