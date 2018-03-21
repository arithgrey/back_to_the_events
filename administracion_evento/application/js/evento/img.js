function carga_img_portada(){    
    url = "../imgs/index.php/api/img_controller/form_evento/format/json/";  
    evento =  $("#evento").val();
    $.ajax({        
            url : url ,
            data : {"evento" : evento ,"public" : 1 },
            beforeSend : function(){
                show_load_enid(".place_form_portada", "Cargando ...  " , 1); 
            }
        }).done(function(data){

            $(".place_form_portada").empty();
            llenaelementoHTML(".seccion_form_portada" , data);
            $(".imagen_portada_evento").change(upload_imgs_portada_evento);
        }).fail(function(){
            show_error_enid(".place_form_portada" , "Falla al actualizar al cargar el formulario para la carga de la portada, reporte al administrador " );   
        });    
}
/**/
/**/
function upload_imgs_portada_evento(){    

    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_portada');            
        $("#guardar_img_portada").show();
        $("#form_img_portada_evento").submit(registra_img_portada);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_portada(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_portada_evento"));    
    url =  "../imgs/index.php/api/archivo/imgs";
    
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false , 
            beforeSend : function(){
               show_load_enid(".place_img_load_evento", "Cargando ... " , 2);                 
               $(".guardar_img_enid").hide();
            }
    }).done(function(data){

        show_response_ok_enid(".place_img_load_evento" , "Imagen cargada al evento con éxito.! " );             
        $('#modal-img-evento-section').modal('hide');       
        load_data_slider();           
        
        recorrepage("#response_img_portada");
    }).fail(function(){
        show_error_enid(".place_img_load_evento" , "Falla al actualizar al cargar la imagen" );   
    });
    $.removeData(formData);
}        
/**/     
function load_data_slider(){
    
    id_evento =  $("#evento").val();
    url =  "../imgs/index.php/api/event/imagenes/format/json/";
    nombre_evento =  $("#nombre_evento_val").val();
    in_session =  $(".in_session").val();
    slogan  =  $(".eslogan").val();
    
    $.ajax({
        url :  url , 
        type :  "GET", 
        data: {"id_evento" : id_evento , "nombre_evento" : nombre_evento ,  "public" :  0  , "in_session" : in_session ,  "slogan" : slogan  } , 
        beforeSend : function(){            
            show_load_enid(".place_slider_portada", "Cargando ... " , 1); 
        }
    }).done(function(data){        
        
        $(".place_slider_portada").empty();
        llenaelementoHTML(".portada_evento_section" , data );
    }).fail(function(){
        show_error_enid(".place_slider_portada" , "Falla al actualizar la portada del evento, reporte al administrador " );   
    });    

}    