<?php

	$semana[2]='Segunda-Feira';
	$semana[3]='Terça-Feira';
	$semana[4]='Quarta-Feira';
	$semana[5]='Quinta-Feira';
	$semana[6]='Sexta-Feira';
	$semana[7]='S&aacute;bado';
	$semana[1]='Domningo';
	
	$mes[1] = 'Janeiro';
	$mes[2] = 'Fevereiro';
	$mes[3] = 'Mar&ccedil;o';
	$mes[4] = 'Abril';
	$mes[5] = 'Maio';
	$mes[6] = 'Junho';		
	$mes[7] = 'Julho';
	$mes[8] = 'Agosto';
	$mes[9] = 'Setembro';
	$mes[10] = 'Outubro';
	$mes[11] = 'Novembro';
	$mes[12] = 'Dezembro';

//-----------------------------------------------------------
function retorna_data()
{
	global $mes, $semana;
	
	$data = date('d/m/Y');
	$s = 'Hoje &eacute; ' . $semana[date('w')+1] . ' ' . date('d') ;
	$s .= ' de ' . $mes[date('n')].  ' de ' . date('Y');
	
	return $s;

} // imprimi_data()
function mostra_data_por_extenco()
{
$meses = array(1 => "Janeiro",
2 => "Fevereiro",
3 => "Março",
4 => "Abril",
5 => "Maio",
6 => "Junho",
7 => "Julho",
8 => "Agosto",
9 => "Setembro",
10 => "Outubro",
11 => "Novembro",
12 => "Dezembro");
$hoje = getdate();
$dia = $hoje["mday"];
$mes = $hoje["mon"];
$nomeMes = $meses[$mes];
$ano = $hoje["year"];

echo " Hoje é dia $dia de $nomeMes de $ano.";
}
//para utilizar basta, chamar a função com o numero de parcelas 
 function calculoData($_parcelas)
 {
    // o prazo começa com 0
    $_prazo = 0;
    
    // pegamos o dia atual
    $_dia   = date('d');
    $_mes = date('m');
    $_ano  = date('Y');

    // calcula-se o vencimento de acordo com n° de parcelas
    for($i=0;$i < $_parcelas;$i++)
    {
       $_ts = mktime(0,0,0,$_mes,$_dia + $_prazo,$_ano);
       $_data = date('d/m/Y',$_ts);

       echo $i+1  ."°  vencimento no dia: ".  $_data  ."<br>";
    
        //supondo que o vencimento é de 30 em 30 dias  
        $_prazo += 30;
    }
    
 }

 
 
//------------ FUNCAO DE SAUDACAO ----------------------------------------
function saudacao()
{
$nome_usuario = $_SESSION['usuario_nome_completo'];

$hora = date("H");

if ($hora >= 0 && $hora < 6) {

echo "<b>Boa Noite,</b>";

} elseif ($hora >= 6 && $hora < 12){

echo "<b>Boa Dia,</b>";

} elseif ($hora >= 12 && $hora < 18) {

echo "<b>Boa Tarde,</b>  ";

}else {

echo "<b>Boa Noite,</b>";

}
}
//-----------------------------------------------------------
function imprimi_data()
{

	echo retorna_data();

} // imprimi_data()

//------------------------------------------------------------------------------
function tiracento($texto){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',);
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y',);
	$titletext = str_replace($trocarIsso, $porIsso, $texto);
	return $titletext;
}


//-----------------------------------------------------------------------------------
//--func. não retorna valores e não possui parametros ---------------------
function primeira_funcao()
{
	echo '<P><font color="blue"> <center>';
	echo 'Minha Primeira Função';
	echo '</center></font></p>';
	
} // fim da primeira_funcao()

// func. com passagem de parametro por valor e retornando um valor ----
function aoquadrado( $n )
{
	return $n * $n;
}

// func. com parametro sem retorno
// func. com passagem de parametro por valor e retornando um valor ----
function aoquadrado_sem_ret( $n )
{
	echo '<p><b>';
	echo ' O valor de ' . $n . ' ao quadrado é ' . $n * $n;
	echo '</b></p>';
}

// fazer uma função que imprima a tab. de um nº dado
function tabuada( $x )
{
	echo '<p> A tabuada do ' . $x . ' é: <p>';
	$i=1;
	while( $i <= 10 )
	{
		echo $i . ' x  ' . $x . ' = ' . $i*$x;
		echo '<br>';
		$i++;
	} // fim do while
	
} // fim da func. tab...

// função com mais de um parâmetro 
function menorvalor( $x, $y )
{
	if( $x < $y )
	{
		return "O menor valor é $x";
	}
	elseif( $y < $x )
	{
		return "O menor valor é $y";
	}
	else 
	{
		return "Os valores são iguais";
	}
}

// função com passagem de parâmetro por referência
function incrementar( &$valor, $incremento)
{
	$valor = $valor + $incremento;
}

// função com passagem de parâmetro por referência
function inc_tres( &$v1, &$v2, &$v3, $incremento)
{
	$v1 = $v1 + $incremento;
	$v2 = $v2 + $incremento;
	$v3 = $v3 + $incremento;
}

// função para retornar vários cálculos
function calculos_basicos( $a, $b)
{
	echo '<p>';
	echo "A soma de $a e $b é: " . ($a + $b) ;
	echo "<br>A subtração de $a e $b é: " . ($a - $b);
	echo "<br>A multiplicação de $a e $b é: " . ($a * $b);
	echo "<br>A divisão de $a e $b é: " . ($a / $b);
	echo "<br>O resto da divisão de $a com $b é: " . ($a % $b);
	echo '</p>';
}

//------------------------------------------------------------------------------
function conectar_bd()
{
	// fazendo a conexão com o banco de dados
$conexao = mysql_connect("localhost","scasa_ScasaAda","s09c08a09peSDasa258");
		//$conexao = mysql_connect("localhost","root","090809scasa");	
	
	if( !$conexao )
	{
		die("N&atilde;o foi poss&icirc;vel a conex&atilde;o com o Banco de Dados!!!");
	}
	
	// selecionando a base de dados
	mysql_select_db("scasa_santacasa",$conexao);
	
	return $conexao;

} // conectar_bd

//------------------------------------------------------------------------------
function DataBR_to_USA( $d )
{
	// ex: 14/04/2011
	
	return substr($d,6,4) .'/' . substr($d,3,2) .'/' . substr($d,0,2);
			
	

} // DataBR_to_USA

//------------------------------------------------------------------------------
function DataUSA_to_BR( $d )
{
	// ex: 2011/04/14
	
	return substr($d,8,2) .'/' . substr($d,5,2) .'/' . substr($d,0,4);
			
	

} // DataUSA_to_BR

function login_user()
{
	//echo  $_SESSION['usuario_nome_completo'];
}
//-----------------------------------------------------------------------
function vs($s)//excluir foto
{
	return "'" . $s . "'";
}	
//-----------------------------------------------------------------------------
function info_carrinho( $conexao)
{

	if(!isset($_SESSION['carrinho']) )
	{
		return '<a href="index.php?modulo=carrinho_listar"> 0 Itens</a>';
	}
	
	$total = 0;

	foreach($_SESSION['carrinho'] as $cp => $qde)
	{
		if( $qde > 0 )
		{
			$total++;
		}
	
	} // for carrinho...
	
	//return '<a href="index.php?modulo=carrinho_listar">Carrinho de Compras: '.$total.' Itens</a>';
	return '<a href="index.php?modulo=carrinho_listar">'.$total.'&nbsp;Itens</a>';
	
} // info_carrinho($conexao);








//=============================================================================
?>