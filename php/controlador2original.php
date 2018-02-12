<?php
session_start ();

require_once 'Conexion.php';
require_once 'Estado.php';
require_once 'TablaEstado.php';
require_once 'TablaCiudad.php';
require_once 'Ciudad.php';
require_once 'Colonia.php';
require_once 'TablaColonia.php';
require_once 'Ciclo.php';
require_once 'TablaCiclo.php';
require_once 'Alumno.php';
require_once 'TablaAlumno.php';
require_once 'Bachillerato.php';
require_once 'TablaBachillerato.php';
require_once 'Publicacion.php';
require_once 'TablaPublicacion.php';
require_once 'Seccion.php';
require_once 'TablaSeccion.php';
require_once 'AlumnoExtra.php';
require_once 'TablaAlumnoExtra.php';
require_once 'Padre.php';
require_once 'TablaPadre.php';
require_once 'Inscripcion.php';
require_once 'TablaInscripcion.php';
require_once 'Materia.php';
require_once 'TablaMateria.php';
require_once 'Docente.php';
require_once 'TablaDocente.php';
require_once 'DocenteMateria.php';
require_once 'TablaDocenteMateria.php';
require_once 'InscripcionRenglon.php';
require_once 'TablaInscripcionRenglon.php';

$opcion = $_POST ['opcion'];
$user = $_POST ['user'];
$pass = $_POST ['pass'];

$idestado = $_POST ['idestado'];
$idciudad = $_POST ['idciudad'];
$idcolonia = $_POST ['idcolonia'];
$matricula = $_POST ['matricula'];
$b_actual = $_POST ['b_actual'];
$mesPublicacion = $_POST ['mesPublicacion'];
$diaPublicacion = $_POST ['diaPublicacion'];
$matricula_proceso = $_GET ['matricula_proceso'];
$matricula_pro = $_POST ['matricula_pro'];
$respaldoEstado = $_POST ['respaldoEstado'];

$psalud1 = $_POST ['psalud1'];
$psalud2 = $_POST ['psalud2'];
$beca1 = $_POST ['beca1'];
$beca2 = $_POST ['beca2'];
$ssalud1 = $_POST ['ssalud1'];
$ssalud2 = $_POST ['ssalud2'];
$idioma1 = $_POST ['idioma1'];
$idioma2 = $_POST ['idioma2'];
$lnac_aluex = $_POST ['lnac_aluex'];
$sexo_aluex = $_POST ['sexo_aluex'];

$matri_extra = $_POST ['matri_extra'];
$mat_alu = $_POST ['mat_alu'];
$cve_bac = $_POST ['cve_bac'];
$cve_sem = $_POST ['cve_sem'];

$nom_pad = $_POST ['nom_pad'];
$ap_pad = $_POST ['ap_pad'];
$am_pad = $_POST ['am_pad'];
$tel1_pad = $_POST ['tel1_pad'];
$tel2_pad = $_POST ['tel2_pad'];
$ecivil_pad = $_POST ['ecivil_pad'];
$correo_pad = $_POST ['correo_pad'];
$cve_pad = $_POST ['cve_pad'];
$colonia_pad = $_POST ['col_pad'];
$calle_pad = $_POST ['calle_pad'];
$no_pad = $_POST ['no_pad'];
$ocupacion_pad = $_POST ['ocupacion_pad'];
$ltrabajo_pad = $_POST ['ltrabajo_pad'];

$hinicio = $_POST ['hinicio'];
$hfin = $_POST ['hfin'];
$dia = $_POST ['dia'];
$cve_ins = $_POST ['cve_ins'];

$meses = array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre" );
//Para evitar que se quiera entrar al script sin sesion o no requerido

if($_SESSION['user_admin']==''||$_SESSION['user_docente']=='' || $_SESSION['matricula']==''){
   echo "<script>window.location='../inicio.php';</scrip>";
}
else{
	echo "Nd VACIO";

if ($_GET ['opcion'] != '') {
	$opcion = $_GET ['opcion'];
}

switch ($opcion) {
	/**
	 * ****************************************GENERAR SELECT ESTADOS*******************************
	 */
	case 1 :
		$tablaEstado = new TablaEstado (); // Un objeto de la tablaestado que permitira acceder al listado de estados
		$datosEstado = new Estado (); // Un objeto de la clase Estado que contendra un array de tipo estado
		$estados = new Estado (); // Un objeto de la clase Estado que servira para recuperar los valores de tipo estado
		$datosEstado = $tablaEstado->listaGeneralEstados (); // Llamada a la funcion
		
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona un estado--</option>";
		foreach ( $datosEstado as $estados ) { // recorre el array de tipo estado
			$cadena .= "<option value='" . $estados->getCpEstado () . "'>" . $estados->getNombreEstado () . "</option>";
		}
		echo $cadena;
		break;
	
	/**
	 * ****************************************GENERAR SELECT CIUDADES******************************
	 */
	case 2 :
		$tablaCiudad = new TablaCiudad ();
		$datosCiudad = new Ciudad ();
		$ciudades = new Ciudad ();
		$datosCiudad = $tablaCiudad->reporteEspecificoCiudad ( "cp_est", $idestado );
		
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona una ciudad--</option>";
		foreach ( $datosCiudad as $ciudades ) {
			$cadena .= "<option value='" . $ciudades->getCpCiudad () . "'>" . $ciudades->getNombreCiudad () . "</option>";
		}
		echo $cadena;
		break;
	/**
	 * ********************************************GENERAR SELECT COLONIAS**************************
	 */
	case 3 :
		$tablaColonia = new TablaColonia ();
		$datosColonia = new Colonia ();
		$colonias = new Colonia ();
		$datosColonia = $tablaColonia->reporteEspecificoColonia ( "cp_ciu", $idciudad );
		
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona una colonia--</option>";
		foreach ( $datosColonia as $colonias ) {
			$cadena .= "<option value='" . $colonias->getIdColonia () . "'>" . $colonias->getNombreColonia () . "</option>";
		}
		echo $cadena;
		break;
	/**
	 * *************************************************PONER CPPOSTAL******************************
	 */
	case 4 :
		
		$tablaColonia = new TablaColonia ();
		$datosColonia = new Colonia ();
		$colonias = new Colonia ();
		$datosColonia = $tablaColonia->reporteEspecificoCp ( "id_col", $idcolonia );
		$cadena = "";
		$cadena .= $datosColonia->getCpColonia ();
		echo $cadena;
		break;
	/**
	 * **********************************************CARGAR CICLO ACTUAL****************************
	 */
	case 5 :
		$tablaCiclo = new TablaCiclo ();
		$datosCiclo = new Ciclo ();
		$ciclo = new Ciclo ();
		$datosCiclo = $tablaCiclo->CicloActual ();
		$cadena = "";
		$cadena .= $datosCiclo->getClaveCiclo () . "#" . $datosCiclo->getNoCiclo ();
		echo $cadena;
		break;
	
	/**
	 * *****************************************CARGAR DATOS DEL ALUMNO***************************
	 */
	case 6 :
		$cadena = "";
		$tablaAlumno = new TablaAlumno ();
		$datosAlumno = new Alumno ();
		$alumnos = new Alumno ();
		$datosAlumno = $tablaAlumno->datosInvidualesAlumno ( $matricula );
		
		foreach ( $datosAlumno as $alumnos ) {
			$cadena .= $alumnos [0] . "#" . $alumnos [1] . "#" . $alumnos [2] . "#" . $alumnos [3] . "#" . $alumnos [4] . "#" . $alumnos [5] . "#" . $alumnos [6] . "#" . $alumnos [7];
		}
		echo $cadena;
		break;
	/**
	 * *****************************************CARGAR SELECT BACHILLERATOS**********************
	 */
	case 7 :
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona el bachillerato correpondiente--</option>";
		$tablaBachillerato = new TablaBachillerato ();
		$datosBachillerato = new Bachillerato ();
		$bachilleratos = new Bachillerato ();
		$datosBachillerato = $tablaBachillerato->reporteVectorBachillerato ( "cve_bac!", "1" );
		foreach ( $datosBachillerato as $bachilleratos ) {
			$cadena .= "<option value='" . $bachilleratos->getClaveBachillerato () . "'>" . $bachilleratos->getNombreBachillerato () . "</option>";
		}
		echo $cadena;
		break;
	/**
	 * **************************************BACHILLERATO DEFAULT******************************
	 */
	/**
	 * case 8:
	 * $cadena="";
	 * $tablaBachillerato=new TablaBachillerato();
	 * $datosBachillerato=new Bachillerato();
	 * $datosBachillerato=$tablaBachillerato->consultaBachillerato($b_actual);
	 * $cadena.="<option value='".$datosBachillerato->getClaveBachillerato()."'>".$datosBachillerato->getNombreBachillerato()."</option>";
	 * echo $cadena;
	 * break;
	 */
	
	/**
	 * *********************************** MODAL AGENDA EVENTOS*************************************
	 */
	case 9 :
		$cadena = "";
		$publicaciones = new Publicacion ();
		$tablaPublicacion = new TablaPublicacion ();
		$datosPublicacion = new Publicacion ();
		
		$datosPublicacion = $tablaPublicacion->modalEventos ( $mesPublicacion, $diaPublicacion );
		
		if (sizeof ( $datosPublicacion ) > 0) {
			
			foreach ( $datosPublicacion as $publicaciones ) {
				
				$cadena .= "<article class='art-post art-article'>";
				/**
				 * *********INICIO ENCABEZADO************************
				 */
				$cadena .= "<div class='art-postmetadataheader'>";
				$cadena .= "<h2 class='art-postheader'>";
				$cadena .= "<a href='blog/noticias.php?idpublicacion=" . $publicaciones [0] . "'>" . $publicaciones [5] . "</a>";
				$cadena .= "</h2>";
				$cadena .= "<div class='art-postheadericons art-metadata-icons'>";
				$cadena .= "        <img src='images/iconos/calendar-7.png' width=45 height=45> ";
				$cadena .= "        Fecha:" . @date ( "d-m-Y", strtotime ( $publicaciones [4] ) );
				$cadena .= "        Hora:" . @date ( "H:i", strtotime ( $publicaciones [4] ) );
				$cadena .= "        ";
				$cadena .= "       |<img src='images/iconos/user-3.png' width=45 height=45> ";
				$cadena .= "        <a href='#' title='Publicado por: '>Publicado por: " . $publicaciones [2] . "</a>";
				$cadena .= "        </span>";
				
				if ($publicaciones [8] != null) {
					$cadena .= "| <span class='art-postpdficon'></span>";
				}
				$cadena .= "</div>";
				$cadena .= "</div>";
				/**
				 * *********FIN DE ENCABEZADO*********************
				 */
				
				/**
				 * ********CONTENIDO******************************
				 */
				$cadena .= "<div class='art-postcontent art-postcontent-2 clearfix'>";
				$cadena .= "  <div class='art-content-layout'>";
				$cadena .= "  <div class='art-content-layout-row responsive-layout-row-2'>";
				$cadena .= "  <div class='art-layout-cell layout-item-0' style='width: 100%'>";
				
				$cadena .= "<div class='image-caption-wrapper' style='float: left;'>";
				$cadena .= "<img alt='an image' style='float:left;' class='art-lightbox' src='images/publicacion/" . $publicaciones [7] . "' width='300' height='149'>";
				$cadena .= "</div>";
				$cadena .= "<p>";
				$cadena .= "<p style='text-align: justify;'><br><br><br><br><br><br><br><br></p>";
				$cadena .= "<p style='text-align: justify;'>" . substr ( $publicaciones [6], 0, 115 ) . "...";
				$cadena .= "</p>";
				$cadena .= "</div>";
				$cadena .= "</div>";
				$cadena .= "</div>";
				$cadena .= "<br><a href='blog/noticias.php?idpublicacion=" . $publicaciones [0] . "'>Leer M&aacute;s...</a>";
				$cadena .= "</div>";
				/**
				 * ***********FIN CONTENIDO**********************
				 */
				
				/**
				 * ********PIE**********************************
				 */
				$cadena .= "<div class='art-postfootericons art-metadata-icons'>";
				$cadena .= " <span class='art-postcategoryicon'>Categoria: " . $publicaciones [3] . "</span>";
				$cadena .= "|<span class='art-postcommentsicon'><a href='#comments' title='Comments'>No hay comentarios</a></span>";
				$cadena .= "</div>";
				/**
				 * ********PIE**********************************
				 */
				$cadena .= "</article><br><br>";
			}
			echo $cadena;
		} else {
			$cadena = "<h3><img src='images/iconos/warning.ico' width='45' height='45'>&nbsp;No hay eventos agendados este dia!</h3>";
			echo $cadena;
		}
		
		break;
	
	case 10 :
		/**
		 * *****************************************CARGAR SELECT BACHILLERATOS GRAL**********************
		 */
		
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona el bachillerato correpondiente--</option>";
		$tablaBachillerato = new TablaBachillerato ();
		$datosBachillerato = new Bachillerato ();
		$bachilleratos = new Bachillerato ();
		$datosBachillerato = $tablaBachillerato->reporteVectorBachillerato ( "cve_bac!", "0" );
		foreach ( $datosBachillerato as $bachilleratos ) {
			$cadena .= "<option value='" . $bachilleratos->getClaveBachillerato () . "'>" . $bachilleratos->getNombreBachillerato () . "</option>";
		}
		echo $cadena;
		
		break;
	
	case 11 :
		/**
		 * ******************************************CARGAR SELECT SECCIONES*************************
		 */
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona la seccion--</option>";
		$tablaSeccion = new TablaSeccion ();
		$datosSeccion = new Seccion ();
		$secciones = new Seccion ();
		$datosSeccion = $tablaSeccion->listaGeneralSecciones ();
		foreach ( $datosSeccion as $secciones ) {
			$cadena .= "<option value='" . $secciones->getCodigoSeccion () . "'>" . $secciones->getNombreSeccion () . "</option>";
		}
		echo $cadena;
		
		break;
	// ACEPTAR SOLICITUD REINSCRIPCION
	case 12 :
		$alumnoStatus = new Alumno ();
		$tablaAlumno = new TablaAlumno ();
		if ($tablaAlumno->cambiarStatusAlumno ( $matricula_pro, "reinscrito" ) == "1") {
			echo "Se acepto la solicitud";
		} else {
			echo "Error";
		}
		// header('Location: '.$_SERVER['HTTP_REFERER']);
		
		break;
	// RECHAZAR SOLICITUD
	case 13 :
		$alumnoStatus = new Alumno ();
		$tablaAlumno = new TablaAlumno ();
		if ($tablaAlumno->cambiarStatusAlumno ( $matricula_pro, "proceso-re" ) == "1") {
			echo "Se cancelo la solicitud";
		} else {
			echo "Error";
		}
		// header('Location: '.$_SERVER['HTTP_REFERER']);
		
		break;
	case 14 :
		// SLIDER NOTICIAS EXAMPLE
		
		$tablanoticias = new TablaPublicacion ();
		$publicacion = new Publicacion ();
		
		$publicacion = $tablanoticias->sliderNoticias ();
		
		if (sizeof ( $publicacion ) == 0) {
			$cadena = "";
			$cadena .= "<div data-p='112.50' style='display: none;'>";
			// $cadena.="<img data-u='image' src='images/sinnoticias.jpg' /></a>";
			$cadena .= "<div data-u='thumb'>No hay noticias disponibles";
			$cadena .= "</div>";
			$cadena .= "</div>";
		} else {
			$cadena = "";
			foreach ( $publicacion as $noticias ) {
				
				/**
				 * ****************************************************************************************************************
				 * r_martinez_b@hotmail.com
				 * Junio 2016
				 * El array de noticias se indexa con los valores de la columnas de la consulta de mysql,los campos que se
				 * obtienen de acuerdo al indice del array son los siguientes que se usan para la publicacion.
				 * ******************************************************************************************************************
				 * *0 indica id publicacion ,
				 * *1 nombre del usuario(no personal),
				 * *2 tipo de usuario(docente,admin),
				 * *3 indica categoria del aviso(para docente,alumno,padre de familia,
				 * *4 indica la fecha del anuncio,
				 * *5 el titular del anuncion o noticia(solo para noticias ),
				 * *6 indica el texto de lo que contiene la publicacion,
				 * *7 indica la imagen de vista previa para la publicacion en la carpeta imagenes,
				 * *8 archivo que se sube (opcional) a la publicacion para su descarga*************
				 * ******************************************************************************************************************
				 * Se recorre el array para llenar el slider de noticias principal y se hace referencia a la publicacion de noticas por id
				 * *****************************************************************************************************************
				 */
				$cadena .= "<div data-p='112.50' style='display: none;'><a href='blog/noticias.php?idpublicacion=" . $noticias [0] . "'><img data-u='image' src='images/publicacion/" . $noticias [7] . "' /></a><div data-u='thumb'>" . $noticias [5] . " " . @date ( "d-m-Y", strtotime ( $noticias [4] ) ) . "</div></div>";
			}
		}
		echo $cadena;
		
		break;
	/**
	 * *************RECORDAR ESTADO*******************************************
	 */
	case 15 :
		$tablaEstado = new TablaEstado (); // Un objeto de la tablaestado que permitira acceder al listado de estados
		$datosEstado = new Estado (); // Un objeto de la clase Estado que contendra un array de tipo estado
		$estados = new Estado (); // Un objeto de la clase Estado que servira para recuperar los valores de tipo estado
		$datosEstado = $tablaEstado->listaGeneralEstados (); // Llamada a la funcion
		
		$cadena = "";
		
		foreach ( $datosEstado as $estados ) { // recorre el array de tipo estado
			if ($respaldoEstado == $estados->getCpEstado ()) {
				$seleccion = "selected";
			} else {
				$seleccion = "";
			}
			$cadena .= "<option " . $seleccion . " value='" . $estados->getCpEstado () . "'>" . $estados->getNombreEstado () . "</option>";
		}
		echo $cadena;
		break;
	// MODIFICAR ALUMNO EXTRA
	case 16 :
		$alumnoExtra = new AlumnoExtra ();
		$alumnoExtra->setMatriculaAlumnoExtra ( $matri_extra );
		$alumnoExtra->setPSaludAlumno ( $psalud1 . "," . $psalud2 );
		$alumnoExtra->setBecaAlumno ( $beca1 . "," . $beca2 );
		$alumnoExtra->setServicioSaludAlumno ( $ssalud1 . "," . $ssalud2 );
		$alumnoExtra->setIdiomaAlumno ( $idioma1 . "," . $idioma2 );
		$alumnoExtra->setLugarNacimientoExtra ( $lnac_aluex );
		$alumnoExtra->setSexoAlumnoExtra ( $sexo_aluex );
		
		$tablaAlumnoExtra = new TablaAlumnoExtra ();
		
		if ($tablaAlumnoExtra->modificarAlumnoExtra ( $alumnoExtra ) == "1") {
			echo "SE GUARDARON LOS DATOS ADICIONALES";
		} else {
			echo "ERROR AL GUARDAR LOS DATOS ADICIONALES";
		}
		break;
	// MODIFICAR PADRE
	case 17 :
		$padreModificar = new Padre ();
		$tablaPadreModificar = new TablaPadre ();
		$datosPadreModificar = new Padre ();
		
		$padreModificar->setClavePadre ( $cve_pad );
		$padreModificar->setNombrePadre ( $nom_pad );
		$padreModificar->setAPaternoPadre ( $ap_pad );
		$padreModificar->setAMaternoPadre ( $am_pad );
		$padreModificar->setTel1Padre ( $tel1_pad );
		$padreModificar->setTel2Padre ( $tel2_pad );
		$padreModificar->setECivilPadre ( $ecivil_pad );
		$padreModificar->setCorreoPadre ( $correo_pad );
		$padreModificar->setColoniaPadre ( $colonia_pad );
		$padreModificar->setCallePadre ( $calle_pad );
		$padreModificar->setNoPadre ( $no_pad );
		$padreModificar->setOcupacionPadre ( $ocupacion_pad );
		$padreModificar->setLugarTrabajoPadre ( $ltrabajo_pad );
		if ($tablaPadreModificar->modificarPadre ( $padreModificar ) == "1") {
			echo "SE MODIFICARON LOS DATOS DEL TUTOR";
		} else {
			echo "ERROR AL MODIFICAR LOS DATOS DEL TUTOR";
		}
		
		break;
	case 18 :
		$cadenaReporte = "";
		$inscripcion = new Inscripcion ();
		$tablaInscripcion = new TablaInscripcion ();
		$noSolicitudes = new TablaInscripcion ();
		$reporte = new Inscripcion ();
		if ($_POST ['busqueda'] != '') {
			$inscripcion = $tablaInscripcion->consultaSolicitudInscripcion ( $_POST ['busqueda'] );
		} else {
			$inscripcion = $tablaInscripcion->reporteGeneralSolicitudes ();
		}
		
		if (sizeof ( $inscripcion ) > 0) {
			$numero = $noSolicitudes->noSolicitudesReinscripcion ();
			$cadenaReporte .= "<div align=left>";
			$cadenaReporte .= "<h3 align='center'>NO. SOLICITUDES ENCONTRADAS:" . sizeof ( $inscripcion ) . "</h3>";
			$cadenaReporte .= "<h3 align='center'>NO. SOLICITUDES PENDIENTES:" . $numero . "</h3></div>";
			$cadenaReporte .= "<table width='710' cellpadding='2' cellspacing='01' border='0' id='calendar'>";
			$cadenaReporte .= "<tr id='noborder'>";
			$cadenaReporte .= "<td colspan='9' class='subHeader' bgcolor='#FFFFFF'>&nbsp;</td>";
			$cadenaReporte .= "</tr>";
			$cadenaReporte .= "<tr id='weekdays' bgcolor='#003399'>";
			$cadenaReporte .= "<th align='center' width='15%' class='smallText'>FOLIO</th>";
			$cadenaReporte .= "<th align='center' width='15%' class='smallText'>MATRICULA</th>";
			$cadenaReporte .= "<th align='center' width='14%' class='smallText'>NOMBRE</th>";
			$cadenaReporte .= "<th align='center' width='14%' class='smallText'>BACHILLERATO</th>";
			$cadenaReporte .= "<th align='center' width='14%' class='smallText'>SECCION</th>";
			$cadenaReporte .= "<th align='center' width='14%' class='smallText'>SEMESTRE</th>";
			$cadenaReporte .= "<th align='center' width='14%' class='smallText'>FECHA SOLICITUD </th>";
			$cadenaReporte .= "<th align='center' width='14%' class='smallText'>TIPO DE SOLICITUD </th>";
			$cadenaReporte .= "<th align='center' width='15%' class='smallText'>STATUS ALUMNO </th>";
			$cadenaReporte .= "</tr>";
			foreach ( $inscripcion as $reporte ) {
				$cadenaReporte .= "<tr id='calheader' bgcolor='#ffffcc'>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>" . $reporte [0] . "</td>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>" . $reporte [1] . "</td>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>" . $reporte [2] . " " . $reporte [3] . " " . $reporte [4] . "</td>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>" . $reporte [5] . "</td>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>" . $reporte [6] . "</td>";
				$mes = substr ( @date ( "d-m-Y", strtotime ( $reporte [8] ) ), 4, 1 );
				$dia = @date ( "d", strtotime ( $reporte [8] ) );
				$titulomes = $meses [$mes - 1];
				$year = @date ( "Y", strtotime ( $reporte [8] ) );
				$cadenaFecha = $dia . " de " . $titulomes . " del " . $year;
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>" . $reporte [7] . "</td>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallTex'>" . $cadenaFecha . "</td>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>" . strtoupper ( $reporte [9] ) . "</td>";
				$cadenaReporte .= "<td valign='top' align='center' class='smallText'>";
				
				if ($reporte [10] == "proceso-re") {
					
					$cadenaReporte .= "<br>";
					$cadenaReporte .= "<h3><a href='../usuarios/alumnos/calificacion_alumno.php?matricula=" . $reporte [1] . "' target='_blank' ><img src='images/iconos/book.png' width=45 heigth=55>Ver calificaciones </a></h3><br>";
					$cadenaReporte .= "<h3>EN PROCESO DE REINSCRIPCI&Oacute;N</h3>";
					$cadenaReporte .= "<a href='#' onclick=\"javascript:aceptarReinscripcion('12','" . $reporte [1] . "');\"  style=text-decoration:none;>";
					$cadenaReporte .= "<img src=../images/iconos/stop.png width=50 heigth=50 style='border:none;'>";
					$cadenaReporte .= "VALIDAR SOLICITUD";
					$cadenaReporte .= "</a>";
				} else {
					if ($reporte [10] == "reinscrito") {
						$cadenaReporte .= "<a href='asignar_materias.php?matricula=" . $reporte [1] . "'><img src='images/iconos/8_48x48.png' width=35 heigth=35>Asignar materias</a>";
						$cadenaReporte .= "<h3 style='color:blue;'>" . strtoupper ( $reporte [10] ) . "</h3>";
						$cadenaReporte .= "<br>";
						$cadenaReporte .= "<a href='#' onclick=\"javascript:cancelarReinscripcion('13','" . $reporte [1] . "');\" style='text-decoration:none;'>";
						$cadenaReporte .= "<img src='../images/iconos/tick.ico' width='50' heigth='50' style='border:none;'>";
						$cadenaReporte .= "CANCELAR SOLICITUD</a>";
					} else {
						if ($reporte [10] == "proceso_in") {
						} else {
							$cadenaReporte .= "&nbsp;";
						}
					}
				}
				$cadenaReporte .= "</td>";
				$cadenaReporte .= "</tr>";
			}
			
			$cadenaReporte .= "<tr>";
			$cadenaReporte .= "<td colspan='9' valign='top' class='smallText'>&nbsp;</td>";
			$cadenaReporte .= "</tr>";
		} else {
			$cadenaReporte .= "<tr><td valign='top' align='center' class='smallText' style='text-align:center;'>";
			$cadenaReporte .= "<h3><b>No se encontraron coindicencias</h3></b><br>";
			$cadenaReporte .= "<a style='text-decoration:none;' href='javascript:cargarReporte();'><b>Cancelar</b></a></td></tr>";
		}
		$cadenaReporte .= "</table>";
		echo $cadenaReporte;
		
		break;
	case 19 :
		$inscripcion = new Inscripcion ();
		
		$inscripcion->setClaveSemestre ( $cve_sem );
		$inscripcion->setClaveBachilleratoInscripcion ( $cve_bac );
		$inscripcion->setMatriculaAlumnoInscripcion ( $mat_alu );
		
		$tablaInscripcionModificar = new TablaInscripcion ();
		
		if ($tablaInscripcionModificar->modificarInscripcion ( $inscripcion ) == "1") {
			// $alumnoModificarStatus=new Alumno();
			// $tablaAlumnoModificarStatus=new TablaAlumno();
			
			// $tablaAlumnoModificarStatus->cambiarStatusAlumno($mat_alu,"proceso-re");
			echo "Datos modificados";
		} else {
			echo "Error";
		}
		break;
	
	case 20 :
		/**
		 * *****************************************CARGAR SELECT BACHILLERATOS 5 y 6**********************
		 */
		
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona el bachillerato correpondiente--</option>";
		$tablaBachillerato = new TablaBachillerato ();
		$datosBachillerato = new Bachillerato ();
		$bachilleratos = new Bachillerato ();
		$datosBachillerato = $tablaBachillerato->reporteVectorBachillerato ( "cve_bac!", "1" );
		foreach ( $datosBachillerato as $bachilleratos ) {
			$cadena .= "<option value='" . $bachilleratos->getClaveBachillerato () . "'>" . $bachilleratos->getNombreBachillerato () . "</option>";
		}
		echo $cadena;
		
		break;
	/**
	 * *************LISTA DE MATERIAS***************************************
	 */
	case 21 :
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona la materia--</option>";
		$tablaMateria = new TablaMateria ();
		$datosMateria = new Materia ();
		$materias = new Materia ();
		$datosMateria = $tablaMateria->ConsultaSemestreMateria ( $_POST ['cargaSemestre'], $_POST ['cargaBachillerato'] );
		if (sizeof ( $datosMateria ) > 0) {
			foreach ( $datosMateria as $materias ) {
				$cadena .= "<option value='" . $materias->getSiiaMateria () . "'>" . $materias->getNombreMateria () . "</option>";
			}
		} else {
			$cadena .= "";
		}
		echo $cadena;
		break;
	
	/**
	 * *************LISTA DE DOCENTES***************************************
	 */
	case 22 :
		$cadena = "";
		$cadena .= "<option value='0'>--Selecciona el docente-</option>";
		$tablaDocente = new TablaDocente ();
		$datosDocente = new Docente ();
		$docentes = new Docente ();
		$datosDocente = $tablaDocente->reporteDocentes ();
		if (sizeof ( $datosDocente ) > 0) {
			foreach ( $datosDocente as $docentes ) {
				$cadena .= "<option value='" . $docentes->getClaveDocente () . "'>" . $docentes->getAPaternoDocente () . " " . $docentes->getAMaternoDocente () . " " . $docentes->getNombreDocente () . "</option>";
			}
		} else {
			$cadena .= "";
		}
		echo $cadena;
		break;
	
	case 23 :
		$docenteMateria = new DocenteMateria ();
		$tablaDocenteMateria = new TablaDocenteMateria ();
		
		$docenteMateria->setNoDocenteMateria ( null );
		$docenteMateria->setClaveDocenteMateria ( $_POST ['docenteAsignado'] );
		$docenteMateria->setSiiaDocenteMateria ( $_POST ['materiaAsignada'] );
		$docenteMateria->setClaveCicloDocenteMateria ( $_POST ['cicloAsignado'] );
		
		if ($tablaDocenteMateria->guardarDocenteMateria ( $docenteMateria ) == "1") {
			echo "Se asigno la materia al docente";
		} else {
			if ($tablaDocenteMateria->guardarDocenteMateria ( $docenteMateria ) == "2") {
				echo "La materia ya fue asignada a este docente";
			} else {
				echo "Error de bd";
			}
		}
		break;
	
	/**
	 * ******************DOCENTE MATERIAS *****************************************
	 */
	case 24 :
		$inscripcionRenglon = new InscripcionRenglon ();
		$datosInscripcionRenglon = new InscripcionRenglon ();
		$tablaInscripcionRenglon = new TablaInscripcionRenglon ();
		$cadenaRenglonInscripcion = "";
		$datosInscripcionRenglon = $tablaInscripcionRenglon->consultaDocenteInscripcion ( $_POST ['siiaInscripcion'] );
		if (sizeof ( $datosInscripcionRenglon ) > 0) {
			foreach ( $datosInscripcionRenglon as $inscripcionRenglon ) {
				$cadenaRenglonInscripcion .= "<option value='" . $inscripcionRenglon [0] . "'>" . $inscripcionRenglon [3] . " " . $inscripcionRenglon [4] . " " . $inscripcionRenglon [2] . "</option>";
			}
		} else {
			$cadenaRenglonInscripcion .= "<option value='0'>--No hay maestro(s) asignado(s) a esta materia--</option>";
		}
		echo $cadenaRenglonInscripcion;
		break;
	
	/**
	 * ******************VALIDAR HORAS HORARIO *****************************************
	 */
	case 25 :
		
		$inscripcionRenglon = new InscripcionRenglon ();
		$tablaRenglonInscripcion = new TablaInscripcionRenglon ();
		if ($tablaRenglonInscripcion->validarHoras ( $hinicio, $hfin, $dia, $cve_ins ) == "1") {
			echo "1";
		} else {
			echo "0";
		}
		break;
	case 26:
		/*$alumnoLogin=new Alumno();
		$tablaAlumnoLogin=new TablaAlumno();
		
		if($tablaAlumnoLogin->consultaAlumno($user)=="2"){
			echo "2";
		}
		else{
			if($tablaAlumno->consultaAlumno($user)=="0"){
				echo "1";
			}
		}
		*/
		
	break;
	case 27 : // ASIGNAR MATERIAS DOCENTE
		$docenteMaterias = new DocenteMateria ();
		$datosDocenteMaterias = new DocenteMateria ();
		$tablaDocenteMaterias = new TablaDocenteMateria ();
		$docenteMaterias = $tablaDocenteMaterias->reporteMateriasDocente ( $_POST ['cve_doc'] );
		if (sizeof ( $docenteMaterias ) > 0) {
			$cadenaReporteMaterias = '
	  <label> <h3 align="center" style="color:red;">N&uacute;mero de materias:<b style="color:blue;">' . sizeof ( $docenteMaterias ) . '</b></h3></label>
	  <table width="710" cellpadding="2" cellspacing="01" border="0" id="calendar">
	  <tbody>
	  <tr id="noborder">
	  <td colspan="10" class="subHeader">&nbsp;</td></tr>
	  <tr id="weekdays" bgcolor="#003399">
	  <th align="center" width="15%" class="smallText">FOLIO</th>
	  <th align="center" width="15%" class="smallText">INC</th>
	  <th align="center" width="14%" class="smallText">NOMBRE</th>
	  <th align="center" width="14%" class="smallText">SIIA</th>
	  <th align="center" width="14%" class="smallText">MATERIA</th>
	  <th align="center" width="14%" class="smallText">CICLO</th>
	  <th align="center" width="14%" class="smallText">BACHILLERATO</th>
	  <th align="center" width="14%" class="smallText">SEMESTRE</th>
	  <th align="center" width="14%" class="smallText">&nbsp;</th>
	  </tr>
	';
			foreach ( $docenteMaterias as $datosDocenteMaterias ) {
				$cadenaReporteMaterias .= '
      <tr id="calheader" bgcolor="#ffffcc">
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [0] . '</td>
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [1] . '</td>
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [2] . ' ' . $datosDocenteMaterias [3] . ' ' . $datosDocenteMaterias [4] . '</td>
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [5] . '</td>
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [6] . '</td>
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [7] . '</td>
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [9] . '</td>
	  <td valign="top" align="center" class="smallText">' . $datosDocenteMaterias [8] . '</td>
	  <td valign="top" align="center" class="smallText"><a style="text-decoration:none;" href="cambiar_materia.php?cve_doc=' . $datosDocenteMaterias [1] . '&siia=' . $datosDocenteMaterias [5] . '"><img src="images/iconos/delete.ico" width="35" heigth="35">Quitar materia</a></td>
	 </tr>
      ';
			}
			$cadenaReporteMaterias .= '
       <tr><td colspan="9" valign="top" class="smallText">&nbsp;</td></tr></tbody></table>
      ';
			echo $cadenaReporteMaterias;
		} else {
			echo "<label><h3 style='color:red;'><img src='images/iconos/informacion.png' width='35' heigth='35'> No hay materias asignadas para este docente</h3></label>";
		}
		
		break;
	case 28 :
		// existePadre
		$padreCorreo = new Padre ();
		$tablaPadre = new TablaPadre ();
		
		if ($tablaPadre->existePadre ( $_POST ['correo_padre'], $_POST ['correo_padre'] ) == "1") {
			echo "1";
		} else {
			echo "2";
		}
		
		break;
	
	case 29 :
		// LISTA DE EVENTOS DEL DIA DE HOY
		$cadena = "";
		$listaPublicaciones = new Publicacion ();
		$tablaPublicacionEventos = new TablaPublicacion ();
		$datosPublicacion = new Publicacion ();
		
		$datosPublicacion = $tablaPublicacionEventos->acordeonEventos ( $_POST ['mes'], $_POST ['dia'] );
		

		if (sizeof ( $datosPublicacion ) > 0) {
			foreach ( $datosPublicacion as $listaPublicaciones ) {
				/*
				 * *0 indica id publicacion ,
				 * *1 nombre del usuario(no personal),
				 * *2 tipo de usuario(docente,admin),
				 * *3 indica categoria del aviso(para docente,alumno,padre de familia,
				 * *4 indica la fecha del anuncio,
				 * *5 el titular del anuncion o noticia(solo para noticias ),
				 * *6 indica el texto de lo que contiene la publicacion,
				 * *7 indica la imagen de vista previa para la publicacion en la carpeta imagenes,
				 * *8 archivo que se sube (opcional) a la publicacion para su descarga*************
				 **10 fecha de la publicacion a futuro(si es un evento)
				 */
                 $mes = substr ( @date ( "d-m-Y", strtotime ($listaPublicaciones[10] ) ), 3, 2 );
			     $dia = @date ( "d", strtotime ($listaPublicaciones[10] ) );
			     $titulo_mes = $meses [$mes - 1];
			     $year = @date ( "Y", strtotime ( $listaPublicaciones[10]) );
			     $cadenaFecha ="<span class='badge' style='font-size:13px;'>". $dia . " de " . $titulo_mes . " del " . $year."</span><br>";
				 $cadena .= "<li><a style='text-decoration:none;color:#000034;' href='blog/noticias.php?idpublicacion=" . $listaPublicaciones [0] . "'>";
				 $cadena .= $cadenaFecha."&nbsp;" . $listaPublicaciones [5] . "</a></li>";
			}
		} else {
			$cadena .= "<li>&nbsp;<img src='images/iconos/warning.ico' width='35' heigth='30'>&nbsp;¡No hay eventos hoy!</li>";
		}
		$cadena .= "";
		echo $cadena;
		
		break;
	//Login alumno
	case 33:
		$tablaAlumnoLogin=new TablaAlumno();
		
		
		if($tablaAlumnoLogin->existeUsuarioAlumno($_POST['usuario'],$_POST['usuario'])){
			echo "1";
			
		}
		else {
			echo  "0";
		}
		
		break;
		case 34:
			// SLIDER EXAMPLE
		
		$tablanoticias = new TablaPublicacion ();
		$publicacion = new Publicacion ();
		
		$publicacion = $tablanoticias->sliderNoticias ();
		
		if (sizeof ( $publicacion ) == 0) {
			$cadena = "";
			$cadena .= "    <div class='slider-wrapper theme-light'>";
			// $cadena.="<img data-u='image' src='images/sinnoticias.jpg' /></a>";
			$cadena .= "<div id='slider' class='nivoSlider'>";
			$cadena.="<img src='../data1/images/morelos_opacity.png' title='No hay noticias disponibles' />";
			$cadena .= "</div>";
			$cadena .= "</div>";
		} else {
			$cadena = "";
			foreach ( $publicacion as $noticias ) {
				
				/**
				 * ****************************************************************************************************************
				 * r_martinez_b@hotmail.com
				 * Junio 2016
				 * El array de noticias se indexa con los valores de la columnas de la consulta de mysql,los campos que se
				 * obtienen de acuerdo al indice del array son los siguientes que se usan para la publicacion.
				 * ******************************************************************************************************************
				 * *0 indica id publicacion ,
				 * *1 nombre del usuario(no personal),
				 * *2 tipo de usuario(docente,admin),
				 * *3 indica categoria del aviso(para docente,alumno,padre de familia,
				 * *4 indica la fecha del anuncio,
				 * *5 el titular del anuncion o noticia(solo para noticias ),
				 * *6 indica el texto de lo que contiene la publicacion,
				 * *7 indica la imagen de vista previa para la publicacion en la carpeta imagenes,
				 * *8 archivo que se sube (opcional) a la publicacion para su descarga*************
				 * ******************************************************************************************************************
				 * Se recorre el array para llenar el slider de noticias principal y se hace referencia a la publicacion de noticas por id
				 * *****************************************************************************************************************
				 */
			    $cadena.="<a href='blog/noticias.php?idpublicacion=" . $noticias [0] . "'><img  src='../images/publicacion/" . $noticias [7] . "' width=320 heigth=320 title=''></a>";
            
			}
		}
		echo $cadena;
		case 35:
			//OBTENER ARREGLO DE MATRICULAS
			//$tablaAlumno=new TablaAlumno();
			//$arregloMatriculas=$tablaAlumno->obtenerListaMatriculas();
			//$cadena="";
			//foreach ($arregloMatriculas as $a)  {
			//	$cadena.=$a."-";
			//}
			echo $cadena;
		
		break;
	default :
		break;
}

}
?>