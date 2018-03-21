<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emp  extends CI_Controller{
    function __construct(){
        
        parent::__construct();
        $this->load->helper("empresa");                
        $this->load->library('principal');    
        $this->load->library('sessionclass');    
    }    
    function index(){

        $param =  $this->input->get();
        $q = $param["q"];
        $this->solicita_tu_artista($q);
    }
    /**************************La historia de la empresa ***************/       
    function solicita_tu_artista($id_empresa){

        $data_empresa= $this->principal->get_empresa($id_empresa)[0];
        $data = $this->val_session($data_empresa["nombreempresa"] . " - solicitanos tu artista .!" );         
        $data["data_empresa"] =  $data_empresa;
        $data["url_img_post"] = create_url_preview(12);
        $data["ciudades_list"] =$this->principal->get_cidades();        
        $this->principal->show_data_page( $data  , 'principal', 1);
        $this->principal->crea_historico( 12 , 0 , 0, $id_empresa);
    }
    
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
    
}/*Termina el controlador */