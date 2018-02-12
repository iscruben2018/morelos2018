<!DOCTYPE html>
<html>
<head>

<title>Consulta individual de calificaciones</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<script type="text/javascript" src='../js/jquery.js'></script>
<style type='text/css'>
<!--
.Estilo2 {font-size: 12px}
-->
</style>
</head>
<body background='../images/sheet.png'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
	<tr bgcolor='#99ccff'>
	<td width='79' nowrap='nowrap' bgcolor='#FFFFFF'><img src='../images/logo-3.png' width='79' height='77' /></td>
	<td height='60' colspan='2' nowrap='nowrap' bgcolor='#FFFFFF' class='logo'>JOS&Eacute; MA. MORELOS DE ZIT&Aacute;CUARO  
	<span class='tagline'>| <span class='Estilo2'>&quot;CUNA DE H&Eacute;ROES,CRISOL DE PENSADORES&quot; </span></span></td>
	<td width='92' bgcolor='#FFFFFF'>&nbsp;</td>
	</tr>

	<tr bgcolor='#003399'>
	<td width='79' nowrap='nowrap'>&nbsp;</td>
	<td height='36' colspan='2' id='navigation' nowrap='nowrap' class='navText'>
	<a href='javascript:;'></a></td>
	<td>&nbsp;</td>
	</tr>

	<tr bgcolor='#ffffff'>
	<td width='79' valign='top'><img src='../images/spacer.gif' alt='' width='15' height='1' border='0' /></td>
	<td width='42' valign='top'><img src='../images/mm_spacer.gif' alt='' width='35' height='1' border='0' /></td>
	<td width='916' valign='top'><br />
	<table border='0' cellspacing='0' cellpadding='2' width='610'>
        <tr>
          <td class='pageName'>CONSULTA INDIVIDUAL DE CALIFICACIONES <br />
		  &nbsp;<br /></td>
		  <form method="post" action="../usuarios/alumnos/calificacion_alumno.php"> 
		  <input type='text' maxlength="8" size='24' name='matricula' value='' placeholder="INGRESA LA MATRICULA" required="required">
		  <input type='submit' value='CONSULTAR' name='consulta'>
		  </form>
        </tr>
	</table>
	<div id='error'></div>
	