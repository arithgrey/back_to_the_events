function  nuevo_escenario(e){

	url =  "../escenarios/index.php/api/escenario/escenario_evento/format/json/";			
	flag =  valida_text_form("#nuevo-escenario-input" , ".place_nuevo_escenario" , 5 , "Nombre designado al escenario"); 

	if (flag ==  1  ) {
		$.ajax({
			url :  url , 
			data : $("#form-escenario").serialize()+"&"+ $.param({"enid_evento" : enid_evento}), 
			type : "POST", 
			beforeSend: function(){				
				show_load_enid(".section_escenarios_admin" , 1 );
			}
		}).done(function(data){
			
			show_load_enid(".section_escenarios_admin" ,  "Registrado!");		
			next =  "../administracion_escenario/?q="+ data; 
			redirect(next);

			
		}).fail(function(){			
			show_error_enid(".place_nuevo_escenario" , "Error al registrar escenario al evento " ); 
		});
	}	
	e.preventDefault();
}
/**/
function update_description_escenario(e){	
	idescenario = e.target.id;
	inpu_escenario_ =  "#inpu_escenario_" + idescenario;		
	span= "#"+ idescenario;
	showonehideone( inpu_escenario_ , span );

	$(inpu_escenario_).blur(function(){
		nuevovalor =  $(this).val(); 
		update_description_in_db( idescenario , nuevovalor);
	});
	/*Registramos cambios */	
}
/**/
function update_description_in_db(idescenario , nuevadescripcion ){ 	
 		evento_escenario =  $("#evento").val(); 		
 		url = now + "index.php/api/escenario/updatedescripcionescenario/format/json/"; 				
		data_send = {"idescenario" :  idescenario , "nuevadescripcion" :  nuevadescripcion, "evento_escenario" :  evento_escenario }
		updates_send(url , data_send);
		load_data_escenarios();	
}
/*************************************************************************/
function t_delete_escenario(e){
	id_escenario = e.target.id;		
	$("#aceptar-delete").click(function(){
		delete_escenario(id_escenario); 	
	});	
}
/**/
function delete_escenario(id_escenario){	
	url = now + "index.php/api/escenario/escenarion_evento/format/json/";
	$.ajax({			
			url : url , 
			type :  "DELETE", 
			data :  {escenario :  id_escenario }, 
			beforeSend : function(){
				$(".section_escenarios_admin").empty();
				show_load_enid(".place_nuevo_escenario" , "Eliminando escenario del evento" , 1); 	
			}
		}).done(function(data){			
			show_response_ok_enid( ".place_nuevo_escenario", "Escenario eliminado con éxito"); 
	 		load_data_escenarios();

		}).fail(function(){
			show_error_enid(".place_nuevo_escenario" , "Error al eliminar, verifique el procedimiento almacenado" ); 
		});
}

/********************************************************************+*/
function update_escenario_modal(e){

	idescenario = e.target.id;
	url = "../escenarios/index.php/api/escenario/loadescenariobyid/format/json/";
 
		$.get(url , { "idescenario" :  idescenario } )
			.done(function(data){

				
				llenaelementoHTML( ".general-info-modal" , data[0] );
				llenaelementoHTML(".descripcion-modal-text", data["descripcion"]);
				llenaelementoHTML(".general-artistas" , data["artistas"]);
				llenaelementoHTML(".day_escenario_button" , "<i class='fa fa-calendar'></i> Presentación " + data["iniciotermino"]);				
				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);
				valorHTML("#nombre-escenario-input-modal" ,  data["nombreescenariomodal"] );
				valorHTML(".input_tipo" , data["tipoescenario"] );
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);
				
				$(".descripcion-modal-text").click(update_description_in_modal);
				$(".remove-artista").click(remove_artista_in_escenario);
				$(".tipo-evento-modal").click(update_tipo_escenario);
				$(".nombre-escenario-modal").click(update_nombre_escenario);
				$('.day_escenario_button').click(update_days_escenario);
				$('.horario_artista').click(update_horario_artista);
				$('#avanzado-config-escenario').click(function(){
					redirect( now + "index.php/escenario/configuracionavanzada/"+idescenario );
				});				

			}).fail(function(){
				
				console.log(genericresponse[0]);

			});

}
/**/
function nuevo_artista_escenario(){

	artistainput = $("#artistainput").val();
	idescenario = $("#idescenariomodalartistas").val();
	if (artistainput.length > 0 ) {
			url = "../escenarios/index.php/api/escenario/escenario_artista/format/json/";
			$.post( url , $("#form-artistas").serialize() )
			  .done(function( data ) {			    			  
			  		load_data_escenario(idescenario);
			  		load_data_escenarios();
			  		
			  		var fields =  ["#artistainput"];
			  		reset_fields(fields);
			  		
			  })
			  .fail(function(){			    
			    console.log(genericresponse[0]);
			});
	}
	return false;
}
/**/
function load_data_escenario(idescenario){

	url = "../escenarios/index.php/api/escenario/loadescenariobyid/format/json/";
 	

		$.get(url , { "idescenario" :  idescenario } )
			.done(function(data){						
				
				llenaelementoHTML( ".general-info-modal" , data[0] );
				llenaelementoHTML(".descripcion-modal-text", data["descripcion"]);
				llenaelementoHTML(".general-artistas" , data["artistas"]);			
				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);
				llenaelementoHTML(".day_escenario_button" , "<i class='fa fa-calendar'></i> Presentación " + data["iniciotermino"]);				
				valorHTML("#nombre-escenario-input-modal" ,  data["nombreescenariomodal"] );
				valorHTML(".input_tipo" , data["tipoescenario"] );
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);


				$(".descripcion-modal-text").click(update_description_in_modal);
				$(".remove-artista").click(remove_artista_in_escenario);
				$(".tipo-evento-modal").click(update_tipo_escenario);
				$(".nombre-escenario-modal").click(update_nombre_escenario);
				$('.day_escenario_button').click(update_days_escenario);
				$('.horario_artista').click(update_horario_artista);				

			}).fail(function(){				
				console.log(genericresponse[0]);
			});

}
/**/
function update_description_in_modal(){	

	$(".descripcion-in-modal-escenario").val($(this).text());
	showonehideone(".descripcion-in-modal-escenario" , ".descripcion-modal-text" );
	$(".descripcion-in-modal-escenario").blur(function(){

		url = now + "index.php/api/escenario/updatedescripcionescenariobyid/format/json/";
		data_send = {nuevadescripcion  : $(this).val()  ,  idescenario :  $("#idescenariomodalartistas").val()  }	
		updates_send(url , data_send);			
		load_data_escenario($("#idescenariomodalartistas").val() );
		showonehideone(".descripcion-modal-text" , ".descripcion-in-modal-escenario"  );
		load_data_escenarios();

	});

}
/********************************************************************************************/
function remove_artista_in_escenario(e){	
	
	artista = e.target.id;
	escenario = $("#idescenariomodalartistas").val();
	url = "../escenarios/index.php/api/escenario/escenario_artista/format/json";
	eliminar_data(url , {"idescenario" : escenario , "idartista": artista });		
	load_data_escenario(idescenario);	
	load_data_escenarios();					
}
/**********************************************************************/
function update_tipo_escenario(e){

	nuevovalotipoescenario  = e.target.id;	
	url = "../escenarios/index.php/api/escenario/escenario_tipo/format/json/"; 	
	data_send = {idescenario : $("#idescenariomodalartistas").val() , tipoescenario : nuevovalotipoescenario}
	actualiza_data(url , data_send);
	load_data_escenario($("#idescenariomodalartistas").val());
	load_data_escenarios();

}
/**/
function update_nombre_escenario(){

	showonehideone(".nombre-escenario-input-modal" , ".nombre-escenario-modal" );
	$(".nombre-escenario-input-modal").blur(function(){
		url = "../escenarios/index.php/api/escenario/escenario_campo/format/json/";			 		
		data_send = {  "campo" : "nombre" ,  nuevonombre : $(this).val() , escenario : $("#idescenariomodalartistas").val() }			 	
		actualiza_data(url , data_send);
		load_data_escenario($("#idescenariomodalartistas").val());
		load_data_escenarios();
		showonehideone(  ".nombre-escenario-modal" , ".nombre-escenario-input-modal");			 	
	});
}	
/**/
function update_days_escenario(){
 	showonehideone( ".day_escenario_inputs" , ".day_escenario_button" );
 	$("#nuevo_termino_escenario").blur(function(){

		nuevo_inicio =  $("#nuevo_inicio_escenario").val();
		nuevo_termino = $("#nuevo_termino_escenario").val();
		escenario  =  $("#idescenariomodalartistas").val();	

		url = now + "index.php/api/escenario/inicio_termino/format/json/";
		data_send = {"nuevoinicio" : nuevo_inicio , "nuevotermino" : nuevo_termino , "escenario" : escenario  }
		actualiza_data(url, data_send);
 		showonehideone(".day_escenario_button" , ".day_escenario_inputs" );
		load_data_escenario(idescenario);	
		load_data_escenarios();
 	}); 	 	
 }
 /**/
 function update_horario_artista(e){

 	idartista = e.target.id;
 	idescenario = $("#idescenariomodalartistas").val();
 	$("#tregistrohorario").click(function(){
 
		hiartista = $("#hiartista").val();
 		htartista = $("#htartista").val();
	 	url = now + "index.php/api/escenario/inicioterminoartista/format/json/";
		data_send = { artista : idartista , escenario : idescenario , hiartista : hiartista , htartista : htartista }
		actualiza_data(url , data_send);
		load_data_escenario(idescenario);	
		load_data_escenarios();
 	}); 	
}
/**/