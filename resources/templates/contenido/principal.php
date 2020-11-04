
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
    <div id="receta" class="receta" data-id="<?=$fila['ID']?> ">
    <h2><a href="receta.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <figure><img src="<?=$fila['IMAGEN'] ?>"></figure>
    <p><?= $fila['DESCRIPCION']?></p>
    <p><?= $fila['TIEMPO']?></p>
    <p><?= $fila['IMAGEN']?></p>
    </div>
  <?php } ?>
  <button type='button' id="vermasRecetas" >ver más...</button>
</div>

<script type="text/javascript">
  
  let recetas = document.getElementsByClassName('receta');
  

  $('#vermasRecetas').click(function(){
    let ultima = recetas.length-1;
    let recetaUltima = document.getElementsByClassName('receta')[ultima].getAttribute('data-id');
    let url='respuestaVerMas.php?idP='+recetaUltima;
    $.ajax(
    {
      url : 'respuestaVerMas.php',
      type: "GET",
      data : {idP: recetaUltima},

    })
      .done(function(data) {
        let respuesta = JSON.parse(data.split('body')[1].split('script')[0].split('\n')[1]);
        console.log(respuesta);
        pintarMasRecetas(respuesta);

      })
      .fail(function(data) {
        alert( "error" );
      })
      .always(function(data) {
        alert( "complete" );
      });
  });

  function pintarMasRecetas(datosJSON){

    let divRecetas = document.getElementById('recetas');
    let btn = document.getElementById('vermasRecetas');
    //btn.remove();


    for (var i = 0; i < datosJSON.length; i++) {
      divRecetas.appendChild(crearReceta(datosJSON[i]));
    }
    //let btnNuevo = crearElemento('button',{type:'button',id:'vermasRecetas'},'ver más ...');
    //divRecetas.appendChild(btnNuevo);
    divRecetas.appendChild(btn);
  }

  function crearReceta(recetaJSON){

    let divReceta = crearElemento('div',{id:'receta',class:'receta','data-id':recetaJSON.ID},null);
    let h2 = crearElemento('h2',null,null);
    let a = crearElemento('a',{href:'receta.php?id='+ recetaJSON.ID},recetaJSON.NOMBRE);
    let figure = crearElemento('figure',null,null);
    let img = crearElemento('img',{src:recetaJSON.IMAGEN},null);
    let pDescripcion = crearElemento('p',null,recetaJSON.DESCRIPCION);
    let pTiempo = crearElemento('p',null,recetaJSON.TIEMPO);

    h2.appendChild(a);
    figure.appendChild(img);
    divReceta.appendChild(h2);
    divReceta.appendChild(figure);
    divReceta.appendChild(pDescripcion);
    divReceta.appendChild(pTiempo);

    return divReceta;
  }

  /*funcion auxiliar que nos crea los elementos necesarios en el html*/
function crearElemento(tipo,atributos,contenido){
  const elemento = document.createElement(tipo);
  for(let atr in atributos){
    elemento.setAttribute(atr,atributos[atr]);
  }

  if(typeof contenido === 'string'){
    elemento.appendChild(document.createTextNode(contenido));
  } else if (contenido instanceof HTMLElement){
    elemento.appendChild(elemento);
  } else if (Array.isArray(contenido)){
    contenido.forEach(hijo => elemento.appendChild(hijo));
  }

  return elemento;
}



</script>