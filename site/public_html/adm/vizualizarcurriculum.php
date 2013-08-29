<?php

include "../portal/funcoes.php";
	ini_set( 'display_errors', '0' );
	$conexao = conectar_bd();
	
	if( !$conexao ) 
	{ 
		echo '<a href="javascript:window.close();">Fechar</a>';		
		exit; 
	}
	
?>

<?php
	
	if($_GET['acao'] == 'visualizar')
	{
		$cod_curriculum = $_GET['cod_curriculum'];
		
		$sql = "select c.*,cid.nome_cidade as cidades from curriculum c inner join cidade cid
where c.cod_cidade = cid.cod_cidade and c.cod_curriculum = '$cod_curriculum'";
		
		
		
		$r = mysql_query($sql);
		
		if( $dados = mysql_fetch_array($r) )
		{
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
			$cidades = $dados['cidades'];
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

<style type="text/css">

#divCidade
{
	width:162px;
	height:auto;
	
}
                                                                                                                                                                          body
{
	background-image:url(Imagens/bodybg.jpg);
	background-repeat:repeat-x;
}
           
</style>

<form name="formcad" id="formcad" method="post" 
		action="curriculum_gravar.php?acao=<?php echo $_GET['acao']; ?>&amp;cod_curriculum=<?php echo $_GET['cod_curriculum'];?>">
        
<table border="0"  width="100%" align="center" cellpadding="2" cellspacing="3" bordercolor="#000000">
<fieldset>

<tr><td colspan="2" ><legend>Dados Pessoais</legend></td></tr>
<tr>
	<td align="right" width="310">Nome:</td>
	<td width="735"><?php echo $nome ?></td>
</tr>
<tr>
	<td align="right">Estado Civil:</td>
	<td>
	<?php echo $estado_civil; ?>
	</td>
</tr>
<tr>
	<td align="right">Sexo:</td>
	<td><?php echo $sexo; ?></td>
</tr>
<tr>
	<td align="right">Data de nascimento:</td>
	<td><?php echo $data_nascimento; ?>
 dd/mm/aaaa</td>
</tr>
<tr>
	<td align="right">Nacionalidade:</td>
	<td><?php echo $nacionalidade; ?></td>
</tr>
<tr>
	<td align="right">Portador de defici&ecirc;ncia?</td>
	<td>
	<?php echo $portador_def_tipo; ?>
	</td>
</tr>


</fieldset>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">Documenta&ccedil;&atilde;o</td></tr>
<tr>
	<td align="right">RG:</td>
	<td><?php echo $rg; ?> </td>
</tr>
<tr>
	<td align="right">CPF:</td>
	<td><?php echo $cpf; ?></td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Contato</td></tr>
<tr>
	<td align="right">Endere&ccedil;o:</td>
	<td><?php echo $endereco; ?></td>
</tr>
<tr>
	<td align="right">Bairro:</td>
	<td><?php echo $bairro; ?></td>
</tr>
<!---<tr>
	<td align="right">Estado:</td>
	<td><?php//echo $; ?></td>
</tr>-->
<tr>
	<td align="right">Cidade:</td>
	<td>
	<?php echo $cidades; ?>
	</td>
</tr>
<tr>
	<td align="right">CEP:</td>
	<td><?php echo $cep; ?>    
	
	
    </td>
</tr>
<tr>
	<td align="right">Telefone:</td>
	<td><?php echo $telefone; ?></td>
</tr>
<tr>
	<td align="right">Celular:</td>
	<td><?php echo $celular; ?> </td>
</tr>
<tr>
	<td align="right">E-mail:</td>
	<td><?php echo $email; ?></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Forma&ccedil;&atilde;o Acad&ecirc;mica</td></tr>
<tr>
	<td align="right">N&iacute;vel:</td>
	<td>
	<?php echo $nivel_outro; ?>
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Segundo Grau</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><?php echo $colegial_curso; ?></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><?php echo $colegial_instituicao; ?></td>
</tr>
<tr>
	<td align="right">Data de in&iacute;cio</td>
	<td>
		<?php echo $colegial_ano_inicio; ?>&nbsp;&nbsp;Data de Conclus&atilde;o*:
        
		<?php echo $colegial_ano_conclusao; ?>
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Superior</b></td></tr>
<tr>
	<td align="right">Curso:</td>
	<td>
	
	<?php echo $cod_curso; ?>
	</td>
</tr>
<tr>
	<td align="right">Outro</td>
	<td><?php echo $superior_curso_outro; ?></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><?php echo $superior_instituicao; ?></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<?php echo $superior_ano_inicio; ?> &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<?php echo $superior_ano_conclusao; ?>
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Especializa&ccedil;&atilde;o</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><?php echo $especializacao_curso; ?></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><?php echo $especializacao_instituicao; ?></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<?php echo $especializacao_ano_inicio; ?> &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<?php echo $especializacao_ano_conclusao; ?>
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Mestrado</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><?php echo $mestrado_curso; ?></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><?php echo $mestrado_instituicao; ?></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<?php echo $mestrado_ano_inicio; ?> &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<?php echo $mestrado_ano_conclusao; ?>
	</td>
</tr>

<tr><td colspan="2">&nbsp;</tr>
<tr><td></td><td><b>Outro</b></td></tr>
<tr>
	<td align="right">Curso</td>
	<td><?php echo $outro_curso; ?></td>
</tr>
<tr>
	<td align="right">Institui&ccedil;&atilde;o</td>
	<td><?php echo $outro_instituicao; ?></td>
</tr>
<tr>
	<td align="right">Ano e m&ecirc;s de in&iacute;cio</td>
	<td>
		<?php echo $outro_ano_inicio; ?> &nbsp;&nbsp;Ano e m&ecirc;s de Conclus&atilde;o*:
        
		<?php echo $outro_ano_conclusao; ?>
        
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
	<?php echo $outros_cursos; ?><br>&nbsp;
	</td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">Conhecimentos em Inform&aacute;tica</td></tr>
<tr>
	<td align="right" valign="top"><br>Breve descri&ccedil;&atilde;o:</td>
	<td>
	<?php echo $informatica; ?><br>&nbsp;
	</td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Hist&oacute;rico Profissional</td></tr>

<tr><td>&nbsp;</td><td><b>Emprego atual (ou &uacute;ltimo):</b></td></tr>
<tr>
	<td align="right">Empresa</td>
	<td><?php echo $empresa_1; ?></td>
</tr>
<tr>
	<td align="right">&Uacute;ltimo cargo</td>
	<td>
	<?php echo $ultimo_cargo_1; ?>
	&Uacute;ltimo sal&aacute;rio: R$
    
<?php echo $ultimo_salario_1; ?>
	</td>
</tr>
<tr>
	<td align="right">Admiss&atilde;o</td>
	<td>
		<?php echo $admissao_1; ?>Sa&iacute;da:
        
		<?php echo $saida_1; ?>
	</td>
</tr>
<tr>
	<td align="right" valign="top"><br>Principais atividades:</td>
	<td><?php echo $principais_atividades_1; ?></td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>&nbsp;</td><td><b>Emprego anterior (ou pen&uacute;ltimo):</b></td></tr>
<tr>
	<td align="right">Empresa</td>
	<td><?php echo $empresa_2; ?></td>
</tr>
<tr>
	<td align="right">&Uacute;ltimo cargo</td>
	<td>
	<?php echo $ultimo_cargo_2; ?>
	&Uacute;ltimo sal&aacute;rio: R$
    
	<?php echo $ultimo_salario_2; ?>
	</td>
</tr>
<tr>
	<td align="right">Admiss&atilde;o</td>
	<td>
		<?php echo $admissao_2; ?> Sa&iacute;da:
        
		<?php echo $saida_2; ?> (aaaa <em>ou</em> mm/aaaa)
	</td>
</tr>
<tr>
	<td align="right" valign="top"><br>Principais atividades:</td>
	<td<?php echo $principais_atividades_2; ?><td width="167"></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>&nbsp;</td><td><b>Emprego anterior (ou antepen&uacute;ltimo):</b></td></tr>
<tr>
	<td align="right">Empresa</td>
	<td><?php echo $empresa_3; ?>" size="50" maxlength="150"></td>
</tr>
<tr>
	<td align="right">&Uacute;ltimo cargo</td>
	<td>
	<?php echo $ultimo_cargo_3; ?>
	&Uacute;ltimo sal&aacute;rio: R$
    
	<?php echo $ultimo_salario_3; ?>
	</td>
</tr>
<tr>
	<td align="right">Admiss&atilde;o</td>
	<td>
		<?php echo $admissao_3; ?> Sa&iacute;da:
        
		<?php echo $saida_3; ?> (aaaa <em>ou</em> mm/aaaa)
	</td>
</tr>
<tr>
	<td align="right" valign="top"><br>Principais atividades:</td>
	<td><?php echo $principais_atividades_3; ?></td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Refer&ecirc;ncia Pessoal</td></tr>

<tr>
	<td align="right">Nome:</td>
	<td><?php echo $referencia_nome_1; ?></td>
</tr>
<tr>
	<td align="right">Telefone:</td>
	<td><?php echo $referencia_telefone_1; ?></td>
</tr>
<tr>
	<td align="right" valign="top"><br>Rela&ccedil;&atilde;o:</td>
	<td><?php echo $referencia_relacao_1; ?></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
	<td align="right">Nome:</td>
	<td><?php echo $referencia_nome_2; ?></td>
</tr>
<tr>
	<td align="right">Telefone:</td>
	<td><?php echo $referencia_telefone_2; ?></td>
</tr>
<tr>
	<td align="right" valign="top"><br>Rela&ccedil;&atilde;o:</td>
	<td><?php echo $referencia_relacao_2; ?></td>
</tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >&Aacute;rea de interesse</td></tr>
<tr>
	<td align="right">&Aacute;rea de interesse:</td>
	<td>
	<?php echo $cod_setor; ?>
	</td>
</tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >Processo Seletivo</td></tr>
<tr>

<td colspan="1">
J&aacute; participou de algum processo seletivo?
</td>
<td colspan="1">
<? echo $fez_processo_seletivo; ?>&nbsp;
</td>
</tr>

<tr><td colspan="1" align="right">
Data do processo seletivo: </td><td><?php echo $data_processo_seletivo; ?>
</td></tr>


<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">Motivo da Contrata&ccedil;&atilde;o.</td></tr>
<tr>
  <td align="right">Situa&ccedil;&atilde;o</td><td>


<?php echo $situacao;?> </td></tr>

<tr><td colspan="2">J&aacute; foi contratado pela Institui&ccedil;&atilde;o?</td></tr>

<tr><td colspan="2">
 <?php  echo $situacao_candidato; ?> 

 N&atilde;o </td></tr>

<tr><td align="right">Motivo:</td>
<td><?php echo $motivo_contratacao; ?> </td></tr>
    

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
