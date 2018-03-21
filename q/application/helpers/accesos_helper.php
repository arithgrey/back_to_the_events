<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	/**/
	function crea_promocion_evento($data){

		$promocion =  "";

		foreach ($data as $row) {
			
			$idacceso=  $row["idacceso"];
			$descripcion=  $row["descripcion"];
			$precio=  $row["precio"];
			$inicio_acceso=  $row["inicio_acceso"];
			$termino_acceso=  $row["termino_acceso"];
			$status=  $row["status"];			
			$nombre=  $row["nombre"];
			$moneda=  $row["moneda"];
			
			$promocion .=  " 
						".$nombre."  - 
                        ".  substr($descripcion , 0 , 225) ."
						<p class='price'>
                            <i style='font-size: 40px;'>
                                $
                            </i>
                            ".$precio ."
                            <sub>
                                <small class='renew-price'>
                                    ".$moneda."
                                </small>
                            </sub>                            
                        </p>

                        ";

			
		}
		return  $promocion;
	}



	/**/
	function show_more_text($nota){

		$dinamic_class =  "";
		if (strlen(trim($nota)) > 1 ){
			$dinamic_class= "seccion_nota_acceso"; 	
		}
		$new_text = $nota; 
		if(strlen(trim($nota)) > 250){			
			

			$primer_part = "<span class='hiddden_descripcion'>  
							". $nota ."
							</span>";
			$part_descripcion =  substr($nota, 0 , 250);  

			$new_text = $primer_part."  <span class='show_descripcion'>
										". $part_descripcion ."
										</span>
										<center>
											<div class='row'>
												<span class='more-info-f more-info-f-down'>
													<i class='more-info-f more-info-f-down  fa fa-chevron-down' aria-hidden='true'>
													</i>
												</span>
												<span class='more-info-f more-info-f-up'>
													<i class='fa fa-chevron-up more-info-f more-info-f-up ' aria-hidden='true'>
													</i>
												</span>
											</div>
										</center>"; 			

		}
		return $new_text;
				
	}
	/**/
	function valida_registro_promociones($num, $in_session, $id_evento ){		
		$url  =  url_accesos_configuracion_avanzada($id_evento) ."/acceso/"; 
		$btn =  agregar_btn($in_session , $url ); 
		$msj =  ""; 
		if ($num < 1 ) {
			if ($in_session ==  1) {
				$msj = $btn . "<center> 
									<span class='msj_notificacion_config'>
										No has cargado accesos al evento aún. 
									</span> 
								</center>";
			}else{
				$msj = $btn . "<center> 
								<span class='msj_faltante'>
									Próximamente podrás consultar los precios para acceder al evento .! 
								</span>
							   </center>  ";
			}
		}else{
			$msj = "<span title='registra nuevo acceso'>
						" .$btn . "
					</span>";
		}
		return $msj; 
	}
	/**/
	function accesos_complete($data){

		$accesos = "";
		$accesos .= '<table class="table table-bordered">
		<tr class="text-center enid-header-table">';
        $accesos .= get_td("#" , "");  
        $accesos .= get_td("Acceso" , "");
        $accesos .= get_td("Tipo" , "");
        $accesos .= get_td("Precio para el público" , "");
        $accesos .= get_td("Duración de la promoción" , "");
                
        $accesos .= '</tr>';            
		$in = 1;

			foreach ($data as $rowccesos) {

				$periodo  =  $rowccesos["inicio_acceso"] . " - "  . $rowccesos["termino_acceso"];					
				$accesos .=  "<tr>";
				$accesos .=  get_td($in , "class='franja-vertical'");
				$accesos .=  get_td($rowccesos["nombre"] , "" );
				$accesos .=  get_td($rowccesos["tipo"] , "");                       			 
		        $accesos .=  get_td(  $rowccesos["precio"]  , "");	
		        $accesos .=  get_td(  $rowccesos["inicio_acceso"] . " al " . $rowccesos["termino_acceso"]  , "");	
			    $accesos.=   "</tr>";        
		            $in ++;
			}

		$accesos .= '</table>';		
		return $accesos;	
	}

	/*********     **********         ***********      ***********/
	function list_accesos_edit($data){

		$accesos = "";
		$accesos .= '<table class="table table-bordered">
				<tr class="text-center enid-header-table">';
        $accesos .= get_td("#" , "");  
        $accesos .= get_td("Acceso" , "");
        $accesos .= get_td("Tipo" , "");
        $accesos .= get_td("Precio para el público" , "");
        $accesos .= get_td("Duración de la promoción" , "");
        $accesos .= get_td("Avanzado" , "");
        

        $accesos .= '</tr>';            
		$in = 1;

			foreach ($data as $rowccesos) {

				$periodo  =  $rowccesos["inicio_acceso"] . " - "  . $rowccesos["termino_acceso"];					
				$accesos .=  "<tr>";
				$accesos .=  get_td($in , "");
				$accesos .=  get_td($rowccesos["nombre"] , "class='franja-vertical'" );
				$accesos .=  get_td($rowccesos["tipo"] , "");                       			 
		        $accesos .=  get_td( "$". money_format( "%i" ,  $rowccesos["precio"] ) , "");	                
			    $accesos .=  get_td($periodo  , "");		
			    $accesos .=  get_td("<i class='fa fa-cogs' id='".$rowccesos["idacceso"]."' ></i>" , "class='avanzado-accesos'  id='".$rowccesos["idacceso"]."'    " );			  	
			    $accesos.=   "</tr>";        
	            $in ++;
			}

		$accesos .= '</table>';		
		return $accesos;	
	}
	/**********       **********           ***********        ***********/
	function accesos_view_default($arreglo_accesos){
	
		$blog_tikects = '';
		foreach ($arreglo_accesos as $row) {

			$descripcion_acceso = $row["nota"];

			$precio =  $row["precio"];				
			$inicio_acceso = $row["inicio_acceso"];
			$termino_acceso = $row["termino_acceso"];
			$status =  $row["status"];
			$tipo = $row["tipo"];
			
			$blog_tikects .='<div class="panel">
				                <div class="panel-body">
				                    <div class="row">
				                        <div class="col-md-5 blue-col-enid">
				                            <div class="blog-img-sm blue-col-enid">
				                                
				                            </div>
				                        </div>
				                        <div class="col-md-7">
				                            <h1 class=""><a href="#">'. $tipo .'</a></h1>
				                            <p class=" auth-row">
				                                   Vigencia |  '.$inicio_acceso.'   | '. $termino_acceso.'
				                            </p>

				                            <p>
				                            '.$descripcion_acceso.'
				                            </p>
				                            <a href="#" class="more"><i class="fa fa-credit-card"></i> $'. $precio .'</a>
				                        </div>
				                    </div>
				                </div>
				            </div>';

		}
		
		return $blog_tikects;
	}
	/*Despliega la información de los accesos en avanzado */
	function display_complete_info($data_accesos){
		
		$promo_total =0;
		$complete ="";				
		$flag =1;
	
			foreach ($data_accesos as $row){
					
				$promo_total ++;
				$idacceso  =  $row["idacceso"];  
				$nombre =  $row["nombre"];
				$nota  =  $row["nota"];    
				$precio  = $row["precio"];              
				$inicio_acceso =  $row["inicio_acceso"]; 
				$termino_acceso =$row["termino_acceso"];						
				$idevento  = $row["idevento"];          
				$idtipo_acceso = $row["idtipo_acceso"]; 						
				$vigencia = $inicio_acceso ." al día ".   $termino_acceso;
				$idtipo_acceso = $row["idtipo_acceso"];
				$tipo = $row["tipo"];                 				
				$img_acceso = create_icon_img($row , " img_acceso  pull-left  ", $idacceso , ' data-toggle="modal" data-target="#acceso-imagen-modal"  '  ); 

				$delete =  '<i data-toggle="modal" data-target="#confirma-delete-acceso" class="fa  fa-times delete-acceso" id="'.$idacceso.'" ></i>';
				$edit = '<i data-toggle="modal" data-target="#editar-acceso"    class="fa fa-cog editar-acceso" id="'.$idacceso.'"></i>';
				$imgagen = '<div data-toggle="modal" data-target="#acceso-imagen-modal"    class="imgagen_acceso"  >'. $img_acceso .'</div>';

$complete .= '
		<div class="panel">
            <div class="panel-body ">

                <div class="media blog-cmnt">                                
                	<div class="pull-right">
                		'.$edit.' '.$delete.'	                	
    				</div>
                    '. $imgagen.'
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a class="nombre_acceso">
                            '. $nombre .'
                            </a>
                            <span class="pull-right">
                            	Vigencia '. $vigencia .' | Tipo de promoción '.$tipo.'| Precio al público '.$precio.'
                            </span>
                        </h4>
                        <span class="text-descripcion-acceso">
                           '.$nota .'
                        </span>
                    </div>
                </div>
            </div>
        </div>';
   	}
		return $complete;

	}
	/*lista loa tipos de accesos*/
	function list_tipos_accesos($data_tipos_accesos){
		$option_acceso ='';

		foreach ($data_tipos_accesos as $row) {
			$option_acceso .='<option value="'. $row["idtipo_acceso"].'">'. $row["tipo"].'</option>';	
		}
		return $option_acceso;
	}
	/**/


	/****************************Resumen Accesos principal cliente  ******************************************************************/
	function resumen_cliente($data , $id_evento ){

		$resumen = "";		
		foreach ($data as $row){
			
			$escenarios  = $row["escenarios"];
			$artistas = $row["artistas"];
			$evento_punto_venta =  $row["evento_punto_venta"];
			//$accesos 	 = $row["accesos"];
			$generos_musicales =  $row["generos_musicales"];
			$servicios  =  $row["servicios"];		

		$resumen .=  '  					
        <div class="col-lg-3" >
            <div class="form_hover" style="background: rgb(7, 20, 27);" >
                <p style="text-align: center; margin-top: 50px;">
	                <span style="font-size: 120px;" class="white-enid">
	                    '. $escenarios .'
	                </span>    
                </p>

                <div class="header">
                    <div class="evento_escenarios " id="'. $id_evento.'"></div>
                    <div class="header-text" >
                        <div class="panel" style="height: 247px; background: rgb(7, 20, 27); ">
                            <div class="panel-heading "  >
                                <h4 style="color: white;">Escenarios</h4>
                            </div>
                            <div class="panel-body "  >                               
                                <div id="escenarios_resumen"></div>                                
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
        <div class="col-lg-3" >
            <div class="form_hover " style="background: rgb(7, 20, 27);">
                <p style="text-align: center; margin-top: 50px;">
                    <span style="font-size: 120px;" class="white-enid">
                    	'.$artistas.'
                    </span>
                </p>
                <div class="header">
                    <div class="evento_artistas  blur"  id="'. $id_evento .'"></div>
                    <div class="header-text">
                        <div class="panel " style="height: 247px; background: rgb(7, 20, 27);">
                            <div class="panel-heading">
                                <h4 style="color: white;">Artistas</h4>
                            </div>
                            <div class="panel-body">
                                <div id="artistas_resumen"></div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form_hover " style="background: rgb(7, 20, 27);">
                <p style="text-align: center; margin-top: 50px;">                    
                    <span style="font-size: 120px;" class="white-enid">
                    '. $generos_musicales  .'
                    </span>
                </p>
                <div class="header">
                    <div class="blur evento_generos" id="'. $id_evento .'"></div>
                    <div class="header-text">
                        <div class="panel " style="height: 247px; background: rgb(7, 20, 27);">
                            <div class="panel-heading">
                                <h4 style="color: white;">Géneros musicales</h4>
                            </div>
                            <div class="panel-body">
                                <div id="generos_resumen"></div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form_hover " style="background: rgb(7, 20, 27);">
                <p style="text-align: center; margin-top: 50px;">
                    
                    <span style="font-size: 120px;" class="white-enid" >
                    '. $servicios.'
                    </span>
                </p>
                <div class="header">
                    <div class="evento_servicios  blur" id="'. $id_evento .'"></div>
                    <div class="header-text">
                        <div class="panel " style="height: 247px; background: rgb(7, 20, 27);">
                            <div class="panel-heading">
                                <h4 style="color: white;">Servicios del evento</h4>
                            </div>
                            <div class="panel-body">                                
                            	<div id="servicios_resumen"></div>	                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

        }

		
		return $resumen;

	}


	/**/
	function lista_accesos_publicos($data,  $in_session , $id_evento ){
		
		$accesos   ="";		
		foreach ($data as $row) {

			$idacceso =  $row["idacceso"]; 
			$precio  = $row["precio"];			
			$descripcion = $row["descripcion"];					
			$inicio_acceso  = $row["inicio_acceso"];			
			$termino_acceso = $row["termino_acceso"];			
			$tipo   = $row["tipo"];			
			//$nombre_imagen = $row["nombre_imagen"];						
			$stado_oferta  =  $row["stado_oferta"];
			//$img =  create_icon_img($row , " " , " " ); 

			$url =  url_accesos_configuracion_avanzada( $id_evento)."/config/" .$idacceso ;
			$btn = editar_btn($in_session , $url );  

			$nombre =  $row["nombre"];			
					$accesos .=  '
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 contenedor-config">
							<span >
								'.$btn.'
							</span>
						</div>
						<div class="col-lg-4 col-md-8 col-sm-12">										
							
						<img  src="'.create_url_img_acceso($idacceso).'"  onerror="this.src=$url_teplate"    width=100%; >
						</div>
						<div class="col-lg-4 col-md-8 col-sm-12">
											                        
							<span class="titulo-enid-sm">				                             
								'. $nombre  ." , 
								" . $tipo .'				                              
							</span>	
							<strong>		
								, $'. $precio .'.00
							</strong>				                            
							<div class="post-info">                                                					                                            					                                            				                            	
								<span>
									<i class="icon-calendar">
									</i> Vigencia '. $inicio_acceso  .' al '. $termino_acceso . ' 
								<span>   						                                					                            					                                                   
							</div>
							
							<span class="label label-default" class="estado_oferta_lb" >
								'. $stado_oferta  .' 
							</span>	
							'.n_row_12().'
									<span>				        				
										'.$descripcion.'
									</span>                                        				                        		                                       				        			
							'.end_row().'
						</div>
					</div>
					<hr>
					'; 		
		}		


		
		$data["accesos"] = $accesos; 
		$data["num_accesos"]  =  count($data);
		return $data;				
	}

}/*Termina el helper*/