<?php
require_once 'Alumno.php';
require_once 'Conexion.php';

/*
 * CLASE TABLAALUMNO*
 * Mayo 2016
 * R_Martinez_B
 *
 */
class TablaAlumno extends Conexion {
	private $conexion;
	private $_alumnos = array ();
	private $vectorAlumnos = array ();
	public function __construct() {
		$this->tabla = "alumno";
		$this->crearConexion ();
	}
	public function datosInvidualesAlumno($matricula) {
		$qry = "SELECT matri_alu,nom_alu,ap_alu,am_alu,seccion.cod_sec,no_sec,bachillerato.cve_bac,nom_bac FROM `alumno` join seccion on alumno.cod_sec=seccion.cod_sec join bachillerato on alumno.cve_bac=bachillerato.cve_bac where matri_alu='" . $matricula . "'";
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Parametro incorrecto:" . mysql_errno () . "</h3><h4 align='center'><a href='index.php'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorAlumnos = array ();
		if ($nfilas > 0) {
			$ren = mysql_fetch_array ( $consulta );
			$vectorAlumnos [] = $ren;
			return $vectorAlumnos;
		} else {
			return $vectorAlumnos;
		}
	}
	public function add(Alumno $alumno) {
		$this->_alumnos [] = $alumno;
	}
	public function guardarAlumno(Alumno $alumno) {
		if ($this->existeAlumno ( $alumno->getMatriculaAlumno () ) == "0") {
			$sql = "INSERT INTO alumno VALUES('" . $alumno->getMatriculaAlumno () . "','" . $alumno->getCurpAlumno () . "','" . $alumno->getNombreAlumno () . "','" . $alumno->getAPaternoAlumno () . "','" . $alumno->getAMaternoAlumno () . "','" . $alumno->getFNacimientoAlumno () . "','" . $alumno->getTel1Alumno () . "','" . $alumno->getTel2Alumno () . "','" . $alumno->getCorreoAlumno () . "','" . $alumno->getColoniaAlumno () . "','" . $alumno->getCalleAlumno () . "','" . $alumno->getNoAlumno () . "','" . $alumno->getDeudaAlumno () . "','" . $alumno->getStatusAlumno () . "','" . $alumno->getClaveBachilleratoAlumno () . "','" . $alumno->getCodigoSeccionAlumno () . "')";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE GUARDO
			} else {
				return 0; // ERROR AL GUARDAR
			}
		} else {
			return 2; // EL ALUMNO YA EXISTE
		}
	}
	public function eliminarAlumno($matricula) {
		if ($this->existeAlumno ( $matricula ) == "1") {
			$sql = "DELETE FROM alumno WHERE matri_alu='" . $matricula . "'";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE ELIMINO
			} else {
				return 0; // ERROR AL ELIMINAR
			}
		} else {
			return 2; // NO EXISTE LA MATRICULA
		}
	}
	public function consultaAlumno($matricula) {
		$alumno = new Alumno ();
		
		if ($this->existeAlumno ( $matricula ) == "1") {
			$sql = "SELECT *FROM alumno WHERE matri_alu='" . $matricula . "'";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_errror () . mysql_errno () );
			if ($qry) {
				
				if ($no_resultado = mysql_num_rows ( $qry ) > 0) {
					
					$ren = mysql_fetch_array ( $qry );
					$alumno->setMatriculaAlumno ( $ren ['matri_alu'] );
					$alumno->setCurpAlumno ( $ren ['curp_alu'] );
					$alumno->setNombreAlumno ( $ren ['nom_alu'] );
					$alumno->setAPaternoAlumno ( $ren ['ap_alu'] );
					$alumno->setAMaternoAlumno ( $ren ['am_alu'] );
					$alumno->setFNacimientoAlumno ( $ren ['fechn_alu'] );
					$alumno->setTel1Alumno ( $ren ['tel1_alu'] );
					$alumno->setTel2Alumno ( $ren ['tel2_alu'] );
					$alumno->setCorreoAlumno ( $ren ['correo_alu'] );
					$alumno->setColoniaAlumno ( $ren ['id_col'] );
					$alumno->setCalleAlumno ( $ren ['calle_alu'] );
					$alumno->setNoAlumno ( $ren ['no_alu'] );
					$alumno->setDeudaAlumno ( $ren ['deuda_alu'] );
					$alumno->setStatusAlumno ( $ren ['status_alu'] );
					$alumno->setClaveBachilleratoAlumno ( $ren ['cve_bac'] );
					$alumno->setCodigoSeccionAlumno ( $ren ['cod_sec'] );
					return $alumno;
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
	public function modificarAlumno(Alumno $alumno) {
		if ($this->existeAlumno ( $alumno->getMatriculaAlumno () ) == "1") {
			$sql = "UPDATE alumno SET curp_alu='" . $alumno->getCurpAlumno () . "',nom_alu='" . $alumno->getNombreAlumno () . "',ap_alu='" . $alumno->getAPaternoAlumno () . "',am_alu='" . $alumno->getAMaternoAlumno () . "',fechn_alu='" . $alumno->getFNacimientoAlumno () . "',tel1_alu='" . $alumno->getTel1Alumno () . "',tel2_alu='" . $alumno->getTel2Alumno () . "',correo_alu='" . $alumno->getCorreoAlumno () . "',id_col='" . $alumno->getColoniaAlumno () . "',calle_alu='" . $alumno->getCalleAlumno () . "',no_alu='" . $alumno->getNoAlumno () . "',deuda_alu='" . $alumno->getDeudaAlumno () . "',status_alu='" . $alumno->getStatusAlumno () . "',cve_bac='" . $alumno->getClaveBachilleratoAlumno () . "',cod_sec='" . $alumno->getCodigoSeccionAlumno () . "' WHERE matri_alu='" . $alumno->getMatriculaAlumno () . "'";
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
	public function reporteGeneral() {
		if ($this->noAlumnos () > 0) {
			
			$vectorAlumnos = array ();
			$sql = "SELECT *FROM alumno WHERE cve_bac!='' or cod_sec!='' ORDER BY ap_alu ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$alumno = new Alumno ();
				$alumno->setMatriculaAlumno ( $ren ['matri_alu'] );
				$alumno->setCurpAlumno ( $ren ['curp_alu'] );
				$alumno->setNombreAlumno ( $ren ['nom_alu'] );
				$alumno->setAPaternoAlumno ( $ren ['ap_alu'] );
				$alumno->setAMaternoAlumno ( $ren ['am_alu'] );
				$alumno->setFNacimientoAlumno ( $ren ['fechan_alu'] );
				$alumno->setTel1Alumno ( $ren ['tel1_alu'] );
				$alumno->setTel2Alumno ( $ren ['tel2_alu'] );
				$alumno->setCorreoAlumno ( $ren ['correo_alu'] );
				$alumno->setColoniaAlumno ( $ren ['id_col'] );
				$alumno->setCalleAlumno ( $ren ['calle_alu'] );
				$alumno->setNoAlumno ( $ren ['no_alu'] );
				$alumno->setDeudaAlumno ( $ren ['deuda_alu'] );
				$alumno->setStatusAlumno ( $ren ['status_alu'] );
				$alumno->setClaveBachilleratoAlumno ( $ren ['cve_bac'] );
				$alumno->setCodigoSeccionAlumno ( $ren ['cod_sec'] );
				
				$vectorAlumnos [] = $alumno;
			}
			return $vectorAlumnos;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function reporteEspecifico($criterio, $busqueda) {
		// Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if ($this->noAlumnos () > 0) {
			
			$vectorAlumnos = array ();
			$sql = "SELECT *FROM alumno WHERE " . $criterio . " LIKE '%" . $busqueda . "%' ORDER BY nom_alu ASC";
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$alumno = new Alumno ();
				$alumno->setMatriculaAlumno ( $ren ['matri_alu'] );
				$alumno->setNombreAlumno ( $ren ['nom_alu'] );
				$alumno->setAPaternoAlumno ( $ren ['ap_alu'] );
				$alumno->setAMaternoAlumno ( $ren ['am_alu'] );
				
				$vectorAlumnos [] = $alumno;
			}
			return $vectorAlumnos;
		} else {
			return 0; // NO HAY RESULTADOS
		}
	}
	public function existeAlumno($matricula) {
		$sql = "SELECT *FROM alumno WHERE matri_alu='" . $matricula . "'";
		$result = @mysql_query ( $sql ) or die ( "<h3 align=center><img src='../images/iconos/delete.ico' width=35 heigth=35> Error de " . $this->tabla . " alumno al ingresar,consulta en control escolar</h3><br><div align=center><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></div>" );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	//Agregada 12-12-16
	public function existeUsuarioAlumno($matricula,$password) {
		$sql = "SELECT *FROM alumno WHERE matri_alu='" . @mysql_real_escape_string($matricula) . "' AND matri_alu='".@mysql_real_escape_string($password)."'";
		
		$result = @mysql_query ( $sql ) or die ( "<h3 align=center><img src='../images/iconos/delete.ico' width=35 heigth=35> Error de  usuario " . $this->tabla . " al ingresar,consulta en control escolar</h3><br><div align=center><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></div>" );
		if ($existe = mysql_fetch_object ( $result )) {
			return true;
		} else {
			return false;
		}
	}
	public function cambiarStatusAlumno($matricula, $status) {
		$sql = "UPDATE alumno set status_alu='" . $status . "' WHERE matri_alu='" . $matricula . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function obtenerListaMatriculas(){
		$$arreglo_mat = array ();
		$sql="SELECT matri_alu FROM alumno";
		$result=mysql_query($sql);
		$no_resultados=mysql_num_rows($result);
		if ($no_resultados>0) {
			while($ren=mysql_fetch_array($result)){
				$arreglo_mat[]=$ren["matri_alu"];
			}
			
			return $arreglo_mat;
		}
		else{
			return null;
			
		}
	} 
	public function noAlumnos() {
		$sql = "SELECT COUNT(matri_alu) as cuenta FROM alumno WHERE cve_bac!='' or cod_sec!=''";
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