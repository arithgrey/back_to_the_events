  
    <?=titulo_enid('Contacto')?>
    <div class='place_registro_contacto'>
    </div>
      <div class="col-md-8 col-md-offset-2">
        <div class="well well-sm">
          <form id='form_contacto' class="form-horizontal" action="<?=base_url('index.php/api/emp/contacto/format/json')?>" method="post">
          <fieldset>            
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name" style='color:black !important;'>
                Nombre
              </label>
              <div class="col-md-9">
                <input id="name" name="nombre" type="text" placeholder="Tu nombre" class="form-control" >
              </div>
            </div>    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email" style='color:black !important;'>
                E-mail
              </label>
              <div class="col-md-9">
                <input id="emp_email" name="email" type="text" placeholder="Tu email" class="form-control" required>
              </div>
              <div class='place_mail_contacto'>
              </div>
            </div>    
            <div class="form-group">
              <label class="col-md-3 control-label" for="emp_tel" style='color:black !important;'>
                Teléfono
              </label>
              <div class="col-md-9">
                <input id="emp_tel" name="tel" type="number" placeholder="Número telefónico" class="form-control" required>
              </div>
              <div class='place_tel_contacto'>
              </div>
            </div>    

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message" style='color:black !important;'>
                Mensaje
              </label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="mensaje" placeholder="Tu mensaje aquí" rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">
                  Enviar
                </button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	