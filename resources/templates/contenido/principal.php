
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
      <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
      <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
      <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
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
      <figure><img src="<?=$datosReceta[$i]['IMAGEN'] ?>"></figure>
      <!--<p class="negrita">Descripción:</p>-->
      <!--<p><?= $datosReceta[$i]['DESCRIPCION']?></p>-->
      <p class="negrita">Tiempo:</p>
      <p><?= $datosReceta[$i]['TIEMPO']?></p>
      <!--<p class="negrita">Ingredientes:</p>

      <?php  for ($k=0; $k < count($ingredientesSolos[$i]); $k++) { ?>
              <p> - <?=$ingredientesSolos[$i][$k]?></p>

      <?php   } ?>-->
      </div>
    <?php } ?>
  </div>
  <button type='button' id="vermasRecetas" >ver más...</button>
</div>

<script type="text/javascript">

  let recetas = document.getElementsByClassName('receta');
  let contenedorRecetas = document.getElementById('recetaPadre');


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
        let respuesta = JSON.parse(data.split('body')[2].split('script')[0].split('\n')[1]);
        pintarMasRecetas(respuesta);

      })
      .fail(function(data) {
        alert( "error" );
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

    contenedorRecetas.appendChild(btn);
  }

  function crearReceta(recetaJSON){
    
    let divReceta = crearElemento('div',{id:'receta',class:'receta','data-id':recetaJSON.ID},null);
    let h2 = crearElemento('h2',null,null);
    let a = crearElemento('a',{href:'receta.php?id='+ recetaJSON.ID},recetaJSON.NOMBRE);
    let figure = crearElemento('figure',null,null);
    let img = crearElemento('img',{src:recetaJSON.IMAGEN},null);
    /*let pDescripcion = crearElemento('p',null,recetaJSON.DESCRIPCION);
    let pTituloDescripcion = crearElemento('p',{'class':'negrita'},'Descripción: ');*/
    let pTituloTiempo = crearElemento('p',{'class':'negrita'},'Tiempo: ');
    let pTiempo = crearElemento('p',null,recetaJSON.TIEMPO);
    //let pTituloIngredientes = crearElemento('p',null,'Ingredientes:');

    h2.appendChild(a);
    figure.appendChild(img);
    divReceta.appendChild(h2);
    divReceta.appendChild(figure);
    //divReceta.appendChild(pTituloDescripcion);
    //divReceta.appendChild(pDescripcion);
    divReceta.appendChild(pTituloTiempo);
    divReceta.appendChild(pTiempo);
    //divReceta.appendChild(pTituloIngredientes);*/

    let ingre = recetaJSON.INGREDIENTES;
    let ingreSolos = ingre.split(',');

    /*for (let i = 0; i < ingreSolos.length; i++) {

        let pIngredientes = crearElemento('p',null,'- '+ingreSolos[i]);

        divReceta.appendChild(pIngredientes);
    }*/


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

/********************Rutina*********************/
let rutinas = document.getElementsByClassName('rutina');
let contenedorRutinas = document.getElementById('rutinaPadre');
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
      let respuesta = JSON.parse(data.split('body')[2].split('>')[1].split('<')[0]);

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
  let pDificultad = crearElemento('p',null,rutinaJSON.DIFICULTAD);
  let pDescripcion = crearElemento('p',null,rutinaJSON.DESCRIPCION);

  h2.appendChild(a);
  divRutina.appendChild(h2);
  divRutina.appendChild(pDificultad);
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
