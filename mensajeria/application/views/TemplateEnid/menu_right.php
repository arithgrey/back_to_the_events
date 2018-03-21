        <div class="menu-right">            
            
            <ul id="notification-menu" class="notification-menu">                
                <li title='Tareas pendientes'>
                    <div class='notificaciones-enid'>
                    </div>
                </li>
                <li>
                    <a style="background:#166781;" title='Próximos eventos ' href="<?=url_busqueda_eventos()?>" class="btn btn-default dropdown-toggle" >                        
                        <i class="fa fa-search">
                        </i>
                        Eventos                    
                    </a>                    
                </li>
                <li>
                <a style="background:#166781;" title='Más opciones'  class="btn btn-default dropdown-toggle" data-toggle="dropdown">                        
                    <?=$nombre;?>
                    <i class="fa fa-sort-desc">
                    </i>
                </a>
                             
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">                        
                    <li>
                        <a class='config-my-data'  href="<?=url_info_cuenta()?>">
                            <i class="fa fa-cog">
                            </i>  
                            Configuración de la cuenta
                        </a>
                    </li>                        
                    <li>
                        <a href="<?=url_sugerencias()?>">
                            <i class="fa fa-truck">
                            </i>
                            Soporte
                        </a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal"  data-target="#modal-version-sistema">
                            <i class="fa fa-code">
                            </i>
                                Versión del sistema 
                        </a>
                    </li>
                    <li>
                        <a href="<?=url_usos_privacidad_enid_service()?>" >                                
                                Condiciones de uso y privacidad 
                        </a>
                    </li>
                    <li title='Terminar sessión del sistema'>
                        <a href="<?=url_log_out()?>">
                            <i class="fa fa-sign-out">
                            </i> 
                                Salir 
                        </a>
                    </li>
                </ul>                                        
            </li>
        </ul>
    </div>