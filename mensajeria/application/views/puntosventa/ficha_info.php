<?php
	$bloque =  ""; 
	$idpunto_venta 	 ="";
	$razon_social 	 ="";
	$status 	 ="";
	$idempresa 	 ="";
	$descripcion 	 ="";
	$zona 		 ="";
	$img ="";	
	foreach ($info as $row){

		$idpunto_venta 	 =  $row["idpunto_venta"]; 	
		$razon_social 	 =  $row["razon_social"]; 	
		$status 	 =  $row["status"]; 	
		$idempresa 	 =  $row["idempresa"]; 	
		$descripcion 	 =  $row["descripcion"]; 	
		$zona 		 =  $row["zona"]; 		
		$img =  create_icon_img($row , " " , " " ); 	
	}
?>
<div class='panel'>
	<div class='panel-content'>
		<div class='panel-body'>
			<div class='bloque_completo'>	
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<?=$img;?>
				</div>
				<h1 class='col-lg-12 col-md-12 col-sm-12'>
					<?=$razon_social?>
				</h1>
				<span class='col-lg-12 col-md-12 col-sm-12'>
					<?=$descripcion?>
				</span>
				<span class='col-lg-12 col-md-12 col-sm-12 pv_zona'>
					Zona : <?=$zona;?>
				</span>
				<div class='pull-right'>
				
					<a href="<?=create_url_puntoventa_admin()?>">
						<i class='fa fa-cog editar-acceso'>
						</i> 
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
<style type="text/css">
.pv_zona{
	font-size: .9em;
}
.ocultar_infor_punto_venta{
	font-size: .86em;	
	color: #166781;	
}
</style>
