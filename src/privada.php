<?php

if (isset($_SESSION['autentificado'] != true)) {
		header('Location: principal.php');
		die();
	}

?>
