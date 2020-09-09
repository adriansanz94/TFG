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
    <title><?=$titulo?></title>
  </head>
  <link rel="stylesheet" href="/css/principal.css">
  <body>
    <?php
        require("$ROOT/resources/templates/autentificacion.php");
        require("$ROOT/resources/templates/navegacion.php");
        require("$ROOT/resources/templates/contenido$ruta_contenido");
        require("$ROOT/resources/templates/pie.php");
     ?>
     <script>

     </script>
  </body>
</html>
