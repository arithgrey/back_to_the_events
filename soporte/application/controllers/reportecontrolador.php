<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportecontrolador extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper("repo");        
        $this->load->library('principal');                  
        $this->load->library('sessionclass');                  
    }
    function index(){  
          
        $data = $this->val_session("Ayudanos a mejorar tu experiencia");                       
        $this->principal->show_data_page( $data , 'reporte/reportes');        
        $this->principal->crea_historico(15);
    }
    /**/    
    function val_session($titulo_dinamico_page ){        
        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["email"]= $this->sessionclass->getemailuser();                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] =1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                $data["id_usuario"] = $this->sessionclass->getidusuario();                     
                $data["id_empresa"] =  $this->sessionclass->getidempresa();                     
                return $data;
        }else{            
            redirect(url_log_out());
        }   
    }       
    /*Determina que vistas mostrar para los eventos*/
}