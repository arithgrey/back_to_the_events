<div class='status_actual'>
	Estado actual de evento,  
	<span class='text_status_now'>		
		<?=estado_evento_name($param["status"] , $param["programado"])?>
	</span>	
</div>
<div class='seccion_select_config'>
	<div class="form-group">            
        <div class="input-group m-bot15">
            <span class="input-group-addon">
             	Modificar estado del evento
            </span>            
            <?=construye_select_estado_evento($param["status"]);?>            
        </div>
    </div>
</div>	





<div class='seccion_f_disponible'>
	
</div>




<style type="text/css">
.status_actual{
	text-align: center;
	background: rgb(2, 146, 193);
	padding: 10px;
	color: white;	
	margin: 0 auto;
	font-size: 1.1em;	
}
.status_actual:hover{
	cursor: pointer;
}
.seccion_select_config{	
	margin-left: 10px;
	margin-top: 10px;
	width: 30%;
}
@media screen and (max-width:600px) {
	.seccion_select_config{	
		width: 100%;
	}
}
.seccion_f_disponible{	
	width: 96%;
	margin: 0 auto;
	background: rgb(62, 178, 192);
}
</style>