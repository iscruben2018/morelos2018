<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
session_start();
require_once 'Conexion.php';
require_once 'Usuario.php';
require_once 'Alumno.php';
require_once 'TablaAlumno.php';
require_once 'TablaUsuario.php';

require_once 'Inscripcion.php';
require_once 'TablaInscripcion.php';

require_once 'AlumnoExtra.php';
require_once 'TablaAlumnoExtra.php';


$usuario=$_POST['user'];
$password=$_POST['pass'];


if(!$usuario||!$password){ //DATO VACIOS
echo "<script>alert('Datos vacios!');</script>";
//header("Location:".$_SERVER['HTTP_REFERER']);

}
else{

$tablausuario=new TablaUsuario();
if($tablausuario->loginUsuario($usuario, $password)=="0"){//ERROR DE BD
echo "<script>alert('Error de base de datos!');</script>";
//header("Location:".$_SERVER['HTTP_REFERER']);//Error

}
else{
if($tablausuario->loginUsuario($usuario, $password)=="1"){//EXISTE
	$alumno=new Alumno();
	$talumno=new TablaAlumno();
	$talumno->consultaAlumno($usuario);
	$alumno=$talumno->consultaAlumno($usuario);
	
	
	if($alumno->getDeudaAlumno()=="1"){ //TIENE DEUDA
		echo "<script>alert('No podemos resolver tu situacion de deuda pasa a control escolar!');</script>";
	//header("Location:".$_SERVER['HTTP_REFERER']);
	
	}
	else{
		$inscripcion=new Inscripcion();
		$tablaInscripcion=new TablaInscripcion();
		if($tablaInscripcion->existeInscripcionAlumno($usuario)=="1"){
		//echo "<div align='center'>
		//	  <h2 style='color:red;' >Atenci&oacute;n!</h2><br>
		//	  <h3>Ya has realizado el registro una vez!,pero puedes modificar los datos incorrectos</h3>
			//  <form method='post' action='modificar_solicitud.php'>
			//  <input type='hidden' value='".$usuario."'>
			//  <input type='submit' value='Modificar datos de solicitud aqui'>
			//  </form>
			//  </div>";
		header("Location:modificar_solicitud.php");
		$_SESSION["nombre"]=$alumno->getNombreAlumno();
		$_SESSION["logueado"]="si";
		$_SESSION["matricula"]=$usuario;
		}
		else{
			$alumnoExtra=new AlumnoExtra();
			$tablaAlumnoExtra=new TablaAlumnoExtra();
			if($tablaAlumnoExtra->existeAlumnoExtra($usuario)=="1"){
			header("Location:modificar_solicitud.php");
			$_SESSION["nombre"]=$alumno->getNombreAlumno();
			$_SESSION["logueado"]="si";
			$_SESSION["matricula"]=$usuario;
			}
			else{
				$_SESSION["nombre"]=$alumno->getNombreAlumno();
				$_SESSION["logueado"]="si";
				$_SESSION["matricula"]=$usuario;
				header("Location:../usuarios/alumnos/solicitud-reinscripcion.php");//LOGUEADO
			}
		}



   
	}
}
else{
echo "<script>alert('No existe el usuario');</script>";
//header("Location:".$_SERVER['HTTP_REFERER']);//NO EXISTE
}


}//FIN ERROR DE BD ELSE

}//FIN CAMPOS VACIOS ELSE
}
else {
	echo "<script>window.location='../inicio.php';</script>";

}
?>
<html>
<body>
<div id='audio'></div>
</body>

</html>