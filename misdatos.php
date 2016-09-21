<!DOCTYPE html>
<?php
require 'func.php';
session_start();
conecta();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="plantilla.css">
	<script type="text/javascript" src="grafica/canvasjs.min.js"></script> <!-- Script de la gráfica -->
	<script type="text/javascript">
	<?php
		if (!isset($_POST['anual']))//si se uso el formulario
		{
			$rest="";
		}
		else
		{//filtrado por fecha, haciendo el 0 un "comodín"
			if ($_POST['anual']==0)
			{
				$anual=">0";
			}
			else
			{
				$anual="=".$_POST['anual'];
			}
			if ($_POST['mensual']==0)
			{
				$mensual=">0";
			}
			else
			{
				$mensual="=".$_POST['mensual'];
			}
			if ($_POST['diario']==0)
			{
				$diario=">0";
			}
			else
			{
				$diario="=".$_POST['diario'];
			}
			$rest="AND DAYOFWEEK(Fecha)".$diario." AND MONTH(Fecha)".$mensual." AND YEAR(Fecha)".$anual;//filtrado agregado en el WHERE de la consulta
		}
		$ruta=mysql_query("SELECT * 
			FROM ruta, coordenadas, latitud lt, longitud lg 
			WHERE Usuarios_idUsuarios=".$_SESSION['id']." 
			".$rest." 
			AND idRuta=Ruta_idRuta AND idCoordenadas=lt.coordenadas_idCoordenadas AND idCoordenadas=lg.coordenadas_idCoordenadas");
		$ic=0;//cantidad de filas o coordenadas de la consulta
		$n=0;//variable usada más adeltante junto a $ic, fungirá para determinar la cantidad de rutas y también la coordenada en uso
		while ($coord[]=mysql_fetch_assoc($ruta))
		{
			$ic++;
		}
		$ir=$coord[0]['Ruta_idRuta'];//primer id de la ruta que corresponde al usuario según la consulta
	?>
	
	window.onload = function Graph()
		{
			chart = new CanvasJS.Chart("chartContainer", 
			{            
				title:
				{
					text: "Rutas"              
				},
				data: 
				[   
					<?php
						for(;$n<$ic;)
						{
					?>
							{
								type: "line",
								dataPoints: 
								[
									<?php
										for(;$coord[$n]['Ruta_idRuta']==$ir;$n++)
										{
											$lng=$coord[$n]['lgGrados']+($coord[$n]['lgMinutos']/60)+($coord[$n]['lgSegundos']/60);
											$lat=$coord[$n]['ltGrados']+($coord[$n]['ltMinutos']/60)+($coord[$n]['ltSegundos']/60);
											echo "{ x: ".$lng.", y: ".$lat."},";
										}
									?>
								],
							},
					<?php
							//$ir++;
							$ir=$coord[$n]['Ruta_idRuta'];
						}
					?>
				],    
			});
			chart.render();
		}
	</script>
	
<style>
#wrapper-data
{
	width: 800px;
	float:center;
	margin:0 auto;
	padding:0px;
	text-align:left;
}
</style>
</head>
<body>

<div id="wrapper-data">
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
		if ($_SESSION['login']==0)
		{
			//print_r($_POST);
			//echo "<br>".$rest;
	?>
			<br>
			<div id="chartContainer" style="height: 600px; width: 100%;">
			</div>
			<div style="text-align:center;">
				<form name="SelDatos" action="misdatos.php" method="POST">
					<select id="anual" name="anual"> 
						<option value=0>-- Siempre --</option> 
						<?php
							for ($i=date("Y");$i>2011;$i--)
							{
								echo "<option value=".$i.">".$i."</option> ";
							}
						?>
					</select>
					<select id="mensual" name="mensual">
						<option value=0>-- Cualquier mes --</option>
						<option value=1>Enero</option>
						<option value=2>Febrero</option>
						<option value=3>Marzo</option>
						<option value=4>Abril</option>
						<option value=5>Mayo</option>
						<option value=6>Junio</option>
						<option value=7>Julio</option>
						<option value=8>Agosto</option>
						<option value=9>Septiembre</option>
						<option value=10>Octubre</option>
						<option value=11>Noviembre</option>
						<option value=12>Diciembre</option>
					</select>
					<select id="diario" name="diario">
						<option value=0>-- Diario ---</option>
						<option value=1>Domingo</option>
						<option value=2>Lunes</option>
						<option value=3>Martes</option>
						<option value=4>Miércoles</option>
						<option value=5>Jueves</option>
						<option value=6>Viernes</option>
						<option value=7>Sábado</option>
					</select>
					<br>
					<button>Mostrar datos</button>
				</form>
			</div>
	<?php 
		}
		else
		{
			echo "Solo usuarios";
		}
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