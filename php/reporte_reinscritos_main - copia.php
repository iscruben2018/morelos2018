<?php
session_start ();
require_once 'Conexion.php';
require_once 'fecha.php';
$conexion = new Conexion ();
$conexion->crearConexion ();

unset ( $_SESSION ["cantidadcargadas"] ); /* SI ACTUALIZAMOS DEBEMOS PONER LA CUENTA A 0 */
unset ( $_SESSION ["contador"] );
$_SESSION ["contador"] = 10;
?>
<!DOCTYPE html>
<html>
<head>
<title>Reporte</title>
<link rel='stylesheet' href="../css/reporte.css">
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="scroll.js"></script>
<script type="text/javascript" src="jquery.jscroll.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
$('#infinite_scroll').scrollExtend(
{
'target': '#lista_alumnos',
'url': 'reporte_reinscritos.php'
});
});
</script>
<script type="text/javascript" src="../js/scroll_bottom.js"></script>
<style>
* {
	padding: 0;
	margin: 0
}

html {
	text-align: center;
}

body {
	width: 890px;
	margin: 0 auto;
	font-family: trebuchet ms;
	text-align: left;
	margin-top: 14px;
	padding: 0 0 150px 0
}

li {
	list-style: none;
	margin: 12px 0;
	border: 4px solid #ddd;
	padding: 22px;
	font-size: 14px;
	
}

div.scrollExtend-loading {
	height: 32px;
	background-image: url('loading.gif');
	background-position: center center;
	background-repeat: no-repeat;
}
</style>
</head>
<body background='../images/sheet.png'>

	<!-- TABLA -->
	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
		<tr bgcolor='#99ccff'>
			<td width='79' nowrap='nowrap' bgcolor='#FFFFFF'><img
				src='../images/logo-3.png' width='79' height='77' /></td>
			<td height='60' colspan='2' nowrap='nowrap' bgcolor='#FFFFFF'
				class='logo'>JOS&Eacute; MA. MORELOS DE ZIT&Aacute;CUARO <span
				class='tagline'>| <span class='Estilo2'>&quot;CUNA DE
						H&Eacute;ROES,CRISOL DE PENSADORES&quot; </span></span></td>
			<td width='92' bgcolor='#FFFFFF'>&nbsp;</td>
		</tr>

		<tr bgcolor='#003399'>
			<td width='79' nowrap='nowrap'>&nbsp;</td>
			<td height='36' colspan='2' id='navigation' nowrap='nowrap'
				class='navText'><a href='javascript:;'></a></td>
			<td>&nbsp;</td>
		</tr>

		<tr bgcolor=''>
			<td width='79' valign='top'><img src='../images/spacer.gif' alt=''
				width='15' height='1' border='0' /></td>
			<td width='42' valign='top'><img src='../images/mm_spacer.gif' alt=''
				width='35' height='1' border='0' /></td>
			<td width='916' valign='top'><br />
				<table border='0' cellspacing='0' cellpadding='2' width='610'>
					<tr>
						<td class='pageName'>REPORTE GENERAL DE ALUMNOS REINSCRITOS <br />
							&nbsp;<br /></td>

					</tr>
				</table> <!-- FIN TABLA -->
				<div id="infinite_scroll">
					<ul id="lista_alumnos">
<?php
$q1 = "SELECT inscripcion.matri_alu,ap_alu,am_alu,nom_alu,nom_bac,fecha_ins,tipo_ins,semestre.nom_sem,no_sec,status_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem where status_alu='reinscrito' order by ap_alu asc limit 0,10";
@mysql_query ( "SET NAMES 'utf8'" );
$r1 = @mysql_query ( $q1 );

$q2 = "select count(inscripcion.matri_alu) as cuenta,inscripcion.matri_alu,ap_alu,nom_alu,nom_bac,semestre.nom_sem,status_alu from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem where status_alu='reinscrito'";
$r2 = @mysql_query ( $q2 );
$no = @mysql_fetch_object ( $r2 );
$no_resultados = $no->cuenta;
if ($no_resultados > 0) {
	$i = 0;
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
	
	while ( $f1 = mysql_fetch_array ( $r1 ) ) {
		$i ++;
		?>
<li><b style='text-align: center;'>Registro <?php echo $i;?> de <?php echo $no_resultados;?></b><br>
						<br>
						<br> <strong><br> MATRICULA:</strong><?php echo $f1["matri_alu"]; ?>
<br /> <strong>NOMBRE:</strong><strong style='color: blue;'><?php echo strip_tags($f1["ap_alu"]." ".$f1["am_alu"]." ".$f1["nom_alu"]); ?></strong>
							<br> <strong>BACHILLERATO:</strong><?php echo strip_tags($f1["nom_bac"])?>
<br> <strong>SECCION:</strong><?php echo strip_tags($f1["no_sec"])?>
<br> <strong>SEMESTRE:</strong><?php echo strip_tags($f1["nom_sem"])?>
<br>
<?php
		
		$mes = substr ( @date ( "d-m-Y", strtotime ( $f1 ['fecha_ins'] ) ), 4, 1 );
		
		$dia = @date ( "d", strtotime ( $f1 ['fecha_ins'] ) );
		$titulomes = $meses [$mes - 1];
		$year = @date ( "Y", strtotime ( $f1 ['fecha_ins'] ) );
		$cadenaFecha = $dia . " de " . $titulomes . " del " . $year;
		?>
<strong>FECHA DE TRAMITE DE REINSCRIPCION:</strong><?php echo strip_tags($cadenaFecha)?>
<br> <strong>TIPO DE TRAMITE:</strong><?php echo strtoupper(strip_tags($f1["tipo_ins"]))?>
<br> <strong>ESTATUS:</strong><strong style='color: blue;'><?php echo strtoupper(strip_tags($f1["status_alu"]))?></strong>
							<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br></li>

<?php
	}
} else {
	echo "<b>No hay resultados</b><br><a href='javascript:window.history.back();'>Regresar</a>";
}
?>
</ul>
				</div>
				<h3 align='center'><a href="#" style='text-decoration: none;' class="scrollup" style="display: block;"> <img src='../images/icono.jpg' width='50' heigth='50'>
					</a>
				</h3>

</body>
</html>
