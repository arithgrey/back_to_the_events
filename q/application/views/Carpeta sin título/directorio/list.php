<?php
        $complete  ="";		
        $contacto = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($contactos) >= 20 ){
			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 500px;' " ; 
		}

		$b =1;						  
		foreach ($contactos as $row) {

			$id_contacto  = $row["idcontacto"]; 
			$nombre      = $row["nombre"];  
			$organizacion = $row["organizacion"];
			$tel          = $row["tel"]; 
			$movil        = $row["movil"];
			$extension =  $row["extension"];
			$correo       = $row["correo"];
			$correo_alterno =$row["correo_alterno"];
			$pagina_web = $row["pagina_web"];
			$pagina_fb =  $row["pagina_fb"];
			$pagina_tw =  $row["pagina_tw"];
			$direccion    = evalua_direccion($row["direccion"],  $id_contacto ); 
			$status       = $row["estado_contacto"];
			$fecha_registro = $row["fecha_registro_contacto"];
			$tipo          = $row["tipo"];
			$idusuario     = $row["idusuario"];
			$nota          = $row["nota"];
			
			
			/**/					
			$img = create_icon_img($row , ' img_contacto   ', $id_contacto   , 'a'  );		
			$img  =  "<span data-toggle='modal' data-target='#contact-imagen-modal'  >" . $img . "</span>" . " "; 

			
			$direccion =  strtolower($direccion); 

			$contacto .='<tr>';			
				$contacto .= get_td( '<i id="'. $id_contacto.'" class="editar-contacto fa fa-cog" ></i> ' , ' data-toggle="modal" data-target="#contact-modal-edit"  ');										
				$contacto .= get_td($img,  "style='width:45px;' ");				
				$contacto .= get_td($nombre , ' class="campo_contacto" ');
				$contacto .= get_td($organizacion); 
				
				$contacto .= get_td($tel); 
				$contacto .= get_td($movil); 
				$contacto .=  get_td($extension);
				$contacto .= get_td($correo); 
				$contacto .= get_td($correo_alterno); 						
				$contacto .= get_td(valida_url_contacto($pagina_web , "www" )); 
				$contacto .= get_td(valida_url_contacto($pagina_fb , "Facebook" )); 										
				$contacto .= get_td(valida_url_contacto($pagina_tw , "Twitter" )); 

				$contacto .= get_td($direccion);
				$contacto .= get_td(validate_descripcion_c($nota , $id_contacto ), ' data-toggle="modal" data-target="#contact-nota"');		 
				$contacto .= get_td($tipo  , "class='tipo_text' "); 						
				$contacto .= get_td($status); 
				$contacto .= get_td($fecha_registro); 
				$contacto .= get_td("<i class='delete_contacto  fa fa-times eliminar_enid' id='". $id_contacto ."'></i>", ' data-target="#contact-delete"  data-toggle="modal"  '); 

			$contacto .='</tr>';			
			$b++;
		}


		

		
		
		
		
?>






<span class='num_registros_encontrados'>
	# Contactos encontrados <?=count($contactos);?>
</span>
<div  <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">		
			<?=get_td("Configurar")?>
			<?=get_td("IMG")?>
			<?=get_td("Contacto")?>
			<?=get_td("Organización")?>
			<?=get_td("Teléfono")?>
			<?=get_td("Movil")?>
			<?=get_td("Extensión")?>
			<?=get_td("Correo")?>
			<?=get_td("Correo alterno")?>
			<?=get_td("Página web ")?>
			<?=get_td("Facebook")?>
			<?=get_td("Twitter")?>
			<?=get_td("Dirección")?>
			<?=get_td("Nota")?>
			<?=get_td("Tipo")?>
			<?=get_td("Estado")?>
			<?=get_td("Registrado")?>
			<?=get_td("Eliminar")?>
		</tr>		
		<?=$contacto;?>
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