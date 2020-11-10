<?php 
 if(isset($_GET)){
  
  $id_user= $_GET['id_user'];
  $id_receta= $_GET['id_receta'];
  $fav= $_GET['fav'];
  
  print_r('user '.$id_user);
  print_r(' receta '.$id_receta);
  print_r(' fav '.$fav);

}

if($fav != 'null'){
  echo $fav;
  RecetaFavoritaManager::delete($fav);
  print_r('quitado');
  
}else{
  RecetaFavoritaManager::insert(intval($id_receta),intval($id_user));
  print_r('insertado');

  
}


?>