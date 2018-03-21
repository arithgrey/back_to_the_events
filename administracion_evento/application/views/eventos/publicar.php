<br>
<style type="text/css">
.text-fecha-evento:hover, .nota-
:hover , .accesos-button:hover,#img-button-more-imgs:hover,
.avanzado-accesos:hover
, .descripcion_escenario_update:hover, .nombre-escenario-modal:hover
, .restricciones-p:hover , .politicas-p:hover , .permitido-p:hover , .descripcion-p:hover,
.descripcion-modal-text:hover , .eslogan-p:hover,
.edicion-evento:hover , .delete_genero_evento:hover , .edicion-evento:hover , .reservaciones-btn:hover{  
  cursor: pointer;
}
/**/
.newdescripesenario , #newdescripesenario , 
.title_main , 
.nota-form-servicio , 
.section-header-title , 
#guardar-generos , 
#file_input , #tematica_section , .tematica_section , .eslogan-input , 
#nombre-input , #edicion-input , #evento , #descripcion-evento , #ubicacion-input, 
.descripcion-in-modal-escenario, .nombre-escenario-input-modal, .day_escenario_inputs ,
.social-media-event, #restricciones-evento ,  #politicas-evento, #permitido-evento , 
.title-page-enid , #eslogan-evento{
  display: none;
}
.resultados-busqueda-enid{
    background: #0093FF none repeat scroll 0% 0%;
    padding: 10px;
  }
</style>

<link rel="stylesheet" type="text/css" href="<?=base_url('../js_tema/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/generosmusicales.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/img.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/servicios/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/plantillas.js')?>"></script>

<!--TERMINA SECCIÓN 4 ************************************************************ -->










<div class='container'>
  <div class='col-lg-10'>

    <?=template_view_like_public(create_url_evento_view($data_evento["idevento"]))?>

    <?=n_row_12()?>
    <div class='seccion-config-evento-mv'>
        <h1 class='nombre-evento-h1' title='click para editar'>
          <strong >
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
            <div class="bhoechie-tab-container">
                <div class="col-lg-1  col-md-1 col-sm-12 bhoechie-tab-menu">
                  <div class="list-group">
                    <a class="list-group-item  text-center" title='Imágenes del evento'>
                      <i class="fa fa-picture-o">
                      </i>                                            
                    </a>

                    <a class="list-group-item text-center active" title='Información de tu evento'>
                      <i class="fa fa-info">
                      </i>                        
                    </a>
                    <a class="list-group-item text-center" id='artistas_escenarios_evento'  title='Artistas y escenarios'>
                      <i class="fa fa-play">
                      </i>                      
                    </a>

                    <a class="list-group-item text-center generos_musicales_contente" id='generos_musicales_contente' 
                      title='Géneros musicales' >
                                            
                      <i class="fa fa-star">
                      </i>                      
                    </a>
                    
                    <a href="#sitio_tikets" class="list-group-item text-center" id='precios_evento_seccion' title='Precios del evento '>
                      <i class="fa fa-money">
                      </i>                                          
                    </a>
                    <a href="#sitio_reservaciones" class="list-group-item text-center" title='Información para reservaciones'>
                      <i class="fa fa-list-alt">
                      </i>
                      
                    </a>
                  </div>
                </div>

                <div class="col-lg-11 col-md-11 col-sm-12  bhoechie-tab">
                    <!-- flight section -->
                    <div id='sitio_portada' class="bhoechie-tab-content">
                        <?=$this->load->view("secciones/portada")?>
                    </div>
                    <!-- train section -->
                    <div id='sitio_general' class="bhoechie-tab-content active">
                        <?=$this->load->view("secciones/general")?>
                    </div>      
                    <!-- hotel search -->
                    <div id="sitio_escenarios" class="bhoechie-tab-content">
                        <?=$this->load->view("secciones/artistas_escenarios")?>
                    </div>
                    <div id="sitio_generos_musicales"  class="bhoechie-tab-content">
                        <?=$this->load->view("secciones/generos_musicales")?>
                    </div>
                    
                    <div id='sitio_tikets' class="bhoechie-tab-content">
                        <?=$this->load->view("secciones/precios")?>
                    </div>
                    <div class="bhoechie-tab-content" id='sitio_reservaciones'>
                        <?=$this->load->view("secciones/reservaciones")?>
                    </div>
                </div>
            </div>
    <?=end_row()?>  

 </div>   

 <div class='col-lg-2'>
 </div>

</div>



















<style type="text/css">

/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;  
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #2874F0;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #2874F0;
  background-image: #2874F0;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #2874F0;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
.list-group-item{
  font-size: .7em;
  font-weight: bold;
}

@media only screen and (max-width: 991px) {
  .text_menu_e{
    display: none;
  }
}
.nota_servicio:hover{
  cursor: pointer;
}
</style>



































<?=$this->load->view("eventos/modal/principal_eventos_admin")?>

<input type='hidden' class='qparam' value="<?=$q?>">    

<link rel="stylesheet" type="text/css" href="<?=base_url('../js_tema/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('../js_tema/js/pickers-init.js')?>"></script>

<!--Escenarios modal-->
<form id='form-general-ev'>        
    <input type="hidden" value="<?=$evento;?>" id="evento" name='evento'>
    <input type="hidden" value="<?=$data_evento['nombre_evento']?>" id='nombre_evento_val'>    
    <input type='hidden' value="<?=$data_evento['eslogan']?>" class='eslogan'>
</form>        