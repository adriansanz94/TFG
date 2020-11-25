<?php
 //Página que tramita favoritos de Recetas
 if(isset($_GET)){
  //Usamos clearinput para limpiar inserciones de código
  $id_user= clear_input($_GET['id_user']);
  $id_receta= clear_input($_GET['id_receta']);
  $fav= clear_input($_GET['fav']);
  //Comprobamos si está o no en favoritos
  if($fav != 'null'){
    //Si ya está en favoritos se borra
    RecetaFavoritaManager::delete($fav);
  }else{
    //Si no, se hace la inserción en la tabla
    RecetaFavoritaManager::insert(intval($id_receta),intval($id_user));
  }
  //Mandamos la respuesta con la consulta de la receta
  $res = RecetaFavoritaManager::getByIdReceta($id_receta,$id_user);
  if($res == null){
    $resultado = 'null';
  }else{
    $resultado = $res['ID'];
  }
  print_r($resultado);
}

?>
