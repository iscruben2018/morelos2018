<?php
$nombre="REGISTRAR CICLO ESCOLAR";
echo "<link rel='stylesheet' href='../css/reporte.css' type='text/css' />";
require_once 'encabezado.php';
require_once 'Ciclo.php';
require_once 'TablaCiclo.php';

$yearActual=@date("Y");
$yearSiguiente=$yearActual+1;
$cicloActual=new TablaCiclo();
$tablaCiclo=new TablaCiclo();

if($tablaCiclo->CicloActual()=="0"){
$claveCiclo="";
}
else{
$cicloActual=$tablaCiclo->CicloActual();
$claveCiclo=$cicloActual->getClaveCiclo();
}

if(isset($_POST['enviar'])){//SI SE ENVIA
	$no_ciclo = $_POST ['no_ciclo'];
	$cve_ciclo = $_POST ['cve_ciclo'];
	
	if (! $no_ciclo) { // SI ESTA VACIO
		echo "<h2 align='center' style='color:red'>Ocurri&oacute; un error
		  <img src='../images/iconos/delete.ico' width='30' heigth='30'></h2>
		  <h3 align='center'>Favor de ingresar el n&uacute;mero de ciclo</h3>
		  <div  align='center'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		  <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
	} else { // SI NO ESTA VACIO
		$cicloNuevo = new Ciclo ();
		$tablaCicloNuevo = new TablaCiclo ();
		$tablaExisteCiclo = new TablaCiclo ();
		
		$cicloNuevo->setClaveCiclo ( $cve_ciclo );
		$cicloNuevo->setNoCiclo ( $no_ciclo );
		
		if ($tablaExisteCiclo->existeCiclo ( $no_ciclo ) == "1") { // SI EXISTE
			echo "<h2 align='center' style='color:red'>Ocurri&oacute; un error
		  <img src='../images/iconos/delete.ico' width='30' heigth='30'></h2>
		  <h3 align='center'>El ciclo ya se ha registrado previamente</h3>
		  <div  align='center'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		  <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
		} else { // SI NO EXISTE
			if ($tablaCicloNuevo->guardarCiclo ( $cicloNuevo ) == "1") { // SI SE GUARDO
				echo "
		  <h3 align='center'>Registro guardado de manera correcta<img src='../images/iconos/check.ico' width='30' heigth='30'></h3>
		  <div  align='center'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		  <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
			} else { // SI NO SE GUARDO
				echo "<h2 align='center' style='color:red'>Ocurri&oacute; un error
		  <img src='../images/iconos/delete.ico' width='30' heigth='30'></h2>
		  <h3 align='center'>Error al guardar</h3>
		  <div  align='center'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		  <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
			} // FIN NO SE GUARDO
		} // FIN NO EXISTE
	}//FIN SI EXISTE
}//FIN SI SE ENVIA
else{//SI NO SE ENVIA
?>

<html>
<head>
<script type="text/javascript">
function confirmarRegistro(){
	var ciclo_actual=document.getElementById("no_ciclo").value;
	var today = new Date();
	yearActual= today.getYear();
	var yearHoy=parseInt(today.getFullYear());
	var c_actual=parseInt(ciclo_actual.substr(0,4));
	

	if(ciclo_actual==''||ciclo_actual.length==0){
	alert("Debes ingresar el ciclo");
	return false;
	}
	else{
	
	var respuesta=confirm("Deseas agregar el registro?");
	if(respuesta){
		
		
		if(c_actual>yearHoy||yearHoy<c_actual){
		alert("Error,aun no inicia un nuevo ciclo");
		return false;
		}
		else{
		return true;
		}
		
	
	}
	else{
	return false;
	}

	}
}
</script>
</head>
<body>

	<form method='post' action='registrar_ciclo.php'
		onsubmit="return confirmarRegistro();" name='form_ciclo'
		id='form_ciclo'>
		<label>Clave:</label><input type='text' readonly name='cve_ciclo'
			id='cve_ciclo' value='<?php echo $claveCiclo+1;?>'><br> <label>Nombre:</label><input
			type='text'
			value='<?php echo ($yearActual+1)."-".($yearSiguiente+1);?>'
			name='no_ciclo' id='no_ciclo' readonly="readonly"
			placeholder="<?php echo ($yearActual+1)."-".($yearSiguiente+1);?>"> <br>
		<br>
		<input type='submit' value='Registrar' name='enviar'><input
			type='reset' value='Borrar'>
	</form>
</body>

</html>
<?php }?>