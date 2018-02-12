<?php
require_once 'AlumnoBachillerato.php';
require_once 'Conexion.php';
class TablaAlumnoBachillerato extends Conexion {
	private $conexion;
	private $_abachilleratos = array ();
	private $vector_abachilleratos = array ();
	public function __construct() {
		$this->tabla = "alubach";
		$this->crearConexion ();
	}
	public function no_abachilleratos() {
		$sql = "SELECT COUNT(num_alu) as cuenta FROM alubach";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function reporteEspecificoAluB($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->no_abachilleratos () > 0) {
			
			$sql = "SELECT *FROM alubach WHERE " . $criterio . "='" . $busqueda . "' ORDER BY num_alu ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			$ren = mysql_fetch_array ( $qry );
			$a_bachillerato = new AlumnoBachillerato ();
			$a_bachillerato->setNumeroAlumnoBachillerato ( $ren ['num_alu'] );
			$a_bachillerato->setClaveBachilleratoAlu ( $ren ['cve_bac'] );
			$a_bachillerato->setMatriculaBachillerato ( $ren ['matri_alu'] );
			$a_bachillerato->setStatusAlumno ( $ren ['status_alu'] );
			
			return $a_bachillerato;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existeAlumnoBachillerato($matri_alu) {
		$sql = "SELECT *FROM alubach WHERE matri_alu='" . $matri_alu . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function guardarAlumnoBachillerato(AlumnoBachillerato $abachillerato) {
		if ($this->existeAlumnoBachillerato ( $abachillerato->getMatriculaBachillerato () ) == "0") {
			$sql = "INSERT INTO alubach VALUES(null,'" . $abachillerato->getClaveBachilleratoAlu () . "','" . $abachillerato->getMatriculaBachillerato () . "','" . $abachillerato->getStatusAlumno () . "')";
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
	public function modificarAlumnoBachillerato(AlumnoBachillerato $abachillerato) {
		if ($this->existeAlumnoBachillerato ( $abachillerato->getMatriculaBachillerato () ) == "1") {
			$sql = "UPDATE alubach SET cve_bac='" . $abachillerato->getClaveBachilleratoAlu () . "',status_alu='" . $abachillerato->getStatusAlumno () . "' WHERE matri_alu='" . $abachillerato->getMatriculaBachillerato () . "'";
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
}
?>
