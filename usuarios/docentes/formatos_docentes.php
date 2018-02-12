<?php
session_start();
if(isset($_SESSION['tipo_usuario'])=='docente'&&$_SESSION['codigo_usuario']!=''){
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Formatos Docentes</title>
<link rel="stylesheet" href="../../style.css" media="screen">
<link rel="stylesheet" href="../../style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">
<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
<script src="../../jquery.js"></script>
<script src="../../script.js"></script>
<script src="../../script.responsive.js"></script>

<!--BOOTSTRAP-->
<link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="../../css/reporte.css" media="all">
<script src="../../js/bootstrap/bootstrap.min.js"></script> 
<!--FIN BOOTSTRAP-->
<style type="text/css">
body{
  background-attachment:fixed;
  background-repeat:inherit;
}
</style>

</head>

<html>
<body background="../../images/sheet.png">

<?php 
//OBTENEMOS LA RUTA A REVISAR Y LA RUTA ANTERIOR PARA VOLVER ..
if($_GET['path']){
	$path=$_GET['path'];
	$back=implode("/",explode("/", $_GET['path'],-2));
	if($back)
		$back.="/*";
	else  
		$back="*";
}
else{
$path="*";
}
?>
<header>


</header>

<nav class="navbar navbar-default" role="navigation" style='width:83%;'> 
   <div class="navbar-header"> 
      <button type="button" class="navbar-toggle" data-toggle="collapse"  
         data-target="#example-navbar-collapse"> 
         <span class="sr-only">Navegacion</span> 
         <span class="icon-bar"></span> 
         <span class="icon-bar"></span> 
         <span class="icon-bar"></span>       
     </button> 
     
   </div> 
   <div class="collapse navbar-collapse" id="example-navbar-collapse"> 
      <ul class="nav navbar-nav"> 
         <li>
         <a href="#"><b>Bienvenido:
         <?php $_SESSION["codigo_usuario"];
          echo $_SESSION['tipo_usuario'];
          ?>
         </b>&nbsp;<img src='../../images/iconos/user.ico' width='55' heigth='55'>
         <?php echo $_SESSION["nombre_docente"];?>
         <br>
         </a></li> 
      
         <li>
         <a style='text-decoration:none;' href='../../php/logout_docente.php'>
         <b>Salir</b>&nbsp;
         <img src='../../images/iconos/shutdown.ico' width='35' heigth='35'>
         </a>
         </li> 
        
      </ul> 
   </div> 
</nav> 
<?php 
$nombre=$path;
require_once '../../php/encabezado.php';
?>
<!-- CIERRA TABLA  -->
</td>
</tr>
</table>
<!--  -->
<section>
<?php 
//SI NO ESTAMOS EN LA RAIZ,PERMITIMOS VOLVER ATRAS
if($path!="*")
echo "<div class='bold group'>";
echo "<a href='?path=".$back."'>";
echo "<img src='../../images/iconos/left.ico' width='35' heigth='35'>";
echo "</a>";
echo "</div>";
//DEVUELVE EL TIPO MIME DE SU EXTENSION PHP 5.3 
$finfo1=finfo_open(FILEINFO_MIME_TYPE);
//DEVUELVE LA CODIFICACION MIME DEL ARCHIVO DESDE PHP 5.3
//PARA ELLO DEBE ESTAR ACTIVADO 
$finfo2=finfo_open(FILEINFO_MIME_ENCODING);


$folder=0;
$file=0;
//RECORREMOS LOS ARCHIVOS
foreach (glob($path) as $filename){
$fileMime=finfo_file($finfo1, $filename);
$fileEncoding=finfo_file($finfo2, $filename);
if($fileMime=="directory"){
	$folder+=1;
	echo "<div class='directory group'>";
	echo "<a style='text-decoration:none;' href='?path=".$filename."/*' class='name'>".end(explode("/", $filename))."&nbsp;&nbsp;";
	echo "<img src='../../images/iconos/folder.ico' width='30' heigth='30'></a>";
    echo "<div class='mime'>(".$fileEncoding.")</div>";
    echo "</div>";
	
 }
 else{
 	if($fileMime=="text/x-php"||$fileMime=="application/x-rar"||$fileMime=="text/html"){
 	$fileMime="";
 	$fileEncoding="";
 	$filename="";
 	$enlace='';
 	}
 	else{
 	$enlace='Descargar';
 	}
   $file+=1;
   //SE MUESTRA LA CARPETA Y SE PERMITE PULSAR
   echo "<div class='group'>";
   echo "<div class='size'>".number_format(filesize($filename)/1024,2,",",".")."Kb</div>";
		
   echo "<div class='name'>".end(explode("/", $filename))."&nbsp;";
   echo "<img src='../../images/iconos/file.ico' width='30' heigth='30'>&nbsp;";
   echo "<a  style='text-decoration:none;' href='".$filename."'>".$enlace."</a>&nbsp;";
   echo "</div>";
   echo "<div class='mime'>".$fileMime."(".$fileEncoding.")</div>";
   echo "</div>";
   //SE MUESTRA LA INFO DEL ARCHIVO
 
}

}
finfo_close($finfo1);
finfo_close($finfo2);

?>

<footer>
<?php echo $folder?>&nbsp;carpeta/s y &nbsp;
<?php echo $file?>archivo/s

</footer>
<br>

</section>

</body>
</html>
<?php	
}
else{
header("Location:index.html");
}
?>
