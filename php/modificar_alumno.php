<?php
require_once 'Alumno.php';
require_once 'TablaAlumno.php';

$matricula=$_POST['matricula'];
$curp=$_POST['curp'];
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$colonia=$_POST['colonia'];
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$fecha=$_POST['fecha'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$correo=$_POST['correo'];
$deuda=$_POST['deuda'];
$status=$_POST['status'];
$bachillerato=$_POST['bachillerato'];
$seccion=$_POST['seccion'];

$alumno=new Alumno();
$tablaAlumno=new TablaAlumno();

$alumno->setMatriculaAlumno($matricula);
$alumno->setCurpAlumno($curp);
$alumno->setNombreAlumno($nombre);
$alumno->setAPaternoAlumno($apellido1);
$alumno->setAMaternoAlumno($apellido2);
$alumno->setFNacimientoAlumno($fecha);
$alumno->setTel1Alumno($tel1);
$alumno->setTel2Alumno($tel2);
$alumno->setColoniaAlumno($colonia);
$alumno->setCalleAlumno($calle);
$alumno->setNoAlumno($numero);
$alumno->setCorreoAlumno($correo);
$alumno->setDeudaAlumno($deuda);
$alumno->setStatusAlumno($status);
$alumno->setClaveBachilleratoAlumno($bachillerato);
$alumno->setCodigoSeccionAlumno($seccion);

/*NO MODIFICAR,EN CASO DE SER NECESARIO CAMBIAR MODIFICAR_SOLICITUD.PHP EN LA FUNCION LLEGADAMOFICACIONALUMNO
 *LENGTH > O MENOR DE 169
 * */
if($tablaAlumno->modificarAlumno($alumno)=="1"){
	echo "<div align='center'>
	          <h3 style='color:blue;'>
	          Datos actualizados!</h3>
	          <a href='javascript:window.history.back();'>Regresar</a></div>";
}
else{
	echo "<div align='center'>
	          <h3 style='color:red;'>
	          Error al modificar consulta con el admin</h3>
	          <a href='javascript:window.history.back();'>Regresar</a></div>";
}




?>