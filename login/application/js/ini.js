$(document).on("ready", function(){
	$("#inbutton").click(trysession);
	$(".form-pass").submit(recupera_password);
	$("#olvide-pass").click(carga_mail);

});
/**/
function trysession(){
	

	pw = $.trim($("#pw").val());
	if(pw.length >= 8){
		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		mail = $('#mail').val();		
		/*Validamos el mail*/
		if (!expr.test(mail)) {
			llenaelementoHTML(".reportesession" , "Registre un email correcto");
			recorrepage("#mail");	
		}else{
			pwpost = ""+CryptoJS.SHA1(pw);
			$("#secret").val(pwpost);			
			
			url = $("#in").attr("action");
			$.ajax({
					url : url , 
					type : "POST" , 
					data: $("#in").serialize(), 
					beforeSend : function(){						
						show_load_enid(".place_status_inicio" ,  "Validando datos " , 1 );
					} 					
					}).done(function(data){			

						//console.log(data);
						/*Cuando regresamos los datos*/						
						if (data == 1 ) {
							$("#reportesession").empty();
							show_response_ok_enid(".place_status_inicio", "Bienvenido!");
							next  = "../principal";
							redirect(next);					
						}else{							
							llenaelementoHTML( "#reportesession" ,  "<span class='alerta_enid'>" + data + "</span>");
							$(".place_status_inicio").empty();

						}


			}).fail(function(){							
				show_error_enid(".place_status_inicio" , "Error al iniciar sessión");
				
			});
			
		}
	}else{		
		/*Regresamos el error*/
		llenaelementoHTML(".reportesession" , "Contraseña muy corta");
		/*Deslizamos el navegador al error*/
		recorrepage("#pw");
	}	
	return false;
}
/**/
function recupera_password(e){

	/*Valida previo a enviar */
	flag= valida_email_form("#email_recuperacion" ,  ".place_recuperacion_pw" );  
	
	if (flag ==1 ){
		$(".place_recuperacion_pw").empty();
		url = $(".form-pass").attr("action");	
		$.ajax({
			url :  url , 
			type: "POST", 
			data: $(".form-pass").serialize(),
			beforeSend: function(){
				show_load_enid( ".place_recuperacion_pw" , "Enviando a tu correo electrónico ... " , 1 ); 						
			}
		}).done(function(data){
			/**/
			$('#contenedor-form-recuperacion').find('input, textarea, button, select').attr('disabled','disabled');
			
			console.log(data);
			llenaelementoHTML(".place_recuperacion_pw" ,  "El correo de recuperación se ha enviado con éxito.!" ); 			
			show_response_ok_enid(".place_status_inicio" , "El correo de recuperación se ha enviado con éxito.!");	

		}).fail(function(){
			/**/
			show_error_enid(".place_recuperacion_pw"  , "Error en el envió, verifique que su correo sea correcto."); 
		});
	}
	e.preventDefault();	
}
/**/
function carga_mail(){
	mail =  $("#mail").val();
	$("#email_recuperacion").val(mail );
}