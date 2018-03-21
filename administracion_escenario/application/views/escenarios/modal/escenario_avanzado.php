<?=construye_header_modal('modal_delete_artista', "Eliminar artista del escenario "   );?>                                                        
  <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>        
            ¿Realmente desea eliminar el artista del escenario 
            <div class='pull-right'> 
              <button type="button" class="btn btn-default" id="aceptar_delete_artista" data-dismiss="modal">
                Aceptar
              </button>
              <button type="button" class="btn btn-default" data-dismiss="modal">
                Cancelar
              </button>                
            </div>
            <div class='place_delete_artista'>
            </div>
        </div>    
    </div>    

<?=construye_footer_modal()?>  
<!---->

<!---->
<?=construye_header_modal('modal-platilla-escenarios', " Usar plantilla " );?>
    
    <?=n_row_12()?>
    <div class='place_tmp_escenario'>
    </div>
    <div class='tmp_escenario'>
    </div>
    <?=end_row()?>
<?=construye_footer_modal()?> 
<!---->




<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<?=construye_header_modal('edit-status-confirmacion', "Estado del artista " );?>               
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm'>
            <span>
                Participación en el evento 
            </span>
        </div>
        <div class='col-lg-9 col-md-12 col-sm-12'>
            <div class='input-group'>
                <span class="input-group-addon">
                    Confirmación
                </span>
                <?=get_status_confirm( 'status-artista', 'status-artista-evento' , 'status-artista-evento' )?>        
            </div>                
            <input type='hidden' id='dinamic-artista'>                            
        </div>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <span id="place_estatus_artista" class='place_estatus_artista'> 
            </span>
        </div>        
        <div class='col-lg-3 col-md-12 col-sm-12 seccion-btn-confim'>
            <button class="btn btn-default btn_save pull-left btn-participacion">
                Registrar
            </button>
        </div>

        
    </div>
    
<?=construye_footer_modal()?>           
<!--************************termina de  configura el status del artista en este escenario ***********************************-->



<!--Inicia modal -->
<?=construye_header_modal('modal-img-escenario-principal', " Galería de imagenes  escenario - <span class='nombre_escenario_lb'> </span>" );?>  
    <div class='row'>
        <div class="col-md-12 col-lg-12 col-sm-12">            
            <div class='imagenes_escenario_form'>
            </div>
            <div class='place_img_escenario'>
            </div>
        </div>    
    </div>    
<?=construye_footer_modal()?> 
<!--Termina modal-->


<?=construye_header_modal('modal_nota', "Mensaje del artista a su público, historia, nota , etc   " );?>   
    
    <?=n_row_12()?>
        <div class='well background_panel_enid_artistas'>
            <form  id="form-arista-nota"  action="../escenarios/index.php/api/escenario/escenario_artista_social/format/json/">
                <div>
                    <label for="nota_artista" class="control-label white">
                        Mensaje del artista al público
                    </label>
                    <textarea class="form-control" id="nota_artista" name="nota_artista" required="">
                    </textarea>
                    <input type='hidden' name='idartistanota' id="idartistanota" >                                                            
                </div>      

                <div class='btn-nota-registro'>
                    <div class='place_nota_artista'>
                    </div>                    
                    <br>
                    <button class="btn btn-default btn_save " type="submit">
                        Registrar
                    </button>
                </div>

            </form>                
        </div>    
    <?=end_row()?>
<?=construye_footer_modal()?>  
<!--Termina modal -->




<?=construye_header_modal('modal-img-artista-evento', "Imagen del artísta  " );?>  
     <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 '>        
            <div class='imagenes_artista_form'>
            </div>
            <div class='place_img_artista'>
            </div>
        </div>
    </div>
<?=construye_footer_modal()?> 
<!--TERMINA para definir la hora de inicio y termino en la presentación de un artista-->




<!---->
<?=construye_header_modal('modal-date-escenario', "Fecha el escenario - <span class='nombre_escenario_lb'> </span> " );?> 
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 '>
            <form id="form-nueva-fecha">            



            <div class='row'>
                <div class='col-lg-12 col-md-12 col-sm-12'>
                  <div class='calendar-1'>        
                      <label class='text-inicio'>
                        Día Inicio    
                      </label>                    
                      <input data-date-format="yyyy-mm-dd" value="<?=now_enid();?>" id="inicio" 
                        class='form-control input-sm'  name="inicio"  size="10" required >                        
                  </div>        
                  <div class='calendar-2'>    
                      <label class='text-termino'>
                        Día  Termino                 
                      </label>                                    
                      <input name="termino" data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                        id="termino" class='form-control input-sm' size="10" required>                
                  </div>
                </div>                 
            </div>
                

                

                    <span class="help-block">
                        Fecha para este escenario
                    </span>
                    <button class='btn btn-default btn_save' id='btn-guardar-fecha'>
                        Registrar
                    </button>
                    <div class='place_fechas_evento'>                       
                    </div>
            </form>
        </div>
    </div>    
<?=construye_footer_modal()?>  







<?=construye_header_modal('modal_tipo_artista', "Tipo de partición   " );?>        

    <form action='../escenarios/index.php/api/escenario/artista_tipo/format/json/' id='tipo-artista-form' class='tipo-artista-form'>    
        <?=n_row_12()?>
            <div class="input-group">
                <span class="input-group-addon">
                            Participación  
                </span>                                                                                             
                <?=get_tipos_paticipacion()?>
            </div>
        <?=end_row()?>
        <br>
        <?=n_row_12()?>
            <center>
                <button title='Establecer el tipo de artista' type="submit" class="btn btn-default btn_save" >                
                                Registrar
                </button>             
            </center>
        <?=end_row()?>   

        <?=n_row_12()?>
            <div class='place_tipo_artista'>                 
            </div>  
        <?=end_row()?>                                                      
    </form>                    
<?=construye_footer_modal()?>  

<!--*********************** ***********************   ***********************  ***********************  ***********************  -->
<?=construye_header_modal('modal_record_horario', " Horario de presentación   " );?>  
    <div class='well background_panel_enid_artistas'>
        <div class='row'>
            <div class='text_estado_artista col-lg-12 col-md-12 col-sm-12'>                            
                <span class='artista_estado_actual'>
                </span>
            </div>
        </div>
        <br>

        <div class='row'>
            <div class='col-lg-6 col-md-6 col-sm-6'>                            
                    <label class="control-label white">
                        Hora de inicio
                    </label>
                    <div class="">
                        <div class="input-group bootstrap-timepicker">
                            <input class="form-control timepicker-default" id="hiartista" name="hiartista" type="text">
                            <span class="input-group-btn">
                                <button class="btn" type="button">
                                  <i class="fa fa-clock-o">
                                  </i>    
                                  Inicio
                                </button>
                            </span>
                        </div>
                    </div>
                                
            </div>  
            <div class='col-lg-6 col-md-6 col-sm-6'>                            
                    <label class="control-label white">
                        Hora de término
                    </label>
                    
                        <div class="input-group bootstrap-timepicker">
                            <input class="form-control timepicker-default" id="htartista" name="htartista" type="text">
                            <span class="input-group-btn">
                                <button class="btn" type="button">
                                    <i class="fa fa-clock-o">
                                    </i>
                                    fin
                                </button>
                            </span>
                        </div>
                    
            </div>                        
        </div>

            
        
    </div>
    <?=n_row_12()?>
            <div class='place_horario_artista'>            
            </div>       
            <button type="button" class="btn btn-default btn_save guardar_horario" >
                Registrar
            </button>
    <?=end_row()?>
    
<?=construye_footer_modal()?> 
<!---->




<!--link youtube inicia -->
<?=construye_header_modal('modal_link_youtube', " Video  de Youtube" );?>  

    <?=n_row_12()?>
            <form id="form-arista-social-youtube"
            action="../escenarios/index.php/api/escenario/escenario_artista_social/format/json/">
                <div class="input-group">
                    <span class="input-group-addon">
                        Youtube 
                        https://www.youtube.com/watch?v=: 
                    </span>
                    <input  id="url_youtube" name='url' class="form-control input-sm" placeholder="" type="url" required>
                    <input type='hidden' id='dinamic_artista_youtube' name='dinamic_artista_sound'> 
                </div>            
                <br>
                <center>
                    <button class="btn btn-default btn_save" type="submit">
                            Registrar
                    </button>
                </center>
            </form>

    <?=end_row()?>           
    
    <?=n_row_12()?>    
        <div class='place_url_youtube'>
        </div> 
    <?=end_row()?>       
        
    
<?=construye_footer_modal()?> 
<!--link youtube termina -->





<!--Sound cloud-->
<?=construye_header_modal('modal_link_sound', "Sound cloud  " );?>                                    
    
    <?=n_row_12()?>
        <form  id="form-arista-social-sound" 
              action="../escenarios/index.php/api/escenario/escenario_artista_social/format/json/">
            <div class="input-group">
                <span class="input-group-addon">
                 Sound Cloud https://soundcloud.com/
                </span>
                <input name="url"  id="url_sound" class="form-control input-sm" placeholder="" type="url" required>
            </div>
            <input type='hidden' id='dinamic_artista_sound' name='dinamic_artista_sound'>
            <br>
            <center>
                <button class="btn btn-default btn_save " type="submit">
                    Registrar
                </button>
            </center>
        </form>
        <div class='place_url_sound'>            
        </div>
    <?=end_row()?>   
<?=construye_footer_modal()?>  
<!---->


<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<?=construye_header_modal('edit-nombre-artista', " Nombre del artista " );?>                              
    <div class="input-group" >
        <span class="input-group-addon">
        Artista
        </span>
        <input type="text" class="form-control" id='nuevo-nombre-artista'>
    </div>            
    <span id="place_nombre_artista" class='place_nombre_artista'>
    </span>                                                        
    <div  class='separate-enid'>
    </div>
    <button type="button" id='modifica-nombre-artista' class="btn btn-default" >
        Modificar
    </button>                
<?=construye_footer_modal()?>    
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->


























<!--Cargar escenario al evento  modal inicia -->
<?=construye_header_modal('modal-nuevo-escenario-evento', " Cargar escenario al evento" );?>                                                        
    <div class='estado_registro_escenario'></div>
    <form method="POST" class='registra-nuevo-escenario-form' id="registra-nuevo-escenario-form">                    
        <div class="form-group">  
            <input type="text" class="form-control" id="nuevo-escenario" name='nuevoescenario' placeholder='Nombre del escenario' required >
        </div>
        <div class='place_nuevo_escenario'>
        </div>
        <button class="btn btn-default btn_save" type="submit">
            Registrar
        </button>
    </form>                    
<?=construye_footer_modal()?>  
<!--Cargar escenario al evento  modal Termina  -->






<!---->
