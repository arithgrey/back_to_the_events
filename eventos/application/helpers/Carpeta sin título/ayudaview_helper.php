<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/
function getperfil( $perfil ){

		$idperfilactual  = 0; 
		/*Inicia el ciclo */
			foreach ($perfil as $row) {				
				$idperfilactual = $row["idperfil"];
			}
		/*Termina ciclo*/
		return $idperfilactual;
}

/****************************************************************************************************/	
function displayviewpresentacion( $perfil ){

		$idperfilactual =  getperfil( $perfil );
		
		$view = "";
		switch ($idperfilactual) {
			case 3:

				$view ="principal/bienvenidauserprincipal";		
				break;
			case 4:
				$view ="principal/bienvenidaAdmincuentaempresarial";	
				break;	

			case 5:
				$view ="principal/bienvenidaestratega";	
					break;	
			case 6:
				$view ="principal/bienvenidaoperativo";	
				break;	
					
			default:
				$view ="principal/pagenoencontrada";
				break;
		}

		return $view;

	}
}/*Termina el helper*/