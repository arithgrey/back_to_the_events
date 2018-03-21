<?php 	
	$artistas_registrados = '';
	$a = 0; 
	foreach ($artistas as $row ){
		$nombre_artista =  $row["nombre_artista"];			
		$id_escenario =  $row["id_escenario"];					
			$url=  create_url_config_escenario($id_escenario);
		$artistas_registrados .= "<a href='".$url."' class='elemento-resumen'> ". $nombre_artista ."</a>";	
		$a++; 
	}
	$mensaje_evento=  "No se han registrado artistas en nungún escenario aún." ; 
	if ($a > 0 ) {
		$mensaje_evento = "Artistas que integran el evento"; 		
	}
	
?>
<div class='panel panel-resumen-evento'>	
	<div class="item-content-block tags">			
		<i class="menos_info_artistas  fa fa-caret-up pull-right" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>	
		<span class='text-title-resum'> 
			Artistas del evento
		</span>									
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<span class='msj-resumen'>
					<?=$mensaje_evento;?>
				</span>	
				<div class='separate-enid'>
				</div>
				<div>
					<?=$artistas_registrados;?>
				</div>
			</div>
		</div>
		
	</div>
</div>
<style type="text/css">
	.escenario_evento_nuevo:hover{
		cursor: pointer;
	}.menos_info_artistas:hover{
		cursor: pointer;
	}	
</style>

