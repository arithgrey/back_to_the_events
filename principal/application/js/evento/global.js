$(document).ready(function(){	
	$("footer").ready(q_eventos);
	$("#nuevo-evento-form").submit(registra_evento);
	$("#nombre-nuevo-evento").click(function(){			
		$("#dinamic-field").show();		
	});
	//$(".delete_evento").click(delete_evento);
	$(".edith-fecha-evento").click(update_fecha_evento_evento);	


	//$(".puntos_venta_next").click(next_puntos_venta);	
    $("#dinamic_activity_section_right").click(dinamic_section_left);
    $("#dinamic_activity_section_left").click(dinamic_section_right);        
    	

    $( "#fecha_inicio" ).datepicker();
    $( "#fecha_termino" ).datepicker();

    $(".btn_nuevo_evento").click(evalua_disponibilidad);    
    evalua_q();    
    evalua_user_seccion();
    
});
/**/
function carga_informacion_extra(){
	/**/	

	url = "../q/index.php/api/event/otros/format/json/";	
	id_empresa  =  $(".empresa").val();

	$.ajax({
		url : url , 
		type :  "GET",
		data:  {"id_evento" :  1  , "id_empresa" :  id_empresa }	,
		beforeSend : function(){			
			show_load_enid( ".place_bloque_extra" , "Cargando ...  " , 1 ); 				
		}
	}).done(function(data){		
		//alert(data);		
		$(".place_bloque_extra").empty();
		llenaelementoHTML(".bloque_extra" , data);
	}).fail(function(){		
		show_error_enid(".place_bloque_extra" , "Error al cargar el escenario reportar al administrador"); 
	});

}
/**/
function q_eventos(){
	
	action_template =  $(".action_template").val();
	if (action_template != "7"){
		
		url = "../q/index.php/api/busqueda/eventos_empresa/format/json"; 
		id_empresa  =  $(".empresa").val();
		$.ajax({
			url : url , 	
			type: "GET", 
			data: {"id_empresa" : id_empresa },
			beforeSend : function(){			
				show_load_enid(".ultimos_eventos"  , "Cargando ..." , 1); 
			}
		}).done(function(data){

			llenaelementoHTML(".ultimos_eventos" , data );					
			$(".escenarios_evento").click(list_informe_escenarios);
			
			$(".escenarios_artistas_principal").click(list_informe_artistas);
			$(".acceso_evento").click(reporte_accesos);		
			$(".reservaciones_event").click(carga_reservaciones);

		}).fail(function(){
			show_error_enid(".place_artista" , "Error al acargar los ultimos eventos de la empresa, reporte al administrador"); 
		});
		/**/
		
	}
	
}
function registra_evento(e){

	flag =  valida_text_form("#nombre-nuevo-evento" , ".place_nombre" , 3 , "Nombre para el evento " ); 
	if (flag ==  1 ){

		/*Realizamos la validación por fechas*/
		flag2 =  valida_format_date("#fecha_inicio" , "#fecha_termino" , ".place_format_fecha" ,  "La fecha del evento no puede ser menor a la fecha actual");
		
		if (flag2 ==  0){

			url =  "../eventos/index.php/api/event/nuevo_evento/format/json";		
			$.ajax({
				url : url , 
				type: "POST" , 
				data :  $("#nuevo-evento-form").serialize() , 
				beforeSend :function(){		
					$(".place_nombre").empty();
					show_load_enid(".place_nuevo_evento", "Registrando evento ... " , 1); 			
				}
			}).done(function(data){
				
				show_response_ok_enid(".place_nuevo_evento" , "Evento registrado con éxito!");								
				redirect(data);			
				
				
			}).fail(function(){		
				show_error_enid(".place_nuevo_evento" , "Falla al registrar evento, reporte al administrador");			
			});
		}
		
	


	}	
	e.preventDefault();
}

/***            ***************************************                  ***************** **/
function update_fecha_evento_evento(e){
	
	id_evento = e.target.id;	 
	$("#update-susses").hide();	
	$("#update-fecha-evento-form").submit(function(){
		/*update evento */	 	
		 	update_inicio = $("#update_inicio").val();
		 	update_termino = $("#update_termino").val();
		 	url = "../eventos/index.php/api/event/date_by_id/format/json/";	 		 	
		 	actualiza_data(url , { "evento" : id_evento , "nuevo_inicio" : update_inicio , "nuevo_termino" : update_termino } );		
			id_new_tag = "#"+ id_evento;
			new_date = "<i class='fa fa-calendar-o'></i> " + update_inicio + "-" + update_termino; 	
		
			$("#update-susses").show();	
	 	/*update evento end */
		return false;
	});
}

/**/
function evalua_disponibilidad(){
	
	$(".seccion-form-eventos").show();
	
}
/**/

function carga_reservaciones(e){

	id_evento  =e.target.id;
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

				show_response_ok_enid( ".place_reservaciones", "Datos actualizados"); 
				$("#reservaciones-modal").modal("hide");
				q_eventos();
				
			}).fail(function(){
				show_error_enid(".place_reservaciones" , "Error al actualizar las reservaciones, reporte al administrador");
			});

		}

	}
	
	e.preventDefault();
}
/**/
function evalua_q(){
	
	
	var  q = $(".q").val();	

	url = "../../../../index.php/api/mailrest/prospecto/format/json/"; 	

	
	if(q.length == 11 ){
		//$("#prueba-enid").modal("show");

		$.ajax({
			url :  url ,
			data : {"q" : q } ,
			beforeSend: function(){

			}
		}).done(function(data){
			
			console.log(data);			
			url_next  = "../../../../index.php/mailclass/prospecto_user"; 						
			llenaelementoHTML(".place_notificacion_nuevo_user" , "<iframe width='100%'  height='600px' src='"+url_next+"' ></iframe>");
			
		}).fail(function(){			
			show_error_enid(".place_error_al_mandar_correo"  , "Error al enviar correo de notificación ");			
		});

	}
		
}
/**/
/**/
function evalua_user_seccion(){

	action_template =  $(".action_template").val();
	if (action_template == 7 ) {
		/**/
		url = "../q/index.php/api/busqueda/eventos_enid_user/format/json"; 
		$.ajax({
			url : url , 
			data: { "tipo_busqueda" : 1 , "q" : "a"  , "qtipo" :  "" ,  "precio_evento" : "" } ,
			type : "GET" ,
			beforeSend: function(){
				show_load_enid(".place_eventos_resumen", "Cargando ... " , 1 );
			}
		}).done(function(data){			
			
			$(".place_eventos_resumen").empty();
			llenaelementoHTML(".eventos_resumen" ,  data);

		}).fail(function(){
			show_error_enid(".place_resumen_eventos" , "Error al cargar el resumen de eventos perfil general ... "); 
		});

	}	
}