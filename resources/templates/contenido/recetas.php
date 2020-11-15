<?php
global $ROOT;
global $config;

$datosReceta = RecetaManager::getAll();

$ingredientes = "";

$ingredientesSolos = [];

for ($i=0; $i < count($datosReceta); $i++) {
  $ingredientes = $datosReceta[$i]['INGREDIENTES'];
  $ingredientesSolos[$i] = explode(',',$ingredientes);
}



?>
<div id="recetas" class="recetas">
<h1><a href="recetas.php">Recetas:</a></h1>
  <?php for ($i=0; $i < count($datosReceta); $i++) { ?>
    <div id="receta" class="receta" data-id="<?=$datosReceta[$i]['ID']?> ">
    <h2><a href="receta.php?id=<?= $datosReceta[$i]['ID']?>"><?= $datosReceta[$i]['NOMBRE']?></a></h2>
    <figure><img src="<?=$datosReceta[$i]['IMAGEN'] ?>"></figure>
    <p><?= $datosReceta[$i]['DESCRIPCION']?></p>
    <p><?= $datosReceta[$i]['TIEMPO']?></p>
    <p>Ingredientes:</p>
    <?php  for ($k=0; $k < count($ingredientesSolos[$i]); $k++) { ?>
            <p> - <?=$ingredientesSolos[$i][$k]?></p>

    <?php   } ?>
     </div>
  <?php } ?>
  
</div>