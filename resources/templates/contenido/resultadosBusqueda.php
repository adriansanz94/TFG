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
  }

?>

<?php if($clase == "rutina") {?>
<div id="rutinas"class="rutinas">
  <h1>Rutinas:</h1>
  <?php foreach ($cadbusca  as $fila) { ?>
    <div id="rutina" class="rutina" data-id="<?=$fila['ID']?> ">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
    <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
    </div>
  <?php } ?>
</div>
<?php } ?>

<?php if($clase == "receta") {?>
<div id="recetas" class="recetas">
<h1>Recetas:</h1>
  <?php foreach ($cadbusca as $fila) { ?>
    <div id="receta" class="receta" data-id="<?=$fila['ID']?> ">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <figure><img src="<?=$fila['IMAGEN'] ?>"></figure>
    <p>Tiempo:</p>
    <p><?= $fila['TIEMPO']?></p>
    </div>
  <?php } ?>
</div>
<?php } ?>
