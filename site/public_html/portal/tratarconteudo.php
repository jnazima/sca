<?php

	if( isset($_GET['modulo']) )
		{
			$arquivo = $_GET['modulo'] . '.php';
			
			if( file_exists($arquivo) )
			{
				include_once($arquivo);
			}
			else
			{
				include_once("menu.php");
			}
		} 
		else
		{
			include_once("home.php");
		}
	
	 
?>