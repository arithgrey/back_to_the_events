<?php 	
	$servicios_registrados = '<div class="item-content-block tags">';
	$a = 0; 
	foreach ($servicios as $row ){
		$servicio_val =  $row["servicio"]; 
		$id_servicio =  $row["idservicio"];
		$id_servicio_inter =  $row["idserviciointer"];

		$dinamic_id = 'serviciocheck_'.$a; 

		if ($id_servicio ==  $id_servicio_inter) {
			
			$servicios_registrados .= "<a  class='servicio_registrado_evento' id='".$a."' > ". $servicio_val ."</a>
									  <span style='display:none;'  class='$dinamic_id tags_e'>
									  	<i class='fa fa-times servicios_delete   $dinamic_id  ' aria-hidden='true'   id='".$id_servicio."'  >
									  	</i>
									  </span>";	
		}		
		$a ++; 
	}
	$servicios_registrados .= "</div>";
?>
									
<?=$servicios_registrados?>
<style type="text/css">
	.item{color:#48453d; margin-top:30px; overflow:hidden;}		
	.tags a{background-color:#395356; padding:10px; color:#fff; display:inline-block; font-size:11px; text-transform:uppercase; line-height:11px; border-radius:2px; margin-bottom:5px; margin-right:2px; text-decoration:none;}
	.tags a:hover{background-color:#00BCD4;}
	.tags_e:hover{
		cursor: pointer;
	}
</style>