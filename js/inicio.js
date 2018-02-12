   var opcion;
    
    $(document).ready(function(){
    cargarEventos();
	
    $(window).scroll(function(){
    //Si se sabe que se esta cerca de arriba no se muestra el boton al contrario si
	if($(this).scrollTop()>100){
		$('.scrollup').fadeIn();
	}
	else{
		$('.scrollup').fadeOut();
	}
    });
    //al dar clic al boton se muestra la animacion
    $('.scrollup').click(function(){
    $("html,body").animate({scrollTop:0},800);
    return false;
    });
    });

 function cargarEventos(){
    var hoy=new Date();
    var dia=hoy.getDate();
    var mes=hoy.getMonth()+1;
    var anio=hoy.getFullYear();
    opcion="29";
    enviarDatos("dia="+dia+"&mes="+mes+"&anio="+anio+"&opcion="+opcion,"../php/controlador.php");

 }

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
            case "29":
            var divEventos=document.getElementById("cargarEventos");
            divEventos.innerHTML=objeto.responseText;
            break;
            default:
            break;
            
            }
            
        }
    }
}

	

 function verAgenda(dia,mes){
         
    	  var opcion="9";

    	$.ajax({
    	       async:true,
    	       type: "POST",
    	       dataType: "html",
    	       contentType: "application/x-www-form-urlencoded",
    	       url:"php/controlador.php",
    	       data:"opcion="+opcion+"&mesPublicacion="+mes+"&diaPublicacion="+dia,
    	       beforeSend:inicioAgenda,
    	       success:llegadaAgenda,
    	       timeout:5000,
    	       error:problemasAgenda
    	     }); 
    	     return false;
    	}
    	function llegadaAgenda(datos){
         
        $("#modal-noticias").html(datos);
        $("#loadingAgenda").html('');
    	}

        function inicioAgenda(){
        var x=$("#loadingAgenda");
         x.html("Cargando...<img src='../images/loading.gif'>");
        }
    	function problemasAgenda(datos){

        	
    	alert('Problemas en el servidor');
    	}
		
    </script>