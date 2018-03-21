<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
	require "iRecord.php";	
	require "../models/tmpmodel.php";
	class Principal implements iRecord{
		/**/
		function registra_pagina_acceso($pagina , $dispositivo , $ip  ){

			return $pagina;
		}
		

	}
?>