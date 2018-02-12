var x;

x=$(document);
x.ready(inicio);

function inicio(){
	var x=$("#fnac_alu");
	x.datepicker({dateFormat:'yy/mm/dd',changeMonth:true,changeYear:true,yearRange:'-30:+0'});
	cargarFecha();
	cargarScroll();
	cargarCiclo();
	cargarEstados();
	cargarAlumno();



}


function validarForm(formulario){
	if(formulario.sem_alu.value=="0"){
		formulario.sem_alu.focus();
		alert('SELECCIONA EL SEMESTRE');
		return false;
	}
	if(formulario.bac_alu.value=="0"){
		formulario.bac_alu.focus();
		alert('SELECCIONA EL BACHILLERATO CORRESPONDIENTE');
		return false;
	}

	if(formulario.curp_alu.value.length==0){
		formulario.curp_alu.focus();
		alert('LA CURP NO PUEDE IR VACIA');
		return false;
	}
	if(formulario.curp_alu.value.length<18){
		formulario.curp_alu.focus();
		alert('DEBES INGRESAR LA CURP COMPLETA');
		return false;
	}

	if(formulario.fnac_alu.value.length==0){
		formulario.fnac_alu.focus();
		alert("INGRESA LA FECHA DE NACIMIENTO");
		return false;
	}

	if(formulario.lnac_alu.value.length==0){
		formulario.lnac_alu.focus();
		alert("INGRESA EL LUGAR DE NACIMIENTO NO VACIO");
		return false;
	}
	var regLugarNacimiento= "[a-zA-Z��]";
	if(formulario.lnac_alu.value.search(regLugarNacimiento) != 0){	
		alert("LUGAR DE NACIMIENTO NO VALIDO,SOLO LETRAS \n Caracteres validos: \n A-Z (incluso �)");
		formulario.lnac_alu.focus();
		return false;	
	}


	if(formulario.sexo_alu.value=='0'){
		formulario.sexo_alu.focus();
		alert("FAVOR DE SELECCIONAR SU GENERO(MASCULINO O FEMENINO)");
		return false;
	}
	if(formulario.estado_alu.value=="0"){
		formulario.estado_alu.focus();
		alert('SELECCIONA UN ESTADO DE LA LISTA');
		return false;
	}

	if(formulario.ciudad_alu.value=='0'){
		formulario.ciudad_alu.focus();
		alert("SELECCIONA UNA CIUDAD DE LA LISTA");
		return false; 
	}

	if(formulario.col_alu.value=='0'){
		formulario.col_alu.focus();
		alert("SELECCIONA UNA CUIDAD DE LA LISTA");
		return false;
	}
	if(formulario.cp_alu.value==''){
		formulario.cp_alu.focus();
		alert("INGRESA EL CODIGO POSTAL NO VACIO");
		return false;
	}

	var regNoCp="[0-9]+";
	if(formulario.cp_alu.value.search(regNoCp) != 0&&formulario.cp_alu.value.length<5){	
		alert("EL CODIGO POSTAL ES UN NUMERO SOLAMENTE");
		formulario.cp_alu.focus();
		return false;	
	}

	if(formulario.calle_alu.value.length==0){
		formulario.calle_alu.focus();
		alert("INGRESA EL NUMERO DE LA CALLE");
		return false;
	}
	var regNombreCalle="[a-zA-Z]";
	if(formulario.calle_alu.value.search(regNombreCalle) != 0){	
		alert("NOMBRE DE LA CALLE INVALIDO,SOLO LETRAS");
		formulario.calle_alu.focus();
		return false;	
	}

	if(formulario.no_alu.value.length==0){
		formulario.no_alu.focus();
		alert("EL NOMBRE DE LA CALLE NO PUEDE IR VACIO");
		return false;
	}

	var regNoCalle="[0-9]+";
	if(formulario.no_alu.value.search(regNoCalle) != 0){	
		alert("EL NUMERO DE LA CALLE NO ADMITE LETRAS");
		formulario.no_alu.focus();
		return false;	
	}




	if(formulario.tel1_alu.value.length==0){
		formulario.tel1_alu.focus();
		alert("INGRESA EL TELEFONO");
		return false;
	}
	var regTel1="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
	if(formulario.tel1_alu.value.search(regTel1) != 0){	
		alert("TELEFONO NO VALIDO,REVISA LOS DATOS (Ejemplo 715-...4431..)");
		formulario.tel1_alu.focus();
		return false;	
	}

	if(formulario.mail_alu.value.length==0){
		formulario.mail_alu.focus();
		alert("INGRESA EL CORREO");
		return false;
	}




	if(formulario.tel2_alu.value.length==0){
		formulario.tel2_alu.focus();
		alert("INGRESA EL SEGUNDO TELEFONO");
		return false;
	}

	var regTel2="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
	if(formulario.tel2_alu.value.search(regTel2) != 0){	
		alert("NUMERO DE TELEFONO INVALIDO REVISA LOS DATOS");
		formulario.tel2_alu.focus();
		return false;	
	}

	if(formulario.psalud_a.value=='0'){
		formulario.psalud_a.focus();
		alert("SELECCIONA SI TIENES PROBLEMAS DE SALUD");
		return false;
	}
	if((formulario.psalud_a.value=='si'&& formulario.psalud_alu.value.length==0)||(formulario.psalud_a.value=='si'&& formulario.psalud_alu.value=='')){
		formulario.psalud_alu.focus();
		alert("ESPECFICA EL PROBLEMA DE SALUD");
		return false;
	}


	if(formulario.dis_alu.value=='0'){
		formulario.dis_alu.focus();
		alert("SELECCIONA EL TIPO DE DISCAPACIDAD)");
		return false;
	}

	if(formulario.beca_alu.value=='0'){
		formulario.beca_alu.focus();
		alert("SELECCIONA SI CUENTAS CON BECA");
		return false;
	}
	if((formulario.beca_alu.value=="si"&&formulario.tbeca_alu.value.length==0)||(formulario.beca_alu.value=='si'&&formulario.tbeca_alu.value=='')){
		formulario.tbeca_alu.focus();
		alert("ESPECIFICA EL TIPO DE BECA");
		return false;
	}
	if(formulario.ssalud_alu.value=='0'){
		formulario.ssalud_alu.focus();
		alert("SELECCIONA SI CUENTAS CON SERVICIO DE SALUD");
		return false;
	}

	if((formulario.ssalud_alu.value=='si'&&formulario.tsalud_alu.value.length==0)||(formulario.ssalud_alu.value=='si'&&formulario.tsalud_alu.value=='')){
		formulario.tsalud_alu.focus();
		alert("ESPECIFICA EL SERVICIO DE SALUD");
		return false;
	}

	if(formulario.lengua_alu.value=='0'){
		formulario.lengua_alu.focus();
		alert("SELECCIONA SI HABLAS UNA LENGUA INDIGENA");
		return false;
	}
	if((formulario.lengua_alu.value=='si'&&formulario.tlengua_alu.value.length==0)||(formulario.lengua_alu.value=="si"&&formulario.tlengua_alu.value=='')){
		formulario.tlengua_alu.focus();
		alert("ESPECIFICA LA LENGUA INDIGENA QUE HABLAS");
		return false;
	}

	if(formulario.nom_pad.value.length==0){
		formulario.nom_pad.focus();
		alert("INGRESA EL NOMBRE DEL TUTOR");
		return false;
	}
	if(formulario.edocivil_pad.value=='0'){
		formulario.edocivil_pad.focus();
		alert("SELECCIONA EL ESTADO CIVIL DEL TUTOR");
		return false;
	}




	if(formulario.ap_pad.value.length==0){
		formulario.ap_pad.focus();
		alert("INGRESA EL APELLIDO PATERNO DEL TUTOR");
		return false;
	}
	if(formulario.am_pad.value.length==0){
		formulario.am_pad.focus();
		alert("INGRESA EL APELLIDO MATERNO DEL TUTOR");
		return false;
	}


	if(formulario.ap_pad.value.length==0){
		formulario.ap_pad.focus();
		alert("INGRESA EL APELLIDO PATERNO DEL TUTOR");
		return false;
	}
	if(formulario.am_pad.value.length==0){
		formulario.am_pad.focus();
		alert("INGRESA EL APELLIDO MATERNO DEL TUTOR");
		return false;
	}
	if(formulario.estado_pad.value=='0'){
		formulario.estado_pad.focus();
		alert("SELECCIONA EL ESTADO DE PROCEDENCIA DEL TUTOR");
		return false;
	}
	if(formulario.ciudad_pad.value=='0'){
		formulario.ciudad_pad.focus();
		alert("SELECCIONA LA CIUDAD DE PROCEDENCIA DEL TUTOT");
		return false;
	}
	if(formulario.col_pad.value=='0'){
		formulario.col_pad.focus();
		alert("SELECCIONA LA COLONIA DE PROCEDENCIA DEL TUTOR");
		return false;
	}


	if(formulario.cp_pad.value.length==0){
		formulario.cp_pad.focus();
		alert("INGRESA EL CODIGO POSTAL");
		return false;
	}

	if(formulario.calle_pad.value.length==0){
		formulario.calle_pad.focus();
		alert("INGRESA EL NOMBRE DE LA CALLE NO VACIO");
		return false;
	}
	if(formulario.no_pad.value.length==0){
		formulario.no_pad.focus();
		alert("INGRESA EL NUMERO DE LA CALLE");
		return false;
	}

	if(formulario.tel1_pad.value.length==0){
		formulario.tel1_pad.focus();
		alert("INGRESA EL TELEFONO DEL TUTOR");
		return false;
	}
	var regCel1="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
	if(formulario.tel1_pad.value.search(regCel1) != 0){	
		alert("NUMERO DE TELEFONO INVALIDO,REVISA LOS DATOS");
		formulario.tel1_pad.focus();
		return false;	
	}

	if(formulario.mail_pad.value.length==0){
		formulario.mail_pad.focus();
		alert("INGRESA EL CORREO DEL TUTOR");
		return false;
	}
	if(formulario.tel2_pad.value.length==0){
		formulario.tel2_pad.focus();
		alert("INGRESA EL SEGUNDO TELEFONO DEL TUTOR");
		return false;
	}
	var regCel2="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
	if(formulario.tel2_pad.value.search(regCel2) != 0){	
		alert("NUMERO DE TELEFONO INVALIDO,REVISA LOS DATOS");
		formulario.tel2_pad.focus();
		return false;	
	}

	if(formulario.ocupacion_pad.value.length==0){
		formulario.ocupacion_pad.focus();
		alert("INGRESA LA OCUPACION DEL TUTOR");
		return false;
	}
	if(formulario.ltrabajo_pad.value.length==0){
		formulario.ltrabajo_pad.focus();
		alert("INGRESA EL LUGAR DE TRABAJO DEL TUTOR");
		return false;
	}

	if(!confirm("�DESEAS CONFIRMAR LOS DATOS?\nIMPORTANTE:ANTES DE ENVIAR REVISA QUE LOS DATOS SEAN CORRECTOS,Y NO TENGAS PROBLEMA EN TU TRAMITE\n,SIEMPRE PODRAS CONSULTAR EN CONTROL ESCOLAR\n,�ESTAS SEGURO DE ENVIAR?")){
		alert("HAS CANCELADO EL ENVIO,REVISA DE NUEVO LOS DATOS ...OK");
		return false;
	}




	return true;


}

function cargarBachilleratos(){
	//Bachilleratos a elegir

	var opcion="7";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion,
		// beforeSend:inicioEnvio,
		success:llegadaBachilleratos,
		timeout:4000,
		error:problemasBachilleratos
	}); 
	return false;
}
function llegadaBachilleratos(datos){
	//var bactual=document.getElementById("bac_alu").value;
	$("#bac_alu").html(datos);
	//var bnuevo=document.getElementById("bac_alu").value;
	//if(bactual!=bnuevo){
	//cargarBachilleratoActual(bactual);
	//}

}
function problemasBachilleratos(){
	alert('Problemas en el servidor.');
}
/****
	function cargarBachilleratoActual(b_actual){
		var opcion="8";

		$.ajax({
		       async:true,
		       type: "POST",
		       dataType: "html",
		       contentType: "application/x-www-form-urlencoded",
		       url:"../../php/controlador.php",
		       data:"opcion="+opcion+"&b_actual="+b_actual,
		      // beforeSend:inicioEnvio,
		       success:llegadaBachilleratoActual,
		       timeout:4000,
		       error:problemasBachilleratoActual
		     }); 
		     return false;

	}


	function llegadaBachilleratoActual(datos){
		$("#bac_alu").html(datos);
		}
		function problemasBachilleratoActual(){
		alert('Problemas en el servidor.');
		}

 **/

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

function validarProblemasSalud(opcion){
	var contenedorPSalud=document.getElementById("psalud_alumno");

	if(opcion=='si'){
		contenedorPSalud.style.display='table';
	}
	else{
		if(opcion=='no'){
			contenedorPSalud.style.display='none';
			document.getElementById("psalud_alu").value='';
		}
		else{
			contenedorPSalud.style.display='none';
			document.getElementById("psalud_alu").value='';
			alert("Selecciona si tienes problemas de salud");
		}
	}
}

function validarTieneBeca(opcion){
	var contenedorBeca=document.getElementById("beca_alumno");

	if(opcion=='si'){
		contenedorBeca.style.display='table';
	}
	else{
		if(opcion=='no'){
			contenedorBeca.style.display='none';
			document.getElementById("tbeca_alu").value='';
		}
		else{
			contenedorBeca.style.display='none';
			document.getElementById("tbeca_alu").value='';
			alert("Selecciona si cuentas con una beca");
		}
	}
}


function validarServicioSalud(opcion){
	var contenedorSalud=document.getElementById("tsalud_alumno");

	if(opcion=='si'){
		contenedorSalud.style.display='table';
	}
	else{
		if(opcion=='no'){
			contenedorSalud.style.display='none';
			document.getElementById("tsalud_alu").value='';
		}
		else{
			contenedorSalud.style.display='none';
			document.getElementById("tsalud_alu").value='';
			alert("Selecciona si cuentas con un servicio de salud");
		}
	}	
}

function validarLenguaAlumno(opcion){
	var contenedorLengua=document.getElementById("tlengua_alumno");

	if(opcion=='si'){
		contenedorLengua.style.display='table';
	}
	else{
		if(opcion=='no'){
			contenedorLengua.style.display='none';
			document.getElementById("tlengua_alu").value='';
		}
		else{
			contenedorLengua.style.display='none';
			document.getElementById("tlengua_alu").value='';
			alert("Selecciona si hablas o dominas una lengua indigena");
		}
	}
}


function cargarFecha(){



	var fecha=new Date();
	var meses=new Array
	("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	var mesTitulo=meses[fecha.getMonth()];
	var ciclo=parseInt(fecha.getFullYear())+1;
	var dia=fecha.getDate();
	var mes=parseInt(fecha.getMonth())+1;
	var year=fecha.getFullYear();

	var contenedorDia=document.getElementById("dia");
	var contenedorMes=document.getElementById("mes");
	var contenedorYear=document.getElementById("year");

	if(dia<10){dia='0'+dia;}
	if(mes<10){mes='0'+mes;}

	var cadenaFecha=year+"-"+mes+"-"+dia;
	contenedorDia.innerHTML=fecha.getDate()+" DE";
	contenedorMes.innerHTML=mesTitulo+" DEL";
	contenedorYear.innerHTML=fecha.getFullYear();

	document.getElementById('fecha').value=cadenaFecha;
}



function cargarAlumno(){
	//Datos elementales alumno
	var matricula='<?php echo $matricula;?>';
	var opcion="6";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion+"&matricula="+matricula,
		// beforeSend:inicioEnvio,
		success:llegadaAlumno,
		timeout:4000,
		error:problemasAlumno
	}); 
	return false;
}
function llegadaAlumno(datos){
	var datosAlumno=datos.split("#");

	document.getElementById("mat_alu").value=datosAlumno[0];
	document.getElementById("nom_alu").value=datosAlumno[1];
	document.getElementById("ap_alu").value=datosAlumno[2];
	document.getElementById("am_alu").value=datosAlumno[3];
	document.getElementById("codsec_alu").value=datosAlumno[4];
	document.getElementById("sec_alu").value=datosAlumno[5];
	$("#bac_alu").html("<option value='"+datosAlumno[6]+"'>"+datosAlumno[7]+"</option>");
}
function problemasAlumno(){
	alert('Problemas en el servidor.');
}


function cargarCiclo(){
	//Elige ciclo actual
	var opcion="5";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion,
		// beforeSend:inicioEnvio,
		success:llegadaCiclo,
		timeout:4000,
		error:problemasCiclo
	}); 
	return false;
}
function llegadaCiclo(datos){
	var cicloActual=datos.split("#");


	$("#ciclo_label").html(cicloActual[1]);
	document.getElementById("ciclo_caja").value=cicloActual[0];
	document.getElementById("ciclo_nombre").value=cicloActual[1];
}
function problemasCiclo(){
	alert('Problemas en el servidor.');
}


function cargarEstados(){
//	Elige estados
	var opcion="1";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion,
		// beforeSend:inicioEnvio,
		success:llegadaEstados,
		timeout:4000,
		error:problemasEstados
	}); 
	return false;
}
function llegadaEstados(datos){

	$("#estado_alu").html(datos);
	$("#estado_pad").html(datos);
}
function problemasEstados(){
	alert('Problemas en el servidor.');
}
function cargarCiudades(id){
	var idestado=id;
	var opcion="2";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion+"&idestado="+idestado,
		//beforeSend:inicioEnvio,
		success:llegadaCiudades,
		timeout:4000,
		error:problemasCiudades
	}); 
	return false;

}
function llegadaCiudades(datos){
	$("#ciudad_alu").html(datos);
}
function problemasCiudades(datos){
	alert('Problemas en el servidor al cargar las ciudades.');
}

function cargarCiudadesP(id){
	var idestado=id;
	var opcion="2";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion+"&idestado="+idestado,
		//beforeSend:inicioEnvio,
		success:llegadaCiudadesP,
		timeout:4000,
		error:problemasCiudadesP
	}); 
	return false;

}
function llegadaCiudadesP(datos){
	$("#ciudad_pad").html(datos);
}
function problemasCiudadesP(datos){
	alert('Problemas en el servidor al cargar las ciudades.');
}


function cargarColoniasP(id){

	var idciudad=id;
	var opcion="3";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion+"&idciudad="+idciudad,
		beforeSend:inicioColoniasP,
		success:llegadaColoniasP,
		timeout:8000,
		error:problemasColoniasP
	}); 
	return false;


}

function llegadaColoniasP(datos){
	$("#col_pad").html(datos);
	$("#cargarColoniasP").html('');
}
function problemasColoniasP(){

	alert('Problemas en el servidor al cargar las colonias.');
}

function inicioColoniasP(){
	var x=$("#cargarColoniasP");
	x.html("Cargando...<img src='../../images/loading.gif'>");
}

function cargarColonias(id){

	var idciudad=id;
	var opcion="3";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion+"&idciudad="+idciudad,
		beforeSend:inicioColonias,
		success:llegadaColonias,
		timeout:8000,
		error:problemasColonias
	}); 
	return false;


}

function llegadaColonias(datos){
	$("#col_alu").html(datos);
	$("#cargarColonias").html('');
}
function problemasColonias(){

	alert('Problemas en el servidor al cargar las colonias.');
}

function inicioColonias(){
	var x=$("#cargarColonias");
	x.html("Cargando...<img src='../../images/loading.gif'>");
}


function cargarCp(id){
	var idcolonia=id;
	var opcion="4";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion+"&idcolonia="+idcolonia,
		beforeSend:inicioCp,
		success:llegadaCp,
		timeout:4000,
		error:problemasCp
	}); 
	return false;

}
function inicioCp(){
	var x=$("#cargarCp");
	x.html("Cargando...<img src='../../images/loading.gif'>");
}
function llegadaCp(datos){
	var cp=document.getElementById('cp_alu');
	$("#cargarCp").html('');
	if(datos=='0'){
		cp.value='';
	}
	else{
		cp.value=datos;
	}
}
function problemasCp(){
	alert('Problemas en el servidor al cargar los codigos postales.');
}

function cargarCpPadre(id){
	var idcolonia=id;
	var opcion="4";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"../../php/controlador.php",
		data:"opcion="+opcion+"&idcolonia="+idcolonia,
		beforeSend:inicioCpPadre,
		success:llegadaCpPadre,
		timeout:4000,
		error:problemasCpPadre
	}); 
	return false;

}
function inicioCpPadre(){
	var x=$("#cargarCpPadre");
	x.html("Cargando...<img src='../../images/loading.gif'>");
}
function llegadaCpPadre(datos){
	var cp=document.getElementById('cp_pad');
	$("#cargarCpPadre").html('');
	if(datos=='0'){
		cp.value='';
	}
	else{
		cp.value=datos;
	}
}
function problemasCpPadre(){
	alert('Problemas en el servidor al cargar los codigos postales.');
}
function cargarScroll(){

	$(document).ready(function(){
		$(window).scroll(function(){
			if($(this).scrollTop()>100){
				$('.scrollup').fadeIn();
			}
			else{
				$('.scrollup').fadeOut();
			}
		});
		$('.scrollup').click(function(){
			$("html.body").animate({scrollTop:0},600);
		});
	});
}

function cancelarRegistro(){
	var respuesta=confirm("Deseas cancelar la solicitud?,Recuerda que los datos no se guardaran y deberas volver a empezar");
	if(respuesta){
		alert("Has cancelado la solicitud");
		window.location='../../php/logout.php?opcion=2';
	}
	else{
		alert("Has decidido continuar el registro");
	}
}