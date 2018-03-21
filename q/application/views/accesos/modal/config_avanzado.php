
<!--******************************* Cargar del acceso *********************************************-->
<?=construye_header_modal('contactos-relacionados-punto-venta', " Contactos  vinculados al  este punto de venta " );?>    
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <div class='contactos-punto-venta' id="contactos-punto-venta">
            </div>
        </div>        
    </div>    
<?=construye_footer_modal()?>                                                       

<!--***********************************INICIA   CONFIRMAR DELETE ACCESOS MODAL *************************-->
<?=construye_header_modal('confirma-delete-acceso', " Eliminar " );?>    
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <div  class="row">
                <div class='col-lg-12 col-md-12 col-sm-12'>
                    <span class='place_remov_acceso'>  
                    </span>
                    Realmente desea quitar de la lista el acceso??                
                </div>
            </div>
            <div  class="row">
                <div class='col-lg-12 col-md-12 col-sm-12'>
                    <button type="button" class="btn btn-default" id="aceptar-delete-acceso" data-dismiss="modal">
                        Aceptar
                    </button>                        
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar
                    </button>                      

                </div>
            </div>    
        </div>        
    </div>    
<?=construye_footer_modal()?>   
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->



<!--******************************* Cargar del acceso *********************************************-->
<?=construye_header_modal('acceso-imagen-modal', " Imagen " );?>    
    <div class='row'>        
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <div class='place_img_acceso'>
            </div>
            <div class='imagenes_acceso_form'>
            </div>            
        </div>        
    </div>
<?=construye_footer_modal()?>   
<!--************Contenido de la tabla general ********************-->
<?=construye_header_modal('editar-acceso', " Configurar  promoción " );?>            
    <div class='place_editar_acceso'>
    </div>    
    <form class='dinamic-form-accesos' id='dinamic-form-accesos' action="<?=base_url('index.php/api/accesos/acceso/format/json/')?>" >        
        <?=create_select( $tipos_accesos  , 'nuevo_tipo_acceso' , 'form-control  nuevo-tipo-acceso' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');  ?>                
        <input type="hidden" name="acceso" id="acceso" class='acceso' value="">                            
        <div class="input-group ">
            <span class="input-group-addon">
                $
            </span>
            <input maxlength="10"  class="form-control" type="text" name='nuevo_precio' id='nuevo-precio'>
            <span class="input-group-addon ">
                .00
            </span>
        </div>
        <div class='place_nuevo_precio'>
        </div>
        <?=get_select_divisas("nueva_moneda" , "nueva_moneda form-control" , "nueva_moneda")?>              
        



                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <div class='calendar-1'>        
                            <label class='text-inicio'>
                                Día Inicio    
                            </label>                    
                            <input type="" data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  id="nuevo_inicio_acceso" 
                            class='form-control input-sm'  name="nuevo_inicio_acceso"  size="10" required >                        
                        </div>        
                        <div class='calendar-2'>    
                            <label class='text-termino'>
                                Día  Termino                 
                            </label>        
                            
                            <input  type="" name="nuevo_termino_acceso"  data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                                id="nuevo_termino_acceso"  class='form-control input-sm' size="10" required>                
                        </div>
                    </div>            
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <span class='place_val_date_2'>                            
                        </span>
                    </div>
                </div> 


        <!--
        <div class='seccion-date-input'>                    
            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" 
            class="input-append date dpYears"  >
            <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_inicio_acceso" id="nuevo-inicio-acceso"  type="text"  >
                <span class="input-group-btn add-on">
                    <button class="btn btn-primary" type="button">
                        <i class="fa fa-calendar">
                        </i>
                    </button>
                </span>
            </div>
        </div>        
        <div class='seccion-date-input'>                    
            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
            <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_termino_acceso" id="nuevo-termino-acceso"  type="text">
                <span class="input-group-btn add-on">
                    <button class="btn btn-primary" type="button">
                        <i class="fa fa-calendar">
                        </i>
                    </button>
                </span>
            </div>                    
        </div>
        -->





        <label>
            Nota adicional
        </label>
        <div class="form-group">                        
            <textarea name='nueva_descripcion' id='nueva-descripcion' rows="6" class="form-control">
            </textarea>                       
        </div>                                
        <button class="btn btn-default btn_save  new-acceso">
            Registrar cambios
        </button>            
    </form>               
<!--Termina la edición -->
<?=construye_footer_modal()?>                                                       


<!--************************* ************************* ************************* ************************* -->
<?=construye_header_modal('delete-punto-venta-modal', " Eliminar " );?>                
    <?=n_row_12()?>
        <span class='row'>
            Realmente desea quitar punto de venta del evento?              
        </span>
        <div class='row'>             
            <button type="button" class="btn btn-default" id="aceptar-delete-punto-venta" data-dismiss="modal">
                Aceptar
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Cancelar
            </button>                                  
        </div>

    <?=end_row()?>
<?=construye_footer_modal()?>   
<!--************************* ************************* ************************* ************************* -->
<?=construye_header_modal('nuevo-acceso-modal', " Registra promoción " );?>      
    <div class='row'>    
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <span class='place_registro_acceso'>
            </span>
            <form id="form-new-acceso" action="<?=base_url('index.php/api/accesos/acceso/format/json')?>" method="post">
                <div class="input-group">
                    <span class="input-group-addon">
                        Acceso a promocionar
                    </span>
                    <input  type="text" class='form-control input-sm acceso_input' name='acceso_nombre' id='acceso_nombre' required >
                </div>
                <span class='place_nombre_promo_vali validado'>
                </span>                    
                <div class="input-group">
                    <span class="input-group-addon">
                        Tipo de promoción
                    </span>                                 
                    <?=create_select($tipos_accesos , 'tipo' , 'form-control nuevo-tipo-acceso ' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');?>                
                </div>                              
                <div class="input-group">
                    <span class="input-group-addon">
                        $
                    </span>
                    <input maxlength="10" class="form-control input-sm" type="number" name='precio' id='precio-acceso-record'  required>
                    <span class="input-group-addon ">
                        .00
                    </span>                    
                </div>            
                <div class='place_msj_precio'>
                </div>                        
                <?=get_select_divisas("moneda" , "moneda form-control" , "moneda" )?>        

                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <div class='calendar-1'>        
                            <label class='text-inicio'>
                                Día Inicio    
                            </label>                    
                            <input type="" data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  id="fecha_inicio" 
                            class='form-control input-sm'  name="inicio"  size="10" required >                        
                        </div>        
                        <div class='calendar-2'>    
                            <label class='text-termino'>
                                Día  Termino                 
                            </label>        
                            
                            <input  type="" name="termino"   data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                                id="fecha_termino"  class='form-control input-sm' size="10" required>                
                        </div>
                    </div>            
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <span class='place_val_date'>                            
                        </span>
                    </div>
                </div> 
                <label>
                    Nota adicional
                </label>        
                <textarea name='descripcion' id='descripcion' rows="6" class="form-control input-sm">
                </textarea> 
            <br>                                          
                <button class="btn btn-default btn_save  acceso-registro-button">
                    Registrar acceso 
                </button>           
            </form>   
        </div>
    </div>    
<?=construye_footer_modal()?>   