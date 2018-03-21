<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Escenario extends REST_Controller{      
    function __construct(){
            parent::__construct();
    
            $this->load->helper("artistas");                    
            $this->load->helper("escenario");                  
            $this->load->model("escenariomodel");
            $this->load->model("escenarioartistamodel");                
            $this->load->library('sessionclass');            
    }    
    /***/    
    
    function resumenpublic_GET(){

        $id_evento =  $this->get("evento");            
        $data["lista"] =  $this->escenariomodel->get_escenarios_byidevent($id_evento);      
        $data["id_evento"] =  $id_evento;         
        $data["configurar"] = $this->get("in_session"); 
        echo $this->load->view('escenarios/list_resumen' , $data );              
    }    
    /**/    
    function artista_GET(){
        /**/
        $this->validate_user_sesssion();             
        $id_artista = $this->get("artista");
        $db_response =  $this->escenarioartistamodel->get_artista($id_artista);
        $this->response($db_response );
    }
    /**/
    function descripcion_template_PUT(){
        /**/
        $this->validate_user_sesssion();                
        $data  =  $this->put();  
        $id_escenario= $this->get("idescenario");
        $id_artista =  $this->get("idartista");
        $id_usuario =  $this->sessionclass->getidusuario();
        $id_empresa =  $this->sessionclass->getidempresa();    
        $param =  $this->get();                                                   
        $db_response = $this->escenariomodel->update_descripcion_escenario_template($data , $id_escenario ,  $id_artista , $id_usuario , $id_empresa ,$param );
        $this->response($db_response);
    }
    function escenario_artista_id_GET(){


        $this->validate_user_sesssion();        
        $id_escenario= $this->get("idescenario");
        $id_artista =  $this->get("idartista");
        $db_response= $this->escenarioartistamodel->get_escenario_artista($id_artista , $id_escenario);
        $this->response($db_response);

    }
    /**/
    function resumen_artistas_get(){

        $this->validate_user_sesssion();
        $id_escenario = $this->get("escenario");
        $data_escenario = $this->escenariomodel->get_escenariobyId($id_escenario);                 
        $nombre_evento =  $this->get("nombre_evento");
        $resumen_artistas = resumen_artistas_table($this->escenarioartistamodel->get_artistas_resumen($id_escenario, $data_escenario[0], $nombre_evento ));         
        $this->response($resumen_artistas); 

    }
    function artista_nombre_PUT(){

        $this->validate_user_sesssion();
        $param =  $this->put(); 
        $param["id_usuario"] =  $this->sessionclass->getidusuario();
        $responsedb   = $this->escenarioartistamodel->update_nombre_artista($param);
        $this->response($responsedb);
    
    }
    function escenario_artista_status_PUT(){
    
        $this->validate_user_sesssion();
        $param= $this->put();
        $param["id_usuario"]=  $this->sessionclass->getidusuario();        
        $db_response   = $this->escenarioartistamodel->update_status($param);
        $this->response($db_response);
    }
    function artista_escenario_GET(){

        $this->validate_user_sesssion();
        $responsedb   = $this->escenariomodel->get_artista_in_escenario($this->get() );        
        $this->response($responsedb);
    }
    /*retorna el valor de un  campo del escenario*/
    function evento_escenario_campo_get(){
        $campo = $this->get("campo");
        $id_escenario = $this->get("escenario");
        $db_response = $this->escenariomodel->get_campo_escenario($campo , $id_escenario);
        $this->response($db_response[0][$campo]);
    }
    /**/
    function escenario_evento_POST(){

        $this->validate_user_sesssion();
        $id_evento =  $this->post("evento_escenario");
        $nombre= $this->post("nuevoescenario");    
    
        $id_empresa =  $this->sessionclass->getidempresa();
        $id_usuario =  $this->sessionclass->getidusuario();
        $nombre_usuario   = $this->sessionclass->getnombre();  
        $param =  $this->post();
        $db_response =  $this->escenariomodel->nuevo(validate_text($nombre), $id_evento , $id_empresa , $id_usuario , $nombre_usuario  , $param );
        
        $this->response($db_response);
    }
    /**/
    function load_GET(){
            
        $id_evento =  $this->get("evento_escenario");        
        $data["param"] =  $this->get();
        $response_db = $this->escenariomodel->load_by_event( $id_evento );                
        $data["escenarios"]  =  $response_db;   
        $data["evento"] = $id_evento;

        $this->load->view("escenarios/registro" , $data );
    }
    /**/
    function updatedescripcionescenario_post(){
        
        $this->validate_user_sesssion();
        $nueva_descripcion =$this->post("nuevadescripcion");
        $evento =  $this->post("evento_escenario");
        $id_escenario =  $this->post("idescenario");
        $id_empresa =  $this->sessionclass->getidempresa();                    
        $this->response($this->escenariomodel->updatedescripcion( validate_text($nueva_descripcion ),
                 $evento , $id_escenario,  $id_empresa ) );
                
    }
    /*Termina la función*/
    function updatedescripcionescenariobyid_post(){
        
        $this->validate_user_sesssion();                        
        $nueva_descripcion =$this->post("nuevadescripcion");                
        $id_escenario =  $this->post("idescenario");
        $id_empresa =  $this->sessionclass->getidempresa();              
        $this->response($this->escenariomodel->updatedescripcionbyid(  validate_text($nueva_descripcion) , 
                    $id_escenario,  $id_empresa ) );
                
    }
    /***/
    function escenarion_evento_DELETE(){        
        
        $this->validate_user_sesssion();
        $id_escenario =  $this->delete("escenario");
        $id_empresa =  $this->sessionclass->getidempresa();            
        $this->response($this->escenariomodel->deleteescenariobyid( $id_escenario,  $id_empresa ) );
        
    }
    /**/
    function loadescenariobyid_get(){
        
        $id_escenario =  $this->get("idescenario");
        $id_empresa =  $this->sessionclass->getidempresa();                            
        $info =  $this->escenariomodel->load_escenario_byid( $id_escenario,  $id_empresa );
        $this->response( infoescenario($info)  ); 
            
    }
    function escenario_artista_nota_PUT(){
        $this->validate_user_sesssion();                                                    
        $db_response = $this->escenariomodel->update_nota_escenario_artista($this->put());     
        $this->response($db_response);
    
    }
    
    /**/
    function escenario_artista_post(){

        $this->validate_user_sesssion();
        $id_evento =  $this->post("evento");
        $id_escenario =  $this->post("idescenario");
        $nuevoartista =  $this->post("nuevoartista");
        $id_empresa =  $this->sessionclass->getidempresa();                                        
        $id_usuario = $this->sessionclass->getidusuario(); 
        $param =  $this->post();
        $responsedb = $this->escenarioartistamodel->registra_artista_escenario($id_escenario ,  $nuevoartista  , $id_empresa , $id_evento , $id_usuario , $param );
        $this->response($responsedb);                     
    }
    /**/
    function escenario_artista_get(){
        
        $id_escenario= $this->get("escenario");            
        $data["id_escenario"]=  $id_escenario; 
        $data["artistas"] =  $this->escenarioartistamodel->get_artistas_inevent($id_escenario);    
        
        
        $data["public"] =  $this->get("public");
        $data["in_session"] =  $this->get("in_session");
        echo  $this->load->view("artistas/list_artistas",  $data);      
        


        
    }
    /**/
    function escenario_artista_cliente_get(){
        
        $id_escenario= $this->get("escenario");    
        $data["id_escenario"]=  $id_escenario; 
        $data["artistas"] =  $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        echo  $this->load->view("escenarios/list_artistas_cliente",  $data);
    
    }
    

     /*****************************************************************************************/
    function escenario_artista_delete(){    

        $this->validate_user_sesssion();
        $id_evento =  $this->delete("evento");
        $id_escenario =  $this->delete("idescenario");
        $id_artista =  $this->delete("idartista");
        $id_empresa =  $this->sessionclass->getidempresa();                                        
        $id_usuario = $this->sessionclass->getidusuario(); 
        $param =  $this->delete();
        $responsedb = $this->escenarioartistamodel->delete_escenario_artista($id_escenario , $id_artista , $id_empresa , $id_evento , $id_usuario , $param );
        $this->response($responsedb);         
    }/*Termina la función*/

    /*actualiza el nombre del escenario */    
    function escenario_campo_put(){
        $this->validate_user_sesssion();
        $campo = $this->put("campo");
        $id_escenario =  $this->put("escenario");
        $nuevonombre =  $this->put("nuevonombre");        
        $id_empresa =  $this->sessionclass->getidempresa();                                
        $id_usuario = $this->sessionclass->getidusuario(); 
        $id_evento =  $this->put("evento");
        $param = $this->put();
        $responsedb = $this->escenariomodel->update_campo($id_escenario , $nuevonombre , $campo ,  $id_empresa , $id_usuario  , $id_evento , $param);
        $this->response($responsedb);                 
    }
    /***********************inicio y termino fecha para el escenario*************************************************************/
    function inicio_termino_put(){
        
        $this->validate_user_sesssion();    
        $id_escenario =  $this->put("escenario");
        $nuevo_inicio =  $this->put("nuevoinicio");
        $nuevo_termino = $this->put("nuevotermino");                                    
        $id_usuario = $this->sessionclass->getidusuario();          
        $param =  $this->put();                       
        $responsedb = $this->escenariomodel->update_fecha($id_escenario , $nuevo_inicio , $nuevo_termino, $id_usuario , $param );
        $this->response($responsedb);         
    }
    /**************************Actualiza el tipo de escenario *******************************/
    function escenario_tipo_put(){
        
        $this->validate_user_sesssion();
        $id_escenario =  $this->put("idescenario");
        $tipoescenario =  $this->put("tipoescenario");
        $id_empresa =  $this->sessionclass->getidempresa();                                                    
        $id_usuario = $this->sessionclass->getidusuario();
        $id_evento =  $this->put("evento");  
        $id_evento =  $this->put("evento");                                                                
        $param =  $this->put();
        $responsedb = $this->escenariomodel->update_tipo($id_escenario , $tipoescenario , $id_empresa ,  $id_usuario ,  $id_evento ,  $param );
        $this->response($responsedb);                     
    }
    /**************************************************************************/
    function inicioterminoartista_put(){

        $this->validate_user_sesssion();
        $id_artista = $this->put("artista");
        $id_escenario =  $this->put("escenario");
        $hiartista = $this->put("hiartista");
        $htartista = $this->put("htartista");
        $id_empresa =  $this->sessionclass->getidempresa();                                            
        $id_usuario = $this->sessionclass->getidusuario();
        $id_evento =  $this->put("evento");                                                                
        $param =  $this->put();
        $responsedb = $this->escenarioartistamodel->update_fecha_presentacion($id_artista , $id_escenario  , $hiartista  , $htartista , $id_empresa ,  $id_usuario , $id_evento ,  $param );
        $this->response($responsedb);                 
    }/*Termina*/
    /**/
    function escenario_evento_get(){

        $this->validate_user_sesssion();
        $id_evento = $this->get("evento");        
        $data["escenarios_evento"] = $this->escenariomodel->get_escenarios_evento($id_evento);    
        $data["id_evento"] =  $id_evento;
        echo $this->load->view("escenarios/filtro" ,  $data );
        
    }
    /**/
    function escenarios_evento_jfunnel_GET(){
        $this->validate_user_sesssion();
        $id_evento = $this->get("evento");
        $db_response = $this->escenariomodel->get_escenarios_evento($id_evento);
        /*construimos el  formato resumen*/
        $this->response(load_complete_escenario($db_response));   
    }
    /**/
    function escenario_evento_artista_GET(){        


        $id_evento =  $this->get("evento");            
        $data["artistas"]=  $this->escenarioartistamodel->get_list_artistas_evento($id_evento);        
        $data["id_evento"] =  $id_evento;
        $data["in_session"] =0;
        echo $this->load->view("escenarios/filtro_artistas" ,  $data );
        
    }
    /**/    
    function artistas_evento_GET(){            
        $param =  $this->get();        
        $data["artistas"] =  $this->escenarioartistamodel->get_evento_artista($param);        
        $data["public"] =3;
         $data["in_session"] =0;
        echo  $this->load->view("escenarios/list_artistas", $data);    
        
        
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {}else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
    /**/

    function artista_tipo_POST(){

        $this->validate_user_sesssion();             
        $param =  $this->post();
        $param["id_usuario"] = $this->sessionclass->getidusuario();                                                      
        $db_response =  $this->escenarioartistamodel->update_tipo_artista($param);
        $this->response($db_response);
    }
    /**/
    function escenario_artista_social_put(){
      
        $this->validate_user_sesssion();     
        $id_escenario =  $this->put("escenario");
        $id_artista =  $this->put("dinamic_artista_sound");
        $url = $this->put("url");
        $social = $this->put("social");        
        $id_empresa =  $this->sessionclass->getidempresa();                                
        $id_usuario = $this->sessionclass->getidusuario();                                                      
        $id_evento = $this->put("evento");
        $param =  $this->put();
        $db_response = $this->escenarioartistamodel->record_url_artista($id_escenario , $id_artista , $url , $social , $id_usuario , $id_empresa , $id_evento , $param );
        $this->response($db_response);        
    }    
    function otros_escenarios_GET(){
        
        $id_evento =  $this->get("evento");
        $id_escenario =  $this->get("escenario");
        
        $data["escenarios"] =  $this->escenariomodel->get_escenarios_evento($id_evento);
        $data["id_escenario"] =  $id_escenario; 
        $data["id_evento"]  = $id_evento; 
        echo  $this->load->view("escenarios/list_otros" ,  $data );    
    }
    /**/
    function disponibles_GET(){
        $param =  $this->get();
        $data["escenarios"] =  $this->escenariomodel->get_escenarios_evento($param["id_evento"]);
        echo $this->load->view("escenarios/resumen_disponibles" , $data  );
    }
}
?>