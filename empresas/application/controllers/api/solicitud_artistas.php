<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Solicitud_artistas extends REST_Controller{      
    function __construct(){
        parent::__construct();                          
        $this->load->model("solicitudartistasmodel");
    }
    /**/
    function artistas_POST(){
        /**/
        $data = $this->post();
        $db_response = $this->solicitudartistasmodel->solicitud_artista($data);
        $this->response($db_response );
        /**/
    }
        
    
}?>