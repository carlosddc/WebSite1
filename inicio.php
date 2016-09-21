<!DOCTYPE html>
<?php
require 'func.php';
conecta();
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="plantilla.css">
</head>
<body>

<div id="wrapper-main">
	
	<div id="wrapper-content">
		<a href="registro.php">sign-in</a>
	</div>
	<div id="wrapper-content">
		<a href="tlog.php">log-in</a>
	</div>
	
	<div id="wrapper-bottom">
	<ul>
		<li><a href="acerca.php">Acerca de</a></li>
		<li><a href="pdp.php">Politícas de privacidad</a></li>
		<li><a href="compartir.php">Compartir</a></li>
	</ul>
</div>
	
</div>

</body>
</html>