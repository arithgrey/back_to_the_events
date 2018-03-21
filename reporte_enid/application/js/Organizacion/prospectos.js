$(document).ready(function(){
	/**/
	$(".btn_call_to_action").click(muestra_form);
	$(".form_prospectos").submit(registra_prospecto);
});
/**/
function muestra_form(){
	$(".form_prospectos").show();
}
/**/
function registra_prospecto(e){
	
	flag = valida_email_form(".mail" ,  ".place_mail" );	
	if (flag ==  1) {
		url =  $(".form_prospectos").attr("action");
		console.log($(".form_prospectos").serialize());
		$.ajax({

			url : url ,
			type: "POST", 
			data : $(".form_prospectos").serialize(),
			beforeSend: function(){
				show_load_enid(".place_user_registro" ,  "Registrando ... " , 1 );
			}

		}).done(function(data){

			$(".place_mail").empty();
			$(".place_user_registro").empty();

			console.log(data);		
			if(data.status_actualizacion ==  1 ){
				show_response_ok_enid(".place_user_registro"  , "Información actualizada, inicia sessión ahora.!" );					
				inicio_session =  now + "index.php/startsession?q=1";		
				redirect(inicio_session);
			}
			if(data.status_actualizacion ==  2 ){
				show_response_ok_enid(".place_user_registro"  , "Información actualizada, inicia sessión ahora.!" );					
				inicio_session =  now + "index.php/startsession?q=2";		
				redirect(inicio_session);
			}
			if (data.estatus_registro_empresa ==  0 ) {
				get_alerta_enid(".place_empresa" ,  "Intenta con otro nombre de empresa" );

			}
			if(data.estatus_empresa ==  true) {
				show_response_ok_enid(".place_user_registro"  , "Cuenta registrada con éxito.!" );					
				nex_url =  now +"index.php/inicio/eventos/az4299Cv28R/";
				redirect(nex_url);
			}

			/*			
				if (data.estatus_empresa_text == 0 ) {
					show_response_ok_enid(".place_mail"  , "Ya tienes una cuenta registrada inicia sessión" );					
					inicio_session =  now + "index.php/startsession?q=2";		
					setTimeout(redirect(inicio_session), 10000);	
				}
			*/
			
					
		}).fail(function(){
			show_error_enid(".place_mail", "Error en el registro reporte al adminitrador");
		});
	}
	/**/
	e.preventDefault();
}