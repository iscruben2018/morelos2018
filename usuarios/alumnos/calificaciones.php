<?php
session_start ();
require_once '../../php/Conexion.php';
require_once '../../php/Usuario.php';
require_once '../../php/Alumno.php';
require_once '../../php/TablaAlumno.php';
require_once '../../php/TablaUsuario.php';

$usuario = $_POST ['user'];
$password = $_POST ['pass'];
$alumno = new Alumno ();
$talumno = new TablaAlumno ();

if (isset ( $usuario ) && isset ( $password )) {
	
	if (! $usuario || ! $password) { // DATO VACIOS
		setcookie("user_alumno","Llena-todos-los-campos,por-favor-revisa-los-datos.",time()+10);
		header ( "Location:calificacion_alumno.php" );
		//header ( "Refresh:6;URL=" . $_SERVER ['HTTP_REFERER'] ); //CAMPOS VACIOS
	} else {
	
		
		if (!($talumno->existeUsuarioAlumno($usuario,$password))) {
			setcookie("user_alumno","El-usuario-no-existe-o-el-password-es-incorrecto,revisa-los-datos-por-favor",time()+10);
			header ( "Location:" . $_SERVER ['HTTP_REFERER'] ); // NO EXISTE
		} else {
			 
			  $alumno=$talumno->consultaAlumno($usuario);

			if ($alumno->getDeudaAlumno () == "1") { // TIENE DEUDA
				setcookie("user_alumno","No-podemos-mostrar-los-datos,para-resolver-tu-situaci&oacuten,por-favor-consulta-en-control-escolar.",time()+10);
				header ( "Location:" . $_SERVER ['HTTP_REFERER'] ); // 
			} else {
				$_SESSION ["nombre"] = $alumno->getNombreAlumno ();
				$_SESSION ["logueado"] = "si";
				$_SESSION ["matricula"] = $usuario;
				header ( "Location:calificacion_alumno.php" ); // LOGUEADO
			}
		}

	} // FIN CAMPOS VACIOS ELSE
} 
else {
	header ( "Location:../../usuarios/alumnos/calificaciones.html" );
	// echo "<script>window.location='../index.php';</script>";//NO HA ENVIADO DATOS
}
?>