<!--*****************************************************************************-->
<div id="modal-contactos" class="modal fade" >  
<div class="modal-dialog modal-lg">
  <div class="modal-content">      
      <!--*************************** Header modal *********************************-->
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" title='Por cuales medios pueden localizar a la empresa' >Medios de contacto</h4>
      </div>            
      <!--***************************End Header modal *********************************-->
      <div class="modal-body">                  



        <form class='form-contactos' id="form-contactos" method="post" action="<?=base_url('index.php/api/contactos/contacto_emp/format/json/')?>">
    
<div class='status-registro'>

    <div class="alert alert-success" role="alert">
        <i class="fa fa-check"></i>
        Contacto actualizado.!
    </div>
</div>


     
    <div class='col-lg-12'>
        <div class='col-lg-6'>
          <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Nombre 
                </span>                
                <input type="text" class="form-control" name="nombre" placeholder="Nombre"  id="contact_nombre" required>
             </div>
          </div>
        </div>
        <div class='col-lg-6'>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Organización
                </span>            
                <input type="text" class="form-control" value=""  name="organizacion" id='contact_organizacion' placeholder="Añadir nombre de la organización">
             </div>
         </div>
         </div>
    </div> 





    <div class='col-lg-12'>
        <div class='col-lg-6'>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Tel.
                    </span>
                    <input class="form-control" name="telefono" id="contact_telefono"    placeholder="Teléfono" type="text" required>
                 </div>
             </div>
        </div>     
        <div class='col-lg-6'>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Móvil 
                </span>
                <input class="form-control" name="movil"  id="contact_movil" placeholder="Teléfono celular"  value=""  type="text">
             </div>

         </div>
        </div>
    </div>

    <div class='col-lg-12'>
        <div class='col-lg-12'>
          <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Página web  www
                </span>
                <input class="form-control" name="pagina_web"  id="contact_pagina_web" value=""   placeholder="http://enidservice.com/home/" type="url">
             </div>
         </div>
        </div> 
    </div>


    <div class='col-lg-12'>
        <div class='col-lg-12'>
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Facebook
                </span>
                <input class="form-control" id="contact_pagina_fb" name="pagina_fb" value=""  type="url">
             </div>
         </div>
        </div> 
    </div> 

    <div class='col-lg-12'>
        <div class='col-lg-12'> 
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Twitter
                </span>
                <input class="form-control" id="contact_pagina_tw" name="pagina_tw"  value=""  type="url">
             </div>
        </div>
     </div>
    </div> 

    <div class='col-lg-12'> 
        <div class='col-lg-12'> 
         <div class="form-group">            
             <div class="input-group m-bot15">
                <span class="input-group-addon">
                    Dirección
                </span>
                <input class="form-control" name="direccion"  id="contact_direccion"  placeholder="Av. sur 89 col...  " value="" type="text">
             </div>

         </div>
         </div>
     </div>


    <div class='col-lg-12'>
        <div class='col-lg-6'>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Correo Electrónico @
                    </span>
                    <input class="form-control" value="" id="contact_correo" name="correo"   placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>
        </div>

        <div class='col-lg-6'>
         <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Correo alterno @
                    </span>
                    <input class="form-control" name="correo_alterno" id="contact_correo_alterno"  value=""   placeholder="arithgrey@gmail.com" type="text">
                 </div>

             </div>    


        </div>

    </div> 


    

    
    <div class="form-group">
        <label class="col-sm-12 control-label">Nota</label>
        
        <textarea rows="12" id="contact_nota" name="nota" class="col-sm-12 form-control">        
        </textarea>
        
    </div>
    <button type="submit" id="button-registrar" class="btn btn-default btn_save ">Registrar</button>



</form>

        
      </div><!--*********************Termina body modal ******************* -->             


      <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>

</div>