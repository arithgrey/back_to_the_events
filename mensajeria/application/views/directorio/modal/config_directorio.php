<!--************************************************** NOTA DEL CONTACTO-->
<?=construye_header_modal('contact-nota', " Nota del contacto " );?>                           
<form id='form-nota-contacto' class='form-nota-contacto' method='post' action="<?=base_url('index.php/api/contactos/nota/format/json/')?>">
    <div class="form-group">
        <label for="comment">
        Nota del contacto
        </label>
        <textarea class="form-control nota-text-modal " rows="3" id="nota-text-modal"  name='nota-contacto-text'>
        </textarea>
    </div>
    <button class='btn btn btn_nnuevo'>
          Registrar cambios     
    </button>                
    <div class='place_nota'>
    </div>
</form>                    
<div class='edit-contact-mod'>
</div>                
<?=construye_footer_modal()?>  
<!--************************************************** TERMINA NOTA DEL CONTACTO-->



<!--Cargar nuevo contacto modal  -->
<?=construye_header_modal('contact-modal', " Registrar contacto " , 0);?>                                     
    <!--Nuevo contacto form -->

            <div class='place_nuevo_contacto'>
            </div>
            <div class='mas-campos-contenedor'>
                <label class='mas-campos'>
                        + Más Campos
                </label>
            </div>
            <form class='form-contactos' id="form-contactos" method="post" action="<?=base_url('index.php/api/contactos/contacto/format/json/')?>">                
                <div >
                    <div >
                      <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Nombre 
                            </span>                            
                            <input id='nombre_contacto' type="text" class="form-control input-sm uppercase_enid " name="nombre" placeholder="Nombre" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                         </div>
                      </div>
                      <span class='place_nombre_contacto'>
                      </span>
                    </div>
                    <div >
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Organización
                            </span>            
                            <input type="text" class="form-control input-sm uppercase_enid" name="organizacion" placeholder="Añadir nombre de la organización" onkeyup="javascript:this.value=this.value.toUpperCase();">
                         </div>
                     </div>
                     </div>
                </div> 
                <div >
                    <div >
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                Tel.
                                </span>
                                <input class="form-control input-sm" name="telefono" id="input_tel_contacto" placeholder="Teléfono" type="tel" maxlength="10" required>                                                                
                            </div>
                        </div>
                        <span class='place_tel_vali validado' id='place_tel_vali'>
                        </span>
                    </div>     

                    <div>
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                ext.-
                                </span>
                                <input class="form-control input-sm" name="extension"   placeholder="extension" type="text" maxlength="10" >
                            </div>
                        </div>
                    </div>     

                    <div>
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                Móvil 
                            </span>
                            <input class="form-control input-sm" name="movil"   placeholder="Teléfono celular" type="tel" maxlength="10" >
                         </div>

                     </div>
                    </div>
                    <div class="more-fields">
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    Página web  www
                                </span>
                                <input class="form-control input-sm" name="pagina_web"   placeholder="http://enidservice.com/home/" type="url">
                            </div>
                        </div>
                    </div> 
                </div>            
                <div>
                    <div class="more-fields">
                     <div class="form-group">            
                         <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                https://www.facebook.com/
                            </span>
                            <input class="form-control input-sm" name="pagina_fb"  type="text" placeholder='enidservice'>
                         </div>
                     </div>
                    </div>
                    <div class="more-fields"> 
                         <div class="form-group">            
                             <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    https://twitter.com/
                                </span>
                                <input class="form-control input-sm" name="pagina_tw"  type="text" placeholder='enidservice'>
                             </div>
                        </div>
                     </div>
                </div>                                 
                <div class="more-fields"> 
                    <div class="form-group">            
                        <div class="input-group m-bot15">
                        <span class="input-group-addon">
                                    Dirección
                        </span>
                        <input list='pdirecciones' class="form-control input-sm direccion " name="direccion uppercase_enid"   placeholder="Av. sur 89 col...  " type="text" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <div class='place-direcciones'>
                        </div>
                        </div>
                    </div>
                </div>                
                <div class="more-fields">
                        <div class="form-group">            
                            <div class="input-group m-bot15">
                            <span class="input-group-addon">
                                    Correo @
                            </span>
                            <input class="form-control input-sm" name="correo"   placeholder="arithgrey@gmail.com" type="text">
                            </div>

                        </div>
                </div>
                <div class="more-fields">
                    <div class="form-group">            
                        <div class="input-group m-bot15">
                        <span class="input-group-addon">
                            Correo alterno @
                        </span>
                        <input class="form-control input-sm" name="correo_alterno"   placeholder="arithgrey@gmail.com" type="text">
                        </div>

                    </div>
                </div>
                <div>
                    <div class="form-group" >                                     
                        <?=get_tipos_contactos("tipo" , " form-control input-sm " , "tipo" )?>                                      
                    </div>    
                </div>            
                <div class="more-fields">              
                    <div>
                        <label class="control-label">Nota
                        </label>                    
                        <textarea rows="3" name="nota" class="form-control">
                        </textarea>                    
                    </div>                 
                </div>                 
                
                <div>                              
                    <div>          
                        <button type="submit" id="button-registrar" class="btn btn-default btn_save ">
                            Registrar
                        </button>
                    </div>          
                </div>
            </form>
    <!--Termina nuevo contacto -->  
<?=construye_footer_modal()?>  
<!--Terminamos   de  Cargar nuevo contacto modal  -->























































































<?=construye_header_modal('contact-modal-edit', "Configurar contacto" , 0);?>                     
<!--Nuevo contacto form -->
<span class='estado_edicion_contacto'>
</span>
<div class='mas-campos-contenedor'>
    <label class='mas-campos'>
        + Más Campos
    </label>
</div>
<form class='form-contactos-edit    ' id="form-contactos-edit" action="<?=base_url('index.php/api/contactos/contacto/format/json/')?>">            
    <div>
        <div>
          <div class="form-group">            
                <div class="input-group">
                    <span class="input-group-addon">
                        Nuevo nombre 
                    </span>                    
                    <input type="text" class="form-control input-sm uppercase_enid" name="nnombre" id='nnombre' placeholder="Nombre" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                 </div>
             </div>
            <div class='place_actualizar_nombre'>
            </div>
         </div>
         <div>
            <div class="form-group">            
                 <div class="input-group">
                    <span class="input-group-addon">
                        Nueva organización
                    </span>
                    
                    <input type="text" class="form-control input-sm  uppercase_enid" id="norganizacion" name="norganizacion" placeholder="Añadir nombre de la organización" onkeyup="javascript:this.value=this.value.toUpperCase();">
                 </div>
             </div>
         </div>
    </div>
    <div>
        <div>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Nuevo Tel.
                    </span>
                    <input class="form-control input-sm"  id="input_tel_contacton" name="ntelefono"  id="ntelefono"   placeholder="Teléfono" type="tel" required maxlength="10"  >
                 </div>
                 <span class='place_tel_valin validado' id='place_tel_vali n'>
                 </span>
             </div>
         </div>
         <div>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Nueva ext.-
                    </span>
                    <input class="form-control input-sm" name="nextension"  id="nextension"   type="text" maxlength="10" >             
                </div>
             </div>
         </div>

         <div>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Nuevo Móvil 
                    </span>
                    <input class="form-control input-sm" name="nmovil" id="nmovil"   placeholder="Teléfono celular" type="tel" maxlength="14"  >
                 </div>

             </div>
         </div>
         <div class="more-fields">
            <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Página web  www
                    </span>
                    <input class="form-control input-sm " name="npagina_web" id="npagina_web"   placeholder="www" type="url">
                 </div>
             </div>
         </div>
        


    </div> 



    <div>
         
         
         
            <div class="more-fields" >
                 <div class="form-group">            
                     <div class="input-group m-bot15">
                        <span class="input-group-addon">
                            https://twitter.com/
                        </span>
                        <input class="form-control input-sm  " name="npagina_tw" id='npagina_tw'  type="text" placeholder='enidservice'>
                     </div>
                 </div>
            </div>     
            <div class="more-fields"  >
                <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        https://www.facebook.com/
                    </span>
                    <input class="form-control" name="npagina_fb" id='npagina_fb'   type="text"  placeholder='enidservice' >
                 </div>
             </div>
            </div>    
         
            <div class="more-fields">
                <div class="form-group">            
                <div class="input-group m-bot15">
                    <span class="input-group-addon">
                    Nueva dirección
                    </span>
                    <input list='lista-ndireccion' class="form-control input-sm" name="ndireccion" id="ndireccion"   placeholder="Av. sur 89 col...  " type="text">
                    <div class='list-ndireccion'>
                    </div> 
                </div>
                </div> 
            </div>
    </div>     
    
        <div>
             <div class="form-group">            
                 <div class="input-group m-bot15">
                    <span class="input-group-addon">
                        Correo @
                    </span>
                    <input class="form-control input-sm"  name="ncorreo"  id="ncorreo"  placeholder="arithgrey@gmail.com" type="text">
                 </div>
             </div>
        </div>     
         <div class="more-fields" >
             <div class="form-group">            
                 <div class="input-group">
                    <span class="input-group-addon">
                        Correo  alterno @
                    </span>
                    <input class="form-control input-sm" name="ncorreoalterno"  id="ncorreoalterno"  placeholder="arithgrey@gmail.com" type="text">
                 </div>
             </div>
        </div>   
        <div>
            <div class="form-group" >                    
                <?=get_tipos_contactos("ntipo" , " form-control input-sm  " , "ntipo" )?>
            </div>    
        </div> 
    
    
    <div class="more-fields">
        <label class="control-label">
                Nueva nota
        </label>        
        <textarea rows="3" name="nnota" id="nnota" class="col-sm-12 form-control">
        </textarea>        
    </div>
    
    <div>
        
    <div>            
        <button id="button-update" class="btn btn-default btn_save">
                Actualizar
        </button>   
    </div>
    </div>
</form>

<!--Termina nuevo contacto -->
<?=construye_footer_modal()?> 
<!--termina la edición del contacto -->





















<!--******************************* Cargar imagen a contacto *********************************************-->
<?=construye_header_modal('contact-imagen-modal', "Imagen al contacto  " );?>    
    <div class='place_form_img' >
    </div>
    <div class='form_img'>
    </div>
<?=construye_footer_modal()?> 



<!--**********************************-->
<?=construye_header_modal('contact-delete', " Eliminar contacto " );?>
    Realmente decea eliminar el contacto ??
    <button type="button" class="btn btn-default" id="aceptar-delete" data-dismiss="modal">
    Aceptar
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">
    Cancelar
    </button>   
    <div class='place_delete_contacto' id='place_delete_contacto'> 
    </div>
<?=construye_footer_modal()?>                         
<!--Termina nuevo contacto -->







<?=construye_header_modal('locacion-modal', "Dirección del contacto");?>    
    <div class='contenedor_iframe_maps'>
    </div>
<?=construye_footer_modal()?> 
