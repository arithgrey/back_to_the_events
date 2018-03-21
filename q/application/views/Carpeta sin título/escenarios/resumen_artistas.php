<h3>	
	Artistas del escenario
</h3>
<?php
	$b= 1;
	$lista =  "";

	foreach ($artistas as $row){
		
		$id_artista =  $row["idartista"];
		$nombre_artista = $row["nombre_artista"];		
		$hora_inicio = $row["hora_inicio"];
		$hora_termino = $row["hora_termino"];

		$url_social_youtube = $row["url_social_youtube"];
		$url_sound_cloud = $row["url_sound_cloud"];
		$status_confirmacion = $row["status_confirmacion"];

		$url_img_artista = create_url_img_artista($id_artista);

		$lista .=  "<div class='row'>";			
			$lista .=  "<span>";
			$lista .=  "<img src='".$url_img_artista."' width='25px' > ";	
			$lista .=  $nombre_artista;
			$lista .=  "</span>";		
		$lista .=  "</div>";
		$b ++;
	}
?>
<?=n_row_12()?>
	<?=$lista;?>
<?=end_row()?>

<?=n_row_12()?>
	<?=$tipo_escenario;?>
	<?=valida_l_text( $fecha_escenario)?>	
<?=end_row()?>

<?=n_row_12()?>
	<?=valida_l_text($descripcion);?>
<?=end_row()?>




<style type="text/css">
	body{
		font: 1em 'Hind','Helvetica Neue',Helvetica,sans-serif !important;
	}
</style>
