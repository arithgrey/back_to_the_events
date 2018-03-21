<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
  