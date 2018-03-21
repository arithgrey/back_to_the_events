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
				<i class="artista_nota fa fa-file-text-o icon_config '.$d_class.' " id="'.$id_artista.'" >
				</i>
			</a> 
			';
		return $seccion_nota; 
	}
	/**/	
	function valida_icon_sound_cloud($part_sound , $id_artista , $url  ){

		$d_class = ' registrado '; 
		if (strlen($url) < 5) {
			$d_class = 'sin_registro'; 
		}

		$seccion_sound = ' <i  class="artista_sound fa fa-play-circle '.$d_class .' " id="'.$id_artista.'"   "'. $part_sound .'" >
							</i>'; 
		return $seccion_sound;
	}		
	/**/
	function valuda_icon_yt($part_youtube , $id_artista , $url_social_youtube){

		$d_class = ' registrado '; 
		if (strlen($url_social_youtube) < 5) {
			$d_class = 'sin_registro'; 
		}
		$seccion_youtube = ' <i "'.$part_youtube .'"   class="artista_yt fa fa-youtube-play icon_config '.$d_class.'  " id="'.$id_artista.'"></i>';
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
				<i class="'. $icon .'" >
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
	function carga_starts($b){
		
		$l = ''; 
		for ($a=0; $a <$b ; $a++) { 
					
			$l .= '<i class="fa fa-star text-default">
				   </i>';        	
		}
		return $l; 
		
    }                  
	/**/
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
	/**/
	function list_posible_artista($data){


		$options ="";
		foreach ($data as $row) {
			$options .="<option value='". $row["nombre_artista"] ."'> ";
		}
		return $options;
	}
	/**/
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


	function get_porcentaje_artistas($artistas , $val ){

		
		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $artistas )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}
		return $result;

	}
	/**/
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
	

	/*lista los artistas, template simple para edición*/
	/*
	function list_artistas_escenario($data , $title_panel , $record=0 , $id_escenario ){		            

		$artistas_in_evento = '<div class="panel">
		                        <header class="panel-heading">
		                            '.$title_panel .'                            
		                        </header>                                   	
		                        <div class="panel-body">
		                            <ul class="goal-progress">';

	foreach ($data as $row) {
		
		$id_artista = $row["idartista"];	
		$status = $row["status"];
		$idescenario = $row["idescenario"];
		$fecha_registro = $row["fecha_registro"];
		$hora_inicio = $row["hora_inicio"];
		$hora_termino = $row["hora_termino"];
		$nombre_artista= $row["nombre_artista"];
		$status_confirmacion = $row["status_confirmacion"];
		$tipo_artista =  $row["tipo_artista"];

	
		if ($hora_inicio!= null OR strlen($hora_inicio)>3  ){
			$horario = "de ". $hora_inicio ." a ".  $hora_termino;	
		}else{
			$horario = "por definir";
		}

				$artistas_in_evento .= '<li class="media usr-info">';

				$artistas_in_evento .=  "<div  class='img-div' >";
				


				$img =  create_icon_img( $row , " img-artista-evento ", $id_artista  , "data-toggle='modal' data-target='#modal-img-artista-evento'  " ); 	
				$artistas_in_evento .= $img;

				$artistas_in_evento .="</div>";

                $artistas_in_evento.='<div class="details img-div-text" >
                                        <div class="title" style="font-size:.9em !important;">
                                        	<i id="'.$id_artista.'" class="remove-artista fa fa-times" title="Quitar del escenario" ></i>                                        	

                                        	<a href="" title="Enlace algún  video del artista en youtube" data-toggle="modal" data-target="#modal_link_youtube" class="artista_yt" id="'.$id_artista.'"> <i class="artista_yt fa fa-youtube-play" id="'.$id_artista.'" ></i></a>
                                        	<a href="" data-toggle="modal"  title="Enlace"  data-target="#modal_link_sound" class="artista_sound" id="'.$id_artista.'">  <i class="artista_sound fa fa-play-circle" id="'.$id_artista.'" ></i></a>
                                        		

                                        	
                                        	<a href="" data-toggle="modal"  title="Mensaje del artista al público" data-target="#modal_nota" class="artista_nota" id="'.$id_artista.'"><i class="artista_nota fa fa-file-text-o" id="'.$id_artista.'" ></i></a>                                        	                                            	                                                                              		                                            	                                        
                                        	<a title="Define la participación del artista" href="" data-toggle="modal" data-target="#modal_tipo_artista"><i class="fa fa-star tipo_artista" id="'.$id_artista.'"></i></a> 
                                            <a title="Horario que se presentará  el artista" href="" data-toggle="modal" data-target="#modal_record_horario">
                                            <i class="fa fa-clock-o horario_artista" id="'.$id_artista.'"></i>
                                            </a> Horario '.$horario.', participación '. $tipo_artista .' 	                                           



                                            <a  data-toggle="modal" data-target="#edit-status-confirmacion"  
                                            style="background: #424F63;  color:white; padding:4px; border-radius: 5px;" 
                                             class="status-confirmacion" id="'. $id_artista.'" >
                                             '. $status_confirmacion.'
                                             </a>				                                    			                                   

                                            
                                            <div class="pull-right">	                                            
	                                            <a data-toggle="modal" 
	                                            data-target="#edit-nombre-artista"   title="artista"  >
	                                            	<h1 class="artistas-inputs pull-right" id="'. $id_artista .'"   >'. $nombre_artista .'</h1>
	                                            </a>	                                            
                                            <div>

	                                       </div>                                         	
	                                   </div>
	                                </li>';				                                	
	}                                



                            $artistas_in_evento.= '
                                
                            </ul>                           
                            ';

                            if ( $record == 1) {
                            	$artistas_in_evento.='
		                            <div class="text-center">
		                            <h1>
			                            <i class="fa fa-play-circle">
			                            </i>
										Registrar artista
									</h1>
		                            	<div class="row">
											<div class="col-md-12">
												<form role="form" class="form-inline" id="form-escenario-artista" >
													<div class="form-group todo-entry">

														<datalist id="dinamic-artistas"></datalist>
														<input list="dinamic-artistas" placeholder="nombre del artista" class="form-control" id="artista" name="nuevoartista" style="width: 100%" type="text">														
														<input type="hidden" name="idescenario" value="'.$id_escenario.'">
													</div>
													<button class="btn btn-primary pull-right" type="submit">+</button>
												</form>
											</div>
										</div>
		                            </div>';
                            }
                            
                            $artistas_in_evento.='
                        </div>
                    </div>';

    return $artistas_in_evento;                    
		
	}




*/





/*lista los artistas, template simple para edición*/
function list_artistas_escenario_tmp($data , $title_panel , $record=0 , $id_escenario ){		            

	$artistas_in_evento = '';

	foreach ($data as $row) {
		
		$id_artista = $row["idartista"];	
		$status = $row["status"];
		$idescenario = $row["idescenario"];
		$fecha_registro = $row["fecha_registro"];
		$hora_inicio = $row["hora_inicio"];
		$hora_termino = $row["hora_termino"];
		$nombre_artista= $row["nombre_artista"];
		$status_confirmacion = $row["status_confirmacion"];
		$tipo_artista =  $row["tipo_artista"];		
		if ($hora_inicio!= null OR strlen($hora_inicio)>3  ){
			$horario = "de ". $hora_inicio ." a ".  $hora_termino;	
		}else{
			$horario = "por definir";
		}

		
		$img =  create_icon_img( $row , " img-artista-evento ", $id_artista  , "data-toggle='modal' data-target='#modal-img-artista-evento'  " ); 	
		//
		$artistas_in_evento .= '
		<div class="container" id="sec-artistas">

		    <div class="row">        

		            <div class="artist-title col-md-12">

		                <a data-toggle="modal"  data-target="#edit-nombre-artista"   title="artista" >
		                	<div class="artistas-inputs" id="'. $id_artista .'"  >
		                   	'. $nombre_artista .'
		                   	</div>
		                </a>
		            
		                <span>
		                  '.$tipo_artista .'
		                </span>
		            </div>
		            <div class="artist-collage col-md-12">
		           	 	<i id="'.$id_artista.'" class="remove-artista fa fa-times pull-right" title="Quitar del escenario" ></i>  
		           	 	
		           	 	<a  data-toggle="modal" data-target="#edit-status-confirmacion"  style="background: rgb(18, 124, 132);  color:white; padding:4px; border-radius: 5px;"  class="status-confirmacion pull-right" id="'. $id_artista.'" >
                                '. $status_confirmacion.'
                        </a>


		                <span class="play-mix">
		                    <span href="" title="Enlace algún  video del artista en youtube" data-toggle="modal" data-target="#modal_link_youtube" class="btn btn-info play-mix-btn  artista_yt" id="'.$id_artista.'" > 
		                         <i class="artista_yt fa fa-youtube-play" id="'.$id_artista.'" >
		                         </i>
		                        Video de YouTube
		                    </span>
		                    <span  href="" data-toggle="modal"  title="Enlace"  data-target="#modal_link_sound" class="artista_sound btn btn-info play-mix-btn  " id="'.$id_artista.'" > 
		                    	<i class="artista_sound fa fa-play-circle" id="'.$id_artista.'" >
		                    	</i>
		                        Sound cloud
		                    </span>
		                    <a href="" data-toggle="modal"  title="Mensaje del artista al público" data-target="#modal_nota" class="artista_nota" id="'.$id_artista.'"><i class="artista_nota fa fa-file-text-o" id="'.$id_artista.'" ></i></a>                                        	                                            	                                                                              		                                            	                                        
		                    <a title="Define la participación del artista" href="" data-toggle="modal" data-target="#modal_tipo_artista"><i class="fa fa-star tipo_artista" id="'.$id_artista.'"></i></a> 
		                    <a title="Horario que se presentará  el artista" href="" data-toggle="modal" data-target="#modal_record_horario">
                                    <i class="fa fa-clock-o horario_artista" id="'.$id_artista.'"></i>
                            </a> Horario '.$horario.', participación '. $tipo_artista .' 	

		                </span>
		                <div class="col-md-6">
		                    '. $img .'
		                </div>                
		            </div>
		            <div class="listing-tab col-md-12">                  
		                  <div class="tab-content">
		                                  
		                  </div>
		            </div>        
		    </div>
		</div>';
            			                                	
	}    
	$artistas_in_evento.= '
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<form role="form" class="form-inline" id="form-escenario-artista" >
										<div class="form-group todo-entry">
											<datalist id="dinamic-artistas">
											</datalist>
											<input list="dinamic-artistas" placeholder="nombre del artista" class="form-control" id="artista" name="nuevoartista" style="width: 100%" type="text">														
											<input type="hidden" name="idescenario" value="'.$id_escenario.'">
										</div>
										<button class="btn btn-primary pull-right" type="submit">
														+
										</button>
									</form>
								</div>
							</div>
						</div>
						'; 
    return $artistas_in_evento;                    
		
}
	
}/*Termina el helper*/