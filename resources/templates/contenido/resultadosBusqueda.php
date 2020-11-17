<?php

require("src/validar_formulario.php");

  $busqueda = "";
  $selectBuscador = "";
  $select = "";
  $cadbusca ="";
  $clase = "";


  if(isset($_POST) && count($_POST)>0){

    //BUSQUEDA
    if($_POST['selectBuscador']){
        $selectBuscador = limpiarCadena($_POST['selectBuscador']);
    }else{
        $errores['error_buscador'] = "Debes seleccionar una opción.";
    }
    //select
    if($_POST['busqueda']){
        $busqueda = limpiarCadena($_POST['busqueda']);
    }else{
        $errores['error_busqueda'] = "Debes introducir texto.";
    }
  }

  if ($busqueda != ''){

    if($selectBuscador == 'nombre_receta'){
      $cadbusca = RecetaManager::getNombreSolo($busqueda);
      $clase = "receta";
    }
    if($selectBuscador == 'nombre_rutina'){
      $cadbusca = RutinaManager::getNombreSolo($busqueda);
      $clase = "rutina";
    }
  }else{
    header("Location:page404.php");
    die();
  }

?>

<?php if($clase == "rutina") {?>
<h1>Rutinas:</h1>
<div id="rutinas"class="rutinas">
  <?php foreach ($cadbusca  as $fila) { ?>
    <div id="rutina" class="rutina" data-id="<?=$fila['ID']?> ">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <p class="negrita">Dificultad:</p>
    <p><span class="negrita">Dificultad:</span> <?= $fila['DIFICULTAD']?></p>
    <p class="negrita">Descripcion:</p>
    <p> <br><?= $fila['DESCRIPCION']?></p>
    </div>
  <?php } ?>
</div>
<?php } ?>

<?php if($clase == "receta") {?>
<h1>Recetas:</h1>
<div id="recetas" class="recetas">
  <?php foreach ($cadbusca as $fila) { ?>
    <div id="receta" class="receta" data-id="<?=$fila['ID']?> ">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <figure><img src="<?=$fila['IMAGEN'] ?>"></figure>
    <p class="negrita">Tiempo:</p>
    <p><?= $fila['TIEMPO']?></p>
    </div>
  <?php } ?>
</div>
<?php } ?>
