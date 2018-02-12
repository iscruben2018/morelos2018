<?php
session_start ();
require_once 'Conexion.php';
require_once 'Usuario.php';
require_once 'Alumno.php';
require_once 'TablaAlumno.php';
require_once 'TablaUsuario.php';

$usuario = $_POST ['user'];
$password = $_POST ['pass'];
if (isset ( $usuario ) && isset ( $password )) {
	
	if (! $usuario || ! $password) { // DATO VACIOS
		echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
		$nombre = "LOGIN ALUMNO";
		require_once 'encabezado.php';
		echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
		echo "<h3><h3 style='color:blue'>Llena todos los campos,por favor revisa los datos.</h3><br>";
		echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
		header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] );
	} else {
		$alumno = new Alumno ();
		$talumno = new TablaAlumno ();
		
		if ($talumno->consultaAlumno ( $usuario ) == "2") {
			echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
			$nombre = "LOGIN ALUMNO";
			require_once 'encabezado.php';
			echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
			echo "<h3><h3 style='color:blue'>El usuario no existe o es incorrecto,por favor revisa los datos.</h3><br>";
			echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
			header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] ); // NO EXISTE
		} else {
			if ($alumno->getDeudaAlumno () == "1") { // TIENE DEUDA
				echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
				$nombre = "LOGIN ALUMNO";
				require_once 'encabezado.php';
				echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
				echo "<h3><h3 style='color:blue'>No podemos mostrar los datos,para resolver tu situación,por favor consulta en control escolar.</h3><br>";
				echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
				header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] );
			} else {
				$_SESSION ["nombre"] = $alumno->getNombreAlumno ();
				$_SESSION ["logueado"] = "si";
				$_SESSION ["matricula"] = $usuario;
				header ( "Location:../usuarios/alumnos/calificacion_alumno.php" ); // LOGUEADO
			}
		}
	} // FIN CAMPOS VACIOS ELSE
} else {
	header ( "Location:../index.php" );
	// echo "<script>window.location='../index.php';</script>";//NO HA ENVIADO DATOS
}
?>