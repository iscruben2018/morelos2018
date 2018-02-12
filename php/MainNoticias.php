<?php
require_once 'TablaPublicacion.php';
require_once 'Publicacion.php';

$tablanoticias=new TablaPublicacion();
$publicacion=new Publicacion();

$publicacion=$tablanoticias->sliderNoticias();

foreach ($publicacion as $noticias){
	//id_publicacion 0,user 1,tipo_usu 2,cat_aviso    3,fecha_crea     4,titular       5,cont_publi    6,imagen_publi 7 de images,archivo_publi 8 de archivos o imagenes? 
	//echo $noticias[0]." ".$noticias[2]." ".$noticias[3]." ".$noticias[4]." ".$noticias[5]." ".$noticias[6]." ".$noticias[7]." ".$noticias[8]."<br>";
     
	echo "<div data-p='112.50' style='display: none;'><a href='#'><img data-u='image' src='images/becas_SEP_superior-large.jpg' /></a><div data-u='thumb'>Becas 2016</div></div>";

}


?>
