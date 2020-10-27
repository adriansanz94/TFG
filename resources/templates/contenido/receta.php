<?php
global $ROOT;
global $config;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
$recetas = RecetaManager::getById($id);
$no = $recetas['IMAGEN'];
echo "<pre>";
print_r($recetas);

echo "</pre>";
?>
<div class="receta">
  <div>
    <h1><?= $recetas['NOMBRE']?></h1>
    <figure><img src="<?=$recetas['IMAGEN'] ?>"></figure>
    <p><?= $recetas['TIEMPO']?></p>
    <p><?= $recetas['DESCRIPCION']?></p>
  </div>

</div>
<h1>una receta simple</h1>