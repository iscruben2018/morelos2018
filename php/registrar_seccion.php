<?php
$nombre="REGISTRAR SECCI&Oacute;N";
echo "<link rel='stylesheet' href='../css/reporte.css' type='text/css' />";
require_once 'encabezado.php';
require_once 'Seccion.php';
require_once 'TablaSeccion.php';

$yearActual=@date("Y");
$yearSiguiente=$yearActual+1;

$cveSeccion=new TablaSeccion();
$tablaSeccion=new TablaSeccion();

if($tablaSeccion->ultimaClaveSeccion()=="0"){
$claveCiclo="";
}
else{
$cveSeccion=$tablaSeccion->ultimaClaveSeccion();
$cveSeccionMaxima=$cveSeccion->getCodigoSeccion()+1;
}

if (isset ( $_POST ['enviar'] )) { // SI SE ENVIA
	$no_sec = $_POST ['no_sec'];
	$cod_sec = $_POST ['cod_sec'];
	
	if (! $no_sec) { // SI ESTA VACIO
		echo "<h2 align='center' style='color:red'>Ocurri&oacute; un error
		  <img src='../images/iconos/delete.ico' width='30' heigth='30'></h2>
		  <h3 align='center'>Favor de ingresar el n&uacute;mero de la secci&oacute;n</h3>
		  <div  align='center'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		  <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
	} else { // SI NO ESTA VACIO
		$seccionNuevo = new Seccion ();
		$tablaSeccionNuevo = new TablaSeccion ();
		$tablaExisteSeccion = new TablaSeccion ();
		
		$seccionNuevo->setCodigoSeccion ( $cod_sec );
		$seccionNuevo->setNombreSeccion ( $no_sec );
		
		if ($tablaExisteSeccion->existeSeccion ( $no_sec ) == "1") { // SI EXISTE
			echo "<h2 align='center' style='color:red'>Ocurri&oacute; un error
		  <img src='../images/iconos/delete.ico' width='30' heigth='30'></h2>
		  <h3 align='center'>El nombre de la secci&oacute;n ya se ha registrado previamente</h3>
		  <div  align='center'><a href='javascript:window.history.back();' style='text-decoration:none;'>
		  <img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a></div>";
		} else { // SI NO EXISTE
			if ($tablaSeccionNuevo->guardarSeccion ( $seccionNuevo ) == "1") { // SI SE GUARDO
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
	} // FIN SI EXISTE
} //FIN SI SE ENVIA
else{//SI NO SE ENVIA
?>

<html>
<head>
<script type="text/javascript">
function confirmarRegistro(){
	var no_seccion=document.getElementById("no_sec");
	
	

	if(no_seccion.value==''||no_seccion.value.length==0){
	alert("Debes ingresar el nombre de la seccion");
	no_seccion.focus();
	return false;
	}
	else{
		var confirmar=confirm("Deseas confirmar el registro de la seccion?");
		if(confirmar){
	    return true;
		}
		else{
       return false;
	   }
	}
	
}
</script>
</head>
<body>

	<form method='post' action='registrar_seccion.php'
		onsubmit="return confirmarRegistro();" name='form_ciclo'
		id='form_seccion'>
		<label>Codigo:</label><input type='text' readonly name='cod_sec'
			id='cod_sec' value='<?php echo $cveSeccionMaxima;?>'><br> <label>Nombre:</label><input
			type='text' value='' name='no_sec' id='no_sec' placeholder=""> <br>
		<br>
		<input type='submit' value='Registrar' name='enviar'><input
			type='reset' value='Borrar'>
	</form>
</body>

</html>
<?php }?>