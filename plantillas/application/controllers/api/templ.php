<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Templ extends REST_Controller{
    function __construct(){
            parent::__construct();
            $this->load->helper("plantillas");            
            $this->load->model("templmodel");
            $this->load->library('sessionclass');        
    }  
    function incluye_objetos_evento_PUT(){

        
        $this->validate_user_sesssion();               
        $param= $this->put();
        $param["id_empresa"] =  $this->sessionclass->getidempresa();                         
        $db_response =  $this->templmodel->incluye_objetos_evento($param);
        $this->response($db_response);
        
    }
    /**/
    function incluye_reglamento_PUT(){

        $this->validate_user_sesssion();                       
        $param= $this->put();        
        $param["id_usuario"] = $this->sessionclass->getidusuario();
        $db_response =  $this->templmodel->incluye_reglamento($param);
        $this->response($db_response);
        
    }

    /**/
    function evalua_informacion_inicial_GET(){
        
        $this->validate_user_sesssion();               
        $param =  $this->get();      
        $param["id_empresa"] =  $this->sessionclass->getidempresa();                
        $db_response =  $this->templmodel->evalua_obj_permitidos($param);        
        $this->response($db_response);
    }
    /**/
    function articulo_DELETE(){ 
        $param=  $this->delete();
        $db_response =  $this->templmodel->delete_obj($param);
        $this->response($db_response);    
    }
    /**/
    function articulo_PUT(){

        $param=  $this->put();
        $db_response =  $this->templmodel->update_obj($param);
        $this->response($db_response);
    }
    /**/
    function articulo_GET(){

        $param =  $this->get();
        $db_response  =  $this->templmodel->get_obj($param);
        $this->response($db_response);
    } 
    /**/
    function tipo_cliente_GET(){
        $param=  $this->get();    
        $db_response =  $this->templmodel->list_contenido_tipo($param);
        $this->response(politicas_contenido($db_response));

    }
    /**/
    /*
    function programados_tipos_GET(){

        $param=  $this->get();    
        $db_response =  $this->templmodel->load_programados_tipo($param);
        $this->response($db_response);
    }
    
    
    function  plantillasresumen_get(){

        $id_usuario  = $this->sessionclass->getidusuario();            
        $data_response_db =  $this->templmodel->get_resumen_template($id_usuario);
        $this->response(resumen_templ_eventos($data_response_db));

    }
    */
    /**/
    function templates_contenido_post(){
        $this->validate_user_sesssion();
        /*De la plantilla */                
        $id_user  = $this->sessionclass->getidusuario();            
        $tipo_templ = $this->post("tipo_templ");                
        $titulo_contenido_tmpl = $this->post("titulo_contenido_tmpl");
        $contenido_descripcion = $this->post("contenido_descripcion");
        $db_response = $this->templmodel->record_template_contenido($id_user , $tipo_templ, $titulo_contenido_tmpl , $contenido_descripcion );
        $this->response($db_response);
    }
    /**/
    function templates_descripcion_evento_post(){
        $this->validate_user_sesssion();
        /*De la plantilla */        
        $id_user  = $this->sessionclass->getidusuario();            
        $tipo_templ = $this->post("tipo_templ");        
        $titulo_contenido_tmpl = $this->post("titulo_contenido_tmpl");
        $descripcion_templ = $this->post("descripcion_contenid_templ");
        $db_response = $this->templmodel->record_template_contenido($id_user , $tipo_templ, $titulo_contenido_tmpl , $descripcion_templ );
        $this->response($db_response);
    }


    /*eliminamos el template de contenido */
    function templates_contenido_delete(){

        $this->validate_user_sesssion();
        $id_contenido= $id_contenido = $this->delete("contenido");
        $db_response= $this->templmodel->delete_contenido($id_contenido);
        $this->response($db_response);
    }
    /**/
    function templates_contenidos_get(){
        $this->validate_user_sesssion();       
        
        $tipo_templ = $this->get("tipo");
        $id_user  = $this->sessionclass->getidusuario();        
        $plantillas_descripcion = $this->templmodel->get_templates_contenido_user_type($id_user, $tipo_templ );
        $this->response(display_contenido_templ($plantillas_descripcion, 1 ));
    }




    /***************************CONTENIDOS *******************************************/
    /*get contenidos por plantilla*/
    
    /**/
    function templates_content_escenario_get(){

        $this->validate_user_sesssion();       
        $id_user = $this->sessionclass->getidusuario();
        $type = $this->get("type");
        $plantillas_contenido = $this->templmodel->get_templ_contenido($id_user, $type );                
        $this->response(display_contenido_templ($plantillas_contenido , 1 , 1 ));
    }
    /**/

    /*registra contenidos*/    
    function templates_content_post(){
        $this->validate_user_sesssion();
        /*De la plantilla */
        $id_user  = $this->sessionclass->getidusuario();  
        $nuevo_nombre= $this->post("nuevo_contenido_name");
        $contenido_text = $this->post("contenido_text");    
        $type = $this->post("type"); 
        
        $db_response = $this->templmodel->record_content($id_user , $nuevo_nombre , $contenido_text , $type);
        $this->response($db_response);
    }
    /*Elimina contenidos por su id y el usuario*/
    function templates_content_delete(){

        $this->validate_user_sesssion();       
        $id_user= $this->sessionclass->getidusuario();
        $id_contenido = $this->delete("contenido");
        $status_delete = $this->templmodel->delete_plantilla_contenido($id_contenido);        
        $this->response($status_delete);
        
    }
    /**/





    function retriccion_evento_post(){
         
        $this->validate_user_sesssion();       
        $id_evento = $this->post("evento");
        $id_restriccion = $this->post("restriccion");
        $response_db = $this->templmodel->record_restriccion_evento($id_evento , $id_restriccion);
        $this->response($response_db);
    }
    /*Cuando queremos borran*/
    function retriccion_evento_delete(){

        $this->validate_user_sesssion();       
        $id_evento = $this->delete("evento");
        $id_restriccion = $this->delete("restriccion");
        $response_db = $this->templmodel->delete_restriccion_evento($id_evento , $id_restriccion);
        $this->response($response_db);
    }       
     
    /*Registra nuevo articulo */
    function articulos_post(){
        $this->validate_user_sesssion();       
        $id_empresa =  $this->sessionclass->getidempresa();
        $nuevo_articulo= $this->post("nuevo_articulo");
        $nuevo_descripcion = $this->post("nueva_descripcion");
        $db_response = $this->templmodel->record_articulo_empresa($nuevo_articulo , $nuevo_descripcion , $id_empresa );
        $this->response($db_response);
    }
    /*get articulos */
    function articulos_get(){

        $this->validate_user_sesssion();       
        $id_empresa =  $this->sessionclass->getidempresa();
        $data["articulos"] = $this->templmodel->get_templ_obj_permitidos($id_empresa);        
        echo  $this->load->view("plantillas/list_articulos" , $data);
        

    }   
    /**/
    function plantillaarticulos_delete(){

        $this->validate_user_sesssion();       
        $id_empresa =  $this->sessionclass->getidempresa();
        $id_objeto = $this->delete("objeto_permitido");        
        $db_response= $this->templmodel->delete_obj_permitido_empresa($id_empresa , $id_objeto );
        $this->response($db_response);
    }
    /*registra de la plantilla un nuevo contenido de acuerdo al tipo de contenido*/
    function templates_contenido_evento_PUT(){
            
        $id_contenido = $this->put("contenido");
        $id_evento = $this->put("evento");        
        $response_db = $this->templmodel->record_contenido_evento($id_contenido , $id_evento );
        $this->response($response_db );        
    }
    /**/
    
    /*Elimina evento contenido*/
    function templates_contenido_evento_delete(){

        $id_contenido = $this->delete("contenido");
        $id_evento = $this->delete("evento");        
        $response_db = $this->templmodel->delete_contenido_evento($id_contenido , $id_evento );
        $this->response($response_db );        
    }


    /**/   
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        
                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */
    /*En modal info*/
    function tmp_contenido_GET(){

        $this->validate_user_sesssion();  
        $id_user  = $this->sessionclass->getidusuario();            
        $tipo =  $this->get("tipo");            
        
            $data["contenidos"] =  $this->templmodel->get_templ_contenido($id_user, $tipo );    
            $data["param"] =  $this->get();
            $data["btn_redirect"] =  1; 
            $data["delete_template"] = 1;
            $data["agregar_plantilla"] = 1;
            $data["delete_extra_pos"] = 0;
            $data["incluir_todo"] = 1; 
            echo $this->load->view("plantillas/contenidos", $data );        
    }   
    /*En administrador evento*/
    function templates_contenido_evento_get(){

        $type = $this->get("type");
        $id_evento = $this->get("evento");        
        
            $data["contenidos"] =  $this->templmodel->get_contenido_evento($id_evento , $type );    
            $data["param"] =  $this->get();
            $data["btn_redirect"] =  0; 
            $param["identificador"] ="";
            $param["public"] = 0;
            $data["param"] =  $param;
            $data["delete_template"] = 1;
            $data["agregar_plantilla"] = 0;
            $data["delete_extra_pos"] = 0;
            $data["incluir_todo"] = 0; 
            echo $this->load->view("plantillas/contenidos", $data );        

    }
    /*En administrador general templates */
    function templates_content_get(){
        $this->validate_user_sesssion();       
            $id_user = $this->sessionclass->getidusuario();
            $type = $this->get("type");
            $data["contenidos"] = $this->templmodel->get_templ_contenido($id_user, $type );                
            
            $param =  $this->get();
            $param["identificador"] =  ""; 
            $param["public"] =  1; 
            $data["btn_redirect"]= 0;
            $data["delete_template"] = 1;
            $data["param"] =  $param;
            $data["agregar_plantilla"] = 0;
            $data["delete_extra_pos"] = 0;
            $data["incluir_todo"] = 0; 
            $this->load->view("plantillas/contenidos", $data );         
    }
    /**/
    function templates_contenido_evento_publico_get(){

        $type = $this->get("type");
        $id_evento = $this->get("evento");        
        
            $data["contenidos"] =  $this->templmodel->get_contenido_evento($id_evento , $type );    
            $data["param"] =  $this->get();
            $data["btn_redirect"] =  0; 
            $param["identificador"] ="";
            $param["public"] = 1;
            $data["param"] =  $param;
            $data["delete_template"] = 0;
            $data["agregar_plantilla"] = 0;
            $data["delete_extra_pos"] = 0;
            $data["incluir_todo"] = 0; 
            echo $this->load->view("plantillas/contenidos", $data );        

    }
    

}
?>