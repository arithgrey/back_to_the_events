/**/
function load_data_servicios(){
	
	url =  "../servicios/index.php/api/serviciosevento/load/format/json/";
	evento = $(".eventoservicios").val();
	$.ajax({
		url : url , 
		data : { evento : evento ,  "enid_evento" : enid_evento } , 
		type : "GET", 
		beforeSend : function(){						
			show_load_enid(".place_servicios_incluidos" , "Cargando ..." , 1); 				
		}
	}).done(function(data){

		$(".servicios_in_evento").empty();
		$(".place_servicios_incluidos").empty();				
		llenaelementoHTML(".servicios_in_evento" , data);		
		$("#form_servicios_b").submit(busqueda_servicios);
		$(".servicio_registrado_evento").hover(hover_tags);						
		$(".servicios_delete").click(eliminar_servicio_evento);

		
	}).fail(function(){	
		show_error_enid(".place_servicios_incluidos" , "Falla al  cargar los servicios disponibles en el evento, notifique al administrador" ); 		
	});

}
/**/
function serviciocheck(e){

	idservicio  = e.target.id;		 
	evento = $("#evento").val();
	url = "../servicios/index.php/api/serviciosevento/update/format/json/";
	
	$.ajax({
	 	url : url , 
	 	type :  "POST",
	 	data :  { evento : evento , idservicio : idservicio ,  "enid_evento" : enid_evento } , 
	 	beforeSend: function(){
	 		show_load_enid(".place_servicios_incluidos" , "Actualizando ... " , 1); 				
	 	}
	}).done(function(data){
		show_response_ok_enid( ".place_servicios_incluidos", "Lista de artículos actualizada"); 
		load_data_servicios();
		$("#form_servicios_b").submit();

	}).fail(function(){
		show_error_enid(".place_servicios_incluidos" , "Falla al  cargar los servicios disponibles en el evento, notifique al administrador" ); 
	});	
}	
/**/
function busqueda_servicios(e){	

	url  =  $("#form_servicios_b").attr("action");	
	$.ajax({
		url : url , 
		data :  $("#form_servicios_b").serialize(), 
		type :  "GET" , 
		beforeSend:function(){						
			show_load_enid(".servicios_encontrados" , "Cargando ... " , 1); 				
		}
	}).done(function(data){		

		llenaelementoHTML(".servicios_encontrados" , data );
		$(".serviciocheck").click(serviciocheck);				
		$(".nota_servicio").click(carga_servicio_info);


	}).fail(function(){			
		show_error_enid(".servicios_encontrados" , "Falla al buscar servicios encontrados, notifique al administrador" ); 		
	});	
	e.preventDefault();
}
/**/
function hover_tags(e){	
	num =  e.target.id; 
	serviciocheck_ =  ".serviciocheck_" + num; 
	$(serviciocheck_).show();
}
/**/
function eliminar_servicio_evento(e){

	idservicio  = e.target.id;		 
	evento = $("#evento").val();
	url = "../servicios/index.php/api/serviciosevento/update/format/json/";	
	$.ajax({
	 	url : url , 
	 	type :  "POST",
	 	data :  { evento : evento , idservicio : idservicio ,  "enid_evento" : enid_evento } , 
	 	beforeSend: function(){
	 		show_load_enid(".place_servicios_incluidos" , "Actualizando ... " , 1); 				
	 	}
	}).done(function(data){
		show_response_ok_enid( ".place_servicios_incluidos", "Lista de artículos actualizada"); 
		load_data_servicios();
	}).fail(function(){
		show_error_enid(".place_servicios_incluidos" , "Falla al  cargar los servicios disponibles en el evento, notifique al administrador" ); 
	});	
}
/**/
function carga_servicio_info(e){

	id_servicio = e.target.id;  
	set_servicio(id_servicio);
	nombre_servicio =  $(this).attr("nombre_servicio");		
	set_nombre_servicio(nombre_servicio);

	info_extra =  $(this).attr("info_extra");		
	set_nota_servicio(info_extra);
}
/**/

function registra_nota_servicio(e){

	
	url =  $("#form_nota_servicio").attr("action");
	data_send =  $("#form_nota_servicio").serialize()+"&"+ $.param({"evento" : get_evento() ,  "servicio" : get_servicio() });

	$.ajax({
		url: url , 
		type : "PUT",
		data:  data_send , 
		beforeSend: function(){
			show_load_enid(".place_nota_servicio" , "Actualizando ... " , 1); 				
		}
	}).done(function(data){
		show_response_ok_enid(".place_nota_servicio" , "Nota cargada al servicio");
		$("#modal_descripcion_servicio").modal("hide");

	}).fail(function(){
		show_error_enid(".place_nota_servicio" , "Falla al cargar la nota del servicio" ); 
	});

	e.preventDefault();
}
/**/
function get_servicio(){
	return servicio; 
}
/**/
function set_servicio(n_servicio){
	servicio =  n_servicio;
	
}
/**/
function set_nombre_servicio(n_servicio){
	nombre_servicio =  n_servicio;	
	llenaelementoHTML(".nombre_servicio" , nombre_servicio);
}
/**/
function get_nombre_servicio(){
	return  nombre_servicio;
}
/**/
function set_nota_servicio(n_nota){
	nota_servicio  = n_nota;
	valorHTML(".nota_servicio_evento" , nota_servicio);

}
/**/
function get_nota_servicio(){
	return nota_servicio;
}
/**/

