<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){


	function horario_atencion($name , $class ){

		$select  = "<select name='".$name ."' class='".$class."' >";
		$disponibles = array("De 9 hrs a 14hrs ",
		"De 8 hrs a 14 hrs ",
		"De 10 hrs a 14 hrs",
		"De 11 hrs a 14 hrs ",
		"De 8 hrs a 15 hrs",
		"De 9 hrs a 15hrs  ",
		"De 10 hrs a 15 hrs",
		"De 11 hrs a 15 hrs ",
		"De 8 hrs a   16 hrs",
		"De 9 hrs a   16 hrs  ",
		"De 10 hrs a 16 hrs",
		"De 11 hrs  a 16 hrs ",
		"De 8 hrs a   17 hrs",
		"De 9 hrs a   17 hrs  ",
		"De 10 hrs a 17 hrs",
		"De 11 hrs a 17 hrs  ",
		"De 8 hrs a   18 hrs",
		"De 9 hrs a  18 hrs",
		"De 10 hrs a 18 hrs",
		"De 11 hrs a 18 hrs",
		"De 8 hrs a   19 hrs",
		"De 9 hrs a   19 hrs",
		"De 10 hrs a 19 hrs",
		"De 11 hrs a 19 hrs",
		"De 8 hrs a   19 hrs",
		"De 9 hrs a   19  hrs",
		"De 10 hrs a 19 hrs",
		"De 11 hrs a 19 hrs",
		"De 8 hrs a   20 hrs",
		"De 9 hrs a   20  hrs",
		"De 10 hrs a 20 hrs",
		"De 11 hrs a 20 hrs",
		"De 8 hrs a   21 hrs",
		"De 9 hrs a   21  hrs",
		"De 10 hrs a 21 hrs",
		"De 11 hrs a 21 hrs");
			

		for ($x=0; $x < count($disponibles); $x++) { 
			$select .=  "<option value='".$disponibles[$x]."'>". $disponibles[$x]."</option>";
		}
		$select.=  "</select>";
		return $select;


	}	

	function info_punto_venta_frame($data ,  $id_evento){
		
		$url_next_completee =  ""; 
		$pvs ="";


		foreach ($data as $row) {
			$idpunto_venta = $row["idpunto_venta"]; 		
			$url_next = base_url('index.php/puntosventa/info_complete') ."/".$idpunto_venta."/".$id_evento;						
			$url_next_config = base_url('index.php/puntosventa/info_complete') ."/".$idpunto_venta. "/".$id_evento. "/1/";						
			$url_admin =  create_url_puntoventa_admin($id_evento);

			$pvs .= "	<div>							
							
								". n_row_12('link-to-info')  ."							
									<a href='".$url_next_config."'>
										".titulo_enid("+ Info")."
									</a>							
								". end_row() ."
								
								". n_row_12('link-to-admin')  ."
								
									<a href='".$url_admin."'>
										<i class='fa fa-cog'>
										</i>
									</a>
								". end_row() ."

							
							". n_row_12()  ."							
								<iframe src='".$url_next."'  style='width:100%;' >
							 	</iframe>				
							". end_row() ."

						</div>					
					  ";					
		}
		return  $pvs;
	}
	/**/
	function catalogo_disponibles($pvs){

		$table =  ""; 
		foreach ($pvs as $row) {
			$idpunto_venta =  $row["idpunto_venta"];					
			$razon_social =  $row["razon_social"];
			$L =  $row["L"]; 
			$M =  $row["M"]; 
			$MM =  $row["MM"]; 
			$J =  $row["J"]; 
			$V =  $row["V"]; 
			$S =  $row["S"]; 
			$D =  $row["D"]; 
			$horario_atencion =  $row["horario_atencion"]; 
			$zona =  $row["zona"];
			$table .=  "<tr>
					
							". get_td($razon_social) ."
							". get_td(evalua_dia($L)) ."
							". get_td(evalua_dia($M)) ."
							". get_td(evalua_dia($MM)) ."
							". get_td(evalua_dia($J)) ."
							". get_td(evalua_dia($V)) ."
							". get_td(evalua_dia($S)) ."
							". get_td(evalua_dia($D)) ."							
							". get_td($horario_atencion)."
							". get_td($zona)."
						</tr>"; 
		

			
		}
		return $table;		  
		/*
		*/

	}
	function valida_nuevo_pv_evento($id_acceso , $id_evento , $in_session , $text_desc ){
		$text = ""; 

		if ($in_session == 1 ){
			
			$href = create_url_puntoventa_admin($id_evento);
			$btn =  agregar_btn($in_session , $href ); 
			$text ="<span class='nuevo-pv-text'> 
						".$text_desc."
					</span>
					<span class='nuevo-pv-btn'>  
					  	". $btn ."
					</span>"; 
		}
		return $text;	
	}
	/**/
	/*
	
	*/
	/**/
	/*
	function valida_nuevo_pv($in_session, $text_desc){
		$text = ""; 
		if ($in_session == 1 ){			
			$href =  base_url("index.php/accesos/configuracionavanzada/")."/a/nuevo";
			$btn =  agregar_btn($in_session , $href ); 
			$text =  "
					  <span class='nuevo-pv-text'> 
						".$text_desc."
					  </span>
					  <span class='nuevo-pv-btn'>  
					  	". $btn ."
					  </span>"; 
		}
		return $text;	
	}
	*/
	/**/
	
	/**/
	/*
	
	*/
	/**/
	function create_url_sitio_web($sitio_web){

		$nsitio_web = "<span class='sitio_web_registrado'> wwww </span>"; 
		if (strlen(trim($sitio_web)) > 5) {
			$nsitio_web = "<span class='sitio_web_registrado'><a href='".$sitio_web."'> wwww </a></span>"; 
		}
		return $nsitio_web;

	}
	function create_template_resumen_punto_venta($puntos_venta){
	
		$puntos_venta_resum = ""; 
		foreach ($puntos_venta as $row){			

			$idpunto_venta  = $row["idpunto_venta"];		
			$url_admin =  create_url_puntoventa_admin();

			$url_next =  base_url("index.php/puntosventa")."/mini_resumen/".$idpunto_venta;
			$puntos_venta_resum .= "<div class='row'>		

										<span title='Quitar del evento éste punnto de venta' data-toggle='modal' data-target='#delete-punto-venta-modal'>
											<i class='fa fa-times delete-punto-venta-icon' id='". $idpunto_venta  ."'>
											</i>
										</span>
										<span>
											<a href='".$url_admin ."'>
												<i class='fa fa-cog'>
												</i>
											</a>										
										</span>										

										<div>
											<iframe src='".$url_next."' width='100%' >
											</iframe> 	 
										</div>
									</div>
									"; 
			
		}			
		return $puntos_venta_resum;
	}
	/*
	function tmp_contactos_cargados($contactos, $idpunto_venta){

		$tmp_contacto =""; 

			$t =  "title=  ' Ningún contacto  del directorio que han sido asociado al punto de venta, click para cargar nuevo'"; 
			$tmp_contacto = "<span $t class='contactos contactos_registrados' id='". $idpunto_venta  ."' data-toggle='modal' data-target='#contactos-modal' > 0 </span> ";	

		if ($contactos>0) {
			$t =  "title=  ' ".$contactos ." contactos del directorio que han sido asociados al punto de venta, click para cargar nuevo'"; 
			$tmp_contacto = "<span  $t class='contactos' id='". $idpunto_venta  ."' data-toggle='modal' data-target='#contactos-modal' > ". $contactos ." </span> ";	
		}
		return $tmp_contacto;

	}
	*/
	/**/	
	function tmp_formatted_address($direccion , $idpunto_venta){
		$d_direccion = ""; 
		if (strlen(trim($direccion))> 4 ){
			
			$d_direccion =  "<i class='nota-punto-venta fa fa-map-marker ' id='".$idpunto_venta."' data-toggle='modal' data-target='#punto-venta-descripcion-modal'  title='". $direccion."'>
						</i>";	
		}else{
			$d_direccion =  "<i class='nota-punto-venta fa fa-map-marker direccion_registrada' id='".$idpunto_venta."' data-toggle='modal' data-target='#punto-venta-descripcion-modal'  title='". $direccion."'>
						</i>";	
		}		
		return $d_direccion; 

	}
	/**/
	function dia_disponibles($dia){
		
		$simbolo =  "-";
		if ($dia == 1 ){

			$simbolo =  "<i class='fa fa-check'></i>"; 	
		}
		return $simbolo;
	}


	/**/
	function tmp_dias_disponibles($row){

		$L =  $row["L"]; 
		$M =  $row["M"]; 
		$MM =  $row["MM"]; 
		$J =  $row["J"]; 
		$V =  $row["V"]; 
		$S =  $row["S"]; 
		$D =  $row["D"]; 
		$horario_atencion =  $row["horario_atencion"]; 


		$table =  "<table class='table_dias_disponibles' >									
						<tr class='titulos_tabla_horarios'>
							<td colspan='7'>
								Horarios de atención ".$horario_atencion ."
							</td>
						</tr>
						<tr>
							". get_td("L") ."
							". get_td("M") ."
							". get_td("MM") ."
							". get_td("J") ."
							". get_td("V") ."
							". get_td("S") ."
							". get_td("D") ."					
						</tr>
						<tr>
							". get_td(evalua_dia($L)) ."
							". get_td(evalua_dia($M)) ."
							". get_td(evalua_dia($MM)) ."
							". get_td(evalua_dia($J)) ."
							". get_td(evalua_dia($V)) ."
							". get_td(evalua_dia($S)) ."
							". get_td(evalua_dia($D)) ."

						</tr>
				  </table>"; 
		return $table;		  
	}
	function evalua_dia($dia){

		$ndia =  "<span class='dias_disponibles_status' title='No dará servicios éste día'> - </span>"; 
		if ($dia == 1  ) {
			$ndia =  "<span class='fa fa-check dias_disponibles_status' title='podrás acudir ya que estará dando servicios'></span>";
		}
		return $ndia;
	}

	/**/
	function puntos_disponibles($data , $in_session , $id_evento ){	

		$puntos_disponibles = "";
		if ($in_session ==  1 ){
			editar_btn($in_session , url_accesos_configuracion_avanzada($id_evento )."/puntosventa" );
			if (count($data)== 0 ) { $puntos_disponibles = "<span class='proximamente_alert msj_notificacion_config  '> No has cargado puntos de venta en el evento  </span>";}		
		}else{
			if (count($data)== 0 ) { $puntos_disponibles = "<span class='proximamente'> Próximamente .! </span>";}		
		}
		

	foreach ($data as $row) {
		
		$idpunto_venta =  $row["idpunto_venta"];
		$razon_social  = $row["razon_social"];
		$descripcion  = $row["descripcion"];						
		$nombre_imagen= $row["nombre_imagen"];		
		$zona =  $row["zona"];			
		$img =  create_icon_img($row , '   ', ' '); 
		$dias_disponibles =  tmp_dias_disponibles($row); 
		$sitio_web  =  $row["sitio_web"];

		$url_config = create_url_puntoventa_admin($razon_social);
		$in_session_btn = editar_btn($in_session  , $url_config ); 

	$puntos_disponibles .= '
							<div>
								<div>
									<div>	
										<span>
											'.$in_session_btn .'
										</span>					                   
										<span class="n_razon_social">
											'.$razon_social.'
										</span>						                    
									</div>						             
									<div>
										<div>						              	    
											'.$img .'						               						                	
										</div>						  
										<div>
											'.create_text_direccion($descripcion).'
										</div>
													
										<span> 
											Zona de la ciudad '. $zona .'
										</span>
										<a href="'.$sitio_web.'" class="sitio_web_punto_venta pull-right">
											www
										</a>					               
									</div>
									<div class="panel-footer panel_footer_pv">						              							              							              	
										'. $dias_disponibles .'
									</div>
								</div>
							</div>					  
    					';
    	}
    	return 	$puntos_disponibles;				
	}
	/**/
	/*
	function create_text_direccion($direccion){

		$text = "";
		if (strlen(trim($direccion))> 5 ) {
			$text ='
							<div>
								<label>
									<strong >
										Ubicación
											<i class="fa fa-map-marker" aria-hidden="true">
						                    </i> 
									</strong>
								</label>
								<p class="disclosure" style="color:white;">	
								'.$direccion.'
								</p>
							</div>    
					
			';	
		}
		return $text;		
	}*/
	/**/	
	/*
	function zona_disponibles($puntos_venta){
		
		$zonas =  ""; 		
		if (count($puntos_venta) > 0 ) {
			$zonas =  "<ul>"; 
			foreach ($puntos_venta as $row) {
				$n_zona= $row["zona"]; 
				if ($n_zona != "") {			
					$zonas .="<li><a href='#".$n_zona."' class='btn btn-primary'>".$n_zona ."</a></li>";				
				}
			}
			$zonas .=  "<ul>"; 	
		}				
		return $zonas;
		
	}
	*/
	/**/
	/*
	function puntos_venta_admin($data ){
		$icon =  ""; 
		$flag = 0; 
		foreach ($data as $row){			
			$flag ++;
			$idpunto_venta  = $row["idpunto_venta"];
			$razon_social = $row["razon_social"]; 						
			$nombre_imagen  = $row["nombre_imagen"]; 			
			$title = $razon_social . " asociado al evento"; 

			$img =  create_icon_img($row , "punto-venta-icon", $idpunto_venta); 
			$icon .=  	"<div class='img-horizontal'>
							" . $img ."
							<div title='$title' data-toggle='modal' data-target='#delete-punto-venta-modal'  >
								<i class='fa fa-times delete-punto-venta-icon' id='". $idpunto_venta  ."'>
								</i>
							</div>
							<i title='Información completa del punto de venta' class='fa fa-angle-double-left info-punto-venta' id='". $idpunto_venta  ."' style='background:#63C7D8; color:white; padding:5px;'>
							</i>
						</div>";  	
		
		}	
		if ($flag > 0  ){

			return "<div class='resultado-busqueda-enid'> 
					" . $icon . "
					</div>"; 
		}else{
			return "";
		}		
	}	
	*/
	/**/	
	/*
	  function filtro_enid_busqueda_punto_venta($data,  $class , $id   ){    
	    	  
	    $filtro ="<div class='panel-heading enid-header-busqueda ' >
	    			Resultados encontrados
	    			<div class='response-puntos-venta' id='response-puntos-venta'></div>
	    			";    	    
	    $filtro .= "</div>";           
	    $filtro .= "<div class='panel panel-body-enid-busqueda'>               
	               <ul>";        	    
	      foreach ($data as $row){	          

	          $filtro .= "<li style='font-size:.7em !important; list-style:none;' class='enid-filtro-busqueda' id='". $row[$id]  ."'>";                                  
	          	

			   	$filtro .=  "<div class='img-div enid-ping'>"; 
	            $filtro .=  create_icon_img($row , $class, $row[$id] );
	            $filtro .=  "</div>"; 	 


	        
	          $filtro .=  "<div class='$class img-div-text'  id='". $row[$id]."'>";          
	          $filtro .=  $row["razon_social"];                     
	          $filtro .=  "</div>";                     
	          $filtro .= "<span class='$class pull-right'  id='". $row[$id]."'  style='    background: #0B6777;color: white;padding: 3px;margin-top: 4px;'> Agregar</span> </li> ";
	      } 	     
	      $filtro .="</ul>
		      			";
	      $filtro .="</div><div style='font-size:.7em;' class='pull-right'>
			      			<a href='".base_url('index.php/puntosventa/administrar')."'>
			      				Cargar más puntos de venta
			      			</a>		
		      			</div>";

	    return $filtro; 
	    

	  }
	  */
  
/**/
/*
function load_puntos_venta_complete($data){


    $table = "";
    $table .= '<table class="table table-bordered">
    <tr class="text-center enid-header-table">';
    $table .= get_td("#" , "");  
    $table .= get_td("Punto de venta" , "");   
    $table .= get_td("Descripción" , "");
    $table .= get_td("Fecha registro" , "");
    
    $table .= '</tr>';            
    $flag =  1;
    foreach ($data as $row) {

        $table .=  "<tr>"; 
        $table .= get_td($flag , "");
        $table .= get_td($row["razon_social"], "");
        $table .= get_td($row["descripcion"], "");
        $table .= get_td($row["fecha_registro"], "");
        
        
        $table .=  "</tr>"; 
        $flag ++; 
    }
    return $table; 
}
*/

	/*
	function get_resumen_puntos_venta_asociados($data){
	
		$table ="<div>
		<table class='table table-bordered'>";

		$table.="<tr class='header-table-info text-center'>";
			$table .=get_td("Puntosde venta asociados" ,"");
			$table .=get_td("Contactos Asociados" ,"");
			$table .=get_td( "Teléfonos de contactato" ,"");
			$table .=get_td( "Ubicaciones"  ,"");
			$table .=get_td( "Sitio web"  ,"");
					
		$table.="</tr>";

  
		foreach ($data as $row) {
				$table.="<tr class='text-center'>";						
					$table .=get_td( $row["asociados"] ,"");
					$table .=get_td( $row["contactos_asociados"] ,"");
					$table .=get_td( ($row["con_tel"] + $row["con_tel_movil"]),"");
					$table .=get_td( $row["con_locacion"] ,"");
					$table .=get_td($row["con_web"],"");
						
				$table.="</tr>";		

			$table.="<tr class='text-center'>						
					<td style='border-color:white;'> </td>";
					$table .=get_td( porcentaje_puntos_venta($row["contactos_asociados"]  , $row["contactos_asociados"])  , ""  );
					$table .=get_td(  porcentaje_puntos_venta($row["contactos_asociados"]  , ($row["con_tel"] + $row["con_tel_movil"]) ) , "" );
					$table .=get_td( porcentaje_puntos_venta($row["contactos_asociados"]  ,  $row["con_locacion"] )  , "");
					$table .=get_td( porcentaje_puntos_venta($row["contactos_asociados"]  ,  $row["con_web"])  , "");

			$table.="</tr>";		
		}		
		$table .="</table></div>";			
		return $table;
	}
	*/
	/**/	
	/*
	function resumen_puntos_venta_f($data){

		$table ="<table class='table table-bordered'>";

		$table.="<tr class='header-table-info text-center'>";
					$table .=get_td("Ventas", "");
					$table .=get_td("Ventas de una sóla exhibición", "");
					$table .=get_td("Preveentas", "");
					$table .=get_td("Promociones", "");
		$table .="</tr>";
		foreach ($data as $row){
				
			$total = ($row["ventas_unicas"] +  $row["preveentas"] + $row["promociones"]);	
			$table .="<tr class='text-center' style='font-size:.8em;'>";
						$table .= get_td($total , "");
						$table .= get_td($row["ventas_unicas"] , "");
						$table .= get_td($row["preveentas"] , "");
						$table .= get_td($row["promociones"] , "");
			$table .="</tr>";	


			$table .="<tr class='text-center' style='font-size:.8em;'>";
						$table .= get_td(  porcentaje_puntos_venta($total , $total )   , "" );
						$table .= get_td( porcentaje_puntos_venta($total ,  $row["ventas_unicas"]) , "" );
						$table .= get_td( porcentaje_puntos_venta($total , $row["preveentas"]) , "" );
						$table .= get_td( porcentaje_puntos_venta($total , $row["promociones"]) , "" );
			$table .="</tr>";	
			 					
		}

		$table .="</table>";	
		return $table;
	}

	
	function porcentaje_puntos_venta($total , $val ){

		
		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $total )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}
		return $result;

	}
	*/
	/*regresa data list con los nombres de los puntos de venta*/
	/*
	function lista_nombres_punto_venta($data){

		$data_list ="<datalist id='razon_social'>";		
		foreach ($data as $row) {

			$razon_social = $row["razon_social"];
			$data_list .="<option value='". $razon_social ."' >";
		}	
		$data_list .="</datalist>";
		return $data_list;
	}
	*/
	/*regresa los puntos de venta asociados al evento*/
	/*
	function list_puntos_venta_evento($data){

		$table ="<table class='table table-bordered' >";		
		$table .="<form action ='". base_url('index.php/api/puntosventa/punto_venta_evento_all/format/json') ."' id='form-punto-in-evento' ><tr  class='enid-header-table text-center'>";		
		$table .= get_td("#" , "" ); 
				  $table .= get_td("Punto de venta" , "" );				 
				  $table .= get_td("Logo" , "" );
				  $table .= get_td("Medios de contacto" , "" );  
				  $table .= get_td("<i class='fa fa-times '></i>" , "" );		
		$table .="</tr>";		
		
		$ingresos =0;
		$flag =0;
		$b=1;

		foreach ($data as $row) {

			
			$razon_social = $row["razon_social"];
			$descripcion = $row["descripcion"];
			$punto_venta  = $row["idpunto_venta"];

			
			$status = $row["status"];
			$idpunto_venta =  $row["idpunto_venta"];			
			$table.="<tr class='text-center'>";			
				$table .= get_td( $b , "");
				$table .= get_td( $razon_social  , "class='franja-vertical' ");

				$table .= get_td( "<img src='".create_path_img($data)."'>"  , "");
				$table .= get_td( "<i data-toggle='modal' data-target='#contactos-relacionados-punto-venta' class='puntos_venta_contacto fa fa-book' id='". $idpunto_venta ."'></i>", "");
				$table .= get_td( "<i data-toggle='modal' data-target='#delete-punto-venta-modal' class='fa fa-times delete_punto_venta_evento' id='".$punto_venta."'></i>", "");					
			$table.="</tr>";		
			$flag ++;
			$b++;
		}
		
		$table .="<tr>";		
		$table .=get_td("#","");
		$table .=get_td("Punto de venta" , "");
				  
		$table .=get_td("Logo", "");
		$table .=get_td("Medios de contacto" , "");
		$table .=get_td("Asociado al evento", "");
		$table .="</tr>";		
		$table .="</table>
		<em class='info-table'> Puntos de venta dónde el público podrá adquirir sus accesos ".$flag.",  asociados al evento ".$ingresos .".</em>";		

		return $table;
	}
	*/
	/*regresal la lista de contactos activa en el punto de venta */
	/*
	function list_contactos_punto_venta($data){

	
		$list ="<div class='scroll-enid' >
				<table class='table table-bordered' >        
		        <tr class='enid-header-table' >";

		$list .=  get_td("IMG" , "");        
		$list .=  get_td("Contacto" , "");        
		$list .=  get_td("Organización" , "");        
		$list .=  get_td("Tel" , "");        
		$list .=  get_td("Móvil" , "");        
		$list .=  get_td("Página web" , "");        
		$list .=  get_td("Facebook" , "");        
		$list .=  get_td("Twitter" , "");        
		$list .=  get_td("" , "");        
		$list .= "</tr>";
		
		$flag=0;
		$contacos_asociados =0;

		foreach ($data as $row) {		
			
			$nombre  = $row["nombre"];
			$organizacion  =  $row["organizacion"];			
			$tel =  $row["tel"];
			$movil  = $row["movil"];
			$pagina_web = $row["pagina_web"];
			$pagina_fb = $row["pagina_fb"];
			$pagina_tw = $row["pagina_tw"];


			$puntoventacontacto =  $row["puntoventacontacto"];
			$input ="";
			$id_contacto  =  $row["idcontacto"];
			if ($puntoventacontacto != null ){
				
				$input ="<input type='checkbox' id='". $id_contacto ."' class='contacto-punto-venta' checked>";
				$contacos_asociados ++;
			}else{
				$input ="<input type='checkbox' id='".$id_contacto."' class='contacto-punto-venta'>";
				
			}




			$list.="<tr class='text-center media usr-info' >";
					if ($row["nombre_imagen"] != null ){

						$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);

						$list.="<td class='prog-avatar'> 					
		                        	<img  class='thumb'  src='".$img ."'>						
								</td>";				
					}else{
						$list.="<td class='prog-avatar'> 
									<i class='fa fa-picture-o fa-2x'   ></i>
								</td>";

					}


			$list.= get_td( $nombre , "");
			$list.= get_td( $organizacion  , "");
			$list.= get_td( $tel , "");
			$list.= get_td($movil , "");
			$pagina_web =  "<a href='". $pagina_web  ."'>www</a>";
			$list.= get_td($pagina_web , "");
			

			
			$pagina_fb =  "<a href='". $pagina_fb  ."'>Facebook</a>";
			$list.= get_td($pagina_fb , "");
			

			$pagina_tw =  "<a href='". $pagina_tw  ."'>Twitter</a>";
			$list.= get_td($pagina_tw , "");
			

			$list.= get_td( $input , "");
			$list.="</tr>";
			$flag++;				
		}

		$list .="</table></div>
		
		<div class='row'>
			<span class='col-lg-3 pull-left'><a href='". base_url('index.php/directorio/contactos') ."'><button class='btn btn-default next-to'>+ir  a la sección de contactos</button></a></span>
		</div>";
		return $list;
	}
	*/

	/*return puntos de venta empresa */	
	/*
	function list_puntos_venta_administracion_empresa($data , $limit ){
		$complete ="";
		$list=  "";
		$class_enid = ''; 
		if (count($data) > 5) {
			$class_enid = 'scroll-enid'; 
		}
		$list .= "<div class='".$class_enid."'>";
		$list .="<table class='table table-bordered' >        
		        <tr class='enid-header-table' > "; 
		        	$list .= get_td("#", "" );	
		        	$list.= get_td("Configurar", "" );                     
		        	$list .= get_td("IMG", "" );	         
		            $list.= get_td("Punto  venta", "" );		            		            
		            $list.= get_td("Estado", "" );	
		            $list .=get_td("Zona", "");            	            
		            $list.= get_td("Nota para el público", "" );
		            $list.= get_td("Usuario Registrante", "" );		            
		            $list.= get_td("Fecha registro", "" );
		            
		            $list.= get_td("Contactos Asociados", "" );

		            
		            $list.= get_td("Eliminar", "" );            
		$list .="</tr>";			

        $num_puntos_venta =0;
        $b =1;
		foreach ($data as $row) {
			
			$idpunto_venta = $row["idpunto_venta"];
			$razon_social  =  $row["razon_social"];			
			$status        = $row["estado_punto_venta"];						
			$zona =  $row["zona"];
			$fecha_registro =  $row["fecha_reg"];
			$idempresa     = $row["idempresa"];
			$descripcion  =  $row["descripcion"];
			$nombre =  $row["nombre"];
			$estado_usuario  =  $row["estado_usuario"];


			$list.="<tr>";
					$list .= get_td( $b , "" );					
					$list .=  get_td("<i  data-toggle='modal' data-target='#editd-punto-venta-modal'    class='editar-punto-venta fa fa-cog'  id='". $idpunto_venta  ."'  ></i>" ,"title='Editar contacto'" );
					

					$img =  create_icon_img($row , " img_punto_venta " , $idpunto_venta , " data-toggle='modal' data-target='#punto-venta-imagen-modal' " ); 
					$list.=get_td($img , "" ); 
					

					$list.=get_td($razon_social, "class='franja-vertical' ");
					
					$list.= get_td($status  , "" );					
					$list.= get_td($zona  , "" );					
					$fa_nota =  "<i class='nota-punto-venta fa fa-list-alt' id='".$idpunto_venta."'   data-toggle='modal' data-target='#punto-venta-descripcion-modal' ></i>"; 

					$list.= get_td($fa_nota  , "" );
					$list.= get_td($nombre  , "" );
					$list.= get_td($fecha_registro, "" );

					$list .=  get_td("<i class='contactos  fa fa-book ' id='". $idpunto_venta  ."' data-toggle='modal' data-target='#contactos-modal' ></i>" , "title='Contactos del directorio que han sido asociados al punto de venta' ");		
					
					$list.= get_td("<i class='delete-punto-venta fa fa-times'  id='". $idpunto_venta  ."'   data-toggle='modal' data-target='#delete-punto-venta-modal'  ></i>" , "");
					$list.="</tr>";			
					$num_puntos_venta ++;
					$b++;
		}	


		$list .="</table>
		</div>";	
		$complete .= "
					".n_row_12()."
					" . limits_tables("index.php/puntosventa/administrar" , $limit ) ."
					".end_row()."

		<em class='total_table'>Mostrando:". $num_puntos_venta ."</em>

		<div class='pull-right mas-info' style='font-size: .7em;padding: 5px; margin-left:1px;' >
            <i class='fa fa-chevron-down'>
            </i>  + info
        </div>                                        
        <div class='pull-right menos-info' style='font-size: .7em;padding: 5px; margin-left:1px; display:none;' >
            <i class='fa fa-chevron-up'>
            </i>  - info
        </div>
		";
		$complete .= $list;
		return $complete;	
	}
	*/
	/**/
	/*
	function resumen_puntos_venta($data ){
		
		 
		$table='<table class="table table-bordered">										  					  
					  	<tr class="header-table-info" >';

		$table .=get_td("Puntos de venta", 'class="text-center"' );			  	
		$table .=get_td("Asociados a contactos", 'class="text-center"' );			  	
		$table .=get_td("No disponibles", 'class="text-center"' );			  	
		$table .=get_td("Disponibles para todos los colaboradores", 'class="text-center"' );			  	
		$table .=get_td("Con notas para el cliente", 'class="text-center"' );			  	
		$table .=get_td("Con ṕagina web", 'class="text-center"' );			  	
		$table .=get_td("Con tel de contacto", 'class="text-center"' );			  	
		$table .=get_td("Con Correo electónico", 'class="text-center"' );			  	
					  						  	
					  	
		$table .='</tr>';


		
		
		foreach ($data as $row) {

			$table .="<tr class='text-center'>";										
			$table .=get_td($row["puntosventatotal"]  , "");
			$table .=get_td($row["asociados"] ,  "");
			$table .=get_td($row["temporal_no_disponible"] , "" );
			$table .=get_td($row["para_colaboradores"] , "");
			$table .=get_td($row["con_descripcion"] , "");
			$table .=get_td($row["con_paginaweb"] , "" );
			$table .=get_td($row["con_tel"] , "" );
			$table .=get_td($row["con_mail"] , "" );
			$table .="</tr>";		

			$table .="<tr class='text-center'>";
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["puntosventatotal"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["asociados"]  ) ,"");								
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["temporal_no_disponible"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["para_colaboradores"] ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_descripcion"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_paginaweb"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_tel"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_mail"]  ) ,"");																										
			$table .= "</tr>";		
					 		 
		}			  


		$table .="</table>";
		return  $table;
	}	
	*/
	/**/
	
	function list_estados_puntos_venta($data){

		$options ="";
		foreach ($data as $row){

			$options .="<option value='". $row["estado_punto_venta"] ."'>". $row["estado_punto_venta"] ."</option>";		
		}
		return $options;
	}
	/**/
	function lista_zonas_punto_venta($flag_todo=1){		
		
		$data = array( "Norte" , "Sur" , "Este" , "Oeste","Noroeste" , "Suroeste" , "Norponiente" ,  "Surponiente" , "A lo largo de la ciudad");
		$options = "";
		if ($flag_todo == 1) {
			$options .= "<option value='-'>TODOS</option>";	
		}
		
		$a=0;
		while ( $a <count($data)) {								
				$options .=  "<option value='".$data[$a]."' >".$data[$a]."</option>";									
			$a++;
		}
		return $options;
		
	}
	/**/
	function get_porcentaje_punto_venta($puntos_venta , $val ){

		
		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $puntos_venta )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}else{
			$result =  $result."%";
		}
		return $result;

	}
	/**/
	/*
	function list_puntos_venta_cliente($puntos_venta ,  $id_evento){
		$b =  0;   
		$pv = ''; 	
		$section_img = ''; 
		$section_description = ''; 
		foreach ($puntos_venta as $row) {	

			$idpunto_venta =  $row["idpunto_venta"];
			$razon_social  = $row["razon_social"];
			$descripcion  = $row["descripcion"];						
			$nombre_imagen= $row["nombre_imagen"];		
			$place = '#'.$b."_img"; 
			$place_text = $b."_img"; 

			$img =  create_icon_img($row , ' mg-circle  ', ' '); 
			$section_img .= '<li role="presentation">
					            <a href="'.$place .'" aria-controls="dustin" role="tab" data-toggle="tab">
					                '. $img .'
					                <span class="quote">
						                <i class="fa fa-quote-left">
						                </i>
					                </span>
					            </a>
					        </li>
					        ';
					                    
			$section_description .= '					        
	        <div role="tabpanel" class="tab-pane fade in active" id="'.$place_text .'">
                <div class="tab-inner">                    
                    <span class="text-center">
                    '.$descripcion .'
                    </span>                            
                </div>
            </div> ';
					
			$b++; 
		}

		$pv .=  '<div class="[ col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 ]" role="tabpanel">';		
				$pv .= '<div class="[ col-xs-4 col-sm-12 ]">';
					$pv .= '<ul class="[ nav nav-justified ]" id="nav-tabs" role="tablist">';
					
					$pv .= $section_img;
					$pv .= '</ul>';					
				$pv .= '</div>';


				$pv .= '<div class="[ col-xs-8 col-sm-12 ]">';
					$pv .= '<div class="tab-content" id="tabs-collapse">';	
					$pv .= $section_description;
					$pv .= '</div>'; 
				$pv .= '</div>';
		$pv .=  '</div>';


		return $pv;
	}
	*/



	
}/*Termina el helper*/