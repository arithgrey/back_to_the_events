<div class='form-section-editar'>
  <button  class='btn_nnuevo buton_cancelar_edicion' id='buton_cancelar_edicion' style='display:none;'>
    Cancelar
  </button>
          <form class="form-horizontal" id='form-user-update' method='POST' action="<?=base_url('index.php/api/misdatoscontrolador/usuario/format/json')?>">
          <div  id='section-form-datos'>

          <!-- Form Name -->
          <div class='msj_update_status' id="msj_update_status"></div>      
          <!-- Prepended text-->
          <div class="form-group">            
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="input-group">
                <span class="input-group-addon ">
                  Nombre(s)
                </span>
                <input id="prependedtext" name="nombre" class="form-control input-sm input-sm" placeholder="Jonathan Medrano" value="<?=$data_user['nombre']?>" required="" type="text">
              </div>    
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">
                  Apellido Paterno
                </span>
                <input id="prependedtext" name="apellido_paterno" class="form-control input-sm" value="<?=$data_user['apellido_paterno'];?>" placeholder="placeholder" type="text">
              </div>              
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">
                  Apellido Materno
                </span>
                <input id="" name="apellido_materno" class="form-control input-sm" value="<?=$data_user['apellido_materno']?>" placeholder="Apellido Materno" type="text">
              </div>    
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4 col-lg-4 col-sm-4">
              <div class="input-group">
                <span class="input-group-addon">
                  Edad
                </span>
                <select id="selectbasic" name="edad" class="form-control">    
                  <?=get_count_select(18  , 100 , "" , $data_user['edad'] );?>
                </select>
              </div>
            </div>
            
            <div class="col-md-4 col-lg-4 col-sm-4">
              <div class="input-group">
                <span class="input-group-addon">
                  Tel. 1
                </span>
                <input id="tel_contacto"  name='tel_contacto' value="<?=$data_user['tel_contacto']?>" name="contacto" class="form-control input-sm" placeholder="5115..." type="text">
              </div>              
            </div>
            <div class="col-md-4 col-lg-4 col-sm-4">
              <div class="input-group">
                <span class="input-group-addon">
                  Tel. Alterno
                </span>
                <input id="" name="tel_alterno" value="<?=$data_user['tel_contacto_alterno']?>" class="form-control input-sm" placeholder="5115..." type="text">
              </div>            
            </div>
          </div>
        
        <!-- Prepended text-->
        <div class="form-group">          
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon">
                Correo
              </span>
              <input id="prependedtext" name="email" class="form-control input-sm" value="<?=$data_user['email']?>"  placeholder="arithgrey@gmail.com" type="text" required>
            </div>          
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon">
                Correo alterno
              </span>
              <input id="prependedtext" name="email_alternativo" class="form-control input-sm" value="<?=$data_user['email_alterno']?>"  placeholder="arithgrey@gmail.com" type="text">
            </div>          
          </div>
        </div>



            <div class="form-group">          
            <div class='col-md-6 col-lg-6 col-sm-6'>
              <div class="input-group">
                <span class="input-group-addon">
                  RFC
                </span>
                <input id="prependedtext" name="rfc" class="form-control input-sm input-sm" value="<?=$data_user['rfc']?>" type="text">
              </div>          
            </div>
            <div class='col-md-6 col-lg-6 col-sm-6'>
              <div class="input-group">
                <span class="input-group-addon">
                  Turno
                </span>
                <select name='turno' class='form-control input-sm'>                                  
                  <option value='Matutino'>
                    Matutino
                  </option>
                  <option value='Vespertino'>
                    Vespertino
                  </option>
                  <option value='Nocturno'>
                    Nocturno
                  </option>
                  <option value='Mixto'>
                    Mixto
                  </option>
                </select>
              </div>          
            </div>
            <!--Redes sociales user -->
            <div class='col-lg-12 col-md-12 col-sm-12'>
              <div class='col-lg-12 col-md-12 col-sm-12'>
                <div class="form-group">            
                     <div class="input-group">
                        <span class="input-group-addon">
                            Página web  www
                        </span>
                        <input class="form-control input-sm " name="npagina_web" id="npagina_web"   placeholder="www">
                     </div>
                 </div>                          
               </div>                          
             </div>                
             <div class='col-lg-12'>
                <div class='col-lg-6 col-md-6 col-sm-6 '>
                     <div class="form-group">            
                         <div class="input-group">
                            <span class="input-group-addon">
                                https://twitter.com/
                            </span>
                            <input class="form-control input-sm  " name="npagina_tw" id='npagina_tw'  type="text" placeholder='enidservice'>
                         </div>
                     </div>
                </div>     
                <div class='col-lg-6 col-md-6 col-sm-6 '>
                    <div class="form-group">            
                     <div class="input-group">
                        <span class="input-group-addon">
                            https://www.facebook.com/
                        </span>
                        <input class="form-control" name="npagina_fb" id='npagina_fb'   type="text"  placeholder='enidservice' >
                     </div>
                 </div>
                </div>    
             </div>
         

            <!--Redes sociales user termina  -->


          </div>
          <div class="form-group">
            <label class="col-md-1 col-lg-1 col-sm-1 control-label">
              Inicio labores
            </label>
            <div class="col-md-5 col-lg-5 col-sm-5">
              <div class="input-group bootstrap-timepicker">
                <input class="form-control input-sm timepicker-default" id="inicio_labor" name="inicio_labor" value="<?=$data_user['inicio_labor']?>" type="text">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <i class="fa fa-clock-o">
                    </i>
                  </button>
                  </span>
              </div>
            </div>

            <label class="col-md-1 col-lg-1 col-sm-1 control-label">
             Fin labores
            </label>
            <div class="col-md-5 col-lg-5 col-sm-5">
              <div class="input-group bootstrap-timepicker">
                <input class="form-control input-sm timepicker-default" id="fin_labor" name="fin_labor" value="<?=$data_user['fin_labor']?>" type="text">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                      <i class="fa fa-clock-o">
                      </i>
                    </button>
                  </span>
              </div>
            </div>
          </div>



        

          <div class="form-group">          
            <div class='col-md-12 col-lg-12 col-sm-12'>
              <textarea rows="6" name="descripcion_usuario" class="form-control input-sm" placeholder="Tu descripción">            
                <?=$data_user["descripcion_usuario"]?>
              </textarea>
            </div>
          </div>  


        <!-- Button -->
        
          <button class="btn btn-default btn_save">
          Actualizar información
          </button>          
          <br>

        </div>
        </form>
</div>