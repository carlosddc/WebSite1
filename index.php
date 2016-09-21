<!DOCTYPE html>
<?php
require 'func.php';
session_start();
conecta();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="plantilla.css">
<style>
#wrapper-data
{
	width: 200px;
	height:30px;
	float:left;
	margin:0 auto;
	padding:0px;
	text-align:left;
}
#wrapper-data a
{
	border-style: none;
	padding:0px;
	margin:0 auto;
}
</style>
</head>
<body>

<div id="wrapper-main">
	<?php 
	if (!isset($_SESSION['id']))
	{
	?>
		<div id="wrapper-content">
			<a href="registro.php">sign-in</a>
		</div>
		<div id="wrapper-content">
			<a href="tlog.php">log-in</a>
		</div>
	<?php
	}
	else
	{
	?>
				
		<div id="wrapper-data">
			<a href="capdat.php">Capturar datos</a>
		</div>
		<div id="wrapper-data"></a>
			<a href="misdatos.php">Consultar datos</a>
		</div>
		<div id="wrapper-data">
			<a href="salir.php">Cerrar sesion</a>
		</div>
		<div id="wrapper-data">
			<a href="mod_pf.php">Modificar perfil</a>
		</div>
		
	<?php 
	}
	?>
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