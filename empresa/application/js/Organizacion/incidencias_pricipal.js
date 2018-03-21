$(document).on("ready", function(){

	$("#tipo-incidencia").change(load_data_sub_tipo_incidencia);
	$("#form-incidencia-empresa").submit(try_record_incidencia);
	$("#guardar-info").click(try_record_incidencia);
});
/**/
function load_data_sub_tipo_incidencia(e){
	 
	tipo_incidencia =e.target.value;	
	url = now  + "index.php/api/emp/sub_tipo_incidencia/format/json/";
	$.get(url , {"tipo_incidencia" : tipo_incidencia } ).done(function(data){
		llenaelementoHTML("#sub-tipo-section" , data);

	}).fail(function(){
		alert("Error al cargar el subtipo de incidencia");
	});
}
/**/
function try_record_incidencia(){

	sub_tipo =  $("#sub-tipo").val();
	url = $("#form-incidencia-empresa").attr("action");
	$.post(url , $("#form-incidencia-empresa").serialize() +"&"+ $.param({"otro" : sub_tipo}) ).done(function(data){	
		if (data == true  ){
			$('#form-incidencia-empresa').trigger("reset");	
			llenaelementoHTML("#response-save" , "<div class='alert alert-success' role='alert'>Incidencia ingresada <i class='fa fa-check-square'></i> </div>");
		}else{
			llenaelementoHTML("#response-save" , "Error al registrar la información ");
		}
	
	}).fail(function(){
		alert("Error");
	});

	return false;	
}