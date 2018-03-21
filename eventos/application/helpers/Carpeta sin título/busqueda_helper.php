<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

function bloque_completo_def($data){

	$block ="";	
	$block .="<section>";	
	


	foreach ($data as $row ) {

		$nombre_evento = $row["nombre_evento"];	
		$edicion = $row["edicion"];	
		$fecha_inicio =  $row["fecha_inicio"];
		$fecha_termino =  $row["fecha_termino"];
		$descripcion =  $row["descripcion_evento"];
		$ubicacion =  $row["ubicacion"];
		$url_social =  $row["url_social"];
		$url_social_youtube =  $row["url_social_youtube"];
		$breve_descripcion =  $row["breve_descripcion"];
		$slogan =  $row["eslogan"];
		$tipo =  $row["tipo"];


		$block.= '		
		
			<article>
			<h2>Noticia 1</h2>
		       	<div class="row">
		           	<div class="col-md-2">
		               	<div class="blog-img-sm">
		                   	<img src="" alt="">
		               	</div>
		           	</div>
		           	<div class="col-md-10">
		           		<header>
			               	<h1 class="">
			                	<a href="#">'. $nombre_evento .'
			                	</a>
			               	</h1>
		               	</header>
		               	<p class=" auth-row">
		                      	<a href="#">Anthony Jones
		                   	</a>   |   '. validate_fechas_evento($fecha_inicio , $fecha_termino) .'   | 
		                   	<a href="#">5 Comments
		                   	</a>
		               	</p>
		               	<p>'. $descripcion .'
		               	</p>
		               	<a href="#" class="more">
		                    Continue Reading
		               	</a>
		           	</div>
		       	</div>
		    </article>                
		</div>
		<hr>';

	}	


	$block .=  "</section>";
	return $block;
	/**/
}




/*Creamos el bloque */
function bloque_completo($data){

	$block ="";	
	$block .="<section>";	
	
	foreach ($data["eventos"] as $row ) {

		$id_evento =  $row["idevento"];
		$id_empresa = $row["idempresa"];
		$nombre_evento = $row["nombre_evento"];	
		$nombreempresa =  $row["nombreempresa"];
		$edicion = $row["edicion"];	
		$fecha_inicio =  $row["fecha_inicio"];
		$fecha_termino =  $row["fecha_termino"];
		$descripcion_tramo =  $row["descripcion_evento"];
		

		$ubicacion =  $row["ubicacion"];
		$url_social =  $row["url_social"];
		$url_social_youtube =  $row["url_social_youtube"];
		$breve_descripcion =  $row["breve_descripcion"];
		$slogan =  $row["eslogan"];
		$tipo =  $row["tipo"];
			



		/**/
		$url_evento_nombre  =  create_url_evento_public($nombre_evento  , $id_evento); 
		$fecha_evento  = fechas_enid_format($fecha_inicio , $fecha_termino); 
		$url_evento =  create_url_evento_view($id_evento); 		
		$url_empresa =  url_la_historia($id_empresa);
		/**/
		
		/*Para la imagen*/
		$path_img = $row["base_path_img"]. $row["nombre_imagen"];   
		$url_img = base_url($path_img);
		/*Termina lo de la imagen*/


		if (strlen($descripcion_tramo) >  300 ) {
			$descripcion_tramo =  substr($descripcion_tramo , 0 , 300 );	
		}
		/*tramo slogan*/	

		if (strlen($slogan)) {
			$slogan = '<hr>
							<div class="slogan_section">
								<span style="font-size:.7em" >
				                    '. $slogan .'
								</span>	
							</div>		
						<hr>'; 			
		}

		$block .=  '<div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="blog-img-sm">
                                <img src="'.$url_img .'" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h1 class="">
                            	'. $url_evento_nombre    .'
                            </h1>                            
                            <span style="background:#13BAFC; color:white; font-weight:bolder; padding:3px;" class="text-center">
                            '.$edicion.'
                            </span>
                            <p class=" auth-row">                            
                                By <a href="'.$url_empresa.'">'.$nombreempresa.'</a>   |  '.$fecha_evento .'   | <a href="#">'.$tipo.'</a>
                            </p>                            
                            <p>
                            	'.$descripcion_tramo .'
                            </p>                            
                           	'.$slogan .'                            
                            <a href="'.$url_evento.'" class="more">
                            + información del evento
                            </a>
                        </div>
                    </div>
                </div>';
		
	}	
	
	$response["block"] =$block;
	$response["query"] = $data["query"];
	return $response;
	/**/
}
/**/
function validate_fechas_evento($inicio , $fin ){	

	$text_fecha =  "";  
	if ($inicio ==  $fin ) {
		$text_fecha =  $inicio;  		
	}else{
		$text_fecha = " Del " . $inicio . " al " . $fin ;
	}
	return $text_fecha;
}
/**/
}/*Termina el helper*/