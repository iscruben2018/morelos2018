<?php
require_once 'InscripcionRenglon.php';
require_once 'TablaInscripcionRenglon.php';

require_once 'Inscripcion.php';
require_once 'TablaInscripcion.php';

require_once 'Ciclo.php';
require_once 'TablaCiclo.php';

$matricula=$_GET['matricula'];

$inscripcion=new Inscripcion();
$tablaInscripcion=new TablaInscripcion();
$datosInscripcion=new Inscripcion();

$datosInscripcion=$tablaInscripcion->consultaDatosInscripcion($matricula);

if (sizeof ( $datosInscripcion ) > 0) {
	foreach ( $datosInscripcion as $inscripcion ) {
		$folio = $inscripcion [0];
		$fecha = $inscripcion [1];
		$turno = $inscripcion [2];
		$tipo_tramite = $inscripcion [3];
		// $ciclo=$inscripcion[4];
		$cve_bac = $inscripcion [4];
		$bachillerato = $inscripcion [5];
		$cod_sec = $inscripcion [6];
		$seccion = $inscripcion [7];
		$cve_sem = $inscripcion [8];
		$semestre = $inscripcion [9];
		$matri_alu = $inscripcion [10];
		$apellido1 = $inscripcion [11];
		$apellido2 = $inscripcion [12];
		$nombre_alu = $inscripcion [13];
	}
	$cicloA = new Ciclo ();
	$tablaCicloA = new TablaCiclo ();
	$cicloA = $tablaCicloA->CicloActual ();
	$ciclo = $cicloA->getNoCiclo ();
} else {
	echo "&nbsp;";
	$folio = "";
	$fecha = "";
	$turno = "";
	$tipo_tramite = "";
	$ciclo = "";
	$cve_bac = "";
	$bachillerato = "";
	$cod_sec = "";
	$seccion = "";
	$cve_sem = "";
	$semestre = "";
	$matri_alu = "";
	$apellido1 = "";
	$apellido2 = "";
	$nombre_alu = "";
}


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
				echo "<div align='center'><h3 style='color:blue;'>Materia Asignada!
			<img src='../images/iconos/check.ico' width='35' heigth='35'></h3><br>
			<a style='text-decoration:none;text-transform:uppercase;' href='" . $_SERVER ['HTTP_REFERER'] . "'>
			 <img src='../images/iconos/left.ico' width='30' height='30'>Regresar</a></div>";
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
?>
<html>
<head>
<link rel="stylesheet" type='text/css' href="../css/reporte.css">
<script type="text/javascript" src='../jquery.js'></script>
<script type="text/javascript" src="../js/asignar_materias.js"></script>
</head>
<body>
<?php 
$nombre='Asignaci&oacute;n de horario';
require_once 'encabezado.php';?>

  <div align='center'>
		<a
			href='formatos/tcpdf/vista/reporte_usuarios_pdf.php?cve_ins=<?php echo $folio;?>&ciclo=<?php echo $ciclo;?>&fecha=<?php echo $fecha;?>&matricula=<?php echo $matri_alu;?>&nombre=<?php echo $apellido1."  ".$apellido2."  ".$nombre_alu;?>&semestre=<?php echo $semestre;?>&bachillerato=<?php echo $bachillerato;?>&seccion=<?php echo $seccion;?>'>
			<img src='../images/iconos/print.ico' width="35" height="35">Imprimir
			Horario
		</a>
	</div>

	<table border='0'>
		<tr>
			<td>
				<div align="left">
					<form name="form-main" id='form-main' action="asignar_materias.php"
						method="post" onsubmit="return validarForm(this);">
						<table width="250" border="1">
							<tr>
								<td class='tabla'>Folio</td>
								<td style='font-size: 13px; font-weight: bold;'><b><?php echo $folio;?> </b>
									<input type='hidden' name='cve_ins' id='cve_ins'
									value='<?php echo $folio;?>'></td>

							</tr>
							<tr>
								<td class='tabla'>Fecha de Inscripcion</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo $fecha;?></td>

							</tr>
							<tr>
								<td class='tabla'>Turno</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo strtoupper($turno);?></td>

							</tr>
							<tr>
								<td class='tabla'>Tipo de tramite</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo strtoupper($tipo_tramite);?></td>

							</tr>
							<tr>
								<td class='tabla'>Ciclo Escolar</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo strtoupper($ciclo);?></td>

							</tr>
							<tr>
								<td class='tabla'>Bachillerato</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo strtoupper($bachillerato);?>
    <input id='bachilleratos' type='hidden'
									value='<?php echo $cve_bac;?>'></td>

							</tr>
							<tr>
								<td class='tabla'>Seccion</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo strtoupper($seccion);?></td>

							</tr>
							<tr>
								<td class='tabla'>Semestre</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo strtoupper($semestre);?>
    <input id='semestre' type='hidden' value='<?php echo $cve_sem;?>'></td>


							</tr>
							<tr>
								<td class='tabla'>Matricula</td>
								<td style='font-size: 13px; font-weight: bold;'><?php echo strtoupper($matri_alu);?></td>

							</tr>
							<tr>
								<td class='tabla'>Nombre</td>
								<td style='font-size: 13px; font-weight: bold;'>
    <?php echo strtoupper($apellido1)." ".strtoupper($apellido2)." ".strtoupper($nombre_alu);?></td>

							</tr>
							<tr>
								<td colspan="2" style='text-transform: uppercase;'><br> <b>Materias</b>
									<input type='button' onclick='buscarMaterias();'
									value='Buscar Materias'>
									<div id='cargarMaterias'></div>
									<div id='capaMaterias' style='display: none;'>
										<select id='materias' name='materias'
											onchange='cargarDocentes(this.value);'></select> <br> <br> <label><b>Docente(s)</b></label><br>
										<div id='cargarDocentes'></div>
										<div id='capaDocentes' name='docentes' style='display: none;'>
											<select name='docentes' id='docentes'></select>
										</div>
									</div></td>
							</tr>
							<tr>
								<td style='text-transform: uppercase;'><b>Hora de inicio:</b> <select
									id='hinicio' name='hinicio'>
										<option value='0'>--Selecciona una hora--</option>
										<option value='7:30'>7:30 am</option>
										<option value='8:25'>8:25 am</option>
										<option value='9:20'>9:20 am</option>
										<option value='10:15'>10:15 am</option>
										<option value='10:30'>10:30 am</option>
										<option value='11:25'>11:25 am</option>
										<option value='12:20'>12:20 pm</option>
										<option value='13:15'>13:15 pm</option>
										<option value='14:10'>14:10 pm</option>
								</select></td>
								<td style='text-transform: uppercase;'><b>Hora de termino:</b> <select
									id='hfin' name='hfin'>
										<option value='0'>--Selecciona una hora--</option>
										<option value='7:30'>7:30 am</option>
										<option value='8:25'>8:25 am</option>
										<option value='9:20'>9:20 am</option>
										<option value='10:15'>10:15 am</option>
										<option value='10:30'>10:30 am</option>
										<option value='11:25'>11:25 am</option>
										<option value='12:20'>12:20 pm</option>
										<option value='13:15'>13:15 pm</option>
										<option value='14:10'>14:10 pm</option>
								</select></td>
							</tr>
							<tr>
								<td colspan="2" style='text-transform: uppercase;'><b>DIA:<select
										name='dia' id='dia'>
											<option value='0'>--Selecciona un dia--</option>
											<option value='Lunes'>Lunes</option>
											<option value='Martes'>Martes</option>
											<option value='Miercoles'>Miercoles</option>
											<option value='Jueves'>Jueves</option>
											<option value='Viernes'>Viernes</option>
									</select></b></td>
							</tr>

							<tr>
								<td><input type='submit' value='Asignar Materias' name='enviar'></td>
								<td>
									<!--  <a href='asignar_materias.php'><input type='button' value='Cancelar'></a>-->
								</td>
							</tr>
						</table>
					</form>
				</div>
			</td>
			<td>
				<div align="right" id='imprimir'>
					<iframe style='border: none;'
						src='horario_preview.php?matricula=<?php echo $matricula;?>&cve_ins=<?php echo $folio;?>&no_ciclo=<?php echo $ciclo;?>'
						width="740px" scrolling='auto;' height="720px"></iframe>
				</div>
			</td>

		</tr>
	</table>
	<input type='hidden' value='' id='verHora' name='verHora'>


	<a style='text-decoration: none; text-transform: uppercase;'
		href="javascript:window.history.back();"> <img
		src='../images/iconos/left.ico' width='30' height='30'>Regresar
	</a>
</body>
</html>
<?php }?>