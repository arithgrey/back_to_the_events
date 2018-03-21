<div class="jumbotron jumbotron-sm" style='background:#2874F0;'>
    <div class="container">
        <?=n_row_12()?>
            <center>
            <label class='nueva_img_usuario' data-toggle="modal" data-target="#form_user_modal" >            
                +  Logo de su negocio
            </label>
            </center>
            <div class='seccion_img2'>
                <img width='100%;' id='imagen_usuario' src="'../../../img/index.php/enid/imagen_usuario/<?=$id_usuario?>">
            </div>               
        <?=end_row()?>
    </div>
</div>





  <div>       
        <center>
            <ul class="p-info">
            <li>
                <div class="title">
                    Teléfono
                </div>
                <div class="desk tel_contacto_text">                                              
                  <?=show_text_input($data_user["tel_contacto"] , 3 , "Número telefónico"  ,  "placeholder='55345...' maxlength='10' " )?>                                              
                </div>
                <span class='place_tel' >
                </span> 
                <div class='tel_e  hidden_enid'>
                  <?=create_dinamic_input("Tel.", "tel_contacto" ,  "tel_contacto form-control input-sm" ,  "tel_contacto"  ,  "tel_contacto_e " ,  $data_user["tel_contacto"]  ,  "placeholder='Número telefónico' " ,  "number");?>                                                                                
                </div>
            </li>
            <li>
                <div class="title">
                  Móvil
                </div>
                <div class="desk tel_contacto_text2">
                  <?=show_text_input($data_user["tel_contacto_alterno"] , 3, "Número móvil"  ,  "placeholder='55345...' maxlength='10' " )?>                                              
                </div>
                <span class='place_tel2' >
                </span> 
                <div class='tel_e2  hidden_enid'>
                  <?=create_dinamic_input( "Móvil", "tel_contacto2" ,  "tel_contacto2 form-control input-sm" ,  "tel_contacto2"  ,  "tel_contacto_e2" ,  $data_user["tel_contacto_alterno"] );?>                                                                                
                </div>
            </li>                                        
            </ul>
        </center>                                                                                             
  </div>
<style type="text/css">
.seccion_img{
    width: 50%;
    margin: 0 auto;
}
.nueva_img_usuario{
    color: white;
    font-weight: bold;
    font-size: 1.2em;
}
</style>