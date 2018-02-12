
var imagenError="<img src='../images/iconos/delete.ico' width=30 heigth=30 style='border:none;'>";
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
	document.getElementById("label-"+nombre).className="labelError";
	document.getElementById("label-"+nombre).innerHTML=texto;
	
}

//Funcion que valida los campos vacios,recibe como parametro los nombres de los campos y el mensaje
//de error.el mensaje se pone en labels con el nombre del campo.
function validarCampos(nombre,mensaje){
  
	if(document.getElementById(nombre).value==''||document.getElementById(nombre).value=='0'){
		document.getElementById(nombre).className= "campoError";
		agregarMensaje(nombre,mensaje);
		document.getElementById(nombre).focus();

		
		return false;
	}
	else{
		document.getElementById(nombre).className= "";
		agregarMensaje(nombre,"");
		return true;
	}
}

//Revisar el tamaño permitido de un campo
//campo,nombre del campo,minimo,maximo
function validarLongitud( campo, min, max ) {
	
	
	if ( $( "#"+campo+"" ).val().length > max || $( "#"+campo+"" ).val().length < min ) {
		$( "#"+campo+"" ).addClass( "campoError" );
		document.getElementById(campo).focus();
		agregarMensaje(campo,imagenError+"El campo " + campo + " debe tener " + max + " digitos maximo." );
		return false;
	} else {
		return true;
	}
}

function validarRegExp(o,regexp,n){
	

	if(document.getElementById(o).value.search(regexp) != 0){
		document.getElementById(o).className= "campoError";
		agregarMensaje(o,n);
		//alert( n );
		return false;
	}
	else{
		document.getElementById(o).className= "";
		agregarMensaje(o,"");
		return true;
		
	}
	
}

//Funcion que recibe como parametro el campo ,la expresion regular y el mensaje
//Revisar
function validarExpresion( o, regexp, n ) {
	
	if ( !( regexp.test( document.getElementById(o).value ) ) ) {
		document.getElementById(o).className= "campoError";
		agregarMensaje(o,n);
		//alert( n );
		return false;
	} else {
		document.getElementById(o).className= "";
		agregarMensaje(o,"");
		return true;
	}
}

