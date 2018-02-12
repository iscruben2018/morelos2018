<?php
session_start();
if(isset($_SESSION['tipo_usuario'])=='docente'&&$_SESSION['codigo_usuario']!=''){


?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
<meta charset="utf-8">
<title>Formatos</title>
<style type="text/css">
section>div{
clear: both;
	
}
.group{
overflow: hidden;
padding: 2px;

}
section.group:nth-child(odd){
background: #e5e5e5;
}
.directory{
font-weight: bold;
}
.name{
float: left;
width: 250px;
overflow: hidden;
}
.mime{
float: left;
margin-left: 10px;
}
.size{
float: right;
}
.bold{
font-weight: bold;
}
footer{
text-align: center;
margin-top: 20px;
color: #808080;
}
</style>
</head>

</html>
<body>

<?php 
if($_GET['path']){
$path=$_GET['path'];
$back=implode("/",explode(
"/", $_GET['path'],-2));
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
<h1>Formatos y temarios</h1>
</header>
<nav>
<h2><?php echo $path?></h2>
</nav>
<section>
<?php 
if($path!="*")
echo "<div class='bold group'><a href='?path=".$back."'>..</a></div>";
$finfo1=finfo_open(FILEINFO_MIME_TYPE);
$finfo2=finfo_open(FILEINFO_MIME_ENCODING);

$folder=0;
$file=0;

foreach (glob($path) as $filename){
$fileMime=finfo_file($finfo1, $filename);
$fileEncoding=finfo_file($finfo2, $filename);
if($fileMime=="directory"){
	$folder+=1;
	echo "<div class='directory group'><a href='?path=".$filename."/*' class='name'>".end(
		 explode("/", $filename))."</a>
		<div class='mime'>(".$fileEncoding.")</div>
		</div>";
	
 }
 else{
   $file+=1;
   echo "<div class='group'>
		<div class='size'>".number_format(filesize($filename)/1024,2,",",".")."Kb
		</div>
		<div class='name'>".end(
		explode("/", $filename))."</div>
		<div class='mime'>".
		$fileMime."(".$fileEncoding.")
   		</div>
   		</div>
		";
 
}

}
finfo_close($finfo1);
finfo_close($finfo2);

?>

<footer>
<?php echo $folder?>
carpeta/s y <?php echo $file?>
archivo/s
</footer>
</section>
</body>




<?php	
}
else{
@header("Location:".$_SERVER['HTTP_REFERER']);
}
?>
