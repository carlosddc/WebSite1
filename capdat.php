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
	<?php
	if (isset($_SESSION['id']))
	{
		if ($_SESSION['login']==0)
		{
			//$query=mysql_fetch_array(mysql_query("SELECT * FROM usuarios WHERE idUsuarios=".$_SESSION['id']));
	?>
			<div id="wrapper-content">
				<a href="rruta.php">Crear ruta nueva</a><br>
				<a href="msgcoord.php">Agregar coordenadas a ruta actual</a><br>
			</div>
	<?php
		}
		else
		{
	?>
			<img src='img/error5.jpg' alt='acción erronea'>
			<meta http-equiv="refresh" content="3;URL=index.php"/>
	<?php 
		}
	}
	else
	{
	?>
		<img src='img/error2.jpg' alt='acción erronea'>
		<meta http-equiv="refresh" content="3;URL=index.php"/>
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