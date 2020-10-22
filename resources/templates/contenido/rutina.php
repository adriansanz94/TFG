<?php
global $ROOT;
global $config;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
///esta consulta tiene que ser en una sola
$datosRutina = RutinaManager::getById($id);
$datosRutiEjer = EjercicioRutinaManager::getByIdRutina($datosRutina['ID']);

foreach($datosRutiEjer as $value){
  $datosEjer[] = EjercicioManager::getById($value['ID_EJERCICIO']);
  $rep[]= $value['REPETICIONES'];
  
}
/*echo "<pre>";
print_r($datosRutina);
echo "<pre>";
print_r($datosRutiEjer);*/
echo "<pre>";
print_r($datosEjer);
echo "<pre>";
print_r($rep);


?>
<div class="rutina">
  <div class="rutinaCabecera">
    <h1><?= $datosRutina['NOMBRE']?></h1>
    <p><?= $datosRutina['DIFICULTAD']?></p>
    <p><?= $datosRutina['DESCRIPCION']?></p>
  </div>
  <div class="ejerGlobal">
    <?php foreach($datosEjer as  $fila ) {?>
      <div class="ejercicio">
        <H3><?=$fila['NOMBRE']?></H3>
        <p>Grupo Muscualar:<?=$fila['GRUPOMUSCULAR']?></p>
        <p>Descripción:<?=$fila['DESCRIPCION']?></p>
        <p>Repeticiones: <?=$rep[0] ?></p>
        <p>aqui iria una imagen</p>


      </div>
    <?php }?>
  </div>
</div>
<h1>una rutina seleccionada</h1>