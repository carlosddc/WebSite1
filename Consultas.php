<!DOCTYPE html>
<?php/*
require 'func.php';
conecta();
session_start();*/
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="plantilla.css">
</head>
<body>
<div id="wrapper-top">
<ul>
<li><a href="inicio.php">Inicio</a></li>
<li><a href="login.html">Iniciar sesión</a></li>
</ul>
</div>
<div id="wrapper-content">

	<?php
	
	?>
<form method='POST' action='consulta_res.php'>
	<div id="age">
		Edad<br>
		<input name="ed_min" maxlength="3" size="3"></input>
		<input name="ed_max" maxlength="3" size="3"></input>
	</div>
	<div id="sex">
		<p style="text-align:center; margin:0px">Sexo</p>
		<input type='radio' name='sexo' value=0>Ambos<br>
		<input type='radio' name='sexo' value=1>Masculino<br>
		<input type='radio' name='sexo' value=2>Femenino<br>
	</div>
	<div id="city">
		Ciudad<br>
		<select name='sel_cd'>
			<option value="0">- Cualquiera -</option>;
			<option value="1">Querétaro</option>;
			<option value="2">Colón</option>;
			<option value="3">Cadereyta</option>;
			<option value="4">San Juan del Río</option>;
		</select>
	</div>
	
	<div id="transport">
		Medio de transporte<br>
		<select name='sel_tt'>
			<option value="0">- Cualquiera -</option>;
			<option value="1">Bicicleta</option>;
			<option value="2">Automovil</option>;
			<option value="3">A pie</option>;
			<option value="4">Motocicleta</option>;
		</select>
	</div>
	<div>
		<input type='submit' name='enviar' value='Buscar'></input>
	</div>
</form>
</div>
<div id="wrapper-bottom">
<ul>
<li><a href="inicio.php">Enlace 1</a></li>
<li><a href="login.html">Enlace 2</a></li>
</ul>
</div>
</body>
</html>
