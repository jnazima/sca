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
  //  $data = date("Y/m/j");
	
	//aqui pego também a hora do computador
	//$hora= strftime("%H:%I:%S");
	
	
	if ($_GET['acao'] == 'incluir')
	{
		$cod_setor = $_POST['cod_setor'];
		
		//echo $cod_setor; exit;
		if($cod_setor == 0)
		 {
			 echo '<script language="javascript">
					document.location="index.php?modulo=noticia_ficha&acao=incluir&msg=Erro: O Código do setor não podera ficar em branco!";
				  </script>
				 ';
			exit;
 		 }
		 else
		 {
		   $cod_setor = trim($_POST['cod_setor']);//trim retira os espacos das variaveis
		   
		   $autor = trim($_POST['autor']);
		   $titulo = trim($_POST['titulo']);
		   $subtitulo=trim($_POST['subtitulo']);
		   
		   $font=trim($_POST['font']);
		   $data_noticia= DataBR_to_USA($_POST['data_noticia']);
		   $hora=$_POST['hora'];
		   $destaque=$_POST['destaque'];
		   $data_cadastro= DataBR_to_USA($_POST['data_cadastro']);
		   $situacao=$_POST['situacao'];
		   $ver_noticias=$_POST['ver_noticias'];
		   $noticia = trim($_POST['noticia']);
			
		$sql = " insert into noticia (cod_setor,autor,titulo,subtitulo,font,data_noticia,hora,destaque,data_cadastro,situacao,ver_noticias,noticia)  
		
		values('$cod_setor','$autor','$titulo','$subtitulo','$font','$data_noticia','$hora','$destaque','$data_cadastro','$situacao','$ver_noticias','$noticia')";
		
				
			   //echo $sql; exit;
		 }
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		$cod_setor = $_POST['cod_setor'];
		
		//echo $cod_setor; exit;
		if($cod_setor == 0)
		 {
			 echo '<script language="javascript">
document.location="index.php?modulo=noticia_ficha&acao=alterar&cod_noticia='.$_GET['cod_noticia'].'&msg=O c&oacute;digo da setor n&atilde;o podera ficar em branco!";
				  </script>
				 ';
			exit;
 		 }
		 else
		 {
		$cod_setor = $_POST['cod_setor'];
     		$autor = $_POST['autor'];
		   $titulo = $_POST['titulo'];
		   $subtitulo=$_POST['subtitulo'];
		 
		   $font=$_POST['font'];
		   $data_noticia= DataBR_to_USA($_POST['data_noticia']);
		   $hora=$_POST['hora'];//aqui estou usando a minha variavel $hora para gravar a hora da notiia 
		   $destaque=$_POST['destaque'];
		  $data_cadastro= DataBR_to_USA($_POST['data_cadastro']);
		   $situacao=$_POST['situacao'];
		    $ver_noticias=$_POST['ver_noticias'];
		   $noticia=$_POST['noticia'];
		   
          
	 $cod_noticia = $_GET['cod_noticia'];
		
	  $sql = "update noticia set cod_setor= '$cod_setor',autor = '$autor',titulo='$titulo',Subtitulo='$subtitulo',font='$font',data_noticia = '$data_noticia',hora='$hora',destaque='$destaque',data_cadastro='$data_cadastro',situacao='$situacao',ver_noticias='$ver_noticias',noticia='$noticia'
				where cod_noticia = ' $cod_noticia'";
			   
			//echo $sql; exit; 
		 }
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_noticia = $_GET['cod_noticia'];
		
		$sql = "delete from noticia where cod_noticia = '$cod_noticia'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("Acao invalida não foi possivel fazer a consulta no banco de dados !");
					document.location = "index.php?modulo=noticia";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=noticia";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=noticia";
		      </script>';
		exit;
	}

?>
