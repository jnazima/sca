// JavaScript Document
//----------------------------------------------------------------------------------------------------------------------
// JavaScript Document
//----------------------------------------------------------------------------------------------------------------------


//<![CDATA[
var Rollar = "sim";
var tipo = "top";
var roll = 0;
var tmp = 50;

function Duplicar(){
        var Marquee = document.getElementById("Marquee");
        Cont = Marquee.innerHTML;
        if (tipo=="left" || tipo=="right"){
                IDA = "<div style=\"float:left; position:relative;margin-left:-"+Marquee.clientWidth+";width:"+Marquee.clientWidth+"; height:"+Marquee.clientHeight+";\">"+Cont+"</div>";
                IDB = "<div style=\"float:right; position:relative;margin-right:-"+Marquee.clientWidth+";width:"+Marquee.clientWidth+"; height:"+Marquee.clientHeight+";\">"+Cont+"</div>";
                IDC = IDA + IDB + Cont;
        }
        if(tipo=="top" || tipo=="down"){
                IDA = "<div style=\"float:left; position:relative;margin-top:-"+Marquee.clientHeight+";width:"+Marquee.clientWidth+"; height:"+Marquee.clientHeight+";\">"+Cont+"</div>";
                IDB = "<div style=\"float:left; position:relative;margin-bottom:-"+Marquee.clientHeight+";width:"+Marquee.clientWidth+"; height:"+Marquee.clientHeight+";\">"+Cont+"</div>";
                IDC = IDA + Cont + IDB;
        }
        Marquee.innerHTML = IDC;
}
function Fmarquee(){
        var Marquee = document.getElementById("Marquee");
        var Caixa = document.getElementById("caixa");

if(tipo=="left" || tipo=="right"){
        var Altura = Caixa.clientWidth;
}else if(tipo=="down" || tipo=="top"){
        var Altura = Caixa.clientHeight;
}

        roll++;

        if(Altura==roll){
                roll = (roll*-1);
        }

        if(tipo == "top"){
                Marquee.style.marginTop = (roll*-1)+"px";
        } else if (tipo == "down"){
                Marquee.style.marginTop = roll+"px";
        } else if (tipo == "left"){
                Marquee.style.marginLeft = (roll*-1)+"px";
        } else if (tipo == "right"){
                Marquee.style.marginLeft = roll+"px";
        }

        if(Rollar == "sim"){
           setTimeout("Fmarquee()",tmp);
        }
}
function playM(){
        Rollar = "sim";
        Fmarquee();
}

function stopM(){
        Rollar = "nao";
}

window.onload = function(){
        Rollar = "sim";
        Fmarquee();
        Duplicar();
}
//]]>
//----------------------------------------------------------------------------------------------------------------------
Number.prototype.format = function(c, d, t){ //Serve para formatar um number em formato dinheiro
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t,
i = parseInt(n = (+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
return (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t)
+ (c ? d + (n - i).toFixed(c).slice(2) : "");
};

//----------------------------------------------------------------------------------------------------------------------


var reDigits = /^\d+$/;

//----------------------------------------------------------------------------------------------------------------------
// verifica se � um n�mero inteiro
function numInteiro(pStr)
{
	if (reDigits.test(pStr)) 
	{
		return true;
	} 
	else 
	if (pStr != null && pStr != "") 
	{
		return false;
	}
} // numInteiro

//----------------------------------------------------------------------------------------------------------------------
// verifica se � um n�mero real

var reDecimalPt = /^[+-]?((\d+|\d{1,3}(\.\d{3})+)(\,\d*)?|\,\d+)$/;
var reDecimalEn = /^[+-]?((\d+|\d{1,3}(\,\d{3})+)(\.\d*)?|\.\d+)$/;
var reDecimal = reDecimalPt;

function numReal(pStr)
{
	charDec = ",";
	if (reDecimal.test(pStr)) 
	{
		pos = pStr.indexOf(charDec);
		decs = pos == -1? 0: pStr.length - pos - 1;
		return true;
	} 
	else
	if (pStr != null && pStr != "") 
	{
		return false;
	}
} // numReal



//----------------------------------------------------------------------------------------------------------------------
function validaCPF(cpf) 
{
		erro = new String;
		if (cpf.length < 11) erro += "Sao necessarios 11 digitos para verificacao do CPF! \n\n"; 
		var nonNumbers = /\D/;
		if (nonNumbers.test(cpf)) erro += "A verificacao de CPF suporta apenas numeros! \n\n";	
		if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
			  erro += "Numero de CPF invalido!"
		}
		var a = [];
		var b = new Number;
		var c = 11;
		for (i=0; i<11; i++){
			a[i] = cpf.charAt(i);
			if (i <  9) b += (a[i] *  --c);
		}
		if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
		b = 0;
		c = 11;
		for (y=0; y<10; y++) b += (a[y] *  c--); 
		if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
		status = a[9] + ""+ a[10]
		if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])){
			erro +="Digito verificador com problema!";
		}
		if (erro.length > 0){
			//alert(erro);
			return false;
		}
		return true;
}

//---------------------------------------------------------------------------------------------------
function validaCNPJ(cnpj)
{
      var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
      digitos_iguais = 1;
      if (cnpj.length < 14 && cnpj.length < 15)
            return false;
      for (i = 0; i < cnpj.length - 1; i++)
            if (cnpj.charAt(i) != cnpj.charAt(i + 1))
                  {
                  digitos_iguais = 0;
                  break;
                  }
      if (!digitos_iguais)
            {
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0,tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--)
                  {
                  soma += numeros.charAt(tamanho - i) * pos--;
                  if (pos < 2)
                        pos = 9;
                  }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0))
                  return false;
            tamanho = tamanho + 1;
            numeros = cnpj.substring(0,tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--)
                  {
                  soma += numeros.charAt(tamanho - i) * pos--;
                  if (pos < 2)
                        pos = 9;
                  }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1))
                  return false;
            return true;
            }
      else
            return false;
}// validaCNPJ

//---------------------------------------------------------------------------------------------------
function verificaData(Data)
 {
  Data = Data.substring(0,10);
  
  //alert(Data);
  
  var dma = -1;
  var data = Array(3);
  var ch = Data.charAt(0); 
  for(i=0; i < Data.length && (( ch >= '0' && ch <= '9' ) || ( ch == '/' && i != 0 ) ); ){
   data[++dma] = '';
   if(ch!='/' && i != 0) return false;
   if(i != 0 ) ch = Data.charAt(++i);
   if(ch=='0') ch = Data.charAt(++i);
   while( ch >= '0' && ch <= '9' ){
    data[dma] += ch;
    ch = Data.charAt(++i);
   } 
  }
  if(ch!='') return false;
  if(data[0] == '' || isNaN(data[0]) || parseInt(data[0]) < 1) return false;
  if(data[1] == '' || isNaN(data[1]) || parseInt(data[1]) < 1 || parseInt(data[1]) > 12) return false;
  if(data[2] == '' || isNaN(data[2]) || ((parseInt(data[2]) < 0 || parseInt(data[2]) > 99 ) && (parseInt(data[2]) < 1900 || parseInt(data[2]) > 9999))) return false;
  if(data[2] < 50) data[2] = parseInt(data[2]) + 2000;
  else if(data[2] < 100) data[2] = parseInt(data[2]) + 1900;
  switch(parseInt(data[1])){
   case 2: { if(((parseInt(data[2])%4!=0 || (parseInt(data[2])%100==0 && parseInt(data[2])%400!=0)) && parseInt(data[0]) > 28) || parseInt(data[0]) > 29 ) return false; break; }
   case 4: case 6: case 9: case 11: { if(parseInt(data[0]) > 30) return false; break;}
   default: { if(parseInt(data[0]) > 31) return false;}
  }
  return true; 
  
} // verificaData


//--------------------------------------------------------------------------------------------------------------
// exemplo de utiliza��o: onkeyup="maskIt(this,event,'##/##/#####')"
function maskIt(w,e,m,r,a){

    // Cancela se o evento for Backspace
    if (!e) var e = window.event
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;

    // Vari�veis da fun��o
    var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
    var mask = (!r) ? m : m.reverse();
    var pre  = (a ) ? a.pre : "";
    var pos  = (a ) ? a.pos : "";
    var ret  = "";

    if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;

    // Loop na m�scara para aplicar os caracteres
    for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
        if(mask.charAt(x)!='#'){
            ret += mask.charAt(x); x++;
        } else{
            ret += txt.charAt(y); y++; x++;
        }
    }

    // Retorno da fun��o
    ret = (!r) ? ret : ret.reverse()
    w.value = pre+ret+pos;
}
//--------------------------------------------------------------------------------------------------------------

// Novo m�todo para o objeto 'String'
String.prototype.reverse = function(){
    return this.split('').reverse().join('');
};



//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
function abrir_url(url)
{
	var largura = screen.width/1.2;
	var altura = screen.height/1.5;

	//top = screen.height/2 - altura/2;
	var top = 70;
	var left = screen.width/2 - largura/2;
	
	window.open(url,'Window','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height='+altura+',width='+largura+',top='+top+',left='+left+'');		
	
	
	//window.open(url,'Window','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height=400,width=400,top=0,left=0');	
} // abrir_url

//--------------------------------------------------------------------------------------------------------------
function abrir_url_nome(url, nome)
{
	if( true )
	{
		/**/
		var largura = screen.width/1.2;
		var altura = screen.height/1.2;
	
		//top = screen.height/2 - altura/2;
		var top = 70;
		var left = screen.width/2 - largura/2;
		/**/
	}
	else
	{
		var largura = 700;
		var altura = 400;
	
		//top = screen.height/2 - altura/2;
		var top = 70;
		var left = 70;
	}	
	
	window.open(url,nome,'status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height='+altura+',width='+largura+',top='+top+',left='+left+'');		
	
	
	//window.open(url,'Window','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height=400,width=400,top=0,left=0');	
} // abrir_url_nome

//--------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------

function abrir_url_novo(url, tamanho)
{
	if( true )
	{
		/**/
		var largura = screen.width/tamanho;
		var altura = screen.height/tamanho;
	
		//top = screen.height/2 - altura/2;
		var top = 70;
		var left = screen.width/2 - largura/2;
		/**/
	}
	else
	{
		var largura = 700;
		var altura = 400;
	
		//top = screen.height/2 - altura/2;
		var top = 70;
		var left = 70;
	}	
	
	window.open(url,'Window','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height='+altura+',width='+largura+',top='+top+',left='+left+'');		
	
	
	//window.open(url,'Window','status=yes,toolbar=no,location=no,menubar=no,scrollbars=yes,height=400,width=400,top=0,left=0');	
} // abrir_url_novo com tamanhos
				   


//--------------------------------------------------------------------------------------------------------------

/**
 *
 * function currencyFormat(fld, milSep, decSep, e)
 *
 * fld    = Objeto a ser verficado.
 * milSep = Separador para milhar.
 * decSep = Separador para decimal.
 * e      = Evento.
 *
 * Formata um valor decimal conforme for digitado no box.
 * Cria��o: Anonima (coletada em http://http://www.scriptbrasil.com/?class=2&secao=javascript&categoria=Formul�rios&menu=javascript&ini=1
 * Revisao: pedro.leao@ig.com.br	2003/08/16
 */
 /* exemplo:  onKeyPress="return(currencyFormat(this,'',',',event))" */
function currencyFormat(fld, milSep, decSep, e) {

/*
if(window.event) { // Internet Explorer
         var tecla = teclapres.keyCode; }
        else if(teclapres.which) { // Nestcape / firefox
         var tecla = teclapres.which;
        }	
*/		
	
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	
	//var whichCode = (window.Event) ? e.which : e.keyCode;
	
	if(window.event)  // Internet Explorer
	{ 
         var whichCode = e.keyCode; 
	}
    else if(e.which)  // Nestcape / firefox
	{ 
         var whichCode = e.which;
    }	
	else 
	{ return true; }
	
	

	//alert(whichCode);
	if(whichCode == 0 || whichCode == 9 || whichCode== 8 ) return true;

	if (whichCode == 13) {
		return true;  // Enter
	}
	key = String.fromCharCode(whichCode);  // Get key value from key code
	if (strCheck.indexOf(key) == -1) {
		return false;  // Not a valid key
	}
	len = fld.value.length;
	for(i = 0; i < len; i++) {
		if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)){
			 break;
		}
	}
	
	
	
	
	aux = '';
	for(; i < len; i++) {
		if (strCheck.indexOf(fld.value.charAt(i))!=-1){
			aux += fld.value.charAt(i);
		}
	}
	aux += key;
			
	len = aux.length;
	if (len == 0) {
		fld.value = '';
	} else if (len == 1) {
		fld.value = '0'+ decSep + '0' + aux;
	} else if (len == 2) {
		fld.value = '0'+ decSep + aux;
	} else if (len > 2) {
		aux2 = '';

		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) {
				aux2 += milSep;
				j = 0;
			}
			aux2 += aux.charAt(i);
			j++;
		}
		fld.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--) {
			fld.value += aux2.charAt(i);
		}
		
		fld.value += decSep + aux.substr(len - 2, len);
	}
	return false;
	
} // currencyFormat

//-- VALIDA��O DO CPF E CNPJ------------------------------------------------------------------------------------------------------------

function isEmpty(pStrText){
	var	len = pStrText.length;
	var pos;
	var vStrnewtext = "";

	for (pos=0; pos<len; pos++){
		if (pStrText.substring(pos, (pos+1)) != " "){
			vStrnewtext = vStrnewtext + pStrText.substring(pos, (pos+1));
		}
	}

	if (vStrnewtext.length > 0)
		return false;
	else
		return true;
}

// CPF:pType=1 CNPJ:pType=2

function isCPFCNPJ(campo,pType){
   if( isEmpty( campo ) ){return false;}

   var campo_filtrado = "", valor_1 = " ", valor_2 = " ", ch = "";
   var valido = false;
        
   for (i = 0; i < campo.length; i++){
      ch = campo.substring(i, i + 1);
      if (ch >= "0" && ch <= "9"){
         campo_filtrado = campo_filtrado.toString() + ch.toString()
         valor_1 = valor_2;
         valor_2 = ch;
      }
      if ((valor_1 != " ") && (!valido)) valido = !(valor_1 == valor_2);
   }
   if (!valido) campo_filtrado = "12345678912";

   if (campo_filtrado.length < 11){
      for (i = 1; i <= (11 - campo_filtrado.length); i++){campo_filtrado = "0" + campo_filtrado;}
   }

	if(pType <= 1){
		if ( ( campo_filtrado.substring(9,11) == checkCPF( campo_filtrado.substring(0,9) ) ) && ( campo_filtrado.substring(11,12)=="") ){return true;}
	}

	if((pType == 2) || (pType == 0)){
		if (campo_filtrado.length >= 14){
			if ( campo_filtrado.substring(12,14) == checkCNPJ( campo_filtrado.substring(0,12) ) ){ return true;}
		}
	}
	
	return false;
}

function checkCNPJ(vCNPJ){
   var mControle = "";
   var aTabCNPJ = new Array(5,4,3,2,9,8,7,6,5,4,3,2);
   for (i = 1 ; i <= 2 ; i++){
      mSoma = 0;
      for (j = 0 ; j < vCNPJ.length ; j++)
         mSoma = mSoma + (vCNPJ.substring(j,j+1) * aTabCNPJ[j]);
      if (i == 2 ) mSoma = mSoma + ( 2 * mDigito );
      mDigito = ( mSoma * 10 ) % 11;
      if (mDigito == 10 ) mDigito = 0;
      mControle1 = mControle ;
      mControle = mDigito;
      aTabCNPJ = new Array(6,5,4,3,2,9,8,7,6,5,4,3);
   }
   return( (mControle1 * 10) + mControle );
}

function checkCPF(vCPF){
   var mControle = ""
   var mContIni = 2, mContFim = 10, mDigito = 0;
   for (j = 1 ; j <= 2 ; j++){
      mSoma = 0;
      for (i = mContIni ; i <= mContFim ; i++)
         mSoma = mSoma + (vCPF.substring((i-j-1),(i-j)) * (mContFim + 1 + j - i));
      if (j == 2 ) mSoma = mSoma + ( 2 * mDigito );
      mDigito = ( mSoma * 10 ) % 11;
      if (mDigito == 10) mDigito = 0;
      mControle1 = mControle;
      mControle = mDigito;
      mContIni = 3;
      mContFim = 11;
   }
   return( (mControle1 * 10) + mControle );
}

//-----------------------------------------------------------------------------------------------------------------------
function executar_script_ajax(modulo, parametros)
{
	if( window. ActiveXObject ) // IE
	{
		req789 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else 
	if( window.XMLHttpRequest) // n�o IE
	{
		req789 = new XMLHttpRequest();
	}
	else return;

	
	// preenchendo as series ----------------------------------------------------------
	req789.onreadystatechange=function()
	{
		if( req789.readyState == 4 )
		{
			//var termos = document.getElementById("termos");
			//divserie.innerHTML = req789.responseText;
		}	
	}
	
	req789.open("POST",modulo, true);
	req789.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req789.send(parametros);	
	
} // executar script


//--------------------------------------------------------------------------------------------------------------
function isnull(a, b)
{
	if( a == null || a == '') 
	{ return b; }
	else
	{ return a; }
	
} // isnull

//--------------------------------------------------------------------------------------------------------------
// Valida��o simples de email 

function ValidaEmail_simples(txt)
{
  if ((txt.length == 0)) { return false; }

  if ( ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 1)) )
  {
      return false;
  }
  else
  {
	  return true;
  }
  
} // ValidaEmail

//--------------------------------------------------------------------------------------------------------------
// Validando o Email por express�es regulares

// Formato Livre
var reEmail1 = /^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;

// Formato Compacto
var reEmail2 = /^[\w-]+(\.[\w-]+)*@(([\w-]{2,63}\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;

// Formato Restrito
var reEmail3 = /^[\w-]+(\.[\w-]+)*@(([A-Za-z\d][A-Za-z\d-]{0,61}[A-Za-z\d]\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;

var reEmail = reEmail3;

function ValidaEmail(pStr)
{
	pFmt = 1; // formato livre	
	eval("reEmail = reEmail" + pFmt);
	if (reEmail.test(pStr)) 
	{
		return true;
	} 
	else 
	{
		return false;
	}
	
} // doEmail


//--------------------------------------------------------------------------------------------------------------

function datacomp(data1, data2)
{
	var intData1 = parseInt( data1.split( "/" )[2].toString() + data1.split( "/" )[1].toString() + data1.split( "/" )[0].toString() );
	var intData2 = parseInt( data2.split( "/" )[2].toString() + data2.split( "/" )[1].toString() + data2.split( "/" )[0].toString() );
	
	/*
	alert(data1 + ' - ' + data2);
	alert(intData1);
	alert(intData2);
	*/
	
	
	
	
	if ( intData1 < intData2 )
	{
	  return 1;
	}
	else
	if( intData1 == intData2 )
	{
	  return 0
	}	
	else
	{
		return -1;	
	}
	
}

//--------------------------------------------------------------------------------

function somente_numeros(e)
{
	var tecla =(window.event)?event.keyCode:e.which;
	if((tecla>47 && tecla<58) )
	{
		return true;
	}
	else
	{
		if(tecla==8||tecla ==0)
		{
			return true;
		}
			else
			{
				return false;
			}
	}
	
	
	
	
}


//--------------------------------------------------------------------------------------------------------------
function busca_cidade()
{
	var div = document.getElementById('divCidade');	
	 
	div.innerHTML = '<center><img src="../adm/Imagens/ajax-loader.gif" /></center>'
	
	if( window.ActiveXObject ) // IE
	{
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else 
	if( window.XMLHttpRequest) // n�o IE
	{
		req = new XMLHttpRequest();
	}
	else return;
	
	req.onreadystatechange=function()
	{
		if( req.readyState == 4 )
		{
			div.innerHTML = req.responseText;			

		} // se req.readystate == 4			
		
	} // req.onreadystatechange=function()....
	
	req.open("POST",'busca_cidade.php', true);
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send('cod_estado=' + document.formcad.cod_estado.value);	
	
} // buscaModelos()

//--------------------------------------------------------------------------------------------------------------
function busca_especialidade()
{
	var div = document.getElementById('div_especialidade');	
	 
	div.innerHTML = '<center><img src="../adm/Imagens/aguarde.gif" /></center>'
	
	if( window.ActiveXObject ) // IE
	{
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else 
	if( window.XMLHttpRequest) // n�o IE
	{
		req = new XMLHttpRequest();
	}
	else return;
	
	req.onreadystatechange=function()
	{
		if( req.readyState == 4 )
		{
			div.innerHTML = req.responseText;			

		} // se req.readystate == 4			
		
	} // req.onreadystatechange=function()....
	
	req.open("POST",'busca_especialidade.php', true);
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send('cod_especialidade=' + document.busca.cod_especialidade.value);	
	
} // buscaModelos()

//--------------------------------------------------------------------------------------------------------------
function busca_cidade_table()
{
	var div = document.getElementById('div_cidade_table');	
	 
	div.innerHTML = '<center><img src="../adm/Imagens/ajax-loader.gif" /></center>'
	
	if( window.ActiveXObject ) // IE
	{
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else 
	if( window.XMLHttpRequest) // n�o IE
	{
		req = new XMLHttpRequest();
	}
	else return;
	
	req.onreadystatechange=function()
	{
		if( req.readyState == 4 )
		{
			div.innerHTML = req.responseText;			

		} // se req.readystate == 4			
		
	} // req.onreadystatechange=function()....
	
	req.open("POST",'busca_cidade_table.php', true);
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send('cod_estado=' + document.busca.cod_estado.value);	
	
} // buscaModelos()

///--------------------------------------------------------------------------------------------------------------
function buscarsetor()
{
	var div = document.getElementById('div_setor');	
	 
	div.innerHTML = '<center><img src="../adm/Imagens/ajax-loader.gif" /></center>'
	
	if( window.ActiveXObject ) // IE
	{
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else 
	if( window.XMLHttpRequest) // n�o IE
	{
		req = new XMLHttpRequest();
	}
	else return;
	
	req.onreadystatechange=function()
	{
		if( req.readyState == 4 )
		{
			div.innerHTML = req.responseText;			

		} // se req.readystate == 4			
		
	} // req.onreadystatechange=function()....
	
	req.open("POST",'busca_setor.php', true);
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send('cod_setor=' + document.busca.cod_setor.value);	
	
} // buscaModelos()

//--------------------------------------------------------------------------------------------------------------
function busca_ramal()
{
	var div = document.getElementById('div_ramal');	
	 
	div.innerHTML = '<center><img src="../adm/Imagens/ajax-loader.gif" /></center>'
	
	if( window.ActiveXObject ) // IE
	{
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else 
	if( window.XMLHttpRequest) // n�o IE
	{
		req = new XMLHttpRequest();
	}
	else return;
	
	req.onreadystatechange=function()
	{
		if( req.readyState == 4 )
		{
			div.innerHTML = req.responseText;			

		} // se req.readystate == 4			
		
	} // req.onreadystatechange=function()....
	
	req.open("POST",'busca_tipo_ramal.php', true);
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send('tipo_de_ramal=' + document.busca.tipo_de_ramal.value);	
	
} // buscaModelos()
//--------------------------------------------------------------------------------------------------------------------------------------------
function busca_assunto()
{
	var div = document.getElementById('div_assunto');	
	 
	div.innerHTML = '<center><img src="../adm/Imagens/ajax-loader.gif" /></center>'
	
	if( window.ActiveXObject ) // IE
	{
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else 
	if( window.XMLHttpRequest) // n�o IE
	{
		req = new XMLHttpRequest();
	}
	else return;
	
	req.onreadystatechange=function()
	{
		if( req.readyState == 4 )
		{
			div.innerHTML = req.responseText;			

		} // se req.readystate == 4			
		
	} // req.onreadystatechange=function()....
	
	req.open("POST",'busca_assunto_reclamacao.php', true);
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.send('cod_assunto=' + document.busca.cod_assunto.value);	
	
} // buscaModelos()
<!-------------------------------------------------------------------------->
