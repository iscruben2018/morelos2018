<?php
require_once 'Conexion.php';
require_once 'Inscripcion.php';
class TablaInscripcion extends Conexion {
	private $tabla;
	private $vectorSolicitudes = array ();
	private $vectorInscripciones = array ();
	public function __construct() {
		$this->tabla = "inscripcion";
		$this->crearConexion ();
		parent::crearConexion ();
	}
	public function existeInscripcionAlumno($matri_alu) {
		$sql = "SELECT *FROM inscripcion WHERE matri_alu='" . $matri_alu . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	
	/**
	 * ***************CONTAR SOLICITUDES**********************
	 */
	public function noSolicitudesReinscripcion() {
		$sql = "SELECT COUNT(matri_alu) as cuenta FROM alumno where status_alu='proceso-re'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function reporteGeneralSolicitudes() {
		$qry = "SELECT cve_ins,inscripcion.matri_alu,ap_alu,am_alu,nom_alu,nom_bac,no_sec,semestre.nom_sem,fecha_ins,tipo_ins,status_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem order by cve_ins,status_alu asc";
		@mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorSolicitudes = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorSolicitudes [] = $ren;
			}
			return $vectorSolicitudes;
		} else {
			return $vectorSolicitudes;
		}
	}
	public function reporteGeneralReinscritos() {
		$qry = "SELECT cve_ins,inscripcion.matri_alu,ap_alu,am_alu,nom_alu,nom_bac,no_sec,semestre.nom_sem,fecha_ins,tipo_ins,status_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem where status_alu='reinscrito' order by ap_alu asc";
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorSolicitudes = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorSolicitudes [] = $ren;
			}
			return $vectorSolicitudes;
		} else {
			return $vectorSolicitudes;
		}
	}
	public function reporteGeneralNoInscritos() {
		$yearActual = @date ( "y" );
		$year1 = $yearActual - 1;
		$year2 = $yearActual - 2;
		// $year3=$yearActual-3;
		// FILTRAR MATRICULAS Actual,un año antes y dos años antes
		
		// $qry = "SELECT *FROM alumno WHERE matri_alu NOT IN(SELECT matri_alu FROM inscripcion) AND cve_bac!='' and deuda_alu='0' ORDER BY ap_alu asc";
		// $qry="SELECT *FROM alumno WHERE matri_alu NOT IN(SELECT matri_alu FROM inscripcion) and matri_alu like '%15%' or matri_alu like '%14%' and(cve_bac!='' and deuda_alu='0') ORDER BY ap_alu,matri_alu asc";
		$qry = "select *from alumno where matri_alu  not in(SELECT inscripcion.matri_alu from inscripcion) and  deuda_alu='0' and (cve_bac!='' and matri_alu like '%" . $year2 . "%' or matri_alu like '%" . $year1 . "%' or matri_alu like '%" . $yearActual . "%') ORDER BY  ap_alu,matri_alu asc";
		@mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorSolicitudes = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorSolicitudes [] = $ren;
			}
			return $vectorSolicitudes;
		} else {
			return $vectorSolicitudes;
		}
	}
	public function consultaSolicitudInscripcion($matricula) {
		$qry = "SELECT cve_ins,inscripcion.matri_alu,ap_alu,am_alu,nom_alu,nom_bac,no_sec,semestre.nom_sem,fecha_ins,tipo_ins,status_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem where inscripcion.matri_alu='" . $matricula . "' order by fecha_ins asc";
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorSolicitudes = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorSolicitudes [] = $ren;
			}
			return $vectorSolicitudes;
		} else {
			return $vectorSolicitudes;
		}
	}
	public function consultaDatosInscripcion($matricula) {
		$qry = "SELECT cve_ins,fecha_ins,turno_ins,tipo_ins,inscripcion.cve_bac,nom_bac,inscripcion.cod_sec,no_sec,inscripcion.cve_sem,semestre.nom_sem,inscripcion.matri_alu,ap_alu,am_alu,nom_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem  where inscripcion.matri_alu='" . $matricula . "' order by fecha_ins asc";
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorDatos = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorDatos [] = $ren;
			}
			return $vectorDatos;
		} else {
			return $vectorDatos;
		}
	}
	public function consultaInscripcion($matricula) {
		$qry = "SELECT *from inscripcion where matri_alu='" . $matricula . "' order by fecha_ins asc";
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorInscripciones = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorInscripciones [] = $ren;
			}
			return $vectorInscripciones;
		} else {
			return $vectorInscripciones;
		}
	}
	public function modificarInscripcion(Inscripcion $inscripcion) {
		if ($this->existeInscripcionAlumno ( $inscripcion->getMatriculaAlumnoInscripcion () ) == "1") {
			$sql = "UPDATE inscripcion SET cve_sem='" . $inscripcion->getClaveSemestre () . "',cve_bac='" . $inscripcion->getClaveBachilleratoInscripcion () . "' WHERE matri_alu='" . $inscripcion->getMatriculaAlumnoInscripcion () . "'";
			// echo $sql;
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE ACTUALIZARON LOS DATOS
			} else {
				return 0; // ERROR EN LA ACTUALIZACION O NO SE MODIFICARON REGISTROS
			}
		} else {
			return 2; // NO EXISTE
		}
	}
	public function guardarInscripcion(Inscripcion $inscripcion) {
		if ($this->existeInscripcionAlumno ( $inscripcion->getMatriculaAlumnoInscripcion () ) == "0") {
			$sql = "INSERT INTO inscripcion VALUES(null,'" . $inscripcion->getFechaInscripcion () . "','" . $inscripcion->getTurnoInscripcion () . "','" . $inscripcion->getTipoInscripcion () . "','" . $inscripcion->getClaveCicloInscripcion () . "','" . $inscripcion->getClaveSemestre () . "','" . $inscripcion->getMatriculaAlumnoInscripcion () . "','" . $inscripcion->getCodigoSeccionInscripcion () . "','" . $inscripcion->getClaveBachilleratoInscripcion () . "','" . $inscripcion->getEscuelaProcedencia () . "','" . $inscripcion->getPromedioInscripcion () . "','" . $inscripcion->getEscuelaFicha () . "')";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE GUARDO
			} else {
				return 0; // ERROR AL GUARDAR
			}
		} else {
			return 2; // LOS DATOS YA EXISTEN
		}
	}
}
?>