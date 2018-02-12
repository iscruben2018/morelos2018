<?php
class AlumnoBachillerato{
	
private $num_alu;
private $cve_bac;
private $matri_alu_bac;
private $status_alu;

/**********************SETTERS*************************/
public function setNumeroAlumnoBachillerato($noalumno){
$this->num_alu=$noalumno;	
}
public function setClaveBachilleratoAlu($clavebac){
$this->cve_bac=$clavebac;	
}
public function setMatriculaBachillerato($matribac){
$this->matri_alu_bac=$matribac;
}
public function setStatusAlumno($statusalu){
$this->status_alu=$statusalu;	
}
/*********************GETTERS*************************/
public function getNumeroAlumnoBachillerato(){
	return $this->num_alu;
}
public function getClaveBachilleratoAlu(){
	return $this->cve_bac;
}
public function getMatriculaBachillerato(){
	return $this->matri_alu_bac;
}
public function getStatusAlumno(){
	return $this->status_alu;
}
}