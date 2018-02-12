<!DOCTYPE html>
<html>
<head>
<!-- REGISTRAR_ALUMNO.JS -->
<script type="text/javascript" src="../js/registrar_alumno.js"></script>
<!-- REGISTRAR_ALUMNO.JS -->
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<script type="text/javascript" src="../js/jquery.js"></script>
<!--BOOTSTRAP-->
<link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
<script src="../js/bootstrap/bootstrap.min.js"></script> 
<!--FIN BOOTSTRAP-->

<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="../style.ie7.css" media="screen" /><![endif]-->
    <!--[if IE]> 
    <script type="text/javascript">
    var e =("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
    for (var i=0; i<e.length; i++) {
    document.createElement(e[i]);
    }
    </script>
    <![endif]-->


</head>
<body onload="javascript:cargarEstados();">
	<article class="art-post art-article">
   <?php 
  $nombre='REGISTRO DE ALUMNO';
  require_once 'encabezado.php';
  ?>

	
	
			
			                    <!-- <div class="panel panel-info"  > 
			                    <div class="panel-heading" > 
                                <h3 class="panel-title"><b>Registro de alumno:&nbsp;</b><span class="glyphicon glyphicon-user"></span></h3> 
                                </div> 
                                </div>-->
                                <div class="panel-body" > 
								<!-- FORMULARIO DE LOGIN -->
								<form id="form-main" action="registrar_alumno" method="post" onsubmit="return validarCampos(this);">
								<div class='form-group' style="background: url('');">
                                     
                                      <div class="form-group" > 
                                      <label class="col-sm-2 control-label" style="font-weight: bold;">Matricula:&nbsp;</label> 
                                      <div class="col-sm-4"> 
									  <input type="text" name="matricula" id="user" class="form-control" style="text-transform: none;" placeholder="Ingresa tu matricula" size="20" maxlength="8" required="required">
                                      </div> 
                                      </div> 
                                 
                                    <div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Curp:</label> 
                                    <div class="col-sm-4">  
                                    <input type='text' class='form-control' name='curp' placeholder="Ingresa la curp" maxlength="18" required="required">
                                    </div>
                                    </div>
								    <br><br>
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Nombre:</label> 
                                    <div class="col-sm-3"> 
                                    <input type='text' class='form-control'  pattern='[a-z A-ZÑ]+' name='nombre' placeholder="Ingresa el nombre" required="required">
                                    </div>
                                    </div> 
                                    
                                    <div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Apellido paterno:</label> 
                                    <div class="col-sm-3"> 
								    <input type='text' class='form-control'  pattern='[a-z A-ZÑ]+' name='apellido1' placeholder="Ingresa el apellido paterno" required="required">
									</div>
									</div>
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Apellido materno:</label> 
                                    <div class="col-sm-3"> 
									<input type='text' class='form-control'  pattern='[a-z A-ZÑ]+' name='apellido2' placeholder="Ingresa el apellido materno" required="required">
									</div>
									</div>
									<br><br><br>
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Fecha de nacimiento:</label> 
                                    <div class="col-sm-3">  
									<input type="date" class='form-control' name='fecha' placeholder="Ingresa la fecha de nacimiento" required="required">
									</div>
									</div>
									
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Telefono 1:</label> 
                                    <div class="col-sm-3">  
									<input type='tel' class='form-control' name='tel1' placeholder="Ingresa el telefono" required="required">
									</div>
									</div>
									
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Telefono 2:</label> 
                                    <div class="col-sm-3">  
									<input type='tel' class='form-control' name='tel2' placeholder="Ingresa el telefono" required="required">
									</div>
									</div>
									<br><br><br>
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Estado:</label> 
                                    <div class="col-sm-3">  
									<select id='estado_alu' name='estado' onchange="javascript:cargarCiudades(this.value);" required="required" class='form-control'>
									</select> 
									</div>
									</div>
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Ciudad:</label> 
                                    <div class="col-sm-3">  
									<select id='ciudad_alu' name='ciudad' onchange="javascript:cargarColonias(this.value);" required="required" class='form-control'>
									<option value=''>--Selecciona una opcion--</option>
									</select>  
									</div>
									</div>
									
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Colonia:</label> 
                                    <div class="col-sm-3">  
									<select id='colonia_alu' name='colonia' required="required" class='form-control'>
									<option value=''>--Selecciona una opcion--</option>
									</select> 
									</div>
									<br><br>
									<div id='cargarColonias'></div>
									</div>
									
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Correo:</label> 
                                    <div class="col-sm-3">
                                    <input type="email" class='form-control'  name='correo' placeholder="Ingresa el mail" required="required">
                                    </div>
                                    </div>
                                    <div class="form-group" >
                                    <label class="col-sm-1 control-label"  style="font-weight: bold;">Calle:</label> 
                                    <div class="col-sm-3">
                                    <input type="text" name='calle' class='form-control' pattern="[a-z A-ZÑ]+" placeholder="Nombre de la calle" required="required">
                                    </div>
                                    </div>
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">N&uacute;mero:</label> 
                                    <div class="col-sm-3">
                                    <input type="text"  class='form-control' name='numero' placeholder="Ingresa el numero de calle" required="required">
                                    </div>
                                    </div>
									<br><br>
									<div class="form-group" >
                                    <label class="col-sm-1 control-label" style="font-weight: bold;">Deuda:</label> 
                                    <div class="col-sm-4">  
									<select name='deuda' required="required" class='form-control'>
										<option value='0'>--Selecciona una opcion--</option>
										<option value='1'>Si</option>
										<option value="0">No</option>
									</select>
									</div>
									</div>
									<div class="form-group" >
                                    <label class="col-sm-3 control-label" style="font-weight: bold;">Estatus del alumno:</label> 
                                    <div class="col-sm-4">  
									<select name='status' required="required" class='form-control'>
												<option value='0'>--Selecciona una opcion--</option>
												<option value='inscrito'>Inscrito</option>
												<option value='reinscrito'>Reinscrito</option>
												<option value='activo'>Activo</option>
												<option value='baja'>Baja temporal</option>
												<option value='proceso-re'>Proceso de reinscripcion</option>
												<option value='proceso-in'>Proceso de inscripcion</option>
									</select>
									</div>
									</div>
									<br><br><br>
									<div class="form-group" >
                                    <label class="col-sm-2 control-label" style="font-weight: bold;">Bachillerato:</label> 
                                    <div class="col-sm-4">   
											<select id='bac_alu' name='bachillerato' required="required" class='form-control'></select>
									</div>
									</div>

									<div class="form-group" >
                                    <label class="col-sm-2 control-label" style="font-weight: bold;">Seccion:</label> 
                                    <div class="col-sm-4">
											<select id='sec_alu' name='seccion' required="required" class='form-control'></select>
									</div>
									</div>
									<br><br>
									<div class="form-group" >
									<div align="center">
									<input type="submit" name='registrar' value="Registrar" class="btn btn-primary" style="zoom: 1;">
									<input type='button'  class="btn btn-default" value='Cancelar' onclick="javascript:window.history.back();">
								    </div>	
								    </div>	
								


                                </div>
								</form>
								</div>
							
								<!-- FIN REGISTRO-->
						
						

				

				
			
	



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

