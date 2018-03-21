<div class='well' style="background:#0093FF!important">

<?=titulo_enid("Información del escenario")?> 
    <div class='config_general'>                               
        <?=n_row_12()?>               
            <div class='place_fecha_2' >
            </div>
        <?=end_row()?>   

        <?=n_row_12()?>                           
            <div class='col-lg-12 col-md-12 col-sm-12'>

                <a data-toggle="modal" id='fecha-esc' data-target="#modal-date-escenario" title='Fecha para éste escenario'>                                        
                    <i class="fa fa-calendar fa-2x white">
                    </i>                                          
                    <span class='white strong'>
                        <?=fechas_enid_format($data_escenario["fecha_presentacion_inicio"] , $data_escenario["fecha_presentacion_termino"] )?>                        
                    </span>
                </a> 
            </div>           
        <?=end_row()?>   


        <?=n_row_12()?>   
            <div class='tipos-escenarios'>                
                <div  class="btn-group-vertical" role="group" aria-label="Vertical button group">    
                    <span class='place_tipo'>
                    </span>
                    <div class="btn-group btn-sm " role="group">
                        <button id="" type="button" class="btn btn-default dropdown-toggle button-tipo-escenario " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">            
                            <?=get_start($data_escenario["tipoescenario"] , "Principal")?>
                            <span class="caret">
                            </span>
                        </button>
                        <?=template_btn_tipos()?>                    
                    </div>     
                </div>  
            </div>
        <?=end_row()?>   
    </div>



<?=n_row_12("config-general-escenario")?>
    <div class='place_descripcion'>
    </div>                
    <div class='seccion-descripcion-escenario'>                    
        <span title='Actualiza la experiencia que vivirá el publico en el escenario' class='descripcion-escenario-text'>                                                                            
            <?=format_descripcion($data_escenario["descripcion"])?>
        </span>
        <div class='section-descripcion-escenario-in'>
            <textarea id="in-descripcion-escenario" name="descripcion_escenario"  class="form-control" placeholer="Message">
                <?=$data_escenario["descripcion"]?>
            </textarea>             
            <?=template_btn_plantilla("button-template" , "template_escenario" , "#modal-platilla-escenarios" )?>                
        </div>            
    </div>    
    <?=valida_btn_show_down_contect($data_escenario["descripcion"] , 700 )?>
<?=end_row()?>               
</div>