<!DOCTYPE HTML>
<html>
<?php
	require 'func.php';
	conecta();
?>
<head>
	<link rel="stylesheet" type="text/css" href="plantilla.css">
	
	<style>
	#wrapper-form
	{
		text-align:left;
		width:50%;
		height:180px;
		margin:0 auto;
		padding:20px 0px 0px 0px;
		float:left;
	}
	</style>
	<script src="script.js"></script> 
</head>
<body>
<div id="wrapper-main">
	<div id="wrapper-form">
		<form name="registro" action="reg_bd.php" onsubmit="return validar()" method="POST">
			Nickname: <input type="text" name="nick" maxlength="50"><br>
			Nombre(s): <input type="text" name="nombre" maxlength="45"><br>
			Apellidos: <input type="text" name="apellido" maxlength="45"><br>
			Contraseña: <input type="password" name="pass" maxlength="45"><br>
			Confirmar Contraseña: <input type="password" name="cpass" maxlength="45"><br>
			Correo: <input type="text" name="correo" maxlength="45"><br>
	</div>
	<div id="wrapper-form">
			Sexo:<br>
				<input type="radio" name="sexo" value=1 checked>Masculino<br>
				<input type="radio" name="sexo" value=2>Femenino<br>
			Nacimiento: <?php  fecha_nac() ?><br>
			<input type="hidden" name="status" value="1">
			<input type="hidden" name="tipo" value="1">
			Ciudad:
				<select name='sel_cd'>
					<?php 					
						$ciudad=mysql_query("SELECT * FROM Ciudad ORDER BY Ciudad");
						while($resc=mysql_fetch_array($ciudad))
						{
							echo "<option value='".$resc['idCiudad']."'>".$resc['Ciudad']."</option>";
						}
					?>
				</select>
				<br>
	</div>
	<div style="margin: 0 auto; text-align:center; height:200px; width:600px; font: 12px helvetica,arial,sans-serif; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; background-color: white;">
			Términos de servicio
	</div>
	<div id="wrapper-content">
			<input id="term" type="checkbox" name="terminos" value="acepto">He leído y acepto los términos de servicio</input><br>
			<input type='submit' name='Registrar' value='Registrar'></input>
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