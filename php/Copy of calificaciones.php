<?php
session_start();
require_once 'Conexion.php';
require_once 'Usuario.php';
require_once 'Alumno.php';
require_once 'TablaAlumno.php';
require_once 'TablaUsuario.php';


$usuario=$_POST['user'];
$password=$_POST['pass'];
if(isset($usuario)&&isset($password)){

              if(!$usuario||!$password){ //DATO VACIOS
              header("Location:".$_SERVER['HTTP_REFERER']);
              }
              else{
                 $tablausuario=new TablaUsuario();
                 if($tablausuario->loginUsuario($usuario, $password)=="0"){//ERROR DE BD EN QRY
                  header("Location:".$_SERVER['HTTP_REFERER']);//ERROR DE USUARIO
                 }
                 else{
                     if($tablausuario->loginUsuario($usuario, $password)=="1"){//EXISTE
	                 $alumno=new Alumno();
	                 $talumno=new TablaAlumno();
	                 $talumno->consultaAlumno($usuario);
	                 $alumno=$talumno->consultaAlumno($usuario);
	
	                    if($alumno->getDeudaAlumno()=="1"){ //TIENE DEUDA
	                    header("Location:".$_SERVER['HTTP_REFERER']);
	                    }
	                    else{
	                    $_SESSION["nombre"]=$alumno->getNombreAlumno();
	                    $_SESSION["logueado"]="si";
	                    $_SESSION["matricula"]=$usuario;
                        header("Location:../usuarios/alumnos/calificacion_alumno.php");//LOGUEADO
	                    }
                     }
                     else{
                     header("Location:".$_SERVER['HTTP_REFERER']);//NO EXISTE
                     }


                 }//FIN NO ERROR DE BD ELSE

               }//FIN CAMPOS VACIOS ELSE

}
else{
	echo "<script>window.location='../index.php';</script>";//NO HA ENVIADO DATOS	
}
?>