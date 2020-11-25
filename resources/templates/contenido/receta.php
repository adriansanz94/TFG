<?php
  global $ROOT;
  global $config;

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $id_user = $_SESSION['ID'];
  $fav = RecetaFavoritaManager::getByIdReceta($id,$id_user);
  if($fav == null){
    $favoritos = 'null';
  }else{
    $favoritos = $fav['ID'];
  }

  $datosReceta = RecetaManager::getById($id);
  $no = $datosReceta['IMAGEN'];

  $ingredientes = "";
  $ingredientesSolos = [];

  for ($i=0; $i < count($datosReceta['INGREDIENTES']); $i++) {
    $ingredientes = $datosReceta['INGREDIENTES'];
    $ingredientesSolos[$i] = explode(',',$ingredientes);
  }

?>
<div class="receta">
  <h1><?= $datosReceta['NOMBRE']?></h1>
  <div class="icono">
    <?php if($fav == null){ ?>
      <label for="agregar"><figure><img src="imagenes/corazon-roto.png" id="imagen"><figcaption>Agregar a favoritos</figcaption></figure> </label>
      <input type="checkbox" id="agregar" name="noFavorito" value="noFavorito" class="noFavorito">
    <?php }else{?>
      <label for="quitar"><figure><img src="imagenes/corazon.png" id="imagen"><figcaption>Quitar de favoritos</figcaption></figure></label>
      <input type="checkbox" id="quitar" name="Favorito" value="Favorito" class="favorito">
    <?php }?>
  </div>
  <div id="receta" data-id="<?=$datosReceta['ID']?> ">

    <figure><img src="<?=$datosReceta['IMAGEN'] ?>"></figure>
    <p class="negrita">Descripción:</p>
    <p><?= $datosReceta['DESCRIPCION']?></p>
    <p class="negrita">Tiempo:</p>
    <p><?= $datosReceta['TIEMPO']?></p>
    <p class="negrita">Ingredientes:</p>
    <?php  for ($k=0; $k < count($ingredientesSolos[0]); $k++) { ?>
             <p> - <?=$ingredientesSolos[0][$k]?></p>
    <?php   } ?>
  </div>


</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">

  let favorito = document.querySelector('label');
  let favoritos = <?=$favoritos?>;
  let fav = favoritos || 'null';
  //Función de Click
  $(favorito).click(function(){

  let id_receta = <?=$datosReceta['ID']?>;
  let id_user = <?=$id_user?>;
  //Ajax
  $.ajax(
    {
      url : 'AJAXRecetaFav.php',
      type: "GET",
      data : {"fav": fav,"id_user": id_user,"id_receta": id_receta},
    })
      .done(function(data) {
        fav = data.split('script')[8].split('>')[2].split('<')[0].split('\n')[1].trim();

        let im =  document.getElementById('imagen');
        let figcaption = document.querySelector('figcaption');
        if (fav != 'null') {
          im.src="imagenes/corazon.png";
          figcaption.innerHTML = "Quitar de favoritos";
        }else{
          im.src="imagenes/corazon-roto.png";
          figcaption.innerHTML = "Agregar a favoritos";
        }
      })
      .fail(function(data) {
        alert( "error" );
      });
});

</script>
