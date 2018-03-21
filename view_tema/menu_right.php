<div class="fbar">
        <div class="container">
            <div class="row row1">
                <div class='col-lg-4 col-sm-12'>
                    <a href="../nosotros" >                           
                        <h2 style="margin:0px; color:white;">                            
                            BACK TO THE EVENTS
                        </h2>
                    </a>    
                </div>
                <div class='col-lg-8  col-sm-12'>

                    <?php
                        if($in_session > 0  ) {?>
                    <ul class="pull-right">
                        <li class="upper-links dropdown">
                            <a class="links">
                                <span class='seccion_img'>
                                    <img class='icono_enid_format' width='100%' src="../imgs/index.php/enid/imagen_usuario/<?=$id_usuario?>">
                                </span>
                                
                                     <?=evalua_titulo_menu_principal( $info_empresa,  $email  );?>
                                


                                <i class="fa fa-sort-desc">
                                </i>         
                            </a>       
                            <ul class="dropdown-menu">                            
                                <?=$menu?>
                            </ul>
                        </li>
                        <li class="upper-links url_manuales">
                            <a class="links" href="../nosotros/index.php/home/uso">
                            <svg class="" width="16px" height="12px" style="overflow: visible;">
                                <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
                            </svg>
                            </a>
                        </li>                        
                    </ul>
                    <?php }?>
                </div>    
            </div>
            
        </div>
    </div>
    <style type="text/css">


.icono_enid{
    width: 30px!important;
    height: 30px!important;
}
    .fbar {
    background: transparent linear-gradient(to right, #041536 0%, #5F56AC 100%) repeat scroll 0% 0% !important;
    color: #FFFFFF;
}

.row1{
    padding-top: 10px;
}

.row2 {
    padding-bottom: 20px;
}

.fbar-input {
    padding: 11px 16px;
    border-radius: 2px 0 0 2px;
    border: 0 none;
    outline: 0 none;
    font-size: 15px;
}

.fbar-button {
    background-color: #ffe11b;
    border: 1px solid #ffe11b;
    border-radius: 0 2px 2px 0;
    color: #565656;
    padding: 10px 0;
    height: 43px;
    cursor: pointer;
}

.cart-button {
    background-color: #2469d9;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .23), inset 1px 1px 0 0 hsla(0, 0%, 100%, .2);
    padding: 10px 0;
    text-align: center;
    height: 41px;
    border-radius: 2px;
    font-weight: 500;
    width: 120px;
    display: inline-block;
    color: #FFFFFF;
    text-decoration: none;
    color: inherit;
    border: none;
    outline: none;
}

.cart-button:hover{
    text-decoration: none;
    color: #fff;
    cursor: pointer;
}

.cart-svg {
    display: inline-block;
    width: 16px;
    height: 16px;
    vertical-align: middle;
    margin-right: 8px;
}

.item-number {
    border-radius: 3px;
    background-color: rgba(0, 0, 0, .1);
    height: 20px;
    padding: 3px 6px;
    font-weight: 500;
    display: inline-block;
    color: #fff;
    line-height: 12px;
    margin-left: 10px;
}

.upper-links {
    display: inline-block;
    padding: 0 11px;
    line-height: 23px;
    font-family: 'Roboto', sans-serif;
    letter-spacing: 0;
    color: inherit;
    border: none;
    outline: none;
    font-size: 12px;
}

.dropdown {
    position: relative;
    display: inline-block;
    margin-bottom: 0;
}

.dropdown:hover {
    background-color: #fff;
}

.dropdown:hover .links {
    color: #000;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown .dropdown-menu {
    position: absolute;
    top: 100%;
    display: none;
    background-color: #fff;
    color: #333;
    left: 0;
    border: 0;
    border-radius: 0;
    box-shadow: 0 4px 8px -3px #555454;
    margin: 0;
    padding: 0;
}

.links {
    color: #fff;
    text-decoration: none;
}

.links:hover {
    color: #fff;
    text-decoration: none;
}

.profile-links {
    font-size: 12px;
    font-family: 'Roboto', sans-serif;
    border-bottom: 1px solid #e9e9e9;
    display: block;
    padding: 0 11px;
    line-height: 23px;
}

.profile-li{
    padding-top: 2px;
}
.icono_enid_format{
    width: 30px;
}
    </style>