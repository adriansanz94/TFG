<?php
  //REQUIRES
  require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  $datosEmail['server']=$config['mail_server'];
  $datosEmail['correo']=$config['mail_correo'];
  $datosEmail['pass']=$config['mail_password'];
  $errores = [];
  $correo = '';
  $respuesta;
  $oculto = [];

  if ( count($_POST) > 0) {
    if ( isset($_POST['email']) && $_POST['email'] != null) {
      $correo = clear_input($_POST['email']);
    }else{
      $errores['email'] = 'Introduce un correo';
    }
    if ( $errores == null ) {

      $token = TokenManager::getToken();
      //Inicializar
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";
      $mail->SMTPOptions = array(
                              'ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true
                              )
                            );
      $mail->SMTPDebug  = 0;
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;                        //puerto
      $mail->Host       = $datosEmail['server'];           //servidor
      $mail->Username   = $datosEmail['correo'];      //tu correo
      $mail->Password   = $datosEmail['pass'];              //contraseña

      $http = 'http://localhost:9000/';
      $mail->IsHTML(true);
      $mail->AddAddress($correo);    //destinatario
      $mail->SetFrom($datosEmail['correo'], "Ponte en Forma");                    // quien envia el correo
      //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");          para añadir otro destinatario
      //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");       con copia oculta

      $mail->Subject = "Ponte en Forma- Recuperar Password";                               //cabecera
      $content =
        "<h1>Ponte en Forma</1>".
        "<h4>Tu rutina diaria te espera</h4>" .
        "<p>Hemos recibido una peticion para cambiar la contrase&#241;a,
          haga click en el siguiente enlace y sera redirigido
        </p>" .
        "<a href='$http"."recuperarPassword.php?email=$correo&token=$token'>Recuperar contrase&#241;a</a>" .
        "<br>" .
        "<p>Saludos</p>"
      ;
      //ENVIAR EMAIL
    $mail->MsgHTML($content);
    if(!$mail->Send()) {
      $respuesta = 'Error al enviar correo para el cambio de contraseña a: '. $correo. "\nVuelva a intentarlo";

    } else {
      TokenManager::delete($correo);
      TokenManager::insert($correo, $token);
      $respuesta = 'Hemos enviado un correo para recuperar la contraseña a: '. $correo;
    }
  }
  }

  ?>

<div class="recuperaPass">
  <?php if( isset($respuesta) && $respuesta != null) { ?>
    <h4><?=$respuesta?></h4>
  <?php }else{ ?>
    <form action="recuperarPass.php" method="post">
      <label for="email">Introduce tu correo</label>
      <br>
      <input type="email" name="email" id='email'>
      <br>
      <?php if( isset($errores['email']) ) { ?>
        <span class="error"><?=$errores['email']?></span>
        <br>
      <?php } ?>
      <input type="submit" name="enviar" value="Enviar">

    </form>
  <?php } ?>
</div>
