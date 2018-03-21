<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Contactos extends REST_Controller{
  function __construct(){
        parent::__construct();       
        $this->load->helper("contacto");    
        $this->load->model("contactmodel");
        $this->load->library('sessionclass');                
  } 
  /**/
  function locacion_PUT(){

      $param =  $this->put();
      $db_response = $this->contactmodel->update_locacion_maps($param);
      $this->response($db_response);

  }
  /**/
  function form_img_GET(){
    $data["param"] =  $this->get();
    echo $this->load->view("imgs/contactos" , $data );
  }
  /**/
  function contacto_DELETE(){
    $param =  $this->delete();
    $db_response = $this->contactmodel->delete($param);
    $this->response($db_response);
  }
  /**/  
  function nota_PUT(){
    /**/
    $db_response = $this->contactmodel->update_contacto_nota($this->put());
    
    $this->response($db_response);
    /**/
  }
  /**/
  function empresa_GET(){
    
    $this->validate_user_sesssion();
    $id_empresa = $this->sessionclass->getidempresa();        
    $db_response = $this->contactmodel->get_contactos_empresa($id_empresa);
    $this->response($db_response);


  }    
  /**/
  function contacto_q_img_GET(){

      $this->validate_user_sesssion();
      $id_usuario =  $this->sessionclass->getidusuario();
      
      $q =  $this->get("q");
      $data["contactos"] = $this->contactmodel->get_contacto_filtro_q( $id_usuario , $q );              
      echo $this->load->view("puntosventa/por_filtro" ,  $data);

  }
  /**/
  function contacto_q_GET(){
      $this->validate_user_sesssion();
      $id_usuario =  $this->sessionclass->getidusuario();
      $q =  $this->get("q");
      $db_response = $this->contactmodel->get_contacto_q( $id_usuario , $q);  
      $this->response($db_response);

  }
  /**/
  function contactos_resumen_GET(){
    
      $this->validate_user_sesssion();
      $id_usuario =  $this->sessionclass->getidusuario();
      $data_repo_contactos = $this->contactmodel->get_repo_contactos($id_usuario);        
      $this->response(resumen_contactos( $data_repo_contactos));              
  }      
  function contacto_emp_put(){
  
      $this->validate_user_sesssion();            
      $id_empresa= $this->sessionclass->getidempresa();
      $id_usuario =  $this->sessionclass->getidusuario();
      $contacto_data =  $this->put();
      $this->response($this->contactmodel->update_contacto_empresa($id_empresa , $contacto_data , $id_usuario ));
      /**/
  }
  /**/
  function contacto_post(){
  
      $this->validate_user_sesssion();
      $nombre  =  $this->post("nombre");
      $organizacion  =  $this->post("organizacion");
      $telefono =  $this->post("telefono");
      $movil  = $this->post("movil");
      $correo =  $this->post("correo");
      $direccion = $this->post("direccion");
      $tipo =  $this->post("tipo");      
      $nota = $this->post("nota");
      $pagina_web = $this->post("pagina_web");
      $pagina_fb  = $this->post("pagina_fb");
      $pagina_tw  = $this->post("pagina_tw");
      $correo_alterno = $this->post("correo_alterno");
      $extension = $this->post("extension");
      $id_usuario =  $this->sessionclass->getidusuario();
  
      $response_db = $this->contactmodel->record( $nombre , $organizacion , $telefono, $movil          
                    , $correo , $direccion, $tipo , $id_usuario , $nota , $pagina_web ,
                     $pagina_fb  , $pagina_tw , $correo_alterno , $extension );      

      $this->response($response_db);

  }
  /*Retorna mis contactos*/
  function contacto_get(){

      $this->validate_user_sesssion();
      $id_usuario =  $this->sessionclass->getidusuario();      
      $param = $this->get();             
      $data["contactos"] =  $this->contactmodel->get_contactos_user($id_usuario, $param );
      echo $this->load->view("directorio/list" , $data );

  }
  /**/
  function contacto_id_GET(){

      $this->validate_user_sesssion();
      $idusuario =  $this->sessionclass->getidusuario();      
      $response_db =  $this->contactmodel->get_contactos_id($this->get());
      $this->response($response_db);       
  }
  /**/
  function contacto_put(){
      $this->validate_user_sesssion();
      $id_contacto= $this->put("idcontacto");
      $nombre  =  $this->put("nnombre");
      $organizacion  =  $this->put("norganizacion");
      $telefono =  $this->put("ntelefono");
      $movil  = $this->put("nmovil");
      $correo =  $this->put("ncorreo");
      $direccion = $this->put("ndireccion");
      $tipo =  $this->put("ntipo");      
      $nota = $this->put("nnota");
      $pagina_web = $this->put("npagina_web");
      $pagina_fb = $this->put("npagina_fb");
      $pagina_tw = $this->put("npagina_tw");
      $correo_alterno  =  $this->put("ncorreoalterno");   
      $extension =  $this->put("nextension");

      $id_usuario =  $this->sessionclass->getidusuario();
      $response_db = $this->contactmodel->update( $nombre , $organizacion , $telefono, $movil          
                    , $correo , $direccion, $tipo , $id_usuario, $nota , $pagina_web , $id_contacto , $pagina_fb , $pagina_tw ,  $correo_alterno , $extension  );      

      $this->response($response_db);

  }
  /*Terminal la función*/
  /**/
  function validate_user_sesssion(){
      if($this->sessionclass->is_logged_in() == 1) {                        

          }else{
          /*Terminamos la session*/
          $this->sessionclass->logout();
        }

      }/*termina validar session */
}