<?php
$cve_doc = $_GET ['cve_doc'];
$siia = $_GET ['siia'];

require_once ('Conexion.php');
require_once ('encabezado.php');
$conexion = new Conexion ();
$conexion->crearConexion ();
echo "<link rel='stylesheet' type='text/css' href='../css/reporte.css'>";
$sql = "UPDATE docente_mat SET cve_doc='77' WHERE cve_doc='" . $cve_doc . "' AND siia='" . $siia . "'";
$qry = @mysql_query ( $sql ) or die ( mysql_error () . mysql_errno () );

if ($qry) {
	
	$filas_cambiadas = mysql_affected_rows ();
	
	if ($filas_cambiadas > 0) {
		echo "<h3 align='center' style='color:green;'>Materia(s) removida(s):" . $filas_cambiadas . ".<p><h3 align='center'><img src='images/iconos/check.ico' width='35' heigth='35'>La operaci&oacute;n se realiz&oacute; de manera correcta!</h3>";
		echo "<br><b>Cargando...</b><img src='../images/loading.gif'>";
		header ( "Refresh:3;URL=" . $_SERVER ['HTTP_REFERER'] );
	} else {
		echo "<h3 align='center' style='color:red;'><img src='images/iconos/informacion.png' width='35' heigth='35'>Aviso,no se realizaron los cambios</h3>";
		echo "<br><b>Cargando...</b><img src='../images/loading.gif'>";
		header ( "Refresh:3;URL=" . $_SERVER ['HTTP_REFERER'] );
	}
} else {
	echo "<h3 align='center' style='color:red;'>
	<img src='images/iconos/delete.ico' width='35' heigth='35'>Ocurrio un error de conexi&oacute;n</h3>";
	echo "<br><b>Cargando...</b><img src='../images/loading.gif'>";
	header ( "Refresh:3;URL=" . $_SERVER ['HTTP_REFERER'] );
}
?>