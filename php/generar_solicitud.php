<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" media="screen">
<link rel="stylesheet" href="../style.responsive.css" media="all">
<link rel="stylesheet" type="text/css"href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<script src="../jquery.js"></script>
<script src="../script.js"></script>
<script src="../script.responsive.js"></script>

<!-- JQUERY UI -->
<link type="text/css" href="../css/jqueryui/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />

<!--BOOTSTRAP-->
<link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="../js/bootstrap/bootstrap.min.js"></script>
<!--FIN BOOTSTRAP-->

<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]><link rel="stylesheet" href="../style.ie7.css" media="screen" /><![endif]-->
<!--[if IE]> 
    
    <script type="text/javascript">
    var e =("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
    for (var i=0; i<e.length; i++) {
    document.createElement(e[i]);
    }
    </script>
<![endif]-->

</head>
<body>
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
<?php
if (isset ( $_SESSION ['matricula'] ) == $_POST ["mat_alu"] || isset ( $_SESSION ["codigo_usuario"] )) {
	
	if (($_SESSION ["nombre"] != '' && $_SESSION ["logueado"] = "si") || $_SESSION ["tipo_usuario"] = "admin") {
		
		require_once 'Alumno.php';
		
		/** ***************DATOS DEL FORMULARIO*********************************************/
		$opcion_formato = $_POST ['opcion_formato'];
		$ciclo_clave = $_POST ['ciclo_caja'];
		$ciclo_nombre = $_POST ['ciclo_nombre'];
		$fecha = $_POST ['fecha'];
		$matri_alu = $_POST ['mat_alu'];
		$nomsec_alu = $_POST ['sec_alu'];
		$sec_alu = $_POST ['codsec_alu'];
		$sem_alu = $_POST ['sem_alu'];
		$bac_alu = $_POST ['bac_alu'];
		$nom_alu = strtolower ( $_POST ['nom_alu'] );
		$ap_alu = strtolower ( $_POST ['ap_alu'] );
		$am_alu = strtolower ( $_POST ['am_alu'] );
		$curp_alu = $_POST ['curp_alu'];
		$fnacimiento_alu = $_POST ['fnac_alu'];
		$sexo_alu = $_POST ['sexo_alu'];
		$lnacimiento_alu = $_POST ['lnac_alu'];
		$escolaridad_alu = $_POST ['escolaridad_alu'];
		$estado_alu = $_POST ['estado_alu'];
		$ciudad_alu = $_POST ['ciudad_alu'];
		$col_alu = $_POST ['col_alu'];
		$cp_alu = $_POST ['cp_alu'];
		$calle_alu = $_POST ['calle_alu'];
		$no_alu = $_POST ['no_alu'];
		
		$tel1_alu = $_POST ['tel1_alu'];
		$tel2_alu = $_POST ['tel2_alu'];
		$mail_alu = strtoupper ( $_POST ['mail_alu'] );
		$ecivil_alu = $_POST ['ecivil_alu'];
		$psalud_a = $_POST ['psalud_a'];
		$ocupacion_alu = $_POST ['ocupacion_alu'];
		$psalud_alu = $_POST ['psalud_alu'];
		$dis_alu = $_POST ['dis_alu'];
		$beca_alu = $_POST ['beca_alu'];
		$tbeca_alu = $_POST ['tbeca_alu'];
		$ssalud_alu = $_POST ['ssalud_alu'];
		$tsalud_alu = $_POST ['tsalud_alu'];
		$lengua_alu = $_POST ['lengua_alu'];
		$tlengua_alu = $_POST ['tlengua_alu'];
		$nom_pad = $_POST ['nom_pad'];
		$ap_pad = $_POST ['ap_pad'];
		$am_pad = $_POST ['am_pad'];
		$edocivil_pad = $_POST ['edocivil_pad'];
		$estado_pad = $_POST ['estado_pad'];
		$ciudad_pad = $_POST ['ciudad_pad'];
		$col_pad = $_POST ['col_pad'];
		$cp_pad = $_POST ['cp_pad'];
		$calle_pad = $_POST ['calle_pad'];
		$no_pad = $_POST ['no_pad'];
		$tel1_pad = $_POST ['tel1_pad'];
		$tel2_pad = $_POST ['tel2_pad'];
		$mail_pad = strtoupper ( $_POST ['mail_pad'] );
		$tipo_reg = $_POST ['tipo_reg'];
		$ocupacion_pad = $_POST ['ocupacion_pad'];
		$ltrabajo_pad = $_POST ['ltrabajo_pad'];
		
		/**
		 * *******************CALCULAR EDAD DEL ALUMNO***************************************
		 */
		
		$alumno = new Alumno ();
		$edad_alu = $alumno->calcularEdad ( $fnacimiento_alu );
		
		/**
		 * ******************DATOS PARA LA SOLICITUD DE ICATMI******************************
		 */
		
		$jsonIcatmi = array ();
		$datos_icatmi [0] = "16EIC0011R";
		$datos_icatmi [1] = "018";
		$datos_icatmi [2] = $fecha;
		$datos_icatmi [3] = $curp_alu;
		$datos_icatmi [4] = $ap_alu;
		$datos_icatmi [5] = $am_alu;
		$datos_icatmi [6] = $nom_alu;
		$datos_icatmi [7] = $edad_alu;
		$datos_icatmi [8] = $lnacimiento_alu;
		$datos_icatmi [9] = $fnacimiento_alu;
		$datos_icatmi [10] = $sexo_alu;
		$datos_icatmi [11] = "bachillerato incompleto";
		$datos_icatmi [12] = $calle_alu;
		$datos_icatmi [13] = $col_alu;
		$datos_icatmi [14] = $ciudad_alu;
		$datos_icatmi [15] = $cp_alu;
		$datos_icatmi [16] = $tel1_alu;
		$datos_icatmi [17] = $tel2_alu;
		$datos_icatmi [18] = $mail_alu;
		$datos_icatmi [19] = "soltero(a)";
		// $datos_icatmi[20]=$dis_alu;
		$datos_icatmi [20] = "";
		$datos_icatmi [21] = "estudiante";
		$datos_icatmi [22] = "convenio vinculacion";
		$datos_icatmi [23] = "preparacion integral";
		$datos_icatmi [24] = "ingles nivel";
		$datos_icatmi [25] = "ingles";
		$datos_icatmi [26] = "lunes a viernes";
		$datos_icatmi [27] = "preparatoria morelos";
		$datos_icatmi [28] = $matri_alu;
		$datos_icatmi [29] = "reinscripcion";
		$datos_icatmi [30] = $no_alu;
		
		$cadenaMorelos = "";
		$cadenaIcatmi = "";
		for($i = 0; $i < sizeof ( $datos_icatmi ); $i ++) {
			$jsonIcatmi [] = $datos_icatmi [$i];
			$cadenaIcatmi .= $datos_icatmi [$i] . ",";
		}
		$datosI = json_encode ( $jsonIcatmi );
		
		/**
		 * *************************************DATOS PARA LA SOLICITUD DE PREPA MORELOS****
		 */
		$jsonMorelos = array ();
		$datos_morelos [0] = $fecha;
		$datos_morelos [1] = $ciclo_nombre;
		$datos_morelos [2] = $ciclo_clave;
		$datos_morelos [3] = $sec_alu;
		$datos_morelos [4] = $nomsec_alu;
		$datos_morelos [5] = $sem_alu;
		$datos_morelos [6] = $matri_alu;
		$datos_morelos [7] = $nom_alu;
		$datos_morelos [8] = $ap_alu;
		$datos_morelos [9] = $am_alu;
		$datos_morelos [10] = $fnacimiento_alu;
		$datos_morelos [11] = $lnacimiento_alu;
		$datos_morelos [12] = $calle_alu;
		$datos_morelos [13] = $no_alu;
		$datos_morelos [14] = $col_alu;
		$datos_morelos [15] = $cp_alu;
		$datos_morelos [16] = $ciudad_alu;
		$datos_morelos [17] = $estado_alu;
		$datos_morelos [18] = $tel1_alu;
		$datos_morelos [19] = $tel2_alu;
		$datos_morelos [20] = $mail_alu;
		$datos_morelos [21] = $psalud_a;
		$datos_morelos [22] = $beca_alu;
		$datos_morelos [23] = $tbeca_alu;
		$datos_morelos [24] = $ssalud_alu;
		$datos_morelos [25] = $tsalud_alu;
		$datos_morelos [26] = $lengua_alu;
		$datos_morelos [27] = $tlengua_alu;
		$datos_morelos [28] = $nom_pad;
		$datos_morelos [29] = $ap_pad;
		$datos_morelos [30] = $am_pad;
		$datos_morelos [31] = $ap_pad;
		$datos_morelos [32] = $psalud_alu;
		$datos_morelos [33] = $edocivil_pad;
		$datos_morelos [34] = $calle_pad;
		$datos_morelos [35] = $no_pad;
		$datos_morelos [36] = $cp_pad;
		$datos_morelos [37] = $col_pad;
		$datos_morelos [38] = $ciudad_pad;
		$datos_morelos [39] = $estado_pad;
		$datos_morelos [40] = $tel1_pad;
		$datos_morelos [41] = $bac_alu;
		$datos_morelos [42] = $tel2_pad;
		$datos_morelos [43] = $mail_pad;
		$datos_morelos [44] = $ocupacion_pad;
		$datos_morelos [45] = $ltrabajo_pad;
		
		for($i = 0; $i < sizeof ( $datos_morelos ); $i ++) {
			$jsonMorelos [] = $datos_morelos [$i];
			$cadenaMorelos .= $datos_morelos [$i] . ",";
		}
		$datosM = json_encode ( $jsonMorelos );
		
		/**
		 * *****************INICIO DE REGISTRO DE SOLICITUD EN LA BD***********************
		 */
		
		require_once 'Inscripcion.php';
		require_once 'TablaInscripcion.php';
		
		require_once 'AlumnoExtra.php';
		require_once 'TablaAlumnoExtra.php';
		
		require_once 'Padre.php';
		require_once 'TablaPadre.php';
		
		require_once 'PadreHijo.php';
		require_once 'TablaPadreHijo.php';
		
		require_once 'Alumno.php';
		require_once 'TablaAlumno.php';
		
		$inscripcion = new Inscripcion ();
		$tablaInscripcion = new TablaInscripcion ();
		$inscripcion->setClaveInscripcion ( null );
		$inscripcion->setFechaInscripcion ( $fecha );
		$inscripcion->setTurnoInscripcion ( "matutino" );
		$inscripcion->setTipoInscripcion ( "reinscripcion" );
		$inscripcion->setClaveCicloInscripcion ( $ciclo_clave );
		$inscripcion->setClaveSemestre ( $sem_alu );
		$inscripcion->setMatriculaAlumnoInscripcion ( strtoupper ( $matri_alu ) );
		$inscripcion->setCodigoSeccionInscripcion ( $sec_alu );
		$inscripcion->setClaveBachilleratoInscripcion ( $bac_alu );
		$inscripcion->setEscuelaProcedencia ( "" );
		$inscripcion->setPromedioInscripcion ( "" );
		$inscripcion->setEscuelaFicha ( "" );
		$inscripcion->getTipoInscripcion ();
		
		if ($tablaInscripcion->guardarInscripcion ( $inscripcion ) == "1") {
			// echo "Se guardo la reinscripcion";
			
			$sql = "UPDATE alumno SET status_alu='proceso-re' WHERE matri_alu='" . $matri_alu . "'";
			
			$qry = @mysql_query ( $sql ) or die ( mysql_error () . mysql_errno () );
			
			$alumnoextra = new AlumnoExtra ();
			$tablaAlumnoExtra = new TablaAlumnoExtra ();
			$alumnoextra->setClaveAlumnoExtra ( null );
			$alumnoextra->setPSaludAlumno ( $psalud_a . "," . $psalud_alu );
			$alumnoextra->setBecaAlumno ( $beca_alu . "," . $tbeca_alu );
			$alumnoextra->setServicioSaludAlumno ( $ssalud_alu . "," . $tsalud_alu );
			$alumnoextra->setIdiomaAlumno ( $lengua_alu . "," . $tlengua_alu );
			$alumnoextra->setMatriculaAlumnoExtra ( strtoupper ( $inscripcion->getMatriculaAlumnoInscripcion () ) );
			$alumnoextra->setSexoAlumnoExtra ( $sexo_alu );
			$alumnoextra->setLugarNacimientoExtra ( $lnacimiento_alu );
			
			if ($tablaAlumnoExtra->guardarAlumnoExtra ( $alumnoextra ) == "1") {
				// echo "Se guardo alumno extra";
				$padre = new Padre ();
				$tablaPadre = new TablaPadre ();
				$padre->setClavePadre ( null );
				$padre->setNombrePadre ( strtoupper ( $nom_pad ) );
				$padre->setAPaternoPadre ( strtoupper ( $ap_pad ) );
				$padre->setAMaternoPadre ( strtoupper ( $am_pad ) );
				$padre->setTel1Padre ( $tel1_pad );
				$padre->setTel2Padre ( $tel2_pad );
				
				switch ($edocivil_pad) {
					case 1 :
						$estadocivilp = "CASADO";
						break;
					case 2 :
						$estadocivilp = "DIVORCIADO";
						break;
					case 3 :
						$estadocivilp = "VIUDO";
						break;
					case 4 :
						$estadocivilp = "UNION LIBRE";
						break;
					case 5 :
						$estadocivilp = "SOLTERO";
						break;
					
					default :
						break;
				}
				
				$padre->setECivilPadre ( $edocivil_pad );
				$padre->setCorreoPadre ( $mail_pad );
				$padre->setColoniaPadre ( $col_pad );
				$padre->setCallePadre ( $calle_pad );
				$padre->setNoPadre ( $no_pad );
				$padre->setOcupacionPadre ( $ocupacion_pad );
				$padre->setLugarTrabajoPadre ( $ltrabajo_pad );
				if ($tablaPadre->guardarPadre ( $padre ) == "1") {
					// echo "Se guardo tabla padre";
					$vectorPadre = new Padre ();
					$datosPadre = new Padre ();
					$consultaPadre = new TablaPadre ();
					
					$datosPadre = $consultaPadre->reporteEspecificoPadre ( "tel1_pad", $padre->getTel1Padre () );
					if (sizeof ( $datosPadre ) > 0) {
						// echo "Si hay datos del padre";
						foreach ( $datosPadre as $vectorPadre ) {
							$padreColumna = $vectorPadre->getClavePadre ();
						}
						$padrehijo = new PadreHijo ();
						$tablaPadreHijo = new TablaPadreHijo ();
						$padrehijo->setClavePadreHijo ( null );
						$padrehijo->setClavePadre ( $padreColumna );
						$padrehijo->setMatriculaHijo ( strtoupper ( $inscripcion->getMatriculaAlumnoInscripcion () ) );
						
						if ($tablaPadreHijo->guardarPadreHijo ( $padrehijo ) == "1") {
							// echo "Se guardo padre hijo";
							// Actualizar los datos del alumno
							$alumnonew = new Alumno ();
							$tablaAlumnoNew = new TablaAlumno ();
							$alumnonew->setMatriculaAlumno ( $inscripcion->getMatriculaAlumnoInscripcion () );
							$alumnonew->setCurpAlumno ( strtoupper ( $curp_alu ) );
							$alumnonew->setNombreAlumno ( strtoupper ( $nom_alu ) );
							$alumnonew->setAPaternoAlumno ( strtoupper ( $ap_alu ) );
							$alumnonew->setAMaternoAlumno ( strtoupper ( $am_alu ) );
							$alumnonew->setFNacimientoAlumno ( $fnacimiento_alu );
							$alumnonew->setTel1Alumno ( $tel1_alu );
							$alumnonew->setTel2Alumno ( $tel2_alu );
							$alumnonew->setCorreoAlumno ( strtoupper ( $mail_alu ) );
							$alumnonew->setColoniaAlumno ( strtoupper ( $col_alu ) );
							$alumnonew->setCalleAlumno ( strtoupper ( $calle_alu ) );
							$alumnonew->setNoAlumno ( $no_alu );
							$alumnonew->setDeudaAlumno ( '0' );
							$alumnonew->setStatusAlumno ( "" );
							$alumnonew->setClaveBachilleratoAlumno ( $inscripcion->getClaveBachilleratoInscripcion () );
							$alumnonew->setCodigoSeccionAlumno ( $inscripcion->getCodigoSeccionInscripcion () );
							//
							if ($tablaAlumnoNew->modificarAlumno ( $alumnonew ) == "1") {
								$alumnostatus = new Alumno ();
								$tablaAlumnoStatus = new TablaAlumno ();
								
								if ($tablaAlumnoStatus->cambiarStatusAlumno ( $inscripcion->getMatriculaAlumnoInscripcion (), "proceso-re" ) == "1") {
									// echo "Registro completado,ya estas en tramite de reinscripcion!,pasa a control escolar";
								} else {
									// echo "Error al actualizar el estado del alumno";
								}
							} else {
								// echo "Error al modificar alumno";
							}
						} else {
							if ($tablaPadreHijo->guardarPadreHijo ( $padrehijo ) == "2") {
								// echo "Ya existe tabla padre hijo";
							} else {
								// echo "Error tablapadrehijo";
							}
						}
					} else {
						// echo "No hay datos padre";
					}
				} else {
					
					if ($tablaPadre->guardarPadre ( $padre ) == "2") {
						// echo "Ya existe el padre con ese tel o correo";
						// SI YA EXISTE EL PADRE CON ESE MISMO TELEFONO,EL CASO SON HERMANOS//
						// O TIENEN EL MISMO TUTOR Y SE PROCEDE A TOMAR EL TEL PARA VINCULARLOS//
						$vectorPadre = new Padre ();
						$datosPadre = new Padre ();
						$consultaPadre = new TablaPadre ();
						
						$datosPadre = $consultaPadre->reporteEspecificoPadre ( "tel1_pad", $padre->getTel1Padre () );
						if (sizeof ( $datosPadre ) > 0) {
							// echo "Si hay datos del padre vinculacion";
							
							foreach ( $datosPadre as $vectorPadre ) {
								$padreColumna = $vectorPadre->getClavePadre ();
							}
							$padrehijo = new PadreHijo ();
							$tablaPadreHijo = new TablaPadreHijo ();
							$padrehijo->setClavePadreHijo ( null );
							$padrehijo->setClavePadre ( $padreColumna );
							$padrehijo->setMatriculaHijo ( strtoupper ( $inscripcion->getMatriculaAlumnoInscripcion () ) );
							
							if ($tablaPadreHijo->guardarPadreHijo ( $padrehijo ) == "1") {
								// $alumnostatus=new Alumno();
								// $tablaAlumnoStatus=new TablaAlumno();
								// if($tablaAlumnoStatus->cambiarStatusAlumno($inscripcion->getMatriculaAlumnoInscripcion(),"proceso-re")=="1"){
								// echo "Registro completado vinculacion,ya estas en tramite de reinscripcion!,pasa a control escolar";
								// }
								// else{
								// echo "Error al actualizar el estado del alumno";
								// }
							} else {
								if ($tablaPadreHijo->guardarPadreHijo ( $padrehijo == "2" )) {
									// echo "Ya existen los datos padre hijo vinculacion";
								} else {
									// echo "Error de bd vinculacion";
								}
							}
							// FIN VALIDACION
						}
					} else {
						// echo "Error al guardar el padre";
					}
				}
			} else {
				if ($tablaAlumnoExtra->guardarAlumnoExtra ( $alumnoextra ) == "2") {
					// echo "Ya existe un alumno con esa informacion extra";
				} else {
					// echo "Error al registrar alumno extra";
				}
			}
		} else {
			if ($tablaInscripcion->guardarInscripcion ( $inscripcion ) == "2") {
				// echo "Ya existe el registro de reinscripcion con esa matricula";
				$sqlStatus = "select status_alu  from alumno where matri_alu='" . $matri_alu . "'";
				$qryStatus = mysql_query ( $sqlStatus ) or die ( mysql_error () );
				
				$objetoStatus = mysql_fetch_array ( $qryStatus );
				if ($objetoStatus ['status_alu'] == "reinscrito") {
					// NADA
				} else {
					$alumnoModificarStatus = new Alumno ();
					$tablaAlumnoModificarStatus = new TablaAlumno ();
					$tablaAlumnoModificarStatus->cambiarStatusAlumno ( $matri_alu, "proceso-re" );
				}
			} else {
				// echo "Error en la inscripcion";
			}
		}


/*******************FIN DE REGISTRO*************************************************/
 
?>
<!-- BOTON ATRAS -->
<?php if($_SESSION['user_admin']!=null){?>
<h3 align="center">
<a href="modificar_solicitud.php?matricula_sesion=<?php echo $datos_morelos[6]?>" style="text-decoration: none;">
<img alt="Regresar" src="../images/iconos/left.ico" width="33" height="33" title="Regresar">Regresar</a>
</h3><br>
<?php }?>
<!-- PARA BOTON ATRAS -->
<form method="post" action="formatos/dompdf/www/main/example.php">
		
			<input type='hidden' name="datosm0"
				value='<?php echo $datos_morelos[0];?>'> <input type='hidden'
				name="datosm1" value='<?php echo $datos_morelos[1];?>'> <input
				type='hidden' name="datosm2" value='<?php echo $datos_morelos[2];?>'>
			<input type='hidden' name="datosm3"
				value='<?php echo $datos_morelos[3];?>'> <input type='hidden'
				name="datosm4" value='<?php echo $datos_morelos[4];?>'> <input
				type='hidden' name="datosm5" value='<?php echo $datos_morelos[5];?>'>
			<input type='hidden' name="datosm6"
				value='<?php echo $datos_morelos[6];?>'> <input type='hidden'
				name="datosm7" value='<?php echo $datos_morelos[7];?>'> <input
				type='hidden' name="datosm8" value='<?php echo $datos_morelos[8];?>'>
			<input type='hidden' name="datosm9"
				value='<?php echo $datos_morelos[9];?>'> <input type='hidden'
				name="datosm10" value='<?php echo $datos_morelos[10];?>'> <input
				type='hidden' name="datosm11"
				value='<?php echo $datos_morelos[11];?>'> <input type='hidden'
				name="datosm12" value='<?php echo $datos_morelos[12];?>'> <input
				type='hidden' name="datosm13"
				value='<?php echo $datos_morelos[13];?>'> <input type='hidden'
				name="datosm14" value='<?php echo $datos_morelos[14];?>'> <input
				type='hidden' name="datosm15"
				value='<?php echo $datos_morelos[15];?>'> <input type='hidden'
				name="datosm16" value='<?php echo $datos_morelos[16];?>'> <input
				type='hidden' name="datosm17"
				value='<?php echo $datos_morelos[17];?>'> <input type='hidden'
				name="datosm18" value='<?php echo $datos_morelos[18];?>'> <input
				type='hidden' name="datosm19"
				value='<?php echo $datos_morelos[19];?>'> <input type='hidden'
				name="datosm20" value='<?php echo $datos_morelos[20];?>'> <input
				type='hidden' name="datosm21"
				value='<?php echo $datos_morelos[21];?>'> <input type='hidden'
				name="datosm22" value='<?php echo $datos_morelos[22];?>'> <input
				type='hidden' name="datosm23"
				value='<?php echo $datos_morelos[23];?>'> <input type='hidden'
				name="datosm24" value='<?php echo $datos_morelos[24];?>'> <input
				type='hidden' name="datosm25"
				value='<?php echo $datos_morelos[25];?>'> <input type='hidden'
				name="datosm26" value='<?php echo $datos_morelos[26];?>'> <input
				type='hidden' name="datosm27"
				value='<?php echo $datos_morelos[27];?>'> <input type='hidden'
				name="datosm28" value='<?php echo $datos_morelos[28];?>'> <input
				type='hidden' name="datosm29"
				value='<?php echo $datos_morelos[29];?>'> <input type='hidden'
				name="datosm30" value='<?php echo $datos_morelos[30];?>'> <input
				type='hidden' name="datosm31"
				value='<?php echo $datos_morelos[31];?>'> <input type='hidden'
				name="datosm32" value='<?php echo $datos_morelos[32];?>'> <input
				type='hidden' name="datosm33"
				value='<?php echo $datos_morelos[33];?>'> <input type='hidden'
				name="datosm34" value='<?php echo $datos_morelos[34];?>'> <input
				type='hidden' name="datosm35"
				value='<?php echo $datos_morelos[35];?>'> <input type='hidden'
				name="datosm36" value='<?php echo $datos_morelos[36];?>'> <input
				type='hidden' name="datosm37"
				value='<?php echo $datos_morelos[37];?>'> <input type='hidden'
				name="datosm38" value='<?php echo $datos_morelos[38];?>'> <input
				type='hidden' name="datosm39"
				value='<?php echo $datos_morelos[39];?>'> <input type='hidden'
				name="datosm40" value='<?php echo $datos_morelos[40];?>'> <input
				type='hidden' name="datosm41"
				value='<?php echo $datos_morelos[41];?>'> <input type='hidden'
				name="datosm42" value='<?php echo $datos_morelos[42];?>'> <input
				type='hidden' name="datosm43"
				value='<?php echo $datos_morelos[43];?>'> <input type='hidden'
				name="datosm44" value='<?php echo $datos_morelos[44];?>'> <input
				type='hidden' name="datosm45"
				value='<?php echo $datos_morelos[45];?>'> <input type='hidden'
				name="datosi0" value='<?php echo $datos_icatmi[0];?>'> <input
				type='hidden' name="datosi1" value='<?php echo $datos_icatmi[1];?>'>
			<input type='hidden' name="datosi2"
				value='<?php echo $datos_icatmi[2];?>'> <input type='hidden'
				name="datosi3" value='<?php echo $datos_icatmi[3];?>'> <input
				type='hidden' name="datosi4" value='<?php echo $datos_icatmi[4];?>'>
			<input type='hidden' name="datosi5"
				value='<?php echo $datos_icatmi[5];?>'> <input type='hidden'
				name="datosi6" value='<?php echo $datos_icatmi[6];?>'> <input
				type='hidden' name="datosi7" value='<?php echo $datos_icatmi[7];?>'>
			<input type='hidden' name="datosi8"
				value='<?php echo $datos_icatmi[8];?>'> <input type='hidden'
				name="datosi9" value='<?php echo $datos_icatmi[9];?>'> <input
				type='hidden' name="datosi10"
				value='<?php echo $datos_icatmi[10];?>'> <input type='hidden'
				name="datosi11" value='<?php echo $datos_icatmi[11];?>'> <input
				type='hidden' name="datosi12"
				value='<?php echo $datos_icatmi[12];?>'> <input type='hidden'
				name="datosi13" value='<?php echo $datos_icatmi[13];?>'> <input
				type='hidden' name="datosi14"
				value='<?php echo $datos_icatmi[14];?>'> <input type='hidden'
				name="datosi15" value='<?php echo $datos_icatmi[15];?>'> <input
				type='hidden' name="datosi16"
				value='<?php echo $datos_icatmi[16];?>'> <input type='hidden'
				name="datosi17" value='<?php echo $datos_icatmi[17];?>'> <input
				type='hidden' name="datosi18"
				value='<?php echo $datos_icatmi[18];?>'> <input type='hidden'
				name="datosi19" value='<?php echo $datos_icatmi[19];?>'> <input
				type='hidden' name="datosi20"
				value='<?php echo $datos_icatmi[20];?>'> <input type='hidden'
				name="datosi21" value='<?php echo $datos_icatmi[21];?>'> <input
				type='hidden' name="datosi22"
				value='<?php echo $datos_icatmi[22];?>'> <input type='hidden'
				name="datosi23" value='<?php echo $datos_icatmi[23];?>'> <input
				type='hidden' name="datosi24"
				value='<?php echo $datos_icatmi[24];?>'> <input type='hidden'
				name="datosi25" value='<?php echo $datos_icatmi[25];?>'> <input
				type='hidden' name="datosi26"
				value='<?php echo $datos_icatmi[26];?>'> <input type='hidden'
				name="datosi27" value='<?php echo $datos_icatmi[27];?>'> <input
				type='hidden' name="datosi28"
				value='<?php echo $datos_icatmi[28];?>'> <input type='hidden'
				name="datosi29" value='<?php echo $datos_icatmi[29];?>'> 
				<input type='hidden' name="datosi30" value='<?php echo $datos_icatmi[30];?>'>
				
				<h3 align='center'>Has completado tu registro de solicitud! <img src="../images/iconos/check.ico" width="35"
				height="35" src="">ahora puedes imprimir.<br> 
				<?php if($_SESSION['user_admin']==null){?>
				<img
				src="../images/iconos/informacion.png" width="35" height="35">Recuerda cerrar la sesi&oacute;n al terminar.
				<?php }?>
				</h3>
		<br> <br>
		<div align="center">

			<input type="submit" class='art-button-send' value=' Imprimir Solicitudes'> <br> <br>
			<!--  <a  style='text-decoration: none;' href='formatos/dompdf/www/main/example.php?datosi=<?php echo $datosI;?>' target='_blank'>-->
			<!--<img src='../images/iconos/print.ico' width="50" height="50">Imprimir Solicitud Reinscripcion Icatmi</a>-->
			<br> <br>

		</div>
	</form>
<?php 
 }else {
		echo "<div align='center'>
        <h3 align='center'><img src='../images/iconos/print.ico' width='35' height='35'>Debes iniciar sesion para loguearte hazlo aqui:</h3><br><a href='../usuarios/alumnos/solicitud-reinscripcion.html'>LOGIN</a></div>";
	}
} else {
	echo "<script>window.location='../usuarios/alumnos/solicitud-reinscripcion.html'</script>";
}
?>
<br>
    <?php if($_SESSION['user_admin']==null){?>
    <div align="center">
		<a href='logout.php?opcion=3' style='text-decoration: none;'><img src='../images/iconos/shutdown.ico' width="35" height="35"><b>Cerrar Sesion</b></a>
	</div>
    <?php }?>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	
</body>
</html>