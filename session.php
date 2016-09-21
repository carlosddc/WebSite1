<!DOCTYPE html>
<?php
require 'func.php';
conecta();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="plantilla.css">
<body>

<div id="wrapper-main">
	<div id="wrapper-content">	
		<?php
			if(isset($_POST['enviar']))//verifica que exista un formulario con anterioridad
			{
				if ($_POST["tipo"]==0)//Verifica que tipo de sesión se abrirá: 0=usuario, 1=analista
				{
					$query=mysql_query("SELECT idUsuarios, Nickname, Contrasenya FROM usuarios WHERE Nickname='".$_POST['nick']."' AND Contrasenya='".md5($_POST['pass'])."'");
				}
				else
				{
					$query=mysql_query("SELECT idAnalista, Nickname, Contrasenya FROM analista WHERE Nickname='".$_POST['nick']."' AND Contrasenya='".md5($_POST['pass'])."'");
				}
				$t=@mysql_num_rows($query);//verifica que dicho registro exista
				if($t>0)
				{
					$sess=mysql_fetch_array($query);//Crea el arreglo para los datos que contendrá la sesión
					session_start();
					if ($_POST["tipo"]==0)//Para ver que id de acuerdo a la sesión, se guardará en la id de sesión
					{
						$_SESSION['id']=$sess['idUsuarios'];
					}
					else
					{
						$_SESSION['id']=$sess['idAnalista'];
					}
					$_SESSION['nick']=$sess['Nickname'];//Nombre de usuario
					$_SESSION['login']=$_POST['tipo'];//Tipo de usuario
					echo "<img src=\"img/imagen2.jpg\">";//Muestra que se inicio la sesión
					echo "<meta http-equiv='refresh' content='3;URL=index.php'/>";//Lleva a la página de inicio
				}
				else
				{
					echo "<img src=\"img/error4.jpg\">";//en caso de no existir dicho registro
				};
			}
			else
			{
				echo "<img src=\"img/error2.jpg\">";//Mensaje en caso de que no se haya hecho el procedimiento correcto
				echo "<meta http-equiv='refresh' content='6;URL=index.php'/>";//Lleva a la página de inicio
			};
		?>	
	</div>
	
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