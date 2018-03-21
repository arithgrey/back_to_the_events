<form accept-charset="utf-8" method="POST" id="form_img_user"  class="form_img_user" enctype="multipart/form-data" >      
  <input type="file" id='imagen_usr' class='imagen_usr' name="imagen"/>
  <input type='hidden' name='q' value='perfil_user'>     
  <input type='hidden' name='dinamic_user' value="<?=$id_usuario?>">
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
  <div class='place_img_preview' id='place_img_preview'>
  </div>
</center>

<center>
  <div class='place_img_registrada' id='place_img_registrada'>
  </div>
</center>

<style type="text/css">
.guardar_img_enid{
  display: none;
}
</style>