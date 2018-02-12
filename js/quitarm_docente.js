var x;

x=$(document);
x.ready(inicio);

function inicio(){
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





function buscarMaterias(){
	
	var cve_doc=document.getElementById("docentes");
	var docentes=cve_doc.options[cve_doc.selectedIndex].value;

  if(docentes==''||docentes=='0'){
  cve_doc.focus();
  alert("Selecciona un docente");

  }
  else{

    var opcion="27";

     $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"controlador.php",
           data:"opcion="+opcion+"&cve_doc="+docentes,
           beforeSend:inicioMaterias,
           success:llegadaMaterias,
           timeout:4000,
           error:problemasMaterias
         }); 
         return false;
       }
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


