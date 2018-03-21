<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Perfilrestcontroller extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("perfilmodel");                      
        $this->load->model("usuariogeneralmodel");  
        $this->load->library('sessionclass');
            
    }
    /**/         	
    function estableceperfil_post(){
        $this->validate_user_sesssion();
        $id_usuario = $this->post("iduser");        
        $responseb =$this->perfilmodel->recordusuarioperfilstandar($id_usuario);
        $this->session->set_userdata('perfiles', $this->perfilmodel->getperfiluser($id_usuario));        
        $this->response($responseb);
    }
    /**/
    function listperfiles_get(){

        $this->validate_user_sesssion();                
        $nombrerecurso = $this->get("recurso");                
        $datos=$this->perfilmodel->listperfilesrecursospermisos();                              
        $this->response($datos);        
    }
    /*Desplegamos todos los perfiles disponibles */
    function listperfilesinsystem_get(){

        $this->validate_user_sesssion();
        $this->response($this->listperfiles());
    }
    /**/
    function listperfiles(){
        $data = $this->perfilmodel->listallperfiles();  
        return $data;
    }
    /************************************Perfiles permisos modulos ********************************/
    /*Desplegamos todos los perfiles disponibles */
    function listperfilespermisosinsystem_get(){

        $this->validate_user_sesssion();
        $id_recurso= $this->get("recursoid");
        $this->response($this->listperfilesmodulopermisos($id_recurso));        
    }   

    /**/
    function list_perfiles_permisos_in_systemgeneral_get(){

        $this->validate_user_sesssion();
        $id_recurso= $this->get("recursoid");
        $this->response($this->perfilmodel->list_perfiles_modulo_permisos_general($id_recurso)    );        
    }   
    /**/
    function listperfilesmodulopermisos($id_recurso){
        $data = $this->perfilmodel->listperfilesmodulopermisos($id_recurso);  
        return $data;    
    }
    /*******************************Update perfil *************************************************/
     function updateinfoperfil_POST(){
        
        $this->validate_user_sesssion();   
        $id_perfil =  $this->post("idperfil");
        $descripcion =  $this->post("descripcion");        
        $this->response( $this->updateperfil($id_perfil , $descripcion) );                   
    }
    /**update perfil in database  */
    function updateperfil($id_perfil , $descripcion){

        return  $this->perfilmodel->updateperfil($id_perfil , $descripcion);           
    }
    /****************************************Insertar *************************************************************/
    function insertinfoperfil_POST(){
        $this->validate_user_sesssion();
        $nombre =  $this->post("nuevoperfil");
        $descripcionperfil  =  $this->post("descripcion_perfil_nuevo");                     
        $this->response( $this->insertperfil($nombre , $descripcionperfil ) );                     
    }
    /* Inserta en la base de datos */
    function insertperfil($nombre , $descripcionperfil ){
        return  $this->perfilmodel->insertperfil( trim($nombre) , trim($descripcionperfil)  );                                    
    } 
    /*************************************Eliminar perfil **************************************************/
    function deleteperfil_POST(){

        $this->validate_user_sesssion();                
        $id_perfil =  $this->post("idperfil");        
        $this->response( $this->deleteperfilinfo($id_perfil) );                            
    }
    /**/
    function deleteperfilinfo($id_perfil){
         return  $this->perfilmodel->removeperfilbyid($id_perfil);
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

        }else{
                    /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
}