<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
  function valida_call_comentarios( $url){

      
      $part_fb =  '<div class="fb-share-button" data-href="'.$url.'" data-layout="button" data-size="small" data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="'.$url.'">
                    Compartir
                    </a>
                  </div>';
    
  return $part_fb;

}

}/*Termina el helper*/