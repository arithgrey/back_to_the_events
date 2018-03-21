
        <?=n_row_12()?>
            <?=titulo_enid("Precios")?> 
            <span class='text-accesos-more'>            
                <?=valida_registro_promociones(lista_accesos_publicos($data_accesos , $in_session ,   $data_evento["idevento"]  )["num_accesos"] ,  $in_session ,  $data_evento["idevento"] )?>                                     
            </span>
        <?=end_row()?>    

        <?=n_row_12()?>
            <div class='accesos_seccion'>
                <div class='btn_more_accesos'>                                                    
                </div>
                <div class='accesos_seccion_contenedor'>
                    <?=lista_accesos_publicos($data_accesos , $in_session ,  $data_evento["idevento"] )["accesos"] ?>                                                                                               
                </div>
            </div>                                        
        <?=end_row()?>    