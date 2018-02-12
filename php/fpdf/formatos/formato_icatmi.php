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

class PDF extends FPDF{

// Cabecera de página
function Header(){
	// Logo   derecha+,-iz,arriba-,abajo+
	$this->Image('logohead.png',13,0,70);
    $this->Image('logohead2.png',120,5,70);
    
    $this->Ln(22);

    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(90);
    //Subtitulo1
    $this->Cell(1,9,'SOLICITUD DE INSCRIPCIÓN',0,0,'C');
 

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
    $this->SetFont('Times','',11);
    $this->SetFillColor(200,220,255);

   // Movernos a la derecha
    $this->Cell(2);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(36,10,'CLAVE:'.$datos[0],0,0,'C');
     
    //Datos4
    // Movernos a la derecha
    $this->Cell(18);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(54,10,'NO. DE UNIDAD DE CAPACITACION:'.$datos[1],0,0,'C');
    
    //Datos5
    // Movernos a la derecha
    $this->Cell(15);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(54,10,'FECHA:'.$datos[2],0,0,'C');
    $this->Ln(6);

    //Datos2
    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'NUMERO DE CONTROL:',0,0,'C');
    
    //Datos2
    // Movernos a la derecha
    $this->Cell(20);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'CURP:'.strtoupper($datos[3]),0,0,'C');

    $this->Ln(6);

    // Movernos a la derecha
    $this->Cell(10);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'NUEVO INGRESO  (  )',0,0,'C');

    // Movernos a la derecha
    $this->Cell(10);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'REINSCRIPCION  ( X )',0,0,'C');
    $this->Ln(6);
      
    // Movernos a la derecha
    $this->Cell(17);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'APELLIDO PATERNO:'.strtoupper($datos[4]),0,0,'C');
    
      // Movernos a la derecha
    $this->Cell(30);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'APELLIDO MATERNO:'.strtoupper($datos[5]),0,0,'C');

      // Movernos a la derecha
    $this->Cell(23);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'NOMBRE:'.strtoupper($datos[6]),0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->Cell(6);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'AÑOS CUMPLIDOS:'.$datos[7],0,0,'C');

    // Movernos a la derecha
    $this->Cell(23);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,strtoupper($datos[8]).','.$datos[9],0,0,'C');

    // Movernos a la derecha
    $this->Cell(28);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $cadenaGenero="";
    if($datos[10]=="fem"){$cadenaGenero="SEXO  FEM  ( X )  MASC   (   )";}
    else{$cadenaGenero="SEXO FEM (  )  MASC  ( X )";}
    $this->Cell(40,10,$cadenaGenero,0,0,'C');
    $this->Ln(6);
      
    $this->SetFont('Times','',9);
       // Movernos a la derecha
    $this->Cell(68);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(42,10,'LUGAR Y FECHA DE NACIMIENTO',0,0,'C');
    $this->Ln(6);
    
     $this->SetFont('Times','',11);
    // Movernos a la derecha
    $this->Cell(73);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,' ESCOLARIDAD: PRIMARIA  (  ) PRIMARIA  (  )  SECUNDARIA  (  )  SECUNDARIA  (  )  BACHILLERATO  ( X )',0,0,'C');
    $this->Ln(4);
    $this->Cell(202,10,'             INCOMPLETA     COMPLETA        INCOMPLETA        COMPLETA          INCOMPLETO',0,0,'C');

    $this->Ln(6);

    // Movernos a la derecha
    $this->Cell(86);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'BACHILLERATO  (  ) TÉCNICO  (  )  ESTUDIOS SUPERIORES  (  )  ESTUDIOS SUPERIORES  (  )  ',0,0,'C');
    $this->Ln(4);
     $this->Cell(202,10,'COMPLETO                                        INCOMPLETOS                              COMPLETOS',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->SetFont('Times','B',11);
    $this->Cell(70);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'DOMICILIO',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->SetFont('Times','',11);
    $this->Cell(14);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'CALLE:'.strtoupper($datos[12]).','.$datos[30],0,0,'C');
    
    $colonia=new Colonia();
    $tablaColonia=new TablaColonia();
    $datosColonia=new Colonia();
    $nomColonia="";
    $datosColonia=$tablaColonia->reporteEspecificoColonia("id_col", $datos[13]);
    
    foreach ($datosColonia as $colonia) {
    $nomColonia=$colonia->getNombreColonia();
    }
     // Movernos a la derecha
    $this->Cell(57);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'COLONIA:'.strtoupper($nomColonia),0,0,'C');
    $this->Ln(6);
    
    $ciudad=new Ciudad();
    $tablaCiudad=new TablaCiudad();
    $datosCiudad=new Ciudad();
    $nomCiudad="";
    $datosCiudad=$tablaCiudad->reporteEspecificoCiudad("cp_ciu", $datos[14]);
    
    foreach ($datosCiudad as $ciudad) {
    	$nomCiudad=$ciudad->getNombreCiudad();
    }
    // Movernos a la derecha
    $this->Cell(10);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'MUNICIPIO:'.strtoupper($nomCiudad),0,0,'C');

     // Movernos a la derecha
    $this->Cell(57);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'   CIUDAD:'.strtoupper($nomCiudad),0,0,'C');

    $this->Ln(6);

    // Movernos a la derecha
    $this->Cell(4);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(20,10,'CP:'.$datos[15],0,0,'C');

     // Movernos a la derecha
    $this->Cell(20);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'TELEFONO:'.$datos[16],0,0,'C');
 
     // Movernos a la derecha
    $this->Cell(51);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'       CORREO ELECTRONICO:'.strtoupper($datos[18]),0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->SetFont('Times','B',11);
    $this->Cell(70);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'ESTADO CIVIL',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->SetFont('Times','',11);
    $this->Cell(60);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,' SOLTERO(A) ( X )     CASADO(A)      (  )  VIUDO      (  )  DIVORCIADO      (  )  U. LIB.      (  )',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
     $this->SetFont('Times','B',11);
    $this->Cell(70);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $cadenaDiscapacidad="";
	switch ($datos[20]) {
		case 1:
		$cadenaDiscapacidad=" VISUAL (  )  AUDITIVA (  )  DE LENGUAJE (  )  MOTRIZ MUSCULO ESQUELETICO (  )  MENTAL (  )";
		break;
		case 2:
		$cadenaDiscapacidad="VISUAL ( X )  AUDITIVA (  )  DE LENGUAJE (  )  MOTRIZ MUSCULO ESQUELETICO (  )  MENTAL (  )";
		break;
		case 3:
		$cadenaDiscapacidad="VISUAL (  )  AUDITIVA ( X )  DE LENGUAJE (  )  MOTRIZ MUSCULO ESQUELETICO (  )  MENTAL (  )";
		break;
		case 4:
		$cadenaDiscapacidad="VISUAL (  )  AUDITIVA (  )  DE LENGUAJE ( X )  MOTRIZ MUSCULO ESQUELETICO (  )  MENTAL (  )";
		break;
		case 5:
		$cadenaDiscapacidad="VISUAL ( X )  AUDITIVA (  )  DE LENGUAJE (  )  MOTRIZ MUSCULO ESQUELETICO ( X )  MENTAL (  )";
		break;
		case 6:
		$cadenaDiscapacidad="VISUAL (  )  AUDITIVA (  )  DE LENGUAJE (  )  MOTRIZ MUSCULO ESQUELETICO (  )  MENTAL ( X )";
		break;
		
		default:
			;
		break;
	}
    $this->Cell(50,10,'TIPO DE DISCAPACIDAD',0,0,'C');
    $this->Ln(6);
     // Movernos a la derecha
     $this->SetFont('Times','',11);
     $this->Cell(66);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,$cadenaDiscapacidad,0,0,'C');
    $this->Ln(6);
   
    // Movernos a la derecha
    $this->SetFont('Times','B',11);
    $this->Cell(70);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'OCUPACION',0,0,'C');
    $this->Ln(6);
    // Movernos a la derecha
    $this->SetFont('Times','',11);
    $this->Cell(70);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(45,10,' ESTUDIANTE  ( X )     EMPLEADO      (  )  NEGOCIO PROPIO      (  )  OBRERO      (  )  AMA DE CASA      (  )',0,0,'C');
    $this->Ln(4);

    //Datos2
    // Movernos a la derecha
    $this->Cell(8);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'OTROS:(ESPECIFIQUE)_______________',0,0,'C');
    
    //Datos2
    // Movernos a la derecha
    $this->Cell(20);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'LUGAR DONDE TRABAJA:______________',0,0,'C');

    $this->Ln(4);

    //Datos2
    // Movernos a la derecha
    $this->Cell(10);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'PUESTO:_______________',0,0,'C');
    
    //Datos2
    // Movernos a la derecha
    $this->Cell(31);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'SUELDO MENSUAL$:______________',0,0,'C');


    $this->Ln(6);

    // Movernos a la derecha
    $this->SetFillColor(200,220,255);
    $this->Cell(1);

    //Datos1
    $this->SetFont('Times','B',11);
    $this->Cell(190,7,'DOCUMENTACION ENTREGADA',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->SetFont('Times','',11);
    $this->Cell(7);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(20,10,'C.U.R.P.:     (  )      ',0,0,'C');

    // Movernos a la derecha
    $this->Cell(50);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(57,10,'COMPROBANTE DE ESTUDIOS:      (  )     ',0,0,'C');
    $this->Ln(4);

     // Movernos a la derecha
    $this->Cell(16);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'ACTA DE NACIMIENTO:     (  )      ',0,0,'C');

    // Movernos a la derecha
    $this->Cell(22);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(77,10,'COMPROBANTE DE DOMICILIO:      (  )     ',0,0,'C');
    $this->Ln(4);

     // Movernos a la derecha
    $this->Cell(13);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'CRED. DE ELECTOR:     (  )      ',0,0,'C');

    // Movernos a la derecha
    $this->Cell(32);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(77,10,'2 FOTOGRAFIAS TAMAÑO INFANTIL:      (  )     ',0,0,'C');
    $this->Ln(6);
    //Datos1
    $this->SetFont('Times','B',11);
    $this->Cell(190,7,'MEDIO POR EL QUE SE ENTERO',0,0,'C');
    $this->Ln(5);

    // Movernos a la derecha
    $this->SetFont('Times','',11);
    $this->Cell(65);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(60,10,'PRENSA( ) RADIO ( ) TV ( ) CARTEL ( ) VOLANTE ( ) TRIPTICO ( ) PERIFONEO ( ) REUNION ( ) LONA ( )',0,0,'C');
    $this->Ln(4);
    // Movernos a la derecha
    $this->Cell(80);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'RED SOCIAL( ) RUEDA PRENSA ( ) GRUPO SOCIAL ( ) PERSONA PERSONA ( ) YA FUI CAPACITADO ( )',0,0,'C');
    $this->Ln(4);

     // Movernos a la derecha
    $this->Cell(62);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'EN ICATMI( ) OTROS (ESPECIFIQUE): ___________CONVENIO__VINCULACION________',0,0,'C');
    $this->Ln(6);

        //Datos1
    $this->SetFont('Times','B',11);
    $this->Cell(190,7,'MOTIVOS DE ELECCION DEL SISTEMA DE CAPACITACION:',0,0,'C');
    $this->Ln(5);

     // Movernos a la derecha
    $this->SetFont('Times','',11);
    $this->Cell(25);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'PARA EMPLEARSE O AUTOEMPLEARSE:  (  )  ',0,0,'C');

    // Movernos a la derecha
    $this->Cell(50);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(57,10,'PARA MEJORAR SU SITUACION EN EL TRABAJO:  (  )  ',0,0,'C');
    $this->Ln(4);

      // Movernos a la derecha
    $this->Cell(73);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(40,10,'POR DISPOSICION DE TIEMPO LIBRE ( ) OTROS (ESPECIFIQUE): ___PREPARACION INTEGRAL__',0,0,'C');
    $this->Ln(6);

        //Datos1
    $this->SetFont('Times','B',11);
    $this->Cell(190,7,'CURSO AL QUE DESEA INSCRIBIRSE:',0,0,'C');
    $this->Ln(5);


    // Movernos a la derecha
    $this->SetFont('Times','',11);
    $this->Cell(28);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'NOMBRE DEL CURSO:___INGLÉS NIVEL___',0,0,'C');

    // Movernos a la derecha
    $this->Cell(31);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(77,10,'ESPECIALIDAD:___INGLÉS___',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->Cell(9);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(42,10,'HORARIO:__________________',0,0,'C');

    // Movernos a la derecha
    $this->Cell(20);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(32,10,'DIAS:__LUNES A VIERNES___',0,0,'C');

    // Movernos a la derecha
    $this->Cell(15);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(72,10,'LUGAR:__PREPARATORIA MORELOS___',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->SetFont('Times','B',11);
    $this->Cell(70);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(35,10,'¿Ha estado inscrito en algún curso anterior en el ICATMI Zitácuaro?  Si  (  )   No  (  )   AÑO  ________',0,0,'C');
    $this->Ln(6);

    // Movernos a la derecha
    $this->Cell(9);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(50,10,'ESPECIALIDAD:_____________',0,0,'C');
    $this->Ln(6);

      // Times  11
    $this->SetFont('Times','',7);
    // Movernos a la derecha
    $this->Cell(75);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(30,10,'EL SUSCRITO SE COMPROMETE A CUMPLIR LAS NORMAS Y DISPOSICIONES DICTADAS POR LAS AUTORIDADES DEL CENTRO',0,0,'C');
    $this->Ln(6);

     // Times  11
    $this->SetFont('Times','',10);

     // Movernos a la derecha
    $this->Cell(26);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(20,10,'_______________________________________',0,0,'C');

    // Movernos a la derecha
    $this->Cell(58);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(57,10,'____________________________________________________',0,0,'C');
    $this->Ln(4);


    // Movernos a la derecha
    $this->Cell(16);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(37,10,'NOMBRE Y FIRMA DEL SOLICITANTE',0,0,'C');

      // Movernos a la derecha
    $this->Cell(60);//POSICION DE LAS LETRAS
    //Datos3 //30 TAM DEL CUADRO DE LETRAS
    $this->Cell(37,10,'NOMBRE Y FIRMA DE LA PERSONA QUE RECIBE',0,0,'C');









}

}

$datosIcatmi=$_GET['datos'];

if(isset($datosIcatmi)){
	$datosI=json_decode($datosIcatmi);
	if($datosI[28]==$_SESSION["matricula"]){
	
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	
	$pdf->formato($datosI);
	
	$pdf->Output();
	}
	//SI QUIERE IMPRIMIR INFO CON OTRA SESION DIFERENTE
	else{
		echo "<script>window.location='../../../usuarios/alumnos/solicitud-reinscripcion.html'</script>";
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
