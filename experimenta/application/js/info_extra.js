function carga_info_extra(tipo){

	url =  "../plantillas/index.php/api/templ/templates_contenido_evento_publico/format/json/";

	$.ajax({
		url : url ,
		data: {type: tipo  ,  evento : get_id_evento()}, 
		type : "GET", 
		beforeSend: function(){
			
			show_load_enid(".place_info_extra" , "Cargando ... " , 1); 						
		}

	}).done(function(data){
		llenaelementoHTML(".place_info_extra" , data );

	}).fail(function(){
		show_error_enid(".place_info_extra" , "Error al cargar la información de la políticas  ");					
		console.log("Error al cargar la información de la políticas ");
	});
}
/**/
function carga_obj_permitidos(){
	
	url =  "../eventos/index.php/api/event/objetos_permitidos/format/json/";
	$.ajax({
		url : url ,
		data: {evento : get_id_evento()}, 
		type : "GET", 
		beforeSend: function(){
			
			show_load_enid(".place_info_obj_permitidos" , "Cargando ... " , 1); 						
		}

	}).done(function(data){
		console.log(data);
		llenaelementoHTML(".place_info_obj_permitidos" , data );

	}).fail(function(){
		show_error_enid(".place_info_obj_permitidos" , "  ");					
		console.log("Error al cargar la información de los objetos");
	});	
}