<?php
require_once 'Bachillerato.php';
require_once 'Conexion.php';
class TablaBachillerato extends Conexion {
	private $conexion;
	private $_bachilleratos = array ();
	private $vectorBachilleratos = array ();
	public function __construct() {
		$this->tabla = "bachillerato";
		$this->crearConexion ();
	}
	public function add(Bachillerato $bachillerato) {
		$this->_bachilleratos [] = $bachillerato;
	}
	public function noBachilleratos() {
		$sql = "SELECT COUNT(cve_bac) as cuenta FROM bachillerato";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function reporteVectorBachillerato($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia
		if ($this->noBachilleratos () > 0) {
			$vectorBachilleratos = array ();
			$sql = "SELECT *FROM bachillerato WHERE " . $criterio . "='" . $busqueda . "' ORDER BY cve_bac ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$bachillerato = new Bachillerato ();
				$bachillerato->setClaveBachillerato ( $ren ['cve_bac'] );
				$bachillerato->setNombreBachillerato ( $ren ['nom_bac'] );
				$vectorBachilleratos [] = $bachillerato;
			}
			return $vectorBachilleratos;
		} else {
			return null; // NO HAY RESULTADOS
		}
	}
	public function reporteEspecificoBachillerato($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noBachilleratos () > 0) {
			$sql = "SELECT *FROM bachillerato WHERE " . $criterio . "='" . $busqueda . "' ORDER BY nom_bac ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			$ren = mysql_fetch_array ( $qry );
			$bachillerato = new Bachillerato ();
			$bachillerato->setClaveBachillerato ( $ren ['cve_bac'] );
			$bachillerato->setNombreBachillerato ( $ren ['nom_bac'] );
			
			return $bachillerato;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function consultaBachillerato($cve_bac) {
		$bachillerato = new Bachillerato ();
		
		if ($this->existeBachillerato ( $cve_bac ) == "1") {
			$sql = "SELECT *FROM bachillerato WHERE cve_bac='" . $cve_bac . "'";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_errror () . mysql_errno () );
			if ($qry) {
				
				if ($no_resultado = mysql_num_rows ( $qry ) > 0) {
					
					$ren = mysql_fetch_array ( $qry );
					$bachillerato = new Bachillerato ();
					$bachillerato->setClaveBachillerato ( $ren ['cve_bac'] );
					$bachillerato->setNombreBachillerato ( $ren ['nom_bac'] );
					
					return $bachillerato;
				} else {
					return 3; // NO HAY RESULTADOS
				}
			} else {
				return 0; // ERROR
			}
		} else {
			return 2; // NO EXISTE
		}
	}
	public function existeBachillerato($cve_bac) {
		$sql = "SELECT *FROM bachillerato WHERE cve_bac='" . $cve_bac . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function listaGeneralBachilleratos() {
		if ($this->noBachilleratos () > 0) {
			
			$vectorBachilleratos = array ();
			$sql = "SELECT *FROM bachillerato ORDER BY nom_bac ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$bachillerato = new Bachillerato ();
				$bachillerato->setClaveBachillerato ( $ren ['cve_bac'] );
				$bachillerato->setNombreBachillerato ( $ren ['nom_bac'] );
				
				$vectorBachilleratos [] = $bachillerato;
			}
			return $vectorBachilleratos;
		} else {
			return 0; // NO HAY RESULTADOSs
		}
	}
}
?>