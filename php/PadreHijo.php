<?php
class PadreHijo{
	private $cve_padrehijo;
	private $cve_pad;
	private $matri_alu;
	
	public function __construct(){
		
	}
	/***********SETTERS******************************/
	public function setClavePadreHijo($cvepadrehijo){
	$this->cve_pad_hijo=$cvepadrehijo;	
	}
	public function setClavePadre($cvepad){
	$this->cve_pad=$cvepad;
	}
	public function setMatriculaHijo($matrihijo){
	$this->matri_alu=$matrihijo;
	}
	/**********GETTERS*******************************/
	
	public function getClavePadreHijo(){
		return $this->cve_pad_hijo;
	}
	public function getClavePadre(){
		return $this->cve_pad;
	}
	public function getMatriculaHijo(){
		return $this->matri_alu;
	}
}