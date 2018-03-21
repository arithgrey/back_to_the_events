
<div class='col-lg-6 col-lg-offset-3'>
    <center>
        <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140"  src="https://graph.facebook.com/<?=$data_usuario['id_cuenta_fb']?>/picture?type=large" 
        style="width: 140px;  height: 140px;">        
        <h1>
            <strong>
                Felicidades                 
            </strong>            
            <?=$data_usuario["nombre"]?>
        </h1>  
    </center>
    <br>
    <center>
        <span class='sub-ms'>
            Ahora con tu cuenta  Enid service aumentaremos el tráfico tus eventos, desde hoy disfrutarás de los siguientes beneficios:
        </span>
    </center>           
    <br>
    <ul>
        <li>
            - Cada evento que registres en Enid service será automáticamente publicitado en Facebook
        </li>
        <li>
            - Tu lista de contactos ahora se encuentra en Enid Service por lo que ahora podrás  saber a quien hacer llegar las mejores experiencias.
        </li>
    </ul>
    <center>
        <a href="<?=base_url()?>" class='conecta-fb'>            
            Zona de eventos 
        </a>
    </center>
</div>

<style type="text/css">
    .sub-ms{
        font-weight: bold;
        font-size: 1.2em;
    }
    .conecta-fb{
        background: #244E57;
        padding: 10px;
        color: white;
    }
    .conecta-fb:hover{
        text-decoration: none;
        color: white;
    }
</style>