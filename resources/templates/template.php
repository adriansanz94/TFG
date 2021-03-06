<?php
/*
Template base del proyecto para no repetir código
Son necesarias las variables
  $titulo
  $ruta_contenido
*/

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$titulo?></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="css/cssGeneral.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="JS/scroll.js"></script>
  </head>
  <body>
      <?php
          require("$ROOT/resources/templates/autentificacion.php");
          require("$ROOT/resources/templates/navegacion.php");
      ?>
      <div class="grow">
        <?php

          require("$ROOT/resources/templates/contenido$ruta_contenido");
        ?>
      </div>
      <?php
        require("$ROOT/resources/templates/pie.php");
      ?>
     </div>
    <button class='scroll botonSubir'>
            <svg class="icon" viewBox="0 0 16 16">
                <title>Flecha</title>
                <g stroke-width="1" stroke="currentColor">
                    <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="15.5,11.5 8,4 0.5,11.5 ">
                    </polyline>
                </g>
            </svg>
    </button>

  </body>
</html>
