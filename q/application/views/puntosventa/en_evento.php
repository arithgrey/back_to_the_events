<?php
	$filtro =  "<div class='contenedor_busqueda'>"; 
	foreach ($puntos_venta_filtro as $row){	          

		$img =  create_icon_img($row , "punto-venta-evento-result" , $row["idpunto_venta"] );		
		
		$filtro .= "<div class='enid-filtro-busqueda' id='".$row["idpunto_venta"]."'>";
	    $filtro .= "<li title='Click para cargar al evento.'>";                                  	          	    	    
			$filtro .=  "<div class='contenedor_img_punto_venta'>"; 
	        $filtro .=  $img; 
			$filtro .=  "</div>"; 	 	
		    $filtro .=  "<div class='punto-venta-evento-result text_pv'  id='". $row["idpunto_venta"]."'>";          
		    $filtro .=   $row["razon_social"];                     
	        $filtro .=  "</div>";        	   
		    $filtro .= "<span class='punto-venta-evento-result  agregar_pv '  id='". $row["idpunto_venta"]."' > 
		    				Agregar 
		    			</span> ";	
	    $filtro .=  "</li>";
	    $filtro .= "</div>"; 
	}
	$filtro .=  "</div>"; 	

	$msj_user = count($puntos_venta_filtro) . " puntos de venta encontrados "; 	
	$msj_carga = "<a href = '". create_url_puntoventa_admin("/a/nuevo") ."' class='btn_nnuevo'>
				  	Registra + 
				  </a>"; 		

	$scroll_enid = ""; 			  
	if (count($puntos_venta_filtro )> 1){
		$scroll_enid = "class='scroll-mov' "; 			  
	}
?>
<!---->
<div>		
	<div class='row cargar-mas-mov'>
		<div class='col-sm-12'>
			<span class='text-carga-pv '>
				<?=$msj_user;?>
				<?=$msj_carga;?>
			</span>
		</div>
	</div>	
	<div class='row'>
		<div class='col-lg-12 col-md-12 col-sm-12'>
			<div <?=$scroll_enid?> >
				<?=$filtro?>	    
			</div>
		</div>	
	</div>			
	<div class='row cargar-mas'>
		<div class='col-lg-12 col-md-12 col-sm-12'>
			<span class='text-carga-pv'>		
				<?=$msj_user;?>
				<?=$msj_carga;?>
			</span>
		</div>		
	</div>
</div>
<!---->


<style type="text/css">
.contenedor_img_punto_venta{
	width: 50%;
}.agregar_pv{
	font-size: .8em;
	background: #032935;
	color: white;	
	border-radius: 1px;
	padding: 1px;
}.text_pv{
	font-size: .8em;
}.enid-filtro-busqueda{
	list-style:none !important;
}.text-carga-pv{
	background: rgb(61, 74, 80) none repeat scroll 0% 0%;
	padding: 4px;
	color: white;
	font-size: .8em;
}
.contenedor_busqueda{
	padding: 10px;
	border-radius: 1px;	
	background: #dbedf5 !important; 
}
.cargar-mas-mov{
	display: none;
}
.scroll-mov{
	height: 300px;
	overflow-y: scroll;
	overflow-x: hidden;
}
/**/
@media only screen and (max-width: 991px){    	        
	.cargar-mas-mov{
		display: block;
	}
	.cargar-mas{
		display: none;
	}
	.scroll-mov{
		height: 300px;
		overflow-y: scroll;
		overflow-x: hidden;
	}
}
</style>
