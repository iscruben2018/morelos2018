<?php
require_once 'Calificacion.php';
require_once 'Conexion.php';

class TablaCalificacion extends Conexion{
	private $conexion;
	private $_calificaciones = array ();
	private $vectorCalificaciones = array ();
	public function __construct() {
		$this->tabla = "calificacion";
		$this->crearConexion ();
	}
	public function add(Calificacion $calificacion) {
		$this->_calificaciones [] = $calificacion;
	}
	public function noCalificaciones() {
		$sql = "SELECT COUNT(cve_cal) as cuenta FROM calificacion";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function reporteEspecificoCalificacion($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noCalificaciones () > 0) {
			
			$vectorCalificaciones = array ();
			$sql = "SELECT *FROM calificacion WHERE " . mysql_escape_string($criterio) . "='" . mysql_escape_string($busqueda) . "' ";
		
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$calificacion = new Calificacion ();
				$calificacion->setSiia ( $ren ['siia'] );
				$calificacion->setClaveCalificacion ( $ren ['cve_cal'] );
				$calificacion->setPrimeraCalificacion ( $ren ['1a_cal'] );
				$calificacion->setSegundaCalificacion ( $ren ['2a_cal'] );
				$calificacion->setTerceraCalificacion ( $ren ['3a_cal'] );
				$calificacion->setPromedioCalificacion ( $ren ['prom_cal'] );
				$calificacion->setSemestralCalificacion ( $ren ['sem_cal'] );
				$calificacion->setOrdinarioCalificacion ( $ren ['ord_cal'] );
				$calificacion->setExtraCalificacion ( $ren ['ext_cal'] );
				$calificacion->setRegularizacionCalificacion ( $ren ['reg_cal'] );
				
				$vectorCalificaciones [] = $calificacion;
			}
			return $vectorCalificaciones;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function listaGeneralCalificaciones() {
		if ($this->noCalificaciones () > 0) {
			
			$vectorCalificaciones = array ();
			$sql = "SELECT *FROM calificacion ORDER BY cve_cal ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$calificacion = new Calificacion ();
				$calificacion->setClaveCalificacion ( $ren ['cve_cal'] );
				$calificacion->setPrimeraCalificacion ( $ren ['1a_cal'] );
				$calificacion->setSegundaCalificacion ( $ren ['2a_cal'] );
				$calificacion->setTerceraCalificacion ( $ren ['3a_cal'] );
				$calificacion->setPromedioCalificacion ( $ren ['prom_cal'] );
				$calificacion->setSemestralCalificacion ( $ren ['sem_cal'] );
				$calificacion->setOrdinarioCalificacion ( $ren ['ord_cal'] );
				$calificacion->setExtraCalificacion ( $ren ['ext_cal'] );
				$calificacion->setRegularizacionCalificacion ( $ren ['ext_cal'] );
				
				$vectorCalificaciones [] = $calificacion;
			}
			return $vectorCalificaciones;
		} else {
			return 0; // NO HAY RESULTADOSs
		}
	}
}
?>