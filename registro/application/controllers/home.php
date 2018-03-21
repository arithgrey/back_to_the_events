<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
    function __construct(){        
        parent::__construct();                            
        $this->load->library("principal");
        $this->load->library('sessionclass');        
    }       
    function index(){
        
        $data = $this->val_session("Eventos musicales, artistas,locaciones,puntos de venta,accesos, precios, antros, club,fiesta,festivales  ");
        $data["url_img_post"] = create_url_preview(7);
        $data["meta_keywords"] =  "Eventos musicales, artistas,locaciones,puntos de venta,accesos, precios, antros, club,fiesta,festivales"; 

        if ($this->sessionclass->is_logged_in() == true) {            
            redirect(url_presentacion());         
            
        }else{                                                  
            /**/

            $this->principal->crea_historico(1);            
            $this->principal->show_data_page($data, 'home');                    
            $this->session->sess_destroy();     
        }     
    }
    /**/
    function logout(){  
        $this->session->sess_destroy();
        redirect(base_url());
    }
    /**/   
    function val_session($titulo_dinamico_page){

        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] =1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                return $data;
        }else{            
            $data['titulo']=$titulo_dinamico_page;              
            $data["in_session"] = 0;
            $data["no_publics"] =0;
            $data["meta_keywords"] =  "";
            $data["url_img_post"]= "";
            return $data;
        }   
    }    
 
}