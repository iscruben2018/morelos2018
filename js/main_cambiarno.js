
var opcion;
/*FUNCIONES PARA OPTIMIZAR CODIGO Y MEJORAR COMPATIBILIDAD CON AJAX EN IE Y GRAL*/

 function enviarDatos(datos,url){
    objeto=crearObjeto();
    objeto.open("POST",url,true);
    objeto.onreadystatechange=elegirOperacion;
    objeto.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    objeto.send(datos);  
}

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


function elegirOperacion(){
    if(objeto.readyState==4){//Si esta lista la peticion
        if(objeto.status==200){//Si la peticion se realizo OK

            switch(opcion){
            case "18":

            var respuesta=objeto.responseText;

            document.getElementById("calendario").innerHTML=respuesta;
            break;

            case "12":
            var respuesta=objeto.responseText;
            //alert(respuesta);
            cargarReporte();
            break;
            case "13":
            	var respuesta=objeto.responseText;
            	//alert(respuesta);
            	cargarReporte();
            break;
            default:
            break;
            
            }
            
        }
    }
}


/************/

function cargarReporte(){

	opcion="18";
	enviarDatos("opcion="+opcion,"controlador.php");

}


function cancelarReinscripcion(opcion,matricula){
	
	opcion="13";
	var matricula=matricula;

	enviarDatos("opcion="+opcion+"&matricula_pro="+matricula,"controlador.php");

}


function aceptarReinscripcion(opcion,matricula){
	
	opcion="12";
	var matricula=matricula;
	enviarDatos("opcion="+opcion+"&matricula_pro="matricula,"controlador.php");

}

function consultaIndividualReinscripcion(){

	var matricula=document.getElementById("busqueda");
	if(matricula.value==''){
		alert("INGRESA LA MATRICULA PARA LA CONSULTA");
		matricula.focus();
	}
	else{

		opcion="18";
		enviarDatos("opcion="+opcion+"&busqueda="+matricula.value,"controlador.php");

	}

}