
//Leer una Cookie creada
function readCookie(name) {

return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + name.replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;

}



//Envia una peticion Ajax

function enviarDatos(datos,url){
    objeto=crearObjeto();
    objeto.open("POST",url,true);
    objeto.onreadystatechange=elegirOperacion;
    objeto.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    objeto.send(datos);  
}
//Crea un objeto HttpRequest
 function crearObjeto(){
    if(window.XMLHttpRequest){
        xml=new XMLHttpRequest();
    }
    else{
        if(ActiveXObject){
            var versiones=["MSXML2.XMLHttp.5.0","MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0","MSXML2.XMLHttp","Microsoft.XMLHttp"];
            for(i=0;i<versiones.length;i++){
                try{
                    
                    xml=new ActiveXObject(versiones[i]);
                    return xml;
                }
                catch(e){
                alert("No se creo la instancia"+e)  
                }
                
            }
        }
    }
    return xml;
}
 
//Funcion que recibe el nombre del campo y el mensaje,debe existir una etiqueta con ese  id del input

function agregarMensaje( nombre,texto) {
	document.getElementById("label-"+nombre).className="ui-state-highlight";
	document.getElementById("label-"+nombre).innerHTML=texto;
	
}

//Funcion que valida los campos vacios,recibe como parametro los nombres de los campos y el mensaje
//de error.el mensaje se pone en labels con el nombre del campo.
function validarCampos(nombre,mensaje){
  
	if(document.getElementById(nombre).value==''||document.getElementById(nombre).value=='0'){
		document.getElementById(nombre).className= "ui-state-error";
		agregarMensaje(nombre,mensaje);
		document.getElementById(nombre).focus();
		
		//alert(mensaje)
		
		return false;
	}
	else{
		document.getElementById(nombre).className= "form-control";
		agregarMensaje(nombre,"");
		return true;
	}
}


//Funcion que recibe como parametro el campo ,la expresion regular y el mensaje
function validarExpresion( o, regexp, n ) {
	
	if ( !( regexp.test( document.getElementById(o).value ) ) ) {
		document.getElementById(o).className= "ui-state-error";
		agregarMensaje(o,n);
		//alert( n );
		return false;
	} else {
		document.getElementById(o).className= "form-control";
		agregarMensaje(o,"");
		return true;
	}
}


