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
			$query=mysql_fetch_array(mysql_query("SELECT * FROM usuarios WHERE idUsuarios=".$_SESSION['id']));
	?>
			<div id="wrapper-form">
				Usuario: <?php print($_SESSION['nick']) ?><br>
				<table border='1' style='text-align:Center; width:800px; border-color:red; font-size: 20px;' align='center'>
					<tr style='color:rgb(110,0,0); font-size:25px;'>
						<td>No. Ruta</td>
						<td>Medio</td>
						<td>Fecha</td>
						<td>Registrar<br>coordenadas</td>
					</tr>
	<?php
					$ruta=mysql_query("SELECT * FROM ruta, tipo_transporte 
						WHERE Tipo_Transporte_idTipo_Transporte=idTipo_Transporte
						AND Usuarios_idUsuarios=".$_SESSION['id']);
					while($registro=mysql_fetch_array($ruta))
					{
						echo "
						<tr>
							<td>".$registro['idRuta']."</td>
							<td>".$registro['Transporte']."</td>
							<td>".$registro['Fecha']."</td>
							<td><a href=ncoord.php?idr=".$registro['idRuta'].">Agregar</a></td>
						</tr>";
					}
	?>
				</table>
			</div>
	<?php
		}
		else
		{
	?>
			<img src='img/error5.jpg' alt='acción erronea'>
			<meta http-equiv="refresh" content="4;URL=index.php"/>
	<?php 
		}
	}
	else
	{
	?>
		<img src='img/error5.jpg' alt='acción erronea'>
		<meta http-equiv="refresh" content="4;URL=index.php"/>
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