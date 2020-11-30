<?php
	//Este require nos sirve para usar la función de limpiarCadena
	require("$ROOT/src/validar_formulario.php");
	//Función para no dar el acceso si no estás logeado
	areaPrivada();
	if(isset($_SESSION['ID'])){
		$id = $_SESSION['ID'];
	}
	//Obtener todos los datos con el $id
	$datos = UsuarioManager::getById($id);

	$email="";
	$contraseña="";
	$usuarioComprueba="";
	$emailComprueba="";
	$contraseñaComprueba="";
	$descripcion = '';
	$id_usuario = $_SESSION['ID'];
	$errores = [];

	if ( isset($_POST) && count($_POST)!=0 ) {

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

		//IMAGEN

		if (isset($_FILES['imagen'])) {
			$imagen = limpiarCadena($_FILES['imagen']['name']);
			$nombreUsuario = UsuarioManager::getById($id_usuario);
			$rutaImagen = guardarImagen($nombreUsuario['NOMBRE'],'perfil',$_FILES['imagen']['name']);
		}else{
			$errores['imagen'] = "imagen no valida";
		}

		if (count($errores)== 0 && count($_POST) > 0) {

			if(isset($_SESSION['ID'])){

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
				if($_FILES['imagen']){
					ConfiguracionUsuarioManager::updateImagen($_SESSION['ID'],$rutaImagen);
				}
			}
			header('Location: perfil.php');
			die();
 		}
}

?>
<main>

<div class="configuracion">
	<form action="configuracionUsuario.php" method="POST" enctype="multipart/form-data">
		<div>
			<h1>Editar Perfil </h1>
			<div>
				<label class="negrita">Subir imagen de perfil:</label> <br>
				<input type="file" name="imagen" value="Seleccione archivo"> <br>
				<?php if( isset($errores['imagen'])) { ?>
					<br><span class='error'><?=$errores['imagen']?></span><br>
				<?php } ?>
			</div>

			<div>
				<label class="negrita">Cambiar Email del Usuario:</label><br>
				<label> Nombre actual: <?=$datos['EMAIL']?></label><br>
				<input type="text" name="email" placeholder="Escriba el email nuevo" value="<?=$email?>"><br>
				<input type="text" name="emailComprueba" placeholder="Repita el email" value="<?=$emailComprueba?>"><br>
				<?php if(isset($errores['email'])) { ?>
					<span class="error"><?=$errores['email']?></span><br>
				<?php } ?>
			</div>
			<div>
				<label class="negrita">Cambiar tu descripcion:</label><br>
				<label> Descripcion actual: <?=$datos['DESCRIPCION']?></label><br>
				<input type="text" name="descripcion" placeholder="Escriba la nueva descripción" value="<?=$descripcion?>"><br>
				<?php if(isset($errores['descripcion'])) { ?>
					<span class="error"><?=$errores['descripcion']?></span><br>
				<?php } ?>
			</div>

			<div>
				<label class="negrita">Cambiar contraseña</label><br>
				<input type="text" name="contraseña" placeholder="Escriba su contraseña" value="<?=$contraseña?>"><br>
				<input type="text" name="contraseñaComprueba" placeholder="Repita la contraseña" value="<?=$contraseñaComprueba?>"><br>
				<?php if(isset($errores['contraseña'])) { ?>
					<span class="error"><?=$errores['contraseña']?></span><br>
				<?php } ?>
			</div>
			<input type="submit" name="cambiar" value="Cambiar" class="boton1"><br>
		</div>
	</form>
</div>
</main>
