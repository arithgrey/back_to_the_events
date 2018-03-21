function carga_form_imagenes_usuario(){    
    url =  "../imgs/index.php/api/img_controller/form_img_user/format/json/";
    $.ajax({
        url : url , 
        type : "GET" ,
        data : {},
        beforeSend: function(){                        
            show_load_enid(".place_form_img" , "Cargando ... " , 1 ); 
        }
    }).done(function(data){        
        
        llenaelementoHTML(".place_form_img" ,  data);
        $(".imagen_usr").change(upload_imgs_enid_pre);
        
    }).fail(function(){
        show_error_enid(".place_form_img" , "Error al cargar la sección de imagenes para el esceario" ); 
    });

}/**/
function upload_imgs_enid_pre(){    

    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'place_img_preview');            
        $(".guardar_img_enid").show();
        $("#form_img_user").submit(registra_img_usr);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_usr(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_user"));    
    url = "../imgs/index.php/api/archivo/imgs";
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false , 
            beforeSend : function(){
               show_load_enid(".place_img_registrada", "Cargando ... " , 2);                 
               $(".guardar_img_enid").hide();
            }
    }).done(function(data){

        console.log(data);
        show_response_ok_enid(".place_img_registrada" , "Imagen cargada con éxito" );             
        $('#form_user_modal').modal('hide');                       
        new_url =  $("#imagen_usuario").attr("src");        
        $(".seccion_img").empty();

        new_img =  '<img class="icono_enid_format" width="100%;" id="imagen_usuario" src="'+new_url+'">';
        new_img2 =  '<img  width="100%;" id="imagen_usuario" src="'+new_url+'">';

        llenaelementoHTML(".seccion_img" , new_img);
        llenaelementoHTML(".seccion_img2" , new_img2);
        

        

    }).fail(function(){
        show_error_enid(".place_img_registrada" , "Falla al actualizar al cargar la imagen" );   
    });
    $.removeData(formData);
}        
/**/     
