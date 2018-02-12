<?php
class Estado{
private $cp_est;
public $nom_est;

public function __construct(){
	
}

/*******************SETTERS**************/

public function setCpEstado($cp){
$this->cp_est=$cp;	
}
public function setNombreEstado($nombre){
$this->nom_est=$nombre;
}

/*******************GETTERS**************/

public function getCpEstado(){
return $this->cp_est;	
}
public function getNombreEstado(){
return $this->nom_est;
}

}
?>