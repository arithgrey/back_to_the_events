$(document).on("ready", function(){
	/**/
	var  tipo_contenido = 0;	
	$(".tb_objs_secccion").click(carga_articulos_empresa);
		load_contenidos_templ_data( 1 , ".experiencias" , ".place_experiencias" );
	$(".restriciones_disponibles").click(function(){		
		load_contenidos_templ_data( 3 , ".restriciones" , ".place_restriciones");
	});
	$(".politicas-section").click(function(){		
		load_contenidos_templ_data( 4 , ".politicas" , ".place_politicas" );												
	});
	$("#form-articulo-permitido").submit(record_articulo_permitido);	
	$(".del_obj_permitido").click(delete_articulo_empresa);			

	$("#new-contenido-form").submit(function(){
		registra_contenido("#new-contenido-form" , "restricciones" , ".place_n_restriccion"   , ".place_val_restriccion" , ".input_restriccion" );	
		return false;
	});
	$("#nueva-politica-template").submit(function(){
		registra_contenido( "#nueva-politica-template" , "politicas" , ".place_n_politica" , ".place_val_politica" , ".input_politica");		
		return false;
	});
	$("#nueva-descripcion-template").submit(function(){		
		registra_contenido( "#nueva-descripcion-template" , "Descripción eventos" , ".place_n_experiecia" , ".place_val_experiencia"  , ".input_experiencia");		
		return false;
	});
	var  dinamic_objeto_permitido = 0;	
	$("#select-template").change(muestra_tipo_template);	
	evalua_modal();

	//$("footer").ready(valida_existencia_objetos_permitidos);
});
/**/
function delete_articulo_empresa(e){

	url = "../plantillas/index.php/api/templ/plantillaarticulos/format/json/";
	id_objeto_permitido = e.target.id;
	eliminar_data( url , { "objeto_permitido" : id_objeto_permitido } );	
	carga_articulos_empresa();

}
/*Registramos la restriccion*/
function registra_contenido( formulario , type_conten ,  place  , place_val ,  input_val  ){

		flag  =  valida_text_form(input_val , place_val , 3 , "Nombre para la plantilla" ); 			
		if (flag ==  1 ){

				url = "../plantillas/index.php/api/templ/templates_content/format/json/";			
				$.ajax({
					url : url , 
					data : $(formulario).serialize() , 
					type : "POST" , 
					beforeSend: function(){
						show_load_enid(place,  "Registrando ... " , 1 );
					}   
				}).done(function(){
					$(place).empty();
					$(place_val).empty();
				}).fail(function(){
					show_error_enid(place , "Falla al registrar plantilla, reporte al administrador");
				});

			switch(type_conten){
				
			    case "Descripción eventos":
			    	$("#modal-descripcion-eventos").modal("hide");
			        load_contenidos_templ_data( 1 , ".experiencias" , ".place_experiencias" );
			        show_response_ok_enid( ".place_experiencias", "Plantilla registrada con éxito"); 
			        document.getElementById("nueva-descripcion-template").reset();

			        break;   
			    case "restricciones":


			    	$("#modal-restriccion-eventos").modal("hide");
			    	
			    	load_contenidos_templ_data( 3 , ".restriciones" , ".place_restriciones");
			    	show_response_ok_enid( ".place_restriciones", "Plantilla registrada con éxito"); 
			    	document.getElementById("new-contenido-form").reset();

			        break;
			    case "politicas":

			    	$("#modal-politica-eventos").modal("hide");
			    	load_contenidos_templ_data( 4 , ".politicas" , ".place_politicas" );
			    	show_response_ok_enid( ".place_politicas", "Plantilla registrada con éxito"); 	 
			    	document.getElementById("nueva-politica-template").reset();
			        break;    
			    default:
			        break; 
			} 
	}
}
/***/

function load_contenidos_templ_data(type , contenido , dinamic_place ){

	tipo_contenido =  type;
	url = "../plantillas/index.php/api/templ/templates_content/format/json/";		
	$.ajax({
		url : url , 
		type :  "GET",		
		data: {"type" : type } ,
		beforeSend : function(){
			show_load_enid( dinamic_place , "Cargando ... " , 1); 
		}
	}).done(function(data){
		$(dinamic_place).empty();
		llenaelementoHTML(contenido , data );
		$(".delete_contenido_template").click(delete_contenido);	
	}).fail(function(){
		show_error_enid(dinamic_place , "Falla al cargar, reporte al administrador");
	});			
}
/**/
function muestra_tipo_template(){		
	if ($("#select-template").val() == "Escenarios"){
		showonehideone(  "#section-escenarios" , "#section-eventos");
		lista_plantillas_escenario();	
	}else{
		showonehideone("#section-eventos" , "#section-escenarios");
	}		
}
/**/
function delete_contenido(e){
	
	idcontenido = e.target.id;	
	$(".aceptar_eliminar").click(function(){

		url = "../plantillas/index.php/api/templ/templates_content/format/json/";	
		eliminar_data(url , {"contenido" : idcontenido} );				
		$("#modal_restricciones").modal("hide");

	});

}
/**/
/*Registra articulo permitido*/	
function record_articulo_permitido(e){
	/*Validamos previo al registro */	  
	flag  =  valida_text_form("#nuevo-articulo" , ".place_val_articulo" , 3 , "Nombre del artículo " ); 	
	if (flag == 1){
		url =  "../plantillas/index.php/api/templ/articulos/format/json/"; 
		$.ajax({
			url : url , 
			type : "POST",
			data :   $("#form-articulo-permitido").serialize(),
			beforeSend : function(){
				show_load_enid(".place_n_articulo" , "Registrando ... " ,  1 );
			}
		}).done(function(data){

			$(".place_n_articulo").empty();
			$("#modal-articulo-eventos").modal("hide");
			carga_articulos_empresa();	
			show_response_ok_enid(".place_objs" , "Éxito en el registro.!");
			document.getElementById("form-articulo-permitido").reset();	

		}).fail(function(){
			show_error_enid("place_n_articulo" ,  "Problemas en el registro, reporte al administrador ");
		});
		$(".place_val_articulo").empty();
	}
	e.preventDefault();
}
/**/
function carga_articulos_empresa(){	
	
	url = "../plantillas/index.php/api/templ/articulos/format/json/";	
	$.ajax({
		url: url , 
		type:  "GET",
		beforeSend: function(){
			show_load_enid(".place_objs" , "Cargando ... " ,  1 );
		}
	}).done(function(data){
		$(".place_objs").empty();
		llenaelementoHTML(".objs" , data );		
		$(".configurar_obj").click(carga_data_obj);
		$(".eliminar_obj").click(eliminar_obj);
	}).fail(function(){
		show_error_enid(".place_objs",  "Error al cargar los articulos disponibles, reporte al administrador");
	});
}
/**/
function carga_data_obj(e){	
	document.getElementById("form_conf_articulo").reset();
	url = "../plantillas/index.php/api/templ/articulo/format/json/";
	obj = e.target.id; 
	$("#nid_obj").val(obj);		
	$.ajax({
		url : url , 
		type : "GET",
		data : {"id_obj" : obj } , 
		beforeSend : function(){
			show_load_enid(".place_config_obj",  "Cargando datos ... " , 1 );
		}
	}).done(function(data){

		$(".place_config_obj").empty();

		for(var x in data){ 			
			nombre = data[x].nombre; 						
			descripcion    = data[x].descripcion;    			
			fecha_registro =  data[x].fecha_registro;   			
			valorHTML( "#n_articulo" , nombre);		
			valorHTML( "#n_descripcion" , descripcion);		
		}
		/**/
		$("#form_conf_articulo").submit(actualiza_obj);

	}).fail(function(){
		show_error_enid(".place_config_obj" ,  "Error al cargar los datos del artículo, reporte al administrador");
	});
}
/**/
function actualiza_obj(e){

	url = "../plantillas/index.php/api/templ/articulo/format/json/";	
	$.ajax({
		url : url, 
		type : "PUT",
		data :  $("#form_conf_articulo").serialize(), 
		beforeSend : function(){
			show_load_enid(".place_config_obj",  "Registrando ... " , 1 );
		}

	}).done(function(data){

		$(".place_config_obj").empty();		
		$("#config_obj").modal("hide");
		carga_articulos_empresa();
		show_response_ok_enid(".place_objs" ,  "Cambios regitrados con éxito .! ");


	}).fail(function(){
		
	});
	e.preventDefault();
}
/**/
function eliminar_obj(e){
	obj  =  e.target.id;

	url = "../plantillas/index.php/api/templ/articulo/format/json/";			
	$(".aceptar_obj_eliminar").click(function(){		
	
		$.ajax({
			url : url ,
			type : "DELETE", 
			data:  {id_obj : obj },
			beforeSend: function(){
				show_load_enid(".place_eliminar_obj" , "Elimanando artículo ... " , 1 );
			}
		}).done(function(data){
			
			$("#eliminar_obj").modal("hide");
			$(".place_eliminar_obj").empty();
			carga_articulos_empresa();
			show_response_ok_enid(".place_objs" , "Articulo eliminado con éxito");

		}).fail(function(){
			show_error_enid(".place_eliminar_obj" ,  "Error al eliminar artículo, reporte con el administrador ");
		});			
			
	});
}
/**/
function evalua_modal(){
	q =  $(".q_modal").val();	
	var tabs =  [".tb_restricciones" , ".tb_objs" ,  ".tb_politicas" ,  ".tb_presentacion"];
		for (var x in tabs){
		   	$(tabs[x]).removeClass("active");		    	
	}
	switch(q){			    		   

	    case "experiencia":
	    	$('#modal-descripcion-eventos').modal('show');
	    	$(".tb_presentacion").addClass("active");
	    	load_contenidos_templ_data( 1 , ".experiencias" , ".place_experiencias" );
	    	break;
	    case "politica": 	
	    	$('#modal-politica-eventos').modal('show');
	    	$(".tb_politicas").addClass("active");
	    	load_contenidos_templ_data( 4 , ".politicas" , ".place_politicas" );												
	    	break;
	    case "restriccion":	
	    	$(".tb_restricciones").addClass("active");
	    	$('#modal-restriccion-eventos').modal('show');
	    	load_contenidos_templ_data( 3 , ".restriciones" , ".place_restriciones");
			break;

		case "objs":
			$(".tb_objs").addClass("active");
			carga_articulos_empresa();
			break;

		case "escenario":		
			showonehideone(  "#section-escenarios" , "#section-eventos");
			lista_plantillas_escenario();							
			$("#modal-experiencia").modal("show");
			break;

	    default:		        	    	    	
	    	$(".tb_presentacion").addClass("active");
	    	load_contenidos_templ_data( 1 , ".experiencias" , ".place_experiencias" );
	        break;
	}
}
/**/
/*
function valida_existencia_objetos_permitidos(){

	url =  "../plantillas/index.php/api/templ/evalua_informacion_inicial/format/json/";
	$.ajax({
		url: url , 
		data: {}, 
		type: "GET",
		beforeSend: function(){
		}
	}).done(function(data){
		console.log(data);
	}).fail(function(){
		show_error_enid(".place_info_carga_inicial" ,  "Error al generar carga inicial");
	});
}
*/
/**/