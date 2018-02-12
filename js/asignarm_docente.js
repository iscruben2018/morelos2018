var x;

x=$(document);
x.ready(inicio);

function inicio(){
	cargarCiclo();
	cargarBachilleratos();
	cargarDocentes();
	
}

function cargarDocentes(){

	
    var opcion="22";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"controlador.php",
           data:"opcion="+opcion,
           //beforeSend:inicioEnvio,
           success:llegadaDocentes,
           timeout:4000,
           error:problemasDocentes
         }); 
         return false;
}
function llegadaDocentes(datos){
	
$("#docentes").html(datos);
}
function problemasDocentes(datos){
alert('Problemas en el servidor al cargar los docentes.');
}

function cargarBachilleratos(){
	
    var opcion="20";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"controlador.php",
           data:"opcion="+opcion,
           //beforeSend:inicioEnvio,
           success:llegadaBachilleratos,
           timeout:4000,
           error:problemasBachilleratos
         }); 
         return false;
}
function llegadaBachilleratos(datos){
$("#bachilleratos").html(datos);
}
function problemasBachilleratos(datos){
alert('Problemas en el servidor al cargar los bachilleratos.');
}

function validarBachillerato(cve_sem){
	var semestre=cve_sem;
	var listaSemestre=document.getElementById("semestre");
	var listaBachilleratos=document.getElementById("bachillerato")

	if(semestre=='1'||semestre=='2'||semestre=='3'||semestre=='4'){
	$("#bachilleratos").html("<option value='1'>TRONCO COMUN</option>");
	}
	else{
		if(semestre!='0'){
	    cargarBachilleratos();
		}
		
	}
}

function cargarCiclo(){
	
    var opcion="5";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"controlador.php",
           data:"opcion="+opcion,
           //beforeSend:inicioEnvio,
           success:llegadaCiclo,
           timeout:4000,
           error:problemasCiclo
         }); 
         return false;
}
function llegadaCiclo(datos){
var ciclo=datos.split("#");

var cicloActual="<option value='"+ciclo[0]+"'>"+ciclo[1]+"</option>";
$("#ciclo").html(cicloActual);
}
function problemasCiclo(datos){
alert('Problemas en el servidor al cargar el ciclo.');
}


function buscarMaterias(){

	var sem=document.getElementById("semestre");
	var semestre=sem.options[sem.selectedIndex].value;
	
	var bac=document.getElementById("bachilleratos");
	var bachillerato=bac.options[bac.selectedIndex].value;

    var opcion="21";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"controlador.php",
           data:"opcion="+opcion+"&cargaBachillerato="+bachillerato+"&cargaSemestre="+semestre,
           beforeSend:inicioMaterias,
           success:llegadaMaterias,
           timeout:4000,
           error:problemasMaterias
         }); 
         return false;
}
function inicioMaterias(){
$("#cargaMaterias").html("Cargando...<img src='../images/loading.gif'>");	
}

function llegadaMaterias(datos){
$("#cargaMaterias").html('');
$("#materias").html(datos);
}
function problemasMaterias(datos){
alert('Problemas en el servidor al cargar las materias.');
}


function asignarMaterias(){
	
	var doc=document.getElementById("docentes");
	var docente=doc.options[doc.selectedIndex].value;
	

	var sem=document.getElementById("semestre");
	var semestre=sem.options[sem.selectedIndex].value;

	var bac=document.getElementById("bachilleratos");
	var bach=bac.options[bac.selectedIndex].value;
	
	var mat=document.getElementById("materias");
	var materia=mat.options[mat.selectedIndex].value;

    var ciclo=document.getElementById("ciclo");

   
    var opcion="23";
	 if(docente==''||docente=='0'||docente==0||doc.value=='0'){
		    alert("Selecciona el docente");
		    doc.focus();
		    }
		    else if(semestre==''||semestre=='0'||sem.value=='0'){
		    alert("Selecciona el semestre");
		    sem.focus();
		    }
		    else if(bach==''||bach=='0'||bac.value=='0'){
		    alert("Selecciona el bachillerato");
		    bac.focus();
		    }
		    else if(materia==''||materia=='0'||mat.value=="0"){
		    alert("Selecciona la materia");
		    mat.focus();
		    }
		    else{
		    
		    
	
   var confirmar=confirm("DESEAS CONFIRMAR?");
   if(confirmar){
     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"controlador.php",
           data:"opcion="+opcion+"&cicloAsignado="+ciclo.value+"&docenteAsignado="+docente+"&materiaAsignada="+materia,
          // beforeSend:inicioMaterias,
           success:llegadaAsignarMaterias,
           timeout:4000,
           error:problemasAsignarMaterias
         }); 
         return false;
   }
   else{
    alert("CANCELADO");
    }
  }
}

function llegadaAsignarMaterias(datos){
alert(datos);
}
function problemasAsignarMaterias(datos){
alert('Problemas en el servidor al asignar las materias.');
}