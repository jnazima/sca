
    <script language="javascript">
	alert("Modulo em desenvolvimento");
	document.location = "index.php";
	</script>
    
   <!----
<script type="text/javascript">
// Início do código de Aumentar/ Diminuir a letra
 
// Para usar coloque o comando: "javascript:mudaTamanho('tag_ou_id_alvo', -1);" para diminuir
// e o comando "javascript:mudaTamanho('tag_ou_id_alvo', +1);" para aumentar
 
var tagAlvo = new Array('p'); //pega todas as tags p//
 
// Especificando os possíveis tamanhos de fontes, poderia ser: x-small, small...
var tamanhos = new Array( '9px','10px','11px','12px','13px','14px','15px' );
var tamanhoInicial = 2;
 
function mudaTamanho( idAlvo,acao ){
  if (!document.getElementById) return
  var selecionados = null,tamanho = tamanhoInicial,i,j,tagsAlvo;
  tamanho += acao;
  if ( tamanho < 0 ) tamanho = 0;
  if ( tamanho > 6 ) tamanho = 6;
  tamanhoInicial = tamanho;
  if ( !( selecionados = document.getElementById( idAlvo ) ) ) selecionados = document.getElementsByTagName( idAlvo )[ 0 ];
  
  selecionados.style.fontSize = tamanhos[ tamanho ];
  
  for ( i = 0; i < tagAlvo.length; i++ ){
    tagsAlvo = selecionados.getElementsByTagName( tagAlvo[ i ] );
    for ( j = 0; j < tagsAlvo.length; j++ ) tagsAlvo[ j ].style.fontSize = tamanhos[ tamanho ];
  }
}
// Fim do código de Aumentar/ Diminuir a letra
 
</script>

<style type="text/css">
#div_imagem_Cegonha
{
	float:right;
	background-image:url(Imagens/cegonhas.png);
	background-repeat:no-repeat;
	width:369px;
	height:173px;

}
#div_imagem_fundo
{
	background-image:url(Imagens/fundo.png);
	background-repeat:no-repeat;
	width:auto;
	height:auto;
}
#div_nome_crianca
{
	width:400px;
	height:auto;
	padding-left:40px;
	padding-top:30px;
	padding-bottom:20px;
	

	
}
	
	a{font-size:18px;
	font-family:Georgia, "Times New Roman", Times, serif;}
	h1
	{
		font-family:"Times New Roman", Times, serif;
		color:#666;
	}
</style>
-----------------------------------------------------------------------------------------------------

<a class="menos" href="javascript:mudaTamanho('texto', -1);"><img src="Imagens/diminuir.png" /></a>
<a class="mais" href="javascript:mudaTamanho('texto', 1);"><img src="Imagens/Almentar.png" /></a>
 
<div style="font-size: 11px;" id="texto"><!----- aqui é a div que faz com que almente ou diminua o texto do formulario ---------------------
<h1>
BERÇÁRIO VIRTUAL
</h1>
<p>
Conheça os bebês que chegaram em nossa Maternidade e<br /> aproveite para enviar uma mensagem de boas vindas! Basta fazer uma busca pelo nome da mamãe ou do papai, ou selecione o nome da mãe na lista para ver o bebê. Teremos prazer em entregar sua mensagem!<p>

As fotos divulgadas neste site não podem ser reproduzidas ou publicadas em qualquer meio de comunicação sem autorização prévia dos pais.</p>
</p>
<p>
Para ver o bebê, selecione o nome da mãe
</p>

</div>
<!----<div id="div_imagem_fundo">
<div id="div_imagem_Cegonha">
</div>---->
<?php
/*

 $data= date ('Y/m/j');//aqui eu pego a data do computador, a data esta envertida por causa do banco de dados......
  $data2 = '30-01-2012'
;  
  //aqui eu estou filtrando o recen nascido atraves da data do dia atual 
	$sql = " SELECT * FROM rec_nascido where data_nascimento  >= '$data2' or data_nascimento<='$data'";

	
   $sql.="order by nome";//aqui estou ordenando por nome os recem nascidos
	//echo $sql; exit;
	
	$r = mysql_query($sql, $conexao);

	if( mysql_num_rows($r) == 0 )
	{
		
		echo '<script language="javascript"> 
							alert("Não há crianças cadastradas neste dia ");
							document.location = "index.php?modulo=home";
					  </script>';
	}
	
	while( $dados = mysql_fetch_array($r) )
	{		
	
	echo '<div id="div_nome_crianca">';
		echo '<a href="index.php?modulo=bercariovirtual&cod_rec_nascido='.$dados['cod_rec_nascido'].'&acao=incluir">'.$dados['nome'].'<br />'.'</a>';
		
		echo 'Nascida em&nbsp;'.DataUSA_to_BR($dados['data_nascimento'] ).'<br />';
		echo 'Filha de &nbsp;'.$dados['nome_pai'] .'&nbsp;&nbsp;e&nbsp;&nbsp;'.$dados['nome_mae'];
       
		echo '<br /><br />';
		echo '<a href="index.php?modulo=bercariovirtual&cod_rec_nascido='.$dados['cod_rec_nascido'].'&acao=incluir">Detalhes </a>';
		echo '</div>';



	} // while produtos
?>	*/

