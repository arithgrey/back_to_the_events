<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   class Mensajeria{         
      function notifica_mail_marketing( $plantilla  , $p_nombre, $p_descripcion , $id_tipo_publicidad  ,  $mail , $nombre ,  $email  , $email_alterno , $imgs){        
        $part_imgs =  ""; 
        foreach ($imgs as $row){

          $id_imagen = $row["idimagen"];
          $url =  base_url('index.php/enid/img')."/".$id_imagen;
          $part_imgs .=  "<img src='".$url."' width=100%; > <br>";
          
        }

      $destinatario = "arithgrey@enidservice.com"; 
      $contenido_plantilla =  $this->get_contenido_plantilla($plantilla);
      $asunto = $p_nombre; 

      $cuerpo = "<html>                                    
                    <meta charset='utf-8' >
                    <label style='font-weight:bold; font-size:1.2em;'>
                      Buen día ".$nombre." - ".$mail."
                    </label>

                  <center>
                  ".$part_imgs."
                  </center>  
                  <br>                  
                    ".$p_descripcion."                  
                  <br>

                  ".$contenido_plantilla."
             
             </html>"; 

        
         //$this->get_headers_mail($mail);
         $headers =  $this->get_headers_mail($mail);
         mail($destinatario , '=?UTF-8?B?'.base64_encode($asunto).'?=' , $cuerpo , $headers);
         return $cuerpo;

      }
      /**/
      function get_contenido_plantilla($plantilla ){

        $contenido_plantilla = "<center>                    
                    <a href='". url_developer() ."'>
                            <button class='btn btn-default login-btn ' style='border-radius: 0;
                              border-style: solid;
                              border-width: 0;
                              cursor: pointer;    
                              padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
                              font-size: 0.98889rem;
                              background-color: #008CBA;
                              border-color: #007095;
                              color: #FFFFFF;'>                    
                                El trabajo que he desarrollado lo puedes consultar aquí
                            </button>
                    </a>
                  </center>";


        if ($plantilla ==  0 ){
          
          $contenido_plantilla =  "<center>
                    <span style='margin-top: 9%;margin-left: 5%;font-size: 3em;font-weight: bold;color: #223c48;'>
                      Enid Service
                    </spa>                    
                  </center>
                  <br>
                  <center>
                  <a href='". base_url('index.php/startsession') ."'>
                          <button class='btn btn-default login-btn ' style='border-radius: 0;
                        border-style: solid;
                        border-width: 0;
                        cursor: pointer;    
                        padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
                        font-size: 0.98889rem;
                        background-color: #008CBA;
                        border-color: #007095;
                        color: #FFFFFF;'>                    
                              Inicia ahora.!
                          </button>
                  </a>
                  </center>                  
                    ";
        }
        return $contenido_plantilla;                
      }
      /**/
      function get_headers_mail($mail){

        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

        //dirección del remitente 
        $headers .= "From: Enid Service <arithgrey@enidservice.com>\r\n";     

        //ruta del mensaje desde origen a destino 
        //$headers .= "Return-path: arithgrey@gmail.com\r\n"; 

        //direcciones que recibián copia 
        $headers .= "Cc: $mail\r\n"; 

        return $headers;           
      }
      /**/
      function notificacion_new_user($mail , $pass){   

         $mail =  $mail;
         $datos["mail_send"] =  $mail;
         $datos["pass_send"] =  $pass;
         $destinatario = "arithgrey@enidservice.com"; 
         $asunto = "Accesos a tu cuenta Enid Service"; 
         $cuerpo = "<html>
                  <a href='". base_url('index.php/startsession') ."'>                  
                     <img src=". base_url('application/img/mail/presentacion.png') .">
                     <center>
                        <strong>
                               <span style='color:black;'>
                                   Hola buen día has ha sido invitado a ser miembro de la cuenta Enid service
                                   le estamos haciendo entrega de sus datos de acceso.
                               </span>      
                            </strong>
                        </center>
                     </a>

                     <br>
                     <center>
                        <a href='". base_url('index.php/startsession') ."'>
                             <button class='btn btn-default login-btn ' style='border-radius: 0;
                              border-style: solid;
                              border-width: 0;
                              cursor: pointer;    
                              padding: 1rem 1.77778rem 0.94444rem 1.77778rem;
                              font-size: 0.98889rem;
                              background-color: #008CBA;
                              border-color: #007095;
                              color: #FFFFFF;'>                    
                                 Inicia ahora.!
                             </button>
                         </a>
                     </center>

                     <center>
                        <label>
                           Usuario :  ". $mail ."
                        </label>
                        <label>
                           Password: ".trim($pass)."
                        </label>
                        <br>
                        <label>
                           Te recomendamos hacer el cambio  de tu contraseña al ingresar al sistema.
                        </label>
                     </center>                
                  </html>"; 

         
         $headers =  $this->get_headers_mail($mail);
         mail($destinatario, '=?UTF-8?B?'.base64_encode($asunto).'?=' ,$cuerpo,$headers);
         return $datos;       
      }           

      /**/
      function notifica_nuevo_contacto($param ,  $email ){

        $destinatario = "arithgrey@enidservice.com";         
        $asunto = "Tienes un nuevo contacto comercial"; 
        
        $nombre =  $param["nombre"];
        $email_contacto =  $param["email"];
        $tel =  $param["tel"];
        $mensaje =  $param["mensaje"];


        $info =  "<strong>Nombre: </strong>".$nombre; 
        $info .=  "<br><strong>Email: </strong>".$email_contacto; 
        $info .=  "<br><strong>Teléfono: </strong> ".$tel; 
        $info .=  "<br><strong>Mensaje: </strong>".$mensaje; 




        $cuerpo = "<html>                                     
                    <meta charset='utf-8' >
                    <label style='font-weight:bold; font-size:1.2em;'>
                      Buen día ".$email." - tienes un nuevo contacto comercial estos son sus datos para que lo contactes 
                    </label>
                      ".$info."
                    </html>"; 

        
         
         $headers =  $this->get_headers_mail($email);
         mail($destinatario , '=?UTF-8?B?'.base64_encode($asunto).'?=' , $cuerpo , $headers);
         return $cuerpo;

      }

}