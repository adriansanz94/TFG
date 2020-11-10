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
  img{
    width:100%;
    height: 100%;
  }
</style>



  <?php foreach ($ejercicios as $fila) { ?>
  <div class="cajas">
  <p>Nombre :<?=$fila['NOMBRE']?></p>
  <figure>
    <img src="<?=$fila['IMAGEN']?>" alt="">
  </figure>
  <p>Grupo Muscular: <?=$fila['GRUPOMUSCULAR']?></p>
  <p id="descripcion" class="oculto">Descripción: <?=$fila['DESCRIPCION']?></p>
  <span> Seleccionar: </span>  <input type="checkbox" name="<?=$fila['NOMBRE']?>" value="<?=$fila['ID']?>" id="rutina"> <br>
  <span> Repeticiones o tiempo: </span> <input type="text" name="<?=$fila['ID']?>" value="">
  </div>
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
