<?php

require_once 'DocenteMateria.php';
require_once 'Conexion.php';
class TablaDocenteMateria extends Conexion {
	private $conexion;
	private $tabla;
	private $vectorDocenteMateria = array ();
	public function __construct() {
		$this->crearConexion ();
		$this->tabla = "docente_mat";
		parent::crearConexion ();
	}
	public function noDocenteMateria() {
		$sql = "SELECT COUNT(num_doc_mat) as cuenta FROM docente_mat";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function reporteEspecificoDocenteMateria($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noDocentes () > 0) {
			
			$vectorDocenteMateria = array ();
			$sql = "SELECT *FROM docente_mat WHERE " . $criterio . "='" . $busqueda . "' ORDER BY num_doc_mat ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$docenteMateria = new DocenteMateria ();
				$docenteMateria->setNoDocenteMateria ( $ren ['num_doc_mat'] );
				$docenteMateria->setClaveDocenteMateria ( $ren ['cve_doc'] );
				$docenteMateria->setSiiaDocenteMateria ( $ren ['siia'] );
				$docenteMateria->setClaveCicloDocenteMateria ( $ren ['cve_ciclo'] );
				
				$vectorDocenteMateria [] = $docenteMateria;
			}
			return $vectorDocenteMateria;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function reporteDocenteMateria() {
		if ($this->noDocentes () > 0) {
			
			$vectorDocenteMateria = array ();
			$sql = "SELECT *FROM docente_mat ORDER BY num_doc_mat ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$docenteMateria = new DocenteMateria ();
				$docenteMateria->setNoDocenteMateria ( $ren ['num_doc_mat'] );
				$docenteMateria->setClaveDocenteMateria ( $ren ['cve_doc'] );
				$docenteMateria->setSiiaDocenteMateria ( $ren ['siia'] );
				$docenteMateria->setClaveCicloDocenteMateria ( $ren ['cve_ciclo'] );
				
				$vectorDocenteMateria [] = $docenteMateria;
			}
			return $vectorDocenteMateria;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existeDocenteMateria($siia, $cve_doc) {
		$sql = "SELECT *FROM docente_mat WHERE siia='" . $siia . "' AND cve_doc='" . $cve_doc . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function guardarDocenteMateria(DocenteMateria $docente) {
		if ($this->existeDocenteMateria ( $docente->getSiiaDocenteMateria (), $docente->getClaveDocenteMateria () ) == "0") {
			$sql = "INSERT INTO docente_mat VALUES(null,'" . $docente->getClaveDocenteMateria () . "','" . $docente->getSiiaDocenteMateria () . "','" . $docente->getClaveCicloDocente () . "')";
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
	public function reporteMateriasDocente($cve_doc) {
		$qry = "SELECT num_doc_mat as folio,docente_mat.cve_doc,ap_doc,am_doc,nom_doc,docente_mat.siia,nom_mat,no_ciclo,cve_sem,nom_bac  FROM `docente_mat` join docente on docente_mat.cve_doc=docente.cve_doc join materia on docente_mat.siia=materia.siia join ciclo on docente_mat.cve_ciclo=ciclo.cve_ciclo join bachillerato on materia.cve_bac=bachillerato.cve_bac WHERE docente_mat.cve_doc='" . $cve_doc . "' order by nom_mat,siia asc";
		@mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorDocenteMateria = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorDocenteMateria [] = $ren;
			}
			return $vectorDocenteMateria;
		} else {
			return $vectorDocenteMateria;
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
?>