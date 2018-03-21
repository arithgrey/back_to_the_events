<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Img_controller extends REST_Controller{
  function __construct(){
        parent::__construct();
        
        $this->load->model("img_model");
        //$this->load->helper("escenario");
        $this->load->helper("img_eventsh");
        $this->load->library('sessionclass');
            
  }     
  function form_img_user_GET(){
    
    $this->validate_user_sesssion();                    
    $data["param"] =  $this->GET();
    $data["id_usuario"] = $this->sessionclass->getidusuario();   
    echo $this->load->view("imgs/usuario" ,  $data);       
  } 
  /**/
    function form_escenario_GET(){        

        $data["id_escenario"] =  $this->get("escenario");
        echo $this->load->view("imgs/escenario" ,  $data);
    }
    /**/
    function form_artista_GET(){        
        $data["param"] =  $this->GET();
        echo $this->load->view("imgs/artistas" ,  $data);   
    }
    /**/
  /**/
   function form_evento_GET(){        
        $data["id_evento"] =  $this->get("evento");
        echo $this->load->view("imgs/evento_portada" , $data );
  }
  /**/
  function form_img_acceso_GET(){
        $data["param"] =  $this->get();
        echo $this->load->view("imgs/acceso" , $data);
  }
  /**/
  function imagen_galeria_empresa_DELETE(){

      $param = $this->delete();
      $db_response =  $this->img_model->delete_img_galeria($param);
      $this->response($db_response);

  }
  function upload_img_evento_POST(){

      $this->validate_user_sesssion();                
      $id_usuario = $this->sessionclass->getidusuario();   
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_imagen_evento($this->post() , $id_usuario , $id_empresa );
      $this->response($db_response);  
      

  }

  function logo_empresa_DELETE(){

      $this->validate_user_sesssion();                
      $id_usuario = $this->sessionclass->getidusuario();   
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->delete_logo_empresa($id_usuario , $id_empresa );
      $this->response($db_response);  

  }
  function logo_empresa_POST(){
      
      $this->validate_user_sesssion();                
      $id_usuario = $this->sessionclass->getidusuario();   
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_logo_empresa($this->post() , $id_usuario , $id_empresa );
      $this->response($db_response);  

  }

  /**/
  function escenario_artista_post(){  

      $this->validate_user_sesssion();            
      $id_usuario = $this->sessionclass->getidusuario();    
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_principal_escenario_artista($this->post() , $id_usuario , $id_empresa );
      
      $this->response($db_response);  

  }
  /**/
  function principal_escenario_post(){


      $this->validate_user_sesssion();            
      $id_usuario = $this->sessionclass->getidusuario();    
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_principal_escenario($this->post() , $id_usuario , $id_empresa );
      

      $id_escenario= $this->post("id_escenario");
      $img_data = $this->img_model->get_imgs_escenario($id_escenario);
      $slider_principal_escenario =  get_slider_img($img_data);



      $data["stus_response"] = $db_response;
      $data["slider_principal_escenario"] =  $slider_principal_escenario;
      $this->response($data);  

  }

  function contacto_post(){
  
      $this->validate_user_sesssion();            
      $id_usuario = $this->sessionclass->getidusuario();    
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_contacto($this->post() , $id_usuario , $id_empresa );
      $this->response($db_response);  

  }

  /**/

  function acceso_post(){
  
      $this->validate_user_sesssion();            
      $id_usuario = $this->sessionclass->getidusuario();    
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_acceso($this->post() , $id_usuario , $id_empresa );
      $this->response($db_response);  

  }
  /**/
  function punto_venta_post(){

     $this->validate_user_sesssion();            
      $id_usuario = $this->sessionclass->getidusuario();    
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_punto_venta($this->post() , $id_usuario , $id_empresa );
      $this->response($db_response);  
  }
  /**/
  function comunidad_GET(){

    $param =  $this->get(); 
    $db_response =  $this->img_model->get_comunidad_cliente($param);
    $imgs =  comunidad_experiencia($db_response); 
    $this->response($imgs );
  }
  /**/
  function validate_user_sesssion(){
      if( $this->sessionclass->is_logged_in() == 1) {      


          }else{
          /*Terminamos la session*/
          $this->sessionclass->logout();
        }   
    }/*termina validar session */
   /**/   
}