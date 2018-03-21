<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Accesos extends REST_Controller{
    function __construct(){            
        parent::__construct();
        $this->load->helper("accesos");
        $this->load->helper("puntoventa");
        $this->load->model("accesosmodel");
        $this->load->model("puntoventamodel");
        $this->load->library('sessionclass');        
    }     
    /**/
    function resumen_accesos_punto_venta_evento_GET(){
        $this->validate_user_sesssion();
        $id_evento = $this->get("evento");
        $resumen_puntos_venta_asociados =   get_resumen_puntos_venta_asociados($this->puntoventamodel->get_puntos_venta_asociadas($id_evento));
        $this->response($resumen_puntos_venta_asociados);

    }    

    /**/
    
    function resumen_accesos_evento_GET(){
        
        $this->validate_user_sesssion();
        $id_evento = $this->get("evento");
        $resumen_accesos =  resumen_puntos_venta_f($this->puntoventamodel->get_resumen_accesos($id_evento) );
        $this->response($resumen_accesos);

    }
    /**/
    
    /*update info acceso */    
    function acceso_PUT(){

        $this->validate_user_sesssion();                
        $id_evento = $this->put("evento");  
        $id_acceso = $this->put("acceso");
        $nuevo_precio =  $this->put("nuevo_precio");
        $nuevo_inicio_acceso =  $this->put("nuevo_inicio_acceso");
        $nuevo_termino_acceso =  $this->put("nuevo_termino_acceso");
        $nueva_descripcion =  $this->put("nueva_descripcion");
        $nuevo_tipo_acceso =  $this->put("nuevo_tipo_acceso");
        $nueva_moneda =  $this->put("nueva_moneda");
        $param =  $this->put();
        $id_usuario = $this->sessionclass->getidusuario(); 
        $responsedb = $this->accesosmodel->update($id_acceso , $nuevo_precio , $nuevo_inicio_acceso , $nuevo_termino_acceso , $nueva_descripcion , $nuevo_tipo_acceso , $nueva_moneda , $id_usuario , $param );
        $this->response($responsedb);
    }
    function list_get(){

        $this->validate_user_sesssion();
        $id_evento = $this->input->get("evento");
        $data["accesos"] = $this->accesosmodel->get_acceso_by_event($id_evento);
        $data["param"] =  $this->get();        
        echo  $this->load->view("accesos/list" ,  $data); 
    }    
    function accesos_evento_GET(){
       
        $id_evento = $this->get("evento");                        
        $db_response =  $this->accesosmodel->get_data_acceso_public($id_evento);                
        $resum =  lista_accesos_publicos($db_response,  0 , $id_evento );
        $this->response($resum);
        
    }/*Termina*/
    /***/        
    function load_post(){

        $this->validate_user_sesssion();
        $id_empresa =  $this->sessionclass->getidempresa();                
        $id_evento = $this->post("evento");                        
        $responsedb = $this->accesosmodel->getDataByidEvent($id_empresa, $id_evento);
        $this->response(list_accesos_edit($responsedb));
    }/*Termina*/
    function nuevo_post(){        
        $this->validate_user_sesssion();                
        $id_empresa =  $this->sessionclass->getidempresa();    
        $id_usuario = $this->sessionclass->getidusuario();    
        $nombre_usuario   = $this->sessionclass->getnombre();             
        $nombre_acceso =  $this->post("nombre_acceso");
        $id_evento = $this->post("evaccesos");        
        $acceso_tipo = $this->post("tipo_acceso");                        
        $precio = $this->post("precio-acceso-modal");                        
        $inicio = $this->post("nuevo_inicio_acceso");
        $termino = $this->post("nuevo_termino_acceso");                                
        $moneda =  $this->post("moneda");


        $dbrespose = $this->accesosmodel->insert( $nombre_acceso  , $precio , $inicio , $termino , $id_evento , $acceso_tipo,  $id_empresa ,  $id_usuario , $nombre_usuario , $moneda );
        $this->response($dbrespose);             
    }
    /**/
    function acceso_post(){
        
        $this->validate_user_sesssion();       
        $id_usuario = $this->sessionclass->getidusuario(); 
        $nombre =  $this->post("acceso_nombre");   
        $nombre_usuario   = $this->sessionclass->getnombre();             
        $tipo = $this->post("tipo");        
        $precio = $this->post("precio");        
        $inicio = $this->post("inicio");        
        $termino =  $this->post("termino");
        $id_evento = $this->post("evento");        
        $descripcion  = $this->post("descripcion");
        $moneda =  $this->post("moneda");
        $id_empresa =  $this->sessionclass->getidempresa();                              
        $param =  $this->post();
        $dbrespose = $this->accesosmodel->insert( $nombre , $precio  ,  $inicio  , $termino , $id_evento , $tipo , $descripcion , $id_empresa , $id_usuario ,  $nombre_usuario , $moneda , $param);        
        $this->response($dbrespose);
  
    }
    /*****************Elimina el acceso del evento **************/
    function deletebyid_post(){

        $this->validate_user_sesssion();               
        $id_evento = $this->post("evento");      
        $id_acceso = $this->post("acceso");    
        $id_usuario = $this->sessionclass->getidusuario(); 
        $param  =  $this->post();
        $db_response = $this->accesosmodel->delete( $id_evento , $id_acceso , $id_usuario,  $param);
        $this->response($db_response);         
    }
    /*Regresa la información de un sólo acceso mediante su id */
    function get_acceso_info_id_get(){        
        $id_acceso = $this->get("acceso");                  
        $this->response($this->accesosmodel->get_by_id( $id_acceso ));         
    }
    /**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        

                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }
    /*termina validar session */
    function form_img_acceso_GET(){
        $data["param"] =  $this->get();
        echo $this->load->view("imgs/acceso" , $data);
    }
}
?>