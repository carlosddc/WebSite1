<?php
	require 'func.php';
	conecta();
	
	if(isset($_POST['Registrar']))//verifica que se haya enviado el formulario de registro
	{
		if ($_POST["tipo"]==0)//Dependiento del tipo, se registrará en la tabla corresponiente
		{
			$tabla="usuarios";
		}
		else
		{
			$tabla="analista";
		}
		$revision=@mysql_num_rows(mysql_query("SELECT * FROM ".$tabla." WHERE Nickname='".$_POST['nick']."' OR Correo='".$_POST['correo']."'"));
		if ($revision>0)//Verifica que no se repita nombre de usuario ni correo.
		{
			echo "<img src='img/error1.jpg' alt='Nickname o correo ya existen en la BD'>";
		}
		else
		{
			$edad=$_POST['anyo']."-".$_POST['mes']."-".$_POST['dia'];//Crea un string con el formato para fechas
			$query="INSERT INTO ".$tabla."
				(Nombre, Apellidos, Nickname, Contrasenya, Correo,
				Fecha_Nacimiento, Ciudad_idCiudad, Sexo_idSexo, Status_idStatus) 
				VALUES ('".$_POST['nombre']."','"
				.$_POST['apellido']."','"
				.$_POST['nick']."','"
				.MD5($_POST['pass'])."','"
				.$_POST['correo']."','"
				.$edad."','"
				.$_POST['sel_cd']."','"
				.$_POST['sexo']."','"
				.$_POST['status']."');";
			$res=mysql_query($query);
			if(!$res)//verifica que no haya ocurrido algún error
			{
				echo mysql_error();//en caso de error, envía un mensaje indicado cuál es el error
			}
			else
			{//Muestra un mensaje al usuario que se registraron los datos, y lo envía a la página de inicio automáticamente
				echo "<img src='img/imagen1.jpg' width=70% height=70% alt='exito en el registro'>";
				echo "<meta http-equiv='refresh' content='4;URL=index.php'/>";
			}
		}
	}
	else
	{//Este mensaje indica cuando se comete una acción no permitida
		echo "<img src='img/error2.jpg' alt='acción erronea'>";
		echo '<meta http-equiv="refresh" content="6;URL=index.php"/>';
	}
?>