<?php 
session_start();

//if(isset($_SESSION["user_admin"])&&isset($_SESSION["tipo_usuario"])=="admin"){

$direccion_anterior=$_SERVER ['HTTP_REFERER'];
$imagen_error="<img src='../images/iconos/delete.ico' width='30' heigth='30'>";
$imagen_ok="<img src='../images/iconos/check.ico' width=30 heigth=30>";
$imagen_anterior="<img src='../images/iconos/left.ico' width=30 heigth=30>";
?>
<?php
if(isset($_POST['enviar'])){
    require_once 'Aviso.php';
	require_once 'TablaAviso.php';
	
	$categoria = $_POST ['nom_cat'];
	$des_cat = $_POST ['des_cat'];
	
	if (! $categoria || ! $des_cat) {
		echo "<h2 align='center' style='color:red'>Ocurri&oacute; un error ".$imagen_error."</h2>";
	    echo "<h3 align='center'>Favor de llenar todos los datos</h3>";
	    echo "<div  align='center'><a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
	    echo "</div>";
	} else {
		$aviso = new Aviso ();
		$tablaAviso = new TablaAviso ();
		$registroAviso = new TablaAviso ();
		
		if ($tablaAviso->existeAviso ( $categoria ) == "0") {
			$aviso->setIdAviso ( null );
			$aviso->setCategoriaAviso ( $categoria );
			$aviso->setDescripcionAviso ( $des_cat );
			
			if ($registroAviso->guardarAviso ( $aviso ) == "1") {
				echo "<h2 align='center' >Registro exitoso!&nbsp;".$imagen_ok."</h2>";
		        echo "<h3 align='center'>Se agrego la categoria de manera correcta</h3>";
	            echo "<div  align='center'><a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
	            echo "</div>";
			} else {
				echo "<h2 align='center'>Ocurri&oacute; un error &nbsp;".$imagen_error."</h2>";
				echo "<h3 align='center'>Ocurri&oacute; un error en el registro</h3>";
	            echo "<div  align='center'><a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
	            echo "</div>";
			}
		} else {
			echo "<h2 align='center'>Ocurri&oacute; un error  &nbsp;".$imagen_error."</h2>";
			echo "<h3 align='center'>La categoria ya existe,agrega una nueva</h3>";
	        echo "<div  align='center'><a href='".$direccion_anterior."' style='text-decoration:none;'>".$imagen_anterior."Regresar</a>";
	        echo "</div>";
		}
	}
}
else{
?>
<html>
<body background='../images/sheet.png'>
<head>
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
</head>
<div align='center' class=''>

<?php 
$nombre='REGISTRO DE CATEGORIAS';
require_once 'encabezado.php';?>
<form name='' method='post'>
		<label><b>Nombre de la categoria:</b></label><input type='text' name='nom_cat' class='f'><br> 
		<label><b>Descripcion:</b></label><textarea name='des_cat' class=''></textarea><br><br> 
		<input type='submit' class='' name='enviar' value='Registrar'>
</form>
	<!-- CIERRA TABLA -->
	</td>
	</tr>
	</table>
	<!--  -->
</div>
</body>
</html>
<?php 

}

//}
//else{
//echo "<h3><img src='../images/iconos/stop.png'>Acceso no autorizado,alguien ha iniciado sesion en tu computadora,termina la sesion y accede de nuevo</h3>
//	  <b><a href='logout_admin.php'>AQUI</a></b>";

//}

?>