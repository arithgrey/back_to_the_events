var emp =  0;
var img_galeria = 0;

$(document).on("ready", function(){
	$("#img-logo-emp").click(muestra_seccciones);
	$("#nombre-empresa-text").click(try_update_nombre);
	$("#slogan-text").click(try_update_slogan);
	$("#artistas-empresa-text").click(try_update_artistas);
	$(".description-empresa-text").click(try_update_descripcion);
	$(".mision-empresa-text").click(try_update_mision);
	$(".vision-empresa-text").click(try_update_vision);
	$(".años-empresa-text").click(try_update_years);
	$(".mas-info-empresa-text").click(try_update_mas_info);
	
	$("#text-nombre-empresa").click(function(){
		$(".pais_empresa_input").show();
	});
	

	$(".social-fb").click(try_update_social_fb);
	$(".social-tw").click(try_update_social_tw);
	$(".social-gp").click(try_update_social_gp);
	$(".social-www").click(try_update_social_www);
	/*update socials */
	$("#form-social-fb").submit(update_form_social_fb);
	$("#form-social-tw").submit(update_form_social_tw);
	$("#form-social-gp").submit(update_form_social_gp);
	$("#form-social-www").submit(update_form_social_www);
	$(".client-history").click(next_page_history);
	$(".solicita-artista").click(next_page_artista);
	$("#btn-historia").click(next_page_history);
	$("#btn-artista").click(next_page_artista);
	//$("#section-us").click(load_artistas_solicitados);	
	/**/
	$("#section-us").click(oculta_secciones);
	//$("footer").ready(load_section_comunidad);
	$(".text-edit-mensaje-comunidad").click(edita_mensaje_comunidad);
	$(".btn_carga_img_logo").click(carga_form_imagenes_empresa_logo);
	//$("footer").ready(carga_iconos_comunidad);

	$(".lb-pais").click(carga_pais_empresa);
	$(".form-paises").submit(update_pais_empresa);

	$(".btn_configurar_enid_w").click(carga_reservaciones);

	/*
	$('nav, .nav-controller').on('click', function(event) {
        $('nav').toggleClass('focus');
    });
*/


    $(".links_enid").click(new_menu);

    /*
    $('nav, .nav-controller').on('mouseover', function(event) {
        $('nav').addClass('focus');
        $('.controller-open').hide();
        $('.controller-close').show();


    }).on('mouseout', function(event) {
        $('nav').removeClass('focus');
        $('.controller-open').show();
        $('.controller-close').hide();
    });

	*/

    $(".contenedor-quienes-somos").click(function(){
    	recorrepage("#descripcion-empresa-input");	
    });
    $(".contenedor-vision").click(function(){    	
    	recorrepage("#section-vision-empresa");	
    });
    $(".contenedor-mision").click(function(){
    	recorrepage("#section-mision-empresa");	
    });
    
	
	$(".btn_imgs_galeria").click(form_galeria);

	$(".galeria_imgs").click(carga_galeria_images_empresa);
	/**/

	$("#form_contacto").submit(registra_contacto);

	$("#form-direccion-emp").submit(registrar_direccion);
	set_emp($(".id_empresa").val());
	$("#form-info-contacto").submit(registrar_info_contacto);

	$("#confir_eliminar_img_galeria").click(delete_img_galeria);
	
});
/**/
function set_img_galeria(new_val){
	img_galeria =  new_val;
}
/**/
function get_img_galeria(){
	return img_galeria;
}
/**/
function set_emp(new_emp){
	emp = new_emp;
}
/**/
function get_emp(){
	return emp;
}
/**/
function carga_pais_empresa(){
	/**/
	url = $("#form-paises").attr("action");
	empresa = $(".id_empresa").val();

	$.ajax({
		url :  url , 
		type:  "GET",
		data:  { "empresa" :  empresa },
		beforeSend: function(){
			show_load_enid(".place_pais" , "Cargando país de la empresa ... " , 1);			
		}

	}).done(function(data){

		$(".place_pais").empty();
		console.log(data);
		$('#pais_empresa > option[value="'+ data[0].idCountry +'"]').attr('selected', 'selected');				

	}).fail(function(){
		show_error_enid(".place_pais" , "Falla al cargar paises disponibles, reporte al administrador");
	});
}
/**/
function new_menu(e){

	menu = e.target.id;		
	switch(menu){
		case "section-eventos":
			carga_eventos_empresa();
			break;
		default:			
			break;
	}			



}
/**/
function try_update_mas_info(){	
	valor = $("#mas-info-empresa-input").val();
	if (in_session == 1){
		showonehideone( "#section-mas-info" , "#mas-info-empresa-text_place" );
		$("#mas-info-empresa-input").blur(function(){
			flag =  valida_text_form("#mas-info-empresa-input" , ".response-update-mas-info" ,100  , "Texto descriptivo " ); 			
			if (flag ==  1) {
				cadena =  $(this).val();  
				update_data_emp("mas_info", cadena, ".response-update-mas-info"  , "#section-mas-info" , "#mas-info-empresa-text_place");		
				new_text(valor, cadena , ".mas-info-empresa-text"); 
			}				
		});	
	}	
}
/**/
function try_update_years(){
	
	primer_text =  $("#year-input").val(); 	
	if (in_session == 1  ){
		showonehideone( "#años-section" , "#años-empresa-text_place" );	
		$("#year-input").change(function(){
			cadena =  $(this).val();
			update_data_emp("years", cadena  , ".response-update-years" , "#años-section" , "#años-empresa-text_place"   );		
			new_text(primer_text, cadena , ".años-empresa-text"); 
		});
	}
}
/**/
function try_update_vision(){
	valor =  $("#descripcion-vision-input").val();
	if (in_session ==1){
		showonehideone( "#section-vision-empresa" , "#vision-empresa-text_place" );
		$("#descripcion-vision-input").blur(function(){
			flag =  valida_text_form("#descripcion-vision-input" ,".response-update-vision" , 100  , "Texto  descriptivo "); 
			if (flag ==  1 ) {
				cadena =  $(this).val(); 	
				update_data_emp("vision", cadena , ".response-update-vision" ,  "#section-vision-empresa" , "#vision-empresa-text_place");		
				new_text(valor, cadena , ".vision-empresa-text");		
			}				
		});
	}		
}
/**/
function try_update_mision(){
	valor = $("#mision-empresa-input").val();
	if (in_session == 1){
		showonehideone( "#section-mision-empresa" , "#mision-empresa-text_place" );
		$("#mision-empresa-input").blur(function(){	
			flag= valida_text_form("#mision-empresa-input" , ".response-update-mision" , 100 ,"Texto descriptivo" ); 
			if (flag ==  1 ) {
				cadena =  $(this).val();  	
				update_data_emp("mision", cadena , ".response-update-mision" , "#section-mision-empresa" , "#mision-empresa-text_place"  );		
				new_text(valor, cadena , ".mision-empresa-text");		
			}			
		});
	}
}
/**/
function try_update_descripcion(){
	/**/

	valor =  $(".descripcion-empresa-input").val();
	if (in_session==1 ){		

		showonehideone( "#section-description-empresa" , "#description-empresa-text_place");
		$("#descripcion-empresa-input").blur(function(){
			cadena =  $(this).val();  				
			flag =  valida_text_form(".descripcion-empresa-input" , ".place_descripcion" , 100 , "Descripción de la empresa " ); 			
			if (flag ==  1){
				update_data_emp("quienes_somos", cadena ,  ".response-update-quienes-somos" ,  "#section-description-empresa" , "#description-empresa-text_place" );						
				new_text(valor, cadena , ".description-empresa-text");
			}				
		});
	}
}
/*validate texto*/
function try_update_social_fb(){
	set_modal_social("fb"); 
}
/**/
function try_update_social_tw(){
	set_modal_social("tw"); 
}
/**/
function try_update_social_gp(){
	set_modal_social("gp"); 
}
function try_update_social_www(){
	set_modal_social("www"); 
}
/**/
function set_modal_social(val){
	$("#section-form-url-fb").hide();        	
	$("#section-form-url-tw").hide();
	$("#section-form-url-gp").hide();
	$("#section-form-url-www").hide();
	switch(val){
    case "fb":
        	llenaelementoHTML(".title-modal-social", "Facebook  de tu organizacion");		
        	$("#section-form-url-fb").show();    
        	carga_url_socials("facebook", "#npagina_fb");  
        break;
    case "tw":
        	llenaelementoHTML(".title-modal-social", "Tweeter de tu organización");		
        	$("#section-form-url-tw").show();
        	carga_url_socials("tweeter", "#npagina_tw");  
        break;
    case "gp":
    	llenaelementoHTML(".title-modal-social", "Youtube de tu organización ");		        	
    	$("#section-form-url-gp").show();
    	carga_url_socials("gp", "#npagina_gp");  
        break;    
    case "www":
    	llenaelementoHTML(".title-modal-social", "Página web que te representa");		        	
    	$("#section-form-url-www").show();
    	carga_url_socials("www", "#npagina_www");  
        break;    
    default:        	
	}	
}
/**/
function next_page_history(){	
	showonehideone( ".pag-2" , ".pag-1");	
	showonehideone( ".pag-2" , ".pag-3");	
}
/**/
function  next_page_artista(){	
	showonehideone( ".pag-3" , ".pag-1");	
	showonehideone( ".pag-3" , ".pag-2");		
}
/**/
function edita_mensaje_comunidad(){	
	showonehideone( "#comunidad-mensaje-input" , ".text-edit-mensaje-comunidad" );	
	$("#comunidad-mensaje-input").blur(function(){				
			flag =  valida_text_form("#comunidad-mensaje-input" , ".place-msj-comunidad" , 20  , "Mensaje para la comunidad" );  																
			if (flag == 1){
				val = $("#comunidad-mensaje-input").val();							
				url =  now + "index.php/api/emp/mensaje_comunidad/format/json/";    
				data_send  ={ "text" : val , "q" : "mensaje_comunidad" }								
				$.ajax({
					url: url,
					type: 'PUT',
					data : data_send ,  
					beforeSend : function(){
						show_load_enid(".place-msj-comunidad" , "Registrando cambios... " , 1);			
					}  
				}).done(function(data){				
					llenaelementoHTML(".text-edit-mensaje-comunidad" , val ); 											
					show_response_ok_enid( ".place-msj-comunidad", "Experiencia actualizada con éxito.!"); 
				}).fail(function(){
					show_error_enid(".place-msj-comunidad" , "Falla al actualizar el mensaje para la comunidad, reporte al administrador.");
				});		
				showonehideone( ".text-edit-mensaje-comunidad"  , "#comunidad-mensaje-input"  );		
			}			
	});

}
/**/
function new_text(antiguo, nuevo , place){
	if (antiguo !=  nuevo ){llenaelementoHTML(place , nuevo);}
}
/**/
function carga_url_socials(social, input ){	
	url = now + "index.php/api/emp/q/format/json/";
	$.ajax({
		url :  url , 
		type :  "GET",
		data :  {"q":  social}, 
		beforeSend : function(){			
			show_load_enid(".place_url_social", "Cargando .... " , 1 );
		}
	}).done(function(data){
		$(".place_url_social").empty();
		org_url = data[0].valor;
		valorHTML(input , org_url); 		
	}).fail(function(){	
		show_error_enid(".place_url_social" , "Error al cargar la url, reporte al administrador." ); 
		console.log("Error al cargar datos del la url actual");
	});
}
/**/
function update_form_social_fb(){
	cadena  =  $("#npagina_fb").val();			
	update_data_emp("facebook", cadena , "#response-status-fb" ,  ".place_url_social" , "" ); 
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function update_form_social_tw(){
	cadena  =  $("#npagina_tw").val();			
	update_data_emp("tweeter", cadena ,  "#response-status-tw" ,  ".place_url_social" , ""); 
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function update_form_social_gp(){
	cadena  =  $("#npagina_gp").val();			
	update_data_emp("gp", cadena , "#response-status-gp",  ".place_url_social" , "" );
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function update_form_social_www(){
	cadena  =  $("#npagina_www").val();			
	update_data_emp("www", cadena ,  "#response-status-www",  ".place_url_social" , "" );
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function try_update_slogan(){
	primer_text = $("#nslogan").val();
	if (in_session ==1  ) {
		showonehideone("#slogan-edit-section" , "#slogan-text" );	
		$("#nslogan").blur(function(){
			cadena  = $(this).val();						
			flag =  valida_text_form("#nslogan" , ".response-update-slogan" , 3 , "Eslogan para la empresa"); 
			if (flag == 1 ) {
				update_data_emp("slogan", cadena , ".response-update-slogan" , "#slogan-edit-section" , "#slogan-text"   );			
				new_text(primer_text, cadena ,  "#slogan-text"); 
			}			
		});
	}
}
/**/
function try_update_nombre(){
	/**/
	primer_text =  $("#nombre-empresa-input").val();
	if (in_session == 1){
		showonehideone("#nombre-empresa-section" , "#nombre-empresa-text" );
		$("#nombre-empresa-input").blur(function(){			

			/**/
			cadena =  $(this).val();  
			flag =  valida_text_form("#nombre-empresa-input" , ".place_nombre_empresa" , 3 , "Nombre para la empresa" ); 					
			if (flag == 1){					
				f =  update_data_emp("nombreempresa", cadena , ".place_nombre_empresa" , "#nombre-empresa-section" , "#nombre-empresa-text" );															
				new_text(primer_text, cadena ,  "#nombre-empresa-text" ); 
			}		

		});
	}
}
/**/
function try_update_artistas(){
	num_empresa =  $("#artistas-empresa-text").val();
	if (in_session == 1 ){
		showonehideone( "#artistas-section" , "#artistas-empresa-text" );		
		$("#artistas_representados").change(function(){
			cadena =  $(this).val();
			update_data_emp("artistas", cadena  ,  ".response-update-artistas" , "#artistas-section" , "#artistas-empresa-text" );					   
			new_text(num_empresa, cadena ,  "#artistas-empresa-text"); 
		});			
	}
	
}
/**/
function update_data_emp(q ,val, place , a ,b){		
	url = now +"index.php/api/emp/q/format/json/";	
	data_send = { "q" : q , "value":  val};
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send , 
	   beforeSend: function(){
	   		show_load_enid(place , "Actualizando ... " , 1);			
	   		$( place).empty();
	   }
	}).done(function(data){	   		
	   		show_response_ok_enid(place, "Datos actualizados con éxito.! ");
	   		flag_response =1;
	}).fail(function(){
		console.log("Error on update data empresa ");
		show_error_enid(place , "Falla al actualizar los datos reporte al administrador.");
	});
	/*Cuando la respuesta*/		
	showonehideone(b , a);	
}
/**/
/*
function carga_iconos_comunidad(){
	

	url =  now + "index.php/api/emp/iconos_comunidad/format/json/";
	id_empresa =  $(".id_empresa").val();
	$.ajax({
		url :  url , 
		type :  "GET", 
		data :  {id_empresa :  id_empresa},
		beforeSend : function(){
			show_load_enid(".iconos-comunidad" ,  "Cargando ... " ,  1 );
		}
	}).done(function(data){
//		console.log(data);
		llenaelementoHTML(".iconos-comunidad" , data);
	}).fail(function(){
		show_error_enid(".iconos-comunidad" , "Falla al cargar modulo, comunidad, reporte al administrador");
	})
}
*/
/**/
function update_pais_empresa(e){


	url = $("#form-paises").attr("action");
	data_send =  $("#form-paises").serialize() +"&"+$.param({"empresa" : $(".id_empresa").val()  });	


	$.ajax({
		url:  url , 
		type : "PUT",
		data:  data_send , 
		beforeSend: function(){
			show_load_enid(".place_pais" ,  "Actualizando ... " ,  1 );
		}
	}).done(function(data){


		set_pais($(".pais_empresa").val());
		$("#modal-locacion").modal("hide");
		$(".place_pais").empty();
		show_response_ok_enid(".place_empresa_locacion", "País actualizado con éxito.! ");

	}).fail(function(){
		show_error_enid(".place_pais" , "Falla al registrar cambios, reporte al administrador.");
	});
	e.preventDefault();
}
/**/
function set_pais(x){

	var paises =  [ "Argentina",
	"Aún sin definir ",
	"Bolivia",
	"Brasil",
	"Canada",
	"Chile",
	"Colombia",
	"Costa Rica",
	"Cuba",
	"Ecuador",
	"El Salvador",
	"España",
	"Estados Unidos",
	"Guatemala",
	"Honduras",
	"México",
	"Nicaragua",
	"Panama",
	"Paraguay",
	"Peru",
	"Puerto Rico",
	"Uruguay"];

	console.log(paises[x]);
	$(".lb-pais").text(paises[x]);
}



/**/
function carga_reservaciones(){

	url =  $(".form-servaciones").attr("action");
	$.ajax({
		url :  url , 
		data :  {"tipo":  "empresa"} ,
		type :  "GET" ,
		beforeSend: function(){
			show_load_enid(".place_reservaciones" ,  "Cargando ... " ,  1 );
		}
	}).done(function(data){		
		
		console.log(data);
		$("#reservacion_tel").val(data[0].reservacion_tel);
		$("#reservacion_mail").val(data[0].reservacion_mail);
		$(".place_reservaciones").empty();
		$(".form-servaciones").submit(actualiza_reservaciones);
	}).fail(function(){
		show_error_enid(".place_reservaciones" , "Error al cargar las reservaciones, reporte al administrador");
	});	

}
/**/
function actualiza_reservaciones(e){


	data_send =  $(".form-servaciones").serialize() +  "&" + $.param({"tipo":  "empresa"});
	console.log(data_send);
	url =  $(".form-servaciones").attr("action");
	flag  =  valida_email_form("#reservacion_mail" , ".place_mail" )

	
	if ( flag == 1) {
		flag2 =  valida_tel_form("#reservacion_tel" ,  ".place_tel" ); 		
		if (flag2 ==  1 ) {
			$(".place_mail").empty();
			$(".place_tel").empty();
			$.ajax({
					url :  url , 
					data : data_send ,
					type :  "PUT" ,
					beforeSend: function(){
						show_load_enid(".place_reservaciones" ,  "Actualizado  ... " ,  1 );
					}
			}).done(function(data){			

				show_response_ok_enid( ".place_reservaciones", "Datos del las reservaciones actualizadas con éxito!"); 
				$("#reservaciones-modal").modal("hide");
				reservaciones =  "RESERVACIONES <BR>  TEL. " + $("#reservacion_tel").val() + " <br> " + $("#reservacion_mail").val();
				$(".text-reservaciones").html(reservaciones);
				//console.log(data);		
			}).fail(function(){
				show_error_enid(".place_reservaciones" , "Error al actualizar las reservaciones, reporte al administrador");
			});

		}

	}
	
	e.preventDefault();
}
/**/
function carga_eventos_empresa(){
	
	url =  now + "index.php/api/busqueda/eventos_empresa_resumen/format/json/";  		
	id_empresa = $(".id_empresa").val();
	$.ajax({
		url :  url ,
		type: "GET",
		data :{"id_empresa" : id_empresa },
		beforeSend:function(){
			show_load_enid(".place_eventos" ,  "Cargando ... " ,  1 );
		}
	}).done(function(data){

		llenaelementoHTML(".place_eventos" , data);

	}).fail(function(){
		show_error_enid(".place_eventos" , "Error cargar eventos, reporte al administrador");
	});

}
/**/
function carga_galeria_images_empresa(){

	url  = now + "index.php/api/emp/galeria/format/json/"; 
	id_empresa = $(".id_empresa").val();
	in_session =  $(".in_session").val();
	$.ajax({
		url : url , 
		type: "GET",
		data :{"id_empresa" : id_empresa , in_session : in_session },
		beforeSend:function(){
			show_load_enid(".place_galeria_empresa" ,  "Cargando ... " ,  1 );
		}
	}).done(function(data){
		
		//console.log(data);
		llenaelementoHTML(".place_galeria_empresa" , data);
		$(".panel-image img.panel-image-preview").hover(muestra_delete_img);
		$(".eliminar_img").click(pre_detele_img);
	}).fail(function(){
		show_error_enid(".place_galeria_empresa" , "Error cargar la galeria de imagenes.");
	});
}
/**/
function registra_contacto(e){

	f = valida_email_form("#emp_email" , ".place_mail_contacto" ); 			
	if (f ==  1){

		$(".place_mail_contacto").empty();
		f = valida_tel_form("#emp_tel" ,  ".place_tel_contacto" ); 
		if (f == 1 ) {
			$(".place_tel_contacto").empty();
			url = $("#form_contacto").attr("action");	
			id_empresa = $(".id_empresa").val();
			data_send =   $("#form_contacto").serialize()  + "&"+ $.param({"empresa" : id_empresa ,  "tipo" : 1 });
			$.ajax({
				url : url , 
				type: "POST",
				data : data_send, 
				beforeSend: function(){
					show_load_enid(".place_registro_contacto" ,  "Enviando ... " ,  1 );			
				}
			}).done(function(data){			
				show_response_ok_enid(".place_registro_contacto" , "Nosotros te contactamos para confirmar reservación  ");
				document.getElementById("form_contacto").reset();	
			}).fail(function(){
				show_error_enid(".place_registro_contacto" , "Error cargar la galeria de imagenes.");		
			});


		}
		
	}
	e.preventDefault();
}
/**/
function muestra_seccciones(){
	$(".navegacion-emp").show();
}
/**/
function registrar_direccion(e){

	data_send = $("#form-direccion-emp").serialize() + "&" + $.param({"empresa" :  get_emp()});
	nueva_direccion =  $("#origin-input").val();
	url =  $("#form-direccion-emp").attr("action");
	$.ajax({
		url : url , 
		type : "PUT", 
		data : data_send, 
		beforeSend: function(){
			show_load_enid(".place_registro_direccion" ,  "Enviando ... " ,  1 );			
		}
	}).done(function(data){

		show_response_ok_enid(".place_registro_direccion" ,  "Dirección actualizada.");
		$("#modal-ubicacion-empresa").modal("hide");
		llenaelementoHTML(".direccion-empresa" , nueva_direccion );

	}).fail(function(){
		show_error_enid(".place_registro_direccion" , "Error cargar dirección de la empresa");		
	});

	e.preventDefault();
}
/**/
function registrar_info_contacto(e){
	

	data_send = $("#form-info-contacto").serialize() + "&" + $.param({"empresa" :  get_emp()});		
	url =  $("#form-info-contacto").attr("action");

	tel_contacto =  $("#tel_contacto").val();
	mail_contacto=  $("#mail_contacto").val();

	f = valida_tel_form("#tel_contacto" ,  ".place_tel_info_contacto" ); 
	if (f == 1){
		$(".place_tel_info_contacto").empty();
		f = valida_email_form("#mail_contacto" , ".place_mail_info_contacto" ); 			
		if (f ==  1 ) {

			$(".place_mail_info_contacto").empty();

			$.ajax({
				url : url , 
				type : "PUT", 
				data : data_send, 
				beforeSend: function(){
					show_load_enid(".place_info_contacto" ,  "Enviando ... " ,  1 );			
				}
			}).done(function(data){

				show_response_ok_enid(".place_info_contacto" , "Información actualizada.");			
				$("#modal-contacto-empresa").modal("hide");
				

				llenaelementoHTML(".text-info-contacto" , "Contacto <br> " + tel_contacto +  "<br>" + mail_contacto);



			}).fail(function(){
				show_error_enid(".place_info_contacto" , "Error al actualizar info de contacto");		
			});	
		
		}
	}
	e.preventDefault();
}
/**/
function oculta_secciones(){
	$(".navegacion-emp").hide();	
}
function muestra_delete_img(e){
	img = e.target.id; 
	elemento_a_mostrar =  ".img_delete_"+img;
	$(elemento_a_mostrar).show();
}
/**/
function pre_detele_img(e){
	set_img_galeria(e.target.id);	
}
/**/

/**/
function delete_img_galeria(){
	/**/	
	url =  now +  "index.php/api/img_controller/imagen_galeria_empresa/format/json/";
	$.ajax({
		url : url  ,
		type : "DELETE",
		data : {img :  get_img_galeria() , emp : get_emp() },  
		beforeSend: function(){				
			show_load_enid(".place_delete_img" ,  "Cargando" ,  1); 
		}
	}).done(function(data){

		show_response_ok_enid(".place_delete_img", "Imagen eliminada con éxito.");
		$("#modal-eliminar-img").modal("hide");
		carga_galeria_images_empresa();

	}).fail(function(){
		show_error_enid(".place_delete_img" ,  "Error al eliminar imagen.");
	});

}