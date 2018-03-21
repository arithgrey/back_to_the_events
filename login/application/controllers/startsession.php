<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Startsession extends CI_Controller {
	function __construct(){        
        parent::__construct();                               
        $this->load->library('principal');        
        $this->load->library('sessionclass');        
    }         
    function index(){                
        
        $data = $this->val_session("Eventos musicales, Enid service, artistas,locaciones,puntos de venta,accesos, precios, antros, club,fiesta,festivales");
        $q =  $this->input->get("q");
        if ($q > 0 ){
            $data["mensaje_prospecto"]="<strong class='msj-cuenta'> ".get_mensaje_user_actualizado($q)."</strong> ";        
        }else{
            $data["mensaje_prospecto"]="";    
        }  
        $data["meta_keywords"] =  "Eventos musicales, Enid service, artistas,locaciones,puntos de venta,accesos, precios, antros, club,fiesta,festivales"; 
        $data["url_img_post"] = create_url_preview(8);
        if ($this->sessionclass->is_logged_in() == true){
            redirect(url_home());
        }else{                                                  
            /**/
            $this->principal->show_data_page($data, "signin" );            
            $this->principal->crea_historico(4);
            $this->session->sess_destroy();     
        } 
    }    
    /**/    
	function logout(){						
		$this->sessionclass->logout();		
	}	
	function val_session($titulo_dinamico_page ){

        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $email_user  = $this->sessionclass->getemailuser();
                
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["email_user"] = $email_user;                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] = 1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                return $data;
        }else{            
            $data['titulo']=$titulo_dinamico_page;              
            $data["in_session"] = 0;
            $data["no_publics"] = 0;
            $data["meta_keywords"] =  "";
            $data["url_img_post"]= "";

            return $data;
        }   


    }    
    /**/
}