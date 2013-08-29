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
		   $cod_medico = $_POST['cod_medico'];
			$cod_cidade = $_POST['cod_cidade']; 
	        $nome = $_POST['nome'];	
		    $nome_pai = $_POST['nome_pai'];
			$nome_mae = $_POST['nome_mae'];
			$nome_irmoes_um = $_POST['nome_irmoes_um'];
			$nome_irmoes_dois = $_POST['nome_irmoes_dois'];
			$nome_vo_paterno = $_POST['nome_vo_paterno'];
			$nome_vovo_paterno = $_POST['nome_vovo_paterno'];
			$nome_vo_materno = $_POST['nome_vo_materno'];
			$nome_vovo_materno = $_POST['nome_vovo_materno'];
			$tamanho = $_POST['tamanho'];
			$kg = $_POST['kg'];
			$sexo = $_POST['sexo'];
		    $data_nascimento = DataBR_to_USA( $_POST['data_nascimento'] );
			$situacao=$_POST['situacao'];
			
		$sql = " insert into rec_nascido (cod_medico,cod_cidade,nome, nome_pai, nome_mae,nome_irmoes_um,nome_irmoes_dois,nome_vo_paterno, nome_vovo_paterno,nome_vo_materno,nome_vovo_materno,tamanho,kg,sexo,data_nascimento,situacao)  
		
		values('$cod_medico','$cod_cidade','$nome','$nome_pai', '$nome_mae','$nome_irmoes_um','$nome_irmoes_dois','$nome_vo_paterno', '$nome_vovo_paterno','$nome_vo_materno','$nome_vovo_materno','$tamanho','$kg','$sexo','$data_nascimento','$situacao')";
		
				
			  // echo $sql; exit;
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
     		$cod_medico = $_POST['cod_medico'];
			$cod_cidade = $_POST['cod_cidade']; 
	        $nome = $_POST['nome'];	
		    $nome_pai = $_POST['nome_pai'];
			$nome_mae = $_POST['nome_mae'];
			$nome_irmoes_um = $_POST['nome_irmoes_um'];
			$nome_irmoes_dois = $_POST['nome_irmoes_dois'];
			$nome_vo_paterno = $_POST['nome_vo_paterno'];
			$nome_vovo_paterno = $_POST['nome_vovo_paterno'];
			$nome_vo_materno = $_POST['nome_vo_materno'];
			$nome_vovo_materno = $_POST['nome_vovo_materno'];
			$tamanho = $_POST['tamanho'];
			$kg = $_POST['kg'];
			$sexo = $_POST['sexo'];
		    $data_nascimento = DataBR_to_USA( $_POST['data_nascimento'] );
            $situacao=$_POST['situacao'];
	 $cod_rec_nascido = $_GET['cod_rec_nascido'];
		
	  $sql = "update rec_nascido set cod_medico = '$cod_medico',cod_cidade = '$cod_cidade',	nome = '$nome', 
	          nome_pai = '$nome_pai', nome_mae = '$nome_mae',nome_irmoes_um ='$nome_irmoes_um',nome_irmoes_dois='$nome_irmoes_dois',nome_vo_paterno='$nome_vo_paterno',nome_vovo_paterno='$nome_vovo_paterno',nome_vo_materno='$nome_vo_materno',nome_vovo_materno='$nome_vovo_materno',tamanho='$tamanho',kg='$kg',sexo='$sexo', data_nascimento = '$data_nascimento', situacao = '$situacao'
				where cod_rec_nascido = ' $cod_rec_nascido'";
			   
			//echo $sql; exit;   
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_rec_nascido = $_GET['cod_rec_nascido'];
		
		$sql = "delete from rec_nascido where cod_rec_nascido = '$cod_rec_nascido'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("Acao invalida não foi possivel fazer a consulta no banco de dados !");
					document.location = "index.php?modulo=maternidade";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=maternidade";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=maternidade";
		      </script>';
		exit;
	}

?>
