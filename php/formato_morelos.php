<?php
$datosMorelos=$_GET['datos'];

if(isset($datosMorelos)){
	$datosM= json_decode($datosMorelos);
	
	//for ($i = 0; $i < sizeof($datos); $i++) {
	//echo "Datos decodificados".$datos[$i]."<br>";
	//}
}
else {
echo "<script>window.history.back();</script>";
}
?>