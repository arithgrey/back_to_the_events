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
<?=construye_header_modal('editar-acceso', "Información del acceso" );?>            
    
    <div class='place_editar_acceso'>
    </div>    
    
    <form class='dinamic-form-accesos' id='dinamic-form-accesos' action="../accesos/index.php/api/accesos/acceso/format/json/" >        

        <div class='col-lg-4'>
            <?=create_select( $tipos_accesos  , 'nuevo_tipo_acceso' , 'form-control  nuevo-tipo-acceso' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');  ?>                
        </div>
        <div class='col-lg-4'>
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
        </div>
        <div class='col-lg-4'>
            <?=get_select_divisas("nueva_moneda" , "nueva_moneda form-control" , "nueva_moneda")?>              
        </div>
        
        <div class='col-lg-6'>
            <div class="input-group ">
                <span class="input-group-addon">
                    Día inicio
                </span>
                
                <input type="" 
                        data-date-format="yyyy-mm-dd" 
                        value="<?=now_enid();?>"  
                        id="nuevo_inicio_acceso" 
                        class='form-control input-sm'  
                        name="nuevo_inicio_acceso"  
                        size="10" 
                required >                        
            
            </div>

                
                
            
        </div>
        <div class='col-lg-6'>
            
            <div class="input-group ">
                <span class="input-group-addon">
                    Día termino
                </span>                
                <input  type="" 
                        name="nuevo_termino_acceso"  
                        data-date-format="yyyy-mm-dd" 
                        value="<?=now_enid();?>"  
                        id="nuevo_termino_acceso"  
                        class='form-control input-sm' 
                        size="10" 
                        required>                
            </div>        
            <span class='place_val_date_2'>                            
            </span>
        </div>
                    
                
        <br>
        <div class='col-lg-12'>
            <br>
            <div class="form-group">      
                <div class='text-left'>
                    <span class='black strong '>
                        Información adicional 
                    </span>
                </div>                  
                <textarea name='nueva_descripcion' id='nueva-descripcion' rows="3" class="form-control">
                </textarea>                       
            </div>                                
        </div>
        <button class="btn btn-default btn_save  new-acceso">
            Registrar cambios
        </button>            
    </form>               
<!--Termina la edición -->
<?=construye_footer_modal()?>                                                       


<!--************************* ************************* ************************* ************************* -->
<?=construye_header_modal('nuevo-acceso-modal', "Agregar acceso al evento -  <span class='place_info_nombre_evento'></span>" );?>      
            <span class='place_registro_acceso'>
            </span>
            <form id="form-new-acceso" action="../accesos/index.php/api/accesos/acceso/format/json" method="post">
                
                <div class='col-lg-3'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            Tipo
                        </span>                                 
                        <?=create_select($tipos_accesos , 'tipo' , 'form-control nuevo-tipo-acceso ' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');?>                
                    </div>                              
                </div>                              

                <div class='col-lg-3'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            Acceso
                        </span>
                        <input  type="text" class='form-control input-sm acceso_input' name='acceso_nombre' id='acceso_nombre' required >
                    </div>
                    <span class='place_nombre_promo_vali validado'>
                    </span>                    
                </div>
                
                <div class='col-lg-3'>
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
                </div>                        

                <div class='col-lg-3'>
                    <?=get_select_divisas("moneda" , "moneda form-control" , "moneda" )?>        
                </div>
                
                        
                <div class='col-lg-6'>            
                    <div class="input-group ">
                        <span class="input-group-addon">
                            Fecha inicio
                        </span>                
                        <input  
                            data-date-format="yyyy-mm-dd" 
                            value="<?=now_enid();?>"  
                            id="fecha_inicio" 
                            class='form-control input-sm'  
                            name="inicio"  
                            size="10" 
                            required >                        
                                
                    </div>        
                </div>    
                
                <div class='col-lg-6'>            
                    <div class="input-group ">
                        <span class="input-group-addon">
                            Fecha inicio
                        </span>                

                            <input  type="" name="termino"   data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                                id="fecha_termino"  class='form-control input-sm' size="10" required>                
                        
                    
                            <span class='place_val_date'>                            
                            </span>
                    
                    </div>
                </div>

                <div class='col-lg-12'>
                    <div class='text-left'>
                        <span class='black strong '>
                            Información adicional 
                        </span>
                    </div>                  

                    <textarea name='descripcion' id='descripcion' rows="6" class="form-control input-sm">
                    </textarea> 
                    <br> 
                </div>                 
                <div class='col-lg-12'>                        
                    <button class="btn btn-default btn_save  acceso-registro-button">
                        Registrar acceso 
                    </button>           
                </div>
            </form>   
        
<?=construye_footer_modal()?>   

<?=construye_header_modal('info_nota_acceso', "Observaciones acceso - <span class='place_info_nombre_acceso'> </span>" );?>    
    
        <div class='well' style='background:#428BCA;'>
            <span class='place_info_nota_acceso'>
            </span>
        </div>
<?=construye_footer_modal()?>                                                       

