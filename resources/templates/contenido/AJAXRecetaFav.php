<?php 
 if(isset($_GET)){
  
  $id_user= clear_input($_GET['id_user']);
  $id_receta= clear_input($_GET['id_receta']);
  $fav= clear_input($_GET['fav']);
  
  if($fav != 'null'){
    echo $fav;
    RecetaFavoritaManager::delete($fav);
    print_r('quitado');
    
  }else{
    RecetaFavoritaManager::insert(intval($id_receta),intval($id_user));
    print_r('insertado');

    
  }

}




?>