<?php
require_once 'Padre.php';
require_once 'Conexion.php';
class TablaPadre extends Conexion {
	private $conexion;
	private $tabla;
	private $vectorPadres = array ();
	public function __construct() {
		$this->crearConexion ();
		$this->tabla = "padre";
		parent::crearConexion ();
	}
	public function noPadres() {
		$sql = "SELECT COUNT(cve_pad) as cuenta FROM padre";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function reporteEspecificoPadre($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noPadres () > 0) {
			
			$vectorPadres = array ();
			$sql = "SELECT *FROM padre WHERE " . $criterio . "='" . $busqueda . "' ORDER BY nom_pad ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$padre = new Padre ();
				$padre->setClavePadre ( $ren ['cve_pad'] );
				$padre->setNombrePadre ( $ren ['nom_pad'] );
				$padre->setAPaternoPadre ( $ren ['ap_pad'] );
				$padre->setAMaternoPadre ( $ren ['am_pad'] );
				$padre->setTel1Padre ( $ren ['tel1_pad'] );
				$padre->setTel2Padre ( $ren ['tel2_pad'] );
				$padre->setECivilPadre ( $ren ['edociv_pad'] );
				$padre->setCorreoPadre ( $ren ['correo_pad'] );
				$padre->setColoniaPadre ( $ren ['id_col'] );
				$padre->setCallePadre ( $ren ['calle_pad'] );
				$padre->setNoPadre ( $ren ['no_pad'] );
				$padre->setOcupacionPadre ( $ren ['ocupacion_pad'] );
				$padre->setLugarTrabajoPadre ( $ren ['lugart_pad'] );
				
				$vectorPadres [] = $padre;
			}
			return $vectorPadres;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existePadre($clave, $correo) {
		$sql = "SELECT *FROM padre WHERE cve_pad='" . $cve_pad . "' or correo_pad='" . $correo . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function existePadreClave($clave) {
		$sql = "SELECT *FROM padre WHERE cve_pad='" . $clave . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function guardarPadre(Padre $padre) {
		if ($this->existePadre ( $padre->getClavePadre (), $padre->getCorreoPadre () ) == "0") {
			$sql = "INSERT INTO padre VALUES(null,'" . $padre->getNombrePadre () . "','" . $padre->getAPaternoPadre () . "','" . $padre->getAMaternoPadre () . "','" . $padre->getTel1Padre () . "','" . $padre->getTel2Padre () . "','" . $padre->getECivilPadre () . "','" . $padre->getCorreoPadre () . "','" . $padre->getColoniaPadre () . "','" . $padre->getCallePadre () . "','" . $padre->getNoPadre () . "','" . $padre->getOcupacionPadre () . "','" . $padre->getLugarTrabajoPadre () . "')";
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
	public function modificarPadre(Padre $padre) {
		if ($this->existePadreClave ( $padre->getClavePadre () ) == "1") {
			$sql = "UPDATE padre SET nom_pad='" . $padre->getNombrePadre () . "',ap_pad='" . $padre->getAPaternoPadre () . "',am_pad='" . $padre->getAMaternoPadre () . "',tel1_pad='" . $padre->getTel1Padre () . "',tel2_pad='" . $padre->getTel2Padre () . "',edociv_pad='" . $padre->getECivilPadre () . "',correo_pad='" . $padre->getCorreoPadre () . "',id_col='" . $padre->getColoniaPadre () . "',calle_pad='" . $padre->getCallePadre () . "',no_pad='" . $padre->getNoPadre () . "',ocupacion_pad='" . $padre->getOcupacionPadre () . "',lugart_pad='" . $padre->getLugarTrabajoPadre () . "' WHERE cve_pad='" . $padre->getClavePadre () . "'";
			// echo $sql;
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