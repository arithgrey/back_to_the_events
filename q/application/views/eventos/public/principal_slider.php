<?=n_row_12()?>
    <div class='seccion_principal-portada'>            
        <section>    
            <div class='seccion_slider'>
            </div>
            <div class='place_slider'>
            </div>
        </section>                          
    </div>        
<?=end_row()?>      



        
<div class='col-lg-8 col-md-8 col-sm-12 '>    
    <div class='row'>


        <?=titulo_enid("La historia la haces tú!")?> 
        <?=n_row_12()?>
            <span class='dias_restantes'>
                <?=$dias_restantes_evento?>                
            </span>            
        <?=end_row()?>    


        <?=n_row_12()?>            
            <span>
                <?=create_text_edicion($evento["edicion"] ,  $in_session, $evento["idevento"] )?>        
            </span>                
        <?=end_row()?> 

        <?=n_row_12()?>            
            <?=get_tags_generos($list_generosdb , $evento['idevento']  , $in_session )?>            
        <?=end_row()?> 


        
        <?=n_row_12()?>
            <div class='descripcion-experiencia'>
                <span>
                    <?=create_text_descripcion($evento["descripcion_evento"] ,  $in_session  , $evento["idevento"])?>
                </span>        
            </div>        
        <?=end_row()?> 
        


        <?=titulo_enid("Escenarios del evento")?>
        

        <?=n_row_12()?>
            <div class='seccion_escenarios'>
            </div>
            <div class='place_escenarios'>
            </div>
        <?=end_row()?>      
        
        <a href="<?=url_dia_evento($evento['idevento'])?>">                
            <?=titulo_enid("Lo permitido")?>
        </a>
        
        <?=n_row_12()?>
            <span>                    
                <?=create_resumen_desc($evento["permitido"] , 350  , url_dia_evento($evento['idevento']) )?>                                               
            </span>
            
        <?=end_row()?> 

        
        <a href="<?=url_dia_evento($evento['idevento'])?>">                
            <?=titulo_enid("Las políticas")?>
        </a>
        

        <?=n_row_12()?>
            <span>
                <?=create_resumen_desc($evento["politicas"] , 350  , url_dia_evento($evento['idevento']) )?>                                               
            </span>
        <?=end_row()?> 


        
        <a href="<?=url_dia_evento($evento['idevento'])?>">                
            <?=titulo_enid("Restricciones del evento")?>
        </a> 
        
        <?=n_row_12()?>
            <span> 
                <?=create_resumen_desc($evento["restricciones"] , 350  , url_dia_evento($evento['idevento']) )?>                               
            </span>
        <?=end_row()?>    

        <?=n_row_12()?>
            <?=valida_maps_public($evento['formatted_address'] , $evento['idevento'] )?>    
        <?=end_row()?> 
        
        <?=n_row_12()?>
            <ul class="p-social-link pull-right">        
                <?=evalua_social($evento["url_social"] , "fb" , $in_session )?>
                <?=evalua_social($evento["url_social"] , "yt" , $in_session )?>                
            </ul>  
        <?=end_row()?> 

    </div>
</div>



<div class='col-lg-4 col-md-4 col-sm-12 '>   
    <div class='row'>        
        <?=n_row_12()?>
            <span>
                <?=valida_reservaciones_public(
                    $in_session ,
                    $evento["reservacion_tel"] ,
                    $evento["reservacion_mail"] , 
                    url_evento_view_config($evento['idevento'])."/reservaciones/"
                )?>  
            </span>    
        <?=end_row()?> 
        <?=n_row_12()?>
            <div class='place_bloque_extra'>
            </div>
            <div class='bloque_extra'>
            </div>    
        <?=end_row()?> 
    </div>
</div>  