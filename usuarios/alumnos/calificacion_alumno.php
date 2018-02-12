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
<body>
<!--INICIO ENCABEZADO-->
<div id="art-main">
<?php if($_SESSION['user_admin']==null){?>
<header class="art-header" style="background-position: 548.08px 66.25px, 420.42px 66.96000000000001px, 123.84px 44.400000000000006px, 39.35px 30.6px, 0px 0px;">

    <div class="art-shapes">
        <div class="art-textblock art-object2134142508" style="left: 123.84px; top: 44.400000000000006px; margin-left: 0px !important;">
        <div class="art-object2134142508-text-container">
        <div class="art-object2134142508-text">Jos&eacute; Ma. Morelos<br>de Zit&aacute;cuaro S.C</div>
    </div>
    
</div><div class="art-textblock art-object438453684" style="left: 420.42px; top: 66.96000000000001px; margin-left: 0px !important;">
        <div class="art-object438453684-text-container">
        <div class="art-object438453684-text">Incorporada <br>a la U.M.S.N.H</div>
    </div>
    
</div><div class="art-textblock art-object2030094490" style="left: 548.08px; top: 66.25px; margin-left: 0px !important;">
        <div class="art-object2030094490-text-container">
        <div class="art-object2030094490-text">Clave:<br>109-218.1 "74"</div>
    </div>
    
</div>
            </div>

<h1 class="art-headline" style="left: 47.46px; top: 11.6px; margin-left: 0px !important;">
    <a href="#">ESCUELA PREPARATORIA</a>
</h1>
<h2 class="art-slogan" style="left: 53.34px; top: 117px; margin-left: 0px !important;">"CUNA DE H&eacute;ROES,CRISOL DE PENSADORES"</h2>
              
</header>
<?php }?>


<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                        
<!--FIN ENCABEZADO-->
<?php

if (isset ( $_SESSION ['matricula'] ) || isset ( $_SESSION ['user_admin'] )) {
	
	if ($_SESSION ["nombre"] != '' || $_SESSION ["logueado"] = "si" || $_SESSION ["tipo_usuario"] == "admin") {
		

		if($_SESSION['tipo_usuario']!='admin'){	
        require_once 'menu.html';
       }
       else{
       //SI SE VEN LAS CALIFICACIONES COMO USUARIO ADMIN NO SE NECESITA VER EL MENU DE CIERRE DE SESION
       	echo "";
       }
		
		if (isset ( $_POST ['matricula'] )) {
			//SI SE RECIBE LA MATRICULA DEL USUARIO NORMALMENTE
			$matricula = $_POST ['matricula'];
		} else {
			if (isset ( $_GET ['matricula'] )) {
				//SI SE RECIBE LA MATRICULA DESDE AL ADMIN
				$matricula = $_GET ['matricula'];
			} else {//SI LA MATRICULA YA ESTABA ALMACENADA EN SESION
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
			//SI NO EXISTE EL ALUMNO
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

		?>
		<div align='center'>
		<div align='center' style='width:890px;height:490px;background:url(../../images/fondo2.png);background-repeat:no-repeat;background-position:center;'>
		<br><br>
		<div align='center' style='width:700px;background:url(../../images/fondo1.jpg);background-repeat:no-repeat;background-position:center;'>
		<br>
		<!--TITULOS DE LA TABLA-->
		<table width='700' align='center'>
		<tr>
		<td colspan='3' class='tablaDatos' align='center'>Boleta de Calificaciones.</td>
		</tr>
		<tr>
		<td colspan=3>&nbsp;</td>
		</tr>
		<tr> 
		<td width='400' class='tablaDatos' align='center'><?php echo ucfirst ( $datosAlumno->getAPaternoAlumno () ) . " " . ucfirst ( $datosAlumno->getAMaternoAlumno () ) . " " . ucfirst ( $datosAlumno->getNombreAlumno () ) ;?></td>
		<td width='150' class='tablaDatos' align='center'><?php echo $datosAlumno->getMatriculaAlumno ();?></td>
		<td width='150' class='tablaDatos' align='center'><?php echo $cicloant . "-" . $siguiente;?></td>
		</tr>
		<tr>
		<td class='tablaTitulos' align='center'>NOMBRE</td>
		<td class='tablaTitulos' align='center'>MATRICULA</td>
		<td class='tablaTitulos' align='center'>CICLO ESCOLAR</td>
		</tr>
		<tr>
		<td class='tablaDatos' align='center'><?php echo $datosBachillerato->getNombreBachillerato ();?></td>
		<td class='tablaDatos' align='center'>0<?php echo $datosAlumno->getCodigoSeccionAlumno ();?></td>
		<td class='tablaDatos' align='center'>&nbsp;</td>
		</tr>
		<tr>
		<td class='tablaTitulos' align='center'>BACHILLERATO</td>
		<td class='tablaTitulos' align='center'>SECCION</td>
		<td class='tablaTitulos' align='center'>SEMESTRE</td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		</table>
		<!--FIN TITULOS DE LA TABLA-->
		<?php 
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
			/* ENCABEZADO CALIFICACIONES */
		?>
		    <!--TITULOS DE LAS CALIFICACIONES-->
			<table width='700' align='center'>
			<tr>
			<td width='40' align='center' class='tablaTitulos2'>SIIA</td>
			<td width='340' align='center' class='tablaTitulos2'>MATERIA</td>
			<td width='40' align='center' class='tablaTitulos2'>1ER PARCIAL</td>
			<td width='40' align='center' class='tablaTitulos2'>2DO PARCIAL</td>
			<td width='40' align='center' class='tablaTitulos2'>3ER PARCIAL</td>
			<td width='40' align='center' class='tablaTitulos2'>PROMEDIO.</td>
			<td width='40' align='center' class='tablaTitulos2'>SEMESTRAL</td>
			<td width='40' align='center' class='tablaTitulos2'>ORDINARIO</td>
			<td width='40' align='center' class='tablaTitulos2'>EXTRAORDINARIO</td>
			<td width='40' align='center' class='tablaTitulos2'>REGULARIZACION</td>
			</tr>
			<!--FIN TITULOS DE LAS CALIFICACIONES-->
			<!--CALIFICACIONES-->
		<?php
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
			?>
			<!--FIN CALIFICACIONES-->
			<!--PIE TABLA-->
			<tr>
			<td>&nbsp;<h3 class='tablaTitulos' style='font-size:12px'>Semestre:<?php echo $semestre;?></h3></td>
			</tr>
			<tr>
			<td></td>
			<td class='tablaDatosM' align='right'>Promedio :</td>
			<td></td>
			<td colspan='2' class='tablaDatos' align='center'><?php echo number_format ( $prom = $suma / $nm );?></td>
			</tr>
			
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td colspan=12 class='tablaDatosM' align='center'>Este promedio es calculado en base a las calificaciones ordinarias</td>
			</tr>
			<!--FIN PIE TABLA-->
			</table>
			<!--FIN TABLA-->
			<br>
		    </div>
			</div>
			</div>
		<?php
		
		
		//FIN IF MAIN
		} 		
		else {
			// SI NO HAY CALIFICACIONES
			echo "<b>No hay calificaciones disponibles</b>";
		}
		//Linea de if para mostrar boton atras en admin
		if(isset($_SESSION ["user_admin"] )&&$_SESSION ["tipo_usuario"] = "admin"){echo "<h4 align='center'><a href='". $_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'>Regresar</a></h4>";}
	
	}//Fin if logueado 
	 
else { // Si no esta logueado
		echo "<div align='center'>";
		echo "<h3 align='center'>Debes iniciar sesion para loguearte hazlo aqui:</h3>";
		echo "<br><a href='calificaciones.html'>LOGIN</a></div>";
	}
} 
// Si la matricula es ''
else {
	header("Location:calificaciones.html");
}

?>

</div></div></div></div></div></div>

<a href="#" class="scrollup" style="display: inline;"><img src='../../images/icono.jpg'></a>
</body>
</html>
