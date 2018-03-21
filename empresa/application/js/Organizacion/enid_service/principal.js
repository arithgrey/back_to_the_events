var incidencia = 0;
$(document).ready(function(){

	$("footer").ready(comparativa_dia);
	$("footer").ready(lista_prospectos);
	$("#seccion-usabilidad").click(carga_uso_sistema);
	$("#nuevos_miembros").click(carga_nuevos_miembros);
	$("#seccion_bugs").click(carga_bugs_enid);
	$("#form-calificacion-incidencia").submit(modifica_inicidencia);
	$("#estado_incidencia").change(carga_bugs_enid);
});
/**/
function set_inicidencia(new_inicidencia){	
	incidencia =  new_inicidencia;

}
/**/
function get_inicidencia(){
	return incidencia;

}
/**/
function carga_uso_sistema(){
	url =  now + "index.php/api/enid/usabilidad_landing_pages/format/json/";
	$.ajax({
		url : url , 
		type : "GET" ,
		data: {} , 
		beforeSend: function(){
			show_load_enid( ".place_usabilidad" , "Cargando ..." , 1 );
		}
	}).done(function(data){

		//console.log(data);

		llenaelementoHTML(".place_usabilidad" , data);
		$(".sitios_dia").click(carga_info_sitios_dia);
		$(".dispositivos_dis").click(carga_info_dispositivos_dia);

	}).fail(function(){

		show_error_enid(".place_usabilidad" , "Error en la usabilidad"); 

	});
}
/**/
function lista_prospectos(){

	url =  now +  "index.php/api/enid/prospectos/format/json/"; 
	$.ajax({
		url :  url , 
		type:  "GET", 
		beforeSend: function(){
			show_load_enid( ".place_prospectos" , "Cargando ..." , 1 );
		}
	}).done(function(data){
		$(".place_prospectos").empty();
		llenaelementoHTML(".prospectos" , data);
		$(".miembros_empresa").click(carga_miembros_empresa);
	}).fail(function(){
		show_error_enid(".place_prospectos" , "Error en la carga de prospectos, reporta al administrador"); 
	});
}
/**/
function comparativa_dia(){


	url = now + "index.php/api/enid/prospectos_comparativa_d/format/json/";
	$.ajax({
		url :  url , 
		type : "GET",
		beforeSend: function(){
			show_load_enid(".place_prospectos_comparativa" , "Cargando comparativa ..." , 1);
		}
	}).done(function(data){
		/**/	
		llenaelementoHTML(".place_prospectos_comparativa" , data);		
		$(".info-dia-p").click(data_miembros_g);
		$(".info-d").click(data_eventos_g);
		console.log(data);
	}).fail(function(){
		show_error_enid(".place_prospectos_comparativa" , "Error al cargar la comparativa"); 
	});

}
/**/
function carga_miembros_empresa(e){

		$(".place_miembros").empty();
		empresa = e.target.id;
		url =  now + "index.php/api/enid/miembros_cuenta/format/json/";
		$.ajax({

			url : url ,
			type :  "GET", 
			data:  {"id_empresa" :  empresa}, 
			beforeSend: function(){
				show_load_enid(".place_miembros" , "Cargando ..." , 1);
			}
		}).done(function(data){
			llenaelementoHTML(".place_miembros" , data);

		}).fail(function(){
			show_error_enid(".place_miembros" , "Error al cargar miembros de la empresa, CORREGIR."); 
			console.log("Error al cargar");
		});

}
/**/
function data_miembros_g(e){

	periodo =  e.target.id;	
	url =  now +  "index.php/api/enid/resumen_global_admin_p/format/json/";  
	$.ajax({
		url :  url , 
		data : {periodo :  periodo} , 
		beforeSend: function(){
			show_load_enid(".info-resumen-prospecto" , "Cargando ... " , 1 );
		}
	}).done(function(data){
		llenaelementoHTML(".info-resumen-prospecto" , data );
	}).fail(function(){
		show_error_enid(".info-resumen-prospecto", "Error al cargar ...");
	});	
}
/**/
function data_eventos_g(e){
	periodo =  e.target.id;	
	url =  now +  "index.php/api/enid/resumen_global_admin_e/format/json/";  
	$.ajax({
		url :  url , 
		data : {periodo :  periodo} , 
		beforeSend: function(){
			show_load_enid(".info-resumen-prospecto" , "Cargando ... " , 1 );
		}
	}).done(function(data){
		llenaelementoHTML(".info-resumen-prospecto" , data );
	}).fail(function(){
		show_error_enid(".info-resumen-prospecto", "Error al cargar ...");
	});	


}
/**/
function carga_info_sitios_dia(){
	$(".place_visitas").empty();
	url = now +  "index.php/api/enid/sitios_dia/format/json/";  ;
	$.ajax({
		url : url , 
		type: "GET", 
		beforeSend: function(){
			show_load_enid(".place_visitas" , "Cargando"  , 1 );
		}
	}).done(function(data){
		llenaelementoHTML(".place_visitas" , data );
	}).fail(function(){
		show_error_enid(".place_visitas", "Error al cargar las visitas ...");
	});	

}
function carga_info_dispositivos_dia(){
	$(".place_visitas").empty();
	url = now +  "index.php/api/enid/dispositivos_dia/format/json/";  ;
	$.ajax({
		url : url , 
		type: "GET", 
		beforeSend: function(){
			show_load_enid(".place_visitas" , "Cargando"  , 1 );
		}
	}).done(function(data){
		llenaelementoHTML(".place_visitas" , data );
	}).fail(function(){
		show_error_enid(".place_visitas", "Error al cargar las visitas ...");
	});	

}
/**/
function carga_nuevos_miembros(){
	
	url =  now  + "index.php/api/enid/nuevos_miembros/format/json/";
	$.ajax({
		url :  url , 
		type: "GET",
		data: {},
		beforeSend: function(){
			show_load_enid(".nuevos_miembros" , "Cargando"  , 1 );
		}
	}).done(function(data){

		llenaelementoHTML(".nuevos_miembros" , data);
	}).fail(function(){

		show_error_enid(".nuevos_miembros", "Error al cargar los nuevos miembros");
	});


}
/**/
function carga_bugs_enid(){
	
	url =  now  + "index.php/api/enid/bugs/format/json/";
	
	

	$.ajax({
		url :  url , 
		type: "GET",
		data: {estado_incidencia : $("#estado_incidencia").val()},
		beforeSend: function(){
			show_load_enid(".bugs_enid_service" , "Cargando"  , 1 );
		}
	}).done(function(data){

		llenaelementoHTML(".bugs_enid_service" , data);		
		$(".evaluar_incidencia").click(evaluar);
	}).fail(function(){

		show_error_enid(".bugs_enid_service", "Error al cargar los nuevos miembros");
	});

}

/**/
function evaluar(e){

	incidencia = e.target.id;
	set_inicidencia(incidencia);
}
/**/
function modifica_inicidencia(e){
	
	data_send = $("#form-calificacion-incidencia").serialize()+ "&"+$.param({"id_incidencia" : get_inicidencia()}); 	
	url =  $("#form-calificacion-incidencia").attr("action");	
	$.ajax({
		url : url , 
		type : "PUT", 
		data :  data_send , 
		beforeSend: function(){

			show_load_enid(".place_info_calificacion_incidencia" , ""  , 1 );
		}  
	}).done(function(data){
			
			show_response_ok_enid( ".place_info_calificacion_incidencia", "Status  actualizado!"); 
			$("#evalua_bug").modal("hide");
			carga_bugs_enid();
	}).fail(function(){
		show_error_enid(".place_info_calificacion_incidencia", "Error al actualizar incidencia");
	});	
	
	e.preventDefault();
}
/**/