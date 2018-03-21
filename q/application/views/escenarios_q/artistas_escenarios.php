<?php
	
	$seccion =  "";
	foreach($info as $row){		

		$id_escenario =  $row["idescenario"];
		$nombre =  $row["nombre"];
		$descripcion =  $row["descripcion"];
		$tipoescenario =  $row["tipoescenario"];
		$fecha_presentacion_inicio  =  $row["fecha_presentacion_inicio"];
	    $fecha_presentacion_termino  =  $row["fecha_presentacion_termino"];
		$url_img_escenario =  create_url_img_escenario($id_escenario);
		$artistas =  $row["artistas"];

		$fecha_escenario = fechas_enid_format($fecha_presentacion_inicio , $fecha_presentacion_termino );
    	$editar =  template_editar($in_session ,  create_url_config_escenario($id_escenario) );

    	$extra_class= "list-group-item-md";
    	if (trim(strlen($descripcion)) > 600 ) {
    		$extra_class= "list-group-item-lg";    		
    	}


		$seccion .= $editar .
					n_row_12().'
		        	<a class="list-group-item active  '.$extra_class.' ">            
		        		<div class="col-md-12">
		        			<img src="'.$url_img_escenario.'">
		        		</div>		

		                <div class="col-md-3 text-center">
		                	'. 
		                	titulo_enid($nombre 
		                		. "<br>
		                			<small>
		                				Escenario		                			
		                				<br>
					                    
					                    	".$fecha_escenario."			                    	
					                    
				                    </small>			                    
								").'
		                    
		                </div>
		                <div class="col-md-9">

		                    <h4 class="list-group-item-heading strong black">
		                    '.$tipoescenario.' 
		                    </h4>
		                    <p class="list-group-item-text"> 
		                    '.$descripcion.'
		         			</p>
		                </div>
		          	</a>
			'.end_row();
			$seccion .=n_row_12();
			$seccion .= crea_seccion_artista_evento($artistas);
			$seccion .= end_row();

			$seccion .= "<hr>";











     	

     		


	}

?>
<?=$seccion?>



