<script language="javascript">
	   	c=0
		du="";
	   function escondediv(dv,n){		
		    
		   for(i=1;i<=n;i++){			
			   if(i==dv ){
				   if(du!=dv){
				      document.getElementById('mdiv'+i).style.display="inline"
					   du=dv
					}else{
					   du=""
					   document.getElementById('mdiv'+i).style.display="none"
					}
			   }else{
				     document.getElementById('mdiv'+i).style.display="none"				  					
			   }				
				
			}		
		}
		
	function reveza(qq)
	{
	  document.getElementById(qq).className="itens_menu_r"
	}
	function volta(qq)
	{
	  document.getElementById(qq).className="itens_menu"
	}
	</script>
	    
<div id="menuTudo">
<div id="menuimagem"></div>

<script>
//Coloque aqui o número de itens de menu
n_divs='4'
</script>

<div class="titulo_menu"><a href="index.php?modulo=home" class="link_menu" title="Home Page" style="color:#000">Home</a></div>

<div class="titulo_menu"><a href="../adm/index.php" class="link_menu" title="Area Restrita" style="color:#000">&Aacute;rea Restrita</a></div>

<div class="titulo_menu"><a href="javascript:void(escondediv('1',n_divs))" class="link_menu" title="Institucional" style="color:#000">Institucional</a></div>
<div id="mdiv1"  style="display:none;">
   <table border="0">
	   <tr><td class="itens_menu"><a href="index.php?modulo=historia" class="link_smenu" title="Historia" style="color:#000">Historia </a></td></tr>
		<tr><td class="itens_menu"><a href="index.php?modulo=provedores" class="link_smenu" title="Provedoria" style="color:#000">Provedores</a></td></tr>
		<tr><td class="itens_menu"><a href="index.php?modulo=diretoria" class="link_smenu" title="Diretoria" style="color:#000">Diretoria</a></td></tr>
   		<tr><td class="itens_menu"><a href="index.php?modulo=missaovisaovalores" class="link_smenu" title="Miss&atilde;o&nbsp;/&nbsp;Vis&atilde;o&nbsp;/&nbsp;Valores" style="color:#000">Miss&atilde;o&nbsp;/&nbsp;Vis&atilde;o&nbsp;/&nbsp;Valores</a></td></tr>
	</table>
</div>

<div class="titulo_menu">
<a href="index.php?modulo=corpoclinico" title="Corpo Clinico" style="color:#000">Corpo Clinico</a>
</div>

<div class="titulo_menu">
<a href="index.php?modulo=colaboradores" title="Colaboradores" style="color:#000">Colaboradores</a>
</div>

<div class="titulo_menu">
<a href="index.php?modulo=bancosangue" title="Banco de Sangue" style="color:#000">Banco de Sangue</a>
</div>

<!--<div class="titulo_menu">
<a href="index.php?modulo=ftp" title"Banco de Sangue" style="color:#000">FTP</a>
</div>-->


<div class="titulo_menu"><a href="javascript:void(escondediv('2',n_divs))" class="link_menu" title="Humaniza&ccedil;&atilde;o" style="color:#000">Humaniza&ccedil;&atilde;o</a></div>
<div id="mdiv2"  style="display:none;">
   <table border="0">
   
   <?php
		$sql = "select * from noticia where cod_setor = 68 ";
		
	$r = mysql_query($sql, $conexao);

 	if( mysql_num_rows($r) == 0 )
	{
		echo' <tr><td class="itens_menu"><a href="index.php?modulo=historia" class="link_smenu" title="Historia">N&atilde;o há novos registros ...  </a></td></tr>';

	}
	
	
	while( $dados = mysql_fetch_array($r) )
	{
		echo' <tr><td class="itens_menu"><a href = "index.php?modulo=noticia&acao=setor&cod_noticia='.$dados['cod_noticia'].'&cod_setor='.$dados['cod_setor'].'" class="link_smenu" title="'.$dados['titulo'].'" >'.$dados['titulo'] .'</a>'.'</td>'.'</tr>';
		
	} // while produtos
	



?>
	</table>
</div>



<!--<div class="titulo_menu"><a href="javascript:void(escondediv('3',n_divs))" class="link_menu" title="Maternidade">Maternidade</a></div>
<div id="mdiv3"  style="display:none;">
   <table border="0">
	   <tr><td class="itens_menu"><a href="index.php?modulo=lisGaleria_bercario" class="link_smenu" title="Ber&ccedil;ario Virtual">Ber&ccedil;&aacute;rio Virtual</a></td></tr>
	</table>
</div>-->

<div class="titulo_menu">
<a href="index.php?modulo=noticias" class="link_menu" title="Noticias" style="color:#000">Not&iacute;cias</a></div>


<div class="titulo_menu"><a href="javascript:void(escondediv('3',n_divs))" class="link_menu" title="Informa&ccedil;&otilde;es" style="color:#000">Informa&ccedil;&otilde;es </a></div>
<div id="mdiv3"  style="display:none;">
   <table border="0">
	   <tr><td class="itens_menu"><a href="index.php?modulo=Horario_visitas" class="link_smenu" title="Horario de Visitas" style="color:#000">Hor&aacute;rio de Visitas</a></td></tr>
		<tr><td class="itens_menu"><a href="index.php" class="link_smenu" title="Convenios Credenciados" style="color:#000">Conv&ecirc;nios Credenciados</a></td></tr>
	</table>
</div>



<div class="titulo_menu">
<a href="http://mail.google.com/a/santacasadeadamantina.com.br" title="Webmail" style="color:#000">Webmail</a>
</div>

<!--'5',n_divs-->
<div class="titulo_menu"><a href="javascript:void(escondediv('4',n_divs))" class="link_menu" title="Fale conosco" style="color:#000">Fale Conosco </a></div>
<div id="mdiv4"  style="display:none;">
   <table border="0">
	   <tr><td class="itens_menu"><a href="index.php?modulo=sugestoes_reclamacoes&acao=incluir" class="link_smenu" title="Sugest&atilde;o &nbsp;/&nbsp;Reclama&ccedil;&otilde;es" style="color:#000">Sugest&otilde;es&nbsp;/&nbsp;Reclama&ccedil;&otilde;es</a></td></tr>
		<tr><td class="itens_menu"><a href="index.php?modulo=trabalheconosco" class="link_smenu" title="Trabalhe com Nosco" style="color:#000">Trabalhe Conosco</a></td></tr>
		<tr><td class="itens_menu"><a href="index.php?modulo=prestacaoServico" class="link_smenu" title="Presta&ccedil;&atilde;o de Servi&ccedil;os" style="color:#000">Presta&ccedil;&atilde;o de Servi&ccedil;os</a></td></tr>
	
    </table>
    
</div>
<!----------------------------------------------------------------------->
<!--<div class="titulo_menu">
<a href="index.php?modulo=CadastrarCurriculum" title="Envie seu Curriculum">Envie seu Curriculum</a>
</div>-->
<img src="Imagens/Rodape_menu.png" />
</div>