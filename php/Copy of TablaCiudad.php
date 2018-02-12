<?php
require_once 'Ciudad.php';
require_once 'Conexion.php';

class TablaCiudad extends Conexion{
	private $conexion;
	private $_ciudades=array();
	private $vectorCiudades=array();
	
	
	public function __construct(){
		$this->tabla="ciudad";
		$this->crearConexion();
	
	}
	
	public function add(Ciudad $ciudad){
		$this->_ciudades[]=$ciudad;
	}
	
	public function reporteEspecificoCiudad($criterio,$busqueda){
		//Donde criterio es el campo de busqueda y busqueda es la coincidencia 'LIKE'
		if( $this->noCiudades()>0){
	
			$vectorCiudades=array();
			$sql="SELECT *FROM ciudad WHERE ".$criterio."='".$busqueda."' ";
			
			mysql_query("SET NAMES 'utf8'");
			$qry=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_error().mysql_errno());
			while($ren=mysql_fetch_array($qry)){
				$ciudad=new Ciudad();
				$ciudad->setCpCiudad($ren['cp_ciu']);
				$ciudad->setNombreCiudad($ren['nom_ciu']);
				$ciudad->setCpEstado($ren['cp_est']);
	
				$vectorCiudades[]=$ciudad;
			}
			return $vectorCiudades;
		}
		else{
			return 0;// NO HAY RESULTADOS
		}
	
	}
	
	
	public function noCiudades(){
		$sql="SELECT COUNT(cp_ciu) as cuenta FROM ciudad";
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