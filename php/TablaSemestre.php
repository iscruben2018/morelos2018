<?php
require_once 'Semestre.php';
require_once 'Conexion.php';
class TablaSemestre extends Conexion {
	private $conexion;
	private $_semestres = array ();
	private $vectorSemestres = array ();
	public function __construct() {
		$this->crearConexion ();
		// $this->$tabla="semestre";
		// parent::crearConexion();
	}
	public function noSemestres() {
		$sql = "SELECT COUNT(cve_sem) as cuenta FROM semestre";
		$result = mysql_query ( $sql ) or die ( mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function listaGeneralSemestres() {
		if ($this->noSemestres () > 0) {
			
			$vectorSemestres = array ();
			$sql = "SELECT *FROM semestre ORDER BY cve_sem DESC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$semestre = new Semestre ();
				$semestre->setClaveSemestre ( $ren ['cve_sem'] );
				$semestre->setNoSemestre ( $ren ['no_sem'] );
				$semestre->setNombreSemestre ( $ren ['nom_sem'] );
				
				$vectorSemestres [] = $semestre;
			}
			return $vectorSemestres;
		} else {
			return 0; // NO HAY RESULTADOSs
		}
	}
}
?>