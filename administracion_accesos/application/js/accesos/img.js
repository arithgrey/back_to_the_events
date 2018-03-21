function carga_form_imagen_acceso(e){

    url =  "../imgs/index.php/api/img_controller/form_img_acceso/format/json/";    
    set_acceso(e.target.id);
    $.ajax({
        url : url , 
        type : "GET" ,
        data :  {"id_acceso" :  get_acceso() },
        beforeSend: function(){            
            show_load_enid(".place_img_acceso" , "Cargando formulario" , 1 ); 
        }
    }).done(function(data){        
            
        $(".place_img_acceso").empty();
        llenaelementoHTML(".imagenes_acceso_form" , data);            
        //carga_imgs_acceso();
        $("#imagen_acceso").change(upload_imgs_enid_acceso);
    }).fail(function(){
        show_error_enid(".place_img_acceso" , "Error al cargar el formulario para cargar las imagenes del acceso, reporte al administrador" ); 
    });

}
function carga_imagen_acceso(e){
    
    acceso =e.target.id;
    set_acceso(acceso);

    $(".dinamic_acceso_img").val(get_acceso());
    $("#imgs-acceso").attr("value" , "");
    $("#lista_imagenes_acceso").html("");
    $("#guardar_img_acceso").hide();
    
}
/**/
function upload_imgs_enid_acceso(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_acceso');            
        $("#guardar_img_acceso").show();
        $("#form_img_enid_acceso").submit(registra_img_acceso);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_acceso(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_enid_acceso"));    
    url =   "../imgs/index.php/api/archivo/imgs";
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false, 
            beforeSend : function(){
                show_load_enid(".place_load_img_acceso",  "Cargando ..." , 2 );                 
                $(".guardar_img_enid").hide();
            }

    }).done(function(data){        

        url =  "../administracion_accesos/?q=" + get_evento();
        redirect(url);
        
        show_response_ok_enid(".place_load_img_acceso" ,  "Imagen cargada con éxito!" ); 
        $("#acceso-imagen-modal").modal("hide");        
        
    }).fail(function(){
        show_error_enid(".place_load_img_acceso" , "Error cargar imagen al acceso reporte al administrador");
    });
    $.removeData(formData);
}
