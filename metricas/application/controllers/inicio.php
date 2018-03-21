<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	function __construct(){       
	 
        parent::__construct();            
		$this->load->helper("repo");		
	    $this->load->library("principal");
	    $this->load->library('sessionclass');	     
    }    
    
	function index(){
		if (valida_session_enid($this->sessionclass->is_logged_in())) {

			$data = $this->val_session("Las tendencias de mis eventos");	
			$id_empresa =  $this->sessionclass->getidempresa();
			$data["id_empresa"] =  $id_empresa; 
			$data["nombre_user"]= $this->sessionclass->getnombre();
			$data["data_empresa"] =  $data["info_empresa"];
			$this->principal->show_data_page( $data , 'reporte/principal' );						
			$this->principal->crea_historico(13);
		}							
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
                $data["info_empresa"] =  $this->sessionclass->get_info_empresa();                     
                return $data;
        }else{            
            redirect(url_log_out());
        }   
    }      
    
}