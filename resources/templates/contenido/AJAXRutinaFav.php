<?php 
 if(isset($_GET)){
  $id_user= clear_input($_GET['id_user']);
  $id_rutina= clear_input($_GET['id_rutina']);
  $fav= clear_input($_GET['fav']);

  if($fav != 'null'){
    RutinaFavoritaManager::delete($fav);
  }else{
    RutinaFavoritaManager::insert(intval($id_rutina),intval($id_user));
  }
  $res = RutinaFavoritaManager::getByIdRutina($id_rutina,$id_user);
  if($res == null){
    $resultado = 'null';
  }else{
    $resultado = $res['ID'];
  }
  print_r($resultado);
}
?>