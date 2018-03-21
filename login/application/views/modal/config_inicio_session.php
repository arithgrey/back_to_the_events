<?=construye_header_modal('recuperacion-pw', "¿Olvidaste tu contraseña? " );?>  
    <div id='contenedor-form-recuperacion'>
        <p>
            <strong class='msj-recuperacion'>
                Ingresa tu correo electrónico para que tu contraseña pueda ser enviada                 
            </strong>
        </p>
        <form class='form-pass' id='form-pass' action='<?=url_recuperacion_password()?>' >
        	<input type="email" id="email_recuperacion" name='mail' placeholder="Email"  class="form-control input-sm" required>
            <br>
    	    <button class="btn_nnuevo recupera_password">
    			Enviar	        
    	    </button>	    
        </form>    
        <div class='place_recuperacion_pw'>
        </div>
        <div class='recuperacion_pw'>
        </div>
    </div>
<?=construye_footer_modal()?>                                                       