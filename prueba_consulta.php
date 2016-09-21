<?php

function conecta()
{
	$con=mysql_connect("localhost","root","");
	//$con=mysql_connect("www.smartcitysense.com","u243769_zun","BdLe_1996_98_Haku");
	//$con=mysql_connect("localhost","u243769","BdLe_1996_98_Haku");
	if(!$con)
	{
		die("No se pudo conectar a la base de datos".mysql_error());
	}
	$base=@mysql_select_db("cedit",$con);
	if(!$base)
	{
		die("No se pudo seleccionar".mysql_error());
	};
};

conecta();

$x=0;

if ($x==0)
{
	$sexo=">0";
}
else
{
	$sexo="=".$x;
}

$query=mysql_query("SELECT * FROM usuarios WHERE 
	Sexo_idSexo".$sexo);

echo "<table border='1' style='text-align:Center; width:890px; border-color:red; font-size: 20px;' align='center'>";	
echo "
<tr style='color:rgb(110,0,0); font-size:25px;'>
	<td>Nombre</td>
	<td>Apellidos</td>
	<td>Nick</td>
	<td>Correo</td>
	<td>Fecha de Nacimiento</td>
	<td>Ciudad</td>
	<td>Sexo</td>
	<td>Status</td>
	</tr>";
while ($datos=mysql_fetch_array($query))
{
	echo "<tr>";
	echo "<td>".$datos['Nombre']."</td>";
	echo "<td>".$datos['Apellidos']."</td>";
	echo "<td>".$datos['Nickname']."</td>";
	echo "<td>".$datos['Correo']."</td>";
	echo "<td>".$datos['Fecha_nacimiento']."</td>";
	echo "<td>".$datos['Ciudad_idCiudad']."</td>";
	echo "<td>".$datos['Sexo_idSexo']."</td>";
	echo "<td>".$datos['Status_idStatus']."</td>";
	echo "</tr>";
}
echo "</table>";
?>