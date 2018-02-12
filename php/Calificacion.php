<?php
class Calificacion{
private $cve_cal;
private $matri_alu;
private $siia;
private $primera_cal;
private $segunda_cal;
private $tercera_cal;
private $prom_cal;
private $semestral_cal;
private $ordinario_cal;
private $extra_cal;
private $reg_cal;

/****************SETTERS*************************/
public function setClaveCalificacion($clave){
$this->cve_cal=$clave;	
}
public function setMatriculaAlu($matricula){
$this->matri_alu=$matricula;
}
public function setSiia($siia){
$this->siia=$siia;
}
public function setPrimeraCalificacion($primera){
$this->primera_cal=$primera;
}
public function setSegundaCalificacion($segunda){
$this->segunda_cal=$segunda;
}
public function setTerceraCalificacion($tercera){
$this->tercera_cal=$tercera;
}
public function setPromedioCalificacion($promedio){
$this->prom_cal=$promedio;
}
public function setSemestralCalificacion($semestral){
$this->semestral_cal=$semestral;
}
public function setOrdinarioCalificacion($ordinario){
$this->ordinario_cal=$ordinario;
}
public function setExtraCalificacion($extra){
$this->extra_cal=$extra;
}
public function setRegularizacionCalificacion($regularizacion){
$this->reg_cal=$regularizacion;
}

/*********************GETTERS***********************************/
public function getClaveCalificacion(){
	return $this->cve_cal;
}
public function getMatriculaAlu(){
	return $this->matri_alu;
}
public function getSiia(){
	return $this->siia;
}
public function getPrimeraCalificacion(){
	return $this->primera_cal;
}
public function getSegundaCalificacion(){
	return $this->segunda_cal;
}
public function getTerceraCalificacion(){
	return $this->tercera_cal;
}
public function getPromedioCalificacion(){
	return $this->prom_cal;
}
public function getSemestralCalificacion(){
	return $this->semestral_cal;
}
public function getOrdinarioCalificacion(){
	return $this->ordinario_cal;
}
public function getExtraCalificacion(){
	return $this->extra_cal;
}
public function getRegularizacionCalificacion(){
	return $this->reg_cal;
}

}
?>