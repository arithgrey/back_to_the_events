<?php 	

	$accesos_registrados = '';
	$a = 0; 
	$url =   url_accesos_configuracion_avanzada($id_evento); 
	foreach ($accesos as $row ){

		$tipo =  $row["tipo"];		
		$nombre  =  $row["nombre"];
		$precio = $row["precio"];
		$moneda =  $row["moneda"];

		$accesos_registrados .= "<a href='".$url."'> 
									". $tipo ."
									<br>
									<small>																			
										".$nombre."
										- ".$precio."
										".$moneda."
									</small>
								 </a>";	
		$a++; 
	}
	
	$mensaje_evento =	n_row_12() .
						 	"<a class='btn_nnuevo nuevo_acceso' href='".$url."'> 
								+ Registrar nuevo
							</a>".
						end_row();

	

?>

<div class='panel panel-resumen-evento' >	
	<div class="item-content-block tags">
		<i class=" menos_info_puntos_venta  fa fa-caret-up pull-right" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>
		<span class='strong'> 
			Accesos cargados al evento
		</span>						
			
			<?=n_row_12()?>		
				<span class='msj-resumen'>
					<?=$mensaje_evento;?>
				</span>	
				<div class='separate-enid'>
				</div>
				<div>
					<?=$accesos_registrados;?>
				</div>
			<?=end_row()?>		
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
	.nuevo_acceso{
		background: #0886E3 none repeat scroll 0% 0% !important; 
		color: white !important;
	}
	
</style>
