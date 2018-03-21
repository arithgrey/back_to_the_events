<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Perfilrecursorestcontroller extends REST_Controller{
    function __construct(){
    	parent::__construct();
        $this->load->model("perfilmodel");            
        $this->load->library('sessionclass');        
    }         
    /**/
    function trydeleteperfilrecurso_POST(){

        $this->validate_user_sesssion();
        $id_recurso = $this->post("idrecurso");
        $id_perfil = $this->post("idperfil");                                               
        $this->response( $this->deleteperfilrecurso($id_perfil , $id_recurso) );

    }
    /**/
    function deleteperfilrecurso($id_perfil , $id_recurso){

    	return $this->perfilmodel->deleteperfilrecurso($id_perfil , $id_recurso );
    }
    /*******************************************Actualiza los perisos ************************************/
    function tryupdateperfilrecurso_POST(){

        $this->validate_user_sesssion();            
        $id_recurso = $this->post("idrecurso");
        $id_perfil = $this->post("idperfil");                    
        $this->response( $this->updateperfilpermisopermiso( $id_perfil , $id_recurso  ) );                                                            
    }
    /**/
    function updateperfilpermisopermiso( $id_perfil , $id_recurso ){

       return $this->perfilmodel->updateperfilpermisopermisodb($id_perfil , $id_recurso );                                  
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