<?php   
    $info_servicios =  "";
        foreach ($servicios as $row){        

            $servicio = $row["servicio"];
            $nota =  $row["nota"];            
            $url_img =  "../img_tema/askj.jpg";
            $alt =  "Servicio ". $servicio . " información -  " . $nota;


            $info_servicios .= n_row_12("contenedor_info_servicio")."            
                <div class='col-lg-3'>
                    <div class='contenedor_img_servicio'>
                        <img src='".$url_img ."' alt='".$alt ."' >
                    </div>
                </div>
                <div class='info_extra_servicio col-lg-9' nombre_servicio='".$servicio."' info_completa_servicio = '".$nota."' ".valida_modal_mas_info_servicio($nota)." >
                    <div class='text-right'>
                        ".
                            titulo_enid_w3($servicio)
                        ."                                                    
                    </div>

                    ".
                        valida_mas_info_servicio($nota)
                    ."
                    
                </div>                                    
                ";
            $info_servicios .= end_row();    
            $info_servicios .= "<hr>";
        }
?>



    

<?=n_row_12()?>
    <?=titulo_enid_w("Servicios <span class='fa fa-cutlery'></span> ")?>                                                
    
    <?=$info_servicios?>        
<?=end_row()?>    
<style type="text/css">
    .contenedor_info_servicio{
        background: #076FB1;
        height: 220px;
    }
    .contenedor_img_servicio{
        padding: 5px;
    }
    .info_extra_servicio{
        font-size: .9em;
    }
    .info_extra_servicio:hover{
        cursor: pointer;
    }
</style>
