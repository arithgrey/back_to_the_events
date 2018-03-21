<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Escenarios_artistas extends REST_Controller{
    function __construct(){        
        parent::__construct();
        $this->load->helper("escenario");                                               
        $this->load->model("escenarios_artistas_model");        
        $this->load->library('sessionclass');                    
    }   
    /**/
    function resumen_evento_GET(){        
        $param =  $this->get();
        //$data["in_session"] =  $this->validate_user_sesssion();
        $data["info"] = $this->escenarios_artistas_model->get_resumen_escenario_artistas_evento($param);

        $this->load->view("escenarios_q/resumen" , $data);        
    }
    /**/
    function escenarios_artistas_evento_GET(){

        $param =  $this->get();
        $data["in_session"] =  $this->validate_user_sesssion();
        $data["info"] = $this->escenarios_artistas_model->get_escenarios_artistas_evento($param);
        $this->load->view("escenarios_q/artistas_escenarios" , $data);                   
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        
                return  1; 
            }else{                            
                return  0;  
            }   
    }/**/

}?>