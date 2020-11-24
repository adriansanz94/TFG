<?php
  //Página que tramita favoritos de Rutinas
 if(isset($_GET)){
   //Usamos clearinput para limpiar inserciones de código
  $id_user= clear_input($_GET['id_user']);
  $id_rutina= clear_input($_GET['id_rutina']);
  $fav= clear_input($_GET['fav']);
  //Comprobamos si está o no en favoritos
  if($fav != 'null'){
    //Si ya está en favoritos se borra
    RutinaFavoritaManager::delete($fav);
  }else{
    //Si no, se hace la inserción en la tabla
    RutinaFavoritaManager::insert(intval($id_rutina),intval($id_user));
  }
  //Mandamos la respuesta con la consulta de la rutina
  $res = RutinaFavoritaManager::getByIdRutina($id_rutina,$id_user);
  if($res == null){
    $resultado = 'null';
  }else{
    $resultado = $res['ID'];
  }
  print_r($resultado);
}
?>
