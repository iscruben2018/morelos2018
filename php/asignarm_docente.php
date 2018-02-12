<html>
<head>
<script type="text/javascript" src="../jquery.js"></script>
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<!-- ASIGNAR MATERIAS.JS -->
<script type="text/javascript" src='../js/asignarm_docente.js'></script>
</head>
<body >
<?php 
$nombre='ASIGNAR MATERIAS DOCENTE';require_once 'encabezado.php';?>
<label>Ciclo Escolar</label>
<select name='ciclo' id='ciclo'></select><br><br>
<label>Semestre</label>
<select name='semestre' id='semestre' onchange='validarBachillerato(this.value);'>
<option value="0">--Selecciona el semestre</option>
 <option value="1">PRIMERO</option>
 <option value="2">SEGUNDO</option>
 <option value="3">TERCERO</option>
 <option value="4">CUARTO</option>
 <option value="5">QUINTO</option>
 <option value="6">SEXTO</option>
</select>
<label>Bachillerato:</label>
<select name='bachilleratos' id='bachilleratos'>
</select>
<br><br>
<input type='button' value='Buscar Materias' onclick="buscarMaterias();">
<label>Materias</label>
<select name='materias' id='materias'></select>
<div id='cargaMaterias'></div><br>
<label>Docente</label>
<select name='docentes' id='docentes'></select><br><br>

<input type='button' value='Asignar Materia' onclick="asignarMaterias();">
<!-- CIERRA ENCABEZADO -->
</td></tr></table>
<!--  -->
</body>
</html>