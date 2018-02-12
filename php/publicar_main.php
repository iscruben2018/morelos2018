<?php
session_start ();
$direccion_anterior=$_SERVER ['HTTP_REFERER'];
$imagen_error="<img src='../images/iconos/delete.ico' width='30' heigth='30'>";
$imagen_mas="<img src='images/iconos/8_48x48.png' width='35' heigth='35'>";
$imagen_ok="<img src='../images/iconos/check.ico' width=30 heigth=30>";
$imagen_stop="<img src='../images/iconos/stop.png' width='35' heigth='35'>";
$imagen_anterior="<img src='../images/iconos/left.ico' width=30 heigth=30>";

// Incluir bibliotecas de funciones
require_once 'fecha.php';
require_once 'Conexion.php';
require_once 'Aviso.php';
require_once 'TablaAviso.php';
require_once 'Publicacion.php';
require_once 'TablaPublicacion.php';


if ($_SESSION ['codigo_usuario'] == '' || $_SESSION ["tipo_usuario"] == '' || $_SESSION ["tipo_usuario"] != 'admin') {
	echo "<div align='center'>";
    echo "<h3 align='center'>".$imagen_stop."Error en la sesion,acceso no autorizado</h3>";
    echo "<a style='text-decoration:none;' href='../usuarios/admin/'>Volver a loguearte</a>";
    echo "</div>";
} else {
	
	?>
<!DOCTYPE html>
<HTML LANG="es">
<HEAD>
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<script type="text/javascript">
function revisarCategoria(valor){
	var div=document.getElementById("fechaEventos");
	var fecha=document.getElementById('fecha');
	if (valor==6) {

        div.style.display='table';
        if(fecha.value==''){
          fecha.focus();
          alert("Ingresa la fecha");
        }
	}
	else{
		div.style.display='none';

	}

}
</script>
<TITLE>Registro de publicaciones</TITLE>
</HEAD>
<BODY background='../images/sheet.png'>
<?PHP
	
	$avisos = new Aviso ();
	$tablaAviso = new TablaAviso ();
	
	$datosAviso = new Aviso ();
	
	$datosAviso = $tablaAviso->listaGeneralAvisos ();
	
	if (sizeof ( $datosAviso ) > 0) {
		?>

<?PHP
		// ////////////////////////////////////////////////////////////////////////
		// si el formulario ha sido enviado
		// validar formulario
		// fsi
		// si el formulario ha sido enviado y los datos son correctos
		// procesar formulario
		// si no
		// mostrar formulario
		//
		// ////////////////////////////////////////////////////////////////////////
		
		// Obtener valores introducidos en el formulario
		$insertar = $_REQUEST ['insertar'];
		$titulo = $_REQUEST ['titulo'];
		$texto = $_REQUEST ['texto'];
		$image = $_REQUEST ['imagen'];
		$file = $_REQUEST ['archivo'];
		$categoria = $_REQUEST ['categoria'];
		$imagen = $_FILES ['imagen'] ['name'];
		$error = false;
		
		if (isset ( $insertar )) {
			
			if ($_FILES ['imagen'] ['type'] == 'image/jpg' || $_FILES ['imagen'] ['type'] == 'image/jpeg' || $_FILES ['imagen'] ['type'] == 'image/png' && strlen ( $_FILES ['imagen'] ['name'] ) > 0) {
			} else {
				$errores ["imagen"] = "Imagen no compatible";
				$error = true;
			}
			$errores ["imagen"] = "";
			
			// Comprobar que se han introducido todos los datos obligatorios
			// Título
			if (trim ( $titulo ) == "") {
				$errores ["titulo"] = "<h3 style='color:#8B4513;'>".$imagen_error."Debes introducir el titulo de la noticia!</h3>";
				$error = true;
			} else
				$errores ["titulo"] = "";
				
				// Texto
			if (trim ( $texto ) == "") {
				$errores ["texto"] = "<h3 style='color:#8B4513;'>".$imagen_error."Debes introducir el texto de la noticia!</h3>";
				$error = true;
			} else
				$errores ["texto"] = "";
			if (trim ( $imagen ) == "") {
				$errores ["imagen"] = "<h3 style='color:#8B4513;'>".$imagen_error."Debes Seleccionar una imagen</h3>";
				$error = true;
			} else
				$errores ["imagen"] = "";
			
			if (is_uploaded_file ( $_FILES ['imagen'] ['tmp_name'] )) {
				$nombreDirectorioImagen = "../images/publicacion/";
				$nombreFicheroImagen = $_FILES ['imagen'] ['name'];
				$copiarFicheroImagen = true;
				
				// Si ya existe un fichero con el mismo nombre, renombrarlo
				$nombreCompletoImagen = $nombreDirectorioImagen . $nombreFicheroImagen;
				if (is_file ( $nombreCompletoImagen )) {
					$idUnicoImagen = time ();
					$nombreFicheroImagen = $idUnicoImagen . "-" . $nombreFicheroImagen;
				}
				
				if ($copiarFicheroImagen) {
					move_uploaded_file ( $_FILES ['imagen'] ['tmp_name'], $nombreDirectorioImagen . $nombreFicheroImagen );
					
					// INSERTAR EN LA BASE DE DATOS
					$publicacion = new Publicacion ();
					$tablaPublicacion = new TablaPublicacion ();
					$fechaHoy = @date ( "Y-m-d" ); // Fecha actual
					
					$publicacion->setIdPublicacion ( null );
					$publicacion->setClaveUsuarioPublicacion ( $_SESSION ["codigo_usuario"] );
					$publicacion->setFechaCreacion ( null );
					if($_POST['fecha']==''){
					$publicacion->setFechaPublicacion ($fechaHoy );
					}
					else{
					$publicacion->setFechaPublicacion ( $_POST['fecha'] );
					}
					$publicacion->setTitularPublicacion ( $titulo );
					$publicacion->setContenidoPublicacion ( $texto );
					$publicacion->setImagenPublicacion ( $nombreFicheroImagen );
					$publicacion->setArchivoPublicacion ( $_FILES ["archivo"] ["name"] );
					$publicacion->setIdAvisoPublicacion ( $_POST ['categoria'] );
					
					$tablaPublicacion->hacerPublicacion ( $publicacion );
					
					// FIN INSERTAR EN LA BASE DE DATOS
				}
			} else
				
				// Subir fichero
				$copiarFichero = false;
				
				// Copiar fichero en directorio de ficheros subidos
				// Se renombra para evitar que sobreescriba un fichero existente
				// Para garantizar la unicidad del nombre se añade una marca de tiempo
			if (is_uploaded_file ( $_FILES ['archivo'] ['tmp_name'] )) {
				$nombreDirectorio = "../archivos/publicacion/";
				$nombreFichero = $_FILES ['archivo'] ['name'];
				$copiarFichero = true;
				
				// Si ya existe un fichero con el mismo nombre, renombrarlo
				$nombreCompleto = $nombreDirectorio . $nombreFichero;
				if (is_file ( $nombreCompleto )) {
					$idUnico = time ();
					$nombreFichero = $idUnico . "-" . $nombreFichero;
				}
			} 			// El fichero introducido supera el límite de tamaño permitido
			else if ($_FILES ['archivo'] ['error'] == UPLOAD_ERR_FORM_SIZE) {
				$maxsize = $_REQUEST ['MAX_FILE_SIZE'];
				$errores ["archivo"] = "<h3 style='color:#8B4513;'>".$imagen_error."El tama&ntilde;o del fichero supera el l&iacute;mite permitido ($maxsize bytes)!</h3>";
				$error = true;
			} 			// No se ha introducido ningún fichero
			else if ($_FILES ['archivo'] ['name'] == "")
				$nombreFichero = 'no';
				// El fichero introducido no se ha podido subir
			else {
				$errores ["archivo"] = "¡No se ha podido subir el fichero!";
				$error = true;
			}
		}
		
		// Si los datos son correctos, procesar formulario
		if (isset ( $insertar ) && $error == false) {
			
			// Insertar la noticia en la Base de Datos
			// Conexion
			
			$fecha = @date ( "Y-m-d" ); // Fecha actual
			                          // Sql
			                          
			// Mover fichero de imagen a su ubicación definitiva
			if ($copiarFichero)
				move_uploaded_file ( $_FILES ['archivo'] ['tmp_name'], $nombreDirectorio . $nombreFichero );
				
				// Mostrar datos introducidos
			print ("<H1>Gestion de publicaciones</H1>\n") ;
			print ("<H2>Resultado de inserci&oacute;n de la publicaci&oacute;n</H2>\n") ;
			
			print ("<h3>La publicaci&oacute;n ha sido realizada correctamente".$imagen_ok."</h3>") ;
			
			print ("<br>[ <A HREF='publicar_main.php' style='text-decoration:none;'>Insertar otra publicaci&oacute;n".$imagen_mas."</A> ]") ;
		} else {
			?>




	<div align="center">

            <?php
			$nombre = 'REGISTRAR PUBLICACI&Oacute;N';
			require_once 'encabezado.php';
			?>

            <FORM CLASS="borde" ACTION="publicar_main.php" NAME="inserta" METHOD="POST" ENCTYPE="multipart/form-data">

			<!-- Título de la noticia -->
			<P>
				<LABEL><b>T&iacute;tulo: *</b></LABEL> <INPUT class='form-control' TYPE="TEXT" NAME="titulo" SIZE="50" MAXLENGTH="50"
			<?PHP
			if (isset ( $insertar ))
				print ("VALUE='$titulo'>\n") ;
			else
				print (">\n") ;
			if ($errores ["titulo"] != "")
				print ("<BR><SPAN CLASS='error'>" . $errores ["titulo"] . "</SPAN>") ;
			?>
			
			</P>

			<!-- Texto de la noticia-->
			<P>
				<LABEL><b>Texto: *</b></LABEL>
				<TEXTAREA COLS="45" ROWS="5" NAME="texto" class='form-control'>
<?PHP
			if (isset ( $insertar ))
				print ("$texto") ;
			print ("</TEXTAREA>") ;
			if ($errores ["texto"] != "")
				print ("<BR><SPAN CLASS='error'>" . $errores ["texto"] . "</SPAN>") ;
			?>

			
			</P>

			<!-- Categoría de la noticia-->
			<P>
			<LABEL><b>Categoria:*</b></LABEL> 
			
			<SELECT NAME="categoria" class='form-control' onchange='revisarCategoria(this.value);'>
			<?php
			foreach ( $datosAviso as $avisos ) {
				echo "<option value='" . $avisos->getIdAviso () . "'>" . $avisos->getCategoriaAviso () . "</option>";
			}
			?>
			</SELECT>
			</P>
           <p>
           	<div id='fechaEventos' style='display:none;'>
            <label>Fecha:</label><input type='date' name='fecha' id='fecha'>
           	</div>
           </p>

			<P>
				<LABEL><b>Archivo:</b></LABEL> <INPUT class='form-control'
					TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="2048400"
					<?PHP
			if (isset ( $insertar ))
				print ("VALUE='$file'>\n") ;
			else
				print (">\n") ;
			if ($errores ["archivo"] != "")
				print ("<BR><SPAN CLASS='error'>" . $errores ["archivo"] . "</SPAN>") ;
			?><INPUT TYPE="FILE" SIZE="44" NAME="archivo" class='form-control'>
				<!-- Imagen asociada a la noticia -->
			
			
			<P>
				<LABEL><b style='font-weight: bold;'>*Imagen:</b></LABEL> <INPUT TYPE="FILE" SIZE="44" NAME="imagen" class='form-control'
			<?PHP
			if (isset ( $insertar ))
				print ("VALUE='$image'>\n") ;
			else
				print (">\n") ;
			if ($errores ["imagen"] != "")
				print ("<BR><SPAN CLASS='error'>" . $errores ["imagen"] . "</SPAN>") ;
			?>
			
			</P>

			<!-- Botón de envío -->
			<P><INPUT TYPE="SUBMIT" NAME="insertar" VALUE="Insertar noticia"></P>

		</FORM>

		<P><h3>NOTA: los datos marcados con (*) deben ser rellenados obligatoriamente</h3></P>
	</div>
	<!-- CIERRA ENCABEZADO -->
	</td></tr></table>
	<!-- CIERRA ENCABEZADO -->
	<br>
	<h3 align="center"><a href='categorias_main.php'><img src='../images/iconos/8_48x48.png'>Agregar m&aacute;s categorias</a></h3>
<?PHP
		}
	} else {
		echo "<h2 align='center'>Aviso</h2><br>";
		echo "<h3 align='center'>No hay categorias disponibles,puedes agregar categorias desde";
		echo "<a class='btn btn-default' href='categorias_main.php'>aqu&iacute;</a>";
		echo "</h3>";
     
}

}

?>

</BODY>
</HTML>

