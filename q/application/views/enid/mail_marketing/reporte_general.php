<br>
<?php 
	
	/**/	
	$l = ""; 
	foreach ($reporte_mail_marketing as $row ){
		
		$nombre_user =  $row["nombre_user"];
		$email =  $row["email"];
		$fecha_registro =  $row["fecha_registro"];
		$publicidad =  $row["publicidad"];
		$descripcion =  $row["descripcion"];
		$tipo_publicidad =  $row["tipo_publicidad"];

		
		$l .= "<tr>";

			$l .= get_td($fecha_registro);
			$l .= get_td($tipo_publicidad);
			$l .= get_td($email);
			$l .= get_td($nombre_user);			
			$l .= get_td($publicidad);
			$l .= get_td($descripcion);
			
		$l .= "</tr>";

	}
?>

<table class='table_enid_service' border=1>
	<tr class="table_enid_service_header">					
		<?= get_td("Fecha registro");?>
		<?= get_td("Tipo publicidad");?>
		<?= get_td("Email");?>
		<?= get_td("Nombre user");?>		
		<?= get_td("Publicidad");?>
		<?= get_td("Descripcion");?>				
	</tr>
	
		<?=$l?>
	
</table>
