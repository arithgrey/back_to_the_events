<?php defined('BASEPATH') OR exit('No direct script access allowed');
class templmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    /*
    function valida_input($param, $dia ){
      $f =  0; 
      if (isset($param[$dia])) {
        $f=1;
      }
      return $f;    
    }
    */
    /**/
    function get_num_restricciones_en_evento($param){
      
      $id_usuario =  $param["id_usuario"];
      $query_get =  "SELECT  idplantilla FROM  plantilla WHERE idusuario = '".$id_usuario."'  AND 
      idtipo_plantilla = 3 LIMIT 1";

      $result =  $this->db->query($query_get);
      $id_plantilla =  $result->result_array()[0]["idplantilla"];



      
      $query_get =  "SELECT 
                      p.idcontenido   
                      FROM plantilla_contenido p
                      INNER JOIN evento_contenido ec 
                      ON p.idcontenido = ec.idcontenido
                      WHERE 
                      p.idplantilla = '".$id_plantilla."'
                      LIMIT 50"; 
      
        $result =  $this->db->query($query_get);
        return $result->result_array();
      
    }

    /**/
    function incluye_reglamento($param){
        /***/
      $id_usuario =  $param["id_usuario"];  
      $id_evento =  $param["id_evento"];
      $restricciones =  $this->get_num_restricciones_en_evento($param);  
      if (count($restricciones) > 0 ) {
              
        
          $db_response  = "";
          
          foreach ($restricciones as $row) {          
            $id_contenido =  $row["idcontenido"];                        
            $query_delete =  "DELETE FROM evento_contenido WHERE idcontenido = '".$id_contenido."' LIMIT 1";
            $db_response =  $this->db->query($query_delete);
          }
          return $db_response;
          
      }else{
        return $this->inserta_contenidos_predeterminados_restricciones($id_evento ,  $id_usuario );        
      }
      
    }

    
    

    function delete_obj($param){

        $id_obj =  $param["id_obj"]; 
        $query_delete =  "DELETE FROM  empresa_objetopermitido WHERE idobjetopermitido = '$id_obj' LIMIT 1 ";
        $this->db->query($query_delete);        
        $query_delete = "DELETE FROM objetopermitido WHERE idobjetopermitido = '$id_obj' LIMIT 1 ";  
        return  $this->db->query($query_delete);        

    }
    /**/
    function update_obj($param){

        $id_obj =  $param["id_obj"];       
        $nombre =  $param["n_articulo"];
        $descripcion =  $param["n_descripcion"];
        $query_update = "UPDATE objetopermitido SET  nombre = '".$nombre ."' , descripcion = '".$descripcion ."' WHERE idobjetopermitido = '$id_obj' LIMIT 1  ";
        return  $this->db->query($query_update);
    }
    /**/
    function get_obj($param){

        $id_obj =  $param["id_obj"]; 
        $query_get = "SELECT * FROM   objetopermitido WHERE idobjetopermitido = '$id_obj' LIMIT 1 ";  
        $result =  $this->db->query($query_get);
        return $result->result_array();
    }
    /***/
    function list_contenido_tipo($param){

      $query_get ="select  * from contenido c inner join evento_contenido ec 
      on c.idcontenido =  ec.idcontenido
      where type='".$param["tipo"]."' and  idevento ='". $param["evento"] ."' "; 
      $result =  $this->db->query($query_get);
      return $result->result_array();

    }  

    /*Mostramos los programados por tipo*/
    function load_programados_tipo($param){
        /********idprogramados , tipo , descripcion , fecha_registro , fecha_*************/  
        $query_get =  "SELECT * FROM  progrado WHERE tipo =  '". $param["tipo"] ."' ";
        $result =  $this->db->query($query_get);
        return $result->result_array(); 
    } 
    /**/
    function delete_contenido_evento($id_contenido , $id_evento ){

      $query_delete ="DELETE FROM evento_contenido WHERE idevento = '".$id_evento."' AND idcontenido = '".$id_contenido."'  ";
      return  $this->db->query($query_delete);
    }
    /*Lista los contenidos por tipo dentro del evento */
    function get_contenido_evento($id_evento , $type ){


      $query_get ="SELECT * FROM contenido AS c INNER JOIN evento_contenido  as ev
                  ON c.idcontenido =  ev.idcontenido AND ev.idevento = '".$id_evento."'
                  WHERE c.type ='".$type."' ";
      $result = $this->db->query($query_get);
      return $result->result_array();
    }
    /*Registramos nuevo template de un contenido a una seccion*/
    function record_contenido_evento($contenido , $evento ){

      if ($this->check_exist_evento_contenido($contenido , $evento )<1 ) {        
          
          $query_insert= "INSERT INTO evento_contenido VALUES( '".$evento."' , '".$contenido."'  )";
          return $this->db->query($query_insert);  

      }else{
        return 1;
      }  
    }
    /**/
    function check_exist_evento_contenido($contenido , $evento ){

        $query_get = "SELECT *  FROM evento_contenido WHERE idevento = '".$evento ."' AND  idcontenido= '".$contenido."'  ";
        $r= $this->db->query($query_get); 
        return $r->num_rows();

    }
    /*Template objetos permitidos */
    function get_templ_obj_permitidos($id_empresa){

      $query_get ="SELECT  o.idobjetopermitido , o.nombre , o.descripcion , o.fecha_registro FROM  objetopermitido o 
                  LEFT OUTER  JOIN  empresa_objetopermitido as eo
                  ON o.idobjetopermitido = eo.idobjetopermitido
                  LEFT OUTER JOIN empresa  AS e 
                  ON eo.idempresa = e.idempresa
                  WHERE e.idempresa =  '".$id_empresa."' ";


      $result= $this->db->query($query_get);
      return $result->result_array();
    }


    /*Registra template contenido */
    function record_template_contenido($iduser , $tipo_templ , $titulo_contenido_tmpl , $descripcion_templ ){
    
      
      $id_plantilla= $this->record_template("Descripcion de eventos " , $iduser , $tipo_templ);    
      return $this->record_contenido_user($titulo_contenido_tmpl , $descripcion_templ  ,  $id_plantilla  );
    }    
    /*Elimina contenido */
    function delete_contenido($id_contenido){
      $query_delete ="DELETE FROM contenido WHERE idcontenido = '". $id_contenido ."' ";
      return $this->db->query($query_delete);

    }
    /*registra plantilla en caso de existir y si no la crea  y manda su id */
    
    function record_template($nombre_tmpl , $iduser , $tipo_templ){

       $check_exist = "SELECT * FROM plantilla 
                        WHERE nombre_platilla  
                        = '".$nombre_tmpl."' 
                        AND idusuario  
                        = '".$iduser."' 
                        AND idtipo_plantilla  
                        =  '".$tipo_templ."'  limit 1"; 

       $result =$this->db->query($check_exist);
       if ($result ->num_rows() >0 ) {
            
            $flag=0;
            foreach ($result->result_array() as $row) {
                
                $flag =  $row["idplantilla"];
            }
            return $flag;

       }else{
          $query_get ="INSERT INTO plantilla(nombre_platilla,   idusuario ,   idtipo_plantilla)
          VALUES ('".$nombre_tmpl . "' , '". $iduser."' , '". $tipo_templ . "' )";
          $result = $this->db->query($query_get );
          return $this->db->insert_id();     
       }      
        
    }

    /**/

    /*Registra siempre el contenido del usuario*/
    function record_contenido_user($nombre_contenido , $descripcion_contenido ,  $id_plantilla  ){

      $query_insert= "INSERT INTO 
                    contenido(nombre_contenido , descripcion_contenido , idplantilla)
                    VALUES ( '".$nombre_contenido."' ,  
                      '". $descripcion_contenido . "' , 
                      '". $id_plantilla ."')";
      return $this->db->query($query_insert);

    }



    /**/    
    function update_contenido_nombre_descripcion($titulo_contenido_tmpl , $descripcion , $plantilla ){
      
      $query_update ="UPDATE contenido SET nombre_contenido = '". $titulo_contenido_tmpl."'  , descripcion_contenido='". $descripcion."' WHERE idplantilla='".$plantilla."' ";

      return $this->db->query($query_update);
    } 
    /*Registra los templates */

    /**/
    function get_templates_contenido_user_type($id_user , $type){
     
      $query_get ="SELECT  * FROM  contenido AS  c INNER JOIN  plantilla_contenido AS pc 
      ON    c.idcontenido = pc.idcontenido
      INNER JOIN plantilla AS  p 
      ON pc.idplantilla = pc.idplantilla
      WHERE  p.idusuario = '".$id_user."'  AND  p.idtipo_plantilla =  '".$type."'
      ORDER BY  c.fecha_registro DESC";

      $result  = $this->db->query($query_get);  
      return $result->result_array();
    }
    /**/
    function get_evento_contenido($id_evento , $type ){
      $query_get  ='SELECT * FROM contenido AS c INNER JOIN evento_contenido as ec 
      ON c.idcontenido = ec.idcontenido AND ec.idevento =  "'.$id_evento .'" WHERE type="'.$type.'" ';
      $result = $this->db->query($query_get);
      return $result ->result_array();
    }
    /*Regkistra los contenidos por tipo*/             
    function record_content($id_user , $nuevo_nombre , $contenido_text , $type){
        
        switch ($type) {
          case 1:
          $id_template = $this->record_template("Descripcion del evento " , $id_user , $type);              
            break;

          case 2:
          $id_template = $this->record_template("Descripción de lo permitodo dentro del evento " , $id_user , $type);              
            break;
          case 3:
          $id_template = $this->record_template("Restricciones" , $id_user , $type);              
            break;
          case 4:
          $id_template = $this->record_template("Politicas" , $id_user , $type);                
            break;                    
          case 5:
          $id_template = $this->record_template("Descripción del escenario" , $id_user , $type);                    
              break;  
          default:
            return "ok";
            break;
        }
        
        $status =1;
        $query_insert ="INSERT INTO contenido( nombre_contenido , descripcion_contenido , status , type) VALUES( '".$nuevo_nombre. "' ,  '". $contenido_text . "'  , '".$status."' ,  '".$type."' )";        
        $result  = $this->db->query($query_insert);
        $id_contenido =  $this->db->insert_id();     
        $query_insert_media ="INSERT INTO plantilla_contenido  VALUES ('". $id_template ."' , '".$id_contenido."')";
        return $this->db->query($query_insert_media);  
    }


    /*De la plantilla carga un contenido nuevo */
    function record_restriccion_evento($id_evento , $id_restriccion){      
      $query_get = "INSERT INTO evento_restriccion VALUES('". $id_evento."'  ,  '".$id_restriccion."' )";
      return $this->db->query($query_get);
    }
    /**/
    function delete_plantilla_contenido($id_contenido){
        $query_delete = "DELETE FROM plantilla_contenido WHERE idcontenido= '". $id_contenido . "'  ";
        return $this->db->query($query_delete);
    }    
    /*Borrar la relacion */
    function delete_restriccion_evento($id_evento , $id_restriccion){
        $query_delete = "DELETE FROM evento_restriccion WHERE idevento = '".$id_evento."'  
        AND idrestriccion= '". $id_restriccion."'    ";
        return $this->db->query($query_delete);

    }
    /**/
    function get_templ_contenido($id_user , $type ){
    
      $query_get =  "SELECT * FROM contenido  as c
      INNER JOIN plantilla_contenido  as pc
      ON c.idcontenido = pc.idcontenido
      INNER JOIN plantilla  as p 
      ON pc.idplantilla = p.idplantilla
      WHERE p.idusuario = '".$id_user ."' AND p.idtipo_plantilla = '".$type."'  ";  
      
      $result_get  = $this->db->query($query_get);        
      return $result_get ->result_array();      
      
    }
    /*********************************Articulos *************************************+*/
    function record_articulo_empresa($nuevo_articulo , $nuevo_descripcion, $id_empresa ){
      $query_insert="INSERT INTO objetopermitido (nombre, descripcion , status) VALUES('".$nuevo_articulo."' , '".$nuevo_descripcion."' , 1 )";
      $result= $this->db->query($query_insert);          
      $idlastelement = $this->db->insert_id();                  
      $query_ins = "INSERT INTO empresa_objetopermitido VALUES($id_empresa , $idlastelement)";
      $response_r= $this->db->query($query_ins);
      return $response_r;
    }
    /**/
    function delete_obj_permitido_empresa($id_empresa , $id_objeto ){

      $query_delete ="DELETE FROM empresa_objetopermitido WHERE idempresa = '". $id_empresa. "' AND idobjetopermitido = '". $id_objeto."'  LIMIT 1";
      return $this->db->query($query_delete);
      
    }
    /**/
    function incluye_objetos_evento($param){
      

      $_num =  $this->evalua_lista_objetos_evento($param["id_evento"]);
      if ($_num  > 0 ){
        return $this->delete_obj_permitido_evento_by_id_evento($param["id_evento"]);
      }else{
        return $this->insert_lista_obj_permitidos_eventos($param["id_evento"] ,  $param["id_empresa"]);
      }
      
    }
    function delete_obj_permitido_evento_by_id_evento($id_evento){

      $query_delete ="DELETE FROM evento_objetopermitido WHERE idevento = $id_evento LIMIT 50";
      return $this->db->query($query_delete);
      
    }
    /**/
    function evalua_lista_objetos_evento($id_evento){

      /**/
      $query_get =  "SELECT idevento  FROM evento_objetopermitido WHERE idevento = $id_evento LIMIT 1"; 
      $result=  $this->db->query($query_get);
      $r = $result->result_array();
      return count($r);
    }
    /**/
    function insert_lista_obj_permitidos_eventos($id_evento ,  $id_empresa){        
        $query_insert =  "INSERT INTO 
              evento_objetopermitido(idevento , idobjetopermitido) 
              SELECT  $id_evento ,  
                  idobjetopermitido  
              FROM empresa_objetopermitido
              WHERE   
              idempresa =$id_empresa";
        return  $this->db->query($query_insert);    
    }
    /**/
    /*Aplica sólo para restricciones*/
    function inserta_contenidos_predeterminados_restricciones($id_evento ,  $id_usuario ){  

      $query_insert =  "INSERT INTO evento_contenido(idevento , idcontenido)            
                SELECT '".$id_evento."' ,  pc.idcontenido  
                FROM plantilla_contenido  as pc 
                  INNER JOIN plantilla  as p  ON pc.idplantilla = p.idplantilla 
                  WHERE  p.idusuario = '".$id_usuario."'  AND p.idtipo_plantilla in (3) LIMIT 50";
      
      return  $this->db->query($query_insert);
    }
    /*Aplica sólo para politicas*/
    function inserta_contenidos_predeterminados_politicas($id_evento ,  $id_usuario ){  

      $query_insert =  "INSERT INTO evento_contenido(idevento , idcontenido)            
                SELECT '".$id_evento."' ,  pc.idcontenido  
                FROM plantilla_contenido  as pc 
                INNER JOIN plantilla  as p  ON pc.idplantilla = p.idplantilla 
                WHERE  p.idusuario = '".$id_usuario."'  AND p.idtipo_plantilla in (3) LIMIT 50";
      
      $this->db->query($query_insert);
    }


 
}