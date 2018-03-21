var id_evento =  0;
var id_empresa =  0;
var nota_servicio = "";
var nombre_servicio =  "";
$(document).on("ready" , function(){
	/**/
	$("footer").ready(function(){
		set_id_evento($(".id_evento").attr("info_evento"));
		set_id_empresa($(".id_empresa").attr("info_empresa"));
	});
	$("footer").ready(carga_galeria_evento);
	$("footer").ready(carga_resument_artistas);
	$("footer").ready(carga_resument_accesos);
	$("footer").ready(carga_tematica_evento);

	$(".menu_artistas").click(carga_artistas_escenarios_evento);	
	$(".menu_promociones").click(carga_promociones_evento);
	$("footer").ready(carga_nombre_empresa);
	$(".menu_dia_evento").click(carga_servicios_evento);

		/**/
	$(".politicas_evento").click(function(){
		carga_info_extra(4);
	});
		/**/
	$(".restricciones_evento").click(function(){
		carga_info_extra(3);
	});
		/**/

	$(".objs_evento").click(carga_obj_permitidos);




});
/**/
function carga_resument_artistas(){

	url =  "../q/index.php/api/escenarios_artistas/resumen_evento/format/json/"; 
	$.ajax({
		url : url, 
		type: "GET", 
		data: {id_evento : get_id_evento()}, 
		beforeSend:function(){	
			show_load_enid(".place_resumen_artistas" , "Cargando ... " , 1); 						
		}
	}).done(function(data){
		llenaelementoHTML(".place_resumen_artistas" , data );
	}).fail(function(){
		show_error_enid(".place_resumen_artistas" , "Error cargar resumen de escenarios ");					
	});
}
/**/
function carga_resument_accesos(){
	url =  "../q/index.php/api/acceso/resumen_evento/format/json/"; 
	$.ajax({
		url : url, 
		type: "GET", 
		data: {id_evento : get_id_evento()}, 
		beforeSend:function(){	
			show_load_enid(".place_resumen_accesos" , "Cargando ... " , 1); 						
		}
	}).done(function(data){
		llenaelementoHTML(".place_resumen_accesos" , data );
	}).fail(function(){
		show_error_enid(".place_resumen_accesos" , "Error cargar resumen de accesos ");					
	});
}

/**/
function carga_artistas_escenarios_evento(){
	
	url =  "../q/index.php/api/escenarios_artistas/escenarios_artistas_evento/format/json/"; 
	$.ajax({
		url : url, 
		type: "GET", 
		data: {id_evento : get_id_evento()}, 
		beforeSend:function(){	
			show_load_enid(".place_artistas_evento" , "Cargando ... " , 1); 						
		}
	}).done(function(data){
		llenaelementoHTML(".place_artistas_evento" , data );
		$(".url_youtube").click(nuevo_enlace);
		$(".url_sound_cloud").click(nuevo_enlace);
		carga_generos_registrados();

		//
	}).fail(function(){
		show_error_enid(".place_artistas_evento" , "Error cargar resumen de escenarios ");					
	});

}
/**/
function carga_promociones_evento(){

	url =  "../accesos/index.php/api/accesos/list/format/json/"; 
	$.ajax({
		url : url, 
		type: "GET", 		
		data : { evento : get_id_evento() , in_session :  0 , "resumen_evento" : 0}, 
		beforeSend:function(){	
			show_load_enid(".place_accesos_evento" , "Cargando ... " , 1); 						
		}
	}).done(function(data){
		llenaelementoHTML(".place_accesos_evento" , data );		
		//
	}).fail(function(){
		show_error_enid(".place_accesos_evento" , "Error cargar resumen de accesos ");					
	});

}
/**/
function carga_galeria_evento(){
	
	url =  "../imgs/index.php/api/event/galeria_evento/format/json/"; 
	$.ajax({
		url : url, 
		type: "GET", 
		data: {id_evento : get_id_evento()}, 
		beforeSend:function(){				
		}
	}).done(function(data){		
		//console.log(data);		

		if ( $.trim(data).length > 3469 ) {

			llenaelementoHTML(".place_galeria" , data );				
		}else{
			llenaelementoHTML(".place_galeria" , "<img src='../img_tema/template_evento.jpg'>");
		}



	}).fail(function(){
		show_error_enid(".place_galeria" , "Error cargar galeria del evento");					
	});


}
/**/


/**/

/**/
function  carga_generos_registrados(){
	url = "../eventos/index.php/api/event/genero_evento/format/json/";		
	evento =  $("#evento").val();
	$.ajax({
		url :  url , 
		type : "GET" , 
		data : {"evento" : get_id_evento() ,  "enid_evento" : get_id_evento()} , 
		beforeSend: function(){
			//show_load_enid(".place_generos_musicales", "Cargando ... " , 1); 
		}
	}).done(function(data){

		llenaelementoHTML(".place_generos_musicales", data );						
	}).fail(function(){
		show_error_enid(".place_generos_musicales" , "Falla al cargar los generos musicales del evento, reporte al administrador " );
	});	
}


function carga_nombre_empresa(){

	url =  "../empresas/index.php/api/emp/nombre_empresa/format/json/"; 
	
	$.ajax({
		url : url, 
		type: "GET", 
		data: {id_empresa : get_id_empresa()}, 
		beforeSend:function(){				
		}
	}).done(function(data){		

		llenaelementoHTML(".place_nombre_empresa" , "<a href='../empresa/?q="+ get_id_empresa()+"  '><strong> By"+ data[0].nombreempresa +"</strong> </a>");

	}).fail(function(){
		show_error_enid(".place_nombre_empresa" , "Error cargar resumen de escenarios ");					
	});
}
/**/
function carga_tematica_evento(){
	
	url =  "../eventos/index.php/api/event/tema/format/json/"; 	
	$.ajax({
		url : url, 
		type: "GET", 
		data: {evento : get_id_evento() }, 
		beforeSend:function(){				
		}
	}).done(function(data){		
		if (data.length > 0 ){				
			btn =  "<button type='button' title='Temática - "+data[0].tematica_evento+" ' class='btn btn-default btn-lg btn-block btn_tematica'><small>"+data[0].tematica_evento+" </small></button>";
			llenaelementoHTML(".place_tematica_evento" , btn);
		}		
	}).fail(function(){
		show_error_enid(".place_tematica_evento" , "Error cargar tema del evento");					
	});

}

/**/
function get_id_evento(){
	return id_evento;
}
/**/
function set_id_evento(n_id_evento){
	id_evento = n_id_evento;
}

/**/
function get_id_empresa(){
	return id_empresa;
}
/**/
function set_id_empresa(n_id_empresa){
	id_empresa = n_id_empresa;
}
/**/