<?php

require_once("dompdf_config.inc.php");
$html=file_get_contents("html.html");
$dompdf=new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("ejemplo.pdf");
exit();
?>