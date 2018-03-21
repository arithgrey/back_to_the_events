<?php
        $complete  ="";		
        $info_uso = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($info_sistema["semanal"]) > 3 ){
			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 500px;' " ; 
		}
		$b =1;						  
		$x =0;
		$limite = count($info_sistema["semanal"]) -1;
		foreach ($info_sistema["semanal"] as $row) {

			
			$f_registro =  $row["f_registro"];
			$total_registrado  =  $row["total_registrado"];
			$home =  $row["home"];
			$prospectos =  $row["prospectos"];
			$usuario_miembro =  $row["usuario_miembro"];
			$busqueda =  $row["busqueda"];


			$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
			$dia_semana = $dias[date('N', strtotime($f_registro))];

	
	
			$inicio_session =  $row["inicio_session"];
			$pagina_empresa =  $row["pagina_empresa"];
			$eventos =  $row["eventos"];


			$dia_evento  =  $row["dia_evento"]; 
			$accesos  =  $row["accesos"]; 
			$escenarios  =  $row["escenarios"]; 
			$cuenta_historia  =  $row["cuenta_historia"]; 
			$solicita_artista  =  $row["solicita_artista"]; 
			$tendencias_empresa  =  $row["tendencias_empresa"]; 
			$informacion_usuario  =  $row["informacion_usuario"]; 
			$errores_sistema   =  $row["errores_sistema"]; 
			$conf_escenario   =  $row["conf_escenario"]; 
			$accesos_sistema   =  $row["accesos_sistema"]; 
			$conf_evento   =  $row["conf_evento"]; 
			$conf_acceso  =  $row["conf_acceso"]; 
			$conf_punto_eventa =  $row["conf_punto_eventa"]; 
			                          

			$style ="";
			if ($x ==  $limite) {
				$style ="style='background:#166781; color:white;' ";
			}
			$info_uso .='<tr  '.$style.'  >';			
				

				if ($x !=  $limite) {
					$info_uso .=  get_td($dia_semana , "class='f-enid' " );				
					$info_uso .= get_td($f_registro , "class='f-enid' ");
				}else{
					$info_uso .= "<td colspan='2'>Totales</td>";
				}

				$info_uso .=  get_td($total_registrado );				
				$info_uso .= get_td($home);
				$info_uso .= get_td($prospectos);
				$info_uso .= get_td($usuario_miembro);
				$info_uso .= get_td($busqueda);
				$info_uso  .=  get_td($inicio_session);
				$info_uso  .=  get_td($pagina_empresa);
				$info_uso  .=  get_td($eventos);
				
				
				$info_uso .= get_td($dia_evento);
				$info_uso .= get_td($accesos);
				$info_uso .= get_td($escenarios);
				$info_uso .= get_td($cuenta_historia);
				$info_uso .= get_td($solicita_artista);

				$info_uso .= get_td($accesos_sistema);
				$info_uso .= get_td($tendencias_empresa);				
				$info_uso .= get_td($informacion_usuario);
				$info_uso .= get_td($errores_sistema);
				$info_uso .= get_td($conf_escenario);

				$info_uso .= get_td($conf_evento);
				$info_uso .= get_td($conf_acceso);
				$info_uso .= get_td($conf_punto_eventa );
				                          
		
			$info_uso .='</tr>';			
			$b++;
			$x ++;
		}
?>





<?=titulo_enid("Uso de Enid Service semanal ")?>



<span class='num_registros_encontrados'>
	# Días de la semana <?=count($info_sistema);?>
</span>
<div  <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">					
				<td colspan="2" > 
				</td>

				<?=get_td("Movimientos")?>
				<?=get_td("Página principal")?>
				<td colspan="2">
					Landing pages
				</td>
				<?=get_td("Busqueda de eventos")?>
				<?=get_td("Inicio session")?>
				<?=get_td("Web de Empresas")?>
				
				<td colspan="6">
					Eventos público
				</td>
				<td colspan="4">
					Dentro del sistema general
				</td>
				<td colspan="4">
					Configuraciones eventos
				</td>

		</tr>		
		<tr>					
				
				<td colspan="2" class='f-enid'> 
					Fechas
				</td>
				<?=get_td("Enid")?>
				<?=get_td("Home")?>
				<?=get_td("Prospectos")?>
				<?=get_td("Miembros")?>
				<?=get_td("Busqueda")?>
				<?=get_td("Inicio session")?>
				<?=get_td("Web de Empresas")?>
				<?=get_td("Eventos")?>

				<?=get_td("Dia evento"  );?>
				<?=get_td("Precios"  );?>
				<?=get_td("Escenarios"  );?>
				<?=get_td("cuenta historia"  );?>
				<?=get_td("Solicita artista"  );?>


				<?=get_td("Accesos sistema "  );?>
				<?=get_td("Tendencias empresa"  );?>
				<?=get_td("Informacion usuario"  );?>
				<?=get_td("Errores sistema "  );?>
				<?=get_td("conf escenario "  );?>
				
				<?=get_td("Conf. evento "  );?>
				<?=get_td("Conf. acceso"  );?>
				<?=get_td("Conf. punto eventa" );?>
				                          



		</tr>		

		<?=$info_uso;?>
	</table>
</div>































<?php
        $complete  ="";		
        $info_uso = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($info_sistema["dia"]) > 3 ){
			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 500px;' " ; 
		}
		$b =1;						  
		$x =0;
		$limite = count($info_sistema["dia"]) -1;
		foreach ($info_sistema["dia"] as $row) {

			
			$horario =  $row["horario"];
			$total_registrado  =  $row["total_registrado"];
			$home =  $row["home"];
			$prospectos =  $row["prospectos"];
			$usuario_miembro =  $row["usuario_miembro"];
			$busqueda =  $row["busqueda"];


			$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
			$dia_semana = $dias[date('N', strtotime($horario))];

	
	
			$inicio_session =  $row["inicio_session"];
			$pagina_empresa =  $row["pagina_empresa"];
			$eventos =  $row["eventos"];


			$dia_evento  =  $row["dia_evento"]; 
			$accesos  =  $row["accesos"]; 
			$escenarios  =  $row["escenarios"]; 
			$cuenta_historia  =  $row["cuenta_historia"]; 
			$solicita_artista  =  $row["solicita_artista"]; 
			$tendencias_empresa  =  $row["tendencias_empresa"]; 
			$informacion_usuario  =  $row["informacion_usuario"]; 
			$errores_sistema   =  $row["errores_sistema"]; 
			$conf_escenario   =  $row["conf_escenario"]; 
			$accesos_sistema   =  $row["accesos_sistema"]; 
			$conf_evento   =  $row["conf_evento"]; 
			$conf_acceso  =  $row["conf_acceso"]; 
			$conf_punto_eventa =  $row["conf_punto_eventa"]; 
			                          

			$style ="";
			if ($x ==  $limite) {
				$style ="style='background:#166781; color:white;' ";
			}
			$info_uso .='<tr  '.$style.'  >';			
				

				if ($x !=  $limite) {					
					$info_uso .= get_td($horario , "class='f-enid' ");
				}else{
					$info_uso .= "<td >Totales</td>";
				}

				$info_uso .=  get_td($total_registrado );				
				$info_uso .= get_td($home);
				$info_uso .= get_td($prospectos);
				$info_uso .= get_td($usuario_miembro);
				$info_uso .= get_td($busqueda);
				$info_uso  .=  get_td($inicio_session);
				$info_uso  .=  get_td($pagina_empresa);
				$info_uso  .=  get_td($eventos);
				
				
				$info_uso .= get_td($dia_evento);
				$info_uso .= get_td($accesos);
				$info_uso .= get_td($escenarios);
				$info_uso .= get_td($cuenta_historia);
				$info_uso .= get_td($solicita_artista);

				$info_uso .= get_td($accesos_sistema);
				$info_uso .= get_td($tendencias_empresa);				
				$info_uso .= get_td($informacion_usuario);
				$info_uso .= get_td($errores_sistema);
				$info_uso .= get_td($conf_escenario);

				$info_uso .= get_td($conf_evento);
				$info_uso .= get_td($conf_acceso);
				$info_uso .= get_td($conf_punto_eventa );
				                          
		
			$info_uso .='</tr>';			
			$b++;
			$x ++;
		}
?>





<?=titulo_enid("Uso de Enid Service día")?>




<div  <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">					
				
				<?=get_td("")?>
				<?=get_td("Movimientos")?>
				<?=get_td("Página principal")?>
				<td colspan="2">
					Landing pages
				</td>
				<?=get_td("Busqueda de eventos")?>
				<?=get_td("Inicio session")?>
				<?=get_td("Web de Empresas")?>
				
				<td colspan="6">
					Eventos público
				</td>
				<td colspan="4">
					Dentro del sistema general
				</td>
				<td colspan="4">
					Configuraciones eventos
				</td>

		</tr>		
		<tr>					
				
				<?=get_td("Horario")?>
				<?=get_td("Enid")?>
				<?=get_td("Home")?>
				<?=get_td("Prospectos")?>
				<?=get_td("Miembros")?>
				<?=get_td("Busqueda")?>
				<?=get_td("Inicio session")?>
				<?=get_td("Web de Empresas")?>
				<?=get_td("Eventos")?>

				<?=get_td("Dia evento"  );?>
				<?=get_td("Precios"  );?>
				<?=get_td("Escenarios"  );?>
				<?=get_td("cuenta historia"  );?>
				<?=get_td("Solicita artista"  );?>


				<?=get_td("Accesos sistema "  );?>
				<?=get_td("Tendencias empresa"  );?>
				<?=get_td("Informacion usuario"  );?>
				<?=get_td("Errores sistema "  );?>
				<?=get_td("conf escenario "  );?>
				
				<?=get_td("Conf. evento "  );?>
				<?=get_td("Conf. acceso"  );?>
				<?=get_td("Conf. punto eventa" );?>
				                          



		</tr>		

		<?=$info_uso;?>
	</table>
</div>


















<?=titulo_enid("Visitas Enid día")?>

<?php
	
	$info_dispositivos =""; 

	foreach($info_sistema["visitas_dispositivos"] as $row){

		$accesos   =  $row["accesos"];
	    $ip    =  $row["ip"];
	    $sitios    =  $row["sitios"];
	    $dispositivos    =  $row["dispositivos"];

	    $info_dispositivos .= "<tr>";
	    $info_dispositivos .= get_td($accesos); 	    
		$info_dispositivos .=  get_td($ip);
		$info_dispositivos .=  get_td("<a>". $sitios ."</a>" ,  "class='sitios_dia' data-toggle='modal' data-target='#visitas_dia'   ");
		$info_dispositivos .=  get_td("<a>". $dispositivos ."</a>" ,  "class='dispositivos_dis'  data-toggle='modal' data-target='#visitas_dia'  ");	
		$info_dispositivos .= "</tr>";

	}
?>




<div>
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">					
			<?=get_td("Accesos");?>
			<?=get_td("Personas"  );?>
			<?=get_td("Sitios" );?>	
			<?=get_td("dispositivos" );?>	
		</tr>		
							
		<?=$info_dispositivos?>
		

		
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
.titulo-principal{
	background: #2196f3;
	color: white;
}
</style>