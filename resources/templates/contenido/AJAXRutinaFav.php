<?php 
 if(isset($_GET)){
  
  $id_user= clear_input($_GET['id_user']);
  $id_rutina= clear_input($_GET['id_rutina']);
  $fav= clear_input($_GET['fav']);

  if($fav != 'null'){
    echo $fav;
    RutinaFavoritaManager::delete($fav);
    print_r('quitado');
    
  }else{
    RutinaFavoritaManager::insert(intval($id_rutina),intval($id_user));
    print_r('insertado');

    
  }

}




?>