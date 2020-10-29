<?php

$uri = $_SERVER['REQUEST_URI'];
//obtenemos id del usuario
if(isset($_GET['ID'])){
  $id = intval($_GET['ID']);
}

$admin = "ADMIN";

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

//token

?>
<link rel="stylesheet" href="/css/principal.css">
<header>
  <a href="principal.php">
  <img src="imagenes/logo.png" alt="logo de la empresa" id="logo"></a>

  <div>
    <h3 class="color">Ponte En Forma </h3>
  </div>
  <nav>
    <ul>
        <li><a href="principal.php">Inicio</a></li>
      <?php if(isset($_SESSION['autentificado']) && $_SESSION['autentificado'] == true ){ ?>
        <li><a href="configuracionUsuario.php">Configuración</a></li>
      <?php if(isset($_SESSION['ROL']) && $_SESSION['ROL'] == $admin ){ ?>
        <li><a href="admin.php">Admin</a></li>
      <?php }?>
        <li><a href="subirReceta.php">Subir Receta</a></li>
        <li><a href="subirRutina.php">Subir Rutina</a></li>
        <li><a href="principal.php?cerrarSesion=true"  id='perfil'>Logout</a></li>
      <?php } elseif($uri != '/login.php'){?>
        <li><a href="login.php">Login</a></li>
      <?php }?>
    </ul>
  </nav>
</header>
