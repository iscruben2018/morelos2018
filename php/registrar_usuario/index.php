<html>
<head>
<link type='text/css' rel='stylesheet' href='../../css/reporte.css'>
<script type="text/javascript">
function validarDatos(form){
	if(form.cve_usu.value.length==0||form.cve_usu.value==''){
		alert("Ingresa una clave");
		form.cve_usu.focus();
		return false;
	}

	if(form.user.value.length==0||form.user.value==''){
		alert("Ingresa un usuario");
		form.user.focus();
		return false;
	}
	if(form.pass.value.length==0||form.pass.value==''){
		alert("Ingresa un password");
		form.pass.focus();
		return false;
	}
	if(form.tipo_usu.value.length==0||form.tipo_usu.value==''||form.tipo_usu.value=='0'){
		alert("Ingresa el tipo de usuario");
		form.tipo_usu.focus();
		return false;
	}
	if(form.correo_usu.value.length==0||form.correo_usu.value==''){
		alert("Ingresa un correo");
		form.correo_usu.focus();
		return false;
	}
	return true;
}
</script>
</head>
<body>
<html>
<?php 
$nombre="REGISTRAR USUARIO";
require_once '../encabezado.php';
?>
<form action="index.php" method="post" name='form' onsubmit="return validarDatos(this);">
<label>Clave:</label><input type="text" name="cve_usu"><br>
<label>Usuario:</label><input type="text" name="user"><br>
<label>Password:</label><input type="password" name="pass"><br>
<label>Tipo de usuario:</label><select name="tipo_usu">
<option value='0'>--Selecciona una opcion--</option>
<option value='administrador'>Administrador</option>
<option value='docente'>Docente</option>
<option value='alumno'>Alumno</option>
</select><br>
<label>Correo:</label><input type="email" name="correo_usu"><br>
<input type='reset' value='Borrar'><input type='submit' value='Enviar' name='enviar'>
</form>
</html>
<?php
session_start();
require_once '../Conexion.php';
require_once '../Usuario.php';
require_once '../TablaUsuario.php';

$cve_usu=$_POST['cve_usu'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$tipo_usu=$_POST['tipo_usu'];
$correo_usu=$_POST['correo_usu'];


if (isset($_POST['enviar'])) {
	if (!$cve_usu||!$user||!$pass||!$tipo_usu||$tipo_usu=='0'||!$correo_usu) {
		echo "<h3 style='color:red;'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		      <img src='../images/iconos/delete.ico' width='35' heigth='35'>Ocurri&oacute; un error,llena todos los campos</a></h3>";
	}
	else{
		$usuario=new Usuario();
		$tablaUsuario=new TablaUsuario();
		
		$usuario->setClaveUsuario($cve_usu);
		$usuario->setUsuario($user);
		$usuario->setPassword($pass);
		$usuario->setTipoUsuario($tipo_usu);
		$usuario->setCorreoUsuario($correo_usu);
		
		if($tablaUsuario->guardarUsuario($usuario)=="1"){
			echo "<h3 style='color:red;'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		          <img src='../images/iconos/check.ico' width='35' heigth='35'>Usuario registrado.<p>Regresar</a></h3>";
		}
		else {
			if($tablaUsuario->guardarUsuario($usuario)=="2"){
				echo "<h3 style='color:red;'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		              <img src='../images/iconos/delete.ico' width='35' heigth='35'>Ocurri&oacute; un error,la clave de usuario-->".$usuario->getClaveUsuario()." ya existe<p>Regresar</a></h3>";
			}
			else{
				if($tablaUsuario->guardarUsuario($usuario)=="0"){
				echo "<h3 style='color:red;'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		              <img src='../images/iconos/delete.ico' width='35' heigth='35'>Ocurri&oacute; un error de conexi&oacute;n<p>Regresar</a></h3>";
				}
			}
		}
		
		
	}
}
else {

}
?>
