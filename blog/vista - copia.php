<?php 
require_once '../php/Conexion.php';
$conexion = new Conexion ();
$conexion->crearConexion ();
$msj = "";
$num = 3; // numero de filas por pagina
$comienzo = $_REQUEST ['comienzo'];
$idpublicacion = $_REQUEST ['idpublicacion'];
$meses = array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre" );

if (isset ( $_GET ['search_advan'] ) && isset ( $_GET ['search_col'] )) {
	$busqueda_avanzada = $_GET ['search_advan'];
	$busqueda_columna = $_GET ['search_col'];
	
	$sentencia = "WHERE publicacion." . $busqueda_columna . "='" . $busqueda_avanzada . "'";
	$sentencia_pagina = "&search_col=" . $busqueda_columna . "&search_advan=" . $busqueda_avanzada;
} else {
	$busqueda_avanzada = "";
	$busqueda_columna = "";
	$sentencia = "";
	$sentencia_pagina = "";
}

if (isset ( $idpublicacion )) {
	
	$qry = "SELECT id_publicacion,usuario.cve_usu,user,tipo_usu,cat_aviso,fecha_crea,titular,cont_publi,imagen_publi,archivo_publi FROM publicacion join usuario on publicacion.cve_usu=usuario.cve_usu join aviso on publicacion.id_aviso=aviso.id_aviso  where id_publicacion='" . mysql_real_escape_string($idpublicacion) . "' order by fecha_crea desc limit 1";
	
	mysql_query ( "SET NAMES 'utf8'" );
	$consulta = mysql_query ( $qry ) or die ( "<h4 align='center'>Error" . mysql_error () . "<a href='noticias.php'>Regresar</a></h4>" );
	$nfilas = mysql_num_rows ( $consulta );
	
	if ($nfilas > 0) {
		
		echo "<br><article class='art-post art-article'>";
		for($i = 0; $i < $nfilas; $i ++) {
			$ren = mysql_fetch_array ( $consulta );
			
			$autor = $ren ['tipo_usu'];
			$clave = $ren ['cve_usu'];
			
			if ($autor == "docente") {
				
				$sqlAutor = "SELECT *FROM docente WHERE cve_doc='" . $clave . "'";
				$qryAutor = @mysql_query ( $sqlAutor ) or die ( mysql_error () );
				if ($qryAutor) {
					$renAutor = mysql_fetch_array ( $qryAutor );
					$nombre = $renAutor ['nom_doc'];
					$ap = $renAutor ['ap_doc'];
					$am = $renAutor ['am_doc'];
				}
			} else {
				$nombre = "";
				$ap = "";
				$am = "";
			}
			
			/**
			 * ********ENCABEZADO******************** *
			 */
			echo "<div class='art-postmetadataheader'>";
			echo "<h2 class='art-postheader'><a href='#'>" . $ren ['titular'] . "</a></h2>";
			echo "<div class='art-postheadericons art-metadata-icons'>";
			/**
			 * *********************************************************************
			 */
			/**
			 * ************FORMATOS DE FECHA****************************************
			 */
			$mes = substr ( @date ( "d-m-Y", strtotime ( $ren ['fecha_crea'] ) ), 3, 2 );
			
			$dia = @date ( "d", strtotime ( $ren ['fecha_crea'] ) );
			$titulomes = $meses [$mes - 1];
			$year = @date ( "Y", strtotime ( $ren ['fecha_crea'] ) );
			
			$cadenaFecha = $dia . " de " . $titulomes . " del " . $year;
			
			/**
			 * *********************************************************************
			 */
			echo "<img src='../images/iconos/calendar-7.png' width=45 height=45> Fecha de publicaci&oacute;n:" . $cadenaFecha . " Hora:" . @date ( "H:i", strtotime ( $ren ['fecha_crea'] ) ) . "";
			echo "|  <img src='../images/postauthoricon-large.png'><a href='#' title=''>Publicado por: " . $ren ['tipo_usu'] . " ( " . $nombre . " " . $ap . " " . $am . " )</a>";
			
			// SI SI HAY ARCHIVOS
			if ($ren ['archivo_publi'] != null) {
				echo "|<br><a href='../archivos/publicacion/" . $ren ['archivo_publi'] . "'><b>Descargar Aviso</b> <span class='art-postpdficon'></span></a>";
				
				$cambiar_extension = str_replace ( ".", "-", trim ( $ren ['archivo_publi'] ) );
				$nueva_extension = split ( "-", $cambiar_extension );
				// SI SI HAY PDF PARA VER
				if (trim ( $nueva_extension [1] ) == "pdf") {
					echo "|<a data-toggle='modal' href='#' data-target='#myModal'>
    	                 <b>Ver Documento</b> <span class='art-postpdficon'></span></a>";
					$documento_pdf = $ren ['archivo_publi'];
					
				}
			}
			
			echo "</div>";
			echo "</div>";
			/**
			 * ********ENCABEZADO******************** *
			 */
			
			/**
			 * ********CONTENIDO******************** *
			 */
			echo "<div class='art-postcontent art-postcontent-2 clearfix' style='background:url(../images/page.png);'>";
			echo "  <div class='art-content-layout'>";
			echo "  <div class='art-content-layout-row responsive-layout-row-2'>";
			echo "  <div class='art-layout-cell layout-item-0' style='width: 100%'>";
			
			echo "<div class='image-caption-wrapper' style='float: left;'>";
			echo "<img alt='".$ren['titular']."' class='art-lightbox' style=' float: left;'  src='../images/publicacion/" . $ren ['imagen_publi'] . "' width='300' height='150'>";
			echo "</div>";
			echo "<p><p>";
			echo "<p style='text-align: justify;'><br><br><br><br><br><br><br><br></p>";
			echo "<p style='text-align: justify;'>" . $ren ['cont_publi'] . "";
			echo "</p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "<br><a href='".$_SERVER['HTTP_REFERER']."'>Regresar</a>";
			echo "</div>";
			/**
			 * ********CONTENIDO******************** *
			 */
			
			/**
			 * ********PIE******************** *
			 */
			echo "<div class='art-postfootericons art-metadata-icons'>";
			echo " <span class='art-postcategoryicon'><h3 class='label label-primary' style='font-weight:14px;text-transform:uppercase;'> Categoria: " . $ren ['cat_aviso'] . "</h3></span>";
			echo "|<span class='art-postcommentsicon'><a href='#comments' title='Comments'>No hay comentarios »</a></span>";
			echo "</div>";
		/**
		 * ********PIE******************** *
		 */
		}
		echo "</article>";
	} 

	else
		print ("<h3 align=center>No hay noticias disponibles</h3><h4 align='center'><a href='noticias.php'>Regresar</a></h4>") ;
} 

else {
	
	/* PAGINACION */
	if (! isset ( $comienzo ))
		$comienzo = 0;
	
	$tabla = "";
	$qry = "SELECT * FROM publicacion";
	$consul = @mysql_query ( $qry );
	
	$nfilas = @mysql_num_rows ( $consul );
	
	if ($nfilas > 0) {
		
		// Mostrar numeros inicial y final de las filas a mostrar
		$msj .= "<P align=center>";
		$msj .= "<b>Total de Publicaciones:";
		$msj .= "" . ($comienzo + 1) . " a ";
		if (($comienzo + $num) < $nfilas)
			$msj .= $comienzo + $num;
		
		else
			$msj .= $nfilas;
		$msj .= " de un total de $nfilas.</b>&nbsp;&nbsp;<a class='btn btn-default' href='noticias.php'>Ver todo</a>&nbsp;&nbsp;\n";
		echo $msj;
		// Mostrar botones anterior y siguiente
		$estapagina = $_SERVER ['PHP_SELF'];
		if ($nfilas > $num) {
			if ($comienzo > $nfilas)
				$comienzo = 1;
			
			if ($comienzo > 0)
				
				print ("<br><br>[ <A class='btn btn-default' HREF='$estapagina?comienzo=" . ($comienzo - $num) . "" . $sentencia_pagina . "'>Anterior</A> | ") ;
			
			else
				print ("<br><br>[ Anterior | ") ;
			if ($nfilas > ($comienzo + $num))
				print ("<A class='btn btn-primary' HREF='$estapagina?comienzo=" . ($comienzo + $num) . "" . $sentencia_pagina . "'>Siguiente</A> ]\n") ;
			
			else
				print ("Siguiente ]\n") ;
		}
		print ("</P>\n") ;
	}
	
	/* PAGINACION */
	
	$qry = "SELECT id_publicacion,user,tipo_usu,cat_aviso,fecha_crea,titular,cont_publi,imagen_publi,archivo_publi FROM publicacion join usuario on publicacion.cve_usu=usuario.cve_usu join aviso on publicacion.id_aviso=aviso.id_aviso " . $sentencia . " order by fecha_crea desc limit $comienzo, $num";
	mysql_query ( "SET NAMES 'utf8'" );
	$consulta = mysql_query ( $qry ) or die ( "<h3 align='center'><h4 style='color:blue' align=center><img src='../images/iconos/broken-link.png' width=55 height=55>Vaya ocurrio un problema!</h4> <h4 align=center>Error:" . mysql_errno () . "</h4></h3><h4 align='center'><a href='noticias.php' style='text-decoration:none;'><img src='images/iconos/left.ico' width=35 height=35>Volver a buscar</a></h4>" );
	$nfilas = mysql_num_rows ( $consulta );
	
	if ($nfilas > 0) {
		
		for($i = 0; $i < $nfilas; $i ++) {
			$ren = mysql_fetch_array ( $consulta );
			
			/**
			 * *********************************************************************
			 */
			/**
			 * ************FORMATOS DE FECHA****************************************
			 */
			$mes_dos = substr ( @date ( "d-m-Y", strtotime ( $ren ['fecha_crea'] ) ), 3, 2 );
			
			$dia2 = @date ( "d", strtotime ( $ren ['fecha_crea'] ) );
			$titulo_mes2 = $meses [$mes_dos - 1];
			$year2 = @date ( "Y", strtotime ( $ren ['fecha_crea'] ) );
			
			$cadenaFecha2 = $dia2 . " de " . $titulo_mes2 . " del " . $year2;
			
			/**
			 * *********************************************************************
			 */
			echo "<br><article class='art-post art-article'>";
			/**
			 * ********ENCABEZADO******************** *
			 */
			echo "<div class='art-postmetadataheader'>";
			echo "<h2 class='art-postheader'><a href='noticias.php?idpublicacion=" . $ren ['id_publicacion'] . "'>" . $ren ['titular'] . "</a></h2>";
			echo "<div class='art-postheadericons art-metadata-icons'>";
			echo "<img src='../images/iconos/calendar-7.png' width=45 height=45>  Fecha:" . $cadenaFecha2 . " Hora:" . @date ( "H:i", strtotime ( $ren ['fecha_crea'] ) ) . "";
			echo "|<img src='../images/postauthoricon-large.png'>  <a href='#' title='Publicado por'>Publicado por: " . $ren ['tipo_usu'] . "</a>";
			
			if ($ren ['archivo_publi'] != null) {
				echo "| <span class='art-postpdficon'></span>";
			}
			
			echo "</div>";
			echo "</div>";
			/**
			 * ********ENCABEZADO******************** *
			 */
			
			/**
			 * ********CONTENIDO******************** *
			 */
			echo "<div class='art-postcontent art-postcontent-2 clearfix' style='background:url(../images/sheet.png);'>";
			echo "  <div class='art-content-layout'>";
			echo "  <div class='art-content-layout-row responsive-layout-row-2'>";
			echo "  <div class='art-layout-cell layout-item-0' style='width: 100%'>";
			
			echo "<div class='image-caption-wrapper' style='float: left;'>";
			echo "<img alt='an image' style=' float: left;' class='art-lightbox' src='../images/publicacion/" . $ren ['imagen_publi'] . "' width='300' height='150'>";
			echo "</div>";
			echo "<p>";
			echo "<p style='text-align: justify;'><br><br><br><br><br><br><br><br></p>";
			echo "<p style='text-align: justify;'>" . substr ( $ren ['cont_publi'], 0, 115 ) . "...";
			echo "</p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "<br><a href='noticias.php?idpublicacion=" . $ren ['id_publicacion'] . "'>Leer Más...</a>";
			echo "</div>";
			/**
			 * ********CONTENIDO******************** *
			 */
			
			/**
			 * ********PIE******************** *
			 */
			echo "<br><div class='art-postfootericons art-metadata-icons'>";
			echo " <span class='art-postcategoryicon'><h3 class='label label-primary' style='font-weight:14px;text-transform:uppercase;'> Categoria: " . $ren ['cat_aviso'] . "</h3></span>";
			echo "|<span class='art-postcommentsicon'><a href='#comments' title='Comments'>No hay comentarios »</a></span>";
			echo "</div>";
			/**
			 * ********PIE******************** *
			 */
			echo "</article>";
		}
	} else
		print ("<h3 align=center><img src='../images/iconos/warning.ico' width=45 height=45> No hay noticias disponibles</h3><h4 align='center'><a href='".$_SERVER['HTTP_REFERER']."'>Regresar</a></h4>") ;
}
	


?>
<?php echo $archivo_pdf;?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">
					<img src='../images/iconos/error.png' width='45' height='45'>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					VISTA PREVIA&nbsp;<img src="../images/iconos/writing.png"
						width="70" height="50">
				</h4>
			</div>
			<div class="modal-body">

				<iframe width="880" height="450"
					src="../archivos/pdf/web/documentos_preview.php?documento=<?php echo "../../publicacion/".$documento_pdf;?>"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar
				</button>
				
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

