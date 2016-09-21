<!DOCTYPE html>
<?php
require 'func.php';
session_start();
conecta();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="plantilla.css">
</head>
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
<body>

<div id="wrapper-data">
	<?php 
	if (!isset($_SESSION['id']))//verifica que exista una sesión
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
			<div style="text-align:center;">
				<form name="SelDatos" action="datos.php" method="POST">
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
					<select name='sel_cd'>
						<option value=0>-- Cualquier ciudad --</option>
						<?php 					
							$ciudad=mysql_query("SELECT * FROM Ciudad ORDER BY Ciudad");
							while($resc=mysql_fetch_array($ciudad))
							{
								echo "<option value='".$resc['idCiudad']."'>".$resc['Ciudad']."</option>";
							}
						?>
					</select>
					<select name='sel_tt'>
						<option value=0>-- Cualquier vehículo --</option>
						<?php 					
							$ciudad=mysql_query("SELECT * FROM tipo_transporte ORDER BY transporte");
							while($resc=mysql_fetch_array($ciudad))
							{
								echo "<option value='".$resc['idTipo_Transporte']."'>".$resc['Transporte']."</option>";
							}
						?>
					</select>
					<select name='sel_sx'>
						<option value=0>-- Cualquier sexo --</option>
						<?php 					
							$ciudad=mysql_query("SELECT * FROM sexo ORDER BY Sexo");
							while($resc=mysql_fetch_array($ciudad))
							{
								echo "<option value='".$resc['idSexo']."'>".$resc['Sexo']."</option>";
							}
						?>
					</select>
					<br>
					Rango de edades<br>
					<input type="text" name="ed_min" maxlength="3" size="3" value=0>
					<input type="text" name="ed_max" maxlength="3" size="3" value=100>
					<br>
					<button>Mostrar datos</button>
				</form>
			</div>
	<?php 
		}
		else
		{
			echo "Solo analistas";
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