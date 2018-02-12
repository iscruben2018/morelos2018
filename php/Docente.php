<?php
class Docente{
	private $cve_docente;
	public $nom_docente;
	public $ap_docente;
	public $am_docente;
	public $lada_docente;
	public $tel_docente;
	public $correo_docente;
	
	public function __construct(){
		
	}
	/***************SETTERS**********************/
	public function setClaveDocente($cvedoc){
		$this->cve_docente=$cvedoc;
	}
	public function setNombreDocente($nomdoc){
	    $this->nom_docente=$nomdoc;	
	}
	public function setAPaternoDocente($apdocente){
		$this->ap_docente=$apdocente;
	}
	public function setAMaternoDocente($amdocente){
		$this->am_docente=$amdocente;
	}
	public function setLadaDocente($ladadoc){
		$this->lada_docente=$ladadoc;
	}
	public function setTelDocente($teldoc){
		$this->tel_docente=$teldoc;
	}
	public function setCorreoDocente($correo){
		$this->correo_docente=$correo;
	}
	
	/***************GETTERS**********************/
	public function getClaveDocente(){
		return $this->cve_docente;
	}
	public function getNombreDocente(){
		return $this->nom_docente;
	}
	public function getAPaternoDocente(){
		return $this->ap_docente;
	}
	public function getAMaternoDocente(){
		return $this->am_docente;
	}
	public function getLadaDocente(){
		return $this->lada_docente;
	}
	public function getTelDocente(){
		return $this->tel_docente;
	}
	public function getCorreoDocente(){
		return $this->correo_docente;
	}
}
