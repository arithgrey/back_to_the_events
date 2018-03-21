<?php 
	$info ="";
	$a  =1;
	foreach ($sitios_visitados as $row) {
		
		$url =  $row["url"];
		$accesos =  $row["accesos"];

		$info .= "<tr>";
			$info .= get_td($a);
			$info .= get_td($url);
			$info .= get_td($accesos);

		$info .= "</tr>";
		$a ++;

	}
?>
<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">									
			<?=get_td("#");?>
			<?=get_td("Sitio");?>
			<?=get_td("Accesos" );?>				
		</tr>				
		<?=$info?>
	</table>
</div>