<?php 
 if(isset($_GET)){
  
  $id_user= $_GET['id_user'];
  print_r('user '.$id_user);
  $id_rutina= $_GET['id_rutina'];
  print_r(' rutina '.$id_rutina);
  $fav= $_GET['fav'];
  print_r(' fav '.$fav);
}

if($fav != null){
  echo $fav;
  RutinaFavoritaManager::delete($fav);
  print_r('quitado');
  
}else{
  RutinaFavoritaManager::insert(intval($id_rutina),intval($id_user));
  print_r('insertado');

  
}


?>