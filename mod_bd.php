<?php
	require 'func.php';
	conecta();
	session_start();
	
	if(isset($_POST['Registrar'])&&isset($_SESSION['id']))//verifica que exista una sesi�n abierta y que se haya llenado un formulario
	{
		if ($_SESSION["login"]==0)//verifica el tipo de sesi�n
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
				echo "Correo cambiado<br>";//Notifica que se cambio la direcci�n de correo
			}
		}
		if (!empty($_POST['pass'])&&$_POST['pass']!=null)//Verifica el caso de que se haya llenado el campo de contrase�as
		{
			if($_POST['pass']==$_POST['cpass'])//Comprueba que la confirmaci�n de contrase�a sea igual
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
					echo "Contrase�a cambiada";//Notifica que se cambio la contrase�a
				}
			}
			else
			{
				echo "Las contrase�as no coinciden";//Notifica el error de contrase�as
			}
		}
		echo '<meta http-equiv="refresh" content="6;URL=index.php"/>';//Reenv�a a la p�gina de inicio
	}
	else
	{
		echo "<img src='img/error2.jpg' alt='acci�n erronea'>";//En caso de que sea una acci�n no permitida
		echo '<meta http-equiv="refresh" content="6;URL=index.php"/>';//Reenv�a a la p�gina de inicio
	}
?>