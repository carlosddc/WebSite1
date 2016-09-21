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
		function vfcoord()
		{
			var glat=document.form_coord.glat.value; 
			var mlat=document.form_coord.mlat.value;
			var slat=document.form_coord.slat.value;
			var glong=document.form_coord.glong.value;
			var mlong=document.form_coord.mlong.value;
			var slong=document.form_coord.slong.value;
			if (glat==null||glat=="")
			{
				window.alert ("Campo en blanco");
				document.form_coord.glat.focus();
				return false;
			}
			if (glat>90||glat<0)
			{
				window.alert ("Grados no válidos. Rango: 0-90");
				document.form_coord.glat.focus();
				return false;
			}
			if (mlat==null||mlat=="")
			{
				window.alert ("Campo en blanco");
				document.form_coord.mlat.focus();
				return false;
			}
			if (mlat>=60||mlat<0)
			{
				window.alert ("Minutos no válidos. Rango: 0-59");
				document.form_coord.mlat.focus();
				return false;
			}
			if (slat==null||slat=="")
			{
				window.alert ("Campo en blanco");
				document.form_coord.slat.focus();
				return false;
			}
			if (slat>=60||slat<0)
			{
				window.alert ("Segundos no válidos. Rango: 0-59");
				document.form_coord.slat.focus();
				return false;
			}
			if (glong==null||glong=="")
			{
				window.alert ("Campo en blanco");
				document.form_coord.glong.focus();
				return false;
			}
			if (glong>180||glong<0)
			{
				window.alert ("Grados no válidos. Rango: 0-180");
				document.form_coord.glong.focus();
				return false;
			}
			if (mlong==null||mlong=="")
			{
				window.alert ("Campo en blanco");
				document.form_coord.mlong.focus();
				return false;
			}
			if (mlong>=60||mlong<0)
			{
				window.alert ("Segundos no válidos. Rango: 0-59");
				document.form_coord.mlong.focus();
				return false;
			}
			if (slong==null||slong=="")
			{
				window.alert ("Campo en blanco");
				document.form_coord.slong.focus();
				return false;
			}
			if (slong>=60||slong<0)
			{
				window.alert ("Segundos no válidos. Rango: 0-59");
				document.form_coord.slong.focus();
				return false;
			}
			else
			{
				document.form_coord.submit();
				return true;
			}
		}
	</script>
	
</head>
<body>

<div id="wrapper-main">
	<?php
	
	if (isset($_SESSION['id'])&&isset($_POST['Registrar']))//verifica exista sesión iniciada y se haya llenado un formulario con anterioridad
	{
		$query=mysql_fetch_array(mysql_query("SELECT Usuarios_idUsuarios FROM ruta WHERE idRuta=".$_POST['idr']));//Obtiene id usuario de la ruta en uso
		if ($_SESSION['id']==$query['Usuarios_idUsuarios']&&$_POST['Registrar']=='Registrar')//verifica que se trate del usuario correcto
		{
	?>
			<div id="wrapper-form">
				<form name="form_coord" action="rcoord.php" onsubmit="return vfcoord()" method="POST">
					Usuario: <?php print($_SESSION['nick']) ?><br>
					Ruta actual: #<?php print($_POST['idr']) ?><br>
					Latitud: 
					<input type="text" name="glat" maxlength="3" size="3">º 
					<input type="text" name="mlat" maxlength="2" size="3">" 
					<input type="text" name="slat" maxlength="9" size="3">' 
					<br>
					Longitud:
					<input type="text" name="glong" maxlength="3" size="3">º 
					<input type="text" name="mlong" maxlength="2" size="3">" 
					<input type="text" name="slong" maxlength="9" size="3">' 
					<br>
					<?php hora(); ?>
					<input type="hidden" name="idr" value="<?php print($_POST['idr']) ?>">
					<p class="center"><input type='submit' name='Registrar' value='Registrar'><p>
				</form>
			</div>
	<?php
		}
		else
		{
			if ($_POST['Registrar']=='No registrar')
			{
	?>
			<h1>Fin de registro de coordenadas</h1>
			<meta http-equiv="refresh" content="2;URL=index.php"/>
	<?php
			}
			else
			{
	?>
			<img src='img/error2.jpg' alt='acción erronea'>
			<meta http-equiv="refresh" content="4;URL=index.php"/>
	<?php 
			}
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