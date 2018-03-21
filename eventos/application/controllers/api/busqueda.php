<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Busqueda extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("eventosh");   
        $this->load->helper("busqueda");
        $this->load->model("busquedamodel");            
        $this->load->library('sessionclass');    
    }  
    /**/
    function eventos_enid_user_GET(){
        $param =  $this->get();       
        $param["limit"] =  3;
        $db_response =  $this->busquedamodel->q_eventos($param);

        $this->response(get_last_events_empresa($db_response , 270 ,  0 , 0 , 0 , 1));                    
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
                return $data;
        }else{            
            $data['titulo']=$titulo_dinamico_page;              
            $data["in_session"] = 0;
            return $data;
        }   
    }    
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        
        }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
    /**/
    function eventos_empresa_GET(){
        $param =  $this->get();       
        $db_response =  $this->busquedamodel->eventos_e($param);
        $this->response(get_last_events_empresa($db_response , 270 ,  1 , 1 , 1));
        
    }
    /**/
    function eventos_empresa_resumen_GET(){
        $param =  $this->get();       
        $db_response =  $this->busquedamodel->eventos_e($param);
        $this->response(get_last_events_empresa($db_response , 270 ,  0 , 0 , 0));   

    }
    /**/
    function eventos_enid_GET(){        

        $param =  $this->get();               
        $param["f"] =0;
        $db_response =  $this->busquedamodel->q_eventos($param);        
        if ($db_response["num_eventos"] > 0 ) {
            $this->response(get_last_events_empresa($db_response , 270 ,  0 , 0 , 0 , 1));                
        }else{
            $param["f"] =1;
            $db_response =  $this->busquedamodel->q_eventos($param);        
            $this->response(get_last_events_empresa($db_response , 270 ,  0 , 0 , 0 , 1));                

        }        
    }
}/*Termina rest*/