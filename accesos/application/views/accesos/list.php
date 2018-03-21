<?php   

    $promo_total =0;
    $complete ="";              
    $flag =1;   
    $elements ="";              

            foreach ($accesos as $row){
                    
                $promo_total ++;
                $idacceso  =  $row["idacceso"];  
                $nombre =  $row["nombre"];
                $nota  =  $row["nota"];    
                $moneda  =  $row["moneda"];
                $precio = valida_formato_precio( $row["precio"], $moneda );
                $inicio_acceso =  $row["inicio_acceso"]; 
                $termino_acceso =$row["termino_acceso"];                        
                $idevento  = $row["idevento"];          
                $idtipo_acceso = $row["idtipo_acceso"];                         
                $vigencia = "del " . $inicio_acceso ." al día ".   $termino_acceso;
                $idtipo_acceso = $row["idtipo_acceso"];
                $tipo = $row["tipo"];                                               
                $fecha_registro =  $row["fecha_registro"];                
                $url_config = url_accesos_configuracion_avanzada( $idevento);
                $url_img = create_url_img_acceso($idacceso);
                $nota =  show_more_text($nota , $nombre ,   'data-toggle="modal" data-target="#info_nota_acceso"');
                $part_img =  valida_modal_info_nota($param["in_session"]);
                $config ="";            
                $a = "<a>";


                $config  =  valida_botomes_configuracion(
                                $param["resumen_evento"] , 
                                $param["in_session"] ,  
                                $url_config  ,  
                                $idacceso  ); 

                


            $elements .=     n_row_12().'                            
                                <div class="background_panel_enid_accesos"> 
                                    '.$config.'                                             
                                    <div class="col-lg-4">                                

                                        <div '.$part_img .' >
                                            <img  title="Imagen del acceso - '.$nombre.' "   
                                            class="img_acceso" 
                                            id="'.$idacceso.'"  
                                            src="'.$url_img.'">                 
                                        </div>
                                    </div>
                                    <div class="col-lg-8 ">
                                        <div class="contenedor-resumen-accesos">
                                            '.$a .'
                                                
                                                '.titulo_enid_w($nombre).'
                                            </a>
                                        </div>

                                        <div class="contenedor-resumen-accesos">                                        
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="row">
                                                <span class="a1">
                                                    '.$tipo .'        
                                                    </span>    
                                                </div>
                                                <div class="row">
                                                    <span class="a2 strong">
                                                        '.$precio  .'
                                                    </span>    
                                                </div>
                                                <div class="row">
                                                    <span class="a3">
                                                    Vigencia
                                                        '.$vigencia.'     
                                                    </span>    
                                                </div>
                                                
                                                <div class="row">
                                                    '. $nota .'                                
                                                </div>                
                                            </div>
                                        </div>                                    
                                    </div>                            
                                </div>
                            '.end_row().'
                            <hr>
                            ';                            
 
        }      
                          
?>

<?=$elements?>
<style type="text/css">
.a1{
    background: #3c5e79;
    padding: 5px;
    color: white;
    font-weight: bold;
}
.background_panel_enid_accesos{
    height: 220px;
}
.resumen_info_acceso:hover{
    cursor: pointer;
}
</style>
<br>
<br>
<br>
