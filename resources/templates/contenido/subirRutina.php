<?php

 $ejercicios = EjercicioManager::getAll();
 //print_r($ejercicios);

 $ejercicios_json = json_encode($ejercicios);

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
  .oculto{
    visibility: none; /*hidden para ocultarlo*/
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
  <p id="descripcion" class="oculto">Descripción: <?=$fila['DESCRIPCION']?></p>
  <span> Seleccionar: </span>  <input type="checkbox" name="<?=$fila['NOMBRE']?>" value="<?=$fila['ID']?>" id="rutina"> <br>
  <span> Repeticiones o tiempo: </span> <input type="text" name="<?=$fila['ID']?>" value="">
  </div>
  <?php } ?>
  <input type="submit" name="enviar" value="Enviar" id="send">

<script type="text/javascript">

  let enviar = document.getElementById('send');
  enviar.addEventListener('click',rutina);


  function rutina (){
    let rutinaChecked = document.querySelectorAll('#rutina');
    let rutinaSeleccionada = [];
    let padreChecked = [];
    let rutinaFinalCheck = [];
    let rutinaFinalText = [];
    for (var i = 0; i < rutinaChecked.length; i++) {
        if(rutinaChecked[i].checked){
          rutinaSeleccionada.push(rutinaChecked[i]);
          rutinaFinalCheck.push(rutinaChecked[i].value);
        }
    }
    for (var i = 0; i < rutinaSeleccionada.length; i++) {
        if(rutinaSeleccionada[i].parentElement.lastChild.previousSibling.value.length > 0){
          padreChecked.push(rutinaSeleccionada[i]);
          rutinaFinalText.push(rutinaSeleccionada[i].parentElement.lastChild.previousSibling.value);
        }else{
          alert("Debes poner el tiempo o repetición en alguno de los seleccionados");
        }
    }
    console.log(rutinaFinalText);
    console.log(rutinaFinalCheck);
    if(rutinaSeleccionada.length === padreChecked.length){
      alert("Felicidades lo has conseguido");
    }
  }

</script>
