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


<link rel="stylesheet" href="/css/receta.css">
<link rel="stylesheet" href="/css/cssComun.css">
<div class="receta">
  <?php if($fav == null){ ?>
    <label for="agregar"><span>No está en favoritos</span><figure><img src="imagenes/corazon-roto.png" id="imagen"></figure> </label>
    <input type="checkbox" id="agregar" name="noFavorito" value="noFavorito" class="noFavorito">
  <?php }else{?>
    <label for="quitar"><span>Está en favoritos</span><figure><img src="imagenes/corazon.png" id="imagen"></figure></label>
    <input type="checkbox" id="quitar" name="Favorito" value="Favorito" class="favorito">
  <?php }?>
  <div>
      <div id="receta" class="receta" data-id="<?=$datosReceta['ID']?> ">
      <h2><a href="receta.php?id=<?= $datosReceta['ID']?>"><?= $datosReceta['NOMBRE']?></a></h2>
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
  <a href="">Receta subida por:<?=$recetaSubida['']?> </a>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
  let favorito = document.querySelector('label');
  let favoritos = <?=$favoritos?>;
  let fav = favoritos || 'null';
  $(favorito).click(function(){

  let id_receta = <?=$datosReceta['ID']?>;
  let id_user = <?=$id_user?>;
  $.ajax(
    {
      url : 'AJAXRecetaFav.php',
      type: "GET",
      data : {"fav": fav,"id_user": id_user,"id_receta": id_receta},
    })
      .done(function(data) {

        fav = data.split('body')[2].split(' ')[4].split('\n')[0];

        let im =  document.getElementById('imagen');
        let span = document.querySelector('span');
        if (fav != 'null') {
          console.log('a');
          im.src="imagenes/corazon.png";
          span.innerHTML = "Esta en favoritos";
        }else{
          im.src="imagenes/corazon-roto.png";
          span.innerHTML = "No esta en favoritos";
        }
      })
      .fail(function(data) {
        alert( "error" );
      });
});


</script>
