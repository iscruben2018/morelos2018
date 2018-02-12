<?php
require_once 'Colonia.php';
require_once 'Conexion.php';

class TablaColonia extends Conexion{
	private $conexion;
	private $_colonias=array();
	private $vectorColonias=array();
	
	
	public function __construct(){
		$this->tabla="colonia";
		$this->crearConexion();
	
	}
	
	public function add(Colonia $colonia){
		$this->_colonias[]=$colonia;
	}
	
	public function reporteEspecificoColonia($criterio,$busqueda){
		//Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if( $this->noColonias()>0){
	
			$vectorColonias=array();
			$sql="SELECT *FROM colonia WHERE ".$criterio."='".$busqueda."' ORDER BY nom_col ASC";
			
			mysql_query("SET NAMES 'utf8'");
			$qry=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_error().mysql_errno());
			while($ren=mysql_fetch_array($qry)){
				$colonia=new Colonia();
				$colonia->setIdColonia($ren['id_col']);
				$colonia->setCpColonia($ren['cp_col']);
				$colonia->setNombreColonia($ren['nom_col']);
				$colonia->setCpCiudadColonia($ren['cp_ciu']);
	
				$vectorColonias[]=$colonia;
			}
			return $vectorColonias;
		}
		else{
			return 0;// NO HAY RESULTADOS
		}
	
	}
	
	public function reporteEspecificoCp($criterio,$busqueda){
		//Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if( $this->noColonias()>0){
	
			$sql="SELECT cp_col FROM colonia WHERE ".$criterio."='".$busqueda."' ORDER BY cp_col ASC";
				
			mysql_query("SET NAMES 'utf8'");
			$qry=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_error().mysql_errno());
			$ren=mysql_fetch_array($qry);
				$colonia=new Colonia();
				$colonia->setIdColonia($ren['id_col']);
				$colonia->setCpColonia($ren['cp_col']);
				$colonia->setNombreColonia($ren['nom_col']);
				$colonia->setCpCiudadColonia($ren['cp_ciu']);
			return $colonia;
		}
		else{
			return 0;// NO HAY RESULTADOS
		}
	
	}
	
	
	public function noColonias(){
		$sql="SELECT COUNT(id_col) as cuenta FROM colonia";
		$result=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_error().mysql_errno());
		$no_resultados=mysql_num_rows($result);
		if($no_resultados>0){
			$cuenta=mysql_fetch_object($result);
			return $cuenta->cuenta;
		}
		else {
			return 0;
		}
	}
}
?>