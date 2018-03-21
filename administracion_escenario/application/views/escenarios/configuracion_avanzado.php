
<br>
<div class='container'>

  <?=n_row_12()?>
      
      <div class='col-lg-10'>
          <?=template_view_like_public(create_url_evento_view($evento["idevento"]))?>
          <?=n_row_12()?>
              <?=template_evento_admin($evento["nombre_evento"] , $evento["idevento"])?>
          <?=end_row()?> 
          <span title='click para editar' class='titulo_nombre_escenario titulo_enid_service'>
            <?=titulo_enid("Escenario - " . $data_escenario["nombre"] )?> 
          </span>

          <?=n_row_12()?>
              <input class='form-control in_nombre_escenario' id='in_nombre_escenario' value="<?=$data_escenario['nombre']?>" >            
              <div class='place_nombre_escenario'>
              </div>
          <?=end_row()?>
            

        <div class=" bhoechie-tab-container">
                <div class="col-lg-1 col-md-1 col-sm-12 bhoechie-tab-menu">
                  <div class="list-group">
                    <a  class="list-group-item  text-center">
                      <h4 class="fa fa-picture-o">
                      </h4>
                      
                      
                    </a>
                    <a  class="list-group-item text-center">
                      <h4 class="fa fa-info">
                      </h4>                      
                    </a>
                    <a  class="list-group-item text-center active">
                      <h4 class="fa fa-star">
                      </h4>                      
                    </a>
                    
                  </div>
                </div>
                <div class="col-lg-11 col-md-11 col-sm-12 bhoechie-tab">
                    <!-- flight section -->
                    <div class="bhoechie-tab-content ">
                      <?=$this->load->view("secciones/portada")?>
                    </div>
                    <!-- train section -->
                    <div class="bhoechie-tab-content">
                        <?=$this->load->view("secciones/general")?>
                    </div>
        
                    <!-- hotel search -->
                    <div class="bhoechie-tab-content active">
                        <?=$this->load->view("secciones/artistas")?>
                    </div>
                    
                </div>
        </div>
      </div>
  
</div>









<?=end_row()?>    





<style type="text/css">

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
  font-size: .8em;
  font-weight: bold;
}
.artista_estado_actual{
  font-size: 1.5em;
  font-weight: bold;
}
.bootstrap-timepicker table td a i {
  color: white !important;
}
.bootstrap-timepicker table td input{
  width: 75px !important;
}
.titulo_nombre_escenario:hover{
  cursor: pointer;
}
.in_nombre_escenario{
  display: none;
}
</style>

















































<style type="text/css"> 
    #img-button-more-imgs:hover , .nombre-escenario-text:hover, .descripcion-escenario-text:hover, .artistas-inputs:hover , .img-artista-evento:hover{
        cursor: pointer;    
    }
    .section-descripcion-escenario-in, .section-nombre-evento-in  , .section-input , .hidden_desc , .title_main , .seccion-links-extra{
        display: none;
    }        
    /*Todo lo que pertenece a medios*/
    @media only screen and (max-width: 991px) {    
    
    }


</style>

<!--Cargamos los modal de configuración ***********-->
<?=$this->load->view("escenarios/modal/escenario_avanzado")?>
<!--Terminamos de cargar los modal de configuración ***********-->
<input value="<?=$data_escenario["nombre"];?>" class='nombre_escenario' type='hidden'>
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$evento['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$evento['nombre_evento']?>"> 
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$data_escenario['idescenario'];?>">
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<input type='hidden' name='q' class='qparam' value="<?=$q?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('../js_tema/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />

<link rel="stylesheet" type="text/css" href="<?=base_url('../js_tema/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('../js_tema/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('../js_tema/js/pickers-init.js')?>"></script>


<script type="text/javascript" src="<?=base_url('application/js/artistas/config.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/artistas/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/artistas/img.js')?>"></script>
<input type='hidden' value="<?=$evento['nombre_evento']?>" class='enid_evento' id='enid_evento'>
<input type='hidden' value="<?=$data_escenario["nombre"];?>" class='enid_escenario' id='enid_escenario'> 
<br>
<br><br><br><br><br><br>