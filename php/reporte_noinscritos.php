<html>
<head>
<link rel='stylesheet' href="../css/reporte.css">
<script type="text/javascript" src="../jquery.js"></script>
<style type="text/css">
body {
 scrollbar-face-color:fuchsia;
 scrollbar-highlight-color:yellow;
 scrollbar-3dlight-color:orange;

 scrollbar-shadow-color:gray;
 scrollbar-arrow-color:yellow;
 scrollbar-track-color:aqua;
}
</style>
</head>
<body>
	<!-- TABLA -->
<?php
$nombre='REPORTE GENERAL DE ALUMNOS QUE NO HAN REALIZADO LA SOLICITUD ONLINE';
require_once 'encabezado.php';?>
	
	<h3 align='center'>No. de resultados:
	<?php 
	require_once 'Inscripcion.php';
	require_once 'TablaInscripcion.php';
	
	$inscripcion=new Inscripcion();
	$datosInscripcion=new Inscripcion();
	$tablaInscripcion=new TablaInscripcion();
	$datosInscripcion=$tablaInscripcion->reporteGeneralNoInscritos();
	echo sizeof($datosInscripcion);
	if(sizeof($datosInscripcion)>0){
	?></h3>
	<div style='height:300px;width:600px;border:1px solid #ddd;background:#f1f1f1;overflow-y:scroll;'>
	<table style='height:auto;'>
		<tr>
			<td style='color: blue;'><h3>MATRICULA</h3></td>
			<td style='color: blue;'><h3>NOMBRE DEL ALUMNO</h3></td>
			<td style='color: blue;'><h3>DEUDA</h3></td>
		</tr>
	
	<?php
		foreach ( $datosInscripcion as $inscripcion ) {
			echo "<tr>";
			echo "<td style='font-size:13px;'><b>" . strtoupper ( $inscripcion [0] ) . "</b></td>";
			echo "<td style='font-size:13px;'>" . $inscripcion [3] . " " . $inscripcion [4] . " " . $inscripcion [2] . "</td>";
			if ($inscripcion [12] == "1") {
				echo "<td style='font-size:13px;'><b style='color:red'>SI TIENE</b></td>";
			} else {
				echo "<td style='font-size:13px;'>NO TIENE</td>";
			}
			echo "<tr>";
		}
	} else {
		echo "<tr><td><h3>No hay resultados...</h3></td></tr>";
	}
	?>
	</table><br>
	<br><br>
</div>

	<!-- FIN TABLA -->
</body>
</html>
