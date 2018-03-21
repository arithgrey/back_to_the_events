<?php defined('BASEPATH') OR exit('No direct script access allowed');
class permisomodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    /*Asigna el perfil del usuario */
    function updatepermiso($id_perfil , $id_permiso){

        $queryexist ="SELECT * FROM perfil_permiso WHERE idperfil = $id_perfil AND idpermiso = $id_permiso";
        $result_select  = $this->db->query($queryexist);       
        $exist = $result_select->num_rows();
        $dinamic_query ="";
            if ($exist >0 ) {            
                /*Elimina el permiso */        
                $dinamic_query ="DELETE FROM perfil_permiso WHERE idperfil = $id_perfil AND idpermiso = $id_permiso";

            }else{
                /*Agrega permiso */
                $dinamic_query = "INSERT INTO perfil_permiso (idperfil , idpermiso) 
                VALUES ($id_perfil , $id_permiso)"; 
            }

        $resultdinamico  = $this->db->query($dinamic_query);       
        return $resultdinamico;
    }
/*Termina modelo */
}