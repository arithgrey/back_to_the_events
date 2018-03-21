<?php defined('BASEPATH') OR exit('No direct script access allowed');
class empresamodel extends CI_Model{
  function __construct(){
      parent::__construct();        
      $this->load->database();
  } 
  /**/
  function get_empresa_by_id($id_empresa){
              $query_get ="select  e.* , c.*  from empresa e 
              inner join  countries c  
              on e.idCountry  =  c.idCountry               
              where e.idempresa  =  '". $id_empresa."'  ";

    $result=  $this->db->query($query_get);
    return $result->result_array(); 
  }


}