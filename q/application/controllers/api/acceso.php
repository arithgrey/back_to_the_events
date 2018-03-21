<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Acceso extends REST_Controller{
    function __construct(){            
        parent::__construct();
        $this->load->helper("accesos");
        $this->load->model("accesosmodel");
        $this->load->library('sessionclass');                    
    }     
    /**/
    function resumen_evento_GET(){    
        $param =  $this->get();    
        $data["info"] =  $this->accesosmodel->get_resumen_evento($param);
        $this->load->view("accesos_q/resumen" , $data);        
    }
    /**/
    function accesos_evento_GET(){
        $param =  $this->get();
        $data["in_session"] =  $this->validate_user_sesssion();
        
        $data["info"] = $this->accesosmodel->get_accesos_evento($param);
        $this->load->view("accesos_q/accesos_evento" , $data);                   
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        
                return  1; 
            }else{                            
                return  0;  
            }   
    }/**/

    
}
?>