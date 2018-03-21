<form accept-charset="utf-8" method="POST" id="form_img_enid_artista"  class="form_img_enid_artista" enctype="multipart/form-data" >      
    <input type="file" id='imagen_artista' class='imagen_artista' name="imagen"/>
    <input type='hidden' name='q' value='artista'>         
    <input type='hidden' name='dinamic_artista_img' id='dinamic_artista_img' class='dinamic_artista_img' value="<?=$param['artista']?>">    
    <div class='separate-enid'>
    </div>
    <button type="submit" class='btn btn btn-sm guardar_img_enid pull-right' id='guardar_img_artista' style='color:white;'>
         <i class='fa fa-check'>
        </i>
    </button>           
    <div class='separate-enid'>
    </div>
    <center>        
        <div class='lista_imagenes_artista' id='lista_imagenes_artista'>
        </div>              
    </center>           
</form>



<center>
    <span class='place_img_artista_escenario'>
    </span>
</center>