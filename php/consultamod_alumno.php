<html>
<head>
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />

</head>
<body background='../images/sheet.png'>
<?php
require_once 'Alumno.php';
require_once 'TablaAlumno.php';

require_once 'Seccion.php';
require_once 'TablaSeccion.php';

require_once 'Bachillerato.php';
require_once 'TablaBachillerato.php';

if(isset($_POST["enviar"])){
	$matricula=$_POST['matricula'];
	
	if($matricula==''||!$matricula){
	   echo "<div align='center'>";
	   echo "<h3 style='color:#8B4513;'>Ocurri&oacute; un error llena todos los campos,revisa los datos<img src='../images/iconos/delete.ico' width=30 heigth=30></h3>";
	   echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a>";
	   echo "</div>";
	}
	else{
	$alumno=new Alumno();
	$tablaAlumno=new TablaAlumno();
	$datosAlumno=new Alumno();
	
	
	if($datosAlumno=$tablaAlumno->consultaAlumno($matricula)=="2"){
		echo "<div align='center'>";
	    echo "<h3 style='color:red;'>Ocurri&oacute; un error la matricula no existe,revisa los datos <img src='../images/iconos/delete.ico' width=30 heigth=30></h3>";
	    echo "<a href='".$_SERVER ['HTTP_REFERER']."' style='text-decoration:none;'><img src='../images/iconos/left.ico' width=30 heigth=30>Regresar</a>";
	    echo "</div>";
	}
	else{
	$alumno=$tablaAlumno->consultaAlumno($matricula);
	$seccionAlumno=$alumno->getCodigoSeccionAlumno();
	?>
	<div align='center' class='art-postcontent art-postcontent-0 clearfix'>
	<form method='post' action='modificar_alumno.php'>
	
	<?php 
	$nombre="MODIFICACI&Oacute;N DE ALUMNO";
	require_once 'encabezado.php';
	?>	
	<table  class='dw-article'>
	<tbody>
	<tr>
	<td> <label style='font-weight: bold;'>Matricula</label></td>
	<td><input type='hidden' name='matricula' value='<?php echo $alumno->getMatriculaAlumno();?>'><?php echo $alumno->getMatriculaAlumno();?></td>
	</tr>
	<tr>
	<td><label style='font-weight: bold;'>Curp</label></td>
	<td><?php echo strtoupper($alumno->getCurpAlumno());?></td>
	</tr>
	<tr>
	<td><label style='font-weight: bold;'>Nombre</label></td>
	<td><?php echo strtoupper($alumno->getNombreAlumno()." ".$alumno->getAPaternoAlumno()." ".$alumno->getAMaternoAlumno());?></td>
	</tr>
	<tr>
	<td><label style='font-weight: bold;'>Fecha de nacimiento</label></td>
	<td><input type='date' name='fecha' value='<?php echo $alumno->getFNacimientoAlumno();?>'></td>
	</tr>
	<tr>
	<td><label style='font-weight: bold;'>Telefono:(s)</label></td>
	<td><input required type='text' name='tel1' value='<?php echo $alumno->getTel1Alumno();?>' readonly> /<input name='tel2' type='text' value='<?php echo $alumno->getTel2Alumno();?>'></td>
	</tr>
	<tr>
	<td><label style='font-weight: bold;'>Correo:</label></td>
	<td><input  required type='mail' name='correo' value='<?php echo $alumno->getCorreoAlumno();?>'></td>
	</tr>
	<tr>
	<td><label style='font-weight: bold;'>Deuda:</label></td>
	<td>
	<select name='deuda'>
	<?php 
	if($alumno->getDeudaAlumno()=="0"){
		echo "<option value='1'>Si</option>
			  <option selected='selected' value='0'>No</option>";
	}
	else{
		echo "<option value='0'>No</option>
			<option selected='selected' value='".$alumno->getDeudaAlumno()."'>Si</option>";
	}
	?>
	</select>
	</td>
	</tr>
	<tr>
	<td><label style='font-weight: bold;'>Status:</label></td>
	<?php 
	$estatus=$alumno->getStatusAlumno();
	$optionEstatus="";
	switch ($estatus) {
		case "inscrito":
			$inscrito="selected";
			break;
		case "reinscrito":
			$reinscrito="selected";
			break;
		case "activo":
			$activo="selected";
			break;
		case "baja":
			$baja="selected";
			break;
		case "proceso-re":
			$proceso_re="selected";
			break;
		case "proceso-in":
			$proceso_in="selected";
			break;
		case "regular":
			$regular="selected";
			break;
		case "irregular":
			$irregular="selected";
			break;
		default:
			break;
	}
	?>
	<td>
	<select  name='status' required='required'>
	<option <?php echo $activo;?> value='activo'>Activo</option>
    <option <?php echo $inscrito;?> value='inscrito'>Inscrito</option>
    <option <?php echo $reinscrito;?> value='reinscrito'>Reinscrito</option>
    
    <option <?php echo $baja;?> value='baja'>Baja temporal</option>
    <option <?php echo $proceso_re;?> value='proceso-re'>Proceso de reinscripcion</option>
    <option <?php echo $proceso_in;?> value='proceso-in'>Proceso de inscripcion</option>
    <option <?php echo $regular;?> value='regular'>Regular</option>
    <option <?php echo $irregular;?> value='irregular'>Irregular</option>
    </select>
	
	</td>		
	</tr>
    		
	<tr>
	<td><label style='font-weight: bold;'>Bachillerato:</label></td>

	
	<td>
	<select name='bachillerato' class='form-control'>
	<?php 
    $bach=new Bachillerato();
    $tablaBachillerato=new TablaBachillerato();
    $datosBach=new Bachillerato();
    $datosBach=$tablaBachillerato->listaGeneralBachilleratos();
    
    foreach ($datosBach as $datosb) {
    	if($datosb->getClaveBachillerato()==$alumno->getClaveBachilleratoAlumno()){
    		$itemb="selected";
    	}
    	else{
    		$itemb="";
    	}
    	echo "<option ".$itemb." value='".$datosb->getClaveBachillerato()."'>".$datosb->getNombreBachillerato()."</option>";
    }
    ?>
	</select>
	</td>		
	</tr>
	<tr>
	
	
	<td><label style='font-weight: bold;'>Seccion:</label></td>
	<td>
	<select name='seccion'>
	
	<?php 
    //Se sacan todas las secciones disponibles y si coincide la actual se selecciona 
    //Aun no se agregan mas bachilleratos,pero si asi fuera la consulta  seria parecida a esta
    //en los selects de arriba
	$seccion=new Seccion();
	$tablaSeccion=new TablaSeccion();
	$datosSeccion=new Seccion();
	
	$datosSeccion=$tablaSeccion->listaGeneralSecciones();
	
	foreach ($datosSeccion as $seccion){
		if($seccion->getCodigoSeccion()==$seccionAlumno){
		$item="selected";
		}
		else{
		$item="";
		}
		
		echo "<option ".$item." value='".$seccion->getCodigoSeccion()."'>".$seccion->getNombreSeccion()."</option>";
	}
	?>
	</select>
	</td>
	
	</tr>
    </tbody>
	</table>
	<br>
	<br>
	<input name='curp' type='hidden' value='<?php echo $alumno->getCurpAlumno();?>'>
	<input name='nombre' type='hidden' value='<?php echo $alumno->getNombreAlumno();?>'>
	<input name='apellido1' type='hidden' value='<?php echo $alumno->getAPaternoAlumno();?>'>
	<input name='apellido2' type='hidden' value='<?php echo $alumno->getAMaternoAlumno();?>'>
	<input name='colonia' type='hidden' value='<?php echo $alumno->getColoniaAlumno();?>'>
	<input name='calle' type='hidden' value='<?php echo $alumno->getCalleAlumno();?>'>
	<input name='numero' type='hidden' value='<?php echo $alumno->getNoAlumno();?>'>
			
	<input class='titulos' type='submit' value='Modificar datos'>
	<a style='color:white;text-decoration: none;' href='<?php $_SERVER ['HTTP_REFERER'];?>'><input type="button" class='titulos' value='Regresar'></a>
	</form>
	<!-- CIERRA ENCABEZADO -->
	</td></tr></table>
	<!--  -->
	</div>
<?php 
	
	}//FIN NO EXISTE
	
  }//FIN CAMPOS VACIOS
	
}//FIN ISSET
else{

 $nombre='MODIFICACI&Oacute;N DE ALUMNO ';
 require_once 'encabezado.php';
?>

<div align="center">

<form name='' method="post" action="">
<h3>Ingresa la matricula del alumno:</h3><br>
<input type='text' name='matricula'>
<input type='submit' value='Buscar' name='enviar'>
</form>
</div>


<?php 
}
?>
</body>
</html>
