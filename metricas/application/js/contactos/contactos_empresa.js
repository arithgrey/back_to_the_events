var emp = 0;
$(document).ready(function(){
	$("footer").ready(contactos_empresa);
	set_emp( $("#id_empresa").val());

});
/**/
function set_emp(new_emp){
	emp = new_emp;	
}
/**/
function get_emp(){
	return emp;
}
/**/
function contactos_empresa(){
 	url =  "../contacto/index.php/api/emp/empresa_contactos/format/json/";	

	$.ajax({
		url: url ,
		type: "GET", 
		data : {empresa : get_emp() },
		beforeSend: function(){
			show_load_enid(".place_contactos_disponibles_empresa" ,  "Cargando ... " , 1 );
		}
	}).done(function(data){		
		llenaelementoHTML(".place_contactos_disponibles_empresa" , data);
	}).fail(function(){
		show_error_enid(".place_contactos_disponibles_empresa", "Error al cargar contactos de la empresa");
	});
}
/**/