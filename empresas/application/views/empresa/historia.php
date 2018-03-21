<style type="text/css">


/**/

.panel-heading ~ .panel-image img.panel-image-preview {
  border-radius: 0px;
}.panel-image ~ .panel-body, .panel-image.hide-panel-body ~ .panel-body {
  overflow: hidden;
}.panel-image ~ .panel-footer a {
  padding: 0px 10px;
  font-size: 1.3em;
  color: rgb(100, 100, 100);
}
.panel-image.hide-panel-body ~ .panel-body {
  height: 0px;
  padding: 0px;
}
.tag-enid-galery{
    background: #052E3A !important;
    color: white !important;
}

.img-tmp-empresa:hover{
    cursor: pointer;
}
.more-fields , .section-description-empresa, #nombre-empresa-section, 
  .section-mision-empresa,.section-vision-empresa, #años-section,
   #section-mas-info , #reponse-exp , .reponse-exp , .slogan-edit-section , .section-header-title {
    display: none;
}      
.last-seccion{
  background: #032935;  
}
.title-more-us{
  color: white;
}
  /*Primero parte */
  
  .panel-nuestra-comunidad{
    background: #166781 !important;
  }
  .title-cominidad{
    color: white !important; 
  }
  .text-reservaciones , 
  .btn_configurar_enid_w{
    display: inline-block;
  }
  .contenedor-resumen-emp{
    background: red;
  }
  .h_emp{
    color: black;
    font-weight: bold;
  }
  .link-org-artista{
    display: none;
  }
  #p-1 , #p-2{
    display: inline-table;
  }
  .navegacion-emp{
    display: none;
  }
  .text-emp{
    font-size: .75em!important;
  }
  .contenedor-galeria{
    height: 350px;
    overflow-y: auto;
  }
  .btn-enviar{
    color: white !important;
  }
  .eliminar_img:hover{
    cursor: pointer;
  }
/**/

.tabs {
  position: relative;
  width: 100%;
  overflow: hidden;
  margin: 1em 0 2em;
  font-weight: 300;
}

/* Nav */
.tabs nav {
  text-align: center;
}

.tabs nav ul {
  padding: 0;
  margin: 0;
  list-style: none;
  display: inline-block;
}

.tabs nav ul li {
  border: 1px solid #becbd2;
  border-bottom: none;
  margin: 0 0.25em;
  display: block;
  float: left;
  position: relative;
}

.tabs nav li.tab-current {
  border: 1px solid #47a3da;
  box-shadow: inset 0 2px #47a3da;
  border-bottom: none;
  z-index: 100;
}

.tabs nav li.tab-current:before,
.tabs nav li.tab-current:after {
  content: '';
  position: absolute;
  height: 1px;
  right: 100%;
  bottom: 0;
  width: 1000px;
  background: #47a3da;
}

.tabs nav li.tab-current:after {
  right: auto;
  left: 100%;
  width: 4000px;
}

.tabs nav a {
  color: #becbd2;
  display: block;
  font-size: 1.45em;
  line-height: 2.5;
  padding: 0 1.25em;
  white-space: nowrap;
}

.tabs nav a:hover {
  color: #768e9d;
}

.tabs nav li.tab-current a {
  color: #47a3da;
}

/* Icons */
.tabs nav a:before {
  display: inline-block;
  vertical-align: middle;
  text-transform: none;
  font-weight: normal;
  font-variant: normal;
  font-family: 'icomoon';
  line-height: 1;
  speak: none;
  -webkit-font-smoothing: antialiased;
  margin: -0.25em 0.4em 0 0;
}

.icon-food:before {
  content: "\e600";
}

.icon-lab:before {
  content: "\e601";
}

.icon-cup:before {
  content: "\e602";
}

.icon-truck:before {
  content: "\e603";
}

.icon-shop:before {
  content: "\e604";
}

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

/* Example media queries */

@media screen and (max-width: 52.375em) {
  .tabs nav a span {
    display: none;
  }

  .tabs nav a:before {
    margin-right: 0;
  }

  .mediabox {
    float: none;
    width: auto;
    padding: 0 0 35px 0;
    font-size: 90%;
  }

  .mediabox img {
    float: left;
    margin: 0 25px 10px 0;
    max-width: 40%;
  }

  .mediabox h3 {
    margin-top: 0;
  }

  .mediabox p {
    margin-left: 40%;
    margin-left: calc(40% + 25px);
  }

  .mediabox:before,
  .mediabox:after {
    content: '';
    display: table;
  }

  .mediabox:after {
    clear: both;
  }
}

@media screen and (max-width: 32em) {
  .tabs nav ul,
  .tabs nav ul li a {
    width: 100%;
    padding: 0;
  }

  .tabs nav ul li {
    width: 20%;
    width: calc(20% + 1px);
    margin: 0 0 0 -1px;
  }

  .tabs nav ul li:last-child {
    border-right: none;
  }

  .mediabox {
    text-align: center;
  }

  .mediabox img {
    float: none;
    margin: 0 auto;
    max-width: 100%;
  }

  .mediabox h3 {
    margin: 1.25em 0 1em;
  }

  .mediabox p {
    margin: 0;
  }
}






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
  .stars {
      margin:20px auto 1px;    
  }
  
</style>



<div class="container">
        <header class="clearfix">        
        <h1>
          <?=$data_empresa['nombreempresa']?>
        </h1>
        <nav>
          <a class="bp-icon bp-icon-prev" >
            <span>
              <?=$data_empresa["slogan"]?>
            </span>
          </a>
        </nav>
      </header> 
      <div id="tabs" class="tabs">    
        <?=$this->load->view("empresa/secciones/menu_pagina")?>
        <div class="content">
          <section id="section-1">
            <div class='col-lg-10'>
              <?=$this->load->view("empresa/detalle_historia")?>            
              <?=$this->load->view("empresa/historia_imagenes")?>                                
            </div>
            <div class='col-lg-2'>
            </div>

          </section>
          <section id="section-3">
            <?=$this->load->view("empresa/galeria")?>
          </section>
          <section id="section-4">            
            <?=$this->load->view("empresa/secciones/reservaciones")?>
          </section>
          <section id="section-5">
            <?=$this->load->view("empresa/secciones/ubicacion")?>            
          </section>
          <section id="section-6">
            <?=$this->load->view("empresa/secciones/eventos")?>                        
          </section>
        </div>
      </div>
      
    </div>
    



































<?=$this->load->view("empresa/modal/config_empresa")?>
<input type='hidden' value="<?=$data_empresa['idempresa']?>" id='id_empresa' class='id_empresa' > 
<script type="text/javascript" src="<?=base_url('application/js/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/img.js')?>"></script>  
<script type="text/javascript" src="<?=base_url('application/js/solicitudes.js')?>"></script>  
<script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
<script>
  new CBPFWTabs( document.getElementById( 'tabs' ) );
</script>
