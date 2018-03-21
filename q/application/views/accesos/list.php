<?php	
	$promo_total =0;
	$complete ="";				
	$flag =1;	
	$elements ="";				

			foreach ($accesos as $row){
					
				$promo_total ++;
				$idacceso  =  $row["idacceso"];  
				$nombre =  $row["nombre"];
				$nota  =  $row["nota"];    
				$precio  = "<span title ='Precio del acceso al público'>" . $row["precio"] . "</span>";              
				$inicio_acceso =  $row["inicio_acceso"]; 
				$termino_acceso =$row["termino_acceso"];						
				$idevento  = $row["idevento"];          
				$idtipo_acceso = $row["idtipo_acceso"]; 						
				$vigencia = "Del " . $inicio_acceso ." al día ".   $termino_acceso;
				$idtipo_acceso = $row["idtipo_acceso"];
				$tipo = $row["tipo"];                 								
				$fecha_registro =  $row["fecha_registro"];
				

                $url_config = url_accesos_configuracion_avanzada( $idevento)."/config/" .$idacceso;
                $url_img = create_url_img_acceso($idacceso);
                $nota =  show_more_text($nota);

                $part_img =  "";
				$config =""; 			
                $a = "<a>";
				if($param["in_session"] == 1 ){									

						$config = n_row_12()
                                  . '                                        
                                        <div class="pull-right"> 
                                            <a title = "Configura datos del acceso "  class="more">
                		                        <i data-toggle="modal" data-target="#editar-acceso" class="fa fa-cog editar-acceso" 
                                                id="'.$idacceso.'">
                                                </i> 
                		                    </a>
                		                    <a title = "Eliminar acceso del evento "  class="more">
                		                        <i data-toggle="modal" data-target="#confirma-delete-acceso" 
                                                class="fa fa-times delete-acceso" id="'.$idacceso.'" >
                                                </i> 
                		                    </a>
                                        </div>    

                            '.
                            end_row(); 

                    $part_img = '<div data-toggle="modal" data-target="#acceso-imagen-modal" ><img  class="img_acceso"  id="'.$idacceso.'" style="width: 100%" src="'.$url_img.'"></div>';            

				}
			    if( $param["resumen_evento"] ==  1 ) {
                    

                        $config = n_row_12().'
                                            <div class="pull-right" style="margin-right:10px;"> 
                                                <a href="'.$url_config.'" title = "Configura datos del acceso "  class="more">
                                                    <i  class="fa fa-cog editar-acceso" 
                                                    id="'.$idacceso.'">
                                                    </i> 
                                                </a>                                            
                                            </div>    
                                        '.
                            end_row(); 
                            
                        $part_img =  "<a href='".$url_config."'>
                                        <img  class='img_acceso'  id='".$idacceso."' style='width: 100%' src='".$url_img."'>
                                      </a>";            
                        $a =  "<a href='".$url_config."'>";              
                } 


			$elements .= '	
                    <div class="row">                             
                            '.$config.'             
                            <div class="col-lg-12  col-md-12 col-sm-12">                                
                                <div class="col-lg-4 col-md-4 col-sm-4">                                
                                    '.$part_img .'                  
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="contenedor-resumen-accesos">
                                        '.$a .'
                                            
                                            '.titulo_enid($nombre).'
                                        </a>
                                    </div>

                                    <div class="contenedor-resumen-accesos">                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                            <span class="a1">
                                                '.$tipo .'        
                                                </span>    
                                            </div>
                                            <div class="row">
                                                <span class="a2">
                                                    $'.$precio  .'
                                                </span>    
                                            </div>
                                            <div class="row">
                                                <span class="a3">
                                                    '.$vigencia.'     
                                                </span>    
                                            </div>
                                            <div class="row">
                                                <span class="a4">
                                                    Fecha registro'.$fecha_registro.'                                                
                                                </span>                                        
                                            <div>
                                            <div>
                                                '. $nota .'                                
                                            </div>                
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>                    
                    <hr>
        ';                            
 
        }      
                         
	
?>





<?=$elements?>

<style type="text/css">
.a1{
    background: #3c5e79;
    padding: 5px;
    color: white;
    font-weight: bold;
}
</style>