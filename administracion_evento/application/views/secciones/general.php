  <?=n_row_12()?>            
    <div class='well' style='background:#0A2F41;'>
      <div>
        <div class='text-fecha-evento' data-toggle="modal" data-target="#edith_fecha_modal" id="config_data_evento" >                 
          <?=get_date_event_format($data_evento["fecha_inicio"] , $data_evento["fecha_termino"]); ?> 
        </div> 
      </div>


      <span class="designation edicion-evento" title='click para editar'>  
        Edición  <?=show_text_input($data_evento['edicion'] , 2 , "<i class='fa fa-plus white'></i>  Edición del evento" )?>           
      </span> 
      <div class="form-group">      
        <input placeholder="Edición del evento" 
          class="form-control edicion-input input-sm"  
          type="text"
          id="edicion-input" 
          name='edicion-input' value="<?=$data_evento['edicion'];?>">
      </div> 
      <div class='place_edicion_evento'>
      </div>                    
    </div>                   
  
    
    <div class='links_modal'>
      <a id='tipificacion-evento' data-toggle="modal" data-target="#tipo-evento"  class='link_modal'>
        <?=$data_evento['tipo']?>
      </a>              
      <a id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="accesos-button link_modal">           
          <i class="fa fa-cutlery white">
          </i>                                  
          Servicios
      </a>
      <a title='Redes sociales' class="section-left link_modal" data-toggle="modal" data-target="#modal_social_evento" >
          <i class="fa fa-flag white" >
          </i> 
                  Social                 
      </a>                                                                                                  
      <a id="tematica-button" class="section-left  link_modal "  data-toggle="modal" data-target="#modal_tematica_evento">    
        <i class="fa fa-tree white">
        </i> 
        Temática              
      </a>
    </div>   
  
  <?=end_row()?>





<?=n_row_12()?>
  <ul class="nav nav-tabs menu_contenidos_enid">                                  

      <li class="restricciones_section_content tab_restricciones">
        <a href="#portlet_tab3" data-toggle="tab" class='enid-sub-menu'>
          <i class="fa fa-exclamation-triangle">
          </i> 
          Reglamento
        </a>
      </li>
      <li class='permitidonow tab_permitido' title='Lo que el cliente podrá acceder al evento'>
        <a href="#portlet_tab2" data-toggle="tab" class='enid-sub-menu'>
          <i class="fa fa-check permitidonow" >
          </i>
          Lo permitido 
        </a>
      </li>
      <li class="politicas_section_content tab_politicas ">
        <a href="#portlet_tab1" data-toggle="tab" class='enid-sub-menu'>
          <i class="fa fa-circle">
          </i>
                      Políticas 
        </a>
      </li>                    
      <li class="active tab_evento">
        <a href="#portlet_tab4" data-toggle="tab" class='enid-sub-menu' >
                      La experiencia
        </a>
      </li>          
      
      
  </ul>
<?=end_row()?>



<?=n_row_12()?>
<div class="tab-content">
                              
                              <!--Politicas tab-->
                              <div class="tab-pane tab_politicas" id="portlet_tab1">                                            
                                <div class='well' style='background:#0093FF!important'>
                                <?=titulo_enid("Políticas del festival")?>
                                
                                <span class='politicas-p' id='politicas-p'>
                                  <?=show_text_input($data_evento["politicas"] , 250 , "+ Lo que podría anticiparse " )?>
                                </span>                              
                                <div class="form-group">
                                  <textarea id='politicas-evento' placeholder ='' rows="6" class="form-control" >                                  
                                    <?=trim($data_evento["politicas"])?>  
                                  </textarea>
                                </div>                            
                                <div class='place_politicas_evento'>
                                </div>
                                <button  data-toggle="modal" data-target="#templa-politicas"   class='btn btn-template politicas_btn_templ'>
                                  <i class='fa fa-sticky-note'>
                                  </i>+ agregar
                                </button>
                                <div class='place_politicas_tmp'>
                                </div>
                                <div class="list_politicas_evento" id="list_politicas_evento"> 
                                </div>
                                </div>
                              </div>                            
                              <!--Politicas Tab Termina -->                            
                              <div class="tab-pane tab_permitido" id="portlet_tab2">                              
                                <div class='well' style='background:#0093FF!important'>

                                <?=titulo_enid("Lo permitido")?>                              
                                <?=n_row_12()?>
                                  <span class='permitido-p' id='permitido-p'>
                                    <?=show_text_input($data_evento["permitido"] , 50 , " + Lo que se permite en el evento" )?>
                                  </span>                                
                                  <div class="form-group">
                                    <textarea id='permitido-evento' placeholder ='' rows="6" class="form-control">
                                      <?=$data_evento["permitido"];?>
                                    </textarea>
                                  </div>                                                           
                                  <div class='place_permitido'>
                                  </div>
                                <?=end_row()?>                                
                                
                                <div class='row' id='section-articulos-permitidos'>                                   
                                  <div class='col-lg-12 col-md-12 col-sm-12'>

                                    <a title='Click para agregar' class='url_templates' href='<?=url_templates('objs')?>'>                
                                      <strong style='color:white;'>
                                        Cargar más articulos a tu cuenta
                                      </strong>
                                    </a>
                                  </div>                                  
                                  <br>

                                  <div class='col-lg-12 col-md-12  col-sm-12'>
                                    <div class='place-obj'>
                                    </div>
                                  </div>    

                                  <div class='col-lg-12 col-md-12  col-sm-12'>
                                    <div class='obj_permitidos'> 
                                    </div>  
                                    <div class='place_obj_permitidos'>
                                    </div>                                  
                                  </div>
                                </div>
                                <br>

                               <!--Termina la lista de objetos permitidos -->                                    
                              </div>
                              </div>
                              <!--Termina lo permitido  Tab-->                        
                              <!--Inicia las restricciones -->
                              <div class="tab-pane tab_restricciones" id="portlet_tab3">                      
                                <div class='well' style='background:#0093FF!important'>
                                  
                                  <?=titulo_enid("Reglamento del evento")?>
                                  
                                  
                                  <div class='restricciones-p' id='restricciones-p'>
                                    <?=show_text_input($data_evento["restricciones"] , 25 , " + Lo que no se permite " )?>      
                                  </div>                             
                                  <div class="form-group">
                                    <textarea id='restricciones-evento' placeholder ='' rows="6" class="form-control">
                                      <?=$data_evento["restricciones"];?>
                                    </textarea>
                                  </div>
                                  <div class='place_restricciones'>
                                  </div>
                                  <button  data-toggle="modal" data-target="#templa-restricciones"   class='btn btn-template restricciones_btn_templ'>
                                    <i class='fa fa-sticky-note'>
                                    </i>+ agregar
                                  </button>                              
                                  <div class='place_restricciones_tmp'>
                                  </div>                                                        
                                  <div class='restricciones-evento-list' id='restricciones-evento-list'>
                                    <div class="list_restricciones_evento" id="list_restricciones_evento">
                                    </div>
                                  </div>
                                </div>  
                              </div>
                              <!--Termina las  restricciones -->
                              <!-- Inicia la experiencia -->                            
                              <div class="tab-pane tab_evento  active" id="portlet_tab4">
                                
                  
                                                              
                                
                                <div class='well' style='background:#0093FF!important'>
                                  <h4>                                  
                                    <?=titulo_enid("Lo que vivirá el público en el evento")?> 
                                  </h4>                              
                                  <!--Terminan los alert -->
                                  <span class='descripcion-p'>
                                    <?=show_text_input($data_evento["descripcion_evento"] , 250 , " + Lo que que el público  vivirá" )?>
                                  </span>                              
                                  <div class="form-group">
                                  <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control">
                                    <?=$data_evento["descripcion_evento"];?>                                    
                                  </textarea>
                                  </div>   
                                  <div class='place_descripcion_evento'  id='place_descripcion_evento'>
                                  </div>                                                                          
                                
                                    <button class='btn  btn-template experiencia_btn_templ' 
                                    title='Una plantilla es un tipo de documento o contenido que crea una copia de sí misma al abrirla, evita escribir miles de veces las descripciones de tus eventos, redacta una plantilla y utilizala cuando te sea necesario. '  
                                    data-toggle="modal" data-target="#templa-descripcion-contenido" >
                                      <i class='fa fa-file-text-o'>
                                      </i> Usar plantilla
                                    </button>
                                
                                <div class='place_experiencia_evento'>
                                </div> 
                              </div>

                              <br>
                              </div>



                            </div>
<?=end_row()?>




