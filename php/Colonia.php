<?php
class Colonia{
	private $id_col;
	private $cp_col;
	public $nom_col;
	private $cp_ciu_col;
	
	
	
	public function __construct(){
	
	}
	
	/***************SETTERS************************/
	
	public function setIdColonia($idcol){
		$this->id_col=$idcol;
	}
	public function setCpColonia($cpcol){
		$this->cp_col=$cpcol;
	}
	public function setNombreColonia($nomcol){
		$this->nom_col=$nomcol;
	}
	public function setCpCiudadColonia($cpciu_col){
	    $this->cp_ciu_col=$cpciu_col;
	}
	

	/***************GETTERS***********************/
	
	public function getIdColonia(){
		return $this->id_col;
	}
	public function getCpColonia(){
		return $this->cp_col;
	}
	public function getNombreColonia(){
		return $this->nom_col;
	}
	public function getCpCiudadColonia(){
		return $this->cp_ciu_col;
	}
}
?>