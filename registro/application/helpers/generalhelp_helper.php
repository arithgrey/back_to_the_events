<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**/
function template_documentacion($titulo,  $descripcion , $url_img  ){    
      $block =  "
                  <span>
                  <b>"; 
      $block .= $titulo;
      
      $block .= "</b>
                </span>
                <br>
                <span>
                ". $descripcion;

      $block .= "</span>
                  <img src='".$url_img."' class='desc-img'>
                ";                          
      $block .= "<br>
                <br>";
      return $block;


  }
/**/
if(!function_exists('invierte_date_time')){
  
  function construye_menu_enid_service($titulos , $extras ){
      $menu =  ""; 
      for ($a=0; $a < count($titulos ); $a++){ 
        $menu .=  "<a ".$extras[$a]." >" . $titulos[$a]." | </a>" ; 
      }
      return $menu;
  }
  /**/
  /**/
  

  /*NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN */
  function navegador(){
    return $_SERVER['HTTP_USER_AGENT'];
  }
  /**/
  function ip_user(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'];
  }  
  /**/
  function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE){    
        $source = 'abcdefghijklmnopqrstuvwxyz';
        if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($n==1) $source .= '1234567890';
        if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
        if($length>0){
            $rstr = "";
            $source = str_split($source,1);
            for($i=1; $i<=$length; $i++){
                mt_srand((double)microtime() * 1000000);
                $num = mt_rand(1,count($source));
                $rstr .= $source[$num-1];
            }
        }
        return $rstr;
  }
  function create_url_preview($tipo , $val_extra='' ){

    switch ($tipo) {
      /*Para los eventos */
      case 1:
          return base_url('index.php/enid/img_evento')."/".$val_extra;
        break;
      /**imagen general roja  */
      case 2:
          return base_url('application/img/landing/1.jpg');
        break;
      /**imagen resumen de eventos */
      case 3:
        return base_url('application/img/landing/11.png');
        break;
        /*Para solicita tu artista*/
      case 4:
        return base_url('application/img/landing/11.png');
        break;
        /*cuentanos tu historia*/
      case 5:
        return base_url('application/img/landing/11.png');
        break;
        /*La empresa */
      case 6:
        return base_url('index.php/enid/imagen_empresa')."/".$val_extra;
        break;    

      /*Página principal */
      case 7:
        return base_url('application/img/landing/prospectos.jpg');
        break; 
      /*Página inicio session  */
      case 8:
        return base_url('application/img/landing/session.jpg');
        break;    
      /*Página  de prospectos  */
      case 9:
        return base_url('application/img/landing/prospectos.jpg');
        break;    
      /*Nuevo miembro */    
      case 10:
        return base_url('application/img/landing/25.jpg');
        break;
      /*Las historias de la gente*/
      case 11:
        return base_url('application/img/landing/encuesta.png');
      break;  
      /**/
      case 12:
        return base_url('application/img/landing/21.jpg');
      break;  

      default:
          return base_url('application/img/landing/1.jpg');
        break;
    }
  }

  /**/
  function valida_template_perfil_home($perfil){

    switch ($perfil) {
      case 7:
          return "principal/center_page_general"; 
        break;
      case 4:
          return "principal/center_page_general_prospecto";   
        break;    
      case 3:
          return "principal/center_page_general_prospecto"; 
      break;  
      
      default:
        return ""; 
      break;
    }
  }                                                

  /*NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN NAVEGACIÓN */
  
  function get_random(){
    return  mt_rand();       
  }
  function titulo_enid($titulo){

    $n_titulo =  n_row_12() 
                 ."<h1 class='titulo_enid_service'>
                    ". $titulo ."
                    </h1>".
                 end_row();

    return $n_titulo;             
  }
  /**/

  
  

}/*Termina el helper*/