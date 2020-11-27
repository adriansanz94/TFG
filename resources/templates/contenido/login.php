<?php
$errores = [];
$info = ['USUARIO' => '','CONTRASEÑA' => '',];
if( count($_POST) > 0 ){
  gestionaErrores($_POST, $info, $errores);
    if($errores == null ){
      $datos = UsuarioManager::autentificado($info['USUARIO']);

      if( $datos != null && password_verify($info['CONTRASEÑA'], $datos['PASS']) ){
        $id = $datos['ID'];
        $_SESSION['autentificado'] = true;
        $_SESSION['ID'] = $id;
        //consulta para sacar el rol de dicho usuario
        $usuario = UsuarioManager::getById($id);
        $_SESSION['ROL'] = $usuario['ROL'];
        //RECUERDAME
        if( isset($_POST['recuerdame']) && $_POST['recuerdame'] == true ){
          //generamos un token y lo convertimos a hash
          $token = TokenManager::getToken();
          //insertamos el token en la base de datos
          CookieManager::insert($token, $id);
          //se establece la cookie de recuerdame para una semana
          setcookie('recuerdame', $token, time()+(24*60*60*7));
        }
        header("Location:principal.php");
        die();
      }else{
        $errores['db'] = 'El usuario o la contraseña no estan registrados';
      }
    }
  }


?>
 <div class="login">
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
     <input type="submit" name="enviar" value="Enviar" class="boton3">
     <p>O</p>
     <a href="registrate.php" id="registrate" class="boton3">Registrate</a>

      <?php if( isset($errores['db'])) { ?>
        <br><br><span class='error'><?=$errores['db']?></span><br>
      <?php } ?>
   </form>
 </div>
