<?php 	
	$eventos_registrados = '';
	$a = 0; 
	foreach ($escenarios_evento as $row){		
		$nombre =  $row["nombre"];
		$tipoescenario =  $row["tipoescenario"];		
		$id_escenario =  $row["idescenario"];		
		/**/
		$url_escenario =  base_url("index.php/escenario/inevento")."/".$id_escenario . "/".$id_evento;
		$eventos_registrados .= "<a href='". $url_escenario ."'> ". $nombre ."</a>";	
		$a++; 
	}
		$mensaje_evento = "	

							<span class='text-title-resum'> 
								Escenarios del evento.
							</span>									
							<div class='row'>
								<div class='col-lg-12 col-md-12 col-ms-12'>
									<button class='btn_nnuevo escenario_evento_nuevo' id='".$id_evento."' title='Cargar escenario al evento' data-toggle='modal' data-target='#modal-nuevo-escenario-evento'   >
			                        + Nuevo escenario 		                        
			                    	</button>
								</div>
							</div>
							"; 		

	
?>

<div class='panel panel-resumen-evento'>		
	<div class="item-content-block tags">
		<div class='pull-right'>						
			<i class="menos_info_escenario  fa fa-caret-up" aria-hidden="true" id='<?=$id_evento?>'  >
			</i>			
		</div>
		<span class='msj-resumen'>
			<?=$mensaje_evento;?>
		</span>	
		<div class='separate-enid'>
		</div>
		<div>
			<?=$eventos_registrados;?>
		</div>
	</div>	
</div>

<style type="text/css">
	
	.escenario_evento_nuevo:hover{
		cursor: pointer;
	}
	.menos_info_escenario:hover{
		cursor: pointer;
	}		
	.icon_escenario{		
		width: 10% !important;
		margin: 0 auto;	
	}
</style>
