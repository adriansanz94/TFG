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
echo "favoritos";
print_r( $fav);

$datosreceta = RecetaManager::getById($id);
$no = $datosreceta['IMAGEN'];
echo "<pre>";
print_r($datosreceta);

echo "</pre>";
?>
<div class="receta">
  <?php if($fav == null){ ?>
    <label for="agregar">agregar a fav </label>
    <input type="checkbox" id="agregar" name="noFavorito" value="noFavorito" class="noFavorito"> 
  <?php }else{?>
    <label for="quitar">quitar de fav</label>
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

  $(favorito).click(function(){
  
  let favoritos = <?=$favoritos?>;
  
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
        alert("enviado!");
        favorito = document.querySelector('label');
      })
      .fail(function(data) {
        alert( "error" );
      });

  
});



</script>
