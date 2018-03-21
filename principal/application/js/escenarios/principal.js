/*lista el nombre del los escenarios en el botton */
function list_informe_artistas(e){
	evento = e.target.id;
	dinamic_section =  ".dinamic_section" + evento; 
	url = "../escenarios/index.php/api/escenario/escenario_evento_artista/format/json/";
	$.ajax({

			url : url , 			
			data: {"evento" : evento}, 
			type: "GET", 
			beforeSend: function(){
				/*Cargando .... */				
				show_load_enid(dinamic_section  , "Cargando .. " , 1); 
			}
		}).done(function(data){
			llenaelementoHTML(dinamic_section ,  data );
			$(".menos_info_artistas").click(menos_info_bloque_evento);
		
		}).fail(function(){
			show_error_enid(dinamic_section  , "Error al cargar, reporte al administrador"); 
		});
}
/*lista el nombre del los escenarios en el botton */
function list_informe_escenarios(e){
	
	evento = e.target.id;	
	url = "../escenarios/index.php/api/escenario/escenario_evento/format/json/";
	dinamic_section =  ".dinamic_section" + evento; 
	llenaelementoHTML(dinamic_section , "");
	$(".in_session").val();

	$.ajax({
			url : url , 			
			data: {"evento" : evento , in_session :  in_session ,  "public" : 0  }, 
			type: "GET", 
			beforeSend: function(){							
				show_load_enid(dinamic_section  , "Cargando .. " , 1); 
			}
		}).done(function(data){

			llenaelementoHTML( dinamic_section , data);
			$(".escenario_evento_nuevo").click(registro_escenarios_evento);
			$(".menos_info_escenario").click(menos_info_bloque_evento);

		}).fail(function(){			
			show_error_enid(dinamic_section   , "Error en la carga, reporte al administrador "); 
			console.log("Error al cargar el escenario");

		 });

}



/**/
function registro_escenarios_evento(e){
	id_evento = e.target.id;			
	$(".evento_escenario").val(id_evento);
	$("#registra-nuevo-escenario-form").submit(function(e){			
		flag =  	valida_text_form("#nuevo-escenario" , ".place_nombre_escenario" , 2 , "Nombre para el escenario " ); 		
		if (flag == 1 ) {
			url = "../escenarios/index.php/api/escenario/escenario_evento/format/json/";				
			data_send =  $("#registra-nuevo-escenario-form").serialize(); 		
			$.ajax({
				url : url , 
				type : "POST", 
				data : data_send , 
				beforeSend :  function(){			
					$(".escenario_evento_nuevo").attr({'disabled': 'disabled'});

					show_load_enid(".place_nuevo_escenario" , "Registrando escenarios al evento ...  " , 1 );			
					$(".place_nombre_escenario").empty();
				}
			}).done(function(data){			
				next =  now + "index.php/escenario/configuracionavanzada/"+ data;
				show_response_ok_enid(".place_nuevo_escenario" , "Escenario registrado con éxito .!" ); 
				redirect(next);				
			}).fail(function(){
				show_error_enid(".place_nuevo_escenario", "Error al cargar el escenario al evento reporte al administrador" );
			});


		}
		
		e.preventDefault();



	});
}
/**/
/**/
function menos_info_bloque_evento(e){	
	evento = e.target.id;
	dinamic_section =  ".dinamic_section" + evento; 
	llenaelementoHTML(dinamic_section ,  "");
	
}