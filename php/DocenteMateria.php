<?php
class DocenteMateria{
	private $num_doc_mat;
	private $cve_doc;
	private $siia;
	private $cve_ciclo;
	
	public function __construct(){
		
	}
	/*****************SETTERS********************************/
	public function setNoDocenteMateria($no_docmat){
		$this->num_doc_mat=$no_docmat;
		
	}
	public function setClaveDocenteMateria($cvedoc){
		$this->cve_doc=$cvedoc;
	}
	public function setSiiaDocenteMateria($siia){
		$this->siia=$siia;
	}
	public function setClaveCicloDocenteMateria($cve_ciclo){
		$this->cve_ciclo=$cve_ciclo;
	}
	
	/****************GETTERS*********************************/
	public function getNoDocenteMateria(){
	return $this->num_doc_mat;	
	}
	public function getClaveDocenteMateria(){
	return $this->cve_doc;
	}
	public function getSiiaDocenteMateria(){
	return $this->siia;
	}
	public function getClaveCicloDocente(){
	return $this->cve_ciclo;
	}
	
	
}
?>