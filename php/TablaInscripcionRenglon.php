<?php
require_once 'Conexion.php';
require_once 'Inscripcion.php';
class TablaInscripcionRenglon extends Conexion {
	private $tabla;
	private $vectorInscripciones = array ();
	public function __construct() {
		$this->tabla = "inscripcion_renglon";
		$this->crearConexion ();
		parent::crearConexion ();
	}
	public function existeInscripcionDocenteMateria($num_doc_mat) {
		$sql = "SELECT *FROM insc_renglon WHERE num_doc_mat='" . $num_doc_mat . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	
	/**
	 * ***************CONTAR INSCRIPCION RENGLON**********************
	 */
	public function noRenglonReinscripcion() {
		$sql = "SELECT COUNT(no_renhor) as cuenta FROM insc_renglon";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function consultaDocenteInscripcion($siia) {
		$qry = "SELECT num_doc_mat,docente.cve_doc,nom_doc,ap_doc,am_doc,materia.siia,nom_mat FROM `docente_mat` join docente on docente_mat.cve_doc=docente.cve_doc join materia on docente_mat.siia=materia.siia where docente_mat.siia='" . $siia . "'";
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorDocenteInscripcion = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorDocenteInscripcion [] = $ren;
			}
			return $vectorDocenteInscripcion;
		} else {
			return $vectorDocenteInscripcion;
		}
	}
	public function consultaInscripcionRenglon($cve_ins) {
		$qry = "SELECT *from insc_renglon where cve_ins='" . $cve_ins . "' order by no_renhor asc";
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorInscripciones = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorInscripciones [] = $ren;
			}
			return $vectorInscripciones;
		} else {
			return $vectorInscripciones;
		}
	}
	public function validarHoras($hinicio, $hfinal, $dia, $cve_ins) {
		$qry = "SELECT * FROM insc_renglon where hi_renhor='" . $hinicio . "' and hf_renhor='" . $hfinal . "' and (cve_ins='" . $cve_ins . "' and dia_renhor='" . $dia . "') ";
		
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Error de bd:" . mysql_errno () . "</h3><h4 align='center'><a href='javascript:window.history.back();'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		if ($nfilas > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	public function guardarInscripcionRenglon(InscripcionRenglon $inscripcion) {
		// CAMBIO A MAS MATERIAS EN UN DIA
		// if($this->existeInscripcionDocenteMateria($inscripcion->getNoDocenteMateriaRenglon())=="0"){
		$sql = "INSERT INTO insc_renglon VALUES(null,'" . $inscripcion->getHoraInicioRenglonHorario () . "','" . $inscripcion->getHoraFinalRenglonHorario () . "','" . $inscripcion->getDiaRenglonHorario () . "','" . $inscripcion->getNoDocenteMateriaRenglon () . "','" . $inscripcion->getClaveInscripcionRenglonMateria () . "')";
		$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		if ($qry) {
			return 1; // SE GUARDO
		} else {
			return 0; // ERROR AL GUARDAR
		}
		// }
		// else{
		return 2; // LOS DATOS YA EXISTEN
			          // }
	}
}
?>