<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	
	/**/
	function evalua_nota_artista($part_nota , $id_artista , $nota  ){
		$d_class = ' registrado '; 
		if (strlen($nota) < 5) {
			$d_class = 'sin_registro'; 
		}

		$seccion_nota = '
			<a "'. $part_nota .'"  class="artista_nota" id="'.$id_artista.'">
				<i class="artista_nota fa fa-file-text-o  fa-2x icon_config '.$d_class.' " id="'.$id_artista.'" >
				</i>
			</a> 
			';
		return $seccion_nota; 
	}
	/**/	
	function valida_icon_sound_cloud($part_sound , $id_artista , $url  ){

		$d_class = ' registro_sound_cloud '; 
		if (strlen($url) < 5) {
			$d_class = ' sin_sound_cloud'; 
		}

		$seccion_sound = ' <i  class="artista_sound fa fa-play-circle fa-2x '.$d_class .' " id="'.$id_artista.'"   "'. $part_sound .'" >
							</i>'; 
		return $seccion_sound;
	}		
	/**/
	function valuda_icon_yt($part_youtube , $id_artista , $url_social_youtube){

		$d_class = ' registro_youtube '; 
		if (strlen($url_social_youtube) < 5) {
			$d_class = 'sin_registro_youtube'; 
		}
		$seccion_youtube = ' <i "'.$part_youtube .'"   class="artista_yt fa fa-youtube-play fa-2x icon_config '.$d_class.'  " id="'.$id_artista.'"></i>';
		return $seccion_youtube; 
	}	
	/**/
	function valida_icon_conf_horario( $part_extra , $id_artista , $class , $icon , $textr_extra , $horario){			

		$d_class = 'registrado'; 
		$text_presentacion = "";
		if ($horario == "por definir"){
			$d_class = 'sin_registro'; 
			$text_presentacion =  " Presentación -"; 
		}
		$icon = '
			<a class="text_horario_presentacion   '.$class .'   '.$d_class .' " id="'.$id_artista.'"   "'. $part_extra.'"  >
				<i class="'. $icon .' fa-2x" >
				</i>					
				'. $text_presentacion .'
				
				'. $horario .'
			</a>';
		return $icon;
	}
	/**/
	function lista_top_artistas_cliente($data){

		$top = ''; 
		$b = 10; 
		foreach ($data as $row) {
			
			$top .= '
				<div class="media margin-clear">                    
                  <div class="media-body">
                    <h6 class="media-heading">
                      <a href="shop-product.html">
                        '. $row["nombre_artista"] .'
                      </a>
                    </h6>
                    <p class="margin-clear">
                      '. carga_starts($b) .'
                    </p>
                    <p class="price">
                      Solicitado por '. $row["solicitudes"] .' personas
                    </p>
                  </div>
                  <hr>
                </div>
                ';
                $b --;
	
		}

		return $top;
	}
	/**/
	/*
	function carga_starts($b){
		
		$l = ''; 
		for ($a=0; $a <$b ; $a++) { 
					
			$l .= '<i class="fa fa-star fa-2x text-default">
				   </i>';        	
		}
		return $l; 
		
    } 
    */                 
	/**/
	/*
	function load_complete_artista($data){

	    $table = "";
	    $table .= '<table class="table  table-bordered">
	    <tr class="text-center enid-header-table">';
	    $table .= get_td("#" , "");  
	    $table .= get_td("Artista" , "");	   
	    $table .= get_td("Fecha registro" , "");
	    $table .= '</tr>';            
	    $flag =  1;
	    foreach ($data as $row) {
	        $table .=  "<tr>"; 
	        $table .= get_td($flag , "");
	        $table .= get_td($row["nombre_artista"], "");
	        $table .= get_td($row["fecha_registro"], "");
	        $table .=  "</tr>"; 
	        $flag ++; 
	    }
	    return $table; 
	}
	*/
	/**/
	/*
	function list_posible_artista($data){


		$options ="";
		foreach ($data as $row) {
			$options .="<option value='". $row["nombre_artista"] ."'> ";
		}
		return $options;
	}
	*/
	/**/
	/*
	function resumen_artistas_table($data){


		$table='<div ><table class="table table-bordered">
				<tr class="enid-header-table">';
		$table .= get_td("Escenario que pertenece al evento " , "");										  					  
		$table .= get_td("Escenario con información para el público" , "");					  						  	
		$table .= get_td("Artistas" , "");
		$table .= get_td("Artistas con enlace a youtube" , "");
		$table .= get_td("Con enlace a pistas musicales" , "");
		$table .= get_td("Con horario de presentación" , "");
		$table .= get_td("Pendientes por confirmar" , "");
		$table .= get_td("Artistas que ya han conformado su asistencia" , "");					  	
		$table .= get_td("Artistas que promenten asistir" , "");					  						  						  						 
		$table.="</tr>";

		foreach ($data as $row) {

			$table.='<tr>';								  	
				$table .= get_td( $row["evento"] , "" );
				$table .= get_td($row["con_descripcion"]  , "" );
				$table .= get_td($row["artistas"]  , "class='franja-vertical'" );
				$table .= get_td( $row["artistas_videos_youtube"] , "" );
				$table .= get_td( $row["artistas_pistas_sound"]  , "" );
				$table .= get_td( $row["artistas_con_horario"] , "" );
				$table .= get_td($row["artistas_pendientes"] , "" );
				$table .= get_td( $row["artistas_conformado"] , "" );					  	
				$table .= get_td($row["artistas_prometen_asistencia"] , "" );					  						  						  	

			$table .='</tr>';




			$table.='<tr>';										  					  						  	
				$table .='<td class="text-center" colspan="2"></td>';
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas"] )  , "class='franja-vertical'");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_videos_youtube"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] ,  $row["artistas_pistas_sound"] ), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_con_horario"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_pendientes"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_conformado"]), "");					  	
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_prometen_asistencia"]), "");					  						  						  	

			$table .='</tr>';			  
		}

		$table.="</table></div><hr>";
		return $table;
	}
	*/
	/*
	function get_artistas_default_template($artistas_array){
		$artistas ='';
		$flag =1;
		foreach ($artistas_array as $row){		
			$hora_inicio  =  $row["hora_inicio"];
			$hora_termino  = $row["hora_termino"];
			if(!isset($hora_inicio)) {
				$hora_inicio ="Próximamente";	
				$hora_termino ="Próximamente";	
			}
			$artistas .='<tr>';
			$artistas .= get_td( $flag , "");
			$artistas .= get_td( $row["nombre_artista"], "");
			$artistas .= get_td( $hora_inicio, "");
			$artistas .= get_td( $hora_termino, "");
			$artistas .='</tr>';		
			$flag++;
		}
		return $artistas;
	
	}
	*/

	
}/*Termina el helper*/