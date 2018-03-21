    <div class='col-lg-8 col-lg-8 col-sm-12'>
        <div class='row'>

            <?=titulo_enid("Puntos de venta del evento")?>         
            <?=n_row_12()?>
                <?=valida_nuevo_pv_evento( 1 , $data_evento["idevento"] , $in_session, "Agrega nuevo punto de venta")?>
            <?=end_row()?>    
            
            <?=n_row_12()?>        
                <div class='place_puntos_venta'>
                </div>            
                <div class='puntos_venta'>			
                </div>                    	        	                
            <?=end_row()?>    
        </div>
    </div>
