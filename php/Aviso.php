<?php
class Aviso{
	private $id_aviso;
	public  $categoria_aviso;
	public  $descripcion_aviso;
	
	public function __construct(){
		
	}
	
    /*******SETTERS****************/
	
	public function setIdAviso($idaviso){
		$this->id_aviso=$idaviso;
		
	}
	public function setCategoriaAviso($cataviso){
		$this->categoria_aviso=$cataviso;
	}
	public function setDescripcionAviso($daviso){
		$this->descripcion_aviso=$daviso;
		
	}
	
	/*******GETTERS****************/
	
	public function getIdAviso(){
		return $this->id_aviso;
	
	}
	public function getCategoriaAviso(){
		return $this->categoria_aviso;
	}
	public function getDescripcionAviso(){
		return $this->descripcion_aviso;
	
	}
	
	
}