<?php
if (isset ( $_POST ['user'] ) && isset ( $_POST ['pass'] )) {
	
	session_start ();
	require_once '../../php/Conexion.php';
	require_once '../../php/Usuario.php';
	require_once '../../php/TablaUsuario.php';
	require_once '../../php/Docente.php';
	require_once '../../php/TablaDocente.php';
	
	$usuario = $_POST ['user'];
	$password = $_POST ['pass'];
	
	if (! $usuario || ! $password) { // DATO VACIOS
		echo "<link rel='stylesheet' type='text/css' href='../../css/reporte.css'>";
		$nombre = "LOGIN DOCENTE";
		require_once '../../php/encabezado.php';
		echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../../images/iconos/delete.ico' width=35 height=35></h2>";
		echo "<h3><h3 style='color:blue'>Llena todos los campos,por favor revisa los datos.</h3><br>";
		echo "<b>Cargando...</b>&nbsp;<img src='../../images/loading.gif'></h3>";
		header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] );
	} else {
		
		$user = new Usuario ();
		$tusuario = new TablaUsuario ();
		
		if ($tusuario->loginDocente ( $usuario, $password ) == "1") { // EXISTE
			$usu = new Usuario ();
			$tablaUser = new TablaUsuario ();
			
			$docenteN = new Docente ();
			$datosDocente = new Docente ();
			$tablaDocente = new TablaDocente ();
			$datosDocente = $tablaDocente->reporteEspecificoDocente ( "cve_doc", $usuario );
			foreach ( $datosDocente as $docenteN ) {
				$nombreDocente = $docenteN->getNombreDocente () . " " . $docenteN->getAPaternoDocente ();
			}
			
			$user = $tablaUser->retornarClaveDocente ( $usuario );
			$_SESSION ["codigo_usuario"] = $user->getClaveDocente ();
			$_SESSION ['nombre_docente'] = $nombreDocente;
			$_SESSION ["user_docente"] = $usuario;
			$_SESSION ["tipo_usuario"] = "docente";
			
			header ( "Location:../usuarios/docentes/formatos_docentes.php" ); // LOGUEADO
		} else {
			if ($tusuario->loginDocente ( $usuario, $password ) == "2") { // NO EXISTE O DATOS INCORRECTOS
				echo "<link rel='stylesheet' type='text/css' href='../../css/reporte.css'>";
				$nombre = "LOGIN DOCENTE";
				require_once '../../php/encabezado.php';
				echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../../images/iconos/delete.ico' width=35 height=35></h2>";
				echo "<h3><h3 style='color:blue'>El usuario no existe o es incorrecto,por favor revisa los datos.</h3><br>";
				echo "<b>Cargando...</b>&nbsp;<img src='../../images/loading.gif'></h3>";
				header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] );
			} else { // ERROR DE BD
				echo "<link rel='stylesheet' type='text/css' href='../../css/reporte.css'>";
				$nombre = "LOGIN DOCENTE";
				require_once '../../php/encabezado.php';
				echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../../images/iconos/delete.ico' width=35 height=35></h2>";
				echo "<h3><h3 style='color:blue'>Error de conexi&oacute;n.</h3><br>";
				echo "<b>Cargando...</b>&nbsp;<img src='../../images/loading.gif'></h3>";
				header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] ); // NO EXISTE
			}
		}
	} // FIN CAMPOS VACIOS ELSE
} else {
	header ( "Location:../../index.php" );
}
?>