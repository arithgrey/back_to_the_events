<?=n_row_12()?>
  <button type="button" class=" nuevo_user btn_nnuevo " title='Registra un nuevo integrante a la cuenta' >
          + Nuevo
  </button>  
  
<?=end_row();?>

<?=n_row_12()?>  
<br>
<br>
      <form class='form-busqueda-user' action='<?=base_url("index.php/api/cuentageneralrest/integrantescuenta/format/json")?>'>   
        <div class='row'>            
          <div class='col-lg-11 col-md-11 col-sm-12'>
            <div class='col-lg-3 col-md-3 col-sm-12'>
              <span class="text-filtro-enid">
                + Filtros
              </span>              
              <div class="input-group">                      
                <div class="input-group-addon">
                    Usuario
                </div>
                <input id="integrantes-l" class='integrantes-l form-control input-sm' name='nombre_b'>                    
              </div>              
            </div>                       
            <!---->
            <div class='col-lg-3 col-md-3 hidden-field-mov'>
              <div class="input-group">                                                   
                <span class="input-group-addon">
                    Turno
                </span>
                <?=create_select_turnos('turno_b' ,  'form-control input-sm' , 'turno_b' )?>       
              </div>                      
            </div>       


            <div class='col-lg-3 col-md-3 hidden-field-mov'>              
              <div class="input-group">
                <span class="input-group-addon">
                      Estatus del usuario
                </span>
                <?=create_select_estatus('estatus_b' ,  'form-control input-sm' , 'estatus_b')?>          
              </div>                                    
            </div>


            <div class='col-lg-3 col-md-3 hidden-field-mov'>          
              <div class="input-group">
                <span class="input-group-addon">
                  Perfil
                </span>                   
                <?=create_select($perfiles , "perfil_b" , "perfil_b form-control input-sm" , "perfil_b" , "nombreperfil" , "idperfil" )?>                
              </div>                   
            </div>

          </div>  

          <div class='col-lg-1 col-md-1 col-sm-12'>
            <button class='btn btn_busqueda pull-right' id='btn-busqueda'>
              Buscar
            </button>
          </div>

        </div>                           
      </form>  
<?=end_row()?>