var artista =  0;  
var escenario = 0; 
var evento = 0;  
var nombre_evento = "";  
var in_session = 0;
var nombre_artista  =  ""; 
$(document).ready(function(){    
	/**/
	set_nombre_escenario($(".enid_escenario").val());		
	set_nombre_evento($(".enid_evento").val()); 
	set_escenario($(".id_escenario").val());
	set_evento($(".evento").val());
	set_in_session($(".in_session").val());

	$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
	$("#form-escenario-artista").submit(nuevo_artista);
	
	

	flag_carga_otros = 0; 
	artista_tmp  =  0; 	
	$(".tipo-escenario").click(update_type);	
	$(".descripcion-escenario-text").click(update_descripcion_escenario);
	
	$("#btn-guardar-fecha").click(update_fecha_escenario);
	/**/
	$("#button-template").click(function(){		
		muestra_plantilla_escenario(5 , ".tmp_escenario" , ".place_tmp_escenario");
	});
	/**/
	$(".titulo_nombre_escenario").click(update_nombre_escenario);

	
	load_data_escenario_artista();			
	
    $('nav, .nav-controller').on('click', function(event) {
        $('nav').toggleClass('focus');
    });

    /*
    $('nav, .nav-controller').on('mouseover', function(event) {
        $('nav').addClass('focus');
        $('.controller-open').hide();
        $('.controller-close').show();
        
    }).on('mouseout', function(event) {
        $('nav').removeClass('focus');
        $('.controller-open').show();
        $('.controller-close').hide();
    })
*/
	/**/
	//$(".link_to_view").click(view_like_public);
	/**/
	//$("#registra-nuevo-escenario-form").submit(t_nuevo_escenario);    
	/*Cargamos slider del escenario */
	$("footer").ready(carga_slider_admin);
	/*Para las imagenes*/
	$(".img-button-more-imgs").click(carga_form_imagenes_escenario);
	$("footer").ready(valida_q);
	/**/
	$("#termino").datepicker();
	$("#inicio").datepicker();
	
});
/**/
function update_type(e){

	type_escenario  = e.target.id	
	url = "../escenarios/index.php/api/escenario/escenario_tipo/format/json"; 
	evento =  get_evento();

	//actualiza_data(url , {"idescenario": get_escenario() , "tipoescenario" : type_escenario  , "evento" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() } );

	$.ajax({
		url : url , 
		type :  "PUT",
		data :  {"idescenario": get_escenario() , "tipoescenario" : type_escenario  , "evento" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() } , 
		beforeSend: function(){
			
			show_load_enid(".place_tipo", "Registrando ... " , 1); 

		}
	}).done(function(data){		
		show_response_ok_enid(".place_tipo" , "Tipo de escenario actualizado con éxito.! " ); 
	}).fail(function(){
		show_error_enid(".place_tipo" , "Falla al actualizar el tipo de escenario, reporte al administrador " ); 
	});

	$(".button-tipo-escenario").text(type_escenario);

}
/*Actualiza el nombre del escenario*/
function  update_nombre_escenario(){
	
	showonehideone( ".in_nombre_escenario" , ".titulo_nombre_escenario" );	
	$(".in_nombre_escenario").blur(function(){			
		/*Validamos previo a registrar el cambio */
		flag =  valida_text_form(".in_nombre_escenario" , ".place_nombre_escenario" , 4 , "Nombre asignado al escenario es " ); 		

		if (flag == 1 ) {

			url = "../escenarios/index.php/api/escenario/escenario_campo/format/json/";
			nuevo_nombre = $(".in_nombre_escenario").val(); 						
			
			$.ajax({
				url :  url , 
				type :  "PUT",
				data :  { "campo": "nombre" ,    "escenario" : get_escenario() , "nuevonombre" : nuevo_nombre ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() }  , 
				beforeSend: function(){					
					show_load_enid(".place_nombre_escenario", "Registrando ..." , 1); 
				}
			}).done(function(data){
				show_response_ok_enid(".place_nombre_escenario"  , "Nombre del escenario actualizado con éxito" ); 
				llenaelementoHTML(".titulo_nombre_escenario" ,"Escenario - " +nuevo_nombre );	
				showonehideone(".titulo_nombre_escenario" , ".in_nombre_escenario");				

			}).fail(function(){
				show_error_enid(".place_nombre_escenario", "Error al actualizar e nombre del escenario, reporte al administrador" );
			});					
		}
		
	});

}
/*Actualiza la descripción del escenario */
function  update_descripcion_escenario(){

	showonehideone( ".section-descripcion-escenario-in" , ".descripcion-escenario-text" );		

	$("#in-descripcion-escenario").blur(function(){	
		/*Validamos previo a que se envie*/		
		flag =  valida_text_form("#in-descripcion-escenario" , ".place_descripcion" , 10 , "El texto que describe la experiencia " ); 		
		if (flag ==  1 ){			
			url =  "../escenarios/index.php/api/escenario/escenario_campo/format/json/";
			
			nuevo_nombre = $("#in-descripcion-escenario").val(); 								
			$.ajax({
				url :  url , 
				type : "PUT" , 
				data : { "campo": "descripcion" , "escenario" : get_escenario() , "nuevonombre" : nuevo_nombre ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario() } , 
				beforeSend : function(){					
					show_load_enid(".place_descripcion", "Registrando ... " , 1); 
				}
			}).done(function(data){				
				
				
				show_response_ok_enid(".place_descripcion", "La experiencia en el escenario ha sido actualizado con éxito" ); 
				llenaelementoHTML(".descripcion-escenario-text" , nuevo_nombre);

			}).fail(function(){				
				
				show_error_enid(".place_descripcion" , "Error al actualizar la experiencia en el escenario, reporte al administrador" ); 
			});		
			showonehideone( ".descripcion-escenario-text"  , ".section-descripcion-escenario-in");	
		}
	});
}
/*Actualiza solo un campo */
function update_campo(campo, place, input , msj ){ 

	url = "../escenarios/index.php/api/escenario/evento_escenario_campo/format/json";	
	evento =  get_evento();
	$.get(url , {"campo" : campo , "escenario" : get_escenario() , "evento" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()} ).done(function(data){			
		data = data.trim(); 
		
		if (data.length === 0 ) {		
			show_response_ok_enid(place , msj ); 
		}else{
			llenaelementoHTML( place,  data);
		}		
		$(input).val(data);
	}).fail(function(){
		show_error_enid(place , "Error al actualizar" ); 
	});
}
/*Actualiza la fecha del escenario*/
function update_fecha_escenario(e){	

	url = "../escenarios/index.php/api/escenario/inicio_termino/format/json"; 	
	inicio = $("#inicio").val();
	termino =  $("#termino").val();

	flag =  valida_format_date("#inicio" , "#termino" , ".place_fechas_evento" ,  "La fecha no puede ser menor a la fecha actual");
	if (flag ==  0 ) {
		$.ajax({
			url : url ,
			type:  "PUT" ,
			data :  {"escenario" : get_escenario() , "nuevoinicio" :  inicio , "nuevotermino" : termino ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()} , 
			beforeSend: function(){
				/*place_fechas_evento*/				
				show_load_enid(".place_fechas_evento", "Registrando ... " , 1); 
			}			
		}).done(function(data){
			$("#modal-date-escenario").modal("hide");
			fecha_text_format ="";
			if (inicio == termino ) {	
				fecha_text_format = inicio;
			}else{
				fecha_text_format = inicio +" - " + termino;
			}
			llenaelementoHTML("#fecha-presentacion" , " Fecha de presentación  " + fecha_text_format );					 
			show_response_ok_enid(".place_fecha_2" ,  "Fecha actualida corrrectamente.!");
			$(".place_fechas_evento").empty();

		}).fail(function(){
			/**/
			show_error_enid(".place_fechas_evento"  , "Error al actualizar reporte al administrador" ); 
		});	
		
	}
	
	e.preventDefault();
}
/**/
function muestra_plantilla_escenario(type , contenido , dinamic_place){
	


	url = "../plantillas/index.php/api/templ/tmp_contenido/format/json";	
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"tipo" : 5 ,  "public" :  0 , "identificador" :   "escenarios"} , 
		beforeSend : function(){
			show_load_enid( dinamic_place , "Cargando plantillas disponibles  ... " , 1); 
		} 
	}).done(function(data){
	
		$(dinamic_place).empty();
		llenaelementoHTML(contenido , data );		
		$(".escenarios").click(carga_plantilla);	
	}).fail(function(){
		show_error_enid(".place_experiencias_tmp_seccion"  , "Error al al registrar artista"); 				
	});


}
/**/
function carga_plantilla(e){

	id_contenido  = e.target.id; 	
	data_send = {"contenido" : id_contenido , "escenario" : get_escenario()  , "evento" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()};
	url = "../plantillas/index.php/api/escenario/descripcion_template/format/json/"; 
	$.ajax({
		   url: url,
		   type: 'PUT',
		   data : data_send  , 
		   beforeSend :  function(){
		   		show_load_enid("#list-plantilla-escenario" ,  "Registrando ... " , 1 ); 
		   }
		}).done(function(data){
		   	   
		   	update_campo( "descripcion" ,  ".descripcion-escenario-text" , "#in-descripcion-escenario" , "Describe la experiencia del escenario");					
			$("#modal-platilla-escenarios").modal("hide"); 		
	   		
	}).fail(function(){	   	
	   	console.log("error ------- en plantilla  ");
	   	show_error_enid("#list-plantilla-escenario"  , "Error al actualizar"); 
	});
}
/**/
function carga_slider_admin(){
	url =  "../imgs/index.php/api/escenario/slider_admin/format/json/"; 	
	$.ajax({
		url : url , 		
		type: "GET" ,
		data : {"escenario" : get_escenario() , "nombre_escenario" :  get_nombre_escenario() , "in_session" : get_in_session() , "public" : 0 } ,
		beforeSend: function(){			
			show_load_enid( ".slider-principal-escenario" , "Cargando portada del escenario ... " , 1 ); 				
		}
	}).done(function(data){
		llenaelementoHTML(".slider-principal-escenario", data );
		
	}).fail(function(){		
		
		show_error_enid(".slider-principal-escenario", "Error al cargar la portada del escenario, reporte al administrador" ); 
	});
}
/**/
/*
	function t_nuevo_escenario(e){

		$(".place_nuevo_escenario").empty();	
		flag = valida_text_form("#nuevo-escenario" , ".place_nuevo_escenario" , 5 , "Escenario "); 
		if (flag == 1 ) {
			url = "../escenarios/index.php/api/escenario/escenario_evento/format/json/";				
			data_send  =  $("#registra-nuevo-escenario-form").serialize() + "&" + $.param({"evento_escenario" : get_evento() ,  "enid_evento": get_nombre_evento() ,  "enid_escenario":  get_nombre_escenario()}); 	
			$.ajax({
				url :   url , 
				type :  "POST", 
				data :  data_send, 
					beforeSend : function(){
						show_load_enid( ".estado_registro_escenario" , "Registrando ..." , 1 ); 				
						$(".place_nuevo_escenario").empty();		
					}
				}).done(function(data){	

					show_response_ok_enid(".estado_registro_escenario" ,  "Escenario registrando con éxito.! " ); 
					
					next =  "../administracion_escenario/?q="+data;
					redirect(next);
					
				}).fail(function(){						
					show_error_enid(".estado_registro_escenario" , "Error al cargar el escenario reportar al administrador"); 
				});
		}
		e.preventDefault();
	}
*/
/**/
function valida_q(){
	q = $(".qparam").val();
	
	var  tabs = [".tab_nombre" ,  ".tab_escenario" , ".tab_artistas" ];	
	switch(q){

		case "tipo":			
		
				$(".btn_config_tipo").css("background" , "#00BCD4"  );
				$(".btn_config_tipo").css("border-color" , "#19304e"  );			   
			break;		

		case "artista": 	    	

			break;

		default: 

		break;

	}	
}
/**/

/*function view_like_public(){	
	id_escenario =  get_escenario();
	url = "../escenarios/index.php/escenario/inevento/" +get_escenario()+"/" + get_evento();
	redirect(url);
}
*/
/**/
