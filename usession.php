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
			if(isset($_POST['enviar']))
			{
				$query=mysql_query("SELECT idUsuarios, Nickname, Contrasenya FROM Usuarios WHERE Nickname='".$_POST['nick']."' AND Contrasenya='".md5($_POST['pass'])."'");
				$t=@mysql_num_rows($query);
				if($t>0)
				{
					$sess=mysql_fetch_array($query);
					session_start();
					$_SESSION['id']=$sess['idUsuarios'];
					$_SESSION['nick']=$sess['Nickname'];
					$_SESSION['login']=1;
					echo "<img src=\"img/imagen2.jpg\">";
					
				}
				else
				{
					echo "<img src=\"img/error4.jpg\">";
				};
			}
			else
			{
				echo "<img src=\"img/error2.jpg\">";
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