<?php
require_once 'Docente.php';
require_once 'Conexion.php';
class TablaDocente extends Conexion {
	private $conexion;
	private $tabla;
	private $vectorDocentes = array ();
	public function __construct() {
		$this->crearConexion ();
		$this->tabla = "docente";
		parent::crearConexion ();
	}
	public function noDocentes() {
		$sql = "SELECT COUNT(cve_doc) as cuenta FROM docente";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function reporteEspecificoDocente($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noDocentes () > 0) {
			
			$vectorDocentes = array ();
			$sql = "SELECT *FROM docente WHERE " . $criterio . "='" . $busqueda . "' ORDER BY nom_doc ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$docente = new Docente ();
				$docente->setClaveDocente ( $ren ['cve_doc'] );
				$docente->setNombreDocente ( $ren ['nom_doc'] );
				$docente->setAPaternoDocente ( $ren ['ap_doc'] );
				$docente->setAMaternoDocente ( $ren ['am_doc'] );
				$docente->setLadaDocente ( $ren ['lada_doc'] );
				$docente->setTelDocente ( $ren ['tel_doc'] );
				$docente->setCorreoDocente ( $ren ['correo_doc'] );
				
				$vectorDocentes [] = $docente;
			}
			return $vectorDocentes;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function reporteDocentes() {
		if ($this->noDocentes () > 0) {
			
			$vectorDocentes = array ();
			$sql = "SELECT *FROM docente ORDER BY ap_doc,am_doc ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$docente = new Docente ();
				$docente->setClaveDocente ( $ren ['cve_doc'] );
				$docente->setNombreDocente ( $ren ['nom_doc'] );
				$docente->setAPaternoDocente ( $ren ['ap_doc'] );
				$docente->setAMaternoDocente ( $ren ['am_doc'] );
				$docente->setLadaDocente ( $ren ['lada_doc'] );
				$docente->setTelDocente ( $ren ['tel_doc'] );
				$docente->setCorreoDocente ( $ren ['correo_doc'] );
				
				$vectorDocentes [] = $docente;
			}
			return $vectorDocentes;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existeDocente($cve_doc) {
		$sql = "SELECT *FROM docente WHERE cve_doc='" . $cve_doc . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function guardarDocentes(Docente $docente) {
		if ($this->existeDocente ( $docente->getClaveDocente () ) == "0") {
			$sql = "INSERT INTO docente VALUES('" . $docente->getClaveDocente () . "','" . $docente->getNombreDocente () . "','" . $docente->getAPaternoDocente () . "','" . $docente->getAMaternoDocente () . "','" . $docente->getLadaDocente () . "','" . $docente->getTelDocente () . "','" . $docente->getCorreoDocente () . "')";
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
	public function eliminarDocente($cvedoc) {
		if ($this->existeDocente ( $cvedoc ) == "1") {
			$sql = "DELETE FROM docente WHERE cve_doc='" . $cvedoc . "'";
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
	public function modificarDocente(Docente $docente) {
		if ($this->existeDocente ( $docente->getClaveDocente () ) == "1") {
			$sql = "UPDATE docente SET nom_doc='" . $docente->getNombreDocente () . "',ap_doc='" . $docente->getAPaternoDocente () . "',am_doc='" . $docente->getAMaternoDocente () . "',lada_doc='" . $docente->getLadaDocente () . "',tel_doc='" . $docente->getTelDocente () . "',correo_doc='" . $docente->getCorreoDocente () . "' WHERE cve_doc='" . $docente->getClaveDocente () . "'";
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