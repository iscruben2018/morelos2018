<?php
class Conexion extends SQLite3 {
	/*
	 * CLASE CONEXION
	 * Mayo 2016 Febrero 2018 fin
	 * R_Martinez_B
	 */
	const USUARIO = 'u117335376_root';
	const CLAVE = 'morelos123';
	const BASE = 'u117335376_morel';
	const SERVIDOR = 'mysql.hostinger.mx';
	private $tabla;
	private $conexion;
	private $conexionInvitado;
	public function __construct() {
	}
	public function crearConexion() {
		if (! ($this->conexion = mysql_connect ( self::SERVIDOR, self::USUARIO, self::CLAVE ))) {
			echo "<h4 align='center'>Ocurri&oacute; un error de conexi&oacute;n <img src='images/iconos/warning.ico' width=35 height=35><br>";
		}
		
		if (! mysql_select_db ( self::BASE, $this->conexion )) {
			echo "<h4 align='center'>No hay datos que mostrar <img src='images/iconos/informacion.png' width=35 height=35></h4>";
		}
		
	}
	public function crearConexionInvitado($host, $user, $pass) {
		if (! ($this->conexionInvitado = mysql_connect ( $host, $user, $pass ))) {
			echo "Ocurrio un error al conectar";
			return 0;
		}
		if (! mysql_select_db ( $base, $this->conexionInvitado )) {
			echo "Ocurrio un error al seleccionar la base de datos";
			return 0;
		}
		return 1;
	}
	public function cerrarConexion() {
		mysql_close ( $this->conexion );
	}
	public function PermisosAdministrador($host, $usu) {
		$sentencia = "GRANT EXECUTE, SELECT, DELETE, INSERT, UPDATE, CREATE USER, FILE, RELOAD  ON *.* TO '" . $usu . "'@'" . $host . "' ";
		$qry = mysql_query ( $sentencia ) or die ( mysql_error () . mysql_errno () );
		if ($qry) {
			return 1;
		} else {
			return 0;
		}
	}
	public function PermisosAlumno($host, $usu) {
		$sentencia = "GRANT SELECT,INSERT, UPDATE,RELOAD  ON morelos.* TO '" . $usu . "'@'" . $host . "' ";
		$qry = mysql_query ( $sentencia ) or die ( mysql_error () . mysql_errno () );
		if ($qry) {
			return 1;
		} else {
			return 0;
		}
	}
	public function QuitarPermisosUsuario($usu, $host) {
		$sentencia = "REVOKE GRANT OPTION ON *.* FROM '" . $usu . "'@'" . $host . "' ";
		$query = mysql_query ( $sentencia ) or die ( mysql_error () . mysql_errno () );
		if ($query) {
			return 1;
		} else {
			return 0;
		}
	}
	public function NuevoUsuario($usuario, $password, $host) {
		$sql = "CREATE user '" . $usuario . "'@'" . $host . "' IDENTIFIED BY '" . $password . "' ";
		$qry = mysql_query ( $sql ) or die ( mysql_error () . mysql_errno () );
		if ($qry) {
			return 1; // Usuario creado
		} else {
			return 0; // Error
		}
	}
	public function EliminarUsuario($usuario, $host) {
		$sql = "DROP USER '" . $usuario . "'@'" . $host . "' ";
		$qry = mysql_query ( $sql ) or die ( mysql_error () . mysql_errno () );
		if ($qry) {
			return 1; // SE ELIMINO
		} else {
			return 0; // ERROR
		}
	}
}
?>
