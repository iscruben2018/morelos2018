var banderaInicio=false;
var banderaEstado=false;
var respaldoEstado;

/******************FUNCIONES VALIDAR BACHILLERATO***********/
function cargarBachilleratos(){

	var opcion="20";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../php/controlador.php",
		data:"opcion="+opcion,
		//beforeSend:inicioEnvio,
		success:llegadaBachilleratos,
		timeout:4000,
		error:problemasBachilleratos
	}); 
	return false;
}
function llegadaBachilleratos(datos){
	$("#bac_alu").html(datos);
}
function problemasBachilleratos(datos){
	alert('Problemas en el servidor al cargar los bachilleratos.');
}

function validarBachillerato(cve_sem){

	var semestre=cve_sem;
	var listaSemestre=document.getElementById("sem_alu");
	var listaBachilleratos=document.getElementById("bac_alu")

	if(semestre=='1'||semestre=='2'||semestre=='3'||semestre=='4'){
		$("#bac_alu").html("<option value='1'>TRONCO COMUN</option>");
	}
	else{
		if(semestre!='0'){
			cargarBachilleratos();
		}

	}
}

/**********************************************************/

function cargarColoniasP(id){


	var idciudad=id;
	var opcion="3";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&idciudad="+idciudad,
		beforeSend:inicioColoniasP,
		success:llegadaColoniasP,
		timeout:8000,
		error:problemasColoniasP
	}); 
	return false;


}
function inicioColoniasP(){
	var x=$("#cargarColoniasP");
	x.html("Cargando...<img src='../images/loading.gif'>");
}

function llegadaColoniasP(datos){
	$("#col_pad").html(datos);
	$("#cargarColoniasP").html('');
}
function problemasColoniasP(){

	alert('Problemas en el servidor al cargar las colonias.');
}



function cargarColonias(id){


	var idciudad=id;
	var opcion="3";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&idciudad="+idciudad,
		beforeSend:inicioColonias,
		success:llegadaColonias,
		timeout:8000,
		error:problemasColonias
	}); 
	return false;


}
function inicioColonias(){
	var x=$("#cargarColonias");
	x.html("Cargando...<img src='../images/loading.gif'>");
}

function llegadaColonias(datos){
	$("#col_alu").html(datos);
	$("#cargarColonias").html('');
}
function problemasColonias(){

	alert('Problemas en el servidor al cargar las colonias.');
}

function cargarCiudades(id){
	banderaEstado=true;
	var idestado=id;
	var opcion="2";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&idestado="+idestado,
		//beforeSend:inicioEnvio,
		success:llegadaCiudades,
		timeout:4000,
		error:problemasCiudadesP
	}); 
	return false;

}
function llegadaCiudades(datos){
	$("#ciudad").html(datos);
}
function problemasCiudadesP(datos){
	alert('Problemas en el servidor al cargar las ciudades.');
}

function cargarCiudadesP(id){

	var respaldoEstadoPadre=document.getElementById("respaldoEstadoPadre");

	var confirmar=confirm("Deseas cambiar los datos?");
	if(confirmar){
		//banderaEstado=true;
		var idestado=id;
		var opcion="2";

		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"controlador.php",
			data:"opcion="+opcion+"&idestado="+idestado,
			//beforeSend:inicioEnvio,
			success:llegadaCiudadesP,
			timeout:4000,
			error:problemasCiudadesPadre
		}); 
		return false;
	}
	else{

		var estadoA=document.getElementById("estado_pad");
		estadoA.selectedIndex=parseInt(respaldoEstadoPadre.value)-1;
		alert("Cancelado");
	}


}
function llegadaCiudadesP(datos){
	$("#ciudad_pad").html(datos);
}
function problemasCiudadesPadre(datos){
	alert('Problemas en el servidor al cargar las ciudades.');
}


$(function() {
	$( "#tabs" ).tabs();
});



function recordarEstado(){

	if(banderaEstado==true){
		respaldoEstado=document.getElementById("estado").value;

	}
	if(banderaEstado==false){
		respaldoEstado=document.getElementById("respaldoEstado").value;
	}
//	Elige estados
	var opcion="15";


	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&respaldoEstado="+respaldoEstado,
		// beforeSend:inicioEnvio,
		success:llegadaEstados,
		timeout:4000,
		error:problemasEstados
	}); 
	return false;

}

function llegadaEstados(datos){

	$("#estado").html(datos);
}
function problemasEstados(){
	alert('Problemas en el servidor.');
}


function dialogo(idEstado){

	$( "#dialog:ui-dialog" ).dialog( "destroy" );

	$( "#dialog-confirm" ).dialog({
		resizable: false,
		height:140,
		modal: true,
		buttons: {
			"CAMBIAR DATOS": function() {

				cargarCiudades(idEstado);
				$( this ).dialog( "close" );
			},
			"CANCELAR": function() {
				recordarEstado();
				$( this ).dialog( "close" );
			}
		}
	});
}

//CAMBIAR ALUMNO
function cambiarAlumno(){

	var matricula=document.getElementById("mat_alu").value;
	var curp=document.getElementById("curp_alu").value;
	var nombre=document.getElementById("nom_alu").value;
	var apellido1=document.getElementById("ap_alu").value;
	var apellido2=document.getElementById("am_alu").value;
	var fechan=document.getElementById("fnac_alu").value;
	var tel1_alu=document.getElementById("tel1_alu").value;
	var tel2_alu=document.getElementById("tel2_alu").value;
	var correo_alu=document.getElementById("mail_alu").value;
	var colonia_alu=document.getElementById("col_alu").value;
	var calle_alu=document.getElementById("calle_alu").value;
	var no_alu=document.getElementById("no_alu").value;
	var deuda_alu=document.getElementById("deuda_alu").value;
	var status_alu=document.getElementById("status_alu").value;
	var clave_bac=document.getElementById("bac_alu").value;
	var cod_sec=document.getElementById("codsec_alu").value;




	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"modificar_alumno.php",
		data:"matricula="+matricula+"&curp="+curp+"&nombre="+nombre+"&apellido1="+apellido1+
		"&apellido2="+apellido2+"&fecha="+fechan+"&tel1="+tel1_alu+"&tel2="+tel2_alu+"&correo="+correo_alu+
		"&colonia="+colonia_alu+"&calle="+calle_alu+"&numero="+no_alu+"&deuda="+deuda_alu+"&status="+status_alu+
		"&bachillerato="+clave_bac+"&seccion="+cod_sec,
		//beforeSend:inicioColonias,
		success:llegadaModificacionAlumno,
		timeout:8000,
		error:problemasModificacionAlumno
	}); 
	return false;


}

function llegadaModificacionAlumno(datos){
	if(datos.length==169){
		alert("SE MODIFICARON LOS DATOS DEL ALUMNO");
	}
	else{
		alert("ERROR AL MODIFICAR,CONSULTA EN CONTROL ESCOLAR");
	}
}
function problemasModificacionAlumno(){

	alert('PROBLEMAS AL MODIFICAR,INTENTA DE NUEVO');
}
//


function modificarAlumno(){

	$( "#dialog:ui-dialog" ).dialog( "destroy" );

	$( "#dialog-alumno" ).dialog({
		resizable: false,
		height:140,
		modal: true,
		buttons: {
			"CAMBIAR DATOS": function() {

				cambiarAlumno();
				$( this ).dialog( "close" );
			},
			"CANCELAR": function() {

				$( this ).dialog( "close" );
			}
		}
	});
}


function cambiarAlumnoExtra(){

	var opcion="16";
	var psalud1=document.getElementById("psalud_a").value;
	var psalud2=document.getElementById("psalud_alu").value;
	var beca1=document.getElementById("beca_alu").value;
	var beca2=document.getElementById("tbeca_alu").value;
	var ssalud1=document.getElementById("ssalud_alu").value;
	var ssalud2=document.getElementById("tsalud_alu").value;
	var idioma1=document.getElementById("lengua_alu").value;
	var idioma2=document.getElementById("tlengua_alu").value;
	var matri_extra=document.getElementById("mat_alu").value;
	var lnac_aluex=document.getElementById("lnac_alu").value;
	var sexo_aluex=document.getElementById("sexo_alu").value;

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&matri_extra="+matri_extra+"&psalud1="+psalud1+"&psalud2="+psalud2+
		"&beca1="+beca1+"&beca2="+beca2+"&ssalud1="+ssalud1+"&ssalud2="+ssalud2+"&idioma1="+idioma1+
		"&idioma2="+idioma2+"&lnac_aluex="+lnac_aluex+"&sexo_aluex="+sexo_aluex,
		//beforeSend:inicioEnvio,
		success:llegadaAlumnoExtra,
		timeout:4000,
		error:problemasAlumnoExtra
	}); 
	return false;

}
function llegadaAlumnoExtra(datos){
	alert(datos);
}
function problemasAlumnoExtra(datos){
	alert('Problemas en el servidor modificar los datos extra.');
}


function modificarDatosExtra(){

	$( "#dialog:ui-dialog" ).dialog( "destroy" );

	$( "#dialog-alumno-extra" ).dialog({
		resizable: false,
		height:140,
		modal: true,
		buttons: {
			"CAMBIAR DATOS": function() {

				cambiarAlumnoExtra();
				$( this ).dialog( "close" );
			},
			"CANCELAR": function() {

				$( this ).dialog( "close" );
			}
		}
	});
}


function cambiarPadre(){


	var opcion="17";
	var nom_pad=document.getElementById("nom_pad").value;
	var ap_pad=document.getElementById("ap_pad").value;
	var am_pad=document.getElementById("am_pad").value;
	var tel1_pad=document.getElementById("tel1_pad").value;
	var tel2_pad=document.getElementById("tel2_pad").value;
	var ecivil_pad=document.getElementById("edocivil_pad").value;
	var correo_pad=document.getElementById("mail_pad").value;
	var cve_pad=document.getElementById("cve_pad").value;
	var col_pad=document.getElementById("col_pad");
	var colonia_pad=col_pad.options[col_pad.selectedIndex].value;
	var calle_pad=document.getElementById("calle_pad").value;
	var no_pad=document.getElementById("no_pad").value;
	var ocupacion_pad=document.getElementById("ocupacion_pad").value;
	var ltrabajo_pad=document.getElementById("ltrabajo_pad").value;





	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&cve_pad="+cve_pad+"&nom_pad="+nom_pad+"&ap_pad="+ap_pad+
		"&am_pad="+am_pad+"&tel1_pad="+tel1_pad+"&tel2_pad="+tel2_pad+"&ecivil_pad="+ecivil_pad+"&correo_pad="+correo_pad+"&col_pad="+colonia_pad+
		"&calle_pad="+calle_pad+"&no_pad="+no_pad+"&ocupacion_pad="+ocupacion_pad+"&ltrabajo_pad="+ltrabajo_pad,
		//beforeSend:inicioEnvio,
		success:llegadaCambiarPadre,
		timeout:4000,
		error:problemasCambiarPadre
	}); 
	return false;

}
function llegadaCambiarPadre(datos){
	alert(datos);
}
function problemasCambiarPadre(datos){
	alert(datos);
	alert('Problemas en el servidor modificar los datos del tutor.');
}

function modificarPadre(){


	$( "#dialog:ui-dialog" ).dialog( "destroy" );

	$( "#dialog-padre" ).dialog({
		resizable: false,
		height:140,
		modal: true,
		buttons: {
			"CAMBIAR DATOS": function() {

				cambiarPadre();
				$( this ).dialog( "close" );
			},
			"CANCELAR": function() {

				$( this ).dialog( "close" );
			}
		}
	});
}

function dialogoInicio(){


	$( "#dialog:ui-dialog" ).dialog( "destroy" );

	$( "#dialog-inicio" ).dialog({
		resizable: false,
		height:140,
		modal: true,
		buttons: {
			"ACEPTAR": function() {
				banderaInicio=true;
				$( this ).dialog( "close" );
			},
			"CANCELAR": function() {

				$( this ).dialog( "close" );
				window.history.back();
			}
		}
	});
}

function dialogoReinscripcion(){


	$( "#dialog:ui-dialog" ).dialog( "destroy" );

	$( "#dialog-reinscripcion" ).dialog({
		resizable: false,
		height:140,
		modal: true,
		buttons: {
			"ACEPTAR": function() {
				cambiarInscripcion();
				$( this ).dialog( "close" );
			},
			"CANCELAR": function() {

				$( this ).dialog( "close" );
			}
		}
	});
}

function cambiarInscripcion(){
	//var cambiar=confirm("Deseas modificar los datos disponibles de la solicitud?");
	//if(cambiar){
		var sol=new XMLHttpRequest();
		var datos=new FormData();

		var folio_ins=document.getElementById("folio_ins");

		var matricula=document.getElementById("mat_alu");
		var cve_sem=document.getElementById("sem_alu");
		var bacSelect=document.getElementById("bac_alu");

		var bac=bacSelect.options[bacSelect.selectedIndex].value;
		var opcion="19";



		datos.append("cve_bac",bac);
		datos.append("cve_sem",cve_sem.value);
		datos.append("mat_alu",matricula.value);
		datos.append("opcion",opcion);
		sol.addEventListener("load",respuestaCambiarInscripcion,false);
		sol.open("POST","controlador.php",true);

		sol.send(datos);
	//}
	//else{
	//	alert("Cancelado");
	//}

}
function respuestaCambiarInscripcion(res){
	alert(res.target.responseText);

}
function respaldarValor(valor){
	document.getElementById("respaldoBachillerato").value=valor;
}

function validarSolicitudCambios(formulario){
	var bacSelect=document.getElementById("bac_alu");
	var bac=bacSelect.options[bacSelect.selectedIndex].value;

	var semSelect=document.getElementById("sem_alu");
	var sem=semSelect.options[semSelect.selectedIndex].value;

	var aceptar=confirm("ENVIARAS LA SOLICITUD ,REVISASTE LOS DATOS?")
	if(aceptar){
		if(formulario.curp_alu.value==""){
			formulario.curp_alu.focus();
			alert('SECCION DATOS PERSONALES:INGRESA TU CURP');
			return false;
		}
		if(formulario.sexo_alu.value==""||formulario.sexo_alu.value=='0'){
			formulario.sexo_alu.focus();
			alert('SECCION DATOS PERSONALES:SELECCIONA TU GENERO');
			return false;
		}
		if(formulario.fnac_alu.value==""){
			formulario.fnac_alu.focus();
			alert('SECCION DATOS PERSONALES:INGRESA LA FECHA DE NACIMIENTO');
			return false;
		}
		if(formulario.lnac_alu.value==""){
			formulario.lnac_alu.focus();
			alert('SECCION DATOS PERSONALES:INGRESA EL LUGAR DE NACIMIENTO');
			return false;
		}
		if(formulario.tel1_alu.value==""){
			formulario.tel1_alu.focus();
			alert('SECCION DATOS PERSONALES:INGRESA EL TELEFONO');
			return false;
		}
		if(formulario.calle_alu.value==""){
			formulario.calle_alu.focus();
			alert('SECCION DATOS PERSONALES:INGRESA EL NOMBRE DE LA CALLE');
			return false;
		}
		if(formulario.no_alu.value==""){
			formulario.no_alu.focus();
			alert('SECCION DATOS PERSONALES:INGRESA EL NUMERO DE CALLE');
			return false;
		}
		if(formulario.psalud_a.value==""){
			formulario.psalud_a.focus();
			alert('SECCION DATOS ADICIONALES:INGRESA SI TIENES PROBLEMAS DE SALUD SI/NO');
			return false;
		}
		if(formulario.cp_alu.value=="0"){
			formulario.cp_alu.focus();
			alert('SECCION DATOS ALUMNO:INGRESA EL CODIGO POSTAL(VACIO SI NO SE SABE)');
			return false;
		}
		if(formulario.cp_pad.value=="0"){
			formulario.cp_pad.focus();
			alert('SECCION DATOS PADRE:INGRESA EL CODIGO POSTAL(VACIO SI NO SE SABE)');
			return false;
		}

		if(formulario.beca_alu.value==""){
			formulario.beca_alu.focus();
			alert('SECCION DATOS ADICIONALES:INGRESA SI TIENES BECA SI/NO');
			return false;
		}

		if(formulario.ssalud_alu.value==""){
			formulario.ssalud_alu.focus();
			alert('SECCION DATOS ADICIONALES:INGRESA SI TIENES SERVICIO DE SALUD SI/NO');
			return false;
		}
		if(formulario.lengua_alu.value==""){
			formulario.lengua_alu.focus();
			alert('SECCION DATOS ADICIONALES:INGRESA SI HABLAS UNA LENGUA INDIGENA SI/NO');
			return false;
		}

		if(formulario.calle_pad.value==""){
			formulario.calle_pad.focus();
			alert('SECCION DATOS PADRE:INGRESA EL NOMBRE DE LA CALLE)');
			return false;
		}
		if(formulario.no_pad.value==""){
			formulario.no_pad.focus();
			alert('SECCION DATOS PADRE:INGRESA EL NUMERO DE LA CALLE)');
			return false;
		}
		if(formulario.ocupacion_pad.value==""){
			formulario.ocupacion_pad.focus();
			alert('SECCION DATOS PADRE:INGRESA LA OCUPACION DEL PADRE)');
			return false;
		}
		if(formulario.ltrabajo_pad.value==""){
			formulario.ltrabajo_pad.focus();
			alert('SECCION DATOS PADRE:INGRESA EL LUGAR DE TRABAJO DEL PADRE)');
			return false;
		}
		if(sem=="0"){
			formulario.sem_alu.focus();
			alert('SECCION DATOS DE LA SOLICITUD:SELECCIONA EL SEMESTRE)');
			return false;
		}
		if(bac=="0"){
			formulario.bac_alu.focus();
			alert('SECCION DATOS DE LA SOLICITUD:SELECCIONA EL BACHILLERATO)');
			return false;
		}



	}
	else{
		return false;
	}

}