<?php

if (isset($_SESSION['autentificado'] != true)) {
		header('Location: inicio.php');
		die();
	}

?>
