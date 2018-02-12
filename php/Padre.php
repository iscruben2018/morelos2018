<?php
class Padre{
	
	private $cve_padre;
	public $nom_padre;
	public $ap_padre;
	public $am_padre;
	private $tel1_padre;
	private $tel2_padre;
	public $edociv_padre;
	public $correo_padre;
	private $idcol_padre;
	private $calle_padre;
	private $no_padre;
	private $ocupacion_padre;
	private $lugart_padre;
	
	
	public function __construct(){
		
	}
	/**********SETTERS*********************/
	public function setClavePadre($cvepad){
	$this->cve_padre=$cvepad;
	}
	public function setNombrePadre($nom_pad){
		$this->nom_padre=$nom_pad;
	}
	public function setAPaternoPadre($appadre){
	$this->ap_padre=$appadre;	
	}
	public function setAMaternoPadre($ampadre){
	$this->am_padre=$ampadre;
	}
	public function setTel1Padre($tel1){
	$this->tel1_padre=$tel1;
	}
	public function setTel2Padre($tel2){
		$this->tel2_padre=$tel2;
	}
	public function setECivilPadre($edocivil){
		$this->edociv_padre=$edocivil;
	}
	public function setCorreoPadre($correopadre){
		$this->correo_padre=$correopadre;
	}
	public function setColoniaPadre($idcol){
		$this->idcol_padre=$idcol;
	}
	public function setCallePadre($callep){
		$this->calle_padre=$callep;
	}
	public function setNoPadre($numero){
		$this->no_padre=$numero;
	}
	public function setOcupacionPadre($ocupacion){
		$this->ocupacion_padre=$ocupacion;
	}
	public function setLugarTrabajoPadre($lugartpadre){
		$this->lugart_padre=$lugartpadre;
	}
	
	/**********GETTERS*********************/
	public function getClavePadre(){
		return $this->cve_padre;
	}
	public function getNombrePadre(){
		return $this->nom_padre;
	}
	public function getAPaternoPadre(){
		return $this->ap_padre;
	}
	public function getAMaternoPadre(){
		return $this->am_padre;
	}
	public function getTel1Padre(){
		return $this->tel1_padre;
	}
	public function getTel2Padre(){
		return $this->tel2_padre;
	}
	public function getECivilPadre(){
		return $this->edociv_padre;
	}
	public function getCorreoPadre(){
		return $this->correo_padre;
	}
	public function getColoniaPadre(){
		return $this->idcol_padre;
	}
	public function getCallePadre(){
		return $this->calle_padre;
	}
	public function getNoPadre(){
		return $this->no_padre;
	}
	public function getOcupacionPadre(){
		return $this->ocupacion_padre;
	}
	public function getLugarTrabajoPadre(){
		return $this->lugart_padre;
	}
}