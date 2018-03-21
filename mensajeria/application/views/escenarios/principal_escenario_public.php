<?=n_row_12()?>
	<div class='seccion_slider_escenario_enid' >
		<div class='place_slider'>
		  	</div>
		  	<div class='slider-principal-escenario' id='slider-principal-escenario'>                                
		  	</div>    	    		   
	</div>		
<?=end_row()?>    

 <?=titulo_enid("Escenario " . $escenario["nombre"] )?> 
		





<!--inicia la sección principal-->
<div>			
	<div class='col-lg-8 col-md-8 col-sm-8'>    	
		<div class='row'>



	    	<?=titulo_enid("Lo que vivirás")?> 
	    	<?=n_row_12()?>
		    	<span class='dias_restantes'>
					<?=$dias_restantes_evento;?>
				</span>
			<?=end_row()?>

	    	<?=n_row_12()?>
	    		Tipo- <?=trim($escenario["tipoescenario"]);?>
	    	<?=end_row()?>
	        
			<?=n_row_12()?>
	    		<?=evalua_fechas_enid_format(fechas_enid_format($escenario["fecha_presentacion_inicio"] , $escenario["fecha_presentacion_termino"] ));?>																		
	    	<?=end_row()?>
	        
			<?=n_row_12()?>
	    		<?=evalua_desc($escenario["descripcion"] , $in_session , $escenario["idescenario"] )?>		                             
		        <div class='resumen-escenario'>				
				</div>
	    	<?=end_row()?>

		    <?=titulo_enid("Artistas")?> 

		    <?=n_row_12()?>
		    	<div class='place_artistas_escenario'>
				</div>
				<div class='artistas_escenario'>
				</div>
		    <?=end_row()?>
			
		</div>
		<div class='row'>
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
		</div>

	</div>
	<div class='col-lg-4 col-md-4 col-sm-4'>

		
		<?=valida_reservaciones_public(
	        $in_session ,
	        $evento["reservacion_tel"] ,
	        $evento["reservacion_mail"] , 
	        url_evento_view_config($evento['idevento'])."/reservaciones/"	        
	    )?>
        

		<div class='place_bloque_extra'>
		</div>
		<div class='bloque_extra'>
		</div>

	</div>

</div>

















































