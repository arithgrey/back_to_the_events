$(document).ready(function(){
	$(".form-historia").submit(experiencia_empresa);
	$(".input-start").click(asigna_calificacion);
	flag_calificacion = 0;  
	//$("footer").ready(comentarios_empresa);
});
function experiencia_empresa(e){	

	flag_cal =  valida_calificacion(); 
	if (flag_cal == 1  ) {
			flag =  valida_text_form("#descripcion" , ".place_val_descripcion" , 5, "Comentario "); 
			if (flag ==  1 ){				
				url = $(".form-historia").attr("action");
				descripcion_cliente  = $("#descripcion").val();
				$.ajax({
					url : url , 
					data : $(".form-historia").serialize(), 
					type : "POST",
					beforeSend: function(){				
						show_load_enid(".place_experiencia" , "Registrando ... " , 1); 
						$(".place_val_descripcion").empty();
					} 
				}).done(function(data){
					show_response_ok_enid(".place_experiencia" ,  "Tu experiencia se ha registrado con éxito, pronto sabrás de nosotros." );				
					document.getElementById("form-historia").reset();
					$(".place_val_estrellas").empty();
					$("#contenidor-ranking").removeClass("animated infinite bounce");
					flag_calificacion =0;
				}).fail(function(){
					show_error_enid(".place_experiencia"  , "Error al registrar, reporte al administrador");			
				});		
			}
	}
	e.preventDefault();		
}
/**/
function asigna_calificacion(e){	
	calificacion  =  e.target.id; 
	$(".calificacion_cliente").val(calificacion);
	flag_calificacion++;
	valida_calificacion();
}
/**/
function valida_calificacion(){
	/**/	
	if (flag_calificacion == 0){
		$("#contenidor-ranking").addClass("animated infinite bounce");
		recorrepage("#enid-service-start"); 		
		llenaelementoHTML(".place_val_estrellas" , "<span class='msj-calificanos'> ayudanos a mejorar nuestros servicios, califícanos.!</span>");
		return 0;
	}else{
		$("#contenidor-ranking").removeClass("animated infinite bounce");
		$(".place_val_estrellas").empty();
		return 1;	
	}
}