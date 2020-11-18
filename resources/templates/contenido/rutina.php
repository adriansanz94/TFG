<?php
global $ROOT;
global $config;

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$id_user = $_SESSION['ID'];
///esta consulta tiene que ser en una sola
$datosRutina = RutinaManager::getById($id);
$fav = RutinaFavoritaManager::getByIdRutina($id,$id_user);
if($fav == null){
  $favoritos = 'null';
}else{
  $favoritos = $fav['ID'];
}

//$datosEjerCompleto = EjercicioRutinaManager::getByIdEjercicio($datosRutina[]);
$datosEjer = EjercicioRutinaManager::getByIdRutina($datosRutina['ID']);

$ejercicio = [];
for ($i=0; $i < count($datosEjer); $i++) {
    $id = $datosEjer[$i]['ID_EJERCICIO'];
    $ejercicio[$i]= EjercicioManager::getById($id);
}

?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<div class="rutina">
  <div class="icono">
    <?php if($fav == null){ ?>
      <label for="agregar"><span>Agregar a favoritos</span><figure><img src="imagenes/noFav.png" id="imagen"></figure> </label>
      <input type="checkbox" id="agregar" name="noFavorito" value="noFavorito" class="noFavorito">
    <?php }else{?>
      <label for="quitar"><span>Quitar de favoritos</span><figure><img src="imagenes/favorito.png" id="imagen"></figure></label>
      <input type="checkbox" id="quitar" name="Favorito" value="Favorito" class="favorito">
    <?php }?>
  </div>
  <div class="rutinaCabecera">
    <h1><?= $datosRutina['NOMBRE']?></h1>
    <p><span class="negrita">Dificultad:</span><?= $datosRutina['DIFICULTAD']?></p>
    <p> <span class="negrita">Descripción:</span><?= $datosRutina['DESCRIPCION']?></p>
  </div>
  <div class="ejerGlobal">
        <?php for ($i=0; $i < count($ejercicio); $i++) { ?>
      <div class="ejercicio">
          <p><span class="negrita">Nombre Ejercicio:</span><?=$ejercicio[$i]['NOMBRE']?></p>
          <figure>
            <img src="<?= $ejercicio[$i]['IMAGEN']?>" alt="">
          </figure>
          <p><span class="negrita">Grupo Muscular:</span><?=$ejercicio[$i]['GRUPOMUSCULAR']?></p>
          <p><span class="negrita">Descripción:</span><?=$ejercicio[$i]['DESCRIPCION']?></p>
          <p><span class="negrita">Repeticiones:</span> <?= $datosEjer[$i]['REPETICIONES']?></p>
        <?php } ?>
      </div>
  </div>
</div>

<script type="text/javascript">
  let favorito = document.querySelector('label');
  let favoritos = <?=$favoritos?>;
  let fav = favoritos || 'null';
  $(favorito).click(function(){


    let id_rutina = <?=$datosRutina['ID']?>;
    let id_user = <?=$id_user?>;

    $.ajax(
      {
        url : 'AJAXRutinaFav.php',
        type: "GET",
        data : {"fav": fav,"id_user": id_user,"id_rutina": id_rutina},
      })
        .done(function(data) {

          fav = data.split('script')[8].split('>')[2].split('<')[0].split('\n')[1].trim();
          //console.log(fav);
          let im =  document.getElementById('imagen');
          let span = document.querySelector('span');
          if (fav != 'null') {
            im.src="imagenes/favorito.png";
            span.innerHTML = "Quitar de favoritos";
          }else{
            im.src="imagenes/noFav.png";
            span.innerHTML = "Agregar a favoritos";
          }
        })
        .fail(function(data) {
          alert( "error" );
        });
});

</script>
