
function load_section_comunidad(){
	//load_section_img_comunidad(); 
	load_comentatios_publicos(); 

}
/*Cargamos los comentarios del público para ésta empresa*/
function load_comentatios_publicos(){	
	url =  "../empresas/index.php/api/emp/laexperiencia/format/json/";
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
