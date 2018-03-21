<?php
    
    $limit_text= 270;        
    $show_delete = 0;    

        $elements ="<div>";          
        foreach ($lista as $row){        
            $nombre = $row["nombre"];  
            $tipo =  $row["tipoescenario"]; 
            $fecha_presentacion_inicio =  $row["fecha_presentacion_inicio"]; 
            $fecha_presentacion_termino =  $row["fecha_presentacion_termino"]; 
            $id_escenario =  $row["id_escenario"];           
            $num_artistas =  $row["num_artistas"]; 
            $resumen_experiencia = resumen_experiencia($row["descripcion_escenario"]); 
            $url_next =create_url_escenario_in_evento($id_escenario , $id_evento); 
            
            $img  = create_icon_img($row ,  "  " , " " );             
            $fecha_presentacion  =   fechas_enid_format($fecha_presentacion_inicio , $fecha_presentacion_termino );

            $elements .= '                  
            <div>                             
                '.show_configs_resumen_escenario($id_escenario , $configurar).'                
                <div>
                    <div>
                        <div class="col-lg-5 col-md-5 col-sm-12 ">
                            <div class="blog-img-sm">
                                <a href="'.$url_next.'" >
                                    '. $img .'
                                <a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12  experiencia_descripcion_block">
                            <h1 class="titulo_escenario">
                                <a href="'.$url_next.'">
                                    '.  $nombre  .'
                                </a>
                            </h1>                            
                            <p>
                                '. $tipo .'  
                                |  
                                '.$fecha_presentacion .'   
                                | 
                                <a>
                                '. $num_artistas .'
                                </a>
                            </p>    
                            '. $resumen_experiencia .'                            
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        ';                            

        }      
        $elements .=  "</div>";                      
  

?>


<?=$elements?>

<style type="text/css">
    .t_reporte{
        text-align: center;
    }
    .seccion_experiencia{
        background: #046188;
        color: white;
        height: 45px;
        text-align: left;    
    }
    .seccion_experiencia_completa{    
        background: #046188;
        color: white;    
        text-align: left;
        display: none;
    }
    .experiencia_descripcion_block:hover .seccion_experiencia_completa{    
        display: block;    
        top: 0;
        position: absolute;
        height: 100%;
        overflow-y: scroll;
        font-size: .9em;    
    }
    .experiencia_descripcion_block:hover .seccion_experiencia{
        display: none;
    }
    .escenarios_evento_list{
        font-size: 2em;
        font-weight: bold;
    }
</style>
