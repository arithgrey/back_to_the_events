<?php defined('BASEPATH') OR exit('No direct script access allowed');
class organizacionmodel extends CI_Model {
    function __construct(){
            parent::__construct();        
            $this->load->database();
    }
/**/
function update_empresa_q($id_empresa , $prm ){

    $query_update = "UPDATE empresa set ".$prm["q"] ."  = '". $prm["text"] ."'  where idempresa = '".$id_empresa ."' limit 1"; 
    $result =  $this->db->query($query_update);    
    return $result;
}    
/**/
function empresa_q($id_empresa , $param){


    $query_get ="SELECT ". $param["q"]. "  valor FROM  empresa  WHERE idempresa='".$id_empresa."' limit 1";  
    $result =  $this->db->query($query_get);
    return $result->result_array();
}
/**/
function update_q($id_empresa, $param){
    
    $query_update ="update empresa set ". $param["q"] ." = '".$param["value"]."' WHERE idempresa='".$id_empresa."' limit 1";
    return $this->db->query($query_update);
}
/**/
function mostrarCiudades($idEmpresa)
{
    $query_get = " SELECT * FROM countries ";
    $result = $this->db->query( $query_get );
    $uno= $result->result_array();

    $query_get_empresa_countries = "SELECT countries.idCountry from empresa, countries where empresa.idempresa = '".$idEmpresa."' and empresa.idCountry = countries.idCountry";
    $db_reponse = $this->db->query( $query_get_empresa_countries );     
    $dos = $db_reponse->result_array();

    $consultas = array('listar_todos' => $uno, 'listar_uno' => $dos);

    return $consultas;
}

function actualizarCiudades($idEmpresa,$nuevoIdCiudad)
{
    $query_get = "UPDATE empresa SET idCountry = '".$nuevoIdCiudad."' WHERE idempresa = '".$idEmpresa."'  limit 1"; 
    $db_reponse = $this->db->query( $query_get );     
    return $db_reponse;
}
/**/
function get_posibles_artitas($param){
    $query_get = "SELECT * FROM artista WHERE  nombre_artista like '%". $param["artista"] . "%' limit 5";
    $result = $this->db->query($query_get);
    return $result->result_array();
}
/**/
function get_top_artistas_cliente($id_empresa){

    /**/
    $_num = $this->construye_top_artistas_cliente(0  ,  0  , $id_empresa);
    $query_get =  "select 
    s.id_artista, 
    solicitudes , 
    a.nombre_artista 
    from tmp_solicitudes_artistas_$_num s 
    inner join  artista a  on  s.id_artista = a.idartista
    order by solicitudes desc limit 10";     
    $result  =  $this->db->query($query_get);
    $data_complete =  $result->result_array();
    $_num = $this->construye_top_artistas_cliente($_num  , 1 , $id_empresa);
    return $data_complete;
    

}
/**/
function construye_top_artistas_cliente($_num = 0  , $flag  , $id_empresa){

    if($_num == 0 ) {
       $_num = mt_rand();       
    }                                                   
    
    
    $query_procedure ="CALL top_artistas_emp($_num , $flag  , $id_empresa);"; 

    $this->db->query($query_procedure);   
    return $_num;
}
}/*Termina la función */