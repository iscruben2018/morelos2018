<?php
@session_start();
?>
<?php

if(isset($_SESSION['matricula'])){

	if($_SESSION["nombre"]!=''&&$_SESSION["logueado"]="si"){
		
    require('../fpdf.php');
    require_once '../../Ciudad.php';
    require_once '../../Colonia.php';
    require_once '../../TablaCiudad.php';
    require_once '../../TablaColonia.php';
    require_once '../../Ciclo.php';
    require_once '../../TablaCiclo.php';
    require_once '../../Seccion.php';
    require_once '../../TablaSeccion.php';
    require_once '../../Bachillerato.php';
    require_once '../../TablaBachillerato.php';
    require_once '../../Estado.php';
    require_once '../../TablaEstado.php';
    
    



class PDF extends FPDF{

// Cabecera de página
function Header(){
	// Logo
	$this->Image('logo_morelos.png',10,8,23);

	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(90);
	// Título
	$this->Cell(30,10,'Escuela Preparatoria José Ma.Morelos de Zitácuaro,S.C',0,0,'C'); 
	//el primer cero es de borde y 30 ,10 del tamaño del cuadro
  $this->Ln(6);

  // Times 12
	$this->SetFont('Times','B',12);
	// Movernos a la derecha
	$this->Cell(60);
  //Leyenda1
  $this->Cell(10,10,'Incorporada a la U.M.S.N.H',0,0,'C');
  $this->Ln(5);
      
  // Times 12
	$this->SetFont('Times','B',12);
	// Movernos a la derecha
	$this->Cell(60);
  //Leyenda2
  $this->Cell(1,10,'Clave 109-218-1"74"',0,0,'C');
  $this->Ln(2);
      
  // Arial bold 15
	$this->SetFont('Arial','B',14);
	// Movernos a la derecha
	$this->Cell(150);
  //Subtitulo1
  $this->Cell(1,9,'SOLICITUD DE REINSCRIPCIÓN',0,0,'C');
  $this->Ln(5);
      
  // Arial bold 15
	$this->SetFont('Arial','B',13);
	// Movernos a la derecha
	$this->Cell(150);
	
	$ciclo=new Ciclo();
	$tablaCiclo=new TablaCiclo();
	$datosCiclo=new Ciclo();
	
	$datosCiclo=$tablaCiclo->CicloActual();
	$ciclo=$datosCiclo;
	$cadenaCiclo=$ciclo->getNoCiclo();
	
    //Subtitulo1
    $this->Cell(1,10,'CICLO ESCOLAR:'.$cadenaCiclo,0,0,'C');
    $this->Ln(6);
    
    $meses=array(
    		"Enero","Febrero","Marzo",
    		"Abril","Mayo","Junio",
    		"Julio","Agosto","Septiembre",
    		"Octubre","Noviembre","Diciembre");
    
   
    $dia=@date("d");
    $mes=@date("m");
    $titulomes=strtoupper($meses[$mes-1]);
    $year=@date("Y");
    
    $cadenaFecha=$dia." DE ".$titulomes." DEL ".$year;
    
  // Arial bold 11
	$this->SetFont('Arial','B',11);
	// Movernos a la derecha
	$this->Cell(48);
  //Subtitulo2
  $this->Cell(1,5,'H.ZITÁCUARO,MICH. A _'.$cadenaFecha.'_.',0,0,'C');
	// Salto de línea
	$this->Ln(6);
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
}
function formato($datos){

    // Times  11
    $this->SetFont('Times','B',11);
    $this->SetFillColor(200,220,255);
    // Movernos a la derecha
    $this->Cell(1);

    //Datos1
    $this->Cell(190,7,'DATOS ACADÉMICOS',0,1,'C',true);
    $this->Ln(2);

   // Movernos a la derecha
    $this->Cell(9);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $nombreBachillerato="";
    $bachillerato=new Bachillerato();
    $tablaBachillerato=new TablaBachillerato();
    $datosBachillerato=new Bachillerato();
    $datosBachillerato=$tablaBachillerato->consultaBachillerato($datos[41]);
    $bachillerato=$datosBachillerato;
    $nombreBachillerato=$bachillerato->getNombreBachillerato();
    
    $cadenaSeccion="";
    $cadenaSeccion=$datos[4].",".$nombreBachillerato;
   // $this->Cell(60,10,'SECCIÓN Y/O BACH:'.$cadenaSeccion,0,0,'C');
    $this->Cell(60,10,'SECCIÓN Y/O BACH: '.$datos[41],0,0,'C');
     
    //Datos4
    // Movernos a la derecha
    $this->Cell(11);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $cadenaSemestre="";
    switch ($datos[5]) {
    	case 1:
    	$cadenaSemestre="PRIMERO";
    	break;
    	case 2:
    	$cadenaSemestre="SEGUNDO";
    	break;
    	case 3:
    	$cadenaSemestre="TERCERO";
    	break;
    	case 4:
    	$cadenaSemestre="CUARTO";
    	break;
    	case 5:
    	$cadenaSemestre="QUINTO";
    	break;
    	case 6:
    	$cadenaSemestre="SEXTO";
    	break;
    	
    	default:
    	break;
    }
    
    $this->Cell(54,10,'SEMESTRE:'.$cadenaSemestre,0,0,'C');
    
    //Datos5
    // Movernos a la derecha
    $this->Cell(6);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(54,10,'MATRICULA:'.$datos[6],0,0,'C');
    $this->Ln(12);

    // Movernos a la derecha
    $this->SetFillColor(200,220,255);
    $this->Cell(1);
    //Datos1
    $this->Cell(190,7,'DATOS DEL ALUMNO',0,1,'C',true);
    $this->Ln(1);

    //Datos2
    // Movernos a la derecha
    $this->Cell(12);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'NOMBRE:'.strtoupper($datos[7]." ".$datos[8]." ".$datos[9].""),0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(10);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'FECHA DE NACIMIENTO:'.$datos[10],0,0,'C');

    // Movernos a la derecha
    $this->Cell(19);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'LUGAR DE NACIMIENTO:'.strtoupper($datos[11]),0,0,'C');
    $this->Ln(7);
      
    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'DOMICILIO:'.strtoupper($datos[12]).','.$datos[13],0,0,'C');
    $this->Ln(7);
    
    $nombreColonia="";
    $colonias=new Colonia();
    $tablaColonias=new TablaColonia();
    $datosColonias=new Colonia();
    
    $datosColonias=$tablaColonias->reporteEspecificoColonia("id_col", $datos[14]);
    
    foreach ($datosColonias as $colonias) {
    	$nombreColonia=$colonias->getNombreColonia();
    }
    // Movernos a la derecha
    $this->Cell(7);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(48,10,'COLONIA:'.strtoupper($nombreColonia),0,0,'C');

    // Movernos a la derecha
    $this->Cell(20);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(77,10,'CODIGO POSTAL:'.$datos[15],0,0,'C');
    $this->Ln(7);
      
    $nombreCiudad="";
    $ciudades=new Ciudad();
    $tablaCiudades=new TablaCiudad();
    $datosCiudades=new Ciudad();
  
    $datosCiudades=$tablaCiudades->reporteEspecificoCiudad("cp_ciu", $datos[16]);
    
    foreach ($datosCiudades as $ciudades) {
    	$nombreCiudad=$ciudades->getNombreCiudad();
    }
    
       // Movernos a la derecha
    $this->Cell(5);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(42,10,'CIUDAD:'.strtoupper($nombreCiudad),0,0,'C');
    
    $nombreEstado="";
    $estados=new Estado();
    $tablaEstados=new TablaEstado();
    $datosEstados=new Estado();
    
    $datosEstados=$tablaEstados->consultaEstado($datos[17]);
    $estados=$datosEstados;
    $nombreEstado=$estados->getNombreEstado();
    // Movernos a la derecha
    $this->Cell(22);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(82,10,'ESTADO:'.strtoupper($nombreEstado),0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,'TELEFONOS:'.$datos[18],0,0,'C');

    // Movernos a la derecha
    $this->Cell(26);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(82,10,'EMAIL:'.strtoupper($datos[20]),0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(58);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $cadenaPSalud="";
    if($datos[21]=="si"){
    $cadenaPSalud="PROBLEMAS DE SALUD(ESPECIFIQUE) SI ( X ) NO ( ) ";
    }
    else{
    $cadenaPSalud="PROBLEMAS DE SALUD(ESPECIFIQUE) SI ( ) NO ( X ) ";
    }
    $this->Cell(50,10,$cadenaPSalud.'_____________'.strtoupper($datos[32]).'_____',0,0,'C');
    $this->Ln(8);

    // Movernos a la derecha
    $this->Cell(70);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $cadenaBeca="";
    
    if($datos[22]=="si"){
    $cadenaBeca="¿CUENTA CON ALGUNA BECA DE ALGUN PROGRAMA?(ESPECIFIQUE) SI ( X ) NO ( )";
    }
    else{
    $cadenaBeca="¿CUENTA CON ALGUNA BECA DE ALGUN PROGRAMA?(ESPECIFIQUE) SI ( ) NO ( X )";
    }
    $this->Cell(50,10,$cadenaBeca.'___'.strtoupper($datos[23]).'_',0,0,'C');
    $this->Ln(8);

    // Movernos a la derecha
    $this->Cell(67);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $cadenasSalud="";
    if($datos[24]=="si"){
    $cadenasSalud="¿CUENTA CON ALGUN SERVICIO DE SALUD? (ESPECIFIQUE) SI ( X ) NO ( )";	
    }
    else{
    $cadenasSalud="¿CUENTA CON ALGUN SERVICIO DE SALUD? (ESPECIFIQUE) SI ( ) NO ( X )";
    }
    $this->Cell(50,10,$cadenasSalud.'______'.strtoupper($datos[25]).'______',0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(69);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $cadenaLengua="";
    if($datos[26]=="si"){
    $cadenaLengua="¿HABLA O DOMINA ALGUNA LENGUA INDIGENA? (ESPECIFIQUE) SI ( X ) NO ( )";	
    }
    else{
    $cadenaLengua="¿HABLA O DOMINA ALGUNA LENGUA INDIGENA? (ESPECIFIQUE) SI ( ) NO ( X )";	
    }
    $this->Cell(50,10,$cadenaLengua.'____'.strtoupper($datos[27]).'______',0,0,'C');
    $this->Ln(13);

    // Movernos a la derecha
    $this->SetFillColor(200,220,255);
    $this->Cell(1);

    //Datos1
    $this->Cell(190,7,'DATOS DEL PADRE O TUTOR',0,1,'C',true);
    $this->Ln(1);

    // Movernos a la derecha
    $this->Cell(12);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'NOMBRE:'.strtoupper($datos[28]).' '.strtoupper($datos[29]).' '.strtoupper($datos[30]),0,0,'C');

    // Movernos a la derecha
    $this->Cell(20);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    
    $cadenaECivilPadre="";
    
    switch ($datos[33]) {
    	case 1:
    	$cadenaECivilPadre="Casado";
    	break;
    	case 2:
    	$cadenaECivilPadre="Divorciado";
    	break;
    	case 3:
    	$cadenaECivilPadre="Viudo";
    	break;
    	case 4:
    	$cadenaECivilPadre="Union Libre";
    	break;
    	default:
    		
    	break;
    }
    $this->Cell(77,10,'ESTADO CIVIL:'.strtoupper($cadenaECivilPadre),0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'DOMICILIO:'.strtoupper($datos[34]).','.$datos[35],0,0,'C');
    $this->Ln(7);
    
    $nombreColoniaPadre="";
    $coloniaPadre=new Colonia();
    $tablaColoniaPadre=new TablaColonia();
    $datosColoniaPadre=new Colonia();
    
    $datosColoniaPadre=$tablaColoniaPadre->reporteEspecificoColonia("id_col", $datos[37]);
    
    foreach ($datosColoniaPadre as $coloniaPadre) {
    	$nombreColoniaPadre=$coloniaPadre->getNombreColonia();
    } 
    
    // Movernos a la derecha
    $this->Cell(4);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'COLONIA:_'.strtoupper($nombreColoniaPadre).'___',0,0,'C');

    // Movernos a la derecha
    $this->Cell(31);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(77,10,'CODIGO POSTAL:'.$datos[36],0,0,'C');
    $this->Ln(7);
    
    $nombreCiudadPadre="";
    $ciudadPadre=new Ciudad();
    $tablaCiudadPadre=new TablaCiudad();
    $datosCiudadPadre=new Ciudad();
    
    $datosCiudadPadre=$tablaCiudadPadre->reporteEspecificoCiudad("cp_ciu", $datos[38]);
    
    foreach ($datosCiudadPadre as $ciudadPadre) {
    	$nombreCiudadPadre=$ciudadPadre->getNombreCiudad();
    }
    
    // Movernos a la derecha
    $this->Cell(5);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'CIUDAD:'.ucfirst($nombreCiudadPadre).'_',0,0,'C');
    
    
    $nombreEstadoPadre="";
    $estadoPadre=new Estado();
    $tablaEstadoPadre=new TablaEstado();
    $datosEstadoPadre=new Estado();
    
    $datosEstadoPadre=$tablaEstadoPadre->consultaEstado($datos[39]);
    $estadoPadre=$datosEstadoPadre;
    $nombreEstadoPadre=$estadoPadre->getNombreEstado();
    
    // Movernos a la derecha
    $this->Cell(32);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(82,10,'ESTADO:'.strtoupper($nombreEstadoPadre).'',0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,'TELEFONOS:'.$datos[40],0,0,'C');

    // Movernos a la derecha
    $this->Cell(36);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(82,10,'EMAIL:'.strtoupper($datos[43]),0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(4);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'OCUPACION:'.strtoupper($datos[44]),0,0,'C');

    // Movernos a la derecha
    $this->Cell(34);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(77,10,'LUGAR DE TRABAJO:'.strtoupper($datos[45]),0,0,'C');
    $this->Ln(12);

    // Movernos a la derecha
    $this->SetFillColor(200,220,255); 
    $this->Cell(1);
    //Datos1
    $this->Cell(190,7,'RESPONSIVA',0,1,'C',true);
    $this->Ln(2);

      // Movernos a la derecha
    $this->Cell(5);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(180,10,'Los suscritos se comprometen a respetar y estar conforme con los establecido en el REGLAMENTO ESCOLAR',0,0,'C');
    $this->Ln(5);
    // Movernos a la derecha
    $this->Cell(1);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(160,10,'y a colaborar con las autoridades escolares para lograr el máximo aprovechamiento académico',0,0,'C');
    $this->Ln(7);

    // Movernos a la derecha
    $this->Cell(10);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,'FIRMA DEL ALUMNO',0,0,'C');

    // Movernos a la derecha
    $this->Cell(35);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(82,10,'FIRMA DEL PADRE O TUTOR',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,'_____________________________',0,0,'C');

    // Movernos a la derecha
    $this->Cell(36);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(82,10,'_____________________________',0,0,'C');
    $this->Ln(10);


    // Movernos a la derecha
    $this->SetFillColor(200,220,255);
    $this->Cell(1);
    //Datos1
    $this->Cell(190,7,'PARA USO EXCLUSIVO DEL DEPARTAMENTO DE CONTROL ESCOLAR',0,1,'C',true);
    $this->Ln(3);

    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,5,'ALUMNO 
 REGULAR (         )',1,0,'C');

      // Movernos a la derecha
    $this->Cell(1);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(70,5,'      ALUMNO 
 IRREGULAR 
 (         )',1,0,'C');
    
         // Movernos a la derecha
    $this->Cell(3);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(42,10,'RECIBIÓ Y REVISÓ',0,0,'C');
   
    $this->Ln(5);

    // Movernos a la derecha
    $this->SetFillColor(200,220,255);
    $this->Cell(69);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(70,5,'CARGA DE MATERIAS',0,1,'C',true);

    // Movernos a la derecha
    $this->Cell(5);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(328,5,'_________________________',0,0,'C'); //CELDA NO
     
    $this->Ln(3);
    // Movernos a la derecha
    $this->Cell(69);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(70,5,'____________________________________',0,1,'C');
    $this->Ln(3);

    // Movernos a la derecha
    $this->Cell(69);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(70,5,'____________________________________',0,1,'C');
    $this->Ln(3);






}

}

	$datosMorelos=$_GET['datosm'];

if(isset($datosMorelos)){
	$datosM=json_decode($datosMorelos);
	if($datosM[6]==$_SESSION["matricula"]){
	
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	
	$pdf->formato($datosM);
	
	$pdf->Output();
	}
	//SI QUIERE IMPRIMIR INFO CON OTRA SESION DIFERENTE
	else{
		
		echo "<script>alert('Operacion no permitida,inicia sesion');window.location='../../../usuarios/alumnos/solicitud-reinscripcion.html'</script>";
	}
}
// SI NO HAY DATOS 
else {
	echo "<script>window.history.back();</script>";
}

}
//SI NO HAY SESION
else{
	echo "<div align='center'>
		<h3 align='center'>Debes iniciar sesion para loguearte hazlo aqui:</h3><br><a href='../../../usuarios/alumnos/solicitud-reinscripcion.html'>LOGIN</a></div>";
}

}
//SI MATRICULA ES ''
else{
	echo "<script>window.location='../../../usuarios/alumnos/solicitud-reinscripcion.html'</script>";
}

?>
