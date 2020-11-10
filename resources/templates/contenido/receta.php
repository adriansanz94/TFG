<?php
global $ROOT;
global $config;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$fav = RrecetaFavoritaManager::getByIdReceta($id,$id_user);
if($fav == null){
  $favoritos = 'null';
}else{
  $favoritos = $fav['ID'];
}
echo "favoritos";
print_r( $fav);

$recetas = RecetaManager::getById($id);
$no = $recetas['IMAGEN'];
echo "<pre>";
print_r($recetas);

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
    <h1><?= $recetas['NOMBRE']?></h1>
    <figure><img src="<?=$recetas['IMAGEN'] ?>"></figure>
    <p><?= $recetas['TIEMPO']?></p>
    <p><?= $recetas['DESCRIPCION']?></p>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
let favorito = document.querySelector('label');

favorito.addEventListener('click',agregarQuitar);

function agregarQuitar(e){
  console.log('me has pulsado');
  let favoritos = <?=$favoritos?>;
  let fav;
  if(favoritos == 'null'){
    fav = 'null';
  }else{
    fav = <?=$favoritos?>;
  }
  
  let id_rutina = <?=$datosRutina['ID']?>;
  let id_user = <?=$id_user?>;
  //console.log(fav);
  let url = 'AJAXRecetaFav.php?fav='+fav+'&id_user='+id_user+'&id_receta='+id_receta;
  alert('Enviando!');
  $.ajax({
    //url: 'recibeRutina1.php?rutinaText=rutinaFinalText&rutinaCheck=rutinaFinalCheck;',
    //url: 'recibeRutina1.php?rutinaText='+rutinaFinalText+'&rutinaCheck='+rutinaFinalCheck+';',
    /*success: function( data ) {
    alert( 'El servidor devolvio "' + data + '"' );
  }*/
  success: function(){
    $(location).attr('href',url);
    }
  });
  favorito = document.querySelector('label');
}

</script>
