<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class contactmodel extends CI_Model {  
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }
  /**/
  function update_locacion_maps($param){
      $place_id =  $param["place_id"];
      $formatted_address =  $param["formatted_address"];
      $id_contacto =  $param["identificador"];
      $lat = $param["lat"]; 
      $lng = $param["lng"]; 
      
      $query_update = "UPDATE contacto 
              SET           
              place_id = '".$place_id ."'  ,  
              formatted_address = '". $formatted_address  ."',          
              lat =  '".$lat."' , 
              lng = '".$lng."' 
              WHERE idcontacto = '".$id_contacto."' limit 1"; 
      return $this->db->query( $query_update);  
      

  }

  /**/
  function delete($param){
    /**/    
    $query_delete = "DELETE  FROM contacto WHERE idcontacto = '".$param["contacto"]."'  limit 1 ";     
    return  $this->db->query($query_delete);
    
  }
  /**/
  function get_contactos_empresa($id_empresa){

      $query_get =" SELECT * FROM  contacto c 
      INNER JOIN empresa_contacto co 
      ON c.idcontacto =  co.id_contacto  
      WHERE co.id_empresa =  '". $id_empresa."' ";
      $result = $this->db->query($query_get);
      return $result->result_array();
  }
  /**/
  function carga_base_img($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }

      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
  }
  /**/
  function get_contacto_filtro_q($id_usuario ,  $q  ){     

    /*Crear tmp_img para contactos*/
    $_num =  $this->carga_base_img(6 , 0);     
    $query_get ="SELECT 
                c.idcontacto,  
                c.nombre ,                    
                c.tel ,   
                c.organizacion,     
                c.correo ,  
                c.tipo ,    
                i.*
                FROM contacto c  
                left outer  join  imagen_contacto ic on 
                c.idcontacto =  ic.id_contacto 
                left outer  join  tmp_img_$_num  i  on  ic.id_imagen =  i.idimagen 
                where  idusuario ='".$id_usuario."'  
                and (
                  c.nombre like '%".$q."%' 
                  or c.organizacion like '%". $q ."%'
                  or c.tel like '%". $q ."%'
                  or c.correo like '%".$q."%' )
                  order by c.nombre desc limit 5";

    $result =  $this->db->query($query_get);                  
    $data_complete =  $result->result_array();
    $_num =  $this->carga_base_img(6 , 1 , $_num );  
    return $data_complete; 
    
  }

  /**/
  function get_contacto_q($id_usuario ,  $q){ 

    $query_get ="SELECT c.* , i.*   FROM contacto c  
                left outer  join  imagen_contacto ic on 
                c.idcontacto =  ic.id_contacto 
                left outer  join imagen  i  on  ic.id_imagen =  i.idimagen 
                where  idusuario ='".$id_usuario."'  and c.nombre like '%".$q."%' 
                or c.organizacion like '%". $q ."%'
                or c.tel like '%". $q ."%'
                or c.correo like '%".$q."%'
                order by c.nombre desc limit 5";

    $result =  $this->db->query($query_get);                  
    return $result->result_array();

  }
  /**/
  function update_contacto_empresa($id_empresa , $contacto , $id_usuario ){

    $query_exist = "select * from empresa_contacto where id_empresa = '". $id_empresa ."' ";
    $result_exist = $this->db->query($query_exist);
    $data_contact = $result_exist ->result_array();
    $exist =   count($data_contact);

    if ($exist > 0 ){
      
      $id_contacto_update  = $data_contact[0]["id_contacto"];
      $query_update =  "update contacto set   
                         nombre   =  '". $contacto["nombre"] ."' ,
                         organizacion   =  '". $contacto["organizacion"]  ."' ,
                         tel            =  '". $contacto["telefono"] ."' ,
                         movil          =  '". $contacto["movil"] ."' ,
                         correo         =  '". $contacto["correo"]."' ,
                         direccion      =  '". $contacto["direccion"]  ."' ,
                         tipo           = 'Organización' ,
                         nota           = '". $contacto["nota"] ."' ,
                         pagina_web     = '". $contacto["pagina_web"] ."' ,
                         pagina_fb      = '".  $contacto["pagina_fb"]."' , 
                         pagina_tw      = '". $contacto["pagina_tw"] ."' ,
                         correo_alterno = '". $contacto["correo_alterno"] ."' 
                         where idcontacto = '". $id_contacto_update . "'"; 
      return  $this->db->query($query_update);


    }else{
      $new_contact = $this->record( $contacto["nombre"] , $contacto["organizacion"]  , $contacto["telefono"]  , $contacto["movil"]    , $contacto["correo"] , $contacto["direccion"]  , "Organización" , $id_usuario , $contacto["nota"]  , $contacto["pagina_web"]  , $contacto["pagina_fb"]  ,$contacto["pagina_tw"] , $contacto["correo_alterno"] ,  $contacto["extension"]   );
      $query_insert =  "INSERT INTO empresa_contacto VALUES('".$id_empresa ."' , '". $new_contact ."')";   
      return $this->db->query($query_insert);
    }
    
  }



  function get_contactos_id($param){    
    $query_get ="select * from  contacto where idcontacto   = '". $param["contacto"] ."' limit 1";
    $result= $this->db->query($query_get);
    return $result->result_array();
  }
  /*recorc contacto */
  function record( $nombre , $organizacion , $telefono, $movil, $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web , $pagina_fb , $pagina_tw  , $correo_alterno , $extension  ){

 
    $query_insert="INSERT INTO contacto( nombre         
                    , organizacion   
                    , tel            
                    , movil          
                    , correo         
                    , direccion                                            
                    , tipo           
                    , idusuario
                    , nota 
                    , pagina_web 
                    , pagina_fb 
                    , pagina_tw 
                    , correo_alterno
                    , extension
                     ) 
                  VALUES( '".$nombre ."' , '".$organizacion."' , '".$telefono."', '".$movil."', '".$correo."' , '".$direccion ."', '".$tipo."' ,  '".$idusuario ."', '".$nota ."' ,  '". $pagina_web  ."'  , '". $pagina_fb ."' , '". $pagina_tw ."' , '". $correo_alterno."'  , '". $extension  ."') ";

   $result_insert  =  $this->db->query($query_insert);                 
   return $this->db->insert_id();               

  }
  /*Termina la función*/
   

  function get_contactos_user($idusuario , $param  , $limit=10 ){

    /**/
    $filtro = $this->filtra_contacto($param);
    /*Cremos base tmp_img para agilizar la consulta de imagenes */    
    $_num =  $this->carga_base_img(6 , 0);     

    $query_get ="SELECT c.*,
                        i.* , 
                        c.status  estado_contacto  , 
                        c.fecha_registro   fecha_registro_contacto   
                        FROM contacto c  
                        left outer  join  imagen_contacto ic on  c.idcontacto =  ic.id_contacto 
                        left outer  join tmp_img_$_num  i  on  
                        ic.id_imagen =  i.idimagen 
                        where 
                        idusuario ='".$idusuario."'  ".$filtro." " ;                    

    $result = $this->db->query($query_get);
    $data_complete =  $result ->result_array();   
    $_num =  $this->carga_base_img(6 , 1 , $_num );     
    return $data_complete;
  }
  /***/
  function filtra_contacto($param){

    $filtro ="";   
      if ( strlen($param["nombre_b"]) > 0  && strlen($param["telefono_b"] ) < 3  ) {
        $filtro= " and nombre  like '". $param["nombre_b"] ."%' " ;  

      }else if(strlen($param["telefono_b"]) > 0  && strlen($param["nombre_b"]) <  3  ){

        $filtro= " and  tel like '". $param["telefono_b"] ."%' " ;    

      }else if(strlen($param["telefono_b"] ) > 0  && strlen($param["nombre_b"]) > 0  ){

        $filtro= " and  nombre  like '". $param["nombre_b"] ."%'  OR   tel like '". $param["telefono_b"] ."%'  " ;        

      }else if(strlen($param["nombre_b"]) == 0  and  strlen($param["telefono_b"]) == 0 ){       

        $filtro = " and  tipo like '". $param["tipo_b"] ."%'" ;            

      }else{} 
      return $filtro;
  }
  /**/  
  /*Lista de contactos*/
  function get_list_contactos($id_usuario){

    $query_get ="select distinct(nombre) from contacto where idusuario='".$id_usuario."'  ";
    $result =  $this->db->query($query_get);
    return $result->result_array();
  }
  /**/
  function update( $nombre , 
    $organizacion , 
    $telefono, 
    $movil, 
    $correo , 
    $direccion, 
    $tipo , 
    $idusuario, 
    $nota , 
    $pagina_web ,  
    $id_contacto , 
    $pagina_fb , $pagina_tw , $correo_alterno , $extension ){

    $query_update="UPDATE contacto 
                  SET 
                  nombre =  '". $nombre ."'  ,  
                  organizacion = '".$organizacion."' ,  
                  tel= '".$telefono."'   ,
                  movil = '".$movil."' , 
                  correo =  '".$correo."' ,  
                  direccion =  '".$direccion ."' ,  
                  tipo = '".$tipo."' ,
                  extension = '".$extension."',  
                  nota  = '".$nota ."' ,
                  pagina_web = '". $pagina_web  ."'   , 
                  pagina_fb ='". $pagina_fb ."'  ,
                  pagina_tw = '". $pagina_tw  ."' , 
                  correo_alterno='". $correo_alterno ."'   
                  WHERE idcontacto = '". $id_contacto."' limit 1";
                                                                    
    return $this->db->query($query_update);                 

  }
  /**/
  function get_tipos_contactos($id_usuario){

    $query_get ="select distinct(tipo) from  contacto where idusuario='". $id_usuario."' ";
    $result = $this->db->query($query_get);
    return $result->result_array();
  }

  /*reporte general de los contactos que tengo hasta el momento */
  function get_repo_contactos($id_usuario){


    $query_get ='select count(*)contactos ,
sum(case when tipo = "Proveedor" then 1 else 0 end )proveedores,      
sum(case when  tipo = "Artista" then 1 else 0 end )artistas,  
sum(case when  tipo = "Colaborador" then 1 else 0 end )Colaboradores,
sum(case when  tipo = "Contacto Comercia" then 1 else 0 end )Contacto_comercial,
sum(case when  tipo = "Cliente" then 1 else 0 end )Clientes,
sum(case when  tipo = "Institución" then 1 else 0 end )instituciones,
sum(case when  tipo = "Patrocinador" then 1 else 0 end )Patrocinador,
sum(case  when length(correo) > 0 then  1 else  0 end ) con_correo,
sum(case  when length(pagina_web) > 0 then  1 else  0 end ) con_pagina_web,

sum(case  when length(pagina_fb) > 0 then  1 else  0 end ) con_pagina_fb,
sum(case  when length(pagina_tw) > 0 then  1 else  0 end ) con_pagina_tw,
sum(case  when length(tel) > 0 then  1 else  0 end ) con_tel

from contacto where idusuario= "'. $id_usuario.'"
';


    $result = $this->db->query($query_get);
    return $result->result_array();

  }

/**/
function get_contacto_empresa($id_empresa){
  $query_get = "select ce.* , c.*  from empresa_contacto ce inner join contacto c on c.idcontacto = ce.id_contacto where ce.id_empresa = '". $id_empresa."' ";
  $result = $this->db->query($query_get);
  return $result->result_array();
}
/**/
function update_contacto_nota($param){

  $nota  = $param["nota-contacto-text"];
  $query_update = "UPDATE contacto SET  nota = '". $nota ."' WHERE idcontacto = '". $param["contacto"] ."' ";
  return $this->db->query($query_update);

}
/*Termina modelo */
}