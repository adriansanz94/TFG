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
echo "favoritos";

//$datosEjerCompleto = EjercicioRutinaManager::getByIdEjercicio($datosRutina[]);
$datosEjer = EjercicioRutinaManager::getByIdRutina($datosRutina['ID']);

$ejercicio = [];
for ($i=0; $i < count($datosEjer); $i++) {
    $id = $datosEjer[$i]['ID_EJERCICIO'];
    $ejercicio[$i]= EjercicioManager::getById($id);
}

?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<style media="screen">
  .ejercicio{
    border:1px solid red;
  }
  img{
    width:100%;
    height: 100%;
  }
</style>
<div class="rutina">
  <?php if($fav == null){ ?>
    <label for="agregar">agregar a fav </label>
    <input type="checkbox" id="agregar" name="noFavorito" value="noFavorito" class="noFavorito"> 
  <?php }else{?>
    <label for="quitar">quitar de fav</label>
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

  $(favorito).click(function(){
  
  let favoritos = <?=$favoritos?>;
  
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
        alert("enviado!");
        favorito = document.querySelector('label');
      })
      .fail(function(data) {
        alert( "error" );
      });

  
});

</script>