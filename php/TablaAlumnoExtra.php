<?php
require_once 'AlumnoExtra.php';
require_once 'Conexion.php';
class TablaAlumnoExtra extends Conexion {
	private $conexion;
	private $vectorAlumnoExtra = array ();
	public function __construct() {
		$this->tabla = "aluextra";
		$this->crearConexion ();
	}
	public function noAlumnoExtra() {
		$sql = "SELECT COUNT(cve_aluex) as cuenta FROM aluextra";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function guardarAlumnoExtra(AlumnoExtra $aextra) {
		if ($this->existeAlumnoExtra ( $aextra->getMatriculaAlumnoExtra () ) == "0") {
			$sql = "INSERT INTO aluextra VALUES(null,'" . $aextra->getPSaludAlumno () . "','" . $aextra->getBecaAlumno () . "','" . $aextra->getServicioSaludAlumno () . "','" . $aextra->getIdiomaAlumno () . "','" . $aextra->getMatriculaAlumnoExtra () . "','" . $aextra->getLugarNacimientoExtra () . "','" . $aextra->getSexoAlumnoExtra () . "')";
			
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
	public function modificarAlumnoExtra(AlumnoExtra $aextra) {
		if ($this->existeAlumnoExtra ( $aextra->getMatriculaAlumnoExtra () ) == "1") {
			$sql = "UPDATE aluextra SET psalud_aluex='" . $aextra->getPSaludAlumno () . "',beca_aluex='" . $aextra->getBecaAlumno () . "',servs_aluex='" . $aextra->getServicioSaludAlumno () . "',idioma_aluex='" . $aextra->getIdiomaAlumno () . "',lnac_aluex='" . $aextra->getLugarNacimientoExtra () . "',sexo_aluex='" . $aextra->getSexoAlumnoExtra () . "' WHERE matri_alu='" . $aextra->getMatriculaAlumnoExtra () . "'";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE ACTUALIZARON LOS DATOS
			} else {
				return 0; // ERROR EN LA ACTUALIZACION O NO SE MODIFICARON REGISTROS
			}
		} else {
			return 2; // NO EXISTE EL ALUMNO
		}
	}
	public function reporteEspecificoAlumnoExtra($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noAlumnoExtra () > 0) {
			
			$vectorAlumnoExtra = array ();
			$sql = "SELECT *FROM aluextra WHERE " . $criterio . "='" . $busqueda . "' ORDER BY cve_aluex ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$aextra = new AlumnoExtra ();
				$aextra->setClaveAlumnoExtra ( $ren ['cve_aluex'] );
				$aextra->setPSaludAlumno ( $ren ['psalud_aluex'] );
				$aextra->setBecaAlumno ( $ren ['beca_aluex'] );
				$aextra->setServicioSaludAlumno ( $ren ['servs_aluex'] );
				$aextra->setIdiomaAlumno ( $ren ['idioma_aluex'] );
				$aextra->setMatriculaAlumnoExtra ( $ren ['matri_alu'] );
				$aextra->setLugarNacimientoExtra ( $ren ['lnac_aluex'] );
				$aextra->setSexoAlumnoExtra ( $ren ['sexo_aluex'] );
				
				$vectorAlumnoExtra [] = $aextra;
			}
			return $vectorAlumnoExtra;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existeAlumnoExtra($matri_alu) {
		$sql = "SELECT *FROM aluextra WHERE matri_alu='" . $matri_alu . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . myql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function listaGeneralAlumnoExtra() {
		if ($this->noAlumnoExtra () > 0) {
			
			$vectorAlumnoExtra = array ();
			$sql = "SELECT *FROM aluextra ORDER BY cve_aluex ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$aextra = new AlumnoExtra ();
				$aextra->setClaveAlumnoExtra ( $ren ['cve_aluex'] );
				$aextra->setPSaludAlumno ( $ren ['psalud_aluex'] );
				$aextra->setBecaAlumno ( $ren ['beca_aluex'] );
				$aextra->setServicioSaludAlumno ( $ren ['servs_aluex'] );
				$aextra->setIdiomaAlumno ( $ren ['idioma_aluex'] );
				$aextra->setMatriculaAlumnoExtra ( $ren ['matri_alu'] );
				$aextra->setLugarNacimientoExtra ( $ren ['lnac_aluex'] );
				$aextra->setSexoAlumnoExtra ( $ren ['sexo_aluex'] );
				
				$vectorAlumnoExtra [] = $aextra;
			}
			return $vectorAlumnoExtra;
		} else {
			return 0; // NO HAY RESULTADOSs
		}
	}
}
	
?>