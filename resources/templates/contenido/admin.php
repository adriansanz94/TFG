<?php

  //OBTENER ID del USER
   if ( isset($_SESSION['ID']) ){
     $id = $_SESSION['ID'];
     $user = UsuarioManager::getByID($id);

     echo '<pre>';
     print_r($user);
     echo '</pre>';

     //SI es ADMIN
     if( isset($user) && $user['ROL'] === 'ADMIN') {
       //$rutaImgProfile = (explode('.', $user->getFoto())[0] == 'profileDefault'? $user->getFoto():$user->getId().'/'.$user->getFoto());

       $usuarios = UsuarioManager::getAll();
       $recetas = RecetaManager::getAll();
       $rutinas = RecetaManager::getAll();
       $ejercicios = RecetaManager::getAll();

       echo '<pre>';
     print_r($usuarios);
     echo '</pre>';
     echo '<pre>';
     print_r($recetas);
     echo '</pre>';
     echo '<pre>';
     print_r($rutinas);
     echo '</pre>';
     echo '<pre>';
     print_r($ejercicios);
     echo '</pre>';


     //SINO AL INICIO
     }else{
       //header('Location: principal.php');
       exit;
     }
   }else{
    // header('Location: principal.php');
     exit;
   }

?>