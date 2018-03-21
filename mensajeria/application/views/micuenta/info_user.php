

<div class="panel-body contenido-desc" > 
  <div class="profile-desk">
    <h1>
      <?=$data_user['nombre']?>
      <?=$data_user["apellido_paterno"]?>
      <?=$data_user["apellido_materno"]?>
    </h1>
    <span class="designation">
      <?=$data_user['email']?>


      <?php 
        if (strlen($data_user['email_alterno']) > 2 ){
          echo " ó " .$data_user['email_alterno'];
        }
        
      ?>
            
    </span>
      <!--*************************DESCRIPCIÓN DEL USUARIO******-->
      <p  class='description-user '>
        <?=substr($data_user["descripcion_usuario"] , 0 , 200) ?>
        <br>
        <a class="more more-info-description">
          Seguir leyendo
        </a>                                                    
      </p>
      <p class='complete-description-user ' style='display:none;'>
        <?=$data_user["descripcion_usuario"]?>
        <br>
        <a class="more less-info-description">
          Ocultar
        </a>                                                    
      </p>                              
      <?=$data_user["edad"]?>
      años 
      RFC : 
      <?=$data_user["rfc"];?>
<!--*************************TERMINA LA DESCRIPCIÓN DEL USUARIO******-->

                                      <ul class="p-social-link pull-right">
                                          <li>
                                              <a href="<?=$data_user['url_fb']?>">
                                                  <i class="fa fa-facebook">
                                                  </i>
                                              </a>
                                          </li>
                                          <li class="active">
                                              <a href="<?=$data_user['url_tw']?>">
                                                  <i class="fa fa-twitter">
                                                  </i>
                                              </a>
                                          </li>
                                          <li title='Página web'>
                                              <a href="<?=$data_user['url_www']?>">
                                                    www
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                              <span style='font-size:.8em;' class='pull-right'>
                                  Registro de la cuenta
                                  <?=$data_user["fecha_registro"]?>                                 
                                  Última modificación :  
                                  <?=$data_user["ultima_modificacion"]?>
                              </span>



<!--*************************IMAGEN DE PERFIL DEL USUARIO ******-->
<!--*************************TERMINA LA IMAGEN DE PERFIL DEL USUARIO ******-->






