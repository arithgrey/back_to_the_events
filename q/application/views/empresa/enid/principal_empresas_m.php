<?=construye_header_modal('miembros', "Miembros de la cuenta" );?>                           	
	<div class="place_miembros">		
	</div>
<?=construye_footer_modal()?>  

<?=construye_header_modal('info-resumen', "+ Info  del prospecto" );?>                           	
	
	<div class='info-resumen-prospecto'>
	</div>
<?=construye_footer_modal()?>  



<?=construye_header_modal('visitas_dia', "+ Info " );?>                           	
    <div style='overflow-y:scroll; overflow-x:auto; height: 250px;'>
		<div class="place_visitas">		
		</div>
	</div>
<?=construye_footer_modal()?>  

<?=construye_header_modal('evalua_bug', "Califica inicidencia" );?>                           	
	<center>
		<div class='place_info_calificacion_incidencia'>
		</div>
	</center>
	<form  id='form-calificacion-incidencia' action="<?=base_url('index.php/api/enid/bug/format/json')?>">
    	
    	<?=create_select_estados_incidencia("status_incidencia" , "status_incidencia")?>

    	<?=btn_registrar_cambios_enid("btn-actualiza-incidecia" , "btn-actualiza-incidecia")?>
    </form>
<?=construye_footer_modal()?>  

