<form accept-charset="utf-8" method="POST" id="form_img_portada_evento"  class="form_img_portada_evento" enctype="multipart/form-data" >      
  <input type="file" id='imagen_portada_evento' class='imagen_portada_evento' name="imagen"/>
  <input type='hidden' name='q' value='portada_evento'>     
  <input type='hidden' name='evento_portada' value="<?=$id_evento?>">
  <input class='dinamic_evento_portada' id='dinamic_evento_portada' name='dinamic_evento_portada' type='hidden'>  
  <div class='separate-enid'>
  </div>    
  <button type="submit" class='btn btn btn-sm guardar_img_enid pull-right' id='guardar_img_portada' style='color:white;'>
    <i class='fa fa-check'>
    </i>
  </button>   
  <div class='separate-enid'>
  </div>  
  <center>        
    <div class='lista_imagenes_portada' id='lista_imagenes_portada'>
    </div>      
  </center>         
</form>


<center>
  <span class='place_img_load_evento'>
  </span>
</center>
<style type="text/css">
.guardar_img_enid{
  display: none;
}
li{
  list-style: none;
}
</style>