
<?php

/*$datosRutina = RutinaManager::getAll();
$datosReceta = RecetaManager::getAll();*/

$datosRutina = RutinaManager::verMasRutinas(0);
$datosReceta = RecetaManager::verMasReceta(0);


echo "<pre>";
print_r($datosRutina);
echo "<pre>";
print_r($datosReceta);


?>

<div class="rutinas">
  <h1>Rutinas:</h1>
  <?php foreach ($datosRutina   as $fila) { ?>
    <div class="rutina">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
    <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
    </div>
  <?php } ?>
  <a href="">ver más...</a>
</div>
<div class="recetas">
<h1>Recetas:</h1>
  <?php foreach ($datosReceta as $fila) { ?>
    <div class="recetas2">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <figure><img src="<?=$fila['IMAGEN'] ?>"></figure>
    <P><?= $fila['DESCRIPCION']?></P>
    <P><?= $fila['TIEMPO']?></P>
    <P><?= $fila['IMAGEN']?></P>
    </div>
  <?php } ?>
  <a href="">ver más...</a>
</div>
