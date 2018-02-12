<?php
require_once 'Seccion.php';
require_once 'Conexion.php';
class TablaSeccion extends Conexion {
	private $conexion;
	private $_secciones = array ();
	private $vectorSecciones = array ();
	public function __construct() {
		$this->tabla = "seccion";
		$this->crearConexion ();
	}
	public function add(Seccion $seccion) {
		$this->_secciones [] = $seccion;
	}
	public function noSecciones() {
		$sql = "SELECT COUNT(cod_sec) as cuenta FROM seccion";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function ultimaClaveSeccion() {
		$sql = "SELECT cod_sec,no_sec FROM seccion where cod_sec=(select max(cod_sec) as c_seccion from seccion);";
		$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		if ($qry) {
			$ren = mysql_fetch_array ( $qry );
			
			$seccion = new Seccion ();
			$seccion->setCodigoSeccion ( $ren ['cod_sec'] );
			$seccion->setNombreSeccion ( $ren ['no_sec'] );
			
			return $seccion;
		} else {
			return 0;
		}
	}
	public function guardarSeccion(Seccion $seccion) {
		if ($this->existeSeccion ( $seccion->getNombreSeccion () ) == "0") {
			$sql = "INSERT INTO seccion VALUES(null,'" . $seccion->getNombreSeccion () . "')";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE GUARDO
			} else {
				return 0; // ERROR AL GUARDAR
			}
		} else {
			return 2; // EL NOMBRE DE LA SECCION YA EXISTE
		}
	}
	public function eliminarSeccion($no_sec) {
		if ($this->existeSeccion ( $no_sec ) == "1") {
			$sql = "DELETE FROM seccion WHERE no_sec='" . $no_sec . "'";
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
	public function reporteEspecificoSeccion($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noSecciones () > 0) {
			
			$vectorSecciones = array ();
			$sql = "SELECT *FROM seccion WHERE " . $criterio . "='" . $busqueda . "' ORDER BY no_sec ASC";
			// echo $sql;
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$seccion = new Seccion ();
				$seccion->setCodigoSeccion ( $ren ['cod_sec'] );
				$seccion->setNombreSeccion ( $ren ['no_sec'] );
				
				$vectorSecciones [] = $seccion;
			}
			return $vectorSecciones;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existeSeccion($no_sec) {
		$sql = "SELECT *FROM seccion WHERE no_sec='" . $no_sec . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function listaGeneralSecciones() {
		if ($this->noSecciones () > 0) {
			
			$vectorSecciones = array ();
			$sql = "SELECT *FROM seccion ORDER BY no_sec ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$seccion = new Seccion ();
				$seccion->setCodigoSeccion ( $ren ['cod_sec'] );
				$seccion->setNombreSeccion ( $ren ['no_sec'] );
				
				$vectorSecciones [] = $seccion;
			}
			return $vectorSecciones;
		} else {
			return 0; // NO HAY RESULTADOSs
		}
	}
}
	
?>