<?php
class Publicacion{
	private $id_publicacion;
	private $cve_usu;
	public $fecha_crea;
	public $fecha_pub;
	public $titular;
	public $cont_publi;
	public $imagen_publi;
	public $archivo_publi;
	private $id_aviso;
	
	public function __construct(){
		
	}
	public function setIdPublicacion($idpubli){
	$this->id_publicacion=$idpubli;	
	}
	/***************SETTERS***************************/
	public function setClaveUsuarioPublicacion($cveusu){
		$this->cve_usu=$cveusu;
	}
	public function setFechaCreacion($fechacrea){
		$this->fecha_crea=$fechacrea;
	}
	public function setFechaPublicacion($fechapubli){
		$this->fecha_pub=$fechapubli;
	}
	public function setTitularPublicacion($titular){
		$this->titular=$titular;
	}
	public function setContenidoPublicacion($contenido){
		$this->cont_publi=$contenido;
	}
	public function setImagenPublicacion($imagen){
		$this->imagen_publi=$imagen;
	}
	public function setArchivoPublicacion($archivo){
		$this->archivo_publi=$archivo;
	}
	public function setIdAvisoPublicacion($idaviso){
		$this->id_aviso=$idaviso;
	}
	
	/***************GETTERS***************************/
	public function getClaveUsuarioPublicacion(){
		return $this->cve_usu;
	}
	public function getFechaCreacion(){
		return $this->fecha_crea;
	}
	public function getFechaPublicacion(){
		return $this->fecha_pub;
	}
	public function getTitularPublicacion(){
		return $this->titular;
	}
	public function getContenidoPublicacion(){
		return $this->cont_publi;
	}
	public function getImagenPublicacion(){
		return $this->imagen_publi;
	}
	public function getArchivoPublicacion(){
		return $this->archivo_publi;
	}
	public function getIdAvisoPublicacion(){
		return $this->id_aviso;
	}
}
?>