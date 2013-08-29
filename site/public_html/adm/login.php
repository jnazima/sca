<style type="text/css">
#div_login_tudo
{
	float:left;
	width:350px;
	height:150px;
	margin: 0 auto;
	padding-top:50px;
	padding-bottom:50px;
}
#div_login_conteudo
{
	width:300px;
background:#f3f3f3;
 color:#000;
  border: #fff 10px solid;
   border-top-color:#dedede;
    border-left-color:#dedede;
	padding: 10px;
	 border-top-left-radius: 20px;
	  -moz-border-radius-topleft: 20px;
	   -webkit-border-top-left-radius: 20px;
	    border-radius-bottomright: 20px;
		border-bottom-right-radius: 20px;
		 -moz-border-radius-bottomright: 20px;
		  -webkit-border-bottom-right-radius: 20px;
		  text-align:center;
}
table,tr,td
{
	font-size:12px;
	line-height:130%;
}

</style>
<div id="div_login_tudo">
<div id="div_login_conteudo">

<table border="0" cellpadding="3" cellspacing="0" width="244" align="center" >
<form name="formlogin" id="formlogin" method="post" action="autenticar.php">
<tr><td width="47" align="right">
Usuario</td><td width="149">
<input type="text" name="login" id="login" value="" maxlength="20" />
</td>
</tr>

<tr><td align="right">
Senha</td><td>

<input type="password" name="senha" id="senha" value=""  maxlength="8" />
</td></tr>


<tr><td height="32" colspan="2" align="center">
<input type="submit" value="Acessar" name="btnacessar" />

</td></tr>
</form>
</table>

<?php

	if( isset($_GET['msg']) )
	{
		echo '<div style="font-weight:bold; color:#ff0000;">'.$_GET['msg'].'</div>';
	}

?>
</div>
</div>

<script language="javascript">
	document.formlogin.login.focus();
</script>