<?php 
session_start();
//LIBRERIAS
require_once '../../php/Calificacion.php';
require_once '../../php/TablaCalificacion.php';
require_once '../../php/Alumno.php';
require_once '../../php/TablaAlumno.php';
require_once '../../php/Materia.php';
require_once '../../php/TablaMateria.php';
require_once '../../php/Bachillerato.php';
require_once '../../php/TablaBachillerato.php';
require_once '../../php/AlumnoBachillerato.php';
require_once '../../php/TablaAlumnoBachillerato.php';
require_once '../../php/Conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../style.css" media="screen">
<link rel="stylesheet" href="../../style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">
<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
<script src="../../jquery.js"></script>
<script src="../../script.js"></script>
<script src="../../script.responsive.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/boleta.css">
<link rel="stylesheet" type="text/css" media="screen" href="../../css/reporte.css">
<script type="text/javascript" src='../../js/scroll_bottom.js'></script>

<!-- BOOTSTRAP -->
<link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
<script src="../../js/bootstrap/bootstrap.min.js"></script> 
<!--FIN BOOTSTRAP-->

<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
<!--[if IE]> 
    <script type="text/javascript">
    var e =("abbr,section,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
    for (var i=0; i<e.length; i++) {
    document.createElement(e[i]);
    }
    </script>
<![endif]-->
</head>
<body background="../../images/sheet.png">
<?php 
$nombre="CALIFICACIONES";
require_once '../../php/encabezado.php';?>
<!--FIN ENCABEZADO-->
</td></tr></table><br>
<!-- FIN -->
<?php

if (isset ( $_SESSION ['matricula'] ) || isset ( $_SESSION ['user_admin'] )) {
	
	if ($_SESSION ["nombre"] != '' || $_SESSION ["logueado"] = "si" || $_SESSION ["tipo_usuario"] == "admin") {
		

		if($_SESSION['tipo_usuario']!='admin'){	
?>
 <div class="navbar navbar-default" role="navigation" style='width:83%;'> 
         <div class="navbar-header"> 
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
         <span class="sr-only">Navegacion</span> 
         <span class="icon-bar"></span> 
         <span class="icon-bar"></span> 
         <span class="icon-bar"></span>       
     </button> 
     
   </div> 
   <div class="collapse navbar-collapse" id="example-navbar-collapse"> 
      <ul class="nav navbar-nav"> 
         <li class="active">
         <a href="#"><b>Bienvenido:</b>&nbsp;<img src="../../images/iconos/user.ico" width="55" heigth="55">
         <br>
         </a></li> 
         <li>
         <a style="text-decoration:none;" href="../../php/logout.php?opcion=1">
         <b>Salir</b>&nbsp;
         <img src="../../images/iconos/shutdown.ico" width="35" heigth="35">
         </a>
         </li>    
      </ul> 
   </div> 
</div>
<?php
       }
       else{
       	echo "";
       }
		
		if (isset ( $_POST ['matricula'] )) {
			$matricula = $_POST ['matricula'];
		} else {
			if (isset ( $_GET ['matricula'] )) {
				$matricula = $_GET ['matricula'];
			} else {
				$matricula = $_SESSION ['matricula'];
			}
		}
		
		/**
		 * ***********************MOSTRAR INFORMACION DEL ALUMNO*******************
		 */
		$ciclosig = @date ( "Y" );
		$cicloant = @date ( "Y" );
		$siguiente = $ciclosig + 1;
		
		/* DATOS ALUMNO */
		$alumno = new Alumno ();
		$tablaAlumno = new TablaAlumno ();
		$datosAlumno = new Alumno ();
		
		$tablaAlumno->consultaAlumno ( $matricula );
		if ($tablaAlumno->consultaAlumno ( $matricula ) == "2") {
			
			header ( 'Location: ' . $_SERVER ['HTTP_REFERER'] );
		}
		
		$datosAlumno = $tablaAlumno->consultaAlumno ( $matricula );
		$clave_bachillerato = $datosAlumno->getClaveBachilleratoAlumno ();
		
		/**
		 * **********************DATOS ALUMNO**************************************
		 */
		
		/**
		 * *********************DATOS BACHILLERATO************************************************************
		 */
		$bachillerato = new Bachillerato ();
		$tablaBachillerato = new TablaBachillerato ();
		$datosBachillerato = new Bachillerato ();
		
		// parametros columna,busqueda
		$tablaBachillerato->reporteEspecificoBachillerato ( "cve_bac", $clave_bachillerato );
		$datosBachillerato = $tablaBachillerato->reporteEspecificoBachillerato ( "cve_bac", $clave_bachillerato );
		
		/**
		 * ********************DATOS BACHILLERATO************************************************************
		 */
		
		/**
		 * ********************ENCABEZADO TITULOS DE LA TABLA*****************************************************************************************************
		 */
		echo "<div align='center'>";
		echo "<div align='center' style='width:890px;height:490px;background:url(../../images/fondo2.png);background-repeat:no-repeat;background-position:center center;'><br>";
		echo "<div align='center' style='width:700px;background:url(../../images/fondo1.jpg);background-repeat:no-repeat;background-position:center center;'>";
		echo "<table width='700' align='center'> \n";
		echo "<tr> \n";
		echo "<td colspan='3' class='tablaDatos' align='center'>Boleta de Calificaciones.</td> \n";
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan=3>&nbsp;</td>";
		echo "</tr>";
		echo "<tr> \n";
		echo "<td width='400' class='tablaDatos' align='center'>" . ucfirst ( $datosAlumno->getAPaternoAlumno () ) . " " . ucfirst ( $datosAlumno->getAMaternoAlumno () ) . " " . ucfirst ( $datosAlumno->getNombreAlumno () ) . "</td>";
		echo "<td width='150' class='tablaDatos' align='center'>" . $datosAlumno->getMatriculaAlumno () . "</td>";
		echo "<td width='150' class='tablaDatos' align='center'>" . $cicloant . "-" . $siguiente . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='tablaTitulos' align='center'>NOMBRE</td>";
		echo "<td class='tablaTitulos' align='center'>MATRICULA</td>";
		echo "<td class='tablaTitulos' align='center'>CICLO ESCOLAR</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='tablaDatos' align='center'>" . $datosBachillerato->getNombreBachillerato () . "</td>";
		echo "<td class='tablaDatos' align='center'>" . "0" . $datosAlumno->getCodigoSeccionAlumno () . "</td>";
		echo "<td class='tablaDatos' align='center'>&nbsp;</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='tablaTitulos' align='center'>BACHILLERATO</td>";
		echo "<td class='tablaTitulos' align='center'>SECCION</td>";
		echo "<td class='tablaTitulos' align='center'>SEMESTRE</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "</tr>";
		echo "</table> \n";
		
		/**
		 * ************************ENCABEZADO CALIFICACIONES DEL ALUMNO*********************************
		 */
		$calificaciones = new Calificacion ();
		$tablaCalificacion = new TablaCalificacion ();
		$datosCalificacion = new Calificacion ();
		// parametros columna,busqueda retorna un array
		// Si hay calificaciones,tamaño del array debe retornar mas de 0
		$tablaCalificacion->reporteEspecificoCalificacion ( "matri_alu", $matricula );
		if (sizeof ( $tablaCalificacion->reporteEspecificoCalificacion ( "matri_alu", $matricula ) ) > 0) {
			// sacar el array
			$tablaCalificacion->reporteEspecificoCalificacion ( "matri_alu", $matricula );
			// pasar el objeto de la clase Calificacion
			$datosCalificacion = $tablaCalificacion->reporteEspecificoCalificacion ( "matri_alu", $matricula );
			/* CALIFICACIONES */
			
			echo "<table width='700' align='center'>";
			echo "<tr>";
			echo "<td width='40' align='center' class='tablaTitulos2'>SIIA</td>";
			echo "<td width='340' align='center' class='tablaTitulos2'>MATERIA</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>1ER PARCIAL</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>2DO PARCIAL</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>3ER PARCIAL</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>PROMEDIO.</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>SEMESTRAL</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>ORDINARIO</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>EXTRAORDINARIO</td>";
			echo "<td width='40' align='center' class='tablaTitulos2'>REGULARIZACION</td>";
			echo "</tr>";
			
			/**
			 * *******************************CALIFICACIONES********************************************************************
			 */
			// recorrer el array de calificaciones
			foreach ( $datosCalificacion as $calificaciones ) {
				$no = 0;
				$prom = 0;
				$siia = $calificaciones->getSiia (); // row =calificaciones
				/* MATERIAS */
				$materias = new Materia ();
				$tablaMateria = new TablaMateria ();
				$datosMateria = new Materia ();
				
				// parametros columna,busqueda
				$tablaMateria->reporteEspecificoMateria ( "siia", $siia );
				$datosMateria = $tablaMateria->reporteEspecificoMateria ( "siia", $siia );
				foreach ( $datosMateria as $materias ) {
					$semestre = $materias->getClaveSemMateria ();
					echo "<tr>";
					echo "<td class='tablaDatos' align='center'>" . $calificaciones->getSiia () . "</td>";
					echo "<td class='tablaDatos' align='left'>" . $materias->getNombreMateria () . "</td>";
					
					if ($calificaciones->getPrimeraCalificacion () == "NP" or $calificaciones->getPrimeraCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getPrimeraCalificacion () . "</td>";
					} else {
						if ($calificaciones->getPrimeraCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getPrimeraCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getPrimeraCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getPrimeraCalificacion () . "</td>";
							}
						}
					}
					
					if ($calificaciones->getSegundaCalificacion () == "NP" or $calificaciones->getSegundaCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getSegundaCalificacion () . "</td>";
					} else {
						if ($calificaciones->getSegundaCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getSegundaCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getSegundaCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getSegundaCalificacion () . "</td>";
							}
						}
					}
					
					if ($calificaciones->getTerceraCalificacion () == "NP" or $calificaciones->getTerceraCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getTerceraCalificacion () . "</td>";
					} else {
						if ($calificaciones->getTerceraCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getTerceraCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getTerceraCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getTerceraCalificacion () . "</td>";
							}
						}
					}
					
					if ($calificaciones->getPromedioCalificacion () == "NP" or $calificaciones->getPromedioCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getPromedioCalificacion () . "</td>";
					} else {
						if ($calificaciones->getPromedioCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getPromedioCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getPromedioCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getPromedioCalificacion () . "</td>";
							}
						}
					}
					
					if ($calificaciones->getSemestralCalificacion () == "NP" or $calificaciones->getSemestralCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getSemestralCalificacion () . "</td>";
					} else {
						if ($calificaciones->getSemestralCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getSemestralCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getSemestralCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getSemestralCalificacion () . "</td>";
							}
						}
					}
					
					if ($calificaciones->getOrdinarioCalificacion () == "NP" or $calificaciones->getOrdinarioCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getOrdinarioCalificacion () . "</td>";
					} else {
						if ($calificaciones->getOrdinarioCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getOrdinarioCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getOrdinarioCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getOrdinarioCalificacion () . "</td>";
							}
						}
					}
					
					if ($calificaciones->getExtraCalificacion () == "NP" or $calificaciones->getExtraCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getExtraCalificacion () . "</td>";
					} else {
						if ($calificaciones->getExtraCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getExtraCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getExtraCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getExtraCalificacion () . "</td>";
							}
						}
					}
					
					if ($calificaciones->getRegularizacionCalificacion () == "NP" or $calificaciones->getRegularizacionCalificacion () == "SD") {
						echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getRegularizacionCalificacion () . "</td>";
					} else {
						if ($calificaciones->getRegularizacionCalificacion () == "0") {
							echo "<td class='tablaDatos' align='center'></td>";
						} else {
							if ($calificaciones->getRegularizacionCalificacion () >= "6") {
								echo "<td class='tablaDatos' align='center'>" . $calificaciones->getRegularizacionCalificacion () . "</td>";
							} else {
								echo "<td class='tablaDatosR' align='center'>" . $calificaciones->getRegularizacionCalificacion () . "</td>";
							}
						}
					}
					$nm ++;
					$suma = $suma + $calificaciones->getOrdinarioCalificacion ();
					if ($suma != 0 || $nm != 0) {
						$prom = $suma / $nm;
					}
				}
			}
			
			/**
			 * ***************************************PROMEDIO GRAL************************************************************************
			 */
			echo "<tr>";
			echo "<td>&nbsp;<h3 class='tablaTitulos' style='font-size:12px'>Semestre:" . $semestre . "</h3></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td></td>";
			echo "<td class='tablaDatosM' align='right'>Promedio :</td>";
			echo "<td></td>";
			echo "<td colspan='2' class='tablaDatos' align='center'>" . number_format ( $prom = $suma / $nm ) . "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>&nbsp;</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan=12 class='tablaDatosM' align='center'>Este promedio es calculado en base a las calificaciones ordinarias</td>";
			echo "</tr>";
			
			echo "</table>";
			echo "<br></div>";
			echo "</div>";
			echo "</div>";
		} 		// SI NO HAY CALIFICACIONES
		else {
			echo "<b>No hay calificaciones disponibles</b>";
		}
	}  // Si no esta logueado
else {
		echo "<div align='center'><h3 align='center'>Debes iniciar sesion para loguearte hazlo aqui:</h3><br><a href='calificaciones.html'>LOGIN</a></div>";
	}
} // Si la matricula es ''
else {
	header("Location:calificaciones.html");
}

?>

</body>
</html>
