<?php 

    $class_enid = '';  
    $list_templa_contenido='';  
    $total = 0;      
    
    $identificador = $param["identificador"];     
    $delete_extra = ['data-toggle="modal" data-target="#modal_confirmar"'];


    if (count($contenidos)> 2) {$class_enid = 'scroll-vertical-enid scroll-enid-public';}
        $list_templa_contenido='';
        $flag = 1;                                       
        foreach ($contenidos as $row){
           
           $total ++; 
           $id_contenido = $row["idcontenido"];
           $nombre_contenido =  $row["nombre_contenido"];
           $descripcion_contenido = $row["descripcion_contenido"];
           $status = $row["status"];            
           $btn =  valida_btn_agregar($agregar_plantilla , $identificador , $id_contenido );

            $list_templa_contenido .= n_row_12("contenedor_plantilla_info").
                                        '<div class="col-lg-4" style="background: white;height: 100%;">
                                            <a class="black strong ">
                                                    '.$flag .'.-'. $nombre_contenido .'
                                            </a>  
                                            '.$btn.'
                                        </div>
                                        <div class="col-lg-8">
                                            '.btn_delete_template($delete_template , $id_contenido ,  $delete_extra[$delete_extra_pos] ).'
                                            <p class=" informacion_complemento">
                                                '.$descripcion_contenido .'
                                            </p>                                            
                                        </div>
                                        '.
                                    end_row();
            $list_templa_contenido .=  "<hr>";                                                    
            $flag++;
        }   
?>

<?=n_row_12()?>
    
    <div class='col-lg-6 text-left'>            

        <?php 
            if (count($contenidos) > 0 ) {
                echo valida_selector_restriccines($identificador , $incluir_todo ,  "Incluye todas las reglas al evento" , "btn_incluir_restricciones" ,  "");    
            }
            
        ?>
    </div>

    <div class='col-lg-6 text-right'>
        <span class='white strong'>             
            <?=msj_url_template($identificador , $btn_redirect)?>
        </span>
    </div>
<?=end_row()?>
<br>
<?=n_row_12()?>
    <div  class=' well' style='background:white!important;'>
        <div class="<?=$class_enid;?>" >            
            <?=$list_templa_contenido?>            
        </div>                
        <br>        
        <?=$this->load->view("../../../view_tema/view_no_drogas")?>
    </div>
<?=end_row()?>
<style type="text/css">
    .contenedor_plantilla_info{
        height: 150px;
        background: #035B9C;
    }.informacion_complemento{
        font-size: .8em;
    }
</style>
<h1>

</h1>