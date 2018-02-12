<?php
@session_start();
?>
<html>
<head>
<!--[if lt IE 9]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<link rel="stylesheet" href="../style.css" media="screen">
<!--[if lte IE 7]>
<link rel="stylesheet" href="../style.ie7.css" media="screen" />
<![endif]-->
<link rel="stylesheet" href="../style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<!-- JQUERY UI -->
<link type="text/css" href="../css/jqueryui/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jqueryui.js"></script>
<!--BOOTSTRAP-->
<link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
<script src="../js/bootstrap/bootstrap.min.js"></script> 
<!--FIN BOOTSTRAP-->
</head>
<body background='../images/sheet.png'>
<?php
if(isset($_SESSION['matricula'])==$_POST["mat_alu"]){

   if(($_SESSION["nombre"]!=''&&$_SESSION["logueado"]="si")){
   require_once 'Alumno.php';

$opcion_formato=$_POST['opcion_formato'];
$ciclo_clave=$_POST['ciclo_caja'];
$ciclo_nombre=$_POST['ciclo_nombre'];
$fecha=$_POST['fecha'];
$matri_alu=$_POST['mat_alu'];
$nomsec_alu=$_POST['sec_alu'];
$sec_alu=$_POST['codsec_alu'];
$sem_alu=$_POST['sem_alu'];
$bac_alu=$_POST['bac_alu'];
$nom_alu=strtolower($_POST['nom_alu']);
$ap_alu=strtolower($_POST['ap_alu']);
$am_alu=strtolower($_POST['am_alu']);
$curp_alu=$_POST['curp_alu'];
$fnacimiento_alu=$_POST['fnac_alu'];
$sexo_alu=$_POST['sexo_alu'];
$lnacimiento_alu=$_POST['lnac_alu'];
$escolaridad_alu=$_POST['escolaridad_alu'];
$estado_alu=$_POST['estado_alu'];
$ciudad_alu=$_POST['ciudad_alu'];
$col_alu=$_POST['col_alu'];
$cp_alu=$_POST['cp_alu'];
$calle_alu=$_POST['calle_alu'];
$no_alu=$_POST['no_alu'];

$tel1_alu=$_POST['tel1_alu'];
$tel2_alu=$_POST['tel2_alu'];
$mail_alu=strtoupper($_POST['mail_alu']);
$ecivil_alu=$_POST['ecivil_alu'];
$psalud_a=$_POST['psalud_a'];
$ocupacion_alu=$_POST['ocupacion_alu'];
$psalud_alu=$_POST['psalud_alu'];
$dis_alu=$_POST['dis_alu'];
$beca_alu=$_POST['beca_alu'];
$tbeca_alu=$_POST['tbeca_alu'];
$ssalud_alu=$_POST['ssalud_alu'];
$tsalud_alu=$_POST['tsalud_alu'];
$lengua_alu=$_POST['lengua_alu'];
$tlengua_alu=$_POST['tlengua_alu'];
$nom_pad=$_POST['nom_pad'];
$ap_pad=$_POST['ap_pad'];
$am_pad=$_POST['am_pad'];
$edocivil_pad=$_POST['edocivil_pad'];
$estado_pad=$_POST['estado_pad'];
$ciudad_pad=$_POST['ciudad_pad'];
$col_pad=$_POST['col_pad'];
$cp_pad=$_POST['cp_pad'];
$calle_pad=$_POST['calle_pad'];
$no_pad=$_POST['no_pad'];
$tel1_pad=$_POST['tel1_pad'];
$tel2_pad=$_POST['tel2_pad'];
$mail_pad=strtoupper($_POST['mail_pad']);
$tipo_reg=$_POST['tipo_reg'];
$ocupacion_pad=$_POST['ocupacion_pad'];
$ltrabajo_pad=$_POST['ltrabajo_pad'];



$alumno=new Alumno();
$edad_alu=$alumno->calcularEdad($fnacimiento_alu);


$jsonIcatmi=array();
$datos_icatmi[0]="16EIC0011R";
$datos_icatmi[1]="018";
$datos_icatmi[2]=$fecha;
$datos_icatmi[3]=$curp_alu;
$datos_icatmi[4]=$ap_alu;
$datos_icatmi[5]=$am_alu;
$datos_icatmi[6]=$nom_alu;
$datos_icatmi[7]=$edad_alu;
$datos_icatmi[8]=$lnacimiento_alu;
$datos_icatmi[9]=$fnacimiento_alu;
$datos_icatmi[10]=$sexo_alu;
$datos_icatmi[11]="bachillerato incompleto";
$datos_icatmi[12]=$calle_alu;
$datos_icatmi[13]=$col_alu;
$datos_icatmi[14]=$ciudad_alu;
$datos_icatmi[15]=$cp_alu;
$datos_icatmi[16]=$tel1_alu;
$datos_icatmi[17]=$tel2_alu;
$datos_icatmi[18]=$mail_alu;
$datos_icatmi[19]="soltero(a)";
$datos_icatmi[20]=$dis_alu;
$datos_icatmi[21]="estudiante";
$datos_icatmi[22]="convenio vinculacion";
$datos_icatmi[23]="preparacion integral";
$datos_icatmi[24]="ingles nivel";
$datos_icatmi[25]="ingles";
$datos_icatmi[26]="lunes a viernes";
$datos_icatmi[27]="preparatoria morelos";
$datos_icatmi[28]=$matri_alu;
$datos_icatmi[29]="reinscripcion";
$datos_icatmi[30]=$no_alu;



for ($i = 0; $i <sizeof($datos_icatmi); $i++) {
	$jsonIcatmi[]=$datos_icatmi[$i];
}
$datosI=json_encode($jsonIcatmi);


$jsonMorelos=array();
$datos_morelos[0]=$fecha;
$datos_morelos[1]=$ciclo_nombre;
$datos_morelos[2]=$ciclo_clave;
$datos_morelos[3]=$sec_alu;
$datos_morelos[4]=$nomsec_alu;
$datos_morelos[5]=$sem_alu;
$datos_morelos[6]=$matri_alu;
$datos_morelos[7]=$nom_alu;
$datos_morelos[8]=$ap_alu;
$datos_morelos[9]=$am_alu;
$datos_morelos[10]=$fnacimiento_alu;
$datos_morelos[11]=$lnacimiento_alu;
$datos_morelos[12]=$calle_alu;
$datos_morelos[13]=$no_alu;
$datos_morelos[14]=$col_alu;
$datos_morelos[15]=$cp_alu;
$datos_morelos[16]=$ciudad_alu;
$datos_morelos[17]=$estado_alu;
$datos_morelos[18]=$tel1_alu;
$datos_morelos[19]=$tel2_alu;
$datos_morelos[20]=$mail_alu;
$datos_morelos[21]=$psalud_a;
$datos_morelos[22]=$beca_alu;
$datos_morelos[23]=$tbeca_alu;
$datos_morelos[24]=$ssalud_alu;
$datos_morelos[25]=$tsalud_alu;
$datos_morelos[26]=$lengua_alu;
$datos_morelos[27]=$tlengua_alu;
$datos_morelos[28]=$nom_pad;
$datos_morelos[29]=$ap_pad;
$datos_morelos[30]=$am_pad;
$datos_morelos[31]=$ap_pad;
$datos_morelos[32]=$psalud_alu;
$datos_morelos[33]=$edocivil_pad;
$datos_morelos[34]=$calle_pad;
$datos_morelos[35]=$no_pad;
$datos_morelos[36]=$cp_pad;
$datos_morelos[37]=$col_pad;
$datos_morelos[38]=$ciudad_pad;
$datos_morelos[39]=$estado_pad;
$datos_morelos[40]=$tel1_pad;
$datos_morelos[41]=$bac_alu;
$datos_morelos[42]=$tel2_pad;
$datos_morelos[43]=$mail_pad;
$datos_morelos[44]=$ocupacion_pad;
$datos_morelos[45]=$ltrabajo_pad;



for ($i = 0; $i < sizeof($datos_morelos); $i++) {
$jsonMorelos[]=$datos_morelos[$i];	
}
$datosM=json_encode($jsonMorelos);


 
?>
<h3 align='center'>
Has completado tu registro de solicitud! <img src="../images/iconos/check.ico" width="50" height="50" src="">ahora puedes imprimir<br><img src="../images/iconos/informacion.png" width="50" height="50" >Recuerda cerrar la sesi&oacute;n al terminar
</h3><br>
<br>
<div align="center">
<a style='text-decoration: none;' href='fpdf/formatos/formato_morelos.php?datosm=<?php echo $datosM;?>' target='_blank'><img src='../images/iconos/print.ico' width="50" height="50">Imprimir Solicitud Reincripcion Jos&eacute; Ma. Morelos</a>
<br><br>
<a  style='text-decoration: none;' href='fpdf/formatos/formato_icatmi.php?datos=<?php echo $datosI;?>' target='_blank'><img src='../images/iconos/print.ico' width="50" height="50">Imprimir Solicitud Reinscripcion Icatmi</a>
<br><br>

</div>
<?php 
 }
 else{
 echo "<div align='center'>
<h3 align='center'>Debes iniciar sesion para loguearte hazlo aqui:</h3><br><a href='../usuarios/alumnos/solicitud-reinscripcion.html'>LOGIN</a></div>";
 }
 
 }
 else{
 echo "<script>window.location='../usuarios/alumnos/solicitud-reinscripcion.html'</script>";
 }
?>
<br>
<div align="center">
<a href='logout.php?opcion=3' style='text-decoration: none;'><img src='../images/iconos/shutdown.ico' width="50" height="50"><b>Cerrar Sesion</b></a>
</div>
</body>
</html>