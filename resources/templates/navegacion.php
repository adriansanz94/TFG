<?php

$uri = $_SERVER['REQUEST_URI'];
//obtenemos id del usuario
if(isset($_GET['ID'])){
  $id = intval($_GET['ID']);
}

$admin = "ADMIN";


//token

?>
<link rel="stylesheet" href="/css/header.css">

<!--<header>
  <a href="principal.php">
  <img src="imagenes/logo.png" alt="logo de la empresa" id="logo"></a>

  <div>
    <h3 class="color">Ponte En Forma </h3>
  </div>
  <nav>
    <ul>
        <li><a href="principal.php">Inicio</a></li>
      <?php if(isset($_SESSION['autentificado']) && $_SESSION['autentificado'] == true ){ ?>
        <li><a href="perfil.php">Perfil</a></li>
      <?php if(isset($_SESSION['ROL']) && $_SESSION['ROL'] == $admin ){ ?>
        <li><a href="admin.php">Admin</a></li>
      <?php }?>
        <li><a href="subirReceta.php">Subir Receta</a></li>
        <li><a href="subirRutina1.php">Subir Rutina</a></li>
        <li><a href="principal.php?cerrarSesion=true"  id='perfil'>Logout</a></li>
      <?php } elseif($uri != '/login.php'){?>
        <li><a href="login.php">Login</a></li>
      <?php }?>
    </ul>
  </nav>
</header>-->

<header>
  <div id="general">
    <div id="imagenMenu">
      <a href="principal.php">
      <img src="imagenes/logo.png" alt="">
    </a>
    </div>
    <div id="texto">
      <h1>PONTE EN FORMA</h1>
    </div>
  </div>
  <p class="menu-icon"> MENÚ</p>
  <nav class="navigation">
    <ul>
      <li><a href="principal.php">Inicio</a></li>
      <?php if(isset($_SESSION['autentificado']) && $_SESSION['autentificado'] == true ){ ?>
      <li><a href="perfil.php">Perfil</a></li>
      <?php if(isset($_SESSION['ROL']) && $_SESSION['ROL'] == $admin ){ ?>
      <li><a href="admin.php">Admin</a></li>
      <?php }?>
      <li><a href="subirReceta.php">Subir Receta</a></li>
      <li><a href="subirRutina1.php">Subir Rutina</a></li>
      <li><a href="principal.php?cerrarSesion=true"  id='perfil'>Logout</a></li>
      <?php } elseif($uri != '/login.php'){?>
      <li><a href="login.php">Login</a></li>
      <?php }?>
    </ul>
  </nav>
</header>
<script type="text/javascript">

    let menuBtn = document.querySelector('p');
    let menu = document.querySelector('ul');

    console.log(menuBtn);
    console.log(menu);

    menuBtn.addEventListener('click', mostrarMenu);

    function mostrarMenu(){
      let obtenerAtributo = menu.getAttribute('class');
      console.log(obtenerAtributo);
      if(obtenerAtributo === 'show'){
        menu.removeAttribute('class');
      }else{
        menu.setAttribute('class','show');
      }
    }
</script>
