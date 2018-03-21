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
	console.log(flag);
	if (flag ==  1) {
		url =  $(".form_prospectos").attr("action");
		console.log($(".form_prospectos").serialize());

		

		$.ajax({

			url : url ,
			type: "POST", 
			data : $(".form_prospectos").serialize(),
			beforeSend: function(){

				show_load_enid(".place_mail" ,  "Registrando ... " , 1 );
			}

		}).done(function(data){
			console.log(data);			
			if (data.estatus_empresa ==  true) {
				show_response_ok_enid(".place_mail"  , "Tu correo ha sido registrado con éxito.!" );	
				nex_url =  now +"index.php/inicio/eventos/az4299Cv28R/";
				setTimeout(redirect(nex_url), 10000);
			}if(data.estatus_empresa ==  0){				
				inicio_session =  now + "index.php/startsession";		
				redirect(inicio_session);
			}			
		}).fail(function(){
			show_error_enid(".place_mail", "Error en el registro reporte al adminitrador");
		});
	}
	/**/
	e.preventDefault();
}