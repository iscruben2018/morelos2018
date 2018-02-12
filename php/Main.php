<?php
require_once 'Conexion.php';
require_once 'TablaAlumno.php';
require_once 'Colonia.php';
require_once 'TablaColonia.php';
require_once('Alumno.php');
require_once 'TablaCiudad.php';
require_once 'Ciudad.php';
require_once 'TablaEstado.php';
require_once 'Estado.php';
require_once 'Materia.php';
require_once 'TablaMateria.php';

require_once 'Publicacion.php';
require_once 'TablaPublicacion.php';
require_once 'Usuario.php';
require_once 'TablaUsuario.php';

class Main extends SQLite3{
	
	public function __construct(){
		$this->open('../archivos/pais.db');
	}
	
	public static function run(){
		
		$db = new Main;
		if(!$db){
			echo $db->lastErrorMsg();
		}
		else {
			$vectorEstados=array();
			$sql ="SELECT * from estado";
			$ret = $db->query($sql);
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
				$estado=new Estado();
				$estado->setCpEstado($row['cp_est']);
				$estado->setNombreEstado($row['nom_est']);
				$vectorEstados[]=$estado;
			}
			return $vectorEstados;
			$db->close();
		}
		
		 
		
		
		//REPORTE GENERAL ALUMNOS OK
	/*
		$tablaAlumno=new TablaAlumno();
		$datosAlumno=new Alumno();
		$alumnos=new Alumno();
		$datosAlumno=$tablaAlumno->reporteGeneral();
		
		echo "<table border='1'>";
		echo "<tr>";
		echo "<td>Numero:</td>";
		echo "<td>Matricula</td>";
		echo "<td>Nombre:</td>";
		echo "<td>Apellido Paterno:</td>";
		echo "<td>Apellido Materno:</td>";
		echo "<td>Seccion:</td>";
		echo "<td>Bachillerato:</td>";
		echo "</tr>";
		$i=0;
		foreach ($datosAlumno as $alumnos){
		$i++;
		
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$alumnos->getMatriculaAlumno()."</td>";
		echo "<td>".$alumnos->getNombreAlumno()."</td>";
		echo "<td>".$alumnos->getAPaternoAlumno()."</td>";
		echo "<td>".$alumnos->getAMaternoAlumno()."</td>";
		echo "<td>".$alumnos->getCodigoSeccionAlumno()."</td>";
		echo "<td>".$alumnos->getClaveBachilleratoAlumno()."</td>";
		echo "</tr>";
		}
		echo "</table>";
		*/
		
		/*
		$usuario=new Usuario();
		$tablaUsuario=new TablaUsuario();
		
		$usuario=$tablaUsuario->retornarClaveUsuario("ruben");
	   echo $usuario->getClaveUsuario();
		*/
		
		/**
		$cadena="";
		$publicaciones=new Publicacion();
		$tablaPublicacion=new TablaPublicacion();
		$datosPublicacion=new Publicacion();
		
		$datosPublicacion=$tablaPublicacion->modalNoticias("4", "6");
		echo sizeof($datosPublicacion)."<br>";
		
		foreach($datosPublicacion as $publicaciones){
		echo $publicaciones[0]."<br>";
		}
		**/
		
		/***************SELECT CIUDADES***************************************/
		/*$tablaCiudad=new TablaCiudad();
		$datosCiudad=new Ciudad();
		$ciudades=new Ciudad();
		$datosCiudad=$tablaCiudad->reporteEspecificoCiudad("cp_est", "16");
		
		foreach ($datosCiudad as $ciudades) {
		echo $ciudades->getNombreCiudad()."<br>";
		}
*/
		/*
		
			$tablaColonia=new TablaColonia();
			$datosColonia=new Colonia();
			$colonias=new Colonia();
			$datosColonia=$tablaColonia->reporteEspecificoColonia("cp_ciu","843");
		
			
			foreach ($datosColonia as $colonias) {
			echo $colonias->getNombreColonia()."<br>";
			}
			echo $cadena;
			*/
		/*REPORTE ESTADOS GENERAL OK*/
		/*
		$tablaEstado=new TablaEstado(); //Un objeto de la tablaestado que permitira acceder al listado de estados
		$datosEstado=new Estado(); //Un objeto de la clase Estado que contendra  un array de tipo estado
		$estados=new Estado(); //Un objeto de la clase Estado que servira para recuperar los valores de tipo estado
		$datosEstado=$tablaEstado->listaGeneralEstados();  //Llamada a la funcion
		
		
		echo "<table border='1'>";
		echo "<tr>";
		echo "<td>Numero:</td>";
		echo "<td>Codigo</td>";
		echo "<td>Nombre:</td>";
		echo "</tr>";
		$i=0;
		foreach ($datosEstado as $estados){//recorre el array de tipo estado
		$i++;
		
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$estados->getCpEstado()."</td>";
		echo "<td>".$estados->getNombreEstado()."</td>";
		echo "</tr>";
		}
		echo "</table>";
		*/
		
		/*FIN*/
		
		/*REPORTE MATERIAS GENERAL OK*/
		/* $tmateria=new TablaMateria();
		 $tablaMateria=new TablaMateria(); //Un objeto de la tablamateria que permitira acceder al listado de materia
		 $datosMateria=new Materia(); //Un objeto de la clase Materia que contendra  un array de tipo materia
		 $materias=new Materia(); //Un objeto de la clase Materia que servira para recuperar los valores de tipo materia
		 $datosMateria=$tablaMateria->reporteGeneral(); //Llamada a la funcion
		
		
		 echo "<table border='1'>";
		 echo "<tr>";
		 echo "<td>Numero:</td>";
		 echo "<td>Codigo</td>";
		 echo "<td>Nombre:</td>";
		 echo "</tr>";
		 $i=0;
		 foreach ($datosMateria as $materias){//recorre el array de tipo estado
		 $i++;
		
		 echo "<tr>";
		 echo "<td>".$i."</td>";
		 echo "<td>".$materias->getSiiaMateria()."</td>";
		 echo "<td>".$materias->getNombreMateria()."</td>";
		 echo "</tr>";
		 }
		 echo "</table>";
		
		 $aedad=new Alumno();
		 $fecha="1990-08-04";
		 $edad=$aedad->calcularEdad($fecha);
		 echo "<br>"."Ingresaste la fecha:".$fecha."<br>";
		 echo "Tienes ".$edad." Años :v"."<br>";
		 
		 echo $tmateria->tabla;
		 */
		
		/*FIN*/
		
       //REPORTE ESPECIFICO GENERAL ALUMNOS OK
	 /*
		$tablaAlumno=new TablaAlumno();
		$datosAlumno=new Alumno();
		$alumnos=new Alumno();
		//parametros columna,busqueda
		$datosAlumno=$tablaAlumno->reporteEspecifico("matri_alu","15");
		
		echo "<table border='1'>";
		echo "<tr>";
		echo "<td>Numero:</td>";
		echo "<td>Matricula</td>";
		echo "<td>Nombre:</td>";
		echo "<td>Apellido Paterno:</td>";
		echo "<td>Apellido Materno:</td>";
		echo "</tr>";
		$i=0;
		foreach ($datosAlumno as $alumnos){
		$i++;
		
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$alumnos->getMatriculaAlumno()."</td>";
		echo "<td>".$alumnos->getNombreAlumno()."</td>";
		echo "<td>".$alumnos->getAPaternoAlumno()."</td>";
		echo "<td>".$alumnos->getAMaternoAlumno()."</td>";
		echo "</tr>";
		}
		echo "</table>";
		
		
	  */
		
		//consulta individual 2 objetos se recibe objeto de tipo alumno OK
		/*$datosAlumno=new Alumno();
		$matricula=$alumno->setMatriculaAlumno("1234664D");
		$tablaAlumno->consultaAlumno($alumno->getMatriculaAlumno());
		
		if($tablaAlumno->consultaAlumno($alumno->getMatriculaAlumno())=="3"){
		echo "No hay resultados";
		}
		else{
		if($tablaAlumno->consultaAlumno($alumno->getMatriculaAlumno())=="0"){
		echo "Error de bd consulta con el admin";
		}
		else{
			if($tablaAlumno->consultaAlumno($alumno->getMatriculaAlumno())=="2"){
			echo "No existe la matricula";
			}
			else{
				echo "Consulta realizada:"."<br>";
				$datosAlumno=$tablaAlumno->consultaAlumno($alumno->getMatriculaAlumno());
				echo $datosAlumno->getMatriculaAlumno()."<br>";
				echo $datosAlumno->getNombreAlumno()."<br>";
				echo $datosAlumno->getAPaternoAlumno()."<br>";
				echo $datosAlumno->getAMaternoAlumno();
					
			
			}
		}
		}
		*/
		
		//CALCULAR EDAD ALUMNO OK
	
		//echo $alumno->calcularEdad("1990-08-04");
		
		//SETTERS ALUMNO OK
		//$alumno->setMatriculaAlumno("10650131");
		/*$alumno->setCurpAlumno("MABR900804HMNRRB05");
		$alumno->setNombreAlumno("Ruben");
		$alumno->setAPaternoAlumno("Martin");
		$alumno->setAMaternoAlumno("B");
		$alumno->setFNacimientoAlumno("1990-08-04");
		$alumno->setTel1Alumno("7151234567");
		$alumno->setTel2Alumno("7861261934");
		$alumno->setCorreoAlumno("r_martin_b@hotmail.com");
		$alumno->setCurpPadre("");
		$alumno->setColoniaAlumno("195679");
		$alumno->setCalleAlumno("La palma");
		$alumno->setNoAlumno("1");
		$alumno->setDeudaAlumno("0");
		*/
		
		/*PARA GUARDAR ALUMNOS OK
		if($tablaAlumno->guardarAlumno($alumno)=="1"){
		echo "EXITO" ;
		}
		else{
			if($tablaAlumno->guardarAlumno($alumno)=="2"){
			echo "La matricula ya existe";	
			}
			else{
		    echo "ERROR";
			}
		}
		*/
		/*PARA MODIFICAR ALUMNO OK
		if($tablaAlumno->modificarAlumno($alumno)=="1"){
		echo "Se modifico el registro";
		}
		else{
			if($tablaAlumno->modificarAlumno($alumno)=="2"){
			echo "El alumno con esa matricula no existe";
			}
			else{
			echo "No se actualizo";
			}
		}
		*/
		/*PARA ELIMINAR ALUMNO OK
		if($tablaAlumno->eliminarAlumno($alumno->getMatriculaAlumno())=="1"){
		echo "Se elimino el alumno con éxito";
		}
		else{
			if($tablaAlumno->eliminarAlumno($alumno->getMatriculaAlumno())=="2"){
			echo "El alumno con esa matricula no existe";
			}
			else{
			echo "Error al eliminar";	
			}
			
		}
	*/
		
		
	}
}
$main=new Main();
$estados=new Estado();
$arreglo=new Estado();

$arreglo=$main->run();

foreach ($arreglo as $estados) {
	echo $estados->getNombreEstado()."<br>";
}

$tablaAlumnoLogin=new TablaAlumno();
		
		
		if($tablaAlumnoLogin->existeUsuarioAlumno("1595498","159549H")){
			echo "1";
			
		}
		else {
			echo "2";
		}

?>