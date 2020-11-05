<?php
	require("$ROOT/src/validar_formulario.php");
?>

<?php

	/*
	-> filter_var — Filtra una variable con el filtro que se indique
			filter_var ( mixed $variable [, int $filter = FILTER_DEFAULT [, mixed $options ]] ) : mixed

	-> password_hash — Crea un hash de contraseña
			password_hash ( string $password , integer $algo [, array $options ] ) : string

	-> password_verify — Comprueba que la contraseña coincida con un hash
			password_verify ( string $password , string $hash ) : bool
	*/

	areaPrivada();
	if(isset($_SESSION['ID'])){
		$id = $_SESSION['ID'];
	}

	$datos = UsuarioManager::getById($id);

	$usuario="";
	$email="";
	$contraseña="";
	$usuarioComprueba="";
	$emailComprueba="";
	$contraseñaComprueba="";
	$descripcion = '';
	$errores = [];

	if ( isset($_POST) && count($_POST)!=0 ) {

		if (isset($_POST['usuario']) && strlen($_POST['usuario'])>=1 ) {
			$usuario = limpiarCadena($_POST['usuario']);
			if (isset($_POST['usuarioComprueba']) && strlen($_POST['usuarioComprueba'])>=1 ) {
				$usuarioComprueba = limpiarCadena($_POST['usuarioComprueba']);
			}
			if(!($_POST['usuario'] === $_POST['usuarioComprueba'])){
				$errores['usuario'] = 'Deben coincidir los usuarios.';
			}
		}
		if (isset($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL )) {
			$email = limpiarCadena($_POST['email']);
			if (isset($_POST['emailComprueba']) && filter_var($_POST['emailComprueba'],FILTER_VALIDATE_EMAIL )) {
				$emailComprueba = limpiarCadena($_POST['emailComprueba']);
			}
			if(!($_POST['email'] === $_POST['emailComprueba'])){
				$errores['email'] = 'Deben coincidir los emails.';
			}
		}
		if (isset($_POST['contraseña']) && contraseñaValida($_POST['contraseña'],4) ) {
			$contraseña = limpiarCadena($_POST['contraseña']);
			if (isset($_POST['contraseñaComprueba']) && contraseñaValida($_POST['contraseñaComprueba'],4) ) {
				$contraseñaComprueba = limpiarCadena($_POST['contraseñaComprueba']);
			}if(!($_POST['contraseña'] === $_POST['contraseñaComprueba'])){
				$errores['contraseña'] = ' Deben coincidir las contraseñas.';
			}
		}
		if(isset($_POST['descripcion']) ){
			$descripcion = limpiarCadena($_POST['descripcion']);
		}else{
			$errores['descripcion'] = 'algo salio mal';
		}

		if (count($errores)== 0 && count($_POST) > 0) {

			if(isset($_SESSION['ID'])){
				if($_POST['usuario']){
						ConfiguracionUsuarioManager::updateNombre($_SESSION['ID'],$usuario);
				}
				if($_POST['email']){
						ConfiguracionUsuarioManager::updateEmail($_SESSION['ID'],$email);
				}
				if($_POST['contraseña']){
						$contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);
						ConfiguracionUsuarioManager::updateContraseña($_SESSION['ID'],$contraseñaHash);
				}
				if($_POST['descripcion']){
					ConfiguracionUsuarioManager::updateDescripcion($_SESSION['ID'],$descripcion);
			}
			}
			header('Location: configuracionUsuario.php');
			die();
 		}
}

?>
<main>

	<link rel="stylesheet" href="/css/general.css">
	<form action="configuracionUsuario.php" method="POST">
		<div class="centrar">
			<div>
				<label>Cambiar Nombre del Usuario:</label><br>
				<label> Nombre actual: <?=$datos['NOMBRE']?></label><br>
				<input type="text" name="usuario" placeholder="Escriba el usuario nuevo" value="<?=$usuario?>"><br>
				<input type="text" name="usuarioComprueba" placeholder="Repita el usuario" value="<?=$usuarioComprueba?>"><br>
				<?php if(isset($errores['usuario'])) { ?>
					<span class="error"><?=$errores['usuario']?></span><br>
				<?php } ?>
			</div>

			<div>
				<label>Cambiar Email del Usuario:</label><br>
				<label> Nombre actual: <?=$datos['EMAIL']?></label><br>
				<input type="text" name="email" placeholder="Escriba el email nuevo" value="<?=$email?>"><br>
				<input type="text" name="emailComprueba" placeholder="Repita el email" value="<?=$emailComprueba?>"><br>
				<?php if(isset($errores['email'])) { ?>
					<span class="error"><?=$errores['email']?></span><br>
				<?php } ?>
			</div>
			<div>
				<label>Cambiar tu descripcion:</label><br>
				<label> descripcion actual: <?=$datos['DESCRIPCION']?></label><br>
				<input type="text" name="descripcion" placeholder="Escriba la descripcion nuevo" value="<?=$descripcion?>"><br>
				<?php if(isset($errores['descripcion'])) { ?>
					<span class="error"><?=$errores['descripcion']?></span><br>
				<?php } ?>
			</div>

			<div>
				<label>Cambiar contraseña</label><br>
				<input type="text" name="contraseña" placeholder="Escriba su contraseña" value="<?=$contraseña?>"><br>
				<input type="text" name="contraseñaComprueba" placeholder="Repita la contraseña" value="<?=$contraseñaComprueba?>"><br>
				<?php if(isset($errores['contraseña'])) { ?>
					<span class="error"><?=$errores['contraseña']?></span><br>
				<?php } ?>
			</div>

			<input type="submit" name="cambiar" value="cambiar"><br>

		</div>

	</form>

</main>
