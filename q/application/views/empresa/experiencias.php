<?php 
  $bloque = ""; 
  $d_class = ""; 
  if (count($experiencias["experiencias"]) > 4 ) {
  	$d_class =  " class='commentarios' "; 	
  }
  $id_empresa  = 0;
  foreach ($experiencias["experiencias"] as $row) {


      $id_empresa =  $row["idempresa"];        
      $calificacion =  $row["calificacion"];
      $nombre =  $row["nombre"];      
      $fecha_registro =  $row["fecha_registro"];
      $descripcion =   $row["descripcion"]; 
      $status =  $row["status"];   
      $idexperiencia =  $row["idexperiencia"];
      $seccion_config =  valida_seccion_config_expericia($param["seccion"] ,  $status ,  $idexperiencia);
      $bloque .= '
                <section>                 
                  	<div>
	                    <div class="title-autor">
	                      '.$nombre.' 
	                    </div>
	                    <div class="calificaciones-info">                    
	                      '. $fecha_registro .' | '. create_start($calificacion).'                                          
	                    </div>
                    </div>                                
                  <div class="seccion-descripcion">                    
                    '.$descripcion .'                    
                  </div>                
              	</section>
              	'.
              		$seccion_config
              	.'
              	<hr>';
  }  
?>
<?=n_row_12()?>
		<div class='ultimos-comentarios'>
			<div class='seccion-contenidos'>
				<?=valida_title_experiencia($param["seccion"] ,  $param["in_session"] , $param["id_empresa"]);?>										
				<div <?=$d_class;?> >
					<?=$bloque?>
				</div>					
			</div>
		</div>

<?=end_row()?>


<style type="text/css">
	.title-exp{
		font-size: 4em;
		font-weight: bold;
		margin-left: 1%;
		margin-top: 1%;
	}.actions li{
		text-decoration: none;
	}.title-autor{		
		font-size: 1.3em;
		font-weight: bold;
	}.title-autor , .calificaciones-info{	
		margin-left: 1%;
		display: inline-block;
	}.seccion-descripcion{

		font-size: .9em;
	}.seccion-contenidos{		
		margin: 0 auto;
	}.commentarios{
		height: 400px;
		overflow-y: scroll;
	}.panel-header-commentarios{
		background: #183440;
		color: white;
	}
	.title-exp-comunidad{
		font-weight: bold;
	}
	.title-exp-all{
		font-weight: bold;
	}
	.tipo-comentario{
		font-size: .9em;
	}
	.lb-estado-comentario{
		margin-top: 10px;
	}
	#btn-registrar-cambios{
		margin-top: 10px;	
	}
	.select_update_status{
		width: 40%;
	}
	.select_update_status, .btn-estado-exp{
		display: inline-table;
	}
</style>