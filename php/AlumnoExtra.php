<?php
class AlumnoExtra{
	
	private $cve_aluex;
	public  $psalud_aluex;
	public  $beca_aluex;
	public  $servs_aluex;
	public  $idioma_aluex;
	private $matri_aluex;
	
	public $lnac_aluex;
	public $sexo_aluex;
	
	
	public function __construct(){
		
	}
	/*************SETTERS*****************/
	public  function setClaveAlumnoExtra($cvealu){
	$this->cve_aluex=$cvealu;
	}
	public function setPSaludAlumno($psalud){
	$this->psalud_aluex=$psalud;
	}
	public function setBecaAlumno($becaalu){
	$this->beca_aluex=$becaalu;
	}
	public function setServicioSaludAlumno($ssalu_alu){
	$this->servs_aluex=$ssalu_alu;
	}
	public function setIdiomaAlumno($idioma_alumno){
	$this->idioma_aluex=$idioma_alumno;
	}
	public function setMatriculaAlumnoExtra($matrialu_extra){
	$this->matri_aluex=$matrialu_extra;
	}
	public function setLugarNacimientoExtra($lnac_extra){
		$this->lnac_aluex=$lnac_extra;
	}
	
	public function setSexoAlumnoExtra($sexo_aluextra){
		$this->sexo_aluex=$sexo_aluextra;
	}
	
	/*************GETTERS*****************/
	public  function getClaveAlumnoExtra(){
		return $this->cve_aluex;
	}
	public function getPSaludAlumno(){
		return $this->psalud_aluex;
	}
	public function getBecaAlumno(){
		return $this->beca_aluex;
	}
	public function getServicioSaludAlumno(){
		return $this->servs_aluex;
	}
	public function getIdiomaAlumno(){
		return $this->idioma_aluex;
	}
	public function getMatriculaAlumnoExtra(){
		return $this->matri_aluex;
	}
	
	
	public function getLugarNacimientoExtra(){
	return $this->lnac_aluex;
	}
	public function getSexoAlumnoExtra(){
	return $this->sexo_aluex;
	}
}
?>