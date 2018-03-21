<?=n_row_12()?>
  <br>  
  <div class='response_img_logo_empresa' id='response_img_logo_empresa' >
  </div>
  <div class='col-lg-6 col-lg-offset-3'>
    <center>
    <?=btn_cargar_elementos($in_session , "btn_carga_img_logo" , "btn_carga_img_logo"  , "data-toggle='modal' data-target='#modal-logo-empresa' " ,  "Nuevo logo" )?>
    </center>

    <div class='img-logo-empresa' id='img-logo-empresa'>      
      <?=carga_logo_empresa($data_empresa);?>
    </div>                
  </div>

<?=end_row()?>