<?=construye_header_modal('prueba-enid', "Enid Service" );?>                                
    <div class='place_notificacion'>         
    </div>
<?=construye_footer_modal()?>  


<!--************************************************** NOTA DEL CONTACTO-->
<?=construye_header_modal('reservaciones-modal', "Reservaciones" );?>                           
   <form class='form-servaciones' id='form-servaciones'
    action="<?=base_url('index.php/api/emp/reservacion/format/json/')?>">  
    
        <div class="input-group m-bot15">
            <span class="input-group-addon">
                Tel.
            </span>
            <input class="form-control input-sm" name="reservacion_tel" id="reservacion_tel" placeholder="Teléfono" maxlength="10" required="" type="tel">                                                                
        </div>

        <span class='place_tel'>            
        </span>
        


        <div class="input-group m-bot15">
            <span class="input-group-addon">
               Correo @
            </span>
            <input id='reservacion_mail' class="form-control input-sm" name="reservacion_mail" placeholder="arithgrey@gmail.com" type="text">
        </div>

        <br>
        <button  id="button-registrar" class="btn btn-default btn_save ">
            Registrar 
        </button>
        <input type="hidden" name="dinamic_event"  class='dinamic_event' id='dinamic_event' >
   </form>           
   <span class='place_reservaciones'>       
   </span>
<?=construye_footer_modal()?>  









<?=construye_header_modal('modal-nuevo-escenario-evento', " Cargar escenario al evento  " );?>    
    <form method="POST" class='registra-nuevo-escenario-form' id="registra-nuevo-escenario-form">                    
        <div class="form-group">  
            <input type="text" class="form-control" id="nuevo-escenario" name='nuevoescenario' placeholder='Nombre del escenario' required >
            <div class='place_nombre_escenario'>
            </div>
        </div>
        <button class="btn btn-default btn_save" type="submit">
            + Registrar
        </button>
        <input type='hidden' name='evento_escenario' class='evento_escenario'>
        <div class='place_nuevo_escenario'>
        </div>
    </form>                    
<?=construye_footer_modal()?>  
<!--Registro de eventos modal -->




<?=construye_header_modal('modal-nuevo-evento', "Registrar evento");?>        
    
    <div class='place_enid_eventos'>        
    </div>    
    <div class='place_enid_eventos_venta'>        
    </div>    
    
        <div class='seccion-form-eventos'>
            
            <form  method="POST" id="nuevo-evento-form">                                         
                <div class='col-lg-12'>
                    <div class='place_nuevo_evento'>
                    </div>  
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="nuevo_evento">
                    Evento
                  </label>  
                  <div class="col-md-8">
                    <input id="nombre-nuevo-evento" name="nuevo_evento" placeholder="Nombre de tu evento" class="form-control input-md" required="" type="text">                    
                  </div>
                </div>
                <div class='col-lg-12'>
                    <div class='place_nombre'>
                    </div>                    
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="nueva_edicion">
                    Edición
                  </label>  
                  <div class="col-md-8">
                  <input id="nueva_edicion" name="nueva_edicion" placeholder="Ejemplo  México 2017" class="form-control input-md" type="text">                    
                  </div>
                </div>




                <div class="form-group">
                  <label class="col-md-4 control-label" for="nueva_edicion">
                    Fecha inicio 
                  </label>  
                  <div class="col-md-8">
                    <input type="" data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  id="fecha_inicio" class='form-control input-sm'  name="nuevo_inicio" size="10" required >                        
                  </div>
                </div>



                 <div class="form-group">
                  <label class="col-md-4 control-label" for="nueva_edicion">
                    Fecha término
                  </label>  
                  <div class="col-md-8">
                    <input  type="" name="nuevo_termino"  data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                                id="fecha_termino"  class='form-control input-sm' size="10" required>                

                  </div>
                </div>

                <?=n_row_12()?>
                    <span class='place_format_fecha'>                    
                    </span>
                <?=end_row()?>


   


                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        
                        <!--
                        <div class='calendar-1'>        
                            <label class='text-inicio'>
                                Día Inicio    
                            </label>                    
                            <input type="" data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  id="fecha_inicio" class='form-control input-sm'  name="nuevo_inicio" size="10" required >                        
                        </div>        
                    

                        <div class='calendar-2'>    
                            <label class='text-termino'>
                                Día  Termino                 
                            </label>        
                            
                            <input  type="" name="nuevo_termino"  data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                                id="fecha_termino"  class='form-control input-sm' size="10" required>                
                        </div>
                        -->
                    </div>            
                </div> 
                <!--
                <div class="row">
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <span class='place_format_fecha'>                    
                        </span>
                    </div>    
                </div>-->
                

                <br>
                <button class="btn btn-default btn_save" type="submit">                        
                    Registrar
                </button>                                                          
            </form>                    
        </div>
    
    
<?=construye_footer_modal()?>  

