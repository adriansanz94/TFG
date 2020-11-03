
<?php

/*$datosRutina = RutinaManager::getAll();
$datosReceta = RecetaManager::getAll();*/

$datosRutina = RutinaManager::verMasRutinas(1);
$datosReceta = RecetaManager::verMasReceta(1);


/*echo "<pre>";
print_r($datosRutina);
echo "<pre>";
print_r($datosReceta);*/


?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<div id="rutinas"class="rutinas">
  <h1>Rutinas:</h1>
  <?php foreach ($datosRutina   as $fila) { ?>
    <div id="rutina" class="rutina">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
    <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
    </div>
  <?php } ?>
  <a id="vermas" href="">ver más...</a>
</div>
<div id="recetas" class="recetas">
<h1>Recetas:</h1>
  <?php foreach ($datosReceta as $fila) { ?>
    <div id="receta" class="receta" data-id="<?=$fila['ID']?> ">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <figure><img src="<?=$fila['IMAGEN'] ?>"></figure>
    <p><?= $fila['DESCRIPCION']?></p>
    <p><?= $fila['TIEMPO']?></p>
    <p><?= $fila['IMAGEN']?></p>
    </div>
  <?php } ?>
  <button type='button' id="vermasRecetas" >ver más...</a>
</div>

<script type="text/javascript">
  
  let recetas = document.getElementsByClassName('receta');
  let ultima = recetas.length-1;
  let recetaUltima = document.getElementsByClassName('receta')[ultima].getAttribute('data-id');
  let url='respuestaVerMas.php?idP='+recetaUltima;

  $('#vermasRecetas').click(function(){

    $.ajax(
    {
      url : 'respuestaVerMas.php',
      type: "GET",
      data : {idP: recetaUltima},

    })
      .done(function(data) {
        let respuesta = JSON.parse(data.split('body')[1].split('script')[0].split('\n')[1]);
        pintarMasRecetas(respuesta);

      })
      .fail(function(data) {
        alert( "error" );
      })
      .always(function(data) {
        alert( "complete" );
      });
      
      /*$.ajax(
              {
                  //url: 'recibeRutina1.php?rutinaText=rutinaFinalText&rutinaCheck=rutinaFinalCheck;',
                  //url: 'recibeRutina1.php?rutinaText='+rutinaFinalText+'&rutinaCheck='+rutinaFinalCheck+';',
                  /*success: function( data ) {
                      alert( 'El servidor devolvio "' + data + '"' );
                  }
                  success: function(){
                    $(location).attr('href',url);
                  }
              }
          )
    
    */
  });

  function pintarMasRecetas(datosJSON){

  }

  function crearReceta(recetaJSON){
    <div id="receta" class="receta" data-id=" ">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <figure><img src="<?=$fila['IMAGEN'] ?>"></figure>
    <P><?= $fila['DESCRIPCION']?></P>
    <P><?= $fila['TIEMPO']?></P>
    <P><?= $fila['IMAGEN']?></P>
    </div>
  }
</script>