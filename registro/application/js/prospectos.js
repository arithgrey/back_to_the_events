var msj_inicia_session =  "<a class='msj_inicia_session' href='../login'>  Ó inicia sesión </a>";
$(document).ready(function(){
	/**/
	$(".btn_call_to_action").click(muestra_form);
	$(".form_prospectos").submit(registra_prospecto);
	$(".pass").change(muestra_input_form);
	$(".pass").click(muestra_input_form);
	$(".mail").change(change_to_lower_case);
});
/**/
function get_msj_inicia_session(){
	return msj_inicia_session;
}
/**/
function set_msj_inicia_session(new_msj){
	msj_inicia_session = new_msj;
}


/**/
function muestra_form(){
	$(".form_prospectos").show();
}
/**/
function registra_prospecto(e){

	/**/
	flag_validate =   valida_text_form("#pass" , ".place_pass" , 7 , "El password que has registrado es " );
	if (flag_validate ==  1) {
	
	flag_validate2 =   valida_text_form("#pass2" , ".place_pass2" , 7 , "El password que has registrado es " );
	if (flag_validate2 ==  1) {

		flag = valida_email_form(".mail" ,  ".place_mail" );	
		if (flag ==  1) {
			$(".place_mail").empty();
			
			flag = valida_text_form("#organizacion" , ".place_organizacion" , 3 , "Nombre de tu organizacion ");

			if (flag ==  1){		

				flag = valida_cadenas_iguales("#pass" , "#pass2" ,  ".place_pass2" , "Las contraseñas deben ser iguales"  ); 
				if (flag ==  1 ) {
		
				password = ""+CryptoJS.SHA1($("#pass").val());
				password2 = ""+CryptoJS.SHA1($("#pass2").val());

				data_send =  $(".form_prospectos").serialize() + "&" + $.param({"password": password , "password2" : password2});				
				url =  $(".form_prospectos").attr("action");					

				
				$.ajax({
					url : url ,
					type: "POST", 
					data : data_send ,
					beforeSend: function(){
						show_load_enid(".place_user_registro" ,  "Registrando ... " , 1 );
					}

				}).done(function(data){
						
						$(".place_mail").empty();
						$(".place_user_registro").empty();

						console.log(data);		
						base_path =  "../principal/";						

						if (data.status_user_registrado ==  1 ) {
							get_alerta_enid(".place_mail" ,  "Intenta con otro correo electrónico éste ya se encuentra registrado  " + get_msj_inicia_session() );
						}
						if (data.estatus_registro_empresa ==  0 ) {
							get_alerta_enid(".place_organizacion" ,  "Intenta con otro nombre éste ya se encuentra registrado " + get_msj_inicia_session() );

						}
						if(data.estatus_empresa ==  true) {
							show_response_ok_enid(".place_user_registro"  , "Cuenta registrada con éxito.!" );										
							redirect(base_path);
						}
								
				}).fail(function(){
					
						show_error_enid(".place_mail", "Error en el registro reporte al adminitrador");
				});

				

				}

			}
		}

	}

}

	/**/
	e.preventDefault();
}
/**/
function muestra_input_form(){
	$(".seccion_pass").show();
}
function change_to_lower_case(){

	correo =  $(".mail").val();
	nuevo_val =  correo.toLowerCase();
	$(".mail").val(nuevo_val);
	
}
