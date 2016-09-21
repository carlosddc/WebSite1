<?php
	require 'func.php';
	conecta();
	session_start();
	
	if(isset($_POST['Registrar'])&&isset($_SESSION['id']))//verifica exista sesión iniciada y se haya llenado un formulario
	{
		if ($_POST['Registrar']=='Registrar')//Verifica que el usuario deseó seguir
		{
			$query=mysql_fetch_array(mysql_query("SELECT Usuarios_idUsuarios FROM ruta WHERE idRuta=".$_POST['idr']));//Obtiene id usuario de la ruta en uso
			if ($_SESSION["login"]!=0&&($_SESSION['id']!=$query['Usuarios_idUsuarios']))//verifica que se trate del usuario correcto
			{
				echo "<img src='img/error5.jpg' alt='acción erronea'>";
				echo '<meta http-equiv="refresh" content="4;URL=index.php"/>';
			}
			else
			{
				$hora=$_POST['hora'].":".$_POST['min'].":".$_POST['seg'];//crea string para el formato de hora
				$query=mysql_query("INSERT INTO coordenadas (Tiempo, Ruta_idRuta)
					VALUES ('".$hora."','"
					.$_POST['idr']."')");
				$idc=mysql_fetch_array(mysql_query("SELECT MAX(idCoordenadas) FROM coordenadas WHERE Ruta_idRuta=".$_POST['idr']));//obtiene la ultima coordenada registrada para la ruta en uso
				if(!$query)
				{
					echo mysql_error();
				}
				else
				{//Consulta SQL para realizar los registros
					$query=mysql_query("INSERT INTO latitud (ltGrados, ltMinutos, ltSegundos, coordenadas_idCoordenadas)
						VALUES (".$_POST['glat'].",
						".$_POST['mlat'].",
						".$_POST['slat'].",
						".$idc[0].");
					");
					$query=mysql_query("INSERT INTO longitud (lgGrados, lgMinutos, lgSegundos, coordenadas_idCoordenadas)
						VALUES (".$_POST['glong'].",
						".$_POST['mlong'].",
						".$_POST['slong'].",
						".$idc[0].");
					");
					if(!$query)
					{
						echo mysql_error();
					}
					else
					{//formulario que pregunta si se agregará otra coordenada
						echo "<p style='text-align:center'><img src='img/imagen1.jpg' height=70% width=70% alt='registro exitoso'>";
						echo "<h1 style='text-align:center'>¿Desea registrar otra coordenada?</h1>";
						echo  "<form style='text-align:center' method='POST' action='ncoord.php'>
							<input type='hidden' name='idr' value='".$_POST['idr']."'></input>
							<input type='submit' name='Registrar' value='Registrar'></input>
							<input type='submit' name='Registrar' value='No registrar'></input>
							</form></p>
						";
					}
				}
			}	
		}
		else
		{
			echo "<h1>Fin de registro de coordenadas</h1>";
			echo '<meta http-equiv="refresh" content="4;URL=index.php"/>';
		}
	}
	else
	{
		echo "<img src='img/error2.jpg' alt='acción erronea'>";
		echo '<meta http-equiv="refresh" content="14;URL=index.php"/>';
	}
?>