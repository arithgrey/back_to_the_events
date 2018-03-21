    <?=n_row_12()?>
        <?=btn_call_to_action(1 , "btn_call_to_action pull-right" , "btn_call_to_action" , "" , "Califícanos",  create_url_historias($data_empresa["idempresa"]) )?>        
    <?=end_row()?>            
    <?=n_row_12()?>
        <span class="designation">              
            Origen   
            <?=modal_localizacion($in_session, $data_empresa["countryName"])?>                        
        </span>                
        <span class='place_empresa_locacion'>                      
        </span>
    <?=end_row()?>        
    <?=n_row_12()?>
        <?=edita_section_mensaje_comunidad( $data_empresa["mensaje_comunidad"] ,  $in_session , "text-edit-mensaje-comunidad")?>
        <div class='place-msj-comunidad' id='place-msj-comunidad'>
        </div>            
    <?=end_row()?>

    <div class='contenedor-mision'>
        <?=titulo_enid("Misión")?> 
        <?=n_row_12()?>                 
            <?=validate_info_emp($data_empresa["mision"], $in_session  ,  "mision-empresa-text" )?>
            <div class='response-update-mision'>
            </div>
        <?=end_row()?>
        <div id="section-mision-empresa" class='section-mision-empresa' >      
            <?=n_row_12()?>    
                <label>
                    Misión 
                    <?=$data_empresa["nombreempresa"]?>
                </label>
                <div class="form-group">                                     
                    <textarea  class="form-control mision-empresa-input  input-sm" id='mision-empresa-input' 
                                rows="6" > 
                            <?=$data_empresa["mision"]?>
                    </textarea>                       
                </div>                                      
            <?=end_row()?>
        </div>
    </div>        

    <div class='contenedor-vision'>          
        <?=titulo_enid("Visión")?>                      
        <?=n_row_12()?>
            <?=validate_info_emp($data_empresa["vision"], $in_session  ,  "vision-empresa-text" )?>
            <div class='response-update-vision'>
            </div>                      
        <?=end_row()?>

        <?=n_row_12()?>    
            <div id="section-vision-empresa" class='section-vision-empresa'>  
                <label class='h_emp'>
                      Visión 
                    <?=$data_empresa["nombreempresa"]?>
                </label>
                <div class="form-group">                     
                    <textarea   class="form-control descripcion-vision-input  input-sm"  id='descripcion-vision-input' rows="6">        
                    <?=$data_empresa["vision"]?>
                    </textarea>                       
                </div>                                                                          
            </div>
        <?=end_row()?>
    </div>
    <!---->
