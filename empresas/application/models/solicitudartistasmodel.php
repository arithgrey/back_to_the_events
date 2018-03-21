<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class solicitudartistasmodel extends CI_Model {
    function __construct(){      
        parent::__construct();        
        $this->load->database();
    }
    /**/
    function solicitud_artista($param){

          $query_get ="SELECT * FROM  artista WHERE nombre_artista  like  '%". $param["artista-solicitud"] ."%' ";                
          $result_artista  =  $this->db->query($query_get);
          $artista  =  $result_artista->result_array();
          $id_empresa =  $param["empresa"];       
          $id_ciudad  =  $param["ciudad"];
          $email  =  $param["email"];
          
          if (count($artista) > 0 ){
              $id_artista =  $artista[0]["idartista"];  
                  return $this->create_solicitud_artista($id_artista ,  $id_empresa,  $id_ciudad  , $email  );
                  
          }else{
          
              $query_insert ="INSERT INTO artista (nombre_artista) values ( '". $param["artista-solicitud"]   ."' )";
              $data[0] = $this->db->query($query_insert);
              $id_artista  = $this->db->insert_id();                     
            
                  return  $this->create_solicitud_artista($id_artista ,  $id_empresa ,  $id_ciudad  , $email );        
          }      
  }
  /**/
  function create_solicitud_artista($id_artista , $id_empresa , $id_ciudad ,  $email ){
      
      $query_insert =  "INSERT INTO solicitud_artista_org(id_artista , id_empresa , id_Country ,  email ) VALUES('". $id_artista  ."' ,  '". $id_empresa ."' , '". $id_ciudad  ."' , '".$email ."' )"; 
      return  $this->db->query($query_insert);
  }
  /**/

}
