<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
  /**/
  function valida_modal_mas_info_servicio($nota ){      
      $seccion_modal =  "";
      if ( strlen(trim($nota)) > 200   ){
        $seccion_modal =  " data-toggle='modal'  data-target='#modal_info_servicio' ";
      }
      return $seccion_modal;
  }
  /**/
  function valida_mas_info_servicio($nota){

      $info_nota = $nota;
                      
      if ( strlen(trim($nota)) > 200   ){

          $info_nota = substr($nota, 0 , 200 )." ... ";                                     
        } 
        return $info_nota;             
  }

  /**/
  function genera_class_servicios($num){

    if ($num > 5 ) {
      return  "";
    }else{
      return  "";
    }
  }
  /**/
  function serviciosevent($arreglo){
    
    $flag_servicio = 0;   
    $pos =1;  
    $complete ="";
    $servicios  = '<table style="width:100%; font-size:.8em;" >';                    
  

    $url_config=base_url();  
    $config_btn =""; 

        foreach ($arreglo as $row){

            $idservicio =  $row["idservicio"];
            $nombreservicio = $row["servicio"];
            $idserviciointer  =  $row["idserviciointer"];
            $nota =  $row["nota"];       
            
            
            

            

              $nota_area =  ""; 

              if ($idserviciointer  == $idservicio ) {                        
                  $flag_servicio ++;        

                  $nota_area =  "<i 
                                  class='nota_servicio fa fa-list-alt' 
                                  id='". $idservicio ."' 
                                  data-toggle='modal' 
                                  data-target='#modal_descripcion_servicio'
                                  nombre_servicio = '".$nombreservicio."'
                                  info_extra =  '". $nota ."'
                                  >

                                </i>";
                  $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."' checked>";  
              }else{              
                $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."'>";
              }

              $servicios .= "<tr>";  
              $servicios .= get_td( $pos , "");
              $servicios .= get_td( $nombreservicio);              
              $servicios .= get_td( $dinamiccheck , "");                                 
              $servicios .= get_td( $nota_area , "");   

              $servicios .= "<tr>";  
              $pos ++;
          }  
  $servicios .= "</table>";
  $complete .= "<em class='total_table'>Incluidos: ". $flag_servicio  ." </em>";
  $complete .= $servicios;


  return  $complete;
}

/******************** in view main visualization  *********************   */

function list_services_default_view($arreglo){

  $list_servicios ='';
  foreach ($arreglo as $row) {   

      $list_servicios.='<li>'. $row["servicio"] .'<i class="icon-check-1"></i></li>';    
  }
  return $list_servicios;
}
/******************** in view main visualization  end *********************   */
function get_servicios_inclidos_event($data_servicios_array){
  $list_servicios ='';
  /*Cliclo */
  foreach ($data_servicios_array as $row) {      
    $list_servicios .='<li><a style="text-decoration:none; background: #09AFDF !important" href="#">'.$row["servicio"].'</a></li>';
  }

  return $list_servicios;
  }
  /**/
  
  
}/*Termina el helper*/