<div class="container">
    <div class="row">
      <div class="col-md-9">

        <header class="clearfix">
          <div class='text-left'>            
            <?=get_titulo_evento($data_evento , $in_session )?>                        
          </div>
          <div class='row'>
            <div class='place_galeria'>              
            </div>
          </div>
        </header> 
        <?=$this->load->view("secciones/social")?>
        <h3>
          Información del evento
        </h3>

        <div class="tabbable-panel">
          <div class="tabbable-line">
            <ul class="nav nav-tabs " style='background:#054F8D;'>
              <li class="active">
                <a href="#tab_default_1" class='fa fa-calendar black' data-toggle="tab">                  
                </a>
              </li>
              <li>
                <a href="#tab_default_2" data-toggle="tab" class='menu_artistas fa fa-play white'>
                  Artistas
                </a>
              </li>              
              <li>
                <a href="#tab_default_3" data-toggle="tab" class='menu_promociones fa fa-money white'>
                Precios
                </a>
              </li>
              <li>
                <a href="#tab_default_4" data-toggle="tab" class='menu_dia_evento fa fa-cutlery white' >
                  Servicios
                </a>
              </li>
              <li>
                <a href="#tab_default_5" data-toggle="tab" class=' fa fa-list restricciones_evento white' >
                  Reglamento
                </a>
              </li>
              <li>
                <a href="#tab_default_6" data-toggle="tab" class=' fa fa-file-text-o politicas_evento white' >
                  Políticas
                </a>
              </li>
              
              <li>
                <a href="#tab_default_7" data-toggle="tab" class=' objs_evento  fa fa-star white' >
                  Lo permitido
                </a>
              </li>
              

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_default_1">
                <?=$this->load->view("secciones/resumen")?>
              </div>
              <div class="tab-pane" id="tab_default_2">
                <?=get_titulo_artistas($data_evento , $in_session );?>
    
                
                
                <div class='place_artistas_evento'>
                </div>                
                <div class='place_generos_musicales'>
                </div>
                
              </div>
              <div class="tab-pane" id="tab_default_3">
                <?=get_titulo_accesos($data_evento,  $in_session)?>
                

                <div class='place_accesos_evento'>
                  </div>            
                </div>

              <div class="tab-pane" id="tab_default_4">
                <?=$this->load->view("secciones/servicios")?>
              </div>

              <div class="tab-pane" id="tab_default_5">
                <?=$this->load->view("secciones/reglas")?>
              </div>
              <div class="tab-pane" id="tab_default_6">
                <?=$this->load->view("secciones/politicas")?>
              </div>
              
              <div class="tab-pane" id="tab_default_7">
                <?=$this->load->view("secciones/lo_permitido")?>
              </div>


            </div>
          </div>
        </div>

      </div>
      <div class='col-lg-3'>
      </div>
    </div>
</div>

<?=$this->load->view("modal/more_info")?>













<div class='id_evento' info_evento="<?=$data_evento["idevento"]?>" >
</div>
<div class='id_empresa' info_empresa="<?=$data_evento["idempresa"]?>" >
</div>



<script type="text/javascript" src="<?=base_url('application/js/principal.js')?>">
</script>
<script type="text/javascript" src="<?=base_url('application/js/servicios.js')?>">
</script>
<script type="text/javascript" src="<?=base_url('application/js/info_extra.js')?>">
</script>

<br>
<br><br><br><br><br><br><br><br><br><br>




<style type="text/css">

/* Content */
.content section {
  font-size: 1.25em;
  padding: 3em 1em;
  display: none;
  max-width: 1230px;
  margin: 0 auto;
}

.content section:before,
.content section:after {
  content: '';
  display: table;
}

.content section:after {
  clear: both;
}

/* Fallback example */
.no-js .content section {
  display: block;
  padding-bottom: 2em;
  border-bottom: 1px solid #47a3da;
}

.content section.content-current {
  display: block;
}

.mediabox {
  float: left;
  width: 33%;
  padding: 0 25px;
}

.mediabox img {
  max-width: 100%;
  display: block;
  margin: 0 auto;
}

.mediabox h3 {
  margin: 0.75em 0 0.5em;
}

.mediabox p {
  padding: 0 0 1em 0;
  margin: 0;
  line-height: 1.3;
}
/**/








/**/
/**/




  input[type="radio"] {
    display: none;
  }
  label {
    color: white;
  }
  .clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
  }
  .input-start:hover , .s-estrella:hover{
    cursor: pointer;
  }
  label:hover,
  label:hover ~ label {
    color: black;
  }

  input[type="radio"]:checked ~ label {
    color: black;
  }
  .list-group-item{
      height:auto;
      min-height:220px;
  }
  .list-group-item.active small {
      color:#fff;
  }
  .list-group-item2{
      height:auto;
      min-height:320px;
  }
  .list-group-item2.active small {
      color:#fff;
  }

  .stars {
      margin:20px auto 1px;    
  }
  .url_youtube:hover, .url_sound_cloud:hover{
    cursor: pointer;
  }
  .resultados-busqueda-enid{
    background: #0093FF none repeat scroll 0% 0%;
    padding: 10px;
  }
  
  .icon-food:before {
    content: "\e500";
  }


  /*Todo lo que pertenece a medios*/
  @media only screen and (max-width: 991px) {

    
.mediabox {
  float: left;
  width: 100%;
  padding: 0 25px;
}

.mediabox img {
  max-width: 100%;
  display: block;
  margin: 0 auto;
}

.mediabox h3 {
  margin: 0.75em 0 0.5em;
}

.mediabox p {
  padding: 0 0 1em 0;
  margin: 0;
  line-height: 1.3;
}
/**/
}


.sub-tipo , .btn_tematica{
  font-size: .8em;
}
.btn_tematica{
  margin-top: 5px!important;
}
.btn_calificacion{
  background:#06DEDE;
}
.seccion_info_restricciones , .seccion_info_politicas , .seccion_info_permitido{
  background: #087CFF;
}.info_restriccione_principal{

  background: #063C4E;
  padding: 15px;
}
</style>