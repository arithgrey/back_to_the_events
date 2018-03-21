<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class escenarios_artistas_model extends CI_Model {
    function __construct(){      
        parent::__construct();        
        $this->load->database();
    }
    /**/
    function get_escenarios_artistas_evento($param){
      $id_evento =  $param["id_evento"];      


      $query_get = "SELECT 
                     idescenario,                
                     nombre     ,                
                     descripcion ,                                                     
                     tipoescenario ,                                 
                     fecha_presentacion_inicio  ,
                     fecha_presentacion_termino 
                    FROM escenario 
                    WHERE idevento = $id_evento                      
                    ORDER by tipoescenario  ASC 
                    LIMIT 5";

      /**/                                  
        $result =  $this->db->query($query_get);      
        $info_escenarios =  $result->result_array();
        
         return $this->agrega_artistas_escenario($info_escenarios); 


      

    }
    /**/
    function agrega_artistas_escenario($escenarios){
        
        $b = 0;
        $escenarios_artistas = array();        
        foreach ($escenarios as $row){
            $escenarios_artistas[$b] =  $row;            
            $escenarios_artistas[$b]["artistas"] = $this->get_artistas_info_escenarios($row["idescenario"]);


            $b++;
        }  
        return $escenarios_artistas;      
    }
    /**/
    function get_artistas_info_escenarios($id_escenario){
        $query_get =  "SELECT 
                         ea.idartista         ,
                         ea.hora_inicio         ,
                         ea.hora_termino        ,
                         ea.url_social_youtube  ,
                         ea.url_sound_cloud     ,
                         ea.status_confirmacion ,
                         ea.nota                ,
                         ea.tipo_artista,
                        a.nombre_artista
                        FROM 
                        escenario_artista ea   
                        INNER JOIN artista a 
                        ON 
                        ea.idartista = a.idartista 
                        WHERE ea.idescenario = $id_escenario
                       LIMIT 20"; 
        $result =  $this->db->query($query_get);      
        $db_response =  $result->result_array();
        return  $db_response;
    }  




    /**/
    function get_resumen_escenario_artistas_evento($param){
      
      $id_evento =  $param["id_evento"];

      $query_get = "SELECT COUNT(0)num_escenarios ,  idescenario ,  tipoescenario 
                    FROM escenario 
                    WHERE idevento = $id_evento  
                    GROUP BY idescenario 
                    ORDER by tipoescenario ASC 
                    LIMIT 5";

      /**/                                  
        $result =  $this->db->query($query_get);      
        $info_escenarios =  $result->result_array();
        $data_complete["num_escenarios"] =  count($info_escenarios);
        
      /**/
        $num_artistas = 0;
        foreach($info_escenarios as $row){       
          $info_artistas  = $this->get_artistas_escenarios($row["idescenario"]);
          $num_artistas = $num_artistas + $info_artistas[0]["num_artistas"];
        }
        $data_complete["num_artistas"] =  $num_artistas;

      /**/
    

        $info_escenario = "Más detalles";
        $info_descripcion ="";
        $b = 0;
        foreach($info_escenarios as $row){       

          if ($b == 0 ){                
             $inf  = $this->get_descripcion_escenario($row["idescenario"]);
             if(strlen(trim($inf)) > 3 ){

                $info_descripcion = $inf;  
                $b ++;
             }
          }   

        }
        
        $data_complete["info_escenario"]=  $info_descripcion;




      return $data_complete;
    }
    /**/

    /**/
    function get_artistas_escenarios($id_escenario){
        $query_get =  "SELECT count(0)num_artistas FROM escenario_artista
                       WHERE idescenario = $id_escenario  
                       LIMIT 20"; 
        $result =  $this->db->query($query_get);      
        $num_artistas =  $result->result_array();
        return  $num_artistas;
    }  
    /**/
    function get_descripcion_escenario($id_escenario){

        $query_get =  "SELECT 
                      descripcion 
                      FROM escenario
                      WHERE idescenario = $id_escenario  
                      LIMIT 1"; 
        $result =  $this->db->query($query_get);      
        $data_complete =  $result->result_array();
        return  $data_complete[0]["descripcion"];     
    }

}