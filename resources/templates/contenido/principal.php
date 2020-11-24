
<?php
$datosRutina = RutinaManager::verMasRutinas(0);
$datosReceta = RecetaManager::verMasReceta(0);

$ingredientes = "";

$ingredientesSolos = [];

for ($i=0; $i < count($datosReceta); $i++) {
  $ingredientes = $datosReceta[$i]['INGREDIENTES'];
  $ingredientesSolos[$i] = explode(',',$ingredientes);
}

?>

<form method="post" action="resultadosBusqueda.php" class="buscador">

  <select class="" name="selectBuscador">
    <option disabled selected value="">Elige una opción</option>
    <option value="nombre_receta">Nombre de Receta</option>
    <option value="nombre_rutina">Nombre de Rutina</option>
  </select>
  <p><input type="text" name="busqueda" placeholder="¿Qué quieres buscar?"> </p>
  <input type="submit" name="buscar" value="Buscar">
</form>

<!-- RUTINAS -->
<div id="rutinasPadre">
  <h1 class="titulo"> <a href="rutinas.php"> Rutinas</a></h1>
  <div id="rutinas"class="rutinas">
    <?php foreach ($datosRutina   as $fila) { ?>

      <div id="rutina" class="rutina" data-id="<?=$fila['ID']?> ">
      <a href="rutina.php?id=<?= $fila['ID']?>">
      <h2><?= $fila['NOMBRE']?></h2>
      <p class="negrita">Dificultad:</p>
      <p><?= $fila['DIFICULTAD']?></p>
      <p class="negrita"> Descripcion</p>
      <p><?= $fila['DESCRIPCION']?></p>
      </a>
      </div>
    <?php } ?>
  </div>
  <button type="button" id="vermasRutinas">ver más...</button>
</div>

<!-- RECETAS -->
<div id="recetasPadre">
<h1 class="titulo"><a href="recetas.php">Recetas</a></h1>
  <div id="recetas" class="recetas">
    <?php for ($i=0; $i < count($datosReceta); $i++) { ?>
      <div id="receta" class="receta" data-id="<?=$datosReceta[$i]['ID']?> ">
      <h2><a href="receta.php?id=<?= $datosReceta[$i]['ID']?>"><?= $datosReceta[$i]['NOMBRE']?></a></h2>
      <figure><a href="receta.php?id=<?= $datosReceta[$i]['ID']?>"><img src="<?=$datosReceta[$i]['IMAGEN'] ?>"></a></figure>
      <p class="negrita">Tiempo:</p>
      <p><?= $datosReceta[$i]['TIEMPO']?></p>
      </div>
    <?php } ?>
  </div>
  <button type='button' id="vermasRecetas" >ver más...</button>
</div>

<script type="text/javascript">

  let recetas = document.getElementsByClassName('receta');
  let contenedorRecetas = document.getElementById('recetasPadre');

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
        let respuesta = JSON.parse(data.split('script')[8].split('>')[2].split('<')[0].split('\n')[1].trim());
        pintarMasRecetas(respuesta);
      })
      .fail(function(data) {
        alert( "error" );
      });
  });

  function pintarMasRecetas(datosJSON){

    let divRecetas = document.getElementById('recetas');
    let btn = document.getElementById('vermasRecetas');
    for (var i = 0; i < datosJSON.length; i++) {
      divRecetas.appendChild(crearReceta(datosJSON[i]));
    }
    contenedorRecetas.appendChild(btn);
  }

  function crearReceta(recetaJSON){

    let divReceta = crearElemento('div',{id:'receta',class:'receta','data-id':recetaJSON.ID},null);
    let h2 = crearElemento('h2',null,null);
    let a = crearElemento('a',{href:'receta.php?id='+ recetaJSON.ID},recetaJSON.NOMBRE);
    let figure = crearElemento('figure',null,null);
    let img = crearElemento('img',{src:recetaJSON.IMAGEN},null);
    let pTituloTiempo = crearElemento('p',{'class':'negrita'},'Tiempo: ');
    let pTiempo = crearElemento('p',null,recetaJSON.TIEMPO);


    h2.appendChild(a);
    figure.appendChild(img);
    divReceta.appendChild(h2);
    divReceta.appendChild(figure);
    divReceta.appendChild(pTituloTiempo);
    divReceta.appendChild(pTiempo);


    let ingre = recetaJSON.INGREDIENTES;
    let ingreSolos = ingre.split(',');


    return divReceta;
  }

/********************Rutina*********************/
let rutinas = document.getElementsByClassName('rutina');
let contenedorRutinas = document.getElementById('rutinasPadre');
$('#vermasRutinas').click(function(){

  let ultima = rutinas.length-1;
  let rutinaUltima = document.getElementsByClassName('rutina')[ultima].getAttribute('data-id');
  let url='respuestaVerMasRutina.php?idRutina='+rutinaUltima;
  $.ajax(
  {
    url : 'respuestaVerMasRutina.php',
    type: "GET",
    data : {idRutina: rutinaUltima},

  })
    .done(function(data) {
      let respuesta = JSON.parse(data.split('script')[8].split('>')[2].split('<')[0].split('\n')[1].trim());

      pintarMasRutinas(respuesta);

    })
    .fail(function(data) {
      alert( "error" );
    });
});

function pintarMasRutinas(datosJSON){

  let divRutinas = document.getElementById('rutinas');
  let btn = document.getElementById('vermasRutinas');

  for (var i = 0; i < datosJSON.length; i++) {
    divRutinas.appendChild(crearRutina(datosJSON[i]));
  }
  contenedorRutinas.appendChild(btn);
}

function crearRutina(rutinaJSON){

  let divRutina = crearElemento('div',{id:'rutina',class:'rutina','data-id':rutinaJSON.ID},null);
  let h2 = crearElemento('h2',null,null);
  let a = crearElemento('a',{href:'rutina.php?id='+ rutinaJSON.ID},rutinaJSON.NOMBRE);
  let pTituloDificultad = crearElemento('p',{'class':'negrita'},'Dificultad: ');
  let pTituloDescripcion = crearElemento('p',{'class':'negrita'},'Descripcion: ');
  let pDificultad = crearElemento('p',null,rutinaJSON.DIFICULTAD);
  let pDescripcion = crearElemento('p',null,rutinaJSON.DESCRIPCION);

  h2.appendChild(a);
  divRutina.appendChild(h2);
  divRutina.appendChild(pTituloDificultad);
  divRutina.appendChild(pDificultad);
  divRutina.appendChild(pTituloDescripcion);
  divRutina.appendChild(pDescripcion);

  return divRutina;
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
