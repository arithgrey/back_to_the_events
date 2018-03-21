<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Enid extends REST_Controller{      
    function __construct(){
        parent::__construct();                  
        $this->load->helper("enid");
        $this->load->library('sessionclass');                    

    }
    /**/
    function reporte_mail_marketing_GET(){

        $param =  $this->get();
        $data["reporte_mail_marketing"] = $this->enidmodel->get_reporte_general_mail_marketing($param);
        $this->load->view( "enid/mail_marketing/reporte_general", $data);
    }

    /**/
    function bugs_GET(){

        $param =  $this->get();
        $data["resumen_bugs"]=  $this->enidmodel->get_bugs($param);
        $this->load->view("enid/bugs_enid", $data);        
    }
    /**/
    function bug_PUT(){
        $param =  $this->put();
        $db_response =  $this->enidmodel->update_inicidencia($param);
        $this->response($db_response);
        
    }    
    /**/
    function nuevos_miembros_GET(){

        $data["resumen_miembros"]=  $this->enidmodel->get_nuevos_miembros();
        $this->load->view("enid/resumen_miembros", $data);

    }
    /**/
    function dispositivos_dia_GET(){
        
        $data["dispositivos"] =   $this->enidmodel->get_dispositivos_dia();
        $this->load->view("enid/market/dispositivos_visitados" ,  $data);
    }

    /**/
    function sitios_dia_GET(){
        
        $data["sitios_visitados"] =   $this->enidmodel->get_sitios_dia();
        $this->load->view("enid/market/sitios_visitados" ,  $data);
    }
    /**/
    function usabilidad_landing_pages_GET(){
        
        $data["info_sistema"] =  $this->enidmodel->get_comparativa_landing_page();
        echo $this->load->view("enid/market/uso_sistema" , $data );
        
    }
    /**/
    function organizaciones_publicidad_GET(){

        $param =  $this->get();

        switch ($param["tipo"]) {
            case 1:                
                $db_response =  $this->enidmodel->get_organizaciones_sin_eventos_prospecto($param);
                $this->response(get_msj_no_eventos($db_response[0]["organizaciones"]));
                break;            
            case 2:
            
                $db_response =  $this->enidmodel->get_organizaciones_con_eventos_prospecto($param);
                $this->response(get_msj_no_eventos($db_response[0]["organizaciones"]));

                break;

            case 3:
                /*Todos los usuarios Enid*/
                $db_response =  $this->enidmodel->get_numusuarios_enid($param);    
                $this->response(get_msj_no_eventos($db_response[0]["organizaciones"]));
                break;    
            default:
                
                break;
        }
        
    }
    /**/
    function reporte_sistema_POST(){

        $param = $this->post();
        $db_response =  $this->enidmodel->reporta_error($param);
        $this->response($db_response);
    }
    /**/
    function resumen_global_admin_p_GET(){

        $param = $this->get();        
        $data["info_prospectos"] =   $this->enidmodel->get_info_prospectos($param);
        $this->load->view("empresa/enid/resumen_p" ,  $data);
        
    }
    /**/
    function resumen_global_admin_e_GET(){
        $param = $this->get();        
        $data["info_prospectos"] =   $this->enidmodel->get_info_prospectos_e($param);
        $this->load->view("empresa/enid/resumen_e" ,  $data);

    }
    /**/
    function prospectos_GET(){
        /**/
        $param = $this->get();    
        $data["prospectos"] =   $this->enidmodel->repo_prospectos($param);
        echo $this->load->view("empresa/enid/repo_prospectos" , $data);

    }
    /**/
    function prospectos_comparativa_d_GET(){

        $param =  $this->get();
        $data["datos_prospectos"] =   $this->enidmodel->repo_prospectos_comparativa($param);
        echo $this->load->view("empresa/enid/repo_prospectos_comparativa" , $data);
        
    }
    /**/
    function miembros_cuenta_GET(){

        $param =  $this->get();
        $db_response["miembros"] =  $this->enidmodel->miemtros_cuenta($param);    
        echo  $this->load->view("empresa/enid/repo_miembros_empresa" ,  $db_response);

    }
    /**/
    function evento_reservacion_POST(){

        $param = $this->post();        
        $param["ip"] =  $this->input->ip_address();       
        $db_response =  $this->enidmodel->reservacion_evento($param);        
        $this->response($db_response);
    }
}?>