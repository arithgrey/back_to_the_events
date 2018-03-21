function eventos_artistas(){

	$(".remove-artista").click(t_delete_escenario_artista);	
	$(".horario_artista").click(t_update_horario_artista);
	$(".artista_yt").click(load_data_youtube);
	$(".artista_sound").click(load_data_sound);
	$(".artista_nota").click(load_data_nota);
	$(".status-confirmacion").click(t_up_estatus);
	$(".artistas-inputs").click(try_update_nombre_artista);			
	$(".tipo_artista").click(t_up_tipo_artista);
	$(".img-artista-evento").click(carga_form_imagenes_artista);		
}
/**/
function t_up_tipo_artista(e){

	artista =  e.target.id; 	
	set_artista(artista);
	url = "../escenarios/index.php/api/escenario/escenario_artista_id/format/json/"; 

	$.ajax({
		url : url , 
		data:  {idartista: get_artista() ,  idescenario :  get_escenario() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() }, 
		beforeSend: function(){
			show_load_enid(".place_tipo_artista" , "Cargando ... " , 1); 	
		}
	}).done(function(data){		
		tipo_artista =  data[0].tipo_artista; 
		$(".place_tipo_artista").empty();
		$('.tipo_escenario > option[value="'+ tipo_artista+'"]').attr('selected', 'selected');		
		$("#tipo-artista-form").submit(function(e){
			update_tipo_artista(artista);
			e.preventDefault();
		});

	}).fail(function(){
		show_error_enid(".place_tipo_artista" , "Error al cargar el tipo de participación del artista, reporte al administrador");
	});
}
/**/
function update_tipo_artista(artista){

	data_send =  $("#tipo-artista-form").serialize() +  "&" + $.param({"artista" : artista  , "escenario" : get_escenario() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() }); 
	url =  $("#tipo-artista-form").attr("action");
	$.ajax({
		url :  url , 
		type : "POST", 
		data : data_send , 
		beforeSend : function(){
			show_load_enid(".place_tipo_artista" , "Cargando ... " , 1); 							
		}
	}).done(function(data){
		show_response_ok_enid(".place_tipo_artista"  ,  "Tipo de artista actualizado con éxito.! " ); 								
		$("#modal_tipo_artista").modal("hide");		
		load_data_escenario_artista();
	}).fail(function(){
		show_error_enid(".place_tipo_artista" , "Error actualizar el tipo de artista ");					
	});
	
}
function nuevo_artista(e){


	url = "../escenarios/index.php/api/escenario/escenario_artista/format/json";	
	data_send =  $("#form-escenario-artista").serialize() + "&" + $.param({"evento" :  get_evento() , "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()   }); 
	
	flag =  valida_text_form("#artista" , ".place_artista" , 2 , "Nombre para el artista" ); 
	if (flag == 1  ) {
		$.ajax({
			url :  url , 
			type :"POST", 
			data : data_send , 
			beforeSend: function(){
				show_load_enid(".place_artista" , "Cargando ... " , 1); 
			}
		}).done(function(data){		

			$(".place_artista").empty();
			show_response_ok_enid( ".place_config_artistas", "Artista artista registrado con éxito.!"); 
			$("#artista").val("");		
			load_data_escenario_artista();		
			recorrepage("footer");
			
		}).fail(function(){
			show_error_enid(".place_artista"  , "Error al al registrar artista"); 
		});
	}	
	e.preventDefault();	
}
/*cargamos la lista de artistas*/
function load_data_escenario_artista(){

	
	url = "../escenarios/index.php/api/escenario/escenario_artista/format/json";				
	$.ajax({
		url : url , 
		type: "GET", 
		data : {"escenario" :  get_escenario() , "public" :  0  , "in_session"  : get_in_session() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() } , 
		beforeSend : function(){				
			show_load_enid(".place_artistas" , "Cargando artistas del escenario ...  " , 1); 			
		}		
	}).done(function(data){		

		llenaelementoHTML("#artistas-escenario-section", data);		
		$(".place_artistas").empty();
		eventos_artistas();		

	}).fail(function(){		
		show_error_enid(".place_artistas" , genericresponse[0]);	
	});
}

/*elimina artista del escenario */
function t_delete_escenario_artista(e){		
	$(".place_delete_artista").empty();
	artista = e.target.id;	
	set_artista(artista);
	$("#aceptar_delete_artista").click(function(){
		delete_escenario_artista(artista); 	
	});
}
/**/
function delete_escenario_artista(artista){

	url = "../escenarios/index.php/api/escenario/escenario_artista/format/json";	
	data_send =  {"idescenario" : get_escenario() , "idartista": artista , "evento" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() }; 

	$.ajax({
		url :  url ,
		type :  "DELETE", 
		data : data_send, 
		beforeSend : function(){				
			show_load_enid(".place_delete_artista" , "Eliminando ...  " , 1); 			
		}
	}).done(function(data){
		 $("#modal-nuevo-escenario-evento").modal("hide");
		 llenaelementoHTML(".place_delete_artista" , "Se eliminó el artista del evento con éxito.! ");
		 load_data_escenario_artista();
		 show_response_ok_enid(".place_config_artistas" ,  "Artista eliminado del evento con éxito " ); 
	}).fail(function(){
		 show_error_enid(".place_delete_artista" , "Falla al quitar artista del escenario, reporte al administrador" );
	});
}



/*Actualiza el */
function t_update_horario_artista(e){
	
	/*Cargamos el horario de éste*/
	artista = e.target.id; 	
	set_artista(artista);
	url = "../escenarios/index.php/api/escenario/escenario_artista_id/format/json/"; 

	$.ajax({
		url : url , 
		data:  {idartista: get_artista() ,  idescenario :  get_escenario() , "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()   }, 
		beforeSend: function(){
			show_load_enid(".place_horario_artista" , "Cargando info del artista ... " , 1); 	
		}
	}).done(function(data){
			
			hora_inicio =  data[0].hora_inicio; 
			hora_termino =  data[0].hora_termino; 
			valorHTML( "#hiartista" , hora_inicio); 
			valorHTML( "#htartista" , hora_termino); 
			console.log(data);

			/*indicamos cual es el estatus del artista */
				
			llenaelementoHTML(".artista_estado_actual" , "Estado actual del artista :" + data[0].status_confirmacion);


			$(".place_horario_artista").empty();
			$(".guardar_horario").click(function(){

				hiartista = $("#hiartista").val();
			 	htartista = $("#htartista").val();
				url =  "../escenarios/index.php/api/escenario/inicioterminoartista/format/json/";				
				data_send = { artista : get_artista() , escenario : get_escenario() , hiartista : hiartista , htartista : htartista , "evento" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()  }
				update_horario_artista(data_send); 	
			});

	}).fail(function(){
			show_error_enid(".place_horario_artista" , "Error al cargar horario del artista, reporte al administrador");
	});

}

/**/
function update_horario_artista(data_send){	
	$.ajax({
		url : url , 
		type: "PUT", 
		data : data_send, 
		beforeSend: function(){				
			show_load_enid(".place_horario_artista" , "Registrando horario ... " , 1); 			
		}
	}).done(function(){
			
		$("#modal_record_horario").modal("hide");
		show_response_ok_enid(".place_config_artistas" , "Horario registrado con éxito.!"); 
		load_data_escenario_artista();

	}).fail(function(){
		show_error_enid(".place_horario_artista" , "Error al cargar horario, reporte al administrador");
	});					
}
/**/

function load_data_nota(e){

	idartista = e.target.id;
	set_artista(idartista);
	url =  "../escenarios/index.php/api/escenario/escenario_artista_id/format/json/";
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"idescenario" :  get_escenario() , "idartista" : get_artista() }  , 
		beforeSend: function(){			
			show_load_enid(".place_nota_artista" , "Cargando mensaje ... " , 1); 					
		}
	}).done(function(data){	

		$(".place_nota_artista").empty();
		valorHTML("#nota_artista" , data[0].nota);
		valorHTML("#idartistanota" , idartista );		
		$("#form-arista-nota").submit(update_nota_artista);

	}).fail(function(){		
		show_error_enid(".place_nota_artista" ,"Error al cargar el mensaje del artista, reporte al administrador ");			
	});
}
/*****************************/
function update_nota_artista(e){

	artista = $("#idartistanota").val();
	data_send = $("#form-arista-nota").serialize() + "&"+ $.param({"artista" : artista  , "escenario" :  get_escenario()  ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()  });	
	url =  "../escenarios/index.php/api/escenario/escenario_artista_nota/format/json/";
	/*Validación previa */
	flag  = valida_text_form("#nota_artista" , ".place_nota_artista" , 5  , "Mensaje para el público " ); 
	if (flag ==  1 ){
		$.ajax({
		   url: url,
		   type: 'PUT',
		   data : data_send , 
		   beforeSend : function(){	   	  
		   	show_load_enid(".place_nota_artista" , "Registrando ... " , 1); 			
		   } 
		}).done(function(data){		
			$(".place_nota_artista").empty();
			$("#modal_nota").modal("hide");
		   	show_response_ok_enid(".place_config_artistas" ,  "Mensaje para el público registrado con éxito" ); 		   	
		   	load_data_escenario_artista();
		}).fail(function(){
			show_error_enid(".place_nota_artista" , genericresponse[0]);				
		});
	}
	e.preventDefault();
}
/******************************/
function load_data_youtube(e){

	idartista = e.target.id;
	set_artista(idartista);
	url =  "../escenarios/index.php/api/escenario/escenario_artista_id/format/json/";
	
	$.ajax({
		url : url , 
		type :  "GET", 
		data : {"idescenario" :  get_escenario() , "idartista" : get_artista()  , "in_session"  : get_in_session() } , 
		beforeSend: function(){
			show_load_enid(".place_url_youtube" , "Cargando ... " , 1); 			
		}
		}).done(function(data){


			url_social_youtube  = data[0].url_social_youtube; 				
			$("#url_youtube").val(url_social_youtube);
			$("#dinamic_artista_youtube").val(idartista);
			$(".place_url_youtube").empty();
			$("#form-arista-social-youtube").submit(upload_data_youtube);				
			
			
		}).fail(function(){
			show_error_enid(".place_url_youtube" , "Error al cargar datos");				
		});	
}
/**/
function upload_data_youtube(e){

	url_youtube  = $("#url_youtube").val();	
	url_send =  "../escenarios/index.php/api/escenario/escenario_artista_social/format/json/";
	data_send =  $("#form-arista-social-youtube").serialize() + "&"+ $.param({"social" : "youtube"  , "escenario" :  get_escenario() ,  "evento" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()   }); 
	
	flag =  valida_url_form( ".place_url_youtube" , "#url_youtube"  ,  "Url no válida" ); 
	if (flag ==  1  ) {
		
		$.ajax({		   
		   url: url_send,
		   type: 'PUT',
		   data : data_send, 
		   beforeSend :  function(){
		   		show_load_enid(".place_url_youtube" , "Registrando ... " , 1); 			   		
		   }  
		}).done(function(data){
			$("#modal_link_youtube").modal("hide");
	   		show_response_ok_enid(".place_config_artistas" ,  "URL registrada con éxito" ); 				
	   		load_data_escenario_artista();

		}).fail(function(){
			show_error_enid(".place_url_youtube" , "Error registrar reporte al administrador");						   	
		});	
	}
	e.preventDefault();

}
/*****************************/
function load_data_sound(e){
	$("#response-sound").html("");
	idartista = e.target.id;
	set_artista(idartista);
	url =  "../escenarios/index.php/api/escenario/escenario_artista_id/format/json/";
	escenario  = get_escenario();
	$.ajax({
		url : url , 
		type :  "GET", 
		data:  {"idescenario" :  get_escenario() , "idartista" : get_artista() } , 
		beforeSend : function(){			
			show_load_enid(".place_url_sound" , "Cargando  ... " , 1); 		
		}
	}).done(function(data){
		url_sound  = data[0].url_sound_cloud; 				
		$("#url_sound").val(url_sound);
		$("#dinamic_artista_sound").val(idartista);
		$("#form-arista-social-sound").submit(upload_data_sound);
		$(".place_url_sound").empty();
	}).fail(function(){		
		show_error_enid(".place_url_sound" , "Error al cargar al url reporte al administrador");					
	});
}
/**/
function upload_data_sound(e){	

	escenario  = get_escenario();
	data_send =  $("#form-arista-social-sound").serialize() + "&"+ $.param({"social" : "sound"  , "escenario" :  get_escenario() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()  }); 	
	url_send = "../escenarios/index.php/api/escenario/escenario_artista_social/format/json/";	
	flag =  valida_url_form( ".place_url_sound" , "#url_sound"  ,  "Url no válida" ); 
	if (flag ==  1 ) {
		$.ajax({
		   url: url_send,
		   type: 'PUT',
		   data : data_send, 
		   beforeSend:  function(){
		   	show_load_enid(".place_url_sound" , "Cargando  ... " , 1); 	
		   }  
		}).done(function(data){	   					
		   	/*aquí mostrar el mensaje de respuesta */	   	
		   	show_response_ok_enid(".place_config_artistas" ,  "URL registrada con éxito" ); 					   	
		   	$("#modal_link_sound").modal("hide");
		   	load_data_escenario_artista();
		}).fail(function(){
			show_error_enid(".place_url_sound" , "Error al cargar al url reporte al administrador");					   	
		});
	}
	e.preventDefault();
}
/**/
function t_up_estatus(e){
	url =  "../escenarios/index.php/api/escenario/escenario_artista_status/format/json/";
	artista = e.target.id;
	set_artista(artista);
	$(".btn-participacion").click(function(){
		
		nuevo_status = $("#status-artista-evento").val();
		data_send =  { artista :  get_artista() , escenario :  get_escenario() , nuevo_status :  nuevo_status ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()  }
		$.ajax({				
			url :  url , 
			type : 'PUT' , 
			data : data_send,
			beforeSend : function(){
				show_load_enid(".place_estatus_artista " , "Registrando estado del artísta  ... " , 1); 						
			}
		}).done(function(data){							
			$(".place_estatus_artista").empty();
			show_response_ok_enid(".place_config_artistas" ,  "El estado del artista ha sido modificado con éxito.!" ); 								
			load_data_escenario_artista();		
			$("#edit-status-confirmacion").modal("hide");
		}).fail(function(){
				show_error_enid(".place_estatus_artista" , "Error al actualizar el estado del confirmación, reporte al administrador");					
		});			
	});
}
function try_update_nombre_artista(e){
	artista =  e.target.id;	
	set_artista(artista);
	/*Cargamos los datos del artista  */
	url = "../escenarios/index.php/api/escenario/artista/format/json/";
	$.ajax({			
		url : url , 
		type :  "GET", 			
		data :  {"artista" : get_artista()  ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()  } , 
		beforeSend: function(){
			show_load_enid(".place_nombre_artista" , "Cargando ... " , 1); 						
			$(".place_nombre_artista").empty();
			$("#modifica-nombre-artista").click(t_up_nombre_artista);
		}
	}).done(function(data){
		valorHTML("#nuevo-nombre-artista" , data[0].nombre_artista);

	}).fail(function(){
		show_error_enid(".place_nombre_artista" , "Error al cargar nombre del artista, reporte al administrador");					
	});
}
/**/
function t_up_nombre_artista(){
	url =  "../escenarios/index.php/api/escenario/artista_nombre/format/json/";	
	nuevo_nombre =  $("#nuevo-nombre-artista").val();
	data_send =  { artista :  get_artista() , nuevo_nombre  : nuevo_nombre ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()  }
	/*Valiadamos antes de actualizar */
	flag =  valida_text_form("#nuevo-nombre-artista" , ".place_nombre_artista" , 2 , "Nombre para el artista" ); 
	if (flag == 1 ){
		$.ajax({
			url :  url , 
			type : 'PUT' , 
			data : data_send ,
			beforeSend:function(){
				show_load_enid(".place_nombre_artista" , "Actualizando ... " , 1); 						
			}
		}).done(function(data){											
			/**/
			$("#edit-nombre-artista").modal("hide");
			show_response_ok_enid(".place_config_artistas" ,  "Nombre del artista  actualizado con éxito.! " ); 								
			load_data_escenario_artista();		
			

		}).fail(function(){			
			show_error_enid(".place_nombre_artista" , "Error al registrar el nombre del artista ");					
		});
	}		
}
/**/
function get_artista(){
	return  artista;
}
/**/
function set_artista(n_artista){
	artista =  n_artista;
}
/**/
function get_escenario(){
	return escenario; 
}
/**/
function set_escenario(n_escenario){
	escenario  = n_escenario;
}
/**/
function set_evento(n_evento){
	evento =  n_evento;
}
/**/
function get_evento(){
	return evento; 
}
/**/
function get_nombre_evento(){
	return nombre_evento; 
}
/**/
function set_nombre_evento(n_nombre_evento){
	nombre_evento  =  n_nombre_evento;
}
/**/
function set_nombre_escenario(n_nombre_escenario){
	nombre_escenario = n_nombre_escenario;
	llenaelementoHTML(".nombre_escenario_lb" , nombre_escenario);
}
/**/
function get_nombre_escenario(){
	return nombre_escenario;
}
/**/
function get_in_session(){
	return in_session;
}
/**/
function set_in_session(n_in_session){
	in_session = n_in_session;
}
function  set_nombre_artista(n_nombre_artista){
	llenaelementoHTML(".place_nombre_artista" , n_nombre);
}
/**/
function get_nombre_artista(){
	return nombre_artista;
}
