<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emp  extends CI_Controller{
    function __construct(){
        
        parent::__construct();
        $this->load->helper("empresa");        
        $this->load->model("empresamodel");
        $this->load->library('principal');    
        $this->load->library('sessionclass');    
    }    
    function index(){

        $param =  $this->input->get();
        $q = $param["q"];
        $this->la_historia($q);
    }
    /**************************La historia de la empresa ***************/    
    function la_historia($id_empresa){        

        $this->principal->crea_historico(6 , 0 , 0 , $id_empresa);        
        $data_empresa= $this->empresamodel->get_empresa_by_id($id_empresa)[0];        
        $data = $this->val_session( $data_empresa["nombreempresa"]." - Nuestra historia" ); 
        $data["url_img_post"] = create_url_preview(6 , $id_empresa);
        $view_public=  $this->view_like_public($data["in_session"],  $id_empresa);
        $data["view_public"] = $view_public;
        $data["in_session"] = $view_public;
        /**/                    
            $data["data_empresa"] =  $data_empresa;                    
            
            $data["meta_keywords"] =  $data_empresa["nombreempresa"].",Nuestra historia, página web,comunidad,misión,visión,quienes sómos";
            $data["titulo"] =$data_empresa["nombreempresa"]."- Nuestra historia,página web,comunidad,misión,visión,quienes sómos";                
            $this->principal->show_data_page($data , 'empresa/historia' ,  1 );   
            
    }
    /**/    
    
    /**/
    function view_like_public($in_session,  $id_empresa ){
        
        $flag_view_public = 0;            
        if ($in_session ==  1 ){
            /**/
           
            $id_empresa_user =  $this->sessionclass->getidempresa();                                                                        
            if ($id_empresa ==  $id_empresa_user ){
                $flag_view_public =1;
            }
           
        }
        return $flag_view_public;
    }
   /**************************La historia de la empresa  **************++*/
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