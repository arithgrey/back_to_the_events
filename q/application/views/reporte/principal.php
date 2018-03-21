<?=n_row_12()?>
        <div class='ver-public-lg-emp'>              
            <?=page_inicio_cabecera()?>        
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
<input type='hidden' value='nombre_empresa' id='' class='nombre_empresa'>
<script type="text/javascript" src="<?= base_url('application/js/reportes/principal_home.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/reportes/resumen_cominidad.js')?>"  ></script>
<input type='hidden' class='id_empresa' value="<?=$id_empresa;?>">
