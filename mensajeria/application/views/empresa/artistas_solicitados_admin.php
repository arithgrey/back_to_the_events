<?php

	$d_class = ""; 
	if (count($solicitudes) > 6 ) {
		$d_class =  "class='enid-scroll-service'"; 
	}
	$list =  "";
	$lugar = 1; 	
	
	foreach ($solicitudes as $row){
		
		$id_artista =  $row["id_artista"];
		$solicitudes =  $row["solicitudes"];
		$nombre_artista =  $row["nombre_artista"];
		$list .=  "<tr>";			
		$list .=   get_td($nombre_artista);
		$list .=   get_td( $solicitudes , "class='type-info' ");
		$list .=  "</tr>";		
	}
	$list .=  "";
?>
<center>
	<?=titulo_enid("Artistas que más nos han solicitado")?>
</center>
<?=n_row_12()?>	
	<div <?=$d_class?>>
		<table class="table"> 										
			<?=$list?>					
		</table> 		
	</div>	
<?=end_row()?>	


