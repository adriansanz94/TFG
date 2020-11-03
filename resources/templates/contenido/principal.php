
<?php

/*$datosRutina = RutinaManager::getAll();
$datosReceta = RecetaManager::getAll();*/

$datosRutina = RutinaManager::verMasRutinas(0);
$datosReceta = RecetaManager::verMasReceta(0);


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
    <div id="receta" class="receta" data-id="<?=$fila['ID']?>">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <figure><img src="<?=$fila['IMAGEN'] ?>"></figure>
    <P><?= $fila['DESCRIPCION']?></P>
    <P><?= $fila['TIEMPO']?></P>
    </div>
  <?php } ?>
  <!--<a id="vermasRecetas" href="">ver más...</a>-->
  <input type="submit" name="recetas" value="ver más ..." id="vermasRecetas">
</div>


<script type="text/javascript">

let recetas = document.getElementsByClassName('receta');
let ultima = recetas.length-1;
let recetaUltima = document.getElementsByClassName('receta')[ultima].getAttribute('data-id');
let divRecetas = document.getElementById('recetas');

//seleccionar botones
/*let btnEnviar = document.getElementById('vermasRecetas');
btnEnviar.addEventListener('click',obtenerRecetas);

function obtenerRecetas(){
    //let numero = compruebaOffset();
    //let uriNueva = uri + numero;
    pedirDatos(recetaUltima);
}



function pedirDatos(idReceta){

  let xhr = new XMLHttpRequest();
  //let url = 'http://localhost:9000/respuestaVerMas.php?idP=';
  let url = 'respuestaVerMas.php?idP=';
  xhr.onreadystatechange = function(){
        if(xhr.readyState === 4) {
            if(xhr.status === 200) {
              //let ext = exito(xhr);
              console.log(xhr);
              rellenarDiv(exito(xhr));
            }else{
              console.error(error(xhr));
            }
        }
    }
  xhr.open('GET',url+idReceta);
  xhr.send();
}

function exito(text){
    return text.response;
}

function error(xhr){
    return `Error: ${xhr.status} (${xhr.statusText})`;
}

function rellenarDiv(datos){
  alert(datos);
  console.log(datos);
}*//////////////////////////////////////////////////////////////////////////////


  $('#vermasRecetas').click(function(){

    let recetas = document.getElementsByClassName('receta');
    let ultima = recetas.length-1;
    let recetaUltima = document.getElementsByClassName('receta')[ultima].getAttribute('data-id');
    let divRecetas = document.getElementById('recetas');

    $.ajax({
      url : "respuestaVerMas.php",
      type: "POST",
      data : {idReceta: recetaUltima},
      /*dataType : "json"*/
    })
    .done(function(data) {
      $(data);
      alert(data);
      añade(divRecetas,data);
    })
    .fail(function(data) {
      alert( "error" );
    })
    .always(function(data) {
      alert( "complete" );
    });

  });

  function añade(divRecetas,data){

    let dataProcess = document.getElementsByTagName(data.body);
    console.log(dataProcess);

    for (let index = 0; index < data.length; index++) {
     for (let index1 = 0; index1 < data[index].length; index1++) {
      let div = document.createElement('div');
          let h2 = document.createElement('h2');
          let a = document.createElement('a');
          a.innerHTML = data[index][index1];
          h2.appendChild(a);
          let figure = document.createElement('figure');
          let imagen = document.createElement('img');
          figure.appendChild(imagen);
          let p1 = document.createElement('p');
          let p2 = document.createElement('p');

          div.appendChild(h2);
          divRecetas.appendChild(div);

     }

}

   /* for (let index = 0; index < data.length; index++) {
      let div = document.createElement('div');
      let h2 = document.createElement('h2');
      let a = document.createElement('a');
      a.innerHTML = 'hola';
      h2.appendChild(a);
      let figure = document.createElement('figure');
      let imagen = document.createElement('img');
      figure.appendChild(imagen);
      let p1 = document.createElement('p');
      let p2 = document.createElement('p');

      div.appendChild(h2);
      divRecetas.appendChild(div);
    }*/

  }

</script>
