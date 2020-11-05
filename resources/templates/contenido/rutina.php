<?php
global $ROOT;
global $config;

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
///esta consulta tiene que ser en una sola
$datosRutina = RutinaManager::getById($id);
//$datosDeRutina = EjercicioRutinaManager::getByIdRutina($id);

echo "id de la rutina";
echo $datosRutina['NOMBRE'];

//$datosEjerCompleto = EjercicioRutinaManager::getByIdEjercicio($datosRutina[]);
$datosEjer = EjercicioRutinaManager::getByIdRutina($datosRutina['ID']);

$ejercicio = [];
for ($i=0; $i < count($datosEjer); $i++) {
    $id = $datosEjer[$i]['ID_EJERCICIO'];
    $ejercicio[$i]= EjercicioManager::getById($id);
}



//$datosRutiEjer = EjercicioRutinaManager::getByIdRutina($datosRutina['ID']);
echo "<pre>";
print_r($datosRutina);
echo "</pre>";

echo "<pre>";
print_r($datosEjer);
echo "</pre>";

echo "<pre>";
print_r($ejercicio);
echo "</pre>";


?>
<style media="screen">
  .ejercicio{
    border:1px solid red;
  }
</style>
<div class="rutina">
  <div class="rutinaCabecera">
    <h1><?= $datosRutina['NOMBRE']?></h1>
    <p><?= $datosRutina['DIFICULTAD']?></p>
    <p><?= $datosRutina['DESCRIPCION']?></p>
  </div>
  <div class="ejerGlobal">
        <?php for ($i=0; $i < count($ejercicio); $i++) { ?>
      <div class="ejercicio">
          <p>Nombre Ejercicio:<?=$ejercicio[$i]['NOMBRE']?></p>
          <p>Grupo Muscular:<?=$ejercicio[$i]['GRUPOMUSCULAR']?></p>
          <p>Descripción:<?=$ejercicio[$i]['DESCRIPCION']?></p>
          <p>Repeticiones: <?= $datosEjer[$i]['REPETICIONES']?></p>
        <p>aqui iria una imagen</p>
        <?php } ?>
      </div>
  </div>
</div>
<h1>una rutina seleccionada</h1>
