<?php

require("src/validar_formulario.php");

//Definir variables
$usuario = "";
$correo = "";
$contraseña = "";
$r_contraseña = "";
$errores = [];

//agregar el post y depurar errores
if ( isset($_POST) && count($_POST)!=0 ) {

	//NOMBRE
	if (isset($_POST['usuario']) && strlen($_POST['usuario'])>=3 ) {
		$usuario = limpiarCadena($_POST['usuario']);
	}else{
		$errores['error_usuario'] = "Nombre muy corto";
	}

	//CORREO
	if (isset($_POST['correo']) && filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL) ) {
		$correo = limpiarCadena($_POST['correo']);
	}else{
		$errores['error_correo'] = "Correo invalido";
	}

	//CONTRASEÑA
	if (isset($_POST['contraseña']) && contraseñaValida($_POST['contraseña'],4) ) {
		$contraseña = limpiarCadena($_POST['contraseña']);
	}else{
		$errores['error_contraseña'] = "Contraseña Invalida";
	}

	//CONFIRMAR CONTRASEÑA
	if (isset($_POST['r_contraseña']) && contraseñaValida($_POST['r_contraseña'],6) ) {
		$r_contraseña = limpiarCadena($_POST['r_contraseña']);
		if (!strcmp($contraseña, $r_contraseña)==0) {
			$errores['error_r_contraseña_dif'] = "No coinciden las contraseñas";
		}else{
			$contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
		}
	}else{
		$errores['error_r_contraseña'] = "Contraseña invalida";
	}
}

//hacer el insert y redirigir a Login
if (count($errores)==0 && count($_POST)>0) {

	UsuarioManager::insert($usuario,$contraseña,$correo);

	header('Location: login.php');
	die();
}




?>


<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrate</title>
  </head>
  <link rel="stylesheet" href="/css/registro.css">
  <body>
    <h1>Bienvenido al Registro de Ponte En Forma</h1>

    <form action="registrate.php" method="POST">
    		<label for="usuario">Nombre usuario</label>
    		<input type="text" name="usuario" id="nombre" placeholder="Escribe tu nombre de usuario" value="<?=$usuario?>">
        <?php if( isset($errores['error_usuario'])) { ?>
          <br><span class='error'><?=$errores['error_usuario']?></span><br>
        <?php } ?>

    		<label for="correo">Correo </label>
    		<input type="email" name="correo" id="correo" placeholder="Escribe tu email" value="<?=$correo?>">
        <?php if( isset($errores['error_correo'])) { ?>
          <br><span class='error'><?=$errores['error_correo']?></span><br>
        <?php } ?>

    		<label for="contraseña">Contraseña </label>
    		<input type="password" name="contraseña" id="contraseña" placeholder="Escribe tu contraseña" value="<?=$contraseña?>">
        <?php if( isset($errores['contraseña'])) { ?>
          <br><span class='error'><?=$errores['contraseña']?></span><br>
        <?php } ?>

    		<label for="r_contraseña">Confirmar Contraseña </label>
    		<input type="password" name="r_contraseña" id="r_contraseña" placeholder="Confirma tu contraseña" value="<?=$r_contraseña?>">
        <?php if( isset($errores['error_r_contraseña'])) { ?>
          <br><span class='error'><?=$errores['error_r_contraseña']?></span><br>
        <?php } ?>

        <?php if( isset($errores['error_r_contraseña_dif'])) { ?>
          <br><span class='error'><?=$errores['error_r_contraseña_dif']?></span><br>
        <?php } ?>

    		<input type="submit" name="enviar" value="Registrarse">
    	</form>

  </body>
</html>