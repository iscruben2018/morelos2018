<?php
class Semestre{
	private $cve_sem;
	public $no_sem;
	public $nom_sem;
	
	public function __construct(){
		
	}
	/***************SETTERS********************/
	public function setClaveSemestre($cvesem){
		$this->cve_sem=$cvesem;
	}
	public function setNoSemestre($nosem){
		$this->no_sem=$nosem;
	}
	public function setNombreSemestre($nomsem){
	    $this->nom_sem=$nomsem;	
	}
	
	/***************GETTERS********************/
	public function getClaveSemestre(){
		return $this->cve_sem;
	}
	public function getNoSemestre(){
		return $this->no_sem;
	}
	public function getNombreSemestre(){
		return $this->nom_sem;
	}
	
}
?>