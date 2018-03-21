<?php 
	
	$l =""; 
	$b = 1;	
	foreach ($resumen_bugs as $row){

		$id_incidencia = $row["id_incidencia"];
		$descripcion_incidencia   =  $row["descripcion_incidencia"];
		$incidencias        =  $row["incidencias"];
		$tipo_incidencia   =  $row["tipo_incidencia"];
		$fecha_registro =  $row["fecha_registro"];
		$extra=  "data-toggle='modal' data-target='#evalua_bug'"; 
		
		$l .=  "<tr>";
			$l .= get_td( $b);
			$l .= get_td($fecha_registro);
			$l .= get_td(btn_conf(),  "class='evaluar_incidencia' id='".$id_incidencia."' $extra  ");
			$l .= get_td( $incidencias);
			$l .= get_td($descripcion_incidencia); 			
			$l .= get_td( $tipo_incidencia);						
		$l .=  "</tr>";

		$b ++;
	
	}
	

?>

<div style='overflow-y:scroll;  overflow-x: auto; height: 550px;'>
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">					
			<?=get_td( "#"); ?>			
			<?=get_td( "fecha_registro"); ?>			
			<?=get_td( "Editar"); ?>			
			<?=get_td( "Repeticiones"); ?>			
			<?=get_td( "Incidencia"); ?>			
			<?=get_td( "Tipo"); ?>			
		</tr>
		<?=$l?>
	</table>
</div>