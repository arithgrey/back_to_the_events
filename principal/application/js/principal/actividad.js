/*Cambiamos el tamaño de la sección por clase*/
function  dinamic_width(section , clases){   
   $(section).addClass(clases); 
}
function dinamic_remov_class(section , clases){  
  $(section).removeClass(clases); 
}
/**/
function carga_ultima_actividad_eventos(){
  /**/
  alert();
  url =  now +  "index.php/api/emp/actividades/format/json/";
  $.ajax({
    url :  url , 
    data : {"tipo_actividad" : "eventos" },
    type :  "GET",
    beforeSend: function(){
       show_load_enid(".last-activity-enid" , "Cargando ... " , 1);      
    }
  }).done(function(data){
      llenaelementoHTML(".last-activity-enid" , data);
      //$("footer").ready(q_eventos);
  }).fail(function(){   
      show_error_enid(".last-activity-enid"  , "Error al al registrar artista");       
  });

}
/**/
function dinamic_section_left(){
  showonehideone(".dinamic_activity_section_left" , ".dinamic_activity_section_right" );             
  dinamic_remov_class("#section_main_left" , " col-lg-8 col-md-8 col-sm-8 ");     
  dinamic_width("#section_main_left" , " col-lg-12 col-md-12 col-sm-12 ");  
  $("#section_main_right").hide();      
  $("#dinamic_activity_section_right").click(dinamic_section_left);
  $("#dinamic_activity_section_left").click(dinamic_section_right); 
 
}
/**/
function dinamic_section_right(){
  showonehideone(".dinamic_activity_section_right"  , ".dinamic_activity_section_left" );         
  dinamic_remov_class("#section_main_left" , " col-lg-12 col-md-12 col-sm-12 ");
  dinamic_width("#section_main_left" , " col-lg-8 col-md-8 col-sm-8 ");          
  $("#section_main_right").show(); 
  $("#dinamic_activity_section_right").click(dinamic_section_left);
  $("#dinamic_activity_section_left").click(dinamic_section_right);
}