<?php
if (isset ( $_POST ['user'] ) && isset ( $_POST ['pass'] )) {
	
	session_start ();
	require_once '../../php/Conexion.php';
	require_once '../../php/Usuario.php';
	require_once '../../php/TablaUsuario.php';
	
	$usuario = $_POST ['user'];
	$password = $_POST ['pass'];
	
	if (! $usuario || ! $password) { // DATO VACIOS
		echo "<link rel='stylesheet' type='text/css' href='../../css/reporte.css'>";
		$nombre = "LOGIN ADMINISTRADOR";
		require_once '../../php/encabezado.php';
		echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../../images/iconos/delete.ico' width=35 height=35></h2>";
		echo "<h3><h3 style='color:blue'>Llena todos los campos,por favor revisa los datos.</h3><br>";
		echo "<b>Cargando...</b>&nbsp;<img src='../../images/loading.gif'></h3>";
		header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] );
	} else {
		
		$user = new Usuario ();
		$tusuario = new TablaUsuario ();
		
		if ($tusuario->loginAdmin ( $usuario, $password ) == "1") { // EXISTE
			$usu = new Usuario ();
			$tablaUser = new TablaUsuario ();
			
			$user = $tablaUser->retornarClaveUsuario ( $usuario );
			$_SESSION ["codigo_usuario"] = $user->getClaveUsuario ();
			$_SESSION ["user_admin"] = $usuario;
			$_SESSION ["tipo_usuario"] = "admin";
			
			header ( "Location:panel_admin.php" ); // LOGUEADO
		} else {
			if ($tusuario->loginAdmin ( $usuario, $password ) == "2") { // NO EXISTE O DATOS INCORRECTOS
				echo "<link rel='stylesheet' type='text/css' href='../../css/reporte.css'>";
				$nombre = "LOGIN ADMINISTRADOR";
				require_once '../../php/encabezado.php';
				echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../../images/iconos/delete.ico' width=35 height=35></h2>";
				echo "<h3><h3 style='color:blue'>El usuario no existe o es incorrecto,por favor revisa los datos.</h3><br>";
				echo "<b>Cargando...</b>&nbsp;<img src='../../images/loading.gif'></h3>";
				header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] );
			} else { // ERROR DE BD
				echo "<link rel='stylesheet' type='text/css' href='../../css/reporte.css'>";
				$nombre = "LOGIN ADMINISTRADOR";
				require_once '../../php/encabezado.php';
				echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../../images/iconos/delete.ico' width=35 height=35></h2>";
				echo "<h3><h3 style='color:blue'>Error de conexi&oacute;n.</h3><br>";
				echo "<b>Cargando...</b>&nbsp;<img src='../../images/loading.gif'></h3>";
				header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] );
			}
		}
	} // FIN CAMPOS VACIOS ELSE
} else {
	header ( "Location:../../index.php" );
}
?>