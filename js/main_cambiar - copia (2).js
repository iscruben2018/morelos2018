function cargarReporte(){

	var datos=new FormData();
	var sol=new XMLHttpRequest();
	var opcion="18";


	datos.append("opcion",opcion);

	sol.addEventListener("load",respuestaReporte,false);
	sol.open("POST","controlador.php",true);

	sol.send(datos);

}
function respuestaReporte(res){
	var respuesta=res.target.responseText;

	document.getElementById("calendario").innerHTML=respuesta;
}

function cancelarReinscripcion(opcion,matricula){
	var datos=new FormData();
	var sol=new XMLHttpRequest();
	var opcion="13";
	var matricula=matricula;


	datos.append("opcion",opcion);
	datos.append("matricula_pro",matricula);

	sol.addEventListener("load",respuestaCancelarReinscripcion,false);
	sol.open("POST","controlador.php",true);

	sol.send(datos);

}
function respuestaCancelarReinscripcion(res){
	var respuesta=res.target.responseText;
	//alert(respuesta);
	cargarReporte();

}

function aceptarReinscripcion(opcion,matricula){
	var datos=new FormData();
	var sol=new XMLHttpRequest();
	var opcion="12";
	var matricula=matricula;


	datos.append("opcion",opcion);
	datos.append("matricula_pro",matricula);

	sol.addEventListener("load",respuestaAceptarReinscripcion,false);
	sol.open("POST","controlador.php",true);

	sol.send(datos);

}
function respuestaAceptarReinscripcion(res){
	var respuesta=res.target.responseText;
	//alert(respuesta);
	cargarReporte();

}
function consultaIndividualReinscripcion(){




	var matricula=document.getElementById("busqueda");
	if(matricula.value==''){
		alert("INGRESA LA MATRICULA PARA LA CONSULTA");
		matricula.focus();
	}
	else{

		var datos=new FormData();
		var sol=new XMLHttpRequest();
		var opcion="18";

		datos.append("opcion",opcion);
		datos.append("busqueda",matricula.value);

		sol.addEventListener("load",respuestaConsultaIndividualReinscripcion,false);
		sol.open("POST","controlador.php",true);

		sol.send(datos);
	}

}
function respuestaConsultaIndividualReinscripcion(res){
	var respuesta=res.target.responseText;

	document.getElementById("calendario").innerHTML=respuesta;

}