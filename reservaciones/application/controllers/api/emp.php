<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
require 'Request.php';
class Emp extends REST_Controller{      
    function __construct(){
        parent::__construct();                  
        $this->load->helper("empresa");           
        $this->load->model("empresamodel");                              
        $this->load->library('principal');                    
        $this->load->library('sessionclass');                            
    }
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
                        /*Terminamos la session*/
                $this->sessionclass->logout();
        }   
    }
    /**/
    function reservacion_PUT(){
        $this->validate_user_sesssion();    
        $param =  $this->put();
        if ($param["tipo"] ==  "empresa"){                    
            
            $param["id_empresa"] = $this->sessionclass->getidempresa();       
            $db_response =  $this->empresamodel->update_reservaciones($param);
            $this->response($db_response);            

        }else{

            $db_response =  $this->empresamodel->update_reservaciones_evento($param);
            $this->response($db_response);            
        }

    }
    /**/
    function reservacion_GET(){

        $this->validate_user_sesssion();    
        $param =  $this->get();
        if ($param["tipo"] ==  "empresa"){        
            /**/       
            $id_empresa = $this->sessionclass->getidempresa();       
            $db_response = $this->empresamodel->get_reservaciones($id_empresa);
            $this->response($db_response);
        }else{

            $param["id_empresa"] = $this->sessionclass->getidempresa();       

            $db_response =  $this->empresamodel->get_reservaciones_evento($param);     
            $this->response($db_response);
        }
    }

}?>