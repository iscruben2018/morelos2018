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


$usuario=strtoupper($_POST['user']);
$password=strtoupper($_POST['pass']);


if(!$usuario||!$password){ //DATO VACIOS
	echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
	$nombre="SOLICITUD DE REINSCRIPCI&Oacute;N";
	require_once 'encabezado.php';
	echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
	echo "<h3><h3 style='color:blue'>Llena todos los campos,por favor revisa los datos.</h3><br>";
	echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
	header("Refresh:6;URL=".$_SERVER['HTTP_REFERER']);

}
else{

$tablausuario=new TablaUsuario();
if($tablausuario->loginUsuario($usuario, $password)=="0"){//ERROR DE BD
   echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
        $nombre="SOLICITUD DE REINSCRIPCI&Oacute;N";
        require_once 'encabezado.php';
        echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
        echo "<h3><h3 style='color:blue'>Error de base de datos.</h3><br>";
        echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
       header("Refresh:6;URL=".$_SERVER['HTTP_REFERER']);
}
else{
if($tablausuario->loginUsuario($usuario,$password)=="1"){//EXISTE
	$alumno=new Alumno();
	$talumno=new TablaAlumno();
	$talumno->consultaAlumno($usuario);
	$alumno=$talumno->consultaAlumno($usuario);
	
	
	if($alumno->getDeudaAlumno()=="1"){ //TIENE DEUDA
	   echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
              $nombre="AVISO";
              require_once 'encabezado.php';
              echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
              echo "<h3><h3 style='color:blue'>No podemos mostrar la informaci&oacute;n,resuelve tu situaci&oacute;n en control escolar.</h3><br>";
              echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
              header("Refresh:6;URL=".$_SERVER['HTTP_REFERER']);
	}
	else{
		$inscripcion=new Inscripcion();
		$tablaInscripcion=new TablaInscripcion();
		if($tablaInscripcion->existeInscripcionAlumno($usuario)=="1"){//SI HAY SOLICITUD
		header("Location:modificar_solicitud.php");
		$_SESSION["nombre"]=$alumno->getNombreAlumno();
		$_SESSION["logueado"]="si";
		$_SESSION["matricula"]=$usuario;
		}
		else{
		$alumnoExtra=new AlumnoExtra();
		$tablaAlumnoExtra=new TablaAlumnoExtra();
			if($tablaAlumnoExtra->existeAlumnoExtra($usuario)=="1"){//SI HAY DATOS
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
	if($tablausuario->loginUsuario($usuario,$password)=="2"){//NO EXISTE
   echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
              $nombre="SOLICITUD DE REINSCRIPCI&Oacute;N";
              require_once 'encabezado.php';
              echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
              echo "<h3><h3 style='color:blue'>El usuario no existe o los datos son incorrectos,por favor revisalos nuevamente.</h3><br>";
              echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
              header("Refresh:6;URL=".$_SERVER['HTTP_REFERER']);
     }
     else{
      echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
        $nombre="SOLICITUD DE REINSCRIPCI&Oacute;N";
        require_once 'encabezado.php';
        echo "<h2>Ocurri&oacute; un error &nbsp;<img src='../images/iconos/delete.ico' width=35 height=35></h2>";
        echo "<h3><h3 style='color:blue'>Error de base de datos.</h3><br>";
        echo "<b>Cargando...</b>&nbsp;<img src='../images/loading.gif'></h3>";
       header("Refresh:6;URL=".$_SERVER['HTTP_REFERER']);	
     }
      //header("Location:".$_SERVER['HTTP_REFERER']);//ERROR DE BD
}


}//FIN ERROR DE BD ELSE

}//FIN CAMPOS VACIOS ELSE
}
else {
header("Location:../inicio.php");

}
?>
