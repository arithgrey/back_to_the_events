<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accesos extends CI_Controller {
	function __construct(){        
		parent::__construct();                
        $this->load->model("eventmodel");
        $this->load->model("accesosmodel");
        $this->load->helper("accesos");
        $this->load->library('principal');    
		$this->load->library('sessionclass');    
	}	    
    /**************************Configuracion de Acceso  avanzado **************++*/    
    function index(){

        $param = $this->input->get();
        $id_evento =  $param["q"];        
        $q3 =  0; 

        $id_acceso =  0;
        if (isset($param["q2"])) {
            $id_acceso =  $param["q2"];    
        }if( isset($param["q3"]) ) {
            $q3 = 1; 
        }
    

        $data_evento  = $this->eventmodel->getEventbyid($id_evento);        
        $data = $this->val_session("Las promociones de mi evento");        
        
            $view = $this->view_like_public($data["in_session"],  $id_evento);

            if ($view == 1 ){

                $data["data_evento"] =  $data_evento[0]; 
                $id_user = $this->sessionclass->getidusuario();        
                $id_empresa =  $this->sessionclass->getidempresa();  
                $data["tipos_accesos"] = $this->accesosmodel->get_tipos_accesos();         
                $data["empresa"] =  $id_empresa;            
                $data["id_acceso"] =  $id_acceso;
                $data["q3"] =  $q3;

                $this->principal->show_data_page( $data , 'accesos/avanzado');        
                $this->principal->crea_historico(19 , $id_evento , $this->sessionclass->getidusuario() );
    
            }else{

                header('Location:' . url_inicio_eventos());
            }
            

    }
    /**************************Termina Configuracion del acceso avanzado **************++*/
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


    
    /*Determina que vistas mostrar para los eventos*/    
    function view_like_public($in_session,  $id_evento){
        
        $flag_view_public = 0;            
        if ($in_session ==  1 ){
            /**/
            $id_user =  $this->sessionclass->getidusuario();                                    
            $id_empresa =  $this->sessionclass->getidempresa();                                                                        
            $flag_view_public = $this->eventmodel->verifica_propiedad($id_evento ,  $id_user , $id_empresa );
        }
        return $flag_view_public;
    }
    /**/
}/*Termina el controlador */