<?php
require_once '../../../../Ciudad.php';
require_once '../../../../Colonia.php';
require_once '../../../../TablaCiudad.php';
require_once '../../../../TablaColonia.php';
require_once '../../../../Ciclo.php';
require_once '../../../../TablaCiclo.php';
require_once '../../../../Seccion.php';
require_once '../../../../TablaSeccion.php';
require_once '../../../../Bachillerato.php';
require_once '../../../../TablaBachillerato.php';
require_once '../../../../Estado.php';
require_once '../../../../TablaEstado.php';

//NOMBRE BACHILLERATO
$nombreBachillerato="";
$bachillerato=new Bachillerato();
$tablaBachillerato=new TablaBachillerato();
$datosBachillerato=new Bachillerato();
$datosBachillerato=$tablaBachillerato->consultaBachillerato($_POST['datosm41']);
$bachillerato=$datosBachillerato;
$nombreBachillerato=$bachillerato->getNombreBachillerato();
//FIN NOMBRE BACHILLERATO

//INICIO NOMBRE SEMESTRE
$cadenaSemestre="";
switch ($_POST['datosm5']) {
	case 1:
		$cadenaSemestre="PRIMERO";
		break;
	case 2:
		$cadenaSemestre="SEGUNDO";
		break;
	case 3:
		$cadenaSemestre="TERCERO";
		break;
	case 4:
		$cadenaSemestre="CUARTO";
		break;
	case 5:
		$cadenaSemestre="QUINTO";
		break;
	case 6:
		$cadenaSemestre="SEXTO";
		break;
		 
	default:
		break;
}
//FIN NOMBRE SEMESTRE

//NOMBRE COLONIA
$nombreColonia="";
$colonias=new Colonia();
$tablaColonias=new TablaColonia();
$datosColonias=new Colonia();

$datosColonias=$tablaColonias->reporteEspecificoColonia("id_col",$_POST['datosm14']);

foreach ($datosColonias as $colonias) {
	$nombreColonia=$colonias->getNombreColonia();
}
//FIN NOMBRE COLONIA

//INICIO NOMBRE CIUDAD
$nombreCiudad="";
$ciudades=new Ciudad();
$tablaCiudades=new TablaCiudad();
$datosCiudades=new Ciudad();

$datosCiudades=$tablaCiudades->reporteEspecificoCiudad("cp_ciu", $_POST['datosm16']);

foreach ($datosCiudades as $ciudades) {
	$nombreCiudad=$ciudades->getNombreCiudad();
}
//FIN NOMBRE CIUDAD

//INICIO NOMBRE ESTADO ALU
$nombreEstado="";
$estados=new Estado();
$tablaEstados=new TablaEstado();
$datosEstados=new Estado();

$datosEstados=$tablaEstados->consultaEstado($_POST['datosm17']);
$estados=$datosEstados;
$nombreEstado=$estados->getNombreEstado();
//FIN NOMBRE ESTADO ALU

//PSALUD ALUMNO
$cadenaPSalud="";
if(strtolower($_POST['datosm21'])=="si"){
	$cadenaPSalud=" SI ( X ) NO ( ) &nbsp;&nbsp;".$_POST['datosm32'];
}
else{
	$cadenaPSalud=" SI ( ) NO ( X ) &nbsp;&nbsp;".$_POST['datosm32'];
}
//
//BECA ALU
$cadenaBeca="";

if(strtolower($_POST['datosm22'])=="si"){
	$cadenaBeca=" SI ( X ) NO ( ) &nbsp;&nbsp;".$_POST['datosm23'];
}
else{
	$cadenaBeca=" SI ( ) NO ( X ) &nbsp;&nbsp;".$_POST['datosm23'];
}
//
//SERVICIO DE SALUD
$cadenasSalud="";
if(strtolower($_POST['datosm24'])=="si"){
	$cadenasSalud=" SI ( X ) NO ( ) &nbsp;&nbsp;".$_POST['datosm25'];
}
else{
	$cadenasSalud=" SI ( ) NO ( X ) &nbsp;&nbsp;".$_POST['datosm25'];
}
//
//CADENA LENGUA ALUMNO
$cadenaLengua="";
if(strtolower($_POST['datosm26'])=="si"){
	$cadenaLengua=" SI ( X ) NO ( ) &nbsp;&nbsp;".$_POST['datosm27'];
}
else{
	$cadenaLengua=" SI ( ) NO ( X ) &nbsp;&nbsp;".$_POST['datosm27'];
}
//
//ECIVIL PADRE
$cadenaECivilPadre="";

switch ($_POST['datosm33']) {
	case 1:
		$cadenaECivilPadre="Casado";
		break;
	case 2:
		$cadenaECivilPadre="Divorciado";
		break;
	case 3:
		$cadenaECivilPadre="Viudo";
		break;
	case 4:
		$cadenaECivilPadre="Union Libre";
		break;
	default:

		break;
}
//
//NOMBRE COLONIA PADRE
$nombreColoniaPadre="";
$coloniaPadre=new Colonia();
$tablaColoniaPadre=new TablaColonia();
$datosColoniaPadre=new Colonia();

$datosColoniaPadre=$tablaColoniaPadre->reporteEspecificoColonia("id_col", $_POST['datosm37']);

foreach ($datosColoniaPadre as $coloniaPadre) {
	$nombreColoniaPadre=$coloniaPadre->getNombreColonia();
}
//
//NOMBRE CIUDAD PADRE
$nombreCiudadPadre="";
$ciudadPadre=new Ciudad();
$tablaCiudadPadre=new TablaCiudad();
$datosCiudadPadre=new Ciudad();

$datosCiudadPadre=$tablaCiudadPadre->reporteEspecificoCiudad("cp_ciu",$_POST['datosm38']);

foreach ($datosCiudadPadre as $ciudadPadre) {
	$nombreCiudadPadre=$ciudadPadre->getNombreCiudad();
}
//
//ESTADO PADRE
$nombreEstadoPadre="";
$estadoPadre=new Estado();
$tablaEstadoPadre=new TablaEstado();
$datosEstadoPadre=new Estado();

$datosEstadoPadre=$tablaEstadoPadre->consultaEstado($_POST['datosm39']);
$estadoPadre=$datosEstadoPadre;
$nombreEstadoPadre=$estadoPadre->getNombreEstado();
//
//CICLO ACTUAL
$ciclo=new Ciclo();
$tablaCiclo=new TablaCiclo();
$datosCiclo=new Ciclo();

$datosCiclo=$tablaCiclo->CicloActual();
$ciclo=$datosCiclo;
$cadenaCiclo=$ciclo->getNoCiclo();
//
//CADENA FECHA
$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$dia=@date("d");
$mes=@date("m");
$titulomes=strtoupper($meses[$mes-1]);
$year=@date("Y");

$cadenaFecha=$dia." DE ".$titulomes." DEL ".$year;
//
//CADENA GENERO ICATMI
if(strtolower($_POST['datosi10'])=="fem"){$cadenaGenero="SEXO FEM (<b>X</b>) MASC ()";}
else{$cadenaGenero="SEXO FEM () MASC (<b>X</b>)";}
//
//COLONIA ICATMI
$colonia=new Colonia();
$tablaColonia=new TablaColonia();
$datosColonia=new Colonia();
$nomColonia="";
$datosColonia=$tablaColonia->reporteEspecificoColonia("id_col", $_POST['datosi13']);

foreach ($datosColonia as $colonia) {
	$nomColonia=$colonia->getNombreColonia();
}
//

//CIUDAD ICATMI
$ciudad=new Ciudad();
$tablaCiudad=new TablaCiudad();
$datosCiudad=new Ciudad();
$nomCiudad="";
$datosCiudad=$tablaCiudad->reporteEspecificoCiudad("cp_ciu", $_POST['datosi14']);

foreach ($datosCiudad as $ciudad) {
	$nomCiudad=$ciudad->getNombreCiudad();
}
//

require_once("dompdf_config.inc.php");
$html=file_get_contents("html.html");
$dompdf=new DOMPDF();
$dompdf->load_html('
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="charset=utf-8">
<link rel="stylesheet" href="../../../../../css/formato_reinscripcion.css">
</head>
<body class="page">

<script type="text/php">
        if ( isset($pdf) ) {
           $w = $pdf->get_width(); 
           $h = $pdf->get_height(); 
           $font = Font_Metrics::get_font("helvetica", "bold"); 
           $pdf->page_text($w - 120, $h - 40, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0)); 
        }
    </script>


<table style="width: 100%" class="header">
<tr>
<td style="width: 50%; vertical-align: middle;">
<h1 style="text-align: left"><img src="../../../../../images/logo-3.png">Escuela Preparatoria Jos&eacute; Ma. Morelos de Zit&aacute;cuaro,S.C</h1>
<p style="text-align: left">Incorporada a la U.M.S.N.H</p>
<p style="text-align: left">Clave:109-218.1 &quot;74&quot; </p></td>

<td style="width: 50%; text-align: right;">
<h1 style="text-align: right">SOLICITUD DE REINSCRIPCI&Oacute;N</h1>
<h1 style="text-align: right">CICLO ESCOLAR '.$cadenaCiclo.'</h1>
<p align="right" style="font-weight: bold; font-size: 0.7em;">H.ZIT&Aacute;CUARO,MICH A '.$cadenaFecha.' </p></td>
</tr>

</table>

<table class="detail" style="margin: 0px; border-top: none;">

<tr class="head">
  <td colspan="4" ><div align="center">DATOS ACAD&Eacute;MICOS </div></td>
  </tr>
<tr>
  <td colspan="4" class="label">&nbsp;</td>
  </tr>
<tr>
<td class="label">MATRICULA</td>
<td class="field">'.$_POST['datosm6'].' </td>
<td class="label">SECCION</td>
<td class="field">'.$_POST['datosm4'].'</td>
</tr>

<tr>
<td class="label">SEMESTRE</td>
<td class="field">'.$cadenaSemestre.' </td>
<td class="label">BACHILLERATO</td>
<td class="field">'.$nombreBachillerato.'</td>
</tr>

<tr>
  <td colspan="4">&nbsp;</td>
</tr>
<tr class="head">
  <td colspan="4" class="label"><div align="center">DATOS DEL ALUMNO </div></td>
  </tr>
<tr>
  <td colspan="4" class="label">&nbsp;</td>
  </tr>
</table>

<table class="detail" style="border-top: none; margin: 0px 0px 1.5em 0px;">
<tr>
  <td class="label" style="width: 8.25%">NOMBRE</td>
  <td colspan="3" class="field" style="width: 16.5%">'.strtoupper($_POST['datosm7']).'&nbsp;'.strtoupper($_POST['datosm8']).'&nbsp;'.strtoupper($_POST['datosm9']).'</td>
  <td class="field" style="width: 8.25%"><!--APATERNO--> </td>
  <td colspan="2" class="field" style="width: 16.5%"><!--AMATERNO--></td>
</tr>
<tr>
  <td class="label" style="width: 8.25%">FECHA DE NACIMIENTO </td>
  <td colspan="3" class="field" style="width: 16.5%">'.strtoupper($_POST['datosm10']).'</td>
  <td class="label" style="width: 8.25%">LUGAR DE NACIMIENTO </td>
  <td colspan="2" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($_POST['datosm11']).' </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">DOMICILIO</td>
  <td colspan="6" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($_POST['datosm12']).','.strtoupper($_POST['datosm13']).'</td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">COLONIA</td>
  <td colspan="3" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($nombreColonia).' </td>
  <td class="label" style="width: 8.25%">C&Oacute;DIGO POSTAL </td>
  <td colspan="2" class="field" style="width: 16.5%">'.$_POST['datosm15'].'</td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">CIUDAD</td>
  <td colspan="3" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($nombreCiudad).' </td>
  <td class="label" style="width: 8.25%">ESTADO</td>
  <td colspan="2" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($nombreEstado).' </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">TEL&Eacute;FONOS</td>
  <td class="field" style="width: 16.5%">'.strtoupper($_POST['datosm18']).' </td>
  <td colspan="2" class="field" style="width: 8.25%">'.strtoupper($_POST['datosm19']).'</td>
  <td class="label" style="width: 8.25%">E-MAIL </td>
  <td colspan="2" class="field" style="width: 16.5%">'.strtoupper($_POST['datosm20']).' </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">PROBLEMAS DE SALUD (ESPECIFIQUE) </td>
  <td colspan="3" class="field" style="width: 16.5%">'.$cadenaPSalud.'</td>
  <td class="label" style="width: 8.25%">&iquest;CUENTA CON ALGUNA BECA DE ALG&Uacute;N PROGRAMA? (ESPECIFIQUE) </td>
  <td colspan="2" class="field" style="width: 8.25%">'.$cadenaBeca.'</td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">&iquest;CUENTA CON SERVICIO DE SALUD? (ESPECIFIQUE) </td>
  <td colspan="3" class="field" style="width: 16.5%">'.$cadenasSalud.'</td>
  <td class="label" style="width: 8.25%">&iquest;HABLA O DOMINA ALGUNA LENGUA INDIGENA? (ESPECIFIQUE) </td>
  <td colspan="2" class="field" style="width: 8.25%;text-transform:uppercase;">'.$cadenaLengua.'</td>
  </tr>
<tr>
  <td colspan="7" class="label" style="width: 8.25%">&nbsp;</td>
  </tr>
<tr class="head">
  <td colspan="7" class="label" style="width: 8.25%"><div align="center">DATOS DEL PADRE O TUTOR </div></td>
  </tr>
<tr>
  <td colspan="7" class="label" style="width: 8.25%">&nbsp;</td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">NOMBRE</td>
  <td class="field" style="width: 16.5%">'.strtoupper($_POST['datosm28']).'&nbsp;'.strtoupper($_POST['datosm29']).'&nbsp;'.strtoupper($_POST['datosm30']).' </td>
  <td class="field" style="width: 16.5%"><!--AP PADRE--> </td>
  <td class="field" style="width: 16.5%"><!--AM PADRE--> </td>
  <td class="label" style="width: 8.25%">ESTADO CIVIL </td>
  <td colspan="2" class="field" style="width: 16.5%">'.strtoupper($cadenaECivilPadre).' </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">DOMICILO:</td>
  <td colspan="6" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($_POST['datosm34']).','.strtoupper($_POST['datosm35']).' </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">COLONIA</td>
  <td colspan="3" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($nombreColoniaPadre).'</td>
  <td class="label" style="width: 8.25%">C&Oacute;DIGO POSTAL </td>
  <td colspan="2" class="field" style="width: 16.5%">'.$_POST['datosm36'].'</td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">CIUDAD</td>
  <td colspan="3" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($nombreCiudadPadre).' </td>
  <td class="label" style="width: 8.25%">ESTADO</td>
  <td colspan="2" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($nombreEstadoPadre).'</td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">TEL&Eacute;FONOS</td>
  <td colspan="3" class="field" style="width: 16.5%">'.strtoupper($_POST['datosm40']).'&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;'.strtoupper($_POST['datosm42']).' </td>
  <td class="label" style="width: 8.25%">E-MAIL </td>
  <td colspan="2" class="field" style="width: 16.5%">'.strtoupper($_POST['datosm43']).' </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">OCUPACI&Oacute;N</td>
  <td colspan="3" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($_POST['datosm44']).'</td>
  <td class="label" style="width: 8.25%">LUGAR DE TRABAJO </td>
  <td colspan="2" class="field" style="width: 16.5%;text-transform:uppercase;">'.strtoupper($_POST['datosm45']).'</td>
  </tr>
<tr>
  <td colspan="7" class="label" style="width: 8.25%">&nbsp;</td>
</tr>
<tr class="head">
  <td colspan="7" class="head" style="width: 8.25%"><div align="center">RESPONSIVA</div></td>
</tr>
<tr>
  <td colspan="7" class="head" style="width: 8.25%">&nbsp;</td>
</tr>
<tr>
  <td colspan="7" class="head" style="width: 8.25%">Los suscritos se comprometen a respetar y estar conforme con lo establecido en el REGLAMENTO ESCOLAR y a colaborar con las autoridades escolares para lograr el maximo aprovechamiento academico. </td>
</tr>
<tr>
  <td colspan="7" class="head" style="width: 8.25%">&nbsp;</td>
  </tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%">&nbsp;</td>
  <td colspan="3" class="label" style="width: 8.25%">FIRMA DEL ALUMNO </td>
  <td colspan="2" class="label" style="width: 16.5%">FIRMA DE PADRE O TUTOR </td>
  </tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%"><img src="../../../../../images/morelos_opacity.png" width="50" heigth="50"></td>
  <td colspan="3" class="label" style="width: 8.25%"><p>&nbsp;</p>
    <p>__________________________</p></td>
  <td colspan="2" class="label" style="width: 8.25%"><p>&nbsp;</p>
    <p>____________________________</p></td>
  </tr>
<tr>
  <td colspan="7" class="label" style="width: 8.25%">&nbsp;</td>
  </tr>
<tr class="head">
  <td colspan="7" class="label" style="width: 8.25%"><div align="center">PARA USO EXCLUSIVO DEL DEPARTAMENTO DE CONTROL ESCOLAR </div></td>
  </tr>
<tr>
  <td colspan="7" class="label" style="width: 8.25%">&nbsp;</td>
  </tr>
<tr>
  <td colspan="2" class="field" style="width: 8.25%">ALUMNO REGULAR (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) </td>
  <td colspan="4" class="field" style="width: 8.25%"><div align="left">&nbsp;&nbsp;ALUMNO IRREGULAR (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) </div></td>
  <td class="field" style="width: 16.5%"></td>
</tr>
<tr>
  <td colspan="2" bgcolor="#FFFFFF" class="field" style="width: 8.25%"></td>
  <td colspan="3" bgcolor="#EEEEEE" class="head" style="width: 8.25%"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;CARGA DE MATERIAS </div></td>
  <td bgcolor="" class="head" style="width: 8.25%">&nbsp;</td>
  <td class="field" style="width: 16.5%">RECIBI&Oacute; Y REVIS&Oacute; </td>
</tr>
<tr>
  <td colspan="2" rowspan="5" class="label" style="width: 8.25%"></div></td>
  <td colspan="4" class="label" style="width: 8.25%">&nbsp;</td>
  <td rowspan="4" class="label" style="width: 16.5%;"><p>&nbsp;</p>
    <p>______________________</p></td>
</tr>
<tr>
  <td colspan="4" class="label" style="width: 8.25%;">______________________________________________________</td>
</tr>
<tr>
  <td colspan="4" class="label" style="width: 8.25%;">______________________________________________________</td>
  </tr>
<tr>
  <td colspan="4" class="label" style="width: 8.25%;">______________________________________________________</td>
</tr>
<tr>
  <td colspan="4" class="label" style="width: 8.25%;">&nbsp;</td>
  <td class="field" style="width: 16.5%"></td>
</tr>

</table>



<!--INICIO FORMATO ICATMI-->
<table style="width: 100%" >
<tr>
<td style="width: 50%; vertical-align: middle;">
<h2 style="text-align: left"><!--<img src="../../../../../images/logohead.png" width="298" height="140">-->
<img src="../../../../../images/logo-head-new.jpg" width="325" height="100">		
</h2>
</td>

<td style="width: 50%; text-align: right;">
<h2 style="text-align: right"><!--<img src="../../../../../images/logohead2.png" alt="" width="298" height="140" />-->
<img src="../../../../../images/logo-head-new2.jpg" alt="" width="325" height="100" />		
</h2>
</td>
</tr>

</table>

<table class="detail" style="margin: 0px; border-top: none;">

<tr>
  <td colspan="13" ><div align="center"><strong>SOLICITUD DE INSCRIPCI&Oacute;N </strong></div></td>
</tr>

</table>

<table class="detail" style="border-top: none; margin: 0px;">
<tr>
  <td class="label" style="width: 8.25%">CLAVE</td>
  <td class="field" style="width: 16.5%">16EIC0011R</td>
  <td class="label" style="width: 16.5%">NO DE UNIDAD DE CAPACITACI&Oacute;N </td>
  <td class="field" style="width: 16.5%">018</td>
  <td class="label" style="width: 16.5%">FECHA:<b><u>'.$_POST['datosi2'].'</u></b></td>
  <td class="field" style="width: 16.5%"> </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">N&Uacute;MERO DE CONTROL </td>
  <td colspan="3" class="field" style="width: 16.5%;border-bottom:thin;border-left:thin;border-right:thin;border-top:thin;bordercolor:#000000;">&nbsp;</td>
  <td class="label" style="width: 8.25%">CURP:<b>'.strtoupper($_POST['datosi3']).'</b></td>
  <td class="field" style="width: 16.5%"></td>
  </tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">NUEVO INGRESO </td>
  <td colspan="2" class="label" style="width: 16.5%">REINSCRIPCI&Oacute;N ( <b>X</b> ) </td>
  <td class="label" style="width: 16.5%">SECCI&Oacute;N ( ) </td>
</tr>

<tr>
  <td colspan="3" class="field" style="width: 8.25%">'.strtoupper($_POST['datosi4']).' </td>
  <td colspan="2" class="field" style="width: 16.5%">'.strtoupper($_POST['datosi5']).'</td>
  <td class="field" style="width: 16.5%">'.strtoupper($_POST['datosi6']).'</td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">APELLIDO PATERNO </td>
  <td colspan="2" class="label" style="width: 16.5%">APELLIDO MATERNO </td>
  <td class="label" style="width: 16.5%">NOMBRE</td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">A&Ntilde;OS CUMPLIDOS :______<b><u>'.$_POST['datosi7'].'</u></b>______</td>
  <td colspan="2" class="label" style="width: 16.5%">_______<b><u>'.strtoupper($_POST['datosi8']).','.$_POST['datosi9'].'</u></b>__________</td>
  <td class="label" style="width: 16.5%">'.$cadenaGenero.'</td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">&nbsp;</td>
  <td colspan="2" class="label" style="width: 16.5%">LUGAR Y FECHA DE NACIMIENTO </td>
  <td class="label" style="width: 16.5%">&nbsp;</td>
</tr>

<tr>
  <td class="label" style="width: 8.25%">ESCOLARIDAD</td>
  <td class="label" style="width: 8.25%">PRIMARIA INCOMPLETA ( ) </td>
  <td class="label" style="width: 8.25%">PRIMARIA COMPLETA ( ) </td>
  <td class="label" style="width: 16.5%">SECUNDARIA INCOMPLETA () </td>
  <td class="label" style="width: 16.5%">SECUNDARIA COMPLETA ( <b>X</b> ) </td>
  <td class="label" style="width: 16.5%">BACHILLERATO INCOMPLETO () </td>
</tr>
<tr>
  <td class="label" style="width: 8.25%">&nbsp;</td>
  <td class="label" style="width: 8.25%">BACHILLERATO COMPLETO </td>
  <td class="label" style="width: 8.25%">T&Eacute;CNICO ( ) </td>
  <td class="label" style="width: 16.5%">ESTUDIOS SUPERIORES INCOMPLETOS() </td>
  <td class="label" style="width: 16.5%">ESTUDIOS SUPERIORES COMPLETOS () </td>
  <td class="label" style="width: 16.5%">&nbsp;</td>
  </tr>

<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>DOMICILIO</strong></div></td>
  </tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%">CALLE:<b><u>'.strtoupper($_POST['datosi12']).','.$_POST['datosi30'].'</u></b></td>
  <td class="field" style="width: 8.25%;text-transform:uppercase;"></td>
  <td class="label" style="width: 16.5%">COLONIA:<b><u>'.strtoupper($nomColonia).'</u></b></td>
  <td colspan="2" class="field" style="width: 16.5%;text-transform:uppercase;"></td>
  </tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%">MUNICIPIO:<b><u>'.strtoupper($nomCiudad).'</u></b></td>
  <td class="field" style="width: 8.25%;text-transform:uppercase;"> </td>
  <td class="label" style="width: 16.5%;text-transform:uppercase;">CIUDAD:<b><u>'.strtoupper($nomCiudad).'</u> </b></td>
  <td colspan="2" class="field" style="width: 16.5%;text-transform:uppercase;"> </td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">CP:<b><u>'.$_POST['datosi15'].'</u></b></td>
  <td class="field" style="width: 8.25%"></td>
  <td class="label" style="width: 8.25%">TELEFONO(S):<br><b>'.$_POST['datosi16'].'&nbsp;&nbsp;</b>&nbsp;<b>Y '.$_POST['datosi17'].'</b></td>
  <td class="field" style="width: 16.5%"> </td>
  <td class="label" style="width: 16.5%">CORREO ELECTR&Oacute;NICO :<b>'.strtoupper($_POST['datosi18']).'</b></td>
  <td class="field" style="width: 16.5%"></td>
</tr>

<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>ESTADO CIVIL </strong></div></td>
  </tr>

<tr>
  <td colspan="2" class="label" style="width: 8.25%">SOLTERO (A) ( <b>X</b> ) </td>
  <td class="label" style="width: 8.25%">CASADO ( ) </td>
  <td class="label" style="width: 16.5%">VIUDO ( ) </td>
  <td class="label" style="width: 16.5%">DIVORCIADO ( ) </td>
  <td class="label" style="width: 16.5%">U.LIB ( ) </td>
</tr>

<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>TIPO DE DISCAPACIDAD </strong></div></td>
  </tr>

<tr>
  <td colspan="2" class="label" style="width: 8.25%">VISUAL ( ) </td>
  <td class="label" style="width: 8.25%">AUDITIVA ( ) </td>
  <td class="label" style="width: 16.5%">DE LENGUAJE ( ) </td>
  <td class="label" style="width: 16.5%">MOTRIZ MUSCULO ESQUELETICO () </td>
  <td class="label" style="width: 16.5%">MENTAL ( ) </td>
</tr>

<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>OCUPACI&Oacute;N  </strong></div></td>
  </tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%">ESTUDIANTE ( <b>X</b> ) </td>
  <td class="label" style="width: 8.25%">EMPLEADO ( ) </td>
  <td class="label" style="width: 16.5%">NEGOCIO PROPIO ( ) </td>
  <td class="label" style="width: 16.5%">OBRERO ( ) </td>
  <td class="label" style="width: 16.5%">AMA DE CASA ( ) </td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">OTROS (ESPECIFIQUE)___________________</td>
  <td class="label" style="width: 8.25%">LUGAR DONDE TRABAJA: </td>
  <td colspan="2" class="label" style="width: 8.25%">___________________________</td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">PUESTO:_______________________________</td>
  <td class="label" style="width: 8.25%">SUELDO MENSUAL $ : </td>
  <td colspan="2" class="label" style="width: 8.25%">_______________</td>
  </tr>


<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>DOCUMENTACI&Oacute;N ENTREGADA </strong></div></td>
  </tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">C.U.R.P ( ) </td>
  <td colspan="3" class="label" style="width: 8.25%">COMPROBANTE DE ESTUDIOS ( ) </td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">ACTA DE NACIMIENTO ( ) </td>
  <td colspan="3" class="label" style="width: 8.25%">COMPROBANTE DE DOMICILIO ( ) </td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">CRED. DE ELECTOR ( ) </td>
  <td colspan="3" class="label" style="width: 8.25%">2 FOTOGRAF&Iacute;AS DE TAMA&Ntilde;O INFANTIL ( ) </td>
  </tr>

<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>MEDIO POR EL QUE SE ENTER&Oacute; </strong></div></td>
</tr>


<tr>
  <td colspan="2" class="label" style="width: 8.25%">PRENSA ( ) RADIO ( ) TV ( ) </td>
  <td colspan="2" class="label" style="width: 8.25%">CARTEL ( ) VOLANTE ( ) TRIPCTICO ( ) </td>
  <td colspan="2" class="label" style="width: 8.25%">PERIFONEO ( ) REUNION ( ) LONA ( ) </td>
  </tr>

<tr>
  <td colspan="2" class="label" style="width: 8.25%">RED SOCIAL ( ) RUEDA DE PRENSA ( )</td>
  <td colspan="2" class="label" style="width: 8.25%">GRUPO SOCIAL ( ) PERSONA A PERSONA ( ) </td>
  <td colspan="2" class="label" style="width: 8.25%">YA HE SIDO CAPACITADO ( ) </td>
</tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%">EN ICATMI ( ) OTROS ( ESPECIFIQUE ) </td>
  <td colspan="2" class="label" style="width: 8.25%">____<strong><u>CONVENIO DE VINCULACI&Oacute;N</u></strong> _____</td>
  <td colspan="2" class="label" style="width: 8.25%">&nbsp;</td>
</tr>
<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>MOTIVOS DE ELECCI&Oacute;N DEL SISTEMA DE CAPACITACI&Oacute;N</strong></div></td>
  </tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">PARA EMPLEARSE O AUTOEMPLEARSE ( ) </td>
  <td colspan="3" class="label" style="width: 8.25%">PARA MEJORAR SU SITUACI&Oacute;N EN EL TRABAJO ( ) </td>
</tr>
<tr>
  <td colspan="3" class="label" style="width: 8.25%">POR DISPOSICI&Oacute;N DE TIEMPO LIBRE ( ) </td>
  <td colspan="3" class="label" style="width: 8.25%">OTROS (ESPECIFIQUE): _______<strong><u>PREPARACION INTEGRAL</u></strong>______ </td>
</tr>
<tr>
  <td colspan="6" style="width: 8.25%"><div align="center"><strong>CURSO AL QUE DESEA INSCRIBIRSE </strong></div></td>
  </tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%">NOMBRE DEL CURSO: </td>
  <td class="label" style="width: 8.25%">__<strong><u>INGL&Eacute;S NIVEL</strong></u>__</td>
  <td class="label" style="width: 8.25%">ESPECIALIDAD:</td>
  <td colspan="2" class="label" style="width: 8.25%"><strong><u>INGL&Eacute;S</u></strong>__</td>
  </tr>
<tr>
  <td colspan="2" class="label" style="width: 8.25%">HORARIO:</td>
  <td class="label" style="width: 8.25%">_______________</td>
  <td class="label" style="width: 16.5%">DIAS:__<strong><u>LUNES A VIERNES</u></strong>__ </td>
  <td colspan="2" class="label" style="width: 16.5%">LUGAR:__<strong><u>PREPARATORIA MORELOS</u></strong>__</td>
  </tr>

<tr>
  <td colspan="3" class="label" style="width: 8.25%"><strong>&iquest;HA ESTADO INSCRITO EN ALGUN CURSO ANTERIOR EN EL ICATMI ZITACUARO?</strong> SI ( ) NO ( ) </td>
  <td colspan="3" class="label" style="width: 16.5%"><strong>A&Ntilde;O:________</strong></td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%"><strong>ESPECIALIDAD:</strong></td>
  <td colspan="2" class="label" style="width: 8.25%">___________________________________</td>
  <td colspan="3" class="label" style="width: 8.25%">&nbsp;</td>
  </tr>
<tr>
  <td colspan="6" class="label" style="width: 8.25%"><div align="center">EL SUSCRITO SE COMPROMETE A CUMPLIR LAS NORMAS Y DISPOSICIONES DICTADAS POR LAS AUTORIDADES DEL CENTRO </div><br></td>
  </tr>
 <!--
 <tr>
  <td colspan="6" class="label" style="width: 8.25%">&nbsp;</td>
  </tr>
 -->

<tr>
  <td class="label" style="width: 8.25%">&nbsp;</td>
  <td colspan="3" class="field" style="width: 16.5%">________________________________________</td>
  <td colspan="2" class="label" style="width: 8.25%">____<strong><u>ESTEPHANIA COLIN CASTRO</strong></u>___</td>
  </tr>
<tr>
  <td class="label" style="width: 8.25%">&nbsp;</td>
  <td colspan="3" class="label" style="width: 16.5%">NOMBRE Y FIRMA DEL SOLICITANTE </td>
  <td colspan="2" class="label" style="width: 8.25%">NOMBRE Y FIRMA DE LA PERSONA QUE RECIBE </td>
  </tr>
		
		<tr>
		<td colspan="4" class="label" style="width: 8.25%">
		<pre style="color:white;background:#B22222;font-size:11px;"><b>
		
		Av. Perif&eacute;rico Paseo de la Rep&uacute;blica No. 2546,Col. Prados del Campestre
		
		
		C.P. 58397 ,Morelia,Mich. Tel. 01 (443) 310 89 00,315 00 97
		
		
		www.icatmi.michoacan.gob.mx     direccion.general@icatmi.michoacan.gob.mx
		</b>
		</pre>
		</td>
  <td colspan="2" class="label" style="width: 8.25%"><img src="../../../../../images/logo-footer-new.jpg" width="235px" heigth="50px"></td>
		</tr>
</table>
<!--FIN FORMATO ICATMI-->
</div>
</body>
</html>
');

$dompdf->render();
$dompdf->stream("imprimir_entregar_solicitudes.pdf",array("Attachment" => false));
exit();
?>