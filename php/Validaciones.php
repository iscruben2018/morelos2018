<?php
//class Validaciones{

	//public function __construct(){
		
	//}
	//public function validarTelefono($telefono){
	$tel="7126669";
                                                                        //7 digitos 
	$regex1='/^0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?$/D';
	if (preg_match($regex1, $tel)) {
	echo "Telefono valido<br>";
	}
	else{
	echo "Telefono invalido<br>";
	}
	
	$calle="Dr. Emilio García Sur #124,H.Zitácuaro,Mich";
	
	$regex2='/^[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*$/D';
	if (preg_match($regex2, $calle)) {
		echo "Nombre de la calle invalido<br>";
	}
	else{
		echo "Calle valida<br>";
	}
	//}
	
//}