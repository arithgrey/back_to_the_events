<div class='row'>  
  <div class='col-lg-12 col-md-12 col-sm-12'>
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
</div>

<div class='row'>
  <div class="tab-content clear-style">
    <div class="tab-pane active" id="pill-1">
      <?=$this->load->view("micuenta/general")?>
    </div>
    <div class="tab-pane" id="pill-2">
      <?=$this->load->view("micuenta/privacidad")?>
    </div>    
  </div>            
</div>

            
        

<script src="<?=base_url('application/js/sha1.js');?>"></script>    
<script type="text/javascript" src="<?= base_url('application/js/MiCuenta/perfil_user.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/perfil_user/principal.css')?>">
<style type="text/css">
.title-user-descripcion{
  font-weight: bold;
  font-size: 1em;
}
.user-desc{
  font-size: .8em !important;
}
.color_social{
  color: rgb(62, 178, 192);
}
.sn_color_social{
  color: rgb(191, 191, 191);  
}

.nombres_user:hover , .apellido_user_materno:hover , .apellido_user_paterno:hover, .user_grupo_text:hover{
  cursor: pointer;
}
.hidden_enid{
  display: none;
}
.data_actualizada{
  font-size: .7em;
}
.pfb:hover , .user_descripcion_text:hover ,  .tel_contacto_text:hover{
  cursor: pointer;
}
.edad_user_text:hover{
  cursor: pointer;
}
.num_empleado{
  font-size: .9em;
}
.user_rfc_text:hover , .sexo_user_text:hover{
  cursor: pointer;
}

</style>
