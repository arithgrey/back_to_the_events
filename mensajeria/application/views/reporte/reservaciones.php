<?php
        $complete  ="";		
        $l_reservaciones = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($reservaciones) >= 20 ){			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 500px;' " ; 
		}
		$b =1;						  
		foreach($reservaciones as $row) {

				$id_reservacion =  $row["id_reservacion"];
				$nombre =  $row["nombre"];
				$mail =  $row["mail"];
				$telefono =  $row["telefono"];
				$num_asistentes =  $row["num_asistentes"];
				$idevento =  $row["idevento"];
				$fecha_registro =  $row["fecha_registro"];

				$l_reservaciones .= "<tr>";						
					$l_reservaciones .= get_td($b);
					$l_reservaciones .= get_td($nombre);
					$l_reservaciones .= get_td($mail);
					$l_reservaciones .= get_td($telefono);
					$l_reservaciones .= get_td($num_asistentes);					
					$l_reservaciones .= get_td($fecha_registro);
				$l_reservaciones .= "</tr>";			
			$b++;
		}

		
?>

<span class='num_registros_encontrados'>
	# Reservaciones <?=count($reservaciones);?>
</span>
<div  <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">					
			<?=get_td("#")?>
			<?=get_td("Nombre")?>
			<?=get_td("Mail")?>
			<?=get_td("Teléfono")?>
			<?=get_td("Lugares")?>
			<?=get_td("Fecha registro")?>
		</tr>		
		<?=$l_reservaciones;?>
	</table>
</div>

<style type="text/css">
	.tipo_text{
		background: #166781;
		color: white;
	}
	.campo_contacto{
		background: #3C5E79;	
		color: white;
	}
</style>