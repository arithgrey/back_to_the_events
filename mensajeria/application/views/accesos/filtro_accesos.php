<?php 	

	$accesos_registrados = '';
	$a = 0; 
	$url =   url_accesos_configuracion_avanzada($id_evento)."/acceso"; 
	foreach ($accesos as $row ){
		$tipo =  $row["tipo"];					
		$accesos_registrados .= "<a href='".$url."'> ". $tipo ."</a>";	
		$a++; 
	}
	$mensaje_evento=  "No se han registrado promociones aún."; 
	if ($a > 0 ) {
		$mensaje_evento = "Puntos de venta registrados en el evento. "; 		
	}
	$mensaje_evento .="<div class='row'>
							<div class='col-lg-12'>
								<a class='nuevo-elemento pull-left' href='".$url."'> 
									+ Registrar nuevo
								</a>
							</div>	
						</div>";

	$mensaje_evento .= "";

?>

<div class='panel panel-resumen-evento' >	
	<div class="item-content-block tags">
		<i class=" menos_info_puntos_venta  fa fa-caret-up pull-right" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>
		<span class='text-title-resum'> 
			Accesos cargados al evento
		</span>						
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
			<span class='msj-resumen'>
				<?=$mensaje_evento;?>
			</span>	
			<div class='separate-enid'>
			</div>
			<div>
				<?=$accesos_registrados;?>
			</div>

			</div>
		</div>						
		
	</div>
</div>

<style type="text/css">
	.item{color:#48453d; margin-top:30px; overflow:hidden;}		
	.tags a{background-color:#53C1CE; padding:10px; color:#fff; display:inline-block; font-size:11px; text-transform:uppercase; line-height:11px; border-radius:2px; margin-bottom:5px; margin-right:2px; text-decoration:none;}
	.tags a:hover{background-color:#00BCD4;}
	.tags_e:hover{
		cursor: pointer;
	}
	.escenario_evento_nuevo:hover{
		cursor: pointer;
	}
	.menos_info_puntos_venta:hover{
		cursor: pointer;
	}
	
</style>
