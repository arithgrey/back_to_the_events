<?php 
		$complete ="";
		$list=  "";
		$height ="style='overflow-x:auto;'";	
		if (count($puntos_venta) >= 20 ){
			$height ="style='overflow-y:scroll; overflow-x:auto;  height: 500px;' " ; 
		}		
        $num_puntos_venta =0;
        $b =1;
		foreach ($puntos_venta as $row) {
			
			$idpunto_venta = $row["idpunto_venta"];
			$razon_social  =  $row["razon_social"];						
			$zona =  $row["zona"];
			$fecha_registro =  $row["fecha_reg"];
			$idempresa     = $row["idempresa"];
			$descripcion  =  $row["descripcion"];
			$contactos =  $row["contactos"];
			$horario_atencion =  $row["horario_atencion"];
			$L  =  $row["L"];
			$M  =  $row["M"];
			$MI  = $row["MM"];
			$J  =  $row["J"];
			$V  =  $row["V"];
			$S  =  $row["S"];
			$D  =  $row["D"];
			$sitio_web =  create_url_sitio_web($row["sitio_web"]);
			$formatted_address  =  $row["formatted_address"];

		
			$nombre = "";			
			$estado_usuario ="";
			$list.="<tr>";
				
				$img =  create_icon_img($row , " img_punto_venta " , $idpunto_venta , " data-toggle='modal' data-target='#punto-venta-imagen-modal' " ); 
				$fa_nota = tmp_formatted_address($formatted_address , $idpunto_venta ); 
					

				$list .=  get_td("<i  data-toggle='modal' data-target='#editd-punto-venta-modal'  class='editar-punto-venta fa fa-cog'  id='". $idpunto_venta  ."'  ></i>" ,"title='Editar contacto'" );
				$list.= get_td($img,  "style='width:45px;' "); 				
				$list.= get_td($razon_social);								
				$list.= get_td(dia_disponibles($L) , " class='calendar_enid' ");									
				$list.= get_td(dia_disponibles($M), " class='calendar_enid' ");									
				$list.= get_td(dia_disponibles($MI), " class='calendar_enid' ");									
				$list.= get_td(dia_disponibles($J), " class='calendar_enid' ");									
				$list.= get_td(dia_disponibles($V), " class='calendar_enid' ");									
				$list.= get_td(dia_disponibles($S), " class='calendar_enid' ");									
				$list.= get_td(dia_disponibles($D), " class='calendar_enid' ");									
				$list.= get_td($horario_atencion);									
				$list.= get_td($zona);									
				$list.= get_td($fa_nota);				
				$list.= get_td($sitio_web);				

				$url = base_url("index.php/puntosventa/agreado_evento")."/".$idpunto_venta."/".$param["evento"];
				$frame =  "<iframe style ='height:20px !important; width:155px !important;'  src='".$url."'></iframe>";
				$list.= get_td( "<a class='pvs_agregar_evento' id='".$idpunto_venta."'> Modificar</a>". $frame );				

			
				$list.="</tr>";			
				$num_puntos_venta ++;
				$b++;
		}	
?>

<span class='num_registros_encontrados'>
	# Puntos de venta encontrados 
	<?=count($puntos_venta);?>
</span>
<div <?=$height?> >
	<table class='table_enid_service' border=1  >
		<tr class='table_enid_service_header'>		        	
			<?=get_td("Configurar")?>
			<?=get_td("IMG")?>
			<?=get_td("Punto  venta")?>
			<?=get_td("L")?>
			<?=get_td("M")?>
			<?=get_td("MI")?>
			<?=get_td("J")?>
			<?=get_td("V")?>
			<?=get_td("S")?>
			<?=get_td("D	")?>
			<?=get_td("Horario de atención")?>
			<?=get_td("Zona")?>
			<?=get_td("Dirección")?>
			<?=get_td("Sitio web ")?>
			<?/*get_td("Fecha registro")*/?>
			<?/*get_td("Contactos Asociados")*/?>
			<?/*get_td("Eliminar")*/?>
			<?=get_td("")?>

		</tr>
		<?=$list?>
	</table>
</div>
<style type="text/css">
.sitio_web_registrado{
	color: #93a2a9;
}
.direccion_registrada{
	color: #93a2a9;
}
.contactos_registrados{

}
.calendar_enid{
	background: #3C5E79;
	color: white;
}
.contactos{
	background: #166781;
	color: white;
	padding: 0px 10px  0px  10px;
}
.titulo_ubicacion{
	background: red;
	color: black !important;

}
</style>

