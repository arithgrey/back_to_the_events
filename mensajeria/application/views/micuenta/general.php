

            <div class="row">               
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-desk">                                      
                                        <h1 class='nombres_user' title='Click para editar tu nombre'>                                                    
                                           <?=show_text_input($data_user["nombre"] , 5  , "Nombre " )?>
                                        </h1>
                                        <span class='place_nombre'>
                                        </span>


                                        <?=create_dinamic_input("Nombre", "nombre_user" ,  "nombre_user form-control input-sm" ,  "nombre_user"  ,  "nombre_user_e hidden_enid" ,  $data_user["nombre"] ,  "placeholder='Tu nombre ' "  ,  "text");?>                                        

                                        
                                        <h1 class='apellido_user_paterno' title='Click para editar tu apellido paterno'>                                           
                                           <?=show_text_input($data_user["apellido_paterno"], 5  , "Apellido paterno" )?>
                                        </h1>
                                        <span class='place_apellido_paterno'>
                                        </span>
                                          <?=create_dinamic_input("Primer apellido", "apellido_paterno" ,  "apellido_paterno form-control input-sm" ,  "apellido_paterno"  ,  "apellido_paterno_e hidden_enid" ,  $data_user["apellido_paterno"] ,"placeholder='Tu apellido paterno ' "  ,  "text" );?>                                                                                

                                        <h1 class='apellido_user_materno' title='Click para editar tu apellido materno'>                                           
                                           <?=show_text_input($data_user["apellido_materno"], 5  , "Apellido materno" )?>
                                        </h1>
                                        <span class='place_apellido_materno'>
                                        </span>
                                          <?=create_dinamic_input("Segundo apellido", "apellido_materno" ,  "apellido_materno form-control input-sm" ,  "apellido_materno"  ,  "apellido_materno_e hidden_enid" ,  $data_user["apellido_materno"] ,  "placeholder='Tu apellido materno ' "  ,  "text");?>                                                                                

                                        <br>          
                                        <span class="designation">
                                          <span class='user_grupo_text'> 
                                            Grupo: <?=$data_user["grupo"]?> 
                                          </span> 
                                          <span>
                                            |
                                          </span>
                                          <span class='user_cargo_text'>
                                           Cargo: <?=$data_user["cargo"]?>                                           
                                          </span>                                          
                                        </span>

                                        <div class='row'>
                                          <div class='place_grupo'>
                                          </div>
                                          <div class='grupo_e hidden_enid'>
                                            <?=create_select_grupos($data_user["grupo"] ,   "form-control nuser_grupo ")?>
                                          </div>
                                        </div>

                                        <div class='row'>
                                          <div class='place_cargo'>
                                          </div>
                                          <div class='cargo_e hidden_enid'>
                                            <?=create_select_cargos($data_user["cargo"]  ,  "form-control nuser_cargo" );?>
                                          </div>
                                        </div>

                                        <p class='user_descripcion_text'>
                                          <span class='title-user-descripcion'>
                                             + Tu descripción :  
                                          </span>
                                          <span class='user-desc'>
                                             <?=$data_user["descripcion_usuario"]?>  
                                          </span>                                      
                                        </p>
                                        
                                        <div class='row'>
                                          <div class='place_descripcion'>
                                          </div>
                                          <div class='user_descripcion_e hidden_enid '>
                                            <label>
                                              <small>
                                                Acerca de ti 
                                              </small>
                                            </label>
                                            <textarea class="form-control" rows="3" name="descripcion" id="descripcion_user" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                              <?=$data_user["descripcion_usuario"]?>
                                            </textarea>
                                          </div>                                        
                                        </div>

                                        <ul class="p-social-link pull-right">
                                            <?=validate_social( $data_user["url_fb"] , "pfb" , " fa fa-facebook " )?>
                                            <?=validate_social( $data_user["url_tw"] , "ptw" , " fa fa-twitter " )?>
                                            <?=validate_social( $data_user["url_www"] , "pwwww" , " fa fa-www " , 1)?>
                                        </ul>
                                        
                                        <?=create_dinamic_input( "Facebook" , "url_fb" ,  "url_fb form-control input-sm" ,  "url_fb"  ,  "pfb_e hidden_enid" ,  $data_user["url_fb"]  , "placeholder= 'URL de la red social'  " ,  "url" );?>                                                                                
                                        <div class='place_pfb'>
                                        </div>

                                        <?=create_dinamic_input("Twitter", "url_tw" ,  "url_tw form-control input-sm" ,  "url_tw"  ,  "url_tw_e hidden_enid" ,  $data_user["url_tw"] , "placeholder= 'URL de la red social'  " ,  "url");?>                                                                                
                                        <div class='place_url_tw'>
                                        </div>

                                        <?=create_dinamic_input("Página web ", "url_www" ,  "url_www form-control input-sm" ,  "url_www"  ,  "url_www_e hidden_enid" ,  $data_user["url_www"] , "placeholder= 'URL de te página web'  "  ,  "url");?>                                                                                
                                        <div class='place_url_www'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                      
                </div>
                 <div class="col-md-4">
                    <div class="row">
                        <span class='pull-left num_empleado'>
                          #empleado <?=$data_user["numero_empleado"]?> | <?=$data_user["turno"]?>| Horario <?=$data_user["inicio_labor"]?> <?=$data_user["fin_labor"]?>
                        </span>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">

                                    <ul class="p-info">
                                        <li>
                                            <div class="title">
                                              Sexo
                                            </div>
                                            <div class="desk sexo_user_text">
                                              
                                              
                                              <?=show_text_input($data_user["sexo"] , 5 , "Tu sexo" )?>
                                            </div>
                                            <div class='place_sexo'></div>
                                            <div class='sexo_e hidden_enid' title='Click para editar tu sexo'>
                                              <?=create_select_sexo("sexo" , $data_user["sexo"] ,  "sexo" ,  "sexo form-control");?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                            Edad
                                            </div>
                                            <div class="desk edad_user_text"  title='click para modificar tu edad '>
                                              <?=show_text_input($data_user["edad"] , 2 , "Tu edad" )?>
                                              
                                            </div>                                             
                                            <span class='place_edad' id='place_edad'></span> 
                                            <div class='edad_e  hidden_enid'>
                                              <?=create_select_edad_form("edad_user" ,  $data_user["edad"] );?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Teléfono</div>
                                            <div class="desk tel_contacto_text">
                                              
                                              <?=show_text_input($data_user["tel_contacto"] , 5 , "Número telefónico"  ,  "placeholder='55345...' maxlength='10' " )?>
                                              
                                            </div>
                                            <span class='place_tel' ></span> 
                                            <div class='tel_e  hidden_enid'>
                                              <?=create_dinamic_input("Tel.", "tel_contacto" ,  "tel_contacto form-control input-sm" ,  "tel_contacto"  ,  "tel_contacto_e " ,  $data_user["tel_contacto"]  ,  "placeholder='Número telefónico' " ,  "number");?>                                                                                
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Móvil</div>
                                            <div class="desk tel_contacto_text2">
                                              <?=show_text_input($data_user["tel_contacto_alterno"] , 5 , "Número móvil"  ,  "placeholder='55345...' maxlength='10' " )?>
                                              
                                            </div>

                                            <span class='place_tel2' ></span> 
                                            <div class='tel_e2  hidden_enid'>
                                              <?=create_dinamic_input( "Móvil", "tel_contacto2" ,  "tel_contacto2 form-control input-sm" ,  "tel_contacto2"  ,  "tel_contacto_e2" ,  $data_user["tel_contacto_alterno"] );?>                                                                                
                                            </div>


                                        </li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                          <h4>RFC : 
                                            <span class='user_rfc_text'>
                                              
                                              <?=show_text_input($data_user["rfc"] , 5 , "RFC "  ,  "placeholder='MESJ122...' " )?>
                                            </span>
                                          </h4>
                                          
                                          <div class='place_rfc'></div>
                                          <div class='user_rfc_e hidden_enid' >
                                            <?=create_dinamic_input("RFC", "rfc" ,  "rfc form-control input-sm" ,  "rfc"  ,  "rfc_input" ,  $data_user["rfc"] );?>                                                                                
                                          </div>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>


            </div>



<!---->
<div class='col-lg-12 col-md-12 col-sm-12'>  
    <iframe height='500px;' width='100%'   id='iframe_maps_conf'  src="<?=url_tmp_maps()?>/<?=$data_user['idusuario']?>/3/99999999/">
    </iframe>   
</div>