<?php
require_once 'Ciclo.php';
require_once 'Conexion.php';
class TablaCiclo extends Conexion {
	private $conexion;
	private $tabla;
	public function __construct() {
		$this->crearConexion ();
		$this->tabla = "ciclo";
		parent::crearConexion ();
	}
	public function CicloActual() {
		$sql = "SELECT cve_ciclo,no_ciclo FROM ciclo where cve_ciclo=(select max(cve_ciclo) as c_actual from ciclo);";
		$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		if ($qry) {
			$ren = mysql_fetch_array ( $qry );
			
			$ciclo = new Ciclo ();
			$ciclo->setClaveCiclo ( $ren ['cve_ciclo'] );
			$ciclo->setNoCiclo ( $ren ['no_ciclo'] );
			
			return $ciclo;
		} else {
			return 0;
		}
	}
	public function existeCiclo($no_ciclo) {
		$sql = "SELECT *FROM ciclo WHERE no_ciclo='" . $no_ciclo . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function guardarCiclo(Ciclo $ciclo) {
		if ($this->existeCiclo ( $ciclo->getNoCiclo () ) == "0") {
			$sql = "INSERT INTO ciclo VALUES(null,'" . $ciclo->getNoCiclo () . "')";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE GUARDO
			} else {
				return 0; // ERROR AL GUARDAR
			}
		} else {
			return 2; // EL NOMBRE DEL CICLO YA EXISTE
		}
	}
	public function eliminarCiclo($no_ciclo) {
		if ($this->existeCiclo ( $no_ciclo ) == "1") {
			$sql = "DELETE FROM ciclo WHERE no_ciclo='" . $no_ciclo . "'";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE ELIMINO
			} else {
				return 0; // ERROR AL ELIMINAR
			}
		} else {
			return 2; // NO EXISTE
		}
	}
}