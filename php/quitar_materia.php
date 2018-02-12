<?php
$cve_ins = $_GET ['cve_ins'];
$no_renhor = $_GET ['no_renhor'];
require_once 'Conexion.php';

$conexion = new Conexion ();
$conexion->crearConexion ();

$sql = "DELETE FROM insc_renglon WHERE cve_ins='" . $cve_ins . "' AND no_renhor='" . $no_renhor . "'";
$qry = mysql_query ( $sql ) or die ( "Error de bd en la consulta<br> de tipo:" . mysql_error () . mysql_errno () . "<a href='javascript:window.history.back();'>Regresar</a>" );

if ($qry) {
	header ( 'Location: ' . $_SERVER ['HTTP_REFERER'] );
} else {
	echo "Error de bd en la consulta<br><a href='javascript:window.history.back();'>Regresar</a>";
}
?>