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
	
?>
<?php
include("../portal/funcoes.php");
?>
Atualizando dados, aguarde...

<?php

	$conexao = conectar_bd();
	
	if ($_GET['acao'] == 'incluir')
	{
		 $data = date("Y/m/j");
		 
		    $nome = $_POST['nome'];
			$estado_civil = $_POST['estado_civil']; 
	        $sexo = $_POST['sexo'];	
			$data_nascimento = DataBR_to_USA( $_POST['data_nascimento']);
			$nacionalidade = $_POST['nacionalidade'];
			$portador_deficiencia = $_POST['portador_deficiencia'];
			$portador_def_tipo = $_POST['portador_def_tipo'];
			$rg = $_POST['rg'];
			$cpf = $_POST['cpf'];
			$endereco = $_POST['endereco'];
			$bairro = $_POST['bairro'];
			$cod_cidade = $_POST['cod_cidade'];
			$cep = $_POST['cep'];
			$telefone = $_POST['telefone'];
			$celular = $_POST['celular'];
			$email = $_POST['email'];
			//$nivel_escolar = $_POST['nivel_escolar'];
			//$nivel_outro = $_POST['nivel_outro'];
			$colegial_curso= $_POST['colegial_curso'];
			$colegial_instituicao = $_POST['colegial_instituicao'];
			$colegial_ano_inicio = DataBR_to_USA( $_POST['colegial_ano_inicio']);
			$colegial_ano_conclusao = DataBR_to_USA( $_POST['colegial_ano_conclusao']);
			$cod_curso = $_POST['cod_curso'];
			$superior_curso_outro = $_POST['superior_curso_outro'];
			$superior_instituicao = $_POST['superior_instituicao'];
			$superior_ano_inicio =  DataBR_to_USA( $_POST['superior_ano_inicio']);
			$superior_ano_conclusao = DataBR_to_USA( $_POST['superior_ano_conclusao']);
			$especializacao_curso  =$_POST['especializacao_curso'];
			$especializacao_instituicao = $_POST['especializacao_instituicao'];
			$especializacao_ano_inicio = DataBR_to_USA( $_POST['especializacao_ano_inicio']);
			$especializacao_ano_conclusao = DataBR_to_USA( $_POST['especializacao_ano_conclusao']);
			$mestrado_curso = $_POST['mestrado_curso'];
			$mestrado_instituicao = $_POST['mestrado_instituicao'];
			$mestrado_ano_inicio = DataBR_to_USA( $_POST['mestrado_ano_inicio']);
			$mestrado_ano_conclusao = DataBR_to_USA(  $_POST['mestrado_ano_conclusao']);
			$outro_curso = $_POST['outro_curso'];
			$outro_instituicao = $_POST['outro_instituicao'];
			$outro_ano_inicio = DataBR_to_USA( $_POST['outro_ano_inicio']);
			$outro_ano_conclusao = DataBR_to_USA( $_POST['outro_ano_conclusao']);
			$outros_cursos = $_POST['outros_cursos'];
			$informatica = $_POST['informatica'];
			$empresa_1 = $_POST['empresa_1'];
			$ultimo_cargo_1 = $_POST['ultimo_cargo_1'];			
			$ultimo_salario_1 = $_POST['ultimo_salario_1'];
			$admissao_1 =  DataBR_to_USA( $_POST['admissao_1']);
			$saida_1 =  DataBR_to_USA( $_POST['saida_1']);
			$principais_atividades_1 = $_POST['principais_atividades_1'];
			$empresa_2 =$_POST['empresa_2'];
			$ultimo_cargo_2 = $_POST['ultimo_cargo_2'];
			$ultimo_salario_2 =$_POST['ultimo_salario_2'];
			$admissao_2 = DataBR_to_USA( $_POST['admissao_2']);
			$saida_2 = DataBR_to_USA( $_POST['saida_2']);
			$principais_atividades_2 = $_POST['principais_atividades_2'];
			$empresa_3 = $_POST['empresa_3'];
			$ultimo_cargo_3 = $_POST['ultimo_cargo_3'];
			$ultimo_salario_3 = $_POST['ultimo_salario_3'];
			$admissao_3 = DataBR_to_USA( $_POST['admissao_3']);
			$saida_3 = DataBR_to_USA( $_POST['saida_3']);
			$principais_atividades_3 = $_POST['principais_atividades_3'];
			$referencia_nome_1 = $_POST['referencia_nome_1'];
			$referencia_telefone_1 = $_POST['referencia_telefone_1'];
			$referencia_relacao_1 = $_POST['referencia_relacao_1'];
			$referencia_nome_2 = $_POST['referencia_nome_2'];
			$referencia_telefone_2 = $_POST['referencia_telefone_2'];
			$referencia_relacao_2 = $_POST['referencia_relacao_2'];
			$cod_setor = $_POST['cod_setor'];
			
			$fez_processo_seletivo = $_POST['fez_processo_seletivo'];
			$mes_ano_processo_seletivo = DataBR_to_USA( $_POST['mes_ano_processo_seletivo']); 
			$situacao=$_POST['situacao'];
			$situacao_candidato = $_POST['situacao_candidato'];
			$motivo_contratacao = $_POST['motivo_contratacao'];
			$data_cadastro = $data;
					
			
		$sql = " insert into curriculum (nome,estado_civil,sexo,data_nascimento, nacionalidade,portador_deficiencia,portador_def_tipo,rg,cpf,endereco,bairro,cod_cidade,cep,telefone,celular,email,colegial_curso,colegial_instituicao,colegial_ano_inicio,colegial_ano_conclusao,cod_curso,superior_curso_outro,superior_instituicao,superior_ano_inicio,superior_ano_conclusao,especializacao_curso,especializacao_instituicao,especializacao_ano_inicio,especializacao_ano_conclusao,mestrado_curso,mestrado_instituicao,mestrado_ano_inicio,mestrado_ano_conclusao,outro_curso,outro_instituicao,outro_ano_inicio,outro_ano_conclusao,outros_cursos,informatica,empresa_1,ultimo_cargo_1,ultimo_salario_1,admissao_1,saida_1,principais_atividades_1,empresa_2,ultimo_cargo_2,ultimo_salario_2,admissao_2,saida_2,principais_atividades_2,empresa_3,ultimo_cargo_3,ultimo_salario_3,admissao_3,saida_3,principais_atividades_3,referencia_nome_1,referencia_telefone_1,referencia_relacao_1,referencia_nome_2,referencia_telefone_2,referencia_relacao_2,cod_setor,fez_processo_seletivo,mes_ano_processo_seletivo,situacao,situacao_candidato,motivo_contratacao,data_cadastro )  
		
		values('$nome','$estado_civil','$sexo', '$data_nascimento','$nacionalidade','$portador_deficiencia','$portador_def_tipo','$rg','$cpf','$endereco','$bairro','$cod_cidade','$cep','$telefone','$celular','$email','$colegial_curso','$colegial_instituicao','$colegial_ano_inicio','$colegial_ano_conclusao','$cod_curso','$superior_curso_outro','$superior_instituicao','$superior_ano_inicio','$superior_ano_conclusao','$especializacao_curso','$especializacao_instituicao','$especializacao_ano_inicio','$especializacao_ano_conclusao','$mestrado_curso','$mestrado_instituicao','$mestrado_ano_inicio','$mestrado_ano_conclusao','$outro_curso','$outro_instituicao','$outro_ano_inicio','$outro_ano_conclusao','$outros_cursos','$informatica','$empresa_1','$ultimo_cargo_1','$ultimo_salario_1','$admissao_1','$saida_1','$principais_atividades_1','$empresa_2','$ultimo_cargo_2','$ultimo_salario_2','$admissao_2','$saida_2','$principais_atividades_2','$empresa_3','$ultimo_cargo_3','$ultimo_salario_3','$admissao_3','$saida_3','$principais_atividades_3','$referencia_nome_1','$referencia_telefone_1','$referencia_relacao_1','$referencia_nome_2','$referencia_telefone_2','$referencia_relacao_2','$cod_setor','$fez_processo_seletivo','$mes_ano_processo_seletivo','$situacao','$situacao_candidato','$motivo_contratacao','$data_cadastro')";
		
				
			   //echo $sql; exit;
	} //fim do incluir
	
	else
	if( $_GET['acao'] == 'alterar' )
	{
		$data_altera = date("Y/m/j");
		
     		 $nome = $_POST['nome'];
			$estado_civil = $_POST['estado_civil']; 
	        $sexo = $_POST['sexo'];	
			$data_nascimento = DataBR_to_USA( $_POST['data_nascimento']);
			$nacionalidade = $_POST['nacionalidade'];
			$portador_deficiencia = $_POST['portador_deficiencia'];
			$portador_def_tipo = $_POST['portador_def_tipo'];
			$rg = $_POST['rg'];
			$cpf = $_POST['cpf'];
			$endereco = $_POST['endereco'];
			$bairro = $_POST['bairro'];
			$cod_cidade = $_POST['cod_cidade'];
			$cep = $_POST['cep'];
			$telefone = $_POST['telefone'];
			$celular = $_POST['celular'];
			$email = $_POST['email'];
			//$nivel_escolar = $_POST['nivel_escolar'];
			//$nivel_outro = $_POST['nivel_outro'];
			$colegial_curso= $_POST['colegial_curso'];
			$colegial_instituicao = $_POST['colegial_instituicao'];
			$colegial_ano_inicio = DataBR_to_USA( $_POST['colegial_ano_inicio']);
			$colegial_ano_conclusao = DataBR_to_USA( $_POST['colegial_ano_conclusao']);
			$cod_curso = $_POST['cod_curso'];
			$superior_curso_outro = $_POST['superior_curso_outro'];
			$superior_instituicao = $_POST['superior_instituicao'];
			$superior_ano_inicio =  DataBR_to_USA( $_POST['superior_ano_inicio']);
			$superior_ano_conclusao = DataBR_to_USA( $_POST['superior_ano_conclusao']);
			$especializacao_curso  =$_POST['especializacao_curso'];
			$especializacao_instituicao = $_POST['especializacao_instituicao'];
			$especializacao_ano_inicio = DataBR_to_USA( $_POST['especializacao_ano_inicio']);
			$especializacao_ano_conclusao = DataBR_to_USA( $_POST['especializacao_ano_conclusao']);
			$mestrado_curso = $_POST['mestrado_curso'];
			$mestrado_instituicao = $_POST['mestrado_instituicao'];
			$mestrado_ano_inicio = DataBR_to_USA( $_POST['mestrado_ano_inicio']);
			$mestrado_ano_conclusao = DataBR_to_USA(  $_POST['mestrado_ano_conclusao']);
			$outro_curso = $_POST['outro_curso'];
			$outro_instituicao = $_POST['outro_instituicao'];
			$outro_ano_inicio = DataBR_to_USA( $_POST['outro_ano_inicio']);
			$outro_ano_conclusao = DataBR_to_USA( $_POST['outro_ano_conclusao']);
			$outros_cursos = $_POST['outros_cursos'];
			$informatica = $_POST['informatica'];
			$empresa_1 = $_POST['empresa_1'];
			$ultimo_cargo_1 = $_POST['ultimo_cargo_1'];			
			$ultimo_salario_1 = $_POST['ultimo_salario_1'];
			$admissao_1 =  DataBR_to_USA( $_POST['admissao_1']);
			$saida_1 =  DataBR_to_USA( $_POST['saida_1']);
			$principais_atividades_1 = $_POST['principais_atividades_1'];
			$empresa_2 =$_POST['empresa_2'];
			$ultimo_cargo_2 = $_POST['ultimo_cargo_2'];
			$ultimo_salario_2 =$_POST['ultimo_salario_2'];
			$admissao_2 = DataBR_to_USA( $_POST['admissao_2']);
			$saida_2 = DataBR_to_USA( $_POST['saida_2']);
			$principais_atividades_2 = $_POST['principais_atividades_2'];
			$empresa_3 = $_POST['empresa_3'];
			$ultimo_cargo_3 = $_POST['ultimo_cargo_3'];
			$ultimo_salario_3 = $_POST['ultimo_salario_3'];
			$admissao_3 = DataBR_to_USA( $_POST['admissao_3']);
			$saida_3 = DataBR_to_USA( $_POST['saida_3']);
			$principais_atividades_3 = $_POST['principais_atividades_3'];
			$referencia_nome_1 = $_POST['referencia_nome_1'];
			$referencia_telefone_1 = $_POST['referencia_telefone_1'];
			$referencia_relacao_1 = $_POST['referencia_relacao_1'];
			$referencia_nome_2 = $_POST['referencia_nome_2'];
			$referencia_telefone_2 = $_POST['referencia_telefone_2'];
			$referencia_relacao_2 = $_POST['referencia_relacao_2'];
			$cod_setor = $_POST['cod_setor'];
			$fez_processo_seletivo = $_POST['fez_processo_seletivo'];
			$mes_ano_processo_seletivo = DataBR_to_USA( $_POST['mes_ano_processo_seletivo']); 
            $situacao = $_POST['situacao'];
			$situacao_candidato = $_POST['situacao_candidato'];
			$motivo_contratacao = $_POST['motivo_contratacao'];
			$data_da_alteracao = $data_altera;
	    	$cod_curriculum = $_GET['cod_curriculum'];
		
	  $sql = "update curriculum set nome = '$nome',estado_civil='$estado_civil',sexo='$sexo',data_nascimento='$data_nascimento',nacionalidade='$nacionalidade',portador_deficiencia='$portador_deficiencia',portador_def_tipo='$portador_def_tipo',rg='$rg',cpf='$cpf',endereco='$endereco',bairro='$bairro',cod_cidade='$cod_cidade',cep='$cep',telefone='$telefone',celular='$celular',email='$email',colegial_curso='$colegial_curso',colegial_instituicao='$colegial_instituicao',colegial_ano_inicio='$colegial_ano_inicio',colegial_ano_conclusao='$colegial_ano_conclusao',cod_curso='$cod_curso',superior_curso_outro='$superior_curso_outro',superior_instituicao='$superior_instituicao',superior_ano_inicio='$superior_ano_inicio',superior_ano_conclusao='$superior_ano_conclusao',especializacao_curso='$especializacao_curso',especializacao_instituicao='$especializacao_instituicao',especializacao_ano_inicio='$especializacao_ano_inicio',especializacao_ano_conclusao='$especializacao_ano_conclusao',mestrado_curso='$mestrado_curso',mestrado_instituicao='$mestrado_instituicao',mestrado_ano_inicio='$mestrado_ano_inicio',mestrado_ano_conclusao='$mestrado_ano_conclusao',outro_curso='$outro_curso',outro_instituicao='$outro_instituicao',outro_ano_inicio='$outro_ano_inicio',outro_ano_conclusao='$outro_ano_conclusao',outros_cursos='$outros_cursos',informatica='$informatica',empresa_1='$empresa_1',ultimo_cargo_1='$ultimo_cargo_1'	,ultimo_salario_1='$ultimo_salario_1',admissao_1='$admissao_1',saida_1='$saida_1',principais_atividades_1='$principais_atividades_1',empresa_2='$empresa_2',ultimo_cargo_2='$ultimo_cargo_2',ultimo_salario_2='$ultimo_salario_2',admissao_2='$admissao_2',saida_2='$saida_2',principais_atividades_2='$principais_atividades_2',empresa_3='$empresa_3',ultimo_cargo_3='$ultimo_cargo_3',ultimo_salario_3='$ultimo_salario_3',admissao_3='$admissao_3',saida_3='$saida_3',principais_atividades_3='$principais_atividades_3',referencia_nome_1='$referencia_nome_1',referencia_telefone_1='$referencia_telefone_1',referencia_relacao_1='$referencia_relacao_1',referencia_nome_2='$referencia_nome_2',referencia_telefone_2='$referencia_telefone_2',referencia_relacao_2='$referencia_relacao_2',cod_setor='$cod_setor',fez_processo_seletivo='$fez_processo_seletivo',mes_ano_processo_seletivo='$mes_ano_processo_seletivo',situacao='$situacao',situacao_candidato='$situacao_candidato',motivo_contratacao = '$motivo_contratacao',data_da_alteracao='$data_da_alteracao'
				where cod_curriculum = ' $cod_curriculum'";
			   
			//echo $sql; exit;   
	}// fim do alterar
	
	else
	if( $_GET['acao'] == 'excluir' )
	{
		$cod_curriculum = $_GET['cod_curriculum'];
		
		$sql = "delete from curriculum where cod_curriculum = '$cod_curriculum'";
	}// fim do excluir
	else
	{
		echo '<script language="javascript">
					alert("Acao invalida não foi possivel fazer a consulta no banco de dados !");
					document.location = "index.php?modulo=curriculum";
		      </script>';
		exit;
	}
	
	if (mysql_query($sql))
	{
		echo '<script language="javascript">
					document.location = "index.php?modulo=curriculum";
		      </script>';
		exit;
	}
	else
	{
		echo '<script language="javascript">
					alert("NAO FOI POSSIVEL GRAVAR AS INFORMACOES !");
					document.location = "index.php?modulo=curriculum";
		      </script>';
		exit;
	}

?>
