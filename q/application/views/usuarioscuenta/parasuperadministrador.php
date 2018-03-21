
<script type="text/javascript" src="<?=base_url('application/js/usuarios/principal.js')?>"></script>

<?php 
$listusuarios ="";    
$now = 1;
    foreach ($integrantes as $row) {
        //
        $listusuarios .="<tr>";      
        $listusuarios .="<td class='blue-col-enid text-center'>". $now."</td>
                        <td class=''>".$row["nombre"]."</td>
                        <td class=''>".$row["email"]."</td>
                        <td class='text-center'>". getTimeFormat3( $row["fecha_registro"] )  ."</td>
                        <td class='text-center'>".$row["nombreperfil"]."</td>      
                        <td class='text-center'><a> <i class='editar_permisos_miembro fa fa-pencil-square fa-lg' id='". $row["idusuario"] . "'></i> </a></td>";      

        $listusuarios .="</tr>";      
        $now++;
    }



    

?>


<div class='row'>

<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12 centered">
                <section class="panel">
                    <header class="panel-heading">
                        
                            

                                <a href="#myModal" data-toggle="modal">
                                    <i class="fa fa-user-plus fa-1x"></i>
                                    Nuevo integrante
                                </a>
                            



                    </header>
                        <table aria-describedby="dynamic-table_info" class="display table table-bordered table-striped dataTable dynamic-table-enid" id="dynamic-table">

                                    <thead class='enid-header-table'>

                                        <tr role="row">
                                            <th class="sorting">ID</th>
                                            <th class="sorting ">Miembro</th>
                                            <th class="sorting">Usuario</th>
                                            <th class="sorting">Registro</th>
                                            <th class="sorting">Perfil</th>
                                            <th >Edición</th>

                                        </tr>
                                    </thead>
                                    <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?=$listusuarios;?>
                                    </tbody>    
                        </table>
</div>

</div><!--Termina row-->































<!--********************************************************************************************+***** -->
 <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" 
        id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Invita a un amigo a tu organización</h4>
                    </div>
                    <div class="modal-body">
                        <p>Ingresa su mail y la información de su 
                          cuenta junto con la contraseña será enviada
                          al correo de la persona
                        </p>
                    <form method="post" id="form_new_user" >   

                          <div class="input-group">     
                            <span class="input-group-addon" id="basic-addon1">Nombre</span>
                            <input class="form-control" placeholder="Jonathan" aria-describedby="basic-addon1" id="nombre" name="nombre" type="text">
                          </div>     
                         <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">@</span>
                          <input type="mail" name='mail_newuser' id="mailnewcontact" 
                           class="form-control" 
                          placeholder="Email de la persona a quien quieres invitar a tu cuenta" 
                          aria-describedby="basic-addon1">
                        </div>
 
                  

                      

                        <div  id='listperfiles'>
                        </div>

                        <br>
                        <div class='well' id="clientresponse"></div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                        <button class="btn btn-primary sednewsolicitud" type="button">Enviar</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- modal -->


