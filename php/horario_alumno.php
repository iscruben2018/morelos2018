
<?php 
$nombre = 'Horario alumno';
require_once 'encabezado.php';
require_once 'Conexion.php';
$conexion = new Conexion ();

$conexion->crearConexion ();

$sql = "SELECT cve_ins,fecha_ins,no_ciclo,semestre.nom_sem,inscripcion.matri_alu,ap_alu,am_alu,nom_alu,nom_bac,no_sec from inscripcion join alumno on inscripcion.matri_alu=alumno.matri_alu join bachillerato on inscripcion.cve_bac=bachillerato.cve_bac join seccion on inscripcion.cod_sec=seccion.cod_sec join semestre on inscripcion.cve_sem=semestre.cve_sem join ciclo on inscripcion.cve_ciclo=ciclo.cve_ciclo  where inscripcion.matri_alu='10650131A' order by fecha_ins asc";
$qry = mysql_query ( $sql ) or die ( mysql_error () );

if ($qry) {
	while ( $ren = mysql_fetch_array ( $qry ) ) {
		$cve_ins = $ren ['cve_ins'];
		$fecha_ins = $ren ['fecha_ins'];
		$no_ciclo = $ren ['no_ciclo'];
		$nom_sem = $ren ['nom_sem'];
		$matri_alu = $ren ['matri_alu'];
		$ap_alu = $ren ['ap_alu'];
		$am_alu = $ren ['am_alu'];
		$nom_alu = $ren ['nom_alu'];
		$nom_bac = $ren ['nom_bac'];
		$no_sec = $ren ['no_sec'];
	}
} else {
	echo "Error";
}

?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../css/reporte.css'>
</head>
<body>
	<table width="870" height="253" border="1">

		<tr>
			<td height="99" colspan="2"><h3>CARGA ACAD&Eacute;MICA</h3>
				<p>
					<b>CICLO:</b><?php echo $no_ciclo;?></p>
				<p>
					<b>FECHA:</b><?php echo $fecha_ins;?></p>
				<p>
					<b>SEMESTRE:</b><?php echo $nom_sem;?></p></td>
		</tr>

		<tr>
			<td width="243"><b>MATRICULA:</b><?php echo $matri_alu;?></td>
			<td width="337"><b>NOMBRE:</b><?php echo strtoupper($ap_alu)." ".strtoupper($am_alu)." ".strtoupper($nom_alu)?></td>
		</tr>

		<tr>
			<td><b>BACHILLERATO:</b><?php echo $nom_bac;?></td>
			<td><b>SECCI&Oacute;N:</b><?php echo $no_sec;?></td>
		</tr>
	</table>
	<table width="870" border="1">
		<tr>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'><b>SIIA</b></td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>CURSO/CATEDR&Aacute;TICO</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>LUNES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>MARTES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>MI&Eacute;RCOLES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>JUEVES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>VIERNES</td>

		</tr>
<?php 
$sql2 = "select no_renhor,hi_renhor,hf_renhor,dia_renhor,docente.cve_doc,nom_doc,ap_doc,am_doc,materia.siia,nom_mat,materia.cve_sem from insc_renglon join docente_mat on insc_renglon.num_doc_mat=docente_mat.num_doc_mat join docente on docente_mat.cve_doc=docente.cve_doc join materia on docente_mat.siia=materia.siia join inscripcion on insc_renglon.cve_ins=inscripcion.cve_ins join seccion on inscripcion.cod_sec=seccion.cod_sec where inscripcion.cve_ins='23' ORDER BY hi_renhor asc ;";
$qry2 = mysql_query ( $sql2 ) or die ( mysql_error () );
if ($qry2) {
	while ( $ren2 = mysql_fetch_array ( $qry2 ) ) {
		echo "<tr>";
		echo "<td class='pageName' style='font-size:14px georgia;'>" . $ren2 ['siia'] . "<br>" . $ren2 ['cve_sem'] . "</td>";
		echo "<td class='pageName' style='font-size:14px;'>" . strtoupper ( $ren2 ['nom_mat'] ) . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'] . "</td>";
		echo "<td style='font-size: 13px;font-weight: bold;color:black'>";
		if ($ren2 ['dia_renhor'] == 'Lunes') {
			echo $ren2 ['hi_renhor'] . "-" . $ren2 ['hf_renhor'];
		} else {
			echo "/";
		}
		echo "</td>";
		echo "<td style='font-size: 13px;font-weight: bold;color:black'>";
		if ($ren2 ['dia_renhor'] == 'Martes') {
			echo $ren2 ['hi_renhor'] . "-" . $ren2 ['hf_renhor'];
		} else {
			echo "/";
		}
		echo "</td>";
		echo "<td style='font-size: 13px;font-weight: bold;color:black'>";
		if ($ren2 ['dia_renhor'] == 'Miercoles') {
			echo $ren2 ['hi_renhor'] . "-" . $ren2 ['hf_renhor'];
		} else {
			echo "/";
		}
		echo "</td>";
		echo "<td style='font-size: 13px;font-weight: bold;color:black'>";
		if ($ren2 ['dia_renhor'] == 'Jueves') {
			echo $ren2 ['hi_renhor'] . "-" . $ren2 ['hf_renhor'];
		} else {
			echo "/";
		}
		echo "</td>";
		echo "<td style='font-size: 13px;font-weight: bold;color:black'>";
		if ($ren2 ['dia_renhor'] == 'Viernes') {
			echo $ren2 ['hi_renhor'] . "-" . $ren2 ['hf_renhor'];
		} else {
			echo "/";
		}
		echo "</td>";
		echo "</tr>";
		
		/**
		 * **********************DIA LUNES****************
		 */
		if ($ren2 ['dia_renhor'] == 'Lunes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '07:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '08:25') {
			$cadenaLunesHoraUno .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Lunes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '08:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '09:20') {
			$cadenaLunesHoraDos .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Lunes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '09:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '10:15') {
			$cadenaLunesHoraTres .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Lunes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '10:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '11:25') {
			$cadenaLunesHoraCuatro .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Lunes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '11:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '12:20') {
			$cadenaLunesHoraCinco .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Lunes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '12:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '13:15') {
			$cadenaLunesHoraSeis .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Lunes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '13:15' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '14:20') {
			$cadenaLunesHoraSiete .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		/**
		 * *******************FIN DIA LUNES*************
		 */
		
		/**
		 * **********************DIA MARTES****************
		 */
		if ($ren2 ['dia_renhor'] == 'Martes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '07:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '08:25') {
			$cadenaMartesHoraUno .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Martes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '08:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '09:20') {
			$cadenaMartesHoraDos .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Martes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '09:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '10:15') {
			$cadenaMartesHoraTres .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Martes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '10:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '11:25') {
			$cadenaMartesHoraCuatro .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Martes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '11:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '12:20') {
			$cadenaMartesHoraCinco .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Martes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '12:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '13:15') {
			$cadenaMartesHoraSeis .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Martes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '13:15' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '14:20') {
			$cadenaMartesHoraSiete .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		/**
		 * *******************FIN DIA MARTES*************
		 */
		
		/**
		 * **********************DIA MIERCOLES****************
		 */
		if ($ren2 ['dia_renhor'] == 'Miercoles' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '07:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '08:25') {
			$cadenaMiercolesHoraUno .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Miercoles' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '08:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '09:20') {
			$cadenaMiercolesHoraDos .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Miercoles' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '09:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '10:15') {
			$cadenaMiercolesHoraTres .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Miercoles' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '10:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '11:25') {
			$cadenaMiercolesHoraCuatro .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Miercoles' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '11:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '12:20') {
			$cadenaMiercolesHoraCinco .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Miercoles' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '12:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '13:15') {
			$cadenaMiercolesHoraSeis .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Miercoles' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '13:15' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '14:20') {
			$cadenaMiercolesHoraSiete .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		/**
		 * *******************FIN DIA MIERCOLES*************
		 */
		
		/**
		 * **********************DIA JUEVES****************
		 */
		if ($ren2 ['dia_renhor'] == 'Jueves' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '07:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '08:25') {
			$cadenaJuevesHoraUno .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Jueves' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '08:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '09:20') {
			$cadenaJuevesHoraDos .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Jueves' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '09:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '10:15') {
			$cadenaJuevesHoraTres .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Jueves' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '10:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '11:25') {
			$cadenaJuevesHoraCuatro .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Jueves' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '11:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '12:20') {
			$cadenaJuevesHoraCinco .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Jueves' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '12:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '13:15') {
			$cadenaJuevesHoraSeis .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Jueves' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '13:15' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '14:20') {
			$cadenaJuevesHoraSiete .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		/**
		 * *******************FIN DIA JUEVES*************
		 */
		
		/**
		 * **********************DIA VIERNES****************
		 */
		if ($ren2 ['dia_renhor'] == 'Viernes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '07:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '08:25') {
			$cadenaViernesHoraUno .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Viernes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '08:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '09:20') {
			$cadenaViernesHoraDos .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Viernes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '09:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '10:15') {
			$cadenaViernesHoraTres .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Viernes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '10:30' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '11:25') {
			$cadenaViernesHoraCuatro .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Viernes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '11:25' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '12:20') {
			$cadenaViernesHoraCinco .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Viernes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '12:20' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '13:15') {
			$cadenaViernesHoraSeis .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
		if ($ren2 ['dia_renhor'] == 'Viernes' && substr ( $ren2 ['hi_renhor'], 0, 5 ) == '13:15' && substr ( $ren2 ['hf_renhor'], 0, 5 ) == '14:20') {
			$cadenaViernesHoraSiete .= "" . $ren2 ['nom_mat'] . "<br>" . $ren2 ['nom_doc'] . " " . $ren2 ['ap_doc'] . " " . $ren2 ['am_doc'];
		}
	/**
	 * *******************FIN DIA VIERNES*************
	 */
	}
} else {
	echo "Error";
}

?>


<tr>
			<td colspan='7'><div align='left'>
					<br>_____________________<br>
				</div>
				<div align='right'
					style='font-size: 13px; font-weight: bold; color: black'>
					_______________<br>ALUMNO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div></td>
		</tr>
	</table>
	<br>
	<table width="1050" height="253" border="1">

		<tr>
			<td height="99" colspan="2"><h3>CARGA ACAD&Eacute;MICA</h3>
				<p>
					<b>CICLO:</b><?php echo $no_ciclo;?></p>
				<p>
					<b>FECHA:</b><?php echo $fecha_ins;?></p>
				<p>
					<b>SEMESTRE:</b><?php echo $nom_sem;?></p></td>
		</tr>

		<tr>
			<td width="243"><b>MATRICULA:</b><?php echo $matri_alu;?></td>
			<td width="337"><b>NOMBRE:</b><?php echo strtoupper($ap_alu)." ".strtoupper($am_alu)." ".strtoupper($nom_alu)?></td>
		</tr>

		<tr>
			<td><b>BACHILLERATO:</b><?php echo $nom_bac;?></td>
			<td><b>SECCI&Oacute;N:</b><?php echo $no_sec;?></td>
		</tr>
	</table>

	<table border="1">
		<tr>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'><b>HORA/D&Iacute;A</b></td>

			<td style='font-size: 13px; font-weight: bold;' class='tabla'>LUNES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>MARTES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>MI&Eacute;RCOLES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>JUEVES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>VIERNES</td>
			<td style='font-size: 13px; font-weight: bold;' class='tabla'>S&Aacute;BADO</td>
		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>7:30 a 8:25</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaLunesHoraUno;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMartesHoraUno;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMiercolesHoraUno;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaJuevesHoraUno;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaViernesHoraUno;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'>/</td>
		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>8:25 a 9:20</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaLunesHoraDos;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMartesHoraDos;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMiercolesHoraDos;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaJuevesHoraDos;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaViernesHoraDos;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'>/</td>
		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>9:20 a 10:15</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaLunesHoraTres;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMartesHoraTres;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMiercolesHoraTres;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaJuevesHoraTres;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaViernesHoraTres;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'>/</td>
		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>10:15 a 10:30</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><u>R</u></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><u>E</u></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><u>C</u></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><u>E</u></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><u>S</u></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><u>O</u></td>
		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>10:30 a 11:25</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaLunesHoraCuatro;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMartesHoraCuatro;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMiercolesHoraCuatro;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaJuevesHoraCuatro;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaViernesHoraCuatro;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'>/</td>
		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>11:25 a 12:20</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaLunesHoraCinco;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMartesHoraCinco;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMiercolesHoraCinco;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaJuevesHoraCinco;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaViernesHoraCinco;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'>/</td>
		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>12:20 a 13:15</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaLunesHoraSeis;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMartesHoraSeis;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMiercolesHoraSeis?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaJuevesHoraSeis;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaViernesHoraSeis;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'>/</td>

		</tr>
		<tr>
			<td class='pageName' style='font-size: 14px georgia;'>13:15 a 14:10</td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaLunesHoraSiete;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMartesHoraSiete;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaMiercolesHoraSiete;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaJuevesHoraSiete;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'><?php echo $cadenaViernesHoraSiete;?></td>
			<td style='font-size: 13px; font-weight: bold; color: black'>/</td>

		</tr>
		<tr>
			<td colspan='7'><div align='left'>
					<br>_____________________<br>
				</div>
				<div align='right'
					style='font-size: 13px; font-weight: bold; color: black'>
					_______________<br>ALUMNO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div></td>
		</tr>
	</table>
</body>
</html>