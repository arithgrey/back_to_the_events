<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Opiniones extends REST_Controller{      
    function __construct(){
        parent::__construct();                          
        $this->load->model("empresamodel");
    }
    /**/
    function laexperiencia_POST(){        
        $param = $this->post(); 
        $db_response = $this->empresamodel->insert_experiencia($param);        
        $this->response($db_response);    
    }
    
}?>