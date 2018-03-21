$(document).ready(function(){
	/**/	
	$(".nombres_user").click(e_nombre_user);
	$(".apellido_user_materno").click(e_apellido_user_materno);
	$(".apellido_user_paterno").click(e_apellido_user_paterno);
	/**/
	$(".user_grupo_text").click(e_grupo);
	$(".user_cargo_text").click(e_cargo);
	/**/
	$(".user_descripcion_text").click(e_user_descripcion);

	/**/
	$(".pfb").click(e_pfb_user);
	$(".ptw").click(e_ptw_user);
	$(".pwwww").click(e_pwwww_user);

	$(".edad_user_text").click(e_edad_user);
	$(".tel_contacto_text").click(e_telefono_user);
	$(".tel_contacto_text2").click(e_telefono_user2);

	/**/
	$(".user_rfc_text").click(e_rfc_user);
	$(".sexo_user_text").click(e_sexo_user);
	/**/
	$("#form_update_password").submit(update_password);

});
/**/
function e_nombre_user(){		

	$(".place_nombre").empty();
	showonehideone( ".nombre_user_e" , ".nombres_user" );
	$("#nombre_user").blur(t_e_nombre_user);	
}
/**/
function e_pfb_user(){
	$(".place_pfb").empty();
	showonehideone( ".pfb_e" , ".pfb" );
	$("#url_fb").blur(t_e_url_fb);		
}
/**/
function e_ptw_user(){
	
	$(".place_url_tw").empty();
	showonehideone( ".url_tw_e" , ".ptw");
	$("#url_tw").blur(t_e_url_tw);			
}
/**/
function e_pwwww_user(){
	$(".place_url_www").empty();
	showonehideone( ".url_www_e" , ".pwwww");
	$("#url_www").blur(t_e_url_www);			
}
/**/
function e_apellido_user_materno(){	
	$(".place_apellido_materno").empty();
	showonehideone( ".apellido_materno_e" , ".apellido_user_materno");
	$("#apellido_materno").blur(t_e_apellido_materno_user);	
}
/**/
function e_apellido_user_paterno(){
	$(".place_apellido_paterno").empty();
	showonehideone( ".apellido_paterno_e" , ".apellido_user_paterno");
	$("#apellido_paterno").blur(t_e_apellido_paterno_user);	
}
/**/
/*EDITANDO *EDITANDO *EDITANDO *EDITANDO *EDITANDO *EDITANDO *EDITANDO *EDITANDO *EDITANDO *EDITANDO *EDITANDO */
function t_e_nombre_user(){

	flag =  valida_text_form("#nombre_user" , ".place_nombre" , 5 , "Tu nombre es  " );	
	if (flag){
		nombre =  $("#nombre_user").val();
		update_q("nombre" ,  nombre ,  ".place_nombre" ); 
		nval =   $("#nombre_user").val();
		oculta_section_edit(".nombres_user" , ".nombre_user_e" ,  ".nombres_user" , nval ); 
	}
	
}
/**/
function t_e_url_fb(){

	flag =  valida_text_form("#url_fb" , ".place_pfb" , 12 , "El enlace de tu red social es " );	
	if (flag ==  1) {
		url_fb =  $("#url_fb").val();
		update_q("url_fb" ,  url_fb ,  ".place_pfb" ); 
		nval =    $("#url_fb").val();
		showonehideone(   ".pfb"  ,  ".pfb_e");	
	}
	
}
/**/
function t_e_url_tw(){

	flag =  valida_text_form("#url_tw" , ".place_url_tw" , 5 , "El enlace de tu red social  es " );	
	if (flag){
		url_tw =  $("#url_tw").val();
		update_q("url_tw" ,  url_tw ,  ".place_url_tw" ); 
		nval =    $("#url_tw").val();
		showonehideone( ".ptw" ,  ".url_tw_e" );	
	}	
}
/**/
function t_e_url_www(){	

	flag =  valida_text_form("#url_www" , ".place_url_www" , 12 , "El enlace de tu página web es " );	
	if (flag ==1 ) {
		url_www =  $("#url_www").val();
		update_q("url_www" ,  url_www ,  ".place_url_www" ); 
		nval =    $("#url_www").val();	
		showonehideone(".pwwww" ,".url_www_e" );
	}
}
/**/
function t_e_apellido_materno_user(){
	flag =  valida_text_form("#apellido_materno" , ".place_apellido_materno" , 5 , "Tu apellido materno es  " );		
	if (flag){

		apellido_materno  =  $("#apellido_materno").val();
		update_q("apellido_materno " ,  apellido_materno  ,  ".place_apellido_materno" ); 
		nval =   $("#apellido_materno").val();
		oculta_section_edit(".apellido_user_materno" , ".apellido_materno_e" ,  ".apellido_user_materno" , nval ); 	
	}
}
/**/
function t_e_apellido_paterno_user(){

	flag =  valida_text_form("#apellido_paterno" , ".place_apellido_paterno" , 5 , "Tu apellido paterno  es  " );	
	if (flag){

		apellido_paterno  =  $("#apellido_paterno").val();
		update_q("apellido_paterno " ,  apellido_paterno  ,  ".place_apellido_paterno" ); 
		nval =   $("#apellido_paterno").val();
		oculta_section_edit(".apellido_user_paterno" , ".apellido_paterno_e" ,  ".apellido_user_paterno" , nval ); 	
	}
}
/**/
function update_q(campo ,  valor ,  place_load ){
	/**/
	url =  now + "index.php/api/user/q/format/json/"; 	
	$.ajax({
		url :  url  ,
		type :  "PUT", 
		data: {"q" : campo ,  "valor" : valor }, 		
		beforeSend: function(){			
			show_load_enid( place_load   , "Registrando ... " , 1 );	
		}
	}).done(function(data){		
		show_response_ok_enid(place_load , "Datos actualizados con éxito ");	

	}).fail(function(){		
		show_error_enid(place_load ,  "Error al registrar los cambios, reporte al administrador");
	});
}
/**/
function oculta_section_edit(show , hide ,  section_val , val ){	
	showonehideone(show , hide );
	llenaelementoHTML(section_val , val );
}
/**/
function e_grupo(){	
	showonehideone(".grupo_e" , ".user_grupo_text" );		
	$(".nuser_grupo").change(t_e_grupo_user);	
}
/**/
function e_cargo(){
	showonehideone(".cargo_e" , ".user_cargo_text" );		
	$(".nuser_cargo").change(t_e_cargo_user);		
}

function t_e_grupo_user(){

	grupo =  $(".nuser_grupo").val(); 
	update_q("grupo" ,  grupo  ,  ".place_grupo" ); 
	showonehideone( ".user_grupo_text"  , ".grupo_e" );		
	llenaelementoHTML(".user_grupo_text" ,  "GRUPO : "+ grupo);
}
/**/
function t_e_cargo_user(){

	cargo =  $(".nuser_cargo").val(); 
	update_q("cargo" ,  cargo  ,  ".place_cargo" ); 
	showonehideone( ".user_cargo_text"  , ".cargo_e" );		
	llenaelementoHTML(".user_cargo_text" , "CARGO: "+ cargo);	
}
/**/
function e_user_descripcion(){

	$(".place_descripcion").empty();
	showonehideone( ".user_descripcion_e" , ".user_descripcion_text");
	$("#descripcion_user").blur(t_e_descripcion_user);	

}
function t_e_descripcion_user(){

	flag =  valida_text_form("#descripcion_user" , ".place_descripcion" , 50 , "El texto que redactaste para tu descripción  " );	
	
	if (flag ==1 ) {

		descripcion_user  =  $("#descripcion_user").val();
		update_q("descripcion_usuario" ,  descripcion_user  ,  ".place_descripcion" ); 
		nval = $("#descripcion_user").val(); 
		nval =  "<label><small> Acerca de ti : </small></label>" + nval; 
		oculta_section_edit(".user_descripcion_text" ,".user_descripcion_e" ,  ".user_descripcion_text" , nval ); 	
	}
}
/**/
function e_edad_user(){

	showonehideone(".edad_e" , ".edad_user_text"  );	
	$(".edad_user").change(t_e_edad_user);	
}
function t_e_edad_user(){

	edad =  $(".edad_user").val();	
	update_q("edad" ,  edad  ,  ".place_edad" ); 	
	oculta_section_edit(".edad_user_text" , ".edad_e" ,  ".edad_user_text" , edad ); 	
}
/**/
function e_telefono_user(){
	
	showonehideone(".tel_e" , ".tel_contacto_text"  );	
	$(".tel_contacto").change(t_e_telefono_user);		
}
/**/
function e_telefono_user2(){
	showonehideone(".tel_e2" , ".tel_contacto_text2"  );	
	$(".tel_contacto2").change(t_e_telefono_user2);			
}
/**/
function t_e_telefono_user(){
		
	flag =  valida_text_form("#tel_contacto" , ".place_tel" , 5 , "Número telefónico  " );			
	if (flag == 1 ) {


		flag  = valida_tel_form("#tel_contacto" , ".place_tel" );
		if (flag ==  1 ) {
			ntel  = $(".tel_contacto").val(); 
			update_q("tel_contacto" ,  ntel  ,  ".place_tel" );
			oculta_section_edit( ".tel_contacto_text" , ".tel_e" ,  ".tel_contacto_text" , ntel ); 	
		}		
	}
}
/**/
function t_e_telefono_user2(){

	flag =  valida_text_form("#tel_contacto2" , ".place_tel2" , 5 , "Número móvil  " );				
	if (flag == 1 ) {

		flag  = valida_tel_form("#tel_contacto2" , ".place_tel2"  );
		if (flag ==  1 ) {
			ntel  = $(".tel_contacto2").val(); 
			update_q("tel_contacto_alterno" ,  ntel  ,  ".place_tel2" );
			oculta_section_edit( ".tel_contacto_text2" , ".tel_e2" ,  ".tel_contacto_text2" , ntel ); 	
		}
		
	}
}
/**/
function e_rfc_user(){

	$(".place_rfc").empty();
	showonehideone(".user_rfc_e" , ".user_rfc_text"  );	
	$(".rfc").blur(t_e_rfc);				
}
/**/
function t_e_rfc(){
	

	flag =  valida_text_form("#rfc" , ".place_rfc" , 5 , "Tu RFC  es " );			
	if (flag == 1) {
		nrfc  = $(".rfc").val(); 
		update_q("rfc" ,  nrfc  ,  ".place_rfc" );
		oculta_section_edit( ".user_rfc_text" , ".user_rfc_e" ,  ".user_rfc_text" , nrfc ); 			
	}
	
}
/**/
function e_sexo_user(){

	$(".place_sexo").empty();
	showonehideone(".sexo_e" , ".sexo_user_text"  );	
	$(".sexo").change(t_e_sexo);					
}
/**/
function t_e_sexo(){
	sexo  = $(".sexo").val(); 
	update_q("sexo" ,  sexo  ,  ".place_sexo" );
	oculta_section_edit(  ".sexo_user_text" , ".sexo_e"  ,  ".sexo_user_text" , sexo ); 			
}
/**/
function update_password(e){

	//anterior = "" +CryptoJS.SHA1(a);	
	flag = 0; 
	flag2 = 0;
	flag3 = 0;
	flag =  valida_text_form("#password" , ".place_pw_1" , 7 , "Texto " );			
	flag2 =  valida_text_form("#pw_nueva" , ".place_pw_2" , 7 , "Texto " );			
	flag3 =  valida_text_form("#pw_nueva_confirm" , ".place_pw_3" , 7 , "Texto " );			
	nueva_password = 0;
	
	msj_user = "";
	if (flag == flag2 && flag ==  flag3) {
	
			/*Ahora validamos que no sean las mismas que la antigua*/			
			if ($("#password").val() !=  $("#pw_nueva").val() ){nueva_password =  1;}else{nueva_password =  2;}
			if ($("#password").val() !=  $("#pw_nueva_confirm").val() ){nueva_password =  1;}else{nueva_passwor	 =  2;}		
	}


	switch(nueva_password){
		case 1: 
			a = $("#password").val();
			b = $("#pw_nueva").val();
			c = $("#pw_nueva_confirm").val();
			anterior = "" +CryptoJS.SHA1(a);
			nuevo = "" +CryptoJS.SHA1(b);
			confirma = "" +CryptoJS.SHA1(c);
			actualiza_password(anterior , nuevo , confirma); 			
			break;
		case 2:			
			llenaelementoHTML(".msj_password" , "La nueva contraseña no puede ser igual a la actual ");
			break;
		default: 
			break;
	}

	e.preventDefault();
}
/**/
function termina_session(){

	url =   '../home/index.php/home/logout';
	redirect(url);	
}

function  actualiza_password(anterior , nuevo , confirma){
	
	url = now + "index.php/api/cambiopasswordcontrolador/actualizarPassword/format/json";	
	$.ajax({
			url : url , 
			type :  "POST", 
			data : { "nuevo": nuevo, "anterior": anterior, "confirma": confirma }, 
			beforeSend : function(){				
				show_load_enid( ".msj_password"   , "Registrando ... " , 1 );	
			}
		}).done(function( data ){					


			if (data == true){	

				show_response_ok_enid(".msj_password" , "Contraseña actualizada correctamente, inicia sessión para verificar el cambio.");	
				setInterval('termina_session()',3000);
			}else{
				llenaelementoHTML(".msj_password" , data );			
			}			
	}).fail(function(){		
		show_error_enid(".msj_password", genericresponse[0]);
	});	
}