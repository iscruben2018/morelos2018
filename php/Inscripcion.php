<?php
class Inscripcion{
	
	private $cve_ins;
	private $fecha_ins;
	public $turno_ins;
	public $tipo_ins;
	private $cve_ciclo_ins;
	private $cve_sem_ins;
	private $matri_alu_ins;
	private $cod_sec_ins;
	private $cve_bac_ins;
	private $escuela_pro;
	private $promedio_ins;
	public  $escficha_ins;
	
	public function __construct(){
		
	}
	/***************SETTERS**********************/
	
	public function setClaveInscripcion($cveins){
		$this->cve_ins=$cveins;
	}
	public function setFechaInscripcion($fechains){
		$this->fecha_ins=$fechains;
	}
	public function setTurnoInscripcion($turnoins){
		$this->turno_ins=$turnoins;
	}
	public function setTipoInscripcion($tipoins){
		$this->tipo_ins=$tipoins;
	}
	public function setClaveCicloInscripcion($cvecicloins){
		$this->cve_ciclo_ins=$cvecicloins;
	}
	public function setClaveSemestre($cvesemins){
		$this->cve_sem_ins=$cvesemins;
	}
	public function setMatriculaAlumnoInscripcion($matrialu_ins){
		$this->matri_alu_ins=$matrialu_ins;
	}
	public function setCodigoSeccionInscripcion($codsecins){
		$this->cod_sec_ins=$codsecins;
	}
	public function setClaveBachilleratoInscripcion($cvebac_ins){
		$this->cve_bac_ins=$cvebac_ins;
	}
	public function setEscuelaProcedencia($escpro){
		$this->escuela_pro=$escpro;
	}
	public function setPromedioInscripcion($promins){
		$this->promedio_ins=$promins;
	}
	public function setEscuelaFicha($escficha){
		$this->escficha_ins=$escficha;
	}
	/***************GETTERS**********************/
	
	public function getClaveInscripcion(){
		return $this->cve_ins;
	}
	public function getFechaInscripcion(){
		return $this->fecha_ins;
	}
	public function getTurnoInscripcion(){
		return $this->turno_ins;
	}
	public function getTipoInscripcion(){
		return $this->tipo_ins;
	}
	public function getClaveCicloInscripcion(){
		return $this->cve_ciclo_ins;
	}
	public function getClaveSemestre(){
		return $this->cve_sem_ins;
	}
	public function getMatriculaAlumnoInscripcion(){
		return $this->matri_alu_ins;
	}
	public function getCodigoSeccionInscripcion(){
		return $this->cod_sec_ins;
	}
	public function getClaveBachilleratoInscripcion(){
		return $this->cve_bac_ins;
	}
	public function getEscuelaProcedencia(){
		return $this->escuela_pro;
	}
	public function getPromedioInscripcion(){
		return $this->promedio_ins;
	}
	public function getEscuelaFicha(){
		return $this->escficha_ins;
	}
}
?>
