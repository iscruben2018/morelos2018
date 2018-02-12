<?php
// Clases Php
require_once("PHPExcel/PHPExcel.php");
require_once("PHPExcel/Reader/Excel2007.php");

//Creo un objeto Excel 2007
$objReader = new PHPExcel_Reader_Excel2007();
//Cargo el excel
$objPHPExcel = $objReader->load("calificacion.xlsx");
//Indicamos que se pare en la hoja uno del libro
$objPHPExcel->setActiveSheetIndex(0);
$i=2;

echo "<table border='1' align='center'>";
echo "<tr>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Folio:<hr color='green' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Nombre del Chofer:<hr color='#000034' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Capacidad del Trailer:<hr color='#000034' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Hora de Salida:<hr color='#000034' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Hora Aproximada:<hr color='#000034' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Hora de Llegada:<hr color='#000034' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Nombre quien recibe:<hr color='#000034' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;'>Cantidad:<hr color='#000034' width=100%></th>";
echo "<th style='text-align:center;border-bottom:inset;border-right:inset;''>Reparacion preventiva:<hr color='#000034' width=100%></th>";
echo "<th>&nbsp;</th>";
echo "<th>&nbsp;</th>";
echo "</tr>";

while($objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue() !='') {
	echo "<tr class='btn btn-default'>";

	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue()."</td>";
	echo "<td>".$objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue()."</td>";
	
$i++;
}
echo "</table>";

?>