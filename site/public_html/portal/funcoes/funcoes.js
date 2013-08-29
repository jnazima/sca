
function validaCPF(cpf) 
{
	cpf = cpf.replace('.','');
	cpf = cpf.replace('.','');
	cpf = cpf.replace('-','');
	
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
//------------------------------------------------------------------------------------------------
function maskIt(w,e,m,r,a)
{
	// Cancela se o evento for Backspace
	if (!e) var e = window.event
	if (e.keyCode) code = e.keyCode;
	else if (e.which) code = e.which;

	// Variáveis da função
	var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
	var mask = (!r) ? m : m.reverse();
	var pre  = (a ) ? a.pre : "";
	var pos  = (a ) ? a.pos : "";
	var ret  = "";

	if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;

	// Loop na máscara para aplicar os caracteres
	for(var x=0,y=0, z=mask.length;x<z && y<txt.length;)
	{
		if(mask.charAt(x)!='#')
		{
			ret += mask.charAt(x); x++;
		}
		else
		{
			ret += txt.charAt(y); y++; x++;
		}
	}

	// Retorno da função
	ret = (!r) ? ret : ret.reverse()
	w.value = pre+ret+pos;
}
//---------------------------------------------------------------------------------------------------------
function Mascara(src, mascara)
{
	var campo = src.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(campo);
	if(texto.substring(0,1) != saida)
	{
		src.value += texto.substring(0,1);
	}
}
