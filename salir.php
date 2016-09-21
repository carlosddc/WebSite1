<!DOCTYPE html>
<?php
require 'func.php';
conecta();
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="plantilla.css">

</head>
<body>

<div id="wrapper-main">
	<?php 	session_destroy();		?>
	<meta http-equiv='refresh' content='1;URL=index.php'/>
</div>

</body>
</html>