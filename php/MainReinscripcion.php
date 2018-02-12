<?php
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





$inscripcion=new Inscripcion();
$tablaInscripcion=new TablaInscripcion();
$inscripcion->setClaveInscripcion("1");
$inscripcion->setFechaInscripcion("2016-06-18");
$inscripcion->setTurnoInscripcion("matutino");
$inscripcion->setTipoInscripcion("reinscripcion");
$inscripcion->setClaveCicloInscripcion("1");
$inscripcion->setClaveSemestre("2");
$inscripcion->setMatriculaAlumnoInscripcion("1366263X");
$inscripcion->setCodigoSeccionInscripcion("2");
$inscripcion->setClaveBachilleratoInscripcion("1");
$inscripcion->setEscuelaProcedencia("");
$inscripcion->setPromedioInscripcion("9");
$inscripcion->setEscuelaFicha("");
$inscripcion->getTipoInscripcion();

if($tablaInscripcion->guardarInscripcion($inscripcion)=="1"){
echo "Se guardo la reinscripcion";
      $alumnoextra=new AlumnoExtra();
      $tablaAlumnoExtra=new TablaAlumnoExtra();
      $alumnoextra->setClaveAlumnoExtra(null);
      $alumnoextra->setPSaludAlumno("no");
      $alumnoextra->setBecaAlumno("no");
      $alumnoextra->setServicioSaludAlumno("si");
      $alumnoextra->setIdiomaAlumno("si");
      $alumnoextra->setMatriculaAlumnoExtra($inscripcion->getMatriculaAlumnoInscripcion());
      if( $tablaAlumnoExtra->guardarAlumnoExtra($alumnoextra)=="1"){
      	echo "Se guardo alumno extra";
      	$padre=new Padre();
      	$tablaPadre=new TablaPadre();
      	$padre->setClavePadre(null);
      	$padre->setNombrePadre("juan");
      	$padre->setAPaternoPadre("perez");
      	$padre->setAMaternoPadre("lopez");
      	$padre->setTel1Padre("715-123-45-67");
      	$padre->setTel2Padre("715-890-98-76");
      	$padre->setECivilPadre("casado");
      	$padre->setCorreoPadre("juanperezl01@hotmail.com");
      	$padre->setColoniaPadre("12");
      	if($tablaPadre->guardarPadre($padre)=="1"){
      	echo "Se guardo tabla padre";
      	$vectorPadre=new Padre();
      	$datosPadre=new Padre();
      	$consultaPadre=new TablaPadre();
      	
      	$datosPadre=$consultaPadre->reporteEspecificoPadre("tel1_pad", $padre->getTel1Padre());
      	if(sizeof($datosPadre)>0){
      	echo "Si hay datos del padre";

      	   foreach ($datosPadre as $vectorPadre) {
      	   $padreColumna=$vectorPadre->getClavePadre();
      	   
      	   }
      	   $padrehijo=new PadreHijo();
      	   $tablaPadreHijo=new TablaPadreHijo();
      	   $padrehijo->setClavePadreHijo(null);
      	   $padrehijo->setClavePadre($padreColumna);
      	   $padrehijo->setMatriculaHijo($inscripcion->getMatriculaAlumnoInscripcion());

      	   if($tablaPadreHijo->guardarPadreHijo($padrehijo)=="1"){
      	   	echo "Se guardo padre hijo";
      	   	$alumnostatus=new Alumno();
      	   	$tablaAlumnoStatus=new TablaAlumno();
      	   	
      	   	if($tablaAlumnoStatus->cambiarStatusAlumno($inscripcion->getMatriculaAlumnoInscripcion(),"proceso-re")=="1"){
      	   	echo "Registro completado,ya estas en tramite de reinscripcion!,pasa a control escolar";
      	   	}
      	   	else{
      	   	echo "Error al actualizar el estado del alumno";
      	   	}
      	   	
      	   	 
      	   }
      	   else{
      	   	if($tablaPadreHijo->guardarPadreHijo($padrehijo)=="2"){
      	   		echo "Ya existe tabla padre hijo";
      	   	}
      	   	else{
      	   		echo "Error tablapadrehijo";
      	   	}
      	   }
      	}
      	else {
      	echo "No hay datos padre";
      		
      	}
      	}
      	else{

      		if($tablaPadre->guardarPadre($padre)=="2"){
      			echo "Ya existe el padre con ese tel o correo";
      			/*SI YA EXISTE EL PADRE CON ESE MISMO TELEFONO,EL CASO SON HERMANOS*/
      			/*O TIENEN EL MISMO TUTOR Y SE PROCEDE A TOMAR EL TEL PARA VINCULARLOS*/
      			$vectorPadre=new Padre();
      			$datosPadre=new Padre();
      			$consultaPadre=new TablaPadre();
      			 
      			$datosPadre=$consultaPadre->reporteEspecificoPadre("tel1_pad", $padre->getTel1Padre());
      			if(sizeof($datosPadre)>0){
      				echo "Si hay datos del padre vinculacion";
      			
      				foreach ($datosPadre as $vectorPadre) {
      					$padreColumna=$vectorPadre->getClavePadre();
      			
      				}
      				$padrehijo=new PadreHijo();
      				$tablaPadreHijo=new TablaPadreHijo();
      				$padrehijo->setClavePadreHijo(null);
      				$padrehijo->setClavePadre($padreColumna);
      				$padrehijo->setMatriculaHijo($inscripcion->getMatriculaAlumnoInscripcion());
      			
      				if($tablaPadreHijo->guardarPadreHijo($padrehijo)=="1"){
      					$alumnostatus=new Alumno();
      					$tablaAlumnoStatus=new TablaAlumno();
      					 
      					if($tablaAlumnoStatus->cambiarStatusAlumno($inscripcion->getMatriculaAlumnoInscripcion(),"proceso-re")=="1"){
      						echo "Registro completado vinculacion,ya estas en tramite de reinscripcion!,pasa a control escolar";
      					}
      					else{
      						echo "Error al actualizar el estado del alumno";
      					}
      					 
      				}
      				else{
      				  if($tablaPadreHijo->guardarPadreHijo($padrehijo=="2")){
      				  echo "Ya existen los datos padre hijo vinculacion";
      				  }
      				  else{
      				  	echo "Error de bd vinculacion";
      				  }
      				}
      			/************FIN VALIDACION******/
      			}
      			
      		}
      		else{
      			echo "Error al guardar el padre";
      		}
      	}
      	
      }
      else{
      	if($tablaAlumnoExtra->guardarAlumnoExtra($alumnoextra)=="2"){
      		echo "Ya existe un alumno con esa informacion extra";
      	}
      	else{
      		echo "Error al registrar alumno extra";
      	}
      	
      }
}
else{
	if($tablaInscripcion->guardarInscripcion($inscripcion)=="2"){
		echo "Ya existe el registro de reinscripcion con esa matricula";
		
	}
	else{
		echo "Error en la inscripcion";
	}
}
 
 

?>