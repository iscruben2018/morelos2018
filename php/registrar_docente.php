<?php 
require_once 'Docente.php';
require_once 'TablaDocente.php';


if(isset($_POST['registrar'])){
	$cve_doc = $_POST ['cve_doc'];
	$nombre_doc = $_POST ['nombre_doc'];
	$ap_doc = $_POST ['ap_doc'];
	$am_doc = $_POST ['am_doc'];
	$lada_doc = $_POST ['lada_doc'];
	$tel_doc = $_POST ['tel_doc'];
	$correo_doc = $_POST ['correo_doc'];
	
	if (! $cve_doc || ! $nombre_doc || ! $ap_doc || ! $am_doc || ! $lada_doc || ! $tel_doc || ! $correo_doc) {
		echo "<div align='center'>";
		echo "<h3 style='color:red;'>Ocurri&oacute; un error llena todos los campos,revisa los datos<img src='../images/iconos/delete.ico' width=30 heigth=30></h3>";
		echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
	} else {
		
		if ($cve_doc == "77" || $cve_doc == 77) {
			echo "<div align='center'>";
			echo "<h3 style='color:red;'>Ocurri&oacute; un error,la clave--> " . $cve_doc . " se debe registrar como docente por asignar<img src='../images/iconos/delete.ico' width=30 heigth=30></h3>";
		    echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a>";
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
			
			if ($tablaDocente->guardarDocentes ( $docente ) == "1") {
				echo "<div align='center'>";
				echo "<h3 style='color:blue;'>Docente registrado de manera correcta!<img src='../images/iconos/check.ico' width='35' height='35'></h3>";
				echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='35' height='35'>Regresar</a>";
				echo "</div>";
			} else {
				if ($tablaDocente->guardarDocentes ( $docente ) == "2") {
					echo "<div align='center'>";
					echo "<h3 style='color:red;'>Ocurri&oacute; un error la clave INC del docente ya esta registrada!<img src='../images/iconos/delete.ico' width='30' height='30'></h3>";
			        echo "<br><a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
			        echo "</div>";
				} else {
					echo "<div align='center'>";
				    echo "<h3 style='color:red;'>Error de base de datos<img src='../images/iconos/delete.ico' width='30' height='30'></h3>";
				    echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a>";
				    echo "</div>";
				}
			}
		}
	}
}
else{
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
.Estilo2 {
	font-size: 12px
}

input {
	text-transform: uppercase;
}
-->
</style>
<script type="text/javascript" src='../js/registrar_docente.js'></script>

</head>
<body background='../images/sheet.png'>

<?php $nombre="REGISTRO DE DOCENTES";
require_once 'encabezado.php';
?>

						<form method="post" action="registrar_docente.php" onsubmit="return validarForm(this);" name='formulario_docente' id='formulario_docente'>
							<table>
								<tr>
									<td>INC</td>
									<td><input type='text' name='cve_doc' id='cve_doc'
										maxlength="8"></td>
								</tr>
								<tr>
									<td>NOMBRE</td>
									<td><input type='text' name='nombre_doc' id='nombre_doc'></td>
								</tr>
								<tr>
									<td>APELLIDO PATERNO</td>
									<td><input type='text' name='ap_doc' id='ap_doc'></td>
								</tr>
								<tr>
									<td>APELLIDO MATERNO</td>
									<td><input type='text' name='am_doc' id='am_doc'></td>
								</tr>
								<tr>
									<td>LADA</td>
									<td><input type='text' name='lada_doc' id='lada_doc'
										maxlength="3"></td>
								</tr>
								<tr>
									<td>TELEFONO</td>
									<td><input type='text' name='tel_doc' id='tel_doc'></td>
								</tr>
								<tr>
									<td>CORREO</td>
									<td><input type="email" name='correo_doc' id='correo_doc'></td>
								</tr>
								<tr>
									<td><input type='submit' value='REGISTRAR' name='registrar'></td>
									<td><input type='button' value='CANCELAR'
										onclick="javascript:window.history.back();"></td>
								</tr>
							</table>
						</form>
						
						<!-- CIERRA ENZABEZADO-->
						</td></tr></table>
						<!-- FIN -->
						
</body></html>
