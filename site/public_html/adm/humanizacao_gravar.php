<?php
	session_start();
	
	if( !isset($_SESSION['usuario_logado']) )//verifica se o meu usuario esta conctado
	{
		echo '<script language="javascript">
				document.location="index.php?msg=Usuario Nao Autenticado";
			  </script>
			 ';
		exit;		
	}
//aqui a funcao resposavem pela conecao com o banco de dados	
include("../portal/funcoes.php");
?>

Atualizando dados, aguarde...

<?php

	$conexao = conectar_bd();//aqui pego a conecao com o banco de dados que esta no index.php e atribuio o seu valor para a variavel conexao
	
	//aqui eu pego a data do computador convertida propria para o banco de dados mysql 2011-09-09
    $data = date("Y/m/j");
	
	//aqui pego também a hora do computador
	$hora= strftime("%H:%I:%S");
	
	
	if ($_GET['acao'] == 'incluir')
	{
		   $autor = $_POST['autor'];
		   $titulo = $_POST['titulo'];
		   $subtitulo=$_POST['subtitulo'];
		   
		   $font=$_POST['font'];
		   $data_noticia= DataBR_to_USA($_POST['data_noticia']);
		   $hora=$hora;//aqui estou usando a minha variavel $hora para gravar a hora da notiia 
		   $destaque=$_POST['destaque'];
		   $data_cadastro= $data;//aqui estou usando a variavel $data ja convertida para o banco de dados
		   $situacao=$_POST['situacao'];
		   $noticia=$_POST['noticia'];
			
		$sql = " insert into humanizacao (autor,titulo,subtitulo,font,data_noticia,hora,destaque,data_cadastro,situacao,noticia)  
		
		values('$autor','$titulo','$subtitulo','$font','$data_noticia','$hora','$destaque','$data_cadastro','$situacao','$noticia')";
		
				
			  // echo $sql; exit;
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
     		$autor = $_POST['autor'];
		   $titulo = $_POST['titulo'];
		   $subtitulo=$_POST['subtitulo'];
		 
		   $font=$_POST['font'];
		   $data_noticia= DataBR_to_USA($_POST['data_noticia']);
		   $hora=$hora;//aqui estou usando a minha variavel $hora para gravar a hora da notiia 
		   $destaque=$_POST['destaque'];
		   $data_cadastro= $data;//aqui estou usando a variavel $data ja convertida para o banco de dados
		   $situacao=$_POST['situacao'];
		   $noticia=$_POST['noticia'];
		   
          
	 $cod_humanizacao = $_GET['cod_humanizacao'];
		
	  $sql = "update humanizacao set autor = '$autor',titulo='$titulo',Subtitulo='$subtitulo',font='$font',data_noticia = '$data_noticia',hora='$hora',destaque='$destaque',data_cadastro='$data_cadastro',situacao='$situacao',noticia='$noticia'
				where cod_humanizacao = ' $cod_humanizacao'";
			   
			//echo $sql; exit;   
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_humanizacao = $_GET['cod_humanizacao'];
		
		$sql = "delete from humanizacao where cod_humanizacao = '$cod_humanizacao'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("Acao invalida não foi possivel fazer a consulta no banco de dados !");
					document.location = "index.php?modulo=humanizacao";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=humanizacao";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=humanizacao";
		      </script>';
		exit;
	}

?>
