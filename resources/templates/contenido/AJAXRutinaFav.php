<?php 
 if(isset($_GET)){
  
  $id_user= $_GET['id_user'];
  $id_rutina= $_GET['id_rutina'];

  $fav= $_GET['fav'];
}

if($fav == null){

  RutinaFavoritaManager::insert($id_rutina,$id_user);
  print_r('insertado');

}else{
  echo $fav;
  RutinaFavoritaManager::delete($fav);
  print_r('quitado');
}


?>