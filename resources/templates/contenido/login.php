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

        header("Location: principal.php");
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

      <table>
        <tr><td colspan="2" style="background-color:#33A8DB; padding-bottom:5px; padding-top:5px;"><label>Login</label></td></tr>
        <tr><td align="center" rowspan="5"><img src="imagenes/candado.png" id="candado" /></td><td><label>Usuario</label></td></tr>
        <tr><td><input type="text" name="USUARIO" value="<?=$info['USUARIO']?>" placeholder="Introduce tu nombre"></td></tr>
        <tr><td><label>Password</label></td></tr>
        <tr><td><input type="password" name="CONTRASEÑA" value="" placeholder="Introduce tu contraseña"> </td></tr>
        <tr><td><input type="submit" name="enviar" value="Enviar" /> </td></tr>
        <tr>
          <td>  <label for="recuerdame">Recuerdame</label> <input type="checkbox" name="recuerdame" value="true" id="recuerdame">
          </td>
        </tr>  
        </table>
      <?php if( isset($errores['USUARIO'])) { ?>
        <br><span class='error'><?=$errores['USUARIO']?></span><br>
      <?php } ?>

      <?php if( isset($errores['CONTRASEÑA'])) { ?>
        <br><span class='error'><?=$errores['CONTRASEÑA']?></span><br>
      <?php } ?>
      <br>
      <br>


      <br>
      <a href="registrate.php" id="registrate">Registrate</a> <br>
      <a href="recuperarPass.php" id="olvidadoContraseña">¿Has olvidado tu contraseña?</a>
      <br>
       <?php if( isset($errores['db'])) { ?>
         <br><br><span class='error'><?=$errores['db']?></span><br>
       <?php } ?>
   </form>
 </div>
