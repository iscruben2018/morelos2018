<?php
class Materia{
	private $siia_mat;
    public  $nom_mat;
    public  $ht_mat;
    public  $hp_mat;
    public  $pre_mat;
    public  $pre_mat2;
    private $cve_sem_mat;
    private $cve_bac_mat;
    
    /*SETTERS*/
    public function setSiiaMateria($siia){
    $this->siia_mat=$siia;
    }
    public function setNombreMateria($nombre){
    $this->nom_mat=$nombre;	
    }
    public function setHorasTMateria($htmat){
    $this->ht_mat=$htmat;
    }
    public function setHorasPMateria($hpmat){
    $this->hp_mat=$hpmat;    	
    }
    public function setPreMateria($premat){
    $this->pre_mat=$premat;    	
    }
    public function setPreMateriaDos($premat2){
    $this->pre_mat2=$premat2; 	
    }
    public function setClaveSemMateria($cvesem){
    $this->cve_sem_mat=$cvesem;	
    }
    public function setClaveBacMateria($cvebac){
    $this->cve_bac_mat=$cvebac;    	
    }
    /*GETTERS*/
    public function getSiiaMateria(){
    	return $this->siia_mat;
    }
    public function getNombreMateria(){
    	return $this->nom_mat;
    }
    public function getHorasTMateria(){
    	return $this->ht_mat;
    }
    public function getHorasPMateria(){
    	return $this->hp_mat;
    }
    public function getPreMateria(){
    	return $this->pre_mat;
    }
    public function getPreMateriaDos(){
    	return $this->pre_mat2;
    }
    public function getClaveSemMateria(){
    	return $this->cve_sem_mat;
    }
    public function getClaveBacMateria(){
    	return $this->cve_bac_mat;
    }
    
}