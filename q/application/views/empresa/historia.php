<style type="text/css">
  .next-to-historias , #next-to-historias , .artistas-section{
    display: none;
  }
  .img-tmp-empresa{
    width: 100%;
    height: 400px;
  }
  .text-logo-img{
    font-size: 4.5em;      
    font-weight: bold;
    color: #31708f;
  }
  .text-edit-mensaje-comunidad:hover , #principal-contenido-historia:hover , .text-logo-img , #logo_empresa_img , .nombre_empresa:hover , .nombre-empresa-text:hover ,.social-fb:hover , .social-tw:hover , .social-gp:hover, .la-historia:hover,  .tu-artista:hover ,   .social-www:hover , .description-empresa-text:hover,  .misions-empresa-text:hover, .vision-empresa-text:hover, .mas-info-empresa-text:hover, .años-empresa-text:hover , .slogan-text:hover , #artistas-empresa-text:hover, #mision-empresa-text:hover , .lb-pais:hover{
    cursor: pointer;
  }.nombre-empresa-text{
    font-weight: bold;    
  }    
  .lb-pais{
    font-weight: bold;
  }
.panel-image img.panel-image-preview {
  width: 100%;
  border-radius: 4px 4px 0px 0px;
}.panel-heading ~ .panel-image img.panel-image-preview {
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
  .links_enid{
    color: white;
  }
  .panel-nuestra-comunidad{
    background: #166781 !important;
  }
  .title-cominidad{
    color: white !important; 
  }.text-reservaciones{
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
</style>

<div class='co-lg-12 col-md-12 col-sm-12'>
  
    <div class='redes-sociales text-right'>
      <?=get_icono_social($in_session , $data_empresa["idempresa"] , $data_empresa["facebook"] , "social-fb"  ,  "fa fa-facebook "  , 0  )?>
      <?=get_icono_social($in_session , $data_empresa["idempresa"] , $data_empresa["tweeter"] , "social-tw"  ,  "fa fa-twitter " , 1  )?>    
      <?=get_icono_social($in_session , $data_empresa["idempresa"] , $data_empresa["gp"] , "social-gp"  ,  "fa fa-youtube "  , 2 )?>                                      
    </div>            
  <?=n_row_12()?>

    <nav class="navbar navbar-default navegacion-emp">    
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">            
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
          <span class="brand visible-xs-block">
            <?=$data_empresa["nombreempresa"]?>
          </span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">                            
            <?=page_principal_empresa_cabecera()?>
          </ul>            
        </div>        
    </nav>  
    
  <?=end_row()?>

    
  <?=n_row_12()?>
    <div class="tab-content">    
      <?php 
        $paginas =  page_principal_empresa();       
        $pill =  2;
        for ($a=0; $a < count($paginas); $a++){           
            $text_pill =  "pill-".$pill;
            if ($pill == 2 ){
              echo "<div class='tab-pane active ' id='$text_pill'>";  
            }else{
              echo "<div class='tab-pane ' id='$text_pill'>";
            }        
            echo contenedor_page_start();
              $this->load->view($paginas[$a]);
            echo contenedor_page_end();
            echo "</div>";          
            $pill ++;
        }
      ?>
    </div>
  <?=end_row()?> 
</div>


<?=$this->load->view("empresa/modal/config_empresa")?>

<input type='hidden' value="<?=$data_empresa['idempresa']?>" id='id_empresa' class='id_empresa' > 
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/img.js')?>"></script>  
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/solicitudes.js')?>"></script>  