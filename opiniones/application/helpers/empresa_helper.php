<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
function valida_call_comentarios( $url ){

      
      $part_fb =  '<div class="fb-share-button" data-href="'.$url.'" data-layout="button" data-size="small" data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="'.$url.'">
                    Compartir
                    </a>
                  </div>';
      
      return $part_fb;

}
function get_inputs_starts($limit){
  $inputs  = '';
  for ($x=1; $x <=$limit ; $x++ ){     
          $inputs .= "
                  <input id='$x' class='input-start' type='radio' name='calificacion' value='$x'>
                  <label  class='lstart' for='$x'> &#9733;
                  </label>
                ";     
  }
  return $inputs;
}

}/*Termina el helper*/