
<div id="menuTudo">
<div id="menuimagem"></div>

<ul class="menu">
<li><a href="index.php">Home</a></li>
<li><a href="index.php?modulo=bancosangue">Banco de Sangue</a></li>
<li><a href="index.php?modulo=curriculum">Curriculum</a></li>
<li><a href="index.php?modulo=cidade">Cidade</a></li>
<li><a href="index.php?modulo=convenios">Convênios</a></li>
<li><a href="index.php?modulo=medico">Corpo Cl&iacute;nico</a></li>
<li><a href="index.php?modulo=especialidade">Especialidade</a></li>
<li><a href="index.php?modulo=humanizacao">Humaniza&ccedil;&atilde;o</a></li>
<li><a href="index.php?modulo=layout">Layout</a></li>
<li><a href="index.php?modulo=maternidade">Maternidade</a></li>

<li><a href="index.php?modulo=noticia">Noticias</a></li>
<li><a href="index.php?modulo=Provedoria">Provedoria</a></li>
<li><a href="index.php?modulo=RecursosHumanos">Recursos Humanos</a></li>
<li><a href="index.php?modulo=sesmt">Seguran&ccedil;a do Trabalho</a></li>
<li><a href="index.php?modulo=sugestoes_reclamacoes">Sugest&otilde;es e Reclama&ccedil;&otilde;es</a></li>

<li><a href="index.php?modulo=setor">Setor</a></li>

<?php
if($_SESSION["permissao"] == "Supervisor_avancado")
{
echo'<li><a href="index.php?modulo=usuarios">Usu&aacute;rios</a></li>';
}
?>

<li><a href="index.php?modulo=estado">Unidade Federativa</a></li>
<?php
if($_SESSION["permissao"] == "Supervisor_avancado")
{
echo'<li><a href="http://santacasadeadamantina.com.br:2082">Manuten&ccedil;&atilde;o</a></li>';
}

?>

<li><a href="index.php?modulo=sair">Encerrar Sistema</a></li>


</ul>
<img src="Imagens/Rodape_menu.png" />
</div>
