<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
  function now_enid(){
    return  date('Y-m-d');
  }
  /**/
  function evalua_titulo_menu_principal($nombre ,  $email ){
    
    $menu =  ""; 
    if ( strlen($menu )> 0 ){
      $menu =  $nombre;
    }else{
      $menu = $email;
    }
    return $menu;
  }
  /**/

  
}/*Termina el helper*/