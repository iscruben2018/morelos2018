<html>
<head>
<script type="text/javascript" src="../js/jquery.js">
</script>
<!-- REGISTRAR_ALUMNO.JS -->
<script type="text/javascript" src="../js/registrar_alumno.js"></script>
<!-- REGISTRAR_ALUMNO.JS -->
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<style type="text/css">
</style>
</head>
<body onload="javascript:cargarEstados();">
	<article class="art-post art-article">


		<div class="art-postcontent art-postcontent-0 clearfix">
			<div align="center" id="contenedor-mainn">
				<div>
                        <div style="background: #EDF0F2;" id="contenedor-submain">
						<div style="background: #6CF" id="header-welcome"></div>
						<br>
						<div id="contenedor-form">
							<div align="center">
								<!-- FORMULARIO DE LOGIN -->
								<form id="form-main" action="registrar_alumno.php" method="post" onsubmit="return validarCampos(this);">
								<?php 
								$nombre='REGISTRO DE ALUMNO';
								require_once 'encabezado.php';
								?>
                                    <p>
									<br>
									</p>
									<p>
									<label style="font-weight: bold;">Matricula:</label> 
									<input type="text" name="matricula" id="user" class="form-control" style="text-transform: none;" placeholder="Ingresa tu matricula" size="20" maxlength="8" required="required">
									</p>

									<span style="font-size: 12px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;"></span>
									<label style='font-weight: bold;'>Curp:</label> 
									<input type='text' name='curp' placeholder="Ingresa la curp" maxlength="18" required="required">
									<p>

											<span style="font-weight: bold;">Nombre:</span> 
											<input type='text' pattern='[a-z A-ZÑ]+' name='nombre' placeholder="Ingresa el nombre" required="required">
										
										<p>

											<span style="font-weight: bold;">Apellido paterno:</span>
											<input type='text' pattern='[a-z A-ZÑ]+' name='apellido1' placeholder="Ingresa el apellido paterno" required="required">
										
										<p>

											<span style="font-weight: bold;">Apellido Materno:</span> 
											<input type='text' pattern='[a-z A-ZÑ]+' name='apellido2' placeholder="Ingresa el apellido materno" required="required">
										
										<p>

											<span style="font-weight: bold;">Fecha de nacimiento:</span>
											<input type="date" name='fecha' placeholder="Ingresa la fecha de nacimiento" required="required">
										
										<p>

											<span style="font-weight: bold;">Telefono 1:</span> 
											<input type='tel' name='tel1' placeholder="Ingresa el telefono" required="required">
										
										<p>

											<span style="font-weight: bold;">Telefono 2:</span> 
											<input type="tel" name='tel2' placeholder="Opcional">
										
										<p>

											<span style="font-weight: bold;">Correo:</span> 
											<input type="email" name='correo' placeholder="Ingresa el mail" required="required">
										
										<p>
											<span style="font-weight: bold;">Estado:</span> 
											<select id='estado_alu' name='estado' onchange="javascript:cargarCiudades(this.value);" required="required">
											</select> 
											<span style="font-weight: bold;">Ciudad:</span> 
											<select id='ciudad_alu' name='ciudad' onchange="javascript:cargarColonias(this.value);" required="required">
											</select> 
											<span style="font-weight: bold;">Colonia:</span> 
											<select id='colonia_alu' name='colonia' required="required"></select>
										
										<div id='cargarColonias'></div>
										<p>

											<span style="font-weight: bold;">Calle:</span> 
											<input type="text" name='calle' pattern="[a-z A-ZÑ]+" placeholder="Nombre de la calle" required="required">
										
										<p>

											<span style="font-weight: bold;">N&uacute;mero:</span> 
											<input type="text" name='numero' placeholder="Ingresa el numero de calle" required="required">
										
										<p>


											<span style="font-weight: bold;">Deuda:</span> 
											<select name='deuda' required="required">
												<option value='0'>--Selecciona una opcion--</option>
												<option value='1'>Si</option>
												<option value="0">No</option>
											</select>
										
										<p>

											<span style="font-weight: bold;">Status:</span> 
											<select name='status' required="required">
												<option value='0'>--Selecciona una opcion--</option>
												<option value='inscrito'>Inscrito</option>
												<option value='reinscrito'>Reinscrito</option>
												<option value='activo'>Activo</option>
												<option value='baja'>Baja temporal</option>
												<option value='proceso-re'>Proceso de reinscripcion</option>
												<option value='proceso-in'>Proceso de inscripcion</option>
											</select>
										
										<p>
											<span style="font-weight: bold;">Bachillerato:</span> 
											<select id='bac_alu' name='bachillerato' required="required"></select>
										
										<p>
											<span style="font-weight: bold;">Seccion:</span> 
											<select id='sec_alu' name='seccion' required="required"></select>
										
										<p>
											<!-- <span style="font-weight: bold;">Usuario:</span>-->
											<input type='hidden' placeholder="Ingresa nombre de usuario">
										
										<p>


											<!--  -<span style="font-weight: bold;">Password:</span>-->
											<input type="hidden" name="pass" id="pass" class="form-control" style="text-transform: none;" placeholder="Ingresa tu password"></label>



									<p style="text-align: center;">
										&nbsp; <input type="submit" name='registrar' value="Registrar" class="art-button" style="zoom: 1;">&nbsp; 
										<a href="javascript:window.history.back();" class="art-button"><button>Cancelar</button></a>&nbsp;
										<span
											style="color: rgb(0, 0, 0); font-family: 'Droid Serif', Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 12px; text-transform: uppercase; white-space: pre;"></span>
									</p>



								</form>
								<!-- FIN REGISTRO-->
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>



	</article>
</body>
</html>
<?php
require_once 'Alumno.php';
require_once 'TablaAlumno.php';

require_once 'Usuario.php';
require_once 'TablaUsuario.php';

$direccion_anterior=$_SERVER ['HTTP_REFERER'];
$imagen_error="<img src='../images/iconos/delete.ico' width='30' heigth='30'>";
$imagen_ok="<img src='../images/iconos/check.ico' width=30 heigth=30>";
$imagen_anterior="<img src='../images/iconos/left.ico' width=30 heigth=30>";

if (isset ( $_POST ["registrar"] )) {
	
	$matricula = $_POST ["matricula"];
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
	
	
	
	if (! $matricula || ! $curp || ! $nombre || ! $apellido1 || ! $apellido2 || ! $fecha || ! $tel1 || ! $correo || ! $calle || ! $numero || ! $status || ! $bachillerato || ! $seccion || ! $colonia) {
		echo "<div align='center'>";
        echo  "<h3 style='color:red;'>Ocurri&oacute; un error llena todos los campos,revisa los datos".$imagen_error."</h3>";
        echo  "<a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
        echo "</div>";
	} else {
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
				echo "<div align='center'>";
				echo "<h3>Registro guardado de manera correcta &nbsp;".$imagen_ok."</h3>";
	            echo "<a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."</a>";
	            echo "</div>";
			} else {
				if ($tablaUsuario->guardarUsuario ( $usuario ) == "2") {
					echo "<div align='center'>";
                    echo "<h2 style='color:red;'>Ocurri&oacute; un error,la matricula o clave ya se encuentra registrada".$imagen_error."</h2>";
                    echo "<a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
                    echo "</div>";
				} else {
					if ($tablaUsuario->guardarUsuario ( $usuario ) == "0") {
						echo "<div align='center'>";
                        echo "<h2 style='color:red;'>Ocurri&oacute; un error al guardar la informaci&oacute;n".$imagen_error."</h2>";
                        echo "<a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
                        echo "</div>";
					}
				}
			}
		} else {
			if ($tablaAlumno->guardarAlumno ( $alumno ) == "0") {
				echo "<div align='center'>";
                echo "<h2 style='color:red;'>Ocurri&oacute; un error al guardar la informaci&oacute;n".$imagen_error."</h2>";
                echo "<a href='javascript:window.history.back();' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
                echo "</div>";
			} else {
				if ($tablaAlumno->guardarAlumno ( $alumno ) == "2")
					echo "<div align='center'>";
                    echo "<h2 style='color:red;'>Ocurri&oacute; un error,el alumno con esa matricula ya existe &nbsp;".$imagen_error."</h2>";
                    echo "<a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
                    echo "</div>";
                             	}
                             }

                 }

}
else {
	
}


?>

