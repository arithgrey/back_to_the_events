
 <!-- Modal -->
 <?=construye_header_modal('myModal', "Registrar  integrante " );?>  
                      
      <span class='text-center'>
                      Ingresa su mail y la información de su  cuenta junto con la contraseña será enviada al correo de la persona 
      </span>
      <form method="post" id="form_new_user" >   
        
            <div class="input-group">     
                <span class="input-group-addon" id="basic-addon1">
                                Nombre
                </span>
                <input class="form-control" placeholder="Jonathan" aria-describedby="basic-addon1" id="nombre" name="nombre" type="text">
            </div>     
            <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                                  @
                  </span>
                  <input type="mail" name='mail_newuser' id="mailnewcontact"  class="form-control"  placeholder="Email de la persona a quien quieres invitar a tu cuenta"  aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                                Perfil
                </span>
                <select id="newperfil" class='form-control m-bot15' name="newperfil">
                  <option value='4'>
                                  Administrador de cuenta
                  </option>
                  <option value='5'>
                                  Estratega digital
                  </option>
                  <option value='6'>
                                  Director de la empresa
                  </option>                            
                </select>
            </div>
            <div class="form-group">
              <label class="col-md-1 col-lg-1 col-sm-1 control-label" style='color:white;' for="selectbasic">
                              Inicio de labores 
              </label>
              <div class="">
                <div class="input-group bootstrap-timepicker">
                  <input class="form-control timepicker-default" id="inicio_labor" name="inicio_labor" value="<?=$data_user['inicio_labor']?>" type="text">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="fa fa-clock-o">
                          </i>
                        </button>
                      </span>
                  </div>
                </div>
                <label class="col-md-1 col-lg-1 col-sm-1 control-label" style='color:white;'>
                              Hora de término
                </label>
                <div class="col-md-5 col-lg-5 col-sm-5">
                  <div class="input-group bootstrap-timepicker">
                  <input class="form-control timepicker-default" id="fin_labor" name="fin_labor" value="<?=$data_user['fin_labor']?>" type="text">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">
                            <i class="fa fa-clock-o">
                            </i>
                          </button>
                        </span>
                    </div>
                  </div>
                </div>
                <button class="btn btn-default btn_save sednewsolicitud" type="button">
                            Enviar
                </button>                                                
                <div class='well' id="clientresponse">
                </div>        
<?=construye_footer_modal()?>  







































<!--*************************** INICIA MODAL PARA EDITAR LA NOTA ***************************-->
<?=construye_header_modal('edit-nota-user-modal', "Registrar  integrante " );?>  
          <!--Inicia nota del usuario -->
           <div class="form-group">
            <form class='' id="descripcion-miembro" action="descripcion-miembro" METHOD=''>
              <label for="comment">
                Nota adicional 
              </label>
              <textarea class="form-control nota-user-text" name='descripcion-user' rows="5" id="descripcion-user-modal">
              </textarea>
              <button class='btn_nnuevo '>
                Registrar cambios
              </button>
              <!---->
              <div class='panel alert-ok' >
                <em>
                    Cambios registrados
                </em>
              </div>
              <div class='panel alert-fail' >
                <em>
                    Falla al guardar cambios
                </em>
              </div>
              <!---->
            </form>
          </div>
<?=construye_footer_modal()?>                   
<!-- TERMINA MODAL EDITAR NOTA DEL USUARIO  -->





<!--*************************** INICIA MODAL PARA CARGAR LA IMAGEN ***************************-->
<?=construye_header_modal('img_user_modal', "Cargar imagen" );?>  
    <?=$this->load->view('imgs/user_perfiles')?>
<?=construye_footer_modal()?>                                                      
 <!-- TERMINA MODAL EDITAR NOTA DEL USUARIO  -->