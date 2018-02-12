<?php
class Ciudad{
	private $cp_ciu;
	public $nom_ciu;
	private $cp_est;
	
	public function __construct(){
		
	}
	/**************SETTERS******************/
	public function setCpCiudad($cpciu){
    $this->cp_ciu=$cpciu;	
	}
	public function setNombreCiudad($nomciu){
	$this->nom_ciu=$nomciu;
	}
	public function setCpEstado($cpest){
	$this->cp_est=$cpest;
	}
	/*************GETTERS******************/
	public function getCpCiudad(){
	return $this->cp_ciu;
	}
	public function getNombreCiudad(){
	return $this->nom_ciu;
	}
	public function getCpEstado(){
	return $this->cp_est;
	}
	
	
}
?>