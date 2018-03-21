

            <a href="#" class="list-group-item">                            
                <div class="col-md-3 text-center">
                    <h2> 
                        <?=$info["num_accesos"]?> 
                        <small> 
                            Promociones 
                        </small>
                    </h2>
                    <button type="button" class="btn btn-primary btn-lg btn-block">
                        +  Detalles
                    </button>
                    
                </div>
                <div class="col-md-9">
                    <h4 class="list-group-item-heading"> 
                        Precios y promociones
                    </h4>
                    <p class="list-group-item-text"> 
                        <?php
                        if ($info["num_accesos"] ==  0) {
                            echo "Promociones aún no registradas";
                        }else{

                            echo crea_promocion_evento($info["prox_acceso"]);
                        }

                        ?>
                        
                        
                    </p>
                </div>
          </a>





            
              
              


              <style type="text/css">


.col-lg-4{ padding: 0 !important;}
.blocks{ border:1px solid #EEEEEE;}
.blocks:hover{box-shadow:0px 0px 10px #D9E0DB;}
.block-header{ height: 95px; text-align: center; width: 100%; padding: 8%; background: #F8F8F8; color: #333333;}
.block-container p:hover{background:#F8F8F8;}
.block-header h4{ font-weight: bold; vertical-align: center;}
.block-container{ text-align: center;}
.block-container p{ border-bottom:1px solid #F4F7F8; margin: 0; padding: 2%; }
.block-container p:last-child{ border-bottom:none;}
.price{font-size: 50px; font-family: PT Serif; color: #FF592D; font-weight: bold;}
.renew-price{font-size: 12px; color: #333333; font-style: italic; font-weight: normal;}
.block-footer{text-align: center; padding: 10%;}
.order-now{border: 1px solid #FF592D; padding: 15px; border-radius: 4%; color:#333333; font-weight: bold; }
.order-now:hover{text-decoration: none; background: #FF592D; color: #fff;}
.active-block { box-shadow:0px 0px 10px #D9E0DB;}
.active-block .block-header{ background: #45BA76; color: #fff;}
.active-block .price{ color:#45BA76;}
.active-block .block-footer a{ background: #45BA76; color: #fff; border:none;}
.active-block .block-footer a:hover{ background: #EEEEEE; color: #333333; border:1px solid #45BA76;}


              </style>