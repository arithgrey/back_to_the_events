<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

	function actividad_eventos_admin($data){
		
		$activity ='<ul class="activity-list">';                                       

		foreach ($data as $row) { 

			$actividad = $row["actividad"]; 
			$dias =  $row["dias"];	
			$horas =  $row["horas"];	
			$tiempo_trasncurrido = ""; 
			$tipo =  $row["tipo"];

				
			/*Calculamos el tiempo  trancurrido */
			if ($dias == -1 ){
				$tiempo_trasncurrido =  "Hace 1 día ";
			}else if($dias < -1 ){
				$tiempo_trasncurrido =  "Hace ". $dias ." días ";
			}else{
				/*Aquí cargamos por minutos*/
				if ($horas ==   -1  ) {
					$tiempo_trasncurrido =  "Hace  1 hora ";	
				}else if ($horas <   -1  ) {
					$tiempo_trasncurrido =  "Hace  ". $horas ." horas";	
				}else{
					$tiempo_trasncurrido ="Hace unos minutos";
				}
			}


			$activity .= '<li>
                                <div class="avatar">
                                    <div style="height:30px; width:30px; '. genera_color_notificacion_admin($tipo) .'  "></div>
                                </div>
                                <div class="activity-desk">
                                    <span style="font-size:.8em;">	                                    
											'. $actividad .'	                                                                        
                                    </span>
                                    <p class="text-muted" style="font-size:.8em;">
                                       '. $tiempo_trasncurrido.'
                                    </p>
                                </div>
                            </li>';
				
		}
		$activity .= "</ul>";		
		return  $activity;
	}
}/*Termina el helper*/