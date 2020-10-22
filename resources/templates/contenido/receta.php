<?php
global $ROOT;
global $config;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
$recetas = RecetaManager::getById($id);
echo "<pre>";
print_r($recetas);


?>
<div class="receta">
  <div>
    <h1><?= $recetas['NOMBRE']?></h1>
    <p><?= $recetas['DIFICULTAD']?></p>
    <p><?= $recetas['DESCRIPCION']?></p>
  </div>

</div>
<h1>una receta simple</h1>