<?php 	

	$puntos_venta_registrados = '';
	$a = 0; 
	$url=  create_url_puntoventa_admin("/".$id_evento); 
	foreach ($puntos_venta as $row ){

		$razon_social =  $row["razon_social"];			
		
		$puntos_venta_registrados .= "<a href='".$url."'> ". $razon_social ."</a>";	
		$a++; 
	}
	$mensaje_evento=  "No se han registrado puntos de venta."; 
	if ($a > 0 ) {
		$mensaje_evento = "Puntos de venta registrados en el evento. "; 		
	}

	$mensaje_evento .=	n_row_12() 
						. 
							"<a class='nuevo-elemento pull-left' href='".$url."'> 
								+ Registrar nuevo
							</a>"
						.end_row();
	

?>

<div class='panel panel-resumen-evento'>		
	<div class="item-content-block tags">
		<i class="menos_info_escenario  fa fa-caret-up pull-right" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>								
		<?=titulo_enid("Puntos de venta")?> 
		<?=n_row_12()?>
			<?=$mensaje_evento;?>
		<?=end_row()?>    
		<?=n_row_12()?>
			<?=$puntos_venta_registrados;?>	
		<?=end_row()?>    		
	</div>	
</div>

