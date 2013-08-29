
<?php
	
	if($_GET['acao'] == 'alterar')
	{
		$cpf = $_GET['cpf'];
		
		$sql = "select * from curriculum where cpf = '$cpf'";
		//echo $sql; exit;
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{ $cod_curriculum = $dados['cod_curriculum'];
			 $nome = $dados['nome'];
			$estado_civil = $dados['estado_civil']; 
	        $sexo = $dados['sexo'];	
			$data_nascimento = DataUSA_to_BR( $dados['data_nascimento']);
			$nacionalidade = $dados['nacionalidade'];
			$portador_deficiencia = $dados['portador_deficiencia'];
			$portador_def_tipo = $dados['portador_def_tipo'];
			$rg = $dados['rg'];
			$cpf = $dados['cpf'];
			$endereco = $dados['endereco'];
			$bairro = $dados['bairro'];
			$cod_cidade = $dados['cod_cidade'];
			$cep = $dados['cep'];
			$telefone = $dados['telefone'];
			$celular = $dados['celular'];
			$email = $dados['email'];
			$nivel_escolar = $dados['nivel_escolar'];
			$nivel_outro= $dados['nivel_outro'];
			$colegial_curso= $dados['colegial_curso'];
			$colegial_instituicao = $dados['colegial_instituicao'];
			$colegial_ano_inicio = DataUSA_to_BR( $dados['colegial_ano_inicio']);
			$colegial_ano_conclusao = DataUSA_to_BR( $dados['colegial_ano_conclusao']);
			$cod_curso = $dados['cod_curso'];
			$superior_curso_outro = $dados['superior_curso_outro'];
			$superior_instituicao = $dados['superior_instituicao'];
			$superior_ano_inicio =  DataUSA_to_BR( $dados['superior_ano_inicio']);
			$superior_ano_conclusao = DataUSA_to_BR( $dados['superior_ano_conclusao']);
			$especializacao_curso  =$dados['especializacao_curso'];
			$especializacao_instituicao = $dados['especializacao_instituicao'];
			$especializacao_ano_inicio = DataUSA_to_BR( $dados['especializacao_ano_inicio']);
			$especializacao_ano_conclusao = DataUSA_to_BR( $dados['especializacao_ano_conclusao']);
			$mestrado_curso = $dados['mestrado_curso'];
			$mestrado_instituicao = $dados['mestrado_instituicao'];
			$mestrado_ano_inicio = DataUSA_to_BR( $dados['mestrado_ano_inicio']);
			$mestrado_ano_conclusao = DataUSA_to_BR(  $dados['mestrado_ano_conclusao']);
			$outro_curso = $dados['outro_curso'];
			$outro_instituicao = $dados['outro_instituicao'];
			$outro_ano_inicio = DataUSA_to_BR( $dados['outro_ano_inicio']);
			$outro_ano_conclusao = DataUSA_to_BR( $dados['outro_ano_conclusao']);
			$outros_cursos = $dados['outros_cursos'];
			$informatica = $dados['informatica'];
			$empresa_1 = $dados['empresa_1'];
			$ultimo_cargo_1 = $dados['ultimo_cargo_1'];			
			$ultimo_salario_1 = $dados['ultimo_salario_1'];
			$admissao_1 =  DataUSA_to_BR( $dados['admissao_1']);
			$saida_1 =  DataUSA_to_BR( $dados['saida_1']);
			$principais_atividades_1 = $dados['principais_atividades_1'];
			$empresa_2 =$dados['empresa_2'];
			$ultimo_cargo_2 = $dados['ultimo_cargo_2'];
			$ultimo_salario_2 =$dados['ultimo_salario_2'];
			$admissao_2 = DataUSA_to_BR( $dados['admissao_2']);
			$saida_2 = DataUSA_to_BR( $dados['saida_2']);
			$principais_atividades_2 = $dados['principais_atividades_2'];
			$empresa_3 = $dados['empresa_3'];
			$ultimo_cargo_3 = $dados['ultimo_cargo_3'];
			$ultimo_salario_3 = $dados['ultimo_salario_3'];
			$admissao_3 = DataUSA_to_BR( $dados['admissao_3']);
			$saida_3 = DataUSA_to_BR( $dados['saida_3']);
			$principais_atividades_3 = $dados['principais_atividades_3'];
			$referencia_nome_1 = $dados['referencia_nome_1'];
			$referencia_telefone_1 = $dados['referencia_telefone_1'];
			$referencia_relacao_1 = $dados['referencia_relacao_1'];
			$referencia_nome_2 = $dados['referencia_nome_2'];
			$referencia_telefone_2 = $dados['referencia_telefone_2'];
			$referencia_relacao_2 = $dados['referencia_relacao_2'];
			$referencia_nome_3 = $dados['referencia_nome_3'];
			$referencia_telefone_3 = $dados['referencia_telefone_3'];
			$referencia_relacao_3 = $dados['referencia_relacao_3'];
			$cod_setor = $dados['cod_setor'];
			$cod_unidade_interesse = $dados['cod_unidade_interesse'];
			$fez_processo_seletivo = $dados['fez_processo_seletivo'];
			$mes_ano_processo_seletivo = DataUSA_to_BR( $dados['mes_ano_processo_seletivo']);
			$situacao=$dados['situacao']; 
			$situacao_candidato = $dados['situacao_candidato'];
			$motivo_contratacao = $dados['motivo_contratacao'];
			
		}
		else
		{
			echo '<script language="javascript">
				 alert ("REGISTRO NAO ENCONTRADO!");
				 documente.location = "index.php?modulo=especialidade";
				 </script>';
			exit;
		}
	}// fim do if alterar
	
	else
	{
		$descricao='';
	}
	
?>
  <script language="javascript">
//-------------------------------------------------------------------------
function abrir_janela(pagina) {
	window.open(pagina, "_blank", "width=470,height=300,left=10,screenY=0,top=10,dependent=yes,scrollbars=yes,directories=no,location=no,menubar=no,resizable=no,status=no,toolbar=no");
}
function verifica_nivel_escolar(nivel) {
	if (nivel=="Outro") {
		document.formcad.nivel_outro.disabled = false;
		document.formcad.nivel_outro.focus();
		document.formcad.nivel_outro.select();
	} else {
		document.formcad.nivel_outro.disabled = true;
	}
}
function verifica_processo_seletivo(nivel) {
	if (nivel=="sim") {
		document.formcad.mes_ano_processo_seletivo.disabled = false;
		document.formcad.mes_ano_processo_seletivo.focus();
		document.formcad.mes_ano_processo_seletivo.select();
	} else {
		document.formcad.mes_ano_processo_seletivo.disabled = true;
	}
}
/*
function verifica_processo_Portador_deficiência(nivel) {
	if (nivel=="sim") {
		document.formcad.portador_def_tipo.disabled = false;
		document.formcad.portador_def_tipo.focus();
		document.formcad.portador_def_tipo.select();
	} else {
		document.formcad.portador_def_tipo.disabled = true;
	}
}*/
function somente_numero(campo){
	var digits="0123456789"
	var campo_temp 
	for (var i=0;i<campo.value.length;i++) {
		campo_temp=campo.value.substring(i,i+1)       
		if (digits.indexOf(campo_temp)==-1){
			campo.value = campo.value.substring(0,i);
			break;
		}
	}
}

// Formata Campo
function FormataCampo(Campo,teclapres,mascara){
	//pegando o tamanho do texto da caixa de texto com delay de -1 no event
	//ou seja o caractere que foi digitado não será contado.
	strtext = Campo.value
	tamtext = strtext.length
	//pegando o tamanho da mascara
	tammask = mascara.length
	//criando um array para guardar cada caractere da máscara
	arrmask = new Array(tammask)
	//jogando os caracteres para o vetor
	for (var i = 0 ; i < tammask; i++){
		arrmask[i] = mascara.slice(i,i+1)
	}
	//alert (teclapres.keyCode)
	//começando o trabalho sujo
	if (((((arrmask[tamtext] == "#") || (arrmask[tamtext] == "9"))) || (((arrmask[tamtext+1] != "#") || (arrmask[tamtext+1] != "9"))))){
		if ((teclapres.keyCode>=37 && teclapres.keyCode<=40)||(teclapres.keyCode>=48 && teclapres.keyCode<=57)||(teclapres.keyCode >= 96 && teclapres.keyCode<=105)
			||(teclapres.keyCode==8)||(teclapres.keyCode==9)||(teclapres.keyCode==46)||(teclapres.keyCode==13)){
			Organiza_Casa(Campo,arrmask[tamtext],teclapres.keyCode,strtext)
		} else {
			Detona_Event(Campo,strtext)
		} 
	} else { //Aqui funcionaria a mascara para números mas eu ainda não implementei
		if ((arrmask[tamtext] == "A")) {
			charupper = event.valueOf()
			//charupper = charupper.toUpperCase()
			Detona_Event(Campo,strtext)
			masktext = strtext + charupper
			Campo.value = masktext
		}
	}
} //-------------------------------------------------------------------------------------
function formataMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? e.which : e.keyCode;
	// 13=enter, 8=backspace as demais retornam 0(zero)
	// whichCode==0 faz com que seja possivel usar todas as teclas como delete, setas, etc    
	if ((whichCode == 13) || (whichCode == 0) || (whichCode == 8)) return true;
	key = String.fromCharCode(whichCode); // Valor para o código da Chave
	if (strCheck.indexOf(key) == -1) return false; // Chave inválida
	len = objTextBox.value.length;
	for(i = 0; i < len; i++)
		if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
	aux = '';
	for(; i < len; i++)
		if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
	aux += key;
	len = aux.length;
	if (len == 0) objTextBox.value = '';
	if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
	if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
	if (len > 2) {
		aux2 = '';
		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) { aux2 += SeparadorMilesimo; j = 0; }
			aux2 += aux.charAt(i);
			j++;
		}
		objTextBox.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--) objTextBox.value += aux2.charAt(i);
		objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
	}
	return false;
}
//--------------------------------------------------------------------
function enviar()
{
	// validando o campo nome
	if( document.formcad.nome.value.length == 0 || document.formcad.nome.value.length == "" )
	{
		alert("O campo Nome deve ser preenchido!");
		document.formcad.nome.focus();
		return;
	}
	/*if( document.formcad.estado_civil.value.length == "0" || document.formcad.estado_civil.value.length == "" )
	{
		alert("O campo Estado Civil deve ser preenchido!");
		document.formcad.estado_civil.focus();
		document.formcad.estado_civil.select();
		return;
	}*/
	
	// validando o campo SEXO
	var total=0;
	var i=0;
	while(i<document.formcad.sexo.length && total == 0)
	{
		if(document.formcad.sexo[i].checked) { total++; }
		i++;
	} // while
	if(total == 0)
	{
		alert("O campo SEXO deve ser preenchido !");
		document.formcad.sexo.focus();
		return;
	}	
	// validando o campo DATA DE NASCIMENTO
	if( !verificaData(document.formcad.data_nascimento.value) )
	{
		alert("O campo Data de Nascimento deve ser preenchido com uma data válida !");
		document.formcad.data_nascimento.focus();
		document.formcad.data_nascimento.select();
		return;
	}
	if( document.formcad.nacionalidade.value.length == 0 || document.formcad.nacionalidade.value.length == "" )
	{
		alert("O campo Nacionalidade deve ser preenchido corretamente!");
		document.formcad.nacionalidade.focus();
		return;
	}
if( document.formcad.rg.value.length == 0 || document.formcad.rg.value.length == "" )
	{
		alert("O campo Registro Geral (RG) deve ser preenchido corretamente!");
		document.formcad.rg.focus();
		return;
	}
if( document.formcad.cpf.value.length == 0 || document.formcad.cpf.value.length == "" )
	{
		alert("O campo Cadastro de Pessoa Fisica (CPF) deve ser preenchido corretamente!");
		document.formcad.cpf.focus();
		return;
	}
	if( document.formcad.endereco.value.length == 0 || document.formcad.endereco.value.length == "" )
	{
		alert("O campo Endere&ccedil;o deve ser preenchido corretamente!");
		document.formcad.endereco.focus();
		return;
	}
if( document.formcad.bairro.value.length == 0 || document.formcad.bairro.value.length == "" )
	{
		alert("O campo Bairro deve ser preenchido corretamente!");
		document.formcad.bairro.focus();
		return;
	}
	if( document.formcad.cep.value.length == 0 || document.formcad.cep.value.length == "" )
	{
		alert("O campo Código de Endereçamento Postal (CEP) deve ser preenchido corretamente!");
		document.formcad.cep.focus();
		return;
	}
	if( document.formcad.telefone.value.length == 0 || document.formcad.telefone.value.length == "" )
	{
		alert("O campo Telefone deve ser preenchido corretamente!");
		document.formcad.telefone.focus();
		return;
	}
	if( document.formcad.celular.value.length == 0 || document.formcad.celular.value.length == "" )
	{
		alert("O campo Celular deve ser preenchido corretamente!");
		document.formcad.celular.focus();
		return;
	}
	// validando o campo EMAIL
	if( !ValidaEmail(document.formcad.email.value) )
	{
		alert("O campo EMAIL deve ser preechido corretamente !");
		document.formcad.email.focus();
		document.formcad.email.select();
		return;
	}
if( document.formcad.colegial_curso.value.length == 0 || document.formcad.colegial_curso.value.length == "" )
	{
		alert("O campo Curso deve ser preenchido corretamente!");
		document.formcad.colegial_curso.focus();
		return;
	}
	
	if( document.formcad.colegial_instituicao.value.length == 0 || document.formcad.colegial_instituicao.value.length == "" )
	{
		alert("O campo Instituição deve ser preenchido corretamente!");
		document.formcad.colegial_instituicao.focus();
		return;
	}

// validando o campo ano de inicio
	if( !verificaData(document.formcad.colegial_ano_inicio.value) )
	{
		alert("O campo Data de inicio do curso deve ser preenchido com uma data válida !");
		document.formcad.colegial_ano_inicio.focus();
		document.formcad.colegial_ano_inicio.select();
		return;
	}
	// validando o campo ano de conclusao
	if( !verificaData(document.formcad.colegial_ano_conclusao.value) )
	{
		alert("O campo Data de conclusão do curso deve ser preenchido com uma data válida !");
		document.formcad.colegial_ano_conclusao.focus();
		document.formcad.colegial_ano_conclusao.select();
		return;
	}
	/*if( document.formcad.superior_curso_outro.value.length == 0 || document.formcad.superior_curso_outro.value.length == "" )
	{
		alert("O campo Outro deve ser preenchido corretamente!");
		document.formcad.superior_curso_outro.focus();
		return;
	}
	if( document.formcad.superior_instituicao.value.length == 0 || document.formcad.superior_instituicao.value.length == "" )
	{
		alert("O campo Instituição deve ser preenchido corretamente!");
		document.formcad.superior_instituicao.focus();
		return;
	}
	// validando o campo ano de inicio
	if( !verificaData(document.formcad.superior_ano_inicio.value) )
	{
		alert("O campo Data de inicio do curso superior deve ser preenchido com uma data válida !");
		document.formcad.superior_ano_inicio.focus();
		document.formcad.superior_ano_inicio.select();
		return;
	}
	// validando o campo ano de conclusao
	if( !verificaData(document.formcad.superior_ano_conclusao.value) )
	{
		alert("O campo Data de conclusão do curso superior deve ser preenchido com uma data válida !");
		document.formcad.superior_ano_conclusao.focus();
		document.formcad.superior_ano_conclusao.select();
		return;
	}
	if( document.formcad.especializacao_curso.value.length == 0 || document.formcad.especializacao_curso.value.length == "" )
	{
		alert("O campo Curso da especialização deve ser preenchido corretamente!");
		document.formcad.especializacao_curso.focus();
		return;
	}
	if( document.formcad.especializacao_instituicao.value.length == 0 || document.formcad.especializacao_instituicao.value.length == "" )
	{
		alert("O campo Instituição deve ser preenchido corretamente!");
		document.formcad.especializacao_instituicao.focus();
		return;
	}
	// validando o campo ano de inicio
	if( !verificaData(document.formcad.especializacao_ano_inicio.value) )
	{
		alert("O campo Data de inicio do curso da especialização deve ser preenchido com uma data válida !");
		document.formcad.especializacao_ano_inicio.focus();
		document.formcad.especializacao_ano_inicio.select();
		return;
	}
	// validando o campo ano de conclusao
	if( !verificaData(document.formcad.especializacao_ano_conclusao.value) )
	{
		alert("O campo Data de conclusão do curso da especialização deve ser preenchido com uma data válida !");
		document.formcad.especializacao_ano_conclusao.focus();
		document.formcad.especializacao_ano_conclusao.select();
		return;
	}
	if( document.formcad.mestrado_curso.value.length == 0 || document.formcad.mestrado_curso.value.length == "" )
	{
		alert("O campo Curso do mestrado deve ser preenchido corretamente!");
		document.formcad.mestrado_curso.focus();
		return;
	}
	if( document.formcad.mestrado_instituicao.value.length == 0 || document.formcad.mestrado_instituicao.value.length == "" )
	{
		alert("O campo Instituição deve ser preenchido corretamente!");
		document.formcad.mestrado_instituicao.focus();
		return;
	}
	// validando o campo ano de inicio
	if( !verificaData(document.formcad.mestrado_ano_inicio.value) )
	{
		alert("O campo Data de inicio do curso da especialização deve ser preenchido com uma data válida !");
		document.formcad.mestrado_ano_inicio.focus();
		document.formcad.mestrado_ano_inicio.select();
		return;
	}
	// validando o campo ano de conclusao
	if( !verificaData(document.formcad.mestrado_ano_conclusao.value) )
	{
		alert("O campo Data de conclusão do curso da especialização deve ser preenchido com uma data válida !");
		document.formcad.mestrado_ano_conclusao.focus();
		document.formcad.mestrado_ano_conclusao.select();
		return;
	}
*/
if( document.formcad.empresa_1.value.length == 0 || document.formcad.empresa_1.value.length == "" )
	{
		alert("O campo Empresa deve ser preenchido corretamente!");
		document.formcad.empresa_1.focus();
		return;
	}
	if( document.formcad.ultimo_cargo_1.value.length == 0 || document.formcad.ultimo_cargo_1.value.length == "" )
	{
		alert("O campo Último Cargo deve ser preenchido corretamente!");
		document.formcad.ultimo_cargo_1.focus();
		return;
	}
	if( document.formcad.ultimo_salario_1.value.length == 0 || document.formcad.ultimo_salario_1.value.length == "" )
	{
		alert("O campo Último Salário deve ser preenchido corretamente!");
		document.formcad.ultimo_salario_1.focus();
		return;
	}
	// validando o campo ano de inicio
	if( !verificaData(document.formcad.admissao_1.value) )
	{
		alert("O campo Data da última admissão deve ser preenchido com uma data válida !");
		document.formcad.admissao_1.focus();
		document.formcad.admissao_1.select();
		return;
	}
	// validando o campo ano de conclusao
	if( !verificaData(document.formcad.saida_1.value) )
	{
		alert("O campo Data da saida do último serviços deve ser preenchido com uma data válida !");
		document.formcad.saida_1.focus();
		document.formcad.saida_1.select();
		return;
	}
	if( document.formcad.principais_atividades_1.value.length == 0 || document.formcad.principais_atividades_1.value.length == "" )
	{
		alert("O campo Principais atividades deve ser preenchido corretamente!");
		document.formcad.principais_atividades_1.focus();
		return;
	}
	if( document.formcad.referencia_nome_1.value.length == 0 || document.formcad.referencia_nome_1.value.length == "" )
	{
		alert("O campo Nome da referência pessoal deve ser preenchido corretamente!");
		document.formcad.referencia_nome_1.focus();
		return;
	}
	if( document.formcad.referencia_telefone_1.value.length == 0 || document.formcad.referencia_telefone_1.value.length == "" )
	{
		alert("O campo Telefone da referência pessoal deve ser preenchido corretamente!");
		document.formcad.referencia_telefone_1.focus();
		return;
	}
	if( document.formcad.referencia_relacao_1.value.length == 0 || document.formcad.referencia_relacao_1.value.length == "" )
	{
		alert("O campo Relação da referência pessoal deve ser preenchido corretamente!");
		document.formcad.referencia_relacao_1.focus();
		return;
	}

	document.formcad.submit();
}

</script>
<div id="div_curriculum_tudo">
<div id="div_curriculum_nome">
<b>Cadastre seu Curriculum <?php // echo strtoupper($_GET['modulo']);?>

<?php 
	if ($_GET['acao'] == 'incluir')
	{
		echo ' - Incluindo';
	}
	else
	{
		echo ' - Alterando';
	}
?>

</b>
</div><!---aqui fecha a div_curriculum_nome--->


<form name="formcad" id="formcad" method="post" 
		action="Curriculum_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_curriculum=<?php echo $dados['cod_curriculum'];?>">
        
<table border="0" width="80%" align="center" >
<tr><td colspan="2" >Dados Pessoais</td></tr>
<tr>
	<td align="right" width="150">Nome:</td>
	<td><input type="text" name="nome" id="nome" size="50" maxlength="100" autocomplete="off" value="<?php echo $nome ?>" style="ime-mode:disabled"></td>
</tr>
<tr>
	<td align="right">Estado Civil:</td>
	<td>
	<select name="estado_civil" id="estado_civil">
		<option value="0">Selecione um Estado</option>
		<option value="Casado">Casado</option>
        <option value="Solteiro">Solteiro</option>
        <option value="Divorciado">Divorciado</option>
        <option value="Viuvo">Viúvo</option>
        <option value="Outros">Outros</option>
    </select>
	</td>
</tr>
<tr>
	<td align="right">Sexo:</td>
	<td><input type="radio" name="sexo" id="sexo" value="M" <?php if( $sexo == "M"){echo ' checked="checked" ';}?> /> Masculino 

<input type="radio" name="sexo" id="sexo" value="F" <?php if( $sexo == "F"){echo ' checked="checked" ';}?> /> Feminino </td>
</tr>
<tr>
	<td align="right">Data de nascimento:</td>
	<td><input type="text" name="data_nascimento" id="data_nascimento" size="15" maxlength="10" value="<?php echo $data_nascimento; ?>" onkeyup="maskIt(this,event,'##/##/####')" />
 dd/mm/aaaa</td>
</tr>
<tr>
	<td align="right">Nacionalidade:</td>
	<td><input type="text" name="nacionalidade" id="nacionalidade" size="30" maxlength="30" autocomplete="off" value="<?php echo $nacionalidade; ?>" style="ime-mode:disabled"></td>
</tr>
<tr>
	<td align="right">Portador de defici&ecirc;ncia?</td>
	<td>
	<select name="portador_deficiencia" id="portador_deficiencia">
	<option value="Nao" >NAO</option>
	<option value="Sim" >SIM</option>
	</select>
	Tipo: <input type="text" name="portador_def_tipo" id="portador_def_tipo" value="<?php echo $portador_def_tipo; ?>" maxlength="100" size="40">
	</td>
</tr>



<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">Documenta&ccedil;&atilde;o</td></tr>
<tr>
	<td align="right">RG:</td>
	<td><input type="text" name="rg" id="rg" size="20" maxlength="15" autocomplete="off" value="<?php echo $rg; ?>" style="ime-mode:disabled" onkeyup="maskIt(this,event,'##.###.###-#')" /> 
	Somente n&uacute;meros</td>
</tr>
<tr>
	<td align="right">CPF:</td>
	<td><input type="text" name="cpf" id="cpf" size="20" maxlength="15" autocomplete="off" value="<?php echo $cpf; ?>" style="ime-mode:disabled" onkeyup="maskIt(this,event,'###.###.###-##')" /> 
	Somente n&uacute;meros</td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Contato</td></tr>
<tr>
	<td align="right">Endere&ccedil;o:</td>
	<td><input type="text" name="endereco" id="endereco" size="50" maxlength="100" autocomplete="off" value="<?php echo $endereco; ?>" style="ime-mode:disabled"></td>
</tr>
<tr>
	<td align="right">Bairro:</td>
	<td><input type="text" name="bairro" id="bairro" size="50" maxlength="60" autocomplete="off" value="<?php echo $bairro; ?>" style="ime-mode:disabled"></td>
</tr>
<tr>
	<td align="right">Estado:</td>
	<td><select name="cod_estado" id="cod_estado" onchange="busca_cidade();">
		<option value="0" > Selecione uma Estado </option>
		<?php
			$sql = " select * from estado ";
			$r = mysql_query($sql);
			
			while( $dadoscid = mysql_fetch_array($r) )
			{
				if( $dadoscid['cod_estado'] == $cod_estado )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
		
				echo '<option value="'.$dadoscid['cod_estado'].'" '.$sel.'  > '.$dadoscid['nome_estado'].' </option>';
			}
				
		?>
	</select></td>
</tr>
<tr>
	<td align="right">Cidade:</td>
	<td>
	<div id="divCidade">
	<select id="cod_cidade" name="cod_cidade">
		<option value="0">Selecione uma Cidade</option>
	</select>
	</div>
	</td>
</tr>
<tr>
	<td align="right">CEP:</td>
	<td><input type="text" name="cep" id="cep" size="15" maxlength="9" autocomplete="off" value="<?php echo $cep; ?>" style="ime-mode:disabled"  onkeyup="maskIt(this,event,'#####-###')" /> 99999-999
    
	<!----<a href="javascript:abrir_janela('busca_cep.htm', 780, 350);">busca CEP</a> - ---->
	<a href="javascript:abrir_janela('busca_por_cep.htm', 780, 350);">Busca por CEP</a>
	
    </td>
</tr>
<tr>
	<td align="right">Telefone:</td>
	<td><input type="text" name="telefone" id="telefone" size="25" maxlength="20" autocomplete="off" value="<?php echo $telefone; ?>" style="ime-mode:disabled"  onkeyup="maskIt(this,event,'(##)####-####')" /> (99) 9999-9999</td>
</tr>
<tr>
	<td align="right">Celular:</td>
	<td><input type="text" name="celular" id="celular" size="25" maxlength="20" autocomplete="off" value="<?php echo $celular; ?>" style="ime-mode:disabled" onkeyup="maskIt(this,event,'(##)####-####')" /> (99) 9999-9999</td>
</tr>
<tr>
	<td align="right">E-mail:</td>
	<td><input type="text" name="email" id="email" size="50" maxlength="150" autocomplete="off" value="<?php echo $email; ?>" style="ime-mode:disabled"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Forma&ccedil;&atilde;o Acad&ecirc;mica</td></tr>
<tr>
	<td align="right">Nivel:</td>
	<td>
	<select name="nivel_escolar" id="nivel_escolar" onchange="javascript: verifica_nivel_escolar(document.formcad.nivel_escolar.options[document.formcad.nivel_escolar.selectedIndex].value);">
		<option value="0"></option>
		<option value="Primeiro Grau">Primeiro Grau</option>
        <option value="Segundo Grau">Segundo Grau</option>
        <option value="Superior">Superior</option>
        <option value="Especializacao">Especialização</option>
        <option value="Mestrado">Mestrado</option>
        <option value="Outro">Outro</option>	
        </select>
         Outro: <input type="text" name="nivel_outro" id="nivel_outro" value="<?php echo $nivel_outro; ?>" size="32" maxlength="100" disabled="disabled">
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Segundo Grau</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><input type="text" name="colegial_curso" id="colegial_curso" value="<?php echo $colegial_curso; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><input type="text" name="colegial_instituicao" id="colegial_instituicao" value="<?php echo $colegial_instituicao; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Data de in&iacute;cio</td>
	<td>
		<input type="text" name="colegial_ano_inicio" id="colegial_ano_inicio" value="<?php echo $colegial_ano_inicio; ?>" size="10" maxlength="10" onkeyup="maskIt(this,event,'##/##/####')" />&nbsp;&nbsp;Data de Conclus&atilde;o*:
        
		<input type="text" name="colegial_ano_conclusao" id="colegial_ano_conclusao" value="<?php echo $colegial_ano_conclusao; ?>" size="10" maxlength="10" onkeyup="maskIt(this,event,'##/##/####')" />
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Superior</b></td></tr>
<tr>
	<td align="right">Curso Superior:</td>
	<td>
	<select name="cod_curso" id="cod_curso">
		<option value="0" > Selecione um Curso </option>
		<?php
			$sql = " select * from curso order by nome_curso ";
			
			//$sql.=" where p.descricao like'%".$_POST['nome']."%'";
			
			$r = mysql_query($sql);
			
			while( $dadosc = mysql_fetch_array($r) )
			{
				if( $dadosc['cod_curso'] == $cod_curso )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
			
				echo '<option value="'.$dadosc['cod_curso'].'" '.$sel.'  > '.$dadosc['nome_curso'].' </option>';
			}
				
		?>
	</select>
	</td>
</tr>
<tr>
	<td align="right">Outro</td>
	<td><input type="text" name="superior_curso_outro" id="superior_curso_outro" value="<?php echo $superior_curso_outro; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><input type="text" name="superior_instituicao" id="superior_instituicao" value="<?php echo $superior_instituicao; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<input type="text" name="superior_ano_inicio" id="superior_ano_inicio" value="<?php echo $superior_ano_inicio; ?>" size="10" maxlength="10" onkeyup="maskIt(this,event,'##/##/####')" /> &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<input type="text" name="superior_ano_conclusao" id="superior_ano_conclusao" value="<?php echo $superior_ano_conclusao; ?>" size="10" maxlength="10" onkeyup="maskIt(this,event,'##/##/####')" />
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Especializa&ccedil;&atilde;o</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><input type="text" name="especializacao_curso" id="especializacao_curso" value="<?php echo $especializacao_curso; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><input type="text" name="especializacao_instituicao" id="especializacao_instituicao" value="<?php echo $especializacao_instituicao; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<input type="text" name="especializacao_ano_inicio" id="especializacao_ano_inicio" value="<?php echo $especializacao_ano_inicio; ?>" size="10" maxlength="10" onkeyup="maskIt(this,event,'##/##/####')" /> &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<input type="text" name="especializacao_ano_conclusao" id="especializacao_ano_conclusao" value="<?php echo $especializacao_ano_conclusao; ?>" size="10" maxlength="10" onkeyup="maskIt(this,event,'##/##/####')" />
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Mestrado</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><input type="text" name="mestrado_curso" id="mestrado_curso" value="<?php echo $mestrado_curso; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><input type="text" name="mestrado_instituicao" id="mestrado_instituicao" value="<?php echo $mestrado_instituicao; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<input type="text" name="mestrado_ano_inicio" id="mestrado_ano_inicio" value="<?php echo $mestrado_ano_inicio; ?>" size="10" maxlength="10"  onkeyup="maskIt(this,event,'##/##/####')" /> &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<input type="text" name="mestrado_ano_conclusao" id="mestrado_ano_conclusao" value="<?php echo $mestrado_ano_conclusao; ?>" size="10" maxlength="10"  onkeyup="maskIt(this,event,'##/##/####')" /> 
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Outro</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><input type="text" name="outro_curso" id="outro_curso" value="<?php echo $outro_curso; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><input type="text" name="outro_instituicao" id="outro_instituicao" value="<?php echo $outro_instituicao; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<input type="text" name="outro_ano_inicio" id="outro_ano_inicio" value="<?php echo $outro_ano_inicio; ?>" size="10" maxlength="10"   onkeyup="maskIt(this,event,'##/##/####')" />  &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<input type="text" name="outro_ano_conclusao" id="outro_ano_conclusao" value="<?php echo $outro_ano_conclusao; ?>" size="10" maxlength="10"   onkeyup="maskIt(this,event,'##/##/####')" /> 
        
	</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td></td>
<td><i>* Se ainda estiver cursando, deixe o campo em branco.</i></td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Outros Cursos</td></tr>
<tr>
	<td align="right" valign="top">Atualiza&ccedil;&atilde;o/Aperfei&ccedil;oamento:</td>
	<td>
	<textarea name="outros_cursos" id="outros_cursos" rows="5" cols="60"><?php echo $outros_cursos; ?></textarea><br>&nbsp;
	</td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">Conhecimentos em Inform&aacute;tica</td></tr>
<tr>
	<td align="right" valign="top"><br>Breve descri&ccedil;&atilde;o:</td>
	<td>
	<textarea name="informatica" id="informatica" rows="5" cols="60"><?php echo $informatica; ?></textarea><br>&nbsp;
	</td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Hist&oacute;rico Profissional</td></tr>

<tr><td>&nbsp;</td><td><b>Emprego atual (ou &uacute;ltimo):</b></td></tr>
<tr>
	<td align="right">Empresa</td>
	<td><input type="text" name="empresa_1" id="empresa_1" value="<?php echo $empresa_1; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">&Uacute;ltimo cargo</td>
	<td>
	<input type="text" name="ultimo_cargo_1" id="ultimo_cargo_1" value="<?php echo $ultimo_cargo_1; ?>" size="29" maxlength="150">
	&Uacute;ltimo sal&aacute;rio: R$
    
	<input type="text" name="ultimo_salario_1" id="ultimo_salario_1" value="<?php echo $ultimo_salario_1; ?>" size="10" maxlength="10" style="text-align: right;" onKeyPress="javascript:return(formataMoeda(this,'.',',',event));">
	</td>
</tr>
<tr>
	<td align="right">Admiss&atilde;o</td>
	<td>
		<input type="text" name="admissao_1" id="admissao_1" value="<?php echo $admissao_1; ?>" size="10" maxlength="12" onkeyup="maskIt(this,event,'##/##/####')" /> Sa&iacute;da:
        
		<input type="text" name="saida_1" id="saida_1" value="<?php echo $saida_1; ?>" size="10" maxlength="12" onkeyup="maskIt(this,event,'##/##/####')" /> (aaaa <em>ou</em> mm/aaaa)
	</td>
</tr>
<tr>
	<td align="right" valign="top"><br>Principais atividades:</td>
	<td><textarea name="principais_atividades_1" id="principais_atividades_1" rows="5" cols="60"><?php echo $principais_atividades_1; ?></textarea></td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>&nbsp;</td><td><b>Emprego anterior (ou pen&uacute;ltimo):</b></td></tr>
<tr>
	<td align="right">Empresa</td>
	<td><input type="text" name="empresa_2" id="empresa_2" value="<?php echo $empresa_2; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">&Uacute;ltimo cargo</td>
	<td>
	<input type="text" name="ultimo_cargo_2" id="ultimo_cargo_2" value="<?php echo $ultimo_cargo_2; ?>" size="29" maxlength="150">
	&Uacute;ltimo sal&aacute;rio: R$
    
	<input type="text" name="ultimo_salario_2" id="ultimo_salario_2" value="<?php echo $ultimo_salario_2; ?>" size="10" maxlength="10" style="text-align: right;" onKeyPress="javascript:return(formataMoeda(this,'.',',',event));">
	</td>
</tr>
<tr>
	<td align="right">Admiss&atilde;o</td>
	<td>
		<input type="text" name="admissao_2" id="admissao_2" value="<?php echo $admissao_2; ?>" size="10" maxlength="12" onkeyup="maskIt(this,event,'##/##/####')" /> Sa&iacute;da:
        
		<input type="text" name="saida_2" id="saida_2" value="<?php echo $saida_2; ?>" size="10" maxlength="12" onkeyup="maskIt(this,event,'##/##/####')" /> (aaaa <em>ou</em> mm/aaaa)
	</td>
</tr>
<tr>
	<td align="right" valign="top"><br>Principais atividades:</td>
	<td><textarea name="principais_atividades_2" id="principais_atividades_2" rows="5" cols="60"><?php echo $principais_atividades_2; ?></textarea></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>&nbsp;</td><td><b>Emprego anterior (ou antepen&uacute;ltimo):</b></td></tr>
<tr>
	<td align="right">Empresa</td>
	<td><input type="text" name="empresa_3" id="empresa_3" value="<?php echo $empresa_3; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">&Uacute;ltimo cargo</td>
	<td>
	<input type="text" name="ultimo_cargo_3" id="ultimo_cargo_3" value="<?php echo $ultimo_cargo_3; ?>" size="29" maxlength="150">
	&Uacute;ltimo sal&aacute;rio: R$
    
	<input type="text" name="ultimo_salario_3" id="ultimo_salario_3" value="<?php echo $ultimo_salario_3; ?>" size="10" maxlength="10" style="text-align: right;" onKeyPress="javascript:return(formataMoeda(this,'.',',',event));">
	</td>
</tr>
<tr>
	<td align="right">Admiss&atilde;o</td>
	<td>
		<input type="text" name="admissao_3" id="admissao_3" value="<?php echo $admissao_3; ?>" size="10" maxlength="12" onkeyup="maskIt(this,event,'##/##/####')" /> Sa&iacute;da:
        
		<input type="text" name="saida_3" id="saida_3" value="<?php echo $saida_3; ?>" size="10" maxlength="12" onkeyup="maskIt(this,event,'##/##/####')" /> (aaaa <em>ou</em> mm/aaaa)
	</td>
</tr>
<tr>
	<td align="right" valign="top"><br>Principais atividades:</td>
	<td><textarea name="principais_atividades_3" id="principais_atividades_3" rows="5" cols="60"><?php echo $principais_atividades_3; ?></textarea></td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Refer&ecirc;ncia Pessoal</td></tr>

<tr>
	<td align="right">Nome:</td>
	<td><input type="text" name="referencia_nome_1" id="referencia_nome_1" value="<?php echo $referencia_nome_1; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Telefone:</td>
	<td><input type="text" name="referencia_telefone_1" id="referencia_telefone_1" value="<?php echo $referencia_telefone_1; ?>" size="25" maxlength="20" onkeyup="maskIt(this,event,'(##)####-####')" /></td>
</tr>
<tr>
	<td align="right" valign="top"><br>Rela&ccedil;&atilde;o:</td>
	<td><textarea name="referencia_relacao_1" id="referencia_relacao_1" rows="4" cols="60"><?php echo $referencia_relacao_1; ?></textarea></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
	<td align="right">Nome:</td>
	<td><input type="text" name="referencia_nome_2" id="referencia_nome_2" value="<?php echo $referencia_nome_2; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">Telefone:</td>
	<td><input type="text" name="referencia_telefone_2" id="referencia_telefone_2" value="<?php echo $referencia_telefone_2; ?>" size="25" maxlength="20" onkeyup="maskIt(this,event,'(##)####-####')" /></td>
</tr>
<tr>
	<td align="right" valign="top"><br>Rela&ccedil;&atilde;o:</td>
	<td><textarea name="referencia_relacao_2" id="referencia_relacao_2" rows="4" cols="60"><?php echo $referencia_relacao_2; ?></textarea></td>
</tr>





<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >&Aacute;rea de interesse</td></tr>
<tr>
	<td align="right">&Aacute;rea de interesse:</td>
	<td>
	<select name="cod_setor" id="cod_setor">
		<option value="0" > Selecione uma &Aacute;rea de Interesse </option>
		<?php
			$sql = " select * from setor order by nome ";
			$r = mysql_query($sql);
			
			while( $dadoscid = mysql_fetch_array($r) )
			{
				if( $dadoscid['cod_setor'] == $cod_setor )
				{ $sel = ' selected="selected" '; }
				else 
				{ $sel = ''; }
		
				echo '<option value="'.$dadoscid['cod_setor'].'" '.$sel.'  > '.$dadoscid['nome'].' </option>';
			}
				
		?>
	</select>
	</td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Processo Seletivo</td></tr>
<tr><td colspan="2">
J&aacute; participou de algum processo seletivo da Santa Casa?</td></tr>
<tr><td>
<select name="fez_processo_seletivo" id="fez_processo_seletivo" onchange="javascript: verifica_processo_seletivo(document.formcad.fez_processo_seletivo.options[document.formcad.fez_processo_seletivo.selectedIndex].value);">
<option value="0">Selecione uma op&ccedil;&atilde;o</option>
<option value="nao">N&Atilde;O</option>
<option value="sim">SIM</option>
</select>&nbsp;
</td></tr>

<tr><td colspan="1" align="right">Data do processo seletivo:</td>
<td colspan="1"> <input type="text" name="mes_ano_processo_seletivo" id="mes_ano_processo_seletivo" autocomplete="off" value="<?php echo $data_processo_seletivo; ?>" maxlength="10" size="10" onkeyup="maskIt(this,event,'##/##/####')" disabled="disabled" /> 
</td></tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center"><input type="button" name="btngravar" id="btngravar" value="Gravar" onclick="enviar();" > 
<input type="button" name="btncancelar" id="btncancelar"  value="Cancelar" onClick="document.location='index.php?modulo=home';"  />
</td></tr>

</table>
</form>

<script language="JavaScript">
<!--
	document.formcad.nome.focus();
//-->
</script>
	</td>
	
</tr>


</table>

</form>

</div>
