

<!--Inicia modal editar del punto de venta -->
<?=construye_header_modal('editd-punto-venta-modal', " Configuración " );?>      
                <!--Nuevo contacto form -->
<form class='form-puntos-venta-edit' id="form-puntos-venta-edit" method="post" action="<?=base_url('index.php/api/puntosventa/punto/format/json/')?>">                    

    <div class='seccion_configurar'>
    </div>
    <div class='place_seccion_configurar'>
    </div>
                
    <label for="inputEmail">
                Nueva Razón social
    </label>
    <input type="text" id='nrazon_social' class="form-control input-sm" name="nrazon_social" placeholder="Nombre de la organización" required>                    
    <span class='place_nrazon_social_vali  validado'>
    </span>
                                
    <label for="inputEmail">
                    Zona de la ciudad
    </label>
    <select class='form-control input-sm' name='nzona' id='nzona'>
        <?=lista_zonas_punto_venta(0);?>
    </select>
                
    <select class="form-control input-sm" name="nstatus">            
        <option value="1">
                    Activo
        </option>
        <option value="0">
                    inactivo
        </option>
        <option value="2">
                    Temporalmente inactivo
        </option>            
    </select>         
    <div class='seccion-disponibilidad'>
        <label>
                    Días de atención 
        </label>
        <label>
                    L
            <input type='checkbox'  name='nL'  id='nL' class='L'  >
        </label>
        <label>
                    M
            <input type='checkbox'  name='nM'  id='nM' class='M' >
        </label>
        <label>
                    MI
            <input type='checkbox'  name='nMM' id='nMM' class='MM'  >
        </label>
        <label>
                    J
            <input type='checkbox'  name='nJ'  id='nJ' class='J' >
        </label>
        <label>
                    V
            <input type='checkbox'  name='nV'  id='nV' class='V' >
        </label>
        <label>
                    S
            <input type='checkbox'  name='nS'  id='nS' class='S' >
        </label>
        <label>
                    D
            <input type='checkbox'  name='nD'  id='nD' class='D' >
        </label>
    </div> 
    <div class='seccion-disponibilidad'>
        <?=horario_atencion("nhorario_atencion" , "form-control  nhorario_atencion" );?>
    </div>
    <input type='url' name='nsitio_web' id='nsitio_web' class='form-control input-sm' placeholder='sitio web www '>
    <textarea name="ndescripcion" id="ndescripcion" class="form-control input-sm nlocacion" placeholder="Nota/referencia">
    </textarea>    
    <div class='place_list'>
    </div>
    <br>
    <button type="submit" class="btn btn-default btn_save">
        Registrar cambios
    </button>        
</form>
<?=construye_footer_modal()?> 





<!--Inicia modal registro del punto de venta -->
<?=construye_header_modal('contact-modal', " Registrar nuevo " );?>  
    <!--Nuevo contacto form -->
    <form class='form-puntos-venta' id="form-puntos-venta" method="post" action="<?=base_url('index.php/api/puntosventa/punto/format/json/')?>">            
            
            <div class='response-registro' id="response-registro">
            </div>    
        <label>
                            Punto de venta
        </label>
        <input type="text" class="form-control input-sm" name="razon_social" id="nombre_razon_social" placeholder="Nombre de la organización" required>  
        <span class='place_razon_social_vali validado'>
        </span>
                    
                    
        <label>
                            Zona de la ciudad
        </label>
        <select class='form-control input-sm' name='zona'>
            <?=lista_zonas_punto_venta(0)?>
        </select>
                    
        <select class="form-control input-sm" name="status">                        
            <option value="1">
                        Activo
            </option>
            <option value="0">
                        inactivo
            </option>
            <option value="2">
                        Temporalmente inactivo
            </option>            
        </select> 
        
        <div class='seccion-disponibilidad'>
            <label>
                                Días de atención 
            </label>
            <label>
                                L
                <input type='checkbox'  name='L'  id='L' class='L'  >
            </label>
            <label>
                                M
                <input type='checkbox'  name='M'  id='M' class='M' >
            </label>
            <label>
                                MI
                <input type='checkbox'  name='MM' id='MM' class='MM'  >
            </label>
            <label>
                                J
                <input type='checkbox'  name='J'  id='J' class='J' >
            </label>
            <label>
                                V
                <input type='checkbox'  name='V'  id='V' class='V' >
            </label>
            <label>
                                S
                <input type='checkbox'  name='S'  id='S' class='S' >
            </label>
            <label>
                                D
                <input type='checkbox'  name='D'  id='D' class='D' >
            </label>
        </div>
                    
        <?=horario_atencion("horario_atencion" , "form-control input-sm horario_atencion" );?>                
        <input type='url' name='sitio_web' id='sitio_web' class='form-control input-sm' placeholder='sitio web www'>
        <textarea class='form-control' name="descripcion" id='area_descripcion' placeholder="Nota/referencia">
        </textarea>
            
        <div class='place_lista_direcciones'>
        </div>
        <div class='map_pv'>
        </div>
        <div class='place_map_pv'>
        </div>
        <br>

        <button type="submit" class="btn btn-default btn_save">
                        Registrar
        </button>    
        <div class='place_nuevo'>
        </div>                    
    </form>    
    <!--Termina nuevo contacto -->
<?=construye_footer_modal()?> 







<?=construye_header_modal('contactos-modal', " Agregar contactos al punto de venta " );?>                                    
    <div class='place_eliminar_contacto_asociado'>
    </div>
    <div class='place_contactos_asociados_pv'>
    </div>
    <div class='contactos_asociados_pv'>
    </div>
    <div id="contactos-punto-venta" class='contactos-punto-venta'>
    </div>  
    <div class='response-contacto-punto-venta' id='response-contacto-punto-venta'>
    </div>                    
    <div class='status-punto-venta-contacto'>
    </div>                                    
<?=construye_footer_modal()?>        



<?=construye_header_modal('punto-venta-descripcion-modal', "Dirección del punto de venta" );?>      
    <div class='contenedor_iframe_maps'>
    </div>        
<?=construye_footer_modal()?>    
           


<!--******************************* Cargar imagen a contacto *********************************************-->
<?=construye_header_modal('punto-venta-imagen-modal', " Imagen del punton de venta " );?>  
    <div class='place_img_form'>
    </div>   
    <div class='img_form'>
    </div>   
<?=construye_footer_modal()?>    


<?=construye_header_modal('delete-punto-venta-modal', " Eliminar");?>  
    <!--Nuevo contacto form -->            
    Realmente desea eliminar el punto de venta                 
    <button type="button" class="btn btn-default" id="aceptar-delete" >
    Aceptar
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">
    Cancelar
    </button>
    <div class='place_eliminar'>
    </div>
    <!--Termina nuevo contacto -->
<?=construye_footer_modal()?> 
<!--termina modal registro del punto de venta-->