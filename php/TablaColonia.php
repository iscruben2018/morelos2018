<?php
require_once 'Colonia.php';
require_once 'Conexion.php';
class TablaColonia extends Conexion {
	private $conexion;
	private $_colonias = array ();
	private $vectorColonias = array ();
	public function __construct() {
		$this->tabla = "colonia";
		// $this->crearConexion();
		$this->open ( '../archivos/pais.db' );
	}
	public function add(Colonia $colonia) {
		$this->_colonias [] = $colonia;
	}
	public function reporteEspecificoColonia($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noColonias () > 0) {
			$db = new TablaColonia ();
			if (! $db) {
				// echo $db->lastErrorMsg();
				return 0;
			} else {
				
				$vectorColonias = array ();
				$sql = "SELECT *FROM colonia WHERE " . $criterio . "='" . $busqueda . "' ORDER BY nom_col ASC";
				$qry = $db->query ( $sql );
				while ( $ren = $qry->fetchArray ( SQLITE3_ASSOC ) ) {
					$colonia = new Colonia ();
					$colonia->setIdColonia ( $ren ['id_col'] );
					$colonia->setCpColonia ( $ren ['cp_col'] );
					$colonia->setNombreColonia ( $ren ['nom_col'] );
					$colonia->setCpCiudadColonia ( $ren ['cp_ciu'] );
					
					$vectorColonias [] = $colonia;
				}
				return $vectorColonias;
			}
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function reporteEspecificoCp($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noColonias () > 0) {
			$db = new TablaColonia ();
			if (! $db) {
				// echo $db->lastErrorMsg();
				return 0;
			} else {
				$sql = "SELECT cp_col FROM colonia WHERE " . $criterio . "='" . $busqueda . "' ORDER BY cp_col ASC";
				$qry = $db->query ( $sql );
				$ren = $qry->fetchArray ( SQLITE3_ASSOC );
				$colonia = new Colonia ();
				$colonia->setIdColonia ( $ren ['id_col'] );
				$colonia->setCpColonia ( $ren ['cp_col'] );
				$colonia->setNombreColonia ( $ren ['nom_col'] );
				$colonia->setCpCiudadColonia ( $ren ['cp_ciu'] );
				return $colonia;
			}
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function noColonias() {
		$db = new TablaColonia ();
		if (! $db) {
			// echo $db->lastErrorMsg();
			return 0;
		} else {
			$sql = "SELECT COUNT(id_col) as cuenta FROM colonia";
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