<?php
if (isset ( $_POST ['user'] ) && isset ( $_POST ['pass'] )) {
	
	session_start ();
	require_once 'Conexion.php';
	require_once 'Usuario.php';
	require_once 'TablaUsuario.php';
	require_once 'Docente.php';
	require_once 'TablaDocente.php';
	
	$usuario = $_POST ['user'];
	$password = $_POST ['pass'];
	
	if (! $usuario || ! $password) { // DATO VACIOS
		
		header ( "Location:" . $_SERVER ['HTTP_REFERER'] );
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
				header ( "Location:" . $_SERVER ['HTTP_REFERER'] );
			} else { // ERROR DE BD
				header ( "Location:" . $_SERVER ['HTTP_REFERER'] );
			}
		}
	} // FIN CAMPOS VACIOS ELSE
} else {
	echo "<script>window.location='../usuarios/docentes/';</script>";
}
?>