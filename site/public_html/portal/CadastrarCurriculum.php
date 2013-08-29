<script language="javascript">
function cadastrar()
{
	if(document.formCadastrar.txtCadcpf.value == "" || document.formCadastrar.txtCadcpf.length == 0)
	{
		alert("O campo CPf não pode ficar vazio!!!");
		document.formCadastrar.txtCadcpf.focus();
		return ;
	}

	if(document.formCadastrar.txtCadrg.length == 0 || document.formCadastrar.txtCadrg.value == "")
	{
		alert("O campo RG não pode ficar vazio!!!");
		document.formCadastrar.txtCadrg.focus();
		return;
	}
	// validando o campo DATA DE NASCIMENTO
	if( !verificaData(document.formCadastrar.txtCad_data_nascimento.value) )
	{
		alert("O campo DATA DE NASCIMENTO deve ser preechido com uma data válida !");
		document.formCadastrar.txtCad_data_nascimento.focus();
		document.formCadastrar.txtCad_data_nascimento.select();
		return;
	}
	
	<?php
		$_SESSION['cpf'] = 'document.formCadastrar.txtCadcpf.value';
	?>
	
	document.formCadastrar.submit();
}
</script>

<div id="div_curriculumtudo">
<div id="div_curriculumnome">Cadastre seu Curr&iacute;culo no Site da Santa Casa de Adamantina </div>	

<div id="div_explicacao">Se voc&ecirc; deseja fazer parte do grupo de colaboradores da Santa Casa de Miseric&oacute;rdia de Adamantina, cadastre-se em nosso site! Seus dados ficar&atilde;o armazenados em nosso banco de dados, e caso tenha alguma oportunidade que se adeque ao seu perfil profissional, entraremos em contato o mais r&aacute;pido poss&iacute;vel para sua participa&ccedil;&atilde;o no Processo Seletivo,<p> A santa casa de adamantina agradece desde já o seu interesse em vir trabalhar conosco.</p> </div>

<div id="div_org_forms">


<form name="formCadastrar" id="formCadastrar" action="index.php?modulo=Curriculum_Ficha&acao=incluir" method="post">
 <table cellpadding="2" cellspacing="2" border="0" align="center">
 <tr><td align="right">CPF:&nbsp;</td>
 
 <td>           <input type="text" id="txtCadcpf" tabindex="3" name="txtCadcpf" value="" size="20" maxlength="15" /><font color="#000000" size="1">&nbsp;Somente N&uacute;meros</font>
            </td>
            
           <tr><td align="right"> RG:&nbsp;</td>
           <td>
            <input type="text" id="txtCadrg" tabindex="4" name="txtCadrg" value="" size="20" maxlength="15" onkeyup="maskIt(this,event,'##.###.###-##')"   /><font color="#000000" size="1">&nbsp;Somente N&uacute;meros</font>
       </td>
       <tr><td align="right">Data Nascimento&nbsp;:</td>
       <td>
            <input type="text" id="txtCad_data_nascimento" tabindex="5" name="txtCad_data_nascimento" value="" size="15" maxlength="10" onkeyup="maskIt(this,event,'##/##/####')"   /><font color="#000000" size="1">&nbsp;dd/mm/aaaa</font>
           </td>

    </table>
    <?php

	if( isset($_GET['msg']) )
	{
		echo '<div id="div_mensagemErro_Email">'.$_GET['msg'].'</div>';
	}

?>  
    <div id="btn_avancar">            
           <input type="button" id="btn_Avancar" name="btn_Avancar" value="Avan&ccedil;ar" onClick="cadastrar();"></div>
         
           
           
    <div id="div_mensagem"><ul><li>Para inserir ou alterar um novo curr&iacute;culo, basta digitar os dados acima e clicar em Avan&ccedil;ar.</li>
    </ul></div>
       
    </form>
    </div></div>