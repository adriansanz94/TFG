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
  </head>
  <link rel="stylesheet" href="/css/reset.css">
<?php
      require("$ROOT/resources/templates/autentificacion.php");
      require("$ROOT/resources/templates/navegacion.php");
?>

  <body>
    <?php
        require("$ROOT/resources/templates/contenido$ruta_contenido");
     ?>

  </body>
  <?php
          require("$ROOT/resources/templates/pie.php");
  ?>

</html>
