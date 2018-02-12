<?php
header("Content-Type: text/html;charset=utf-8");
	 require_once('../php/Conexion.php');
	$conexion=new Conexion();
	$conexion->crearConexion();
	$sql = "SELECT id_publicacion,usuario.cve_usu,user,tipo_usu,cat_aviso,fecha_crea,titular,cont_publi,imagen_publi,archivo_publi FROM publicacion join usuario on publicacion.cve_usu=usuario.cve_usu join aviso on publicacion.id_aviso=aviso.id_aviso order by fecha_crea desc";
	$consulta = @mysql_query($sql);
	@mysql_query("SET NAMES 'utf8'");
	$meses = array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre" );
	
	 
	?>
	<script type="text/javascript" language="javascript" src="js/config_datatable_api.js"></script>
	<div class="container" style="width:auto;">
	<table cellpadding="1" cellspacing="3" border="0" class="table table-hover" id="registro">
	 <thead>
	  <tr>
	   <th>Titular</th>
	   <th>Fecha:</th>
	   <th>Hora:</th>
	   <th>Por:</th>
	     <th>Categoria:</th>
	  </tr>
	 </thead>
	 <tbody>
	 <?php
	  while ($filas = @mysql_fetch_assoc($consulta))
	  {
	  	$mes = substr ( @date ( "d-m-Y", strtotime ( $filas ['fecha_crea'] ) ), 3, 2 );
	  		
	  	$dia = @date ( "d", strtotime ( $filas ['fecha_crea'] ) );
	  	$titulomes = $meses [$mes - 1];
	  	$year = @date ( "Y", strtotime ( $filas ['fecha_crea'] ) );
	  		
	  	$cadenaFecha = $dia ."/".$titulomes."/".$year;
	  	
	   echo '<tr>';
	   echo '<td >'.'
	   <div class="art-postmetadataheader" >';
	   echo '<h4 style="font-family:12px;text-align:justify;" class="art-postheader">';
	   echo '<a style="text-decoration:none;" href="noticias_preview.php?idpublicacion='.base64_encode($filas['id_publicacion']).'">';
	   //Poner a utf-8 y decodificar
	   echo utf8_decode( utf8_encode ($filas['titular']));
	   echo '</a>&nbsp;';
	   if ($filas ['archivo_publi'] != null) {
	   echo "|<span class='art-postpdficon'></span>|";
	   }
	   echo '</h4>
	   </div>
	   <img src="../images/publicacion/'.utf8_encode ($filas['imagen_publi']).'" class="art-lightbox" style=" float: left;padding:15px;" width=300 height=150>
	
	    <p style="text-align: justify;">' . substr ( $filas ['cont_publi'], 0, 115 ) . '...</p>
	 	<br><b><a  style="text-decoration:none;" href="noticias_preview.php?idpublicacion=' .base64_encode($filas ['id_publicacion'] ). '">Leer M&aacute;s...</b></a>
	   </td>';
	   echo '<td>
	   <div style="color:#000034;">
	   <div class="art-postheadericons art-metadata-icons">
	   <img src="../images/postdateicon.png">
	   '.utf8_encode ($cadenaFecha).'  
	   </div>
	   </td>';
	   echo '<td >
	   <div class="art-postheadericons art-metadata-icons"> 
	   '.utf8_encode (@date ( "H:i", strtotime ( $filas ['fecha_crea'] )) ).'
	   </div>
	   </div>	
	   	</td>';
	   echo '<td>
	   '.utf8_encode ($filas['tipo_usu']).'
	   <div class="art-postheadericons art-metadata-icons">
	   <img src="../images/postauthoricon-large.png">  
	   <a href="#" title="Publicado por"></a>
	   </div>
	   </td>';
	   echo '<td><h4><label class="label label-primary">'.utf8_encode ($filas['cat_aviso']).'</label></h4></td>';
	   
	   echo '</tr>';
	  }
	 ?>
	 <tbody>
	</table>
	</div>
