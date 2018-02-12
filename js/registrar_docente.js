function validarForm(formulario){
	if(formulario.cve_doc.value==''||formulario.cve_doc.value.length==0){
		alert("Ingresa el INC del docente");
		formulario.cve_doc.focus();
		return false;
	}

	if(formulario.cve_doc.value=='77'){
		alert("Esta clave no se puede registrar pertenece a docente por asignar");
		formulario.cve_doc.focus();
		return false;
	}



	if(formulario.nombre_doc.value==''||formulario.nombre_doc.value.length==0){
		alert("NOMBRE VACIO");
		formulario.nombre_doc.focus();
		return false;
	}

	var regNombre= "[a-zA-Z��]";
	if(formulario.nombre_doc.value.search(regNombre) != 0){	
		alert("NOMBRE NO VALIDO,SOLO LETRAS \n Caracteres validos: \n A-Z");
		formulario.nombre_doc.focus();
		return false;	
	}
	if(formulario.ap_doc.value==''||formulario.ap_doc.value.length==0){
		alert("APELLIDO PATERNO VACIO");
		formulario.ap_doc.focus();
		return false;
	}

	if(formulario.ap_doc.value.search(regNombre) != 0){	
		alert("APELLIDO PATERNO NO VALIDO,SOLO LETRAS \n Caracteres validos: \n A-Z ");
		formulario.ap_doc.focus();
		return false;	
	}
	if(formulario.am_doc.value==''||formulario.am_doc.value.length==0){
		alert("APELLIDO PATERNO VACIO");
		formulario.am_doc.focus();
		return false;
	}

	if(formulario.am_doc.value.search(regNombre) != 0){	
		alert("APELLIDO MATERNO NO VALIDO,SOLO LETRAS \n Caracteres validos: \n A-Z ");
		formulario.am_doc.focus();
		return false;	
	}
	if(formulario.lada_doc.value==''||formulario.lada_doc.value.length==0){
		alert("LADA VACIA");
		formulario.lada_doc.focus();
		return false;
	}

	var regLada="[0-9]+";
	if(formulario.lada_doc.value.search(regLada) != 0){	
		alert("LA LADA NO ADMITE LETRAS");
		formulario.lada_doc.focus();
		return false;	
	}

	if(formulario.tel_doc.value==''||formulario.tel_doc.value.length==0){
		alert("TELEFONO VACIO");
		formulario.tel_doc.focus();
		return false;
	}

	var regTel="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
	if(formulario.tel_doc.value.search(regTel) != 0){	
		alert("TELEFONO NO VALIDO,REVISA LOS DATOS (Ejemplo 7151231234, 715-....)");
		formulario.tel_doc.focus();
		return false;	
	}


	if(formulario.correo_doc.value.length==0 ||formulario.correo.value==''){	
		alert("CORREO VACIO");
		formulario.correo_doc.focus();
		return false;	
	}


}