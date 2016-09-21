<?php
	require 'func.php';
	conecta();
	session_start();
	
	if(isset($_POST['Registrar'])&&isset($_SESSION['id']))//verifica que exista una sesión abierta y que se haya llenado un formulario
	{
		if ($_SESSION["login"]==0)//verifica el tipo de sesión
		{
			$tabla="usuarios";
			$idT="idUsuarios";
		}
		else
		{
			$tabla="analista";
			$idT="idAnalista";
		}
		if (!empty($_POST['correo'])&&$_POST['correo']!=null)//Verifica el caso de que se haya llenado el campo de correo
		{
			$query="UPDATE ".$tabla." 
			SET Correo='".$_POST['correo']."'
			WHERE ".$idT."=".$_SESSION['id'].";";
			$ejec=mysql_query($query);
			if(!$ejec)
			{
				echo mysql_error();
			}
			else
			{
				echo "Correo cambiado<br>";//Notifica que se cambio la dirección de correo
			}
		}
		if (!empty($_POST['pass'])&&$_POST['pass']!=null)//Verifica el caso de que se haya llenado el campo de contraseñas
		{
			if($_POST['pass']==$_POST['cpass'])//Comprueba que la confirmación de contraseña sea igual
			{
				$query="UPDATE ".$tabla." 
				SET Contrasenya='".MD5($_POST['pass'])."'
				WHERE ".$idT."=".$_SESSION['id'].";";
				$ejec=mysql_query($query);
				if(!$ejec)
				{
					echo mysql_error();
				}
				else
				{
					echo "Contraseña cambiada";//Notifica que se cambio la contraseña
				}
			}
			else
			{
				echo "Las contraseñas no coinciden";//Notifica el error de contraseñas
			}
		}
		echo '<meta http-equiv="refresh" content="6;URL=index.php"/>';//Reenvía a la página de inicio
	}
	else
	{
		echo "<img src='img/error2.jpg' alt='acción erronea'>";//En caso de que sea una acción no permitida
		echo '<meta http-equiv="refresh" content="6;URL=index.php"/>';//Reenvía a la página de inicio
	}
?>