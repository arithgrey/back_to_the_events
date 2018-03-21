<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Serviciosevento extends REST_Controller{      
    function __construct(){
        parent::__construct();
        $this->load->helper("servicios");    
        $this->load->model("servicioseventmodel");        
        $this->load->library('sessionclass');        
    }    
    /**/
    function load_get(){
        
        $this->validate_user_sesssion();
        $id_empresa =  $this->sessionclass->getidempresa();                    
        $evento = $this->get("evento");                        
        $serviciodb = $this->servicioseventmodel->getserviciosevento( $evento , $id_empresa );
        $data["servicios"] =  $serviciodb; 
        $data["evento"] =  $evento; 
        echo  $this->load->view("servicios/config" ,  $data);    
    }
    /**/
    function update_post(){
        
        $this->validate_user_sesssion();
        $id_empresa =  $this->sessionclass->getidempresa();                    
        $evento = $this->post("evento");                        
        $idservicio =  $this->post("idservicio");
        $serviciodb = $this->servicioseventmodel->update( $evento , $idservicio ,  $id_empresa );
        $this->response($serviciodb);
            
    }
    /**/    
    function q_GET(){
        
        $param =  $this->GET();
        $db_serponse =  $this->servicioseventmodel->q($param);        
        $this->response(serviciosevent($db_serponse)); 
    } 
    /**/
    function nota_PUT(){
        $this->validate_user_sesssion();            
        $db_serponse = $this->servicioseventmodel->update_evento_servicio_nota($this->put());
        $this->response($db_serponse);
    }
    /*Cargamos los servicios incluidos en el evento*/
    function nota_GET(){
        $this->validate_user_sesssion();            
        $db_serponse =  $this->servicioseventmodel->get_servicio_evento($this->get());
        $this->response($db_serponse);
    }
    
    /*
    function update_all_in_event_PUT(){
        $this->validate_user_sesssion();
        $id_evento = $this->put("evento");                        
        $serviciodb = $this->servicioseventmodel->update_all_in_event($id_evento);
        $this->response($serviciodb);      
    }*/
    /**/
    function avanzado_GET(){

        $this->validate_user_sesssion();
        $id_empresa =  $this->sessionclass->getidempresa();                    
        $id_evento = $this->get("evento");                        
        $db_serponse = $this->servicioseventmodel->get_servicios_evento_config( $id_evento , $id_empresa );
        $this->response(get_servicios_config($db_serponse));    
    }
    /**/
    
    /**/
    
    /**/
    function descripcion_PUT(){

        $this->validate_user_sesssion();
        $param =  $this->put();                 
        $db_serponse  = $this->servicioseventmodel->update_descripcion($param);
        $this->response($db_serponse);
    }
    /**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        

                    return  1;
                    }else{
                    /*Terminamos la session*/
                    return 0;
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */
    /**/
    function servicios_empresa_GET(){
        $id_evento =  $this->get("id_evento");        
        
        $data["servicios"] = $this->servicioseventmodel->get_servicios_by_evento($id_evento);
        $data["param"] =  $this->get();
        echo $this->load->view("servicios/lista" ,  $data );        
    }
    /**/
    function servicios_evento_GET(){

        
        $id_evento =  $this->get("id_evento");
        $data["id_evento"] = $id_evento;
        $data["servicios"] = $this->servicioseventmodel->get_servicios_by_evento($id_evento);
        $data["in_session"] =  $this->validate_user_sesssion();
        $this->load->view("servicios/lista_eventos" ,  $data );        
    }

}
?>