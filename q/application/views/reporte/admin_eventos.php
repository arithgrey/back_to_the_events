<div class='row'>	
	<div class='col-lg-12 col-md-12 col-sm-12'>
	<?=titulo_enid("Tus eventos")?>
	</div>
</div>	
<div>		
	<input name="fecha_busqueda" value="" id="fecha_busqueda" class='fecha_busqueda' type='hidden'>		  		
	<div class='table_resum_evento'> 
		<div class='place_reporte_evento'>
		</div>
		<div class='reporte_evento'>
		</div>	
	</div>
</div>				
<!---->
<!---->
<?=construye_header_modal('more-info-modal', "+ info " );?>
	<div class='place_more_info'>
	</div>
	<div class='place_info'>
	</div>
<?=construye_footer_modal()?>




<?=construye_header_modal('modal_reservacion', "Personas que hicieron su reservación" );?>
	<div class='place_reservaciones'>
	</div>
<?=construye_footer_modal()?>
