<?php

/* ARCHIVO SCROLL.PHP */
session_start ();

require_once 'Conexion.php';
$conexion = new Conexion ();
$conexion->crearConexion ();
if (! isset ( $_SESSION ["cantidadcargadas"] ))
	$_SESSION ["cantidadcargadas"] = 10;

$q1 = "select matri_alu,ap_alu,am_alu,nom_alu from alumno where cve_bac!='' order by ap_alu asc limit " . $_SESSION ["cantidadcargadas"] . ",10";
mysql_query ( "SET NAMES 'utf8'" );
$r1 = mysql_query ( $q1 );
$q2 = "select count(matri_alu) as cuenta from alumno where cve_bac!=''";
$r2 = mysql_query ( $q2 );
$no = mysql_fetch_object ( $r2 );
$no_resultados = $no->cuenta;
while ( $f1 = mysql_fetch_array ( $r1 ) ) {
	
	$_SESSION ["contador"] += 1;
	?>
<li>
Registro <?php echo $_SESSION["contador"];?> de <?php echo $no_resultados;?>
<br> <strong><?php echo utf8_encode($f1["matri_alu"]); ?></strong><br />
<?php echo strip_tags($f1["ap_alu"]." ".$f1["am_alu"]." ".$f1["nom_alu"]); ?></li>
<?php
}
$_SESSION ["cantidadcargadas"] += 10;

?>