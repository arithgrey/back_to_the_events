<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Cuentageneralrest extends REST_Controller{      
    function __construct(){
        parent::__construct();        
        $this->load->helper("recursos");
        $this->load->model('cuentageneralmodel');         
        $this->load->library('sessionclass');            
    }         
    /**/
    function integranteescuentaresumen_GET(){

        $this->validate_user_sesssion();
        $id_empresa = $this->sessionclass->getidempresa();           
        $data_resumen_usuarios = $this->cuentageneralmodel->get_resumen_usuarios_cuenta($id_empresa);
        $this->response(resumen_usuarios_cuenta($data_resumen_usuarios));

    }
    /******************************Actualiza el perfil del usuario*******************************************/
    function integrantescuentaperfil_PUT(){


        $this->validate_user_sesssion();       
        $id_usuario = $this->put("usuario");
        $id_perfil = $this->put("perfil");
        $db_response =  $this->cuentageneralmodel->update_perfil_user($id_usuario , $id_perfil );
        $this->response($db_response);
    }

    /*******************************Regresa el número de integrantes de la
     cuenta ***********************/
    function getnumintegrantescuenta_GET(){
        
        $this->validate_user_sesssion();   
        $usuarios =  $this->getnumerointegrantesbyidusuario(); 
        $this->response($usuarios);            
    }
    /*Consultamos el número de integrantes en la cuenta por id del usuario */
    function getnumerointegrantesbyidusuario(){

       $this->validate_user_sesssion();
       $id_user  = $this->sessionclass->getidusuario();
       $numerointegrantes  = $this->cuentageneralmodel->getintegrantesbyidusuario($id_user);
       return $numerointegrantes;       
    }    
    /*************************************************************************************************************/    
    function integrantescuenta_GET(){    

        $this->validate_user_sesssion();                
        $id_empresa =  $this->sessionclass->getidempresa(); 
        $param =  $this->get();                                                
        $integrantes_data  =        
        $data["integrantes"] =  $this->cuentageneralmodel->getintegrantesinforme($id_empresa ,  $param );
        echo $this->load->view("usuarioscuenta/list" , $data );
        
    }
    /**/    
    function getlistperfilesfisponiblesbycuenta_get(){

        $this->validate_user_sesssion();
        $id_empresa = $this->sessionclass->getidempresa();    
        $this->response( $this->getplanesbyempresa($id_empresa)  );                               
    }
    /**/
    function getplanesbyempresa($id_empresa){
        //select idplan from empresa where id_empresa
        $this->validate_user_sesssion();
        $perfiles  = $this->cuentageneralmodel->getperfilesdelacuenta($id_empresa);
        return $perfiles;      
    }
    /**/   
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {}else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */

}/*Termina rest*/
?>