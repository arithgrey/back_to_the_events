$(document).ready(function(){	
	$("footer").ready(q_eventos);
	
    
});
function q_eventos(){	
		
		url = "../q/index.php/api/busqueda/eventos_enid/format/json"; 
		id_empresa  =  $(".empresa").val();
		$.ajax({
			url : url , 	
			type: "GET", 
			data: {q : ""},
			beforeSend : function(){			
				show_load_enid(".ultimos_eventos"  , "Cargando ..." , 1); 
			}
		}).done(function(data){

			llenaelementoHTML(".ultimos_eventos" , data );								

		}).fail(function(){	
			show_error_enid(".place_artista" , "Error al acargar los ultimos eventos de la empresa, reporte al administrador"); 
		});
		/**/	
}
