<?=construye_header_modal('recuperacion-pw', "¿Olvidaste tu contraseña? " );?>  
    <div id='contenedor-form-recuperacion'>
        <p>
            Ingresa tu correo electrónico y tu contraseña será enviada a el
        </p>
        <form class='form-pass' id='form-pass' action='<?=base_url('index.php/api/mailrest/recupera_password/format/json/')?>' >
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