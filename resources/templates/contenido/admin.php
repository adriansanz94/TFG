<?php

  //OBTENER ID del USER
   if ( isset($_SESSION['ID']) ){
     $id = $_SESSION['ID'];
     $user = UsuarioManager::getByID($id);

     //SI es ADMIN
     if( isset($user) && $user['ROL'] === 'ADMIN') {
       $usuarios = UsuarioManager::getAll();
       $recetas = RecetaManager::getAll();
       $ejercicios = EjercicioManager::getAll();
       $rutinas = RutinaManager::getAll();
       //Obtenemos todos los datos de la BBDD
     }
     //SINO AL INICIO
   }else{
     header('Location: principal.php');
     die();
   }
?>
<div class="tablas">
  <div>
    <h2>Usuarios</h2>
    <div>
      <div class="tablaUsuarios">
    <table border="1px">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th class="ocultar">Email</th>
          <th class="ocultar">Imagen</th>
          <th>Rol</th>
          <th>Cambiar Rol</th>
          <th>Borrar Usuario</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($usuarios as $fila) { ?>
      <tr>
        <td><?=$fila['ID']?></td>
        <td><?=$fila['NOMBRE']?></td>
        <td class="ocultar"><?=$fila['EMAIL']?></td>
        <td class="ocultar"><?=$fila['IMAGEN']?></td>
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
          <a href="borrarADMIN.php?id_usuario=<?=$fila['ID']?>"><img id="basura" src="imagenes/papelera.png"></a>
        <?php } ?>
      </td>
      </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>
  </div>


  <div>
    <h2>Recetas</h2>
    <div>
      <div class="tablaRecetas">
    <table border="1px">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th class="ocultar">Descripcion</th>
          <th class="ocultar">Tiempo</th>
          <th class="ocultar">Imagen</th>
          <th>Id_usuario</th>
          <th>Borrar Receta</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($recetas as $fila) { ?>
      <tr>
        <td><?=$fila['ID']?></td>
        <td><?=$fila['NOMBRE']?></td>
        <td class="ocultar"><?=$fila['DESCRIPCION']?></td>
        <td class="ocultar"><?=$fila['TIEMPO']?></td>
        <td class="ocultar"><?=$fila['IMAGEN']?></td>
        <td><?=$fila['ID_USUARIO_RECETA']?></td>
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
      <div class="tablaEjercicios">
    <table border="1px">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th class="ocultar">Grupo Muscular</th>
          <th class="ocultar">Descripcion</th>
          <th class="ocultar">Imagen</th>
          <th>Borrar Receta</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($ejercicios as $fila) { ?>
      <tr>
        <td><?=$fila['ID']?></td>
        <td><?=$fila['NOMBRE']?></td>
        <td class="ocultar"><?=$fila['GRUPOMUSCULAR']?></td>
        <td class="ocultar"><?=$fila['DESCRIPCION']?></td>
        <td class="ocultar"><?=$fila['IMAGEN']?></td>
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
      <div class="tablaRutinas">
    <table border="1px">
      <thead>
        <tr>
          <th>ID</th>
          <th>ID_Rutina</th>
          <th>ID_Ejercicio</th>
          <th>Borrar Rutina</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($rutinas as $fila) { ?>
      <tr>
        <td><?=$fila['ID']?></td>
        <td><?=$fila['NOMBRE']?></td>
        <td><?=$fila['DIFICULTAD']?></td>
        <td>
          <a href="borrarADMIN.php?id_rutina=<?=$fila['ID']?>"><img id="basura" src="imagenes/papelera.png" alt="Borrar usuario"></a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>
  </div>
</div>
