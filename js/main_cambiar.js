//FUNCIONES NUEVAS
var opcion;

 function sendData(data,url){
    objeto=makeObject();
    objeto.open("POST",url,true);
    objeto.onreadystatechange=chooseOperation;
    objeto.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    objeto.send(data);  
}

 function makeObject(){
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


function chooseOperation(){
    if(objeto.readyState==4){//Si esta lista la peticion
        if(objeto.status==200){//Si la peticion se realizo OK

            switch(opcion){
            case "18":
            var respuesta=objeto.responseText;
            document.getElementById("calendario").innerHTML=respuesta;
            break;
            default:
            break;
            
            }
            
        }
    }
}


//


function cargarReporte(){

	opcion="18";
	sendData("opcion="+opcion,"controlador.php");


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