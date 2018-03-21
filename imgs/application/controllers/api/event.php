<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Event extends REST_Controller{
    function __construct(){
        parent::__construct();
        
        $this->load->model("escenariosmodel");                
        $this->load->model("eventmodel");                
        $this->load->helper("eventosh");                       
        $this->load->library('sessionclass');                    
    }

    function imagenes_GET(){            

        $id_evento = $this->get("id_evento");     
        $data["imagenes_portada"] = $this->eventmodel->get_img_evento($id_evento);
        $data["param"] =  $this->get();    
        echo  $this->load->view("eventos/slider" , $data );
        
    }  
    /**/
    function galeria_evento_GET(){

        $param =  $this->get();            
        $data["info_eventos"] = $this->eventmodel->get_imgs_evento_galeria($param);        
        $data["info_artistas"] =  $this->escenariosmodel->get_img_artistas_evento($param);
        $this->load->view("eventos/galeria_resumen" , $data);
    }

    /**/    

}/*Termina el controlador rest */
?>