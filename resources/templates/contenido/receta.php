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

$datosreceta = RecetaManager::getById($id);
$no = $datosreceta['IMAGEN'];

?>

<style type="text/css">
  input{
    position: absolute;
    left: -10000px;
  }
  img{
    cursor: pointer;
    background-image: url('../../public/imagenes/');
  }

</style>

<div class="receta">
  <?php if($fav == null){ ?>
    <label for="agregar"><span>No está en favoritos</span><figure><img src="imagenes/noFav.png" id="imagen"></figure> </label>
    <input type="checkbox" id="agregar" name="noFavorito" value="noFavorito" class="noFavorito"> 
  <?php }else{?>
    <label for="quitar"><span>Está en favoritos</span><figure><img src="imagenes/favorito.jpg" id="imagen"></figure></label>
    <input type="checkbox" id="quitar" name="Favorito" value="Favorito" class="favorito">
  <?php }?>
  <div>
    <h1><?= $datosreceta['NOMBRE']?></h1>
    <figure><img src="<?=$datosreceta['IMAGEN'] ?>"></figure>
    <p><?= $datosreceta['TIEMPO']?></p>
    <p><?= $datosreceta['DESCRIPCION']?></p>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
  let favorito = document.querySelector('label');
  let favoritos = <?=$favoritos?>;
  
  $(favorito).click(function(){
  
  let fav = favoritos || 'null';
  let id_receta = <?=$datosreceta['ID']?>;
  let id_user = <?=$id_user?>;
  $.ajax(
    {
      url : 'AJAXRecetaFav.php',
      type: "GET",
      data : {"fav": fav,"id_user": id_user,"id_receta": id_receta},
    })
      .done(function(data) {
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
