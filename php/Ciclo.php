<?php
class Ciclo{
	private $cve_ciclo;
	public  $no_ciclo;
	
	public function __construct(){
		
	}
	/*******SETTERS***************/
	public function setClaveCiclo($cveciclo){
		$this->cve_ciclo=$cveciclo;
	}
	public function setNoCiclo($nociclo){
		$this->no_ciclo=$nociclo;
	}
	/*******GETTERS***************/
	public function getClaveCiclo(){
		return $this->cve_ciclo;
	}
	public function getNoCiclo(){
		return $this->no_ciclo;
	}
}