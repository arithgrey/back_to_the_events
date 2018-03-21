$(document).ready(function(){
	$("footer").ready(conf_pais);
	$("#solicitud-ciudad-form").submit(registra_solicitud_ciudad);
	$("footer").ready(artistas_solicitados);
	
});
/**/
function registra_solicitud_ciudad(e){


	flag =  valida_text_form("#artista-solicitud" , ".place_val_artista" , 2 , "Nombre del artista"); 	
	if (flag ==  1 ) {
		flag2 =  valida_email_form("#email",  ".place_email" );
		if (flag2 == 1){
			$(".place_email").empty();

			url =  $("#solicitud-ciudad-form").attr("action");
			$.ajax({
				url : url , 
				type : "POST" , 
				data : $("#solicitud-ciudad-form").serialize() , 
				beforeSend :  function(){
					show_load_enid(".place_registro" , "Registrando tu ártista preferido" , 1 );				
					$(".place_val_artista").empty();
				}
			}).done(function(data){
				
				show_response_ok_enid(".place_registro" , "Solicitud registrada con éxito.!");	
				document.getElementById("solicitud-ciudad-form").reset();

			}).fail(function(){
				show_error_enid(".place_registro" , "Problemas al registrar tu solicitud, reporte al administrador");		
			});

		}
		


	}	
	
	e.preventDefault();
}
/**/
function artistas_solicitados(){
	
	url =  $("#solicitud-ciudad-form").attr("action");
	empresa =  $(".empresa").val();
	nombre_empresa =  $(".nombre_empresa").val();
	$.ajax({		
		url :  url , 
		type :  "GET",
		data :  {"empresa" :  empresa,  "nombre_empresa" :  nombre_empresa, "public" :  1 },
		beforeSend: function(){			
			show_load_enid(".place_artistas" , "Cargando solicitudes  " , 1 );				
		}
	}).done(function(data){
		llenaelementoHTML(".place_artistas" , data ); 								
	}).fail(function(){
		show_error_enid(".place_artistas" , "Problemas al cargar tu solicitud, reporte al administrador");				
	});
}

function conf_pais(){

	$('#ciudad_select>option[value="15"]').attr('selected', 'selected');						
}
