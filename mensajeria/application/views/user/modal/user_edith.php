<div class='row'>
  <button  type="button" class=" nueva_busqueda btn_nnuevo " 
    title='Registra un nuevo integrante a la cuenta'>
      <i class="fa fa-search" aria-hidden="true">
      </i> 
      Búsqueda 
  </button> 
   <div class='seccion-miembro-text'>
      <span class='datos-user-text'>
        Datos del nuevo miembro
      </span>      
    </div>

  <div class='response_insert_user' id="response_insert_user">
  </div>
</div>
<br>
<div class='row'>
  <form class="form-horizontal" id="form-integrante-edicion" action="<?=base_url('index.php/api/user/miembro/format/json/')?>">
                    <input type='hidden' name='id_usuario' id='id_usuario' class='idusuario' value='<?=$usuario["idusuario"]?>'>                                                                   
                        <div class="form-group">                      
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                                Apellido paterno
                              </span>
                              <input id='apellido_paterno' name="apellido_paterno" value="<?=$usuario["apellido_paterno"]?>" class="form-control input-sm uppercase_enid " placeholder="Primer apellido" type="text">
                            </div>                      
                          </div>                      
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                                Apellido materno
                              </span>
                              <input name="apellido_materno"  id="apellido_materno" value="<?=$usuario["apellido_materno"]?>"  class="form-control input-sm uppercase_enid " placeholder="Segundo apellido" type="text">
                            </div>                      
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                                Nombre(s)
                              </span>
                              <input id="nombres" name="nombres" value="<?=$usuario["nombre"];?>" class="form-control input-sm uppercase_enid" placeholder="Nombre(s) del miembro" type="text" required >
                            </div>   
                            <span class='place_nombre_vali validado'>
                            </span>                   
                          </div>                        
                        </div>
                       
                        
                        
                        <div class="form-group f-1 ">                                              
                          <div class="col-lg-4 col-md-4 col-sm-12" id='email-section'>
                            <div class="input-group">
                              <span class="input-group-addon">
                                Usuario (e-mail) 
                              </span>
                              <input name="email" class="form-control input-sm" value="<?=$usuario["email"]?>"    placeholder="email" type="email" id="email" readonly >
                            </div>                      
                            <span class='place_mail_vali validado' id='place_mail_vali'>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                              E-mail alterno 
                              </span>
                              <input name="email_alterno" id="email_alterno" value="<?=$usuario["email_alterno"];?>"  class="form-control input-sm " placeholder="email alterno" type="email">
                            </div>                      
                          </div>
                          <div class="col-lg-4 col-sm-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                                Edad 
                              </span>
                              <?=create_select_edad_form("edad_user")?>                          
                            </div>                      
                          </div>
                        </div>
                        <div class="form-group f-2">                                                                  
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                               Teléfono de contacto 
                              </span>
                              <input name="tel_contacto" value="<?=$usuario["tel_contacto"]?>" class="form-control input-sm " placeholder="teléfono de contacto" type="tel">
                            </div>                      
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                               Otro teléfono
                              </span>
                              <input name="tel_contacto_alterno"  value="<?=$usuario["tel_contacto_alterno"]?>" id="tel_contacto_alterno" class="form-control input-sm " placeholder="teléfono de contacto" type="tel">
                            </div>                      
                          </div>
                         
                          <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="input-group">
                              <span class="input-group-addon">
                                Estado  del miembro 
                              </span>
                              <?=create_select_estados_user($usuario["status"] ,  'form-control input-sm ' )?>
                             
                            </div>                      
                          </div>
                          
                        </div>
                        <div class="form-group f-3 ">                                                                  
                          <div class="col-lg-4 col-md-4 col-sm-12">                        
                            <div class="input-group">                        
                               <div class="input-group bootstrap-timepicker">
                                    <span class="input-group-addon">
                                    Inicio de labores
                                    </span>
                                    <input class="form-control timepicker-default input-sm" id="inicio_labor"  value="<?=$usuario["inicio_labor"]?>" name="inicio_labor" type="text">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-clock-o">
                                            </i>
                                        </button>
                                    </span>
                                </div>
                            </div>                      
                          </div>                                  
                          <div class="col-lg-4 col-md-4 col-sm-12">                       
                            <div class="input-group">                        
                               <div class="input-group bootstrap-timepicker">
                                    <span class="input-group-addon input-sm">
                                    Fin de labores
                                    </span>
                                    <input class="form-control timepicker-default input-sm" id="fin_labor" value="<?=$usuario["fin_labor"]?>" name="fin_labor" type="text">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-clock-o">
                                            </i>
                                        </button>
                                    </span>
                                </div>
                            </div>                      
                          </div>                  
                          <div class="col-lg-4 col-md-4 col-sm-12">                
                            <div class="input-group">                                                     
                                <span class="input-group-addon">
                                      RFC 
                                </span>
                                <input name="rfc" id="rfc" value="<?=$usuario["rfc"]?>" class="form-control input-sm uppercase_enid " placeholder="RFC" type="text" >
                               
                            </div>                      
                          </div>
                        </div>    
                        <div class="form-group f-1 ">   
                          <div class="col-lg-3 col-md-3 col-sm-12">                
                            <div class="input-group">                                                   
                                  <span class="input-group-addon">
                                      Turno
                                  </span>
                                  <select name='turno' class='form-control input-sm' id='turno_user'>
                                    <option value='Matutino'>Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                    <option value="Nocturno">Nocturno</option>
                                    <option value="Mixto">Mixto</option>
                                  </select>                            
                            </div>                      
                          </div>

                          <div class="col-lg-3 col-md-3 col-sm-12">                
                            <div class="input-group">                                                   
                                  <span class="input-group-addon">
                                    Grupo
                                  </span>
                                  <select name='grupo' class='form-control input-sm' id='turno_user'>
                                    <option value="Marketing">Marketing</option>                                
                                    <option value="Audio y video">Audio y video </option>  
                                    <option value="Iluminación">Iluminación</option>
                                    <option value='Calidad'>Calidad</option>
                                    <option value="Venta">Venta</option>
                                    <option value="Escenografía">Escenografía</option>
                                    <option value="Comunicación">Comunicación</option>                                
                                    <option value="Información">Información</option>        
                                    <option value="Seguridad">Seguridad</option>                        
                                  </select>                            
                            </div>                      
                          </div>

                          <div class="col-lg-3 col-md-3 col-sm-12">                
                            <div class="input-group">                                                   
                                  <span class="input-group-addon">
                                    Cargo
                                  </span>
                                  <select name='cargo' class='form-control input-sm' id='cargo_user'>
                                    <option value="Director">Director</option>
                                    <option value="Director comercial">Director comercial</option>                                
                                    <option value="Director de comunicación">Director de comunicación</option>                                
                                    <option value="Director de tecnología">Director de tecnología</option>
                                    <option value="Coordinador">Coordinador</option>
                                    <option value="Gerente">Gerente</option>                                
                                    <option value="Subdirector">Subdirector</option>                                
                                    <option value="Supervisor">Supervisor</option>                                
                                    <option value="Jefe de operaciones">Jefe de operaciones</option>
                                    <option value="Staff">Staff</option>       
                                    <option value="Staff">Staff de seguridad</option>       
                                    <option value="Otro">Otro</option>                                                                
                                  </select>                            
                            </div>                      
                          </div>

                          <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                  Perfil
                                </span>
                                <?=create_select_selected($perfiles_disponibles , "idperfil" , "nombreperfil" ,   $usuario["idperfil"]  , "perfil_user" , " form-control input-sm ");?>

                            </div>
                          </div>                    
                        </div>  
                        <div class="row">                           
                          <div class='col-lg-12 col-md-12 col-sm-12'>
                            <button class='btn btn-default btn_save'>
                              Registrar cambios 
                            </button>                                                  
                          </div>
                        </div>  
                    </div>                  
  </form>
</div>
              

<!---<script type="text/javascript" src="<?=base_url('application/js/usuarios/config_user.js')?>"></script>-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<style type="text/css">
.datos-user-text{
  font-weight: bold;  
  color: #154469;
}
</style>





