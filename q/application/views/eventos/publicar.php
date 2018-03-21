<style type="text/css">
.text-fecha-evento:hover, .nota-
:hover{  
  cursor: pointer;
}
.newdescripesenario , #newdescripesenario{
  display: none;
}

#form-accesos-s{
  background: #166781  !important;
  padding: 10px;
}
.title_main , .nota-form-servicio{
  display: none;
}
.accesos-button:hover{
  cursor: pointer;
}
.section-header-title{
  display: none;
}
.genero_registrado{
  background: #E31F56;
  color: white;
  padding: 5px;        
}
#img-button-more-imgs:hover{
  cursor: pointer;
}
.avanzado-accesos:hover{
  cursor: pointer;
}
.ubicacion-panel:hover , .accesos-panel:hover{
  padding: 10px;    
  cursor: pointer;
}
.descripcion_escenario_update:hover, .nombre-escenario-modal:hover{
  cursor: pointer;
}
#guardar-generos , .#file_input{
  display: none;
}
.restricciones-p:hover , .politicas-p:hover , .permitido-p:hover , .descripcion-p:hover{
  cursor: pointer; 
}
#tematica_section , .tematica_section , .eslogan-input{
  display: none;
}
#nombre-input, #edicion-input , #evento , #descripcion-evento, #ubicacion-input, .descripcion-in-modal-escenario, .nombre-escenario-input-modal, .day_escenario_inputs ,.social-media-event, #restricciones-evento ,  #politicas-evento, #permitido-evento {
    display: none;
}
.title-page-enid{
    display: none;
}
#eslogan-evento{
  display: none;
}
.descripcion-modal-text:hover , .eslogan-p:hover{
  cursor: pointer;
}
.nombre-evento-h1:hover{    
  cursor: pointer;
}
.nombre-evento-h1{  
  font-size:3.7em;
  color: white;
  font-weight: bold;
}
.edicion-evento:hover{ 
 cursor: pointer;
}
.titulo_generos{
  color: white;
  text-align: center;
  margin: 0 auto;
}.delete_genero_evento{
  color: white;  
}
.delete_genero_evento:hover{
  cursor: pointer;
}
.text-fecha-evento{
  font-size: .9em;
  margin-bottom: 10px;  
}
#mapgooglemap{
  background: #046188;
}
.titulo_maps{
 color: white;
}
#img-button-more-imgs{
  font-size: 1.5em;
  font-weight: bold;
}

.edicion-evento:hover{
  cursor: pointer;
}.enid-sub-menu{
  font-size: .9em;
    font-weight: bold;
    color: #3c5e79
}
.descripcion-p, .politicas-p , .permitido-p , .restricciones-p{
  font-size: .8em;
}
#update_inicio , #update_termino{
  display: inline-block;
}
.calendar-1,
.calendar-2{
 display: inline-block; 
}
.reservaciones-btn:hover{
  cursor: pointer;
}
.seccion-config-evento-mv{
    
      background: rgb(4, 97, 136);
      padding: 10px;
      color: white;
    }
/*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px) {    
    /*Termina  media query*/
    .ver-public-lg{
      display: none;
    }
    .configs-evento-lg{
      display: none;
    }
    
    .link-map{
      color: white;
    }
    .nombre-evento-h1{
      color: white;
    }

  }
</style>

<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/generosmusicales.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/img.js')?>"></script>
<!--TERMINA SECCIÓN 4 ************************************************************ -->


  
<?=template_view_like_public(create_url_evento_view($data_evento['idevento']))?>
<?=n_row_12()?>
<div class='seccion-config-evento-mv'>
    <h1 class='nombre-evento-h1' title='click para editar'>
      <strong style='color:white !important;'>
        <?=show_text_input($data_evento['nombre_evento'] , 2 , "Evento" )?>      
      </strong>
    </h1>
    <div class='place_nombre_evento'>
    </div>                  

    <div class="form-group nombre" >
      <input placeholder="Nombre del evento" 
          class="form-control nombre-input input-sm"  
          type="text" 
          value="<?=$data_evento['nombre_evento'];?>"  
          id="nombre-input" name='nombre-input'>
    </div>            
</div>
<?=end_row()?> 






<?=n_row_12()?>

  

    
  <div id='slogan_seccion' class="form-group alert alert-info slogan_seccion " title='Lema del evento'>  
    <i class="fa fa-flag">
    </i> Eslogan:                                                                                                   
    <span class='eslogan-p'>
      <?=show_text_input($data_evento["eslogan"] , 5 , "+ Eslogan del evento " )?>
    </span>
    <input value="<?=$data_evento['eslogan']?>" class="form-control eslogan-evento input-sm" id="eslogan-evento" name='eslogan-evento'  placeholder="Si es en méxico, estará lleno de colores" required>
  </div>
  <div class='place_eslogan_evento'>
  </div> 
    
<?=end_row()?>

<?=n_row_12()?>
  <?=$this->load->view('eventos/slider_admin')?>
<?=end_row()?>



  <?=n_row_12()?>
            <h1>
              <strong>
                Configuración
              </strong>
            </h1>
            <div class='place_configuracion'>
            </div>
            
            <div class='text-fecha-evento' data-toggle="modal" data-target="#edith_fecha_modal" id="config_data_evento" > 
              Fecha del evento  
              <?= get_date_event_format($data_evento["fecha_inicio"] , $data_evento["fecha_termino"]); ?> 
            </div> 
            <section class='links_modal'>
              <a id='tipificacion-evento' data-toggle="modal" data-target="#tipo-evento"  class='link_modal'>
                <?=$data_evento['tipo']?>
              </a>              
              <a id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="accesos-button link_modal">           
                  <i class="fa fa-cutlery">
                  </i>                                  
                  Servicios
              </a>
              <a title='Redes sociales' class="section-left link_modal" data-toggle="modal" data-target="#modal_social_evento" >
                  <i class="fa fa-flag">
                  </i> 
                  Social                 
              </a>                                                                                                  
              <a id="tematica-button" class="section-left  link_modal "  data-toggle="modal" data-target="#modal_tematica_evento">    
                <i class="fa fa-tree">
                </i> 
                Temática              
              </a>
            </section>   
  <?=end_row()?>


<?=n_row_12()?>
  <ul class="nav nav-tabs menu_contenidos_enid">                                  
      <li class='generos_musicales_contente tab_generos' id='generos_musicales_contente'>
        <a href="#portlet_tab5" data-toggle="tab" class='enid-sub-menu'>
          <i class='fa fa-play'>
          </i>
                      Géneros musicales
        </a>                                      
      </li>
      <li class="restricciones_section_content tab_restricciones">
        <a href="#portlet_tab3" data-toggle="tab" class='enid-sub-menu'>
          <i class="fa fa-exclamation-triangle">
          </i> 
                      Restricciones
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
      <li class="tab_evento">
        <a href="#portlet_tab_escenarios" id="artistas_escenarios_evento" data-toggle="tab" class='enid-sub-menu' >
                      Artistas y escenarios
        </a>
      </li>          
      <li class="tab_evento">
        <a href="#portlet_tab_precios" id="precios_evento_seccion" data-toggle="tab" class='enid-sub-menu' >
          <i class="fa fa-credit-card">
          </i> 
                      Precios 
        </a>
      </li>    
      <!--      
      <li class="pv_evento_seccion">
        <a href="#portlet_tab_puntos_venta" id="pv_evento_seccion" data-toggle="tab" class='enid-sub-menu'>
          <i class="fa fa-map-marker">
          </i> 
                      Puntos de venta
        </a>
      </li>                          
    -->
  </ul>
<?=end_row()?>



<?=n_row_12()?>
<div class="tab-content">
                              <div class="tab-pane tab_generos" id="portlet_tab5">                                                                                                               
                                <div class='generos-registrados-evento' id='generos-registrados-evento'>
                                </div>
                                <div class='place_generos_musicales'>
                                </div>                              
                                <hr>                                
                                <div class="input-group">                                      
                                  <div class="input-group-addon"> 
                                    <i class='fa fa-search'>
                                    </i>                                        
                                  </div>
                                  <input placeholder="Genero musical"  id="genero-busqueda" class="genero-busqueda form-control" >                            
                                </div>                                    
                                <div class='seccion_generos_musicales_busqueda'>                              
                                </div>                               
                                <div class='place_generos_musicales_busqueda'>
                                </div>     
                                <br>
                              </div>
                              <!--Politicas tab-->
                              <div class="tab-pane tab_politicas" id="portlet_tab1">                                            
                                <?=titulo_enid("Políticas del festival")?>
                                <a class="enid-sub-menu pull-right" href="<?= url_dia_evento($data_evento["idevento"])?>">
                                    <i class="fa  fa-arrow-circle-o-right"> 
                                    </i>
                                    Ver como el público
                                </a>

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
                              <!--Politicas Tab Termina -->                            
                              <div class="tab-pane tab_permitido" id="portlet_tab2">                              
                                <?=titulo_enid("Lo permitido")?>
                                
                                <a class="enid-sub-menu pull-right" href="<?=url_dia_evento($data_evento["idevento"])?>">
                                    <i class="fa  fa-arrow-circle-o-right"> 
                                    </i>
                                    Ver como el público
                                </a>


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
                                      Cargar más articulos para ser empleados en los eventos
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
                              <!--Termina lo permitido  Tab-->                        
                              <!--Inicia las restricciones -->
                              <div class="tab-pane tab_restricciones" id="portlet_tab3">                      
                                
                                <?=titulo_enid("Restricciones en el evento")?>
                                <a class="enid-sub-menu pull-right" href="<?=url_dia_evento($data_evento["idevento"])?>">
                                    <i class="fa  fa-arrow-circle-o-right"> 
                                    </i>
                                    Ver como el público
                                </a>
                                
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
                              <!--Termina las  restricciones -->
                              <!-- Inicia la experiencia -->                            
                              <div class="tab-pane tab_evento  active" id="portlet_tab4">
                                
                                <a class="enid-sub-menu pull-right" href="<?=create_url_evento_view($data_evento["idevento"])?>">
                                    <i class="fa  fa-arrow-circle-o-right"> 
                                    </i>
                                    Ver como el público
                                </a>

                                                              
                                <?=titulo_enid("Edición del evento")?> 
                                <br>
                                <span class="designation edicion-evento" title='click para editar'>  
                                  <?=show_text_input($data_evento['edicion'] , 2 , "<i class='fa fa-plus'></i>  Edición del evento" )?>           
                                </span> 

                                <div class="form-group">
                                  <input 
                                    placeholder="Edición del evento" 
                                    class="form-control edicion-input input-sm"  
                                    type="text"
                                    id="edicion-input" 
                                    name='edicion-input' value="<?=$data_evento['edicion'];?>">
                                </div> 
                                <div class='place_edicion_evento'>
                                </div>                    
                            


                                <label class='reservaciones-btn section-left link_modal ' data-toggle="modal" data-target="#reservaciones-modal"  >
                                  <?=valida_reservaciones(  0 , 
                                  $data_evento["reservacion_tel"] , 
                                  $data_evento["reservacion_mail"] , 
                                  "reservaciones-modal")?>  
                                </label>                                
                                <br>
                                <span class='place_reservaciones_2'>                    
                                </span>


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
                              <br>
                              </div>






                              <div class="tab-pane tab_evento" id="portlet_tab_escenarios">
                              
                                  <?=n_row_12()?>                                
                                    <div class='separate-enid'>
                                    </div>
                                  <?=end_row()?>
                                  
                                  <?=n_row_12()?>                                
                                    <div class='section_escenarios_admin'>
                                    </div>                                  
                                  <?=end_row()?>
                                    
                                  <?=n_row_12()?>                                
                                    <div class='place_nuevo_escenario'>
                                    </div>
                                  <?=end_row()?>
                                  
                                
                              
                              </div>

                              <div class="tab-pane tab_evento" id="portlet_tab_precios">

                                    <?=titulo_enid("Precios y promociones")?>
                                    <?=n_row_12()?>                                             
                                      
                                                                                                
                                      <h4>         
                                          <strong>
                                            + Nuevo acceso a promocionar
                                          </strong>
                                      </h4>
                                    <?=end_row()?>
                                        

                                    <div class='row'>                                                                                
                                          <span class='place_registro_acceso'>
                                          </span>
                                          <form id="form-new-acceso" action="<?=base_url('index.php/api/accesos/acceso/format/json')?>" method="post">
                                              <input type ='hidden'  name='moneda' value="MXN"> 
                                              <input type ='hidden'  name='descripcion' value="">
                                              <div class='col-lg-4 col-md-4 col-sm-12'>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        Acceso a promocionar
                                                    </span>
                                                    <input  type="text" class='form-control input-sm acceso_input' name='acceso_nombre' id='acceso_nombre' required >
                                                </div>
                                                <span class='place_nombre_promo_vali validado'>
                                                </span>                    
                                              </div>
                                              <div class='col-lg-4 col-md-4 col-sm-12'>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        Tipo de promoción
                                                    </span>                                 
                                                    <?=create_select($tipos_accesos , 'tipo' , 'form-control nuevo-tipo-acceso ' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');?>                
                                                </div>                              
                                              </div>                                

                                              <div class='col-lg-4 col-md-4 col-sm-12'>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        $
                                                    </span>
                                                    <input maxlength="10"  class="form-control input-sm" type="number" name='precio' id='precio-acceso-record' step="any" required >
                                                    <span class="input-group-addon ">
                                                        .00
                                                    </span>                    
                                                </div>            
                                                <div class='place_msj_precio'>
                                                </div>                        
                                              </div>                                            
                                            <div class='col-lg-12 col-md-12 col-sm-12'>                                            
                                              <button class='btn btn-default btn_save  acceso-registro-button'>
                                                Registrar acceso
                                              </button>
                                            </div>   
                                          </form>   
                                      
                                    </div>    

                                    <?=n_row_12()?> 
                                      <div class='pull-right'>
                                        <a class='enid-sub-menu' href="<?=url_accesos_al_evento($data_evento['idevento'])?>">
                                          <i class='fa  fa-arrow-circle-o-right'> 
                                          </i>
                                          Ver como el público
                                        </a>
                                      </div>
                                    <?=end_row()?>


                                <div class='row'>                                  
                                    <div class='place_list_accesos'>
                                    </div>
                                    <div class='list-accesos'>
                                    </div>                                
                                  
                                </div>   
                                <br>  
                              </div> 
                              <!--
                              <div class='tab-pane portlet_tab_puntos_venta' id='portlet_tab_puntos_venta'>                                
                                <?=titulo_enid("Puntos de venta")?>
                                <?=n_row_12()?> 
                                  
                                  <h4>         
                                    <strong>
                                      <a href="<?=create_url_puntoventa_admin($data_evento['idevento']) ?>">
                                        + Nuevo punto de venta
                                      </a>
                                    </strong>
                                  </h4>                                                                              
                                <?=end_row()?> 
                                    
                                <?=n_row_12()?> 
                                  <div class='pull-right'>
                                    <a class='enid-sub-menu' 
                                      href="<?=url_accesos_al_evento($data_evento['idevento'])?>"
                                      <i class='fa  fa-arrow-circle-o-right'> 
                                      </i>
                                        Ver como el público
                                    </a>
                                  </div>                                  
                                <?=end_row()?>   

                                <?=n_row_12()?>
                                  <div class='pvs_place'>
                                  </div>
                                  <div class='pvs'>
                                  </div>
                                <?=end_row()?>

                              </div>
                            -->
                              <!-- Termina  la experiencia --> 
                            </div>
<?=end_row()?>


<?=n_row_12("mapgooglemap")?>
    
  <h1 class='titulo_maps'>
    <strong class='titulo_maps'>
          Locación del evento
    </strong>
  </h1>   

    <div>        
      <iframe height='500px;' width='100%'   id='iframe_maps_conf'  
         src="<?=url_tmp_maps()?>/<?=$data_evento['idevento']?>/0/99999999/">
      </iframe> 
    </div>    
<?=end_row()?>  


<?=$this->load->view("eventos/modal/principal_eventos_admin")?>

<input type='hidden' class='qparam' value="<?=$q?>">    
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->
<form id='form-general-ev'>        
    <input type="hidden" value="<?=$evento;?>" id="evento" name='evento'>
    <input type="hidden" value="<?=$data_evento['nombre_evento']?>" id='nombre_evento_val'>    
    <input type='hidden' value="<?=$data_evento['eslogan']?>" class='eslogan'>
</form>        