<?php
 if(isset($_GET)){

  $id_user= clear_input($_GET['id_user']);
  $id_receta= clear_input($_GET['id_receta']);
  $fav= clear_input($_GET['fav']);

  if($fav != 'null'){
    RecetaFavoritaManager::delete($fav);
  }else{
    RecetaFavoritaManager::insert(intval($id_receta),intval($id_user));
  }
  $res = RecetaFavoritaManager::getByIdReceta($id_receta,$id_user);
  if($res == null){
    $resultado = 'null';
  }else{
    $resultado = $res['ID'];
  }
  print_r($resultado);
}

?>
