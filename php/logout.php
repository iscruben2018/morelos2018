<?php
session_start();
?>
<?php
if (! isset ( $_SESSION ['matricula'] )) {
	header ( "Location:../index.php" );
} else {
	unset ( $_SESSION ['matricula'] );
	unset ( $_SESSION ['nombre'] );
	unset ( $_SESSION ['logueado'] );
	$_SESSION = array ();
	session_destroy ();
	switch ($_GET ['opcion']) {
		// calificacion
		case 1 :
			echo "<script>window.history.back();</script>";
			break;
		// reinscripcion
		case 2 :
			echo "<script>window.location='../usuarios/alumnos/solicitud-reinscripcion.html';</script>";
			break;
		case 3 :
			require_once 'Alumno.php';
			require_once 'TablaAlumno.php';
			
			$alumnoModificarStatus = new Alumno ();
			$tablaAlumnoModificarStatus = new TablaAlumno ();
			$tablaAlumnoModificarStatus->cambiarStatusAlumno ( $_SESSION ['matricula'], "proceso-re" );
			echo "<script>window.location='../usuarios/alumnos/solicitud-reinscripcion.html';</script>";
			break;
		case 3 :
			echo "<script>window.location='../usuarios/admin/';</script>";
			break;
		default :
			;
			break;
	}
}
?>
<h2 align="center">Cargando...</h2>
<br>
<br>
<div align="center">
	<img src='../images/loading.gif'>
</div>