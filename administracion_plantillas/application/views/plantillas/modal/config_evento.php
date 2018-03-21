<!--Cargamos la plantilla de  descripciones -->
<?=construye_header_modal('modal-descripcion-eventos', " La experiencia en los eventos " );?>  
    <?=n_row_12()?>        
        <div class='place_n_experiecia'>
        </div>
    <?=end_row()?>
    <?=n_row_12()?>        


            <form action="" class="form-horizontal nueva-descripcion-template" id="nueva-descripcion-template">    
                <div class="input-group">                                                                                                  
                    <input type="hidden" name="type" value="1">
                </div>
                <div class="template-f-seccion">
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            Plantilla
                        </span>                                        
                        <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name"
                         class="form-control input-sm input_experiencia" placeholder="Nombre que la identifique" required>                                          
                        <div class='place_val_experiencia'>
                        </div>
                    </div>                                
                </div>
                <div class='template-a-seccion'>
                    <textarea rows="5" class="form-control input-sm" name="contenido_text" id="descripcion-contenid-templ" required placeholder="contenido">
                    </textarea>     
                </div>            
                <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                    Registrar
                </button>                                                                   
            </form>
    <?=end_row()?>

<?=construye_footer_modal()?>  


<!--Cargamos la plantilla de  politicas -->
<?=construye_header_modal('modal-politica-eventos', " Políticas en los eventos " );?>  
    <div class='row'>
        <div class='place_n_politica'>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <form class="form-horizontal nueva-politica-template" id="nueva-politica-template">        
                <div class="input-group">                                                                                              
                    <input type="hidden" name="type" value="4">
                </div>
                <div class="template-f-seccion">
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            Titulo del contenido 
                        </span>                                        
                        <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control input-sm input_politica " placeholder="" aria-describedby="sizing-addon1" required>                                          
                        <div class='place_val_politica'>
                        </div>
                    </div>
                </div>
                <div class='template-a-seccion'>                        
                    <textarea rows="5" class="form-control" name="contenido_text" id="contenido_descripcion" required>
                    </textarea>                
                </div>    
                <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                    
                    Registrar
                </button>                                                                                                            
            </form>  

        </div>
    </div>    
<?=construye_footer_modal()?>  
<!--Terminamos de cargar la plantilla de  politicas -->







<!--Cargamos la plantilla de  politicas -->
<?=construye_header_modal('modal-articulo-eventos', " Artículo" );?>  
    <div class='row'>
        <div class='place_n_articulo'>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>        
            <form  class="form-horizontal" id="form-articulo-permitido">    
                <div class="template-f-seccion">
                    <div class="input-group">    
                        <span class="input-group-addon" id="sizing-addon1">
                                Articulo permitido
                        </span>
                        <input placeholder="Nuevo articulo" class="form-control" name='nuevo_articulo' id='nuevo-articulo' style="width: 100%" type="text" required>                                                                                                                        
                        <div class='place_val_articulo'>
                        </div>
                    </div>       
                </div>           
                <div class='template-a-seccion'>
                    <textarea rows="5"  class="form-control"   name="nueva_descripcion" id="nueva_descripcion" >
                    </textarea>
                </div>
                <button class="btn btn-default btn_save" type="submit">
                    Registrar
                </button>
            </form>
        </div>    
    </div>        
<?=construye_footer_modal()?>            
<!--Terminamos de cargar la plantilla de  politicas -->


<?=construye_header_modal('modal-restriccion-eventos', " Restricción en los eventos" );?> 
    <?=n_row_12()?>
        <div class='place_n_restriccion'>
        </div>    
    <?=end_row()?>

    <?=n_row_12()?>
            <form  id="new-contenido-form">        
                <div class="template-f-seccion">
                    <div class="input-group">                                                                                      
                        <span class="input-group-addon" id="sizing-addon1">
                            Restricción 
                        </span>                                        
                        <input placeholder="Nueva restricción" class="form-control input-sm input_restriccion" name='nuevo_contenido_name' id='nuevo-contenido-name'  type="text" required>
                        <div class='place_val_restriccion'>
                        </div>
                    </div>                                                             
                    <div class="input-group">                                                                                      
                        <input type='hidden' name="type" value="3">
                    </div>
                </div>                                                                                 
                <div class='template-a-seccion'>                
                    <textarea rows="4"   placeholder="Registra la descripción de la restricción" id='contenido_text'  class='contenido_text form-control input-sm' name='contenido_text' required>
                    </textarea>                                                                                                                                                
                </div>     
                <button class="btn btn-default btn_save" type="submit">
                    Registrar
                </button>                    
            </form>             
    <?=end_row()?>
    
<?=construye_footer_modal()?>         





<!--Terminamos de cargar la plantilla de  politicas -->
<?=construye_header_modal('modal_confirmar', "Eliminar plantilla" );?>  
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            ¿Realmente desea eliminar la plantilla? 
        </div>        
    </div>
    
    <div class='row'> 
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <button type="button" class="btn btn-default aceptar_eliminar" id="aceptar_eliminar" data-dismiss="modal">
                Aceptar
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Cancelar
            </button>                
        </div>        
    </div>
    <div class='place_delete_template'>
    </div>
<?=construye_footer_modal()?>            




















<?=construye_header_modal('config_obj', "Configurar " );?>      
    <div class='row'>
        <div class='place_config_obj'>
        </div>
        <div class='place_c_articulo'>
        </div>
    </div>
        <?=n_row_12()?>        
            <form  class="form-horizontal" id="form_conf_articulo">    
                <div class="template-f-seccion">
                    <div class="input-group">    
                        <span class="input-group-addon" id="sizing-addon1">
                            Articulo permitido
                        </span>
                        <input placeholder="artículo" class="form-control" name='n_articulo' id='n_articulo' style="width: 100%" type="text" required>                                                                                                                        
                    </div>       
                </div>           
                <div class='template-a-seccion'>
                    <textarea rows="5"  class="form-control"   name="n_descripcion" id="n_descripcion" >
                    </textarea>
                    <input value='' type='hidden' name='id_obj' id='nid_obj'>        
                </div>    
                <button class="btn btn-default btn_save" type="submit">
                    Registrar
                </button>
            </form>
        <?=end_row()?>  
<?=construye_footer_modal()?>            




<?=construye_header_modal('eliminar_obj', "Eliminar" );?>  
    <div class='place_eliminar_obj'>
    </div>
    ¿Realmente desea eliminar la plantilla? 
    <div class='pull-right'> 
      <button type="button" class="btn btn-default aceptar_obj_eliminar" id="aceptar_eliminar" data-dismiss="modal">
        Aceptar
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
        Cancelar
      </button>                
    </div>
<?=construye_footer_modal()?>            







<!--
<?=construye_header_modal('modal-experiencia', " La experiencia que se vivirá en el escenario" );?>  
    <div class='place_nueva_experiencia_escenario'>
    </div>    
    <form action="../plantillas/index.php/api/templ/templates_content/format/json/" class="form-horizontal form_escenario tmp-escenario" id="form_escenario">
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <div class="template-f-seccion">                                                                                                               
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">                                    
                            Titulo del contenido 
                        </span>                                        
                        <input type="text"  id="tnuevo_contenido_name" name="nuevo_contenido_name" class="form-control input_escenario" placeholder="" aria-describedby="sizing-addon1" required>                                          
                        <div class='place_val_escenario'>
                        </div>
                        <div class="input-group">                                                                                                  
                            <input type="hidden" name="type" value="5">
                        </div>
                    </div>
                </div>    
                <div class='template-a-seccion'>
                    <textarea rows="5" class="form-control" name="contenido_text" id="contenido_text" required>
                    </textarea>  
                </div>         
                <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                    Registrar 
                </button>                                               
            </div>
        </div>
    </form>    
<?=construye_footer_modal()?>                      
-->