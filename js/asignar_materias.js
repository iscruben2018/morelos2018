var horaInicio;
var horaFin;
var day;
var folio;
var cajaHora;
var hinicio;
var hfin;
var dia;
var cve_ins;

function buscarMaterias(){

	var sem=document.getElementById("semestre");
	var semestre=sem.value;

	var bac=document.getElementById("bachilleratos");
	var bachillerato=bac.value;

	var opcion="21";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&cargaBachillerato="+bachillerato+"&cargaSemestre="+semestre,
		beforeSend:inicioMaterias,
		success:llegadaMaterias,
		timeout:4000,
		error:problemasMaterias
	}); 
	return false;
}
function inicioMaterias(){
	$("#cargarMaterias").html("Cargando...<img src='../images/loading.gif'>");	
}

function llegadaMaterias(datos){
	document.getElementById("capaMaterias").style.display='table';
	$("#cargarMaterias").html('');
	$("#materias").html(datos);
}
function problemasMaterias(datos){
	alert('OCURRIO UN ERROR,INTENTA VOLVER A CARGAR LA PAGINA');
}


function cargarDocentes(siia){


	var opcion="24";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion+"&siiaInscripcion="+siia,
		beforeSend:inicioDocenteInscripcion,
		success:llegadaDocenteInscripcion,
		timeout:4000,
		error:problemasDocenteInscripcion
	}); 
	return false;
}
function inicioDocenteInscripcion(){
	$("#cargarDocentes").html("Cargando...<img src='../images/loading.gif'>");	
}

function llegadaDocenteInscripcion(datos){

	document.getElementById("capaDocentes").style.display='table';
	$("#cargarDocentes").html('');
	$("#docentes").html(datos);
}
function problemasDocenteInscripcion(datos){
	alert('OCURRIO UN ERROR AL CARGAR LOS DATOS ,INTENTA ACTUALIZAR LA PAGINA ');
}


function validarHoras(hinicio,hfin,dia,cve_ins){


	var sol=new XMLHttpRequest();
	var datos=new FormData();
	var opcion="25";

	datos.append("hinicio",hinicio);
	datos.append("hfin",hfin);
	datos.append("dia",dia);
	datos.append("cve_ins",cve_ins);
	datos.append("opcion",opcion);

	sol.addEventListener("load",respuestaHoras,false);
	sol.open("POST","controlador.php",true);
	sol.send(datos);

}
function respuestaHoras(res){
	document.getElementById("verHora").value=res.target.responseText
}


function validarForm(formulario){

	var hinicio=document.getElementById("hinicio");
	horaInicio=hinicio.options[hinicio.selectedIndex].value;


	var hfin=document.getElementById("hfin");
	horaFin=hfin.options[hfin.selectedIndex].value;

	var dia=document.getElementById("dia");
	day=dia.options[dia.selectedIndex].value;

	folio=document.getElementById("cve_ins").value;


	var verHora=document.getElementById("verHora");


	validarHoras(horaInicio,horaFin,day,folio);
	cajaHora=document.getElementById("verHora").value;
	var aceptar=confirm("CONFIRMAR MATERIA?");


	if(formulario.materias.length.value==0||formulario.materias.value==''||formulario.materias.value=='0'){
		formulario.materias.focus();
		alert("SELECCIONA LA MATERIA");
		return false;
	}

	if(formulario.dia.length.value==0||formulario.dia.value==''||formulario.dia.value=='0'){
		formulario.dia.focus();
		alert("SELECCIONA EL DIA");
		return false;
	}
	if(formulario.hinicio.length.value==0||formulario.hinicio.value==''||formulario.hinicio.value=='0'){
		formulario.hinicio.focus();
		alert("SELECCIONA LA HORA DE INICIO");
		return false;
	}
	if(formulario.hfin.length.value==0||formulario.hfin.value==''||formulario.hfin.value=='0'){
		formulario.hfin.focus();
		alert("SELECCIONA LA HORA DE TERMINO");
		return false;
	}
	if(horaInicio==horaFin){
		formulario.hinicio.focus();
		alert("HORA DE INICIO NO VALIDA,SON IGUALES");
		return false;

	}
	if(horaFin==horaInicio){
		formulario.hfin.focus();
		alert("HORA DE INICIO NO VALIDA,SON IGUALES");
		return false;
	}

	if(horaInicio=='10:15' &&horaFin=='10:30'){
		formulario.hinicio.focus();
		alert("ESTA HORA NO ESTA DISPONIBLE PARA SELECCIONAR,ELIGE OTRA");
		return false;
	}

	if(formulario.docentes.length.value==0||formulario.docentes.value==''||formulario.docentes.value=='0'){
		formulario.docentes.focus();
		alert("SELECCIONA EL DOCENTE");
		return false;
	}



	if(aceptar){

	}
	else{
		return false;
	}

}
