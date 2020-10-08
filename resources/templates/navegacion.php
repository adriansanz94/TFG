<?php

$uri = $_SERVER['REQUEST_URI'];
//ubtenemos id del usuario
if(isset($_GET['ID'])){
  $id = intval($_GET['ID']);

}

//token

?>
<link rel="stylesheet" href="">
<header>
  <a href="principal.php">
  <img src="imagenes/logo.png" alt="logo de la empresa"></a>

  <div>
    <h3 class="color">Fitness Club </h3>
  </div>
  <nav>
    <ul>
        <li><a href="principal.php">Inicio</a></li>
      <?php if(isset($_SESSION['autentificado']) && $_SESSION['autentificado'] == true ){ ?>
        <li><a href="configuracionUsuario.php">Configuración</a></li>
        <li><a href="principal.php?cerrarSesion=true"  id='perfil'>Logout</a></li>
        <li><a href="administrador.php">Admin</a></li>
      <?php } elseif($uri != '/login.php'){?>
        <li><a href="login.php">Login</a></li>
      <?php }?>
    </ul>
  </nav>
</header>
