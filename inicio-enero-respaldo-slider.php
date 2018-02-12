<!DOCTYPE html>
<html dir="ltr" lang="es-MX"><head>

    <meta charset="utf-8">
    <title>Bienvenido</title>
  

    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <meta name="keywords" content="Bienvenido a la prepa morelos,zitacuaro morelos,jose ma morelos , preparatoria morelos ,josemamorelos">
    
    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

    <!--BOOTSTRAP-->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
    <script src="js/bootstrap/bootstrap.min.js"></script> 
    <!--FIN BOOTSTRAP-->

    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <!-- End WOWSlider.com HEAD section -->

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <!--[if IE]> 
    <script type="text/javascript">
    var e =("abbr,section,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
    for (var i=0; i<e.length; i++) {
    document.createElement(e[i]);
    }
    </script>
    <![endif]-->
    <script type="text/javascript">
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
    enviarDatos("dia="+dia+"&mes="+mes+"&anio="+anio+"&opcion="+opcion,"php/controlador.php");

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
         x.html("Cargando...<img src='images/loading.gif'>");
        }
    	function problemasAgenda(datos){

        	
    	alert('Problemas en el servidor');
    	}
		
    </script>
     

<script>jQuery(function ($) {
    'use strict';
    if ($.fn.themeSlider) {
        $(".art-slidecontainerDSC01891").each(function () {
            var slideContainer = $(this), tmp;
            var inner = $(".art-slider-inner", slideContainer);
            inner.children().filter("script").remove();
            var helper = null;
            
            if ($.support.themeTransition) {
                helper = new BackgroundHelper();
                helper.init("fade", "next", $(".art-slide-item", inner).first().css($.support.themeTransition.prefix + "transition-duration"));
                inner.children().each(function () {
                    helper.processSlide($(this));
                });

                
            } else if (browser.ie && browser.version <= 8) {
                var slidesInfo = {
".art-slideDSC018910": {
    "bgimage" : "url('images/slideDSC018910.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018911": {
    "bgimage" : "url('images/slideDSC018911.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018912": {
    "bgimage" : "url('images/slideDSC018912.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018913": {
    "bgimage" : "url('images/slideDSC018913.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018914": {
    "bgimage" : "url('images/slideDSC018914.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018915": {
    "bgimage" : "url('images/slideDSC018915.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018916": {
    "bgimage" : "url('images/slideDSC018916.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018917": {
    "bgimage" : "url('images/slideDSC018917.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
}
                };
                $.each(slidesInfo, function(selector, info) {
                    processElementMultiplyBg(slideContainer.find(selector), info);
                });
            }

            inner.children().eq(0).addClass("active");
            slideContainer.themeSlider({
                pause: 2600,
                speed: 600,
                repeat: true,
                animation: "fade",
                direction: "next",
                navigator: slideContainer.siblings(".art-slidenavigatorDSC01891"),
                helper: helper
            });
            
                        
        });
    }
});
</script>

<style>.art-content .art-postcontent-0 .layout-item-old-0 { border-top-width:1px;border-top-style:solid;border-top-color:#EAEEF3;margin-top: 7px;margin-bottom: 7px;  }
.art-content .art-postcontent-0 .layout-item-old-1 { padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-old-2 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#EAEEF3;border-right-color:#EAEEF3;border-bottom-color:#EAEEF3;border-left-color:#EAEEF3; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-old-3 { margin-bottom: 7px;  }
.art-content .art-postcontent-0 .layout-item-old-4 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#EAEEF3;border-right-color:#EAEEF3;border-bottom-color:#EAEEF3;border-left-color:#EAEEF3; padding-right: 10px;padding-left: 10px; vertical-align: middle;  }
.art-content .art-postcontent-0 .layout-item-old-5 {  border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-old-6 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#EAEEF3;border-right-color:#EAEEF3;border-bottom-color:#EAEEF3;border-left-color:#EAEEF3; color: #000000; background: #D9DFE3 url('images/84da3.png') scroll; padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 5px;  }
.art-content .art-postcontent-0 .layout-item-0 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#EAEEF3;border-right-color:#EAEEF3;border-bottom-color:#EAEEF3;border-left-color:#EAEEF3; color: #000000; background: #ECEFF4 url('images/3199e.png') scroll; padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 5px;  }
.ie7 .art-post .art-layout-cell {border:thin; !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:thin; !important; padding:0 !important; }

</style></head>
<body>
<?php
require_once 'php/TablaPublicacion.php';
require_once 'php/Publicacion.php';

$tablanoticias=new TablaPublicacion();
$publicacion=new Publicacion();

$publicacion=$tablanoticias->sliderNoticias();

if(sizeof($publicacion)==0){
	$cadena="";
	$cadena.="<div data-p='112.50' style='display: none;'>";
	$cadena.="<div align='center'><img src='images/morelos_opacity.png' width='220px' height='170px' class='img-responsive' /></div>";
	$cadena.="<div data-u='thumb' style='-webkit-border-radius:3px;font-size:5px;'>No hay noticias disponibles este mes";
	$cadena.="</div>";
	$cadena.="</div><br>";
}
else{
$cadena="";
$meses = array ("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic" 
);
foreach ($publicacion as $noticias){

	 /******************************************************************************************************************
	 MOTICIAS POR MES
     r_martinez_b@hotmail.com
	 Junio 2016
	 El array de noticias se indexa con los valores de la columnas de la consulta de mysql,los campos que se
	 obtienen de acuerdo al indice del array son los siguientes que se usan para la publicacion.
	 *******************************************************************************************************************
	 **0 indica id publicacion ,
	 **1 nombre del usuario(no personal),
	 **2 tipo de usuario(docente,admin),
	 **3 indica categoria del aviso(para docente,alumno,padre de familia,
	 **4 indica la fecha del anuncio,
	 **5 el titular del anuncion o noticia(solo para noticias ),
	 **6 indica el texto de lo que contiene la publicacion,
	 **7 indica la imagen de vista previa para la publicacion en la carpeta imagenes,
	 **8 archivo que se sube (opcional) a la publicacion para su descarga*************
	 *******************************************************************************************************************
	 Se recorre el array para llenar el slider de noticias principal y se hace referencia a la publicacion de noticas por id
	 *******************************************************************************************************************/
	
    /**************FORMATOS DE FECHA**********************************************************/
            
            $mes = substr ( @date ( "d-m-Y", strtotime ( $noticias[4] ) ), 3, 2 );
            
            $dia = @date ( "d", strtotime ( $noticias[4]) );
            $titulo_mes = $meses [$mes - 1];
            $year = @date ( "Y", strtotime ( $noticias[4] ) );
            
            $cadenaFecha= $dia . "/". $titulo_mes . "/" . $year;
   /******************************************************************************************/
    $cadena.="<div data-p='112.50' style='display: none;'><br>";
	$cadena.="<a href='blog/noticias.php?idpublicacion=".$noticias[0]."'>";
	$cadena.="<img class='highlight' data-u='image' src='images/publicacion/".$noticias[7]."' /></a>";
	$cadena.="<div data-u='thumb'>".$noticias[5]." ".$cadenaFecha."";
	$cadena.="</div>";
	$cadena.="</div>";

}

}


?>

<div id="art-main">
<header class="art-header">

    <div class="art-shapes">
        <div class="art-textblock art-object2134142508">
        <div class="art-object2134142508-text-container">
        <div class="art-object2134142508-text">José Ma. Morelos<br>de Zitácuaro S.C</div>
    </div>
    
</div><div class="art-textblock art-object438453684">
        <div class="art-object438453684-text-container">
        <div class="art-object438453684-text">Incorporada <br>a la U.M.S.N.H</div>
    </div>
    
</div><div class="art-textblock art-object2030094490">
        <div class="art-object2030094490-text-container">
        <div class="art-object2030094490-text">Clave:<br>109-218.1 "74"</div>
    </div>
    
</div>
            </div>

<h1 class="art-headline">
    <a href="#">ESCUELA PREPARATORIA</a>
</h1>
<h2 class="art-slogan">"CUNA DE HÉROES,CRISOL DE PENSADORES"</h2>





<nav class="art-nav">
<!--MENU PRINCIPAL-->

    <ul class="art-hmenu">
    <li><a href="inicio.php" class="active">Inicio</a></li><li><a href="#">Acerca de</a><ul><li><a href="acerca-de/quienes-somos.html">Qui&eacute;nes Somos</a></li><li><a href="acerca-de/ubicacion.html">Ubicación</a></li><li><a href="acerca-de/directorio.html">Directorio</a></li><li>
    <a href="archivos/pdf/web/reglamento_preview.html" target='_blank'>Reglamento</a></li></ul></li><li><a href="#">Preparatoria</a><ul><li><a href="preparatoria/formacion-educativa.html">Formación Educativa</a></li><li><a href="#">Bachilleratos</a><ul><li><a href="preparatoria/bachilleratos/ciencias-economico-administrativas.html">Ciencias Económico-Administrativas</a></li><li><a href="preparatoria/bachilleratos/ciencias-historico-sociales.html">Ciencias Hist&oacute;rico-Sociales</a></li><li><a href="preparatoria/bachilleratos/ciencias-quimico-biologicas.html">Ciencias Químico-Biológicas</a></li><li><a href="preparatoria/bachilleratos/ingenieria-y-arquitectura.html">Ingeniería y Arquitectura</a></li></ul></li></ul></li><li><a href="#">Usuarios</a><ul><li><a href="#">Alumnos</a><ul><li><a href="usuarios/alumnos/calificaciones.html">Calificaciones</a></li><li><a href="usuarios/alumnos/solicitud-reinscripcion.html">Solicitud de reinscripci&oacute;n</a></li><li><a href="usuarios/alumnos/consulta-de-horario.html">Consulta de Horario</a></li></ul></li><li><a href="usuarios/futuros-estudiantes.html">Futuros Estudiantes</a></li>
    <li>
    <a href="#">Docentes</a>
    <ul>
    <!-- <li><a href="usuarios/docentes/temarios.html">Temarios</a></li>-->
    <!-- <li><a href="usuarios/docentes/formatos.html">Formatos</a></li>-->
     <li><a href="usuarios/docentes/index.html">Informaci&oacute;n Docente</a></li>
    </ul></li><li><a href="#">Padres de Familia</a><ul><li><a href="usuarios/padres-de-familia/buzon.html">Buzón</a></li></ul></li></ul></li><li><a href="#">Servicios</a><ul><li><a href="servicios/biblioteca.html">Biblioteca</a></li><li><a href="servicios/trabajo-social.html">Trabajo Social</a></li><li><a href="servicios/psicologia.html">Psicología</a></li><li><a href="servicios/control-escolar.html">Control Escolar</a></li><li><a href="servicios/centro-de-computo.html">Centro de Cómputo</a></li><li><a href="servicios/prefectura.html">Prefectura</a></li><li><a href="servicios/subdireccion-academica.html">Subdirección Académica</a></li></ul></li>
   
    <li><a href="#">Blog</a><ul>
  <li><a href="http://www.prepamoreloszitacuaro.blogspot.com" target='_blank'>Blog escolar</a></li>
        <li><a href="blog/noticias.php">Noticias</a></li>
    <li><a href="blog/galeria.html">Galería</a></li></ul></li></ul> 
    </nav>

<!--MENU PRINCIPAL FIN-->               
</header>
<div class="art-pageslider" >
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
        <li><img src="data1/images/images__22.jpg" alt="images_ (22)" title="images_ (22)" id="wows1_0"/></li>
    </ul></div>
    <div class="ws_bullets"><div>
        <a href="data1/images/images__22.jpg" title="images_ (22)"><span><img src="data1/tooltips/images__22.jpg" alt="images_ (22)"/>1</span></a>
        <a href="data1/images/vlcsnap2016061715h27m02s16.png" title="vlcsnap-2016-06-17-15h27m02s16"><span>2</span></a>
        <a href="data1/images/images__28.jpg" title="images_ (28)"><span>3</span></a>
        <a href="data1/images/images__25.jpg" title="images_ (25)"><span>4</span></a>
        <a href="data1/images/vlcsnap2016061715h27m22s211.png" title="vlcsnap-2016-06-17-15h27m22s211"><span>5</span></a>
        <a href="data1/images/vlcsnap2016061715h27m51s246.png" title="vlcsnap-2016-06-17-15h27m51s246"><span>6</span></a>
        <a href="data1/images/vlcsnap2016061715h28m05s129.png" title="vlcsnap-2016-06-17-15h28m05s129"><span>7</span></a>
        <a href="data1/images/vlcsnap2016061715h28m13s212.png" title="vlcsnap-2016-06-17-15h28m13s212"><span>8</span></a>
        <a href="data1/images/vlcsnap2016061715h28m37s195.png" title="vlcsnap-2016-06-17-15h28m37s195"><span>9</span></a>
        <a href="data1/images/vlcsnap2016061715h28m53s101.png" title="vlcsnap-2016-06-17-15h28m53s101"><span>10</span></a>
        <a href="data1/images/vlcsnap2016061715h29m42s71.png" title="vlcsnap-2016-06-17-15h29m42s71"><span>11</span></a>
        <a href="data1/images/vlcsnap2016061715h30m41s149.png" title="vlcsnap-2016-06-17-15h30m41s149"><span>12</span></a>
    </div></div>
    <div class="ws_script" style="position:absolute;left:-99%">
        <!--<a href="http://wowslider.com">http://wowslider.com/</a> by WOWSlider.com v8.7--></div>
<div class="ws_shadow"></div>
</div>  
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
</div>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
			
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
						<!--  <article  style="filter:alpha(opacity=90);-moz-opacity: 0.9;opacity: 0.9;-khtml-opacity: 0.9;background-repeat:no-repeat;background-position:70px;">-->
						<article class='art-post art-article'>
                         
                                <div class="art-postcontent art-postcontent-0 clearfix">
								<div class="art-content-layout layout-item-old-5">
								
    <div class="art-content-layout-row">
    <div id='panel' class='titulos'>
    <h3 style="color:white;">
    <span class="glyphicon glyphicon-file" style='color:white;'>Noticias </span> 
    <a href='blog/noticias.php' style='text-decoration: none;'>
    <span class="glyphicon glyphicon-plus" style='color:white;'>Leer m&aacute;s</span></a>
    </h3>
    </div>
    </div>
</div>


<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%" >
        <!-- BEGIN #region Jssor Slider Begin -->
         
<script  type='text/javascript' src="js/jssor.slider.js"></script>
<!-- Generated by Jssor Slider Maker. -->
<!-- This is deep minimized demo, it works alone, it doesn't depend on any javascript library. -->
<link type='text/css' rel='stylesheet' href='css/jssor.slider.css'>
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
<!-- Loading Screen -->
<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">

	<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;">
	</div>
	<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;">
	</div>
</div>
<div data-u="slides"  style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
<?php echo $cadena;?>
</div>

    	<!-- Thumbnail Navigator -->
    <div data-u="thumbnavigator" class="jssort09-600-45" style="position:absolute;bottom:0px;left:0px;width:600px;height:45px;">
   <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #000; filter:alpha(opacity=40.0); opacity:0.4;">
    	</div>
    	<!-- Thumbnail Item Skin Begin -->
    	<div data-u="slides" style="cursor: default;">
    	<div data-u="prototype" class="p">
    	<div data-u="thumbnailtemplate" class="t"></div></div></div>
    	<!-- Thumbnail Item Skin End -->
    </div>

    	<!-- Bullet Navigator -->
    	<div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
    	<div data-u="prototype" style="width:12px;height:12px;"></div></div>
    	<!-- Arrow Navigator -->
    	<span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
    	<span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
        </div><script>jssor_1_slider_init();</script>
        <!-- #END region Jssor Slider End -->
      
    </div>
    </div>
</div>
</div>
</article>
        
	<article class='art-post art-article'>
								
								<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div id='panel2'>
     <p style="text-align: center;" class='titulos'>
     <b>
     <span class="glyphicon glyphicon-bookmark" style="line-height: 107%;color:#000034;text-transform:uppercase;font-size: 18px;color:white;">&nbsp;¡Bienvenidos!</span></b>
    </p>
    
    </div>
    </div>
</div><br>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%" >
        <p style="line-height: 125%;">
        <span style="color: rgb(51, 51, 51); line-height: 16.25px;">
        La Escuela Preparatoria José Ma. Morelos de Zitácuaro,es una institución educativa de nivel medio superior incoporada a la Universidad Michoacana de San Nicolás de 
        <span style="letter-spacing: 1px;">Hidalgo</span>.</span><br></p><p style="line-height: 125%;">
        <span style="color: rgb(51, 51, 51); line-height: 16.25px;">
        Es una institución que fomenta la cultura,los valores y&nbsp;la educación al más alto nivel acad&eacute;mico y humano,para formar&nbsp;jóvenes qui&eacute;nes promuevan el bienestar y el progreso de la sociedad.</span>
        <span style="color: rgb(51, 51, 51); line-height: 16.25px;"><br></span></p>
    </div>
    </div>
</div>



<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%" >
          <link href="js/videojs/video-js.css" rel="stylesheet">
          <script src="js/videojs/ie8/videojs-ie8.min.js"></script>
          <script src="js/videojs/video.js"></script>
         <!-- Set the location of the flash SWF -->
         <script>
         videojs.setGlobalOptions({
         flash: {
         swf: 'js/videojs/video-js.swf'
         }
         });
         </script>
         
           <video id="video_html5_api" class="video-js vjs-default-skin" controls preload="none" width="620" height="340" poster="images/morelospreview1.png" data-setup='{ "flash" : { "nativeTextTracks" : false } }'>
           <source src="archivos/video-promocional.mp4" type="video/mp4">
           <source src="archivos/video-promocional.swf" type="application/x-shockwave-flash">
           <source src="archivos/video-promocional.webm" type="video/webm">
           
         
           <p class="vjs-no-js">Para ver este video favor de habilitar JavaScript en las opciones de tu navegador,y/o considera actualizar tu navegador a uno<a href="http://videojs.com/html5-video-support/" target="_blank">que soporte HTML5 video</a></p>
           </video>

    </div>
    </div>
</div>
</article>
<article class='art-post art-article'>
         <div class='art-content-layout'>
              <div class='art-content-layout-row'>
              <div id='panel3'>
              <h3 class='titulos'>
              <span class="glyphicon glyphicon-question-sign" style="line-height: 107%;color:#000034;text-transform:uppercase;font-size: 18px;color:white;">&nbsp;Informaci&oacute;n</span></h3>
              </div><br>
             <br>
        <p><span style="color: rgb(51, 51, 51); line-height: 16.25px;">
        <span style=" font-weight: bold; line-height: 18px;">Aquí encontrarás informaci&oacute;n relacionada con la instituci&oacute;n.</span><br></span></p>
        
        <p style="box-sizing: border-box; color: rgb(51, 51, 51);  line-height: 19.5px;">Desde &eacute;ste espacio podrás conocernos,saber nuestra ubicaci&oacute;n, noticias relevantes;as&iacute; como eventos y actividades realizadas durante el transcurso del ciclo escolar.</p>
         
        <p style="box-sizing: border-box; color: rgb(51, 51, 51); line-height: 18.571428298950195px; ">
        <br style="box-sizing: border-box;"></p>
        <p style="box-sizing: border-box; color: rgb(51, 51, 51); line-height: 18.571428298950195px;  text-align: left;">
        <span style="box-sizing: border-box; font-weight: bold; text-align: justify; color: rgb(0, 9, 61);">¡Te damos la más cordial bienvenida a nuestro sitio web!</span></p>
        
        <img width="572" class='img-rounded' height="220" style="float: left;" alt="" src="images/maxdefault.jpg" class="" >
        </div>
        </div>
</article>

</div>
 
    <div class="art-layout-cell art-sidebar1">
    
     <!-- Menu lateral -->
         <div class="art-vmenublock clearfix">
         <div class="art-vmenublockcontent">
         <ul class="art-vmenu">
         <li><a href="inicio" class=""><span class="glyphicon glyphicon-home">&nbsp;Inicio</span></a></li>
         <li><a href="acerca-de.html"><span class="glyphicon glyphicon-question-sign">&nbsp;Acerca de</span></a>
         <ul ><li><a href="acerca-de/quienes-somos.html">Quienes Somos</a></li>
         <li><a href="acerca-de/ubicacion.html">Ubicación</a></li>
         <li><a href="acerca-de/directorio.html">Directorio</a></li>
         <li><a href="acerca-de/reglamento.html">Reglamento</a></li></ul></li>
         <li><a href="preparatoria.html"><span class="glyphicon glyphicon-briefcase">&nbsp;Bachilleratos</span></a>
         <ul>
         <li><a href="preparatoria/bachilleratos/ciencias-economico-administrativas.html">Ciencias Económico-Administrativas</a></li>
         <li><a href="preparatoria/bachilleratos/ciencias-historico-sociales.html">Ciencias Historico-Sociales</a></li>
         <li><a href="preparatoria/bachilleratos/ciencias-quimico-biologicas.html">Ciencias Químico-Biológicas</a></li>
         <li><a href="preparatoria/bachilleratos/ingenieria-y-arquitectura.html">Ingeniería y Arquitectura</a></li>
         </ul></li>
         
         <li><a href="usuarios.html"><span class="glyphicon glyphicon-user">&nbsp;Alumnos</span></a>
         <ul>
         <li><a href="usuarios/alumnos/calificaciones.html">Calificaciones</a></li>
         <li><a href="usuarios/alumnos/solicitud-reinscripcion.html">Solicitud Reinscripcion</a></li>
         <li><a href="usuarios/alumnos/consulta-de-horario.html">Consulta de Horario</a></li>
         </ul></li>
         
         <li><a href="usuarios.html"><span class="glyphicon glyphicon-user">&nbsp;Docentes</span></a>
         <ul>
        <li><a href="usuarios/docentes/index.html">Informaci&oacute;n docente</a></li>
         </ul></li>
         <li><a href="servicios.html"><span class="glyphicon glyphicon-wrench">&nbsp;Servicios</span></a>
         <ul><li><a href="servicios/biblioteca.html">Biblioteca</a></li>
         <li><a href="servicios/trabajo-social.html">Trabajo Social</a></li>
         <li><a href="servicios/psicologia.html">Psicología</a></li>
         <li><a href="servicios/control-escolar.html">Control Escolar</a></li>
         <li><a href="servicios/centro-de-computo.html">Centro de Cómputo</a></li>
         <li><a href="servicios/prefectura.html">Prefectura</a></li>
         <li><a href="servicios/subdireccion-academica.html">Subdirección Académica</a></li></ul></li>
         <li><a href="blog.html"><span class="glyphicon glyphicon-folder-close">&nbsp;Blog</span></a><ul>
         <li><a href="blog/noticias.php">Noticias</a></li>
         <li><a href="blog/galeria.html">Galería</a></li></ul></li></ul>
         </div>
         </div>
          <!--Fin  Menu lateral -->

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">GALER&Iacute;A</h3>
        </div>
        <div class="art-blockcontent"><form method="post" action=""><p></p><div id="DSC01891" style="position: relative; display: inline-block; z-index: 0; margin-top: 5px; margin-right: 15px; margin-bottom: 0px; margin-left: 0px;  border-style: solid; border-color: transparent; border-width: 1px;  float: left;" class="art-collage">
<div class="art-slider art-slidecontainerDSC01891" data-width="200" data-height="267">
    <div class="art-slider-inner">
<div class="art-slide-item art-slideDSC018910" >


</div>
<div class="art-slide-item art-slideDSC018911" >


</div>
<div class="art-slide-item art-slideDSC018912" >


</div>
<div class="art-slide-item art-slideDSC018913" >


</div>
<div class="art-slide-item art-slideDSC018914" >


</div>
<div class="art-slide-item art-slideDSC018915" >


</div>
<div class="art-slide-item art-slideDSC018916" >


</div>
<div class="art-slide-item art-slideDSC018917" >


</div>

    </div>
</div>
<div class="art-slidenavigator art-slidenavigatorDSC01891" data-left="0.6944444" data-top="1">
<a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a>
</div>



    </div>



<p><span style="font-weight: bold;"><br></span></p><p style="text-align: justify;"><span style="color: rgb(69, 91, 115); font-size: 12px; font-weight: bold; white-space: pre; text-decoration: underline;"><br></span></p><p style="text-align: justify;"><span style="color: rgb(69, 91, 115); font-size: 12px; font-weight: bold; white-space: pre; text-decoration: underline;"><br></span></p></form></div>
</div>
<!--AGENDA-->
<div class="art-block clearfix">
        <div class="art-blockheader"><h3 class="t">AGENDA</h3></div>
        <div class="art-blockcontent">
        <script src="js/calendario.js"></script>
        <!--MODAL-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
             <div class="modal-dialog">       
                 <div class="modal-content" style="background: #F2F4F6 url('images/block.png') scroll;-webkit-border-radius: 6px;
-moz-border-radius: 6px;border-radius: 6px;-webkit-box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.2);-moz-box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.2);box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.2);border: 1px solid #B2C1D1;margin: 7px;"> 

         <div class="modal-header"> <br>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <br> <h3><img src="images/iconos/error.png" width=45 height=45></h3><br></button> <br>
            <h4 class="modal-title" id="myModalLabel"> 
            <span style="line-height: 107%; font-family: 'Lucida Calligraphy'; color: rgb(91, 155, 213); font-size: 30px;"><h5 class='titulos' style=''>AGENDA</h5></span>
            </h4> 
         </div> 
         <div class="modal-body" id="modal-noticias"> <br>
           
            <!--MODAL NOTICIAS AQUI-->
            <div id='loadingAgenda'></div>
         </div> 
         <div class="modal-footer"> 
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
            
          </div> 
          </div><!-- /.modal-content --> 
          </div><!-- /.modal dialog --> 


        </div>
        <!--FIN MODAL-->
        </div>
      </div>
      <br><br>
     <!--EVENTOS-->
     <div class="art-block clearfix">
        
        <div class="art-blockcontent">
        <div>
        <div class="art-blockheader"><h3 class="t"><span class="glyphicon glyphicon-calendar"></span>&nbsp;EVENTOS PR&Oacute;XIMOS</h3></div>
        <div class="art-vmenublockcontent">
             <ul class="art-vmenu">
                <li><a href="#" onclick='javascript:cargarEventos();'><span  class="glyphicon glyphicon-plus"></span>&nbsp;Mostrar eventos</a>
                    <!--CARGAR EVENTOS-->
                    <ul id='cargarEventos'>
                    <li><a href="blog/noticias">Noticias</a></li>
                    </ul>
                </li>
            </ul>
                
        </div>
        </div>
        </div>
      </div>
     <!--EVENTOS--><br><br>
     <!--LOGOS-->
     <div><br>
     <img width="250" height="240" alt="" src="images/logo1-large.png" class=""><br>
     </div>
     <!--LOGOS-->
</div>

                    </div>
                </div>
            </div>
 <br><br><br>
<!--PIE DE PAGINA--> 
<footer class="art-footer">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-old-0" style="width: 33%">
        <p><br></p>
    </div><div class="art-layout-cell layout-item-old-0" style="width: 34%">
      <h3><span style="text-align: justify; -webkit-border-vertical-spacing: 10px;"><b style="font-size: 13px;"><span lang="ES" style="font-size: 12pt; font-family: 'Droid Serif'; text-decoration: underline; color: #FFFFFF;"><br></span></b><span style="font-weight: normal; font-size: 13px;">&nbsp;</span> <span style="font-family: 'Times New Roman'; font-size: 16px; color: rgb(229, 73, 52);">Horario de atención:</span></span></h3><p class="MsoNormal" style="margin-top: 12px; margin-bottom: 0.0001pt; text-align: center;"><span lang="ES" style="font-family: 'Droid Serif'; color: rgb(255, 255, 255); font-size: 14px;">Lunes a Viernes de 7:30 a 16:00 Hrs.</span></p><p><br></p>
    </div><div class="art-layout-cell layout-item-old-0" style="width: 33%">
        <p><br></p>
    </div>
    </div>
</div>
<div class="art-content-layout-br layout-item-0">
</div><div class="art-content-layout-wrapper layout-item-1">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-old-0" style="width: 33%">
        <p style="text-align: center;"><span style="font-size: 12px;">Dr. Emilio García Sur #124,H.Zitácuaro,Mich</span><br></p>
    </div><div class="art-layout-cell layout-item-old-0" style="width: 34%">
        <p style="text-align: center;"><span style="font-size: 12px;">Tel/Fax. 153-1364</span><br>
          <span style="font-size: 12px;"><br>
          </span></p>
    </div><div class="art-layout-cell layout-item-old-0" style="width: 33%">
        <p style="text-align: justify;"><span style="font-size: 12px;">
         Cont&aacute;ctanos:&nbsp;<a href="https://www.facebook.com/Esc-Prepa-Jose-Ma-Morelos-De-Zitacuaro-514038705306620/info/?tab=overview" class="art-facebook-tag-icon" target='_blank'></a>
         &nbsp;&nbsp;<a href="" class="art-youtube-tag-icon"></a>
         &nbsp;&nbsp;</span><br>
         <span style="font-size: 12px;"><br>
         </span></p>
    </div>
    </div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-1">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-old-0" style="width: 100%">
        <p style="text-align: center;"><span style="color: rgb(237, 240, 245); font-family: Georgia, 'Times New Roman', Times, serif; font-size: 12px; line-height: 22px;">prepamoreloszitacuaro.blogspot.com</span></p>
    </div>
    </div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-1">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-old-0" style="width: 100%">
        <p><span style="font-size: 12px; text-align: justify;">Correo:escjosemamorelos@hotmail.com</span><br></p>
    </div>
    </div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-2">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-old-0" style="width: 100%">
        <p><span style="font-size: 12px; text-align: justify;"></span><br></p>
    </div>
    </div>
</div>
</div>
<div class="art-content-layout-br layout-item-3">
</div><div class="art-content-layout-wrapper layout-item-1">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-old-0" style="width: 100%">
        <p>2016 ©|Preparatoria José Ma. Morelos de Zitácuaro S.C<span style="font-size: 12px;"><a href="www.google.com" target="_blank"><br></a><a href="www.google.com" target="_blank"></a></span></p>
    </div>
    </div>
</div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-old-0" style="width: 100%">
        <p style="text-align: center;">Acerca de|

         <a  data-toggle="modal"  
   data-target="#myMod" href='#' style='color:white;text-decoration:none;'> Pol&iacute;ticas de Privacidad</a></p>
        
    </div>
    </div>
</div>
<?php require_once 'politicas_privacidad.html';?>
</footer>
<!--FIN PIE DE PAGINA-->
<a href="#" class="scrollup" style="display: inline;"><img src='images/icono.jpg'></a>

    </div>
</div>





</body></html>