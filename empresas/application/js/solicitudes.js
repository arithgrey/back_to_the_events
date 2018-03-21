/*Cargamos los artistas de las encuestas*/
/*
function load_artistas_solicitados(){

	url =  now + "index.php/api/emp/solicitud_artista_top/format/json"; 	
	empresa  =  $("#id_empresa").val();	
	$.ajax({
		url : url ,
		data : {"empresa" : empresa } , 
		beforeSend: function(){			
			show_load_enid(".section-artistas-solicitudes" , "Cargando ..." , 1 ); 
		}		
	}).done(function(data){
		llenaelementoHTML(".section-artistas-solicitudes" , data );
	}).fail(function(){
		show_error_enid(".section-artistas-solicitudes" , "Problemas al cargar reporte al administrador ");
	});
	
}
*/
/**/
function load_section_comunidad(){
	//load_section_img_comunidad(); 
	load_comentatios_publicos(); 
	

}
/*Cargamos los comentarios del público para ésta empresa*/
function load_comentatios_publicos(){	
	url =  now + "index.php/api/emp/laexperiencia/format/json/";
	id_empresa  =  $("#id_empresa").val();
	in_session =  $(".in_session").val();
	$.ajax({
		url :  url , 
		data :  { "id_empresa" :id_empresa , "in_session" :  in_session , "config" : 0 ,  "seccion" : 2 },		
		beforeSend: function(){			

			show_load_enid(".comentarios-usuarios" , "Cargando ..." , 1 ); 

		}
	}).done(function(data){						

		llenaelementoHTML(".comentarios-usuarios" , data );
		
	}).fail(function(){
		show_error_enid(".comentarios-usuarios" , "Problemas al cargar reporte al administrador ");
	});	
}
/**/
/*
function load_section_img_comunidad(){
	

	url =  now + "index.php/api/img_controller/comunidad/format/json/";
	empresa  =  $("#id_empresa").val();
	$.get(url , {"empresa" : empresa } ).done(function(data){	
		llenaelementoHTML(".comunidad-experiencia-imgs" , data );
		alert(data);
	}).fail(function(){
		alert();
	});
}
*/