<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
function carga_logo_empresa($data_empresa  ){
 

  $img = ''; 
  $path_img  = ''; 
  $class_default =  "links_enid"; 
  $extra = 'href="#pill-3" role="tab" data-toggle="tab" class="'.$class_default.' " id="historia-emp"';  
  $url_img =  url_imagen_empresa($data_empresa["idempresa"]);
  return "<div class='img-logo-emp-section'>
            <img id='img-logo-emp' class='img-tmp-empresa'  ". $extra ." src='".$url_img ."' width='100%' >
          </div>"; 
      
}
/**/
function validate_info_emp($val, $in_session  ,  $class ){
  $new_text =""; 
  if(trim( strlen($val)) == 0 ){
    $new_text =  "<span class='text-emp   ".$class ."'> + agregar </span>";
  }else{
    $new_text =  "<span class='text-emp  ".$class ."'>" . $val ."</span>";
  }
  return $new_text;
}
function modal_localizacion($in_session,  $localizacion){


  $text =  ""; 
  if ($in_session ==  1 ) {
      $text = "<span class='lb-pais' data-toggle='modal' data-target='#modal-locacion' >  
                ". $localizacion ."
                </span>";
  }else{
    $text = "<span class='lb-pais'>  
                ". $localizacion ."
              </span>";
  }
  return $text;
    

}
/**/

function get_select_paises($paises, $class , $id, $name ){

    
  $select =  "<select class='form-control ".$class." ' id='". $id ."' name='".$name ."'>";
  foreach ($paises as $row) {
    
    $select .=  "<option value='".$row["idCountry"]."' >".$row["countryName"] ."</option>";  
  }
  $select .= "</select>";
  return $select;

}














}/*Termina el helper*/