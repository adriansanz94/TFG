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
<h1 class="tituloR"><a href="recetas.php">Recetas:</a></h1>
<div id="recetas" class="recetas muchasrecetas">
  <?php for ($i=0; $i < count($datosReceta); $i++) { ?>
    <div id="receta" class="receta" data-id="<?=$datosReceta[$i]['ID']?> ">
      <h2><a href="receta.php?id=<?= $datosReceta[$i]['ID']?>"><?= $datosReceta[$i]['NOMBRE']?></a></h2>
      <figure><img src="<?=$datosReceta[$i]['IMAGEN'] ?>"></figure>
      <p class="negrita">Tiempo:</p>
      <p><?= $datosReceta[$i]['TIEMPO']?></p>
    </div>
  <?php } ?>
</div>
