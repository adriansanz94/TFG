<?php

$config = [
  'site' => 'Proyecto',
  'title' => 'Estructura de proyecto web',
  'content' => 'Estructura de proyecto web',
  'content_text' => 'Información sacada del config',
  'db_engine' => 'mysql',
  //'db_file' => 'resources/test.sqlite3',
  'db_user' => 'admintfg',
  'db_pass' => 'admintfg',
  'db_name' => 'tfg',
  'ruta_defecto' => '/principal.php',
  'mail_password' => 'cámbiala',
  'mail_correo' => 'miCorreo',
  'mail_server' => 'server',
  'img_path' => '/uploaded/images',
  'img_in_url' => '/images',
  'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN",
  'oauth_access_token_secret' => "YOUR_OAUTH_ACCESS_TOKEN_SECRET",
  'consumer_key' => "YOUR_CONSUMER_KEY",
  'consumer_secret' => "YOUR_CONSUMER_SECRET",
];

require 'configuracion.privada.php';

spl_autoload_register(function ($name){
  global $ROOT;
  if(file_exists($class_file = "$ROOT/src/$name.php")){
    require($class_file);
  }else{
    if(file_exists($class_file = "$ROOT/src/Manager/$name.php")){
      require($class_file);
    }
  }

  if(file_exists($class_file = "$ROOT/uploaded/images")){

  }else{
    mkdir("$ROOT/uploaded/images",0777,true);
  }
});
?>
