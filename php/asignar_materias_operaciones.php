<?php
require_once 'InscripcionRenglon.php';
require_once 'TablaInscripcionRenglon.php';


if(isset($_POST["enviar"])){
	$hinicio = $_POST ['hinicio'];
	$hfin = $_POST ['hfin'];
	$dia = $_POST ['dia'];
	$docente = $_POST ['docentes'];
	$cve_ins = $_POST ['cve_ins'];
	if (! $hinicio || ! $hfin || ! $dia || ! $docente || ! $cve_ins) {
		echo "<div align='center'>
		  <h3 style='color:red;'>Ocurri&oacute; un error llena todos los campos!
		  <img src='../images/iconos/delete.ico' width='30' heigth='30'></h3><br>
		  <a style='text-decoration:none;text-transform:uppercase;' href='".$_SERVER ['HTTP_REFERER'] ."'>
		   <img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a></div>";
	} else {
		
		$inscripcionRenglon = new InscripcionRenglon ();
		$tablaInscripcionRenglon = new TablaInscripcionRenglon ();
		$existeTablaInscripcionRenglon = new TablaInscripcionRenglon ();
		
		if ($existeTablaInscripcionRenglon->validarHoras ( $hinicio, $hfin, $dia, $cve_ins ) == "1") {
			echo "<div align='center'>
			<h3 style='color:red;'>Ocurri&oacute; un error,la hora y el dia ya se ha asignado a otra materia!
			<img src='../images/iconos/delete.ico' width='30' heigth='30'></h3><br>
			<a style='text-decoration:none;text-transform:uppercase;' href='" . $_SERVER ['HTTP_REFERER'] . "'>
			 <img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a></div>";
		} else {
			
			$inscripcionRenglon->setNoRenglonHorario ( null );
			$inscripcionRenglon->setHoraInicioRenglonHorario ( $hinicio );
			$inscripcionRenglon->setHoraFinalRenglonHorario ( $hfin );
			$inscripcionRenglon->setDiaRenglonHorario ( $dia );
			$inscripcionRenglon->setNoDocenteMateriaRenglon ( $docente );
			$inscripcionRenglon->setClaveInscripcionRenglonMateria ( $cve_ins );
			
			if ($tablaInscripcionRenglon->guardarInscripcionRenglon ( $inscripcionRenglon ) == "1") {
				/*echo "<div align='center'><h3 style='color:blue;'>Materia Asignada!
			<img src='../images/iconos/check.ico' width='35' heigth='35'></h3><br>
			<a style='text-decoration:none;text-transform:uppercase;' href='" . $_SERVER ['HTTP_REFERER'] . "'>
			 <img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a></div>";*/
			 header("Location:". $_SERVER ['HTTP_REFERER']);
			} else {
				if ($tablaInscripcionRenglon->guardarInscripcionRenglon ( $inscripcionRenglon ) == "2") {
					echo "<div align='center'>
	  		<h3 style='color:red;'>Ocurri&oacute; un error ya se asigno esa materia!
			<img src='../images/iconos/delete.ico' width='35' heigth='35'></h3><br>
			<a style='text-decoration:none;text-transform:uppercase;' href='" . $_SERVER ['HTTP_REFERER'] . "'>
			<img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a></div>";
				} else {
					echo "<div align='center'><h3 style='color:red;'>Error de bd,consulta con el admin de bd!
			<img src='../images/iconos/delete.ico' width='35' heigth='35'></h3><br>
			<a style='text-decoration:none;text-transform:uppercase;' href='" . $_SERVER ['HTTP_REFERER'] . "'>
			<img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a></div>";
				}
			}
		}
	}
}
else{
	header("Location:".$_SERVER['HTTP_REFERER']);
}
?>