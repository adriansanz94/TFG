<?php
	require("$ROOT/src/validar_formulario.php");
	areaPrivada();
	$nombre = "";
	$ingredientes ="";
	$descripcion = "";
	$tiempo = "";
	$imagen = "";
	$errores = [];
	$id_usuario = $_SESSION['ID'];
	$rutaImagen = "";

	if (count($_POST)>0 ) {
		//NOMBRE
		if (isset($_POST['nombre']) && $_POST['nombre'] != '') {
			$nombre = limpiarCadena($_POST['nombre']);
		}else{
			$errores['nombre'] = "El nombre de la receta debe ser mayor a 3 caracteres.";
		}
		//INGREDIENTES
		if (isset($_POST['ingredientes']) && $_POST['ingredientes'] != '') {
			$ingredientes = limpiarCadena($_POST['ingredientes']);
		}else{
			$errores['ingredientes'] = "Debes rellenar los ingredientes";
		}
	  //DESCRIPCION
	  if (isset($_POST['descripcion']) && $_POST['descripcion'] != '') {
	    $descripcion = limpiarCadena($_POST['descripcion']);
	  }else{
	    $errores['descripcion'] = "La descripción debe de contener más de 10 caracteres.";
	  }
	  //TIEMPO
	  if (isset($_POST['tiempo']) && $_POST['tiempo'] != '') {
	    $tiempo = limpiarCadena($_POST['tiempo']);
	  }else{
	    $errores['tiempo'] = "El tiempo debe de contener más de 3 caracteres.";
	  }
	  //IMAGEN
	  if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['name'] != '') {
	    $imagen = limpiarCadena($_FILES['imagen']['name']);
			$nombreUsuario = UsuarioManager::getById($id_usuario);
	    $rutaImagen = guardarImagen($nombreUsuario['NOMBRE'].'/recetas',$nombre,$_FILES['imagen']['name']);
	  }else{
	    $errores['imagen'] = "imagen no valida";
	  }

	  if (count($errores) == 0) {
	      RecetaManager::insert($nombre,$ingredientes,$descripcion,$tiempo,$rutaImagen,$id_usuario);
				$nombre = "";
				$ingredientes ="";
				$descripcion = "";
				$tiempo = "";
				$imagen = "";
				$errores = [];
				$rutaImagen="";
	      header("Location:principal.php");
	      die();
	  }
	}

?>

<div class="subirReceta">
  <form action="subirReceta.php" method="post" enctype="multipart/form-data">
    <h1>Subir receta</h1>
    <label>Nombre de la receta:</label> <br>
    <input type="text" name="nombre" value="<?=$nombre?>"> <br>
    <?php if( isset($errores['nombre'])) { ?>
      <br><span class='error'><?=$errores['nombre']?></span><br>
    <?php } ?>

    <label>Ingredientes (separalos por , ):</label> <br>
    <input type="text" name="ingredientes" value="<?=$ingredientes?>"> <br>
    <?php if( isset($errores['ingredientes'])) { ?>
      <br><span class='error'><?=$errores['ingredientes']?></span><br>
    <?php } ?>

    <label>Descripción de la receta (Ingredientes y preparación):</label> <br>
    <input type="textarea" name="descripcion" value="<?=$descripcion?>"> <br>
    <?php if( isset($errores['descripcion'])) { ?>
      <br><span class='error'><?=$errores['descripcion']?></span><br>
    <?php } ?>

    <label>Tiempo de preparación:</label> <br>
    <input type="text" name="tiempo" value="<?=$tiempo?>"> <br>
    <?php if( isset($errores['tiempo'])) { ?>
      <br><span class='error'><?=$errores['tiempo']?></span><br>
    <?php } ?>

    <label>Subir imagen de receta:</label> <br>
    <input type="file" name="imagen" value="Seleccione archivo"> <br>
    <?php if( isset($errores['imagen'])) { ?>
      <br><span class='error'><?=$errores['imagen']?></span><br>
    <?php } ?>

    <input type="submit" name="enviar" value="Subir Receta" class="boton1">
  </form>
</div>
