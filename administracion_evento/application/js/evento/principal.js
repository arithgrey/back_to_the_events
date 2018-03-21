var nombre_servicio = "";
var evento =  0;
var servicio = 0;
var tipo_evento = "";

$(document).ready(function(){
	set_evento($("#evento").val());
	$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

	enid_evento=  $("#nombre_evento_val").val(); 
	evalua_modal();
	tipo_contenido = "";
	

	
	$("#artistas_escenarios_evento").click(carga_section_escenarios);
	$("#genero-busqueda").keyup(function(){
		busqueda_geros_musicales($(this).val());
	});

	$("#tipo-event-btn").click(update_tipificacion_evento);	
	$("#form_social").submit(registra_redes_sociales);
	$(".nombre-evento-h1").click(update_name_evento);
	$(".edicion-evento").click(update_edicion_evento);
	$(".descripcion-p").click(update_descripcion_evento);
	$(".politicas-p").click(update_politicas_evento);
	$(".permitido-p").click(update_permitido_evento);
	$(".restricciones-p").click(updaterestricciones);	
	$(".experiencia_btn_templ").click(carga_template_disponible_experiencia);
	$(".politicas_btn_templ").click(carga_template_disponible_politica);
	$(".restricciones_btn_templ").click(carga_template_disponible_restricciones);
	$(".politicas_section_content").click(function(){
		get_contenido_evento_temp(4,  "#list_politicas_evento");
	});
	$(".restricciones_section_content").click(function(){
		get_contenido_evento_temp(3 , "#list_restricciones_evento");		
	});

	$("#tipificacion-evento").click(carga_tipo_evento);
		
	$(".update-fecha-evento-form").submit(update_fecha_evento);
	$("#img-button-more-imgs").click(carga_img_portada);
		
		$(".permitidonow").click(load_objetospermitidos_evento);		

	$("#generos_musicales_contente").click(carga_generos_registrados);
	$("#generosenid-button").click(function(){
		show_section_dinamic_on_click(".section_generosmusicales");
	});	
	$("#articulos-permitidos-button-u").click(function (){		
		showonehideone("#articulos-permitidos-button-d" , "#articulos-permitidos-button-u");
	});
	$("#articulos-permitidos-button-d").click(function (){
		showonehideone("#articulos-permitidos-button-u" , "#articulos-permitidos-button-d");		
	});
	//$("#form-accesos-modal").submit(registra_acceso);
	$("#servicios-button").click(load_data_servicios);

	$(".locacion").click(update_ubicacion_evento);	
	
	$("#tematica-button").click( function (){
		show_section_dinamic_button(".tematica_section");	
		load_data_tematica();
	});
	
	$(".eslogan-p").click(update_eslogan_evento);  
  	/**/
  	$("#form-new-acceso").submit(record_acceso);
  	$("#precios_evento_seccion").click(load_data_accesos);
  	//$(".pv_evento_seccion").click(load_data_pvs); 
  	$(".reservaciones-btn").click(carga_reservaciones);
  	/**/
   	$("footer").ready(load_data_slider);
	$("#update_inicio").datepicker();
	$("#update_termino").datepicker();

	$("#form_nota_servicio").submit(registra_nota_servicio);
});

/**/
function load_data_evento( text_visible , val , text_evento , place , null_msj , sin_text_msj  ){

		url =  "../eventos/index.php/api/event/get_event_texts/format/json/";			
		
		data_send =  {"evento" : evento  , "text" : text_evento , "null_msj" : null_msj , "sin_text_msj" : sin_text_msj }; 
		$.ajax({
			url : url , 
			type : "GET", 
			data : data_send, 
			beforeSend :  function(){
				show_load_enid( place , "Cargando ... " , 1); 		
			}
		}).done(function(data){
			$(place).empty();
			llenaelementoHTML(text_visible  , data);
			$(val).val(data);

		}).fail(function(){
			show_error_enid(place , "Error, reportar al administrador "); 				
		});		
}
/**/	
function update_name_evento(e){
	showonehideone( ".nombre-input" , ".nombre-evento-h1" );		
	$(".nombre-input").blur(update_db_name_evento);
}
/**/
function update_db_name_evento(){
	
	flag = valida_text_form("#nombre-input" , ".place_nombre_evento" , 5 , "Nombre del evento " ); 
	if (flag == 1) {
			url =   "../eventos/index.php/api/event/nombre/format/json/";    
			nuevotexto = $("#nombre-input").val();		
			data_send  = {"nombre" : nuevotexto , "evento" : $("#evento").val() , "enid_evento" : enid_evento }			
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_nombre_evento" , "Registrando ... " , 1); 							
						}
				  }).done(function(data){
				  		$(".place_nombre_evento").empty();
				  		show_response_ok_enid( ".place_nombre_evento", "Nombre del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text(".nombre-input" , ".nombre-evento-h1" , nuevotexto , nuevotexto);

				  }).fail(function(){
				  		show_error_enid(".place_nombre_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
}

/******************************************************************/
/*Update descripción*/
function update_edicion_evento(e){

	showonehideone( ".edicion-input" , ".edicion-evento" );
	$(".edicion-input").blur(function(){			
		update_db_edicion_evento();
	});
}
/**/
function update_db_edicion_evento(){


	flag = valida_text_form(".edicion-input" , ".place_edicion_evento" , 5 , "Edición del evento " ); 
	if (flag == 1){

			url =  "../eventos/index.php/api/event/edicion/format/json/";    
			nuevotexto = $(".edicion-input").val(); 			
			data_send= { "edicion" : nuevotexto , "evento" : $("#evento").val() ,  "enid_evento" : enid_evento }			
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_edicion_evento" , "Registrando ... " , 1); 							
						}
				  }).done(function(data){
				  		$(".place_edicion_evento").empty();
				  		show_response_ok_enid( ".place_edicion_evento", "La edición del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text(".edicion-input" , ".edicion-evento" , nuevotexto , nuevotexto );

				  }).fail(function(){
				  		show_error_enid(".place_edicion_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
}


/******************************************************************/
function update_descripcion_evento(e){
	showonehideone( "#descripcion-evento" , ".descripcion-p" );
	$("#descripcion-evento").blur(update_descripcion_db_evento);
}
/**/
function update_descripcion_db_evento(){

	flag = valida_text_form("#descripcion-evento" , ".place_descripcion_evento" , 5 , "Descripción  del evento " ); 
	if (flag == 1) {
			url =   "../eventos/index.php/api/event/descripcion/format/json/";
			nuevotexto = $("#descripcion-evento").val();		
			data_send = { "descripcion_evento" : nuevotexto , "evento" : $("#evento").val() ,  "enid_evento" : enid_evento}     
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_descripcion_evento" , "Registrando ... " , 1); 							
						}
				  }).done(function(data){
				  		$(".place_descripcion_evento").empty();
				  		show_response_ok_enid( ".place_descripcion_evento", "La experiencia del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#descripcion-evento" , ".descripcion-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_descripcion_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
	
}
/************************update_politicas_evento *******************************/
function update_politicas_evento(e){
	showonehideone( "#politicas-evento" , ".politicas-p" );
	$("#politicas-evento").blur(update_db_politicas_evento);

}

/**/
function update_db_politicas_evento(){

	flag = valida_text_form("#politicas-evento" , ".place_politicas_evento" , 5 , "Las politicas del evento " ); 
	if (flag == 1) {
			url =  "../eventos/index.php/api/event/politicas/format/json/";    
			nuevotexto = $("#politicas-evento").val();				
			data_send = { "politicas_evento" : nuevotexto , "evento" : $("#evento").val() ,  "enid_evento" : enid_evento }
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_politicas_evento" , "Registrando ... " , 1); 							
						}
				  }).done(function(data){
				  		$(".place_politicas_evento").empty();
				  		show_response_ok_enid( ".place_politicas_evento", "Las politicas ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#politicas-evento" , ".politicas-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_politicas_evento"  , "Error al actualizar las politicas  del evento reporte al administrador");
				  });							
	}
}
/*Permitido Permitido Permitido Permitido Permitido Permitido Permitido */
function update_permitido_evento(e){
	showonehideone( "#permitido-evento" , ".permitido-p" );
	$("#permitido-evento").blur(update_db_permitido_evento);
}

function update_db_permitido_evento(e){

	flag = valida_text_form("#permitido-evento" , ".place_permitido" , 5 , "Descripción  " ); 	
	if (flag == 1 ) {		
		nuevotexto = $("#permitido-evento").val(); 
		url =  "../eventos/index.php/api/event/permitido/format/json/";    
		data_send = { "permitido_evento" : nuevotexto , "evento" : evento  ,  "enid_evento" : enid_evento };  

				$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_permitido" , "Registrando ... " , 1); 							
						}
				  }).done(function(data){
				  		$(".place_permitido").empty();
				  		show_response_ok_enid( ".place_permitido", "Descripción actualizada con éxito"); 			  		
				  		replace_val_text("#permitido-evento" , ".permitido-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_permitido"  , "Error al actualizar la descripción de lo permitido en el evento, reporte al administrador");
				  });
	}	
}
/*End permitido *End permitido *End permitido *End permitido *End permitido *End permitido */
function updaterestricciones(e){
	showonehideone( "#restricciones-evento" , ".restricciones-p" );
	$("#restricciones-evento").blur(update_db_restricciones)			
}

/**/
function update_db_restricciones(){
	flag = valida_text_form("#restricciones-evento" , ".place_restricciones" , 5 , "Descripción " ); 	
	nuevotexto = $("#restricciones-evento").val(); 				
	url = "../eventos/index.php/api/event/restricciones/format/json/";    
	data_send = { "restricciones_evento" : nuevotexto , "evento" : $("#evento").val() ,  "enid_evento" : enid_evento}
	if (flag == 1  ) {
		$.ajax({
				url :  url , 
				type : "PUT", 
				data : data_send , 
					beforeSend :  function(){
						show_load_enid(".place_restricciones" , "Registrando ... " , 1); 							
					}
				}).done(function(data){
					$(".place_restricciones").empty();
					show_response_ok_enid( ".place_restricciones", "Descripción actualizada con éxito"); 			  		
					replace_val_text("#restricciones-evento" , ".restricciones-p" , nuevotexto , nuevotexto);
				}).fail(function(){
					  	show_error_enid(".place_restricciones"  , "Error al actualizar la descripción de lo permitido en el evento, reporte al administrador");
		});
	}

}
/*Nueva dirección */
function update_ubicacion_evento(){

	
	$(".locacion").keyup(function(){
		locacion_evento =  $(".locacion").val();
		key =  "AIzaSyAVF0GA9R64Jnbd3ZX53TnLI-61vOqcq-4";
		url =  "https://maps.googleapis.com/maps/api/geocode/json"; 
		$.ajax({
				url :  url , 
				type: "GET", 			
				data: {"address" : locacion_evento , "key" :  key } 
			}).done(function(data){
				z = 0; 					
				locaciones =  "<datalist class='locaciones' id='locaciones'>"; 
				for(var x in data){						
					if(data["status"] == "OK"){
						locacion_escrita =  data[x][z].formatted_address; 
						//place_id  =  data[x][z].place_id; 
						//geometry = data[x][z].geometry;  					
						//location_lat =  geometry.location.lat; 
						//locacion_lng  =  geometry.location.lng;								
						locaciones  +=  "<option value='"+locacion_escrita+"'>"; 						
					}					
					z++;
				}
				locaciones +=  "</datalist>";
				llenaelementoHTML(".list-locaciones" ,  locaciones);
			   	
			}).fail(function(){
				console.log("ocurrió un error en la locación");				
			});
	});



	//showonehideone( "#ubicacion-input" , ".text-ubicacion" );
	$(".locacion").blur(function(){
		flag = valida_text_form(".locacion" , ".place_ubicacion" , 10 , "Datos de la dirección" ); 	
		if (flag ==1  ) {
			nuevotexto = $(".locacion").val(); 			
			url =   "../eventos/index.php/api/event/ubicacion/format/json/";  
			data_send = { "ubicacion" : nuevotexto , "evento" : $("#evento").val(),  "enid_evento" : enid_evento }  		
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_ubicacion" , "Registrando ... " , 1); 							
						}
					}).done(function(data){
						$(".place_ubicacion").empty();
						show_response_ok_enid( ".place_ubicacion", "Dirección del evento actualizada con éxito"); 			  		
						
					}).fail(function(){
						show_error_enid(".place_ubicacion"  , "Error al actualizar la dirección del evento, reporte al administrador");
						console.log("Error al registrar la locación del evento, evento  blur ");
			});
		}
	});
	
}
/**********************************************************/
function update_eslogan_evento(e){
	showonehideone( "#eslogan-evento" , ".eslogan-p");
	$("#eslogan-evento").blur(update_eslogan_db_evento);
}
/**/
function update_eslogan_db_evento(){
		
	flag = valida_text_form("#eslogan-evento" , ".place_eslogan_evento" , 5 , "Eslogan  del evento " ); 
	if (flag == 1) {
			url =  "../eventos/index.php/api/event/eslogan/format/json/";    			
			nuevotexto = $("#eslogan-evento").val();		
			data_send = { evento : get_evento() , eslogan : $("#eslogan-evento").val() ,  "enid_evento" : enid_evento }
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_eslogan_evento" , "Registrando ... " , 1); 							
						}
				  }).done(function(data){
				  		$(".place_eslogan_evento").empty();
				  		show_response_ok_enid( ".place_eslogan_evento", "Eslogan del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#eslogan-evento" , ".eslogan-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_eslogan_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
}

/**/
/*DELETE contenido evento */
/*Actualiza la fecha del evento */
function update_fecha_evento(){	
	 	
	update_inicio = $("#update_inicio").val();
	update_termino = $("#update_termino").val();
	url =  "../eventos/index.php/api/event/date_by_id/format/json/";	 		 	
	id_evento =  $("#evento").val();
	
	flag =  valida_format_date("#update_inicio" , "#update_termino" , ".place_fecha_evento" ,  "La fecha del evento no puede ser menor a la fecha actual");

	if (flag ==0 ) {

		$.ajax({
			url : url , 
			type :  "PUT",
			data : { "evento" : id_evento , "nuevo_inicio" : update_inicio , "nuevo_termino" : update_termino ,  "enid_evento" : enid_evento } , 
			beforeSend: function(){			
				show_load_enid(".place_fecha_evento" , "Actualizando ..." , 1); 	
			}
		}).done(function(data){

			$(".place_fecha_evento").empty();
			id_new_tag = "#"+ id_evento;
			new_date = "<i class='fa fa-calendar-o'></i> " + update_inicio + "-" + update_termino; 	
			llenaelementoHTML( ".text-fecha-evento", "FECHA DEL EVENTO " +new_date);	 
			show_response_ok_enid(".place_fecha_evento", "Fecha del evento actualizada con éxito "); 					

		}).fail(function(){
			show_error_enid(".place_fecha_evento"  , "Error al actualizar la fecha del evento, reportar al administrador"); 		
		});
	
	}
	
	return false;
}
/**/
function carga_section_escenarios(){
	
	url =  "../escenarios/index.php/api/escenario/load/format/html/";			
	evento  = evento = $("#evento").val();	
	in_session =  $(".in_session").val();
	$.ajax({
		url : url , 
		data :  {"evento_escenario" : evento ,  "enid_evento" : evento ,  "seccion_public" : 0 , "in_session" : in_session } , 		
		type :  "GET", 
		beforeSend :  function(){			

			show_load_enid(".place_nuevo_escenario" , "Cargando .... " , 1); 					

		}		
	}).done(function(data){				

		$(".place_nuevo_escenario").empty();
		llenaelementoHTML(".section_escenarios_admin" , data);
		$("#form-escenario").submit(nuevo_escenario);
		$(".deleteescenario").click(t_delete_escenario);

	}).fail(function(){				
		show_error_enid(".place_escenarios"  , "Error al al registrar artista"); 		
	});
}

/**/
/**/
function registra_redes_sociales(e){

		url =  $("#form_social").attr("action");	
		evento  =  $("#evento").val(); 
		data_send = $("#form_social").serialize() + "&" + $.param({ "evento" :  evento ,  "enid_evento" : enid_evento  });

		$.ajax({		
			url :  url , 
			type :  "PUT",
			data : data_send,
			beforeSend: function(){			
				show_load_enid(".place_social" , "Registrando ... " , 1); 		
			}
		}).done(function(data){					
			show_response_ok_enid( ".place_social", "Redes sociales del evento actualizadas con éxito"); 			  		
			$("#modal_social_evento").modal("hide");
			show_response_ok_enid( ".place_configuracion", "Redes sociales del evento actualizadas con éxito"); 			  		

		}).fail(function(){		
			show_error_enid(".place_social"  , "Error al registrar las redes sociales del evento"); 		
		});

	e.preventDefault();

}
/*Actualiza la tipificación del evento */
function update_tipificacion_evento(){
		
	tipificacion_evento  = $("#tipo-evento-select").val();
	url =  "../eventos/index.php/api/event/tipificacion/format/json/";  
	evento =  $("#evento").val();
	$.ajax({
		url :  url , 
		type :  "PUT" ,
		data :  {"tipificacion_evento" : tipificacion_evento , "evento" : evento ,  "enid_evento" : enid_evento},
		beforeSend: function(){			
			show_load_enid(".place_tipo_evento" , "Registrando ... " , 1); 		
		}
	}).done(function(data){
		
		show_response_ok_enid( ".place_tipo_evento", "Tipo de evento actualizado"); 	
		$("#tipo-evento").modal("hide");
		llenaelementoHTML("#tipificacion-evento" , tipificacion_evento);		
		show_response_ok_enid(".place_configuracion" , "Tipo de evento actualizado con éxito .!");



	}).fail(function(){
		show_error_enid(".place_tipo_evento"  , "Error al actualizar el tipo de evento, reporte al administrador"); 		
	});	
}/**/
/**/
function load_data_tematica(){			
	evento =  $("#evento").val();
	url =  "../eventos/index.php/api/event/tematica/format/json/";    					
	data_send = $("#form-tematica").serialize() + "&" + $.param({"evento" : evento,  "enid_evento" : enid_evento });
	$.ajax({
		url : url ,
		type :  "GET",
		data :  data_send, 
		beforeSend: function(){			
			show_load_enid(".place_tematica" , "Cargando ... " , 1); 				
		}

	}).done(function(data){		
		$(".place_tematica").empty();
		list_select = "<option value='sn'>-</option>";		
		for(var x in data ){
				
			if (data[x].idtematica == data[x].idtem ) {
				list_select += "<option value='"+data[x].idtematica +"' selected>"+ data[x].tematica_evento +" </option>";	
			}else{
				list_select += "<option value='"+data[x].idtematica +"'>"+ data[x].tematica_evento +" </option>";		
			}	
		}	
		llenaelementoHTML("#tematica_select" , list_select);
		$("#tematica-event-btn").click(update_tematica_evento);

	}).fail(function(){		
		show_error_enid(".place_tematica" , "Error al cargar temática del evento, reporte al administrador" ); 
	});
}
/**/
function update_tematica_evento(){	

	if ($("#tematica_select").val() !=  "sn") {

		url = "../eventos/index.php/api/event/tematica/format/json/";		
		evento =  $("#evento").val();
		data_send =   $("#form-tematica").serialize() + "&" + $.param({"evento" :  evento , "enid_evento" : enid_evento});
		$.ajax({
			url : url , 
			type:  "PUT",
			data:  data_send, 
			beforeSend : function(){
				show_load_enid(".place_tematica" , "Actualizando ..." , 1); 				
			}

		}).done(function(data){
			show_response_ok_enid( ".place_tematica", "Temática del evento actualizada con éxito"); 
			$("#modal_tematica_evento").modal("hide");
			show_response_ok_enid(".place_configuracion" ,  "Temática del evento actualizada con éxito." );
		}).fail(function(){		
			show_error_enid(".place_tematica" , "Error al cargar temática del evento, reporte al administrador" ); 
		});
	}else{
		$("#modal_tematica_evento").modal("hide");
	}
		
}
/**/
function evalua_modal(){		
	q =  $(".qparam").val();		
	switch(q) {

		case "restricciones":
			
			var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}
	    	$(".tab_restricciones").addClass("active");	    	
	    	get_contenido_evento_temp(3 , "#list_restricciones_evento");	

			break; 


		case "politicas":
			var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}	    	
	    	$(".tab_politicas").addClass("active");	    	
	    	get_contenido_evento_temp(4,  "#list_politicas_evento");

			break; 

	    case "servicios":	        

	    	/*
				$('#serviciosmodal').modal('show'); 
				load_data_servicios();
			*/
	        break;
	    case "serviciosincluidos": 

	    	$('#serviciosmodal').modal('show'); 
			load_data_servicios();			
	    	break;   

	    case "objs":	    	
	    	var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}	    	
	    	$(".tab_permitido").addClass("active");
	    	load_objetospermitidos_evento();
	    	
	        break;


	    case "slogan":
	    	$("#slogan_seccion").css("background" , "#00BCD4");
	    	$("#slogan_seccion").css("color" , "white");

	   	
	    case "generosmusicales":

			var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}	    		    
	    	$(".tab_generos").addClass("active");
	    	carga_generos_registrados();
	    	break;



	    	
	    case "reservaciones":
	    	carga_reservaciones();
			$("#reservaciones-modal").modal("show");
	    	break;

	    default:
	        
	        break;
	}
}


/**/
function carga_reservaciones(){

	id_evento  = evento = $("#evento").val();	
	$(".dinamic_event").val(id_evento);

	url =  $(".form-servaciones").attr("action");
	$.ajax({
		url :  url , 
		data :  {"tipo":  "evento" , "id_evento" :  id_evento } ,
		type :  "GET" ,
		beforeSend: function(){
			show_load_enid(".place_reservaciones" ,  "Cargando ... " ,  1 );
		}
	}).done(function(data){		
		
		console.log(data);
		$("#reservacion_tel").val(data[0].reservacion_tel);
		$("#reservacion_mail").val(data[0].reservacion_mail);
		$(".place_reservaciones").empty();
		$(".form-servaciones").submit(actualiza_reservaciones);

	}).fail(function(){
		show_error_enid(".place_reservaciones" , "Error al cargar las reservaciones, reporte al administrador");
	});	
}
/**/
function actualiza_reservaciones(e){

	data_send =  $(".form-servaciones").serialize() +  "&" + $.param({"tipo":  "evento"});	
	
	url =  $(".form-servaciones").attr("action");
	flag  =  valida_email_form("#reservacion_mail" , ".place_mail" );

	if ( flag == 1) {
		flag2 =  valida_tel_form("#reservacion_tel" ,  ".place_tel" ); 		
		if (flag2 ==  1 ) {
			$(".place_mail").empty();
			$(".place_tel").empty();
			$.ajax({
					url :  url , 
					data : data_send ,
					type :  "PUT" ,
					beforeSend: function(){
						show_load_enid(".place_reservaciones" ,  "Actualizado  ... " ,  1 );
					}
			}).done(function(data){			

				show_response_ok_enid( ".place_reservaciones", "Datos del las reservaciones actualizadas con éxito!"); 
				$("#reservaciones-modal").modal("hide");				
				/**/			
				msj =  "Reservaciones Tel." + $("#reservacion_tel").val() + " " + $("#reservacion_mail").val();
				llenaelementoHTML(".reservaciones-btn" , msj);

				show_response_ok_enid( ".place_reservaciones_2", "Datos del las reservaciones actualizadas con éxito!<br>"); 

				
			}).fail(function(){
				show_error_enid(".place_reservaciones" , "Error al actualizar las reservaciones, reporte al administrador");
			});

		}

	}
	
	e.preventDefault();
}
/**/

/**/
function load_data_accesos(){	

	url =  "../accesos/index.php/api/accesos/list/format/json/";				
	in_session =  $(".in_session").val();

	$.ajax({
		url :  url , 
		type :  "GET", 
		data : { evento : get_evento() , in_session :  in_session , resumen_evento :  1 }, 
		beforeSend: function(){			
			show_load_enid( ".place_list_accesos" , "Cargando ... " , 1 ); 	
		}
	}).done(function(data){

		$(".place_list_accesos").empty();
		llenaelementoHTML(".list-accesos" , data);				 			
	
		/*Para cargar la info del acceso */		
	}).fail(function(){		
		show_error_enid(".place_list_accesos" , "Error al cargar, los accesos "); 
	});
}

function record_acceso(e){

	url = "../accesos/index.php/api/accesos/acceso/format/json/";	
	
	flag  =  valida_text_form(".acceso_input" , ".place_nombre_promo_vali" , 5 , "Nombre de la promoción" ); 
	if (flag ==  1 ){
		/*ahora validamos el formato numérico*/
		flag_numerico =  valida_num_form("#precio-acceso-record" , ".place_msj_precio"); 		
		if (flag_numerico == 1 ){			
					flag = valida_l_precio("#precio-acceso-record" ,  5 , ".place_msj_precio" ,  "Precio del acceso demaciado alto");					
					if (flag == 1){									

						data_send =  $("#form-new-acceso").serialize() + "&"  + $.param({"evento" :  evento ,  "enid_evento" : enid_evento  });								
						$.ajax({
								url :  url , 
								type : "POST", 
								data : data_send, 
								beforeSend:function(){								
									show_load_enid( ".place_registro_acceso" , "Registrando ..." , 1 ); 				
									$(".place_nombre_promo_vali").empty();
									$(".place_msj_precio").empty();			
								}
						}).done(function(data){		
							
							
							var  fields_reset =  ["#acceso_nombre" ,  "#precio-acceso-record" , "#descripcion"];
							reset_fields(fields_reset);															
							$(".place_registro_acceso").empty();
							url_next =  "../administracion_accesos/?q="+get_evento()+"&q2="+data;
							redirect(url_next);

						}).fail(function(){	
							
							show_error_enid(".place_registro_acceso" , "Error al cargar el escenario reportar al administrador"); 
						});
				}
		}				
	}		
	e.preventDefault();
}
/**/
function update_status_objpermitido(e){	

	idobjetopermitido = e.target.id;
	url = "../eventos/index.php/api/event/objeto_permitido/format/json/";		
	data_send = {evento : get_evento() , objetopermitido : idobjetopermitido }
		
	$.ajax({
		url : url , 
		type : "PUT",
		data : data_send , 
		beforeSend: function(){
			show_load_enid(".place-obj" , "Cargando ... " , 1); 			
		}
	}).done(function(data){
		show_response_ok_enid(".place-obj" , "Registrado !");
	}).fail(function(){
		show_error_enid(".place-obj"  , "Error al cargar actualizar los objetos permitidos");
	});

	//load_objetospermitidos_evento();	
}
/**/
function  load_objetospermitidos_evento() {	
	
	url = "../eventos/index.php/api/event/objetospermitidos/format/json/";		
	evento =  $("#evento").val();

	$.ajax({
		url : url , 
		type: "GET",
		data : {evento : get_evento()} , 
		beforeSend:function(){		
			show_load_enid(".place_obj_permitidos" , "Cargando ... " , 1); 			
		}
	}).done(function(data){
		
		$(".place_obj_permitidos").empty();
		llenaelementoHTML(".obj_permitidos" , data);		
		$(".objpermitido").click(update_status_objpermitido);
		$(".btn_incluir_objs").click(incluir_objs_evento);


	}).fail(function(){
		show_error_enid(".place_obj_permitidos"  , "Error al cargar objetos permitidos, reporte al administrador");
	});

}
/**/
function carga_tipo_evento(e){
	tipo = e.target.text;
	set_tipo_evento($.trim(tipo));	
	console.log(get_tipo_evento());
	$('.tipo_evento_select > option[value="'+get_tipo_evento()+'"]').attr('selected', 'selected');	
}
/**/
function get_evento(){
	return evento;
}
/**/
function set_evento(n_evento){
	evento =  n_evento;
}
/**/
function get_tipo_evento(){
	return tipo_evento;
}
/**/
function set_tipo_evento(n_tipo_evento){
	tipo_evento =  n_tipo_evento;
}
/**/
