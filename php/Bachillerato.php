<?php
class Bachillerato{
private $cve_bac;
public $nom_bac;

public function __construct(){
	
}
/***************SETTERS****************************/
public function setClaveBachillerato($clave){
$this->cve_bac=$clave;
}
public function setNombreBachillerato($nombre_bac){
$this->nom_bac=$nombre_bac;
}
/***************GETTERS****************************/
public function getClaveBachillerato(){
return $this->cve_bac;
}
public function getNombreBachillerato(){
return $this->nom_bac;
}
	
}
?>