<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
  
  function contruye_servicios_time($servicios , $in_session , $id_evento ){

    $lista_servicios =  ""; 
    
        $flag = 0; $flag_b=0;
        foreach ($servicios as $row) {
         
          $idservicio =  $row["idservicio"]; 
          $servicio = $row["servicio"];
          $nota =  $row["nota"];


          $lista_servicios .=  "<span class='l_servicios'>" . $servicio . "</span>";
          
        }

        $url =  url_evento_view_config($id_evento).'/serviciosincluidos';
        if ($in_session == 1 ){
          $lista_servicios .=  "<br><a href='".$url."'><span class='l_servicios_call'>+ Agregar más servicios al evento </span></a>";
        }
        return  $lista_servicios;            
    
  }   
  /**/
  function listado_servicios_incluidos_client($data)
  {
      
     $l = '<div class="panel"  >
                        <header class="panel-heading">
                        <h1 class="text-center" style="font-size:5em;">
                          <strong>
                            Servicios que disfrutarás en el evento
                          </strong>  
                        </h1>                          
                        </header>
                        <div class="panel-body scroll-vertical-enid" style="height:300px;">
                            <ul class="to-do-list ui-sortable" id="sortable-todo">'; 
     foreach ($data as $row) {    

      $servicio = $row["servicio"];
      $nota =  $row["nota"];
      $idservicio = $row["idservicio"];
      $dinamic_nota = ""; 

      if (strlen($row["nota"]) > 200){      

      $more = "more_".$idservicio;       
      $info = "info_serv".$idservicio;
          $dinamic_nota = "<div class='$info'>" .substr($row["nota"] , 0 , 180) . "<br>
                            <a class='mas-info' id='".$idservicio."'>+ info</a>
                          </div>
          <div style='display:none;' class='$more'>
          ".$nota."
              <br><a class='menos-info' id='".$idservicio."'>- info</a>
          </div>";
      }else{
          $dinamic_nota = $row["nota"];
      }


      $l .= '
      <li class="clearfix">
          <span class="drag-marker">
          <i>
          </i>
          </span>
          <div class="todo-check pull-left">
              <input value="None" id="todo-check" type="checkbox" checked>
              <label for="todo-check">
              </label>
          </div>
          <p class="todo-title line-through" style="font-size:1.1em;">
            '.$row["servicio"] .'            
          </p>                   
          <p style="font-size:.8em;">
          '
          .$dinamic_nota.
          '
          </p>

      </li>';


      }    
      $l .= '</ul>                            
            </div>
          </div>
          <hr>';           
    
      return $l;              
  }
  /**/
  function serviciosevent($arreglo){
    
    $flag_servicio = 0;   
    $pos =1;  
    $complete ="";
    $servicios  = '<table style="width:100%; font-size:.8em;" >';                    
  

    $url_config=base_url();  
    $config_btn ="<i class=''></i>"; 

        foreach ($arreglo as $row){

            $idservicio =  $row["idservicio"];
            $nombreservicio = $row["servicio"];
            $idserviciointer  =  $row["idserviciointer"];
          
            if (isset($nota)) {
                $nota =  $row["nota"];       
            }else{
              $nota = "+ Cargar nota";              
            }              
            
            $nota_area_ = "nota_area_".$idservicio;
            $text_area_nota_servicio  = "text_area_nota_servicio" . $idservicio;  
            $nota_area =  "<i class='nota-servicio fa fa-list-alt' id='". $idservicio ."' data-toggle='modal' data-target='#modal-descripcion-servicio'></i>              
                            <div class='nota-form-servicio' id='". $nota_area_ ."' >
                              <textarea class='form-control' id='".$text_area_nota_servicio."' rows='2'>". $nota ."</textarea>
                            </div>
              ";


              if ($idserviciointer  == $idservicio ) {          
                $flag_servicio ++;        
                $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."' checked>";  
              }else{              
                $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."'>";
              }

              $servicios .= "<tr>";  
              $servicios .= get_td( $pos , "");
              $servicios .= get_td( $nombreservicio);              
              $servicios .= get_td( $dinamiccheck , "");                                 
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
  
  function get_servicios_config($data){


    $complete = ""; 
    $table ="";    
    $table .=  "<div style='overflow-x:auto; height:500px;'>";     
    $table .=  "<table class='table table-bordered'>"; 
    $table .= "<tr class='header-table-info'>";
    $table .=  get_td("#",  ""); 
    $table .=  get_td("Servicio",  ""); 
    $table .=  get_td("Nota para el público" , "" );
    $table .=  get_td("Fecha de registro" , "");
    $table .=  get_td("<button title='Seleccionar ó deseleccionar' class='btn btn-info up-all-serv'> 
                      <i class='fa fa-check-square '> </i> </button>" , "");
    $table .= "</tr>";
    $flag_cargas = 0;
    $flag = 1; 
    $flag_total =0 ;
    foreach ($data as $row) {
      /*flag */
      $idservicio =  $row["id_servicio"];       
      /* Evento servicio */
      $servicio =  $row["servicio"];
      $nota =  $row["nota"];
      $fecha_registro =  $row["fecha_servicio_registro"];
      $id_evento =  $row["id_evento"];
      $id_servicio =  $row["eventoservicio"];

        $table .= "<tr>";
        $table .=  get_td($flag , ""); 
        $table .=  get_td($servicio , "class='franja-vertical'" );      

        if ($idservicio !=  $id_servicio) {        
          $fa_nota =  ""; 
        }else{  
          $flag_total ++;             
          $fa_nota =  "<i class='servicio_nota fa fa-list-alt' data-toggle='modal' data-target='#modal-nota'   id='". $idservicio ."' ></i>";   
        }
        $table .=  get_td( $fa_nota , "" );      
        $table .=  get_td($fecha_registro ,  "");
        $inputs ="";

        if ($idservicio !=  $id_servicio) {        

          $inputs ="<div class='checkbox'><input type='checkbox' class='servicios-input' id='". $idservicio  ."' ></div>";   
        }else{
          $flag_cargas ++;
          $inputs ="<div class='checkbox'><input type='checkbox' class='servicios-input' id='". $idservicio  ."' checked></div>";           
        }
        $table .= get_td( $inputs  ,  "");
        $table .= "</tr>";        
      $flag ++;  
    }
    $table .= "</table></div>";    
    $complete .=  "<em class='total_table'>Incluidos: ". $flag_cargas ."</em>"; 
    $complete .=  $table;

    return $complete;
  }
}/*Termina el helper*/