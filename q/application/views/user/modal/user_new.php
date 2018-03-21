<br>
<div class='row'>
  <div class='col-lg-12 col-md-12 col-sm-12'>

    <div>
      <div class='seccion-miembro-text'>
        <span class='datos-user-text'>
          Datos del miembro
        </span>            
      </div>
    </div>

    <div class='row'>
      <span class='user_edit_text'>
        
      </span>  
    </div>
    <div class='more-fields-contenedor'>
      <span class='more-inputs'>
        <i class='fa fa-chevron-down' aria-hidden='true'> 
        </i>  
        Más info 
      </span>
    </div>
    <form class="form-horizontal" id="form-integrante-edicion" action="<?=base_url('index.php/api/user/miembro/format/json/')?>">
      <input type='hidden' name='id_usuario' id='id_usuario' class='idusuario' value=''>
      <input type="hidden" name="action" id='action' class='action' value="">                                                                                               
      
      <div class='hidden_inputs_enid'>
          <div class="input-group">
            <span class="input-group-addon">
              Apellido paterno
            </span>
            <input id='apellido_paterno' name="apellido_paterno" value="" class="form-control input-sm  uppercase_enid " placeholder="Primer apellido" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>                      
      </div> 

      <div class='hidden_inputs_enid'>
        <div class="input-group">
          <span class="input-group-addon">
            Apellido materno
          </span>
          <input name="apellido_materno"  id="apellido_materno" value=""  class="form-control input-sm uppercase_enid" placeholder="Segundo apellido" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();">
        </div>                      
      </div>
      <div>
        <div class="input-group">
          <span class="input-group-addon">
            Nombre(s)
          </span>
          <input id="nombres" name="nombres" value="" class="form-control input-sm uppercase_enid" placeholder="Nombre(s) del miembro" type="text" required  onkeyup="javascript:this.value=this.value.toUpperCase();">
        </div>                      
        <span class='place_nombre_vali validado'>                            
        </span>
      </div>  
                                             
      <div id='email-section'>
        <div class="input-group">
          <span class="input-group-addon">
            Usuario (e-mail) 
          </span>
          <input name="email" class="form-control input-sm"     placeholder="email" type="email" id="email" >
        </div>                                                
        <span class='place_mail_vali validado' id='place_mail_vali'>
        </span>
      </div>

      <div class='hidden_inputs_enid'>
        <div class="input-group">
          <span class="input-group-addon">
            E-mail alterno 
          </span>
          <input name="email_alterno" id="email_alterno" value=""  class="form-control input-sm " placeholder="email alterno" type="email">
        </div>                      
      </div>

      <div class='hidden_inputs_enid'>
        <div class="input-group">
          <span class="input-group-addon">
          Edad 
          </span>
          <?=create_select_edad_form("edad_user")?>                          
        </div>                      
      </div>
                                                                                                           
      <div class='hidden_inputs_enid'>
        <div class="input-group">
          <span class="input-group-addon">
              Teléfono de contacto 
          </span>
          <input name="tel_contacto" id="tel_contacto"  value="" class="form-control input-sm " placeholder="teléfono de contacto" type="tel">
        </div>                      
      </div>

      <div class='hidden_inputs_enid'>
        <div class="input-group">
          <span class="input-group-addon">
            Otro teléfono
          </span>
          <input name="tel_contacto_alterno"  value="" id="tel_contacto_alterno" class="form-control input-sm " placeholder="teléfono de contacto" type="tel">
        </div>                      
      </div>                                               
                                                                                        
      <div class='hidden_inputs_enid'>                        
        <div class="input-group">                        
            <div class="input-group bootstrap-timepicker">
                <span class="input-group-addon">
                 Inicio de labores
                </span>
                <input class="form-control timepicker-default input-sm uppercase_enid " id="inicio_labor"  name="inicio_labor" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-clock-o">
                        </i>
                    </button>
                </span>
            </div>
        </div>                      
      </div>

      <div class='hidden_inputs_enid'>                       
        <div class="input-group">                        
            <div class="input-group bootstrap-timepicker">
                <span class="input-group-addon input-sm">
                  Fin de labores
                </span>
                <input class="form-control timepicker-default input-sm uppercase_enid " id="fin_labor" value="" name="fin_labor" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-clock-o">
                        </i>
                    </button>
                </span>
            </div>
        </div>                      
      </div> 

      <div class='hidden_inputs_enid'>                
        <div class="input-group">                                                       
          <span class="input-group-addon">
            RFC 
          </span>
          <input name="rfc" id="rfc" value="" class="form-control input-sm" placeholder="RFC" type="text"  style="text-transform:uppercase;">                               
        </div>                      
      </div> 

      <div class='hidden_inputs_enid'>                
        <div class="input-group">                                                   
            <span class="input-group-addon">
              Turno
            </span>
            <?=get_turnos_def("turno", "form-control input-sm" , "turno_user" )?>                                    
        </div>                      
      </div>

      <div class='hidden_inputs_enid'>                
        <div class="input-group">                                                   
            <span class="input-group-addon">
              Grupo
            </span>                                    
            <?=get_def_grupo("grupo", "form-control input-sm" , "grupo_user" )?>
        </div>                      
      </div>
                          
      <div class='hidden_inputs_enid'>                
        <div class="input-group">                                                   
            <span class="input-group-addon">
              Cargo
            </span>
            <?=get_def_cargo("cargo", "form-control input-sm" , "cargo_user" )?>                             
        </div>                      
      </div>
      <div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
             Perfil
            </span>              
            <?=create_select($perfiles , "perfil_user" , "perfil_user form-control input-sm" , "perfil_user" , "nombreperfil" , "idperfil" )?>                
        </div>
      </div>  
      <br>                                                                                
      <button class='btn btn-default btn_save pull-left'>
        Registrar
      </button>               
    </form>
    <button class="btn btn-default pull-right" id="btn_cancelar">
      Cancelar
    </button>

  </div>
</div>

              



<style type="text/css">
.datos-user-text{
  font-weight: bold;  
  color: #154469;
}
</style>