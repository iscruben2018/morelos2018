<?php
session_start();
require_once 'Conexion.php';
$conexion=new Conexion();
$conexion->crearConexion();

unset($_SESSION["cantidadcargadas"]); /* SI ACTUALIZAMOS DEBEMOS PONER LA CUENTA A 0 */
unset($_SESSION["contador"]);
$_SESSION["contador"]=10;
?>
<!DOCTYPE html>
<html xml:lang="es" lang="es">
<head>
<title>Scroll infinito de noticias con jQuery y PHP</title>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="scroll.js"></script>
<script type="text/javascript" src="jquery.jscroll.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$('#infinite_scroll').scrollExtend(
{
'target': '#lista_noticias',
'url': 'datos.php'
});
});
</script>
<style>
*{padding:0;margin:0}
html{text-align:center;}
body{width:950px;
margin:0 auto;
font-family:trebuchet ms;
text-align:left;
margin-top:10px;
padding:0 0 150px 0}

li{list-style:none;
margin:20px 0;
border:5px solid #ddd;
padding:20px;
font-size:12px}
div.scrollExtend-loading {
height: 32px;
background-image:url('../images/loading.gif');
background-position: center center;
background-repeat: no-repeat;
}
</style>
</head>
<body>
<h1>Demo - Scroll Infinto con Jquery </h1>
<div id="infinite_scroll">
<ul id="lista_noticias">
<?php
$q1="select matri_alu,ap_alu,am_alu,nom_alu from alumno where cve_bac!='' order by ap_alu asc limit 0,10";
mysql_query("SET NAMES 'utf8'");
$r1=mysql_query($q1);

$q2="select count(matri_alu) as cuenta from alumno where cve_bac!=''";
$r2=mysql_query($q2);
$no=mysql_fetch_object($r2);
$no_resultados=$no->cuenta;
$i=0;
while ($f1=mysql_fetch_array($r1))
{
$i++;
?>
<li>
Registro <?php echo $i;?> de <?php echo $no_resultados;?><br>
<strong><?php echo $f1["matri_alu"]; ?></strong><br /><?php echo strip_tags($f1["ap_alu"]." ".$f1["am_alu"]." ".$f1["nom_alu"]); ?></li>
<?php
}
?>
</ul>
</div>
</body>
</html>
