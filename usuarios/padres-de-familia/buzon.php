<?php
$nombre=$_POST['nombre_comentarios'];
$correo=$_POST['correo_comentarios'];
$comentarios=$_POST['texto_comentarios'];

if(!$nombre||!$correo||!$comentarios){
	header("Location:".$_SERVER['HTTP_REFERER']);
}
else{
		header("Refresh:3;URL=mailto:escjosemamorelos@hotmail.com");
	

}
?>