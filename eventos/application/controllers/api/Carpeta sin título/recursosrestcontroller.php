<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Recursosrestcontroller extends REST_Controller{
    function __construct(){    
        parent::__construct();

        $this->load->heler("empresa"); 
        $this->load->model("recursosmodel");                     
        $this->load->library('sessionclass');        
    } 
    /**/
    function listrecursos_get(){
        $this->validate_user_sesssion();
        $nombrerecurso = $this->get("recurso");            
        $data = $this->getrecursos();
        $this->response($data);
     
    }
    /*Listar recursos */
    function getrecursos(){
        return  $this->recursosmodel->listarrecursos();
    }
    /****************************************UPDATE***************************************************/
    function updateinforecurso_POST(){
        
        $this->validate_user_sesssion();
        $id_recurso =  $this->post("idrecurso");
        $descripcion =  $this->post("descripcionrecurso");                                    
        $this->response( $this->updaterecurso($id_recurso , $descripcion) );
                    
    }
    /**/
    function updaterecurso($id_recurso , $descripcion){

        return  $this->recursosmodel->updaterecurso(trim($id_recurso) , trim($descripcion) );       
    }
    /***********************************************Registros***************************************************/
    function insertinforesource_POST(){
        
        $this->validate_user_sesssion();
        $nombre =  $this->post("recursonombre");
        $descripcionrecurso =  $this->post("descripcionrecursotext");                    
        $this->response( $this->insertresource($nombre , $descripcionrecurso ) );
     
    }
    /* Inserta en la base de datos */
    function insertresource($nombre , $descripcionrecurso ){
        return  $this->recursosmodel->insertrecurso(trim($nombre) , trim($descripcionrecurso) );
    } 
    /**********************************Eliminar recurso ***************************************/
    function deleterecurso_POST(){

        $this->validate_user_sesssion();        
        $id_recurso =  $this->post("idrecurso");
        $this->response( $this->deleterecursoinfo($id_recurso) );
    }
    /*Elimina el recurso en la base de datos*/
    function deleterecursoinfo($id_recurso){
        return  $this->recursosmodel->removerecursobyid($id_recurso);
    }
    /********************************************PERFILES RECURSOS *************************/
    function listrecursosperfilesconfig_get(){

        $this->validate_user_sesssion();    
        $nombrerecurso = $this->get("recurso");
        /*Despliega tabla recursos */
        $data = $this->getrecursosperfilesconfig();
        $this->response($data);
    }
    /**/

    function recursosperfilesgeneral_get(){

        $this->validate_user_sesssion();            
        /*Despliega tabla recursos */
        $data = $this->recursosmodel->get_recursos_perfiles_config_general();
        $this->response($data);
    }

    /*Listar recursos */
    function getrecursosperfilesconfig(){
        return  $this->recursosmodel->listarrecursosperfilesconfig();
    }
    /**************************************Recurso por id **********************************/
    function  getrecursobyid_get(){

        $recursoid =  $this->get("recursoid");
        $this->response($this->listinforecursobyid($recursoid));
        
    }/*Termina la función*/ 
    function listinforecursobyid($id_recurso){
        return  $this->recursosmodel->getrecursobyid($id_recurso);
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
            /*Terminamos la session*/
                $this->sessionclass->logout();
            }   
    }/*termina validar session */
	/*Termina rest*/
}