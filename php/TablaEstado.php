<?php
require_once 'Estado.php';
require_once 'Conexion.php';
class TablaEstado extends Conexion {
	private $conexion;
	private $_estados = array ();
	private $vectorEstados = array ();
	public function __construct() {
		$this->tabla = "estado";
		// $this->crearConexion();
		$this->open ( '../archivos/pais.db' );
	}
	public function add(Estado $estado) {
		$this->_estados [] = $estado;
	}
	public function noEstados() {
		$db = new TablaEstado ();
		if (! $db) {
			// echo $db->lastErrorMsg();
			return 0;
		} else {
			$sql = "SELECT COUNT(cp_est) as cuenta FROM estado";
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
	public function consultaEstado($cp_est) {
		$db = new TablaEstado ();
		if (! $db) {
			// echo $db->lastErrorMsg();
			return 0;
		} else {
			$estado = new Estado ();
			
			$sql = "SELECT *FROM estado WHERE cp_est='" . $cp_est . "'";
			$qry = $db->query ( $sql );
			if ($qry) {
				$ren = $qry->fetchArray ( SQLITE3_ASSOC );
				$estados = new Estado ();
				$estados->setCpEstado ( $ren ['cp_est'] );
				$estados->setNombreEstado ( $ren ['nom_est'] );
				
				return $estados;
			} else {
				return 0; // ERROR
			}
		}
	}
	public function listaGeneralEstados() {
		if ($this->noEstados () > 0) {
			$db = new TablaEstado ();
			if (! $db) {
				echo $db->lastErrorMsg ();
			} else {
				$vectorEstados = array ();
				$sql = "SELECT * from estado";
				$ret = $db->query ( $sql );
				while ( $row = $ret->fetchArray ( SQLITE3_ASSOC ) ) {
					$estado = new Estado ();
					$estado->setCpEstado ( $row ['cp_est'] );
					$estado->setNombreEstado ( $row ['nom_est'] );
					$vectorEstados [] = $estado;
				}
				return $vectorEstados;
				$db->close ();
			}
		}
	}
}
?>