<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Generosmusicales extends REST_Controller{      
    function __construct(){
            parent::__construct();

            $this->load->helper('generoshelp');
            $this->load->model('generosmusicalesmodel');
            $this->load->library('sessionclass');
            
        }             
/* generosmusicales generosmusicales generosmusicales generosmusicales generosmusicales generosmusicales*/
    function get_byid_evento_get(){

        if ( $this->sessionclass->is_logged_in() == 1) {  

                $id_empresa =  $this->sessionclass->getidempresa();                    
                $id_evento = $this->get("idevento");                     

                $responsedb = $this->generosmusicalesmodel->getDataByidEvent($id_empresa, $id_evento);
                $this->response(list_generos_musicales($responsedb)); 
                
        }else{

            $this->sessionclass->logout();        
        } 


    }
    /*Termina*/    
    function update_genero_evento_put(){
        
        if ( $this->sessionclass->is_logged_in() == 1) {  
                
                                                
                $data["id_empresa"] = $this->sessionclass->getidempresa();                    
                $data["id_evento"]  = $this->put("evento"); 
                $data["id_genero"] = $this->put("genero");             
                $data["id_user"] = $this->sessionclass->getidusuario();                                
                $responsedb = $this->generosmusicalesmodel->update_genero_evento($data);                                 
                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 
    }
    
}
?>