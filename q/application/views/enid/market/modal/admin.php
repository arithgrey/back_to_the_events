<?=construye_header_modal('img-template', "Imagen para el contenido" );?>                           
    <span class='place_form_img'>
    </span>
    <span class='form_img'>
    </span>
<?=construye_footer_modal()?>  


<?=construye_header_modal('horario-templ', "Horarios de acción" );?>  
	<span class='place_horarios_atencion'>
	</span>                         
	<form id="form-horarios" class='form-horarios'  action="<?=base_url('index.php/api/templ/publicidad_horario/format/json/')?>">
		<input type='hidden' value="" class='hpublicidad' name='hpublicidad' >
		<span class='place_form_horarios'>
		</span>
		<span class='place_horarios'>
		</span>
		<div class="seccion-disponibilidad">
	    <label>
	        Días de acción
	    </label>
	    <label>
	        TODOS
	        <input type="checkbox" name="AA" id="AA" class="AA">
	        == >
	    </label>
	    <label>
	        L
	        <input type="checkbox" name="nL" id="nL" class="L">
	    </label>
	    <label>
	        M
	        <input type="checkbox" name="nM" id="nM" class="M">
	    </label>
	    <label>
	        MI
	        <input type="checkbox" name="nMM" id="nMM" class="MM">
	    </label>
	    <label>
	        J
	        <input type="checkbox" name="nJ" id="nJ" class="J">
	    </label>
	    <label>
	        V
	        <input type="checkbox" name="nV" id="nV" class="V">
	    </label>
	    <label>
	        S
	        <input type="checkbox" name="nS" id="nS" class="S">
	    </label>
	    <label>
	        D
	        <input type="checkbox" name="nD" id="nD" class="D">
	    </label>



	    



	    	<div class='row'>    	
		    	<div class="col-lg-12 col-md-12 col-sm-12">                            
		            <label class="control-label">
		                Lanzamiento Lunes
		            </label>
		            <div class="">
		                <div class="input-group bootstrap-timepicker">
		                    <input class="form-control timepicker-default" id="hl" name="hl" type="text">
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-clock-o">
		                            </i>
		                        </button>
		                    </span>
		                </div>
		            </div>                            
		        </div>                        
	        </div>


	        <div class='row'>    	
		    	<div class="col-lg-12 col-md-12 col-sm-12">                            
		            <label class="control-label">
		                Lanzamiento Martes
		            </label>
		            <div class="">
		                <div class="input-group bootstrap-timepicker">
		                    <input class="form-control timepicker-default" id="hm" name="hm" type="text">
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-clock-o">
		                            </i>
		                        </button>
		                    </span>
		                </div>
		            </div>                            
		        </div>                        
	        </div>

	        <div class='row'>    	
		    	<div class="col-lg-12 col-md-12 col-sm-12">                            
		            <label class="control-label">
		                Lanzamiento Miercoles
		            </label>
		            <div class="">
		                <div class="input-group bootstrap-timepicker">
		                    <input class="form-control timepicker-default" id="hmm" name="hmm" type="text">
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-clock-o">
		                            </i>
		                        </button>
		                    </span>
		                </div>
		            </div>                            
		        </div>                        
	        </div>


	        <div class='row'>    	
		    	<div class="col-lg-12 col-md-12 col-sm-12">                            
		            <label class="control-label">
		                Lanzamiento Jueves
		            </label>
		            <div class="">
		                <div class="input-group bootstrap-timepicker">
		                    <input class="form-control timepicker-default" id="hj" name="hj" type="text">
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-clock-o">
		                            </i>
		                        </button>
		                    </span>
		                </div>
		            </div>                            
		        </div>                        
	        </div>



	        <div class='row'>    	
		    	<div class="col-lg-12 col-md-12 col-sm-12">                            
		            <label class="control-label">
		                Lanzamiento Viernes
		            </label>
		            <div class="">
		                <div class="input-group bootstrap-timepicker">
		                    <input class="form-control timepicker-default" id="hv" name="hv" type="text">
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-clock-o">
		                            </i>
		                        </button>
		                    </span>
		                </div>
		            </div>                            
		        </div>                        
	        </div>


	        <div class='row'>    	
		    	<div class="col-lg-12 col-md-12 col-sm-12">                            
		            <label class="control-label">
		                Lanzamiento Sábado
		            </label>
		            <div class="">
		                <div class="input-group bootstrap-timepicker">
		                    <input class="form-control timepicker-default" id="hs" name="hs" type="text">
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-clock-o">
		                            </i>
		                        </button>
		                    </span>
		                </div>
		            </div>                            
		        </div>                        
	        </div>


	<div class='row'>    	
		    	<div class="col-lg-12 col-md-12 col-sm-12">                            
		            <label class="control-label">
		                Lanzamiento Domingo
		            </label>
		            <div class="">
		                <div class="input-group bootstrap-timepicker">
		                    <input class="form-control timepicker-default" id="hd" name="hd" type="text">
		                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-clock-o">
		                            </i>
		                        </button>
		                    </span>
		                </div>
		            </div>                            
		        </div>                        
	        </div>

	        <div class='row'>
	            <div class="col-lg-12 col-md-12 col-sm-12">                                                                           
	                <button type="submit" class="btn btn-default btn_save guardar_horario">
	                    Registrar
	                </button>
	            </div>    
	      	</div>  
      	</form>
        
    </div>
    


<?=construye_footer_modal()?>  
