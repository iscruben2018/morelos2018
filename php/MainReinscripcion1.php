<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.3.0.60745 -->
    <meta charset="utf-8">
    <title>Página Nueva</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="../../style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="../../style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="../../style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">

<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <script src="../../jquery.js"></script>
    <script src="../../script.js"></script>
    <script src="../../script.responsive.js"></script>
<meta name="keywords" content="morelos
prepa morelos
zitacuaro morelos
jose ma morelos 
preparatoria morelos 
josemamorelos">
    <!--[if IE]> 

<script type="text/javascript">

var e =("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
for (var i=0; i<e.length; i++) {
document.createElement(e[i]);
}
</script>


<script type="text/javascript">
   document.createElement("nav");
   document.createElement("header");
   document.createElement("footer");
   document.createElement("section");
   document.createElement("article");
   document.createElement("aside");
   document.createElement("hgroup");
</script>
 

 




<![endif]-->
<!--BOOTSTRAP-->
    
<link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
    <script src="../../js/bootstrap/bootstrap.min.js"></script> 
    
<!--FIN BOOTSTRAP-->
    
<script type="text/javascript">
 
 $(document).ready(function(){
    $(window).scroll(function(){
	if($(this).scrollTop()>100){
		$('.scrollup').fadeIn();
	}
	else{
		$('.scrollup').fadeOut();
	}
    });
    $('.scrollup').click(function(){
    $("html.body").animate({scrollTop:0},600);
    });
    });
	</script>
    
<script>
    function verAgenda(dias,mes){
		
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
    "bgimage" : "url('../../images/slideDSC018910.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018911": {
    "bgimage" : "url('../../images/slideDSC018911.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018912": {
    "bgimage" : "url('../../images/slideDSC018912.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018913": {
    "bgimage" : "url('../../images/slideDSC018913.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018914": {
    "bgimage" : "url('../../images/slideDSC018914.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018915": {
    "bgimage" : "url('../../images/slideDSC018915.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018916": {
    "bgimage" : "url('../../images/slideDSC018916.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018917": {
    "bgimage" : "url('../../images/slideDSC018917.png')",
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
</script><style>.art-slidecontainerDSC01891 {
    position: relative;
        width: 200px;
    height: 267px;
        }

.default-responsive .art-header .art-slidecontainerDSC01891,
.responsive .art-header .art-slidecontainerDSC01891
{
  position: absolute !important;
}

.responsive .art-pageslider .art-slidecontainerDSC01891 {
  position: absolute !important;
}

.art-slidecontainerDSC01891 .art-slide-item
{

    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    transform: rotate(0);
}



.art-slidecontainerDSC01891 .art-slide-item {
    -webkit-transition: 600ms ease-in-out opacity;
    -moz-transition: 600ms ease-in-out opacity;
    -ms-transition: 600ms ease-in-out opacity;
    -o-transition: 600ms ease-in-out opacity;
    transition: 600ms ease-in-out opacity;
    position: absolute !important;
    display: none;
	left: 0;
	top: 0;
	opacity: 0;
    width:  100%;
    height: 100%;
}

.art-slidecontainerDSC01891 .active, .art-slidecontainerDSC01891 .next, .art-slidecontainerDSC01891 .prev {
    display: block;
}

.art-slidecontainerDSC01891 .active {
    opacity: 1;
}

.art-slidecontainerDSC01891 .next, .art-slidecontainerDSC01891 .prev {
    width: 100%;
}

.art-slidecontainerDSC01891 .next.forward, .art-slidecontainerDSC01891 .prev.back {
    opacity: 1;
}

.art-slidecontainerDSC01891 .active.forward {
    opacity: 0;
}

.art-slidecontainerDSC01891 .active.back {
    opacity: 0;
}


.art-slideDSC018910 {
    background-image:  url('../../images/slideDSC018910.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018910 {
    background-image:  url('../../images/slideDSC018910.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018910 {
    background-image:  url('../../images/slideDSC018910.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018910 {
    background-image: url('../../images/slideDSC018910.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018910 {
    background-image: url('../../images/slideDSC018910.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slideDSC018911 {
    background-image:  url('../../images/slideDSC018911.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018911 {
    background-image:  url('../../images/slideDSC018911.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018911 {
    background-image:  url('../../images/slideDSC018911.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018911 {
    background-image: url('../../images/slideDSC018911.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018911 {
    background-image: url('../../images/slideDSC018911.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slideDSC018912 {
    background-image:  url('../../images/slideDSC018912.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018912 {
    background-image:  url('../../images/slideDSC018912.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018912 {
    background-image:  url('../../images/slideDSC018912.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018912 {
    background-image: url('../../images/slideDSC018912.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018912 {
    background-image: url('../../images/slideDSC018912.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slideDSC018913 {
    background-image:  url('../../images/slideDSC018913.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018913 {
    background-image:  url('../../images/slideDSC018913.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018913 {
    background-image:  url('../../images/slideDSC018913.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018913 {
    background-image: url('../../images/slideDSC018913.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018913 {
    background-image: url('../../images/slideDSC018913.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slideDSC018914 {
    background-image:  url('../../images/slideDSC018914.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018914 {
    background-image:  url('../../images/slideDSC018914.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018914 {
    background-image:  url('../../images/slideDSC018914.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018914 {
    background-image: url('../../images/slideDSC018914.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018914 {
    background-image: url('../../images/slideDSC018914.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slideDSC018915 {
    background-image:  url('../../images/slideDSC018915.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018915 {
    background-image:  url('../../images/slideDSC018915.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018915 {
    background-image:  url('../../images/slideDSC018915.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018915 {
    background-image: url('../../images/slideDSC018915.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018915 {
    background-image: url('../../images/slideDSC018915.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slideDSC018916 {
    background-image:  url('../../images/slideDSC018916.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018916 {
    background-image:  url('../../images/slideDSC018916.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018916 {
    background-image:  url('../../images/slideDSC018916.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018916 {
    background-image: url('../../images/slideDSC018916.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018916 {
    background-image: url('../../images/slideDSC018916.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}.art-slideDSC018917 {
    background-image:  url('../../images/slideDSC018917.png');
        /* background-size:  auto auto; */
        background-position:  center center;
    background-repeat: no-repeat;
}

/* special setup for header/pageslider */
.responsive .art-header .art-slideDSC018917 {
    background-image:  url('../../images/slideDSC018917.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.responsive .art-pageslider .art-slideDSC018917 {
    background-image:  url('../../images/slideDSC018917.png');
    background-size: auto auto;
    background-position:  center center;
    background-repeat: no-repeat;
}

.default-responsive .art-header .art-slideDSC018917 {
    background-image: url('../../images/slideDSC018917.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.default-responsive .art-pageslider .art-slideDSC018917 {
    background-image: url('../../images/slideDSC018917.png');
    background-size: auto auto;
    background-position: center center;
    background-repeat: no-repeat;
}

.art-slidenavigatorDSC01891 {
  display: inline-block;
  position: absolute;
  direction: ltr !important;
  top: 243px;
  left: 12.5%;
  z-index: 101;
  line-height: 0 !important;
  -webkit-background-origin: border !important;
  -moz-background-origin: border !important;
  background-origin: border-box !important;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  text-align: center;
    white-space: nowrap;
    }
.art-slidenavigatorDSC01891
{
background: #D0D6DC;background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.6) 0, rgba(158, 171, 183, 0.6) 100%) no-repeat;background: -moz-linear-gradient(top, rgba(255, 255, 255, 0.6) 0, rgba(158, 171, 183, 0.6) 100%) no-repeat;background: -o-linear-gradient(top, rgba(255, 255, 255, 0.6) 0, rgba(158, 171, 183, 0.6) 100%) no-repeat;background: -ms-linear-gradient(top, rgba(255, 255, 255, 0.6) 0, rgba(158, 171, 183, 0.6) 100%) no-repeat;-svg-background: linear-gradient(top, rgba(255, 255, 255, 0.6) 0, rgba(158, 171, 183, 0.6) 100%) no-repeat;background: linear-gradient(to bottom, rgba(255, 255, 255, 0.6) 0, rgba(158, 171, 183, 0.6) 100%) no-repeat;
-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;


padding:7px;





}
.art-slidenavigatorDSC01891 > a
{
background: #8191A2;background: #8191A2;background: #8191A2;background: #8191A2;background: #8191A2;-svg-background: #8191A2;background: #8191A2;
-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;



margin:0 10px 0 0;

width: 10px;

height: 10px;
}
.art-slidenavigatorDSC01891 > a.active
{
background: #FB7C3C;background: #FB7C3C;background: #FB7C3C;background: #FB7C3C;background: #FB7C3C;-svg-background: #FB7C3C;background: #FB7C3C;
-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;



margin:0 10px 0 0;

width: 10px;

height: 10px;
}
.art-slidenavigatorDSC01891 > a:hover
{
background: #4D6580;background: #4D6580;background: #4D6580;background: #4D6580;background: #4D6580;-svg-background: #4D6580;background: #4D6580;
-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;



margin:0 10px 0 0;

width: 10px;

height: 10px;
}

</style>


<style>.art-content .art-postcontent-0 .layout-item-old-0 { margin-bottom: 7px;  }
.art-content .art-postcontent-0 .layout-item-old-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#EAEEF3;border-right-color:#EAEEF3;border-bottom-color:#EAEEF3;border-left-color:#EAEEF3; color: #000000; background: #D9DFE3;  }
.art-content .art-postcontent-0 .layout-item-old-2 { color: #000000; padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
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
    <ul class="art-hmenu"><li><a href="../../inicio" class="">Inicio</a></li>
    <li><a href="#" class="">Acerca de</a><ul class="">
    <li><a href="../../acerca-de/quienes-somos.html" class="">Quienes Somos</a></li>
    <li><a href="../../acerca-de/ubicacion.html" class="">Ubicación</a></li>
    <li><a href="../../acerca-de/directorio.html" class="">Directorio</a></li>
    <li><a href="../../acerca-de/reglamento.html" class="">Reglamento</a></li>
    </ul>
    </li>
    <li><a href="#" class="">Preparatoria</a>
    <ul class=""><li><a href="../../preparatoria/formacion-educativa.html" class="">Formación Educativa</a></li><li><a href="#" class="">Bachilleratos</a>
    <ul class=""><li><a href="../../preparatoria/bachilleratos/ciencias-economico-administrativas.html" class="">Ciencias Económico-Administrativas</a></li><li><a href="../../preparatoria/bachilleratos/ciencias-historico-sociales.html" class="">Ciencias Historico-Sociales</a></li><li><a href="../../preparatoria/bachilleratos/ciencias-quimico-biologicas.html" class="">Ciencias Químico-Biológicas</a></li><li><a href="../../preparatoria/bachilleratos/ingenieria-y-arquitectura.html" class="">Ingeniería y Arquitectura</a></li></ul></li></ul></li>
    <li><a href="#" class="active">Usuarios</a><ul class="active"><li><a href="#" class="active">Alumnos</a><ul class="active"><li><a href="../../usuarios/alumnos/calificaciones.html" class="active">Calificaciones</a></li><li><a href="../../usuarios/alumnos/solicitud-reinscripcion.html">Solicitud Reinscripcion</a></li><li><a href="../../usuarios/alumnos/consulta-de-horario.html">Consulta de Horario</a></li></ul></li><li><a href="../../usuarios/futuros-estudiantes.html">Futuros Estudiantes</a></li><li><a href="#">Docentes</a><ul><li><a href="../../usuarios/docentes/temarios.html">Temarios</a></li><li><a href="../../usuarios/docentes/formatos.html">Formatos</a></li></ul></li><li><a href="#">Padres de Familia</a><ul><li><a href="../../usuarios/padres-de-familia/buzon.html">Buzón</a></li></ul></li></ul></li><li><a href="#">Servicios</a><ul><li><a href="../../servicios/biblioteca.html">Biblioteca</a></li><li><a href="../../servicios/trabajo-social.html">Trabajo Social</a></li><li><a href="../../servicios/psicologia.html">Psicología</a></li><li><a href="../../servicios/control-escolar.html">Control Escolar</a></li><li><a href="../../servicios/centro-de-computo.html">Centro de Cómputo</a></li><li><a href="../../servicios/prefectura.html">Prefectura</a></li><li><a href="../../servicios/subdireccion-academica.html">Subdirección Académica</a></li></ul></li><li><a href="#">Blog</a><ul><li><a href="../../blog/noticias">Noticias</a></li><li><a href="../../blog/galeria.html">Galería</a></li></ul></li></ul> 
    </nav>

                    
</header>
<div class="art-pageslider">

     <div class="art-shapes">
            </div>
<div class="art-slider art-slidecontainerpageslider" data-width="1000" data-height="300">
    <div class="art-slider-inner">
<div class="art-slide-item art-slidepageslider0">


</div>
<div class="art-slide-item art-slidepageslider1">


</div>
<div class="art-slide-item art-slidepageslider2">


</div>

    </div>
</div>
<div class="art-slidenavigator art-slidenavigatorpageslider" data-left="0" data-top="1">
<a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a>
</div>


</div>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 33%">
<p><img width="100" height="99" alt="" class="art-lightbox" src="../../images/object226974863.png"><br></p>
</div><div class="art-layout-cell" style="width: 67%">
<p style="text-align: right;"><span style="line-height: 13px;"><span style="font-family: 'Comic Sans MS'; letter-spacing: 1px; font-size: 14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-weight: bold;">SOLICITUD DE REINSCRIPCIÓN</span></span><br></p><p style="line-height: 100%; text-indent: 0px; margin-bottom: -1px; text-align: right;"><span style="font-weight: bold;">CICLO ESCOLAR 2015-2016</span><span style="text-align: right; font-weight: bold;"><br></span></p><p style="line-height: 100%; text-indent: 0px; margin-bottom: -1px; text-align: left;"><span style="font-weight: bold;">H.ZITÁCUARO,MICH.A ____DE &nbsp;____201_.</span></p><p style="line-height: 100%; text-indent: 0px; margin-bottom: -1px; text-align: left;"><span style="font-weight: bold;">&nbsp;</span></p>
</div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-old-0">
<div class="art-content-layout layout-item-old-1">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell layout-item-old-2" style="width: 100%">
<p style="text-align: center;"><span style="font-weight: bold;">DATOS ACADÉMICOS</span><br></p>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell" style="width: 100%">
<!--<p><span style="font-weight: bold;">TIPO DE REGISTRO:&nbsp;<select name="tipo_reg" id="tipo_reg"><option value="0">==Selecciona una opción==</option><option value="inscripcion">Inscripción</option><option value="reinscripcion">Reinscripción</option></select></span>-->
<input type="hidden" value="reinscripcion" name="tipo_reg" id="tipo_reg">
<span style="font-weight: bold;"><br></span><p><span style="font-weight: bold;">MATRICULA:<input type="text" name="mat_alu" id="mat_usu" size="8" required readonly> 
 SECCION:<input type="text" id="sec_alu" name="sec_alu"></span></p><p><span style="font-weight: bold;">SEMESTRE:&nbsp;<select name="sem_alu"><option value="0">--Selecciona el semestre</option><option value="1">PRIMERO</option><option value="2">SEGUNDO</option><option value="3">TERCERO</option><option value="4">CUARTO</option><option value="5">QUINTO</option><option value="6">SEXTO</option></select></span><span style="font-weight: bold;"><br></span></p><p><span style="font-weight: bold;">BACHILLERATO:<input type="text" id="bac_alu" name="bac_alu"></span>&nbsp;
 <span style="font-weight: bold;">&nbsp;</span></p><p>
 <span style="font-weight: bold;"></span></p>
</div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-old-0">
<div class="art-content-layout layout-item-old-1">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell layout-item-old-2" style="width: 100%">
<p style="text-align: center;"><span style="font-weight: bold;">DATOS DEL ALUMNO:</span></p>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell" style="width: 100%">
<p><span style="font-weight: bold;">NOMBRE:
 <input type="text" name="nom_alu" id="nom_alu"></span>&nbsp;&nbsp;</p><p><span style="font-weight: bold;">APELLIDO PATERNO:
 <input type="text" name="ap_alu" id="ap_alu">
</span></p><p><span style="font-weight: bold;"><br></span></p><p>
 <span style="font-weight: bold;">APELLIDO MATERNO:
 <input type="text" name="am_alu" id="am_alu">
</span></p><p><span style="font-weight: bold;">CURP:
 <input type="text" name="curp_alu" id="curp_alu"></span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">FECHA DE NACIMIENTO:
 <input type="text" id="fnac_alu" name="fnac_alu" size="10">
</span></p><p>
 <span style="font-weight: bold;">SEXO:
 FEM<input type="radio" name="sexo_alu" id="sexo_alu">
 MASC<input type="radio" name="sexo_alu" id="sexo_alu"></span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">LUGAR DE NACIMIENTO:
 <input type="text" name="lnac_alu" id="lnac_alu" placeholder="Ejemplo:México">
</span></p><p>
 <span style="font-weight: bold;">ESCOLARIDAD:
 <select name="escolaridad_alu"><!--<option value='0'>==Selecciona una opcion==</option>
                                                                                                              <option value='6'>PRIMARIA INCOMPLETA</option>
<option value='2'>PRIMARIA COMPLETA</option>
<option value='3'>SECUNDARIA INCOMPLETA</option>
<option value='4'>SECUNDARIA COMPLETA</option>
<option value='5'>BACHILLERATO COMPLETO</option>--><option value="1">BACHILLERATO INCOMPLETO
<!--<option value='7'>TÉCNICO</option>
<option value='8'>ESTUDIOS SUPERIORES INCOMPLETOS</option>
<option value='9'>ESTUDIOS SUPERIORES COMPLETOS</option> -->
</option></select>

</span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell" style="width: 100%">
<p><span style="font-weight: bold;">DOMICILIO:</span>
 <input type="text" placeholder="Nombre de la calle" id="calle_alu">
 <input type="text" placeholder="Numero de la calle" id="no_alu" size="10"> 
</p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">ESTADO:
 <select name="estado_alu" id="estado_alu"><option value="0">--Selecciona un estado--</option><option value="1">--Aguascalientes</option></select>
</span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">CIUDAD:
 <select name="ciudad_alu"><option></option></select>
</span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">COLONIA:
 <select name="colonia_alu"><option></option></select>
</span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">C.P:
 <input type="text" id="cp_alu" name="cp_alu" size="5">
</span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">TELÉFONO(S):
 
 <input type="text" id="tel1_alu" name="tel1_alu" size="7" placeholder="Telefono 7 digitos">
 (Opcional)<input type="text" id="tel2_alu" name="tel2_alu" size="7" placeholder="Telefono 7 digitos">
</span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">EMAIL:
 <input type="text" id="mail_alu" name="mail_alu" placeholder="ejemplocorreo@dominio.com">
</span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">ESTADO CIVIL:
 <select name="ecivil_alu" id="ecivil_alu">
 <option value="soltero">SOLTERO(A)</option></select>
</span></p><p><span style="font-weight: bold;">PROBLEMAS DE SALUD:(ESPECIFIQUE)SI<input type="radio" name="psalud_a">NO<input type="radio" name="psalud_a"></span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">OCUPACIÓN:
 <select name="ocupacion_alu"><option value="X">ESTUDIANTE</option></select>
</span></p><p><input type="text" id="psalud_alu" name="psalud_alu"></p><p><br></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">TIPO DE DISCAPACIDAD:<select name="dis_alu" id="dis_alu"><option value="0">--Selecciona una opcion--</option><option value="">Ninguna</option><option value="1">Visual</option><option value="0">Auditiva</option><option value="0">De lenguaje</option><option value="0">Motriz músculo esqueletico</option><option value="0">Mental</option></select>
</span></p>
<p><span style="font-weight: bold;">CUENTA CON ALGUNA BECA(ESPECIFIQUE)
 SI<label class="art-radiobutton"><input type="radio" name="beca_alu">&nbsp;</label>NO<label class="art-radiobutton"><input type="radio" name="beca_alu"></label></span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><br></p><p><br></p><p><input type="text" id="tbeca_alu" name="tbeca_alu"><br></p><p><br></p><p><br></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">CUENTA CON SERVICIO DE SALUD(CUAL) SI<label class="art-radiobutton"><input type="radio" name="ssalud_alu">&nbsp;</label>NO<label class="art-radiobutton"><input type="radio" name="ssalud_alu"></label></span><br></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><input type="text" name="tsalud_alu" id="tsalud_alu"></p><p><br></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">HABLA O DOMINA ALGUNA LENGUA INDIGENA: (ESPECIFIQUE)&nbsp;&nbsp;SI<label class="art-radiobutton"><input type="radio" name="lengua_alu">&nbsp;</label>NO<label class="art-radiobutton"><input type="radio" name="lengua_alu"></label></span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><input type="text" name="tlengua_alu" id="tlengua_alu"></p>
</div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-old-0">
<div class="art-content-layout layout-item-old-1">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell layout-item-old-2" style="width: 100%">
<p style="text-align: center;"><span style="font-weight: bold;">DATOS DEL PADRE O TUTOR</span></p>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 75%"><p><span style="font-weight: bold;"><br></span></p><p><span style="font-weight: bold;">NOMBRE</span>:
 <input type="text" name="nom_pad" id="nom_pad"><br>
</p><span style="font-weight: bold;">APELLIDO PATERNO:
 <input type="text" name="ap_pad" id="ap_pad">
<br><br><br>APELLIDO MATERNO:
 <input type="text" name="am_pad" id="am_pad"></span></div><div class="art-layout-cell" style="width: 25%"><p style="text-align: left;"><span style="font-weight: bold;">ESTADO CIVIL:
 <select name=""><option value="0">--Selecciona--</option><option value="1">Casado</option><option value="2">Divorciado</option><option value="3">Viudo</option><option value="4">Unión libre</option></select>
</span> 
<br>
</p><p><br></p></div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell" style="width: 100%">
<p><span style="font-weight: bold;">DOMICILIO:
 <input type="text" name="calle_pad" id="calle_pad" placeholder="Nombre de la Calle">
 <input type="text" name="no_pad" id="no_pad" placeholder="Número">
</span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">ESTADO:
 <select name="estado_pad" id="estado_pad"><option value="0">--Selecciona un estado--</option><option value="1">--Aguascalientes--</option></select>
</span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">CIUDAD:
 <select name="ciudad_pad" id="ciudad_pad"><option value=""></option></select>
</span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">COLONIA:
 <select name="col_pad" id="xol_pad"><option value=""></option></select>
</span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">C.P:
 <input type="text" id="cp_pad" name="cp_pad">
</span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">TELÉFONO(s):
 
 <input type="text" name="tel1_pad" id="tel1_pad" size="3" placeholder="Telefono 7 digitos"> 
 Opcional:<input type="text" name="tel2_pad" id="tel2_pad" size="7" placeholder="Telefono 7 digitos">
</span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">EMAIL:
 <input type="text" name="mail_pad" id="mail_pad" placeholder="ejemplocorreo@dominio.com"></span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">OCUPACIÓN:
 <input type="text" name="ocupacion_pad" id="ocupacion_pad">
</span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;">LUGAR DE TRABAJO:
<input type="text" name="ltrabajo_pad" id="ltrabajo_pad">
</span></p>
</div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-old-0">
<div class="art-content-layout layout-item-old-1">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell layout-item-old-2" style="width: 100%">
<p style="text-align: center;"><span style="font-weight: bold;">ENVIAR</span></p>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell" style="width: 100%">
<p><br></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell" style="width: 50%">
<p><span style="font-weight: bold;"><br></span></p>
</div><div class="art-layout-cell" style="width: 50%">
<p><br></p>
</div>
</div>
</div>
<div class="art-content-layout-wrapper layout-item-old-0">
<div class="art-content-layout layout-item-old-1">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell layout-item-old-2" style="width: 100%">
<p style="text-align: center;"><span style="font-weight: bold;">CANCELAR</span></p>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-3">
<div class="art-layout-cell" style="width: 33%">
<p><span style="font-weight: bold;"><br></span></p>
</div><div class="art-layout-cell" style="width: 34%">
<p><span style="font-weight: bold;"><br></span></p>
</div><div class="art-layout-cell" style="width: 33%">
<p><span style="font-weight: bold;"><br></span></p>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row responsive-layout-row-1">
<div class="art-layout-cell" style="width: 100%">
<p style="text-align: center;"><span style="font-size: 12px; font-weight: bold; letter-spacing: 1px;"><br></span></p>
</div>
</div>
</div></div>
                                
                

</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
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
        <p style="text-align: center;"><span style="font-size: 12px;">Tel/Fax. 153-1364</span><br></p><p><span style="font-size: 12px;"><br></span></p>
    </div><div class="art-layout-cell layout-item-old-0" style="width: 33%">
        <p style="text-align: justify;"><span style="font-size: 12px;">
         Contactanos:&nbsp;<a href="https://wwww.facebook.com/Esc-Prepa-Jose-Ma-Morelos-De-Zitacuaro-514038705306620/info/?tab=overview" class="art-facebook-tag-icon"></a>
         &nbsp;&nbsp;<a href="" class="art-youtube-tag-icon"></a>
         &nbsp;&nbsp;</span><br></p><p><span style="font-size: 12px;"><br></span></p>
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
        <p style="text-align: center;">Acerca de|Politicas de Privacidad</p>
    </div>
    </div>
</div>

</footer><a href="#" class="scrollup" style="display: inline;">Scroll</a>

    </div>
</div>


</body></html>