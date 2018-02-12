<?php
require_once 'PadreHijo.php';
require_once 'Conexion.php';
class TablaPadreHijo extends Conexion {
	private $conexion;
	public function __construct() {
		$this->tabla = "padre_hijo";
		$this->crearConexion ();
	}
	public function existeHijoPadre($matri_alu) {
		$sql = "SELECT *FROM padre_hijo WHERE matri_alu='" . $matri_alu . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function retornarHijoPadre($matri_alu) {
		$sql = "SELECT *FROM padre_hijo WHERE matri_alu='" . $matri_alu . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if (mysql_num_rows ( $result ) > 0) {
			while ( $ren = mysql_fetch_array ( $result ) ) {
				$padreHijo = new PadreHijo ();
				$padreHijo->setClavePadre ( $ren ['cve_pad'] );
				$padreHijo->setClavePadreHijo ( $ren [cve_padrehijo] );
				$padreHijo->setMatriculaHijo ( $ren ['matri_alu'] );
			}
			return $padreHijo;
		} else {
			return 0;
		}
	}
	public function guardarPadreHijo(PadreHijo $padrehijo) {
		if ($this->existeHijoPadre ( $padrehijo->getMatriculaHijo () ) == "0") {
			$sql = "INSERT INTO padre_hijo VALUES(null,'" . $padrehijo->getClavePadre () . "','" . $padrehijo->getMatriculaHijo () . "')";
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