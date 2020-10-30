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
       $ejercicios = EjercicioManager::getAll();
       $rutinas = RutinaManager::getAll();


     /*echo '<pre>';
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
     echo '</pre>';*/


     //SINO AL INICIO
     }else{
       //header('Location: principal.php');
       //die();
     }
   }else{
     header('Location: principal.php');
     die();
   }
?>
<style media="screen">
  img{
    background-color: white;
    width: 70px;
    height: 75px;
  }
</style>

<div> <h2>Usuarios</h2>
  <div>
    <div class="usuarios">
  <table border="1px">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Contraseña</th>
        <th>Email</th>
        <th>Imagen</th>
        <th>Rol</th>
        <th>Cambiar Rol</th>
        <th>Borrar Usuario</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($usuarios as $fila) { ?>
    <tr>
      <!--<td>
        <a href="/perfilPublico.php?id_user=<?=$fila['ID']?>">
          <img id=fotoPerfilUser src="imgs/<?=$fila['ID']?>/<?=$fila['foto']?>" alt="">
        </a>
      </td>-->
      <td><?=$fila['ID']?></td>
      <td><?=$fila['NOMBRE']?></td>
      <td><?=$fila['PASS']?></td>
      <td><?=$fila['EMAIL']?></td>
      <td><?=$fila['IMAGEN']?></td>
      <td><?=$fila['ROL']?></td>
      <td>
        <?php
              if($_SESSION['ID'] != $fila['ID']){
        ?>
        <a href="cambiarROL.php?id_usuario=<?=$fila['ID']?>">Cambiar Rol</a>
        <?php } ?>
      </td>
      <td>
        <?php
              if($_SESSION['ID'] != $fila['ID']){
        ?>
        <a href="borrarADMIN.php?id_usuario=<?=$fila['ID']?>"><img id="basura" src="papelera.png" alt="Borrar usuario"></a>
      <?php } ?>
    </td>
    </tr>
  <?php } ?>
  </tbody>
  </table>
  </div>
</div>


<div> <h2>Recetas</h2>
  <div>
    <div class="recetas">
  <table border="1px">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Tiempo</th>
        <th>Imagen</th>
        <th>Id_usuario</th>
        <th>Borrar Receta</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($recetas as $fila) { ?>
    <tr>
      <td><?=$fila['ID']?></td>
      <td><?=$fila['NOMBRE']?></td>
      <td><?=$fila['DESCRIPCION']?></td>
      <td><?=$fila['TIEMPO']?></td>
      <td><?=$fila['IMAGEN']?></td>
      <td><?=$fila['ID_USUARIO']?></td>
      <td>
        <a href="borrarADMIN.php?id_receta=<?=$fila['ID']?>"><img id="basura" src="imagenes/papelera.png" alt="Borrar usuario"></a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
  </table>
  </div>
</div>


<div> <h2>Ejercicios</h2>
  <div>
    <div class="ejercicios">
  <table border="1px">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Grupo Muscular</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Borrar Receta</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($ejercicios as $fila) { ?>
    <tr>
      <td><?=$fila['ID']?></td>
      <td><?=$fila['NOMBRE']?></td>
      <td><?=$fila['GRUPOMUSCULAR']?></td>
      <td><?=$fila['DESCRIPCION']?></td>
      <td><?=$fila['IMAGEN']?></td>
      <td>
        <a href="borrarADMIN.php?id_ejercicio=<?=$fila['ID']?>"><img id="basura" src="imagenes/papelera.png" alt="Borrar usuario"></a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
  </table>
  </div>
</div>



<div> <h2>Rutinas</h2>
  <div>
    <div class="rutinas">
  <table border="1px">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID_Rutina</th>
        <th>ID_Ejercicio</th>
        <th>Repetición</th>
        <th>Borrar Rutina</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($rutinas as $fila) { ?>
    <tr>
      <td><?=$fila['ID']?></td>
      <td><?=$fila['NOMBRE']?></td>
      <td><?=$fila['DIFICULTAD']?></td>
      <td><?=$fila['DESCRIPCION']?></td>
      <td>
        <a href="borrarADMIN.php?id_rutina=<?=$fila['ID']?>"><img id="basura" src="imagenes/papelera.png" alt="Borrar usuario"></a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
  </table>
  </div>
</div>
