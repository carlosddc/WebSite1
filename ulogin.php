<!DOCTYPE HTML>
<html>
<?php
	require 'func.php';
	conecta();
?>
<head>
	<link rel="stylesheet" type="text/css" href="plantilla.css">
	<script src="script.js"></script> 
</head>
<body>
<div id="wrapper-main">
	<div id="wrapper-content">
		<form name="logueo" action="session.php" onsubmit="return llenado()" method="POST">
			Nickname: <input type="text" name="nick" maxlength="50"><br>
			Contraseña: <input type="password" name="pass" maxlength="45"><br>
			<input type="hidden" name="tipo" value="0">
			<input type='submit' name='enviar' value='enviar'></input>
		</form>
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