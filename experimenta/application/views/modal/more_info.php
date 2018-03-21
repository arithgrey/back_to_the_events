<?=construye_header_modal('modal_info_evento', " La experiencia - ".$data_evento["nombre_evento"]."   " );?> 
            <div class='well' style='background:#428BCA'>
                <?=$data_evento["descripcion_evento"]?>
            </div>
<?=construye_footer_modal()?>  
<?=construye_header_modal('modal_info_servicio', "Servicio - <span class='place_nombre_servicio'></span> " );?> 
	<div class='well' style='background:#428BCA'>
		<div class='info_completa_servicio'>
		</div>
	</div>
<?=construye_footer_modal()?>  