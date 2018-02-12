<?php 
require_once '../php/Conexion.php';
$conexion = new Conexion ();
$conexion->crearConexion ();

$idpublicacion = base64_decode($_REQUEST ['idpublicacion']);
$meses = array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre" );


if (isset ( $idpublicacion )) {
	
	$qry = "SELECT id_publicacion,usuario.cve_usu,user,tipo_usu,cat_aviso,fecha_crea,titular,cont_publi,imagen_publi,archivo_publi,fecha_pub FROM publicacion join usuario on publicacion.cve_usu=usuario.cve_usu join aviso on publicacion.id_aviso=aviso.id_aviso  where id_publicacion='" . mysql_real_escape_string($idpublicacion) . "' order by fecha_crea desc limit 1";
	
	mysql_query ( "SET NAMES 'utf8'" );
	$consulta = mysql_query ( $qry ) or die ( "<h4 align='center'>Error al visualizar las noticias" . "<a href='noticias.php'>Regresar</a></h4>" );
	$nfilas = mysql_num_rows ( $consulta );
	
	if ($nfilas > 0) {
		
		echo "<br><article class='art-post art-article'>";

		//INICIO FOR ARTICLE
		for($i = 0; $i < $nfilas; $i ++) {
			$ren = mysql_fetch_array ( $consulta );
			
			$autor = $ren ['tipo_usu'];
			$clave = $ren ['cve_usu'];
			
			//INICIO IF AUTOR
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
			//FIN IF AUTOR
			
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
			    $dia1 = @date ( "d", strtotime ( $ren['fecha_crea'] ));
				$dia2 = @date ( "d", strtotime ( $ren['fecha_pub']  ));
				$year1 = @date ( "Y", strtotime ($ren['fecha_crea'] ));
				$year2 = @date ( "Y", strtotime ($ren['fecha_pub'] ));
				$mes1 = substr ( @date ( "d-m-Y", strtotime ( $ren['fecha_crea'] ) ), 3, 2 );
				$mes2 = substr ( @date ( "d-m-Y", strtotime ( $ren['fecha_pub'] ) ), 3, 2 );
			    $titulo_mes1 = $meses [$mes1 - 1];
			    $titulo_mes2 = $meses [$mes2 - 1];

			    $cadenaFecha1=$dia1."/".$titulo_mes1."/".$year1;
			    $cadenaFecha2=$dia2."/".$titulo_mes2."/".$year2;
			
			/**
			 * *********************************************************************
			 */
			echo "<img src='../images/iconos/calendar-7.png' width=45 height=45> Fecha de creaci&oacute;n:";
			echo $cadenaFecha1;
			//echo "Fecha de publicaci&oacute;n:" .$cadenaFecha2."<br>";
			echo "|Hora:" . @date ( "H:i", strtotime ( $ren ['fecha_crea'] ) ) . "";
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
					
				}//FIN IF HAY PDF
			}   //FIN IF HAY ARCHIVO
			
			echo "</div>";
			echo "</div>";
			/**
			 * ********ENCABEZADO******************** *
			 */
			
			/**
			 * ********CONTENIDO******************** *
			 */
			echo "<div class='art-postcontent art-postcontent-2 clearfix' style='background:#E6E6FA;'>";
			echo "  <div class='art-content-layout'>";
			echo "  <div class='art-content-layout-row responsive-layout-row-2'>";
			echo "  <div class='art-layout-cell layout-item-0' style='width: 100%'>";
			
			echo "<div class='image-caption-wrapper' style='float: left;background: #D9DFE3;'>";
			echo "<img alt='".$ren['titular']."' class='art-lightbox' style=' float: left;'  src='../images/publicacion/" . $ren ['imagen_publi'] . "' width='300' height='150'>";
			echo "</div>";
			echo "<p><p>";
			echo "<p style='text-align: justify;'><br><br><br><br><br><br><br><br></p>";
			echo "<p style='text-align: justify;'>" . $ren ['cont_publi'] . "";
			echo "</p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "<br><a href='noticias.php'>Regresar</a>";
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
		} //FIN FOR ARTICLE

		echo "</article>";
	} 

	else
	{
		print ("<h3 align=center>");
		print ("<img  style='border:none;' src='../images/iconos/warning.ico' width='33' height=33> No hay noticias disponibles");
		print ("</h3>");
		print ("<h4 align='center'><a style='text-decoration:none;' href='noticias.php'>Regresar</a></h4>") ;
	}
	//FIN IF FILAS >0

} 

else {
     //SI NO HAY GET
	header("Location:../inicio.php") ;
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

