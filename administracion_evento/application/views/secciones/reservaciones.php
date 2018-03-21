<div class='well' style='background:#0093FF!important'>
	<h2>
		Reservaciones
	</h2>
	<label class='reservaciones-btn section-left link_modal ' data-toggle="modal" data-target="#reservaciones-modal"  >
	<?=valida_reservaciones(  0 , 
		$data_evento["reservacion_tel"] , 
		$data_evento["reservacion_mail"] , 
		"reservaciones-modal")?>  
	</label>                                
	<br>
	<span class='place_reservaciones_2'>                    
	</span>
</div>