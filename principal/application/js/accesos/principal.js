function reporte_accesos(e){

	evento = e.target.id;
	dinamic_section = ".dinamic_section" + evento;	
	url = "../accesos/index.php/api/accesos/tipoacceso/format/json/";	
	$.ajax({

		url  : url , 
		type : "GET", 
		data : {"evento" : evento}, 
		beforeSend: function(){		
			show_load_enid(  dinamic_section  , "Cargando .." , 1); 
		}

	} ).done(function(data){		
		llenaelementoHTML( dinamic_section , data );
		$(".menos_info_puntos_venta").click(menos_info_bloque_evento);
	}).fail(function(){		
		show_error_enid(dinamic_section  , "Error al cargar los accesos registrados en el evento, reporte al administrador "); 
	});
}
