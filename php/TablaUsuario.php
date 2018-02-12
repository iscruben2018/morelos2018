<?php
require_once 'Conexion.php';
require_once 'Usuario.php';
require_once 'Docente.php';
require_once 'TablaDocente.php';
class TablaUsuario extends Conexion {
	private $conexion;
	private $vectorUsuarios = array ();
	public function __construct() {
		$this->tabla = "usuario";
		$this->crearConexion ();
	}
	public function guardarUsuario(Usuario $usuario) {
		if ($this->existeUsuario ( $usuario->getClaveUsuario () ) == "0") {
			$sql = "INSERT INTO usuario VALUES('" . $usuario->getClaveUsuario () . "',md5('" . $usuario->getUsuario () . "'),md5('" . $usuario->getPassword () . "'),'" . $usuario->getTipoUsuario () . "','" . $usuario->getCorreoUsuario () . "')";
			$qry = @mysql_query ( $sql ) or die ( "<h3 style='color:red;'><img src='images/iconos/delete.ico' width=35 heigth=35>Error en la tabla-->" . $this->tabla . ",al guardar el usuario,el error es de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE GUARDO
			} else {
				return 0; // ERROR AL GUARDAR
			}
		} else {
			return 2; // LOS DATOS YA EXISTEN
		}
	}
	public function modificarUsuario(Usuario $usuario) {
		if ($this->existeUsuario ( $usuario->getClaveUsuario () ) == "1") {
			$sql = "UPDATE alumno SET user=md5('" . $usuario->getUsuario () . "'),pass=md5('" . $usuario->getPassword () . "') WHERE cve_usu=md5('" . $aextra->getMatriculaAlumnoExtra () . "')";
			$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",al modificar el usuario el error es de tipo:" . mysql_error () . mysql_errno () );
			if ($qry) {
				return 1; // SE ACTUALIZARON LOS DATOS
			} else {
				return 0; // ERROR EN LA ACTUALIZACION O NO SE MODIFICARON REGISTROS
			}
		} else {
			return 2; // NO EXISTE EL ALUMNO
		}
	}
	public function existeUsuario($cve_usu) {
		$sql = "SELECT *FROM usuario WHERE cve_usu='" . $cve_usu . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",al revisar la existencia del usuario de tipo:" . mysql_error () . mysql_errno () );
		if ($existe = mysql_fetch_object ( $result )) {
			return 1;
		} else {
			return 0;
		}
	}
	public function retornarClaveUsuario($usuario) {
		$sql = "SELECT cve_usu from usuario WHERE user=md5('" . $usuario . "') AND tipo_usu='admin'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",al retornar id del usuario de tipo:" . mysql_error () . mysql_errno () );
		if ($result) {
			$ren = mysql_fetch_array ( $result );
			$usuario = new Usuario ();
			$usuario->setClaveUsuario ( $ren ["cve_usu"] );
			return $usuario;
		} else {
			return 0;
		}
	}
	public function retornarClaveDocente($usuario) {
		$sql = "SELECT cve_doc from docente WHERE cve_doc='" . $usuario . "'";
		$result = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ", al retornar id del docente de tipo:" . mysql_error () . mysql_errno () );
		if ($result) {
			$ren = mysql_fetch_array ( $result );
			$docente = new Docente ();
			$docente->setClaveDocente ( $ren ["cve_doc"] );
			return $docente;
		} else {
			return 0;
		}
	}
	public function loginUsuario($user, $pass) {
		$sql = "SELECT *FROM usuario WHERE user=md5('" . mysql_real_escape_string(strtolower($user)) . "') AND pass=md5('" .mysql_real_escape_string(strtolower($pass)). "') LIMIT 1";
      
        $sqlMay = "SELECT *FROM usuario WHERE user=md5('" . mysql_real_escape_string(strtoupper($user)) . "') AND pass=md5('" .mysql_real_escape_string(strtoupper($pass)). "') LIMIT 1";
		$qry = @mysql_query ( $sql ) or die ( "<h4 align='center'><img src='../images/iconos/delete.ico' width='35' heigth='35'> Error de " . $this->tabla . ", al realizar el login del usuario,consulta en control escolar </h3><br><div align=center><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></div>" );
		if ($qry) {
			if ($existe = mysql_fetch_object ( $qry )) {
				return 1; // Existe
			} else {
				//Para mayusculas
				$qryMay = @mysql_query ( $sqlMay ) or die ( "<h4 align='center'><img src='../images/iconos/delete.ico' width='35' heigth='35'> Error de " . $this->tabla . ", al realizar el login del usuario,consulta en control escolar </h3><br><div align=center><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></div>" );
			  
			  if($qryMay){
				if($existeMay=mysql_fetch_object($qryMay)){
                  return 1; //Existe
				}
				else{
				return 2; // No existe o la clave es incorrecta
			    }
			  }
			  else{
			  	//Error mysql
			  	return 0;
			  }
			}
		} else {
			return 0; // Error mysql
		}
	}
	public function loginDocente($user, $pass) {
		$sql = "SELECT *FROM docente WHERE cve_doc='" . @mysql_real_escape_string($user) . "' AND cve_doc='" . @mysql_real_escape_string($pass) . "' LIMIT 1";
		$qry = @mysql_query ( $sql ) or die ( "<h3 align='center'><img src='../images/iconos/delete.ico' width='35' heigth='35'> Error de " . $this->tabla . ",al realizar el login del docente,consulta en control escolar</h3><br><div align=center><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></div>" );
		
		if ($qry) {
			if ($existe = mysql_fetch_object ( $qry )) {
				return 1; // Existe
			} else {
				return 2; // No existe o la clave es incorrecta
			}
		} else {
			return 0; // Error mysql
		}
	}
	public function loginAdmin($user, $pass) {
		$sql = "SELECT *FROM usuario WHERE user=md5('" . @mysql_real_escape_string(strtolower($user)) . "') AND pass=md5('" . @mysql_real_escape_string(strtolower($pass)) . "') AND tipo_usu='admin' LIMIT 1";
		$sqlMay = "SELECT *FROM usuario WHERE user=md5('" . @mysql_real_escape_string(strtoupper($user)) . "') AND pass=md5('" . @mysql_real_escape_string(strtoupper($pass)) . "') AND tipo_usu='admin' LIMIT 1";
		$qry = @mysql_query ( $sql ) or die ( "<h3 align=center><img src='../images/iconos/delete.ico' width=35 heigth=35> Error de " . $this->tabla . " admin al ingresar,consulta al administrador</h3><br><div align=center><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></div>" );
		
		if ($qry) {
			if ($existe = mysql_fetch_object ( $qry )) {
				return 1; // Existe
			} else {
				//Mayusculas
				$qryMay = @mysql_query ( $sqlMay ) or die ( "<h3 align=center><img src='../images/iconos/delete.ico' width=35 heigth=35> Error de " . $this->tabla . " admin al ingresar,consulta al administrador</h3><br><div align=center><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></div>" );
				
              if($qryMay){
				if($existeMay=mysql_fetch_object($qryMay)){
                   return 1; //Existe
				}
				else{
				return 2; // No existe o la clave es incorrecta
			    }
			  }
			  else{
			  	return 0; //Error mysql
			  }
			}
		} else {
			return 0; // Error mysql
		}
	}
}
?>