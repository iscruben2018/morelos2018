
<?php 
require_once 'Conexion.php';
require_once 'Inscripcion.php';
require_once 'TablaInscripcion.php';
?>
<!DOCTYPE html>
<html>
<head>

<title>Reporte solicitudes reinscripcion</title>
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
          <td class='pageName'>REPORTE GENERAL DE SOLICITUDES REALIZADAS <br />
		  &nbsp;<br /></td>
		  <form method="post" action=""> 
		  <input type='text' maxlength="8" size='24' name='busqueda' value='' placeholder="INGRESA LA MATRICULA" required="required">
		  <input type='submit' value='CONSULTA INDIVIDUAL' name='consulta'>
		  </form>
        </tr>
	</table>
 
        <?php 
		$inscripcion=new Inscripcion();
        $tablaInscripcion=new TablaInscripcion();
        $noSolicitudes=new TablaInscripcion();
        $reporte=new Inscripcion();
     
        if(isset($_POST['consulta'])&&$_POST['busqueda']!=''){
        $inscripcion=$tablaInscripcion->consultaSolicitudInscripcion($_POST['busqueda']);
        }
        else{
        $inscripcion=$tablaInscripcion->reporteGeneralSolicitudes();
        }

        if(sizeof($inscripcion)>0){
        $numero=$noSolicitudes->noSolicitudesReinscripcion();
        echo "<br>";
        echo "<h3><a href='javascript:window.history.back();'>Regresar</a></h3>";
        echo "<h3 align='center'>N&Uacute;MERO DE SOLICITUDES ENCONTRADAS:".sizeof($inscripcion)."</h3>";
        echo "<br>";
        echo "<h3 align='center'>N&Uacute;MERO DE SOLICITUDES PENDIENTES POR REVISAR:".$numero."</h3>";
	    echo "<table width='710' cellpadding='2' cellspacing='01' border='0' id='calendar'>
        <tr id='noborder'>
          <td colspan='9' class='subHeader'>&nbsp;</td>
        </tr>
		<tr id='weekdays' bgcolor='#003399'>
		  <th align='center' width='15%' class='smallText'>FOLIO</th>
          <th align='center' width='15%' class='smallText'>MATRICULA</th>
          <th align='center' width='14%' class='smallText'>NOMBRE</th>
          <th align='center' width='14%' class='smallText'>BACHILLERATO</th>
          <th align='center' width='14%' class='smallText'>SECCION</th>
          <th align='center' width='14%' class='smallText'>SEMESTRE</th>
          <th align='center' width='14%' class='smallText'>FECHA SOLICITUD </th>
          <th align='center' width='14%' class='smallText'>TIPO DE SOLICITUD </th>
          <th align='center' width='15%' class='smallText'>STATUS ALUMNO </th>
        </tr>";
	     
	    $meses=array(
	    		"Enero","Febrero","Marzo",
	    		"Abril","Mayo","Junio",
	    		"Julio","Agosto","Septiembre",
	    		"Octubre","Noviembre","Diciembre");
        foreach($inscripcion as $reporte){
		 echo " <tr id='calheader' bgcolor='#ffffcc'>
		  <td valign='top' align='center' class='smallText'>".$reporte[0]."</td>
          <td valign='top' align='center' class='smallText'>".$reporte[1]."</td>
          <td valign='top' align='center' class='smallText'>".$reporte[2]." ".$reporte[3]." ".$reporte[4]."</td>
          <td valign='top' align='center' class='smallText'>".$reporte[5]."</td>";
		  
		 
		 $mes=substr(@date("d-m-Y",strtotime($reporte[8])),4,1);
		 
		 $dia=@date("d",strtotime($reporte[8]));
		 $titulomes=$meses[$mes-1];
		 $year=@date("Y",strtotime($reporte[8]));
		 $cadenaFecha=$dia." de ".$titulomes." del ".$year;
		 echo "
          <td valign='top' align='center' class='smallText'>".$reporte[6]."</td>
          <td valign='top' align='center' class='smallText'>".$reporte[7]."</td>
          <td valign='top' align='center' class='smallTex'>".$cadenaFecha."</td>
          <td valign='top' align='center' class='smallText'>".strtoupper($reporte[9])."</td>
          <td valign='top' align='center' class='smallText'>";
		  
		 
		  if($reporte[10]=="proceso-re"){
		  echo "<br>
			<h3>EN PROCESO DE REINSCRIPCION</h3><br>
		  	<a href='controlador.php?opcion=12&matricula_proceso=".$reporte[1]."' style=text-decoration:none;>
		  	<img src=../images/iconos/stop.png width=50 heigth=50 style='border:none;'>
		  	VALIDAR SOLICITUD</a>
			";
		  }
		  else{
		  	if($reporte[10]=="reinscrito"){
		  	echo "<h3 style='color:blue;'>".strtoupper($reporte[10])."</h3>";
		     echo "<br>
			
		  	<a href='controlador.php?opcion=13&matricula_proceso=".$reporte[1]."' style='text-decoration:none;'>
		  	<img src='../images/iconos/tick.ico' width='50' heigth='50' style='border:none;'>
		  	CANCELAR SOLICITUD</a>
			";
		  	}
		  	else{
		  		echo "&nbsp;";
		  	}
		  }
		  echo "
		  
		  </td></tr>";
        }
      }
	  else{
	  echo "<h3 align='center'>";
	  echo "No hay registros disponibles</h3><br>";
	  echo "<h3 align='center'><a style='text-decoration:none;' href='javascript:window.history.back();'>";
	  echo "<img src='../images/iconos/left.ico' width='50' heigth='50'>Regresar</a></h3>";
	  }
	  
	  ?>

        <tr>
          <td colspan='9' valign='top' class='smallText'>&nbsp;</td>
        </tr>
      </table>
	  </td>
	<td>&nbsp;</td>
	</tr>

	<tr>
	<td width='79'>&nbsp;</td>
    <td width='42'>&nbsp;</td>
    <td width='916'>&nbsp;</td>
	<td width='92'>&nbsp;</td>
	</tr>
</table><br>
<h3 align='center'>
<a href="#" style='text-decoration:none;'class="scrollup" style="display: block;">
<img src='../images/icono.jpg' width='50' heigth='50'>
</a></h3>
</body>
</html>


