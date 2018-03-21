<?php 	
	$height ="style='overflow-x:auto;' "; 
    if (count($integrantes) > 14 ) {
        $height ="style='overflow-y:scroll; overflow-x:auto;  height: 400px;' " ; 
    }
    $list =  "";        
    $now = 1;
    $b =0;
    foreach($integrantes as $row) {

    	$id_user = $row["idusuario"];
        $config =  "<a href='#form-integrante-edicion' > <i class='editar_permisos_miembro fa fa-cog' id='". $row["idusuario"] . "'></i></a>";  

        $status=  $row["status"]; 
        if ($row["status"] ==  "Usuario Activo") {
            $status =  "Activo";     
        }
        $config_estatus= "<a class='config_estatus_user' id='". $row["idusuario"]."'>". $status ."</a>"; 
        //$img  =  create_icon_img($row , "img_user " , $row["idusuario"], "a"  );                                                    
        
        $miembro ="<span class='text_bajo_img'>" .  $row["nombre"] . "</span>";
        //$miembro_pick =  "<span href='#img_user_modal' data-toggle='modal' >" . $img . "</span>" . " "; 
        $inicio_fin_labor =  $row["inicio_labor"] . " " . $row["fin_labor"];

            $list .="<tr>";                              
            $list .= get_td($config);                           
            $list .= get_td($config_estatus);                                     
            //$list .= get_td($miembro_pick ,  "style='width:45px;' " );
            $list .=  get_td($miembro);
            $list .=  get_td( $row["apellido_paterno"] );
            $list .=  get_td( $row["apellido_materno"] );
            $list .= get_td($row["email"]);
            $list .= get_td($row["email_alterno"]);
            $list .= get_td($row["edad"]); 
            $list .= get_td($row["fecha_registro"]);
            $list .= get_td($row["nombreperfil"]);            
            $list .= get_td($row["tel_contacto"]);
            $list .= get_td($row["tel_contacto_alterno"]);
            $list .= get_td($row["numero_empleado"]);
            $list .= get_td($row["turno"]);           
            $list .= get_td($inicio_fin_labor);      
            $list .= get_td($row["grupo"]);
           	$list .= get_td($row["cargo"]);
            $list .= get_td($row["rfc"]);        
            $list .= get_td($row["ultima_modificacion"]);        
            $list .= get_td($row["url_fb"]);        
            $list .= get_td($row["url_tw"]);        
            $list .= get_td($row["url_www"]);                
       		$list .="</tr>";      
        $now++;
        $b ++;
    }
?>

<span class='num_registros_encontrados'>
	# Integrantes encontrados <?=count($integrantes);?>
</span>
<div <?=$height?> >
	<table class='table_enid_service' border=1>	
		<tr class='table_enid_service_header'>                                                                                                           
			<?=get_td("Configurar")?>
			<?=get_td("Estado")?>			
            <?=get_td("Nombre")?>
            <?=get_td("Apellido paterno")?>
            <?=get_td("Apellido materno")?>
            <?=get_td("Email</")?>
			<?=get_td("Email alterno")?>
			<?=get_td("Edad")?>
			<?=get_td("Registrado")?>
			<?=get_td("Perfil</t")?>
			<?=get_td("Tel")?>
			<?=get_td("Tel. alterno")?>
			<?=get_td("#Empleado")?>
			<?=get_td("Turno")?>
			<?=get_td("Horario")?>
			<?=get_td("Grupo")?>
			<?=get_td("Cargo")?>
			<?=get_td("RFC")?>
			<?=get_td("Última modificación")?>
			<?=get_td("Facebook")?>
			<?=get_td("Twitter")?>
			<?=get_td("Página web")?>
		</tr>
		<?=$list?>
	</table>
</div>
