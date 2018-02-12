<?php
class Usuario{
	private $cve_usu;
	private $user;
	private $pass;
	public $tipo_usu;
	public $correo_usu;
	
	public function __construct(){
		
	}
	
	public function setClaveUsuario($cveusu){
		$this->cve_usu=$cveusu;
	}
	public function setUsuario($user){
		$this->user=$user;
	}
	public function setPassword($password){
		$this->pass=$password;
	}
	public function setTipoUsuario($tipousu){
	$this->tipo_usu=$tipousu;
		
	}
	public  function  setCorreoUsuario($correo){
	$this->correo_usu=$correo;	
	}
	
	/***************GETTERS*****************/
	public function getClaveUsuario(){
		return $this->cve_usu;
	}
	public function getUsuario(){
		return $this->user;
	}
	public function getPassword(){
		return $this->pass;
	}
	public function getTipoUsuario(){
		return $this->tipo_usu;
	
	}
	public function  getCorreoUsuario(){
		return $this->correo_usu;
	}
}
?>