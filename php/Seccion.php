<?php
class Seccion{
	private $cod_sec;
	private $no_sec;
	private $cve_sem;
	
	/*******************SETTERS***************/
	public function setCodigoSeccion($codigo){
	$this->cod_sec=$codigo;	
	}
	public function setNombreSeccion($no){
	$this->no_sec=$no;	
	}
	public function setClaveSemSeccion($cve){
	$this->cve_sem=$cve;	
	}
	/****************GETTERS*****************/
	public function getCodigoSeccion(){
	return $this->cod_sec;
	}
	public function getNombreSeccion(){
	return $this->no_sec;
	}
	public function getClaveSemSeccion(){
	return $this->cve_sem;
	}
	
}