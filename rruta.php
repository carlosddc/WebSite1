<!DOCTYPE html>
<?php
require 'func.php';
conecta();
session_start();
?>
<html>
<head>
	<script src="script.js"></script> 
	<link rel="stylesheet" type="text/css" href="plantilla.css">
	<style>
		#wrapper-form
		{
			text-align:center;
			width:100%;
			margin:0 auto;
			padding:20px 100px 0px 200px;
			float:center;
		}
		form
		{
			width:50%;
			text-align:left;
		}
	</style>
	<script>
	function form_mod ()//verifica se haya elegido un mes válido
	{
		var mes=document.form_ruta.mes.value; 
		if (mes==0)
		{
			alert ("Elegir una fecha válida");
			document.form_ruta.mes.focus();
			return false;
		}
		else
		{
			document.form_ruta.submit();
			return true;
		}
	}
	</script>
	
</head>
<body>

<div id="wrapper-main">
	<?php
	if (isset($_SESSION['id']))//verifica exista sesión iniciada
	{
		if ($_SESSION['login']==0)//verifica sea un usuario
		{
			//$query=mysql_fetch_array(mysql_query("SELECT * FROM usuarios WHERE idUsuarios=".$_SESSION['id']));
	?>
			<div id="wrapper-form">
				<form name="form_ruta" action="nruta.php" onsubmit="return form_mod()" method="POST">
					<i>Aviso: No se puede agregar coordenadas nuevas a una ruta anterior. Al registrar una nueva ruta, las siguientes coordenadas irán a esa nueva ruta.</i><br>
					Usuario: <?php print($_SESSION['nick']) ?><br>
					Tipo de transporte usado: 
					<select name='sel_tt'>
						<?php
							$transp=(mysql_query("SELECT * FROM Tipo_Transporte ORDER BY Transporte"));
							while($tipo=mysql_fetch_array($transp))
							{
								echo "<option value='".$tipo['idTipo_Transporte']."'>".$tipo['Transporte']."</option>";
							}
						?>
					</select><br>
					Fecha: <?php fecha_nac(); ?>
					<p class="center"><input type='submit' name='Registrar' value='Registrar'><p>
				</form>
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
		<img src='img/error2.jpg' alt='acción erronea'>
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