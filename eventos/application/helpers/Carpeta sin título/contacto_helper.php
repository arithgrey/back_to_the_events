<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	/**/
	function evalua_direccion($direccion ,  $id_contacto ){

		$d_direccion = ""; 
		if (strlen(trim($direccion))>4){		

			$d_direccion =  "<i class='locacion fa fa-map-marker ' id='".$id_contacto."' data-toggle='modal' data-target='#locacion-modal'  title='". $direccion."'>
							</i>";	
		}else{
			$d_direccion =  "<i class='locacion fa fa-map-marker direccion_registrada' id='".$id_contacto."' data-toggle='modal' data-target='#locacion-modal'  title='". $direccion."'>
							</i>";	
		}		
		return $d_direccion; 

	}
	/**/
	function get_tipos_contactos($name , $class , $id ){

		$tipos_contactos = array("Proveedor", "Artista ", "Colaborador",  "Contacto comercial",  "Cliente",  "Contacto personal ",  "Institución", "Productora",  "Patrocinador",  "Otro" );
		
		$select = "<select name='".$name."'  class='". $class ."'  id='". $id ."'>"; 
		for ($a=0; $a <count($tipos_contactos) ; $a++) { 
			$select .=  "<option value='". $tipos_contactos[$a]."'>". $tipos_contactos[$a]."</option>";
		}
		$select .= "</select>"; 
		return $select; 		 				
	}
	/**/
	function validate_descripcion_c($nota , $idcontacto ){
		$ndescripcion = '<i  class="nota-c  fa fa-list-alt"  id="'. $idcontacto.'"  ></i>'; 	
		if (strlen(trim($nota )) < 5 ){
			$ndescripcion = '<i style="color: #93a2a9 !important;"  class="nota-c  fa fa-list-alt"  id="'. $idcontacto.'"  ></i>'; 	
		}
		return $ndescripcion;
	}	
	function valida_url_contacto($url , $text ){

		$nurl =  "<a style='color: #09AFDF !important;' href='". $url ."' title='Página web'> ". $text ." </a>";;
		if (strlen(trim($url)) < 5 ) {

			$nurl = "<span title='Página web' style='color: #93a2a9 !important;'> ".$text."</span>"; 
		}
		return $nurl;
	}

	function filtro_enid_busqueda_contactos($data,  $class , $id){    
    

    $filtro ="<div class='panel-heading enid-header-busqueda' >";    
    $filtro .= "<h5 class='text-center'>Secciona para añadir...</h5>";           
    $filtro .= "</div>";           
    $filtro .= "<div class='panel panel-body-enid-busqueda'>               
               <ul>";        

    
      foreach ($data as $row){
          /* Tupla de indormación */
          $filtro .= "<li style='font-size:.7em !important; list-style:none;' class=' enid-filtro-busqueda' id=''>";                        
          	
          	//$img = create_icon_img($row , $class, $id , $extra= '' ,  $letra ='A' ); 
          	$filtro .=  "<div class='img-div' >"; 
	      	$filtro .=  create_icon_img($row , "" ,  $row[$id]  );  
	       	$filtro .=  "</div>"; 	  
	        $filtro .=  "<div class='img-div-text $class '  id='". $row[$id]."'>";          
	        $filtro .=  $row["nombre"]; 
	        $filtro .=  " (". $row["correo"] .") ";
	        $filtro .=  " - " . $row["tipo"];    
	        $filtro .=  "</div>";           
	          
          $filtro .= "</li>";
      } 

      /****************************************************************************************/      
      
      $filtro .="</ul>";
      $filtro .="</div>";
      return $filtro; 
  }
  
function contactos_punto_venta_filter($data){
	    /**/    

	    $lista_completa ="";	
	    $b = 0;   	
	    foreach ($data as $row) {   
		      /**/
		      $b++;
		      $id_contacto  =  $row["idcontacto"];  
		      $nombre  = $row["nombre"];
		      $organizacion  =  $row["organizacion"];     
		      $tel =  $row["tel"];    
		      $correo =  $row["correo"];		      
		      $tipo =  $row["tipo"];
		      /*img*/		
		      $nombre_imagen =  $row["nombre_imagen"];
		      /*Punto de venta */		      
		      $resumen =  $organizacion . "  (". $correo .")" . " - tel " . $tel . " Tipo - " . $tipo;     		      		      
		      
		      $complete_img  ="";


		      

		      

		    $lista_completa .=   $complete_img; 
		     
	     }
   
    	return "<div class='row'><em class='text-center'>
    				Cargados al punto de venta  ". $b  ."</em></div>
    			" . $lista_completa;
 
}


  /*Terminal el filtro  */
	function table_contac($data ,  $limit){		

        $complete  ="";
        $contacto  = "";        	
		
		$class_enid = 'scroll-horizontal-enid';
		if (count($data) > 9 ){
			$class_enid = 'scroll-enid';
		}
		$contacto .= '<div class='.$class_enid.'  style="height:500px;" >
					<table class="table table-bordered">';										 
		$contacto .="<tr class='enid-header-table'>";					  
		$contacto .= get_td("#" , "");				  
		$contacto .= get_td ("Editar" , "" );											
		$contacto .= get_td("IMG" , "");				  
		$contacto .= get_td("Contacto" , "");				  					  					  
		$contacto .= get_td("organización" , "");
		$contacto .= get_td("Teléfono" , "");	 					  	
		$contacto .= get_td("Movil" , "class='dinamic_campo_tb' ");					  			  
		$contacto .= get_td ("Correo" , "" );
		$contacto .= get_td ("Correo alterno" , "class='dinamic_campo_tb' ");
		$contacto .= get_td ("Página web" , "" );
		$contacto .= get_td ("Facebook" , "" );
		$contacto .= get_td ("Twitter" , "" );
		$contacto .= get_td ("Dirección" , "colspan='2'" );
		$contacto .= get_td ("Nota" , "" );
		$contacto .= get_td ("Tipo" , "" );					  	
		$contacto .= get_td ("Estado" , "" );
		$contacto .= get_td ("Registro" , "class='dinamic_campo_tb' " );
		$contacto .=  get_td("Eliminar", "");		
		$contacto .="</tr>";
		
		$b =1;						  
		foreach ($data as $row) {
			

			$idcontacto  = $row["idcontacto"]; 
			$nombre      = $row["nombre"];  
			$organizacion  = $row["organizacion"];
			$tel          = $row["tel"]; 
			$movil         = $row["movil"];
			$correo        = $row["correo"];
			$correo_alterno        = $row["correo_alterno"];
			$pagina_web =  $row["pagina_web"];
			$pagina_fb =  $row["pagina_fb"];
			$pagina_tw =  $row["pagina_tw"];

			$direccion    = $row["direccion"]; 
			$status         =  $row["estado_contacto"];
			$fecha_registro =  $row["fecha_registro_contacto"];
			$tipo          = $row["tipo"];
			$idusuario     = $row["idusuario"];
			$nota          = $row["nota"];
			/**/
			
			$contacto .='<tr class="text-center media usr-info"  style = "height:10px !important;" >';
			$contacto .= get_td( $b , "franja-vertical");	
			$contacto .= get_td( '<i id="'. $idcontacto.'" class="editar-contacto fa fa-cog" ></i> ' , ' data-toggle="modal" data-target="#contact-modal-edit"');			
			
			$img = create_icon_img($row , ' img_contacto img_enid_service  ', $idcontacto   , 'data-toggle="modal" data-target="#contact-imagen-modal" '  );
			$contacto .=  get_td($img  , "");


				

			$contacto .= get_td($nombre , "class='franja-vertical'" );

						$contacto .= get_td($organizacion, ""); 
						$contacto .= get_td($tel, ""); 
						$contacto .= get_td($movil,  "class='dinamic_campo_tb' " ); 
						$contacto .= get_td($correo, ""); 
						$contacto .= get_td($correo_alterno ,  "class='dinamic_campo_tb' "); 
								

						$pagina_web_d =  "<a style='color: #26A0D1 !important;' href='". $pagina_web ."'> www </a>";
						$contacto .= get_td($pagina_web_d  , ""); 


						$pagina_web_f =  "<a  style='color: #26A0D1 !important;'  href='". $pagina_fb ."'> Facebook </a>";
						$contacto .= get_td($pagina_web_f  , ""); 
						
						$pagina_web_t =  "<a style='color: #26A0D1 !important;' href='". $pagina_tw ."'> Twitter </a>";
						$contacto .= get_td($pagina_web_t  , ""); 						
						$contacto .= get_td( strtolower($direccion), "colspan='2'");
						$contacto .= get_td(  '<i id="'. $idcontacto.'" class="nota-c fa fa-list-alt" ></i>', 'data-toggle="modal" data-target="#contact-nota"');		 
						$contacto .= get_td($tipo, ""); 						
						$contacto .= get_td($status , ""); 
						$contacto .= get_td($fecha_registro,  "class='dinamic_campo_tb' "); 


						$contacto .= get_td("<i class='delete_contacto fa fa-times' id='". $idcontacto ."'></i>", 'data-target="#contact-delete"  data-toggle="modal"  '); 

			$contacto .='</tr>';			
			$b++;
		}


		

		$num_elementos = ($b -1 );	
		$contacto .="</table>
					</div>";
		
		$complete .=  n_row_12()
					  	.limits_tables("index.php/directorio/contactos" , $limit ) .
					  end_row();				


		$complete .= "<em class='total_table'>Mostrando: ".( $b -1 )."</em> <div class='pull-right mas-info' style='font-size: .7em;padding: 5px; margin-left:1px;' >
                        <i class='fa fa-chevron-down'>
                        </i>  + info
                    </div>                                        
                    <div class='pull-right menos-info' style='font-size: .7em;padding: 5px; margin-left:1px; display:none;' >
                        <i class='fa fa-chevron-up'>
                        </i>  - info
                    </div></div>"; 
		$complete .= $contacto; 
		return $complete;	

	}

	/*termina la función */
	function list_contactos_names($data){

		$list_data ='<datalist id="contactos-lista">';
		foreach ($data as $row) {
			$list_data .="<option value='". $row["nombre"]."'>";
		}
		$list_data .="</datalist>";
		return  $list_data;
	}
	/**/

	function filtro_tipo_contacto($data){
		return  create_select($data , 'filtro-tipo-contacto' , 'form-control' , 'filtro-tipo-contacto' , 'tipo' , 'tipo' ); 
	}/**/

	/*Resumen de los contactos */
	function resumen_contactos($data){


		$table ='<table class="table table-bordered">										  
					  <tr class="text-center header-table-info" >';
					  	$table .= get_td( "Contactos", "" );
					  	$table .= get_td( "Proveedores", "" );
					  	$table .= get_td( "Artistas", "" );
					  	$table .= get_td( "Colaboradores", "" );
					  	$table .= get_td( "Contactos comerciales", "" );
					  	$table .= get_td( "Clientes", "" );
					  	$table .= get_td( "Instituciones", "" );
					  	$table .= get_td( "Patrocinadores", "" );
					  						  
					  	$table .= get_td( "Con correo electrónico", "" );					  		
					  	$table .= get_td( "Con página web", "" );					  		
					  	
					  	$table .= get_td( "Con Facebook", "" );	
					  	$table .= get_td( "Con Twitter", "" );	

					  	$table .= get_td( "Con tel ", "" );

		$table .='</tr>';
		


		foreach ($data as $row) {
			    
			$table.="<tr   class='text-center'>";
						$table .=get_td($row["contactos"] , "" );
						$table .=get_td($row["proveedores"], "" );
						$table .=get_td($row["artistas"] , "" );
						$table .=get_td($row["Colaboradores"] , "" );
						$table .=get_td($row["Contacto_comercial"] , "" );
						$table .=get_td($row["Clientes"] , "" );
						$table .=get_td($row["instituciones"] , "" );
						$table .=get_td($row["Patrocinador"] , "" );
						

						$table .=get_td($row["con_correo"] , "" );
						$table .=get_td($row["con_pagina_web"] , "" );
						$table .=get_td($row["con_pagina_fb"] , "" );
						$table .=get_td($row["con_pagina_tw"] , "" );

						$table .=get_td($row["con_tel"] , "" );
						

			$table .="</tr>";	  	
			$table .="<tr class='text-center'>";
						$table .= get_td( get_porcentajes_contactos( $row["contactos"] , $row["contactos"]  ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["proveedores"] ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["artistas"]   ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"],  $row["Colaboradores"])   , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"],  $row["Contacto_comercial"]  ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["Clientes"] ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["instituciones"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["Patrocinador"]) , "");

						
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_correo"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_pagina_web"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_pagina_fb"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_pagina_tw"]) , "");

						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_tel"]) , "");
						

		 			$table  .="</tr>";  					 
		}	  
		$table .="</table><br>";					
		return $table;

	}
	/**/
	function get_porcentajes_contactos($contactos , $val ){

		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $contactos )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}

		return $result;
	}

	/**/
	function contactos_list($data){

		$info_contacto = "<table class='table table-bordered'>"; 	
		foreach ($data as $row) {				

			$nombre =  $row["nombre"];         
			$organizacion   =  $row["organizacion"];
			$tel =  $row["tel"];          
			$movil  =  $row["movil"];        
		 	$correo  =  $row["correo"];
			$direccion  =  $row["direccion"];     
			
			$nota   =  $row["nota"];         
			$pagina_web     = $row["pagina_web"];
			$pagina_fb = $row["pagina_fb"];      
			$pagina_tw = $row["pagina_tw"];	       		
			$correo_alterno = $row["correo_alterno"];	  


			$info_contacto .=  "<tr>"; 
				$info_contacto .= get_td( $nombre , "" );



				$tel =  "<a title= '". $tel ."' style='color: #26A0D1 !important;' > <i title= 'Teléfono de contacto : ". $tel ."' class='fa fa-phone'></i> </a>";
				$info_contacto .= get_td( $tel , "" );
				
				$movil =  "<a title= '". $movil."' style='color: #26A0D1 !important;' > <i title= 'Móvil :". $movil ."' class='fa fa-mobile'></i> </a>";
				$info_contacto .= get_td( $movil , "" );

				$correo =  "<a title= '". $correo ."' style='color: #26A0D1 !important;' > <i title= 'Correo electrónico : ".$correo."' class='fa fa-envelope-o'></i> </a>";
				$info_contacto .= get_td( $correo , "" );

				$correo_alterno =  "<a title= '". $correo_alterno ."' style='color: #26A0D1 !important;' > <i title= 'Correo alterno ".$correo_alterno ."' class='fa fa fa-envelope'></i> </a>";				

				$info_contacto .= get_td( $correo_alterno , "" );

				$locacion =  "<a title= '".$direccion."' style='color: #26A0D1 !important;' > <i title= 'Dirección :".$direccion."' class='fa fa-map-marker'></i> </a>";
				$info_contacto .= get_td( $locacion , "" );

				$pagina_web_d =  "<a style='color: #26A0D1 !important;' href='". $pagina_web ."'> www </a>";
				$info_contacto .= get_td($pagina_web_d  , ""); 
				$pagina_web_f =  "<a  style='color: #26A0D1 !important;'  href='". $pagina_fb ."'> Facebook </a>";
				$info_contacto .= get_td($pagina_web_f  , ""); 					
				$pagina_web_t =  "<a style='color: #26A0D1 !important;' href='". $pagina_tw ."'> Twitter </a>";
				$info_contacto .= get_td($pagina_web_t  , ""); 					
			$info_contacto .=  "</tr>"; 

		}
		if (count($data) == 0  ) {
			$info_contacto = "Punto de venta sin contactos asignados ";
		}

		return $info_contacto; 
	}
}/*Termina el helper*/