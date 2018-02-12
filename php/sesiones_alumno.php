<?php

$opcion=$_POST['opcion'];

switch ($opcion) {
	//LOGIN ALUMNO
	case 1:
		
		echo $_COOKIE['usuario_alumno'];
	break;
	
	default:
		;
	break;
}

?>
