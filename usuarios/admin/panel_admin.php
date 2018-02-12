<?php 
session_start();

if(isset($_SESSION["user_admin"])&&isset($_SESSION["tipo_usuario"])=="admin"){
?>



    <!DOCTYPE html>
    <html dir="ltr" lang="es-MX"><head>

    <meta charset="utf-8">
    <title>SECCION DE ADMINISTRADOR</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="../../style.responsive.css" media="all">
    <link rel="stylesheet" href="../../style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif&amp;subset=latin">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <script src="../../jquery.js"></script>
    <script src="../../script.js"></script>
    <script src="../../script.responsive.js"></script>
    <!--BOOTSTRAP-->
    <script type="text/javascript" src="../../js/scroll_bottom.js"></script>
    <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/bootstrap/bootstrap.min.js"></script> 
    <!--FIN BOOTSTRAP-->
    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lte IE 7]><link rel="stylesheet" href="../../style.ie7.css" media="screen" /><![endif]-->
    <!--[if IE]> 
    <script type="text/javascript">
    var e =("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
    for (var i=0; i<e.length; i++) {
    document.createElement(e[i]);
    }
    </script>
   <![endif]-->
    
<script type="text/javascript">
function validarCampos(formulario){

	if(formulario.user.value.length==0){
		formulario.user.focus();
		alert('La clave de usuario no debe ir vacia');
		return false;
	}
	if(formulario.pass.value.length==0){
		formulario.pass.focus();
		alert('No has escrito tu password');
		return false;
	}
return true;
}
    </script>



</head>
<body>
<div id="art-main">
<header class="art-header">

    <div class="art-shapes">
        <div class="art-textblock art-object2134142508">
        <div class="art-object2134142508-text-container">
        <div class="art-object2134142508-text" style='font-size: 14px;'>
        <br>Jos&eacute; Ma. Morelos<br>de Zit&aacute;cuaro S.C</div>
    </div>
    
</div><div class="art-textblock art-object438453684">
        <div class="art-object438453684-text-container">
        <div class="art-object438453684-text">Incorporada <br>a la U.M.S.N.H</div>
    </div>
    
</div><div class="art-textblock art-object2030094490">
        <div class="art-object2030094490-text-container">
        <div class="art-object2030094490-text"></div>
    </div>
    
</div>
            </div>

<h2 class="art-headline">
    <a href="#">BIENVENIDO <?php echo $_SESSION['tipo_usuario'];?> <?php echo $_SESSION['user_admin'];?>
 </a><br>
</h2>
<br>
<h5 align="center" style='color: white;text-transform: uppercase;'>PANEL DE ADMINISTRACI&oacute;N</h5>





<nav class="art-nav">
    <ul class="art-hmenu">
    <!--  <li><a href="../../inicio.php" class="">Inicio</a></li>-->
    <li><a href="../../archivos/pdf/web/ayuda_preview.html" target='_blank' class="">AYUDA</a>
    </li>
    <li><a href="#" class="">Reinscripci&oacute;n</a>
    <ul class="">
    <li><a href="../../php/MainCambiar.php" target='main' class="">Confirmar solicitudes de reinscripci&oacute;n</a></li>
    <li><a href="#" class="">Reportes</a>
    <ul class=""><li><a href="../../php/reporte_reinscritos_main.php" target='main' class="">Alumnos reinscritos en general</a></li>
    <!--  <li><a href="#" class="">Consulta individual</a></li>-->
    <li><a href="../../php/reporte_noinscritos.php" target='main' class="">Alumnos sin reinscribir</a></li>
   <!--  <li><a href="../../preparatoria/bachilleratos/ingenieria-y-arquitectura.html" class="">Ingeniería y Arquitectura</a></li>-->
    
    </ul></li>
        <li><a href="../../php/registrar_ciclo.php" target='main' class="">Registrar ciclo escolar</a></li>
        <li><a href="../../php/registrar_seccion.php" target='main' class="">Registrar Secci&oacute;n</a></li>
    </ul>
    </li>
    <li><a href="#" class="active">Usuarios</a><ul class="active"><li><a href="#" class="active">Alumnos</a>
    <ul class="active">
    <li><a href="../../php/registrar_alumno.php" target='main' class="active">Registrar Alumno</a></li>
    <li><a href="../../php/consultamod_alumno.php" target='main' class="active">Modificar Alumno</a></li>
    <li><a href="../../php/consulta_calificaciones.php" target='main' class="active">Calificaciones</a></li>
    <li><a href="../../php/consulta_solicitud.php" target='main'>Modificar Solicitud de reinscripci&oacute;n</a></li>
   <!--  - <li><a href="../../usuarios/alumnos/consulta-de-horario.html">Consulta de Horario</a></li>-->
    </ul></li>
    <!-- <li><a href="../../usuarios/futuros-estudiantes.html">Futuros Estudiantes</a></li>-->
    <li><a href="#">Docentes</a>
    <ul>
    <li><a href="../../php/registrar_docente.php" target='main'>Registrar docente</a></li>
    <li><a href="../../php/modificar_docente.php" target='main'>Modificar docente</a></li>
    <li><a href="../../php/asignarm_docente.php" target='main'>Asignar Materias </a></li>
    <li><a href="../../php/quitarm_docente.php" target='main'>Quitar Materias </a></li>
    </ul>
    </li>
   
    <li>
   <!--   <a href="#">Padres de Familia</a>--><ul><li>
    <a href="../../usuarios/padres-de-familia/buzon.html">Registrar Padre</a></li>
    </ul></li></ul></li>
    <!-- <li><a href="#">Servicios</a>
    <ul>
    <li><a href="../../servicios/biblioteca.html">Biblioteca</a></li>
    <li><a href="../../servicios/trabajo-social.html">Trabajo Social</a></li>
    <li><a href="../../servicios/psicologia.html">Psicología</a></li>
    <li><a href="../../servicios/control-escolar.html">Control Escolar</a></li>
    <li><a href="../../servicios/centro-de-computo.html">Centro de Cómputo</a></li>
    <li><a href="../../servicios/prefectura.html">Prefectura</a></li>
    <li><a href="../../servicios/subdireccion-academica.html">Subdirección Académica</a></li>
    </ul></li>
    -->
    
    <li><a href="#">Avisos</a>
    <ul>
    <li><a href="../../php/categorias_main.php" target='main'>Registrar Categoria</a></li>
    <li><a href="../../php/publicar_main.php" target='main'>Registrar Publicaci&oacute;n</a></li>
    </ul>
    </li>
    
     <li><a href="../../php/logout_admin.php">Salir</a>
   
    </li>
    </ul> 
    </nav>

                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                        
                      
                       <iframe class='art-post art-article' style='overflow:scroll;width:980px;height: 1200px;' name='main' src='../../images/logomorelos-2.png'>
                       
                       </iframe>
                        </div>
                    </div>
                </div>
            </div>
<a href="#" class="scrollup" style="display: inline;"><img src='../../images/icono.jpg'></a>
    </div>
</div>
 


</body></html>
<?php 
}
else{
echo "<script>window.location='../../usuarios/admin/';</script>";
}
?>