<?php session_start();
if(isset($_SESSION['user_admin'])==null){
  echo "<h3 align=center><img src='../images/iconos/error.png' width=33 heigth=33>Error acceso no autorizado</h3>";
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../js/jquery.js">
</script>
<!-- REGISTRAR_ALUMNO.JS -->
<script type="text/javascript" src="../js/registrar_alumno.js"></script>
<script type="text/javascript" src="../js/validar_forms.js"></script>
<link href="../css/reporte.css" rel="stylesheet"> 
<!-- REGISTRAR_ALUMNO.JS -->

<!--BOOTSTRAP-->
<link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
<script src="../js/bootstrap/bootstrap.min.js"></script>  
<!--FIN BOOTSTRAP-->

<script type="text/javascript">

var imagenError="";

function validarForm(){
	

	var bandera=true;
	imagenError="<img src='../images/iconos/warning.ico' width=30 heigth=30 style='border:none;'>";

	bandera=bandera&&validarCampos("matricula",imagenError+"&nbsp;Ingresa la matricula");
	bandera=bandera&&validarCampos("curp",imagenError+"&nbsp;Ingresa la curp");
	//bandera=bandera&&validarLongitud( "curp", 18, 18 );
	bandera=bandera&&validarCampos("nombre",imagenError+"&nbsp;Ingresa tu nombre");
	//bandera=bandera&&validarExpresion("nombre",/^([a-zA-Z])+$/i,"Nombre no valido");
	bandera=bandera&&validarCampos("apellido1",imagenError+"&nbsp;Ingresa tu apellido paterno");
	bandera=bandera&&validarCampos("apellido2",imagenError+"&nbsp;Ingresa tu apellido materno");
	bandera=bandera&&validarCampos("fecha",imagenError+"&nbsp;Selecciona la fecha");
	bandera=bandera&&validarCampos("tel1",imagenError+"&nbsp;Ingresa el telefono");
	bandera=bandera&&validarCampos("correo",imagenError+"&nbsp;Ingresa el correo");
	bandera=bandera&&validarCampos("estado_alu",imagenError+"&nbsp;Selecciona el estado");
	bandera=bandera&&validarCampos("ciudad_alu",imagenError+"&nbsp;Selecciona la ciudad");
	bandera=bandera&&validarCampos("colonia_alu",imagenError+"&nbsp;Selecciona la colonia");
	bandera=bandera&&validarCampos("calle_alu",imagenError+"&nbsp;Ingresa la calle");
	bandera=bandera&&validarCampos("no_alu",imagenError+"&nbsp;Ingresa el numero de calle");
	bandera=bandera&&validarCampos("deuda_alu",imagenError+"&nbsp;Selecciona si tiene deuda");
	bandera=bandera&&validarCampos("estatus_alu",imagenError+"&nbsp;Selecciona el estatus del alumno");
	bandera=bandera&&validarCampos("bac_alu",imagenError+"&nbsp;Selecciona el bachillerato");
	bandera=bandera&&validarCampos("sec_alu",imagenError+"&nbsp;Selecciona la seccion");

    if(bandera){
      return true;
	}
	else{
		return false;
	}
	
	
}
</script>

</head>
<body onload="javascript:cargarEstados();">

		                        <?php 
								$nombre='REGISTRO DE ALUMNO';
								require_once 'encabezado.php';
		                        ?>
						
								<!-- FORMULARIO DE LOGIN -->
								<!--<form id="form-main" action="registrar_alumno_operacion.php" method="post" onsubmit="">-->
								<form id="form-main"  method="post" action="registrar_alumno_operacion.php" onsubmit="return validarForm();">
                               
                                    <p>
									<br>
									</p>
									
									<p>
									<label style="font-weight: bold;">Matricula:</label> 
									
									<input type="text" name="matricula" id="matricula"  placeholder="Ingresa tu matricula"  maxlength="8" onblur="validarForm();">
									<label id='label-matricula'></label>
									</p>
                                    
									<p>
									<label style='font-weight: bold;'>Curp:</label> 
									<input type='text' name='curp' id='curp' placeholder="Ingresa la curp" maxlength="18" onblur="validarForm();">
									<label id='label-curp'></label>
									</p>
									<p>

											<span style="font-weight: bold;">Nombre:</span> 
											<input type='text' pattern='[a-z A-ZÑ]+' name='nombre' id='nombre' placeholder="Ingresa el nombre"  title='SOLO SE PERMITEN LETRAS Y LA LETRA &Ntilde;' onblur="validarForm();">
											<label id='label-nombre'></label>
										</p>
										<p>

											<span style="font-weight: bold;">Apellido paterno:</span>
											<input type='text' pattern='[a-z A-ZÑ]+' name='apellido1' id='apellido1' placeholder="Ingresa el apellido paterno" onblur="validarForm();" >
										<label id='label-apellido1'></label>
										</p>
										<p>

											<span style="font-weight: bold;">Apellido Materno:</span> 
											<input type='text' pattern='[a-z A-ZÑ]+' name='apellido2' id='apellido2' placeholder="Ingresa el apellido materno" onblur="validarForm();" >
										<label id='label-apellido2'></label>
										</p>
										<p>

											<span style="font-weight: bold;">Fecha de nacimiento:</span>
											<input type="date" name='fecha' id='fecha' placeholder="Ingresa la fecha de nacimiento" onblur="validarForm();">
											<label id='label-fecha'></label>
										</p>
										<p>

											<span style="font-weight: bold;">Telefono 1:</span> 
											<input type='tel' name='tel1' id='tel1'  title='TELEFONO NO VALIDO,REVISA LOS DATOS (Ejemplo:(443)-123... 715-123...4431..)' placeholder="Ingresa el telefono" pattern="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?" onblur="validarForm();">
											<label id='label-tel1'></label>
										</p>
										<p>

											<span style="font-weight: bold;">Telefono 2:</span> 
											<input type="tel" name='tel2' placeholder="Opcional">
										</p>
										<p>

											<span style="font-weight: bold;">Correo:</span> 
											<input type="email" name="correo" id='correo' title='CORREO@PROVEEDOR.COM' placeholder="Ingresa el mail" onblur="validarForm();">
											<label id='label-correo'></label>
										</p>
										<p>
											<span style="font-weight: bold;">Estado:</span> 
											<select id='estado_alu' name='estado' onchange="javascript:cargarCiudades(this.value);" onblur="validarForm();">
											</select> 
											<label id='label-estado_alu'></label>
										</p>
										<p>
											<span style="font-weight: bold;">Ciudad:</span> 
											<select id='ciudad_alu' name='ciudad' onchange="javascript:cargarColonias(this.value);" onblur="validarForm();">
											</select> 
											<label id='label-ciudad_alu'></label>
										</p>
										<div id='cargarCiudades'></div>
										<p>
											<span style="font-weight: bold;">Colonia:</span> 
											<select id='colonia_alu' name='colonia' onblur="validarForm();"></select>
											<label id='label-colonia_alu'></label>
										</p>
										<div id='cargarColonias'></div>
										
										<p>

											<span style="font-weight: bold;">Calle:</span> 
											<input type="text" name='calle'  id='calle_alu' pattern="[a-z A-ZÑ]+" placeholder="Nombre de la calle" onblur="validarForm();">
											<label id='label-calle_alu'></label>
										</p>
										<p>

											<span style="font-weight: bold;">N&uacute;mero:</span> 
											<input type="text" name='numero' id='no_alu' placeholder="Ingresa el numero de calle"  title="EL NUMERO DE CALLE NO ADMITE LETRAS" pattern="[0-9]+" onblur="validarForm();">
											<label id='label-no_alu'></label>
										</p>
										<p>


											<span style="font-weight: bold;">Deuda:</span> 
											<select name='deuda'  id='deuda_alu' onblur="validarForm();">
												<option value=''>--Selecciona una opcion--</option>
												<option value='1'>Si</option>
												<option value="00">No</option>
											</select>
											<label id='label-deuda_alu'></label>
										</p>
										<p>

											<span style="font-weight: bold;">Estatus:</span> 
											<select name='status'  id='estatus_alu' onblur="validarForm();">
												<option value=''>--Selecciona una opcion--</option>
												<option value='inscrito'>Inscrito</option>
												<option value='reinscrito'>Reinscrito</option>
												<option value='activo'>Activo</option>
												<option value='baja'>Baja temporal</option>
												<option value='proceso-re'>Proceso de reinscripcion</option>
												<option value='proceso-in'>Proceso de inscripcion</option>
											</select>
											<label id='label-estatus_alu'></label>
										</p>
										<p>
											<span style="font-weight: bold;">Bachillerato:</span> 
											<select id='bac_alu' name='bachillerato'  onblur="validarForm();"></select>
											<label id='label-bac_alu'></label>
										</p>
										<p>
											<span style="font-weight: bold;">Seccion:</span> 
											<select id='sec_alu' name='seccion' id='seccion_alu' onblur="validarForm();"></select>
											<label id='label-sec_alu'></label>
										</p>
										 <br><br>
									     <div align="left">
										 <input type="submit" name='registrar' value="Registrar" class="btn btn-primary" style="zoom: 1;">
									     <input type='reset' value='Borrar datos'  class='btn btn-default'>
									     </div>
									



								</form>
								<!-- FIN REGISTRO-->

								<!-- CIERRA ENZABEZADO-->
						       </td></tr></table>
						       <!-- FIN -->
</html>
<?php }?>