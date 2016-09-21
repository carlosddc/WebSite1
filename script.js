function validar ()
{
	var pass=document.registro.pass.value; 
	var cpass=document.registro.cpass.value;
	var nick=document.registro.nick.value;
	var nombre=document.registro.nombre.value;
	var apellido=document.registro.apellido.value;
	var correo=document.registro.correo.value;
	var mes=document.registro.mes.value;
	//var term=document.registro.terminos.value;
	var term = document.getElementById('term');
	if (term.checked!=1)
	{
		window.alert ("No ha aceptado los términos de servicio");
		return false;
	}
	if (mes==0)
	{
		window.alert ("Escoja una fecha valida");
		return false;
	}
	if (nick==null||nick=="")
	{
		window.alert ("Nickname no puede ir en blanco");
		document.registro.nick.focus();
		return false;
	}
	if (nombre==null||nombre=="")
	{
		window.alert ("Nombre no puede ir en blanco");
		document.registro.nombre.focus();
		return false;
	}
	if (apellido==null||apellido=="")
	{
		window.alert ("Apellido no puede ir en blanco");
		document.registro.apellido.focus();
		return false;
	}
	if (correo==null||correo=="")
	{
		window.alert ("Nickname no puede ir en blanco");
		document.registro.correo.focus();
		return false;
	}
	if (pass==null||pass=="")
	{
		window.alert ("Contraseña no puede ir en blanco");
		document.registro.pass.focus();
		return false;
	}
	if (pass!=cpass)
	{
		window.alert ("Contraseñas no coinciden");
		document.registro.cpass.focus();
		return false;
	}
	else
	{
		document.registro.submit();
		return true;
	}
};

function llenado ()
{
	var nick=document.logueo.nick.value;
	var pass=document.logueo.pass.value;
	if (nick==null||nick=="")
	{
		window.alert ("Nickname no puede ir en blanco");
		document.logueo.nick.focus();
		return false;
	}
	if (pass==null||pass=="")
	{
		window.alert ("Contraseña no puede ir en blanco");
		document.logueo.pass.focus();
		return false;
	}
	else
	{
		document.logueo.submit();
		return true;
	}
};

function form_mod ()
{
	var pass=document.form.pass.value; 
	var cpass=document.form.cpass.value;
	if (pass!=cpass)
	{
		window.alert ("Contraseñas no coinciden");
		document.form.cpass.focus();
		return false;
	}
	else
	{
		document.form.submit();
		return true;
	}
};

