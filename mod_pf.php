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
	function form_mod ()//Verica que las contraseñas sean iguales
	{
		var pass=document.form.pass.value; 
		var cpass=document.form.cpass.value;
		if (pass!=cpass)
		{
			window.alert ("Contraseñas no coinciden");
			document.form.cpass.focus();
			return false;
		}
		else
		{
			document.form.submit();
			return true;
		}
	};
	</script>
	
</head>
<body>

<div id="wrapper-main">
	<?php 
	if (isset($_SESSION['id']))//verifica que se haya iniciado sesión
	{
		if ($_SESSION['login']==0)//identifica el tipo de sesión
		{//En caso de ser un usuario
			$tabla="usuarios";
			$idT="idUsuarios";
		}
		else
		{//En caso de ser un analista
			$tabla="analista";
			$idT="idAnalista";
		}
		//$query=mysql_fetch_array(mysql_query("SELECT * FROM ".$tabla." WHERE ".$idT."=".$_SESSION['id']));//Obtiene los datos de registro según el id
	?>
		<div id="wrapper-form">
			<form name="form_mod" action="mod_bd.php" onsubmit="return form_mod()" method="POST">
				Usuario: <?php print($_SESSION['nick']) ?><br>
				Cambiar Contraseña: <input type="password" name="pass" maxlength="45"><br>
				Confirmar Contraseña: <input type="password" name="cpass" maxlength="45"><br>
				Cambiar Correo: <input type="text" name="correo" maxlength="45"><br>
				<p class="center"><input type='submit' name='Registrar' value='Registrar' onclick="return form_mod()"><p>
			</form>
		</div>
	<?php
	}
	else
	{
	?>
		<div id="wrapper-content">
			<h1>Es necesario iniciar sesión</h1>
		</div>
		<div id="wrapper-content">
			<a href="registro.php">sign-in</a>
		</div>
		<div id="wrapper-content">
			<a href="tlog.php">log-in</a>
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