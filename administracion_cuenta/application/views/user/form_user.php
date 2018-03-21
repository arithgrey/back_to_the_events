<style type="text/css">
.nueva_img_usuario, .nombres_user:hover , .apellido_user_materno:hover , .apellido_user_paterno:hover, .user_grupo_text:hover, .tel_contacto_text:hover{
  cursor: pointer;
}
.hidden_enid{
  display: none;
}
.edad_user_text:hover{
  cursor: pointer;
}

</style>
<?=n_row_12()?>            
  <div class='col-lg-4 col-lg-offset-4'>
    <div class='ver-public-lg-emp'>                      
        <a  href="#pill-1" role="tab" data-toggle="tab" class='active links_enid' id='section-comunidad'>
          <i class=" icon-up-1">
          </i> 
            Mi cuenta
        </a>|      
          
      <a href="#pill-2" role="tab" data-toggle="tab" class='links_enid' id='section-us'>
        <i class="icon-heart">
        </i> 
          Privacidad
      </a>                
    </div>    
  </div>   
  <br> 
  <br> 
<?=end_row()?>
<?=n_row_12()?>
<div class='col-lg-4 col-lg-offset-4'>
  <div class="tab-content">
    <div class="tab-pane active" id="pill-1">
      <?=$this->load->view("micuenta/general")?>
    </div>
    <div class="tab-pane" id="pill-2">
      <?=$this->load->view("micuenta/privacidad")?>
    </div>    
  </div>            
</div>            
<?=end_row()?>
<script src="<?=base_url('application/js/sha1.js');?>"></script>    
<script type="text/javascript" src="<?=base_url('application/js/MiCuenta/perfil_user.js')?>"></script>