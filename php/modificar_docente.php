<?php 
require_once 'Docente.php';
require_once 'TablaDocente.php';

$cadenaClave = '';
$cadenaNombre = '';
$cadenaApellido1 = '';
$cadenaApellido2 = '';
$cadenaTel = '';
$cadenaLada = '';
$cadenaCorreo = '';

// MODIFICAR DOCENTE

if (isset ( $_POST ['modificar'] )) {
	$cve_doc = $_POST ['cve_doc'];
	$nombre_doc = $_POST ['nombre_doc'];
	$ap_doc = $_POST ['ap_doc'];
	$am_doc = $_POST ['am_doc'];
	$lada_doc = $_POST ['lada_doc'];
	$tel_doc = $_POST ['tel_doc'];
	$correo_doc = $_POST ['correo_doc'];
	
	if (! $cve_doc || ! $nombre_doc || ! $ap_doc || ! $am_doc || ! $lada_doc || ! $tel_doc || ! $correo_doc) {
		echo "<div align='center'>";
		echo "<h3 style='color:red;'>Ocurri&oacute; un error llena todos los campos,revisa los datos<img src='../images/iconos/delete.ico' width='30' height='30'></h3>";
	    echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
	    echo "</div>";
	} else {
		$docente = new Docente ();
		$docente->setClaveDocente ( $cve_doc );
		$docente->setNombreDocente ( $nombre_doc );
		$docente->setAPaternoDocente ( $ap_doc );
		$docente->setAMaternoDocente ( $am_doc );
		$docente->setLadaDocente ( $lada_doc );
		$docente->setTelDocente ( $tel_doc );
		$docente->setCorreoDocente ( $correo_doc );
		
		$tablaDocente = new TablaDocente ();
		
		if ($tablaDocente->modificarDocente ( $docente ) == "1") {
			echo "<div align='center'>";
		    echo "<h3 style='color:blue;'>Datos del docente modificados de manera correcta!<img src='../images/iconos/check.ico' width='30' height='30'></h3>";
		    echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
		    echo "</div>";
		} else {
			if ($tablaDocente->modificarDocente ( $docente ) == "2") {
				echo "<div align='center'>";
			    echo "<h3 style='color:red;'>Ocurri&oacute; un error la clave INC del docente no existe!<img src='../images/iconos/delete.ico' width='30' height='30'></h3>";
			    echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
			    echo "</div>";
			} else {
				echo "<div align='center'>";
				echo "<h3 style='color:red;'>Error de base de datos<img src='../images/iconos/delete.ico' width='30' height='30'></h3>";
				echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
				echo "</div>";
			}
		}
	}
} else {
	// BUSQUEDA DOCENTE
	if (isset ( $_POST ['buscar'] )) {
		$busqueda = $_POST ['busqueda'];
		
		if (! $busqueda) {
			echo "<div align='center'>";
		    echo "<h3 style='color:red;'>Ocurri&oacute; un error ingresa la busqueda!<img src='../images/iconos/delete.ico' width='30' height='30'></h3>";
		    echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
			echo "<script>document.getElementById('busqueda').focus();</script>";
		} else {
			
			$docenteBusqueda = new Docente ();
			$datosDocente = new Docente ();
			$tablaDocenteBusqueda = new TablaDocente ();
			
			$datosDocente = $tablaDocenteBusqueda->reporteEspecificoDocente ( "cve_doc", $busqueda );
			
			if (sizeof ( $datosDocente ) > 0) {
				foreach ( $datosDocente as $docenteBusqueda ) {
					$cadenaClave = $docenteBusqueda->getClaveDocente ();
					$cadenaNombre = $docenteBusqueda->getNombreDocente ();
					$cadenaApellido1 = $docenteBusqueda->getAPaternoDocente ();
					$cadenaApellido2 = $docenteBusqueda->getAMaternoDocente ();
					$cadenaTel = $docenteBusqueda->getTelDocente ();
					$cadenaLada = $docenteBusqueda->getLadaDocente ();
					$cadenaCorreo = $docenteBusqueda->getCorreoDocente ();
				}
			} else {
				$cadenaClave = '';
				$cadenaNombre = '';
				$cadenaApellido1 = '';
				$cadenaApellido2 = '';
				$cadenaTel = '';
				$cadenaLada = '';
				$cadenaCorreo = '';
				echo "<div align='center'>";
				echo "<h3 style='color:green;'>No se encontraron coincidencias!<img src='../images/iconos/informacion.png' width='30' height='30'></h3>";
				echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
				echo "</div>";
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Registro de docentes</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<script type="text/javascript" src='../js/jquery.js'></script>
<style type='text/css'>
<!--
.Estilo2 {font-size: 12px}
input {text-transform: uppercase;}
-->
</style>


</head>
<body background='../images/sheet.png'>
<?php $nombre='MODIFICACI&Oacute;N DE DOCENTES ';
 require_once 'encabezado.php';
 ?>
	

						<form method="post" action="modificar_docente.php" name='formulario_docente' id='formulario_docente'>
							<table>
								<tr>
									<td>INC</td>
									<td><input type='text' name='cve_doc' id='cve_doc'
										maxlength="8" value='<?php echo $cadenaClave;?>' readonly></td>
								</tr>
								<tr>
									<td>NOMBRE</td>
									<td><input type='text' name='nombre_doc' id='nombre_doc'
										value='<?php echo $cadenaNombre;?>'></td>
								</tr>
								<tr>
									<td>APELLIDO PATERNO</td>
									<td><input type='text' name='ap_doc' id='ap_doc'
										value='<?php echo $cadenaApellido1;?>'></td>
								</tr>
								<tr>
									<td>APELLIDO MATERNO</td>
									<td><input type='text' name='am_doc' id='am_doc'
										value='<?php echo $cadenaApellido2;?>'></td>
								</tr>
								<tr>
									<td>LADA</td>
									<td><input type='text' name='lada_doc' id='lada_doc'
										maxlength="3" value='<?php echo $cadenaLada;?>'></td>
								</tr>
								<tr>
									<td>TELEFONO</td>
									<td><input type='text' name='tel_doc' id='tel_doc'
										value='<?php echo $cadenaTel;?>'></td>
								</tr>
								<tr>
									<td>CORREO</td>
									<td><input type="email" name='correo_doc' id='correo_doc'
										value='<?php echo $cadenaCorreo;?>'></td>
								</tr>
								<tr>
									<td><input type='submit' value='MODIFICAR' name='modificar'></td>
									<td><input type='submit' name='buscar'
										value='BUSCAR DOCENTE POR INC'><br>
									<input type='text' name='busqueda' id='busqueda'
										placeholder="INGRESA EL INC "></td>
								</tr>
							</table>
						</form>
<!-- CIERRA ENCABEZADO -->
</td></tr></table>
<!--  -->
						

					