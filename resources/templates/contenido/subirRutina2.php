<?php

 $ejercicios = EjercicioManager::getAll();
 //print_r($ejercicios);

 $ejercicios_json = json_encode($ejercicios);

?>



  <link rel="stylesheet" href="/css/subirRutina2.css">
  <link rel="stylesheet" href="/css/cssComun.css">
  <h1>Seleccionar ejercicios</h1>
  <?php foreach ($ejercicios as $fila) { ?>
  <div class="cajas">
  <p> <span class="negrita">Nombre :</span><?=$fila['NOMBRE']?></p>
  <figure>
    <img src="<?=$fila['IMAGEN']?>" alt="">
  </figure>
  <p><span class="negrita">Grupo Muscular:</span> <?=$fila['GRUPOMUSCULAR']?></p>
  <p id="descripcion" class="oculto"><span class="negrita">Descripción: </span><?=$fila['DESCRIPCION']?></p>
  <span class="negrita"> Seleccionar: </span>  <input type="checkbox" name="<?=$fila['NOMBRE']?>" value="<?=$fila['ID']?>" id="rutina"> <br>
  <span class="negrita"> Repeticiones o tiempo: </span> <input type="text" name="<?=$fila['ID']?>" value="">
</div> <br>
  <?php } ?>
  <input type="submit" name="enviar" value="Enviar" id="send">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">

  /*let enviar = document.getElementById('send');
  enviar.addEventListener('click',rutina);*/



  $('#send').click( function() {

      let rutinaFinalCheck = [];
      let rutinaFinalText = [];
      let rutinaChecked = document.querySelectorAll('#rutina');
      let rutinaSeleccionada = [];
      let padreChecked = [];
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

        let url = 'recibeRutina1.php?rutinaText='+rutinaFinalText+'&rutinaCheck='+rutinaFinalCheck;
        alert('Enviando!');
          $.ajax(
            {
              //url: 'recibeRutina1.php?rutinaText=rutinaFinalText&rutinaCheck=rutinaFinalCheck;',
              //url: 'recibeRutina1.php?rutinaText='+rutinaFinalText+'&rutinaCheck='+rutinaFinalCheck+';',
              /*success: function( data ) {
              alert( 'El servidor devolvio "' + data + '"' );
              }*/
              success: function(){
              $(location).attr('href',url);
              }
            }
          )
      }
    }
  );



</script>
