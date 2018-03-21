<center>
  <?=titulo_enid("Actualiza tu contraseña")?>
</center>
<div class='row'>
    <div class="">                  
      <form id="form_update_password" method="post" action="">                    
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
              Password actual 
            </span>
            <input name="password" id="password" class="form-control input-sm" placeholder="" aria-describedby="basic-addon1" type="password" required>                                    
          </div>
          <div class='place_pw_1'>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
              Nueva
            </span>
            <input class="form-control input-sm" name="pw_nueva" id="pw_nueva" aria-describedby="basic-addon1" type="password" required>                        
          </div>                                
          <div class='place_pw_2'>
          </div>

          <div class="input-group">
          <span class="input-group-addon">
            Confirmar nueva
          </span>
          <input class="form-control input-sm" name="pw_nueva_confirm" id="pw_nueva_confirm" aria-describedby="basic-addon1" type="password" required>
          <input name="secret" id="secret" type="hidden">
          </div>                                
          <div class='place_pw_3'>
          </div>
          <div class="control-group">                                                          
            <label id="reportesession" class="reportesession">
            </label>                                                          
          </div>                
          <button id="inbutton" class="btn btn-default btn_save ">
            Actualizar 
          </button>                          
      </form>
      <span class='msj_password'> 
      </span>
  </div>     
</div>