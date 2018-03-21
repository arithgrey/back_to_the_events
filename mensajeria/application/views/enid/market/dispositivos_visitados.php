<?php 
	$info ="";
	$a  =1;
	foreach ($dispositivos as $row) {
		
		$dispositivo =  $row["dispositivo"];
		$accesos =  $row["accesos"];

		$info .= "<tr>";
			$info .= get_td($a);
			$info .= get_td($dispositivo);
			$info .= get_td($accesos);

		$info .= "</tr>";
		$a ++;

	}
?>
<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">									
			<?=get_td("#");?>
			<?=get_td("Dispositivo");?>
			<?=get_td("Accesos" );?>				
		</tr>				
		<?=$info?>
	</table>
</div>