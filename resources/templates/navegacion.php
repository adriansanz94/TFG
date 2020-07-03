<?php

$uri = $_SERVER['REQUEST_URI'];
//ubtenemos id del usuario
if(isset($_GET['ID'])){
  $id = intval($_GET['ID']);

}

//token

?>
<link rel="stylesheet" href="css/header.css">
<header>
  <a href="listadoHashtag.php">
  <img src="imagenes/hashtag.png" alt="logo de la empresa"></a>

  <div>
    <h3 class="color">Encuentra tu hashtag</h3>
  </div>
  <nav>
    <ul>
        <li><a href="listadoHashtag.php">Inicio</a></li>
      <?php if(isset($_SESSION['autentificado']) && $_SESSION['autentificado'] == true ){ ?>
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="listadoHashtag.php?cerrarSesion=true"  id='perfil'>Logout</a></li>
        <li><a href="administrador.php">Admin</a></li>
      <?php } elseif($uri != '/login.php'){?>
        <li><a href="login.php">Login</a></li>
      <?php }?>
        <li><a href="paginaajax.php">AJAX</a></li>
    </ul>
  </nav>
</header>
