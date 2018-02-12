<?php 

@session_start();
if(isset($_SESSION['matricula'])){

   if($_SESSION["nombre"]!=''&&$_SESSION["logueado"]="si"){

   $matricula=$_SESSION['matricula'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="es-MX">
<head>
  
    <meta charset="utf-8">
    <title>Solicitud de reinscripci&oacute;n</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.responsive.css" media="all">

    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
    <!-- JQUERY UI -->
    <link type="text/css" href="../../css/jqueryui/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />   
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jqueryui.js"></script>
   <!-- FIN -->

    <!--INICIO BOOTSTRAP-->
    <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet"> 
    <script src="../../js/bootstrap/bootstrap.min.js"></script> 
    <script src="../../js/scroll_bottom.js"></script> 
    <!--FIN BOOTSTRAP-->

    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
     <!--[if IE]> 
     <style>
     .art-content-layout{width: 950px;}
    </style>
     <script type="text/javascript">
     var e =("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
     for (var i=0; i<e.length; i++) {
     document.createElement(e[i]);
     }
     </script>
    <![endif]-->
    
    
<script type="text/javascript">
var x;

x=$(document);
x.ready(inicio);

function inicio(){
   
    var x=$("#fnac_alu");
    x.datepicker({dateFormat:'yy/mm/dd',changeMonth:true,changeYear:true,yearRange:'-30:+0'});
    cargarFecha();
    cargarCiclo();
    cargarEstados();
    cargarAlumno();   
    }


function validarForm(formulario){
   var labelSemestre=document.getElementById('labelSemestre');
      
      if(formulario.sem_alu.value=="0"){
        formulario.sem_alu.focus();
          labelSemestre.innerHTML="Selecciona el semestre <img src='../../images/iconos/delete.ico' width='35' height='35'>";
        alert('SELECCIONA EL SEMESTRE');
        return false;
      }
      if(formulario.bac_alu.value=="0"){
            formulario.bac_alu.focus();
            alert('SELECCIONA EL BACHILLERATO CORRESPONDIENTE');
            return false;
          }
     
       if(formulario.curp_alu.value.length==0){
        formulario.curp_alu.focus();
        alert('LA CURP NO PUEDE IR VACIA');
        return false;
        }
       if(formulario.curp_alu.value.length<18){
            formulario.curp_alu.focus();
            alert('DEBES INGRESAR LA CURP COMPLETA');
            return false;
            }
     
       if(formulario.fnac_alu.value.length==0){
         formulario.fnac_alu.focus();
         alert("INGRESA LA FECHA DE NACIMIENTO");
         return false;
       }
     
         if(formulario.lnac_alu.value.length==0){
           formulario.lnac_alu.focus();
           alert("INGRESA EL LUGAR DE NACIMIENTO NO VACIO");
           return false;
         }
         var regLugarNacimiento= "[a-zA-Z—‹]";
            if(formulario.lnac_alu.value.search(regLugarNacimiento) != 0){  
                alert("LUGAR DE NACIMIENTO NO VALIDO,SOLO LETRAS \n Caracteres validos: \n A-Z (incluso —)");
                formulario.lnac_alu.focus();
                return false;   
            }
        

         if(formulario.sexo_alu.value=='0'){
             formulario.sexo_alu.focus();
             alert("FAVOR DE SELECCIONAR SU GENERO(MASCULINO O FEMENINO)");
             return false;
           }
         if(formulario.estado_alu.value=="0"){
                formulario.estado_alu.focus();
                alert('SELECCIONA UN ESTADO DE LA LISTA');
                return false;
             }
          
              if(formulario.ciudad_alu.value=='0'){
                 formulario.ciudad_alu.focus();
                 alert("SELECCIONA UNA CIUDAD DE LA LISTA");
                 return false; 
              }
        
               if(formulario.col_alu.value=='0'){
                 formulario.col_alu.focus();
                 alert("SELECCIONA UNA COLONIA DE LA LISTA");
                 return false;
               }
               if(formulario.cp_alu.value==''){
                     formulario.cp_alu.focus();
                     alert("INGRESA EL CODIGO POSTAL NO VACIO");
                     return false;
                    }

               var regNoCp="[0-9]+";
               if(formulario.cp_alu.value.search(regNoCp) != 0&&formulario.cp_alu.value.length<5){  
                    alert("EL CODIGO POSTAL ES UN NUMERO SOLAMENTE");
                    formulario.cp_alu.focus();
                    return false;   
                }
         
           if(formulario.calle_alu.value.length==0){
            formulario.calle_alu.focus();
            alert("INGRESA EL NOMBRE DE LA CALLE");
            return false;
           }
           var regNombreCalle="[a-zA-Z]";
           if(formulario.calle_alu.value.search(regNombreCalle) != 0){  
                alert("NOMBRE DE LA CALLE INVALIDO,SOLO LETRAS");
                formulario.calle_alu.focus();
                return false;   
            }
        
            if(formulario.no_alu.value.length==0){
              formulario.no_alu.focus();
              alert("EL NOMBRE DE LA CALLE NO PUEDE IR VACIO");
              return false;
            }

            var regNoCalle="[0-9]+";
               if(formulario.no_alu.value.search(regNoCalle) != 0){ 
                    alert("EL NUMERO DE LA CALLE NO ADMITE LETRAS");
                    formulario.no_alu.focus();
                    return false;   
                }
         
             
         
               
               if(formulario.tel1_alu.value.length==0){
                   formulario.tel1_alu.focus();
                   alert("INGRESA EL TELEFONO");
                   return false;
                }
               var regTel1="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
               if(formulario.tel1_alu.value.search(regTel1) != 0){  
                    alert("TELEFONO NO VALIDO,REVISA LOS DATOS (Ejemplo 715-...4431..)");
                    formulario.tel1_alu.focus();
                    return false;   
                }
                
               if(formulario.mail_alu.value.length==0){
                   formulario.mail_alu.focus();
                   alert("INGRESA EL CORREO");
                   return false;
                 }

             
         
                 
              /* if(formulario.tel2_alu.value.length==0){
                   formulario.tel2_alu.focus();
                   alert("INGRESA EL SEGUNDO TELEFONO");
                   return false;
                }

               var regTel2="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
               if(formulario.tel2_alu.value.search(regTel2) != 0){  
                    alert("NUMERO DE TELEFONO INVALIDO REVISA LOS DATOS");
                    formulario.tel2_alu.focus();
                    return false;   
                }
            */
               if(formulario.psalud_a.value=='0'){
                   formulario.psalud_a.focus();
                   alert("SELECCIONA SI TIENES PROBLEMAS DE SALUD");
                   return false;
                 }
               if((formulario.psalud_a.value=='si'&& formulario.psalud_alu.value.length==0)||(formulario.psalud_a.value=='si'&& formulario.psalud_alu.value=='')){
                   formulario.psalud_alu.focus();
                   alert("ESPECFICA EL PROBLEMA DE SALUD");
                   return false;
                 }
               

               if(formulario.dis_alu.value=='0'){
                   formulario.dis_alu.focus();
                   alert("SELECCIONA EL TIPO DE DISCAPACIDAD)");
                   return false;
                }

               if(formulario.beca_alu.value=='0'){
                   formulario.beca_alu.focus();
                   alert("SELECCIONA SI CUENTAS CON BECA");
                   return false;
                 }
              if((formulario.beca_alu.value=="si"&&formulario.tbeca_alu.value.length==0)||(formulario.beca_alu.value=='si'&&formulario.tbeca_alu.value=='')){
                  formulario.tbeca_alu.focus();
                  alert("ESPECIFICA EL TIPO DE BECA");
                  return false;
               }
               if(formulario.ssalud_alu.value=='0'){
                   formulario.ssalud_alu.focus();
                   alert("SELECCIONA SI CUENTAS CON SERVICIO DE SALUD");
                   return false;
                 }

               if((formulario.ssalud_alu.value=='si'&&formulario.tsalud_alu.value.length==0)||(formulario.ssalud_alu.value=='si'&&formulario.tsalud_alu.value=='')){
                   formulario.tsalud_alu.focus();
                   alert("ESPECIFICA EL SERVICIO DE SALUD");
                   return false;
                 }

               if(formulario.lengua_alu.value=='0'){
                   formulario.lengua_alu.focus();
                   alert("SELECCIONA SI HABLAS UNA LENGUA INDIGENA");
                   return false;
                 }
               if((formulario.lengua_alu.value=='si'&&formulario.tlengua_alu.value.length==0)||(formulario.lengua_alu.value=="si"&&formulario.tlengua_alu.value=='')){
                   formulario.tlengua_alu.focus();
                   alert("ESPECIFICA LA LENGUA INDIGENA QUE HABLAS");
                   return false;
                 }

               if(formulario.nom_pad.value.length==0){
                   formulario.nom_pad.focus();
                   alert("INGRESA EL NOMBRE DEL TUTOR");
                   return false;
                }
               if(formulario.edocivil_pad.value=='0'){
                   formulario.edocivil_pad.focus();
                   alert("SELECCIONA EL ESTADO CIVIL DEL TUTOR");
                   return false;
                }

               
              

               if(formulario.ap_pad.value.length==0){
                   formulario.ap_pad.focus();
                   alert("INGRESA EL APELLIDO PATERNO DEL TUTOR");
                   return false;
                }
               if(formulario.am_pad.value.length==0){
                   formulario.am_pad.focus();
                   alert("INGRESA EL APELLIDO MATERNO DEL TUTOR");
                   return false;
                }

             
               if(formulario.ap_pad.value.length==0){
                   formulario.ap_pad.focus();
                   alert("INGRESA EL APELLIDO PATERNO DEL TUTOR");
                   return false;
                }
               if(formulario.am_pad.value.length==0){
                   formulario.am_pad.focus();
                   alert("INGRESA EL APELLIDO MATERNO DEL TUTOR");
                   return false;
                }
               if(formulario.estado_pad.value=='0'){
                   formulario.estado_pad.focus();
                   alert("SELECCIONA EL ESTADO DE PROCEDENCIA DEL TUTOR");
                   return false;
                }
               if(formulario.ciudad_pad.value=='0'){
                   formulario.ciudad_pad.focus();
                   alert("SELECCIONA LA CIUDAD DE PROCEDENCIA DEL TUTOT");
                   return false;
                }
               if(formulario.col_pad.value=='0'){
                   formulario.col_pad.focus();
                   alert("SELECCIONA LA COLONIA DE PROCEDENCIA DEL TUTOR");
                   return false;
                }
              
                
               if(formulario.cp_pad.value.length==0){
                   formulario.cp_pad.focus();
                   alert("INGRESA EL CODIGO POSTAL");
                   return false;
                }
             
               if(formulario.calle_pad.value.length==0){
                   formulario.calle_pad.focus();
                   alert("INGRESA EL NOMBRE DE LA CALLE NO VACIO");
                   return false;
                }
               if(formulario.no_pad.value.length==0){
                   formulario.no_pad.focus();
                   alert("INGRESA EL NUMERO DE LA CALLE");
                   return false;
                }
             
               if(formulario.tel1_pad.value.length==0){
                   formulario.tel1_pad.focus();
                   alert("INGRESA EL TELEFONO DEL TUTOR");
                   return false;
                }
               var regCel1="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
               if(formulario.tel1_pad.value.search(regCel1) != 0){  
                    alert("NUMERO DE TELEFONO INVALIDO,REVISA LOS DATOS");
                    formulario.tel1_pad.focus();
                    return false;   
                }
               
               if(formulario.mail_pad.value.length==0){
                   formulario.mail_pad.focus();
                   alert("INGRESA EL CORREO DEL TUTOR");
                   return false;
                }
               if(formulario.tel2_pad.value.length==0){
                   formulario.tel2_pad.focus();
                   alert("INGRESA EL SEGUNDO TELEFONO DEL TUTOR");
                   return false;
                }
               var regCel2="0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?";
               if(formulario.tel2_pad.value.search(regCel2) != 0){  
                    alert("NUMERO DE TELEFONO INVALIDO,REVISA LOS DATOS");
                    formulario.tel2_pad.focus();
                    return false;   
                }
                
               if(formulario.ocupacion_pad.value.length==0){
                   formulario.ocupacion_pad.focus();
                   alert("INGRESA LA OCUPACION DEL TUTOR");
                   return false;
                }
               if(formulario.ltrabajo_pad.value.length==0){
                   formulario.ltrabajo_pad.focus();
                   alert("INGRESA EL LUGAR DE TRABAJO DEL TUTOR");
                   return false;
                }

               if(!confirm("\nIMPORTANTE: REVISA LOS DATOS,Y NO TENGAS PROBLEMA EN TU TRAMITE\n,øESTAS SEGURO DE ENVIAR?")){
                 alert("HAS CANCELADO EL ENVIO,REVISA LOS DATOS ...OK");
                 return false;
                 }
                  
        
              
              
    return true;


    }

function cargarBachilleratos(){
    //Bachilleratos a elegir
    
    var opcion="7";

    $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion,
          // beforeSend:inicioEnvio,
           success:llegadaBachilleratos,
           timeout:4000,
           error:problemasBachilleratos
         }); 
         return false;
         }
    function llegadaBachilleratos(datos){
    //var bactual=document.getElementById("bac_alu").value;
    $("#bac_alu").html(datos);
    //var bnuevo=document.getElementById("bac_alu").value;
    //if(bactual!=bnuevo){
    //cargarBachilleratoActual(bactual);
    //}
    
    }
    function problemasBachilleratos(){
    alert('Problemas en el servidor.');
    }
 
    
    function validarBachillerato(cve_sem){
    var semestre=cve_sem;
    var listaSemestre=document.getElementById("sem_alu");
    var listaBachilleratos=document.getElementById("bac_alu")

    if(semestre=='1'||semestre=='2'||semestre=='3'||semestre=='4'){
    document.getElementById('labelSemestre').innerHTML='';
    $("#bac_alu").html("<option value='1'>TRONCO COMUN</option>");
    }
    else{
        if(semestre!='0'){
        document.getElementById('labelSemestre').innerHTML='';
        cargarBachilleratos();
        }
        else{
          if(semestre==0||semestre=="0"){
              document.getElementById('labelSemestre').innerHTML='';
             document.getElementById('labelSemestre').innerHTML="Selecciona el semestre <img src='../../images/iconos/delete.ico' width='35' height='35'>";
          }
        }
        
    }
}

function validarProblemasSalud(opcion){
    var contenedorPSalud=document.getElementById("psalud_alumno");
    
    if(opcion=='si'){
    contenedorPSalud.style.display='table';
    }
    else{
    if(opcion=='no'){
    contenedorPSalud.style.display='none';
    document.getElementById("psalud_alu").value='';
    }
    else{
    contenedorPSalud.style.display='none';
    document.getElementById("psalud_alu").value='';
    alert("Selecciona si tienes problemas de salud");
    }
  }
}

function validarTieneBeca(opcion){
    var contenedorBeca=document.getElementById("beca_alumno");
    
    if(opcion=='si'){
    contenedorBeca.style.display='table';
    }
    else{
    if(opcion=='no'){
    contenedorBeca.style.display='none';
    document.getElementById("tbeca_alu").value='';
    }
    else{
    contenedorBeca.style.display='none';
    document.getElementById("tbeca_alu").value='';
    alert("Selecciona si cuentas con una beca");
    }
  }
}


function validarServicioSalud(opcion){
     var contenedorSalud=document.getElementById("tsalud_alumno");
        
        if(opcion=='si'){
        contenedorSalud.style.display='table';
        }
        else{
        if(opcion=='no'){
        contenedorSalud.style.display='none';
        document.getElementById("tsalud_alu").value='';
        }
        else{
        contenedorSalud.style.display='none';
        document.getElementById("tsalud_alu").value='';
        alert("Selecciona si cuentas con un servicio de salud");
        }
      } 
}

function validarLenguaAlumno(opcion){
    var contenedorLengua=document.getElementById("tlengua_alumno");
    
    if(opcion=='si'){
    contenedorLengua.style.display='table';
    }
    else{
    if(opcion=='no'){
    contenedorLengua.style.display='none';
    document.getElementById("tlengua_alu").value='';
    }
    else{
    contenedorLengua.style.display='none';
    document.getElementById("tlengua_alu").value='';
    alert("Selecciona si hablas o dominas una lengua indigena");
    }
  }
}


function cargarFecha(){
    
    
    
    var fecha=new Date();
    var meses=new Array
    ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    
      var mesTitulo=meses[fecha.getMonth()];
      var ciclo=parseInt(fecha.getFullYear())+1;
      var dia=fecha.getDate();
      var mes=parseInt(fecha.getMonth())+1;
      var year=fecha.getFullYear();

      var contenedorDia=document.getElementById("dia");
      var contenedorMes=document.getElementById("mes");
      var contenedorYear=document.getElementById("year");
     
      if(dia<10){dia='0'+dia;}
      if(mes<10){mes='0'+mes;}
     
      var cadenaFecha=year+"-"+mes+"-"+dia;
      contenedorDia.innerHTML=fecha.getDate()+" DE";
      contenedorMes.innerHTML=mesTitulo+" DEL";
      contenedorYear.innerHTML=fecha.getFullYear();
     
    document.getElementById('fecha').value=cadenaFecha;
  }



function cargarAlumno(){
    //Datos elementales alumno
    //var matricula='<?php echo $matricula;?>';
    var matricula='<?php echo $matricula;?>';
    var opcion="6";

    $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion+"&matricula="+matricula,
          // beforeSend:inicioEnvio,
           success:llegadaAlumno,
           timeout:4000,
           error:problemasAlumno
         }); 
         return false;
         }
    function llegadaAlumno(datos){
    var datosAlumno=datos.split("#");
    
    document.getElementById("mat_alu").value=datosAlumno[0];
    document.getElementById("nom_alu").value=datosAlumno[1];
    document.getElementById("ap_alu").value=datosAlumno[2];
    document.getElementById("am_alu").value=datosAlumno[3];
    document.getElementById("codsec_alu").value=datosAlumno[4];
    document.getElementById("sec_alu").value=datosAlumno[5];
    $("#bac_alu").html("<option value='"+datosAlumno[6]+"'>"+datosAlumno[7]+"</option>");
    }
    function problemasAlumno(){
    alert('Problemas en el servidor.');
    }
    

function cargarCiclo(){
    //Elige ciclo actual
    var opcion="5";

    $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion,
          // beforeSend:inicioEnvio,
           success:llegadaCiclo,
           timeout:4000,
           error:problemasCiclo
         }); 
         return false;
         }
    function llegadaCiclo(datos){
    var cicloActual=datos.split("#");
    
        
    $("#ciclo_label").html(cicloActual[1]);
    document.getElementById("ciclo_caja").value=cicloActual[0];
    document.getElementById("ciclo_nombre").value=cicloActual[1];
    }
    function problemasCiclo(){
    alert('Problemas en el servidor.');
    }
    

function cargarEstados(){
    
//Elige estados
var opcion="1";

$.ajax({
       async:true,
       type: "POST",
       dataType: "html",
       contentType: "application/x-www-form-urlencoded",
       url:"../../php/controlador.php",
       data:"opcion="+opcion,
      // beforeSend:inicioEnvio,
       success:llegadaEstados,
       timeout:4000,
       error:problemasEstados
     }); 
     return false;
     }
function llegadaEstados(datos){
    
$("#estado_alu").html(datos);
$("#estado_pad").html(datos);
}
function problemasEstados(){
alert('Problemas en el servidor.');
}
function cargarCiudades(id){
    var idestado=id;
    var opcion="2";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion+"&idestado="+idestado,
           //beforeSend:inicioEnvio,
           success:llegadaCiudades,
           timeout:4000,
           error:problemasCiudades
         }); 
         return false;

    }
function llegadaCiudades(datos){
$("#ciudad_alu").html(datos);
}
function problemasCiudades(datos){
alert('Problemas en el servidor al cargar las ciudades.');
}

function cargarCiudadesP(id){
    var idestado=id;
    var opcion="2";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion+"&idestado="+idestado,
           //beforeSend:inicioEnvio,
           success:llegadaCiudadesP,
           timeout:4000,
           error:problemasCiudadesP
         }); 
         return false;

    }
function llegadaCiudadesP(datos){
$("#ciudad_pad").html(datos);
}
function problemasCiudadesP(datos){
alert('Problemas en el servidor al cargar las ciudades.');
}


function cargarColoniasP(id){
    
    var idciudad=id;
    var opcion="3";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion+"&idciudad="+idciudad,
           beforeSend:inicioColoniasP,
           success:llegadaColoniasP,
           timeout:8000,
           error:problemasColoniasP
         }); 
         return false;
    

    }
 
function llegadaColoniasP(datos){
$("#col_pad").html(datos);
$("#cargarColoniasP").html('');
}
function problemasColoniasP(){

alert('Problemas en el servidor al cargar las colonias.');
}

function inicioColoniasP(){
var x=$("#cargarColoniasP");
x.html("Cargando...<img src='../../images/loading.gif'>");
}

function cargarColonias(id){
    
    var idciudad=id;
    var opcion="3";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion+"&idciudad="+idciudad,
           beforeSend:inicioColonias,
           success:llegadaColonias,
           timeout:8000,
           error:problemasColonias
         }); 
         return false;
    

    }
 
function llegadaColonias(datos){
$("#col_alu").html(datos);
$("#cargarColonias").html('');
}
function problemasColonias(){

alert('Problemas en el servidor al cargar las colonias.');
}

function inicioColonias(){
var x=$("#cargarColonias");
x.html("Cargando...<img src='../../images/loading.gif'>");
}


function cargarCp(id){
    var idcolonia=id;
    var opcion="4";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"../../php/controlador.php",
           data:"opcion="+opcion+"&idcolonia="+idcolonia,
           beforeSend:inicioCp,
           success:llegadaCp,
           timeout:4000,
           error:problemasCp
         }); 
         return false;

    }
    function inicioCp(){
    var x=$("#cargarCp");
    x.html("Cargando...<img src='../../images/loading.gif'>");
    }
     function llegadaCp(datos){
      var cp=document.getElementById('cp_alu');
      $("#cargarCp").html('');
      if(datos=='0'){
      cp.value='';
      }
       else{
       cp.value=datos;
       }
     }
     function problemasCp(){
     alert('Problemas en el servidor al cargar los codigos postales.');
     }

     function cargarCpPadre(id){
            var idcolonia=id;
            var opcion="4";

             $.ajax({
                   async:true,
                   type: "POST",
                   dataType: "html",
                   contentType: "application/x-www-form-urlencoded",
                   url:"../../php/controlador.php",
                   data:"opcion="+opcion+"&idcolonia="+idcolonia,
                   beforeSend:inicioCpPadre,
                   success:llegadaCpPadre,
                   timeout:4000,
                   error:problemasCpPadre
                 }); 
                 return false;

            }
            function inicioCpPadre(){
            var x=$("#cargarCpPadre");
            x.html("Cargando...<img src='../../images/loading.gif'>");
            }
             function llegadaCpPadre(datos){
              var cp=document.getElementById('cp_pad');
              $("#cargarCpPadre").html('');
              if(datos=='0'){
              cp.value='';
              }
               else{
               cp.value=datos;
               }
             }
             function problemasCpPadre(){
             alert('Problemas en el servidor al cargar los codigos postales.');
             }

function cancelarRegistro(){
var respuesta=confirm("Deseas cancelar la solicitud?,Recuerda que los datos no se guardaran y deberas volver a empezar");
if(respuesta){
alert("Has cancelado la solicitud");
window.location='../../php/logout.php?opcion=2';
}
else{
alert("Has decidido continuar el registro");
}
}

</script>
    


<style>.art-content .art-postcontent-0 .layout-item-0 { margin-bottom: 10px;  }
.art-content .art-postcontent-0 .layout-item-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#B8C4C7;border-right-color:#B8C4C7;border-bottom-color:#B8C4C7;border-left-color:#B8C4C7; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-2 { border-right-style:solid;border-right-width:1px;border-right-color:#B8C4C7; padding-right: 10px;padding-left: 10px;  }
.art-content .art-postcontent-0 .layout-item-3 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
<div id="art-main">
<header class="art-header">

    <div class="art-shapes">
       <!-- <div class="art-object1221746189"></div>IMAGEN-->
<div class="art-object740754033"></div><!--ESCUDO-->
<div class="art-textblock art-object510262950"><!--FONDO-->
        <div class="art-object510262950-text-container">
        <div class="art-object510262950-text"><p style="color: #2F393C; font-size:25px;font-family:'Palatino Linotype', Georgia, 'Times New Roman', Times, Serif;font-weight:normal;font-style:normal;text-decoration:none">&nbsp; &nbsp; SOLICITUD DE REINSCRIPCI&Oacute;N</p><p style="color: #2F393C; font-size:25px;font-family:'Palatino Linotype', Georgia, 'Times New Roman', Times, Serif;font-weight:normal;font-style:normal;text-decoration:none">JOS√â MA. MORELOS DE ZIT√ÅCUARO</p></div>
    </div>
    
</div>
            </div>






                        
                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-1" style="width: 50%" >
        <form name='principal' action="../../php/generar_solicitud.php" method="post" onsubmit="return validarForm(this);">
        <div style="margin-left: 2em">
        <b>CICLO ESCOLAR <span id='ciclo_label'></span></b>
        <input type='hidden' id='ciclo_caja' name='ciclo_caja'>
        <input type="hidden" id='ciclo_nombre' name='ciclo_nombre'>  
        <!-- CVE CICLO CAJA -->
        <br>
        <span style="font-weight: bold;">H.ZIT√ÅCUARO,MICH.A
        <span style="font-weight: bold;" id="dia"></span>  
        <span style="font-weight: bold;text-transform:uppercase" id="mes"></span>  
        <span style="font-weight: bold;" id="year"></span>
        <input type="hidden" id="fecha" name='fecha'><!-- FECHA CAJA -->
        </div><p><span style="font-weight: bold;"><br></span></p><hr color="gray" width="100%"><span style="font-weight: bold;">
        <br>DATOS ACAD&Eacute;MICOS<br><br></span>
        <hr color="gray" width="100%">
        <p><input type="text" name='mat_alu' id='mat_alu' readonly><span style="font-weight: bold;"><br></span></p>
        <p><span style="color: #050264;">MATRICULA</span></p>
        <p><input type="text" name='sec_alu' id='sec_alu' readonly>
        <input type='hidden' name='codsec_alu' id='codsec_alu'>
        <br></p><p><span style="color: rgb(5, 2, 100);">SECCI&Oacute;N</span></p>
        <p><select name="sem_alu" id='sem_alu' onchange='validarBachillerato(this.value);'>
        <option value="0">--Selecciona el semestre</option>
        <option value="1">PRIMERO</option>
        <option value="2">SEGUNDO</option>
        <option value="3">TERCERO</option>
        <option value="4">CUARTO</option>
        <option value="5">QUINTO</option>
        <option value="6">SEXTO</option>
        </select>
        <br></p><div id='labelSemestre'></div>
        <p><span style="color: rgb(5, 2, 100);">*SEMESTRE</span></p>
        <p><select id="bac_alu" name="bac_alu">
        <option value='0'>--Selecciona el bachillerato--</option></select>
        <br></p>
        <p><span style="color: rgb(5, 2, 100);">*BACHILLERATO</span></p><br>
        <hr color="gray" width="100%"><span style="color: #1A1367;">
        <span style="font-weight: bold; color: #000000;">
        <br>DATOS DEL PADRE O TUTOR<br><br></span></span>
        <hr color="gray" width="100%"><span style="color: rgb(26, 19, 103);">
        <br></span><br>
        <input type="text"  name="nom_pad" id="nom_pad" placeholder='Ingresa el nombre del tutor'>
        <br><b>NOMBRE <span style="color: rgb(26, 19, 103);">D</span>EL PADRE:</b><br><br>
        <input type="text" name="ap_pad" id="ap_pad" placeholder='Ingresa el apellido paterno'>
        <br><b>APELLIDO PATERNO:</b><br><br>
        <input type="text" name="am_pad" id="am_pad" placeholder='Ingresa el apellido materno'>
        <br><b>APELLIDO MATERNO:</b><br><br>
         <b>ESTADO CIVIL:</b>&nbsp;
        <select name="edocivil_pad" id='edocivil_pad'>
        <option value="0">--Selecciona--</option>
        <option value="1">Casado</option>
        <option value="2">Divorciado</option>
        <option value="3">Viudo</option>
        <option value="4">Union libre</option>
        <option value='5'>Soltero</option>
        </select>
         <br><br>
        <b> ESTADO:</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
         <select  name="estado_pad" id="estado_pad" onchange="javascript:cargarCiudadesP(this.value);">
         <option>--Selecciona un estado primero--</option>
         </select><br><br>
        <b> CIUDAD:</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
         <select name="ciudad_pad" id="ciudad_pad" onchange="javascript:cargarColoniasP(this.value)">
        
         </select><br>
         <br><b>COLONIA:</b> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
         <select name="col_pad" id="col_pad" onchange="javascript:cargarCpPadre(this.value);">
        <option></option></select>
         <div id='cargarColoniasP'></div>
         <br>
         <br><b>C&Oacute;DIGO POSTAL:</b>
         <input type="text" id="cp_pad" name="cp_pad" placeholder='Ingresa el codigo postal si esta vacio'>
         <div id='cargarCpPadre'></div>
         <br>
         <br><div  class='image-caption-wrapper' style="width: 60%; float: left;background:gray;color:white;font-size:25px;font-family:'Palatino Linotype', Georgia, 'Times New Roman', Times, Serif;font-weight:normal;font-style:normal;text-decoration:none;">DOMICILIO TUTOR:</div><br><br>
         <br><input type="text" name="calle_pad" id="calle_pad" placeholder='Ingresa el nombre de la calle'><br>
         <b>*CALLE:</b><br><input type="text" name='no_pad' id='no_pad' placeholder='Ingresa el numero de calle' >
         <br><b>*N&Uacute;MERO:</b><br><br>
         <b>TEL&Eacute;FONO(S):*</b><br>
         <input type="text" name="tel1_pad" id="tel1_pad"  placeholder='715-123-45-67  o 7151234567'><br>
         <b>(OPCIONAL):</b><br>
         <input type="text" name="tel2_pad" id="tel2_pad"  placeholder='715-123-45-67  o 7151234567'><br><br>
         <b>CORREO:</b><br>
         <input type="text" name='mail_pad' id='mail_pad'  placeholder='correoejemplo@hotmail.com'><br><br>
         <b>*OCUPACI&Oacute;N:</b><br><input type="text"  name="ocupacion_pad" id="ocupacion_pad"  placeholder='Ingresa la ocupacion'><br>
         <br><b>*LUGAR DE TRABAJO:</b><br><input type="text" name="ltrabajo_pad" id="ltrabajo_pad"  placeholder='Ingresa el lugar de trabajo'>
         <br><br><br>
    </div><div class="art-layout-cell layout-item-1" style="width: 50%" >
        <div class="image-caption-wrapper" style="width: 60%; float: left">
            <span style="font-weight: bold;"><br></span></div>
            <div class="image-caption-wrapper" style="width: 60%; float: left">
         <span style="font-weight: bold;">DATOS DEL ALUMNO&nbsp;</span></div>
         <div class="image-caption-wrapper" style="width: 100%; float: left">
        <input type="text" name='nom_alu' id='nom_alu' readonly>
        <span style="font-weight: bold;">&nbsp;</span>&nbsp; &nbsp;&nbsp;</div>
        <br><br><br><br><p><b>NOMBRE DEL ALUMNO:</b><br>
        </p>
        <input type="text" name='ap_alu' id='ap_alu' readonly><br><b>APELLIDO PATERNO:</b><br>
        <input type="text" name='am_alu' id='am_alu' readonly><br><b>APELLIDO MATERNO:</b><br><br>
        <input type="text" placeholder='Ingresa la CURP de 18 digitos' name='curp_alu' id='curp_alu'><br><b>*CURP:</b><br>
        <br><b>*FECHA DE NACIMIENTO;</b><br>
        <input type="text" placeholder='Selecciona la fecha de nacimiento' name='fnac_alu' id='fnac_alu' readonly><br>
        <br><b>*LUGAR DE NACIMIENTO:</b><br>
        <input type="text" placeholder='Ingresa el lugar de nacimiento' name='lnac_alu' id='lnac_alu'><br>
        <br><b>*SEXO:</b> &nbsp; &nbsp; &nbsp; &nbsp; 
        <select name='sexo_alu' id='sexo_alu'>
        <option value='0'>--Selecciona tu genero--</option>
        <option value='fem'>Femenino</option>
        <option value='masc'>Masculino</option>
        </select>
        <br><br><b>ESCOLARIDAD:</b>
        <select name='escolaridad_alu' id='escolaridad_alu'><option>Bachillerato Incompleto</option></select>
        <br><br><b>*ESTADO:</b> &nbsp; &nbsp; &nbsp;
        <select name='estado_alu' id='estado_alu' onchange="javascript:cargarCiudades(this.value);">
        <option>--Selecciona un estado--</option></select>
        <br><br><b>*CIUDAD:</b> &nbsp; &nbsp; &nbsp;&nbsp;
        <select name='ciudad_alu' id='ciudad_alu' onchange="javascript:cargarColonias(this.value);"><option></option></select>
        <br><br><b>*COLONIA:</b> &nbsp; &nbsp;&nbsp;
        <select name='col_alu' id='col_alu'  onchange="javascript:cargarCp(this.value);"><option></option></select>&nbsp; &nbsp;
        <div id='cargarColonias'></div>
        <br><b>C&Oacute;DIGO POSTAL:</b>&nbsp;
        <input type="text" placeholder='Revisa el codigo postal si esta vacio' name='cp_alu' id='cp_alu'>
        <div id='cargarCp'></div>
        <div class="image-caption-wrapper" style="width: 60%; float: left"><br></div>
        <div class="image-caption-wrapper" style="width: 60%; float: left;background:gray;color:white;font-size:25px;font-family:'Palatino Linotype', Georgia, 'Times New Roman', Times, Serif;font-weight:normal;font-style:normal;text-decoration:none;">DOMICILIO ALUMNO:</div>
        <div class="image-caption-wrapper" style="width: 60%; float: left">
           <br> <input type="text" name='calle_alu' id='calle_alu' placeholder='Ingresa solo el nombre'>*CALLE
            <input type="text" name='no_alu' id='no_alu' placeholder='Ingresa solo el numero'>&nbsp;*NUMERO</div>
            <div class="image-caption-wrapper" style="width: 60%; float: left">
                TELEFONO(S)&nbsp;*<input type="text" name='tel1_alu' id='tel1_alu' placeholder='715-123-45-67  o 7151234567'>&nbsp;
                (OPCIONAL)<input type="text" name='tel2_alu' id='tel2_alu' placeholder='715-123-45-67  o 7151234567'></div>
                <div class="image-caption-wrapper" style="width: 60%; float: left">
                CORREO:<input type="text" placeholder='correoejemplo@dominio.com' name='mail_alu' id='mail_alu'></div>
                <div class="image-caption-wrapper" style="width: 60%; float: left">
                <b>OCUPACI&Oacute;N:</b> &nbsp; &nbsp;&nbsp;
                <select name='ocupacion_alu' id='ocupacion_alu'>
                <option value='estudiante'>Estudiante</option></select></div>
            <div class="image-caption-wrapper" style="width: 60%; float: left"><b>ESTADO CIVIL:</b>&nbsp;
         <select name='ecivil_alu' id='ecivil_alu'>
            <option value='soltero'>SOLTERO(A)</option></select></div>
        <div class="image-caption-wrapper" style="width: 60%; float: left">
        <b>PROBLEMAS DE SALUD:</b>
        <select name="psalud_a" id='psalud_a' onchange="validarProblemasSalud(this.value);">
        <option value='0'>--Selecciona una opcion--</option>
        <option value='si'>Si</option>
        <option value='no'>No</option>
        </select>&nbsp;
        <div id='psalud_alumno' style='display: none;width: 100%'>
        ESPECIFIQUE&nbsp;<input type="text" id="psalud_alu" name="psalud_alu">
       </div>
        </div>
        <div class="image-caption-wrapper" style="width: 60%; float: left">
        <b>TIPO DE DISCAPACIDAD:</b>
        <select name='dis_alu' id='dis_alu'>
        <!--<option value="0">Selecciona una opcion</option>-->
        <option value="1">Ninguna</option>
        <!--<option value="2">Visual</option>
        <option value="3">Auditiva</option>
        <option value="4">De lenguaje</option>
        <option value="5">Motriz musculo esqueletico</option>
        <option value="6">Mental</option>--></select>
        </div>
     <div class="image-caption-wrapper" style="width: 60%; float: left">
        <b>CUENTA CON ALGUNA BECA:</b>&nbsp;
        <select name="beca_alu" id='beca_alu' onchange="javascript:validarTieneBeca(this.value)">
        <option value='0'>--Selecciona una opcion--</option>
        <option value='si'>Si</option>
        <option value='no'>No</option>
        </select>
        <div id='beca_alumno' style="display:none;width:100%">
        ESPECIFIQUE&nbsp;<input type="text" id="tbeca_alu" name="tbeca_alu"></div>
    </div>
    <div class="image-caption-wrapper" style="width: 60%; float: left">
   <b> CUENTA CON SERVICIO DE SALUD:</b>&nbsp;
    <select name="ssalud_alu" id='ssalud_alu' onchange="javascript:validarServicioSalud(this.value);">
    <option value='0'>--Selecciona una opcion--</option>
    <option value='si'>Si</option>
    <option value='no'>No</option>
    </select></div>
<div class="image-caption-wrapper" style="width: 60%; float: left">
<div id='tsalud_alumno' style='display: none;width: 100%'>
ESPECIFIQUE<input type="text"  name="tsalud_alu" id="tsalud_alu">
</div>
</div>
<div class="image-caption-wrapper" style="text-align: -webkit-auto;width: 60%; float: left;">
<b>HABLA O DOMINA ALGUNA LENGUA INDIGENA:</b>&nbsp;
<select name="lengua_alu" id='lengua_alu' onchange="javascript:validarLenguaAlumno(this.value);">
<option value='0'>--Selecciona una opcion--</option>
<option value='si'>Si</option>
<option value='no'>No</option>
</select></div>
<div class="image-caption-wrapper" style="text-align: -webkit-auto;width: 60%; float: left;">
<div id='tlengua_alumno' style="display: none;width: 100%">
ESPECIFIQUE&nbsp;<input type="text" name="tlengua_alu" id="tlengua_alu" >
</div>
</div><p style="text-align: -webkit-auto;"><br></p><p>
        </p>
    </div>
    </div>
</div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-2" style="width: 50%" >
        <p><input type='submit' class="art-button" value='ENVIAR DATOS'></p>
    </div><div class="art-layout-cell layout-item-3" style="width: 50%" >
        <p><a href='javascript:cancelarRegistro();' class='art-button'>
CANCELAR REGISTRO
</a></p>
<a href='../../php/logout.php?opcion=2' style='text-decoration:none;'>
<img src='../../images/iconos/shutdown.ico' style='border:none;' width=35 height=35>SALIR</a>
    </div>
    </div>
</form>
</div>
</div>


</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<p><br></p>
</footer><a href="#" class="scrollup" style="display: inline;">
<img src="../../images/icono.jpg"></a>

    </div>
    
</div>


</body></html>

<?php 
}//Si no esta logueado
else {
$nombre="ACCESO NO AUTORIZADO <img src='../../images/iconos/stop.ico' width='35' height='35'>";
require_once("../../php/encabezado.php");
echo "<div align='center'>
<link rel='stylesheet' type='text/css' href='../../css/reporte.css'>
<h2 align='center'>
<img src='../../images/iconos/delete.ico' width='35' height='35'>Ocurri&oacute; un error,debes iniciar sesi&oacute;n,para loguearte hazlo aqui:</h2>
<br><a href='solicitud-reinscripcion.html' style='text-decoration:none;'>
<img src='../../images/iconos/pencil.ico' width='35' height='35'>LOGIN</a></div>";
}

}
//Si la matricula es ''
else{
echo "<script>window.location='solicitud-reinscripcion.html'</script>";
}

  
?>