<?php defined('BASEPATH') OR exit('No direct script access allowed');
class templmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    function valida_input($param, $dia ){
      $f =  0; 
      if (isset($param[$dia])) {
        $f=1;
      }
      return $f;    
    }
    /**/
    function update_publicidad_horarios($param){

      $id_publicidad =  $param["hpublicidad"];
      $AA  = $this->valida_input($param, "AA" );      
      $nL = $this->valida_input($param, "nL" );
      $nM  = $this->valida_input($param, "nM" );
      $nMM = $this->valida_input($param, "nMM" );
      $nJ = $this->valida_input($param, "nJ" );
      $nV = $this->valida_input($param, "nV" );
      $nS = $this->valida_input($param, "nS" );
      $nD = $this->valida_input($param, "nD" );


      $hl =  $param["hl"];
      $hm =  $param["hm"];
      $hmm =  $param["hmm"];
      $hj =  $param["hj"];
      $hv =  $param["hv"];
      $hs =  $param["hs"];
      $hd =  $param["hd"];


          $query_update =  "UPDATE publicidad 
                            SET
                             L = $AA ,      
                             M = $nL ,      
                             MM= $nM  ,      
                             J = $nMM ,      
                             V = $nJ ,      
                             S = $nV  ,      
                             D = $nS ,      
                             AA= $nD, 
                              hl  = '".$hl ."',
                              hm  = '".$hm ."',
                              hmm = '".$hmm."',
                              hj  = '".$hj ."',
                              hv  = '".$hv ."',
                              hs  = '".$hs ."',
                              hd  = '".$hd ."'
                              WHERE id_publicidad = '".$id_publicidad."' LIMIT 1";
      return $this->db->query( $query_update);


    }
    /**/
    function get_publicidad($param){

      $id_publicidad  =  $param["id_publicidad"];
      $query_get =  "SELECT * FROM  publicidad  WHERE id_publicidad = $id_publicidad  LIMIT 1 ";  
      $result =  $this->db->query($query_get);
      return $result->result_array();
    }
    /**/
    function get_img_publicidad($id_publicidad){
      /**/
      $_num = mt_rand();       
      $this->create_temps_publicidad($_num , 0);

      $query_get =  "SELECT * FROM img_publicidad_$_num   i 
                    INNER JOIN imagen_publicidad ip ON 
                    i.idimagen = ip.id_imagen WHERE ip.id_publicidad =$id_publicidad ";
  


      $result =  $this->db->query($query_get);
      $data_complte =  $result->result_array();
      $this->create_temps_publicidad($_num , 1);      
      return $data_complte;




    }
    /**/
    function create_temps_publicidad($_num ,  $flag ){

        $query_drop =  "DROP TABLE IF exists img_publicidad_$_num";
        $db_response   =  $this->db->query($query_drop);
        
        if ($flag === 0){            
            $query_create =  "CREATE TABLE img_publicidad_$_num AS SELECT  * FROM imagen WHERE type =  9";
            $db_response =  $this->db->query($query_create);
        }
        return $db_response;
    }
    /**/

    /**/
    function get_publicidad_user($param){

      $id_usuario =  $param["id_user"];

      $sql_extra = "AND p.id_tipo_publicidad = '".$param["b_tipo_publicidad"]."'  "; 
      if ( strlen(trim($param["b_asunto"])) > 0  ){
          $sql_extra .=  "AND  nombre like '%". $param["b_asunto"] ."%' ";
      }
      $query_get =  "SELECT p.* FROM publicidad p 
                    INNER JOIN usuario_publicidad up ON 
                    p.id_publicidad =  up.id_publicidad
                    WHERE 
                    up.idusuario = '".$id_usuario."' " .$sql_extra." ORDER BY fecha_registro DESC ";

        $result = $this->db->query($query_get);
        return $result->result_array();
    }
    /**/
    /**/
    function insert_publicidad($param){

      $flag =  $param["flag_img"];
        $descripcion = $param["descripcion"]; 
        $asunto =  $param["asunto"];
        $response =  false;
        $id_user =  $param["id_user"];
        $id_tipo_publicidad  =  $param["tipo_publicidad"];
        if($flag == 0){                          


            $query_insert =  "INSERT INTO publicidad(nombre , descripcion , id_tipo_publicidad  ) VALUES( '". $asunto."' ,  '".$descripcion ."' ,  '".$id_tipo_publicidad."' )"; 
            $response =  $this->db->query($query_insert);              
            /**/
            $id_publicidad =  $this->db->insert_id();                  
            $query_insert =  "INSERT INTO usuario_publicidad(idusuario , id_publicidad ) VALUES('".$id_user ."' , '".$id_publicidad."')";
            $this->db->query($query_insert);


        }
        return $response;      
    }
    /**/

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

       $check_exist = "SELECT * FROM plantilla WHERE nombre_platilla  = '".$nombre_tmpl."' AND idusuario  = '".$iduser."' AND idtipo_plantilla  =  '".$tipo_templ."'  limit 1"; 
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
        
    }/**/

    /*Registra siempre el contenido del usuario*/
    function record_contenido_user($nombre_contenido , $descripcion_contenido ,  $id_plantilla  ){

      $query_insert= "INSERT INTO contenido(nombre_contenido , descripcion_contenido , idplantilla)
       VALUES ( '".$nombre_contenido."' ,  '". $descripcion_contenido . "' , '". $id_plantilla ."')";
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
        $query_delete = "DELETE FROM evento_restriccion WHERE idevento = '".$id_evento."'  AND idrestriccion= '". $id_restriccion."'    ";
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

      $query_delete ="DELETE FROM empresa_objetopermitido WHERE idempresa = '". $id_empresa. "' AND idobjetopermitido = '". $id_objeto."'  ";
      return $this->db->query($query_delete);
      
    }
    /**/
    function get_resumen_template($id_usuario ){

      $query_get ='select 
sum(case when c.type in ("1" ,  "3", "4" )  then 1 else 0 end ) total,
sum(case when c.type = 1 then 1 else 0 end ) descripcion_evento ,
sum(case when c.type = 4 then 1 else 0 end ) politicas, 
sum(case when c.type = 3 then 1 else 0 end ) restricciones  
from plantilla p  
inner join  plantilla_contenido pc on  p.idplantilla = pc.idplantilla
inner join contenido c on  pc.idcontenido = c.idcontenido
where idusuario="'.$id_usuario.'" ';
      
      $db_response  = $this->db->query($query_get);                  
      return $db_response->result_array();  
    }      
}