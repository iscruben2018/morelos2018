<?php session_start();
if(isset($_SESSION['user_admin'])==null){
   echo "<h3 align=center><img src='../images/iconos/error.png' width=33 heigth=33>Error acceso no autorizado</h3>";
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<script  type="text/javascript" src="../js/bootstrap/jquery.js"></script>
<link  href="../css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
<link  href="../style.css" rel="stylesheet"/>
<script type="text/javascript" src="../js/bootstrap/bootstrap.min.js"></script>
<link href="../css/animate.css" rel="stylesheet">
<script type="text/javascript">

function ver(){
    

	var modal=$("#modal");
	var msjModal=$("#msjModal");
	modal.css({display:"block",opacity:"1"});

}
function ocultar(mensaje){
	var modal=$("#modal");
	var msjModal=$("#msjModal");
	modal.css({display:"none",opacity:"0"});
	msjModal.html(mensaje);
}

</script>

<style type="text/css">

</style>
</head>
<body onload="ver();">
<input type='text' id='foco' class='form-control'>
<?php
require_once 'Alumno.php';
require_once 'TablaAlumno.php';

require_once 'Usuario.php';
require_once 'TablaUsuario.php';

$imagen_error="<img src='../images/iconos/error.png' width='30' heigth='30'>";
$imagen_ok="<img src='../images/iconos/check.ico' width=30 heigth=30>";


function agregarMensaje($msjEncabezado,$msjPrincipal,$imagenPrincipal){

    $direccion_anterior=$_SERVER ['HTTP_REFERER'];
    $direccion_guardado="javascript:window.history.back();";
    
    $imagen_anterior="<img src='../images/iconos/left.ico' width=30 heigth=30>";
    $imagenAviso="<img src='../images/iconos/warning.ico' width=30 heigth=30>";
  
    echo("
    <div id='modal' class='active animated fadeIn'>
    <script>document.getElementById('foco').focus();</script>
  
   <div id='modalContent'>
   
   <div class='titulos' style='color:white;'>
   <h4 style='text-transform:uppercase;'><span class='glyphicon glyphicon-exclamation-sign'>&nbsp;".$msjEncabezado."</span></h4></div>
      <hr style='color:#DCDCDC'>
      <h3 id='msjModal' style='color:black;color:rgb(51, 51, 51);'>".$msjPrincipal."".$imagenPrincipal."</h3>
     <hr style='color:#DCDCDC'>
      <br><br>
      <a href='".$direccion_guardado."' style='text-decoration:none;' class='btn btn-default'>".$imagen_anterior."Regresar</a>
   </div>
   </div>
    ");
    
}

if (isset ( $_POST ["registrar"] )) {
	
	$matricula = strtoupper($_POST ["matricula"]);
	$curp = $_POST ["curp"];
	$nombre = $_POST ["nombre"];
	$apellido1 = $_POST ["apellido1"];
	$apellido2 = $_POST ["apellido2"];
	$fecha = $_POST ["fecha"];
	$tel1 = $_POST ["tel1"];
	$tel2 = $_POST ["tel2"];
	$correo = $_POST ["correo"];
	$colonia = $_POST ["colonia"];
	$calle = $_POST ["calle"];
	$numero = $_POST ["numero"];
	$deuda = $_POST ["deuda"];
	$status = $_POST ["status"];
	$bachillerato = $_POST ["bachillerato"];
	$seccion = $_POST ["seccion"];
	$estado = $_POST ["estado"];
	
	if (! $matricula) {
	   agregarMensaje("Ocurrio un error","Ingresa la matricula ",$imagen_error);
		
	}
    else if(! $curp){
   	   agregarMensaje("Ocurrio un error","Ingresa la curp ",$imagen_error);
    }
    else if(! $nombre){
       agregarMensaje("Ocurrio un error","Ingresa el nombre ",$imagen_error);	 
    }
    else if(! $apellido1){
      agregarMensaje("Ocurrio un error","Ingresa el apellido paterno ",$imagen_error);
    }
    else if(! $apellido2){
      agregarMensaje("Ocurrio un error","Ingresa el apellido materno ",$imagen_error);
    }
    else if(! $fecha){
      agregarMensaje("Ocurrio un error","Ingresa la fecha ",$imagen_error);
    }
    else if(! $tel1){
      agregarMensaje("Ocurrio un error","Ingresa el telefono ",$imagen_error);
    }
    else if(! $correo){
      agregarMensaje("Ocurrio un error","Ingresa el correo ",$imagen_error);
    }
    else if(! $colonia){
      agregarMensaje("Ocurrio un error","Selecciona la colonia ",$imagen_error);
    }
    else if(! $calle){
      agregarMensaje("Ocurrio un error","Ingresa la calle ",$imagen_error);
    }
    else if(! $numero){
      agregarMensaje("Ocurrio un error","Ingresa el numero ",$imagen_error);
    }
    else if(! $deuda){
      agregarMensaje("Ocurrio un error","Selecciona si tiene deuda el alumno ",$imagen_error);
    }
    else if(! $status){
      agregarMensaje("Ocurrio un error","Selecciona el estatus del alumno ",$imagen_error);
    }
    else if(! $bachillerato){
      agregarMensaje("Ocurrio un error","Selecciona el bachillerato ",$imagen_error);
    }
    else if(! $seccion){
      agregarMensaje("Ocurrio un error","Selecciona la seccion ",$imagen_error);
    }
	 else {
		$alumno = new Alumno ();
		$tablaAlumno = new TablaAlumno ();
		
		$alumno->setMatriculaAlumno ( $matricula );
		$alumno->setCurpAlumno ( $curp );
		$alumno->setNombreAlumno ( $nombre );
		$alumno->setAPaternoAlumno ( $apellido1 );
		$alumno->setAMaternoAlumno ( $apellido2 );
		$alumno->setFNacimientoAlumno ( $fecha );
		$alumno->setTel1Alumno ( $tel1 );
		$alumno->setTel2Alumno ( $tel2 );
		$alumno->setCorreoAlumno ( $correo );
		$alumno->setColoniaAlumno ( $colonia );
		$alumno->setCalleAlumno ( $calle );
		$alumno->setNoAlumno ( $numero );
		$alumno->setDeudaAlumno ( $deuda );
		$alumno->setStatusAlumno ( $status );
		$alumno->setClaveBachilleratoAlumno ( $bachillerato );
		$alumno->setCodigoSeccionAlumno ( $seccion );
		
		if ($tablaAlumno->guardarAlumno ( $alumno ) == "1") {
			
			$usuario = new Usuario ();
			$tablaUsuario = new TablaUsuario ();
			// se registra el alumno en la tabla de usuarios con datos encriptados
			$usuario->setClaveUsuario ( $alumno->getMatriculaAlumno () );
			$usuario->setUsuario ( $alumno->getMatriculaAlumno () );
			$usuario->setPassword ( $alumno->getMatriculaAlumno ( $matricula ) );
			$usuario->setTipoUsuario ( "alumno" );
			$usuario->setCorreoUsuario ( $alumno->getCorreoAlumno () );
			if ($tablaUsuario->guardarUsuario ( $usuario ) == "1") {
                agregarMensaje("Proceso terminado","Registro guardado de manera correcta &nbsp;",$imagen_ok);
			} else {
				if ($tablaUsuario->guardarUsuario ( $usuario ) == "2") {
                    agregarMensaje("Ocurrio un error","La matricula o clave ya se encuentra registrada &nbsp;",$imagen_error);
				} else {
					if ($tablaUsuario->guardarUsuario ( $usuario ) == "0") {
						agregarMensaje("Ocurrio un error","No se pudo guardar la informacion &nbsp;",$imagen_error);
					}
				}
			}
		} 
        else {
			if ($tablaAlumno->guardarAlumno ( $alumno ) == "0") {
				agregarMensaje("Ocurrio un error","No se pudo guardar la informacion&nbsp;",$imagen_error);
			} else {
				if ($tablaAlumno->guardarAlumno ( $alumno ) == "2")
					agregarMensaje("Ocurrio un error","La matricula o clave ya se encuentra registrada &nbsp;",$imagen_error);
            }
                             
          }

     }//FIN CAMPOS VACIOS

  } //FIN ISSET
else 
{
 echo "";
}
?>

</body></html>
<?php }?>