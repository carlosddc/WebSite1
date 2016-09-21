<?php
function conecta()//conexión con la base de datos
{
	$con=mysql_connect("localhost","root","");
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

function fecha_nac()
{
	echo "<select name='dia'>";
	for ($d=1;$d<=31;$d++)
	{
		echo "<option value='".$d."'>".$d."</option>";
	}
	echo "</select>";
	$mes = array("- Elegir mes -", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	echo "<select name='mes'>";
	for ($m=0;$m<=12;$m++)
	{
		echo "<option value='".$m."'>".$mes[$m]."</option>";
	}
	echo "</select>";
	echo "<select name='anyo'>";
	for ($a=date("Y");$a>=1900;$a--)
	{
		echo "<option value='".$a."'>".$a."</option>";
	}
	echo "</select>";
};

function fecha_min()
{
	echo "<select name='dia'>";
	for ($d=1;$d<=31;$d++)
	{
		echo "<option value='".$d."'>".$d."</option>";
	}
	echo "</select>";
	$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	echo "<select name='mes'>";
	for ($m=1;$m<=12;$m++)
	{
		echo "<option value='".$m."'>".$mes[$m]."</option>";
	}
	echo "</select>";
	echo "<select name='anyo'>";
	for ($a=2000;$a<=date("Y");$a++)
	{
		echo "<option value='".$a."'>".$a."</option>";
	}
	echo "</select>";
};

function hora()
{
	//Hora
	echo "Hora: <select name='hora'>";
	for ($h=0;$h<24;$h++)
	{
		echo "<option value='".$h."'>".$h."</option>";
	}
	echo "</select>";
	//Minutos
	echo "Minutos: <select name='min'>";
	for ($m=0;$m<60;$m++)
	{
		echo "<option value='".$m."'>".$m."</option>";
	}
	echo "</select>";
	//Segundos
	echo "Segundos: <select name='seg'>";
	for ($s=0;$s<60;$s++)
	{
		echo "<option value='".$s."'>".$s."</option>";
	}
	echo "</select>";
};

function fecha_max()
{
	echo "<select name='dia_max'>";
	for ($d=1;$d<=31;$d++)
	{
		echo "<option value='".$d."'>".$d."</option>";
	}
	echo "</select>";
	$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	echo "<select name='mes_max'>";
	for ($m=1;$m<=12;$m++)
	{
		echo "<option value='".$m."'>".$mes[$m]."</option>";
	}
	echo "</select>";
	echo "<select name='anyo_max'>";
	for ($a=2000;$a<=date("Y");$a++)
	{
		echo "<option value='".$a."'>".$a."</option>";
	}
	echo "</select>";
};
?>