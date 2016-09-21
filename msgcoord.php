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
			$query=mysql_fetch_array(mysql_query("SELECT MAX(idRuta) FROM ruta WHERE Usuarios_idUsuarios=".$_SESSION['id']));
			$ruta=mysql_query("SELECT * FROM ruta, coordenadas, latitud lt, longitud lg 
				WHERE Usuarios_idUsuarios=".$_SESSION['id']." AND idRuta=".$query[0]."
				AND idRuta=Ruta_idRuta AND idCoordenadas=lt.coordenadas_idCoordenadas AND idCoordenadas=lg.coordenadas_idCoordenadas ");
	?>
			<div id="wrapper-content">
				Usuario: <?php print($_SESSION['nick']) ?><br>
				Ruta actual: #<?php print($query[0]) ?><br>
				Coordenadas registradas:<br>
				<table border='1' style='text-align:Center; width:800px; border-color:red; font-size: 20px;' align='center'>
				<tr>
					<td>Latitud</td>
					<td>Longitud</td>
				</tr>
				<?php 
				while ($coord=mysql_fetch_array($ruta))
				{
					echo "
						<tr>
							<td>".$coord['ltGrados']."º ".$coord['ltMinutos']."' ".$coord['ltSegundos']."\"</td>
							<td>".$coord['lgGrados']."º ".$coord['lgMinutos']."' ".$coord['lgSegundos']."\"</td>
						</tr>";
				}
				?>
				</table>
				<form method='POST' action='ncoord.php'>
					<input type="hidden" name="idr" value="<?php print($query[0]) ?>">
					<input type='submit' name='Registrar' value='Registrar'>
				</form>
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