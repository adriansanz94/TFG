<?php
require("$ROOT/src/validar_formulario.php");
$nombre = "";
$descripcion = "";
$tiempo = "";
$imagen = "";
$errores = [];
$id_usuario = $_SESSION['ID'];

if (count($_POST)>0 ) {

	//NOMBRE
	if (isset($_POST['nombre'])) {
		$nombre = limpiarCadena($_POST['nombre']);
	}else{
		$errores['nombre'] = "El nombre de la receta debe ser mayor a 3 caracteres.";
	}

  //DESCRIPCION
  if (isset($_POST['descripcion'])) {
    $descripcion = limpiarCadena($_POST['descripcion']);
  }else{
    /*$errores['descripcion'] = "La descripción debe de contener más de 10 caracteres.";*/
  }

  //TIEMPO
  if (isset($_POST['tiempo'])) {
    $tiempo = limpiarCadena($_POST['tiempo']);
  }else{
    $errores['tiempo'] = "El tiempo debe de contener más de 3 caracteres.";
  }

  //IMAGEN
  if (isset($_POST['imagen'])) {
    $imagen = limpiarCadena($_POST['imagen']);
    
    
    //probar con rutas para ver como guardar las imagenes 
    //esto puede cambiar
     guardarImagen(`$id_usuario/recetas`,$_POST['nombre'],$imagen);
  }else{
    $errores['imagen'] = "imagen no valida";
  }

  echo "<pre>";
  print_r($errores);
  echo "</pre>";

  if (count($errores) == 0) {

      RecetaManager::insert($nombre,$descripcion,$tiempo,$imagen,$id_usuario);
      /*header("Location:principal.php");
      die();*/
  }
}

?>
<style>
  .error{
    color:red;
  }
</style>


<form action="subirReceta.php" method="post">
  <label>Nombre de la receta:</label> <br>
  <input type="text" name="nombre" value=""> <br>
  <?php if( isset($errores['nombre'])) { ?>
    <br><span class='error'><?=$errores['nombre']?></span><br>
  <?php } ?>

  <label>Descripción de la receta (Ingredientes y preparación):</label> <br>
  <input type="textarea" name="descripcion" value=""> <br>
  <?php if( isset($errores['descripcion'])) { ?>
    <br><span class='error'><?=$errores['descripcion']?></span><br>
  <?php } ?>

  <label>Tiempo de preparación:</label> <br>
  <input type="text" name="tiempo" value=""> <br>
  <?php if( isset($errores['tiempo'])) { ?>
    <br><span class='error'><?=$errores['tiempo']?></span><br>
  <?php } ?>

  <label>Subir imagen de receta:</label> <br>
  <input type="file" name="imagen" value="Seleccione archivo"> <br>
  <?php if( isset($errores['imagen'])) { ?>
    <br><span class='error'><?=$errores['imagen']?>imagen no valida</span><br>
  <?php } ?>

  <input type="submit" name="enviar" value="Subir Receta">
</form>
