
function cargarBachilleratos(){
	//Bachilleratos a elegir

	var opcion="10";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion,
		// beforeSend:inicioEnvio,
		success:llegadaBachilleratos,
		timeout:4000,
		error:problemasBachilleratos
	}); 
	return false;
}
function llegadaBachilleratos(datos){
	$("#bac_alu").html(datos);

}
function problemasBachilleratos(){
	alert('Problemas en el servidor.');
}

function cargarSecciones(){

	//secciones a elegir

	var opcion="11";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
		data:"opcion="+opcion,
		// beforeSend:inicioEnvio,
		success:llegadaSecciones,
		timeout:4000,
		error:problemasSecciones
	}); 
	return false;
}
function llegadaSecciones(datos){

	$("#sec_alu").html(datos);

}
function problemasSecciones(){
	alert('Problemas en el servidor.');
}

function cargarEstados(){
	//Elige estados
	var opcion="1";

	$.ajax({
		async:true,
		type: "POST",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:"controlador.php",
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
	cargarBachilleratos();
	cargarSecciones();
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
		url:"controlador.php",
		data:"opcion="+opcion+"&idestado="+idestado,
		beforeSend:inicioCiudades,
		success:llegadaCiudades,
		timeout:4000,
		error:problemasCiudades
	}); 
	return false;

}
function inicioCiudades(){
	var x=$("#cargarCiudades");
	x.html("Cargando Ciudades...<img src='../images/loading.gif'>");
}
function llegadaCiudades(datos){
	$("#ciudad_alu").html(datos);
	$("#cargarCiudades").html('');
}
function problemasCiudades(datos){
	alert('Problemas en el servidor al cargar las ciudades.');
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

function llegadaColonias(datos){
	$("#colonia_alu").html(datos);
	$("#cargarColonias").html('');
}
function problemasColonias(){

	alert('Problemas en el servidor al cargar las colonias.');
}

function inicioColonias(){
	var x=$("#cargarColonias");
	x.html("Cargando Colonias...<img src='../images/loading.gif'>");
}