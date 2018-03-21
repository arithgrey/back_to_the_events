$(document).on("ready", function(){

    $(".action_user").change(muestra_seccion);
    $(".seccion_errores").show();               
    carga_form_errores( 1  , ".place_error_disponibles");
});
/**/
function muestra_seccion(){
    
    q =  $(".action_user").val();    
    var secciones = [ ".seccion_errores" , ".seccion_propuestas" ]; 
    for (var x in secciones ){
        $(secciones[x]).hide();               
    }   
    switch(q){        
        case "1":            
            $(".seccion_errores").show();               
            carga_form_errores( 1  , ".place_error_disponibles");
            break; 

        case "2":
            $(".seccion_propuestas").show();               
            carga_form_errores( 2  , ".place_seccion_propuestas");
            break;    

        default: 
        break;
    }    
}
/**/
function carga_form_errores( tipo , place ){
    
    $(".place_error_disponibles").empty();
    $(".place_seccion_propuestas").empty();        
    url =  now + "index.php/api/reportes/erroresform/format/json/";    
    $.ajax({
        url : url , 
        type :  "GET",  
        data:  { "tipo" :  tipo },                
        beforesend: function(){
            show_load_enid( place  , "Cargando ... " , 1 );
        } 
    }).done(function(data){
        
        llenaelementoHTML( place , data );            
        $(".form-error").submit(registra_incidencia);

    }).fail(function(){
        show_error_enid(place  , "Error en la carga reporte al administrador " );
    });
}
/**/
function registra_incidencia(e){

    flag_form =  valida_text_form("#descripcion_incidencia" , ".place_reporte_incidencia" , 15  , "Descripcion  de la incidencia " ); 

    if (flag_form ==  1  ) {        
        url =  $(".form-error").attr("action");            
        $.ajax({
            url: url ,
            type: "POST",          
            data: $(".form-error").serialize() , 
            beforesend: function(){
                show_load_enid(".place_registro_incidencia" ,  "Registrando ... " , 1 );            
            }
        }).done(function(data){    
            $(".place_reporte_incidencia").empty();
            $(".place_registro_incidencia").empty();
            show_response_ok_enid(".place_dinamic_registro_incidencia" , "Reporte registrado con éxito.!");    
            document.getElementById("form-error").reset();
        }).fail(function(){
            show_error_enid(".place_registro_incidencia"  , "Error en la carga reporte al administrador " );       
        });    
    }
     e.preventDefault();
}