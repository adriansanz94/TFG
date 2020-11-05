
<?php

/*$datosRutina = RutinaManager::getAll();
$datosReceta = RecetaManager::getAll();*/

$datosRutina = RutinaManager::verMasRutinas(0);
$datosReceta = RecetaManager::verMasReceta(0);
$filtrosBusqueda = ['Receta','Rutina','grupo muscular','dificultad rutina'];
$filtrosValue = ['receta.NOMBRE','rutina.NOMBRE','rutina.GRUPOMUSCULAR','rutina.DIFICULTAD',];

$grupoMuscular =['pecho','brazo','pierna','abdomen'];
$dificultad=['facil','media','dificil'];
$etiquetasSelect = ['Aventura', 'Cultural', 'Romántico', 'Relax', 'Gastronómico', 'Con amig@s', 'LowCost', 'Fiesta', 'Religioso'];

$filtro = '';
$buscador = '';
$errores = [];
//validadción buscador
if( count($_POST) > 0) {
  if( isset($_POST['filtro']) && $_POST['filtro'] != ''){
    $filtro = clear_input($_POST['filtro']);
  }else{
    $errores['filtro'] = true;
  }

  if( isset($_POST['buscador']) && $_POST['buscador'] != ''){
    $buscador = clear_input($_POST['buscador']);
  }else{
    $errores['buscador'] = true;
  }

  if( count($errores) == 0){
    header("Location: resultadosBusqueda.php?filtro=$filtro&buscador=$buscador");
    die();
  }
}
/*echo "<pre>";
print_r($datosRutina);
echo "<pre>";
print_r($datosReceta);*/


?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<form method="post" action="principal.php">
    <div>
      <label for="filtro">Filtro</label>
      <select id="filtro" name="filtro">
        <option disabled selected value="">Elige una opción</option>
        <?php for ($i= 0; $i < count($filtrosBusqueda); $i++) {?>
          <option value="<?=$filtrosValue[$i]?>" <?=($filtro == $filtrosValue[$i])?'selected':''?>><?=$filtrosBusqueda[$i]?></option>
        <?php } ?>
      </select>
    </div>
    <div>
      <label for="buscador">Buscador</label>
      <input id="buscador" type="text" name='buscador' value="<?=$buscador?>" placeholder="    ¿Qué quieres buscar?">
      <select id="buscadorGrupoMuscular" name="buscador" class="oculto">
        <option disabled selected>Elige una opción</option>
        <?php for ($i= 0; $i < count($grupoMuscular); $i++) {?>
          <option value="<?=$grupoMuscular[$i]?>"><?=$grupoMuscular[$i]?></option>
        <?php } ?>
      </select>
      <select id="buscadorDificultad" name="buscador" class="oculto">
        <option disabled selected>Elige una opción</option>
        <?php for ($i= 0; $i < count($dificultad); $i++) {?>
          <option value="<?=$dificultad[$i]?>"><?=$dificultad[$i]?></option>
        <?php } ?>
      </select>
    </div>
    <div>
      <input id='buscar' type="submit" name='buscar' value='Buscar'>
  </div>
    <div class='errores'>
      <?php if( isset($errores['filtro']) && $errores['filtro'] == true) { ?>
      <br><span class="error">Debes selecionar un filtro</span>
      <?php } ?>

      <?php if( isset($errores['buscador']) && $errores['buscador'] == true) { ?>
      <br><span class="error">Debes escribir algo en la busqueda</span>
      <?php } ?>
    </div>

  </form>

<div id="rutinas"class="rutinas">
  <h1>Rutinas:</h1>
  <?php foreach ($datosRutina   as $fila) { ?>
    <div id="rutina" class="rutina" data-id="<?=$fila['ID']?> ">
    <h2><a href="rutina.php?id=<?= $fila['ID']?>"><?= $fila['NOMBRE']?></a></h2>
    <P>Dificultad:<?= $fila['DIFICULTAD']?></P>
    <P>Descripcion <br><?= $fila['DESCRIPCION']?></P>
    </div>
  <?php } ?>
  <button type="button" id="vermasRutinas">ver más...</button>
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

/********************Rutina*********************/
let rutinas = document.getElementsByClassName('rutina');

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
      let respuesta = JSON.parse(data.split('body')[1].split('>')[1].split('<')[0]);

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
  divRutinas.appendChild(btn);
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