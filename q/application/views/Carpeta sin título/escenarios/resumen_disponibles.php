<?php

    $dinamic_class=""; 
    if(count($escenarios) == 3){
        $dinamic_class="otros_escenarios2";
    }else if(count($escenarios) > 3 ){
        $dinamic_class="otros_escenarios3";
    }

    $escenarios_section =  "<div class='$dinamic_class'>";      
    foreach ($escenarios as $row) {

        $url = create_url_config_escenario($row["idescenario"]);        
        $nombre = $row["nombre"];         
        $tipoescenario =  $row["tipoescenario"];        
        $fecha_escenario =  fechas_enid_format($row["fecha_presentacion_inicio"]  , $row["fecha_presentacion_termino"] ); 
        $img =  create_icon_img($row , " img_sm_enid ", " "); 

        $descripcion ="La experiencia en este escenario aún no ha sido asignada , <span class='config_now_escenario'> configurar ahora </span> "; 
        if (strlen( $row["descripcion"]) > 5) {
            $descripcion =  substr( $row["descripcion"] , 0 , 250 );     
        }
        
            

        $footer_escenarios =  '<span class="footer_escenarios ">
                                '.$fecha_escenario.'|
                                '. $tipoescenario .'
                                </span>
                            ';

       
            $escenarios_section .= '
                            
    <div class="section_e">
        <div class="contenido_escenario">       
          <a href="'.$url.'" >
              <div class="col-lg-6 col-md-6 col-sm-12" >                               
              '. $img .'                               
              </div>
              <div>
                  <span class="col-lg-6 col-md-6 col-sm-12 text-center nombre_escenario_otros">                                                                        
                  '. $nombre .'                                    
                      <br>
                  '.$footer_escenarios.'
                  </span>
              </div>    
          </a>    
          <div class="row">
              <div class="seccion_descripcion">
                  <p class="p-escenario-enid col-lg-12 col-md-12 col-sm-12">
                      <span class="experiencia_esc">
                      La experiencia
                      </span>
                        <br>
                      '.$descripcion.'
                  </p>
              </div>
          </div>
        </div>  
    </div>
    <br>
    <hr>                            
    ';
                
     
    }

    
    $escenarios_section .=  "</div>";



?>


<?=$escenarios_section?>


<style type="text/css">
.img_sm_enid{
      width: 100px;    
  }
  .seccion_descripcion{
    width: 82%;
    margin: 0 auto;
  }
  .p-escenario-enid{

      font-size: .8em;
      background: #193746;
      color: white;    
      margin: initial;
  }
  .footer_escenarios{
      font-size: .8em;
  }
  .otros_escenarios2{   
    height: 300px;
    overflow-x: hidden;
    overflow-y: scroll; 
  }
  .otros_escenarios3{   
    height: 320px;
    overflow-x: hidden;
    overflow-y: scroll; 
  }
  .experiencia_esc{
    background: #E31F56;
    color: white;
    padding: 4px;
  }  
  .nombre_escenario_otros{  
    text-decoration: none;
    font-size: 1.2em;
    color: #da4c14;
  }
 
  
  .confi_now_escenario{
    color: blue;
  }
  .config_now_escenario{
    color: white;
    background: #0f96cb;
    padding: 1px;
    border-radius: 1px;
  }
  .title_o_escenarios{
 
    color: white;
    font-size: 2em;
    text-align: center;  
    margin-top: -40px;
    margin-bottom: 15px;

  }
  </style>