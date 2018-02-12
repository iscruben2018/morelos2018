<?php 
session_start();
if((isset($_SESSION['matricula'])||isset($_SESSION['user_admin']))||$_SESSION['matricula']!=''){

?>
<!DOCTYPE html>
<html dir="ltr" lang="es-MX"><head>
    <meta charset="utf-8">
    <title>Modificar Solicitud</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

   
    <link rel="stylesheet" href="../style.css" media="screen">
    <link rel="stylesheet" href="../style.responsive.css" media="all">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
    <script src="../script.responsive.js"></script>
    
    <!-- JQUERY UI -->
	<link rel="stylesheet" href="../js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
	<script src="../js/jquery-ui/development-bundle/jquery-1.6.2.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="../js/jquery-ui/development-bundle/demos/demos.css">
	<link rel="stylesheet" href="../js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
	<script src="../js/jquery-ui/development-bundle/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.mouse.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.draggable.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
	<script src="../js/jquery-ui/development-bundle/ui/jquery.ui.dialog.js"></script>
    <!-- MODIFICAR_SOLICITUD.JS -->
	<script src="../js/modificar_solicitud.js"></script>
	<script type="text/javascript" src="../js/scroll_bottom.js"></script>
    <!--  -->
    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="../style.ie7.css" media="screen" /><![endif]-->
    <!--[if IE]> 
    <style>
     .demo{width: 942px;}
    </style>
    <script type="text/javascript">
    var e =("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
    for (var i=0; i<e.length; i++) {
    document.createElement(e[i]);
    }
    </script>
   <![endif]-->

   
</head>
<body onload='dialogoInicio();'>


<div id="art-main">
<?php if($_SESSION['user_admin']==null){?>
<header class="art-header" style="background-position: 548.08px 66.25px, 420.42px 66.96000000000001px, 123.84px 44.400000000000006px, 39.35px 30.6px, 0px 0px;">

    <div class="art-shapes">
        <div class="art-textblock art-object2134142508" style="left: 123.84px; top: 44.400000000000006px; margin-left: 0px !important;">
        <div class="art-object2134142508-text-container">
        <div class="art-object2134142508-text">Jos&eacute; Ma. Morelos<br>de Zit&aacute;cuaro S.C</div>
    </div>
    
</div><div class="art-textblock art-object438453684" style="left: 420.42px; top: 66.96000000000001px; margin-left: 0px !important;">
        <div class="art-object438453684-text-container">
        <div class="art-object438453684-text">Incorporada <br>a la U.M.S.N.H</div>
    </div>
    
</div><div class="art-textblock art-object2030094490" style="left: 548.08px; top: 66.25px; margin-left: 0px !important;">
        <div class="art-object2030094490-text-container">
        <div class="art-object2030094490-text">Clave:<br>109-218.1 "74"</div>
    </div>
    
</div>
            </div>

<h1 class="art-headline" style="left: 47.46px; top: 11.6px; margin-left: 0px !important;">
    <a href="#">ESCUELA PREPARATORIA</a>
</h1>
<h2 class="art-slogan" style="left: 53.34px; top: 117px; margin-left: 0px !important;">"CUNA DE H&eacute;ROES,CRISOL DE PENSADORES"</h2>
              
</header>
<?php }?>


<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                        
                                
<div class="demo">
<?php 
	require_once 'Alumno.php';
	require_once 'TablaAlumno.php';
	
	require_once 'Colonia.php';
	require_once 'TablaColonia.php';
	
	require_once 'Ciudad.php';
	require_once 'TablaCiudad.php';
	
	require_once 'Estado.php';
	require_once 'TablaEstado.php';
	
	require_once 'Ciclo.php';
	require_once 'TablaCiclo.php';
	
	require_once 'AlumnoExtra.php';
	require_once 'TablaAlumnoExtra.php';
	
	require_once 'PadreHijo.php';
	require_once 'TablaPadreHijo.php';
	
	require_once 'Padre.php';
	require_once 'TablaPadre.php';
	
	require_once 'Inscripcion.php';
	require_once 'TablaInscripcion.php';
	
	require_once 'Semestre.php';
	require_once 'TablaSemestre.php';
	
	require_once 'Bachillerato.php';
	require_once 'TablaBachillerato.php';
	
	require_once 'Seccion.php';
	require_once 'TablaSeccion.php';
	
	
	
	//CONSULTA LOS DATOS DEL ALUMNO
	$alumno=new Alumno();
	$tablaAlumno=new TablaAlumno();

	if(isset($_GET['matricula_sesion'])){
    $matricula_sesion=$_GET['matricula_sesion'];
	}
	else {
	 $matricula_sesion=$_SESSION['matricula'];
	
	}
	$alumno=$tablaAlumno->consultaAlumno($matricula_sesion);
	//SI NO SE HA ACTUALIZADO EL LUGAR DE NAC MARCA ERROR AL TENER COL COMO CERO
	//COLONIAS
	$tablaColonia=new TablaColonia();
	$datosColonia=new Colonia();
	$colonias=new Colonia();
	$datosColonia=$tablaColonia->reporteEspecificoColonia("id_col", $alumno->getColoniaAlumno());
	//SI SI HAY COLONIAS Y EL ARRAY ES MAYOR DE 0
	if(sizeof($datosColonia)>0){
	
	   foreach ($datosColonia as $colonias) {
	   $idColonia=$colonias->getIdColonia();
	   $nombreColonia=$colonias->getNombreColonia();
	   $CpColonia=$colonias->getCpColonia();
	   if($colonias->getCpColonia()=="0"){
	   $CpColonia="";
	   }
	   $idCiudad=$colonias->getCpCiudadColonia();
	   //CIUDADES
	   $tablaCiudad=new TablaCiudad();
	   $datosCiudad=new Ciudad();
	   $ciudades=new Ciudad();
	   $datosCiudad=$tablaCiudad->reporteEspecificoCiudad("cp_ciu", $idCiudad);
	    
	       foreach ($datosCiudad as $ciudades) {
	          $cpCiudad=$ciudades->getCpCiudad();
	          $cpEstado=$ciudades->getCpEstado();
	          $nombreCiudad=$ciudades->getNombreCiudad();
	       //
	       //ESTADOS
	       $tablaEstado=new TablaEstado(); //Un objeto de la tablaestado que permitira acceder al listado de estados
	       $datosEstado=new Estado(); //Un objeto de la clase Estado que contendra  un array de tipo estado
	       $estados=new Estado(); //Un objeto de la clase Estado que servira para recuperar los valores de tipo estado
	       $datosEstado=$tablaEstado->listaGeneralEstados();  //Llamada a la funcion
	       //
	        }
	       //
	
	     }
	}
	//SI NO HAY COLONIAS PONER A ''
	else{
	$idColonia='';
	$nombreColonia='';
	}
	//
	
	//SECCION NOMBRE
	$sql="SELECT *FROM seccion WHERE cod_sec='".$alumno->getCodigoSeccionAlumno()."'";
	$qry=mysql_query($sql)or die(mysql_error().mysql_errno());
	while ($ren=mysql_fetch_array($qry)){
	$campoSeccion=$ren['no_sec'];
	}
	//
	
	//CICLO ACTUAL
	$ciclo=new Ciclo();
	$tablaCiclo=new TablaCiclo();
	$ciclo=$tablaCiclo->CicloActual();
	//
	
	/***************DATOS EXTRA*****(INCLUYE LUGAR DE NACIMIENTO Y GENERO DEL ALUMNO*************************/
	$alumnoExtra=new AlumnoExtra();
	$datosAlumnoExtra=new AlumnoExtra();
	$tablaAlumnoExtra=new TablaAlumnoExtra();
	$datosAlumnoExtra=$tablaAlumnoExtra->reporteEspecificoAlumnoExtra("matri_alu", $alumno->getMatriculaAlumno());
	
	if(sizeof($datosAlumnoExtra)>0){
	  foreach ($datosAlumnoExtra as $alumnoExtra) {
	  $problemasSalud=$alumnoExtra->getPSaludAlumno();	
	  $becaAlumno=$alumnoExtra->getBecaAlumno();
	  $tsalud=$alumnoExtra->getServicioSaludAlumno();
	  $tlengua=$alumnoExtra->getIdiomaAlumno();
	  $lnac_aluex=$alumnoExtra->getLugarNacimientoExtra();
	  $sexo_aluex=$alumnoExtra->getSexoAlumnoExtra();
	
	  }	
	  $pSaludAlu=split(",", $problemasSalud);
	  $tBecaAlumno=split(",", $becaAlumno);
	  $tSaludAlumno=split(",", $tsalud);
	  $tLenguaAlumno=split(",", $tlengua);
	}
	else{
		
	}
	/**************FIN DATOS EXTRA***************************/
	
	/***DATOS PADRE**/
	$padrehijo=new PadreHijo();
	$tablaPadreHijo=new TablaPadreHijo();
	$datosPadreHijo=new PadreHijo();
	
	$datosPadreHijo=$tablaPadreHijo->retornarHijoPadre($alumno->getMatriculaAlumno());
	$clavePadre=$datosPadreHijo->getClavePadre();
	
	$padre=new Padre();
	$tablaPadre=new TablaPadre();
	$datosPadre=new Padre();
	
	$datosPadre=$tablaPadre->reporteEspecificoPadre("cve_pad", $clavePadre);
	
	if(sizeof($datosPadre)>0){
	   foreach ($datosPadre as $padre) {
	   $cve_pad=$padre->getClavePadre();
	   $nomPadre=$padre->getNombrePadre();
	   $apPadre=$padre->getAPaternoPadre();
	   $aMPadre=$padre->getAMaternoPadre();
	   $tel1Padre=$padre->getTel1Padre();
	   $tel2Padre=$padre->getTel2Padre();
	   $ecivilPadre=$padre->getECivilPadre();
	   $correoPadre=$padre->getCorreoPadre();
	   $idColoniaPadre=$padre->getColoniaPadre();
	   $callePadre=$padre->getCallePadre();
	   $noPadre=$padre->getNoPadre();
	   $ocupacionPadre=$padre->getOcupacionPadre();
	   $lugarTrabajoPadre=$padre->getLugarTrabajoPadre();
	   
	   $padreColonia=new Colonia();
	   $tablaPadreColonia=new TablaColonia();
	   $datosPadreColonia=new Colonia();
	   
	   $datosPadreColonia=$tablaPadreColonia->reporteEspecificoColonia("id_col", $idColoniaPadre);
	   
	   if(sizeof($datosPadreColonia)>0){
	     foreach ($datosPadreColonia as $padreColonia){
	     $nomPadreColonia=$padreColonia->getNombreColonia();
	     $CpColoniaPadre=$padreColonia->getCpColonia();
	     if($padreColonia->getCpColonia()=="0"){
	     	$CpColoniaPadre="";
	     }
	     $idCiudadPadre=$padreColonia->getCpCiudadColonia();
	     //CIUDADES
	     $tablaCiudadPadre=new TablaCiudad();
	     $datosCiudadPadre=new Ciudad();
	     $ciudadesPadre=new Ciudad();
	     $datosCiudadPadre=$tablaCiudadPadre->reporteEspecificoCiudad("cp_ciu", $idCiudadPadre);
	     
	     foreach ($datosCiudadPadre as $ciudadesPadre) {
	     	$cpCiudadPadre=$ciudadesPadre->getCpCiudad();
	     	$cpEstadoPadre=$ciudadesPadre->getCpEstado();
	     	$nombreCiudadPadre=$ciudadesPadre->getNombreCiudad();
	     	//
	     	//ESTADOS
	     	$tablaEstadoPadre=new TablaEstado(); //Un objeto de la tablaestado que permitira acceder al listado de estados
	     	$datosEstadoPadre=new Estado(); //Un objeto de la clase Estado que contendra  un array de tipo estado
	     	$estadosPadre=new Estado(); //Un objeto de la clase Estado que servira para recuperar los valores de tipo estado
	     	$datosEstadoPadre=$tablaEstadoPadre->listaGeneralEstados();  //Llamada a la funcion
	     	//
	        }
	     }
	   }
	   
	   }
	}
	else{
	$idColoniaPadre='';
	$nomPadreColonia='';
	}
	
	/**FIN***********/
	/******************ESTADO ALUMNO***************************************************/
	//ESTO ES CUANDO YA TIENE ASIGNADO UNA COLONIA,POR LO TANTO, TAMBIEN CIUDAD Y ESTADO
	if(sizeof($datosEstado)>0){
		$cadenaTieneColonia="";
		foreach ($datosEstado as $estados){//recorre el array de tipo estado
			if($cpEstado==$estados->getCpEstado()){
				$seleccionado="selected";
			}
			else{
				$seleccionado="";
			}
			$cadenaTieneColonia.="<option value='".$estados->getCpEstado()."' ".$seleccionado.">".$estados->getNombreEstado()."</option>";
		}
	}
	else{
		$cadenaTieneColonia="";
		//SI NO TIENE ASIGNADO NINGUNO SE DESPLIEGA SOLO LOS ESTADOS GENERAL Y SELECCIONE
	    $cadenaSinColonia="";
		$tablaEstadoGral=new TablaEstado(); //Un objeto de la tablaestado que permitira acceder al listado de estados
		$datosEstadoGral=new Estado(); //Un objeto de la clase Estado que contendra  un array de tipo estado
		$estadosGral=new Estado(); //Un objeto de la clase Estado que servira para recuperar los valores de tipo estado
		$datosEstadoGral=$tablaEstadoGral->listaGeneralEstados();  //Llamada a la funcion
		$cadenaSinColonia="<option value='0'>--Selecciona un estado--</option>";
		foreach ($datosEstadoGral as $estadosGral) {
		$cadenaSinColonia.="<option value='".$estadosGral->getCpEstado()."'>".$estadosGral->getNombreEstado()."</option>";
		}
		
	}
	
	
	/******************ESTADO PADRE***************************************************/
	//ESTO ES CUANDO YA TIENE ASIGNADO UNA COLONIA,POR LO TANTO, TAMBIEN CIUDAD Y ESTADO
	if(sizeof($datosEstadoPadre)>0){
		$cadenaTieneColoniaPadre="";
		foreach ($datosEstadoPadre as $estadosPadre){//recorre el array de tipo estado
			if($cpEstadoPadre==$estadosPadre->getCpEstado()){
				$seleccionadoPadre="selected";
				$respaldoEstadoPadre=$estadosPadre->getCpEstado();
			}
			else{
				$seleccionadoPadre="";
			}
			$cadenaTieneColoniaPadre.="<option value='".$estadosPadre->getCpEstado()."' ".$seleccionadoPadre.">".$estadosPadre->getNombreEstado()."</option>";
		}
	}
	else{
		$cadenaTieneColoniaPadre="";
		//SI NO TIENE ASIGNADO NINGUNO SE DESPLIEGA SOLO LOS ESTADOS GENERAL Y SELECCIONE
		$cadenaSinColoniaPadre="";
		$tablaEstadoGralPadre=new TablaEstado(); //Un objeto de la tablaestado que permitira acceder al listado de estados
		$datosEstadoGralPadre=new Estado(); //Un objeto de la clase Estado que contendra  un array de tipo estado
		$estadosGralPadre=new Estado(); //Un objeto de la clase Estado que servira para recuperar los valores de tipo estado
		$datosEstadoGralPadre=$tablaEstadoGralPadre->listaGeneralEstados();  //Llamada a la funcion
		$cadenaSinColoniaPadre="<option value='0'>--Selecciona un estado--</option>";
		foreach ($datosEstadoGralPadre as $estadosGralPadre) {
			$cadenaSinColoniaPadre.="<option value='".$estadosGralPadre->getCpEstado()."'>".$estadosGralPadre->getNombreEstado()."</option>";
		}
	
	}
	
	
	//DATOS DE LA REINSCRIPCION
	$inscripcion=new Inscripcion();
	$datosInscripcion=new Inscripcion();
	
	$tablaInscripcion=new TablaInscripcion();
	
	$datosInscripcion=$tablaInscripcion->consultaInscripcion($alumno->getMatriculaAlumno());
	
	if(sizeof($datosInscripcion)>0){
	  foreach ($datosInscripcion as $inscripcion) {
	  	$cve_ins=$inscripcion[0];
	  	$fecha_ins=$inscripcion[1];
	  	$turno_ins=$inscripcion[2];
	  	$tipo_ins=$inscripcion[3];
	  	$cve_ciclo=$inscripcion[4];
	  	$cve_sem=$inscripcion[5];
	  	$cod_sec_ins=$inscripcion[7];
	  	$cve_bac_ins=$inscripcion[8];
	  	
	  	
	  }
	  
	}
	//CUANDO SE HAN CARGADO DE NUEVO LOS DATOS DE REINSCRIPCION Y SE DESEA ACTUALIZAR ESTA
	else{
		$cve_ins=null;
	    $tipo_ins="reinscripcion";
	    $turno_ins="matutino";
	    $fecha_ins=@date("Y-m-d");
	}
	//
	
	//SEMESTRES EN GENERAL
	$semestre=new Semestre();
	$datosSemestre=new Semestre();
	$tablaSemestre=new TablaSemestre();
	$datosSemestre=$tablaSemestre->listaGeneralSemestres();
	
	if(sizeof($datosSemestre)>0){
		$cadenaSemestreInscripcion="<option value='0'>--Selecciona un semestre--</option>";
		
		foreach ($datosSemestre as $semestre){
		   if($cve_sem==$semestre->getClaveSemestre()){
		   	$seleccionadoSemestre="selected";
		   }
		   else {
		   $seleccionadoSemestre="";
		   }
		   $cadenaSemestreInscripcion.="<option value='".$semestre->getClaveSemestre()."' ".$seleccionadoSemestre.">".$semestre->getNombreSemestre()."</option>";
		}
	}
	//
	
	//BACHILLERATOS
	$bachillerato=new Bachillerato();
	$datosBachillerato=new Bachillerato();
	$tablaBachillerato=new TablaBachillerato();
	$datosBachillerato=$tablaBachillerato->listaGeneralBachilleratos();
	
	if(sizeof($datosBachillerato)>0){
	 $cadenaBachilleratoInscripcion="<option value='0'>--Selecciona un bachillerato--</option>";
	  foreach ($datosBachillerato as $bachillerato) {
	    if($cve_bac_ins==$bachillerato->getClaveBachillerato()){
	    	$seleccionadoBachillerato="selected";
	    	
	    }
	    else {
	    $seleccionadoBachillerato="";
	    }
	    $cadenaBachilleratoInscripcion.="<option $seleccionadoBachillerato value='".$bachillerato->getClaveBachillerato()."'>".$bachillerato->getNombreBachillerato()."</option>";
	  }
	}
	//
	

	//SECCIONES
	$seccion=new Seccion();
	$datosSeccion=new Seccion();
	$tablaSeccion=new TablaSeccion();
	$datosSeccion=$tablaSeccion->listaGeneralSecciones();
	
	if(sizeof($datosSeccion)>0){
		$cadenaSeccionInscripcion="";
		foreach ($datosSeccion as $seccion) {
			if($cod_sec_ins==$seccion->getCodigoSeccion()){
				$seleccionadoSeccion="selected";
			}
			else {
				$seleccionadoSeccion="";
			}
			$cadenaSeccionInscripcion.="<option value='".$seccion->getCodigoSeccion()."'>".$seccion->getNombreSeccion()."</option>";
		}
	}
	//
	
	
	//PARA SELECCIONAR EL GENERO DEL ALUMNO
	switch ($sexo_aluex) {
		case "fem":
			$femenino="selected";
			break;
		case "masc":
			$masculino="selected";
			break;
		case "0":
			$cero="selected";
			break;
		default:
			break;
	}
	
	//
	
	?>

<?php if($_SESSION['user_admin']!=null){?>
<h3 align="center">
<a href="consulta_solicitud.php" style="text-decoration: none;">
<img alt="Regresar" src="../images/iconos/left.ico" width="33" height="33" title="Regresar">Regresar</a>
</h3><br>
<?php }?>

<form action="generar_solicitud.php" id='ejemploForm' method='post' name='ejemploForm' onsubmit="return validarSolicitudCambios(this);">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><img src='../images/iconos/editar.png' width='35' heigth='35'>Datos alumno</a></li>
		<li><a href="#tabs-2"><img src='../images/iconos/sistema.png' width='35' heigth='35'>Datos adicionales</a></li>
		<li><a href="#tabs-3"><img src='../images/iconos/user.ico' width='35' heigth='35'>Datos tutor</a></li>
		<li><a href="#tabs-4"><img src='../images/iconos/registro.png' width='35' heigth='35'>Datos solicitud</a></li>
		<li><a href="#tabs-5"><img src='../images/iconos/informacion.png' width='35' heigth='35'>Ayuda</a></li>
		<?php if($_SESSION['user_admin']==null){?>
		<li><a href="#tabs-6"><img src='../images/iconos/shutdown.ico' width='35' heigth='35'>Salir</a></li>
		<?php }?>
	</ul>
	
	<!-- TAB1 DATOS ALUMNO -->
	<div id="tabs-1">
	<fieldset>
	<!-- DATOS OCULTOS QUE SE DEBEN MANDAR PARA NO DEJAR EN VACIO  Y LOS DEMAS DATOS  NO SE MODIFIQUEN -->
	<input type='hidden' name='opcion_formato' id='opcion_formato' value='reinscripcion'>
	<input type='hidden' name='ciclo_caja' id='ciclo_caja' value='<?php echo $ciclo->getClaveCiclo();?>'>
	<input type='hidden' name='ciclo_nombre' id='ciclo_nombre' value='<?php echo $ciclo->getNoCiclo();?>'>
	<input type='hidden' name='fecha' id='fecha' value='<?php echo @date("d-m-Y");?>'>
	<input type='hidden'  readonly="readonly" name='mat_alu' id='mat_alu' value='<?php echo $alumno->getMatriculaAlumno();?>'>
	<input type='hidden' name='sec_alu' id='sec_alu' value='<?php echo $campoSeccion;?>'>
	<input type='hidden' name='codsec_alu' id='codsec_alu' value='<?php echo $alumno->getCodigoSeccionAlumno();?>'>
	<!-- <input type='hidden' name='bac_alu' id='bac_alu' value='<?php echo $cve_bac_ins;?>'>-->
	<input type='hidden' name='deuda' id='deuda_alu' value='<?php echo $alumno->getDeudaAlumno();?>'>
	<input type='hidden' name='status' id='status_alu' value='<?php echo $alumno->getStatusAlumno();?>'>
	
	<!--  -->
	<label for="name">*Curp</label>
    <input read value='<?php echo $alumno->getCurpAlumno();?>' type="text" name="curp_alu" id="curp_alu" class="text ui-widget-content ui-corner-all">
	<label for="name" >Nombre</label>
	<input readonly="readonly" value='<?php echo $alumno->getNombreAlumno();?>' type="text" name="nom_alu" id="nom_alu" class="text ui-widget-content ui-corner-all">
	<label for="apellido1">Apellidos</label>
	<input readonly="readonly" value='<?php echo $alumno->getAPaternoAlumno();?>' type="text" name="ap_alu" id="ap_alu" class="text ui-widget-content ui-corner-all">
	<label></label><br>
	<input readonly="readonly" value='<?php echo $alumno->getAMaternoAlumno();?>' type="text" name="am_alu" id="am_alu" class="text ui-widget-content ui-corner-all">
	<label for="fecha" >*Fecha <br>de nacimiento<br></label>
	<input value='<?php echo $alumno->getFNacimientoAlumno();?>' type="date" name="fnac_alu" id="fnac_alu" class="text ui-widget-content ui-corner-all">
	<label for="tel1">Telefonos</label>
	<input value='<?php echo $alumno->getTel1Alumno();?>' type="tel" name="tel1_alu" id="tel1_alu" class="text ui-widget-content ui-corner-all">
	<label for="tel2">*</label>
	<input value='<?php echo $alumno->getTel2Alumno();?>' type="tel" name="tel2_alu" id="tel2_alu" class="text ui-widget-content ui-corner-all">
	<label for="correo" >Correo</label>
	<input value='<?php echo $alumno->getCorreoAlumno();?>' type="email" name="mail_alu" id="mail_alu" value="" class="text ui-widget-content ui-corner-all">
	<label >Domicilio</label><br><br>
	<label>*Estado</label><br>
	<select name='estado_alu' id='estado' onchange="javascript:dialogo(this.value);" required="required">
		<?php 
		if(strlen($cadenaTieneColonia)>0){
		echo $cadenaTieneColonia;
		}
		else{
		echo $cadenaSinColonia;
		}
		?>
	</select><br>
	<input type='hidden' value='<?php echo $cpEstado;?>' name='respaldoEstado' id='respaldoEstado'>
	<label >*Ciudad:</label>
	<select name='ciudad_alu' id='ciudad' onchange="javascript:cargarColonias(this.value);" required="required">
	<option value='<?php echo $cpCiudad?>'><?php echo $nombreCiudad;?></option>
	</select><br>
	<label>*Colonia:</label>
	<select name='col_alu' id='col_alu' required="required">
	<option value='<?php echo $idColonia?>'><?php echo $nombreColonia;?></option>
	</select><br>
	<label>Codigo <br>postal</label>
	<input type='text' name='cp_alu' id='cp_alu' value='<?php echo $CpColonia;?>' class="text ui-widget-content ui-corner-all">
	<br>
	<div id='cargarColonias'></div>
	<label >*Calle:</label>
	<input required="required" placeholder="Nombre de la calle" value='<?php echo $alumno->getCalleAlumno();?>' type="text" name="calle_alu" id="calle_alu" class="text ui-widget-content ui-corner-all">
	<label>*No. <br>de <br>Calle:</label>
	<input required="required" placeholder="Numero de la calle" value='<?php echo $alumno->getNoAlumno();?>' type="text" name="no_alu" id="no_alu" class="text ui-widget-content ui-corner-all">
	</fieldset>
	<br>
	<input type='button' class='art-button' value='Modificar datos' onclick="javascript:modificarAlumno();"/>
	<br>
	</div>
	<!-- FIN TAB 1 DATOS ALUMNO -->
	
	<!-- INICIO TAB 2 DATOS ADICIONALES ALUMNO -->
	<div id="tabs-2">
	<fieldset>
	<label for="name">Problemas <br>de <br>Salud<br>(Si/No)</label>
	<input read value='<?php echo $pSaludAlu[0];?>' type="text" name="psalud_a" id="psalud_a" class="text ui-widget-content ui-corner-all">
	<label for="name">Especifique <br></label><br>
	<input read value='<?php echo $pSaludAlu[1];?>' type="text" name="psalud_alu" id="psalud_alu" class="text ui-widget-content ui-corner-all">
    <label>Beca<br>(Si/No)<br></label>	<br>
    <input type='text' name='beca_alu' id='beca_alu' value="<?php echo $tBecaAlumno[0];?>" class="text ui-widget-content ui-corner-all"><br>
    <label>Especifique<br></label>	<br>
    <input type='text' name='tbeca_alu' id='tbeca_alu' value="<?php echo $tBecaAlumno[1]?>" class="text ui-widget-content ui-corner-all">
    <label>Servicio<br> de<br> salud<br>Si/No</label><br>
    <input type='text' name='ssalud_alu' id='ssalud_alu' value="<?php echo $tSaludAlumno[0];?>" class="text ui-widget-content ui-corner-all"><br>
    <label>Especifique</label><br>
    <input type='text' name='tsalud_alu' id='tsalud_alu' value="<?php echo $tSaludAlumno[1];?>" class="text ui-widget-content ui-corner-all"><br>
    <label>Lengua indigena:<br>(Si/No)</label><br>
    <input type='text' value="<?php echo $tLenguaAlumno[0];?>" name='lengua_alu' id='lengua_alu' class="text ui-widget-content ui-corner-all"><br>
    <label>Especifique:</label><br>
    <input type='text' value="<?php echo $tLenguaAlumno[1];?>" name='tlengua_alu' id='tlengua_alu' class="text ui-widget-content ui-corner-all"><br>
    <br>
    <label >*Sexo:</label>
	<select name='sexo_alu' id='sexo_alu' required="required">
	<option <?php echo $cero;?> value='0'>--Selecciona una opcion--</option>
	<option <?php echo $masculino;?> value='masc'>Masculino</option>
	<option <?php echo $femenino;?> value='fem'>Femenino</option>
	</select>
	<br>
	<label>Lugar<br> de <br>nacimiento:</label>
	<input type='text' name='lnac_alu' id='lnac_alu' class="text ui-widget-content ui-corner-all" value='<?php echo $lnac_aluex;?>'>
	<br><br>
    <input type='button' class='art-button' value='Modificar datos' onclick="javascript:modificarDatosExtra();">
	</fieldset>
	</div>
	<!-- FIN TAB2 DATOS ADICIONALES DEL ALUMNO -->
	
	<!-- INICIO TAB3 DATOS DEL TUTOR -->
	<div id="tabs-3">
	<fieldset>
	<label></label>
	<input type="hidden" value='<?php echo $cve_pad;?>' name='cve_pad' id='cve_pad'>
	<label>Nombre <br>del<br> tutor</label><br>
	<input type='text' value="<?php echo $nomPadre;?>" name='nom_pad' id='nom_pad' class="text ui-widget-content ui-corner-all"><br>
	<label>Apellidos</label><br>
	<input type='text' value="<?php echo $apPadre;?>" name='ap_pad' id='ap_pad' class="text ui-widget-content ui-corner-all"><br>
	<label></label><br>
	<input type='text' value="<?php echo $aMPadre?>" name='am_pad' id='am_pad' class="text ui-widget-content ui-corner-all"><br>
	<label>Telefonos:</label><br>
	<input type='text' value="<?php echo $tel1Padre; ?>" name='tel1_pad' id='tel1_pad' class="text ui-widget-content ui-corner-all"><br>
	<label></label><br>
	<input type='text' value="<?php echo $tel2Padre;?>" name='tel2_pad' id='tel2_pad' class="text ui-widget-content ui-corner-all"><br>
	<label>Estado<br>Civil</label><br>
	<input type='hidden' value="<?php  echo $ecivilPadre;?>" name='ecivil_pad' id='ecivil_pad' class="text ui-widget-content ui-corner-all">

	<select name='edocivil_pad' id='edocivil_pad'>
	<option value='1'>CASADO</option>
	<option value='2'>DIVORCIADO</option>
	<option value='3'>VIUDO</option>
	<option value='4'>UNION LIBRE</option>
	<option value='5'>SOLTERO</option>
	</select>
	
	<script type="text/javascript">
    var seleccionadoCivil=document.getElementById("ecivil_pad");
    var selectCivil=document.getElementById("edocivil_pad");
    selectCivil.selectedIndex=parseInt(seleccionadoCivil.value)-1;
    </script>
    <br>
	<label>Correo <br>del<br> tutor</label><br>
	<input type='text' value="<?php echo $correoPadre;?>" name='mail_pad' id='mail_pad' class="text ui-widget-content ui-corner-all"><br>
	<br>
	<label>Estado</label><br>
	<select name='estado_pad' id='estado_pad' onchange='cargarCiudadesP(this.value)' class="text ui-widget-content ui-corner-all">
		<?php 
		if(strlen($cadenaTieneColoniaPadre)>0){
		echo $cadenaTieneColoniaPadre;
		}
		else{
		echo $cadenaSinColoniaPadre;
		}
		?>
	</select>
	<input type='hidden' name='respaldoEstadoPadre' id='respaldoEstadoPadre' value='<?php echo $respaldoEstadoPadre;?>'>
	<br>
	<label>Ciudad</label><br>
	<select name='ciudad_pad' id='ciudad_pad' onchange='cargarColoniasP(this.value)' class="text ui-widget-content ui-corner-all">
	<option value='<?php echo $idCiudadPadre?>'><?php echo $nombreCiudadPadre?></option>
	</select><br>
	<label>Colonia</label><br>
	<select name='col_pad' id='col_pad' class="text ui-widget-content ui-corner-all">
	<option value='<?php echo $idColoniaPadre;?>'><?php echo $nomPadreColonia;?></option>
	</select>
	<div id='cargarColoniasP'></div>
	<label>Codigo <br>Postal</label><br>
	<input type='text' name='cp_pad' id='cp_pad' value='<?php echo $CpColoniaPadre;?>' class="text ui-widget-content ui-corner-all">
	<label>Nombre <br>de la<br>Calle:</label><br>
	<input type='text' name='calle_pad' id='calle_pad' value='<?php echo $callePadre;?>' class="text ui-widget-content ui-corner-all"><br>
	<label>No. <br>de <br>calle</label>
	<input type='text' name='no_pad' id='no_pad' value='<?php echo $noPadre;?>' class="text ui-widget-content ui-corner-all">
	<br>
	<label>Ocupacion</label><br>
	<input type='text' name='ocupacion_pad' id='ocupacion_pad' value='<?php echo $ocupacionPadre;?>' class="text ui-widget-content ui-corner-all"><br>
	<label>Lugar de trabajo</label><br>
	<input type='text' name='ltrabajo_pad' id='ltrabajo_pad' value='<?php echo $lugarTrabajoPadre;?>' class="text ui-widget-content ui-corner-all"><br>
	
	<br>
	<input type="button" class='art-button' value="Modificar datos" onclick="javascript:modificarPadre();">
	</fieldset>
	<br>
	</div>
	<!-- FIN TAB3 DATOS DEL TUTOR -->
	
	<!--  TAB4 DATOS DE LA REINSCRIPCION-->
	<div id="tabs-4">
	<fieldset>
	<label>Folio <br>de <br>reinscripcion</label>
	<input class="text ui-widget-content ui-corner-all" type='text' name='folio_ins' id='folio_ins' value='<?php echo $cve_ins;?>' readonly="readonly">
	<br>
	<label>Fecha <br></label>
	<input class="text ui-widget-content ui-corner-all" type='text' name='fecha' id='fecha_ins' value='<?php echo $fecha_ins;?>' readonly="readonly">
	<br>
	<label>Turno</label>
	<input class="text ui-widget-content ui-corner-all" type='text' name='turno_ins' id='turno_ins' value='<?php echo $turno_ins;?>' readonly="readonly">
	<br>
	<label>Tipo <br>de<br> solicitud</label>
	<input class="text ui-widget-content ui-corner-all" type='text' name='tipo_ins' id='tipo_ins' value='<?php echo $tipo_ins;?>' readonly="readonly">
	<br>
	<label>Ciclo Escolar</label><br>
	<input class="text ui-widget-content ui-corner-all" type='text' name='ciclo_caja' id='ciclo_caja' value='<?php echo $ciclo->getNoCiclo();?>' readonly="readonly">
	<br>
	<label></label>
	<input type='hidden' name='' id='' value='' readonly="readonly">
	<br>
	<label></label>
	<input type='hidden' name='' id='' value='' readonly="readonly">
	<br>
	<label></label>
	<input type='hidden' name='' id='' value='' readonly="readonly">
	
	<label>Semestre</label>
	<select name='sem_alu' id='sem_alu' onchange="javascript:validarBachillerato(this.value);">
	<?php echo $cadenaSemestreInscripcion;?>
	</select>
	<br>
	<label>Bachillerato</label>
	<select  name='bac_alu' id='bac_alu'>
	<?php echo $cadenaBachilleratoInscripcion;?>
	</select>
	<br>
	<div style='display: none;'>
	<label>Seccion</label>
	<select>
	<?php echo $cadenaSeccionInscripcion;?>
	</select>
	</div>
	</fieldset>
	<br>
	<!--<input type='button' onclick="javascript:cambiarInscripcion();"value="Modificar Datos"  class='art-button'>-->
	<input type='button' onclick="javascript:dialogoReinscripcion();"value="Modificar Datos"  class='art-button'>
	</div>
	<!--FIN TAB4 DATOS DE LA REINSCRIPCION-->
	
   <!-- INICIO TAB5 INFORMACION -->
   <div id="tabs-5">
   <div class="demo-description">
   <p><img src='../images/iconos/label.ico' width="33" height="33">Informaci&oacute;n:
   <ul>
   <ol><img src='../images/NavigatorNextOff.png' width="15" height="15">Los datos marcados con * son Obligatorios</ol>
   <ol><img src='../images/NavigatorNextOff.png' width="15" height="15">Si el c&oacute;digo postal no se encuentra  este se quedar&aacute; en blanco, puedes llenarlo si lo conoces u omitirlo.</ol>
   <ol><img src='../images/NavigatorNextOff.png' width="15" height="15">Cambia los datos en la secci&oacute;n indicada.</ol>
   <ol><img src='../images/NavigatorNextOff.png' width="15" height="15">Los datos se guardar&aacute;n al dar clic en el bot&oacute;n de "modificar datos" de cada secci&oacute;n.</ol>
   <ol><img src='../images/NavigatorNextOff.png' width="15" height="15">Revisa tus datos y envia la solicitud.</ol>
   </ul>
   </p>
   </div>
   <!-- End demo-description -->
   </div>
   <!-- FIN TAB5 INFORMACION -->
	
   <!-- INICIO TAB6 SALIR -->
   <?php if($_SESSION['user_admin']==null){?>
   <div id="tabs-6">
   <h3 align="center"><a href='logout.php?opcion=2' ><img src='images/iconos/bookmark.ico' width="35" height="35">Clic para salir</a></h3>
   </div>
   <?php }?>
   
   </div>

</div>
<!-- End demo -->




 <br>
 <input type='submit' class='art-button-send' value='Enviar Solicitud'>
 <a href='<?php $_SERVER['HTTP_REFERER'];?>' style='text-decoration: none;'><input type='button' class='art-button-send' value='Actualizar cambios'></a>
                


</div>
                     
                    </div>
                </div>
            </div>
            


    </div>
</div>


</form>

<!-- DEMO MODAL REINSCRIPCION -->
<div id="dialog-reinscripcion" title="AVISO" style='display: none;'>
	<p>
	<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
	LOS DATOS SE MODIFICARAN,ESTAS SEGURO?
	</p>
</div><!-- End demo -->

<!-- DEMO MODAL PADRE -->
<div id="dialog-padre" title="AVISO" style='display: none;'>
	<p>
	<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
	LOS DATOS SE MODIFICARAN,ESTAS SEGURO?
	</p>
</div><!-- End demo -->

<!-- DEMO MODAL ALUMNO-->
<div id="dialog-alumno" title="AVISO" style='display: none;'>
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
	LOS DATOS SE MODIFICAR&Aacute;N,EST&Aacute;S SEGURO?</p>
</div><!-- End demo -->

<!-- DEMO MODA INICIO -->
<div id="dialog-inicio" title="AVISO" style='display: none;'>
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
	BIENVENIDO,YA REALIZASTE TU SOLICITUD PUEDES REVISAR Y ACTUALIZAR LOS DATOS</p>
</div><!-- End demo -->
<!-- DEMO MODAL -->


<!-- DEMO MODAL DATOS EXTRA-->
<div id="dialog-alumno-extra" title="AVISO" style='display: none;'>
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
	LOS DATOS SE MODIFICAR&Aacute;N,EST&Aacute;S SEGURO?</p>
</div><!-- End demo -->

<!-- DEMO MODAL ESTADOS -->
<div id="dialog-confirm" title="AVISO" style='display: none;'>
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
	SE CAMBIAR&Aacute;N LOS DATOS Y DEBER&Aacute;S SELECCIONAR UN NUEVO ESTADO,CIUDAD Y COLONIA,EST&Aacute;S SEGURO?</p>
</div><!-- End demo -->

<?php if($_SESSION['user_admin']==null){?>
<!-- SCROLL -->
<a href="#" class="scrollup" style="display: inline;"><img src='../images/icono.jpg'></a>
<!-- FIN SCROLL -->
<?php }?>
</body></html>
<?php 
}
else{
echo "<script>window.location='../usuarios/alumnos/solicitud-reinscripcion.html';</script>";
}
?>
