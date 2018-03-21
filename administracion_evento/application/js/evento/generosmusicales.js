function update_genero_evento(e){	
	url =  "../eventos/index.php/api/generosmusicales/update_genero_evento/format/json";
	evento =  $("#evento").val();
	genero = e.target.id;	
	
	$.ajax({
		url :  url , 
		type : "PUT" , 
		data : { evento : evento , genero : genero  ,  "enid_evento" : enid_evento } , 
		beforeSend: function(){
			show_load_enid(".place_generos_musicales", "Actualizando ... " , 1); 
		}
	}).done(function(data){
		carga_generos_registrados();
		show_response_ok_enid( ".place_generos_musicales", "Lista actualizada con éxito .!"); 
	}).fail(function(){
		show_error_enid(".place_generos_musicales" , "Falla actualizar, reporte al administrador " );
	});	
}
/*Cargamos los generos del evento */
function  carga_generos_registrados(){
	url = "../eventos/index.php/api/event/genero_evento/format/json/";		
	evento =  $("#evento").val();
	$.ajax({
		url :  url , 
		type : "GET" , 
		data : {"evento" : evento ,  "enid_evento" : enid_evento} , 
		beforeSend: function(){
			show_load_enid(".place_generos_musicales", "Cargando ... " , 1); 
		}
	}).done(function(data){

		$(".place_generos_musicales").empty();
		llenaelementoHTML(".generos-registrados-evento", data );				
		$(".genero_registrado").hover(muestra_delete);
		$(".delete_genero_evento").click(elimina_genero);
	}).fail(function(){
		show_error_enid(".place_generos_musicales" , "Falla al cargar los generos musicales del evento, reporte al administrador " );
	});	
}
/**/
function muestra_delete(e){	
	genero = e.target.id; 	
	delete_genero_ =  ".delete_genero_" + genero; 	
	$(delete_genero_).show();	
}
/**/
function elimina_genero(e){	
	
	genero =  e.target.id; 
	evento =  $("#evento").val();
	url =  "../eventos/index.php/api/event/genero/format/json/"; 
	$.ajax({
		url : url , 
		type: "DELETE",
		data :   {"genero" :  genero , "evento" :  evento,  "enid_evento" : enid_evento }, 
		beforeSend : function(){
			show_load_enid(".place_generos_musicales", "Actualizando ... " , 1); 	
		}
	}).done(function(data){		
		show_response_ok_enid( ".place_generos_musicales", "Lista actualizada con éxito .!"); 
		carga_generos_registrados();
	}).fail(function(){
		show_error_enid(".place_generos_musicales" , "Falla al eliminar genero musical del evento, reporte al administrador " );
	});
}

/*Búsqeda de generos musicales */
function busqueda_geros_musicales(e){
	genero_filtro = e;	
	url = "../eventos/index.php/api/event/genero/format/json/";
	evento =  $("#evento").val();
	
	
	$.ajax({
		url :  url , 
		type : "GET" , 
		data : {"filtro": genero_filtro , "evento" : evento,  "enid_evento" : enid_evento } , 
		beforeSend: function(){
			show_load_enid(".place_generos_musicales_busqueda", "Buscando genero musical  " , 1); 
		}
	}).done(function(data){
	
		$(".place_generos_musicales_busqueda").empty();
		llenaelementoHTML(".seccion_generos_musicales_busqueda", data);
		$(".genero_musical_input").click(update_genero_evento);

	}).fail(function(){
		show_error_enid(".place_generos_musicales_busqueda" , "Falla en la busqueda de generos musicales, reporte al administrador " );
	});	
}