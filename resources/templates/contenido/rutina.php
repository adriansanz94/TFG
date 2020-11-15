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
<style type="text/css">
  input{
    position: absolute;
    left: -10000px;
  }
  img{
    cursor: pointer;
    background-image: url('../../public/imagenes/');
  }
  .ejercicio{
    border:1px solid red;
  }
</style>
<div class="rutina">
  <?php if($fav == null){ ?>
    <label for="agregar"><span>No está en favoritos</span><figure><img src="imagenes/noFav.png" id="imagen"></figure> </label>
    <input type="checkbox" id="agregar" name="noFavorito" value="noFavorito" class="noFavorito">
  <?php }else{?>
    <label for="quitar"><span>Está en favoritos</span><figure><img src="imagenes/favorito.jpg" id="imagen"></figure></label>
    <input type="checkbox" id="quitar" name="Favorito" value="Favorito" class="favorito">
  <?php }?>
  <div class="rutinaCabecera">
    <h1><?= $datosRutina['NOMBRE']?></h1>
    <p><?= $datosRutina['DIFICULTAD']?></p>
    <p><?= $datosRutina['DESCRIPCION']?></p>
  </div>
  <div class="ejerGlobal">
        <?php for ($i=0; $i < count($ejercicio); $i++) { ?>
      <div class="ejercicio">
          <p>Nombre Ejercicio:<?=$ejercicio[$i]['NOMBRE']?></p>
          <figure>
            <img src="<?= $ejercicio[$i]['IMAGEN']?>" alt="">
          </figure>
          <p>Grupo Muscular:<?=$ejercicio[$i]['GRUPOMUSCULAR']?></p>
          <p>Descripción:<?=$ejercicio[$i]['DESCRIPCION']?></p>
          <p>Repeticiones: <?= $datosEjer[$i]['REPETICIONES']?></p>
        <p>aqui iria una imagen</p>
        <?php } ?>
      </div>
  </div>
</div>

<script type="text/javascript">
  let favorito = document.querySelector('label');
  let favoritos = <?=$favoritos?>;

  $(favorito).click(function(){

    let fav = favoritos || 'null';
    let id_rutina = <?=$datosRutina['ID']?>;
    let id_user = <?=$id_user?>;

    $.ajax(
      {
        url : 'AJAXRutinaFav.php',
        type: "GET",
        data : {"fav": fav,"id_user": id_user,"id_rutina": id_rutina},
      })
        .done(function(data) {
          console.log(data);
          let da;
          if (data.split('body')[1].split(' ')[4] !== 'null') {
            favoritos = data.split('body')[1].split(' ')[4];
          }else{
            favoritos = 'null';
          }
          let im =  document.getElementById('imagen');
          let span = document.querySelector('span');
          if (fav === 'null') {
            im.src="imagenes/favorito.jpg";
            span.innerHTML = "Esta en favoritos";
          }else{
            im.src="imagenes/noFav.png";
            span.innerHTML = "No esta en favoritos";
          }
        })
        .fail(function(data) {
          alert( "error" );
        });


});

</script>
