<?php
require_once 'Alumno.php';
require_once 'TablaAlumno.php';

require_once 'AlumnoExtra.php';
require_once 'TablaAlumnoExtra.php';

require_once 'Inscripcion.php';
require_once 'TablaInscripcion.php';

if(isset($_POST['matricula_consulta'])){
	if (! $_POST ['matricula_consulta']) {
		echo "<h3 align='center' style='color:red'>Ingresa la matricula</h3>
			<br><div align='center'><a href='javascript:window.history.back();'>Regresar</a></div>";
	} else {
		$alumno = new Alumno ();
		$tablaAlumno = new TablaAlumno ();
		
		if ($tablaAlumno->existeAlumno ( $_POST ['matricula_consulta'] ) == "1") {
			$inscripcion = new Inscripcion ();
			$tablaInscripcion = new TablaInscripcion ();
			if ($tablaInscripcion->existeInscripcionAlumno ( $_POST ['matricula_consulta'] ) == "1") {
				@header ( "Location:modificar_solicitud.php?matricula_sesion=" . $_POST ['matricula_consulta'] );
			} else {
				$alumnoExtra = new AlumnoExtra ();
				$tablaAlumnoExtra = new TablaAlumnoExtra ();
				if ($tablaAlumnoExtra->existeAlumnoExtra ( $_POST ['matricula_consulta'] ) == "1") {
					@header ( "Location:modificar_solicitud.php?matricula_sesion=" . $_POST ['matricula_consulta'] );
				} else {
					echo "<h3 align='center' style='color:red'>
			   Ocurri&oacute; un error,la matricula a&uacute;n no ha realizado el registro de reinscripci&oacute;n</h3>
			   <br><div align='center'>
			   <a href='javascript:window.history.back();' style='text-decoration:none;'>
			   <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
				}
			}
		} else {
			echo "<h3 align='center' style='color:red'>
			Ocurri&oacute; un error,la matricula del alumno no existe
			<img src='../images/iconos/delete.ico' width=30 heigth=30></h3>
			<br><div align='center'>
			<a href='javascript:window.history.back();' style='text-decoration:none;'>
		    <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
		}
	}
}
else{
?>

<!DOCTYPE html>
<html>
<head>

<title>Consulta individual de solicitud</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<script type="text/javascript" src='../js/jquery.js'></script>
<style type='text/css'>
<!--
.Estilo2 {
	font-size: 12px
}
-->
</style>
</head>
<body background='../images/sheet.png'>

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

		<tr bgcolor='#ffffff'>
			<td width='79' valign='top'><img src='../images/spacer.gif' alt=''
				width='15' height='1' border='0' /></td>
			<td width='42' valign='top'><img src='../images/mm_spacer.gif' alt=''
				width='35' height='1' border='0' /></td>
			<td width='916' valign='top'><br />
				<table border='0' cellspacing='0' cellpadding='2' width='610'>
					<tr>
						<td class='pageName'>CONSULTA INDIVIDUAL DE SOLICITUD DE
							REINSCRIPCI&Oacute;N <br /> &nbsp;<br />
						</td>
						<form method="post" action="">
							<input type='text' maxlength="9" size='24'
								name='matricula_consulta' value=''
								placeholder="INGRESA LA MATRICULA" required="required"> <input
								type='submit' value='ENVIAR' name='consulta'>
						</form>
					</tr>
				</table>
 
<?php }?>
