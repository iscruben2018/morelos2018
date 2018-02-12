<?php
require_once 'Aviso.php';
require_once 'Conexion.php';
class TablaAviso extends Conexion {
	private $conexion;
	private $_avisos = array ();
	private $vectorAvisos = array ();
	public function __construct() {
		$this->tabla = "aviso";
		$this->crearConexion ();
	}
	public function noAvisos() {
		$sql = "SELECT COUNT(id_aviso) as cuenta FROM aviso";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla aviso,de tipo:" . mysql_error () . mysql_errno () );
		$no_resultados = mysql_num_rows ( $result );
		if ($no_resultados > 0) {
			$cuenta = mysql_fetch_object ( $result );
			return $cuenta->cuenta;
		} else {
			return 0;
		}
	}
	public function existeAviso($aviso) {
		$sql = "SELECT *FROM aviso WHERE cat_aviso='" . $aviso . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function guardarAviso(Aviso $aviso) {
		if ($this->existeAviso ( $aviso->getCategoriaAviso () ) == "0") {
			$sql = "INSERT INTO aviso VALUES(null,'" . $aviso->getCategoriaAviso () . "','" . $aviso->getDescripcionAviso () . "')";
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
	public function listaGeneralAvisos() {
		if ($this->noAvisos () > 0) {
			
			$vectorAvisos = array ();
			$sql = "SELECT *FROM aviso ORDER BY cat_aviso ASC";
			
			mysql_query ( "SET NAMES 'utf8'" );
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla aviso,de tipo:" . mysql_error () . mysql_errno () );
			while ( $ren = mysql_fetch_array ( $qry ) ) {
				$aviso = new Aviso ();
				$aviso->setIdAviso ( $ren ['id_aviso'] );
				$aviso->setCategoriaAviso ( $ren ['cat_aviso'] );
				$aviso->setDescripcionAviso ( $ren ['desc_aviso'] );
				
				$vectorAvisos [] = $aviso;
			}
			return $vectorAvisos;
		} else {
			return 0; // NO HAY RESULTADOSs
		}
	}
}