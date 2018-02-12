<?php
require_once 'Materia.php';
require_once 'Conexion.php';

/*
 * CLASE TABLAMATERIA*
 * Mayo 2016
 * R_Martinez_B
 *
 */
class TablaMateria extends Conexion {
	private $conexion;
	private $_materias = array ();
	private $vectorMaterias = array ();
	public function __construct() {
		$this->tabla = "materia";
		$this->crearConexion ();
	}
	public function add(Materia $materia) {
		$this->_materias [] = $materia;
	}
	public function consultaMateria($siia) {
		$materia = new Materia ();
		
		if ($this->existeMateria ( $siia ) == "1") {
			$sql = "SELECT *FROM materia WHERE siia='" . $siia . "'";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_errror () . mysql_errno () );
			if ($qry) {
				
				if ($no_resultado = mysql_num_rows ( $qry ) > 0) {
					
					$ren = mysql_fetch_array ( $qry );
					$materia->setSiiaMateria ( $ren ['siia'] );
					$materia->setNombreMateria ( $ren ['nom_mat'] );
					$materia->setHorasTMateria ( $ren ['ht_mat'] );
					$materia->setHorasPMateria ( $ren ['hp_mat'] );
					$materia->setPreMateria ( $ren ['pre_mat'] );
					$materia->setPreMateriaDos ( $ren ['pre2_mat'] );
					$materia->setClaveSemMateria ( $ren ['cve_sem'] );
					$materia->setClaveBacMateria ( $ren ['cve_bac'] );
					
					return $materia;
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
	public function reporteGeneral() {
		if ($this->noMaterias () > 0) {
			
			$vectorMaterias = array ();
			$sql = "SELECT *FROM materia ORDER BY nom_mat ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$materia = new Materia ();
				$materia->setSiiaMateria ( $ren ['siia'] );
				$materia->setNombreMateria ( $ren ['nom_mat'] );
				$materia->setHorasTMateria ( $ren ['ht_mat'] );
				$materia->setHorasPMateria ( $ren ['hp_mat'] );
				$materia->setPreMateria ( $ren ['pre_mat'] );
				$materia->setPreMateriaDos ( $ren ['pre2_mat'] );
				$materia->setClaveSemMateria ( $ren ['cve_sem'] );
				$materia->setClaveBacMateria ( $ren ['cve_bac'] );
				
				$vectorMaterias [] = $materia;
			}
			return $vectorMaterias;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function reporteEspecificoMateria($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noMaterias () > 0) {
			
			$vectorMaterias = array ();
			$sql = "SELECT *FROM materia WHERE " . $criterio . "='" . $busqueda . "' ORDER BY nom_mat ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$materia = new Materia ();
				$materia->setSiiaMateria ( $ren ['siia'] );
				$materia->setNombreMateria ( $ren ['nom_mat'] );
				$materia->setHorasTMateria ( $ren ['ht_mat'] );
				$materia->setHorasPMateria ( $ren ['hp_mat'] );
				$materia->setPreMateria ( $ren ['pre_mat'] );
				$materia->setPreMateriaDos ( $ren ['pre2_mat'] );
				$materia->setClaveSemMateria ( $ren ['cve_sem'] );
				$materia->setClaveBacMateria ( $ren ['cve_bac'] );
				
				$vectorMaterias [] = $materia;
			}
			return $vectorMaterias;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function ConsultaSemestreMateria($semestre, $bachillerato) {
		if ($this->noMaterias () > 0) {
			
			$vectorMaterias = array ();
			$sql = "SELECT *FROM materia WHERE cve_sem='" . $semestre . "' AND cve_bac='" . $bachillerato . "' ORDER BY nom_mat ASC";
			
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$materia = new Materia ();
				$materia->setSiiaMateria ( $ren ['siia'] );
				$materia->setNombreMateria ( $ren ['nom_mat'] );
				$materia->setHorasTMateria ( $ren ['ht_mat'] );
				$materia->setHorasPMateria ( $ren ['hp_mat'] );
				$materia->setPreMateria ( $ren ['pre_mat'] );
				$materia->setPreMateriaDos ( $ren ['pre2_mat'] );
				$materia->setClaveSemMateria ( $ren ['cve_sem'] );
				$materia->setClaveBacMateria ( $ren ['cve_bac'] );
				
				$vectorMaterias [] = $materia;
			}
			return $vectorMaterias;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existeMateria($siia) {
		$sql = "SELECT *FROM materia WHERE siia='" . $siia . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function noMaterias() {
		$sql = "SELECT COUNT(siia) as cuenta FROM materia";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
}
?>