<div class='seccion-portada-escenario'>
        
    <?=n_row_12()?>
        <div class='place_slider'>
        </div>
        <div class='slider-principal-escenario' id='slider-principal-escenario'>                                
        </div>
    <?=end_row()?>   


    <?=n_row_12()?>
        <?=template_text_img("img-button-more-imgs" ,  "img-button-more-imgs"  , "#modal-img-escenario-principal" ,  $title ='Cargar imagenes de portada para el escenario' )?>    
    <?=end_row()?>   
    
    <?=n_row_12()?>    
        <div class='response_img_portada_escenario' id='response_img_portada_escenario'>
        </div>  
    <?=end_row()?>   


    
    <div class='config_general'>                               
        <?=n_row_12()?>               
            <div class='place_fecha_2'>
            </div>
        <?=end_row()?>   

        <?=n_row_12()?>                           
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <a data-toggle="modal" id='fecha-esc' data-target="#modal-date-escenario" title='Fecha para éste escenario'>                                        
                    <i class="fa fa-calendar">
                    </i>                                          
                    <?=fechas_enid_format($data_escenario["fecha_presentacion_inicio"] , $data_escenario["fecha_presentacion_termino"] )?>                        
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
    
    <div class='separate-enid'>
    </div>
</div>





<?=titulo_enid("Escenario - " . $data_escenario["nombre"] )?> 
<?=titulo_enid("La historía la haces tu.!")?> 
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
            



    <?=titulo_enid("Artistas")?> 
    <?=n_row_12("config-general-escenario")?>
        <div class="place_artista">
        </div>
    <?=end_row()?>               

    <?=n_row_12()?>                
        <form role="form" class="form-inline" id="form-escenario-artista" >
            <div class="form-group todo-entry">                     
                <input placeholder="Artista" 
                            class="form-control input-sm input_new_artista"
                            id="artista" 
                            name="nuevoartista" 
                            type="text">                                                                              
                <input type="hidden" name="idescenario" value="<?=$data_escenario["idescenario"]?>">
            </div>
            <button class="btn btn-primary pull-right nuevo_artista_btn" type="submit">
                +
            </button>
        </form>                        
    <?=end_row()?>                            


<hr>

<?=n_row_12("config-general-escenario")?>            
    <div class='response_img_artista' id='response_img_artista'>
    </div>                                              
<?=end_row()?>                            

<?=n_row_12()?> 
    <div class='place_config_artistas'>
    </div>          
<?=end_row()?>                            


<?=n_row_12()?> 
    <div class='place_artistas'>
    </div>  
<?=end_row()?>                            

<?=n_row_12()?> 
    <div class='artistas-escenario-section' id='artistas-escenario-section'>   
    </div>
<?=end_row()?>                            

    