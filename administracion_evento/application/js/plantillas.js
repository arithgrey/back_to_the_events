function carga_template_disponible_experiencia(){


	url =  "../plantillas/index.php/api/templ/tmp_contenido/format/json";	
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"tipo" : 1 ,  "public" :  0 , "identificador" :   "contenido-text-templ" ,  "enid_evento" : enid_evento} , 
		beforeSend : function(){
			show_load_enid(".place_experiencias_tmp_seccion" , "Cargando ... " , 1); 		
		} 
	}).done(function(data){

		$(".place_experiencias_tmp_seccion").empty();
		llenaelementoHTML(".experiencias_tmp_seccion" , data);
		$(".contenido-text-templ").click(update_descripcion_evento_by_template);				

	}).fail(function(){
		show_error_enid(".place_experiencias_tmp_seccion"  , "Error al al registrar artista"); 				
	});

}
/**/
function carga_template_disponible_restricciones(){

	url =   "../plantillas/index.php/api/templ/tmp_contenido/format/json";	
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"tipo" : 3 ,  "public" :  0 , "identificador" :   "new_restricciones_templ" ,  "enid_evento" : enid_evento} , 
		beforeSend : function(){
			show_load_enid(".place_restricciones_tmp_seccion" , "Cargando ...  " , 1); 		
		} 
	}).done(function(data){

		$(".place_restricciones_tmp_seccion").empty();
		llenaelementoHTML(".restricciones_tmp_seccion" , data);
		
		$(".new_restricciones_templ").click(function(event){
		tipo_contenido =  "restriccion"; 
		record_contenido_evento_template(event);
		});
		$(".btn_incluir_restricciones").click(carga_todas_las_reglas);

	}).fail(function(){
		show_error_enid(".place_restricciones_tmp_seccion"  , "Error al al registrar artista"); 				
	});
}
/**/
function carga_template_disponible_politica(){
	url = "../plantillas/index.php/api/templ/tmp_contenido/format/json";	
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"tipo" : 4 ,  "public" :  0 ,  "identificador" :  "new_politica_template" ,  "enid_evento" : enid_evento} , 
		beforeSend : function(){
			show_load_enid(".place_politicas_tmp_seccion" , "Cargando ... " , 1); 		
		} 
	}).done(function(data){

		$(".place_politicas_tmp_seccion").empty();
		llenaelementoHTML(".politicas_tmp_seccion" , data);
		$(".new_politica_template").click(function(event){
			tipo_contenido =  "politica"; 
			record_contenido_evento_template(event);	
		} );
		/**/
		

	}).fail(function(){
		show_error_enid(".place_politicas_tmp_seccion"  , "Error al al registrar artista"); 				
	});
}
/**/

function delete_contenido_evento_temp(e){

	
	contenido = e.target.id;	
	url = "../plantillas/index.php/api/templ/templates_contenido_evento/format/json/";	
	eliminar_data(url , {"contenido": contenido , "evento" : evento }  );
	get_contenido_evento_temp(4,  "#list_politicas_evento");
	get_contenido_evento_temp(3 , "#list_restricciones_evento");	
}
function get_contenido_evento_temp(type,  place){
	
	evento = $("#evento").val();		
	url = "../plantillas/index.php/api/templ/templates_contenido_evento/format/json/";		
	data_send =  {"type": type , "evento" : get_evento() ,  "enid_evento" : enid_evento }
	$.ajax({
		url:  url , 
		type : "GET", 
		data :  data_send , 
		beforeSend:function(){
			show_load_enid(place , "Cargando ... " , 1); 	
		}
	}).done(function(data){
		
		llenaelementoHTML( place , data );		
		$(".delete_contenido_template").click(delete_contenido_evento_temp);
	}).fail(function(){
		show_error_enid(place , genericresponse[0] ); 		
	});
	
}

/*Carga de plantillas*/
function record_contenido_evento_template(e){		
	contenido = e.target.id;
	url = "../plantillas/index.php/api/templ/templates_contenido_evento/format/json/";		
	data_send =  {"contenido": contenido , "evento" : evento ,  "enid_evento" : enid_evento }; 
	$.ajax({
		url : url , 
		type : "PUT", 
		data : data_send, 	
		beforeSend: function(){				
			show_load_enid(".place_politicas_tmp" , "Cargando ... " , 1); 	
		}
	}).done(function(data){				

		if (tipo_contenido ==  "politica") {
			show_response_ok_enid( ".place_politicas_tmp", "Politica del evento actualizada con éxito "); 		
			get_contenido_evento_temp( 4,  "#list_politicas_evento");		
			$("#templa-politicas").modal("hide");
		}else{			
			show_response_ok_enid( ".place_restricciones_tmp", "Restricción del evento cargada con éxito"); 		
			get_contenido_evento_temp( 3 , "#list_restricciones_evento");
			$("#templa-restricciones").modal("hide");
		}					

	}).fail(function(){	

		if (tipo_contenido ==  "politica") {	
			show_error_enid(".place_politicas_tmp"  , "Error al cargar plantilla, reporte al administrador"); 		
		}else{
			show_error_enid(".place_restricciones_tmp"  , "Error al cargar plantilla, reporte al administrador"); 		
		}	
	});
	

}
/**/
/**/
function update_descripcion_evento_by_template(e){

	url =  "../plantillas/index.php/api/event/descripcion_template/format/json/";	
	template_content =  e.target.id;				
	data_send =  { "template_content" : template_content , "evento" : evento ,  "enid_evento" : enid_evento}; 
	$.ajax({
		url : url , 
		type : "PUT", 
		data : data_send, 	
		beforeSend: function(){							
			show_load_enid(".place_experiencia_evento" , "Cargando contenido ... " , 1); 
		}
	}).done(function(data){	

		show_response_ok_enid(".place_experiencia_evento", "Experiencia del evento actualizada con éxito "); 					
		load_data_evento(".descripcion-p" , "#descripcion-evento" , "descripcion_evento" , ".place_description" , "Lo que se vivirá en el evento" , "Lo que se vivirá en el evento");

		$("#templa-descripcion-contenido").modal("hide");

	}).fail(function(){	
		show_error_enid(".place_restricciones_tmp"  , "Error al cargar plantilla, reporte al administrador"); 				
	});
}
/**/
function  carga_todas_las_reglas(){
	
	url =  "../plantillas/index.php/api/templ/incluye_reglamento/format/json/";		
	data_send =  {id_evento :  get_evento()}; 
	$.ajax({
		url : url , 
		type : "PUT", 
		data : data_send, 	
		beforeSend: function(){							
			//show_load_enid(".place_experiencia_evento" , "Cargando contenido ... " , 1); 
		}
	}).done(function(data){	
		
		

		/*
		show_response_ok_enid(".place_experiencia_evento", "Experiencia del evento actualizada con éxito "); 					
		load_data_evento(".descripcion-p" , "#descripcion-evento" , "descripcion_evento" , ".place_description" , "Lo que se vivirá en el evento" , "Lo que se vivirá en el evento");

		$("#templa-descripcion-contenido").modal("hide");
		*/

	}).fail(function(){	
		//show_error_enid(".place_restricciones_tmp"  , "Error al cargar plantilla, reporte al administrador"); 				
	});
}
/**/
function incluir_objs_evento(){

	url =  "../plantillas/index.php/api/templ/incluye_objetos_evento/format/json/";		
	data_send =  {id_evento :  get_evento()}; 
	$.ajax({
		url : url , 
		type : "PUT", 
		data : data_send, 	
		beforeSend: function(){							
			show_load_enid(".place_obj_permitidos" , "Cargando contenido ... " , 1); 

		}
	}).done(function(data){	
		load_objetospermitidos_evento();
	}).fail(function(){	
		show_error_enid(".place_obj_permitidos"  , "Error al cargar todos los objetos"); 				
	});

}
/**/