$(document).ready(function(){
	$(".mail").click(show_more_fields);
	$("#form-registro").submit(validate_form);
	$(".privacidad_condiciones").click(set_val_condiciones);
	var  f=0;
	var  f1=0;
	var  f2=0;
	var  f3=0;
	var pw_cifrada =  ""; 
	var pw_cifrada2 =  ""; 
	

});
/**/
function show_more_fields(){
	$(".hidden-empresa").show();
}
/**/
function validate_form(e){
	
	$("#form-registro").serialize();
	secret = $("#secret").val(); 	
	set_flag_user(valida_email_form("#mail" , ".place_user" ));
	set_flag_emp(valida_text_form("#org" , ".place_org" , 3 , "Nombre para la organización" )); 	                      
	set_flag_pw(validate_format_num_pass( "#pw", ".place_pw" , 7 ));
	set_flag_pw2(validate_format_num_pass( "#pw2", ".place_pw2" , 7 ));
	secret = $.trim($("#pw").val())
	secret2 = $.trim( $("#pw2").val());
	flag_presumit=  pre_submit( secret , secret2 );	
	
	if (flag_presumit  ==  1 ){
		if ($(".privacidad_condiciones").val() == 1 ){
			set_pass(secret);
			set_pass2(secret);
			$("#pw").val(get_pass());
			$("#pw2").val(get_pass2());		
			url =  now+ "index.php/api/emp/nueva/format/json/";			
			
			console.log($("#form-registro").serialize());
			$.ajax({
				url : url , 
				type: "POST",
				data : $("#form-registro").serialize(),
				beforeSend: function(){
					show_load_enid(".place_estatus_registro" , "Registrando ... " , 1);
				}
			}).done(function(data){		

				$(".place_estatus_registro").empty();	
				console.log(data);
				if (data.estatus ==  true){
					show_response_ok_enid(".place_estatus_registro", "Cuenta registrada con éxito.!"); 	
					url_next =  now + "index.php/startsession/"; 
					redirect(url_next);
				}else{

					place_part =  data.campo;
					mensaje_user = data.msj; 
					console.log(place_part);
					place  =  ".place_" + place_part;	
					llenaelementoHTML( place ,  "<span class='alerta_enid'>" + mensaje_user + "</span>");	
				}	
				
			}).fail(function(){
				show_error_enid(".place_estatus_registro" , "Error al registrar, reporte al administrador");
				console.log("Error al registrar, reporte al administrador ");
			});	
		}else{	
			llenaelementoHTML( ".place_estado_privacidad" ,  "<span class='alerta_enid'>No ha acepto las condiciones de uso y privacidad</span>");	
		}	
	}

	e.preventDefault();
}
/**/

/**/
function pre_submit(pass , pass2){

	flag = 0; 		
	a = get_flag_user();
	b = get_flag_emp();
	c=   get_flag_pw(); 
	d= get_flag_pw2();

	clean_msj(a ,".place_user");
	clean_msj(b , ".place_org" );
	clean_msj(c , ".place_pw" );
	clean_msj(d , ".place_pw2");


	if (a == 1  && b ==  1 && c == 1 && d == 1 ){		
		flag =1;
	}
	if (flag==1 ){

		if (pass !=  pass2 ){
			flag =0;
			mensaje_user =  ""; 
			if (flag == 0) {
				$("#pw2").css("border" , "1px solid rgb(13, 62, 86)");				
				mensaje_user =  "Password distintas"; 
			}
			llenaelementoHTML( ".place_pw2" ,  "<span class='alerta_enid'>" + mensaje_user + "</span>");			
		}
	}
	return flag;
}
/**/
function set_flag_user(new_flag){
	f = new_flag;	
}
/**/
function get_flag_user(){	
	return  f;
}
/**/
function set_flag_emp(new_flag){
	f1 =  new_flag;	
}
/**/
function get_flag_emp(){
	return f1;
}
/**/
function set_flag_pw(new_flag){
	f2 =  new_flag;
}
/**/
function get_flag_pw(){
	return f2;	
}
/**/
function set_flag_pw2(new_flag){
	f3 =  new_flag;
}
/**/
function get_flag_pw2(){
	return f3;	
}
/**/
function set_pass(new_text){
	pw_cifrada =  ""+CryptoJS.SHA1(new_text);	
}
/**/
function get_pass(){
	return pw_cifrada;
}
/**/
function set_pass2(new_text){	
	pw_cifrada2 = ""+CryptoJS.SHA1(new_text);
}
/**/
function get_pass2(){
	return pw_cifrada2;
}
/**/
function clean_msj(val , place ){
	if (val ==1 ) {
		$(place).empty();
	}
}
/**/
function set_val_condiciones(){	
	if ($(".privacidad_condiciones").val(0) ){
		$(".privacidad_condiciones").val(1);	
	}else{
		$(".privacidad_condiciones").val(0);	
	}	
}