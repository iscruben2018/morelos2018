<?php
if (isset ( $_POST ['user'] ) && isset ( $_POST ['pass'] )) {
	
	session_start ();
	require_once 'Conexion.php';
	require_once 'Usuario.php';
	require_once 'TablaUsuario.php';
	
	$usuario = $_POST ['user'];
	$password = $_POST ['pass'];
	
	if (! $usuario || ! $password) { // DATO VACIOS
		header ( "Location:" . $_SERVER ['HTTP_REFERER'] );
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
			
			header ( "Location:../usuarios/admin/panel_admin.php" ); // LOGUEADO
		} else {
			if ($tusuario->loginAdmin ( $usuario, $password ) == "2") { // NO EXISTE O DATOS INCORRECTOS
				header ( "Location:" . $_SERVER ['HTTP_REFERER'] );
			} else { // ERROR DE BD
				header ( "Location:" . $_SERVER ['HTTP_REFERER'] );
			}
		}
	} // FIN CAMPOS VACIOS ELSE
} else {
	echo "<script>window.location='../usuarios/admin/';</script>";
}
?>