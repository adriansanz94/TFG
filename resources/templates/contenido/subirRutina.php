<?php

 $ejercicios = EjercicioManager::getAll();
 //print_r($ejercicios);

 /*$ejercicios_juntos = implode("/",$ejercicios);*/

$ejercicios_json = json_encode($ejercicios);


//printf($ejercicios_json);
print_r($ejercicios_json);




?>
<style media="screen">
  .cajas{
    width: 250px;
    height: auto;
    border: 1px solid red;
    margin:5px;
    display:inline-block;
  }
  h1{
    text-align: center;
  }
</style>

  <h1> Subir rutina de ejercicios</h1>
  <p>Bienvenido querido Entrenador, estás aquí para poner aprueba tus conocimientos, en el mundo del deporte.
     Te dejaremos una serie de ejercicios para que tu mismo seas capaz de hacer tus rutinas, para que tu y los
     demás usuarios podais ponerlos en práctica.
  </p>
  <?php foreach ($ejercicios as $fila) { ?>
  <div class="cajas">
  <p>Nombre :<?=$fila['NOMBRE']?></p>
  <p>Grupo Muscular: <?=$fila['GRUPOMUSCULAR']?></p>
  <p>Descripción: <?=$fila['DESCRIPCION']?></p>
  <span> Seleccionar: </span>  <input type="checkbox" name="<?=$fila['NOMBRE']?>" value="<?=$fila['ID']?>"> <br>
  <span> Repeticiones o tiempo: </span> <input type="text" name="<?=$fila['ID']?>" value="">
  </div>
  <?php } ?>

  <script type="text/javascript">

  </script>
