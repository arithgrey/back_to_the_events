<div class='container'>

    <?=n_row_12()?>
            <div class='ver-public-lg-emp'>                          
            <a href="#pill-2"  data-toggle="tab"  class="carga_resumen_eventos active links_enid " > 
                Eventos
            </a>
            <a href="#pill-3"  data-toggle="tab" class="carga_resumen_cominidad  links_enid " > 
                Opiniones
            </a>
            <a href="#pill-5"  data-toggle="tab"   class="carga_resumen_solicitudes  links_enid " > 
               Artistas solicitados 
            </a>
            <a href="#pill-4"  data-toggle="tab" class="carga_resumen_movimientos  links_enid   "   > 
                Movimientos
            </a>
            <a href="#pill-6"  data-toggle="tab" class="carga_resumen_contactos  links_enid   " > 
                Contactos
            </a>

            </div>       
    <?=end_row()?>    
    <hr>
    <?=n_row_12()?>
        <div class="tab-content">            
            <?php 
                $paginas = page_inicio();
                $pill =  2;
                  for ($a=0; $a < count($paginas); $a++){           
                    $text_pill =  "pill-".$pill;
                    if ($pill ==  2 ){
                      echo "<div class='tab-pane active ' id='$text_pill'>";  
                    }else{
                      echo "<div class='tab-pane ' id='$text_pill'>";
                    }        
                    $this->load->view($paginas[$a]);
                    echo "</div>";
                    /*Páginas que no están en el menú*/    
                    $pill ++;
                  }
            ?>
        </div>  
    <?=end_row()?>
</div>



<input type='hidden' value='nombre_empresa' id='' class='nombre_empresa'>
<script type="text/javascript" src="<?= base_url('application/js/reportes/principal_home.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/reportes/resumen_cominidad.js')?>"  ></script>
<script type="text/javascript" src="<?=base_url('application/js/contactos/contactos_empresa.js')?>"></script>

<input type='hidden' id='id_empresa' class='id_empresa' value="<?=$id_empresa;?>">
