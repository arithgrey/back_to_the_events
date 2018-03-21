<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
    function __construct(){        
        parent::__construct();                            
        $this->load->library("principal");
        $this->load->library('sessionclass');        
    }       
    function index(){
        
        $data = $this->val_session("");
        $data["url_img_post"] = create_url_preview(7);
        $data["meta_keywords"] =  ""; 
                             
            /**/
            $this->principal->crea_historico(11222);            
            $this->principal->show_data_page($data, 'home');                    
            $this->session->sess_destroy();     

    }
    /**/
    function logout(){  
        $this->session->sess_destroy();
        redirect(base_url());
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
                
                //$menu = $this->sessionclass->generadinamymenu();

                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                //$data["menu"] = $menu;              
                //$data["nombre"]= $nombre;                                               
                //$data["email"]= $this->sessionclass->getemailuser();                                               
                //$data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 0;
                $data["no_publics"] =0;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                //$data["id_usuario"] = $this->sessionclass->getidusuario();                     
                ///$data["id_empresa"] =  $this->sessionclass->getidempresa();                     
                //$data["info_empresa"] =  $this->sessionclass->get_info_empresa();                     
                return $data;
        }   
    }      


}