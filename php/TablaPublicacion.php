<?php
require_once 'Publicacion.php';
require_once 'Conexion.php';
require_once 'Aviso.php';
require_once 'TablaAviso.php';
class TablaPublicacion extends Conexion {
	private $vectorNoticias = array ();
	public function __construct() {
		$this->crearConexion ();
		$this->tabla = "publicacion";
	}
	public function hacerPublicacion(Publicacion $publicacion) {
		$sql = "INSERT INTO publicacion VALUES(null,'" . $publicacion->getClaveUsuarioPublicacion () . "',null,'" . $publicacion->getFechaPublicacion () . "','" . $publicacion->getTitularPublicacion () . "','" . $publicacion->getContenidoPublicacion () . "','" . $publicacion->getImagenPublicacion () . "','" . $publicacion->getArchivoPublicacion () . "','" . $publicacion->getIdAvisoPublicacion () . "')";
		$qry = mysql_query ( $sql ) or die ( "Error en la tabla->" . $this->tabla . ",de tipo:" . mysql_error () . mysql_errno () );
		if ($qry) {
			return 1; // SE GUARDO
		} else {
			return 0; // ERROR AL GUARDAR
		}
	}
	public function sliderNoticias() {
		$qry = "SELECT id_publicacion,user,tipo_usu,cat_aviso,fecha_crea,titular,cont_publi,imagen_publi,archivo_publi FROM publicacion join usuario on publicacion.cve_usu=usuario.cve_usu join aviso on publicacion.id_aviso=aviso.id_aviso where month(fecha_crea)=month(curdate())  order by fecha_crea desc LIMIT 10";
		@mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h4 align='center'><img src='images/iconos/delete.ico' width='35' height='35'>Error,noticias no disponibles en la publicaci&oacute;n:" . mysql_errno () . "</h4><h4 align='center'><a href='index.php'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorNoticias = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorNoticias [] = $ren;
			}
			return $vectorNoticias;
		} else {
			return $vectorNoticias;
		}
	}
	public function acordeonEventos($mes, $dia) {
		$qry = "SELECT id_publicacion,user,tipo_usu,cat_aviso,fecha_crea,titular,cont_publi,imagen_publi,archivo_publi,publicacion.id_aviso,fecha_pub FROM publicacion join usuario on publicacion.cve_usu=usuario.cve_usu join aviso on publicacion.id_aviso=aviso.id_aviso where month(fecha_pub)=month(curdate()) AND day(fecha_pub)>=day(curdate()) AND (publicacion.id_aviso='6' OR aviso.cat_aviso='Eventos') order by fecha_pub asc";
		@mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<li>No hay eventos</li>" );
		$nfilas = @mysql_num_rows ( $consulta );
		$vectorNoticias = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = @mysql_fetch_array ( $consulta );
				$vectorNoticias [] = $ren;
			}
			return $vectorNoticias;
		} else {
			return $vectorNoticias;
		}
	}
	public function modalEventos($mes, $dia) {
		//Solo se ven los eventos del mes y en la fecha para la que son publicados
		//La fecha de creacion se ve 
		$qry = "SELECT id_publicacion,user,tipo_usu,cat_aviso,fecha_crea,titular,cont_publi,imagen_publi,archivo_publi,publicacion.id_aviso,fecha_pub FROM publicacion join usuario on publicacion.cve_usu=usuario.cve_usu join aviso on publicacion.id_aviso=aviso.id_aviso where month(fecha_pub)='" . mysql_real_escape_string($mes) . "' AND day(fecha_pub)='" . mysql_real_escape_string($dia) . "' AND (publicacion.id_aviso='6' OR aviso.cat_aviso='Eventos') order by fecha_crea desc";
		
		mysql_query ( "SET NAMES 'utf8'" );
		$consulta = @mysql_query ( $qry ) or die ( "<h3 align='center'>Parametro incorrecto:" . mysql_errno () . "</h3><h4 align='center'><a href='index.php'>Regresar</a></h4>" );
		$nfilas = mysql_num_rows ( $consulta );
		$vectorNoticias = array ();
		if ($nfilas > 0) {
			for($i = 0; $i < $nfilas; $i ++) {
				$ren = mysql_fetch_array ( $consulta );
				$vectorNoticias [] = $ren;
			}
			return $vectorNoticias;
		} else {
			return $vectorNoticias;
		}
	}
}