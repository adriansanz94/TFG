<?php
  require("src/validar_formulario.php");
  areaPrivada();
  $nombre= "";
  $dificultad = "";
  $descripcion= "";
  $errores = [];
  if(isset($_POST) && count($_POST) > 0){
    //Nombre
    if(isset($_POST['nombre']) && $_POST['nombre']!=''){
        $nombre=limpiarCadena($_POST['nombre']);
    }else{
      $errores['error_nombre'] = "Debes ingresar un nombre de rutina";
    }
    //dificultad
    if(isset($_POST['dificultad'])){
        $dificultad=limpiarCadena($_POST['dificultad']);
    }else{
      $errores['error_dificultad'] = "Debes seleccionar una dificultad.";
    }
    //descripcion
    if(isset($_POST['descripcion']) && $_POST['descripcion']!=''){
        $descripcion=limpiarCadena($_POST['descripcion']);
    }else{
      $errores['error_descripcion'] = "Debes ingresar una descripcion.";
    }
    print_r($_POST);

  }

  if(count($errores) == 0 && count($_POST)>0){
    print_r($errores);
    $id =intval($_SESSION['ID']);
    RutinaManager::insert($nombre,$dificultad,$descripcion,$id);
    header("Location:subirRutina2.php");
    die();
  }


?>

<div class="subirRutina">
  <h1> Subir rutina de ejercicios</h1>
  <p>Bienvenido querido Entrenador, estás aquí para poner aprueba tus conocimientos, en el mundo del deporte.
    Te dejaremos una serie de ejercicios para que tu mismo seas capaz de hacer tus rutinas, para que tu y los
    demás usuarios podais ponerlos en práctica.
  </p>

  <form action="subirRutina1.php" method="post">
    <label> Nombre de la rutina: <input type="text" name="nombre" value="<?=$nombre?>"> </label><br>
    <?php if( isset($errores['error_nombre'])) { ?>
      <br><span class='error'><?=$errores['error_nombre']?></span><br>
    <?php } ?>
    <label> Debe seleccionar una dificultad:</label>
    <select class="" name="dificultad">
      <option value="baja" <?=($dificultad==="baja")?"selected":""?>>Baja</option>
      <option value="media" <?=($dificultad==="media")?"selected":""?>>Media</option>
      <option value="alta" <?=($dificultad==="alta")?"selected":""?>>Alta</option>
    </select><br>
    <?php if( isset($errores['error_dificultad'])) { ?>
      <br><span class='error'><?=$errores['error_dificultad']?></span><br>
    <?php } ?>
    <label> Breve descripciónn de la rutina: <input type="text" name="descripcion" value="<?=$descripcion?>"> </label>
    <?php if( isset($errores['error_descripcion'])) { ?>
      <br><span class='error'><?=$errores['error_descripcion']?></span><br>
    <?php } ?>
    <input type="submit" name="subirRutina1" value="Subir Rutina">
  </form>
</div>
