<?php
class Alumno {
	/*
	 * CLASE ALUMNO
	 * Mayo 2016
	 * R_Martinez_B
	 */
	private $matri_alu;
	private $curp_alu;
	public $nom_alu;
	public $ap_alu;
	public $am_alu;
	public $fechn_alu;
	private $tel1_alu;
	private $tel2_alu;
	public $correo_alu;
	private $id_col;
	private $calle_alu;
	private $no_alu;
	public $deuda_alu;
	public $status_alu;
	private $cve_bac_alu;
	private $cod_sec_alu;
	
	public function __construct() {
	}
	
	public function calcularEdad($fechaNacimiento) {
		@$diaActual = date ( j );
		@$mesActual = date ( n );
		@$anioActual = date ( Y );
		
		list ( $year, $mes, $dia ) = explode ( "-", $fechaNacimiento );
		// si el mes es el mismo pero el dia inferior aun
		// no ha cumplido años,le quitaremos un año actual
		
		if (($mes == $mesActual) && ($dia > $diaActual)) {
			$anioActual = $anioActual - 1;
		}
		// si el mes es superior al actual tampoco habra
		// cumplido años,por eso le quitamos un año al actual
		
		if ($mes > $mesActual) {
			$anioActual = $anioActual - 1;
		}
		// ya no habria mas condiciones ahora simplemente
		// restamos los años y mostramos el resultado como su edad
		$edad = $anioActual - $year;
		return $edad;
	}
	/**
	 * *********Setters***************************
	 */
	public function setMatriculaAlumno($matricula) {
		$this->matri_alu = $matricula;
	}
	public function setCurpAlumno($curp) {
		$this->curp_alu = $curp;
	}
	public function setNombreAlumno($nombre) {
		$this->nom_alu = $nombre;
	}
	public function setAPaternoAlumno($apaterno) {
		$this->ap_alu = $apaterno;
	}
	public function setAMaternoAlumno($amaterno) {
		$this->am_alu = $amaterno;
	}
	public function setFNacimientoAlumno($fechan) {
		$this->fechn_alu = $fechan;
	}
	public function setTel1Alumno($tel1) {
		$this->tel1_alu = $tel1;
	}
	public function setTel2Alumno($tel2) {
		$this->tel2_alu = $tel2;
	}
	public function setCorreoAlumno($correo) {
		$this->correo_alu = $correo;
	}
	public function setColoniaAlumno($idcol) {
		$this->id_col = $idcol;
	}
	public function setCalleAlumno($calle) {
		$this->calle_alu = $calle;
	}
	public function setNoAlumno($numero) {
		$this->no_alu = $numero;
	}
	public function setDeudaAlumno($deuda) {
		$this->deuda_alu = $deuda;
	}
	public function setStatusAlumno($status) {
		$this->status_alu = $status;
	}
	public function setClaveBachilleratoAlumno($cvebac_alu) {
		$this->cve_bac_alu = $cvebac_alu;
	}
	public function setCodigoSeccionAlumno($codsec_alu) {
		$this->cod_sec_alu = $codsec_alu;
	}
	
	/**
	 * ********Getters**********************
	 */
	public function getMatriculaAlumno() {
		return $this->matri_alu;
	}
	public function getCurpAlumno() {
		return $this->curp_alu;
	}
	public function getNombreAlumno() {
		return $this->nom_alu;
	}
	public function getAPaternoAlumno() {
		return $this->ap_alu;
	}
	public function getAMaternoAlumno() {
		return $this->am_alu;
	}
	public function getFNacimientoAlumno() {
		return $this->fechn_alu;
	}
	public function getTel1Alumno() {
		return $this->tel1_alu;
	}
	public function getTel2Alumno() {
		return $this->tel2_alu;
	}
	public function getCorreoAlumno() {
		return $this->correo_alu;
	}
	public function getColoniaAlumno() {
		return $this->id_col;
	}
	public function getCalleAlumno() {
		return $this->calle_alu;
	}
	public function getNoAlumno() {
		return $this->no_alu;
	}
	public function getDeudaAlumno() {
		return $this->deuda_alu;
	}
	public function getStatusAlumno() {
		return $this->status_alu;
	}
	public function getClaveBachilleratoAlumno() {
		return $this->cve_bac_alu;
	}
	public function getCodigoSeccionAlumno() {
		return $this->cod_sec_alu;
	}
}
?>