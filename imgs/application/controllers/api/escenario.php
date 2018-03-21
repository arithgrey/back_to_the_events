<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Escenario extends REST_Controller{      
    function __construct(){
        parent::__construct();                
        $this->load->helper("escenario");      
        $this->load->model("img_model");
        $this->load->library('sessionclass');            
    }    
    /***/    
    function slider_admin_GET(){

        $id_escenario = $this->get("escenario");
        $param =  $this->get();
        $data["imgs"] =  $this->img_model->get_imgs_escenario($id_escenario);                    
        $data["param"] =  $param;    
        echo  $this->load->view("escenarios/slider" , $data);
    }

    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {}else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
    
    
}
?>