$(document).ready(function(){
	$("footer").ready(carga_form_user);

});
/**/
function carga_form_user(){
	url =  now + "index.php/api/user/form_user/format/json/";
	$.ajax({
		url : url , 
		type :  "GET", 
		data : {}, 
		beforeSend : function(){				
			show_load_enid( ".seccion_user_form"   , "Registrando ... " , 1 );	
		}
	}).done(function( data ){					
		llenaelementoHTML(".seccion_user_form", data);
		$(".nueva_img_usuario").click(carga_form_imagenes_usuario);
	}).fail(function(){		
		show_error_enid(".seccion_user_form", genericresponse[0]);
	});	

}
