<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Escenario  extends CI_Controller {
	function __construct(){
		parent::__construct();

        $this->load->model("eventmodel");        
        $this->load->model("escenariomodel");        
        $this->load->helper("escenario");    
        $this->load->library("principal");
		$this->load->library('sessionclass');    
	}

    /**************************Configuracion del escenario avanzado **************++*/
    function index(){
        $param = $this->input->get();
        $id_escenario = $param["q"];
        $q=  "";
        $evento=  $this->eventmodel->get_by_escenario($id_escenario)[0];                    
        $url_evento = url_evento_view_config($evento["idevento"]);
        $data = $this->val_session("");                                                         
        $data["evento"]=  $evento;
        $view =  $this->view_like_public($data["in_session"], $evento["idevento"]);
        if ($view ==  1 ){
            $data_escenario =  $this->escenariomodel->get_escenariobyId($id_escenario)[0]; 
            $data["data_escenario"]=$data_escenario;
            $data["titulo"] =  "evento - ". $evento["nombre_evento"] ." - configuración escenario ".$data_escenario["nombre"];
            $data["meta_keywords"] = "evento,".$evento["nombre_evento"].",configuración,escenario,".$data_escenario["nombre"];
            $data["q"] =  $q;
            $this->principal->show_data_page($data ,  'escenarios/configuracion_avanzado');                        
            $this->principal->crea_historico(16 , $evento["idevento"] , $this->sessionclass->getidusuario() );

        }else{

            header('Location:' . url_inicio_eventos());
        }    
    }    
    
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


}/*Termina el controlador */