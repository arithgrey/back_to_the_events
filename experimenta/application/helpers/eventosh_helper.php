<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	/**/
	function get_titulo_evento($data , $in_session ){			
		$fecha  =  fechas_enid_format( $data["fecha_inicio"] , $data["fecha_termino"]);				
		$titulo =  titulo_enid($data["nombre_evento"] ."|" .$fecha ."|<span class='place_nombre_empresa'></span>      "   ) ."<br>";
		return  $titulo;	
	}	
	/**/
	function get_titulo_accesos($data , $in_session ){	
		$url =  url_accesos_configuracion_avanzada($data["idevento"]);
		$btn_config =  template_editar( $in_session,  $url);  
		$titulo = "<span class='pull-right'>" . $btn_config  ."</span>" . titulo_enid("Precios|evento|" . $data["nombre_evento"]) ."<br>";
		return  $titulo;	
	}
	/**/
	function get_titulo_artistas($data , $in_session ){	

		$url =  url_evento_view_config($data["idevento"]);
		$btn_config =  template_editar( $in_session,  $url);  
		$titulo = "<span class='pull-right'>" . $btn_config  ."</span>" . titulo_enid("Line up(artistas)|evento|" . $data["nombre_evento"]) ."<br>";
		return  $titulo;	
	}
	/**/

	function get_titulo_servicios($data , $in_session ){	

		$url =  url_evento_view_config($data["idevento"]);
		$btn_config =  template_editar( $in_session,  $url);  
		$titulo = "<span class='pull-right'>" . $btn_config  ."</span>" . titulo_enid("Servicios|evento|" . $data["nombre_evento"]) ."<br>";
		return  $titulo;	
	}
	/**/
	function get_titulo_reglamento($data , $in_session ){	

		$url =  url_evento_view_config($data["idevento"]);
		$btn_config =  template_editar( $in_session,  $url);  
		$titulo = "<span class='pull-right'>" . $btn_config  ."</span>" . titulo_enid("Reglamento|evento|" . $data["nombre_evento"]) ."<br>";
		return  $titulo;	
	}
	/**/
	function get_titulo_politicas($data , $in_session ){	

		$url =  url_evento_view_config($data["idevento"]);
		$btn_config =  template_editar( $in_session,  $url);  
		$titulo = "<span class='pull-right'>" . $btn_config  ."</span>" . titulo_enid("Políticas|evento|" . $data["nombre_evento"]) ."<br>";
		return  $titulo;	
	}
	/**/
	function get_titulo_permitido($data , $in_session ){	

		$url =  url_evento_view_config($data["idevento"]);
		$btn_config =  template_editar( $in_session,  $url);  
		$titulo = "<span class='pull-right'>" . $btn_config  ."</span>" . titulo_enid("Objetos permitidos|evento|" . $data["nombre_evento"]) ."<br>";
		return  $titulo;	
	}
	
	/**/
	function get_info_restricciones($data , $in_session){
		
		if( strlen(trim($data["restricciones"])) > 0  ){
			return "<div class='well seccion_info_restricciones'> 
						

						" . $data["restricciones"] ."
					</div>";
		}
		/**/
	}
	/**/
	function get_info_politicas($data , $in_session){
		
		if( strlen(trim($data["politicas"])) > 0  ){
			return "<div class='well seccion_info_politicas'> 						
						" . $data["politicas"] ."
					</div>";
		}
		/**/
	}
	/**/
	function get_info_permitido($data , $in_session){
		
		if( strlen(trim($data["permitido"])) > 0  ){
			return "<div class='well seccion_info_permitido'> 						
						" . $data["permitido"] ."
					</div>";
		}
		/**/
	}


}/*Termina el helper*/