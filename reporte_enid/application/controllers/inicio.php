<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	function __construct(){        
        parent::__construct();            			
	    $this->load->library("principal");
	    $this->load->library('sessionclass');	     
    }    
    /**/
    function index(){

		$data = $this->val_session("Los prospectos");
		$id_empresa =  $this->sessionclass->getidempresa();		

		if ($id_empresa ==  1 ){
			$this->principal->show_data_page( $data , 'empresa/empresas_enid');			
			$this->principal->crea_historico(29 , 0 , $this->sessionclass->getidusuario());
		}else{
			redirect(base_url());
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