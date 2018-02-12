<?php
require_once 'Conexion.php';
$conexion=new Conexion();
$conexion->crearConexion();

$sql="SELECT cve_doc as clave,cve_doc as user,cve_doc as password,'docente' as tipo_usu,correo_doc as correo_usu from docente where cve_doc!=''";
$qry=mysql_query($sql)or die(mysql_error().mysql_errno());

if($qry){
	$i=0;
	while ($ren=mysql_fetch_array($qry)){
		$sql2="INSERT INTO usuario(cve_usu,user,pass,tipo_usu,correo_usu)VALUES('".$ren[0]."',md5('".$ren[1]."'),md5('".$ren[2]."'),'".$ren[3]."','".$ren[4]."')";
		$qry2=mysql_query($sql2)or die(mysql_error().mysql_errno());
		if($qry2){
		$i++;
		echo "Éxito en el qry".$i."<br>";
		}
		else{
			echo "Error";
		}
	}
}
else{
	echo "Error en el qry";
}
?>