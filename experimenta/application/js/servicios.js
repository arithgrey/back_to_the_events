function carga_servicios_evento(){	
	
	url =  "../servicios/index.php/api/serviciosevento/servicios_evento/format/json/"; 	
	$.ajax({
		url : url , 
		type: "GET",
		data : {"id_evento" : get_id_evento()} ,
		beforeSend:function(){
			show_load_enid(".place_servicios_info" , "Cargando ... " , 1); 						
		}
	}).done(function(data){
		llenaelementoHTML(".place_servicios_info" , data );
		$(".info_extra_servicio").click(carga_info_nota_servicio);
	}).fail(function(){
		show_error_enid(".place_servicios_info" , "Error al cargar los servicios");					
	});				

}
/**/
function carga_info_nota_servicio(e){
	
	
	info_completa_servicio =  $(this).attr("info_completa_servicio");
	set_nota_servicio(info_completa_servicio);

	/**/
	nombre_servicio =   $(this).attr("nombre_servicio");
	set_nombre_servicio(nombre_servicio);
}
/**/
function set_nota_servicio(n_nota_servicio) {
	nota_servicio =  n_nota_servicio;
	llenaelementoHTML(".info_completa_servicio" , get_nota_servicio());
}
/**/
function get_nota_servicio(){
	return nota_servicio;
}
/**/
function  get_nombre_servicio(){
	return nombre_servicio;
}
/**/
function set_nombre_servicio(n_nombre_servicio){
	nombre_servicio = n_nombre_servicio;
	llenaelementoHTML(".place_nombre_servicio" , get_nombre_servicio());
}