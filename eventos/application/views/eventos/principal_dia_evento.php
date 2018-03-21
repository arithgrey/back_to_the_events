<?=n_row_12()?>
	<span class='dias_restantes'>
	      <?=$dias_restantes_evento?>
	</span>     
<?=end_row()?>    
<?=titulo_enid("El día del evento disfrutarás de estós servicios")?> 
<?=$evento["eslogan"]?>

<!--SERVICIOS INCLUIDOS EN EL EVENTO-->
<div class='servicios-mov'>
	<div class='servicios_incluidos'>
	</div>
	<div class='place_servicios_incluidos'>
	</div>
</div>
<!--Sección Objetos permitidos-->
<div id='seccionobjs'>
	<div class='objs_enid' id='objs_enid'>
		<div class='objs_permitidos'>
		</div>
		<div class='place_objs_permitidos'>
		</div>
	</div>	
</div>
<!---->
<div>								
	<div class='col-lg-12 col-md-12 col-sm-12 '>
		<div class='place_extra_event'>
		</div>
		<div class='extra_event'>
		</div>				
	</div>	
</div>	
<!--Sección Objetos  permitidos termina -->				

	
	<?=n_row_12()?>
		<div class='enid-maps' id="enid-maps">
          <?=valida_maps_public($evento['formatted_address'] , $evento['idevento'] )?>    
        </div>
    <?=end_row()?> 
        
    <?=n_row_12()?>
        <ul class="p-social-link pull-right">        
            <?=evalua_social($evento["url_social"] , "fb" , $in_session )?>
            <?=evalua_social($evento["url_social"] , "yt" , $in_session )?>                
        </ul>  
    <?=end_row()?> 