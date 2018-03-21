<?php
	
	$icon ="<span class='contactos_text row'> No se han asociado contactos a este punto de venta</span>"; 
	if (count($contactos_pv) > 0 ) {		
		$icon =  "<span class='contactos_text row'>Asociados al punto de venta actualmente </span>"; 	
	}
		$flag = 0; 
		foreach ($contactos_pv as $row){			
			/**/
			$flag ++;			
			$idcontacto  = $row["idcontacto"];
			$nombre = $row["nombre"]; 									
			$title = $nombre . " asociado al evento"; 
			$img =  create_icon_img($row , "contacto_icon", $idcontacto); 

			$icon .= ""; 		

			$class_confim =  "enid_hidden  confirm_".$idcontacto; 
			$confirmado =  "btn btn-default enid_red confirmado_".$idcontacto; 

			$icon .="<div  class='".$class_confim ."'>
						<button class='".$confirmado."'>
							Confirmar
						</button>		
						<button class='cancelar btn btn-default  '>
							Cancelar
						</button>
					</div>
					<div id='". $idcontacto ."' class='img-horizontal col-lg-2'>
							" . $img ."
							<div title='$title' >
								<i class='fa fa-times delete-contacto_icon' id='". $idcontacto  ."'>
								</i>
							</div>						
					</div>";  											
		}	
?>
<div> 
	<?=$icon;?>
</div>

<br>
<br>
<style type="text/css">

	.contacto_icon{
		display: block;
	    font-size: 9pt;
	    font-weight: 700;
	    height: 30px;
	    left: 0;
	    line-height: 30px;
	    overflow: hidden;
	    position: absolute;
	    text-align: center;
	    top: 0;
	    width: 100%;
	}   
	.busqueda_input{
		margin-top: 20px;
	}   
	.delete-contacto_icon {
    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
    -webkit-transition:all ease .8s ;
    background: black;
    color: white;
    filter: alpha(opacity=0); /*Opacidad Para IE */
    left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
    opacity: 0; /*Inicialmente transparente */
    padding: 5px;
    position: absolute; /*Info sobre la imagen*/
    top: 5%;
    transition:all ease .8s;
    zoom: 1;
    }
    .img-horizontal:hover .delete-contacto_icon{
    filter: alpha(opacity=80);
    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
    }
    .delete-contacto_icon:hover{
    	cursor: pointer;
    }.enid_red{
    	background: #d8908b;
    }
</style>
					
























<div>
    <span>
        + Anadir contactos
    </span>                          
    <input type="text" class="form-control input-sm" id="f_contacto" placeholder='ej. Daniel Galindo'>
    <div class='place_busqueda_contacto'></div>
    <div class='busqueda_contacto'>
    </div>

    
    <div class='contactos_encontrados'>
    </div>
</div>
    
    

