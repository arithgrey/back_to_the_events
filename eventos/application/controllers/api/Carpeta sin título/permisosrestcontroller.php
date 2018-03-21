<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Permisosrestcontroller extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("permisomodel");
        $this->load->library('sessionclass');
            
    }         
    /*******************************Update permisos*************************************************/
    function updatepermiso_POST(){
           
        $this->validate_user_sesssion();
        $id_perfil =  $this->post("idperfil");
        $id_permiso  =  $this->post("idpermiso");                                
        $this->response($this->updatepermiso($id_perfil , $id_permiso));                

    }/*Termina función */
    /**update permiso in database  */
    function updatepermiso($id_perfil , $id_permiso){
        return  $this->permisomodel->updatepermiso($id_perfil , $id_permiso);           
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