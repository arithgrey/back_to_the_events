/**/
function form_galeria(){
    url =  now + "index.php/api/emp/form_galeria/format/json/";    
    $.ajax({
        url : url , 
        type : "GET" ,
        data :  {},
        beforeSend: function(){                        
            show_load_enid(".imagenes_empresa_galeria_form" , "Cargando ... " , 1 ); 
        }
    }).done(function(data){                
        llenaelementoHTML(".imagenes_empresa_galeria_form" ,  data);
        edita_galeria_empresa();
    }).fail(function(){
        show_error_enid(".imagenes_empresa_galeria_form" , "Error al cargar formulario galeria" ); 
    });

}
/**/
function carga_form_imagenes_empresa_logo(){    
    url =  now + "index.php/api/emp/form_logo/format/json/";    
    $.ajax({
        url : url , 
        type : "GET" ,
        data :  {},
        beforeSend: function(){            
            
            show_load_enid(".imagenes_empresa_logo_form" , "Cargando ... " , 1 ); 

        }
    }).done(function(data){                
        llenaelementoHTML(".imagenes_empresa_logo_form" ,  data);
        edita_logo_empresa();
    }).fail(function(){
        show_error_enid(".imagenes_empresa_logo_form" , "Error al cargar la sección de imagenes para el esceario" ); 
    });

}
/**/
function edita_logo_empresa(){

    $(".guardar_img_enid").hide();
    $(".imagen_logo_empresa").change(upload_imgs_enid_logo);
}
/**/
function edita_galeria_empresa(){

    $(".guardar_img_enid").hide();
    $(".imagen_gal_empresa").change(upload_imgs_enid_galeria);
}
/**/
function upload_imgs_enid_galeria(){      
    
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_galeria');            
        $(".guardar_img_enid").show();
        $("#form_img_galeria_empresa").submit(registra_img_galeria);            
    };
    reader.readAsDataURL(file);
}

/**/
function upload_imgs_enid_logo(){      
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_logo');            
        $(".guardar_img_enid").show();
        $("#form_img_logo_empresa").submit(registra_img_logo);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_logo(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_logo_empresa"));    
    url =  now + "index.php/api/archivo/imgs";    
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false, 
            beforeSend: function(){                
                show_load_enid(".place_load_imgs" , "Cargando ..." , 2 ); 
                $(".guardar_img_enid").hide();
            }

    }).done(function(data){
        
        $(".guardar_img_enid").hide();                       
        show_response_ok_enid(".place_load_imgs" ,  data);
        $('#modal-logo-empresa').modal('hide');        
        $("#lista_imagenes_logo").empty();
        $("#guardar_img_logo").hide();
        $(".img-logo-emp-section").empty();
        id_empresa = $(".id_empresa").val();       
        url_img = now + "index.php/enid/imagen_empresa"+"/"+id_empresa;
        modal = "data-toggle='modal' data-target='#modal-logo-empresa' ";   
        $(".img-logo-emp-section").html("<img id='img-logo-emp' class='img-tmp-empresa' title='Logo de la empresa' "+modal+" src='"+url_img +"' width='100%' >");
         
    }).fail(function(){        
        show_error_enid(".place_load_imgs" , "Problemas al cargar imagen, reporte al administrador");
    });
    $.removeData(formData);
}
/**/
function registra_img_galeria(e){
    
    e.preventDefault();

    var formData = new FormData(document.getElementById("form_img_galeria_empresa"));    
    url =  now + "index.php/api/archivo/imgs";    
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false, 
            beforeSend: function(){                
                show_load_enid(".place_load_imgs_galeria" , "Cargando ..." , 2 ); 
                $(".guardar_img_enid").hide();
            }
    }).done(function(data){
        $(".guardar_img_enid").hide();                       
        
        show_response_ok_enid(".place_load_imgs_galeria" ,  "Imagen cargada a la galeria.");
        $('#modal-galeria-empresa').modal('hide');        
        //$("#lista_imagenes_logo").empty();
        $("#guardar_img_logo").hide();
        $(".img-logo-emp-section").empty();
        //id_empresa = $(".id_empresa").val();       
        //url_img = now + "index.php/enid/imagen_empresa"+"/"+id_empresa;
        
        carga_galeria_images_empresa();
        
    }).fail(function(){        
        show_error_enid(".place_load_imgs_galeria" , "Problemas al cargar imagen, reporte al administrador");
    });
    $.removeData(formData);
}