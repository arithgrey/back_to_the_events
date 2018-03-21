<?php 
	
	$lista =  ""; 
	$lista_empresas =  "";
	foreach($resumen_miembros["resumen"] as $row){
		
		$fecha_registro = $row["fecha_registro"];
		$registrados =  $row["registrados"];
		$lista .=  get_td($fecha_registro);		
		$lista_empresas .=  get_td($registrados);
	}

?>

<table class='table_enid_service' border=1>
	<tr class="table_enid_service_header">					
		<?=$lista?>
	</tr>
	<tr>
		<?=$lista_empresas?>
	</tr>
</table>






<?php 
$l =""; 
$b = 1;
	foreach ($resumen_miembros["completa"] as $row) {
		

		$idusuario           =  $row["idusuario"];
		$nombre              =  $row["nombre"];
		$email                     =  $row["email"];
		$fecha_registro      =  $row["fecha_registro"];
		$puesto              =  $row["puesto"];
		$status              =  $row["status"];
		$apellido_paterno    =  $row["apellido_paterno"];
		$apellido_materno    =  $row["apellido_materno"];
		$email_alterno       =  $row["email_alterno"];
		$tel_contacto        =  $row["tel_contacto"];
		$tel_contacto_alterno=  $row["tel_contacto_alterno"];
		$edad                      =  $row["edad"];
		$cargo               =  $row["cargo"];
		$url_fb              =  $row["url_fb"];
		$url_tw              =  $row["url_tw"];
		$url_www             =  $row["url_www"];
		

		$l .= "<tr>";
			$l .= get_td($b);
			$l .= get_td($nombre              );
			$l .= get_td($email                     );
			$l .= get_td($fecha_registro      );
			$l .= get_td($puesto              );
			$l .= get_td($status              );
			$l .= get_td($apellido_paterno    );
			$l .= get_td($apellido_materno    );
			$l .= get_td($email_alterno       );
			$l .= get_td($tel_contacto        );
			$l .= get_td($tel_contacto_alterno);
			$l .= get_td($edad                      );
			$l .= get_td($cargo               );
			$l .= get_td($url_fb              );
			$l .= get_td($url_tw              );
			$l .= get_td($url_www             );
		$l .= "</tr>";

		$b ++;
	}
?>
<br>
<br>
<div style='overflow-y:scroll; overflow-x:auto; height: 300px;' >
<table class='table_enid_service' border=1>
	<tr class="table_enid_service_header">					
			<?=get_td("#")?>
			<?=get_td("Nombre")?>
			<?=get_td("Email")?>    
			<?=get_td("Fecha registro")?>
			<?=get_td("Puesto")?>
			<?=get_td("Estatus")?>
			<?=get_td("A. paterno")?>
			<?=get_td("A. materno")?>
			<?=get_td("Email alterno")?>
			<?=get_td("Tel contacto")?>
			<?=get_td("Tel contacto alterno")?>
			<?=get_td("Edad")?>    
			<?=get_td("Cargo")?>
			<?=get_td("Fb")?>
			<?=get_td("Tw")?>
			<?=get_td("Www")?>

	</tr>	
	<?=$l?>
</table>
</div>