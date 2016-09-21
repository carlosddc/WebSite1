<?php
	require 'func.php';
	conecta();
	session_start();
	
	if(isset($_POST['Registrar'])&&isset($_SESSION['id']))//verifica exista sesión iniciada y se haya llenado un formulario
	{
		if ($_SESSION["login"]!=0)//verifica sea un usuario
		{//Caso no sea un usuario
			echo "<img src='img/error5.jpg' alt='acción erronea'>";
			echo '<meta http-equiv="refresh" content="6;URL=index.php"/>';
		}
		else
		{//Caso sea un usuario
			$fecha=$_POST['anyo']."-".$_POST['mes']."-".$_POST['dia'];//crea string para formato de fecha
			$query="INSERT INTO Ruta
				(Usuarios_idUsuarios,Tipo_Transporte_idTipo_Transporte,Fecha) 
				VALUES ('".$_SESSION['id']."','"
				.$_POST['sel_tt']."','"
				.$fecha."');";
			$res=mysql_query($query);
			if(!$res)
			{
				echo mysql_error();
			}
			else
			{
				echo "<img src='img/imagen1.jpg' width=70% height=70% alt='registro'>";
			}
		}
		echo '<meta http-equiv="refresh" content="3;URL=index.php"/>';
	}
	else
	{
		echo "<img src='img/error2.jpg' alt='acción erronea'>";
		echo '<meta http-equiv="refresh" content="6;URL=index.php"/>';
	}
?>