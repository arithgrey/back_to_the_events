<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Empresa extends REST_Controller{
    function __construct(){
        parent::__construct();
        
        
        $this->load->model("empresamodel");
        $this->load->helper("empresa");                       
        $this->load->library('sessionclass');                    
    }

    function form_logo_GET(){
        $data["param"] =  $this->GET();
        echo $this->load->view("empresa/logo_empresa" ,  $data);       
    }
    /**/
    function form_galeria_GET(){
        $data["param"] =  $this->GET();
        echo $this->load->view("empresa/galeria_imgs" ,  $data);       
    } 
    function galeria_GET(){

        $param =  $this->get();        
        $imgs =  $this->empresamodel->get_galeria($param);
        $this->response(construye_galeria($imgs , $param ));
    }
}/*Termina el controlador rest */
?>


