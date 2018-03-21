<?php 
	
	$info =  "";
	$extra_class = ""; 
	if (count($info_objetos_permitidos) > 3 ){
		$extra_class =  "scroll-vertical-enid";
	}
	$b = 1; 
	foreach ($info_objetos_permitidos as $row) {
		

		$nombre =  $row["nombre"];
		$descripcion = $row["descripcion"];

		$info .="<div class='row color_enid info_objs'>";

			$info .="<div class='col-lg-12'>";
				$info .= "<div class='info_objeto'>" . 
							titulo_enid_w($b . ".-" .$nombre) . 
						  "</div>";
			$info .="</div>";

			$info .="<div class='col-lg-12'>";
				$info .="<center>
							<p class='black strong'> " . $descripcion  ."</p>
						</center>";
			$info .="</div>";
		$info .="</div>";
		$info .="<hr>";
		$b ++;

	}
?>

<br>
<div class='panel contenedor_resumen_objs'>
	<div class='<?=$extra_class?>'>
		<?=$info?>
	</div>
</div>

<style type="text/css">
.info_objs{
	
	height: 150px;
}
.contenedor_resumen_objs{
	padding: 10px;
}
.info_objeto{
	padding: 10px;
}
</style>
<br>