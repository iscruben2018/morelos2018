<?php
class InscripcionRenglon{
	
	private $no_renhor;
	private $hi_renhor;
	private $hf_renhor;
	private $dia_renhor;
	private $num_doc_mat;
	private $cve_ins;
	

	public function __construct(){
		
	}
	
	/***********************SETTERS**********************************/
	public function setNoRenglonHorario($no_renglon){
	$this->no_renhor=$no_renglon;	
	}
	public function setHoraInicioRenglonHorario($hi_renglon){
	$this->hi_renhor=$hi_renglon;
	}
	public function setHoraFinalRenglonHorario($hf_renglon){
	$this->hf_renhor=$hf_renglon;
	}
	public function setDiaRenglonHorario($dia_renglon){
	$this->dia_renhor=$dia_renglon;	
	}
	public function setNoDocenteMateriaRenglon($no_docmat){
	$this->num_doc_mat=$no_docmat;	
	}
	public function setClaveInscripcionRenglonMateria($cve_ins){
	$this->cve_ins=$cve_ins;
	}
	
	/***********************GETTERS**********************************/
	public function getNoRenglonHorario(){
		return $this->no_renhor;
	}
	public function getHoraInicioRenglonHorario(){
		return $this->hi_renhor;
	}
	public function getHoraFinalRenglonHorario(){
		return $this->hf_renhor;
	}
	public function getDiaRenglonHorario(){
		return $this->dia_renhor;
	}
	public function getNoDocenteMateriaRenglon(){
		return $this->num_doc_mat;
	}
	public function getClaveInscripcionRenglonMateria(){
		return $this->cve_ins;
	}
	
	
}
?>