<html>
<head>
<script type="text/javascript" src="../jquery.js"></script>
<link rel='stylesheet' href='../css/reporte.css' type='text/css' />
<script type="text/javascript" src='../js/quitarm_docente.js'></script>
</head>
<body background='../images/sheet.png'>
<?php 
$nombre='QUITAR MATERIAS DOCENTE';
require_once 'encabezado.php';?>

<label>Docente</label>
<select name='docentes' id='docentes' onchange="buscarMaterias();"></select><br><br>

<input type='button' value='Buscar Materias' onclick="buscarMaterias();">

<div id='cargaMaterias'></div><br>
<div id='materias'></div>

<!--FIN ENCABEZADO  -->
</td></tr></table>
<!--  -->
</body>
</html>