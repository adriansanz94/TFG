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
  <!-- <link rel="stylesheet" href="/css/principal.css">  // Esto jode todo el rato, ya que se aplica a todas las paginas
-->
<?php
      require("$ROOT/resources/templates/autentificacion.php");
      require("$ROOT/resources/templates/navegacion.php");
?>

  <body>
    <?php
        require("$ROOT/resources/templates/contenido$ruta_contenido");
     ?>
     <script>

     </script>
  </body>
  <?php
          require("$ROOT/resources/templates/pie.php");
  ?>

</html>
