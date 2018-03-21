<div>
    <div>
        <span class='titulo-config'> 
            <?=editar_btn($param["in_session"]  , create_url_config_escenario()."1/". $param['id_evento']."/puntoventa/'"    )?>            
        </span>                 
    </div>
    <div>        
        <?=puntos_disponibles($puntos_venta , $param["in_session"] , $param["id_evento"])?>
    </div>
</div>    

