var q3 =  "";
var nombre_evento =  ""; 
var nombre_acceso =  "";
var evento =  0; 
var acceso = 0;
var nota =  "";
var accion_usuario =  ""; 
var in_session =  0;  
var qacceso =  0; 
var flag_config_acceso =0;

$(document).on("ready", function(){

	
	set_nombre_evento($(".enid_evento").val());
	set_empresa($("#empresa").val());
	set_evento($("#evento").val()); 
	set_qacceso( $(".qacceso").val() );
	set_q3($(".q3").val());


	$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
	/**/
	

	

	
	$("#form-new-acceso").submit(record_acceso);
	$("#dinamic-form-accesos").submit(actualiza_data_accesos);	
	$("footer").ready(valida_modal);

	$("#fecha_termino").datepicker();
	$("#fecha_inicio").datepicker();	
	$("#nuevo_inicio_acceso").datepicker();
	$("#nuevo_termino_acceso").datepicker();
	load_data_accesos();
});

/*Registrando  */
function record_acceso(e){

	url = $("#form-new-acceso").attr("action");	
	flag  =  valida_text_form(".acceso_input" , ".place_nombre_promo_vali" , 3 , "Nombre de la promoción" ); 
	if (flag ==  1 ){
		/*ahora validamos el formato numérico*/
		flag_numerico =  valida_num_form("#precio-acceso-record" , ".place_msj_precio"); 		
		if (flag_numerico == 1 ){
			flag_date =  valida_format_date("#fecha_inicio" , "#fecha_termino" , ".place_val_date" , "La fecha no puede ser menor a la fecha actual" );
			if (flag_date == 0) {				
					flag = valida_l_precio("#precio-acceso-record" ,  5 , ".place_msj_precio" ,  "Precio del acceso demaciado alto");					
					if (flag == 1){			
						
						data_send =  $("#form-new-acceso").serialize() + "&"  + $.param({"evento" :  get_evento() ,  "enid_evento" : get_nombre_evento()  });			
						$.ajax({
								url :  url , 
								type :  "POST", 
								data :   data_send , 
								beforeSend:function(){								
									show_load_enid( ".place_registro_acceso" , "Registrando ..." , 1 ); 				
									$(".place_nombre_promo_vali").empty();
									$(".place_msj_precio").empty();			
								}
						}).done(function(data){		
							$("#nuevo-acceso-modal").modal("hide");
							var  fields_reset =  ["#acceso_nombre" ,  "#precio-acceso-record" , "#descripcion"];
							reset_fields(fields_reset);															
							load_data_accesos();									
							show_response_ok_enid( ".place_list_accesos" , "Acceso cargado al evento!" , 1 ); 	
							$(".place_registro_acceso").empty();

						}).fail(function(){			
							show_error_enid(".place_registro_acceso" , "Error al cargar el escenario reportar al administrador"); 
						});
				}

			}

		}				
	}		
	e.preventDefault();
}
/**/
function load_data_accesos(){	

	url = "../accesos/index.php/api/accesos/list/format/json/";				
	$.ajax({
		url :  url , 
		type :  "GET", 
		data : { evento : get_evento() , in_session :  get_in_session() , "resumen_evento" : 0}, 
		beforeSend: function(){			
			show_load_enid( ".place_list_accesos" , "Cargando accesos registrados al avento ... " , 1 ); 	
		}
	}).done(function(data){

		$(".place_list_accesos").empty();
		llenaelementoHTML(".list-accesos" , data);				 			
		$(".delete-acceso").click(remove_acceso);
		$(".editar-acceso").click(editar_acceso);
		$(".img_acceso").click(carga_form_imagen_acceso);
		$(".resumen_info_acceso").click(carga_nota_acceso);
		/*Para cargar la info del acceso */		
	}).fail(function(){		
		show_error_enid(".place_list_accesos" , "Error al cargar, los accesos "); 
	});
}

function remove_acceso(e){

	
	set_acceso(e.target.id);

	$("#aceptar-delete-acceso").click(function(){
		
		url = "../accesos/index.php/api/accesos/deletebyid/format/json/";					
		$.ajax({
			url : url , 
			type :  "POST",
			data : { evento : get_evento() , acceso :  get_acceso(),  "enid_evento" : get_nombre_evento() } , 
			beforeSend : function(){
				
				show_load_enid( ".place_remov_acceso" , "Eliminando acceso del evento ..." , 1 );
			}
		}).done(function(data){
			$(".place_remov_acceso").empty();
			$("#confirma-delete-acceso").modal("hide");
			load_data_accesos();			
			show_response_ok_enid(".place_list_accesos" ,  "Acceso eliminado con éxito " ); 

			
		}).fail(function(){
			show_error_enid(".place_remov_acceso" , "Error eliminar el acceso del evento, reporte al administrador"); 
		});


	});
}
/**/
function editar_acceso(e){

	if (get_flag_config_acceso() == 0 ) {		
		set_acceso(e.target.id);
	}	
	var fields_reset = ["#nuevo-precio" , "#nuevo-inicio-acceso" , "#nuevo-termino-acceso" , "#nueva-descripcion" ];
	reset_fields(fields_reset);	
	/**/
	url = "../accesos/index.php/api/accesos/get_acceso_info_id/format/json/";		
	

	$.ajax({
		url : url , 
		type: "GET", 
		data :  {"evento": get_evento()   , "acceso" : get_acceso() ,  "enid_evento" : get_nombre_evento()} , 
		beforeSend: function(){
			show_load_enid( ".place_editar_acceso" , "Cargando datos del acceso ..." , 1 );			
		}

	}).done(function(data){

		$(".place_editar_acceso").empty();
		for(var x in data ){

			idacceso  = data[x].idacceso;
			nota = data[x].nota;
			precio  = data[x].precio;
			inicio_acceso = data[x].inicio_acceso;
			termino_acceso = data[x].termino_acceso;
			tipo = data[x].tipo;
			moneda =  data[x].moneda; 


			valorHTML("#nuevo-precio" , precio );
			valorHTML("#nueva-descripcion" , nota );
			valorHTML("#nuevo-inicio-acceso" ,  inicio_acceso );
			valorHTML("#nuevo-termino-acceso" , termino_acceso );			
			valorHTML("#acceso" , idacceso);			
			$('#nuevo-tipo-acceso > option[value="' + tipo + '"]').attr('selected', 'selected');		
			$('.nueva_moneda > option[value="' + moneda + '"]').attr('selected', 'selected');		
			set_flag_config_acceso(0);

		}
	}).fail(function(){
		show_error_enid(".place_editar_acceso" , "Error al cargar los datos del acceso, reporte al administrador"); 
	});
	
}

function actualiza_data_accesos(){
	
	/*evento*/
	url  = $("#dinamic-form-accesos").attr("action");	
	data_send =  $("#dinamic-form-accesos").serialize() +  "&"+ $.param({"enid_evento" : get_nombre_evento() }); 		
	
	flag_date =  valida_format_date("#nuevo_inicio_acceso" , "#nuevo_termino_acceso" , ".place_val_date_2" , "La fecha no puede ser menor a la fecha actual" );	
	if (flag_date == 0) {
		flag = valida_l_precio("#nuevo-precio" ,  5 , ".place_nuevo_precio" ,  "Precio del acceso demaciado alto");							
			if (flag ==  1) {		
				flag_numerico =  valida_num_form("#nuevo-precio" , ".place_nuevo_precio"); 		
				if (flag_numerico == 1) {			
					$.ajax({
					   url: url,
					   type: 'PUT',
					   data : data_send  ,
					   beforeSend : function(){
					   		
					   	show_load_enid(".place_editar_acceso" , "Actualizando datos información del acceso ... ");
					   }
					}).done(function(data){
						
						$("#editar-acceso").modal("hide");
						load_data_accesos();
						show_response_ok_enid( ".place_list_accesos" ,"Datos del acceso configurados con éxito.!" , 1 ); 	

					}).fail(function(){
						show_error_enid(".place_editar_acceso" , "Error al editar los datos de acceso, reporte al administrador"); 

					});
				}

			}	
	}
	
	
	return false;
}

function dinamic_resumen(){
	resumen_event(".section-resumen" , ".menos-info" , ".mas-info");
}
/**/
function reset_form_acceso(){
	llenaelementoHTML(".estado_registro_acceso" ,  "");
}
/**/

/**/
function carga_nota_acceso(e){
	info_nota  =  $(this).attr("info_nota");
	info_nombre_acceso = $(this).attr("info_nombre_acceso");
	
	set_nota(info_nota);
	set_nombre_acceso(info_nombre_acceso);
}
/**/
function get_nota(){
	return nota;
}
/**/
function set_nota(n_nota){
	nota =  n_nota;
	llenaelementoHTML(".place_info_nota_acceso" , nota );
}
/**/
function get_nombre_acceso(){
	return nombre_acceso;
}
/**/
function set_nombre_acceso(n_nombre_acceso){
	nombre_acceso =  n_nombre_acceso;
	llenaelementoHTML(".place_info_nombre_acceso" , n_nombre_acceso );
}
/**/
function get_accion_usuario(){
	return accion_usuario;
}
/**/
function set_accion_usuario(n_accion_usuario){
	accion_usuario =  accion_usuario;
}
/**/
function get_nombre_evento(){
	return nombre_evento;
}
/**/
function set_nombre_evento(n_nombre_evento){
	nombre_evento =  n_nombre_evento;
	llenaelementoHTML(".place_info_nombre_evento" , nombre_evento);
}
/**/
function set_empresa(n_empresa){
	empresa =  n_empresa;
}
/**/
function get_empresa(){
	return empresa;	
}
/**/
function set_evento(n_evento){
	evento =  n_evento;	
}
/**/
function get_evento(){
	return evento;
}
/**/
function get_acceso(){
	return acceso;
}
/**/
function set_acceso(n_acceso){
	acceso =  n_acceso;
}
/**/
function set_in_session(n_in_session){
	in_session = n_in_session;
}
/**/
function get_in_session(){
	return in_session;
}
/**/
function set_qacceso(n_qacceso){
	qacceso =  n_qacceso;
}
/**/
function get_qacceso(){
	return qacceso;
}
/**/
function get_flag_config_acceso(){
	return flag_config_acceso;
}
/**/
function set_flag_config_acceso(n_flag_config_acceso){
	flag_config_acceso =  n_flag_config_acceso;
}
/**/
function set_q3(n_q3){
	q3 =  n_q3;
}
/**/
function get_q3(){
	return q3;
}

/**/
function valida_modal(){

	if (get_qacceso() > 0 ){
		$("#editar-acceso").modal("show");
		set_flag_config_acceso(1);		
		set_acceso(get_qacceso());
		editar_acceso(); 
	}	
	if (get_q3() > 0 ){
		$("#nuevo-acceso-modal").modal("show");

	}
}