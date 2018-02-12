<?php
session_start ();

require_once 'Conexion.php';
$conexion = new Conexion ();
$conexion->crearConexion ();
if (! isset ( $_SESSION ["cantidadcargadas"] ))
	$_SESSION ["cantidadcargadas"] = 10;

$q1 = "SELECT inscripcion.matri_alu,ap_alu,fecha_ins,tipo_ins,am_alu,nom_alu,nom_bac,no_sec,semestre.nom_sem,status_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem where status_alu='reinscrito' order by ap_alu asc limit " . $_SESSION ["cantidadcargadas"] . ",10";
mysql_query ( "SET NAMES 'utf8'" );
$r1 = mysql_query ( $q1 );
$q2 = "select count(inscripcion.matri_alu) as cuenta,inscripcion.matri_alu,ap_alu,nom_alu,nom_bac,semestre.nom_sem,status_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem where status_alu='reinscrito'";
$r2 = mysql_query ( $q2 );
$no = mysql_fetch_object ( $r2 );
$no_resultados = $no->cuenta;
if ($no_resultados > 0) {
	while ( $f1 = mysql_fetch_array ( $r1 ) ) {
		
		$_SESSION ["contador"] += 1;
		?>
<li><b style='text-align: center;'>Registro <?php echo $_SESSION["contador"];?> de 
<?php echo $no_resultados;?></b><br><br>
<table border='1'>
<tr><td class='tabla'><strong>MATRICULA:</strong></td>
	<td class='tabla'><strong>NOMBRE:</strong></td>
	<td class='tabla'><strong>BACHILLERATO:</strong></td>
	<td class='tabla'><strong>SECCION:</strong></td>
    <td class='tabla'><strong>SEMESTRE:</strong></td>
<?php
		$meses = array (
				"Enero",
				"Febrero",
				"Marzo",
				"Abril",
				"Mayo",
				"Junio",
				"Julio",
				"Agosto",
				"Septiembre",
				"Octubre",
				"Noviembre",
				"Diciembre" 
		);
		
		$mes = substr ( @date ( "d-m-Y", strtotime ( $f1 ['fecha_ins'] ) ), 4, 1 );
		
		$dia = @date ( "d", strtotime ( $f1 ['fecha_ins'] ) );
		$titulomes = $meses [$mes - 1];
		$year = @date ( "Y", strtotime ( $f1 ['fecha_ins'] ) );
		$cadenaFecha = $dia . " de " . $titulomes . " del " . $year;
		?>
<td class='tabla'><strong>FECHA:</strong></td>
<td class='tabla'><strong>TRAMITE:</strong></td>
<td class='tabla'><strong>ESTATUS:</strong></td>
</tr>
<tr>
<td><strong><?php echo $f1["matri_alu"]; ?></strong></td>
<td><strong style='color: blue;'><?php echo strip_tags($f1["ap_alu"]." ".$f1["am_alu"]." ".$f1["nom_alu"]); ?></strong></td>
<td><strong><?php echo strip_tags($f1["nom_bac"])?></strong></td> 
<td><strong><?php echo strip_tags($f1["no_sec"])?></strong></td>
<td><strong><?php echo strip_tags($f1["nom_sem"])?></strong></td>
<td><strong><?php echo strip_tags($cadenaFecha)?></strong></td>
<td><strong><?php echo strtoupper(strip_tags($f1["tipo_ins"]))?></strong></td>
<td><strong style='color: blue;'><?php echo strtoupper(strip_tags($f1["status_alu"]))?></strong></td>
</tr>
</table>
</li>
<?php
	}
} else {
	echo "<b>No hay resultados</b>";
}
$_SESSION ["cantidadcargadas"]+=10;

?>