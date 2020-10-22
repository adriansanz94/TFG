<?php
$errores = [];
$info = ['USUARIO' => '','CONTRASEÑA' => '',];

if( count($_POST) > 0 ){
  //crear clase gestiona errores
  gestionaErrores($_POST, $info, $errores);

    if($errores == null ){
      $datos = UsuarioManager::autentificado($info['USUARIO']);

      if( $datos != null && password_verify($info['CONTRASEÑA'], $datos['PASS']) ){
        $id = $datos['ID'];
        $_SESSION['autentificado'] = true;
        $_SESSION['ID'] = $id;

        //RECUERDAME
        if( isset($_POST['recuerdame']) && $_POST['recuerdame'] == true ){
          $token = TokenManager::getToken();                                    //generamos un token y lo convertimos a hash
          //ViajesManager::insertCookieSesion([$token, $id]);       //insertamos el token en la base de datos
          CookieManager::insert($token, $id);
          setcookie('recuerdame', $token, time()+(24*60*60*7));  //se establece la cookie de recuerdame
        }

        header("Location:principal.php");
        die();
      }else{
        $errores['db'] = 'El usuario o la contraseña no estan registrados';
      }
    }
  }


?>
<link rel="stylesheet" href="/css/login.css">
 <div class="centrar">
 <form class="" action="login.php" method="post">
     <input type="text" name="USUARIO" value="<?=$info['USUARIO']?>" placeholder="Introduce tu nombre">
     <?php if( isset($errores['USUARIO'])) { ?>
       <br><span class='error'><?=$errores['USUARIO']?></span><br>
     <?php } ?>
     <br>
     <input type="password" name="CONTRASEÑA" value="" placeholder="Introduce tu contraseña">
     <?php if( isset($errores['CONTRASEÑA'])) { ?>
       <br><span class='error'><?=$errores['CONTRASEÑA']?></span><br>
     <?php } ?>
     <br>
     <label for="recuerdame">Recuerdame</label> <input type="checkbox" name="recuerdame" value="true" id="recuerdame">
     <br>
     <a href="recuperarPass.php" id="olvidadoContraseña">¿Has olvidado tu contraseña?</a>
     <br>
     <input type="submit" name="enviar" value="Enviar">
     <p>O</p>
     <a href="registrate.php" id="registrate">Registrate</a>

      <?php if( isset($errores['db'])) { ?>
        <br><br><span class='error'><?=$errores['db']?></span><br>
      <?php } ?>
   </form>
 </div>
