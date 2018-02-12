<?php
require_once 'Ciudad.php';
require_once 'Conexion.php';
class TablaCiudad extends Conexion {
	private $conexion;
	private $_ciudades = array ();
	private $vectorCiudades = array ();
	public function __construct() {
		$this->tabla = "ciudad";
		// $this->crearConexion();
		$this->open ( '../archivos/pais.db' );
	}
	public function add(Ciudad $ciudad) {
		$this->_ciudades [] = $ciudad;
	}
	public function reporteEspecificoCiudad($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noCiudades () > 0) {
			$db = new TablaCiudad ();
			if (! $db) {
				// echo $db->lastErrorMsg();
				return 0;
			} else {
				$vectorCiudades = array ();
				$sql = "SELECT *FROM ciudad WHERE " . $criterio . "='" . $busqueda . "' ";
				
				$qry = $db->query ( $sql );
				while ( $ren = $qry->fetchArray ( SQLITE3_ASSOC ) ) {
					$ciudad = new Ciudad ();
					$ciudad->setCpCiudad ( $ren ['cp_ciu'] );
					$ciudad->setNombreCiudad ( $ren ['nom_ciu'] );
					$ciudad->setCpEstado ( $ren ['cp_est'] );
					
					$vectorCiudades [] = $ciudad;
				}
				return $vectorCiudades;
			}
		}
	}
	public function noCiudades() {
		$db = new TablaCiudad ();
		if (! $db) {
			// echo $db->lastErrorMsg();
			return 0;
		} else {
			$sql = "SELECT COUNT(cp_ciu) as cuenta FROM ciudad";
			$result = $db->query ( $sql );
			while ( $ren = $result->fetchArray ( SQLITE3_ASSOC ) ) {
				$no_resultados = $ren ['cuenta'];
			}
			if ($no_resultados > 0) {
				$cuenta = $no_resultados;
				return $cuenta;
			} else {
				return 0;
			}
		}
	}
}
?>