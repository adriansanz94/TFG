<?php

$filtrosBusqueda = ['Receta','Rutina','grupo muscular','dificultad rutina'];
$filtrosValue = ['receta.NOMBRE','rutina.NOMBRE','rutina.GRUPOMUSCULAR','rutina.DIFICULTAD',];

$grupoMuscular =['pecho','brazo','pierna','abdomen'];
$dificultad=['facil','media','dificil'];


$filtro = '';
$buscador = '';
$errores = [];
//validadción buscador
if( count($_GET) > 0){
  if ( isset($_GET['filtro'])) {
    $filtro = clear_input($_GET['filtro']);
  }
  if ( isset($_GET['buscador'])) {
    $buscador = clear_input($_GET['buscador']);
  }
  if (isset($_GET['page']) && ($_GET['page']) != '') {
    $page = $_GET['page'];
  }
  
}

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



?>
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